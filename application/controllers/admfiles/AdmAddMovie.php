<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdmAddMovie
 *
 * @author yoo
 */
class AdmAddMovie extends MY_Controller {
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('WebService');
        $this->load->model('adm_data_model');
        $this->load->model('adm_movie_model');
        $this->load->model('Adm_sitemap_model');
    }
    
    public function index(){
        
        $this->data['subcat'] = $this->getSubcat();
        
        $this->load->view('header_footer/header');
        $this->load->view('header_footer/sidebar');
        $this->load->view('adm_add_movie',$this->data);
        $this->load->view('header_footer/footer');
    }
    
     function add(){
        
        if($this->input->post('submit')){
            
            $video_id = $this->uri->segment(3);
            $time = date('H:i:s');
           // echo $video_id;exit;
            //Check whether user upload picture
            $picture = '';
            if(!empty($_FILES['picture']['name'])){
                $config['upload_path'] = 'images/movies/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif|JPG';
                //$config['file_name'] = $_FILES['picture']['name'];
                $config['file_name'] = $this->input->post('videoid');
                
                $config['file_name'] = str_replace(" ", "-", rtrim($this->input->post('name')));
                $config['file_name'] = preg_replace('/[^A-Za-z0-9\-]/', '', $config['file_name']);

                $config['file_name'] = preg_replace('/-+/', '-', $config['file_name']);
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('picture')){
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];
                }
            }
            //--> file resize -- start
            if($picture){
                
                 if($video_id>0){
                    $old_img = $this->adm_data_model->getOldImg('movie',$video_id);
                }
                
                $config['image_library'] = 'gd2';
                $config['source_image'] = "images/movies/".$picture;
                $config['new_image'] = "images/movies/".'500Xheight-resize-'.$picture;
                $config['maintain_ratio'] = TRUE;
                $config['width']         = 500;
                $config['x_axis'] = '0';
                $config['y_axis'] = '0';
                $this->load->library('image_lib', $config);
                $this->image_lib->initialize($config);
                $success = $this->image_lib->resize();
                
                if($success){
                    $this->image_lib->clear();
                         $config['image_library'] = 'gd2';
                    $config['source_image'] = "images/movies/500Xheight-resize-".$picture;
                    $config['new_image'] = "images/movies/".'500Xheight-'.$picture;
                    $config['maintain_ratio'] = TRUE;
                    $config['width']         = 500;
                    $config['x_axis'] = '0';
                    $config['y_axis'] = '0';
                    $this->load->library('image_lib', $config);
                    $this->image_lib->initialize($config);
                    $success = $this->image_lib->crop();
                    }
                
                 $file = "images/movies/".$picture;
                unlink($file);
                $file = "images/movies/500Xheight-resize-".$picture;
                unlink($file);
                
                $picture = '500Xheight-'.$picture;
                
                
            }   
            //--> File Resize -- end
           // if(strlen($picture)>0){
                //Prepare array of user data
                
                $userData = array(
                    'subcat_id' => $this->input->post('subcat'),
                    'movie_name' => $this->input->post('name'),
                    'movie_title' => $this->input->post('title'),
                    'movie_img' => $picture,
                    'movie_desc' => $this->input->post('desc'),
                    'movie_keywords' => $this->input->post('keywords'),
                    'rel_date' => $this->input->post('reldate').' '.$time,
                    'my_release' => $this->input->post('my_reldate')
                );

                //Pass user data to model
                if($video_id>0){
                    $seo_url_id = $this->WebService->setSEOURLMovie($this->input->post('subcat'),$video_id,$this->input->post('name'),'movie','edit');
                    if(strlen($picture)>0){
                        $userData = array(
                            'subcat_id' => $this->input->post('subcat'),
                            'movie_name' => $this->input->post('name'),
                            'movie_title' => $this->input->post('title'),
                            'movie_img' => $picture,
                            'movie_desc' => $this->input->post('desc'),
                            'movie_keywords' => $this->input->post('keywords'),
                            'rel_date' => $this->input->post('reldate').' '.$time,
                            'my_release' => $this->input->post('my_reldate')
                        );
                    }else{
                        $userData = array(
                            'subcat_id' => $this->input->post('subcat'),
                            'movie_name' => $this->input->post('name'),
                            'movie_title' => $this->input->post('title'),
                            'movie_desc' => $this->input->post('desc'),
                            'movie_keywords' => $this->input->post('keywords'),
                            'rel_date' => $this->input->post('reldate').' '.$time,
                            'my_release' => $this->input->post('my_reldate')
                        );
                    }
                    
                     if($seo_url_id>0){
                        $userData['seo_url_id'] = $seo_url_id;
                    }
                    
                    $insertUserData = $this->adm_movie_model->editMovieData($video_id,$userData);
                }else{
                    $this->db->where('movie_name', $this->input->post('name'));
                    $query = $this->db->get('movie');
                   //$query = $this->db->get_where(''.$main_table,array(''.$main_col_name,''.$value));
        //            echo $query->num_rows().'...'.$main_table.'...'.$main_col_name.'...'.$value;exit
                    if($query->num_rows()==0){
                        $insertUserData = $this->adm_movie_model->addMovieData($userData);
                    }else{
                        $insertUserData = false;
                    }
                }
                

                //Storing insertion status message.
                    if($insertUserData){
                        if($video_id>0){
                            $insert_id = $video_id;
                        }else{
                            $insert_id = $this->db->insert_id();

                            $seo_url_id = $this->WebService->setSEOURLMovie($this->input->post('subcat'),$insert_id,$this->input->post('name'),'movie','add');
                            
                            $userData = array(
                            'seo_url_id' => $seo_url_id
                                    );
                            
                            $insertUserData = $this->adm_data_model->editCastData($insert_id,$userData,'movie');
                        }
                        
                        $castid = $this->input->post('cast');
                        $this->adm_movie_model->addMovieMapCast($insert_id,$castid);
                        $singerid = $this->input->post('singer');
                        $this->adm_movie_model->addMovieMapSinger($insert_id,$singerid);
                        $musicid = $this->input->post('music');
                        $this->adm_movie_model->addMovieMapMusic($insert_id,$musicid);
                        $directorid = $this->input->post('director');
                        $this->adm_movie_model->addMovieMapDirector($insert_id,$directorid);
                        
                        
                        if($video_id>0){
                            $this->session->set_flashdata('msg', 'data have been updated successfully.');
                        }else{
                            $this->session->set_flashdata('msg', 'data have been added successfully.');

                        }
                    }else{
                        $this->session->set_flashdata('msg', 'Movie with same name already exist.');
                    }
