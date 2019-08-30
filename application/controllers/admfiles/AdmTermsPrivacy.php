<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdmTermsPrivacy
 *
 * @author yoo
 */

class AdmTermsPrivacy extends MY_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('adm_home_model');
    }
    public function index(){
        
        $this->data['content'] = $this->adm_home_model->getTermsPrivacyData();
        
        $this->data['uri_page'] = $this->router->fetch_class();
         $query = $this->db->get_where('seo_individual',array('individual' => 'TERMS')); 
        $this->data['seo'] = $query->row_array();
        
        $this->load->view('header_footer/header');
        $this->load->view('header_footer/sidebar');
        $this->load->view('adm_terms_privacy',$this->data);
		$this->load->view('header_footer/footer');
        
    }
    
    function add(){
	   if($this->input->post('submit')){
		   $termsPrivacyData = array(
				'terms_privacy_content' => $this->input->post('content')
			);
			$insertTermsPrivacyData = $this->adm_home_model->addTermsPrivacyData($termsPrivacyData);
			if( $insertTermsPrivacyData ){
				$this->session->set_flashdata('msg', 'Content updated successfully.');
				redirect('AdmTermsPrivacy');
			}
	   }
        
    }
    
}
