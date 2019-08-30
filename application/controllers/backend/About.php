<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends MY_Controller
{
    public function  __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data=$this->My_model->getresult("SELECT * from about_us LIMIT 0,1");
        $this->data['data']=$data[0];
        $seo_data=$this->My_model->getresult("SELECT * from seo_individual WHERE  individual='ABUS' LIMIT 0,1");
        $this->data['seo_data'] = $seo_data[0];
        $this->data['message'] = $this->session->flashdata("message");
        $this->data['view_name'] = "about_view.php";
        $this->load->view('backend/layout', $this->data);
    }

    public function save()
    {
        $id=$this->input->post("id");
        $content=$this->input->post("content");

        $data=array(
            "about_us_content"=>$content,
            "updated"=>date('Y-m-m H:i:s')
        );

        if(!empty($id)) {
            $this->My_model->updatedata("about_us",$data,array("id"=>$id));
        }else{
            $this->My_model->insertdata($data, "about_us");
        }

        $this->session->set_flashdata("message","success_About Us Content Save Successfully.");
        redirect("backend/about");

    }


    public function save_seo_data()
    {
        $data=array(

            "individual"=>$this->input->post("individual"),
            "name"=>$this->input->post("name"),
            "title"=>$this->input->post("title"),
            "description"=>$this->input->post("description"),
            "keywords"=>$this->input->post("keywords"),
            "updated"=>date("Y-m-d H:i:s")
        );

        $this->My_model->updatedata("seo_individual",$data,array("individual"=>$this->input->post("individual")));

        $this->session->set_flashdata("message","success_SEO Content Save Successfully.");
        redirect("backend/about");
    }
}