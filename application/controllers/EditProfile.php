<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class EditProfile extends MY_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
    }
    public function index(){
        $result = $this->db->get_where('admin',array('id'=>$this->session->userdata('admLoggedId')));
        $this->data['admData'] = $result->row_array();
        $this->load->view('header_footer/header');
        $this->load->view('header_footer/sidebar');
        $this->load->view('edit_profile',$this->data);
        $this->load->view('header_footer/footer');
    }
    
    public function validate_username_email(){
        if (!$this->input->is_ajax_request()) {
           exit('No direct script access allowed');
        }
        $email = trim($this->input->post('email'));
        $username = trim($this->input->post('username'));
        $this->db->select('*');
        $this->db->from('admin'); // I use aliasing make joins easier
        $this->db->where("`id` != '".$this->session->userdata('admLoggedId')."' AND (`email` = '".$this->input->post('username')."' OR `username` = '".$_POST['username']."')");
        $result = $this->db->get();
        $arr_email = explode("@",$email);
        $chkDns = array_pop($arr_email);
        if($result->num_rows() > 0) {
            echo 'Username OR Email is Registered';
        }elseif(!checkdnsrr($chkDns,"MX")){
            echo 'Email address is not valid'; 
        }else{
            echo false;
        }
    }
    public function validate_cur_pass(){
        if (!$this->input->is_ajax_request()) {
           exit('No direct script access allowed');
        }
        $email = trim($this->input->post('email'));
        $username = trim($this->input->post('username'));
        $this->db->select('*');
        $this->db->from('admin'); // I use aliasing make joins easier
        $this->db->where(array('id' => $this->session->userdata('admLoggedId'),'pass'=> md5($this->input->post('pass'))));
        $result = $this->db->get();
        if($result->num_rows() > 0) {
            echo true;
        }else{
            echo false;
        }
    }
    
    public function edit(){
        $adminEditData = array(
                        'name' => trim($this->input->post('name')),
                        'username' => trim($this->input->post('username')),
                        'email' => trim($this->input->post('email')),
                        'alt_email' => trim($this->input->post('alt_email'))
                    );
        $cur_pass = $this->input->post('cur_pass');
        $new_pass = $this->input->post('new_pass');
        $conf_pass = $this->input->post('conf_pass');
        if($cur_pass && $new_pass && $conf_pass && $new_pass == $conf_pass){
            $adminEditData['pass'] = md5($new_pass);
        }
        $this->db->where('id',$this->session->userdata('admLoggedId'));
        $this->db->update('admin',$adminEditData);
        redirect('editProfile');
    }
    
    public function deleteProfileImg(){
        unlink(base_url("images/admin/" . $this->session->userdata('profile_img')));
        $this->db->where('id',$this->session->userdata('admLoggedId'));
        $this->db->update('admin',array('profile_img'=>''));
        redirect('editProfile');
    }
    
    public function updateProfileImg(){
        if(!empty($_FILES['profile_img']['name'])){
            unlink(base_url("images/admin/" . $this->session->userdata('profile_img')));
            $config['upload_path'] = 'images/admin/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|JPG';
            $ext = pathinfo($_FILES['profile_img']['name'], PATHINFO_EXTENSION);
            $file_name = basename($_FILES['profile_img']['name'], ".".$ext); 
            $config['file_name'] = $file_name.'_'.$this->session->userdata('admLoggedId').'.'.$ext;

            //Load upload library and initialize configuration
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            if($this->upload->do_upload('profile_img')){
                $uploadData = $this->upload->data();
                $this->db->where('id',$this->session->userdata('admLoggedId'));
                $this->db->update('admin', array('profile_img'=>$uploadData['file_name'])); 
                $this->session->set_userdata('profile_img',$uploadData['file_name']);
                redirect('editProfile');
            }
        }
    }
}
