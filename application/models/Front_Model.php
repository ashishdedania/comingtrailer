<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Front_Model
 *
 * @author yoo
 */
class Front_Model extends CI_Model {

    //put your code here

    public function __construct() {
        // parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('WebService');
    }

    public function getVideoByMovie($cat_id, $movie_id, $video_id) {

        $this->db->select('d.`id`,d.`video_name`');
        $this->db->from('video AS d'); // I use aliasing make joins easier
        $this->db->join('video_map_movie AS e', 'd.id = e.video_id', 'INNER');
        $this->db->where(array('e.video_id != ' . $video_id . ' and e.movie_id = ' => '' . $movie_id));
        $this->db->order_by("d.rel_date", "desc");
        $movie_result = $this->db->get();
        // $movies = array();
        // unset($movies);
        //$movies = array();
//            print_r($movie_result->result_array());exit;
        $num = $movie_result->num_rows();
        if ($num > 0) {
            foreach ($movie_result->result_array() as $movie) {
                $video_json = $this->WebService->getIndividualTrailer($cat_id, 0, '', '', $movie['id']);
                $datas = json_decode($video_json);
//                            echo print_r($datas->data);
                if (!empty($datas->data[0]->video_name)) {
                    $video[] = $video_json;
                }
            }
        } else {
            $video[] = '';
        }
        $finalarray = @$video;
        empty($movies);

//            print_r($finalarray);

        return $finalarray;
    }

    public function getPosterByMovie($cat_id, $movie_id) {

        $this->db->select('d.`id`,d.`poster_name`');
        $this->db->from('poster AS d'); // I use aliasing make joins easier
        $this->db->join('poster_map_movie AS e', 'd.id = e.poster_id', 'INNER');
        $this->db->where(array('e.movie_id = ' => '' . $movie_id));
        $this->db->where(array('d.is_deleted = ' => '0'));
        $this->db->order_by("d.rel_date", "desc");
        $movie_result = $this->db->get();
        $num = $movie_result->num_rows();
//            echo $movie_result->num_rows().'....'.$movie_id;exit;
        //echo $num;exit;
        if ($num > 0) {
            foreach ($movie_result->result_array() as $movie) {
                $video_json = $this->WebService->getIndividualPoster(0, '', '', $movie['id']);
                $video[] = $video_json;
            }
        } else {
            $video[] = '';
        }
        $finalarray = $video;
        empty($movies);

        return $finalarray;
    }

    public function getMovieByActor($actor_id) {

        $this->db->select('d.`id`,d.`movie_name`');
        $this->db->from('movie AS d'); // I use aliasing make joins easier
        $this->db->join('movie_map_cast AS e', 'd.id = e.movie_id', 'INNER');
        $this->db->where(array('e.personality_id = ' => '' . $actor_id));
        $this->db->order_by("d.rel_date", "desc");
        $movie_result = $this->db->get();
        $num = $movie_result->num_rows();
        if ($num > 0) {
            foreach ($movie_result->result_array() as $movie) {
                $movies[] = array('cast_id' => '' . $movie['id'], 'cast_name' => '' . $movie['cast_name']);
            }
        } else {
            $movies[] = array('cast_id' => '', 'cast_name' => '');
        }
        $finalarray = $movies;
        empty($movies);

        return $finalarray;
    }

