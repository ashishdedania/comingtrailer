<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdmAboutUs
 *
 * @author yoo
 */

class AdmAboutUs extends MY_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('adm_home_model');
    }
    public function index(){
        
        $this->data['content'] = $this->adm_home_model->getAboutUsData();
        
         $this->data['uri_page'] = $this->router->fetch_class();
         $query = $this->db->get_where('seo_individual',array('individual' => 'ABUS')); 
        $this->data['seo'] = $query->row_array();
        
        $this->load->view('header_footer/header');
        $this->load->view('header_footer/sidebar');
        $this->load->view('adm_about_us',$this->data);
		$this->load->view('header_footer/footer');
        
    }
    
    function add(){
	   if($this->input->post('submit')){
		   $aboutUsData = array(
				'about_us_content' => $this->input->post('content')
			);
			$insertAboutUsData = $this->adm_home_model->addAboutUsData($aboutUsData);
			if( $insertAboutUsData ){
				$this->session->set_flashdata('msg', 'Content updated successfully.');
				redirect('AdmAboutUs');
			}
	   }
        
    }
    
    function editInfoSEO($uri_page,$individual){
        
        //$this->seo->editInfoSEO($uri_page,$individual);
        
    }
    
}
