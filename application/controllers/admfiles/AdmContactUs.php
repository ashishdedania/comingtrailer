<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdmContactUs
 *
 * @author yoo
 */

class AdmContactUs extends MY_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('adm_home_model');
    }
    public function index(){
        
        $this->data['content'] = $this->adm_home_model->getContactUsData();
        
        $this->data['uri_page'] = $this->router->fetch_class();
         $query = $this->db->get_where('seo_individual',array('individual' => 'CONUS')); 
        $this->data['seo'] = $query->row_array();
        
        $this->load->view('header_footer/header');
        $this->load->view('header_footer/sidebar');
        $this->load->view('adm_contact_us',$this->data);
		//$this->load->view('adm_contact_us');
		$this->load->view('header_footer/footer');
        
    }
    
    function add(){
	   if($this->input->post('submit')){
		   $contactUsData = array(
				'contact_us_content' => $this->input->post('content')
			);
			$insertContactUsData = $this->adm_home_model->addContactUsData($contactUsData);
			if( $insertContactUsData ){
				$this->session->set_flashdata('msg', 'Content updated successfully.');
				redirect('AdmContactUs');
			}
	   }        
    }
    
}
