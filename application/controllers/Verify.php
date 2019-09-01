<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Verify
 *
 * @author yoo
 */
class Verify extends CI_Controller{
    //put your code here
    
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('adm_home_model');
        $this->load->model('WebService');
    }
    
    public function index($token){
//        $this->load->view('my_login');
       
        
        $verify = $this->WebService->emailVerify($token);
        
         echo $verify;
        
        $this->load->view('verify_email');
    }
    
}
