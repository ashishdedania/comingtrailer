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
class AdmViewPoster extends MY_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('WebService');
        $this->load->model('adm_home_model');
        $this->load->model('adm_poster_model');
        $this->load->model('adm_movie_model');
    }
    public function index($cat_id = 3,$subcat_id=0){
//        $this->data['cat'] = $this->adm_home_model->getSubCat($cat_id);
        $this->data['subcat'] = $this->adm_home_model->getSubCat($cat_id);
//        $this->data['subcat'] = $this->getSubcat();
        $this->data['controller'] = $this;
        $this->data['cat_id']=$cat_id;
        $this->data['subcat_id']=$subcat_id;
        
        $this->data['uri_page'] = $this->router->fetch_class();
        $this->data['id_text'] = 'Poster';
        
        $this->data['poster'] = $this->getAllPoster($subcat_id);
        $this->data['year_list'] = $this->WebService->getMinYear('poster');
        //if($subcat_id){ 
            $this->db->where('sub_category_id', $subcat_id); 
       // }else $this->db->where('sub_category_id IS NULL');
        $query = $this->db->get_where('seo',array('category_id' => $cat_id)); 
        $this->data['seo'] = $query->row_array();
        
        $this->load->view('header_footer/header');
        $this->load->view('header_footer/sidebar');
        $this->load->view('adm_view_poster',$this->data);
        $this->load->view('header_footer/footer');
    }
    
    public function getSeoUrl($seo_id){
//        echo '$seo_id';exit;
//        echo $table_nmae;exit;
        $final_url = $this->WebService->getSeoUrl('video_url',$seo_id);
        return $final_url;
    }
    
    public function getAllPoster($subcat_id){
        return $this->WebService->getAllPoster($subcat_id,'','');
    }
    
    public function getSubcat(){
        return $this->adm_movie_model->getSubcat();
    }
    
    public function deleteStatus($id,$status,$table = 'poster'){
        $this->WebService->deleteStatus($id,$status,$table);
        redirect($this->router->fetch_class());
    }
    
    public function delete($id,$table = 'poster',$seo_url_id = 0){
        $this->adm_home_model->delete($id,$table,$seo_url_id,3);
        redirect('AdmViewPoster/deleted/poster');
    }
    
    public function deleted($table,$cat_id = 3,$subcat_id=0){
//        $this->data['cat'] = $this->adm_home_model->getSubCat($cat_id);
        $this->data['subcat'] = $this->adm_home_model->getSubCat($cat_id);
//        $this->data['subcat'] = $this->getSubcat();
        $this->data['controller'] = $this;
        $this->data['cat_id']=$cat_id;
        $this->data['subcat_id']=$subcat_id;
        
        $this->data['uri_page'] = $this->router->fetch_class();
        $this->data['id_text'] = 'Poster';
        
        $this->data['poster'] = $this->WebService->getAllPoster($subcat_id,'','',1);
        
        $this->load->view('header_footer/header');
        $this->load->view('header_footer/sidebar');
        $this->load->view('deleted_poster',$this->data);
    }
    
    public function searchTrailer($cat_id,$subcat_id){
        if(!$this->input->is_ajax_request()){
            exit('No direct script access allowed');
        }elseif(!$cat_id){
            echo json_encode(array('status'=>'1','message'=>'Required Parameters are missing'));
        }else{
            echo $this->data['json'] = $this->WebService->getAllPoster($subcat_id);
        }
    }
}
