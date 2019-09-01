<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH . 'libraries/REST_Controller.php');

class Search extends REST_Controller {

    function __construct() {
        parent::__construct();
        $printarray = array();
        $err_code = CODE_INVALID_SERVICE;
        $message = "";
        $result = false;
        $this->auth = new stdClass;
        $this->load->helper('cookie');
//        $this->load->model('api/common_model');
    }

    function all1_post() {
        $global_search_keyword = $this->input->post('global_search_keyword');
        $type = $this->input->post('type');
        $page = $this->input->post('page');
        $_POST['api'] = 1;
        if (!isset($global_search_keyword)) {
            $message = 'Invalid api call or parameter missing.';
            $err_code = CODE_PARAM_MISSING;
            $result = false;
        } else {
            $FrontData = array();
            $page = (!empty($page) && $page > 0) ? $page : 1;
            if(!empty($type)) {
                $_POST['selected'] = $type;
            }
            if ($type == 'video') {                
                $FrontData = json_decode($this->Front_Model->searchTrailer($page, API_RECORD_LIMIT, 2));             
            } elseif ($type == 'poster') {
                $FrontData = json_decode($this->Front_Model->searchPoster($page, API_RECORD_LIMIT));                
            } elseif ($type == 'cast') {
                $FrontData = json_decode($this->Front_Model->searchIndividual($page, API_RECORD_LIMIT));                
            } elseif ($type == 'director') {
                $FrontData = json_decode($this->Front_Model->searchIndividual($page, API_RECORD_LIMIT));                
            } elseif ($type == 'music') {
                $FrontData = json_decode($this->Front_Model->searchIndividual($page, API_RECORD_LIMIT));                
            } elseif ($type == 'singer') {
                $FrontData = json_decode($this->Front_Model->searchIndividual($page, API_RECORD_LIMIT));                
            } elseif ($type == 'released_by') {
                $FrontData = json_decode($this->Front_Model->searchCompany($page, API_RECORD_LIMIT));                
            } elseif ($type == 'movie') {
                $FrontData = json_decode($this->Front_Model->searchMovie($page, API_RECORD_LIMIT));                
            } else {
                $FrontData = json_decode($this->Front_Model->searchTrailer($page, API_RECORD_LIMIT, 1));
            }
            $printarray['data'] = $FrontData;
            $message = '';
            $err_code = CODE_OK;
            $result = true;
        }
        $printarray['result'] = $result;
        $printarray['message'] = $message;
        $printarray['errorCode'] = $err_code;
        $this->response($printarray);
    }

     function all_search_post() {
        $global_search_keyword = rtrim($this->input->post('global_search_keyword'));
        $type = $this->input->post('type');
        $page = $this->input->post('page');
        $_POST['api'] = 1;
        if (!isset($global_search_keyword)) {
            $message = 'Invalid api call or parameter missing.';
            $err_code = CODE_PARAM_MISSING;
            $result = false;
        } else {
            $FrontData = array();
            $page = (!empty($page) && $page > 0) ? $page : 1;
            if(!empty($type)) {
                $_POST['selected'] = $type;
            }
           // if ($type == 'video') {                
                $FrontData['video'] = json_decode($this->Front_Model->searchTrailer_all_search_post($page, API_RECORD_LIMIT, 2));            //  print_r($FrontData);exit;   
            // elseif ($type == 'poster') {
                $FrontData['poster'] = json_decode($this->Front_Model->searchPoster($page, API_RECORD_LIMIT));                
            //} elseif ($type == 'cast') {
                $FrontData['cast'] = json_decode($this->Front_Model->searchIndividual_cast($page, API_RECORD_LIMIT));                
            //} elseif ($type == 'director') {
                $FrontData['director'] = json_decode($this->Front_Model->searchIndividual_director($page, API_RECORD_LIMIT));                
            //} elseif ($type == 'music') {
                $FrontData['music'] = json_decode($this->Front_Model->searchIndividual_music($page, API_RECORD_LIMIT));                
            //} elseif ($type == 'singer') {
                $FrontData['singer'] = json_decode($this->Front_Model->searchIndividual_singer($page, API_RECORD_LIMIT));                
           //} elseif ($type == 'released_by') {
                $FrontData['channel'] = json_decode($this->Front_Model->searchCompany($page, API_RECORD_LIMIT));                
           // } elseif ($type == 'movie') {
                $FrontData['movie'] = json_decode($this->Front_Model->searchMovie($page, API_RECORD_LIMIT));                
           // } else {
                $FrontData['trailer'] = json_decode($this->Front_Model->searchTrailer_all_search_post($page, API_RECORD_LIMIT, 1));

                $FrontData['playlist'] = json_decode($this->Front_Model->searchPlaylist($page, API_RECORD_LIMIT));
          //  }
            $printarray['data'] = $FrontData;
            $message = '';
            $err_code = CODE_OK;
            $result = true;
        }
        $printarray['result'] = $result;
        $printarray['message'] = $message;
        $printarray['errorCode'] = $err_code;
        $this->response($printarray);
    }