    public function getUserLiked($user_id = 0, $cat_id = 0, $video_id = 0, $user_activity = '') {

        $this->db->select('*');
        $this->db->from('user_activity AS d'); // I use aliasing make joins easier
        if ($user_id > 0) {
            $this->db->where(array('d.user_id = ' => '' . $user_id));
        }
        if ($cat_id > 0) {
            $this->db->where(array('d.cat_id = ' => '' . $cat_id));
        }
        if ($user_activity != '') {
            $this->db->where(array('d.user_activity = ' => '' . $user_activity));
        }
        if ($video_id > 0) {
            $this->db->where(array('d.comman_id = ' => '' . $actor_id));
        }

        if ($this->input->post('search_year')) {
            $this->db->where("DATE_FORMAT(`d`.`created`,'%Y')", $this->input->post('search_year'));
        }
        if ($this->input->post('search_month')) {
            $this->db->where("DATE_FORMAT(`d`.`created`,'%c')", $this->input->post('search_month'));
        }
        $_POST['from_search'] = 'yes';
        $_POST['ajax'] = 'yes';

        $this->db->order_by("d.id", "desc");
        $user_result = $this->db->get();

        $num = $user_result->num_rows();
        if ($num > 0) {
            //echo $num;exit;
            foreach ($user_result->result_array() as $user) {
                $cat_id = $user['cat_id'];
                $comman_id = $user['common_id'];
                $timestamp = strtotime('' . $user['created']);
                $new_date_format = date('d M, Y H:i A', $timestamp);
                if ($cat_id == 3) {
                    $data_json = $this->WebService->getIndividualPoster(0, '', '', $comman_id);
                    //$all_data[] = $data_json;
                    $all_data[] = array('mydata' => $data_json, 'date' => $new_date_format, 'shared_with' => $user['shared_with'], 'user_data' => $user);
                } else if (($cat_id == 1) || ($cat_id == 2)) {
                    $data_json = $this->WebService->getIndividualTrailer($cat_id, 0, '', '', $comman_id);
                    $all_data[] = array('mydata' => $data_json, 'date' => $new_date_format, 'shared_with' => $user['shared_with'], 'user_data' => $user);
                } else {
                    $all_data[] = '';
                }
            }
        } else {
            $all_data[] = '';
        }

        $finalarray = $all_data;
        empty($all_data);

        // print_r($finalarray);exit;

        return $finalarray;
    }

    public function getSharedFriends($user_id = 0, $user_invite_code = '') {

        $this->db->select('*');
        $this->db->from('user AS d'); // I use aliasing make joins easier

        $this->db->where(array('d.shared_code = ' => '' . $user_invite_code));

        if ($this->input->post('search_year')) {
            //echo $this->input->post('search_year');exit;
            if ($this->input->post('search_month')) {
                $this->db->where("DATE_FORMAT(`d`.`created`,'%c')", $this->input->post('search_month'));
            }
            $this->db->where("DATE_FORMAT(`d`.`created`,'%Y')", $this->input->post('search_year'));
        }

        if ($this->input->post('search_keyword')) {

            //if($this->input->post('ajax')){
            if ($this->input->post('search_keyword') == '0-9') {
                //echo $this->input->post('search_keyword');exit;
                $this->db->where(array('`d`.`name` RLIKE ' => '^[0-9].*'));
            } else {
                $this->db->like('LOWER(`d`.`name`)', strtolower($this->input->post('search_keyword')), 'after');
            }
//            }else{
//                $this->db->like('`d`.`name`',$this->input->post('search_keyword'));
//            }
        }

        $user_result = $this->db->get();
        // echo $user_result->num_rows();exit;

        if ($user_result->num_rows() > 0) {
            foreach ($user_result->result_array() as $value) {


                $this->db->select('*');
                $this->db->from('user_activity AS e');
                $this->db->where('e.user_id = ', '' . $value['id']);
                $this->db->where('e.user_activity = ', 'invite_friend');
                $this->db->order_by("e.id", "desc");
                $data_result = $this->db->get();
                if ($data_result->num_rows() > 0) {
                    foreach ($data_result->result_array() as $value1) {
//                        echo $value1['created'];exit;
                        $timestamp = strtotime('' . $value1['created']);
                        $new_date_format = date('d M, Y H:i A', $timestamp);
                        $invite_data[] = array('user_name' => $value['name'], 'date' => $new_date_format);
                    }
                }
            }
        } else {
            $invite_data[] = '';
        }

        return $invite_data;
    }

