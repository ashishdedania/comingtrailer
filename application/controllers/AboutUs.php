<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of About Us
 *
 * @author yoo
 */
class AboutUs extends CI_Controller{
    //put your code here
    
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->model('adm_home_model');
        $this->load->model('WebService');
        require_once('twitteroauth.php');
        $this->load->model('Seo_data_model');
    }
    
    public function index($share_code=''){
		$this->data['content'] = $this->adm_home_model->getAboutUsData();
        $link = base_url();
        $type = 'about us';
        
        $this->data['individual_detail'] = $this->db->get_where('seo_individual',array('individual'=>'ABUS'))->row_array();
        
        $link = base_url('AboutUs');
        $type = 'AboutUs';
        $this->data['seo_data'] = $this->Seo_data_model->getSEO($type,$this->data['individual_detail'],$link);
        
        //Footer links
        $this->data['top_actors'] = $this->adm_home_model->getTopActors();
        $this->data['top_singers'] = $this->adm_home_model->getTopSingers();
        
        $this->data['trailer_cat'] = $this->adm_home_model->getSubCat(1);
        $this->data['video_cat'] = $this->adm_home_model->getSubCat(2);
        
        $this->data['controller']=$this;
        
        $this->load->view('header_footer/front_header',$this->data);
		$this->load->view('about_us',$this->data);
        //$this->load->view('about_us');
        $this->load->view('header_footer/front_footer',$this->data);
    }
    
    public function getSeoUrl($seo_id){
//        echo '$seo_id';exit;
//        echo $table_nmae;exit;
        $final_url = $this->WebService->getSeoUrl('video_url',$seo_id);
        return $final_url;
    }
}
