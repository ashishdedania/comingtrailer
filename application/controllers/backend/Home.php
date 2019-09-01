<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller
{
    public function  __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $this->data['message'] = $this->session->flashdata("message");
        $this->data['view_name'] = "dashboard_view.php";
        $this->load->view('backend/layout', $this->data);
    }

    public function seo()
    {
        $seo_data=$this->My_model->getresult("SELECT * from home_seo LIMIT 0,1");
        if(!empty($seo_data)) {
            $this->data['seo_data'] = $seo_data[0];
        }else{
            $this->data['seo_data'] ="";
        }
        $this->data['message'] = $this->session->flashdata("message");
        $this->data['view_name'] = "home_seo_view.php";
        $this->load->view('backend/layout', $this->data);

    }

    public function save_seo_data()
    {
        $data=array(
            "title"=>$this->input->post("title"),
            "description"=>$this->input->post("description"),
            "keywords"=>$this->input->post("keywords")
           
        );

        $this->My_model->updatedata("home_seo",$data,array("id"=>$this->input->post("id")));

        $this->session->set_flashdata("message","success_SEO Content Save Successfully.");
        redirect("backend/category");
    }

    public function logout(){

      $this->session->unset_userdata("admin_data");
      $this->session->unset_userdata("admLoggedId");
      redirect("backend/login");

    }

}