<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Home
 *
 * @author yoo
 */
class AdminHome extends MY_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('WebService');
        $this->load->model('adm_home_model');
    }
    
    public function index($cat_id = 1,$subcat_id=0){
       
        $this->data['cat'] = $this->adm_home_model->getSubCat($cat_id);
        $this->data['controller']=$this;
        $this->data['cat_id']=$cat_id;
        $this->data['subcat_id']=$subcat_id;
        $this->data['uri_page'] = $this->router->fetch_class();
        $this->data['id_text'] = 'Trailer';
        
        //fetch SEO Data
        //if($subcat_id){ 
            $this->db->where('sub_category_id', $subcat_id); 
        //}else $this->db->where('sub_category_id IS NULL');
        $query = $this->db->get_where('seo',array('category_id' => $cat_id)); 
        $this->data['seo'] = $query->row_array();
        $this->data['year_list'] = $this->WebService->getMinYear('video');
        $this->data['json'] = $this->WebService->getAllTrailer($cat_id,$subcat_id,'','');
        $this->load->view('header_footer/header');
        $this->load->view('header_footer/sidebar');
        $this->load->view('adm_home',$this->data);
        $this->load->view('header_footer/footer');
    }
    
    public function getAllTrailer($cat_id,$subcat_id){
       
        $cat_id = $this->uri->segment(3);
        $subcat_id = $this->uri->segment(4);
        //echo $this->uri->segment(4);exit;
        $this->data['cat'] = $this->adm_home_model->getSubCat(1);
        $this->data['controller']=$this;
        $this->data['cat_id']='1';
        $this->data['json'] = $this->WebService->getAllTrailer($cat_id,$subcat_id,'','');
        $this->load->view('header_footer/header');
        $this->load->view('header_footer/sidebar');
        $this->load->view('adm_home',$this->data);
    }
    
    public function getSeoUrl($seo_id){
//        echo '$seo_id';exit;
//        echo $table_nmae;exit;
        $final_url = $this->WebService->getSeoUrl('video_url',$seo_id);
        return $final_url;
    }
    
    public function getUri(){
        //echo 'test';
        echo $this->uri->segment(4);exit;
    }
    
    public function deleteStatus($id,$status,$table = 'video'){
        $this->WebService->deleteStatus($id,$status,$table);
        
        redirect($this->router->fetch_class());
    }
    
    public function delete($id,$seo_url_id,$table = 'video'){
//        echo $image_path;
//        echo ''.str_replace(base_url(), '', ''.$image_path);exit;
        
       
        
//        echo 'deleted';exit;
        $this->adm_home_model->delete($id,$table,$seo_url_id,1);
        redirect('AdminHome/deleted/video');
    }
    
    public function deleted($table,$cat_id = 1,$subcat_id=0){
        $this->data['cat'] = $this->adm_home_model->getSubCat(1);
        $this->data['controller']=$this;
        $this->data['cat_id']=$cat_id;
        $this->data['subcat_id']=$subcat_id;
        $this->data['uri_page'] = $this->router->fetch_class();
        $this->data['id_text'] = 'Trailer';
        
        $this->data['json'] = $this->WebService->getAllTrailer($cat_id,$subcat_id,'','',1);
        $this->load->view('header_footer/header');
        $this->load->view('header_footer/sidebar');
        $this->load->view('deleted_video',$this->data);
    }
    
    public function searchTrailer($cat_id,$subcat_id){
        if(!$this->input->is_ajax_request()){
            exit('No direct script access allowed');
        }elseif(!$cat_id){
            echo json_encode(array('status'=>'1','message'=>'Required Parameters are missing'));
        }else{
            echo $this->data['json'] = $this->WebService->getAllTrailer($cat_id,$subcat_id,'','');
        }
    }
}
