<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH . 'libraries/REST_Controller.php');

class Home extends REST_Controller {

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

    function data_post() { 
        $language = $this->input->post('language');
        if (!isset($language)) {
            $message = 'Invalid api call or parameter missing.';
            $err_code = CODE_PARAM_MISSING;
            $result = false;
        } else {
            $FrontData = array();
            if (!empty($language)) {
                $condition = "where LOWER(subcat_name) in ('" . str_replace(",", "','", $language) . "')";
            }
            $main_category = array(1 => "Trailer", 2 => "Video Song");
            $sub_category = $this->My_model->getresult("SELECT * from sub_category " . $condition);
            $temp = 0;
            foreach ($main_category as $Mainkey => $Mainvalue) {
                foreach ($sub_category as $key => $value) {
                    /*$result = $this->My_model->getresult("SELECT video.id as id,sub_category.subcat_name,video.video_name,                    
                    (case when video.video_thumb is not null then CONCAT('" . base_url() . "images/videothumb/',video.video_thumb) else null end) as thumb,video_url.final_url,video.video_url 
                    FROM video 
                    LEFT JOIN sub_category ON video.subcat_id=sub_category.id
                    LEFT JOIN video_url ON video_url.id=video.seo_url_id 
                    WHERE cat_id='" . $Mainkey . "' AND subcat_id='" . $value['id'] . "' AND    
                    video.is_deleted='0'
                    group by video.id
                    ORDER BY video.rel_date DESC
                    LIMIT 0," . API_RECORD_LIMIT . "");*/



                    $sql = "SELECT video.id as id,sub_category.subcat_name,video.video_name,video.subcat_id,video.cat_id,
                                       
                    (case when video.video_thumb is not null then CONCAT('" . base_url() . "images/videothumb/',video.video_thumb) else null end) as thumb,
                    CONCAT(video.liked,' Likes') as liked,CONCAT(video.play,' Playing') as play,video_url.final_url, 
                    (SELECT group_concat(personality_name) FROM `video_map_cast` inner join personality on personality.id = personality_id where video_id = video.id and is_cast = 1) as cast,(SELECT group_concat(personality_name) FROM `video_map_singer` inner join personality on personality.id = personality_id where video_id = video.id and is_singer = 1) as singer,(SELECT group_concat(personality_name) FROM `video_map_music` inner join personality on personality.id = personality_id where video_id = video.id and is_music_director = 1) as music_director,(SELECT group_concat(personality_name) FROM `video_map_director` inner join personality on personality.id = personality_id where video_id = video.id and is_director = 1) as director
                    FROM video 
                    LEFT JOIN sub_category ON video.subcat_id=sub_category.id
                    LEFT JOIN video_url ON video_url.id=video.seo_url_id 
                    WHERE cat_id='" . $Mainkey . "' AND subcat_id='" . $value['id'] . "' AND    
                    video.is_deleted='0'
                    group by video.id
                    ORDER BY video.rel_date DESC
                    LIMIT 0," . API_RECORD_LIMIT . "";


                    $result = $this->My_model->getresult($sql);


                    if ($Mainkey == 1) {
                        $url = base_url() . "movietrailer/";
                    } else {
                        $url = base_url() . "videosong/";
                    }

                    $FrontData[$temp]["name"] = $value['subcat_name'] . " " . $Mainvalue;
                    $k = 0;
                    $i = 0;
                    $result1 = array();

                    foreach ($result as $value)
                    {
                    $result1[$i] = $value;

                    $is_exist = $this->My_model->getresult("SELECT * from video where id = " . $value['id'] . " limit 1 ");
                    //print_r($is_exist);exit;
                    if (count($is_exist) > 0) {
                        

                        if($is_exist[0]['rel_date'] != "0000-00-00" && $is_exist[0]['rel_date'] != "0000-00-00 00:00:00")
                        {
                            //$FrontData['value'][0]['rel_date'] = strtotime($is_exist[0]['rel_date']);
                            $my_rel_date = strtotime($is_exist[0]['rel_date']);
                        }
                        else
                        {
                            //$FrontData['value'][0]['rel_date'] = "0";
                            $my_rel_date = "0";
                        }



                        if($is_exist[0]['created'] != "0000-00-00" && $is_exist[0]['created'] != "0000-00-00 00:00:00")
                        {
                            //$FrontData['value'][0]['created'] = strtotime($is_exist[0]['created']);
                            $my_created = strtotime($is_exist[0]['created']);
                        }
                        else
                        {
                            //$FrontData['value'][0]['created'] = "0";
                            $my_created = "0";
                        }



                        if($is_exist[0]['updated'] != "0000-00-00" && $is_exist[0]['updated'] != "0000-00-00 00:00:00")
                        {
                            //$FrontData['value'][0]['updated'] = strtotime($is_exist[0]['updated']);
                            $my_updated = strtotime($is_exist[0]['updated']);
                        }               
                        else
                        {
                            //$FrontData['value'][0]['updated'] = "0";
                            $my_updated = "0";
                        }



                        
                       

                        $MyFrontData['cast'] = $this->My_model->getresult("SELECT personality.id as id,personality.personality_name as name,"
                                . "(case when personality.personality_img is not null then concat('" . base_url() . "','images/personality/',personality.personality_img) else null end) as thumb from "
                                . "personality left join video_map_cast on video_map_cast.personality_id = personality.id "
                                . "where personality.is_cast = 1 and video_map_cast.video_id = " . $is_exist[0]['id'] . "");

                        $MyFrontData['director'] = $this->My_model->getresult("SELECT personality.id as id,personality.personality_name as name,"
                                . "(case when personality.personality_img is not null then concat('" . base_url() . "','images/personality/',personality.personality_img) else null end) as thumb from "
                                . "personality left join video_map_director on video_map_director.personality_id = personality.id "
                                . "where personality.is_director = 1 and video_map_director.video_id = " . $is_exist[0]['id'] . "");

                        $MyFrontData['singer'] = $this->My_model->getresult("SELECT personality.id as id,personality.personality_name as name,"
                                . "(case when personality.personality_img is not null then concat('" . base_url() . "','images/personality/',personality.personality_img) else null end) as thumb from "
                                . "personality left join video_map_singer on video_map_singer.personality_id = personality.id "
                                . "where personality.is_singer = 1 and video_map_singer.video_id = " . $is_exist[0]['id'] . "");

                        $MyFrontData['music_director'] = $this->My_model->getresult("SELECT personality.id as id,personality.personality_name as name,"
                                . "(case when personality.personality_img is not null then concat('" . base_url() . "','images/personality/',personality.personality_img) else null end) as thumb from "
                                . "personality left join video_map_music on video_map_music.personality_id = personality.id "
                                . "where personality.is_music_director = 1 and video_map_music.video_id = " . $is_exist[0]['id'] . "");

                        $MyFrontData['movie'] = $this->My_model->getresult("SELECT movie.id as id,movie.movie_name as name,"
                                . "(case when movie.movie_img is not null then concat('" . base_url() . "','images/movies/',movie.movie_img) else null end) as thumb from "
                                . "movie left join video_map_movie on video_map_movie.movie_id = movie.id "
                                . "where video_map_movie.video_id = " . $is_exist[0]['id'] . "");


                        $full_movie = $this->My_model->getresult("SELECT movie.full_movie from "
                                . "movie left join video_map_movie on video_map_movie.movie_id = movie.id "
                                . "where video_map_movie.video_id = " . $is_exist[0]['id'] . "");


                       $MyFrontData['full_movie'] = $full_movie[0]['full_movie'];

                        
                        /*$MyFrontData['language'] = $this->My_model->getresult("SELECT subcat_name as name from sub_category where id = " . $is_exist[0]['subcat_id']);
*/
                        $MyFrontData['channel'] = $this->My_model->getresult("SELECT released_by.id as id,released_by.rel_by_name as name,"
                                . "(case when released_by.rel_by_img then concat('" . base_url() . "','images/channel/',released_by.rel_by_img) else null end) as thumb from "
                                . "released_by left join video_map_relby on video_map_relby.rel_by_id = released_by.id "
                                . "where video_map_relby.video_id = " . $is_exist[0]['id'] . "");
                        $movie = $this->My_model->getresult('select * from video_map_movie where video_id = '.$value['id']);
                        

                        

                        $result1[$i]['detail_data'] = $MyFrontData;




                        $result1[$i]['video_url'] = $is_exist[0]['video_url'];
                        //$result1[$i]['rel_date'] = $my_rel_date;
                        $result1[$i]['youtube_views'] = $is_exist[0]['youtube_views'];
                        $result1[$i]['created'] = $my_created;
                        //$result1[$i]['updated'] = $my_updated;
                        $result1[$i]['you_tube_id'] = substr($is_exist[0]['video_url'],-11);

                         
                        
                    }
                    $i++;
                }


                    /*foreach ($result as $val) {
                        $data[$k] = $val;
                        $data[$k]['you_tube_id'] = substr($val['video_url'],-11);
                        $k++;
                    }*/


                    $FrontData[$temp]["value"] = $result1;
                    $temp++;
                }
            }

            foreach ($sub_category as $key => $value) {
                $result = $this->My_model->getresult("SELECT poster.id as id,sub_category.subcat_name,"
                        . "poster.poster_name as video_name,video_url.final_url,
                            (select CONCAT('" . base_url() . "images/poster/',poster_img.poster_image) from poster_img where poster_img.poster_id=poster.id order by poster_img.poster_type asc,poster_img.display_order asc limit 1) as thumb
                        FROM poster 
                LEFT JOIN sub_category ON poster.subcat_id=sub_category.id
                LEFT JOIN video_url ON video_url.id=poster.seo_url_id                 
                WHERE subcat_id='" . $value['id'] . "' AND    
                poster.is_deleted='0'
                group by poster.id                
                ORDER BY poster.rel_date DESC
                LIMIT 0," . API_RECORD_LIMIT . "");
                $url = base_url() . "movieposter/";
                $FrontData[$temp]["name"] = $value['subcat_name'] . " Poster";
                $FrontData[$temp]["value"] = $result;
                $temp++;
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

    function video_post() {
        $language = $this->input->post('language');
        $page = $this->input->post('page');
        $type = $this->input->post('type');
        $sub_type = $this->input->post('sub_type');
        $is_trending = $this->input->post('is_trending');
        if (!isset($language) || !isset($type)) {
            $message = 'Invalid api call or parameter missing.';
            $err_code = CODE_PARAM_MISSING;
            $result = false;
        } else {
            $condition = '';
            $datecondition = '';
            $order = 'video.rel_date DESC ';
            $offset = (isset($page) && $page > 1) ? (($page-1) * 100) : 0;
            $limit = " LIMIT $offset," . 100 . "";
            if ($type == 'trailer') {
                $Mainkey = 1;

                
            } else if ($type == 'video') {
                $Mainkey = 2;

                

                if (isset($sub_type) && $sub_type == 2) {
                    $condition .= " and (select count(video_map_movie.id) from video_map_movie where video_id = video.id and movie_id is not null) > 0 ";
                }
                if (isset($sub_type) && $sub_type == 1) {
                    $condition .= " and (select count(video_map_movie.id) from video_map_movie where video_id = video.id and movie_id is not null) = 0 ";
                }
            }

            if ($is_trending == 1) {

                if ($type == 'trailer'){
                $datecondition = ' and date(video.rel_date) > date("' . date('Y-m-d', strtotime("-30 days")) . '")';
            }

                if ($type == 'video'){
                $datecondition = ' and date(video.rel_date) > date("' . date('Y-m-d', strtotime("-7 days")) . '")';
            }

                
                $order = 'video.youtube_views DESC ';
            }
            $FrontData = array();
            $sub_category = $this->My_model->getresult("SELECT * from sub_category where LOWER(subcat_name) = '" . strtolower($language) . "'");
            $temp = 0;

            $condition .= $datecondition;

          //  print_r($condition);exit;
            foreach ($sub_category as $key => $value) { 


                $sql = "SELECT video.id as id,sub_category.subcat_name,video.video_name,video.cat_id,video.subcat_id,
                                       
                    (case when video.video_thumb is not null then CONCAT('" . base_url() . "images/videothumb/',video.video_thumb) else '' end) as thumb,
                    CONCAT(video.liked,' Likes') as liked,CONCAT(video.play,' Playing') as play,video_url.final_url, 
                    (SELECT group_concat(personality_name) FROM `video_map_cast` inner join personality on personality.id = personality_id where video_id = video.id and is_cast = 1) as cast,
                    (SELECT group_concat(personality_name) FROM `video_map_singer` inner join personality on personality.id = personality_id where video_id = video.id and is_singer = 1) as singer,
                    (SELECT group_concat(personality_name) FROM `video_map_music` inner join personality on personality.id = personality_id where video_id = video.id and is_music_director = 1) as music_director,
                    (SELECT group_concat(personality_name) FROM `video_map_director` inner join personality on personality.id = personality_id where video_id = video.id and is_director = 1) as director
                    FROM video 
                    LEFT JOIN sub_category ON video.subcat_id=sub_category.id
                    LEFT JOIN video_url ON video_url.id=video.seo_url_id 
                    WHERE cat_id='" . $Mainkey . "' AND subcat_id='" . $value['id'] . "' AND    
                    video.is_deleted='0' " . $condition . "
                    group by video.id
                    ORDER BY $order
                    " . $limit . "";

                    


                $result = $this->My_model->getresult($sql);

                if ($Mainkey == 1) {
                    $url = base_url() . "movietrailer/";
                } else {
                    $url = base_url() . "videosong/";
                }

                $i = 0;
                $result1 = array();
                foreach ($result as $value)
                {
                    $result1[$i] = $value;

                    $is_exist = $this->My_model->getresult("SELECT * from video where id = " . $value['id'] . " limit 1 ");
                    //print_r($is_exist);exit;
                    if (count($is_exist) > 0) {
                        

                        if($is_exist[0]['rel_date'] != "0000-00-00" && $is_exist[0]['rel_date'] != "0000-00-00 00:00:00")
                        {
                            //$FrontData['value'][0]['rel_date'] = strtotime($is_exist[0]['rel_date']);
                            $my_rel_date = strtotime($is_exist[0]['rel_date']);
                        }
                        else
                        {
                            //$FrontData['value'][0]['rel_date'] = "0";
                            $my_rel_date = "0";
                        }



                        if($is_exist[0]['created'] != "0000-00-00" && $is_exist[0]['created'] != "0000-00-00 00:00:00")
                        {
                            //$FrontData['value'][0]['created'] = strtotime($is_exist[0]['created']);
                            $my_created = strtotime($is_exist[0]['created']);
                        }
                        else
                        {
                            //$FrontData['value'][0]['created'] = "0";
                            $my_created = "0";
                        }



                        if($is_exist[0]['updated'] != "0000-00-00" && $is_exist[0]['updated'] != "0000-00-00 00:00:00")
                        {
                            //$FrontData['value'][0]['updated'] = strtotime($is_exist[0]['updated']);
                            $my_updated = strtotime($is_exist[0]['updated']);
                        }               
                        else
                        {
                            //$FrontData['value'][0]['updated'] = "0";
                            $my_updated = "0";
                        }



                        /*if($is_exist[0]['my_release'] != "0000-00-00" && $is_exist[0]['my_release'] != "0000-00-00 00:00:00")
                        {
                             $FrontData['value'][0]['my_release'] = strtotime($is_exist[0]['my_release']);
                        }
                        else
                        {
                             $FrontData['value'][0]['my_release'] = "0";
                        }*/
                       

                        $FrontData['cast'] = $this->My_model->getresult("SELECT personality.id as id,personality.personality_name as name,"
                                . "(case when personality.personality_img is not null then concat('" . base_url() . "','images/personality/',personality.personality_img) else '' end) as thumb from "
                                . "personality left join video_map_cast on video_map_cast.personality_id = personality.id "
                                . "where personality.is_cast = 1 and video_map_cast.video_id = " . $is_exist[0]['id'] . "");

                        $FrontData['director'] = $this->My_model->getresult("SELECT personality.id as id,personality.personality_name as name,"
                                . "(case when personality.personality_img is not null then concat('" . base_url() . "','images/personality/',personality.personality_img) else '' end) as thumb from "
                                . "personality left join video_map_director on video_map_director.personality_id = personality.id "
                                . "where personality.is_director = 1 and video_map_director.video_id = " . $is_exist[0]['id'] . "");

                        $FrontData['singer'] = $this->My_model->getresult("SELECT personality.id as id,personality.personality_name as name,"
                                . "(case when personality.personality_img is not null then concat('" . base_url() . "','images/personality/',personality.personality_img) else '' end) as thumb from "
                                . "personality left join video_map_singer on video_map_singer.personality_id = personality.id "
                                . "where personality.is_singer = 1 and video_map_singer.video_id = " . $is_exist[0]['id'] . "");

                        $FrontData['music_director'] = $this->My_model->getresult("SELECT personality.id as id,personality.personality_name as name,"
                                . "(case when personality.personality_img is not null then concat('" . base_url() . "','images/personality/',personality.personality_img) else '' end) as thumb from "
                                . "personality left join video_map_music on video_map_music.personality_id = personality.id "
                                . "where personality.is_music_director = 1 and video_map_music.video_id = " . $is_exist[0]['id'] . "");

                        $FrontData['movie'] = $this->My_model->getresult("SELECT movie.id as id,movie.movie_name as name,"
                                . "(case when movie.movie_img is not null then concat('" . base_url() . "','images/movies/',movie.movie_img) else '' end) as thumb from "
                                . "movie left join video_map_movie on video_map_movie.movie_id = movie.id "
                                . "where video_map_movie.video_id = " . $is_exist[0]['id'] . "");

                        $full_movie = $this->My_model->getresult("SELECT movie.full_movie from "
                                . "movie left join video_map_movie on video_map_movie.movie_id = movie.id "
                                . "where video_map_movie.video_id = " . $is_exist[0]['id'] . "");


                       $FrontData['full_movie'] = $full_movie[0]['full_movie'];
                        
                        /*$FrontData['language'] = $this->My_model->getresult("SELECT subcat_name as name from sub_category where id = " . $is_exist[0]['subcat_id']);*/

                        $FrontData['channel'] = $this->My_model->getresult("SELECT released_by.id as id,released_by.rel_by_name as name,"
                                . "(case when released_by.rel_by_img then concat('" . base_url() . "','images/channel/',released_by.rel_by_img) else null end) as thumb from "
                                . "released_by left join video_map_relby on video_map_relby.rel_by_id = released_by.id "
                                . "where video_map_relby.video_id = " . $is_exist[0]['id'] . "");
                        

                        $movie = $this->My_model->getresult('select * from video_map_movie where video_id = '.$value['id']);
                        

                        // if(!empty($movie))
                        // {
                        //     $poster = $this->My_model->getresult('select * from poster_map_movie where movie_id = '.$movie[0]['movie_id']);
                        //     if(!empty($poster))
                        //     {
                        //         $FrontData['poster'] = $this->My_model->getresult("SELECT poster.id as id,poster.poster_name as name,"
                        //             . "(case when poster_img.poster_image is not null then concat('" . base_url() . "','images/poster/',poster_img.poster_image) else null end) as thumb from "
                        //             . "poster_img left join poster on poster_img.poster_id = '".$poster[0]['poster_id']."' "
                        //             . "where poster.id = '".$poster[0]['poster_id']."'");
                        //     }
                        // }
                        
                    
                        

                        
                        

                        $result1[$i]['detail_data'] = $FrontData;




                        $result1[$i]['video_url'] = $is_exist[0]['video_url'];
                        //$result1[$i]['rel_date'] = $my_rel_date;
                        $result1[$i]['youtube_views'] = $is_exist[0]['youtube_views'];
                        $result1[$i]['created'] = $my_created;
                        //$result1[$i]['updated'] = $my_updated;
                        $result1[$i]['you_tube_id'] = substr($is_exist[0]['video_url'],-11);

                         
                        
                    }
                    $i++;
                }
                $FrontData = $result1;
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

    function personality_post() {
        $occupation = $this->input->post('occupation');
        $page = $this->input->post('page');
        if (!isset($occupation) && !in_array($occupation, array('cast', 'singer', 'director', 'music_director', 'channel'))) {
            $message = 'Invalid api call or parameter missing.';
            $err_code = CODE_PARAM_MISSING;
            $result = false;
        } else {
            $offset = (isset($page) && $page > 0) ? ($page * API_RECORD_LIMIT) : 0;
            $limit = " LIMIT $offset," . API_RECORD_LIMIT . "";
            if ($occupation != 'channel') {
                $result = $this->My_model->getresult("SELECT personality.id as id,personality_name as name,personality_title as title,                    
                    (case when personality.personality_img is not null then CONCAT('" . base_url() . "images/personality/',personality.personality_img) else null end) as thumb
                    FROM personality                     
                    WHERE status = 0 and is_" . $occupation . " = 1                     
                    " . $limit . "");
            } else {
                $result = $this->My_model->getresult("SELECT released_by.id as id,rel_by_name as name,rel_by_title as title,
                    rel_by_desc as description, rel_by_keywords as keywords,
                    (case when released_by.rel_by_img is not null then CONCAT('" . base_url() . "images/channel/',released_by.rel_by_img) else null end) as thumb
                    FROM released_by                     
                    WHERE status = 0 " . $limit . "");
            }
            $i=0;
            foreach ($result as $key => $row) {
            	$re[$i] = $row;
            	$re[$i]['movie_detail'] = $this->personalityDetails($row['id'],'movie','1');
            	
            	$i++;
            }
            $printarray['data'] = $re;
            $message = '';
            $err_code = CODE_OK;
            $result = true;
        }
        $printarray['result'] = $result;
        $printarray['message'] = $message;
        $printarray['errorCode'] = $err_code;
        $printarray['occupation'] = $occupation;
        $this->response($printarray);
    }

    function poster_post() {
        $language = $this->input->post('language');
        
        $page = $this->input->post('page');
        
        if (!isset($language)) {
            $message = 'Invalid api call or parameter missing.';
            $err_code = CODE_PARAM_MISSING;
            $result = false;
        } 
        else 
        {
            $offset = (isset($page) && $page > 1) ? (($page-1) * 50) : 0;
            $limit = " LIMIT $offset," . 50 . ""; 

            $FrontData = array();
            

            /*$sub_category = $this->My_model->getresult("SELECT * from sub_category where LOWER(subcat_name) in ('" . str_replace(",", "','", strtolower($language)) . "')");*/
            

            /*foreach ($sub_category as $key => $value) {
                $result = $this->My_model->getresult("SELECT poster.id as id,sub_category.subcat_name,"
                        . "poster.poster_name as video_name,poster_img.poster_type, CONCAT(poster.likes,' Likes') as liked,"
                        . "CONCAT(poster.views,' Views') as play,video_url.final_url,
                            (select CONCAT('" . base_url() . "images/poster/',poster_img.poster_image) from poster_img where poster_img.poster_id=poster.id order by poster_img.poster_type asc,poster_img.display_order asc limit 1) as thumb
                        FROM poster 
                LEFT JOIN sub_category ON poster.subcat_id=sub_category.id
                LEFT JOIN video_url ON video_url.id=poster.seo_url_id 
                LEFT JOIN poster_img ON poster_img.poster_id=poster.id                 
                WHERE subcat_id='" . $value['id'] . "'  AND    
                poster.is_deleted='0'                
                group by poster.id                
                ORDER BY poster.rel_date DESC 
               LIMIT 0," . API_RECORD_LIMIT . "");

                if (empty($FrontData)) {
                    $FrontData = $result;
                } else {
                    array_merge($FrontData, $result);
                }
            }*/

            $subcatname= 'All';

            if(strtolower($language) == 'all')
            {

                $results = $this->My_model->getresult("SELECT *,CONCAT(poster.likes,' Likes') as liked,"
                        . "CONCAT(poster.views,' Views') as play FROM poster 
                                        WHERE poster.is_deleted='0' ORDER BY poster.rel_date DESC".$limit);

            }
            else
            {

                $sub_category = $this->My_model->getresult("SELECT * from sub_category where LOWER(subcat_name)=('" . str_replace(",", "','", strtolower($language)) . "')");


                if($sub_category[0])
                {

                $results = $this->My_model->getresult("SELECT *,CONCAT(poster.likes,' Likes') as liked,"
                            . "CONCAT(poster.views,' Views') as play FROM poster 
                                            WHERE subcat_id = ".$sub_category[0]['id']." AND poster.is_deleted='0' ORDER BY poster.rel_date DESC".$limit);

                $subcatname= $sub_category[0]['subcat_name'];
                }
                else
                {
                    $results = [];
                }
            }


            $data = [];


            foreach($results as $result)
            {
                

                $img = $this->My_model->getresult("select CONCAT('" . base_url() . "images/poster/',poster_img.poster_image) as image,poster_type,width,height from poster_img where poster_img.poster_id=".$result['id']." order by poster_img.poster_type asc,poster_img.display_order asc limit 1");

                $url = $this->My_model->getresult("select final_url from video_url where video_url.id=".$result['seo_url_id']." limit 1");
                
                $data[] = [
                    'id' => $result['id'],
                    'video_name'=> $result['poster_name'],
                    'subcat_name'=>$subcatname,
                    'poster_type'=>$img[0]['poster_type'],
                    'liked'=>$result['liked'],
                    'play'=>$result['play'],
                    'final_url'=>$url[0]['final_url'],
                    'thumb'=>$img[0]['image'],
                    'width'=>$img[0]['width'],
                    'height'=>$img[0]['height'],
                    'created' => strtotime($result['created'])

                ];

            }


            $printarray['data'] = $data;
            $message = '';
            $err_code = CODE_OK;
            $result = true;
        }
        $printarray['result'] = $result;
        $printarray['message'] = $message;
        $printarray['errorCode'] = $err_code;
        $this->response($printarray);
    }


    function movie_year_post() {

        $result = $this->My_model->getresult("SELECT DISTINCT(YEAR(movie.my_release)) as yar FROM `movie` where YEAR(movie.my_release)<>0 order by yar");

        $year = [];

        foreach($result  as $key=>$val)
        {
            $p = $val['yar'];
            $year[$p] = $p;

        }

        $printarray['result'] =  $year;
        $printarray['message'] = '';
        $printarray['errorCode'] = '200';


        $this->response($printarray);


        //echo '<pre>'; print_r($year ); die('kkk');
    }


    function movie_post() {
        $language = $this->input->post('language');
        $page = $this->input->post('page');
        $month = $this->input->post('month');
        $year = $this->input->post('year');

        

        if (!isset($language) || $language == "") {

            $where = "WHERE movie.status='0' and (YEAR(movie.my_release) = YEAR(NOW()))  AND (MONTH(movie.my_release) = MONTH(NOW())) ";
        
            if(!empty($year) && !empty($month))
            {

                $where = "WHERE movie.status='0' and (YEAR(movie.my_release) = ".$year.")  AND (MONTH(movie.my_release) = ".$month.")";
                
            }


           // echo "ds";exit;
            // $offset = (isset($page) && $page > 0) ? ($page * API_RECORD_LIMIT) : 0;
            // $limit = " LIMIT $offset," . API_RECORD_LIMIT . "";
            $offset = (isset($page) && $page > 0) ? ($page * 120) : 0;
            $limit = " LIMIT $offset,120";

          //  $FrontData = array();
                      
                $result = $this->My_model->getresult("SELECT movie.id as id,MONTH(movie.my_release) as month,YEAR(movie.my_release) as year,movie.movie_name,sub_category.subcat_name as subcat_name, movie.full_movie,                  
                    (case when movie.movie_img is not null then CONCAT('" . base_url() . "images/movies/',movie.movie_img) else null end) as thumb,
                    video_url.final_url FROM movie                     
                    LEFT JOIN video_url ON video_url.id=movie.seo_url_id 
                     LEFT JOIN sub_category ON sub_category.id=movie.subcat_id 
                    ".$where." 
                    group by movie.id
                    ORDER BY year DESC,IF(MONTH(movie.my_release) < MONTH(NOW()), MONTH(movie.my_release) + 12, MONTH(movie.my_release)),
 DAY(movie.my_release)
                    " . $limit . "");

         ///   print_r($result);exit;


            $printarray['data'] = $result;
            $message = '';
            $err_code = CODE_OK;
            $result = true;
        } else {
            // $offset = (isset($page) && $page > 0) ? ($page * API_RECORD_LIMIT) : 0;
            // $limit = " LIMIT $offset," . API_RECORD_LIMIT . "";
            $offset = (isset($page) && $page > 0) ? ($page * 120) : 0;
            $limit = " LIMIT $offset,120";


            

            $FrontData = array();
            $sub_category = $this->My_model->getresult("SELECT * from sub_category where LOWER(subcat_name) in ('" . str_replace(",", "','", strtolower($language)) . "')");
            foreach ($sub_category as $key => $value) {



                $where = "WHERE subcat_id like '%" . $value['id'] . "%' and (YEAR(movie.my_release) = YEAR(NOW()))  AND (MONTH(movie.my_release) = MONTH(NOW())) and movie.status='0'";
        
            if(!empty($year) && !empty($month))
            {

                
                $where = "WHERE subcat_id like '%" . $value['id'] . "%' and (YEAR(movie.my_release) = ".$year.")  AND (MONTH(movie.my_release) = ".$month.") and movie.status='0'";
                
            }

            
                $result = $this->My_model->getresult("SELECT movie.id as id,'" . $value['subcat_name'] . "' as subcat_name,MONTH(movie.my_release) as month,YEAR(movie.my_release) as year,movie.movie_name,movie.full_movie,                    
                    (case when movie.movie_img is not null then CONCAT('" . base_url() . "images/movies/',movie.movie_img) else null end) as thumb,
                    video_url.final_url FROM movie                     
                    LEFT JOIN video_url ON video_url.id=movie.seo_url_id 
                    ".$where."
                    group by movie.id
                    ORDER BY year DESC,IF(MONTH(movie.my_release) < MONTH(NOW()), MONTH(movie.my_release) + 12, MONTH(movie.my_release)),
 DAY(movie.my_release)
                    " . $limit . "");

            


                if (empty($FrontData)) {
                    $FrontData = $result;
                } else {
                    array_merge($FrontData, $result);
                }
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


    function redeempoint_post() {

        $user_id = $this->input->post('user_id');
        $code = $this->input->post('code');

        if (!isset($user_id)) {
            $message = 'Invalid api call or parameter missing.';
            $err_code = 'user_id required';
            $result = false;
        }

        if (!isset($code)) {
            $message = 'Invalid api call or parameter missing.';
            $err_code = 'code required';
            $result = false;
        }


        $times = 10;

        // check user not reddemm own code
        $sql = "SELECT count(*) as total FROM user WHERE id = ".$user_id." and share_code = '".$code."'";
        $data = $this->My_model->getresult($sql);
        if($data[0]['total'] == 1)
        {

            $message = 'user can not redeemed own code.';
            $err_code = 'user can not redeemed own code';
            $result = false;


            $printarray['result'] = $result;
            $printarray['message'] = $message;
            $printarray['errorCode'] = $err_code;
            $this->response($printarray);

        }


        // check user_id reddem first time
        $sql = "SELECT count(*) as total FROM user_share_code WHERE user_id = ".$user_id." and shared_code = '".$code."'";
        $data = $this->My_model->getresult($sql);
        if($data[0]['total'] == 1)
        {

            $message = 'this user has already redeemed once with this code.';
            $err_code = 'this user has already redeemed once with this code.';
            $result = false;


            $printarray['result'] = $result;
            $printarray['message'] = $message;
            $printarray['errorCode'] = $err_code;
            $this->response($printarray);

        }


        // check code is valid
        $sql = "SELECT count(*) as total FROM user WHERE share_code = '".$code."'";
        $data = $this->My_model->getresult($sql);
        if($data[0]['total'] == 0)
        {

            $message = 'invalid code.';
            $err_code = 'invalid code';
            $result = false;


            $printarray['result'] = $result;
            $printarray['message'] = $message;
            $printarray['errorCode'] = $err_code;
            $this->response($printarray);

        }



        $sql = "SELECT count(*) as total FROM user_share_code WHERE shared_code = '".$code."'";
        $data = $this->My_model->getresult($sql);
        if($data[0]['total'] > $times)
        {

            $message = 'code has reached to its redeemed limit.';
            $err_code = 'code has reached to its redeemed limit';
            $result = false;


            $printarray['result'] = $result;
            $printarray['message'] = $message;
            $printarray['errorCode'] = $err_code;
            $this->response($printarray);

        }

    
        

        $this->db->insert('user_share_code',['shared_code' => $code, 'user_id'=>$user_id]);
        





        $sql = "SELECT * FROM user WHERE share_code = '".$code."'";
        $data = $this->My_model->getresult($sql);
        $u_user_id = $data[0]['id'];


        $sql = "SELECT * FROM user_points WHERE user_id = '".$u_user_id."'";
        $data = $this->My_model->getresult($sql);
        $total_invite = $data[0]['total_invite'];
        $earn_points = $data[0]['earn_points'];



        // get dynamic points from points table 
        $sql      = "SELECT * FROM points WHERE points_for = 'invite_friend'";
        $data     = $this->My_model->getresult($sql);
        $addpoint = $data[0]['points'];

        $newt = $total_invite + $addpoint;
        $newe = $earn_points + $addpoint;
        


        $this->db->update('user_points',['total_invite' => $newt, 'earn_points' => $newe],array('user_id'=>$u_user_id));
        



        


        //update user table for that user_id  


        //user_points

        $printarray['result'] = true;
        $printarray['message'] = 'points are redeemed successfully';
        $printarray['errorCode'] = 'points are redeemed successfully';
        $this->response($printarray);




    }


    function addviews_post() {

        $type = $this->input->post('type');
        $id   = $this->input->post('id');
        $ip   = $this->input->post('ip');





        if (!isset($type)) {
            $message = 'Invalid api call or parameter missing.';
            $err_code = 'type required';
            $result = false;
        }

        if (!isset($id)) {
            $message = 'Invalid api call or parameter missing.';
            $err_code = 'id required';
            $result = false;
        }

        if (!isset($ip)) {
            $message = 'Invalid api call or parameter missing.';
            $err_code = 'ip required';
            $result = false;
        }

        

        

        // check user not reddemm own code
        $sql = "SELECT count(*) as total FROM ip_address_view WHERE type = '".$type."' and ipaddress = '".$ip."' and item_id = ".$id."";
        $data = $this->My_model->getresult($sql);
        if($data[0]['total'] > 0)
        {

            $message = 'already view added for this id and ip.';
            $err_code = 'already view added for this id and ip.';
            $result = false;


            $printarray['result'] = $result;
            $printarray['message'] = $message;
            $printarray['errorCode'] = $err_code;
            $this->response($printarray);

        }

    



        if($type == 'video')
        {


                $sql = "SELECT count(*) as total FROM video WHERE id = ".$id."";
                $data = $this->My_model->getresult($sql);
                if($data[0]['total'] == 0)
                {

                    $message = 'wrong video id passed.';
                    $err_code = 'wrong video id passed.';
                    $result = false;


                    $printarray['result'] = $result;
                    $printarray['message'] = $message;
                    $printarray['errorCode'] = $err_code;
                    $this->response($printarray);

                }




                $sql      = "SELECT * FROM video WHERE id = ".$id;
                $data     = $this->My_model->getresult($sql);
                $addpoint = $data[0]['play'];

                $newt = 1 + $addpoint;
                
                


                $this->db->update('video',['play' => $newt],array('id'=>$id));

                

                $this->db->insert('ip_address_view',['type' => $type, 'ipaddress'=>$ip, 'item_id'=>$id, 'created'=>date("Y-m-d H:i:s")]);
                
        }


        if($type == 'poster')
        {


                $sql = "SELECT count(*) as total FROM poster WHERE id = ".$id."";
                $data = $this->My_model->getresult($sql);
                if($data[0]['total'] == 0)
                {

                    $message = 'wrong poster id passed.';
                    $err_code = 'wrong poster id passed.';
                    $result = false;


                    $printarray['result'] = $result;
                    $printarray['message'] = $message;
                    $printarray['errorCode'] = $err_code;
                    $this->response($printarray);

                }

                $sql      = "SELECT * FROM poster WHERE id = ".$id;
                $data     = $this->My_model->getresult($sql);
                $addpoint = $data[0]['views'];

                $newt = 1 + $addpoint;
                
                


                $this->db->update('poster',['views' => $newt],array('id'=>$id));

                

                $this->db->insert('ip_address_view',['type' => $type, 'ipaddress'=>$ip, 'item_id'=>$id, 'created'=>date("Y-m-d H:i:s")]);
                
        }




        

        //user_points

        $printarray['result'] = true;
        $printarray['message'] = 'view count successfully added';
        $printarray['errorCode'] = 'view count successfully added';
        $this->response($printarray);




    }
    
    function playlist_post() {
        $language = $this->input->post('language');
        $page = $this->input->post('page');
        if (!isset($language)) {
            $message = 'Invalid api call or parameter missing.';
            $err_code = CODE_PARAM_MISSING;
            $result = false;
        } else {
            $offset = (isset($page) && $page > 0) ? ($page * API_RECORD_LIMIT) : 0;
            $limit = " LIMIT $offset," . API_RECORD_LIMIT . "";

            $FrontData = array();
            $sub_category = $this->My_model->getresult("SELECT * from sub_category where LOWER(subcat_name) in ('" . str_replace(",", "','", strtolower($language)) . "')");
            foreach ($sub_category as $key => $value) {
                $result = $this->My_model->getresult("SELECT playlist.id as id,playlist.name as playlist_name,                     
                    (case when playlist.playlist_thumb is not null then CONCAT('" . base_url() . "images/playlistthumb/',playlist.playlist_thumb) else null end) as thumb
                     FROM playlist                                          
                    WHERE subcat_id like '%" . $value['id'] . "%' AND    
                    playlist.is_deleted='0'");

                if (empty($FrontData)) {
                    $FrontData = $result;
                } else {
                    array_merge($FrontData, $result);
                }
            }

            $printarray['data'] = array_unique($FrontData);
            $message = '';
            $err_code = CODE_OK;
            $result = true;
        }
        $printarray['result'] = $result;
        $printarray['message'] = $message;
        $printarray['errorCode'] = $err_code;
        $this->response($printarray);
    }

     function playlist_get() { 
         $columns = array('playlist.id', 'playlist.created', 'playlist.name', 'playlist.playlist_thumb',
            'playlist.show_in_app', 'playlist.is_deleted','playlist.redirect_link','playlist.subcat_id');
         $posts = $this->My_model->getresult("
               SELECT " . implode(',', $columns) . " FROM playlist                
               where playlist.is_deleted=0
               
            ");
         if (!empty($posts)) {
            foreach ($posts as $post) {
                $id = $post['id'];
                $action = "";
                
                if (!empty($post['playlist_thumb'])) {
                    $img = base_url() . 'images/playlistthumb/' . $post['playlist_thumb'];
                } else {
                    $img = base_url() . 'assets/images/no-user.svg';
                }
                $nestedData["id"] = $post['id'];
                $nestedData["name"] = $post['name'];
                $nestedData["created"] = strtotime($post['created']);
                $show_in_app = explode(",", $post['show_in_app']);
                $show_in_app_text = '';
                foreach ($show_in_app as $show) {
                    if ($show == 1) {
                        $show_in_app_text .= 'Home,';
                    } elseif ($show == 2) {
                        $show_in_app_text .= 'Trailer,';
                    } elseif ($show == 3) {
                        $show_in_app_text .= 'Video Song,';
                    } elseif ($show == 4) {
                        $show_in_app_text .= 'Poster';
                    }
                }

                $nestedData["show_in_app"] = trim($show_in_app_text, ',');
                $nestedData["img"] =$img;
                $nestedData["redirect_link"] =$post['redirect_link'];
                $all_language = explode(",", $post['subcat_id']);
                $sub_category = $this->My_model->getresult("SELECT * from sub_category");
                $lang = array();
                foreach ($sub_category as $language) 
                {
                    if(in_array($language['id'],$all_language))
                    {
                        $lang[] =$language['subcat_name'] ;
                    }
                }

                $nestedData['language'] = $lang;

                $data[] = $nestedData;
                $number++;
            }
        }

            
          

            $printarray['data'] =$data;
            $message = '';
            $err_code = CODE_OK;
            $result = true;
    
        $printarray['result'] = $result;
        $printarray['message'] = $message;
        $printarray['errorCode'] = $err_code;
        $this->response($printarray);
    }

     function playlist_language_wise_post() 
     {
        if($_POST['language'] != "")
        {
            $languageId  = $this->db->get_where('sub_category',array('subcat_name' => $_POST['language']))->row();
            if(!empty($languageId))
            {
                $languageId = $languageId->id;    
            }
            else
            {
                $languageId = 1;
            }
            //print_r($languageId);exit;
            
            $columns = array('playlist.id', 'playlist.created', 'playlist.name', 'playlist.playlist_thumb',
            'playlist.show_in_app', 'playlist.is_deleted','playlist.redirect_link','playlist.subcat_id');
             $posts = $this->My_model->getresult("
                   SELECT " . implode(',', $columns) . " FROM playlist                
                   where playlist.is_deleted=0 and find_in_set(".$languageId.",playlist.subcat_id)  order by playlist.created DESC 
                   
                ");
             if (!empty($posts)) {
                foreach ($posts as $post) {
                    $id = $post['id'];
                    $action = "";
                    
                    if (!empty($post['playlist_thumb'])) {
                        $img = base_url() . 'images/playlistthumb/' . $post['playlist_thumb'];
                    } else {
                        $img = base_url() . 'assets/images/no-user.svg';
                    }
                    $nestedData["id"] = $post['id'];
                    $nestedData["name"] = $post['name'];
                    $nestedData["created"] = strtotime($post['created']);
                    $show_in_app = explode(",", $post['show_in_app']);
                    $show_in_app_text = '';
                    foreach ($show_in_app as $show) {
                        if ($show == 1) {
                            $show_in_app_text .= 'Home,';
                        } elseif ($show == 2) {
                            $show_in_app_text .= 'Trailer,';
                        } elseif ($show == 3) {
                            $show_in_app_text .= 'Video Song,';
                        } elseif ($show == 4) {
                            $show_in_app_text .= 'Poster';
                        }
                    }

                    $nestedData["show_in_app"] = trim($show_in_app_text, ',');
                    $nestedData["img"] =$img;
                    $nestedData["redirect_link"] =$post['redirect_link'];
                    $all_language = explode(",", $post['subcat_id']);
                    $sub_category = $this->My_model->getresult("SELECT * from sub_category");
                    $lang = array();
                    foreach ($sub_category as $language) 
                    {
                        if(in_array($language['id'],$all_language))
                        {
                            $lang[] =$language['subcat_name'] ;
                        }
                    }

                    $nestedData['language'] = $lang;

                    $data[] = $nestedData;
                    $number++;
                }
            }

                
              

                $printarray['data'] =$data;
                $message = '';
                $err_code = CODE_OK;
                $result = true;
        
            $printarray['result'] = $result;
            $printarray['message'] = $message;
            $printarray['errorCode'] = $err_code;
        }
        else
        {
            $printarray['message'] ='parameter missing';
            $printarray['status'] = false;
        }
         
        $this->response($printarray);
    }

    public function playlist_detail_post()
    {
        $playlist_id = $this->input->post('playlist_id');
        
        if (!isset($playlist_id)) {
            $message = 'Invalid api call or parameter missing.';
            $err_code = CODE_PARAM_MISSING;
            $result = false;
        } else {
            $this->db->order_by('video_id','DESC');
            $video_list = $this->db->get_where('playlist_map_video',array('playlist_id'=>$playlist_id))->result_array();
            $i = 0;
            foreach ($video_list as $row ) 
            {
                $data[$i]= $this->single_video_detail_new($row['video_id']);
                $i++;
            }
                
        }
        $printarray['data'] = $data;
        $message = '';
        $err_code = CODE_OK;
        $result = true;

        $printarray['result'] = $result;
        $printarray['message'] = $message;
        $printarray['errorCode'] = $err_code;
        $this->response($printarray);

    }



    public function single_video_detail_new($video_id)
    {
        $id = $video_id;
        $FrontData = array();
        $data = [];
        
         $sql = "SELECT video.id as id,sub_category.subcat_name,video.video_name,video.subcat_id,video.cat_id,
                                       
                    (case when video.video_thumb is not null then CONCAT('" . base_url() . "images/videothumb/',video.video_thumb) else null end) as thumb,
                    CONCAT(video.liked,' Likes') as liked,CONCAT(video.play,' Playing') as play,video_url.final_url, 
                    (SELECT group_concat(personality_name) FROM `video_map_cast` inner join personality on personality.id = personality_id where video_id = video.id and is_cast = 1) as cast,(SELECT group_concat(personality_name) FROM `video_map_singer` inner join personality on personality.id = personality_id where video_id = video.id and is_singer = 1) as singer,(SELECT group_concat(personality_name) FROM `video_map_music` inner join personality on personality.id = personality_id where video_id = video.id and is_music_director = 1) as music_director,(SELECT group_concat(personality_name) FROM `video_map_director` inner join personality on personality.id = personality_id where video_id = video.id and is_director = 1) as director
                    FROM video 
                    LEFT JOIN sub_category ON video.subcat_id=sub_category.id
                    LEFT JOIN video_url ON video_url.id=video.seo_url_id 
                    WHERE video.id='" . $id . "' AND    
                    video.is_deleted='0'
                    group by video.id
                    ORDER BY video.rel_date DESC
                    LIMIT 0," . API_RECORD_LIMIT . "";


                    $result = $this->My_model->getresult($sql);

$Mainkey =1;
                    if ($Mainkey == 1) {
                        $url = base_url() . "movietrailer/";
                    } else {
                        $url = base_url() . "videosong/";
                    }

                    $FrontData[$temp]["name"] = $value['subcat_name'] . " " . $Mainvalue;
                    $k = 0;
                    $i = 0;
                    $result1 = array();

                    foreach ($result as $value)
                    {

                    $result1[$i] = $value;

                    $is_exist = $this->My_model->getresult("SELECT * from video where id = " . $value['id'] . " limit 1 ");
                    //print_r($is_exist);exit;
                    if (count($is_exist) > 0) {
                        

                        if($is_exist[0]['rel_date'] != "0000-00-00" && $is_exist[0]['rel_date'] != "0000-00-00 00:00:00")
                        {
                            //$FrontData['value'][0]['rel_date'] = strtotime($is_exist[0]['rel_date']);
                            $my_rel_date = strtotime($is_exist[0]['rel_date']);
                        }
                        else
                        {
                            //$FrontData['value'][0]['rel_date'] = "0";
                            $my_rel_date = "0";
                        }



                        if($is_exist[0]['created'] != "0000-00-00" && $is_exist[0]['created'] != "0000-00-00 00:00:00")
                        {
                            //$FrontData['value'][0]['created'] = strtotime($is_exist[0]['created']);
                            $my_created = strtotime($is_exist[0]['created']);
                        }
                        else
                        {
                            //$FrontData['value'][0]['created'] = "0";
                            $my_created = "0";
                        }



                        if($is_exist[0]['updated'] != "0000-00-00" && $is_exist[0]['updated'] != "0000-00-00 00:00:00")
                        {
                            //$FrontData['value'][0]['updated'] = strtotime($is_exist[0]['updated']);
                            $my_updated = strtotime($is_exist[0]['updated']);
                        }               
                        else
                        {
                            //$FrontData['value'][0]['updated'] = "0";
                            $my_updated = "0";
                        }



                        
                       

                        $MyFrontData['cast'] = $this->My_model->getresult("SELECT personality.id as id,personality.personality_name as name,"
                                . "(case when personality.personality_img is not null then concat('" . base_url() . "','images/personality/',personality.personality_img) else null end) as thumb from "
                                . "personality left join video_map_cast on video_map_cast.personality_id = personality.id "
                                . "where personality.is_cast = 1 and video_map_cast.video_id = " . $is_exist[0]['id'] . "");

                        $MyFrontData['director'] = $this->My_model->getresult("SELECT personality.id as id,personality.personality_name as name,"
                                . "(case when personality.personality_img is not null then concat('" . base_url() . "','images/personality/',personality.personality_img) else null end) as thumb from "
                                . "personality left join video_map_director on video_map_director.personality_id = personality.id "
                                . "where personality.is_director = 1 and video_map_director.video_id = " . $is_exist[0]['id'] . "");

                        $MyFrontData['singer'] = $this->My_model->getresult("SELECT personality.id as id,personality.personality_name as name,"
                                . "(case when personality.personality_img is not null then concat('" . base_url() . "','images/personality/',personality.personality_img) else null end) as thumb from "
                                . "personality left join video_map_singer on video_map_singer.personality_id = personality.id "
                                . "where personality.is_singer = 1 and video_map_singer.video_id = " . $is_exist[0]['id'] . "");

                        $MyFrontData['music_director'] = $this->My_model->getresult("SELECT personality.id as id,personality.personality_name as name,"
                                . "(case when personality.personality_img is not null then concat('" . base_url() . "','images/personality/',personality.personality_img) else null end) as thumb from "
                                . "personality left join video_map_music on video_map_music.personality_id = personality.id "
                                . "where personality.is_music_director = 1 and video_map_music.video_id = " . $is_exist[0]['id'] . "");

                        $MyFrontData['movie'] = $this->My_model->getresult("SELECT movie.id as id,movie.movie_name as name,"
                                . "(case when movie.movie_img is not null then concat('" . base_url() . "','images/movies/',movie.movie_img) else null end) as thumb from "
                                . "movie left join video_map_movie on video_map_movie.movie_id = movie.id "
                                . "where video_map_movie.video_id = " . $is_exist[0]['id'] . "");


                        $full_movie = $this->My_model->getresult("SELECT movie.full_movie from "
                                . "movie left join video_map_movie on video_map_movie.movie_id = movie.id "
                                . "where video_map_movie.video_id = " . $is_exist[0]['id'] . "");


                       $MyFrontData['full_movie'] = $full_movie[0]['full_movie'];

                        
                        /*$MyFrontData['language'] = $this->My_model->getresult("SELECT subcat_name as name from sub_category where id = " . $is_exist[0]['subcat_id']);
*/
                        $MyFrontData['channel'] = $this->My_model->getresult("SELECT released_by.id as id,released_by.rel_by_name as name,"
                                . "(case when released_by.rel_by_img then concat('" . base_url() . "','images/channel/',released_by.rel_by_img) else null end) as thumb from "
                                . "released_by left join video_map_relby on video_map_relby.rel_by_id = released_by.id "
                                . "where video_map_relby.video_id = " . $is_exist[0]['id'] . "");
                        $movie = $this->My_model->getresult('select * from video_map_movie where video_id = '.$value['id']);
                        

                        

                        $result1[$i]['detail_data'] = $MyFrontData;




                        $result1[$i]['video_url'] = $is_exist[0]['video_url'];
                        //$result1[$i]['rel_date'] = $my_rel_date;
                        $result1[$i]['youtube_views'] = $is_exist[0]['youtube_views'];
                        $result1[$i]['created'] = $my_created;
                        //$result1[$i]['updated'] = $my_updated;
                        $result1[$i]['you_tube_id'] = substr($is_exist[0]['video_url'],-11);

                        

                         //$data = ['name'=>$is_exist[0]['video_name'],'value' => $result1];
                        }
                    }



        return $result1[$i];


    }

    public function single_video_detail($video_id)
    {
        $id = $video_id;
        $FrontData = array();
        $is_exist = $this->My_model->getresult("SELECT * from video where id = " . $id . " limit 1 ");
        if (count($is_exist) > 0)
        {
            $FrontData['name'] = $is_exist[0]['video_name'];
            $FrontData['value'] = $is_exist;
            $FrontData['value'][0]['you_tube_id'] = substr($is_exist[0]['video_url'],-11);;
            $FrontData['value'][0]['video_thumb'] = BASE_URL().'images/videothumb/'.$is_exist[0]['video_thumb'];
            if($is_exist[0]['rel_date'] != "0000-00-00" && $is_exist[0]['rel_date'] != "0000-00-00 00:00:00")
            {
                $FrontData['value'][0]['rel_date'] = strtotime($is_exist[0]['rel_date']);
            }
            else
            {
                $FrontData['value'][0]['rel_date'] = "0";
            }
            if($is_exist[0]['created'] != "0000-00-00" && $is_exist[0]['created'] != "0000-00-00 00:00:00")
            {
                $FrontData['value'][0]['created'] = strtotime($is_exist[0]['created']);
            }
            else
            {
                $FrontData['value'][0]['created'] = "0";
            }
            if($is_exist[0]['updated'] != "0000-00-00" && $is_exist[0]['updated'] != "0000-00-00 00:00:00")
            {
                $FrontData['value'][0]['updated'] = strtotime($is_exist[0]['updated']);
            }               
            else
            {
                $FrontData['value'][0]['updated'] = "0";
            }
            if($is_exist[0]['my_release'] != "0000-00-00" && $is_exist[0]['my_release'] != "0000-00-00 00:00:00")
            {
                 $FrontData['value'][0]['my_release'] = strtotime($is_exist[0]['my_release']);
            }
            else
            {
                 $FrontData['value'][0]['my_release'] = "0";
            }
           

            $FrontData['cast'] = $this->My_model->getresult("SELECT personality.id as id,personality.personality_name as name,"
                    . "(case when personality.personality_img is not null then concat('" . base_url() . "','images/personality/',personality.personality_img) else null end) as thumb from "
                    . "personality left join video_map_cast on video_map_cast.personality_id = personality.id "
                    . "where personality.is_cast = 1 and video_map_cast.video_id = " . $is_exist[0]['id'] . "");

            $FrontData['director'] = $this->My_model->getresult("SELECT personality.id as id,personality.personality_name as name,"
                    . "(case when personality.personality_img is not null then concat('" . base_url() . "','images/personality/',personality.personality_img) else null end) as thumb from "
                    . "personality left join video_map_director on video_map_director.personality_id = personality.id "
                    . "where personality.is_director = 1 and video_map_director.video_id = " . $is_exist[0]['id'] . "");

            $FrontData['singer'] = $this->My_model->getresult("SELECT personality.id as id,personality.personality_name as name,"
                    . "(case when personality.personality_img is not null then concat('" . base_url() . "','images/personality/',personality.personality_img) else null end) as thumb from "
                    . "personality left join video_map_singer on video_map_singer.personality_id = personality.id "
                    . "where personality.is_singer = 1 and video_map_singer.video_id = " . $is_exist[0]['id'] . "");

            $FrontData['music_director'] = $this->My_model->getresult("SELECT personality.id as id,personality.personality_name as name,"
                    . "(case when personality.personality_img is not null then concat('" . base_url() . "','images/personality/',personality.personality_img) else null end) as thumb from "
                    . "personality left join video_map_music on video_map_music.personality_id = personality.id "
                    . "where personality.is_music_director = 1 and video_map_music.video_id = " . $is_exist[0]['id'] . "");

            $FrontData['movie'] = $this->My_model->getresult("SELECT movie.id as id,movie.movie_name as name,"
                    . "(case when movie.movie_img is not null then concat('" . base_url() . "','images/movies/',movie.movie_img) else null end) as thumb from "
                    . "movie left join video_map_movie on video_map_movie.movie_id = movie.id "
                    . "where video_map_movie.video_id = " . $is_exist[0]['id'] . "");
            $FrontData['language'] = $this->My_model->getresult("SELECT subcat_name as name from sub_category where id = " . $is_exist[0]['subcat_id']);
            $FrontData['channel'] = $this->My_model->getresult("SELECT released_by.id as id,released_by.rel_by_name as name,"
                    . "(case when released_by.rel_by_img then concat('" . base_url() . "','images/channel/',released_by.rel_by_img) else null end) as thumb from "
                    . "released_by left join video_map_relby on video_map_relby.rel_by_id = released_by.id "
                    . "where video_map_relby.video_id = " . $is_exist[0]['id'] . "");
            $movie = $this->My_model->getresult('select * from video_map_movie where video_id = '.$id);
        }
        return $FrontData;


    }

    public function personalityDetails($id,$mstps,$page) {
        // $id = $this->input->post('id');
        // $mstps = $this->input->post('type');
        // $page = $this->input->post('page');
        if (!isset($id) && $id > 0) {
            $message = 'Invalid api call or parameter missing.';
            $err_code = CODE_PARAM_MISSING;
            $result = false;
        } else {
            $resultData = $this->db->get_where('personality', array('id' => $id))->result_array();
            if (!empty($resultData) && count($resultData) > 0) {
                if ($mstps == 'song') {
                    $mstp = 's';
                } elseif ($mstps == 'trailer') {
                    $mstp = 't';
                } elseif ($mstps == 'poster') {
                    $mstp = 'p';
                } else {
                    $mstp = 'm';
                }
                $map_arr = ['m' => 'movie', 's' => 'video', 't' => 'video', 'p' => 'poster'];
                $label_map_arr = ['m' => 'Movie', 's' => 'Song', 't' => 'Trailer', 'p' => 'Poster'];

                $is_set = 0;
                foreach ($map_arr as $key => $val) {
                    $cnt = 0;
                    $data_arr = array();
                    $res = $this->getMSTPdata($resultData[0]['id'], $key);
                    $total[$label_map_arr[$key]] = 0;
                    if (count($res) > 0) {
                        foreach ($res as $res_value) {
                            if (!in_array($res_value[$map_arr[$key] . '_name'], $data_arr)) {
                                $cnt++;
                                array_push($data_arr, $res_value[$map_arr[$key] . '_name']);
                            }
                        }
                        $total[$label_map_arr[$key]] = $cnt;
                    }
                    // if (count($res) > 0 && $is_set == 0) {
                    //     if ($mstps == '') {
                    //         $mstp = $key;
                    //     }
                    //     if ($key == $mstp) {
                    //         $mstp_detail = $res;
                    //         $is_set = 1;
                    //     }
                    // }
                }
              //  $individual_detail = $resultData[0];
                // $printarray['name'] = $resultData[0]['personality_name'];
                // $printarray['value'] = $individual_detail;
                $printarray['total'] = $total;
               // $printarray['data_type'] = (isset($mstps) && $mstps != '') ? $mstps : "movie";
                //$printarray['data'] = $mstp_detail;
                $errorCode = 200;
                $message = '';
                $result = TRUE;

            } else {
                $printarray['data'] = array();
                $message = 'No data available!';
                $err_code = CODE_OK;
                $result = TRUE;
            }
        }
        //$printarray['result'] = $result;
        //$printarray['message'] = $message;
        //$printarray['errorCode'] = $err_code;
        return $printarray;
    }

    public function getMSTPdata($id, $mstp = 'm', $type = '') {
        if ($type == 'channel') {
            $map_arr = ['s' => 'video', 't' => 'video'];
            $tables = ['relby'];
        } else {
            $map_arr = ['m' => 'movie', 's' => 'video', 't' => 'video', 'p' => 'poster'];
            $tables = ['cast', 'music', 'singer', 'director'];
        }
        $result = array();
        foreach ($tables as $table) {
            if ($mstp != 'p' || ($mstp == 'p' && !in_array($table, array('music', 'singer')))) {
                $img = '';
                if ($map_arr[$mstp] == 'movie') {
                    $img = ",(case when mapped.movie_img is not null then CONCAT('" . base_url() . "images/movies/',mapped.movie_img) else null end) as thumb ";
                } elseif ($map_arr[$mstp] == 'video') {
                    $img = ",(case when mapped.video_thumb is not null then CONCAT('" . base_url() . "images/videothumb/',mapped.video_thumb) else null end) as thumb,"
                            . "(SELECT group_concat(personality_name) FROM `video_map_cast` inner join personality on personality.id = personality_id where video_id = mapped.id and is_cast = 1) as cast ";
                } elseif ($map_arr[$mstp] == 'poster') {
                    $img = ",(select CONCAT('" . base_url() . "images/poster/',poster_img.poster_image) from poster_img where poster_img.poster_id=mapped.id order by poster_img.poster_type asc,poster_img.display_order asc limit 1) as thumb ";
                }
               // print_r($img);exit;
               // $img="";
                $this->db->select('map.*,mapped.*' . $img);
                $this->db->from($map_arr[$mstp] . '_map_' . $table . ' AS map'); // I use aliasing make joins easier
                $this->db->join($map_arr[$mstp] . ' AS mapped', 'mapped.id = map.' . $map_arr[$mstp] . '_id', 'INNER');
                if ($type == 'channel') {
                    $this->db->where(array('map.rel_by_id' => $id));
                } else {
                    $this->db->where(array('map.personality_id' => $id));
                }
                if ($mstp != 'm') {
                    $this->db->where('mapped.is_deleted', 0);
                }
                if ($mstp == 't') { //--> Get Video Trailer
                    $this->db->where('mapped.cat_id', 1);
                } elseif ($mstp == 's') { //--> Get video Songs
                    $this->db->where('mapped.cat_id', 2);
                }

                if ($this->input->post('search_year')) {
                    $this->db->where("DATE_FORMAT(`mapped`.`rel_date`, '%Y')", $this->input->post('search_year'));
                }

                if ($this->input->post('search_month')) {
                    $this->db->where("DATE_FORMAT(`mapped`.`rel_date`, '%c')", $this->input->post('search_month'));
                }

                if ($this->input->post('search_keyword')) {
                    if ($this->input->post('search_keyword') == '0-9') {
                        $this->db->where(array('`mapped`.`' . $map_arr[$mstp] . '_name` RLIKE ' => '^[0-9].*'));
                    } else {
                        $this->db->where('(`mapped`.`' . $map_arr[$mstp] . '_name` LIKE "' . $this->input->post('search_keyword') . '%" OR `mapped`.`' . $map_arr[$mstp] . '_name` LIKE "' . lcfirst($this->input->post('search_keyword')) . '%")');
                    }
                }
                $this->db->order_by("mapped.rel_date", "desc");
                $this->db->group_by("mapped.id");
                $data = $this->db->get()->result_array();
                $result = array_merge($result, $data);
            }
        }
        
        return $result;
    }

}
