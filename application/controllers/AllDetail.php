<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AllDetail
 *
 * @author yoo
 */
class AllDetail extends CI_Controller {

    //put your code here

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('adm_home_model');
        $this->load->model('WebService');
        $this->load->model('adm_movie_model');
        $this->load->model('adm_data_model');
        $this->load->model('Seo_data_model');
    }

    public function index($table, $subcat_id = 0) {
        if (!$this->input->post()) {
            if ($table == 'movie') {
                $_POST['search_year'] = date('Y');
                $_POST['search_month'] = date('n');
            } else {
                $_POST['search_keyword'] = 'a';
            }
        }
        $this->data['subcat'] = $this->getSubcat();
        $this->data['uri_page'] = $this->router->fetch_class();
        $this->data['uri_subcat_id'] = $subcat_id;
        $this->data['table'] = $table;

        $this->data['movie'] = $this->getAllMovie($table, $subcat_id);

        if ($table == 'movie') {
            $this->data['seo'] = $this->adm_data_model->getMovieSEOData($subcat_id);
        } else {
            $this->data['seo'] = $this->getIndiSEO($table);
        }
        $this->data['side_big_adv'] = $this->WebService->getAdsense(300, 600);
        $this->data['side_adv'] = $this->WebService->getAdsense(300, 250);

        if ($subcat_id == 0) {
            $links = 'AllDetail/index/' . $table;
        } else {
            $links = 'AllDetail/index/' . $table . '/' . $subcat_id;
        }
        $link = base_url($this->getLink($table, $links, $subcat_id));
        $type = 'individual';
        $this->data['seo_data'] = $this->Seo_data_model->getSEO($type, $this->data['seo'], $link);

        //Footer links
        $this->data['top_actors'] = $this->adm_home_model->getTopActors();
        $this->data['top_singers'] = $this->adm_home_model->getTopSingers();

        $this->data['trailer_cat'] = $this->adm_home_model->getSubCat(1);
        $this->data['video_cat'] = $this->adm_home_model->getSubCat(2);
        $this->data['year_list'] = $this->WebService->getMinYear('movie');

        $this->data['controller'] = $this;

        $this->load->view('header_footer/front_header', $this->data);
        $this->load->view('all_detail', $this->data);
        $this->load->view('header_footer/front_footer', $this->data);
    }

    public function getSeoUrl($seo_id) {
//        echo '$seo_id';exit;
//        echo $table_nmae;exit;
        $final_url = $this->WebService->getSeoUrl('video_url', $seo_id);
        return $final_url;
    }

    public function getAllMovie($table, $subcat_id) {
        if ($table == 'movie') {
            return $this->adm_movie_model->getAllData('movie', 'movie_id', 'movie_name', $subcat_id);
        } else if ($table == 'cast') {
            return $this->adm_data_model->getAllData('cast', 'cast_id', 'cast_name');
        } else if ($table == 'singer') {
            return $this->adm_data_model->getAllData('singer', 'singer_id', 'singer_name');
            ;
        } else if ($table == 'director') {
            return $this->adm_data_model->getAllData('director', 'director_id', 'director_name');
        } else if ($table == 'music') {
            return $this->adm_data_model->getAllData('music', 'music_id', 'music_name');
        } else if ($table == 'released_by') {
            return $this->adm_data_model->getAllData('released_by', 'rel_by_id', 'rel_by_name');
        }
    }

    public function getLink($table, $links, $subcat_id) {
        if ($table == 'movie') {
            if ($subcat_id == 0) {
                return 'movie';
            } else {
                return $this->adm_data_model->getCatLinks($links);
            }
        } else if ($table == 'cast') {
            return '' . base_url('actor');
        } else if ($table == 'singer') {
            return '' . base_url('singer');
        } else if ($table == 'director') {
            return '' . base_url('director');
        } else if ($table == 'music') {
            return '' . base_url('musicdirector');
        } else if ($table == 'released_by') {
            return '' . base_url('company');
        }
    }

    public function getIndiSEO($table) {
        return $this->adm_data_model->getIndiSEOData($table);
    }

    public function getSubcat() {
        return $this->adm_movie_model->getMovieSubcat();
    }

    public function searchData() {
        $this->load->model('adm_movie_model');
        $this->load->model('Adm_data_model');
        $subcat_id = $this->input->post('subcat_id');
        $table = $this->input->post('table');
        $this->data['controller'] = $this;

        $_POST['ajax'] = 'yes';

//        $_POST['search_month'] = $this->input->post('cat_id');
//        $_POST['search_keyword'] = $this->input->post('cat_id');
        if ($table == 'movie') {
            $this->data['movie'] = $this->adm_movie_model->getAllData('movie', 'movie_id', 'movie_name', $subcat_id);
        } else if ($table == 'cast' || $table == 'singer' || $table == 'director' || $table == 'music') {
            $type = ($table == 'music') ? 'is_music_director' : 'is_'.$table;
            $this->data['movie'] = $this->adm_data_model->getAllData('personality', 'personality_id', 'personality_name',0,$type);
            $table = 'personality';
//        } else if () {
//            $this->data['movie'] = $this->adm_data_model->getAllData('singer', 'singer_id', 'singer_name');
//            ;
//        } else if () {
//            $this->data['movie'] = $this->adm_data_model->getAllData('director', 'director_id', 'director_name');
//        } else if () {
//            $this->data['movie'] = $this->adm_data_model->getAllData('music', 'music_id', 'music_name');
        } else if ($table == 'released_by') {

            $this->data['movie'] = $this->adm_data_model->getAllData('released_by', 'rel_by_id', 'rel_by_name');
        }
        $this->data['table'] = $table;
        //$this->data['trailer'] = $this->adm_movie_model->getAllTrailer($cat_id,$subcat_id,5,$start);
        $this->load->view('all_detail_search', $this->data);
    }

}
