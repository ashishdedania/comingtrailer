<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PosterDetail
 *
 * @author yoo
 */
class PosterDetail extends CI_Controller {

    //put your code here

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('adm_home_model');
        $this->load->model('WebService');
        $this->load->model('Front_Model');
        $this->load->model('Seo_data_model');
    }

    public function index($subcat_id = '', $poster_id = '', $is_amp = '') {

        if (($subcat_id == '') || ($poster_id == '')) {
            redirect('My404');
        }

        if ($is_amp != 'amp') {

            $this->data['poster'] = $this->WebService->getIndividualPoster($subcat_id, '', '', $poster_id);

            $this->data['head_adv'] = $this->WebService->getAdsense(728, 90);
            $this->data['side_adv'] = $this->WebService->getAdsense(300, 250);
            $this->data['controller'] = $this;


            //For SEO
            $temp = json_decode($this->data['poster']);
//        $this->data['seo']['title']= $temp->data[0]->poster_name.' Movie HD Poster Free on ComingTrailer.com';
//        $this->data['seo']['description']= $temp->data[0]->poster_desc;
//        $this->data['seo']['keywords']= 'Download HD Poster '.$temp->data[0]->poster_name.', '.$temp->data[0]->poster_name.' HD Wallpaper, '.$temp->data[0]->poster_name.' Movie HD Wallpapers, High Resolution Wallpapers, Movie Wallpaper, Free Hd Wallaper, Free HD Poster, ALl New Poster, Free Poster image '.$temp->data[0]->poster_keywords;
            //$link = base_url('PosterDetail/index'.$subcat_id.'/'.$poster_id);
//        $link = base_url('movieposter/'.$temp->data[0]->subcat_name.'/'.$poster_id.'/'.str_replace(' ', '-', $temp->data[0]->poster_name));
            $datas = json_decode($this->data['poster']);
            if ($datas->status == 1) {
                redirect('My404');
            }
            $link = $this->getSeoUrl($temp->data[0]->seo_url_id);
            $this->data['mylink'] = $link;
            $type = 'poster';
            $this->data['seo_data'] = $this->Seo_data_model->getSEO($type, $temp, $link);

            $this->data['controller'] = $this;

            //Footer links
            $this->data['top_actors'] = $this->adm_home_model->getTopActors();
            $this->data['top_singers'] = $this->adm_home_model->getTopSingers();

            $this->data['trailer_cat'] = $this->adm_home_model->getSubCat(1);
            $this->data['video_cat'] = $this->adm_home_model->getSubCat(2);

            $this->load->view('header_footer/front_header', $this->data);
            $this->load->view('poster_detail');
            $this->load->view('header_footer/front_footer', $this->data);
        } else if ($is_amp == 'amp') {

            $this->data['poster'] = $this->WebService->getIndividualPoster($subcat_id, '', '', $poster_id);

            $this->data['head_adv'] = $this->WebService->getAdsense(300, 90);
            $this->data['side_adv'] = $this->WebService->getAdsense(300, 251);
            $this->data['controller'] = $this;


            //For SEO
//        $temp = json_decode($this->data['poster']);

            $datas = json_decode($this->data['poster']);
//        print_r($datas);
            if ($datas->status == 1) {
                redirect('My404');
            }
            $link = $this->getSeoUrl($datas->data[0]->seo_url_id);
            $this->data['mylink'] = $link;
            $type = 'poster';
            $this->data['seo_data'] = $this->Seo_data_model->getSEO($type, $datas, $link);
            $this->data['controller'] = $this;

            $this->data['title'] = $datas->data[0]->poster_name . ' Movie HD Poster Wallpaper & First Look Free on Coming Trailer.com';

            $my_key = '';

            if ($datas->data[0]->poster_keywords != '') {
                $my_key = ', ' . $datas->data[0]->poster_keywords;
            }

            $this->data['keywords'] = 'Download HD Poster ' . $datas->data[0]->poster_name . ', ' . $datas->data[0]->poster_name . ' HD Wallpaper, ' . $datas->data[0]->poster_name . ' Movie HD Wallpapers, High Resolution Wallpapers, Movie Wallpaper, Free Hd Wallaper, Free HD Poster, ALl New Poster, ' . $datas->data[0]->poster_name . ' Movie First Look, Free Poster Image'
                    . '' . $my_key;
//        $data = '';
//        
//        $data = $data + '"image":{
//				"@type": "ImageObject",
//				"url": "http://odedara.com/comingtrailer/images/poster/285X160-19657321_1969512139929153_8877388594536442769_n.jpg",
//				"height": 160,
//				"width": 285
//			}';

            $pos_og_img = '';

            if ($datas->data[0]->poster_img1 == '') {
                $image = 'http://odedara.com/comingtrailer/resources/images/no-image.svg';

                $pos_og_img = $pos_og_img . '"image":{
				"@type": "ImageObject",
				"url": "' . $image . '",
				"height": 160,
				"width": 285
			},';
            } else {
                $image = $datas->data[0]->poster_img1[0]->poster_img;
//                print_r($image[0]->poster_img);
                $pos_og_img = $pos_og_img . '"image":{
				"@type": "ImageObject",
				"url": "' . $image . '",
				"height": 160,
				"width": 285
			},';
            }

            $this->data['img'] = $pos_og_img;

            $this->data['datePublished'] = '' . date('M d, Y H:i:s', strtotime($datas->data[0]->release_date));
            $val = $datas->data[0]->updated;
            if ($val != '0000-00-00 00:00:00' && $val != '') {
                $this->data['dateModified'] = '' . date('M d, Y H:i:s', strtotime($datas->data[0]->updated));
            } else {
                $this->data['dateModified'] = $this->data['datePublished'];
            }


            if ($datas->data[0]->poster_desc == '') {

                $desc = $datas->data[0]->poster_name . ' Movie HD Poster Wallpaper & First Look Free Online. '
                        . 'Download ' . $datas->data[0]->poster_name . ' Movie HD Poster Wallpaper & First Look '
                        . 'Free on Coming Trailer.com.';
            } else {

                $desc = $datas->data[0]->poster_desc;
            }

            $this->data['desc'] = '' . $desc;

            $this->load->view('poster_detail_amp', $this->data);
        }
    }

    public function getSeoUrl($seo_id) {
//        echo '$seo_id';exit;
//        echo $table_nmae;exit;
        $final_url = $this->WebService->getSeoUrl('video_url', $seo_id);
        return $final_url;
    }

    public function getRelatedPoster($poster_id, $subcat_id) {
        $related_poster = json_decode($this->WebService->getRelatedPoster($poster_id, $subcat_id));

        return $related_poster;
    }

    public function getVideoByMovie($cat_id, $movie_id, $video_id) {
        return $this->Front_Model->getVideoByMovie($cat_id, $movie_id, $video_id);
    }

    public function setDisLike() {
        $user_id = $this->session->userdata('front_userdata')->id;

        $video_id = $this->input->post('video_id');
        $cat_id = $this->input->post('cat_id');

        $activity = 'disliked';

        $this->WebService->setIsLike($user_id, $cat_id, $activity, $video_id);
    }

    public function setLike() {
        $user_id = $this->session->userdata('front_userdata')->id;

        $video_id = $this->input->post('video_id');
        $cat_id = $this->input->post('cat_id');
        if ($cat_id != '') {
            $activity = 'liked';

            $this->WebService->setIsLike($user_id, $cat_id, $activity, $video_id);
        }
    }

    public function getIsLiked($video_id, $cat_id) {
        $user_id = $this->session->userdata('front_userdata')->id;
        return $this->WebService->getUserLike($user_id, $video_id, $cat_id);
    }

    public function setPosterView() {

        $user_id = $this->session->userdata('front_userdata')->id;

        $poster_id = $this->input->post('video_id');
        $cat_id = $this->input->post('cat_id');

        $activity = 'poster_view';


        $this->WebService->setViewPlay($user_id, $activity, $poster_id, $cat_id);

        //echo 'done';
    }

    public function setShare() {

        $user_id = $this->session->userdata('front_userdata')->id;
        if ($user_id > 0) {
            $poster_id = $this->input->post('video_id');
            $cat_id = $this->input->post('cat_id');
            $shared_with = $this->input->post('share_with');

            $activity = 'share';

//            echo $user_id;exit;
            $this->WebService->setSharing($user_id, $cat_id, $activity, $poster_id, $shared_with);
        }
    }

}
