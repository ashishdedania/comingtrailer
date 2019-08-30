<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Search extends CI_Controller {

    //put your code here
    public $limit = 3;

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('adm_home_model');
        $this->load->model('WebService');
        $this->load->model('Front_Model');
    }

    public function index($page = 1) {
        $data['head_adv'] = $this->WebService->getAdsense(300, 250);
        $data['side_adv'] = $this->WebService->getAdsense(300, 600);
        if (!empty($_GET['q']) && !$this->input->post()) {
            $_POST['global_search_keyword'] = $_GET['q'];
        }
        $data['search_result'] = json_decode($this->Front_Model->searchTrailer($page, 20, 1));
        if (!($this->session->userdata('total_search_result'))) {
            $this->session->set_userdata('total_search_result', $data['search_result']->total_search_result);
        }
        $data['current_page'] = $page;

        $data['controller'] = $this;

        //Footer links
        $this->data['top_actors'] = $this->adm_home_model->getTopActors();
        $this->data['top_singers'] = $this->adm_home_model->getTopSingers();

        $this->data['trailer_cat'] = $this->adm_home_model->getSubCat(1);
        $this->data['video_cat'] = $this->adm_home_model->getSubCat(2);


        $this->data['seo_data'] = '<title>' . $this->session->userdata('global_search_keyword') . ' - Coming Trailer Search</title>';


        $this->load->view('header_footer/front_header', $this->data);
        $this->load->view('search', $data);
        $this->load->view('header_footer/front_footer', $this->data);
    }

    public function getSeoUrl($seo_id) {
//        echo '$seo_id';exit;
//        echo $table_nmae;exit;
        $final_url = $this->WebService->getSeoUrl('video_url', $seo_id);
        return $final_url;
    }

    public function searchTrailer($page = 1) {

        $selected = $this->input->post('selected');

        $data['controller'] = $this;
        if ($selected == 'trailer') {
            $data['search_result'] = json_decode($this->Front_Model->searchTrailer($page, 20, 1));
            $data['current_page'] = $page;
            $this->load->view('trailer_search', $data);
        } elseif ($selected == 'video') {

            $data['search_result'] = json_decode($this->Front_Model->searchTrailer($page, 20, 2));
            $data['current_page'] = $page;
            $this->load->view('trailer_search', $data);
        } elseif ($selected == 'poster') {
            $data['search_result'] = json_decode($this->Front_Model->searchPoster($page, 20));
            $data['current_page'] = $page;
            $this->load->view('poster_search', $data);
        } elseif ($selected == 'cast') {
            $data['search_result'] = json_decode($this->Front_Model->searchIndividual($page, 20));
            $data['current_page'] = $page;
            $this->load->view('individual_search', $data);
        } elseif ($selected == 'director') {
            $data['search_result'] = json_decode($this->Front_Model->searchIndividual($page, 20));
            $data['current_page'] = $page;
            $this->load->view('individual_search', $data);
        } elseif ($selected == 'music') {
            $data['search_result'] = json_decode($this->Front_Model->searchIndividual($page, 20));
            $data['current_page'] = $page;
            $this->load->view('individual_search', $data);
        } elseif ($selected == 'singer') {
            $data['search_result'] = json_decode($this->Front_Model->searchIndividual($page, 20));
            $data['current_page'] = $page;
            $this->load->view('individual_search', $data);
        } elseif ($selected == 'released_by') {
            $data['search_result'] = json_decode($this->Front_Model->searchCompany($page, 20));
            $data['current_page'] = $page;
            $this->load->view('company_search', $data);
        } elseif ($selected == 'movie') {
            $data['search_result'] = json_decode($this->Front_Model->searchMovie($page, 20));
            $data['current_page'] = $page;
            $this->load->view('movie_search', $data);
        }
    }

}
