<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Login 
 *
 * @author yoo
 */
class Login extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->helper('cookie');
        if($this->session->userdata('admLoggedId')){
            redirect(base_url('adminHome'));
        }
    }
    public function index(){
        
        if($this->uri->segment(1) == 'backend'){
            
        }else{
            redirect(base_url('My404'));
        }
        
        $this->load->view('login');
    }
    public function doLogin(){
        if($this->input->post('pass') && $this->input->post('username')){
            $this->load->database();
            $this->db->select('*');
            $this->db->from('admin');// I use aliasing make joins easier
            $this->db->where("`pass` = '".md5($this->input->post('pass'))."' AND (`email` = '".$this->input->post('username')."' OR `username` = '".$_POST['username']."')");
            $result = $this->db->get();
            if($result->num_rows() > 0){
                if($this->input->post('rememberme')){
                    //echo $this->input->post('rememberme');exit;
                    $this->input->set_cookie('username',$this->input->post('username'),'86500');
                    $this->input->set_cookie('pass',$this->input->post('pass'),'86500');
                }else{
                    $this->input->set_cookie('username',$this->input->post('username')); //-> Default expire_time=0 
                    $this->input->set_cookie('pass',$this->input->post('pass'));
                }
                //create session and redirect to Adminhome
                $this->session->set_userdata(array("admLoggedId"=>$result->row()->id,'profile_img'=>$result->row()->profile_img));
                redirect(base_url('adminHome'));
            }else{
                $this->data['login_err'] = 'Invalid Username OR Password';
                $this->load->view('login', $this->data);
            }
        }else{
            redirect(base_url('login'));
        }
    }
    public function logout(){
        $this->db->close();
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }
    
   
}
