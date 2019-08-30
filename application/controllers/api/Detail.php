<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH . 'libraries/REST_Controller.php');

class Detail extends REST_Controller {

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

    function video_post() {
        $id = $this->input->post('id');
        if (!isset($id) && empty($id)) {
            $message = 'Invalid api call or parameter missing.';
            $err_code = CODE_PARAM_MISSING;
            $result = false;
        } else {
            $FrontData = array();
            $is_exist = $this->My_model->getresult("SELECT * from video where id = " . $id . " limit 1 ");
            if (count($is_exist) > 0) {
                $FrontData['name'] = $is_exist[0]['video_name'];
                
                $FrontData['value'] = $is_exist;
                

                $FrontData['value'][0]['you_tube_id'] = substr($is_exist[0]['video_url'],-11);
                

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
                
            

                

                $printarray['data'] = $FrontData;
                $message = '';
                $err_code = CODE_OK;
                $result = true;
            } else {
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

    public function getMSTPdata3($id, $mstp = 'm', $type = '') {
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
             //   print_r($result);exit;
            }
        }
        
        return $result;
    }

    function personality_post() { 
        $id = $this->input->post('id');
        $mstps = $this->input->post('type');
        $page = $this->input->post('page');
        if (!isset($id) && $id > 0) {
            $message = 'Invalid api call or parameter missing.';
            $err_code = CODE_PARAM_MISSING;
            $result = false;
        } else { 
            $resultData = $this->db->get_where('personality', array('id' => $id))->result_array();
            if (!empty($resultData) && count($resultData) > 0) {
                if (trim($mstps) == 'song' || trim($mstps) == 'video') {
                    $mstp = 's';
                } elseif (trim($mstps) == 'trailer') {
                    $mstp = 't';
                } elseif (trim($mstps) == 'poster') {
                    $mstp = 'p';
                } else {
                    $mstp = 'm';
                } 
                $map_arr = ['p' => 'poster','m' => 'movie', 's' => 'video', 't' => 'video'];
                $label_map_arr = ['m' => 'Movie', 's' => 'Song', 't' => 'Trailer', 'p' => 'Poster'];

                $is_set = 0;
                foreach ($map_arr as $key => $val) { 
                    $cnt = 0;
                    $data_arr = array();
                    $res = $this->getMSTPdata_personality_post($resultData[0]['id'], $key); 


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
                    if (count($res) > 0 && $is_set == 0) {
                        if ($mstps == '') {
                            $mstp = $key;
                        }
                        if ($key == $mstp) {
                            $mstp_detail = $res; 
                            $is_set = 1;
                        }
                    }
                } 



                $individual_detail = $resultData[0];
                $printarray['name'] = $resultData[0]['personality_name'];
                $printarray['value'] = $individual_detail;
                if($individual_detail['personality_img'] != "")
                {
                	$printarray['value']['personality_img'] = base_url().'images/personality/'.$individual_detail['personality_img'];
                }
                else
                {
                	$printarray['value']['personality_img'] =null;
                }
                
                $printarray['total'] = $total;
                $printarray['data_type'] = (isset($mstps) && $mstps != '') ? $mstps : "movie";
                $i =0 ;

                
                foreach ($mstp_detail as $row) { 
                    $data_mstp[$i] = $row;
                    $data_mstp[$i]['you_tube_id'] = substr($row['video_url'],-11);

                    

                    /*$sub_category = $this->My_model->getresult("SELECT * from sub_category where id=".$data_mstp[$i]['subcat_id']);

                    $data_mstp[$i]['subcat_name'] = $sub_category[0]['subcat_name'];
*/


                
                    if(trim($printarray['data_type'])== 'movie')
                    {
                        $data_m = $this->My_model->getresult("SELECT personality.id as id,personality.personality_name as name from "
                            . "personality left join movie_map_cast on movie_map_cast.personality_id = personality.id "
                            . "where personality.is_cast = 1 and movie_map_cast.movie_id = " . $row['movie_id'] . "");
                        $k = 0;
                        $cast = "";
                        foreach ($data_m as $movie_cast) {
                            $cast .= $movie_cast['name'].',';
                            $k++;                            
                        }

                        $data_mstp[$i]['created'] = strtotime($row['created']);
                        //$data_mstp[$i]['cast'] = $cast;
                        //$data_mstp[$i]['other_cast'] = $this->get_movie_data($row['movie_id']);
                    }
                    else if(trim($printarray['data_type']) == 'poster')
                    { 
                        $data_m = $this->My_model->getresult("SELECT personality.personality_name as name from "
                            . "personality left join poster_map_cast on poster_map_cast.personality_id = personality.id "
                            . "where personality.is_cast = 1 and poster_map_cast.poster_id = " . $row['poster_id'] . "");
                        $k = 0;
                        $cast = "";
                        foreach ($data_m as $movie_cast) {
                            $cast .= $movie_cast['name'].',';
                            $k++;                            
                        }

                        $data_c = $this->My_model->getresult("SELECT personality.personality_name as name from "
                            . "personality left join poster_map_director on poster_map_director.personality_id = personality.id "
                            . "where personality.is_director = 1 and poster_map_director.poster_id = " . $row['poster_id'] . "");
                        $l = 0;
                        $dir = "";
                        foreach ($data_c as $movie_dir) {
                            $dir .= $movie_dir['name'].',';
                            $l++;                            
                        }

                         $data_mstp[$i]['cast'] = $cast;
                         $data_mstp[$i]['director'] = $dir;
                         $data_mstp[$i]['created'] = strtotime($row['created']);
                         $data_mstp[$i]['detail_data'] = $this->get_poster_data($row['poster_id']);
                    }
                    else
                    {
                        $data_m = $this->My_model->getresult("SELECT personality.personality_name as name from "
                            . "personality left join video_map_cast on video_map_cast.personality_id = personality.id "
                            . "where personality.is_cast = 1 and video_map_cast.video_id = " . $row['video_id'] . "");
                        $k = 0;
                        $cast = "";
                        foreach ($data_m as $movie_cast) {
                            $cast .= $movie_cast['name'].',';
                            $k++;                            
                        }
                        $data_mstp[$i]['cast'] = $cast;
                        $data_mstp[$i]['created'] = strtotime($row['created']);
                        $singer = $this->My_model->getresult('SELECT group_concat(personality_name) as singer FROM `video_map_singer` inner join personality on personality.id = personality_id where video_id = '.$row['id'].' and is_singer = 1 '); 
                        $data_mstp[$i]['singer'] = $singer[0]['singer'];
                        $mdirector = $this->My_model->getresult('SELECT group_concat(personality_name) as music_director FROM `video_map_music` inner join personality on personality.id = personality_id where video_id = '.$row['id'].' and is_music_director = 1'); 
                        $data_mstp[$i]['music_director'] = $mdirector[0]['music_director'];
                        $director = $this->My_model->getresult('SELECT group_concat(personality_name) as director FROM `video_map_director` inner join personality on personality.id = personality_id where video_id = '.$row['id'].' and is_director = 1'); 
                        $data_mstp[$i]['director'] = $director[0]['director'];
                         $data_mstp[$i]['detail_data'] = $this->get_video_data($row['video_id']);



                    }

                    if($mstps !== 'poster' && $mstps !== 'movie')
                    {


                        $full_movie = '';
                        $full_movie = $this->My_model->getresult("SELECT movie.full_movie from "
                                    . "movie left join video_map_movie on video_map_movie.movie_id = movie.id "
                                    . "where video_map_movie.video_id = " . $row['id'] . "");


                        $data_mstp[$i]['detail_data']['full_movie'] = $full_movie[0]['full_movie'];




                        $video = $this->db->query('SELECT video.*,video_url.final_url FROM video LEFT JOIN video_url ON video_url.id=video.seo_url_id  WHERE video.id = '.$row['id'].'')->result_array();

                        $data_mstp[$i]['final_url'] = '';
                        if(count($video) > 0)
                        {
                            $data_mstp[$i]['final_url'] = $video[0]['final_url'];
                        }


                    }


                    unset($data_mstp[$i]['video_id']);
                    unset($data_mstp[$i]['rel_date']);
                    unset($data_mstp[$i]['updated']);

                    unset($data_mstp[$i]['cast_id']);
                    unset($data_mstp[$i]['personality_id']);
                    //unset($data_mstp[$i]['cat_id']);


                    //unset($data_mstp[$i]['subcat_id']);

                    unset($data_mstp[$i]['video_thumb']);
                    unset($data_mstp[$i]['video_desc']);
                    unset($data_mstp[$i]['video_keywords']);

                    unset($data_mstp[$i]['is_deleted']);

                    unset($data_mstp[$i]['my_release']);
                    unset($data_mstp[$i]['seo_url_id']);
                    







                    
                    $i++;
                }
                $printarray['data'] = $data_mstp;
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
        $printarray['result'] = $result;
        $printarray['message'] = $message;
        $printarray['errorCode'] = $err_code;
        $this->response($printarray);
    }

    public function get_video_data($id='')
    {
        $FrontData['cast'] = $this->My_model->getresult("SELECT personality.id as id,personality.personality_name as name,"
                        . "(case when personality.personality_img is not null then concat('" . base_url() . "','images/personality/',personality.personality_img) else null end) as thumb from "
                        . "personality left join video_map_cast on video_map_cast.personality_id = personality.id "
                        . "where personality.is_cast = 1 and video_map_cast.video_id = " . $id . "");
        $FrontData['director'] = $this->My_model->getresult("SELECT personality.id as id,personality.personality_name as name,"
                . "(case when personality.personality_img is not null then concat('" . base_url() . "','images/personality/',personality.personality_img) else null end) as thumb from "
                . "personality left join video_map_director on video_map_director.personality_id = personality.id "
                . "where personality.is_director = 1 and video_map_director.video_id = " . $id . "");

        $FrontData['singer'] = $this->My_model->getresult("SELECT personality.id as id,personality.personality_name as name,"
                . "(case when personality.personality_img is not null then concat('" . base_url() . "','images/personality/',personality.personality_img) else null end) as thumb from "
                . "personality left join video_map_singer on video_map_singer.personality_id = personality.id "
                . "where personality.is_singer = 1 and video_map_singer.video_id = " . $id . "");

        $FrontData['music_director'] = $this->My_model->getresult("SELECT personality.id as id,personality.personality_name as name,"
                . "(case when personality.personality_img is not null then concat('" . base_url() . "','images/personality/',personality.personality_img) else null end) as thumb from "
                . "personality left join video_map_music on video_map_music.personality_id = personality.id "
                . "where personality.is_music_director = 1 and video_map_music.video_id = " . $id . "");

        $FrontData['movie'] = $this->My_model->getresult("SELECT movie.id as id,movie.movie_name as name,"
                . "(case when movie.movie_img is not null then concat('" . base_url() . "','images/movies/',movie.movie_img) else null end) as thumb from "
                . "movie left join video_map_movie on video_map_movie.movie_id = movie.id "
                . "where video_map_movie.video_id = " . $id . "");
        
        $FrontData['channel'] = $this->My_model->getresult("SELECT released_by.id as id,released_by.rel_by_name as name,"
                . "(case when released_by.rel_by_img then concat('" . base_url() . "','images/channel/',released_by.rel_by_img) else null end) as thumb from "
                . "released_by left join video_map_relby on video_map_relby.rel_by_id = released_by.id "
                . "where video_map_relby.video_id = " . $id . "");

        return $FrontData;
    }


    public function get_video_data_1($id='')
    {
        $FrontData['cast'] = $this->My_model->getresult("SELECT personality.id as id,personality.personality_name as name,"
                        . "(case when personality.personality_img is not null then concat('" . base_url() . "','images/personality/',personality.personality_img) else null end) as thumb from "
                        . "personality left join video_map_cast on video_map_cast.personality_id = personality.id "
                        . "where personality.is_cast = 1 and video_map_cast.video_id = " . $id . "");
        $FrontData['director'] = $this->My_model->getresult("SELECT personality.id as id,personality.personality_name as name,"
                . "(case when personality.personality_img is not null then concat('" . base_url() . "','images/personality/',personality.personality_img) else null end) as thumb from "
                . "personality left join video_map_director on video_map_director.personality_id = personality.id "
                . "where personality.is_director = 1 and video_map_director.video_id = " . $id . "");

        $FrontData['singer'] = $this->My_model->getresult("SELECT personality.id as id,personality.personality_name as name,"
                . "(case when personality.personality_img is not null then concat('" . base_url() . "','images/personality/',personality.personality_img) else null end) as thumb from "
                . "personality left join video_map_singer on video_map_singer.personality_id = personality.id "
                . "where personality.is_singer = 1 and video_map_singer.video_id = " . $id . "");

        $FrontData['music_director'] = $this->My_model->getresult("SELECT personality.id as id,personality.personality_name as name,"
                . "(case when personality.personality_img is not null then concat('" . base_url() . "','images/personality/',personality.personality_img) else null end) as thumb from "
                . "personality left join video_map_music on video_map_music.personality_id = personality.id "
                . "where personality.is_music_director = 1 and video_map_music.video_id = " . $id . "");

        $FrontData['movie'] = $this->My_model->getresult("SELECT movie.id as id,movie.movie_name as name,"
                . "(case when movie.movie_img is not null then concat('" . base_url() . "','images/movies/',movie.movie_img) else null end) as thumb from "
                . "movie left join video_map_movie on video_map_movie.movie_id = movie.id "
                . "where video_map_movie.video_id = " . $id . "");

        $full_movie = $this->My_model->getresult("SELECT movie.full_movie from "
                                . "movie left join video_map_movie on video_map_movie.movie_id = movie.id "
                                . "where video_map_movie.video_id = " . $id . "");


                       $FrontData['full_movie'] = $full_movie[0]['full_movie'];
        
        $FrontData['channel'] = $this->My_model->getresult("SELECT released_by.id as id,released_by.rel_by_name as name,"
                . "(case when released_by.rel_by_img then concat('" . base_url() . "','images/channel/',released_by.rel_by_img) else null end) as thumb from "
                . "released_by left join video_map_relby on video_map_relby.rel_by_id = released_by.id "
                . "where video_map_relby.video_id = " . $id . "");

        return $FrontData;
    }
    public function get_video_main_data($id='')
    {

        $result = $this->My_model->getresult("SELECT video.rel_date as rel_date,video.created as created,video.updated as updated,video.id as id,sub_category.subcat_name,video.video_name,video.subcat_id,
                                       
                    (case when video.video_thumb is not null then CONCAT('" . base_url() . "images/videothumb/',video.video_thumb) else null end) as thumb,video.video_url, 
                    CONCAT(video.liked,' Likes') as liked,CONCAT(video.play,' Playing') as play,video_url.final_url, 
                    (SELECT group_concat(personality_name) FROM `video_map_cast` inner join personality on personality.id = personality_id where video_id = video.id and is_cast = 1) as cast,(SELECT group_concat(personality_name) FROM `video_map_singer` inner join personality on personality.id = personality_id where video_id = video.id and is_singer = 1) as singer,(SELECT group_concat(personality_name) FROM `video_map_music` inner join personality on personality.id = personality_id where video_id = video.id and is_music_director = 1) as music_director,(SELECT group_concat(personality_name) FROM `video_map_director` inner join personality on personality.id = personality_id where video_id = video.id and is_director = 1) as director,youtube_views
                    FROM video 
                    LEFT JOIN sub_category ON video.subcat_id=sub_category.id
                    LEFT JOIN video_url ON video_url.id=video.seo_url_id 
                    WHERE video.id= ".$id." and video.is_deleted='0' ");



        return $result;
    }
    public function get_movie_data($id)
    {
        $FrontData['cast'] = $this->My_model->getresult("SELECT personality.id as id,personality.personality_name as name,"
                        . "(case when personality.personality_img is not null then concat('" . base_url() . "','images/personality/',personality.personality_img) else null end) as thumb from "
                        . "personality left join movie_map_cast on movie_map_cast.personality_id = personality.id "
                        . "where personality.is_cast = 1 and movie_map_cast.movie_id = " . $id . "");
        $FrontData['director'] = $this->My_model->getresult("SELECT personality.id as id,personality.personality_name as name,"
                . "(case when personality.personality_img is not null then concat('" . base_url() . "','images/personality/',personality.personality_img) else null end) as thumb from "
                . "personality left join movie_map_director on movie_map_director.personality_id = personality.id "
                . "where personality.is_director = 1 and movie_map_director.movie_id = " . $id . "");
        
        $FrontData['singer'] = $this->My_model->getresult("SELECT personality.id as id,personality.personality_name as name,"
                . "(case when personality.personality_img is not null then concat('" . base_url() . "','images/personality/',personality.personality_img) else null end) as thumb from "
                . "personality left join movie_map_singer on movie_map_singer.personality_id = personality.id "
                . "where personality.is_singer = 1 and movie_map_singer.movie_id = " .$id . "");
       
        $FrontData['music_director'] = $this->My_model->getresult("SELECT personality.id as id,personality.personality_name as name,"
                . "(case when personality.personality_img is not null then concat('" . base_url() . "','images/personality/',personality.personality_img) else null end) as thumb from "
                . "personality left join movie_map_music on movie_map_music.personality_id = personality.id "
                . "where personality.is_music_director = 1 and movie_map_music.movie_id = " . $id . "");    
        

        return $FrontData;
    }

    public function get_poster_data($id='')
    {
        $FrontData['cast'] = $this->My_model->getresult("SELECT personality.id as id,personality.personality_name as name,"
                        . "(case when personality.personality_img is not null then concat('" . base_url() . "','images/personality/',personality.personality_img) else null end) as thumb from "
                        . "personality left join poster_map_cast on poster_map_cast.personality_id = personality.id "
                        . "where personality.is_cast = 1 and poster_map_cast.poster_id = " . $id . "");
        $FrontData['director'] = $this->My_model->getresult("SELECT personality.id as id,personality.personality_name as name,"
                . "(case when personality.personality_img is not null then concat('" . base_url() . "','images/personality/',personality.personality_img) else null end) as thumb from "
                . "personality left join poster_map_director on poster_map_director.personality_id = personality.id "
                . "where personality.is_director = 1 and poster_map_director.poster_id = " . $id . "");

        return $FrontData;
    }
    public function get_poster_main_data($id='')
    {
        $result = $this->db->query("SELECT poster.id as id,sub_category.subcat_name,poster.subcat_id,poster.rel_date,poster.created,"
                        . "poster.poster_name as video_name,poster_img.poster_type, CONCAT(poster.likes,' Likes') as liked,"
                        . "CONCAT(poster.views,' Views') as play,video_url.final_url,
                            (select CONCAT('" . base_url() . "images/poster/',poster_img.poster_image) from poster_img where poster_img.poster_id=poster.id order by poster_img.poster_type asc,poster_img.display_order asc limit 1) as thumb
                        FROM poster 
                LEFT JOIN sub_category ON poster.subcat_id=sub_category.id
                LEFT JOIN video_url ON video_url.id=poster.seo_url_id 
                LEFT JOIN poster_img ON poster_img.poster_id=poster.id                 
                WHERE poster.id = ".$id."  AND    
                poster.is_deleted='0' ")->row();

        return $result;
    }

    

    function channel_post() {
        $id = $this->input->post('id');
        $mstps = $this->input->post('type');
        
        if (!isset($id) && $id > 0) {
            $message = 'Invalid api call or parameter missing.';
            $err_code = CODE_PARAM_MISSING;
            $result = false;
        } else {
            $resultData = $this->db->get_where('released_by', array('id' => $id))->result_array();
            if (!empty($resultData) && count($resultData) > 0) {
                if ($mstps == 'trailer') {
                    $mstp = 't';
                } else {
                    $mstp = 's';
                }
                $map_arr = ['s' => 'video', 't' => 'video'];
                $label_map_arr = ['s' => 'Song', 't' => 'Trailer'];

                $is_set = 0;
                foreach ($map_arr as $key => $val) {
                    $cnt = 0;
                    $data_arr = array();
                    $res = $this->getMSTPdata($resultData[0]['id'], $key, 'channel');
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
                    if (count($res) > 0 && $is_set == 0) {
                        if ($mstps == '') {
                            $mstp = $key;
                        }
                        if ($key == $mstp) {
                            $mstp_detail = $res;
                            $is_set = 1;
                        }
                    }
                }
                $i = 0;
                foreach ($mstp_detail as $mstp)
                {

                    unset($mstp['video_id']);
                    unset($mstp['rel_by_id']);
                    unset($mstp['video_thumb']);
                    unset($mstp['video_desc']);
                    unset($mstp['video_keywords']);


                    unset($mstp['rel_date']);
                    unset($mstp['is_deleted']);
                    unset($mstp['my_release']);

                    unset($mstp['seo_url_id']);
                    unset($mstp['updated']);



                    $sub_category = $this->My_model->getresult("SELECT * from sub_category where id=".$mstp['subcat_id']."");
                    $mstp['subcat_name'] = $sub_category[0]['subcat_name'];



                    $mstp['final_url'] = '';
                    $video = $this->db->query('SELECT video.*,video_url.final_url FROM video LEFT JOIN video_url ON video_url.id=video.seo_url_id  WHERE video.id = '.$mstp['id'].'')->result_array();

                    if(count($video) > 0)
                    {
                        $mstp['final_url'] = $video[0]['final_url'];
                    }

                    
                    $data[$i] = $mstp;
                    $data[$i]['you_tube_id'] = substr($mstp['video_url'],-11);
                    $data[$i]['created'] = strtotime($mstp['created']);
                    $singer = $this->My_model->getresult('SELECT group_concat(personality_name) as singer FROM `video_map_singer` inner join personality on personality.id = personality_id where video_id = '.$mstp['id'].' and is_singer = 1 '); 
                    $data[$i]['singer'] = $singer[0]['singer'];
                    $mdirector = $this->My_model->getresult('SELECT group_concat(personality_name) as music_director FROM `video_map_music` inner join personality on personality.id = personality_id where video_id = '.$mstp['id'].' and is_music_director = 1'); 
                    $data[$i]['music_director'] = $mdirector[0]['music_director'];
                    $director = $this->My_model->getresult('SELECT group_concat(personality_name) as director FROM `video_map_director` inner join personality on personality.id = personality_id where video_id = '.$mstp['id'].' and is_director = 1'); 
                    $data[$i]['director'] = $director[0]['director'];
                    $data[$i]['detail_data'] = $this->get_video_data($mstp['id']);



                    $full_movie = '';
                    $full_movie = $this->My_model->getresult("SELECT movie.full_movie from "
                                . "movie left join video_map_movie on video_map_movie.movie_id = movie.id "
                                . "where video_map_movie.video_id = " . $mstp['id'] . "");


                    $data[$i]['detail_data']['full_movie'] = $full_movie['full_movie'];



                    $i++;
                }

                $individual_detail = $resultData[0];
                $printarray['name'] = $resultData[0]['rel_by_name'];
                $printarray['value'] = $individual_detail;
                if($individual_detail['rel_by_img'] != "")
                {                    
                    $printarray['value']['rel_by_img'] = base_url().'images/channel/'.$individual_detail['rel_by_img'];
                }
                $printarray['value']['created'] = strtotime($individual_detail['created']);
                $printarray['total'] = $total;
                $printarray['data_type'] = (isset($mstps) && $mstps != '') ? $mstps : "song";
                $printarray['data'] = $data;
                $message = '';
                $err_code = CODE_OK;
                $result = TRUE;
            } else {
                $printarray['data'] = array();
                $message = 'No data available!';
                $err_code = CODE_OK;
                $result = TRUE;
            }
        }
        $printarray['result'] = $result;
        $printarray['message'] = $message;
        $printarray['errorCode'] = $err_code;
        $this->response($printarray);
    }

    function poster_post() {
        $id = $this->input->post('id');
        $type = $this->input->post('type');
        if (!isset($id) && !is_numeric($id)) {
            $message = 'Invalid api call or parameter missing.';
            $err_code = CODE_PARAM_MISSING;
            $result = false;
        } else {
            $is_exist = $this->My_model->getresult("SELECT poster.* FROM poster WHERE poster.id= " . $id . "");
            if (count($is_exist) > 0) {
                $typeId = (!empty($type)) ? $type : 1;

                $result_data = $this->My_model->getresult("SELECT poster_img.* FROM poster_img WHERE poster_img.poster_id= " . $id . " and poster_img.poster_type = " . $typeId . " order by display_order asc ");
           		if(!empty($result_data))
           		{
           			 $i=0;
	                foreach ($result_data as $row) {
	                    $data_result[$i] = $row;
	                    $data_result[$i]['poster_image'] = base_url().'images/poster/'.$row['poster_image'];
	                	$cast = $this->My_model->getresult('SELECT group_concat(personality_name) as cast FROM `poster_map_cast` inner join personality on personality.id = personality_id where poster_id = '.$row['id'].' and is_cast = 1'); 
	                    $data_result[$i]['cast'] = $cast[0]['cast'];
	                    $director = $this->My_model->getresult('SELECT group_concat(personality_name) as director FROM `poster_map_director` inner join personality on personality.id = personality_id where poster_id = '.$row['id'].' and is_director = 1'); 
	                    $data_result[$i]['director'] = $director[0]['director'];

	                    $i++;
	                }
           		}
               
               
                //$printarray['data'] = $data_result;
                // $result1 = $this->My_model->getresult("SELECT poster.id as id,sub_category.subcat_name,"
                //         . "poster.poster_name as video_name,CONCAT(poster.likes,' Likes') as liked,"
                //         . "CONCAT(poster.views,' Views') as play,video_url.final_url,"
                //         . "(select CONCAT('timthumb.php?src=" . base_url() . "images/poster/',poster_img.poster_image,'&w=285&h=160') from poster_img where poster_img.poster_id=poster.id order by poster_img.poster_type asc,poster_img.display_order asc limit 1) as video_thumb,
                //             (select CONCAT('" . base_url() . "images/poster/',poster_img.poster_image) from poster_img where poster_img.poster_id=poster.id order by poster_img.poster_type asc,poster_img.display_order asc limit 1) as thumb
                //         FROM poster 
                // LEFT JOIN sub_category ON poster.subcat_id=sub_category.id
                // LEFT JOIN poster_img ON poster.id=poster_img.poster_id
                // LEFT JOIN video_url ON video_url.id=poster.seo_url_id                 
                // WHERE poster_img.poster_type= '".$type."' AND poster.id= '".$id."' AND     
                // poster.is_deleted='0'                
                // group by poster.id                
                // ORDER BY poster.rel_date DESC
                // LIMIT 0," . API_RECORD_LIMIT . "");
                 $result2 = $this->My_model->getresult("SELECT poster.id as id,sub_category.subcat_name,"
                        . "poster.poster_name as video_name,CONCAT(poster.likes,' Likes') as liked,poster.rel_date as created,CONCAT(poster.views,' Views') as play, (case when poster_img.poster_image is not null then concat('" . base_url() . "','images/poster/',poster_img.poster_image) else null end) as thumb,video_url.final_url,width,height from poster_img 
                LEFT JOIN poster ON poster.id=poster_img.poster_id
                LEFT JOIN sub_category ON sub_category.id = poster.subcat_id  
                LEFT JOIN video_url ON video_url.id=poster.seo_url_id                
                WHERE poster_img.poster_type= '".$type."' AND poster.id= '".$id."' AND     
                poster.is_deleted='0'                
            
                ORDER BY poster_img.display_order ASC
                LIMIT 0," . API_RECORD_LIMIT . "");
                 $i = 0;
                foreach ($result2 as $row)
                 {
                 	$data[$i] = $row;
                 	//$data[$i]['created'] = $row['rel_date'];                   
                    $data[$i]['created'] = strtotime($row['created']);                 	
                 	$i++;
                 } 
                
             	
                $printarray['data'] = $data;



                if(!empty($result2))
                {


                    $cast = $this->My_model->getresult('SELECT group_concat(personality_name) as cast FROM `poster_map_cast` inner join personality on personality.id = personality_id where poster_id = '.$result2[0]['id'].' and is_cast = 1'); 
                    //$data[$i]['cast'] = $cast[0]['cast'];
                    $director = $this->My_model->getresult('SELECT group_concat(personality_name) as director FROM `poster_map_director` inner join personality on personality.id = personality_id where poster_id = '.$result2[0]['id'].' and is_director = 1'); 
                    //$data[$i]['director'] = $director[0]['director'];
                    //$data[$i]['other_cast'] = $this->get_poster_data($result2[0]['id']);  
                    $printarray['cast'] = $cast[0]['cast'];
                    $printarray['director'] = $director[0]['director'];
                    $printarray['other_cast'] = $this->get_poster_data($result2[0]['id']);  

                }
              //  $printarray['data2'] = $result2;
                $message = '';
                $err_code = CODE_OK;
                $result = true;
            } else {
                $message = 'No data available!';
                $err_code = CODE_OK;
                $result = true;
            }
        }
        $printarray['result'] = $result;
        $printarray['message'] = $message;
        $printarray['errorCode'] = $err_code;
        $this->response($printarray);
    }

    public function rating_post()
    {
        $id = urlencode($this->input->post('search_keyword'));
       
        if (!isset($id)) {
            $message = 'Invalid api call or parameter missing.';
            $err_code = CODE_PARAM_MISSING;
            $result = false;
        } else {
            $details = file_get_contents('http://www.omdbapi.com/?t='.$id.'&apikey=BanMePlz');
            $details1 = json_decode($details); 
            
            $printarray['IMDB_rating'] = $details1->imdbRating;
            $printarray['IMDB_votes'] = $details1->imdbVotes;
            $message = '';
            $err_code = CODE_OK;
            $result = true;
        }
        $printarray['result'] = $result;
        $printarray['message'] = $message;
        $printarray['errorCode'] = $err_code;
        $this->response($printarray);
    }


    function movie_post() {
        $id = $this->input->post('id');
        if (!isset($id) && empty($id)) {
            $message = 'Invalid api call or parameter missing.';
            $err_code = CODE_PARAM_MISSING;
            $result = false;
        } else {
            $FrontData = array();
            $is_exist = $this->My_model->getresult("SELECT movie.*,(case when movie.movie_img is not null then CONCAT('" . base_url() . "images/movies/',movie.movie_img) else null end) as thumb from movie where id = " . $id . " limit 1 ");
            if (count($is_exist) > 0) {
                unset($is_exist[0]['updated']);
                unset($is_exist[0]['rel_date']);

                
                $FrontData['name'] = $is_exist[0]['movie_name'];
                $FrontData['value'] = $is_exist;
                $FrontData['cast'] = $this->My_model->getresult("SELECT personality.id as id,personality.personality_name as name,"
                        . "(case when personality.personality_img is not null then concat('" . base_url() . "','images/personality/',personality.personality_img) else null end) as thumb from "
                        . "personality left join movie_map_cast on movie_map_cast.personality_id = personality.id "
                        . "where personality.is_cast = 1 and movie_map_cast.movie_id = " . $is_exist[0]['id'] . "");
                $FrontData['cast_count'] = count($FrontData['cast']);
                $FrontData['director'] = $this->My_model->getresult("SELECT personality.id as id,personality.personality_name as name,"
                        . "(case when personality.personality_img is not null then concat('" . base_url() . "','images/personality/',personality.personality_img) else null end) as thumb from "
                        . "personality left join movie_map_director on movie_map_director.personality_id = personality.id "
                        . "where personality.is_director = 1 and movie_map_director.movie_id = " . $is_exist[0]['id'] . "");
                $FrontData['director_count'] = count($FrontData['director']);
                $FrontData['singer'] = $this->My_model->getresult("SELECT personality.id as id,personality.personality_name as name,"
                        . "(case when personality.personality_img is not null then concat('" . base_url() . "','images/personality/',personality.personality_img) else null end) as thumb from "
                        . "personality left join movie_map_singer on movie_map_singer.personality_id = personality.id "
                        . "where personality.is_singer = 1 and movie_map_singer.movie_id = " . $is_exist[0]['id'] . "");
                $FrontData['singer_count'] = count($FrontData['singer']);
                $FrontData['music_director'] = $this->My_model->getresult("SELECT personality.id as id,personality.personality_name as name,"
                        . "(case when personality.personality_img is not null then concat('" . base_url() . "','images/personality/',personality.personality_img) else null end) as thumb from "
                        . "personality left join movie_map_music on movie_map_music.personality_id = personality.id "
                        . "where personality.is_music_director = 1 and movie_map_music.movie_id = " . $is_exist[0]['id'] . "");    
                $FrontData['music_director_count'] = count($FrontData['music_director']);
                $trailers = $this->My_model->getresult("SELECT video.*,video_map_movie.video_id,
                    video_map_movie.movie_id,sub_category.subcat_name,video_url.final_url,
                    (case when video.video_thumb is not null then concat('" . base_url() . "','images/videothumb/',video.video_thumb) else null end) as video_thumb,
                    (SELECT group_concat(personality_name) FROM `video_map_cast` inner join personality on personality.id = personality_id where video_id = video.id and is_cast = 1) as cast,
                    (SELECT group_concat(personality_name) FROM `video_map_singer` inner join personality on personality.id = personality_id where video_id = video.id and is_singer = 1) as singer,
                    (SELECT group_concat(personality_name) FROM `video_map_music` inner join personality on personality.id = personality_id where video_id = video.id and is_music_director = 1) as music_director,
                    (SELECT group_concat(personality_name) FROM `video_map_director` inner join personality on personality.id = personality_id where video_id = video.id and is_director = 1) as director
                    from video_map_movie 
                    join video on video.id = video_map_movie.video_id
                    join movie on movie.id = video_map_movie.movie_id
                    LEFT JOIN sub_category ON video.subcat_id=sub_category.id
                    LEFT JOIN video_url ON video_url.id=video.seo_url_id 
                    where video.cat_id = 1 and movie.id=".$_POST['id']." order by video.created DESC"); 
               // echo "<pre>";print_r($trailers);exit;
                $i = 0;
                foreach ($trailers as $trailer) 
                {
                    //unset($trailer['subcat_id']);
                    unset($trailer['video_desc']);
                    unset($trailer['video_keywords']);

                    unset($trailer['is_deleted']);
                    unset($trailer['my_release']);

                    unset($trailer['seo_url_id']);

                    unset($trailer['video_id']);
                    unset($trailer['movie_id']);
                    //unset($trailer['cat_id']);

                    unset($trailer['rel_date']);
                    unset($trailer['updated']);

                    $trailer['thumb'] = $trailer['video_thumb'];
                    unset($trailer['video_thumb']);               

                    


                    //$trailer['rel_date'] = strtotime($trailer['rel_date']);
                    $trailer['created'] = strtotime($trailer['created']);
                    //$trailer['updated'] = strtotime($trailer['updated']);


                    $data_trailer[$i] = $trailer;
                    $data_trailer[$i]['you_tube_id'] = substr($trailer['video_url'],-11);
                    $data_trailer[$i]['detail_data']= $this->get_video_data_1($trailer['id']);
                    $i++;
                }
                $FrontData['trailer'] = $data_trailer;
                $FrontData['trailer_count'] = count($trailers);

                $songs = $this->My_model->getresult("SELECT video.*,video_map_movie.video_id,video_map_movie.movie_id ,(case when video.video_thumb is not null then concat('" . base_url() . "','images/videothumb/',video.video_thumb) else null end) as video_thumb,(SELECT group_concat(personality_name) FROM `video_map_cast` inner join personality on personality.id = personality_id where video_id = video.id and is_cast = 1) as cast,(SELECT group_concat(personality_name) FROM `video_map_singer` inner join personality on personality.id = personality_id where video_id = video.id and is_singer = 1) as singer,(SELECT group_concat(personality_name) FROM `video_map_music` inner join personality on personality.id = personality_id where video_id = video.id and is_music_director = 1) as music_director,(SELECT group_concat(personality_name) FROM `video_map_director` inner join personality on personality.id = personality_id where video_id = video.id and is_director = 1) as director,sub_category.subcat_name,video_url.final_url
                    from video_map_movie 
                    join video on video.id = video_map_movie.video_id
                    join movie on movie.id = video_map_movie.movie_id
                    LEFT JOIN sub_category ON video.subcat_id=sub_category.id
                    LEFT JOIN video_url ON video_url.id=video.seo_url_id
                    where video.cat_id = 2 and movie.id=".$_POST['id']." order by video.created DESC"); 
                $j = 0;
                foreach ($songs as $song)
                {

                    //unset($song['subcat_id']);
                    unset($song['video_desc']);
                    unset($song['video_keywords']);

                    unset($song['is_deleted']);
                    unset($song['my_release']);

                    unset($song['seo_url_id']);

                    unset($song['video_id']);
                    unset($song['movie_id']);

                    //unset($song['cat_id']);

                    unset($song['rel_date']);
                    unset($song['updated']);
                                   

                    $song['thumb'] = $song['video_thumb'];
                    unset($song['video_thumb']);               



                    //$song['rel_date'] = strtotime($song['rel_date']);
                    $song['created'] = strtotime($song['created']);
                    //$song['updated'] = strtotime($song['updated']);


                    $data_song[$j] = $song;
                    $data_song[$j]['you_tube_id'] = substr($song['video_url'],-11);
                    $data_song[$j]['detail_data']= $this->get_video_data_1($song['id']);
                    $j++;
                }
                $FrontData['song'] = $data_song;
                $FrontData['song_count'] = count($data_song);
                $posters = $this->My_model->getresult("SELECT poster.*,poster_map_movie.movie_id,poster_map_movie.poster_id,poster_img.poster_image,(SELECT group_concat(personality_name) FROM `poster_map_cast` inner join personality on personality.id = personality_id where poster_id = poster.id and is_cast = 1) as cast,(SELECT group_concat(personality_name) FROM `poster_map_director` inner join personality on personality.id = personality_id where poster_id = poster.id and is_director = 1) as director
                    from poster_map_movie 
                    join poster on poster.id = poster_map_movie.poster_id
                    join movie on movie.id = poster_map_movie.movie_id
                    join poster_img on poster_img.poster_id = poster.id
                    where  movie.id=".$_POST['id']." LIMIT 1"); 
                $k = 0;
                foreach ($posters as $poster)
                {
                    $poster['cat_id'] = 3;
                    $data_poster[$k] = $poster;
                    $data_poster[$k]['detail_data'] = $this->get_poster_data($poster['id']);
                    $k++;
                }

             //   get_poster_data
                $FrontData['poster'] =$data_poster;
                $FrontData['poster_count'] = count($FrontData['poster']);
                if(count($FrontData['poster']) > 0)
                {
                    $FrontData['poster'][0]['poster_image'] = base_url().'images/poster/'.$FrontData['poster'][0]['poster_image'];
                    
                }
                
                

                $FrontData['language'] = $this->My_model->getresult("SELECT subcat_name as name from sub_category where id IN (" . $is_exist[0]['subcat_id'].")");   


                $FrontData1 = array();
                $sub_category = $this->My_model->getresult("SELECT * from sub_category where LOWER(subcat_name) in ('" . str_replace(",", "','", strtolower($FrontData['language'][0]['name'])) . "')");
                foreach ($sub_category as $key => $value) {
                    $result = $this->My_model->getresult("SELECT movie.id as id,'" . $value['subcat_name'] . "' as subcat_name,MONTH(movie.my_release) as month,YEAR(movie.my_release) as year,movie.movie_name, movie.my_release,                   
                        (case when movie.movie_img is not null then CONCAT('" . base_url() . "images/movies/',movie.movie_img) else null end) as thumb,
                        video_url.final_url FROM movie                     
                        LEFT JOIN video_url ON video_url.id=movie.seo_url_id 
                        WHERE subcat_id like '%" . $value['id'] . "%' AND movie.id != '".$id."' and     
                        movie.status='0' and YEAR(movie.my_release)= YEAR('".$is_exist[0]['my_release']."' )
                        group by movie.id
                        ORDER BY year DESC,IF(MONTH(movie.my_release) < MONTH('".$is_exist[0]['my_release']."'), MONTH(movie.my_release) + 12, MONTH(movie.my_release)),
     DAY(movie.my_release) limit 0,15");


                    if (empty($FrontData1)) {
                        $FrontData1 = $result;
                    } else {
                        array_merge($FrontData1, $result);
                    }
                }

                $FrontData['similar_movie'] = $FrontData1;

                $movie_names = urlencode($is_exist[0]['movie_name']);
                $details = file_get_contents('http://www.omdbapi.com/?t='.$movie_names.'&apikey=BanMePlz');
                $details1 = json_decode($details); 
            
                $printarray['IMDB_rating'] = $details1->imdbRating;
                $printarray['IMDB_votes'] = $details1->imdbVotes;

                $printarray['data'] = $FrontData;
                $message = '';
                $err_code = CODE_OK;
                $result = true;
            } else {
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
             //   print_r($result);exit;
            }
        }
        
        return $result;
    }


    public function getMSTPdata_personality_post($id, $mstp = 'm', $type = '') {
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
             //   print_r($result);exit;
            }
        }
        
        return $result;
    }

    public function advertise_get()
    {
        $data = $this->db->query('SELECT * FROM adsense WHERE id IN(8,9,10)')->result_array();
        $i=0;
        foreach ($data as $row) 
        {
            $ad_data[$i] = $row;
            if($row['img_name'] != "")
            {
                $ad_data[$i]['img_name'] = base_url().'images/jaherat/'.$row['img_name'];
            }
            else
            {
                $ad_data[$i]['img_name'] = "";
            }
            
            
            $i++;
        }
        $printarray['data'] = $ad_data;
        $printarray['result'] = true;
        $printarray['message'] = "";
        $printarray['errorCode'] = CODE_OK;
        $this->response($printarray);

    }

    function favourite_list_post() 
    {
        $user_id = $this->input->post('user_id');
        $type = $this->input->post('type');
        $page = $this->input->post('page');

        $offset = (isset($page) && $page > 1) ? (($page-1) * API_RECORD_LIMIT) : 0;
        $limit = " LIMIT $offset," . API_RECORD_LIMIT . "";
        
        if (!isset($user_id) && $user_id > 0 && !isset($type)) 
        {
            $message = 'Invalid api call or parameter missing.';
            $err_code = CODE_PARAM_MISSING;
            $result = false;
        }
        else
        {
            if($type == 'video')
            {   
                $this->db->limit($limit);
                $total_video = $this->db->query('SELECT * from user_activity where user_id = '.$user_id.' and user_activity = "liked" and cat_id != 3 order by created DESC '.$limit)->result_array();
                
                $i =0;
                foreach ($total_video as $video)
                {
                    $data[$i] = $video;
                    $data[$i]['created'] = strtotime($video['created']);
                    $video_detail = $this->get_video_main_data($video['common_id']); 
                    //$data[$i]['video_detail'] = $video_detail;
                    //$data[$i]['video_detail'][0]['you_tube_id'] = substr($video_detail[0]['video_url'],-11);
                    $data[$i]['other_detail'] = $this->get_video_data($video['common_id']);



                    $full_movie = '';
                    $full_movie = $this->My_model->getresult("SELECT movie.full_movie from "
                                . "movie left join video_map_movie on video_map_movie.movie_id = movie.id "
                                . "where video_map_movie.video_id = " . $video_detail[0]['id'] . "");


                    $data[$i]['other_detail']['full_movie'] = $full_movie[0]['full_movie'];




                    /*unset($data[$i]['video_detail'][0]['video_url']);
                    unset($data[$i]['video_detail'][0]['you_tube_id']);
                    unset($data[$i]['video_detail'][0]['created']);
                     unset($data[$i]['video_detail'][0]['updated']);
                      unset($data[$i]['video_detail'][0]['rel_date']);*/


                    if($video_detail[0]['rel_date'] != "0000-00-00" && $video_detail[0]['rel_date'] != "0000-00-00 00:00:00")
                    {
                        //$FrontData['value'][0]['rel_date'] = strtotime($is_exist[0]['rel_date']);
                        $my_rel_date = strtotime($video_detail[0]['rel_date']);
                    }
                    else
                    {
                        //$FrontData['value'][0]['rel_date'] = "0";
                        $my_rel_date = "0";
                    }



                    if($video_detail[0]['created'] != "0000-00-00" && $video_detail[0]['created'] != "0000-00-00 00:00:00")
                    {
                        //$FrontData['value'][0]['created'] = strtotime($is_exist[0]['created']);
                        $my_created = strtotime($video_detail[0]['created']);
                    }
                    else
                    {
                        //$FrontData['value'][0]['created'] = "0";
                        $my_created = "0";
                    }



                    if($video_detail[0]['updated'] != "0000-00-00" && $video_detail[0]['updated'] != "0000-00-00 00:00:00")
                    {
                        //$FrontData['value'][0]['updated'] = strtotime($is_exist[0]['updated']);
                        $my_updated = strtotime($video_detail[0]['updated']);
                    }               
                    else
                    {
                        //$FrontData['value'][0]['updated'] = "0";
                        $my_updated = "0";
                    }




                    $data[$i]['video_id'] = $video_detail[0]['id'];
                    $data[$i]['subcat_id'] = $video_detail[0]['subcat_id'];
                    $data[$i]['subcat_name'] = $video_detail[0]['subcat_name'];
                    $data[$i]['video_name'] = $video_detail[0]['video_name'];
                    $data[$i]['thumb'] = $video_detail[0]['thumb'];
                    $data[$i]['liked'] = $video_detail[0]['liked'];
                    $data[$i]['play'] = $video_detail[0]['play'];
                    $data[$i]['final_url'] = $video_detail[0]['final_url'];
                    $data[$i]['cast'] = $video_detail[0]['cast'];
                    $data[$i]['singer'] = $video_detail[0]['singer'];
                    $data[$i]['music_director'] = $video_detail[0]['music_director'];
                    $data[$i]['director'] = $video_detail[0]['director'];
                    $data[$i]['you_tube_id'] = substr($video_detail[0]['video_url'],-11);




                    unset($data[$i]['update']);
                    unset($data[$i]['earn_points']);
                    unset($data[$i]['shared_with']);
                    unset($data[$i]['user_activity']);
                    unset($data[$i]['common_id']);
                    unset($data[$i]['user_id']);
                    unset($data[$i]['id']);




                    $data[$i]['video_url'] = $video_detail[0]['video_url'];
                    //$data[$i]['rel_date'] = $my_rel_date;
                    $data[$i]['youtube_views'] = $video_detail[0]['youtube_views'];
                    $data[$i]['created'] = $my_created;
                    //$data[$i]['updated'] = $my_updated;
                    $data[$i]['you_tube_id'] = substr($video_detail[0]['video_url'],-11);





                    $i++;
                }

                $message = 'Liked video';
                $err_code = 200;
            }

            else
            {
                $total_poster = $this->db->query('SELECT * from user_activity where user_id = '.$user_id.' and user_activity = "liked" and cat_id = 3 order by created DESC '.$limit)->result_array();
                $i =0;
                foreach ($total_poster as $poster)
                {
                    $data[$i] = $poster; echo '<pre>'; print_r($poster); die('lll');
                    //$data[$i]['created'] = strtotime($poster['created']);
                    // $data[$i]['video_detail'] = $this->get_video_main_data($video['common_id']);
                    //$data[$i]['poster_detail'] = $this->get_poster_main_data($poster['common_id']);
                    $poster_detail = $this->get_poster_main_data($poster['common_id']);
                    //echo '<pre>' ; print_r($poster_detail); die('kl');
                    $data[$i]['subcat_id'] = $poster_detail->subcat_id;


                    $data[$i]['id'] = $poster_detail->id;
                    $data[$i]['subcat_name'] = $poster_detail->subcat_name;
                    $data[$i]['video_name'] = $poster_detail->video_name;
                    $data[$i]['poster_type'] = $poster_detail->poster_type;
                    $data[$i]['liked'] = $poster_detail->liked;
                    $data[$i]['play'] = $poster_detail->play;
                    $data[$i]['final_url'] = $poster_detail->final_url;
                    $data[$i]['thumb'] = $poster_detail->thumb;
                    //$data[$i]['rel_date'] = $poster_detail->rel_date;
                    $data[$i]['created'] = $poster_detail->rel_date;
                    $data[$i]['created'] = strtotime($data[$i]['created']);



                    unset($data[$i]['common_id']);
                    unset($data[$i]['earn_points']);
                    unset($data[$i]['shared_with']);
                    unset($data[$i]['update']);



                    $i++;
                }

                $message = 'Liked poster';
                $err_code = 200;
            }
           
        }

        $printarray['result'] = $data;
        $printarray['message'] = $message;
        $printarray['errorCode'] = $err_code;
        $this->response($printarray);

    }



   

}
