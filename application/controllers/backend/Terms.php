<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Terms extends MY_Controller
{
    public function  __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $terms_privacy_data=$this->My_model->getresult("SELECT * from terms_privacy LIMIT 0,1");
        $this->data['terms_privacy_data']=$terms_privacy_data[0];
        $seo_data=$this->My_model->getresult("SELECT * from seo_individual WHERE  individual='TERMS' LIMIT 0,1");
        $this->data['seo_data'] = $seo_data[0];
        $this->data['message'] = $this->session->flashdata("message");
        $this->data['view_name'] = "terms_view.php";
        $this->load->view('backend/layout', $this->data);
    }

    public function save()
    {
        $id=$this->input->post("id");
        $content=$this->input->post("content");

        $data=array(
            "terms_privacy_content"=>$content,
            "updated"=>date('Y-m-m H:i:s')
        );

        if(!empty($id)) {
            $this->My_model->updatedata("terms_privacy",$data,array("id"=>$id));
        }else{
            $this->My_model->insertdata($data, "terms_privacy");
        }

        $this->session->set_flashdata("message","success_Terms & Privacy Content Save Successfully.");
        redirect("backend/terms");

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
        redirect("backend/terms");
    }

}