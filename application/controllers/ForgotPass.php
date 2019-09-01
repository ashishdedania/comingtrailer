<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ForgotPass
 *
 * @author yoo
 */
class ForgotPass extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
         $this->load->model('Adm_data_model');
        
    }
    public function index(){
        
        $this->load->view('forgot');
        
    }
    
    public function forgot(){
        
        $this->Adm_data_model->forgot();
        
        $this->load->view('forgot');
    }
    
    public function resetpass($token){
        
        $message = $this->Adm_data_model->checkReset($token);
        if($message == 'true'){
            $this->load->view('resetpass');
        }else{
            $this->session->set_flashdata('msg', 'Invalid link please try again');
            $this->load->view('forgot');
        }
        
        
    }
}
