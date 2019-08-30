<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of My404
 *
 * @author yoo
 */
class My404 extends CI_Controller{
    //put your code here
    
    public function __construct() {
        parent::__construct();
      
        $this->load->library('session');
        $this->load->model('adm_home_model');
        $this->load->model('WebService');
        
    }
    
    public function index(){
        $this->output->set_status_header('404'); 
        
        $this->data['side_big_adv'] = $this->WebService->getAdsense(300,600);
        $this->data['side_adv'] = $this->WebService->getAdsense(300,250);
        
        //Footer links
        $this->data['top_actors'] = $this->adm_home_model->getTopActors();
        $this->data['top_singers'] = $this->adm_home_model->getTopSingers();
        
        $this->data['trailer_cat'] = $this->adm_home_model->getSubCat(1);
        $this->data['video_cat'] = $this->adm_home_model->getSubCat(2);
        
         $this->data['controller']=$this;
        
        $this->load->view('header_footer/front_header',$this->data);
        $this->load->view('error_404',$this->data);//loading in custom error view
        $this->load->view('header_footer/front_footer',$this->data);
    }
    
    public function getSeoUrl($seo_id){
//        echo '$seo_id';exit;
//        echo $table_nmae;exit;
        $final_url = $this->WebService->getSeoUrl('video_url',$seo_id);
        return $final_url;
    }
    
}
