<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH . 'libraries/REST_Controller.php');

class Auth extends REST_Controller {

    function __construct() {
        parent::__construct();
        $printarray = array();
        $err_code = CODE_INVALID_SERVICE;
        $message = "";
        $result = false;
        $this->auth = new stdClass;
        $this->load->helper('cookie');
//        $this->load->model('api/common_model');
//        $this->load->model('api/auth_model');
//        $this->load->model('api/user');
        $this->load->model('WebService');
    }
    
    function login_post() {
        $name = $this->input->post('name');
        $social_media = $this->input->post('social_media');
        $email = $this->input->post('email');
        $social_media_id = $this->input->post('social_media_id');
        $mobile = $this->input->post('mobile');
        if (!isset($name) || empty($name)) {
            $message = 'Invalid api call or parameter missing.';
            $err_code = CODE_PARAM_MISSING;
            $result = false;
        } else if (!isset($social_media) || empty($social_media)) {
            $message = 'Invalid api call or parameter missing.';
            $err_code = CODE_PARAM_MISSING;
            $result = false;
        } 
        else {
            if ($social_media == 'WA') {
                if (empty($mobile) || empty($mobile)) {
                    $message = 'Invalid api call or parameter missing.';
                    $err_code = CODE_PARAM_MISSING;
                    $result = false;
                } else {
                    $user_row = $this->WebService->loginSocialMedia(1);                    
                    $this->session->set_userdata(['front_userdata' => json_decode($user_row)]);
                    //print_r($user_row);exit;
                    //create session and redirect to Adminhome                
                    $user_info =  json_decode($user_row);               
                    $printarray['data'] = $user_info;
                    $total_point = $this->db->get_where('user_points',array('user_id'=>$user_info->id))->row();
                    $printarray['earn_points'] = $total_point->earn_points;
                    $printarray['earn_rs'] = number_format((($total_point->earn_points * 100) / 5000),2);
                    $message = 'Successfully login.';
                    $err_code = CODE_OK;
                    $result = true;
                   

                    if (!empty($_FILES['img']['name'])) 
                    {
                        $config['upload_path'] = 'images/user/';
                        $config['allowed_types'] = 'jpg|jpeg|png|gif|JPG';
                        $config['file_name'] = $user_info->id . '-' . $_FILES['img']['name'];

                        //Load upload library and initialize configuration
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config); 
                        if ($this->upload->do_upload('img')) {
                            $uploadData = $this->upload->data();
                            $imgpath = base_url('images/user/' . $uploadData['file_name']);

                            //update that user img
                           

                            $this->db->where('id', $user_info->id);
                            $this->db->update('user', array('img' => $imgpath)); 


                            $profile = str_replace(base_url('images/user/'),'',$user_info->img);
                            if (@getimagesize('images/user/' . $profile)) {
                                unlink('images/user/' . $profile);
                            }
                            
                            $printarray['data']->img = $imgpath;
                            
                        }

                    }

                }
            } else if ($social_media_id == '') {
                $message = 'Invalid api call or parameter missing.';
                $err_code = CODE_PARAM_MISSING;
                $result = false;
            } else {
                $user_row = $this->WebService->loginSocialMedia(1);
                //print_r($user_row);exit;
                if($user_row == 1)
                {
                    $message = 'Email or mobile already exist';
                    $err_code = CODE_PARAM_MISSING;
                    $result = false;
                }
                else
                {
                    $this->session->set_userdata(['front_userdata' => json_decode($user_row)]);
                    //create session and redirect to Adminhome 
                    $user_info =  json_decode($user_row);               
                    $printarray['data'] = $user_info;
                    $total_point = $this->db->get_where('user_points',array('user_id'=>$user_info->id))->row();
                   	$printarray['earn_points'] = $total_point->earn_points;
                   	$printarray['earn_rs'] = number_format((($total_point->earn_points * 100) / 5000),2);
                    $message = 'Successfully login.';
                    $err_code = CODE_OK;
                    $result = true;

                    if (!empty($_FILES['img']['name'])) 
                    {
                        $config['upload_path'] = 'images/user/';
                        $config['allowed_types'] = 'jpg|jpeg|png|gif|JPG';
                        $config['file_name'] = $user_info->id . '-' . $_FILES['img']['name'];

                        //Load upload library and initialize configuration
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config); 
                        if ($this->upload->do_upload('img')) {
                            $uploadData = $this->upload->data();
                            $imgpath = base_url('images/user/' . $uploadData['file_name']);

                            //update that user img
                           

                            $this->db->where('id', $user_info->id);
                            $this->db->update('user', array('img' => $imgpath)); 


                            $profile = str_replace(base_url('images/user/'),'',$user_info->img);
                            if (@getimagesize('images/user/' . $profile)) {
                                unlink('images/user/' . $profile);
                            }
                            
                            $printarray['data']->img = $imgpath;
                            
                        }

                    }
                }
                
            }
        }
        $printarray['result'] = $result;
        $printarray['message'] = $message;
        $printarray['errorCode'] = $err_code;
        $this->response($printarray);
    }



    function logout_get() {        
        $this->session->unset_userdata('front_userdata');             
        $printarray['result'] = TRUE;
        $printarray['message'] = 'Successfully logout';
        $printarray['errorCode'] = CODE_OK;
        $this->response($printarray);
    }

}
