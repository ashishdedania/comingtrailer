<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdmAdvertise
 *
 * @author yoo
 */

class AdmAdvertise extends MY_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('adm_home_model');
    }
    public function index(){
        
        $this->data['content'] = $this->adm_home_model->getAdvertiseData();
        
        $this->data['uri_page'] = $this->router->fetch_class();
         $query = $this->db->get_where('seo_individual',array('individual' => 'AD')); 
        $this->data['seo'] = $query->row_array();
        
        $this->load->view('header_footer/header');
        $this->load->view('header_footer/sidebar');
        $this->load->view('adm_advertise',$this->data);
		$this->load->view('header_footer/footer');
        
    }
    
    function add(){
	   if($this->input->post('submit')){
		   $advertiseData = array(
				'advertise_content' => $this->input->post('content')
			);
			$insertAdvertiseData = $this->adm_home_model->addAdvertiseData($advertiseData);
			if( $insertAdvertiseData ){
				$this->session->set_flashdata('msg', 'Content updated successfully.');
				redirect('AdmAdvertise');
			}
	   }
        
    }
    
}
