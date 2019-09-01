<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Register extends CI_Controller{

    //put your code here
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
    }

    public function index(){
        $this->load->view('register');
    }
    
    public function add(){
        if($this->input->post('pass') && $this->input->post('username')){
            $this->load->database();
            $adminData = array(
                            'name' => trim($this->input->post('name')),
                            'username' => trim($this->input->post('username')),
                            'email' => trim($this->input->post('email')),
                            'alt_email' => trim($this->input->post('alt_email')),
                            'pass' => md5($this->input->post('pass'))
                        );
            try{
                $insertAdminData = $this->db->insert('admin', $adminData);
                $last_insert_id = $this->db->insert_id();
                //Check whether user upload picture
                if(!empty($_FILES['profile_img']['name'])){
                    $config['upload_path'] = 'images/admin/';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif|JPG';
                    $ext = pathinfo($_FILES['profile_img']['name'], PATHINFO_EXTENSION);
                    $file_name = basename($_FILES['profile_img']['name'], "." . $ext);
                    $config['file_name'] = $file_name . '_' . $last_insert_id . '.' . $ext;
                        
                    //Load upload library and initialize configuration
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if($this->upload->do_upload('profile_img')){
                        $uploadData = $this->upload->data();
                        $this->db->where('id', $last_insert_id);
                        $this->db->update('admin', array('profile_img' => $uploadData['file_name']));
                    }else{
                        $picture = '';
                    }
                }else{
                    $picture = '';
                }    
            }catch(Exception $ex){
                die('DB Data Insertion Error: ' . $ex->getMessage());
            }
        }
        redirect(base_url('login'));
    }
    
    public function valid_username_email(){
        if(!$this->input->is_ajax_request()){
           exit('No direct script access allowed');
        }
        $this->load->database();
        $email = trim($this->input->post('email'));
        $username = trim($this->input->post('username'));
        $this->db->select('*');
        $this->db->from('admin'); // I use aliasing make joins easier
        $this->db->or_where(array('email' => $email, 'username' => $username));
        $result = $this->db->get();
        $arr_email = explode("@", $email);
        $chkDns = array_pop($arr_email);
        if($result->num_rows() > 0){
            echo 'Username OR Email is Registered';
        }elseif(!checkdnsrr($chkDns, "MX")){
            echo 'Email address is not valid'; 
        }else{
            echo false;
        }
    }
}
