<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AddMovie
 *
 * @author yoo
 */
class AddVideo extends MY_Controller{
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $this->load->model('adm_home_model');
        $this->load->model('WebService');
        $this->load->model('Adm_sitemap_model');
        $this->load->model('Adm_movie_model');
        
    }
    
    public function index(){
        
        $this->data['maincat'] = $this->adm_home_model->getAllMainCat();
        
        $this->load->view('header_footer/header');
        $this->load->view('header_footer/sidebar');
        $this->load->view('adm_add_video',$this->data);
        $this->load->view('header_footer/footer');
        
    }
   
    public function addVideos(){
        
        echo 'data..'.$this->input->post('tags');exit;
        
    }
    
    
    function add($id = ''){
        
        if($this->input->post('submit')){
            
            //$video_id = $this->uri->segment(3);
            $video_id = $id;
            
            //echo $movieid = $this->input->post('movies');exit;
            
            //Check whether user upload picture
            $picture = '';
            if(!empty($_FILES['picture']['name'])){
                if($video_id>0){
                    $old_img = $this->adm_home_model->getVideoImage($video_id,'video');
                }
                 if($video_id>0){
                        @unlink("images/videothumb/".$old_img);
//                        @unlink("images/videothumb/1280X720-".$old_img);
                        @unlink("images/videothumb/285X160-".$old_img);
                    }
                $config['upload_path'] = 'images/videothumb/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif|JPG';
                //$config['file_name'] = $_FILES['picture']['name'];
//                $config['file_name'] = $this->input->post('videoid');
                $config['file_name'] = str_replace(" ", "-", trim($this->input->post('videoname')));
                $config['file_name'] = preg_replace('/[^A-Za-z0-9\-]/', '', $config['file_name']);

                $config['file_name'] = preg_replace('/-+/', '-', $config['file_name']);
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('picture')){
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];
                }
                
                
                
            }else{
                
                $videoid = $this->input->post('videoid');
                //echo $videoid;exit;
                if(strlen($videoid) > 0){
                    $fileurl = 'http://img.youtube.com/vi/'.$videoid.'/maxresdefault.jpg';

                     list($width, $height) = @getimagesize($fileurl);
                   // $img_info   = getimagesize($_FILES['image']['tmp_name']);
                    //$mime   = $img_info['mime'];

    //                $width = $data[0];
    //                $height = $data[1];
//                    echo $width.'....'.$height;exit;

                    if(($width == '') && ($height == '')){
                       // echo $width.'....'.$height.'...if';exit;
                        if($video_id>0){
                            $old_img = $this->adm_home_model->getVideoImage($video_id,'video');
                        }
                         if($video_id>0){
                            @unlink("images/videothumb/".$old_img);
    //                        @unlink("images/videothumb/1280X720-".$old_img);
                            @unlink("images/videothumb/285X160-".$old_img);
                        }
                        $picture = 'test';
                    }else{
                        //echo $width.'....'.$height.'...else';exit;
                        if($video_id>0){
                            $old_img = $this->adm_home_model->getVideoImage($video_id,'video');
                        }
                         if($video_id>0){
                                @unlink("images/videothumb/".$old_img);
        //                        @unlink("images/videothumb/1280X720-".$old_img);
                                @unlink("images/videothumb/285X160-".$old_img);
                            }
                        $newfile = str_replace(" ", "-", trim($this->input->post('videoname')));
                        $newfile = preg_replace('/[^A-Za-z0-9\-]/', '', $newfile);

                        $newfile = preg_replace('/-+/', '-', $newfile);
                        $filename = "images/videothumb/".$newfile.".jpg";
//                        $filename = "images/videothumb/".$videoid.".jpg";
                        
                        
                        file_put_contents ($filename,file_get_contents($fileurl));
                        //echo $filename;exit;


                       // $picture = $videoid.".jpg";
                        $picture = $newfile.".jpg";
                    }
                }
                
                
            }
            if($picture){
                
//                $config['image_library'] = 'gd2';
//                $config['source_image'] = "images/videothumb/".$picture;
//                $config['new_image'] = "images/videothumb/".'1280X720-'.$picture;
//                $config['maintain_ratio'] = TRUE;
//                $config['width']         = 1280;
//                $config['height']       = 720;
//                $this->load->library('image_lib', $config);
//                $success = $this->image_lib->resize();
//                if($success){
//                    $this->image_lib->clear();
                
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = "images/videothumb/".$picture;
                    $config['new_image'] = "images/videothumb/".'285X160-'.$picture;
                    $config['maintain_ratio'] = False;
                    $config['width']         = 285;
                    $config['height']       = 160;
                    $this->load->library('image_lib', $config);
                    $this->image_lib->initialize($config);
                    $success = $this->image_lib->resize();
                    
                   
                    
//                }
            }
            
                //Prepare array of user data
                
                $time = date('H:i:s');

                //Pass user data to model
                if($video_id>0){
                    $seo_url_id = $this->WebService->setSEOURL($this->input->post('pricat'),$this->input->post('subcat'),$video_id,$this->input->post('videoname'),'edit');
//                   echo $picture;exit;
                    if(strlen($picture)>0){
                        $userData = array(
                            'cat_id' => $this->input->post('pricat'),
                            'subcat_id' => $this->input->post('subcat'),
                            'video_name' => $this->input->post('videoname'),
                            'video_url' => $this->input->post('videourl'),
                            'video_thumb' => $picture,
                            'video_desc' => $this->input->post('videodesc'),
                            'video_keywords' => $this->input->post('keywords'),
                            'rel_date' => $this->input->post('reldate').' '.$time,
                            'my_release' => $this->input->post('my_reldate')
                        );
                    }else{
                        $userData = array(
                            'cat_id' => $this->input->post('pricat'),
                            'subcat_id' => $this->input->post('subcat'),
                            'video_name' => $this->input->post('videoname'),
                            'video_url' => $this->input->post('videourl'),
                            'video_desc' => $this->input->post('videodesc'),
                            'video_keywords' => $this->input->post('keywords'),
                            'rel_date' => $this->input->post('reldate').' '.$time,
                            'my_release' => $this->input->post('my_reldate')
                            
                        );
                    }
                    
                    if($seo_url_id > 0){
                        $userData['seo_url_id'] = $seo_url_id;
                    }
                    
                    $updated = date('Y-m-d H:i:s');
                    
                    $userData['updated'] = $updated;
                    
                    $insertUserData = $this->adm_home_model->editVideoData($video_id,$userData);
                }else{
                    $created = date('Y-m-d H:i:s');
                    $updated = date('Y-m-d H:i:s');
                    
                    $userData = array(
                        'cat_id' => $this->input->post('pricat'),
                        'subcat_id' => $this->input->post('subcat'),
                        'video_name' => $this->input->post('videoname'),
                        'video_url' => $this->input->post('videourl'),
                        'video_thumb' => $picture,
                        'video_desc' => $this->input->post('videodesc'),
                        'video_keywords' => $this->input->post('keywords'),
                        'rel_date' => $this->input->post('reldate').' '.$time,
                        'my_release' => $this->input->post('my_reldate'),
                        'seo_url_id' => 0,
                        'created' => $created,
                        'updated' => $updated
                    );
                    
                    
                    
//                    $userData['created'] = $created;
//                    $userData['updated'] = $created;
                   
                    $insertUserData = $this->adm_home_model->addVideoData($userData);
                }
                

                //Storing insertion status message.
                    if($insertUserData){
                        if($video_id>0){
                            $insert_id = $video_id;
                        }else{
//                            $insert_id = $this->db->insert_id();
                            $insert_id = $insertUserData;
                            $insertUserData = $this->adm_home_model->editVideoData($insert_id,$userData);
                            $seo_url_id = $this->WebService->setSEOURL($this->input->post('pricat'),$this->input->post('subcat'),$insert_id,$this->input->post('videoname'),'add');
                            
                            $userData = array(
                                'seo_url_id' => $seo_url_id,
                                'updated' => $updated
                            );
                    
                    
                            $insertUserData = $this->adm_home_model->editVideoData($insert_id,$userData);
                            
                        }
                        $movieid = $this->input->post('movies');
                        
                        $this->adm_home_model->addVideoMapMovie($insert_id,$movieid);
                        
                        $castid = $this->input->post('cast');
                        $this->adm_home_model->addVideoMapCast($insert_id,$castid);
                        $singerid = $this->input->post('singer');
                        $this->adm_home_model->addVideoMapSinger($insert_id,$singerid);
                        $musicid = $this->input->post('music');
                        $this->adm_home_model->addVideoMapMusic($insert_id,$musicid);
                        $directorid = $this->input->post('director');
                        $this->adm_home_model->addVideoMapDirector($insert_id,$directorid);
                        $relid = $this->input->post('rel');
                        $this->adm_home_model->addVideoMapRelesed($insert_id,$relid);
                        
                       
                        
                        if($video_id>0){
                            $this->session->set_flashdata('msg', 'data have been updated successfully.');
                        }else{
                            $this->session->set_flashdata('msg', 'data have been added successfully.');
                        }
                    }else{
                        $this->session->set_flashdata('msg', 'Some problems occured, please try again.');
                    }