    public function getUserSharedFriends($user_id) {
        $this->db->select('d.`name`,e.`shared_points`,e.`created`,d.`mobile`');
        $this->db->from('user AS d'); // I use aliasing make joins easier
        $this->db->join('user_frnd_share AS e', 'd.id = e.shared_to_id', 'INNER');
        $this->db->where(array('e.shared_by_id = ' => '' . $user_id));
        $this->db->order_by("e.id", "desc");
        if ($this->input->post('search_year')) {
            if ($this->input->post('search_month')) {
                $this->db->where("DATE_FORMAT(`d`.`created`,'%c')", $this->input->post('search_month'));
            }
            $this->db->where("DATE_FORMAT(`d`.`created`,'%Y')", $this->input->post('search_year'));
        }

        if ($this->input->post('search_keyword')) {

            //if($this->input->post('ajax')){
            if ($this->input->post('search_keyword') == '0-9') {
                //echo $this->input->post('search_keyword');exit;
                $this->db->where(array('`d`.`name` RLIKE ' => '^[0-9].*'));
            } else {
                $this->db->like('LOWER(`d`.`name`)', strtolower($this->input->post('search_keyword')), 'after');
            }
//            }else{
//                $this->db->like('`d`.`name`',$this->input->post('search_keyword'));
//            }
        }



        $movie_result = $this->db->get();


        $num = $movie_result->num_rows();
        if ($num > 0) {
            foreach ($movie_result->result_array() as $movie) {
                $timestamp = strtotime('' . $movie['created']);
                $new_date_format = date('d M, Y H:i A', $timestamp);
                $movies[] = array('name' => '' . $movie['name'], 'shared_points' => '' . $movie['shared_points'], 'date' => $new_date_format, 'mobile' => $movie['mobile']);
            }
        } else {
            $movies[] = '';
        }
        $finalarray = $movies;
        empty($movies);

        return $finalarray;
    }

    function getTotalSearchData($global_search_keyword, $type) {
        //video detials
        $this->db->like("LOWER(`video_name`)", strtolower($global_search_keyword));
//            if(!$this->input->post('api')){
//                if($page != '') $this->db->limit($limit,($page-1)*$limit);
//            }else{
//                $this->db->limit($limit,$page);
//            }
        $this->db->where('is_deleted', '0');
        if (!$this->input->post('api')) {
            $this->db->where('cat_id', '' . $type);
        } else {
//                $this->db->where('cat_id','1');
//                $this->db->or_where('cat_id','2');
        }
        $search_result['video'] = $this->db->get('video')->result_array();
        $total_search_result = count($search_result['video']);

//            $search_result['total_search_result'] = $total_search_result;

        return $total_search_result;
    }

    function searchTrailer($page = '', $limit = '', $type) {
        $_POST['global_search_keyword'] = trim($_POST['global_search_keyword']);
      
        $videos = $this->db->query('SELECT * FROM video WHERE cat_id = '.$type.' and video_name LIKE "%'.$_POST['global_search_keyword'].'%" order by created DESC')->result_array();
        $i=0;
        foreach ($videos as $row) 
        {
            $search_result['video'][$i] = $row;
            $search_result['video'][$i]['you_tube_id'] = substr($row['video_url'],-11);
            $search_result['video'][$i]['video_thumb'] =($row['video_thumb'] != "") ? base_url().'images/videothumb/'.$row['video_thumb'] : null;
            $search_result['video'][$i]['detail_data'] = $this->get_video_data($row['id']);
             $search_result['video'][$i]['created'] = strtotime($row['created']);
            $i++;
        }
        $total_search_result = count($videos);

        $search_result['total_current_search_result'] = $total_search_result;

        $search_result['total_search_result'] = $total_search_result;
        //echo $total_search_result;exit;
        //  print_r($search_result);exit;
        return json_encode($search_result);
    }


