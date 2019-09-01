<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MovieTrailer
 *
 * @author yoo
 */
class MovieTrailer extends CI_Controller {

    //put your code here

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('adm_home_model');
        $this->load->model('adm_data_model');
        $this->load->model('WebService');
        $this->load->model('Seo_data_model');
    }

    public function index($cat_id = 1, $subcat_id = 0) {
        if (!$this->input->post()) {
            $_POST['search_year'] = date('Y');
            $_POST['search_month'] = date('n');
        }
        $this->data['cat'] = $this->adm_home_model->getSubCat($cat_id);
        $this->data['cat_id'] = $cat_id;
        $this->data['subcat_id'] = $subcat_id;
        $this->data['uri_page'] = $this->router->fetch_class();
        $this->data['trailer'] = $this->WebService->getAllTrailer($cat_id, $subcat_id, 50, 0);
        $this->data['side_big_adv'] = $this->WebService->getAdsense(300, 600);
        $this->data['side_adv'] = $this->WebService->getAdsense(300, 250);
        //print_r($this->data['trailer']);exit;
        if (empty($this->data['trailer'])) {
            redirect('My404');
        }
        //fetch SEO Data
        //if($subcat_id){ 
        $this->db->where('sub_category_id', $subcat_id);
//        }else {
//            $this->db->where('sub_category_id IS NULL');
//        }

        $query = $this->db->get_where('seo', array('category_id' => $cat_id));
        $this->data['seo'] = $query->row_array();

        $links = 'MovieTrailer/index/' . $cat_id . '/' . $subcat_id;
        if ($subcat_id == 0) {
            $link = $this->getLink('', $links, $subcat_id, $cat_id);
        } else {
            $link = base_url($this->getLink('', $links, $subcat_id, $cat_id));
        }

        $type = 'MovieTrailer';
        $this->data['seo_data'] = $this->Seo_data_model->getSEO($type, $this->data['seo'], $link);

        $this->data['controller'] = $this;

        //Footer links
        $this->data['top_actors'] = $this->adm_home_model->getTopActors();
        $this->data['top_singers'] = $this->adm_home_model->getTopSingers();

        $this->data['trailer_cat'] = $this->adm_home_model->getSubCat(1);
        $this->data['video_cat'] = $this->adm_home_model->getSubCat(2);
        $this->data['year_list'] = $this->WebService->getMinYear('video');
        $this->load->view('header_footer/front_header', $this->data);
        $this->load->view('movie_trailer', $this->data);
        $this->load->view('header_footer/front_footer', $this->data);
    }

    public function getSeoUrl($seo_id) {
//        echo '$seo_id';exit;
//        echo $table_nmae;exit;
        $final_url = $this->WebService->getSeoUrl('video_url', $seo_id);
        return $final_url;
    }

    public function getLink($table, $links, $subcat_id, $cat_id) {
        if ($cat_id == 1) {
            if ($subcat_id == 0) {
                return '' . base_url('movietrailer');
            } else {
                return $this->adm_data_model->getCatLinks($links);
            }
        } else if ($cat_id == 2) {
            if ($subcat_id == 0) {
                return '' . base_url('videosong');
            } else {
                return $this->adm_data_model->getCatLinks($links);
            }
        }
    }

    public function showMore() {
        $this->load->model('WebService');
        $cat_id = $this->input->post('cat_id');
        $subcat_id = $this->input->post('subcat_id');
        $start = $this->input->post('start');
        $this->data['controller'] = $this;
        $_POST['ajax'] = 'yes';
//        $_POST['search_month'] = $this->input->post('cat_id');
//        $_POST['search_keyword'] = $this->input->post('cat_id');

        $this->data['trailer'] = $this->WebService->getAllTrailer($cat_id, $subcat_id, 50, $start);
        $this->load->view('trailer_pagination', $this->data);
    }

}