//                }else{
//                    $this->session->set_flashdata('error_msg', 'Some problems occured, please try again.');
//                }
            }
            $this->Adm_sitemap_model->generatePost();
            
            if($this->input->post('pricat') == 1){
            
                $this->Adm_sitemap_model->updateSubCatURl('MovieTrailer',$this->input->post('pricat'),$this->input->post('subcat'));
            }else if($this->input->post('pricat') == 2){
                $this->Adm_sitemap_model->updateSubCatURl('MovieTrailer',$this->input->post('pricat'),$this->input->post('subcat'));
            }
        //Form for adding user data
        //$this->load->view('users/add');
       // $this->index();
            if($video_id>0){
                redirect('AddVideo/editTrailer/'.$video_id);
            }else{
                redirect('AddVideo');
            }
        
    }
    
    

    

    public function getsubcat(){
        $pri_id = $this->input->post('pri_id');
        $this->data['subcat'] = $this->adm_home_model->getSubCat($pri_id);
        
        $this->load->view('ajax_getsubcat',$this->data);
    }

    
    public function editTrailer($video_id){
           
        
        $this->data['controller']=$this;
        $this->data['video_data'] =  $this->adm_home_model->get_video_by_id($video_id);
        
                
        $this->data['maincat'] = $this->adm_home_model->getAllMainCat();
        
        //print_r($this->data['video_data'] );exit();
        $this->load->view('header_footer/header');
        $this->load->view('header_footer/sidebar');
        $this->load->view('adm_edit_video',$this->data);
        $this->load->view('header_footer/footer');
        
    }
    
     public function getSeoUrl($seo_id){
//        echo '$seo_id';exit;
//        echo $table_nmae;exit;
        $final_url = $this->WebService->getSeoUrl('video_url',$seo_id);
        return $final_url;
    }
    
    public function viewTrailer(){
         $this->data['controller']=$this;
        $this->data['video_data'] =  $this->adm_home_model->get_video_by_id($this->uri->segment(3));
        
                
        $this->data['maincat'] = $this->adm_home_model->getAllMainCat();
        
        
        $this->load->view('header_footer/header');
        $this->load->view('header_footer/sidebar');
        $this->load->view('adm_view_video',$this->data);
    }

        public function getSubCategory($maincat_id){
        return $this->WebService->getSubCategory($maincat_id);
    }
    //Edit Video
    public function getEditMovies($video_id){
        
        return $this->WebService->getVideoMapMovie($video_id);
                
       
    }
    
    //Add video
    public function getMovies(){
        $d = array();
        $data['result'] = $this->db->get_where('movie'); 
        foreach ($data['result']->result_array() as $value) {
            $d[] = array('value' => $value['id'] ,'text' => $value['movie_name']);
        }
        $json = json_encode($d);
        echo $json;
    }
    
    //Edit Video
    public function getEditCast($video_id){
        return $this->WebService->getVideoMapCast($video_id);
    }
    
    //Add video
    public function getCast(){
                
        $d = array();

        $data['result'] = $this->db->get('cast'); 
                  
        foreach ($data['result']->result_array() as $value) {
       
             $d[] = array('value' => $value['id'] ,'text' => $value['cast_name']);
        }
      
        $json = json_encode($d);
        echo $json;
    }
    
    
    //Edit Video
    public function getEditSinger($video_id){
        return $this->WebService->getVideoMapSinger($video_id);
    }
    
    //Add Video
    public function getSinger(){
                
        $d = array();

        $data['result'] = $this->db->get('singer'); 
                  
        foreach ($data['result']->result_array() as $value) {
       
             $d[] = array('value' => $value['id'] ,'text' => $value['singer_name']);
        }
      
        $json = json_encode($d);
        echo $json;
    }
    
    //Edit Video
    public function getEditMusic($video_id){
        return $this->WebService->getVideoMapMusic($video_id);
    }
    
    //Add Video
    public function getMusic(){
                
        $d = array();

        $data['result'] = $this->db->get('music'); 
                  
        foreach ($data['result']->result_array() as $value) {
       
             $d[] = array('value' => $value['id'] ,'text' => $value['music_name']);
        }
      
        $json = json_encode($d);
        echo $json;
    }
    
    //Edit Video
    public function getEditDirector($video_id){
        return $this->WebService->getVideoMapDirector($video_id);
    }
    //Add Video
    public function getDirector(){
                
        $d = array();

        $data['result'] = $this->db->get('director'); 
                  
        foreach ($data['result']->result_array() as $value) {
       
             $d[] = array('value' => $value['id'] ,'text' => $value['director_name']);
        }
      
        $json = json_encode($d);
        echo $json;
    }
    
    //Edit Video
    public function getEditRelesedBy($video_id){
        return $this->WebService->getVideoMapRelBy($video_id);
    }
    //Add Video
    public function getRelesedBy(){
                
        $d = array();

        $data['result'] = $this->db->get('released_by'); 
                  
        foreach ($data['result']->result_array() as $value) {
       
             $d[] = array('value' => $value['id'] ,'text' => $value['rel_by_name']);
        }
      
        $json = json_encode($d);
        echo $json;
    }
    
}
