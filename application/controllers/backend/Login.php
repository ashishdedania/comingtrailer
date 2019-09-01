<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

    public function  __construct()
    {
        parent::__construct();
    }


    public function index()
    {

        $this->data['message']=$this->session->flashdata("message");
        $this->load->view('backend/login_view',$this->data);
    }

    public function do_login(){


        $username=$this->input->post("username");
        $password=md5($this->input->post("password"));

        $checkLogin=$this->My_model->getresult("SELECT * FROM admin
            WHERE
            (username='".$username."' AND pass='".$password."')
            OR
            (email='".$username."' AND pass='".$password."')
        ");

        if(!empty($checkLogin)){

            $this->session->set_userdata("admin_data",$checkLogin[0]);
            $this->session->set_flashdata("message","success_Welcome $checkLogin[0]['username'].");
            redirect("backend/home");

        }else{

            $this->session->set_flashdata("message","danger_please provide valid username or password.");
            redirect("backend/login");

        }

    }


}
