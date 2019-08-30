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
class AdminVideo extends MY_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('WebService');
        $this->load->model('adm_home_model');
    }
    public function index($cat_id = 2,$subcat_id=0){
        $this->data['cat'] = $this->adm_home_model->getSubCat($cat_id);
        $this->data['controller'] = $this;
        $this->data['cat_id'] = $cat_id;
        $this->data['subcat_id'] = $subcat_id;
        $this->data['year_list'] = $this->WebService->getMinYear('video');
        $this->data['uri_page'] = $this->router->fetch_class();
        $this->data['id_text'] = 'Video Songs';
        
        $this->data['json'] = $this->WebService->getAllTrailer($cat_id,$subcat_id,'','',0);
        
//        if($subcat_id){ 
            $this->db->where('sub_category_id', $subcat_id); 
//        }else $this->db->where('sub_category_id IS NULL');
        $query = $this->db->get_where('seo',array('category_id' => $cat_id)); 
        $this->data['seo'] = $query->row_array();
        
        $this->load->view('header_footer/header');
        $this->load->view('header_footer/sidebar');
        $this->load->view('adm_home',$this->data);
        $this->load->view('header_footer/footer');
    }
    public function getAllTrailer($cat_id, $subcat_id){
        return $this->WebService->getAllTrailer($cat_id,$subcat_id,'','');
    }
    public function getSeoUrl($seo_id){
//        echo '$seo_id';exit;
//        echo $table_nmae;exit;
        $final_url = $this->WebService->getSeoUrl('video_url',$seo_id);
        return $final_url;
    }
    public function deleteStatus($id,$status,$table = 'video'){
        $this->WebService->deleteStatus($id,$status,$table);
        redirect($this->router->fetch_class());
    }
    
    public function delete($id,$seo_url_id,$table = 'video'){
        
        //echo $image_path;exit;
        
        
        
        $this->adm_home_model->delete($id,$table,$seo_url_id,2);
        
        redirect('AdminVideo/deleted/video');
    }
    
    public function deleted($table,$cat_id = 2,$subcat_id=0){
        $this->data['cat'] = $this->adm_home_model->getSubCat($cat_id);
        $this->data['controller']=$this;
        $this->data['cat_id']=$cat_id;
        $this->data['subcat_id']=$subcat_id;
        $this->data['uri_page'] = $this->router->fetch_class();
        $this->data['id_text'] = 'Video Songs';
        
        $this->data['json'] = $this->WebService->getAllTrailer($cat_id,$subcat_id,'','',1);
        $this->load->view('header_footer/header');
        $this->load->view('header_footer/sidebar');
        $this->load->view('deleted_video',$this->data);
}
}