    function searchTrailer_all_search_post($page = '', $limit = '', $type) {
        $_POST['global_search_keyword'] = trim($_POST['global_search_keyword']);
      
        $videos = $this->db->query('SELECT video.*,video_url.final_url FROM video LEFT JOIN video_url ON video_url.id=video.seo_url_id  WHERE cat_id = '.$type.' and video_name LIKE "%'.$_POST['global_search_keyword'].'%" order by video.created DESC')->result_array();
        $i=0;
        foreach ($videos as $row) 
        {
            unset($row['video_desc']);


            unset($row['video_keywords']);
            unset($row['rel_date']);
            unset($row['is_deleted']);
            unset($row['my_release']);
            unset($row['seo_url_id']);
            unset($row['updated']);


            $sub_category = $this->My_model->getresult("SELECT * from sub_category where id=".$row['subcat_id']."");
            $row['subcat_name'] = $sub_category[0]['subcat_name'];


            


            $data_m = $this->My_model->getresult("SELECT personality.personality_name as name from "
                            . "personality left join video_map_cast on video_map_cast.personality_id = personality.id "
                            . "where personality.is_cast = 1 and video_map_cast.video_id = " . $row['id'] . "");
            $k = 0;
            $cast = "";
            foreach ($data_m as $movie_cast) {
                $cast .= $movie_cast['name'].',';
                $k++;                            
            }
            $row['cast'] = $cast;


            
            $singer = $this->My_model->getresult('SELECT group_concat(personality_name) as singer FROM `video_map_singer` inner join personality on personality.id = personality_id where video_id = '.$row['id'].' and is_singer = 1 '); 
            $row['singer'] = $singer[0]['singer'];


            $mdirector = $this->My_model->getresult('SELECT group_concat(personality_name) as music_director FROM `video_map_music` inner join personality on personality.id = personality_id where video_id = '.$row['id'].' and is_music_director = 1'); 
            $row['music_director'] = $mdirector[0]['music_director'];
            

            $director = $this->My_model->getresult('SELECT group_concat(personality_name) as director FROM `video_map_director` inner join personality on personality.id = personality_id where video_id = '.$row['id'].' and is_director = 1'); 
            $row['director'] = $director[0]['director'];
            




            /*subcat_name
            full_movie
            cast
            singer
            music_director
            director
            final_url*/




            




            $search_result['video'][$i] = $row;
            unset($search_result['video'][$i]['video_thumb']);
            $search_result['video'][$i]['you_tube_id'] = substr($row['video_url'],-11);
            $search_result['video'][$i]['thumb'] =($row['video_thumb'] != "") ? base_url().'images/videothumb/'.$row['video_thumb'] : null;
            $search_result['video'][$i]['detail_data'] = $this->get_video_data($row['id']);


            $full_movie = $this->My_model->getresult("SELECT movie.full_movie from "
                                . "movie left join video_map_movie on video_map_movie.movie_id = movie.id "
                                . "where video_map_movie.video_id = " . $row['id'] . "");
            $search_result['video'][$i]['detail_data']['full_movie'] = $full_movie[0]['full_movie'];



             $search_result['video'][$i]['created'] = strtotime($row['created']);
            $i++;
        }
        $total_search_result = count($videos);

        $search_result['total_current_search_result'] = $total_search_result;

        $search_result['total_search_result'] = $total_search_result;
        //echo $total_search_result;exit;
        //  print_r($search_result);exit;
        return json_encode($search_result);
    }

    function getTotalPosterSearchData($global_search_keyword) {
        $this->db->select('P.*,pi.poster_image');
        $this->db->from('poster P');
        $this->db->join('poster_img AS pi', 'P.id = pi.poster_id', 'INNER');
        $this->db->like('LOWER(`poster_name`)', strtolower($global_search_keyword));

        $this->db->where('is_deleted', '0');
        $this->db->where('display_order', '1');
        $search_result['poster'] = $this->db->get()->result_array();

        $total_search_result = count($search_result['poster']);

        return $total_search_result;
    }

