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
class AddPoster extends MY_Controller{
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $this->load->model('adm_home_model');
        $this->load->model('WebService');
        $this->load->model('adm_poster_model');
        $this->load->model('adm_movie_model');
        $this->load->model('Adm_sitemap_model');
        
    }
    
    public function index(){
        
        $this->data['subcat'] = $this->getSubcat();
        
        $this->load->view('header_footer/header');
        $this->load->view('header_footer/sidebar');
        $this->load->view('adm_poster',$this->data);
        $this->load->view('header_footer/footer');
        
    }
   
      
    
    function add(){
        
        if($this->input->post('submit')){
            
           
            $video_id = $this->uri->segment(3);
            $time = date('H:i:s');
                //Prepare array of user data
                if($video_id>0){
                    $seo_url_id = $this->WebService->setSEOURLPoster($this->input->post('subcat'),$video_id,$this->input->post('name'),'edit');
                    
                    
                    
                    if($seo_url_id>0){
                        $userData = array(
                            'subcat_id' => $this->input->post('subcat'),
                            'poster_name' => $this->input->post('name'),
                            'poster_desc' => $this->input->post('desc'),
                            'poster_keywords' => $this->input->post('keywords'),
                            'rel_date' => $this->input->post('reldate').' '.$time,
                            'my_release' => $this->input->post('my_reldate'),
                            'seo_url_id' => $seo_url_id
                        );
                    }else{
                        $userData = array(
                            'subcat_id' => $this->input->post('subcat'),
                            'poster_name' => $this->input->post('name'),
                            'poster_desc' => $this->input->post('desc'),
                            'poster_keywords' => $this->input->post('keywords'),
                            'rel_date' => $this->input->post('reldate').' '.$time,
                            'my_release' => $this->input->post('my_reldate')
                        );
                    }
                    
                }else{
                   $seo_url_id = 0;
                   
                   $userData = array(
                        'subcat_id' => $this->input->post('subcat'),
                        'poster_name' => $this->input->post('name'),
                        'poster_desc' => $this->input->post('desc'),
                        'poster_keywords' => $this->input->post('keywords'),
                        'rel_date' => $this->input->post('reldate').' '.$time,
                        'my_release' => $this->input->post('my_reldate'),
                        'seo_url_id' => $seo_url_id
                    );
                   
                }
                
                

                //Pass user data to model
                if($video_id>0){
                	$updated = date('Y-m-d H:i:s');
                    
                    $userData['updated'] = $updated;
                
                    $insertUserData = $this->adm_poster_model->editPosterData($video_id,$userData);
                }else{
                
                $created = date('Y-m-d H:i:s');
                    $updated = date('Y-m-d H:i:s');
                    
                    
                    
                    $userData['created'] = $created;
                    $userData['updated'] = $updated;
                
                    $insertUserData = $this->adm_poster_model->addPosterData($userData);
                }
                

                //Storing insertion status message.
                    if($insertUserData){
                        if($video_id>0){
                            $insert_id = $video_id;
                        }else{
                            $insert_id = $this->db->insert_id();

                            $seo_url_id = $this->WebService->setSEOURLPoster($this->input->post('subcat'),$insert_id,$this->input->post('name'),'add');
                            
                            $userData = array(
                            'seo_url_id' => $seo_url_id,
                            'updated'=> $updated
                        );
                    
                    
                            $insertUserData = $this->adm_poster_model->editPosterData($insert_id,$userData);
                        }
                        $movieid = $this->input->post('movies');
                        
                        $this->adm_poster_model->addPosterMapMovie($insert_id,$movieid);
                        
                        $castid = $this->input->post('cast');
                        $this->adm_poster_model->addPosterMapCast($insert_id,$castid);
                        
                        $directorid = $this->input->post('director');
                        $this->adm_poster_model->addPosterMapDirector($insert_id,$directorid);
                        
                        
                     $number_of_files = sizeof($_FILES['picture']['name']);
            
                     //echo $number_of_files;exit;
                     $files = $_FILES['picture'];
                     //Check whether user upload picture
                     if($number_of_files>0){
                        if($video_id>0){
                            $counts = $this->adm_poster_model->get_poster_image_count($video_id);
                        }else{
                            $counts = 0;
                        }
                         for ($i = 0; $i < $number_of_files; $i++) {
                             if(!empty($_FILES['picture']['name'][$i])){
                                 $config['upload_path'] = 'images/poster/';
                                 $config['allowed_types'] = 'jpg|jpeg|png|gif|JPG';
                                 $config['file_name'] = $_FILES['picture']['name'][$i];
                                 //$config['file_name'] = $this->input->post('videoid');
//                                  $config['file_name'] = $this->input->post('name');
                                  
                                  $config['file_name'] = str_replace(" ", "-", trim($this->input->post('name')));
                                $config['file_name'] = preg_replace('/[^A-Za-z0-9\-]/', '', $config['file_name']);

                                $config['file_name'] = preg_replace('/-+/', '-', $config['file_name']);
                                  
                                 $_FILES['uploadedimage']['name'] = $files['name'][$i];
                                 $_FILES['uploadedimage']['type'] = $files['type'][$i];
                                 $_FILES['uploadedimage']['tmp_name'] = $files['tmp_name'][$i];
                                 $_FILES['uploadedimage']['error'] = $files['error'][$i];
                                 $_FILES['uploadedimage']['size'] = $files['size'][$i];
                                 
                                 //Load upload library and initialize configuration
                                 $this->load->library('upload',$config);
                                 $this->upload->initialize($config);
                                 if($this->upload->do_upload('uploadedimage')){
                                     $uploadData = $this->upload->data();
                                    $picture = $uploadData['file_name'];
                                     //--> file resize -- start
                                    
                                     if($picture && $i == 0){
                                        $config['image_library'] = 'gd2';
                                        $config['source_image'] = "images/poster/".$picture;
                                        $config['new_image'] = "images/poster/".'285Xheight-'.$picture;
                                        $config['quality'] = "100%";
                                        $config['maintain_ratio'] = TRUE;
                                        $config['width']         = 285;
                                       // $config['height']       = 720;
                                        $this->load->library('image_lib', $config);
                                        $success = $this->image_lib->resize();
                                        if($success){
                                            $this->image_lib->clear();
                                            $config['image_library'] = 'gd2';
                                            $config['source_image'] = "images/poster/285Xheight-".$picture;
                                            $config['new_image'] = "images/poster/".'285X160-'.$picture;
                                            $config['quality'] = "100%";
                                            $config['maintain_ratio'] = FALSE;
                                            $config['width']         = 285;
                                            $config['height']       = 160;
                                            $config['x_axis'] = '0';
                                            $config['y_axis'] = '0';
                                            $this->image_lib->initialize($config);
                                            $this->image_lib->resize();
                                            $success = $this->image_lib->crop();
//                                            echo ''.$success;
                                        }
                                    }else{
                                        $this->image_lib->clear();
                                        $config['image_library'] = 'gd2';
                                        $config['source_image'] = "images/poster/".$picture;
                                        $config['new_image'] = "images/poster/".'285Xheight-'.$picture;
                                        $config['quality'] = "100%";
                                        $config['maintain_ratio'] = TRUE;
                                        $config['width']         = 285;
                                        $config['height']       = 0;
//                                        $this->load->library('image_lib', $config);
                                        $this->image_lib->initialize($config);
                                        $success = $this->image_lib->resize();
                                        
//                                        echo ''.$success.'images/poster/'.'285XAny-'.$picture;;
//                                        exit;
                                    }   
                                     //--> File Resize -- end
                                    $poster = 0;$firstlook = 0;$wallpaper = 0;
                                    //if(isset($this->input->post('poster_type'))){
                                    $image_new_id = $_POST["image_new_id"][$i];
                                        $poster_type = $this->input->post('poster_type_'.$image_new_id);
//                                    }
//                                    else{
//                                        $poster_type = '1';
//                                    }
                                    
//                                    if($poster_type == '1'){
//                                        $poster = ($i+1);
//                                    }else if($poster_type == '2'){
//                                        $firstlook = ($i+1);
//                                    }else{
//                                        $wallpaper = ($i+1);
//                                    }
                                    
                                        $counts = $counts + 1;
                                        
                                     $userData = array(
                                        'poster_id' => $insert_id,
                                        'poster_image' => $picture,
                                        'display_order' => ($counts),
                                         'poster_type' => $poster_type,
                                         'firstlook_order' => $firstlook,
                                         'wallpaper_order' => $wallpaper
                                    );
                                     
                                     $insertUserData = $this->adm_poster_model->addPosterImage($userData);
                                     
                                 }else{
                                     $picture = '';
                                 }
                             }else{

                                 $picture = '';
                             }
                         }
                        
                     }
                        
                    if(isset($_POST["image_id"]) && is_array($_POST["image_id"])){  
                        $capture_field_vals ="";
                        foreach($_POST["image_id"] as $key => $text_field){
                            //$capture_field_vals .= $text_field .", ";
                            $capture_field_vals = $text_field;
                            //echo $capture_field_vals;
                            //echo $_POST['poster_type_'.$capture_field_vals];
                            $image_id = $capture_field_vals;
                            $poster_type = $_POST['poster_type_'.$capture_field_vals];
                            $userData = array(
                                        
                                         'poster_type' => $poster_type,
                                         
                                    );
                            $insertUserData = $this->adm_poster_model->updatePosterType($userData,$image_id);
                        }

                    }
                        
                        
                        if($video_id>0){
                            $this->session->set_flashdata('msg', 'data have been updated successfully.');
                        }else{
                            $this->session->set_flashdata('msg', 'data have been added successfully.');

                        }
                    }else{
                        $this->session->set_flashdata('msg', 'Some problems occured, please try again.');
                    }
                
            }
        
        //Form for adding user data
        //$this->load->view('users/add');
       // $this->index();
            $this->Adm_sitemap_model->generatePost();
            $this->Adm_sitemap_model->updateSubCatURl('MoviePoster','3',$this->input->post('subcat'));
            if($video_id>0){
                redirect('AddPoster/editPoster/'.$video_id);

            }else{
                redirect('AddPoster');
            }
        
    }
    
    public function getSubcat(){
        return $this->adm_movie_model->getSubcat();
    }

    
    public function editPoster($poster_id){
        
        $this->data['controller']=$this;
        $this->data['poster_data'] =  $this->get_poster_by_id($poster_id);
        
                
        $this->data['subcat'] = $this->getSubcat();
        
        //print_r($this->data['poster_data']);exit;
        $this->load->view('header_footer/header');
        $this->load->view('header_footer/sidebar');
        $this->load->view('edit_poster',$this->data);
        $this->load->view('header_footer/footer');
        
    }
    
    public function getSeoUrl($seo_id){
//        echo '$seo_id';exit;
//        echo $table_nmae;exit;
        $final_url = $this->WebService->getSeoUrl('video_url',$seo_id);
        return $final_url;
    }
    
     public function viewPoster($video_id){
        
        $this->data['controller']=$this;
        $this->data['poster_data'] =  $this->get_poster_by_id($this->uri->segment(3));
        
                
        $this->data['subcat'] = $this->getSubcat();
        
        
        $this->load->view('header_footer/header');
        $this->load->view('header_footer/sidebar');
        $this->load->view('view_poster',$this->data);
        
    }
    
    function getImageRows($poster_id){
		$query = $this->db->order_by("display_order", "asc")->get_where('poster_img', array('poster_id' => $poster_id));
               // echo $query->num_rows();exit;
		if($query->num_rows() > 0){
//			foreach($query->result_array() as $value){
//				$result[] = array;
//			}
                    $result = $query->result_array();
		}else{
			$result = FALSE;
		}
		return $result;
	}
        
    function getFirstLookImageRows($poster_id){
		$query = $this->db->order_by("display_order", "asc")->get_where('poster_img', array('poster_id' => $poster_id,'poster_type' => 2));
               // echo $query->num_rows();exit;
		if($query->num_rows() > 0){
//			foreach($query->result_array() as $value){
//				$result[] = array;
//			}
                    $result = $query->result_array();
		}else{
			$result = FALSE;
		}
		return $result;
	}
        
    function getWallpaperImageRows($poster_id){
            $query = $this->db->order_by("display_order", "asc")->get_where('poster_img', array('poster_id' => $poster_id,'poster_type' => 3));
           // echo $query->num_rows();exit;
            if($query->num_rows() > 0){
//			foreach($query->result_array() as $value){
//				$result[] = array;
//			}
                $result = $query->result_array();
            }else{
                    $result = FALSE;
            }
            return $result;
    }
    
    public function get_poster_by_id($id = 0)
    {
        if ($id === 0)
        {
            $query = $this->db->get('poster');
            return $query->result_array();
        }
 
        $query = $this->db->get_where('poster', array('id' => $id));
        return $query->row_array();
    }

    function updateOrder(){
        $idArray = explode(",",$_POST['ids']);
        $type = $_POST['type'];
		$count = 1;
		foreach ($idArray as $id){
                    
                    //echo $id.'...'.$count;
                    $update_col = '';
                    if($type == 'poster'){
                        $update_col = 'display_order';
                    }else if($type == 'firstlook'){
                        $update_col = 'firstlook_order';
                    }else{
                        $update_col = 'wallpaper_order';
                    }
                    if($count == 1){
                       // echo  $id;exit;
                     // $data = $this->getImage($id);
                      
                      $firstimg = $this->getImage($id);  
                      //$firstimg = $data['poster_image'];
                        //echo $firstimg;exit;
                        if(true){
                            //$this->image_lib->clear();
                            $config['image_library'] = 'gd2';
                            $config['source_image'] = "images/poster/285Xheight-".$firstimg;
                            $config['new_image'] = "images/poster/".'285X160-'.$firstimg;
                            $config['quality'] = "100%";
                            $config['maintain_ratio'] = FALSE;
                            $config['width']         = 285;
                            $config['height']       = 160;
                            $config['x_axis'] = '0';
                            $config['y_axis'] = '0';
                            $this->load->library('image_lib', $config);
                            $this->image_lib->initialize($config);
                            $this->image_lib->resize();
                            $success = $this->image_lib->crop();
                            //echo $success;
                        }
                        
                    }
			$update = $this->db->query("UPDATE poster_img SET ".$update_col." = $count WHERE id = $id");
			$count ++;	
		}
                
		return TRUE;
	}
     
        function getImage($id){
            $this->db->select('*');
            $this->db->where('id',$id);
            $query = $this->db->get('poster_img');
            $image_path = '';
            foreach($query->result_array() as $value){
                $image_path = $value['poster_image'];
            }
            return $image_path;
        }
                
        function deleteImg(){
            $id = $_POST['ids'];
            $img = $_POST['img'];
            
//            $filename = $trailer->video_thumb_285;
            
            if(getimagesize('images/poster/285Xheight-'.$img)) {
                @unlink('images/poster/285Xheight-'.$img);
            }
//            echo 'images/poster/285x160-'.$img;exit;
            if(@getimagesize('images/poster/'.$img)) {
                
                @unlink('images/poster/'.$img);
            }
            if(getimagesize('images/poster/285X160-'.$img)) {
                @unlink('images/poster/285X160-'.$img);
            }
            
            $this->db->where('id', $id);
            $this->db->delete('poster_img');
            
        }


        //Edit Video
    public function getEditMovies($video_id){
        
        return $this->WebService->getPosterMapMovie($video_id);
    }
    
    //Edit Video
    public function getEditCast($video_id){
        return $this->WebService->getPosterMapCast($video_id);
    }
    
    //Edit Video
    public function getEditDirector($video_id){
        return $this->WebService->getPosterMapDirector($video_id);
    }
    
   
    
    
    
    
    
    
}
