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
class AdmAddActor extends MY_Controller{
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
        $this->load->view('adm_add_actor');
        
    }
    
    function addActor(){
        
        if($this->input->post('submit')){
            
            $video_id = $this->uri->segment(3);
            
            
            //Check whether user upload picture
            $picture = '';
            if(!empty($_FILES['picture']['name'])){
                $config['upload_path'] = 'images/actors/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif|JPG';
                //$config['file_name'] = $_FILES['picture']['name'];
//                $config['file_name'] = $this->input->post('videoid');
//                $config['file_name'] = $this->input->post('actor');
                
                $config['file_name'] = str_replace(" ", "-", rtrim($this->input->post('actor')));
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
            if($picture != ''){
                
                if($video_id>0){
                    $old_img = $this->adm_data_model->getOldImg('cast',$video_id);
                }
                
                $config['image_library'] = 'gd2';
                $config['source_image'] = "images/actors/".$picture;
                $config['new_image'] = "images/actors/".'500X500-resize-'.$picture;
                $config['maintain_ratio'] = TRUE;
                $config['width']         = 500;
                $config['height']         = 500;
                
                $this->load->library('image_lib', $config);
                $this->image_lib->initialize($config);
                $success = $this->image_lib->resize();
                
                 if($success){
                     
                    $this->image_lib->clear();
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = "images/actors/500X500-resize-".$picture;
                    $config['new_image'] = "images/actors/".'500X500-'.$picture;
                    $config['maintain_ratio'] = FALSE;
                    $config['width']         = 500;
                    $config['height']         = 500;
                    $config['x_axis'] = '0';
                    $config['y_axis'] = '0';
                    $this->load->library('image_lib', $config);
                    $this->image_lib->initialize($config);
                    $success = $this->image_lib->crop();
//                   list($width, $height) = getimagesize(str_replace('285X160-','','images/actors/500X500-'.$picture));
//                     echo $success.'...'.$width;exit; 
                }
                
                 $file = "images/actors/".$picture;
                unlink($file);
                $file_resize = "images/actors/500X500-resize-".$picture;
                 unlink($file_resize);
                
                $picture = '500X500-'.$picture;
            }   
            //--> File Resize -- end
           // if(strlen($picture)>0){
                //Prepare array of user data
                
                $userData = array(
                    'cast_name' => $this->input->post('actor'),
                    'cast_title' => $this->input->post('title'),
                    'cast_img' => $picture,
                    'cast_desc' => $this->input->post('desc'),
                    'cast_keywords' => $this->input->post('keywords')
                );

                //Pass user data to model
                if($video_id>0){
                    $seo_url_id = $this->WebService->setSEOURLCast($video_id,$this->input->post('actor'),'cast','edit');
                    if(strlen($picture)>0){
                        $userData = array(
                            'cast_name' => $this->input->post('actor'),
                            'cast_title' => $this->input->post('title'),
                            'cast_img' => $picture,
                            'cast_desc' => $this->input->post('desc'),
                            'cast_keywords' => $this->input->post('keywords')
                        );
                    }else{
                        $userData = array(
                            'cast_name' => $this->input->post('actor'),
                            'cast_title' => $this->input->post('title'),
                            'cast_desc' => $this->input->post('desc'),
                            'cast_keywords' => $this->input->post('keywords')
                        );
                    }
                    
                    if($seo_url_id>0){
                        $userData['seo_url_id'] = $seo_url_id;
                    }
                    
                    $insertUserData = $this->adm_data_model->editCastData($video_id,$userData,'cast');
                }else{
                    
                    
                    
                    $this->db->where('cast_name', $this->input->post('actor'));
                    $query = $this->db->get('cast');
                   //$query = $this->db->get_where(''.$main_table,array(''.$main_col_name,''.$value));
        //            echo $query->num_rows().'...'.$main_table.'...'.$main_col_name.'...'.$value;exit
                    if($query->num_rows()==0){
                         $insertUserData = $this->adm_data_model->addCastData($userData,'cast');
                         
                         
                         
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

                            //$insert_id = $this->db->insert_id();

                            $seo_url_id = $this->WebService->setSEOURLCast($insert_id,$this->input->post('actor'),'cast','add');
                            
                            $userData = array(
                            'seo_url_id' => $seo_url_id
                                    );
                            
                            $insertUserData = $this->adm_data_model->editCastData($insert_id,$userData,'cast');
                            
                        }
                       
                        
                        if($video_id>0){
                            $this->session->set_flashdata('msg', 'data have been updated successfully.');
                        }else{
                            $this->session->set_flashdata('msg', 'data have been added successfully.');

                        }
                    }else{
                        $this->session->set_flashdata('msg', 'Actor with same name already exist');
                    }
//                }else{
//                
//                    $this->session->set_flashdata('msg', 'Some problems occured, please try again.');
//                }
            }
        
        //Form for adding user data
        //$this->load->view('users/add');
       // $this->index();
            $this->Adm_sitemap_model->generateMASDMCSitemap('cast');
            if($video_id>0){
                redirect('AdmViewActor/editActor/'.$video_id);

            }else{
                redirect('AdmAddActor');
            }
        
    }
    
    
   
            
    function deleteStatus(){
        
        $tabl = $this->uri->segment(3);
        $id = $this->uri->segment(4);
        $status = $this->uri->segment(5);
        
        
        $this->adm_data_model->deleteStatus($tabl,$id,$status);
        
        $this->session->set_flashdata('msg', 'data have been updated successfully.');
        
        redirect('AdmViewActor');
    }
    
    function delete(){
        
        $tabl = $this->uri->segment(3);
        $id = $this->uri->segment(4);
        $seo_url_id = $this->uri->segment(5);
        
        
        $this->adm_data_model->deleteData($tabl,$id,$seo_url_id);
        
        $this->session->set_flashdata('msg', 'data have been deleted successfully.');
        
        redirect('AdmViewActor');
    }
    
    
}