    function searchPoster($page = '', $limit = '') {

        $search_result = array();
//        echo $this->input->post('global_search_keyword');exit;
        if (trim($this->input->post('global_search_keyword'))) {
            $this->session->unset_userdata('total_search_result');
            $global_search_keyword = trim($this->input->post('global_search_keyword'));
            $this->session->set_userdata('global_search_keyword', $global_search_keyword);
        }
        if ($this->session->userdata('global_search_keyword')) {
            $global_search_keyword = $this->session->userdata('global_search_keyword');
        }
        $total = $this->getTotalPosterSearchData($global_search_keyword);
        //poster details
        // $this->db->select('P.id as pid,P.*,pi.poster_image', FALSE);
        // $this->db->from('poster P');
        // $this->db->join('poster_img AS pi', 'P.id = pi.poster_id', 'INNER');
        // $this->db->like('LOWER(`poster_name`)', strtolower($global_search_keyword));
        // if ($page != '')
        //     $this->db->limit($limit, ($page - 1) * $limit);
        // $this->db->where('is_deleted', '0');
        // $this->db->where('display_order', '1');
        // $this->db->order_by('P.rel_date', 'DESC');
        // //$this->db->get()->result_array();
        // $poster = $this->db->get()->result_array();
        $poster = $this->db->query("SELECT poster.*,sub_category.subcat_name,"
                        . "poster.poster_name as video_name,poster_img.poster_type, CONCAT(poster.likes,' Likes') as liked,"
                        . "CONCAT(poster.views,' Views') as play, (select CONCAT('" . base_url() . "images/poster/',poster_img.poster_image) from poster_img where poster_img.poster_id=poster.id order by poster_img.poster_type asc,poster_img.display_order asc limit 1) as thumb
                        FROM poster 
                LEFT JOIN sub_category ON poster.subcat_id=sub_category.id
                LEFT JOIN video_url ON video_url.id=poster.seo_url_id 
                LEFT JOIN poster_img ON poster_img.poster_id=poster.id                 
                WHERE poster.poster_name like '%" . $global_search_keyword . "%'  AND    
                poster.is_deleted='0'                
                group by poster.id                
                ORDER BY poster.rel_date DESC")->result_array();


      //  print_r($poster);exit;
        $i=0;
        foreach ($poster as $row) 
        {
            $search_result['poster'][$i] = $row;
             $search_result['poster'][$i]['created'] = strtotime($row['created']);
            //$search_result['poster'][$i]['thumb'] = ($row['poster_image'] != "") ? BASE_URL().'images/poster/'.$row['poster_image'] : null;
            $i++;
        }
        $total_search_result = count($poster);

        $search_result['total_current_search_result'] = $total_search_result;

        $search_result['total_search_result'] = $total;
        //echo $total_search_result;exit;
//            print_r($search_result);exit;
        return json_encode($search_result);
    }

    public function getIndividalDataCount($global_search_keyword) {
        if ($this->input->post('selected') == 'released_by') {
            $individual = array($this->input->post('selected') => 'rel_by');
        } else if (in_array($this->input->post('selected'), array('cast', 'singer', 'music', 'director'))) {
            $individual = array($this->input->post('selected') => "personality");
        } else {
            $individual = array($this->input->post('selected') => $this->input->post('selected'));
        }
        $total_search_result = 0;
        foreach ($individual as $table => $col_name) {
            $this->db->like("LOWER(`" . $col_name . "_name`)", strtolower($global_search_keyword));

            $this->db->where("status", 0);

            if (in_array($table, array('cast', 'singer', 'music', 'director'))) {
                $this->db->select("personality.*, personality_img as " . $table . "_img,personality_name as " . $table . "_name, personality_title as " . $table . "_title,personality_desc as " . $table . "_desc,personality_keywords as " . $table . "_keywords", false);
                $this->db->from("personality");
                if ($table == 'music') {
                    $this->db->where("is_" . $table . "_director", 1);
                } else {
                    $this->db->where("is_" . $table, 1);
                }
                $result = $this->db->get()->result_array();
            } else {
                $result = $this->db->get($table)->result_array();
            }

            $total_search_result += count($result);
        }
        return $total_search_result;
    }

    function searchIndividual($page = '', $limit = '') {

        $search_result = array();
//        echo $this->input->post('global_search_keyword');exit;
        if (trim($this->input->post('global_search_keyword'))) {
            $this->session->unset_userdata('total_search_result');
            $global_search_keyword = trim($this->input->post('global_search_keyword'));
            $this->session->set_userdata('global_search_keyword', $global_search_keyword);
        }
        if ($this->session->userdata('global_search_keyword')) {
            $global_search_keyword = $this->session->userdata('global_search_keyword');
        }
        if ($this->input->post('selected') == 'released_by') {
            $individual = array($this->input->post('selected') => 'rel_by');
        } else if (in_array($this->input->post('selected'), array('cast', 'singer', 'music', 'director'))) {
            $individual = array($this->input->post('selected') => "personality");
        } else {
            $individual = array($this->input->post('selected') => $this->input->post('selected'));
        }
        $individual_elements = ['m' => 'movie', 's' => 'video', 't' => 'video', 'p' => 'poster'];
        $total_search_result = 0;
        if (isset($global_search_keyword)) {
            $total = $this->getIndividalDataCount($global_search_keyword);
            foreach ($individual as $table => $col_name) {
                $this->db->like("LOWER(`" . $col_name . "_name`)", strtolower($global_search_keyword));
                if ($page != '')
                    $this->db->limit($limit, ($page - 1) * $limit); //-->pagination
                $this->db->where("status", 0);
                if (in_array($table, array('cast', 'singer', 'music', 'director'))) {
                    $this->db->select("personality.*, personality_img as " . $table . "_img,personality_name as " . $table . "_name, personality_title as " . $table . "_title,personality_desc as " . $table . "_desc,personality_keywords as " . $table . "_keywords", false);
                    $this->db->from("personality");
                    if ($table == 'music') {
                        $this->db->where("is_" . $table . "_director", 1);
                    } else {
                        $this->db->where("is_" . $table, 1);
                    }
                    $result = $this->db->get()->result_array();
                } else {
                    $result = $this->db->get($table)->result_array();
                }
                if (count($result) > 0) {
                    $total_search_result += count($result);
                    foreach ($result as $k => $person) {
                        $search_result[$table][$k]['detail'] = $person;
                        foreach ($individual_elements as $key => $ie_table) {
                            if (($key != 'p' || ($table != 'music' && $table != 'singer')) && ($table != 'released_by' || $ie_table == 'video')) {
                                $this->db->select('*');
                                $this->db->from('personality AS t'); // I use aliasing make joins easier
                                if ($table != 'released_by') {
                                    $this->db->join($ie_table . '_map_' . $table . ' AS map', 't.id = map.personality_id', 'INNER');
                                    $this->db->where(array('map.personality_id' => $person['id']));
                                } else {
                                    $this->db->join($ie_table . '_map_relby AS map', 't.id = map.' . $col_name . '_id', 'INNER');
                                    $this->db->where(array('map.' . $col_name . '_id' => $person['id']));
                                }
                                $this->db->join($ie_table . ' AS mapped', 'mapped.id = map.' . $ie_table . '_id', 'INNER');
                                $this->db->where("t.status", 0);
                                if ($key != 'm') {
                                    $this->db->where("mapped.is_deleted", 0);
                                }
                                if ($key == 't') { //--> Get Video Trailer
                                    $this->db->where('mapped.cat_id', 1);
                                } elseif ($key == 's') { //--> Get video Songs
                                    $this->db->where('mapped.cat_id', 2);
                                }
                                $search_result[$table][$k][$key] = $this->db->get()->num_rows();
                            }
                        }
                    }
                }
            }
            $search_result['total_current_search_result'] = $total_search_result;
            $search_result['total_search_result'] = $total;
            //echo $total_search_result;exit;
//            print_r($search_result);exit;
            return json_encode($search_result);
        }
    }

    function searchIndividual_cast($page = '', $limit = '')
    {
        $result_data['cast'] = $this->db->query('SELECT * from personality where is_cast = 1 and  personality_name LIKE "%'.$_POST['global_search_keyword'].'%"')->result_array();
        $result_data['total_current_search_result'] = (count($result_data['cast']) > 1) ? count($result_data['cast']) - 1 : count($result_data['cast']);
        $result_data['total_search_result'] = count($result_data['cast']);
        return json_encode($result_data);
    }
    function searchIndividual_director($page = '', $limit = '')
    {
        $result_data['director'] = $this->db->query('SELECT * from personality where is_director = 1 and  personality_name LIKE "%'.$_POST['global_search_keyword'].'%"')->result_array();
         $result_data['total_current_search_result'] = (count($result_data['director']) > 1) ? count($result_data['director']) - 1 : count($result_data['director']);
        $result_data['total_search_result'] = count($result_data['director']);
        return json_encode($result_data);
    }
    function searchIndividual_music($page = '', $limit = '')
    {
        $result_data['music'] = $this->db->query('SELECT * from personality where is_music_director = 1 and  personality_name LIKE "%'.$_POST['global_search_keyword'].'%"')->result_array();
         $result_data['total_current_search_result'] = (count($result_data['music']) > 1) ? count($result_data['music']) - 1 : count($result_data['music']);
        $result_data['total_search_result'] = count($result_data['music']);
        return json_encode($result_data);
    }
    function searchIndividual_singer($page = '', $limit = '')
    {
        $result_data['singer'] = $this->db->query('SELECT * from personality where is_singer = 1 and  personality_name LIKE "%'.$_POST['global_search_keyword'].'%"')->result_array();
         $result_data['total_current_search_result'] = (count($result_data['singer']) > 1) ? count($result_data['singer']) - 1 : count($result_data['singer']);
        $result_data['total_search_result'] = count($result_data['singer']);
        return json_encode($result_data);
    }

    function companyDataCount($global_search_keyword) {
        $individual = array('released_by');
        $total_search_result = 0;
        foreach ($individual as $table) {
            $this->db->like("LOWER(`rel_by_name`)", strtolower($global_search_keyword));

            $result = $this->db->get($table)->result_array();
            $total_search_result = count($result);
        }

        return $total_search_result;
    }

    function searchCompany($page = '', $limit = '') {

        $search_result = array();
//        echo $this->input->post('global_search_keyword');exit;
        if (trim($this->input->post('global_search_keyword'))) {
            $this->session->unset_userdata('total_search_result');
            $global_search_keyword = trim($this->input->post('global_search_keyword'));
            $this->session->set_userdata('global_search_keyword', $global_search_keyword);
        }
        if ($this->session->userdata('global_search_keyword')) {
            $global_search_keyword = $this->session->userdata('global_search_keyword');
        }
        $individual = array('released_by');
        $individual_elements = ['s' => 'video', 't' => 'video'];
        $total_search_result = 0;
        if (isset($global_search_keyword)) {
            $total = $this->companyDataCount($global_search_keyword);
            foreach ($individual as $table) {
                $this->db->like("LOWER(`rel_by_name`)", strtolower($global_search_keyword));
                if ($page != '')
                    $this->db->limit($limit, ($page - 1) * $limit);
                $result = $this->db->get($table)->result_array();
                if (count($result) > 0) {
                    $total_search_result = count($result);
                    foreach ($result as $k => $person) {
                        $search_result['channel'][$k]['detail'] = $person;
                        $search_result['channel'][$k]['detail']['rel_by_img'] = ($person['rel_by_img'] != "") ? base_url().'images/channel/'.$person['rel_by_img'] : null;
                        foreach ($individual_elements as $key => $ie_table) {
                            if ($key != 'p' || ($table != 'music' && $table != 'singer')) {
                                $this->db->select('*');
                                $this->db->from($table . ' AS t'); // I use aliasing make joins easier
                                $this->db->join($ie_table . '_map_relby AS map', 't.id = map.rel_by_id', 'INNER');
                                $this->db->join($ie_table . ' AS mapped', 'mapped.id = map.' . $ie_table . '_id', 'INNER');
                                $this->db->where(array('map.rel_by_id' => $person['id']));

                                if ($key == 't') { //--> Get Video Trailer
                                    $this->db->where('mapped.cat_id', 1);
                                } elseif ($key == 's') { //--> Get video Songs
                                    $this->db->where('mapped.cat_id', 2);
                                }
                                $search_result[$table][$k][$key] = $this->db->get()->num_rows();
                            }
                        }
                    }
                }
            }

            $search_result['total_current_search_result'] = $total_search_result;
            $search_result['total_search_result'] = $total;
//            echo 'test....'.$total_search_result;exit;
//            print_r($search_result);exit;
            return json_encode($search_result);
        }
    }

    function serchMovieCount($global_search_keyword) {
        $this->db->like('LOWER(`movie_name`)', strtolower($global_search_keyword));

        $searched_movie = $this->db->get('movie')->result_array();

        $total_search_result = count($searched_movie);

        return $total_search_result;
    }

    function searchMovie($page = '', $limit = '') {

        $search_result = array();
//        echo $this->input->post('global_search_keyword');exit;
        if (trim($this->input->post('global_search_keyword'))) {
            $this->session->unset_userdata('total_search_result');
            $global_search_keyword = trim($this->input->post('global_search_keyword'));
            $this->session->set_userdata('global_search_keyword', $global_search_keyword);
        }
        if ($this->session->userdata('global_search_keyword')) {
            $global_search_keyword = $this->session->userdata('global_search_keyword');
        }
        //movie list
        $total = $this->serchMovieCount($global_search_keyword);
        $this->db->like('LOWER(`movie_name`)', strtolower($global_search_keyword));
        if ($page != '')
            $this->db->limit($limit, ($page - 1) * $limit);
         $this->db->order_by('my_release', 'DESC');
        $searched_movie = $this->db->get('movie')->result_array();
        $stp = array('s' => 'video', 't' => 'video', 'p' => 'poster');
        $total_search_result = 0;
        if (count($searched_movie) > 0) {
            $total_search_result = count($searched_movie);
            foreach ($searched_movie as $key => $movie) {
                $search_result['movie'][$key]['detail'] = $movie;
                $search_result['movie'][$key]['detail']['thumb'] = ($movie['movie_img'] != "") ? base_url().'images/movies/'.$movie['movie_img'] : null;
              //   $search_result['movie'][$key]['detail']['detail_data'] = $this->get_movie_data($movie['id']);
                // foreach ($stp as $k => $ie_table) {
                //     $this->db->select('*');
                //     $this->db->from('movie AS t'); // I use aliasing make joins easier
                //     $this->db->join($ie_table . '_map_movie AS map', 't.id = map.movie_id', 'INNER');
                //     $this->db->join($ie_table . ' AS mapped', 'mapped.id = map.' . $ie_table . '_id', 'INNER');
                //     $this->db->where(array('map.movie_id' => $movie['id']));

                //     if ($k == 't') { //--> Get Video Trailer
                //         $this->db->where('mapped.cat_id', 1);
                //     } elseif ($k == 's') { //--> Get video Songs
                //         $this->db->where('mapped.cat_id', 2);
                //     }
                //     //$this->db->like('t.'.$table.'_name',$global_search_keyword);
                //     //$search_result[$table][$k][$key] = $this->db->get()->result_array();
                //     $search_result['movie'][$key][$k] = $this->db->get()->num_rows();
                // }
            }
        }

        $search_result['total_current_search_result'] = $total_search_result;
        $search_result['total_search_result'] = $total;
        //echo $total_search_result;exit;
//            print_r($search_result);exit;
        return json_encode($search_result);
    }

    function searchPlaylist($page = '', $limit = '')
    {
        $columns = array('playlist.id', 'playlist.created', 'playlist.name', 'playlist.playlist_thumb',
            'playlist.show_in_app', 'playlist.is_deleted','playlist.redirect_link','playlist.subcat_id');
             $posts = $this->My_model->getresult("
                   SELECT " . implode(',', $columns) . " FROM playlist                
                   where playlist.is_deleted=0 and playlist.name like '%".$_POST["global_search_keyword"]."%'  order by playlist.created DESC 
                   
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
            
        
        return json_encode($data);
    }

    public function update_user_profile() {

        //print_r($_POST);exit;
        if ($this->input->post('user_id')) {

            $gender = $this->input->post('gender');
            if ($gender == 1) {
                $gender_value = 'male';
            } else {
                $gender_value = 'female';
            }
            $mobile = $this->input->post('mobile');
            $userEditData = array(
                'name' => trim($this->input->post('name')),
                'gender' => trim($gender_value),
                'email' => $this->input->post('email'),
                'mobile' => $mobile
            );
           // print_r($userEditData);exit;
            if (!empty($_FILES['profile_img']['name'])) {
//                unlink(base_url("images/user/" . $this->session->userdata('profile_img')));
                $config['upload_path'] = 'images/user/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif|JPG';
                $config['file_name'] = $this->input->post('user_id') . '-' . $_FILES['profile_img']['name'];

                //Load upload library and initialize configuration
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('profile_img')) {
                    $uploadData = $this->upload->data();
                    $userEditData['img'] = base_url('images/user/' . $uploadData['file_name']);
                }

                $this->db->select('*');
                $this->db->from('user AS t');
                $this->db->where("t.id", '' . $this->input->post('user_id'));
                $result_data = $this->db->get();

                if ($result_data->num_rows() > 0) {
                    foreach ($result_data->result_array() as $invited) {

                        $profile = substr($invited['img'], 42);
                        if (@getimagesize('images/user/' . $profile)) {
                            unlink('images/user/' . $profile);
                        }
                    }
                }
            }
            $newsletter = $this->input->post('newsletter');
            if ($newsletter == 1) {
                $this->db->from('newsletter'); // I use aliasing make joins easier
                $this->db->where("email", '' . $this->input->post('email'));
                $result = $this->db->get();
                if ($result->num_rows() == 0) {
                    $data = array('email' => '' . $this->input->post('email'));
                    $this->db->insert('newsletter', $data);
                }
            } else if ($newsletter == 0) {
                $this->db->where('email', '' . $this->input->post('email'));
                $this->db->delete('newsletter');
            }
            $this->db->where('id', $this->input->post('user_id'));
            $this->db->update('user', $userEditData);
            $user_updated_data = $this->db->get_where('user', ['id' => $this->input->post('user_id')])->row_array();
            $user_updated_data['newsletter'] = $this->input->post('newsletter');
            return $user_updated_data;
        } else {
            return false;
        }
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


}
