<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Home
 *
 * @author yoo
 */
class Logout extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        
    }
    public function index(){
        $this->session->sess_destroy();
        $this->load->library('user_agent');
//        echo $this->agent->referrer();exit;
        //redirect(base_url());
        redirect($this->agent->referrer());
//        redirect('MaruAdmin');
    }
    
    public function adminLogout(){
        $this->session->sess_destroy();
        $this->load->library('user_agent');
         $this->session->unset_userdata("admin_data");
      $this->session->unset_userdata("admLoggedId");
//        echo $this->agent->referrer();exit;
        //redirect(base_url());
//        redirect($this->agent->referrer());
        redirect('MaruAdmin');
    }
}
