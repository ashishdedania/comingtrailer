<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public $data = array();

    public function __construct() {

        parent::__construct();
        $this->load->model('My_model');

        $admin_data = $this->session->userdata('admin_data');
        $admLoggedId = $this->session->userdata('admLoggedId');

        if ($this->router->fetch_class() != "login" && empty($admin_data) && empty($admLoggedId)) {
            redirect(base_url('backend/login'));
        } else {
            if (!empty($admin_data) && empty($admLoggedId)) {
                $this->session->set_userdata('admLoggedId', $admin_data['id']);
            }

            if (!empty($admLoggedId) && empty($admin_data)) {
                $admin_data = $this->My_model->getbyid("admin", array("id" => $admLoggedId));
                $this->session->set_userdata('admin_data', $admin_data[0]);
            }
        }
    }

    public function image_resize($path, $redirect, $width = 500, $height = 500) {

        $this->load->library("image_lib");

        $pathInfo = pathinfo($path);

        $config['image_library'] = 'gd2';
        $config['source_image'] = $path;
        $config['new_image'] = $path;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = $width;
        if ($height != 1) {
            $config['height'] = $height;
        }

        $this->load->library('image_lib', $config);
        $this->image_lib->initialize($config);
        $success = $this->image_lib->resize();

        if ($success) {

            $this->image_lib->clear();
            $config['image_library'] = 'gd2';
            $config['source_image'] = $path;
            $config['new_image'] = $path;
            $config['maintain_ratio'] = FALSE;
            $config['width'] = $width;
            if ($height != 1) {
                $config['height'] = $height;
            }
            $config['x_axis'] = '0';
            $config['y_axis'] = '0';
            $this->load->library('image_lib', $config);
            $this->image_lib->initialize($config);
            $success = $this->image_lib->crop();
            if (!$success) {
                $error = array('error' => $this->image_lib->display_errors());
                $this->session->set_flashdata("message", "danger_" . $error['error']);
                redirect("backend/" . $redirect . "/add");
            }
        } else {
            $error = array('error' => $this->image_lib->display_errors());
            $this->session->set_flashdata("message", "danger_" . $error['error']);
            redirect("backend/" . $redirect . "/add");
        }

        //unlink($path);
        rename($pathInfo['dirname'] . "/" . $pathInfo['filename'] . "_thumb." . $pathInfo['extension'], $path);
    }

    public function save_new_movie($movie_name = "", $category_id = "") {
        $data = array(
            "movie_name" => $movie_name,
            "rel_date" => date("Y-m-d H:i:s"),
            "subcat_id" => $category_id,
            "created" => date("Y-m-d H:i:s")
        );

        $movie_id = $this->My_model->insertdata($data, "movie");

        $seo_url_id = $this->WebService->setSEOURLMovie($category_id, $movie_id, $movie_name, "movie", "add");

        $this->My_model->updatedata("movie", array("seo_url_id" => $seo_url_id), array("id" => $movie_id));

        return $movie_id;
    }

    public function save_new_cast($name) {
        $name = trim(preg_replace('/\s\s+/', ' ', str_replace("\n", " ", $name)));
        $check = $this->My_model->getbyid("cast", array("cast_name" => $name));
        if (empty($check)) {
            $data = array(
                "cast_name" => $name,
                "created" => date("Y-m-d H:i:s")
            );

            $id = $this->My_model->insertdata($data, "cast");
            $seo_url_id = $this->WebService->setSEOURLCast($id, $name, "cast", "add");
            $this->My_model->updatedata("cast", array("seo_url_id" => $seo_url_id), array("id" => $id));
        } else {
            $id = $check[0]['id'];
        }
        return $id;
    }

    public function save_new_singer($name) {
        $name = trim(preg_replace('/\s\s+/', ' ', str_replace("\n", " ", $name)));
        $check = $this->My_model->getbyid("singer", array("singer_name" => $name));
        if (empty($check)) {
            $data = array(
                "singer_name" => $name,
                "created" => date("Y-m-d H:i:s")
            );

            $id = $this->My_model->insertdata($data, "singer");
            $seo_url_id = $this->WebService->setSEOURLCast($id, $name, "singer", "add");
            $this->My_model->updatedata("singer", array("seo_url_id" => $seo_url_id), array("id" => $id));
        } else {
            $id = $check[0]['id'];
        }
        return $id;
    }

    public function save_new_director($name) {
        $name = trim(preg_replace('/\s\s+/', ' ', str_replace("\n", " ", $name)));
        $check = $this->My_model->getbyid("director", array("director_name" => $name));
        if (empty($check)) {
            $data = array(
                "director_name" => $name,
                "created" => date("Y-m-d H:i:s")
            );

            $id = $this->My_model->insertdata($data, "director");
            $seo_url_id = $this->WebService->setSEOURLCast($id, $name, "director", "add");
            $this->My_model->updatedata("director", array("seo_url_id" => $seo_url_id), array("id" => $id));
        } else {
            $id = $check[0]['id'];
        }
        return $id;
    }

    public function save_new_music_director($name) {
        $name = trim(preg_replace('/\s\s+/', ' ', str_replace("\n", " ", $name)));
        $check = $this->My_model->getbyid("music", array("music_name" => $name));
        if (empty($check)) {
            $data = array(
                "music_name" => $name,
                "created" => date("Y-m-d H:i:s")
            );

            $id = $this->My_model->insertdata($data, "music");
            $seo_url_id = $this->WebService->setSEOURLCast($id, $name, "music", "add");
            $this->My_model->updatedata("music", array("seo_url_id" => $seo_url_id), array("id" => $id));
        } else {
            $id = $check[0]['id'];
        }
        return $id;
    }

    public function save_relby($name) {
        $name = trim(preg_replace('/\s\s+/', ' ', str_replace("\n", " ", $name)));
        $check = $this->My_model->getbyid("released_by", array("rel_by_name" => $name));
        if (empty($check)) {
            $data = array(
                "rel_by_name" => $name,
                "created" => date("Y-m-d H:i:s")
            );

            $id = $this->My_model->insertdata($data, "released_by");

            $seo_url_id = $this->WebService->setSEOURLCast($id, $name, "released_by", "add");
            $this->My_model->updatedata("released_by", array("seo_url_id" => $seo_url_id), array("id" => $id));
        } else {
            $id = $check[0]['id'];
        }

        return $id;
    }
    
    public function save_new_personality($name,$type) {
        $name = trim(preg_replace('/\s\s+/', ' ', str_replace("\n", " ", $name)));
        $name = str_replace(" - ",'-',$name);
        $check = $this->My_model->getbyid("personality", array("personality_name" => $name));
        $name1 = str_replace("-"," ",$name);
        $check1 = $this->My_model->getbyid("personality", array("personality_name" => $name1));
        $name2 = str_replace(" ","-",$name);
        $check2 = $this->My_model->getbyid("personality", array("personality_name" => $name2));
        if (empty($check) && empty($check1) &&  empty($check2)) {

            $for_seo = '';

            if($type == 'cast')
            {
                $for_seo = 'is_cast';
            }

            if($type == 'director')
            {
                $for_seo = 'is_director';
            }

            if($type == 'singer')
            {
                $for_seo = 'is_singer';
            }

            if($type == 'music_director')
            {
                $for_seo = 'is_music_director';
            }


            $data = array(
                "personality_name" => $name,
                "created" => date("Y-m-d H:i:s"),
                "is_cast" => ($type == 'cast') ? 1 : 0,
                "is_director" =>($type == 'director') ? 1 : 0,
                "is_music_director" => ($type == 'music_director') ? 1 : 0,
                "is_singer" => ($type == 'singer') ? 1 : 0,
                "for_seo"=>$for_seo
            );

            $id = $this->My_model->insertdata($data, "personality");
//            $seo_url_id = $this->WebService->setSEOURLCast($id, $name, "cast", "add");
//            $this->My_model->updatedata("cast", array("seo_url_id" => $seo_url_id), array("id" => $id));
        } else {            
            $id = $check[0]['id'];            
            $this->My_model->updatedata("personality", array("is_".$type => 1), array("id" => $id));
        }
        return $id;
    }
}