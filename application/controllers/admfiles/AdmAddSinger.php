<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdmViewActor
 *
 * @author yoo
 */
class AdmAddSinger extends MY_Controller{
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('WebService');
        $this->load->model('adm_data_model');
        $this->load->model('Adm_sitemap_model');
    }
    
    public function index(){
        
         $this->load->view('header_footer/header');
        $this->load->view('header_footer/sidebar');
        $this->load->view('adm_add_singer');
        
    }
    
    function add(){
        
        if($this->input->post('submit')){
            
            $video_id = $this->uri->segment(3);
            
            
            //Check whether user upload picture
            if(!empty($_FILES['picture']['name'])){
                $config['upload_path'] = 'images/singers/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif|JPG';
                //$config['file_name'] = $_FILES['picture']['name'];
//                $config['file_name'] = $this->input->post('videoid');
                
                $config['file_name'] = str_replace(" ", "-", rtrim($this->input->post('actor')));
                $config['file_name'] = preg_replace('/[^A-Za-z0-9\-]/', '', $config['file_name']);

                $config['file_name'] = preg_replace('/-+/', '-', $config['file_name']);
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('picture')){
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];
                }else{
                    $picture = '';
                }
            }else{
                $picture = '';
            }
            //--> file resize -- start
            if($picture != ''){
                
                if($video_id>0){
                    $old_img = $this->adm_data_model->getOldImg('singer',$video_id);
                }
                
                $config['image_library'] = 'gd2';
                $config['source_image'] = "images/singers/".$picture;
                $config['new_image'] = "images/singers/".'500X500-resize-'.$picture;
                $config['maintain_ratio'] = TRUE;
                $config['width']         = 500;
                $config['height']         = 500;
                $config['x_axis'] = '0';
                $config['y_axis'] = '0';
                $this->load->library('image_lib', $config);
                $this->image_lib->initialize($config);
                $success = $this->image_lib->resize();
                
                if($success){
                    $this->image_lib->clear();
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = "images/singers/500X500-resize-".$picture;
                    $config['new_image'] = "images/singers/".'500X500-'.$picture;
                    $config['maintain_ratio'] = FALSE;
                    $config['width']         = 500;
                    $config['height']         = 500;
                    $config['x_axis'] = '0';
                    $config['y_axis'] = '0';
                    $this->load->library('image_lib', $config);
                    $this->image_lib->initialize($config);
                    $success = $this->image_lib->crop();
                }
                
                 $file = "images/singers/".$picture;
                unlink($file);
                $file_resizze = "images/singers/500X500-resize-".$picture;
                unlink($file_resizze);
                
                $picture = '500X500-'.$picture;
            }   
            //--> File Resize -- end
           // if(strlen($picture)>0){
                //Prepare array of user data
                

                //Pass user data to model
                if($video_id>0){
                    $seo_url_id = $this->WebService->setSEOURLCast($video_id,$this->input->post('actor'),'singer','edit');
                    if(strlen($picture)>0){
                        $userData = array(
                            'singer_name' => $this->input->post('actor'),
                            'singer_title' => $this->input->post('title'),
                            'singer_img' => $picture,
                            'singer_desc' => $this->input->post('desc'),
                            'singer_keywords' => $this->input->post('keywords')
                        );
                    }else{
                        $userData = array(
                            'singer_name' => $this->input->post('actor'),
                            'singer_title' => $this->input->post('title'),
                            'singer_desc' => $this->input->post('desc'),
                            'singer_keywords' => $this->input->post('keywords')
                        );
                    }
                    
                    if($seo_url_id>0){
                        $userData['seo_url_id'] = $seo_url_id;
                    }
                    
                    $insertUserData = $this->adm_data_model->editCastData($video_id,$userData,'singer');
                }else{
                    
                    
                    $userData = array(
                        'singer_name' => $this->input->post('actor'),
                        'singer_title' => $this->input->post('title'),
                        'singer_img' => $picture,
                        'singer_desc' => $this->input->post('desc'),
                        'singer_keywords' => $this->input->post('keywords')
                    );
                    
                    $this->db->where('singer_name', $this->input->post('actor'));
                    $query = $this->db->get('singer');
                   //$query = $this->db->get_where(''.$main_table,array(''.$main_col_name,''.$value));
        //            echo $query->num_rows().'...'.$main_table.'...'.$main_col_name.'...'.$value;exit
                    if($query->num_rows()==0){
                        $insertUserData = $this->adm_data_model->addCastData($userData,'singer');
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
                            $seo_url_id = $this->WebService->setSEOURLCast($insert_id,$this->input->post('actor'),'singer','add');
                            
                            $userData = array(
                            'seo_url_id' => $seo_url_id
                                    );
                            
                            $insertUserData = $this->adm_data_model->editCastData($insert_id,$userData,'singer');
                        }
                       
                        
                        if($video_id>0){
                            $this->session->set_flashdata('msg', 'data have been updated successfully.');
                        }else{
                            $this->session->set_flashdata('msg', 'data have been added successfully.');

                        }
                    }else{
                        $this->session->set_flashdata('msg', 'Singer with same name already exist.');
                    }
//                }else{
//                
//                    $this->session->set_flashdata('msg', 'Some problems occured, please try again.');
//                }
            }
        
        //Form for adding user data
        //$this->load->view('users/add');
       // $this->index();
            $this->Adm_sitemap_model->generateMASDMCSitemap('singer');
            if($video_id>0){
                redirect('AdmViewSinger/edit/'.$video_id);

            }else{
                redirect('AdmAddSinger');
            }
        
    }
    
    function deleteStatus(){
        
        $tabl = $this->uri->segment(3);
        $id = $this->uri->segment(4);
        $status = $this->uri->segment(5);
        
        
        $this->adm_data_model->deleteStatus($tabl,$id,$status);
        
        $this->session->set_flashdata('msg', 'data have been updated successfully.');
        
        redirect('AdmViewSinger');
    }
    
    function delete(){
        
        $tabl = $this->uri->segment(3);
        $id = $this->uri->segment(4);
         $seo_url_id = $this->uri->segment(5);
        
        
        $this->adm_data_model->deleteData($tabl,$id,$seo_url_id);
        
        $this->session->set_flashdata('msg', 'data have been deleted successfully.');
        
        redirect('AdmViewSinger');
    }
    
    
}
