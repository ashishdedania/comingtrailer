<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdmPartnershipFormData
 *
 * @author yoo
 */

class AdmPartnershipFormData extends MY_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('adm_home_model');
    }
    public function index(){
        
        $this->data['content'] = $this->adm_home_model->getPartnershipFormData();
        
        $this->data['year_list'] = $this->WebService->getMinYear('partnership_data','created');
        
        $this->load->view('header_footer/header');
        $this->load->view('header_footer/sidebar');
        $this->load->view('adm_partnership_form_data',$this->data);
		$this->load->view('header_footer/footer');
        
    }
}
