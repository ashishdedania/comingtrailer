<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Home
 *
 * @author yoo
 */
class Home extends CI_Controller {

    //put your code here

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('adm_home_model');
        $this->load->model('WebService');
        require_once('twitteroauth.php');
        $this->load->model('Seo_data_model');
    }

    public function index($share_code = '') {
        if ($share_code != '') {
            $count = $this->db->get_where('user', array('share_code' => $share_code))->num_rows();
            if ($count > 0) {
                $this->session->set_userdata('shared_code', $share_code);
            } else {
                die('Invalid Share Code');
            }
        }

        $FrontData = array();
        $main_category = array(1 => "Trailer", 2 => "Video Song");
        $sub_category = $this->My_model->getall("sub_category");

        $temp = 0;

        foreach ($main_category as $Mainkey => $Mainvalue) {

            foreach ($sub_category as $key => $value) {


                $result = $this->My_model->getresult("SELECT sub_category.subcat_name,video.video_name,
                    CONCAT('timthumb.php?src=" . base_url() . "images/videothumb/',video.video_thumb,'&w=285&h=160') as video_thumb,
                    CONCAT('./images/videothumb/',video.video_thumb) as thumb,
                    CONCAT(video.liked,' Likes') as liked,CONCAT(video.play,' Playing') as play,video_url.final_url FROM video 
                    LEFT JOIN sub_category ON video.subcat_id=sub_category.id
                    LEFT JOIN video_url ON video_url.id=video.seo_url_id 
                    WHERE cat_id='" . $Mainkey . "' AND subcat_id='" . $value['id'] . "' AND    
                    video.is_deleted='0'
                    group by video.id
                    ORDER BY video.rel_date DESC
                    LIMIT 0,3");

                if ($Mainkey == 1) {
                    $url = base_url() . "movietrailer/";
                } else {
                    $url = base_url() . "videosong/";
                }

                $FrontData[$temp]["name"] = $value['subcat_name'] . " " . $Mainvalue;
                $FrontData[$temp]["value"] = $result;
                $FrontData[$temp]["url"] = $url . strtolower($value['subcat_name']);
                $temp++;
            }
        }


        foreach ($sub_category as $key => $value) {

            $result = $this->My_model->getresult("SELECT sub_category.subcat_name,poster.poster_name as video_name,CONCAT(poster.likes,' Likes') as liked,CONCAT(poster.views,' Views') as play,video_url.final_url,(select CONCAT('timthumb.php?src=" . base_url() . "images/poster/',poster_img.poster_image,'&w=285&h=160') from poster_img where poster_img.poster_id=poster.id order by poster_img.poster_type asc,poster_img.display_order asc limit 1) as video_thumb,(select CONCAT('./images/poster/',poster_img.poster_image) from poster_img where poster_img.poster_id=poster.id order by poster_img.poster_type asc,poster_img.display_order asc limit 1) as thumb
                        FROM poster 
                LEFT JOIN sub_category ON poster.subcat_id=sub_category.id
                LEFT JOIN video_url ON video_url.id=poster.seo_url_id                 
                WHERE subcat_id='" . $value['id'] . "' AND    
                poster.is_deleted='0'
                group by poster.id                
                ORDER BY poster.rel_date DESC
                LIMIT 0,3");


            $url = base_url() . "movieposter/";


            $FrontData[$temp]["name"] = $value['subcat_name'] . " Poster";
            $FrontData[$temp]["value"] = $result;
            $FrontData[$temp]["url"] = $url . strtolower($value['subcat_name']);
            $temp++;
        }



        $this->data['home_data'] = $FrontData;


        //  $this->data['trailer'] = $this->WebService->getAllTrailer(1,0,15,0);
        //  $this->data['videos'] = $this->WebService->getAllTrailer(2,0,15,0);
        //  $this->data['poster'] = $this->WebService->getAllPoster(0,15,0);

        $this->data['head_adv'] = $this->WebService->getAdsense(728, 90);
        $this->data['side_adv'] = $this->WebService->getAdsense(300, 250);
        $this->data['video_week_trend'] = json_decode($this->WebService->getWeekTrend('video'));
        $this->data['poster_week_trend'] = json_decode($this->WebService->getWeekTrend('poster', '', 'poster'));
        //echo "<pre>";print_r($this->data['poster_week_trend']);exit;
        $this->data['controller'] = $this;
        $link = base_url();
        $type = 'home';
        $this->data['seo_data'] = $this->Seo_data_model->getSEO($type, $this->data['trailer'], $link);

        //Footer links
        $this->data['top_actors'] = $this->adm_home_model->getTopActors();
        $this->data['top_singers'] = $this->adm_home_model->getTopSingers();

        $this->data['trailer_cat'] = $this->adm_home_model->getSubCat(1);
        $this->data['video_cat'] = $this->adm_home_model->getSubCat(2);

        $this->load->view('header_footer/front_header', $this->data);
        $this->load->view('home', $this->data);
        $this->load->view('header_footer/front_footer', $this->data);
    }

    public function getSeoUrl($seo_id) {
//        echo '$seo_id';exit;
//        echo $table_nmae;exit;
        $final_url = $this->WebService->getSeoUrl('video_url', $seo_id);
        return $final_url;
    }

}
