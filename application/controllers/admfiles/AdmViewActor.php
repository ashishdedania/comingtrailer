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
class AdmViewActor extends MY_Controller{
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('WebService');
        $this->load->model('adm_data_model');
    }
    
    public function index(){
        
        $this->data['actors'] = $this->getAllActors();
        $this->data['is_delete'] = 'no';
        $this->data['uri_page'] = $this->router->fetch_class();
        
        $query = $this->db->get_where('seo_individual',array('individual' => 'C')); 
        $this->data['seo'] = $query->row_array();
        $this->data['year_list'] = $this->WebService->getMinYear('cast','created');
        
        $this->load->view('header_footer/header');
        $this->load->view('header_footer/sidebar');
        $this->load->view('adm_view_actor',$this->data);
        $this->load->view('header_footer/footer');
        
    }
    
    public function getAllActors($status = 0){
        return $this->adm_data_model->getAllData('cast','cast_id','cast_name',$status);
    }
    
     function deleted(){
        
         $this->data['actors'] = $this->getAllActors(1);
         $this->data['is_delete'] = 'yes';
        
          $this->data['uri_page'] = $this->router->fetch_class();
         $query = $this->db->get_where('seo_individual',array('individual' => 'C')); 
        $this->data['seo'] = $query->row_array();
         
        $this->load->view('header_footer/header');
        $this->load->view('header_footer/sidebar');
        $this->load->view('adm_view_actor',$this->data);
        $this->load->view('header_footer/footer');
        
        
    }
    
    public function editActor($id,$mstp='m'){
        $this->data['controller'] = $this;
        $individual_map = ['m','t','s','p']; // s => song, t=>trailer 
        $total_mstp = array();
        $this->data['mstp'] = $mstp;
        $this->data['actors'] = $this->adm_data_model->getRowData('cast',$id);
        $this->data['actors_data'] = '';
        foreach($individual_map as $key => $val){
            $individual_mstp_data = json_decode($this->WebService->getIndividualData($id,'cast',$val));
            if($val == $mstp){
                $this->data['actors_data'] = $individual_mstp_data;
            }
            $total_mstp[$val] = count($individual_mstp_data);
        }
        $this->data['total_mstp'] = $total_mstp;
        //--> Get data(trailer, song, poster) of individual 
        if($mstp == 's' || $mstp == 't'){
            foreach($this->data['actors_data'] as $key => $val){
                $this->data['actors_data'][$key]->table_data =  $this->WebService->getIndividualTrailer($val->cat_id,$val->subcat_id,'','',$val->mstp_id);
            }
            $this->data['year_list'] = $this->WebService->getMinYear('video');
        }else if($mstp == 'p'){
            //print_r($this->data['actors_data']);exit;
            foreach($this->data['actors_data'] as $key => $val){
                $this->data['actors_data'][$key]->table_data =  $this->WebService->getIndividualPoster($val->subcat_id,'','',$val->mstp_id);
            }
            $this->data['year_list'] = $this->WebService->getMinYear('poster');
        }else{
            $this->data['year_list'] = $this->WebService->getMinYear('movie');
        }
        $this->load->view('header_footer/header');
        $this->load->view('header_footer/sidebar');
        $this->load->view('adm_edit_actor',$this->data);
    }
    
     public function getSeoUrl($seo_id){
//        echo '$seo_id';exit;
//        echo $table_nmae;exit;
        $final_url = $this->WebService->getSeoUrl('video_url',$seo_id);
        return $final_url;
    }
    
}