    public function all_post()
    {
        $global_search_keyword = $this->input->post('global_search_keyword');
        if (!isset($global_search_keyword)) 
        {
            $message = 'Invalid api call or parameter missing.';
            $err_code = CODE_PARAM_MISSING;
            $result = false;
        }
        else
        {
            $id = $this->My_model->getresult('SELECT id from movie where movie_name Like "%'.$global_search_keyword.'%" ');
            $id = $id[0]['id'];

            $FrontData = array();
            $is_exist = $this->My_model->getresult("SELECT movie.*,(case when movie.movie_img is not null then CONCAT('" . base_url() . "images/movies/',movie.movie_img) else null end) as thumb from movie where id = " . $id . " limit 1 ");
            if (count($is_exist) > 0) 
            {
                $FrontData['name'] = $is_exist[0]['movie_name'];
                $FrontData['value'] = $is_exist;
                $FrontData['cast'] = $this->My_model->getresult("SELECT personality.id as id,personality.personality_name as name,"
                        . "(case when personality.personality_img is not null then concat('" . base_url() . "','images/personality/',personality.personality_img) else null end) as thumb from "
                        . "personality left join movie_map_cast on movie_map_cast.personality_id = personality.id "
                        . "where personality.is_cast = 1 and movie_map_cast.movie_id = " . $is_exist[0]['id'] . "");

                $FrontData['director'] = $this->My_model->getresult("SELECT personality.id as id,personality.personality_name as name,"
                        . "(case when personality.personality_img is not null then concat('" . base_url() . "','images/personality/',personality.personality_img) else null end) as thumb from "
                        . "personality left join movie_map_director on movie_map_director.personality_id = personality.id "
                        . "where personality.is_director = 1 and movie_map_director.movie_id = " . $is_exist[0]['id'] . "");

                $FrontData['singer'] = $this->My_model->getresult("SELECT personality.id as id,personality.personality_name as name,"
                        . "(case when personality.personality_img is not null then concat('" . base_url() . "','images/personality/',personality.personality_img) else null end) as thumb from "
                        . "personality left join movie_map_singer on movie_map_singer.personality_id = personality.id "
                        . "where personality.is_singer = 1 and movie_map_singer.movie_id = " . $is_exist[0]['id'] . "");

                $FrontData['music_director'] = $this->My_model->getresult("SELECT personality.id as id,personality.personality_name as name,"
                        . "(case when personality.personality_img is not null then concat('" . base_url() . "','images/personality/',personality.personality_img) else null end) as thumb from "
                        . "personality left join movie_map_music on movie_map_music.personality_id = personality.id "
                        . "where personality.is_music_director = 1 and movie_map_music.movie_id = " . $is_exist[0]['id'] . "");    

                $FrontData['trailer'] = $this->My_model->getresult("SELECT video.*,video_map_movie.video_id,video_map_movie.movie_id 
                    from video_map_movie 
                    join video on video.id = video_map_movie.video_id
                    join movie on movie.id = video_map_movie.movie_id
                    where video.cat_id = 1 and movie.id=".$id); 

                $FrontData['song'] = $this->My_model->getresult("SELECT video.*,video_map_movie.video_id,video_map_movie.movie_id 
                    from video_map_movie 
                    join video on video.id = video_map_movie.video_id
                    join movie on movie.id = video_map_movie.movie_id
                    where video.cat_id = 2 and movie.id=".$id); 

                $FrontData['poster'] = $this->My_model->getresult("SELECT poster.*,poster_map_movie.movie_id,poster_map_movie.poster_id,poster_img.poster_image
                    from poster_map_movie 
                    join poster on poster.id = poster_map_movie.poster_id
                    join movie on movie.id = poster_map_movie.movie_id
                    join poster_img on poster_img.poster_id = poster.id
                    where  movie.id = ".$id." LIMIT 1"); 

                $FrontData['poster'][0]['poster_image'] = base_url().'images/poster/'.$FrontData['poster'][0]['poster_image'];

                $FrontData['language'] = $this->My_model->getresult("SELECT subcat_name as name from sub_category where id = " . $is_exist[0]['subcat_id']);            

                
                $printarray['data'] = $FrontData;
                $message = '';
                $err_code = CODE_OK;
                $result = true;
            } 
            else
            {
                $message = 'No data available';
                $err_code = CODE_OK;
                $result = true;
            }
        }
        $printarray['result'] = $result;
        $printarray['message'] = $message;
        $printarray['errorCode'] = $err_code;
        $this->response($printarray);
    }

}
