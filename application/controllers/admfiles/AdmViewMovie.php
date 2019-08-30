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
class AdmViewMovie extends MY_Controller{
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('WebService');
        $this->load->model('adm_movie_model');
    }
    
    public function index($id = 0){
        
        $this->data['subcat'] = $this->getSubcat();
        $this->data['controller'] = $this;
        
        $this->data['uri_page'] = $this->router->fetch_class();
      //  $this->data['uri_cat_id'] = $this->uri->segment(3);
        $this->data['uri_subcat_id'] = $id;
        $this->data['id_text'] = 'Movie';
        
        
        $this->data['movie'] = $this->getAllMovie($id);
//        if($id){ 
//            $this->db->where('sub_category_id', $id); 
//        }else $this->db->where('sub_category_id IS NULL');
        
        $query = $this->db->get_where('movie_seo',array('sub_category_id' => $id)); 
       
        $this->data['seo'] = $query->row_array();
        
        $this->data['year_list'] = $this->WebService->getMinYear('movie');
        //print_r($this->data['movie']);exit;
        $this->load->view('header_footer/header');
        $this->load->view('header_footer/sidebar');
        $this->load->view('adm_view_movie',$this->data);
        $this->load->view('header_footer/footer');
        
    }
    
    public function deleted($table,$id = 0 ){
        $this->data['subcat'] = $this->getSubcat();
        $this->data['controller'] = $this;
        
        $this->data['uri_page'] = $this->router->fetch_class();
      //  $this->data['uri_cat_id'] = $this->uri->segment(3);
        $this->data['uri_subcat_id'] = $id;
        $this->data['id_text'] = 'Movie';
        
        $this->data['movie'] = $this->getAllMovie($id,1);
        //print_r($this->data['movie']);exit;
        $this->load->view('header_footer/header');
        $this->load->view('header_footer/sidebar');
        $this->load->view('deleted_movie',$this->data);
    }

    public function getAllMovie($subcat_id,$status = 0){
        return $this->adm_movie_model->getAllData('movie','movie_id','movie_name',$subcat_id,$status);
    }
    
    public function edit($id,$mstp='t'){
        $individual_map = ['t','s','p']; // s => song, t=>trailer 
        $total_mstp = array();
        //$id = $this->uri->segment(3);
        $this->data['subcat'] = $this->getAllSubcat();
        $this->data['actors'] = $this->adm_movie_model->getRowData('movie',$id);
        $this->data['controller'] = $this;
        $this->data['mstp'] = $mstp;
        $this->data['actors_data'] = '';
        foreach($individual_map as $key => $val){
            $individual_mstp_data = json_decode($this->WebService->getIndividualData($id,'movie',$val));
            if($val == $mstp){
                $this->data['actors_data'] = $individual_mstp_data;
            }
            $total_mstp[$val] = count($individual_mstp_data);
        }
        $this->data['total_mstp'] = $total_mstp;
        //--> Get data(trailer, song, poster) of individual 
        if($mstp == 's' || $mstp == 't'){
            //print_r($this->data['actors_data']);exit;
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
        }
        $this->load->view('header_footer/header');
        $this->load->view('header_footer/sidebar');
        $this->load->view('adm_edit_movie',$this->data);
        $this->load->view('header_footer/footer');
    }
    
    public function getSeoUrl($seo_id){
//        echo '$seo_id';exit;
//        echo $table_nmae;exit;
        $final_url = $this->WebService->getSeoUrl('video_url',$seo_id);
        return $final_url;
    }
    
    public function getSubcat(){
        return $this->adm_movie_model->getMovieSubcat();
        //return $this->adm_movie_model->getSubcat();
    }
    
    public function getAllSubcat(){
        return $this->adm_movie_model->getSubcat();
    }
    
    //Edit Video
    public function getEditCast($video_id){
        return $this->WebService->getMovieMapCast($video_id);
    }
    
        
    //Edit Video
    public function getEditSinger($video_id){
        return $this->WebService->getMovieMapSinger($video_id);
    }
    
       
    //Edit Video
    public function getEditMusic($video_id){
        return $this->WebService->getMovieMapMusic($video_id);
    }
    
    
    
    //Edit Video
    public function getEditDirector($video_id){
        return $this->WebService->getMovieMapDirector($video_id);
    }
    
}
