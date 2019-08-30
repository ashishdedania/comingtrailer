<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller
{

    public function  __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data['message'] = $this->session->flashdata("message");
        $this->data['view_name'] = "profile_view.php";
        $this->load->view('backend/layout', $this->data);
    }

    public function save()
    {
        $id = $this->input->post("id");
        $name = $this->input->post("name");
        $username = $this->input->post("username");
        $email = $this->input->post("email");
        $alt_email = $this->input->post("alt_email");
        $current_password = $this->input->post("current_password");
        $new_password = $this->input->post("new_password");
        $confirm_password = $this->input->post("confirm_password");


    }


    public function save_profile_img()
    {
        $id = $this->input->post("id");

        $config = array(
            'upload_path' => "./assets/images/",
            'allowed_types' => "gif|jpg|png|jpeg"
        );
        $this->load->library('upload', $config);
        if($this->upload->do_upload("picture"))
        {
            $data = array('upload_data' => $this->upload->data());

            echo "<pre>";
            print_r($data);exit;
        }
        else
        {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata("message","danger_".$error['error']);
        }
        redirect("backend/profile");

    }

    public function remove_img()
    {
       $admin_data=$this->session->userdata("admin_data");
       unlink("./assets/images/".$admin_data['profile_img']);
       $this->My_model->updatedata("admin",array("profile_img"=>""),array("id"=>$admin_data['id']));
       $admin_data=$this->My_model->getbyid("admin",array("id"=>$admin_data['id']));
       $this->session->set_userdata("admin_data",$admin_data[0]);
       $this->session->set_flashdata("message","success_Profile Image Remove Successfully.");
       redirect("backend/profile");

    }
}