//                }else{
//                
//                    $this->session->set_flashdata('error_msg', 'Some problems occured, please try again.');
//                }
            }
        
        //Form for adding user data
        //$this->load->view('users/add');
       // $this->index();
            
            $this->Adm_sitemap_model->generateMASDMCSitemap('movie');
            $this->Adm_sitemap_model->updateSubCatURl('AllDetail','movie',$this->input->post('subcat'));
            if($video_id>0){
                redirect('AdmViewMovie/edit/'.$video_id);

            }else{
                redirect('AdmAddMovie');
            }
        
    }
    
    
    function deleteStatus(){
        
        $tabl = $this->uri->segment(3);
        $id = $this->uri->segment(4);
        $status = $this->uri->segment(5);
        
        
        $this->adm_data_model->deleteStatus($tabl,$id,$status);
        
        $this->session->set_flashdata('msg', 'data have been updated successfully.');
        
        redirect('AdmViewMovie');
    }
    
    function delete(){
        
        $tabl = $this->uri->segment(3);
        $id = $this->uri->segment(4);
        $seo_url_id = $this->uri->segment(5);
        
        $this->adm_data_model->deleteData($tabl,$id,$seo_url_id);
        
        $this->session->set_flashdata('msg', 'data have been deleted successfully.');
        
        redirect('AdmViewMovie');
    }
    
    public function getSubcat(){
        return $this->adm_movie_model->getSubcat();
    }
}
