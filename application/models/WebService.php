<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of WebService
 *
 * @author yoo
 */
class WebService extends CI_Model {

    //put your code here

    public function __construct() {
        // parent::__construct();
        $this->load->database();
        $this->load->helper('url');
    }

    function getAllCategory() {

        $this->db->select('category.*');
        $this->db->from('category');
        //$this->db->join('sub_category', 'category.id = sub_category.cat_id');
        $beers['result'] = $this->db->get();
        $result = array();

        foreach ($beers['result']->result_array() as $category) {

            $sub_cat = $this->getSubCategory($category['id']);
            //echo $entry['cat_name'];exit;

            $pri_cat[] = array('pri_id' => $category['id'], 'pri_name' => $category['cat_name'],
                'sub_cat' => $sub_cat);
        }
//        $beers = array(
//                'New Belgium Ranger IPA',
//                'Odell Brewing St. Lupulin',
//                'Upslope Pale Ale',
//                'Ska Brewing Modus Hoperandi',
//                'Great Divide Titan IPA'
//        );

        $side_big_adv = $this->getAdsense(1380, 390);
        $img_link = '';
        $ad_img = '';
        $datas = json_decode($side_big_adv);
        $adv_data = $datas->data;
        foreach ($adv_data as $adv) {
            if (!empty($adv)) {
                if ($adv->adv_option == 'C') {
                    
                } else {
                    $img_link = $adv->image_link;
                    $ad_img = $adv->adv_image;
                }
            }
        }

        // Build our view's data object
        $data = array('staus' => 0, 'msg' => 'Success', 'message' => 'Category get Successfully', 'data' => $pri_cat, 'adv_img' => $ad_img, 'adv_link' => $img_link);

        return $data;
    }

    public function getSubCategory($subcat_id) {

        $this->db->select('*,b.id AS subcat_id');
        $this->db->from('cat_map_subcat AS a'); // I use aliasing make joins easier
        $this->db->join('sub_category AS b', 'a.subcat_id = b.id', 'INNER');
        $this->db->where(array('a.cat_id' => '' . $subcat_id));
        // $this->db->order_by("menu_order", "asc");
        $sub['result'] = $this->db->get();
        $sub_inc = 0;
        foreach ($sub['result']->result_array() as $sub_cats) {
            $sub_cat[$sub_inc++] = array('sub_id' => $sub_cats['subcat_id'], 'sub_name' => $sub_cats['subcat_name']);
        }
        return $sub_cat;
    }

    public function getAllTrailer($cat_id, $subcat_id, $limit, $start, $status = '0') {

        $this->db->select('COUNT(*) AS totaldata');
        $this->db->from('video AS a'); // I use aliasing make joins easier
        //echo $status;exit;
        $this->db->join('category AS b', 'a.cat_id = b.id', 'INNER');
        $this->db->join('sub_category AS c', 'a.subcat_id = c.id', 'INNER');
        $this->db->where(array('a.is_deleted' => $status, 'a.cat_id' => '' . $cat_id));
        if ($subcat_id > 0) {
            $this->db->where(array('a.subcat_id' => '' . $subcat_id));
        }
        $result = $this->db->get();
        //echo $this->db->last_query();exit;

        $total_record = 0;
        if ($result->num_rows() > 0) {
            foreach ($result->result_array() as $value) {

                $total_record = $value['totaldata'];
            }
        }

        $this->db->select('*,b.id AS cat_id,c.id AS subcat_id,a.id AS video_id,a.created as creates,a.updated as updates');
        $this->db->from('video AS a'); // I use aliasing make joins easier
        //echo $status;exit;
        $this->db->join('category AS b', 'a.cat_id = b.id', 'INNER');
        $this->db->join('sub_category AS c', 'a.subcat_id = c.id', 'INNER');
        $this->db->where(array('a.is_deleted' => $status, 'a.cat_id' => '' . $cat_id));
        if ($subcat_id > 0) {
            $this->db->where(array('a.subcat_id' => '' . $subcat_id));
        }
        if ($this->input->post('search_year')) {
            //echo $this->input->post('search_year');exit;
            $this->db->where("DATE_FORMAT(`a`.`rel_date`,'%Y')", $this->input->post('search_year'));
        }
        if ($this->input->post('search_month')) {
            //echo $this->input->post('search_month');exit;
            $this->db->where("DATE_FORMAT(`a`.`rel_date`,'%c')", $this->input->post('search_month'));
        }
        if ($this->input->post('search_keyword')) {
            // echo $this->input->post('search_keyword');exit;
            if ($this->input->post('ajax')) {
                if ($this->input->post('search_keyword') == '0-9') {
                    //echo $this->input->post('search_keyword');exit;
                    $this->db->where(array('`a`.`video_name` RLIKE ' => '^[0-9].*'));
                } else {
                    $this->db->like('LOWER(`a`.`video_name`)', strtolower($this->input->post('search_keyword')), 'after');
                }
            } else {
                $this->db->like('LOWER(`a`.`video_name`)', strtolower($this->input->post('search_keyword')));
            }
        }

        $this->db->order_by("a.rel_date", "desc");
        //echo $limit.'....'.$start;exit;
        if (!empty($limit) || !empty($start)) {

            $this->db->limit($limit, $start);
        }

        //die($this->db->get_compiled_select());
        // $this->db->limit(5, 0);
        $result = $this->db->get(); //echo '<pre>'; print_r($result->result_array()); die('llll');
        //echo $this->db->last_query();exit;

        $count = 0;
        if ($result->num_rows() > 0) {
            foreach ($result->result_array() as $value) {
                $count++;
//                echo $value['total'];
                if (!$this->input->post('webservice')) {
//                    echo $value['video_id'].'..'.$value['seo_url_id'];exit;
                    $moviess = $this->getVideoMapMovie($value['video_id']);
                    $casting = $this->getVideoMapCast($value['video_id']);
                    $singer = $this->getVideoMapSinger($value['video_id']);
                    $music = $this->getVideoMapMusic($value['video_id']);
                    $director = $this->getVideoMapDirector($value['video_id']);
                    $released = $this->getVideoMapRelBy($value['video_id']);



                    $trailer[] = array('video_id' => '' . $value['video_id'], 'cat_id' => '' . $value['cat_id'], 'cat_name' => '' . $value['cat_name'], 'subcat_id' => '' . $value['subcat_id'], 'subcat_name' => '' . $value['subcat_name'], 'video_name' => '' . $value['video_name'],
                        'video_url' => '' . $value['video_url'], 'video_thumb' => '' . base_url() . 'images/videothumb/' . $value['video_thumb'], 'video_thumb_285' => '' . base_url() . 'images/videothumb/285X160-' . $value['video_thumb'], 'video_desc' => '' . $value['video_desc'],
                        'release_date' => $value['rel_date'], 'total_likes' => '' . $value['liked'], 'total_play' => '' . $value['play'],
                        'movies' => $moviess, 'video_cast' => $casting, 'singer' => $singer, 'Music' => $music, 'Director' => $director,
                        'releasedBy' => $released, 'my_release_date' => $value['my_release'], 'seo_url_id' => $value['seo_url_id'], 'created' => $value['creates'], 'updated' => $value['updates']);
                } else {

                    $user_id = $this->input->post('user_id');
                    $islike = false;
                    if ($user_id > 0) {
                        $islike = $this->getUserLike($user_id, $value['video_id'], $value['cat_id']);
                    }
                    $seo_url = $this->getSeoUrl('video_url', $value['seo_url_id']);

                    $trailer[] = array('video_id' => '' . $value['video_id'], 'cat_id' => '' . $value['cat_id'], 'cat_name' => '' . $value['cat_name'], 'subcat_id' => '' . $value['subcat_id'], 'subcat_name' => '' . $value['subcat_name'], 'video_name' => '' . $value['video_name'],
                        'video_url' => '' . $value['video_url'], 'video_thumb' => '' . base_url() . 'images/videothumb/' . $value['video_thumb'], 'video_desc' => '' . $value['video_desc'],
                        'release_date' => $value['rel_date'], 'total_likes' => '' . $value['liked'], 'total_play' => '' . $value['play'], 'is_liked' => $islike, 'web_url' => $seo_url);
                }
            }
            $data = array('status' => 0, 'msg' => 'Success', 'message' => 'Category get Successfully', 'data' => $trailer, 'total_trailer' => $count, 'total_record' => $total_record);
        } else {
            $trailer[] = array();
            $data = array('status' => 1, 'msg' => 'Error', 'message' => 'Data is not available', 'data' => $trailer, 'total_trailer' => 0, 'total_record' => 0);
        }
        // echo json_encode($data);
        return json_encode($data);
    }

    public function getVideoMapRelBy($video_id) {
        $this->db->select('d.*');
        $this->db->from('released_by AS d'); // I use aliasing make joins easier
        $this->db->join('video_map_relby AS e', 'd.id = e.rel_by_id', 'INNER');
        $this->db->where(array('e.video_id' => '' . $video_id));
        $movie_result = $this->db->get();
        // $movies = array();
        // unset($movies);
        //$movies = array();
        //print_r($movie_result->result_array());
        $num = $movie_result->num_rows();
        if ($num > 0) {
            foreach ($movie_result->result_array() as $movie) {
                $movies[] = array('rel_by_id' => '' . $movie['id'], 'rel_by_name' => '' . $movie['rel_by_name'], 'seo_url_id' => '' . $movie['seo_url_id']
                    , 'rel_img' => '' . $movie['rel_by_img']);
            }
        } else {
            $movies[] = array('rel_by_id' => '', 'rel_by_name' => '', 'seo_url_id' => '0', 'rel_img' => '');
        }
        $finalarray = $movies;
        empty($movies);

        return $finalarray;
    }

    public function getVideoMapDirector($video_id) {
        $this->db->select('d.*');
        $this->db->from('personality AS d'); // I use aliasing make joins easier
        $this->db->join('video_map_director AS e', 'd.id = e.personality_id', 'INNER');
        $this->db->where(array('e.video_id' => '' . $video_id));
        $movie_result = $this->db->get();
        // $movies = array();
        // unset($movies);
        //$movies = array();
        //print_r($movie_result->result_array());
        $num = $movie_result->num_rows();
        if ($num > 0) {
            foreach ($movie_result->result_array() as $movie) {
                $movies[] = array('director_id' => '' . $movie['id'], 'director_name' => '' . $movie['personality_name'], 'seo_url_id' => '' . $movie['seo_url_id']
                    , 'director_img' => '' . $movie['personality_img']);
            }
        } else {
            $movies[] = array('director_id' => '', 'director_name' => '', 'seo_url_id' => '0', 'director_img' => '');
        }
        $finalarray = $movies;
        empty($movies);

        return $finalarray;
    }

    public function getVideoMapMusic($video_id) {
        $this->db->select('d.*');
        $this->db->from('personality AS d'); // I use aliasing make joins easier
        $this->db->join('video_map_music AS e', 'd.id = e.personality_id', 'INNER');
        $this->db->where(array('e.video_id' => '' . $video_id));
        $movie_result = $this->db->get();
        // $movies = array();
        // unset($movies);
        //$movies = array();
        //print_r($movie_result->result_array());
        $num = $movie_result->num_rows();
        if ($num > 0) {
            foreach ($movie_result->result_array() as $movie) {
                $movies[] = array('music_id' => '' . $movie['id'], 'music_name' => '' . $movie['personality_name'], 'seo_url_id' => '' . $movie['seo_url_id']
                    , 'music_img' => '' . $movie['personality_img']);
            }
        } else {
            $movies[] = array('music_id' => '', 'music_name' => '', 'seo_url_id' => '0', 'music_img' => '');
        }
        $finalarray = $movies;
        empty($movies);

        return $finalarray;
    }

    public function getVideoMapSinger($video_id) {
        $this->db->select('d.*');
        $this->db->from('personality AS d'); // I use aliasing make joins easier
        $this->db->join('video_map_singer AS e', 'd.id = e.personality_id', 'INNER');
        $this->db->where(array('e.video_id' => '' . $video_id));
        $movie_result = $this->db->get();
        // $movies = array();
        // unset($movies);
        //$movies = array();
        //print_r($movie_result->result_array());
        $num = $movie_result->num_rows();
        if ($num > 0) {
            foreach ($movie_result->result_array() as $movie) {
                $movies[] = array('singer_id' => '' . $movie['id'], 'singer_name' => '' . $movie['personality_name'], 'seo_url_id' => '' . $movie['seo_url_id']
                    , 'singer_img' => '' . $movie['personality_img']);
            }
        } else {
            $movies[] = array('singer_id' => '', 'singer_name' => '', 'seo_url_id' => '0', 'singer_img' => '');
        }
        $finalarray = $movies;
        empty($movies);

        return $finalarray;
    }

    public function getVideoMapCast($video_id) {
        $this->db->select('d.*');
        $this->db->from('personality AS d'); // I use aliasing make joins easier
        $this->db->join('video_map_cast AS e', 'd.id = e.personality_id', 'INNER');
        $this->db->where(array('e.video_id' => '' . $video_id));
        $movie_result = $this->db->get();
        // $movies = array();
        // unset($movies);
        //$movies = array();
        //print_r($movie_result->result_array());
        $num = $movie_result->num_rows();
        if ($num > 0) {
            foreach ($movie_result->result_array() as $movie) {
                $movies[] = array('cast_id' => '' . $movie['id'], 'cast_name' => '' . $movie['personality_name'], 'seo_url_id' => '' . $movie['seo_url_id']
                    , 'cast_img' => '' . $movie['personality_img']);
            }
        } else {
            $movies[] = array('cast_id' => '', 'cast_name' => '', 'seo_url_id' => '0', 'cast_img' => '');
        }
        $finalarray = $movies;
        empty($movies);

        return $finalarray;
    }

    public function getVideoMapMovie($video_id) {

        $this->db->select('d.*');
        $this->db->from('movie AS d'); // I use aliasing make joins easier
        $this->db->join('video_map_movie AS e', 'd.id = e.movie_id', 'INNER');
        $this->db->where(array('e.video_id' => '' . $video_id));
        $movie_result = $this->db->get();
        // $movies = array();
        // unset($movies);
        //$movies = array();
        //print_r($movie_result->result_array());
        $num = $movie_result->num_rows();
        if ($num > 0) {
            foreach ($movie_result->result_array() as $movie) {

                $movies[] = array('movie_id' => '' . $movie['id'], 'movie_name' => '' . $movie['movie_name'], 'my_release' => $movie['my_release']
                    , 'seo_url_id' => '' . $movie['seo_url_id']);
            }
        } else {
            $movies[] = array('movie_id' => '', 'movie_name' => '', 'my_release' => '', 'seo_url_id' => '0');
        }
        $finalarray = $movies;
        empty($movies);

        return $finalarray;
    }

    //.....................................................methods for movie..................................


    public function getAllMovie($subcat_id, $limit, $start) {


        $this->db->select('*,c.id AS subcat_id,a.id AS movie_id');
        $this->db->from('movie AS a'); // I use aliasing make joins easier
        $this->db->join('sub_category AS c', 'a.subcat_id = c.id', 'INNER');
        $this->db->where(array('a.subcat_id' => '' . $subcat_id));

        if ($limit != '' && $start != '') {
            $this->db->limit($limit, $start);
        }
        $result = $this->db->get();
        $count = 0;
        if ($result->num_rows() > 0) {
            foreach ($result->result_array() as $value) {
                $count++;

                $casting = $this->getMovieMapCast($value['movie_id']);
                $singer = $this->getMovieMapSinger($value['movie_id']);
                $music = $this->getMovieMapMusic($value['movie_id']);
                $director = $this->getMovieMapDirector($value['movie_id']);

                $trailer[] = array('movie_id' => '' . $value['movie_id'], 'subcat_id' => '' . $value['subcat_id'], 'subcat_name' => '' . $value['subcat_name'], 'movie_name' => '' . $value['movie_name'],
                    'movie_desc' => '' . $value['movie_desc'],
                    'release_date' => $value['rel_date'], 'total_likes' => '' . $value['like'], 'total_play' => '' . $value['play'],
                    'movies' => $moviess, 'video_cast' => $casting, 'singer' => $singer, 'Music' => $music, 'Director' => $director,
                    'releasedBy' => $released);
            }

            $data = array('status' => 0, 'msg' => 'Success', 'message' => 'Category get Successfully', 'data' => $trailer, 'total_trailer' => $count);
        } else {
            $trailer[] = array();
            $data = array('status' => 1, 'msg' => 'Error', 'message' => 'Data is not available', 'data' => $trailer, 'total_trailer' => 0);
        }


        // echo json_encode($data);
        return json_encode($data);
    }

    public function getMovieMapDirector($movie_id) {
        $this->db->select('d.*');
        $this->db->from('personality AS d'); // I use aliasing make joins easier
        $this->db->join('movie_map_director AS e', 'd.id = e.personality_id', 'INNER');
        $this->db->where(array('e.movie_id' => '' . $movie_id));
        $movie_result = $this->db->get();
        // $movies = array();
        // unset($movies);
        //$movies = array();
        //print_r($movie_result->result_array());
        $num = $movie_result->num_rows();
        if ($num > 0) {
            foreach ($movie_result->result_array() as $movie) {
                $movies[] = array('director_id' => '' . $movie['id'], 'director_name' => '' . $movie['personality_name'], 'director_img' => $movie['personality_img']
                    , 'seo_url_id' => $movie['seo_url_id']);
            }
        } else {
            $movies[] = array('director_id' => '', 'director_name' => '', 'director_img' => '', 'seo_url_id' => '0');
        }
        $finalarray = $movies;
        empty($movies);

        return $finalarray;
    }

    public function getMovieMapMusic($movie_id) {
        $this->db->select('d.*');
        $this->db->from('personality AS d'); // I use aliasing make joins easier
        $this->db->join('movie_map_music AS e', 'd.id = e.personality_id', 'INNER');
        $this->db->where(array('e.movie_id' => '' . $movie_id));
        $movie_result = $this->db->get();
        // $movies = array();
        // unset($movies);
        //$movies = array();
        //print_r($movie_result->result_array());
        $num = $movie_result->num_rows();
        if ($num > 0) {
            foreach ($movie_result->result_array() as $movie) {
                $movies[] = array('music_id' => '' . $movie['id'], 'music_name' => '' . $movie['personality_name'], 'music_img' => $movie['personality_img']
                    , 'seo_url_id' => $movie['seo_url_id']);
            }
        } else {
            $movies[] = array('music_id' => '', 'music_name' => '', 'music_img' => '', 'seo_url_id' => '0');
        }
        $finalarray = $movies;
        empty($movies);

        return $finalarray;
    }

    public function getMovieMapSinger($movie_id) {
        $this->db->select('d.*');
        $this->db->from('personality AS d'); // I use aliasing make joins easier
        $this->db->join('movie_map_singer AS e', 'd.id = e.personality_id', 'INNER');
        $this->db->where(array('e.movie_id' => '' . $movie_id));
        $movie_result = $this->db->get();
        // $movies = array();
        // unset($movies);
        //$movies = array();
        //print_r($movie_result->result_array());
        $num = $movie_result->num_rows();
        if ($num > 0) {
            foreach ($movie_result->result_array() as $movie) {
                $movies[] = array('singer_id' => '' . $movie['id'], 'singer_name' => '' . $movie['personality_name'], 'singer_img' => '' . $movie['personality_img']
                    , 'seo_url_id' => $movie['seo_url_id']);
            }
        } else {
            $movies[] = array('singer_id' => '', 'singer_name' => '', 'singer_img' => '', 'seo_url_id' => '0');
        }
        $finalarray = $movies;
        empty($movies);

        return $finalarray;
    }

    public function getMovieMapCast($movie_id) {
        $this->db->select('d.*');
        $this->db->from('personality AS d'); // I use aliasing make joins easier
        $this->db->join('movie_map_cast AS e', 'd.id = e.personality_id', 'INNER');
        $this->db->where(array('e.movie_id' => '' . $movie_id));
        $movie_result = $this->db->get();
        // $movies = array();
        // unset($movies);
        //$movies = array();
        //print_r($movie_result->result_array());
        $num = $movie_result->num_rows();
        if ($num > 0) {
            foreach ($movie_result->result_array() as $movie) {
                $movies[] = array('cast_id' => '' . $movie['id'], 'cast_name' => '' . $movie['personality_name'], 'cast_img' => '' . $movie['personality_img'],
                    'seo_url_id' => '' . $movie['seo_url_id']);
            }
        } else {
            $movies[] = array('cast_id' => '', 'cast_name' => '', 'cast_img' => '', 'seo_url_id' => '0');
        }
        $finalarray = $movies;
        empty($movies);

        return $finalarray;
    }

    //......................................poster methods.........

    public function getPosterMapCast($poster_id) {
        $this->db->select('d.*');
        $this->db->from('personality AS d'); // I use aliasing make joins easier
        $this->db->join('poster_map_cast AS e', 'd.id = e.personality_id', 'INNER');
        $this->db->where(array('e.poster_id' => '' . $poster_id));
        $movie_result = $this->db->get();
        // $movies = array();
        // unset($movies);
        //$movies = array();
        //print_r($movie_result->result_array());
        $num = $movie_result->num_rows();
        if ($num > 0) {
            foreach ($movie_result->result_array() as $movie) {
                $movies[] = array('cast_id' => '' . $movie['id'], 'cast_name' => '' . $movie['personality_name'], 'seo_url_id' => '' . $movie['seo_url_id']
                    , 'cast_img' => '' . $movie['personality_img']);
            }
        } else {
            $movies[] = array('cast_id' => '', 'cast_name' => '', 'seo_url_id' => '0');
        }
        $finalarray = $movies;
        empty($movies);

        return $finalarray;
    }

    public function getPosterMapDirector($poster_id) {
        $this->db->select('d.*');
        $this->db->from('personality AS d'); // I use aliasing make joins easier
        $this->db->join('poster_map_director AS e', 'd.id = e.personality_id', 'INNER');
        $this->db->where(array('e.poster_id' => '' . $poster_id));
        $movie_result = $this->db->get();
        // $movies = array();
        // unset($movies);
        //$movies = array();
        //print_r($movie_result->result_array());
        $num = $movie_result->num_rows();
        if ($num > 0) {
            foreach ($movie_result->result_array() as $movie) {
                $movies[] = array('director_id' => '' . $movie['id'], 'director_name' => '' . $movie['personality_name']
                    , 'seo_url_id' => $movie['seo_url_id'], 'director_img' => $movie['personality_img']);
            }
        } else {
            $movies[] = array('director_id' => '', 'director_name' => '', 'seo_url_id' => '0');
        }
        $finalarray = $movies;
        empty($movies);

        return $finalarray;
    }

    public function getPosterMapMovie($poster_id) {

        $this->db->select('d.*');
        $this->db->from('movie AS d'); // I use aliasing make joins easier
        $this->db->join('poster_map_movie AS e', 'd.id = e.movie_id', 'INNER');
        $this->db->where(array('e.poster_id' => '' . $poster_id));
        $movie_result = $this->db->get();
        // $movies = array();
        // unset($movies);
        //$movies = array();
        //print_r($movie_result->result_array());
        $num = $movie_result->num_rows();
        if ($num > 0) {
            foreach ($movie_result->result_array() as $movie) {
                $movies[] = array('movie_id' => '' . $movie['id'], 'movie_name' => '' . $movie['movie_name'], 'my_release' => '' . $movie['my_release']
                    , 'seo_url_id' => $movie['seo_url_id']);
            }
        } else {
            $movies[] = array('movie_id' => '', 'movie_name' => '', 'my_release' => '', 'seo_url_id' => '0');
        }
        $finalarray = $movies;
        empty($movies);

        return $finalarray;
    }

    function getPosterFirstImages($poster_id) {
        $movies = array();
        $this->db->select('*');
        $this->db->from('poster_img'); // I use aliasing make joins easier
        // $this->db->join('poster_map_movie AS e', 'd.id = e.movie_id', 'INNER');

        $this->db->where(array('poster_id' => $poster_id));
        $this->db->order_by("poster_type", "asc");
        $this->db->order_by("display_order", "asc");
        $movie_result = $this->db->get();
        // $movies = array();
        // unset($movies);
        //$movies = array();
        //print_r($movie_result->result_array());
        $num = $movie_result->num_rows();
        if ($num > 0) {
            $row = 1;
            foreach ($movie_result->result_array() as $movie) {
                $image_path = $movie['poster_image'];
                $movies[] = array('poster_img_id' => '' . $movie['id'], 'poster_img' => base_url() . 'timthumb.php?src=' . base_url() . 'images/poster/' . $image_path . '&w=285&h=160');
            }
        } else {
            $movies[] = array('poster_img_id' => '', 'poster_img' => '');
        }
        $finalarray = $movies;
        return $finalarray;
    }

    function getPosterImages($poster_id) {
        $movies = array();
        $this->db->select('*');
        $this->db->from('poster_img'); // I use aliasing make joins easier
        // $this->db->join('poster_map_movie AS e', 'd.id = e.movie_id', 'INNER');

        $this->db->where(array('poster_id' => $poster_id, "poster_type" => 1));
        $this->db->order_by("display_order", "asc");
        $movie_result = $this->db->get();
        // $movies = array();
        // unset($movies);
        //$movies = array();
        //print_r($movie_result->result_array());
        $num = $movie_result->num_rows();
        if ($num > 0) {
            $row = 1;
            foreach ($movie_result->result_array() as $movie) {
                if ($row == 1) {
                    $image_path = '285X160-' . $movie['poster_image'];
                } else {
                    $image_path = $movie['poster_image'];
                }
                $movies[] = array('poster_img_id' => '' . $movie['id'], 'poster_img' => base_url() . 'images/poster/' . $image_path);
            }
        } else {
            $movies[] = array('poster_img_id' => '', 'poster_img' => '');
        }
        $finalarray = $movies;
        return $finalarray;
    }

    function getFirstLookImages($poster_id) {
        $this->db->select('*');
        $this->db->from('poster_img'); // I use aliasing make joins easier
        // $this->db->join('poster_map_movie AS e', 'd.id = e.movie_id', 'INNER');

        $this->db->where(array('poster_id' => '' . $poster_id, 'poster_type' => 2));
        $this->db->order_by("display_order", "asc");
        $movie_result = $this->db->get();
        // $movies = array();
        // unset($movies);
        //$movies = array();
        //print_r($movie_result->result_array());
        $num = $movie_result->num_rows();
        if ($num > 0) {
            $row = 1;
            foreach ($movie_result->result_array() as $movie) {
                if ($row == 1) {
                    $image_path = '285X160-' . $movie['poster_image'];
                } else {
                    $image_path = $movie['poster_image'];
                }
                $movies[] = array('poster_img_id' => '' . $movie['id'], 'poster_img' => base_url() . 'images/poster/' . $image_path);
            }
        } else {
            $movies[] = array('poster_img_id' => '', 'poster_img' => '');
        }
        $finalarray = $movies;
        empty($movies);

        return $finalarray;
    }

    function getWallpaperImages($poster_id) {
        $this->db->select('*');
        $this->db->from('poster_img'); // I use aliasing make joins easier
        // $this->db->join('poster_map_movie AS e', 'd.id = e.movie_id', 'INNER');

        $this->db->where(array('poster_id' => '' . $poster_id, 'poster_type' => 3));
        $this->db->order_by("display_order", "asc");
        $movie_result = $this->db->get();
        // $movies = array();
        // unset($movies);
        //$movies = array();
        //print_r($movie_result->result_array());
        $num = $movie_result->num_rows();
        if ($num > 0) {
            $row = 1;
            foreach ($movie_result->result_array() as $movie) {
                if ($row == 1) {
                    $image_path = '285X160-' . $movie['poster_image'];
                } else {
                    $image_path = $movie['poster_image'];
                }
                $movies[] = array('poster_img_id' => '' . $movie['id'], 'poster_img' => base_url() . 'images/poster/' . $image_path);
            }
        } else {
            $movies[] = array('poster_img_id' => '', 'poster_img' => '');
        }
        $finalarray = $movies;
        empty($movies);

        return $finalarray;
    }

    public function getAllPoster($subcat_id, $limit, $start, $status = 0) {

        $this->db->select('*,c.id AS subcat_id,a.id AS poster_id, a.created as creates, a.updated as updates');
        $this->db->from('poster AS a'); // I use aliasing make joins easier
        $this->db->join('sub_category AS c', 'a.subcat_id = c.id', 'INNER');
        if ($subcat_id > 0) {
            $this->db->where(array('a.subcat_id' => '' . $subcat_id));
        }
        $this->db->where('a.is_deleted', $status);
        if ($this->input->post('search_year')) {
            $this->db->where("DATE_FORMAT(`a`.`rel_date`,'%Y')", $this->input->post('search_year'));
        }
        if ($this->input->post('search_month')) {
            $this->db->where("DATE_FORMAT(`a`.`rel_date`,'%c')", $this->input->post('search_month'));
        }
        if ($this->input->post('search_keyword')) {

            if ($this->input->post('ajax')) {
                if ($this->input->post('search_keyword') == '0-9') {
                    //echo $this->input->post('search_keyword');exit;
                    $this->db->where(array('`a`.`poster_name` RLIKE ' => '^[0-9].*'));
                } else {
                    $this->db->like('LOWER(`a`.`poster_name`)', strtolower($this->input->post('search_keyword')), 'after');
                }
            } else {
                $this->db->like('LOWER(`a`.`poster_name`)', strtolower($this->input->post('search_keyword')));
            }
        }

        if ($limit != '' || $start != '') {
            $this->db->limit($limit, $start);
        }
        $this->db->order_by("a.rel_date", "desc");
        $result = $this->db->get();
        $count = 0;
        if ($result->num_rows() > 0) {
            foreach ($result->result_array() as $value) {
                $count++;
                $moviess = $this->getPosterMapMovie($value['poster_id']);
                $casting = $this->getPosterMapCast($value['poster_id']);
                $director = $this->getPosterMapDirector($value['poster_id']);
                //$poster_img = $this->getPosterImages($value['poster_id']);
                $poster_img = $this->getPosterFirstImages($value['poster_id']);
                $trailer[] = array('poster_id' => '' . $value['poster_id'], 'subcat_id' => '' . $value['subcat_id'], 'subcat_name' => '' . $value['subcat_name'], 'poster_name' => '' . $value['poster_name'],
                    'poster_desc' => '' . $value['poster_desc'],
                    'release_date' => $value['rel_date'], 'total_likes' => '' . $value['likes'], 'total_views' => '' . $value['views'],
                    'movies' => $moviess, 'poster_cast' => $casting, 'director' => $director, 'poster_img' => $poster_img, 'my_release_date' => $value['my_release'], 'seo_url_id' => $value['seo_url_id'], 'created' => $value['creates']
                    , 'updated' => $value['updates']);
            }

            $data = array('status' => 0, 'msg' => 'Success', 'message' => 'Poster get Successfully', 'data' => $trailer, 'total_poster' => $count);
        } else {
            $trailer[] = array();
            $data = array('status' => 1, 'msg' => 'Error', 'message' => 'Data is not available', 'data' => $trailer, 'total_poster' => 0);
        }


        //echo json_encode($data);
        return json_encode($data);
    }

    public function getAdsense($width, $height) {

        $this->db->select('*');
        $this->db->from('adsense AS a');
        $this->db->where(array('width' => '' . $width, 'height' => '' . $height));
        $result = $this->db->get();

        if ($result->num_rows() > 0) {
            foreach ($result->result_array() as $value) {


                $adv[] = array('adv_id' => '' . $value['id'], 'width' => '' . $value['width'],
                    'height' => '' . $value['height'], 'adv_option' => '' . $value['selected_show_opt'],
                    'google_code' => '' . $value['code'],
                    'adv_image' => '' . base_url() . 'images/jaherat/' . $value['img_name'],
                    'image_link' => $value['img_link']);
            }

            $data = array('status' => 0, 'msg' => 'Success', 'message' => 'Advertise get Successfully', 'data' => $adv);
        } else {
            $adv[] = array();
            $data = array('status' => 1, 'msg' => 'Error', 'message' => 'Data is not available', 'data' => $adv);
        }

        return json_encode($data);
    }

    public function getIndividualTrailer($cat_id, $subcat_id, $limit, $start, $video_id) {

        $this->db->select('*,b.id AS cat_id,c.id AS subcat_id,a.id AS video_id,a.created as creates, a.updated as updates');
        $this->db->from('video AS a'); // I use aliasing make joins easier
        $this->db->join('category AS b', 'a.cat_id = b.id', 'INNER');
        $this->db->join('sub_category AS c', 'a.subcat_id = c.id', 'INNER');

        $this->db->where(array('a.cat_id' => '' . $cat_id));
        if ($subcat_id > 0) {
            $this->db->where(array('a.subcat_id' => '' . $subcat_id));
        }
        if (!$this->input->post('from_search')) {
            if ($this->input->post('search_year')) {
                $this->db->where("DATE_FORMAT(`a`.`rel_date`,'%Y')", $this->input->post('search_year'));
            }
            if ($this->input->post('search_month')) {
                $this->db->where("DATE_FORMAT(`a`.`rel_date`,'%c')", $this->input->post('search_month'));
            }
        }
        if ($this->input->post('search_keyword')) {
            // echo $this->input->post('search_keyword');exit;
            if ($this->input->post('ajax')) {
                if ($this->input->post('search_keyword') == '0-9') {
                    //echo $this->input->post('search_keyword');exit;
                    $this->db->where(array('`a`.`video_name` RLIKE ' => '^[0-9].*'));
                } else {
                    $this->db->like('LOWER(`a`.`video_name`)', strtolower($this->input->post('search_keyword')), 'after');
                }
            } else {
                $this->db->like('LOWER(`a`.`video_name`)', strtolower($this->input->post('search_keyword')));
            }
        }
        if ($limit != '' && $start != '') {
            $this->db->limit($limit, $start);
        }
        //$this->db->order_by("a.id", "desc");
        $this->db->order_by("a.rel_date", "desc");
        $this->db->where(array('a.id' => '' . $video_id));
        $result = $this->db->get();
        $count = 0;
//        echo $result->num_rows().'...'.$video_id;exit;
        if ($result->num_rows() > 0) {
            foreach ($result->result_array() as $value) {
                $count++;
                if (!$this->input->post('webservice')) {
                    $moviess = $this->getVideoMapMovie($value['video_id']);
                    $casting = $this->getVideoMapCast($value['video_id']);
                    $singer = $this->getVideoMapSinger($value['video_id']);
                    $music = $this->getVideoMapMusic($value['video_id']);
                    $director = $this->getVideoMapDirector($value['video_id']);
                    $released = $this->getVideoMapRelBy($value['video_id']);

                    $trailer[] = array('video_id' => '' . $value['video_id'], 'cat_id' => '' . $value['cat_id'], 'cat_name' => '' . $value['cat_name'], 'subcat_id' => '' . $value['subcat_id'], 'subcat_name' => '' . $value['subcat_name'], 'video_name' => '' . $value['video_name'],
                        'video_url' => '' . $value['video_url'], 'video_thumb' => '' . base_url() . 'images/videothumb/' . $value['video_thumb'], 'video_thumb_285' => '' . base_url() . 'images/videothumb/285X160-' . $value['video_thumb'], 'video_desc' => '' . $value['video_desc'],
                        'release_date' => $value['rel_date'], 'total_likes' => '' . $value['liked'], 'total_play' => '' . $value['play'],
                        'movies' => $moviess, 'video_cast' => $casting, 'singer' => $singer, 'Music' => $music, 'Director' => $director,
                        'releasedBy' => $released, 'video_keywords' => $value['video_keywords'], 'my_release_date' => $value['my_release'], 'release_date' => $value['rel_date']
                        , 'seo_url_id' => $value['seo_url_id'], 'created' => $value['creates'], 'updated' => $value['updates']);
                } else {

                    $user_id = $this->input->post('user_id');
                    $islike = false;
                    if ($user_id > 0) {
                        $islike = $this->getUserLike($user_id, $value['video_id'], $value['cat_id']);
                    }
                    $seo_url = $this->getSeoUrl('video_url', $value['seo_url_id']);

                    $trailer[] = array('video_id' => '' . $value['video_id'], 'cat_id' => '' . $value['cat_id'], 'cat_name' => '' . $value['cat_name'], 'subcat_id' => '' . $value['subcat_id'], 'subcat_name' => '' . $value['subcat_name'], 'video_name' => '' . $value['video_name'],
                        'video_url' => '' . $value['video_url'], 'video_thumb' => '' . base_url() . 'images/videothumb/' . $value['video_thumb'], 'video_desc' => '' . $value['video_desc'],
                        'release_date' => $value['rel_date'], 'total_likes' => '' . $value['liked'], 'total_play' => '' . $value['play'], 'is_liked' => $islike, 'web_url' => $seo_url);
                }
            }

            $data = array('status' => 0, 'msg' => 'Success', 'message' => 'Category get Successfully', 'data' => $trailer, 'total_trailer' => $count);
        } else {

            $trailer[] = array();
            $data = array('status' => 1, 'msg' => 'Error', 'message' => 'Data is not available', 'data' => $trailer, 'total_trailer' => 0);
        }
//        echo json_encode($data);exit;
        return json_encode($data);
    }

    public function getIndividualTrailer_getUserLiked($cat_id, $subcat_id, $limit, $start, $video_id) {

        $this->db->select('*,b.id AS cat_id,c.id AS subcat_id,a.id AS video_id,a.created as creates, a.updated as updates');
        $this->db->from('video AS a'); // I use aliasing make joins easier
        $this->db->join('category AS b', 'a.cat_id = b.id', 'INNER');
        $this->db->join('sub_category AS c', 'a.subcat_id = c.id', 'INNER');

        $this->db->where(array('a.cat_id' => '' . $cat_id));
        if ($subcat_id > 0) {
            $this->db->where(array('a.subcat_id' => '' . $subcat_id));
        }
        if (!$this->input->post('from_search')) {
            if ($this->input->post('search_year')) {
                $this->db->where("DATE_FORMAT(`a`.`rel_date`,'%Y')", $this->input->post('search_year'));
            }
            if ($this->input->post('search_month')) {
                $this->db->where("DATE_FORMAT(`a`.`rel_date`,'%c')", $this->input->post('search_month'));
            }
        }
        if ($this->input->post('search_keyword')) {
            // echo $this->input->post('search_keyword');exit;
            if ($this->input->post('ajax')) {
                if ($this->input->post('search_keyword') == '0-9') {
                    //echo $this->input->post('search_keyword');exit;
                    $this->db->where(array('`a`.`video_name` RLIKE ' => '^[0-9].*'));
                } else {
                    $this->db->like('LOWER(`a`.`video_name`)', strtolower($this->input->post('search_keyword')), 'after');
                }
            } else {
                $this->db->like('LOWER(`a`.`video_name`)', strtolower($this->input->post('search_keyword')));
            }
        }
        if ($limit != '' && $start != '') {
            $this->db->limit($limit, $start);
        }
        //$this->db->order_by("a.id", "desc");
        $this->db->order_by("a.rel_date", "desc");
        $this->db->where(array('a.id' => '' . $video_id));
        $result = $this->db->get();
        $count = 0;
//        echo $result->num_rows().'...'.$video_id;exit;
        if ($result->num_rows() > 0) {
            foreach ($result->result_array() as $value) {
                $count++;
                if (!$this->input->post('webservice')) {
                    $moviess = $this->getVideoMapMovie($value['video_id']);
                    $casting = $this->getVideoMapCast($value['video_id']);
                    $singer = $this->getVideoMapSinger($value['video_id']);
                    $music = $this->getVideoMapMusic($value['video_id']);
                    $director = $this->getVideoMapDirector($value['video_id']);
                    $released = $this->getVideoMapRelBy($value['video_id']);

                    $trailer[] = array('video_id' => '' . $value['video_id'], 'cat_id' => '' . $value['cat_id'], 'cat_name' => '' . $value['cat_name'], 'subcat_id' => '' . $value['subcat_id'], 'subcat_name' => '' . $value['subcat_name'], 'video_name' => '' . $value['video_name'],
                        'video_url' => '' . $value['video_url'], 'video_thumb' => '' . base_url() . 'images/videothumb/' . $value['video_thumb'], 'video_thumb_285' => '' . base_url() . 'images/videothumb/285X160-' . $value['video_thumb'], 'video_desc' => '' . $value['video_desc'],
                        'release_date' => $value['rel_date'], 'total_likes' => '' . $value['liked'], 'total_play' => '' . $value['play'],
                        'movies' => $moviess, 'video_cast' => $casting, 'singer' => $singer, 'Music' => $music, 'Director' => $director,
                        'releasedBy' => $released, 'video_keywords' => $value['video_keywords'], 'my_release_date' => $value['my_release'], 'release_date' => $value['rel_date']
                        , 'seo_url_id' => $value['seo_url_id'], 'created' => $value['creates'], 'updated' => $value['updates'],'youtube_views' => $value['youtube_views']);
                } else {

                    $user_id = $this->input->post('user_id');
                    $islike = false;
                    if ($user_id > 0) {
                        $islike = $this->getUserLike($user_id, $value['video_id'], $value['cat_id']);
                    }
                    $seo_url = $this->getSeoUrl('video_url', $value['seo_url_id']);

                    $trailer[] = array('video_id' => '' . $value['video_id'], 'cat_id' => '' . $value['cat_id'], 'cat_name' => '' . $value['cat_name'], 'subcat_id' => '' . $value['subcat_id'], 'subcat_name' => '' . $value['subcat_name'], 'video_name' => '' . $value['video_name'],
                        'video_url' => '' . $value['video_url'], 'video_thumb' => '' . base_url() . 'images/videothumb/' . $value['video_thumb'], 'video_desc' => '' . $value['video_desc'],
                        'release_date' => $value['rel_date'], 'total_likes' => '' . $value['liked'], 'total_play' => '' . $value['play'], 'is_liked' => $islike, 'web_url' => $seo_url,'youtube_views' => $value['youtube_views']);
                }
            }


            

            $data = array('status' => 0, 'msg' => 'Success', 'message' => 'Category get Successfully', 'data' => $trailer, 'total_trailer' => $count);
        } else {

            $trailer[] = array();
            $data = array('status' => 1, 'msg' => 'Error', 'message' => 'Data is not available', 'data' => $trailer, 'total_trailer' => 0);
        }
//        echo json_encode($data);exit;
        return json_encode($data);
    }

    public function getIndividualPoster($subcat_id, $limit, $start, $poster_id) {
        $this->db->select('*,c.id AS subcat_id,a.id AS poster_id, a.created as creates, a.updated as updates');
        $this->db->from('poster AS a'); // I use aliasing make joins easier
        $this->db->join('sub_category AS c', 'a.subcat_id = c.id', 'INNER');
        if ($subcat_id > 0) {
            $this->db->where(array('a.subcat_id' => '' . $subcat_id));
        }

        if (!$this->input->post('from_search')) {
            if ($this->input->post('search_year')) {
                $this->db->where("DATE_FORMAT(`a`.`rel_date`,'%Y')", $this->input->post('search_year'));
            }
            if ($this->input->post('search_month')) {
                $this->db->where("DATE_FORMAT(`a`.`rel_date`,'%c')", $this->input->post('search_month'));
            }
        }
        if ($this->input->post('search_keyword')) {

            if ($this->input->post('ajax')) {
                if ($this->input->post('search_keyword') == '0-9') {
                    //echo $this->input->post('search_keyword');exit;
                    $this->db->where(array('`a`.`poster_name` RLIKE ' => '^[0-9].*'));
                } else {
                    $this->db->like('LOWER(`a`.`poster_name`)', strtolower($this->input->post('search_keyword')), 'after');
                }
            } else {
                $this->db->like('LOWER(`a`.`poster_name`)', strtolower($this->input->post('search_keyword')));
            }
        }

        if ($limit != '' && $start != '') {
            $this->db->limit($limit, $start);
        }

        $this->db->where(array('a.id' => '' . $poster_id));
        $this->db->order_by("a.rel_date", "desc");
        $result = $this->db->get();
        $count = 0;

        if ($result->num_rows() > 0) {
//            print_r($result->result_array());exit;
            foreach ($result->result_array() as $value) {
                $count++;
                $moviess = $this->getPosterMapMovie($value['poster_id']);
                $casting = $this->getPosterMapCast($value['poster_id']);
                $director = $this->getPosterMapDirector($value['poster_id']);
                $poster_img1 = $this->getPosterFirstImages($value['poster_id']);
                $poster_img = $this->getPosterImages($value['poster_id']);
                $firstlook_img = $this->getFirstLookImages($value['poster_id']);
                $wallpaper_img = $this->getWallpaperImages($value['poster_id']);
                $trailer[] = array('poster_id' => '' . $value['poster_id'], 'cat_id' => '3', 'subcat_id' => '' . $value['subcat_id'], 'subcat_name' => '' . $value['subcat_name'], 'poster_name' => '' . $value['poster_name'],
                    'poster_desc' => '' . $value['poster_desc'],
                    'release_date' => $value['rel_date'], 'total_likes' => '' . $value['likes'], 'total_views' => '' . $value['views'],
                    'movies' => $moviess, 'poster_cast' => $casting, 'director' => $director, 'poster_img' => $poster_img,
                    'firstlook_img' => $firstlook_img, 'wallpaper_img' => $wallpaper_img, 'poster_keywords' => $value['poster_keywords'], 'my_release_date' => $value['my_release'], 'poster_img1' => $poster_img1
                    , 'seo_url_id' => $value['seo_url_id'], 'created' => $value['creates'], 'updated' => $value['updates']);
            }

            $data = array('status' => 0, 'msg' => 'Success', 'message' => 'Poster get Successfully', 'data' => $trailer, 'total_poster' => $count);
        } else {
            $trailer[] = array();
            $data = array('status' => 1, 'msg' => 'Error', 'message' => 'Data is not available', 'data' => $trailer, 'total_poster' => 0);
        }


        //echo json_encode($data);
        return json_encode($data);
    }

    //For social media login
    public function loginSocialMedia($is_app = 0) {
        if ($this->input->post('name')) {
            $this->load->database();
            $this->db->select('*');
            $this->db->from('user'); // I use aliasing make joins easier

            if ($this->input->post('social_media') == 'WA') {
                $this->db->where("`social_media` = '" . $this->input->post('social_media') . "' AND `mobile` = '" . $this->input->post('mobile') . "'");
            } else {
                $this->db->where("`social_media_id` = '" . trim($this->input->post('social_media_id')) . "' AND `social_media` = '" . $this->input->post('social_media') . "'");
            }
            if ($this->input->post('email')) {
                $this->db->where('email', trim($this->input->post('email')));
            }
            $result = $this->db->get();
            //print_r($result->row());exit;
            $user_id = '';
            $verify_toeken = '';
            if ($result->num_rows() == 0) 

            {
                $isEmailVerify = 1;
                $isNumVerify = 0;

                $verify_toeken = '';

                if ($this->input->post('social_media') == 'WA') 
                {
                    $isEmailVerify = 0;
                    $isNumVerify = 1;

                    $verify_toeken = md5(uniqid(rand(), true));
                    $this->load->library('email');
                    $this->email->set_mailtype("html");
                    $this->email->from('admin@comingtrailer.com', 'Coming Trailer');
                    $this->email->to(trim($this->input->post('email')));

                    $this->email->subject('Coming Trailer verification');
                    $this->email->message('Click below link to verify ' . PHP_EOL
                            . ' https://www.comingtrailer.com/Verify/index/' . $verify_toeken);
                    $this->email->send();

                } else {
                    $isEmailVerify = 1;
                    $isNumVerify = 0;
                }

                $created = date('Y-m-d H:i:s');
                $userData = array(
                    'name' => trim($this->input->post('name')),
                    'mobile' => trim($this->input->post('mobile')),
                    'email' => trim($this->input->post('email')),
                    'gender' => trim($this->input->post('gender')),
                    'img' => trim($this->input->post('img')),
                    'shared_code' => '',
                    'social_media' => $this->input->post('social_media'),
                    'social_media_id' => trim($this->input->post('social_media_id')),
                    'isEmailVerify' => $isEmailVerify,
                    'isNumVerify' => $isNumVerify,
                    'verify_token' => $verify_toeken,
                    'updated' => $created,
                    'created' => $created
                );
                if ($this->session->userdata('shared_code')) {
                    $userData['shared_code'] = trim($this->session->userdata('shared_code'));
                    $this->session->unset_userdata('shared_code');
                } elseif ($this->input->post('shared_code')) {
                    $userData['shared_code'] = trim($this->input->post('shared_code'));
                }

                try {
                    /*$user_info = $this->db->query('SELECT * from user where email = "'.$this->input->post("email").'" or mobile = "'.$this->input->post("mobile").'"')->num_rows();
*/

                    if($this->input->post("email") != '' && $this->input->post("mobile") != '')
                    {

                        $user_info = $this->db->query('SELECT * from user where email = "'.$this->input->post("email").'" or mobile = "'.$this->input->post("mobile").'"')->num_rows();


                        if($user_info > 0)
                        {

                            $user_info = $this->db->query('SELECT * from user where email = "'.$this->input->post("email").'" or mobile = "'.$this->input->post("mobile").'"')->get();

                            $user_info['is_new'] = false;
                             return json_encode($user_info);
                        }

                    }

                    if($this->input->post("email") != '')
                    {

                        $user_info = $this->db->query('SELECT * from user where email = "'.$this->input->post("email").'"')->num_rows();


                        if($user_info > 0)
                        {

                            $user_info = $this->db->query('SELECT * from user where email = "'.$this->input->post("email").'"')->get();

                            $user_info['is_new'] = false;
                             return json_encode($user_info);
                        }


                    }


                    if($this->input->post("mobile") != '')
                    {

                        $user_info = $this->db->query('SELECT * from user where mobile = "'.$this->input->post("mobile").'"')->num_rows();

                        if($user_info > 0)
                        {

                            $user_info = $this->db->query('SELECT * from user where mobile = "'.$this->input->post("mobile").'"')->get();

                            $user_info['is_new'] = false;
                             return json_encode($user_info);
                        }
                    }

                    
                    $insertAdminData = $this->db->insert('user', $userData);
                    $last_insert_id = $this->db->insert_id();

                    $share_code = $this->generateShareCode();
                    $this->db->where('id', $last_insert_id);
                    $this->db->update('user', array('share_code' => $share_code . $last_insert_id));
                    $user_row = $this->db->get_where('user', array('id' => $last_insert_id))->row_array();
                    $user_row['is_new'] = true;
                    $userPoints = array(
                        'user_id' => $last_insert_id,
                        'earn_points' => 0,
                        'total_social_likes' => 0,
                        'total_invite' => 0,
                        'total_video_play' => 0,
                        'total_share' => 0,
                        'totla_frnds_share' => 0,
                        'total_likes' => 0,
                        'total_earn_rs' => 0
                    );
                    $this->db->insert('user_points', $userPoints);
                } catch (Exception $ex) {
                    die('DB Data Insertion Error: ' . $ex->getMessage());
                }





            } else {
                $user_row = $result->row_array();
                $user_row['is_new'] = false;
            }



            if ($user_row['share_code']) {
                $user_row['share_link'] = base_url('home/index/' . $user_row['share_code']);
            }




            if ($verify_toeken != '' && $is_app == 0) {
                $user_row = '';
                $this->session->set_flashdata('verifier', 'veryfy test');
            }

            return json_encode($user_row);
        }
        //redirect(base_url('login'));
    }

    public function emailVerify($token) {

        $this->db->select('*');
        $this->db->from('user'); // I use aliasing make joins easier
        $this->db->where('verify_token', $token);
        $result = $this->db->get();
        $message = '';
        if ($result->num_rows() > 0) {
            $userda = array(
                'isEmailVerify' => 1,
                'verify_token' => ''
            );

            $this->db->update('user', $userda);

            $message = "Your email is successsfully verified";
        } else {
            $message = "Invalide Token";
        }
        return $message;
    }

    public function updateUserProfile() {
        if ($this->input->post('user_id')) {

            $gender = $this->input->post('gender');
            if ($gender == 1) {
                $gender_value = 'male';
            } else {
                $gender_value = 'female';
            }
            $mobile = $this->input->post('mobile');
            $isEmailVerify = $this->input->post('isEmailVerify');
            $isNumVerify = $this->input->post('isNumVerify');
            $userEditData = array(
                'name' => trim($this->input->post('name')),
                'gender' => trim($gender_value),
                'love_country' => $this->input->post('love_country'),
                'email' => $this->input->post('email'),
                'mobile' => $mobile,
                'isEmailVerify' => $isEmailVerify,
                'isNumVerify' => $isNumVerify
            );
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

//                if(empty($this->db->get_where('newsletter',['email'=>$this->input->post('email')])->row_array())){
//                    
//                }
            } else if ($newsletter == 0) {
                $this->db->where('email', '' . $this->input->post('email'));
                $this->db->delete('newsletter');
            }
            $this->db->where('id', $this->input->post('user_id'));
            $this->db->update('user', $userEditData);

            $user_updated_data = $this->db->get_where('user', ['id' => $this->input->post('user_id')])->row_array();
            $user_updated_data['newsletter'] = $this->input->post('newsletter');
            $data = ['status' => 0, 'msg' => 'Success', 'message' => 'User Profile is successfully updated!!', 'data' => $user_updated_data];
        } else {
            $data = array('status' => 1, 'msg' => 'Error', 'message' => 'Invalid User');
        }
        echo json_encode($data);
    }

    public function globalSearch($page = '', $limit = '') {
        $page = ($page == 0) ? 1 : $page;
        $search_result = array();
        $global_search_keyword = stripslashes(trim($this->input->post('global_search_keyword')));
        if (!empty($global_search_keyword)) {

            $this->session->unset_userdata('total_search_result');
            $this->session->set_userdata('global_search_keyword', $global_search_keyword);
        }

        $individual = array('cast' => 'cast', 'director' => 'director', 'music' => 'music', 'singer' => 'singer', 'released_by' => 'rel_by');
        $individual_elements = ['m' => 'movie', 's' => 'video', 't' => 'video', 'p' => 'poster'];
        $total_search_result = 0;
        if (isset($global_search_keyword)) {
            $limit = 2;
            foreach ($individual as $table => $col_name) {
                $this->db->like("LOWER(`" . $col_name . "_name`)", strtolower($global_search_keyword));
//                echo ''.$table.'...'.(($page-1)*$limit).'...'.$limit;
                if ($page != '')
                    $this->db->limit($limit, ($page - 1) * $limit); //-->pagination
                $this->db->where("status", 0);
                $result = $this->db->get($table)->result_array();
                if (count($result) > 0) {
                    $total_search_result += count($result);
                    foreach ($result as $k => $person) {
                        $search_result[$table][$k]['detail'] = $person;
                        foreach ($individual_elements as $key => $ie_table) {
                            if (($key != 'p' || ($table != 'music' && $table != 'singer')) && ($table != 'released_by' || $ie_table == 'video')) {
                                $this->db->select('*');
                                $this->db->from($table . ' AS t'); // I use aliasing make joins easier
                                if ($table != 'released_by') {
                                    $this->db->join($ie_table . '_map_' . $table . ' AS map', 't.id = map.' . $table . '_id', 'INNER');
                                } else {
                                    $this->db->join($ie_table . '_map_relby AS map', 't.id = map.' . $col_name . '_id', 'INNER');
                                }
                                $this->db->join($ie_table . ' AS mapped', 'mapped.id = map.' . $ie_table . '_id', 'INNER');
                                $this->db->where(array('map.' . $col_name . '_id' => $person['id']));
                                $this->db->where("t.status", 0);
                                if ($key != 'm') {
                                    $this->db->where("mapped.is_deleted", 0);
                                }
                                if ($key == 't') { //--> Get Video Trailer
                                    $this->db->where('mapped.cat_id', 1);
                                } elseif ($key == 's') { //--> Get video Songs
                                    $this->db->where('mapped.cat_id', 2);
                                }
                                //echo '<pre>';print_r($this->db->get()->result_array());
                                $search_result[$table][$k][$key] = $this->db->get()->num_rows();
                            }
                        }
                    }
                }
            }
            //movie list
            $this->db->like('LOWER(`movie_name`)', strtolower($global_search_keyword));
//            echo 'movie'.'...'.(($page-1)*$limit).'...'.$limit;
            if ($page != '')
                $this->db->limit($limit, ($page - 1) * $limit);
            $searched_movie = $this->db->get('movie')->result_array();
            $stp = array('s' => 'video', 't' => 'video', 'p' => 'poster');
            if (count($searched_movie) > 0) {
                $total_search_result += count($searched_movie);
                foreach ($searched_movie as $key => $movie) {
                    $search_result['movie'][$key]['detail'] = $movie;
                    foreach ($stp as $k => $ie_table) {
                        $this->db->select('*');
                        $this->db->from('movie AS t'); // I use aliasing make joins easier
                        $this->db->join($ie_table . '_map_movie AS map', 't.id = map.movie_id', 'INNER');
                        $this->db->join($ie_table . ' AS mapped', 'mapped.id = map.' . $ie_table . '_id', 'INNER');
                        $this->db->where(array('map.movie_id' => $movie['id']));

                        if ($k == 't') { //--> Get Video Trailer
                            $this->db->where('mapped.cat_id', 1);
                        } elseif ($k == 's') { //--> Get video Songs
                            $this->db->where('mapped.cat_id', 2);
                        }
                        //$this->db->like('t.'.$table.'_name',$global_search_keyword);
                        //$search_result[$table][$k][$key] = $this->db->get()->result_array();
                        $search_result['movie'][$key][$k] = $this->db->get()->num_rows();
                    }
                }
            }

            $number = 20 - $total_search_result;

            $limit = ceil($number / 2);
//             echo $total_search_result.'....Nnum : '.$number.'...'.$limit;
            //poster details
            $this->db->select('P.*,pi.poster_image');
            $this->db->from('poster AS P');
            $this->db->join('poster_img AS pi', 'P.id = pi.poster_id', 'INNER');

            $this->db->where('pi.display_order', '1');
            $this->db->like('LOWER(`poster_name`)', strtolower($global_search_keyword));
//            echo 'poster'.'...'.(($page-1)*3).'...'.$limit;
            if ($page != '')
                $this->db->limit($limit, ($page - 1) * 3);
            $this->db->where('P.is_deleted', '0');
            $search_result['poster'] = $this->db->get()->result_array();
            $total_search_result += count($search_result['poster']);

            $number = 20 - $total_search_result;

            $limit = $number;

            //video detials
            $this->db->like("LOWER(`video_name`)", strtolower($global_search_keyword));
//            echo 'vodeo'.'...'.(($page-1)*3).'...'.$limit;
            if ($page != '')
                $this->db->limit($limit, ($page - 1) * 3);
            $this->db->where('is_deleted', '0');
            $search_result['video'] = $this->db->get('video')->result_array();
            $total_search_result += count($search_result['video']);

            $number = 20 - $total_search_result;

            if ($number != 0) {
                $limit = $number;
                //video detials
                $this->db->like("LOWER(`video_name`)", strtolower($global_search_keyword));
                //            echo 'vodeo'.'...'.(($page-1)*3).'...'.$limit;
                if ($page != '')
                    $this->db->limit($limit, 5);
                $this->db->where('is_deleted', '0');
                $search_result['video'] = $this->db->get('video')->result_array();
                $total_search_result += count($search_result['video']);
            }
        }
//        echo $total_search_result;exit;
        $search_result['total_search_result'] = $total_search_result;
//        print_r($search_result);exit;
        return json_encode($search_result);
    }

    // FUNCTION TO GENERATE RANDOM ALPHANUMERIC STRING
    public function generateShareCode($length = 5) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function getWeekTrend($table, $map_table = '', $type = 'video') {
        $this->db->where('`created` >= DATE_SUB(NOW(), INTERVAL 7 DAY)');
        $this->db->where('is_deleted', '0');
        if ($map_table != '') {
            $this->db->where('`id` IN', '(SELECT `' . $map_table . '_id` FROM `' . $table . '_map_' . $map_table . '`)');
        }
        if ($type == 'video') {
            $this->db->order_by("play", "desc");
        } else {
            $this->db->join('poster_img AS pi', 't.id = pi.poster_id', 'INNER');
            $this->db->order_by("views", "desc");
        }
        $this->db->limit('20', '0');
        $result = $this->db->get($table . ' as t')->result_array();
        return json_encode($result);
    }

    public function getIndividualData($individual_id, $cdms, $mstp) { //cdms -> cast, director, music, singer, movie, channel //mstp-> movie, trailer, song, poster
        $individual = array('cast', 'director', 'music', 'singer', 'movie', 'channel');
        $individual_elements = ['m' => 'movie', 's' => 'video', 't' => 'video', 'p' => 'poster'];

        $this->db->select('*,YEAR(`rel_date`) AS `rel_year`,`' . $individual_elements[$mstp] . '_name` AS `name`,`' . $individual_elements[$mstp] . '`.`id` AS `mstp_id`');
        $this->db->from($individual_elements[$mstp]);
        $col_id = $cdms == 'relby' ? 'rel_by' : $cdms;
        $this->db->join($individual_elements[$mstp] . "_map_" . $cdms, $individual_elements[$mstp] . '.id = ' . $individual_elements[$mstp] . '_id', 'INNER');
//        echo "`".$individual_elements[$mstp]."`.`id` IN(SELECT `".$individual_elements[$mstp]."_id` FROM `".$individual_elements[$mstp]."_map_".$cdms."` WHERE `".$col_id."_id` = '".$individual_id."')";
        $this->db->where("`" . $individual_elements[$mstp] . "`.`id` IN(SELECT `" . $individual_elements[$mstp] . "_id` FROM `" . $individual_elements[$mstp] . "_map_" . $cdms . "` WHERE `" . $col_id . "_id` = '" . $individual_id . "')");
        $this->db->where($col_id . "_id = " . $individual_id);
        if ($mstp != 'm') {
            $this->db->where("`" . $individual_elements[$mstp] . "`.`is_deleted` = 0");
        }
        if ($mstp == 's') {
            $this->db->join("sub_category", $individual_elements[$mstp] . '.`subcat_id` = `sub_category`.`id`', "INNER");
            $this->db->where("`cat_id` = 2");
        } elseif ($mstp == 't') {
            $this->db->join("sub_category", $individual_elements[$mstp] . '.`subcat_id` = `sub_category`.`id`', "INNER");
            $this->db->where("`cat_id` = 1");
        } elseif ($mstp == 'p') {
            // $this->db->join('poster_img AS pi', 'pi.poster_id = poster.id', 'INNER');
        }
        if ($this->input->post('search_year')) {
            //echo $this->input->post('search_year');exit;
            $this->db->where("DATE_FORMAT(`" . $individual_elements[$mstp] . "`.`rel_date`,'%Y')", $this->input->post('search_year'));
        }
        if ($this->input->post('search_month')) {
            //echo $this->input->post('search_month');exit;
            $this->db->where("DATE_FORMAT(`" . $individual_elements[$mstp] . "`.`rel_date`,'%c')", $this->input->post('search_month'));
        }
        if ($this->input->post('search_keyword')) {
            $this->db->like('LOWER(`' . $individual_elements[$mstp] . '`.`' . $individual_elements[$mstp] . '_name`)', strtolower($this->input->post('search_keyword')));
        }
        $this->db->order_by("YEAR(`rel_date`)", "desc");
        $result = $this->db->get()->result_array();
        //echo $this->db->last_query().'<br>';
        return json_encode($result);
    }

    public function getRelatedVideo($video_id, $cat_id, $subcat_id) {
        $rel_array = array("movie", "cast", "director", "music", "singer");
        $query = 'SELECT * FROM `video` WHERE `id` != ' . $video_id . ' AND cat_id = ' . $cat_id . ' AND subcat_id = ' . $subcat_id . ' group by video.id order by rel_date desc limit 10';
//        $query = 'SELECT * FROM `video` WHERE `id` IN(';
//        $sub_query = '';
//        foreach($rel_array as $key=>$val){
//            $sub_query .= "SELECT `video_id` FROM `video_map_".$val."` WHERE `".$val."_id` IN(SELECT `".$val."_id` FROM `video_map_".$val."` WHERE `video_id` = ".$video_id.") UNION ";
//        }
        // $sub_query = rtrim($sub_query,' UNION ');
//        $query .= $sub_query.')';
        // $query .= $sub_query;
        $result = $this->db->query($query)->result_array();
        return json_encode($result);
    }

    public function getRelatedVideoAPI($video_id, $cat_id, $subcat_id, $page_start, $page_limit) {
        $rel_array = array("movie", "cast", "director", "music", "singer");
        $query = 'SELECT count(*) AS totaldata FROM `video` WHERE `id` != ' . $video_id . ' AND cat_id = ' . $cat_id . ' AND subcat_id = ' . $subcat_id . ' group by video.id order by id desc limit ' . $page_start . ',' . $page_limit;

        $result1 = $this->db->query($query);

        $total_record = 0;
        if ($result1->num_rows() > 0) {
            foreach ($result1->result_array() as $value) {

                $total_record = $value['totaldata'];
            }
        }

        $this->db->select('*,b.id AS cat_id,c.id AS subcat_id,a.id AS video_id');
        $this->db->from('video AS a'); // I use aliasing make joins easier
        //echo $status;exit;
        $this->db->join('category AS b', 'a.cat_id = b.id', 'INNER');
        $this->db->join('sub_category AS c', 'a.subcat_id = c.id', 'INNER');
        $this->db->where('a.id != ', $video_id);
        $this->db->where(array('a.is_deleted' => 0, 'a.cat_id' => '' . $cat_id));
        if ($subcat_id > 0) {
            $this->db->where(array('a.subcat_id' => '' . $subcat_id));
        }

        $this->db->order_by("a.play", "desc");
        //echo $limit.'....'.$start;exit;
        if (!empty($page_limit) || !empty($page_start)) {

            $this->db->limit($page_limit, $page_start);
        }
        // $this->db->limit(5, 0);
        $result = $this->db->get();

        $count = 0;
        if ($result->num_rows() > 0) {
//            print_r($result->result_array());exit;
            foreach ($result->result_array() as $value) {
                $count++;
//                echo $value['total'];


                $user_id = $this->input->post('user_id');
                $islike = false;
                if ($user_id > 0) {
                    $islike = $this->getUserLike($user_id, $value['video_id'], $value['cat_id']);
                }
                $seo_url = $this->getSeoUrl('video_url', $value['seo_url_id']);
                if (($page_start == 0) && ($count <= 4)) {

                    $trailer1[] = array('video_id' => '' . $value['video_id'], 'cat_id' => '' . $value['cat_id'], 'cat_name' => '' . $value['cat_name'], 'subcat_id' => '' . $value['subcat_id'], 'subcat_name' => '' . $value['subcat_name'], 'video_name' => '' . $value['video_name'],
                        'video_url' => '' . $value['video_url'], 'video_thumb' => '' . base_url() . 'images/videothumb/' . $value['video_thumb'], 'video_desc' => '' . $value['video_desc'],
                        'release_date' => $value['rel_date'], 'total_likes' => '' . $value['liked'], 'total_play' => '' . $value['play'], 'is_liked' => $islike, 'web_url' => $seo_url);
                } else {
                    $trailer2[] = array('video_id' => '' . $value['video_id'], 'cat_id' => '' . $value['cat_id'], 'cat_name' => '' . $value['cat_name'], 'subcat_id' => '' . $value['subcat_id'], 'subcat_name' => '' . $value['subcat_name'], 'video_name' => '' . $value['video_name'],
                        'video_url' => '' . $value['video_url'], 'video_thumb' => '' . base_url() . 'images/videothumb/' . $value['video_thumb'], 'video_desc' => '' . $value['video_desc'],
                        'release_date' => $value['rel_date'], 'total_likes' => '' . $value['liked'], 'total_play' => '' . $value['play'], 'is_liked' => $islike, 'web_url' => $seo_url);
                }
            }

            if (($page_start > 0)) {
                $trailer1 = array();
            } else {

                if (($count - 4) > 0) {
                    $count = $count - 4;
                } else {
                    $count = $count;
                }
            }

            if (empty($trailer2)) {
                $trailer2 = array();
            }
//            echo $total_record;exit;
            if ($total_record > 0) {
                $total_record = $total_record - 4;
            } else {
                $total_record = 0;
            }
            $data = array('status' => 0, 'msg' => 'Success', 'message' => 'Category get Successfully', 'data1' => $trailer1, 'data2' => $trailer2, 'total_trailer' => $count, 'total_record' => $total_record);
        } else {
            $trailer1 = array();
            $trailer2 = array();
            $data = array('status' => 1, 'msg' => 'Error', 'message' => 'Data is not available', 'data1' => $trailer1, 'data2' => $trailer2, 'total_trailer' => 0, 'total_record' => 0);
        }

//        print_r($data);exit;
        return json_encode($data);
    }

    public function getNotificationCountAPI($trailer_subcat_id, $video_subcat_id, $time) {

        $query = "SELECT count(*) AS totaldata FROM `notification` WHERE ((subcat_id IN (" . $trailer_subcat_id . ") AND `cat_id` = 1) "
                . "OR (subcat_id IN (" . $video_subcat_id . ")) AND `cat_id` = 2) AND `created` > '" . $time . "'";

        $result1 = $this->db->query($query);

        $total_record = 0;
        if ($result1->num_rows() > 0) {
            foreach ($result1->result_array() as $value) {

                $total_record = $value['totaldata'];
            }
            $data = array('status' => 0, 'msg' => 'Success', 'message' => 'data get Successfully', 'new_notifi_count' => $total_record);
        } else {
            $trailer[] = array();
            $data = array('status' => 0, 'msg' => 'Success', 'message' => 'No new notification available', 'new_notifi_count' => 0);
        }

        return json_encode($data);
    }

    public function getNotificationAPI($trailer_subcat_id, $video_subcat_id, $page_start, $page_limit) {

//        $trailer_Cat[] = explode(',', $trailer_subcat_id);
//        foreach ($trailer_Cat as $value) {
        //SELECT count(*) AS totaldata FROM `notification` WHERE (subcat_id IN (1,3) AND `cat_id` = 1) OR (subcat_id IN (4,5) AND `cat_id` = 2)
        $query = 'SELECT count(*) AS totaldata FROM `notification` WHERE (subcat_id IN (' . $trailer_subcat_id . ') AND `cat_id` = 1) '
                . 'OR (subcat_id IN (' . $video_subcat_id . ') AND `cat_id` = 2)'
                . '';

//        }



        $result1 = $this->db->query($query);

        $total_record1 = 0;
        if ($result1->num_rows() > 0) {
            foreach ($result1->result_array() as $value) {

                $total_record1 = $value['totaldata'];
            }
        }

        $query = 'SELECT * FROM `notification` WHERE (subcat_id IN (' . $trailer_subcat_id . ') AND `cat_id` = 1) '
                . 'OR (subcat_id IN (' . $video_subcat_id . ') AND `cat_id` = 2) order by id desc limit ' . $page_start . ',' . $page_limit
                . '';

//        $this->db->order_by("a.id", "desc");
//        //echo $limit.'....'.$start;exit;
//         if(!empty($page_limit) || !empty($page_start)){
//             
//            $this->db->limit($page_limit, $page_start);
//         }
        // $this->db->limit(5, 0);
        $result = $this->db->query($query);
        $num = $result->num_rows();

        $count = 0;
        if ($num > 0) {
//            print_r($result->result_array());exit;
            $isData = 0;
            foreach ($result->result_array() as $value1) {
                $count++;
                $cat_id = $value1['cat_id'];
                $comman_id = $value1['comman_id'];
//                               echo $comman_id;exit;      
//                    if(($cat_id == 1) || ($cat_id == 2)){
                $_POST['webservice'] = 'yes';
                $time = $value1['created'];
                $noti_time = $this->time_elapsed_string($time);
//                         echo $noti_time.'...test'.$cat_id;exit;
                $this->db->select('*');
                $this->db->from('video AS d');
                $this->db->where(array('d.id = ' => '' . $comman_id));
                $user_result1 = $this->db->get();

                $total_record = $user_result1->num_rows();
                if ($total_record > 0) {
                    $data_json = json_decode($this->getIndividualTrailer($cat_id, 0, '', '', $comman_id));


//                            print_r($data_json->data[0]->video_id);exit;
                    //                          $data[] = array($data_json->data[0]);
                    $isData = 1;
                    if (empty($data_json->data)) {
//                                print_r($data_json->data);
                    } else {
                        foreach ($data_json->data as $value) {
                            if (!empty($value)) {
                                $data[] = array('video_id' => '' . $value->video_id, 'cat_id' => '' . $value->cat_id, 'cat_name' => '' . $value->cat_name, 'subcat_id' => '' . $value->subcat_id, 'subcat_name' => '' . $value->subcat_name, 'video_name' => '' . $value->video_name,
                                    'video_url' => '' . $value->video_url, 'video_thumb' => '' . $value->video_thumb, 'video_desc' => '' . $value->video_desc,
                                    'release_date' => $value->release_date, 'total_likes' => '' . $value->total_likes, 'total_play' => '' . $value->total_play, 'is_liked' => $value->is_liked, 'noti_time' => $noti_time, 'web_url' => $value->web_url);
                            }
                        }
                    }
                } else {
//                              echo 'test';exit;
                }
//                      }
            }

            if ($isData == 0) {
                $trailer[] = array();
                $data = array('status' => 1, 'msg' => 'Error', 'message' => 'Data is not available', 'data' => $trailer[0], 'total_trailer' => 0, 'total_record' => 0);
            } else {
                $data = array('status' => 0, 'msg' => 'Success', 'message' => 'data get Successfully', 'data' => $data, 'total_trailer' => $count, 'total_record' => $total_record1);
            }
        } else {
            $trailer[] = array();
            $data = array('status' => 1, 'msg' => 'Error', 'message' => 'Data is not available', 'data' => $trailer[0], 'total_trailer' => 0, 'total_record' => 0);
        }

//        print_r($data);exit;
        return json_encode($data);
    }

    function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hr',
            'i' => 'min',
            's' => 'sec',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full)
            $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }

    public function getUserLiked($user_id = 0, $cat_id = 0, $video_id = 0, $user_activity = '', $page_start, $page_limit) {

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
            $this->db->where(array('d.comman_id = ' => '' . $video_id));
        }


//        if($this->input->post('search_year')){
//            $this->db->where("DATE_FORMAT(`d`.`created`,'%Y')",$this->input->post('search_year'));
//        }
//        if($this->input->post('search_month')){
//            $this->db->where("DATE_FORMAT(`d`.`created`,'%c')",$this->input->post('search_month'));
//        }
//        $_POST['from_search'] = 'yes';
//        $_POST['ajax'] = 'yes';
//        

        $user_result1 = $this->db->get();

        $total_record = $user_result1->num_rows();

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
            $this->db->where(array('d.comman_id = ' => '' . $video_id));
        }

        if (!empty($page_limit) || !empty($page_start)) {

            $this->db->limit($page_limit, $page_start);
        }
        $this->db->order_by('d.id', 'DESC');
        $user_result = $this->db->get();

        $num = $user_result->num_rows();

        $count = 0;
        if ($num > 0) {
            //echo $num;exit;

            foreach ($user_result->result_array() as $user) {
                $count++;
                $cat_id = $user['cat_id'];
                $comman_id = $user['common_id'];
                $timestamp = strtotime('' . $user['created']);
                $new_date_format = date('d M, Y H:i A', $timestamp);
//                      if($cat_id == 3){
//                          $data_json = $this->getIndividualPoster(0,'','',$comman_id);
//                          //$all_data[] = $data_json;
//                          $all_data[] = array('mydata'=>$data_json,'date'=>$new_date_format,'shared_with'=>$user['shared_with'],'user_data'=>$user);
//                      }else 
                if (($cat_id == 1) || ($cat_id == 2)) {
                    $_POST['webservice'] = 'yes';

                    $data_json = json_decode($this->getIndividualTrailer_getUserLiked($cat_id, 0, '', '', $comman_id));
//                          print_r($data_json->data[0]->video_id);
//                          $data[] = array($data_json->data[0]);
                    if (empty($data_json->data)) {
                        
                    } else {
                        foreach ($data_json->data as $value) {
                            if (!empty($value)) {
                                $data[] = array('video_id' => '' . $value->video_id, 'cat_id' => '' . $value->cat_id, 'cat_name' => '' . $value->cat_name, 'subcat_id' => '' . $value->subcat_id, 'subcat_name' => '' . $value->subcat_name, 'video_name' => '' . $value->video_name,
                                    'video_url' => '' . $value->video_url, 'thumb' => '' . $value->video_thumb, 'video_desc' => '' . $value->video_desc,
                                    'release_date' => $value->release_date, 'total_likes' => '' . $value->total_likes, 'total_play' => '' . $value->total_play, 'is_liked' => $value->is_liked, 'web_url' => $value->web_url,'youtube_views' => $value->youtube_views);
                            }
                        }
                    }
                }
            }
            $m = 0 ;
            foreach ($data as $key) {
                $data1[$m] = $key;
                $data1[$m]['release_date'] =strtotime($key['release_date']);
                $data1[$m]['you_tube_id'] = substr($key['video_url'],-11);
                $cast = $this->My_model->getresult('SELECT group_concat(personality_name) as cast FROM `video_map_cast` inner join personality on personality.id = personality_id where video_id = '.$key['video_id'].' and is_cast = 1 '); 
                $data1[$m]['cast'] = $cast[0]['cast'];
                $singer = $this->My_model->getresult('SELECT group_concat(personality_name) as singer FROM `video_map_singer` inner join personality on personality.id = personality_id where video_id = '.$key['video_id'].' and is_singer = 1 '); 
                $data1[$m]['singer'] = $singer[0]['singer'];
                $mdirector = $this->My_model->getresult('SELECT group_concat(personality_name) as music_director FROM `video_map_music` inner join personality on personality.id = personality_id where video_id = '.$key['video_id'].' and is_music_director = 1'); 
                $data1[$m]['music_director'] = $mdirector[0]['music_director'];
                $director = $this->My_model->getresult('SELECT group_concat(personality_name) as director FROM `video_map_director` inner join personality on personality.id = personality_id where video_id = '.$key['video_id'].' and is_director = 1'); 
                $data1[$m]['director'] = $director[0]['director'];

                $data1[$m]['detail_data'] = $this->get_video_data($key['video_id']);

                unset($data1[$m]['cat_name']);
                unset($data1[$m]['video_desc']);
                unset($data1[$m]['is_liked']);

                $m++;
            }
              
            $data = array('status' => 0, 'msg' => 'Success', 'message' => 'data get Successfully', 'data' => $data1, 'total_trailer' => $count, 'total_record' => $total_record);
        } else {
            $trailer[] = array();
            $data = array('status' => 1, 'msg' => 'Error', 'message' => 'Data is not available', 'data' => $trailer[0], 'total_trailer' => 0, 'total_record' => 0);
        }



        return json_encode($data);
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


        $full_movie = $this->My_model->getresult("SELECT movie.full_movie from "
                                . "movie left join video_map_movie on video_map_movie.movie_id = movie.id "
                                . "where video_map_movie.video_id = " . $id . "");

        $FrontData['full_movie'] = $full_movie[0]['full_movie'];


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

    function getVideoAlbum($user_id = 0, $cat_id = 0, $video_id = 0) {

        $this->db->select('*');
        $this->db->from('video_map_movie AS d'); // I use aliasing make joins easier

        if ($video_id > 0) {
            $this->db->where(array('d.video_id = ' => '' . $video_id));
        }

//        $user_result1 = $this->db->get();
//        $total_record = $user_result1->num_rows();
//        if(!empty($page_limit) || !empty($page_start)){
//             
//            $this->db->limit($page_limit, $page_start);
//         }
//        
        $user_result = $this->db->get();

        $num = $user_result->num_rows();

        $count = 0;
        if ($num > 0) {
            //echo $num;exit;
            $movie_id = 0;
            foreach ($user_result->result_array() as $movie) {

//                      $cat_id = $cat_id;
                $movie_id = $movie['movie_id'];
//                      $comman_id = $user['common_id'];
//                      $timestamp = strtotime(''.$user['created']);
//                      $new_date_format = date('d M, Y H:i A', $timestamp);
////                      if($cat_id == 3){
////                          $data_json = $this->getIndividualPoster(0,'','',$comman_id);
////                          //$all_data[] = $data_json;
////                          $all_data[] = array('mydata'=>$data_json,'date'=>$new_date_format,'shared_with'=>$user['shared_with'],'user_data'=>$user);
////                      }else 
//                     if(($cat_id == 1) || ($cat_id == 2)){
//                         $_POST['webservice'] = 'yes';
//                         
//                          $data_json = json_decode($this->getIndividualTrailer($cat_id,0,'','',$comman_id));
////                          print_r($data_json->data[0]->video_id);
////                          $data[] = array($data_json->data[0]);
//                          
//                          foreach ($data_json->data as $value) {
//                           
//                            $data[] = array('video_id'=>''.$value->video_id,'cat_id'=>''.$value->cat_id,'cat_name'=>''.$value->cat_name,'subcat_id'=>''.$value->subcat_id,'subcat_name'=>''.$value->subcat_name,'video_name'=>''.$value->video_name,
//                                'video_url'=>''.$value->video_url,'video_thumb'=>''.$value->video_thumb,'video_desc'=>''.$value->video_desc,
//                                'release_date'=>$value->release_date,'total_likes'=>''.$value->total_likes,'total_play'=>''.$value->total_play,'is_liked'=>$value->is_liked,'web_url'=>$value->web_url);
//                          
//                          }
//                      }
            }


            $this->db->select('d.`id`,d.`video_name`');
            $this->db->from('video AS d'); // I use aliasing make joins easier
            $this->db->join('video_map_movie AS e', 'd.id = e.video_id', 'INNER');
            $this->db->where(array('e.video_id != ' . $video_id . ' and e.movie_id = ' => '' . $movie_id));
            $movie_result = $this->db->get();
            // $movies = array();
            // unset($movies);
            //$movies = array();
//            print_r($movie_result->result_array());exit;
            $num = $movie_result->num_rows();
            if ($num > 0) {
                foreach ($movie_result->result_array() as $movie) {
                    $_POST['webservice'] = 'yes';
                    $data_json = json_decode($this->getIndividualTrailer($cat_id, 0, '', '', $movie['id']));
//                    print_r($data_json);
//                       $data[] = array($data_json->data[0]);
                    if (!empty($data_json->data[0]->video_name)) {
//                           print_r($data_json);
                        $count++;
                        foreach ($data_json->data as $value) {
//                           echo $value->video_id;
                            $data[] = array('video_id' => '' . $value->video_id, 'cat_id' => '' . $value->cat_id, 'cat_name' => '' . $value->cat_name, 'subcat_id' => '' . $value->subcat_id, 'subcat_name' => '' . $value->subcat_name, 'video_name' => '' . $value->video_name,
                                'video_url' => '' . $value->video_url, 'video_thumb' => '' . $value->video_thumb, 'video_desc' => '' . $value->video_desc,
                                'release_date' => $value->release_date, 'total_likes' => '' . $value->total_likes, 'total_play' => '' . $value->total_play, 'is_liked' => $value->is_liked, 'web_url' => $value->web_url);
//                          
                        }
                    }
                }
            }
            if ($count == 0) {
                $trailer[] = array();
                $data = array('status' => 1, 'msg' => 'Error', 'message' => 'Data is not available', 'data' => $trailer[0], 'total_trailer' => 0);
            } else {
                $data = array('status' => 0, 'msg' => 'Success', 'message' => 'data get Successfully', 'data' => $data, 'total_trailer' => $count);
            }
//                print_r($data);exit;
        } else {
            $trailer[] = array();
            $data = array('status' => 1, 'msg' => 'Error', 'message' => 'Data is not available', 'data' => $trailer[0], 'total_trailer' => 0);
        }

        return json_encode($data);
    }

    public function deleteStatus($id, $status, $table) {
        $this->db->set('is_deleted', $status);
        $this->db->where('id', $id);
        $this->db->update($table);
        return json_encode(array('status' => 0, 'msg' => 'Successfully Deleted'));
    }

    public function getRelatedPoster($poster_id, $subcat_id) {
        $rel_array = array("movie", "cast", "director");
        $query = 'SELECT p.*,(select poster_img.poster_image from poster_img where poster_img.poster_id=p.id order by poster_img.poster_type asc,poster_img.display_order asc limit 1) as poster_image FROM `poster` `p` WHERE `p`.`id` != ' . $poster_id . ' AND `p`.`subcat_id` = ' . $subcat_id . ' group by p.id order by `p`.`rel_date` desc limit 10';
        $sub_query = '';
//        foreach($rel_array as $key=>$val){
//            $sub_query .= "SELECT `poster_id` FROM `poster_map_".$val."` WHERE `".$val."_id` IN(SELECT `".$val."_id` FROM `poster_map_".$val."` WHERE `poster_id` = ".$poster_id.") UNION ";
//        }
//        $sub_query = rtrim($sub_query,' UNION ');
        $query .= $sub_query;
        $result = $this->db->query($query)->result_array();
        return json_encode($result);
    }

    public function getUserLike($user_id, $common_id, $cat_id) {
        $activity = 'liked';

        $this->db->select('*');
        $this->db->from('user_activity'); // I use aliasing make joins easier
        $this->db->where("`user_id` = '" . $user_id . "' AND `cat_id` = '" . $cat_id . "' AND `common_id` = " . $common_id . " AND `user_activity` = '" . $activity . "'");
        $result = $this->db->get();
        $isliked = false;

        if ($result->num_rows() > 0) {
            $isliked = true;
        }

        return $isliked;
    }

    public function setFCMToken($token) {
        $this->db->select('*');
        $this->db->from('fcm'); // I use aliasing make joins easier
        $this->db->where("`fcm_token`", $token);
        $result = $this->db->get();

        if ($result->num_rows() == 0) {
            $mydata = array('fcm_token' => $token);


            $this->db->insert('fcm', $mydata);

            $data = array('status' => 0, 'msg' => 'success', 'message' => 'FCM token registered successfully');
        } else {
            $data = array('status' => 1, 'msg' => 'Error', 'message' => 'This FCM token already ragistered');
        }
        return $data;
    }

    public function setFriendInvite($user_id, $invite_code) {

        $this->db->select('*');
        $this->db->from('user'); // I use aliasing make joins easier
        $this->db->where("`share_code`", '' . $invite_code);
        $result = $this->db->get();

        if ($result->num_rows() > 0) {

            $this->db->select('*');
            $this->db->from('user'); // I use aliasing make joins easier
            $this->db->where("`id`", $user_id);
            $this->db->where("`shared_code` = ''");
            $result = $this->db->get();

            if ($result->num_rows() > 0) {

                $this->db->select('COUNT(*) AS total');
                $this->db->from('user'); // I use aliasing make joins easier
                $this->db->where("`shared_code` = '" . $invite_code . "'");
                $result1 = $this->db->get();
                $code_used = 0;
                if ($result1->num_rows() > 0) {
                    foreach ($result1->result_array() as $value) {
                        $code_used = $value['total'];
                    }
                }

                if ($code_used <= 10) {
                    foreach ($result->result_array() as $value) {
                        $invited_user_id = $value['id'];
                        $points = $this->getPoints('invite_friend');
                        $cat_id = 1;
                        $activity = 'invite_friend';
                        $common_id = $user_id;
                        $shared_with = '';

                        $this->UpdateUserActivity($invited_user_id, $cat_id, $activity, $common_id, $shared_with, $points);

                        $mydata = array('shared_code' => $invite_code);

                        $this->db->where('id', '' . $user_id);
                        $this->db->update('user', $mydata);
                    }
                    $data = array('status' => 0, 'msg' => 'success', 'message' => 'You are successfully invited and your friend get ' . $points . ' points');
                } else {
                    $data = array('status' => 1, 'msg' => 'Error', 'message' => 'This code has beed expired, its used 10 times ');
                }
            } else {
                //You are alredy invited
                $data = array('status' => 1, 'msg' => 'Error', 'message' => 'You are already invited');
            }
        } else {

            // Invited code is invalid
            $data = array('status' => 1, 'msg' => 'Error', 'message' => 'Please check code is invalid');
        }

        return $data;
    }

    public function setSocialMediaLikes($user_id, $activity, $shared_with, $common_id, $cat_id = 1) {

        if ($activity == 'social_subscribe') {
            $points = '550';
        } else {
            $points = $this->getPoints('social_shared');
        }

        $this->UpdateUserActivity($user_id, $cat_id, $activity, $common_id, $shared_with, $points);

        return true;
    }

    public function getSocialRewardPoints($user_id, $activity, $shared_with, $common_id = 0, $cat_id = 1) {

        $this->db->select('*');
        $this->db->from('user_activity'); // I use aliasing make joins easier
        $this->db->where("`user_id` = '" . $user_id . "' AND `cat_id` = '" . $cat_id . "' AND `common_id` = " . $common_id .
                " AND `user_activity` = '" . $activity . "' AND `shared_with` = '" . $shared_with . "'");
        $result = $this->db->get();
        $isshared = false;
        if ($result->num_rows() > 0) {
            $isshared = true;
        }

        return $isshared;
    }

    public function setIsLike($user_id, $cat_id, $activity, $common_id) {
        if ($cat_id != 3) {
            $this->setVidPosterView($common_id, $activity, 'liked', 'video');
            if ($activity == 'disliked') {
                $points = $this->getPoints('liked');
            } else {
                $points = $this->getPoints($activity);
            }
            $this->UpdateUserActivity($user_id, $cat_id, $activity, $common_id, '', $points);
        } else if ($cat_id == 3) {
            if ($activity == 'disliked') {
                $points = $this->getPoints('liked');
            } else {
                $points = $this->getPoints($activity);
            }
            $this->setVidPosterView($common_id, $activity, 'likes', 'poster');
            $this->UpdateUserActivity($user_id, $cat_id, $activity, $common_id, '', $points);
        }
    }

    public function setViewVideo($user_id, $user_activity, $video_id, $cat_id) {
        $this->setVidPosterView($video_id, $user_activity, 'play', 'video');
    }

    public function setViewPlay($user_id, $user_activity, $video_id, $cat_id) {

        if ($user_activity == 'play') {
            $this->setVidPosterView($video_id, $user_activity, 'play', 'video');
//            echo 'inner..'.$activity;exit;
            if ($user_id > 0) {
                $points = $this->getPoints($user_activity);

                $this->UpdateUserActivity($user_id, $cat_id, $user_activity, $video_id, '', $points);
            }
        } else if ($user_activity == 'poster_view') {
            $this->setVidPosterView($video_id, $user_activity, 'views', 'poster');
        }
    }

    public function setSharing($user_id, $cat_id, $activity, $common_id, $shared_with) {
        $points = $this->getPoints($activity);

        $this->UpdateUserActivity($user_id, $cat_id, $activity, $common_id, $shared_with, $points);
    }


    public function getRealIpAddr()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
        {
          $ip=$_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
        {
          $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else
        {
          $ip=$_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    public function setVidPosterView($video_id, $activity, $column_name, $table_name) {


        // logic for ip address and view count
            //die($this->getRealIpAddr().$video_id);
            $ip = $this->getRealIpAddr();
            $id = $video_id;
            $type = $table_name;


            $sql = "SELECT count(*) as total FROM ip_address_view WHERE type = '".$type."' and ipaddress = '".$ip."' and item_id = ".$id."";
            $data = $this->My_model->getresult($sql);
            if($data[0]['total'] > 0)
            {

                return true;

            }
            // logic for ip address and view count





        //echo $video_id.'...'.$column_name;exit;
//        $data=array('`'.$column_name.'`'=> '`('.$column_name.'` + 1)');
        if ($activity == 'disliked') {
            $this->db->set('`' . $column_name . '`', $column_name . '-1', FALSE);
            $this->db->where('id', '' . $video_id);
            $this->db->update('' . $table_name);
        } else {
            $this->db->set('`' . $column_name . '`', $column_name . '+1', FALSE);
            $this->db->where('id', '' . $video_id);
            $this->db->update('' . $table_name);
            $this->db->insert('ip_address_view',['type' => $type, 'ipaddress'=>$ip, 'item_id'=>$id, 'created'=>date("Y-m-d H:i:s")]);
        }
    }

    public function UpdateUserActivity($user_id, $cat_id, $activity, $common_id, $shared_with, $earn_points) {
        //echo "`user_id` = '".$user_id."' AND `cat_id` = '".$cat_id."' AND `common_id` = ".$common_id." AND `user_activity` = '".$activity."'";exit;
        if (!($activity == 'disliked')) {
            $this->db->select('*');
            $this->db->from('user_activity'); // I use aliasing make joins easier
            $this->db->where("`user_id` = '" . $user_id . "' AND `cat_id` = '" . $cat_id . "' AND `common_id` = " . $common_id .
                    " AND `user_activity` = '" . $activity . "' AND `shared_with` = '" . $shared_with . "'");
            $result = $this->db->get();

            if ($result->num_rows() == 0) {

//                $this->db->where('user_id', $user_id);
//                $this->db->where('cat_id', $cat_id);
//                $this->db->where('user_activity', 'disliked');
//               $this->db->delete('user_activity');
//
//               $this->UpdateUserPoints($user_id,$activity,$earn_points);
                $created = date('Y-m-d H:i:s');
                $data = array('`user_id`' => $user_id, '`cat_id`' => '' . $cat_id, '`common_id`' => '' . $common_id, '`user_activity`' => $activity,
                    '`shared_with`' => $shared_with, '`earn_points`' => '' . $earn_points, '`created`' => '' . $created);
                // $this->db->where('user_id',''.$user_id);
                $this->db->insert('user_activity', $data);

                $this->UpdateUserPoints($user_id, $activity, $earn_points);
            }
        } else {
            $this->db->where('user_id', $user_id);
            $this->db->where('cat_id', $cat_id);
            $this->db->where('user_activity', 'liked');
            $this->db->where('common_id', '' . $common_id);
            $this->db->delete('user_activity');

            $this->UpdateUserPoints($user_id, $activity, $earn_points);
        }
    }

    public function UpdateUserPoints($user_id, $activity, $earn_points) {

        if ($activity == 'play') {
            $this->db->set('total_video_play', 'total_video_play+' . $earn_points, FALSE);
            $this->db->set('earn_points', 'earn_points+' . $earn_points, FALSE);
        } else if ($activity == 'invited') {
            $this->db->set('total_invite', 'total_invite+' . $earn_points, FALSE);

            $this->db->set('earn_points', 'earn_points+' . $earn_points, FALSE);
        } else if ($activity == 'share') {

            $this->db->set('total_share', 'total_share+' . $earn_points, FALSE);
            $this->db->set('earn_points', 'earn_points+' . $earn_points, FALSE);
        } else if ($activity == 'frnds_share') {

            $this->db->set('total_frnds_share', 'total_frnds_share+' . $earn_points, FALSE);
            $this->db->set('earn_points', 'earn_points+' . $earn_points, FALSE);
        } else if ($activity == 'liked') {
            $this->db->set('total_likes', 'total_likes+' . $earn_points, FALSE);
            $this->db->set('earn_points', 'earn_points+' . $earn_points, FALSE);
        } else if ($activity == 'disliked') {
            $this->db->query('UPDATE user_points SET total_likes = GREATEST(total_likes-' . $earn_points . ', 0) where user_id=' . $user_id);
            $this->db->query('UPDATE user_points SET earn_points = GREATEST(earn_points-' . $earn_points . ', 0) where user_id=' . $user_id);
//                $this->db->set('total_likes', 'total_likes-'.$earn_points, FALSE);
//                $this->db->set('earn_points', 'earn_points-'.$earn_points, FALSE);
        } else if ($activity == 'social_share') {
            $this->db->set('total_social_likes', 'total_social_likes+' . $earn_points, FALSE);
            $this->db->set('earn_points', 'earn_points+' . $earn_points, FALSE);
        } else if ($activity == 'social_follow') {
            $this->db->set('total_social_likes', 'total_social_likes+' . $earn_points, FALSE);
            $this->db->set('earn_points', 'earn_points+' . $earn_points, FALSE);
        } else if ($activity == 'social_subscribe') {
            $this->db->set('total_social_likes', 'total_social_likes+' . $earn_points, FALSE);
            $this->db->set('earn_points', 'earn_points+' . $earn_points, FALSE);
        } else if ($activity == 'invite_friend') {
            $this->db->set('total_invite', 'total_invite+' . $earn_points, FALSE);
            $this->db->set('earn_points', 'earn_points+' . $earn_points, FALSE);
        }
        if (!($activity == 'disliked')) {
            $this->db->where('user_id', '' . $user_id);
            $this->db->update('user_points');
        }
    }

    public function getPoints($activity) {

        $this->db->select('*');
        $this->db->from('points');

        $this->db->where(array('points_for' => $activity));

        $result = $this->db->get();
        $points = 0;

        if ($result->num_rows() > 0) {
            //echo 'inner..'.$activity;exit;
            foreach ($result->result_array() as $value) {
                $points = $value['points'];
            }
        }

        return $points;
    }

    public function getMinYear($table_name, $col_name = 'rel_date') {
        if ($table_name == 'relby') {

            $table_name = 'released_by';
        }
        $this->db->select('DISTINCT YEAR(`' . $col_name . '`) AS `year`');
        $this->db->from($table_name);
        $this->db->where($col_name . '!=', '0000-00-00');
        $this->db->where($col_name . '!=', '');
        $this->db->order_by('year', 'DESC');
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function getSubCategoryName($subcat_id) {

        $this->db->select('*');
        $this->db->from('sub_category AS a'); // I use aliasing make joins easier
        // $this->db->join('sub_category AS b', 'a.subcat_id = b.id', 'INNER');
        $this->db->where(array('a.id' => '' . $subcat_id));
        // $this->db->order_by("menu_order", "asc");
        $sub['result'] = $this->db->get();
        $sub_inc = 0;
        $subcat_name = '';
        foreach ($sub['result']->result_array() as $sub_cats) {
            //$sub_cat[$sub_inc++] = array('sub_id' => $sub_cats['subcat_id'], 'sub_name' => $sub_cats['subcat_name']);
            $subcat_name = $sub_cats['subcat_name'];
        }
        return $subcat_name;
    }

    public function getRand() {
        $a = '';
        for ($i = 0; $i < 9; $i++) {
            $a .= mt_rand(0, 9);
        }
        //echo $a;exit;
        return $a;
    }

    public function setSEOURL($cat_id, $subcat_id, $video_id, $video_name, $isedit) {
        $total = 0;

        if ($isedit == 'edit') {
            $this->db->select('*');
            $this->db->from('video AS a'); // I use aliasing make joins easier
            // $this->db->join('sub_category AS b', 'a.subcat_id = b.id', 'INNER');
            $this->db->where('a.cat_id', '' . $cat_id);
            $this->db->where('a.subcat_id', '' . $subcat_id);
            $this->db->where('a.video_name', '' . $video_name);
            // $this->db->order_by("menu_order", "asc");
            $result = $this->db->get();

            $total = $result->num_rows();
        }
        if ($total == 0) {
            $subcat_name = $this->getSubCategoryName($subcat_id);

            $current_url = 'VideoDetail/index/' . $cat_id . '/' . $subcat_id . '/' . $video_id;



            $video_name = rtrim($video_name);

            $vido_name = str_replace(' ', '-', $video_name);

            $vido_name = preg_replace('/[^A-Za-z0-9\-]/', '', $vido_name);

            $vido_name = preg_replace('/-+/', '-', $vido_name);

            $vido_name = rtrim($vido_name, '-');

//            $vido_name = str_replace(' ', '-', $vido_name); 

            $random = $this->getRand();

            $subcat_name = str_replace(" ", "-", $subcat_name);

            if ($cat_id == 1) {
                $making_url = 'movietrailer/' . strtolower($subcat_name) . '/' . $random . '/' . $vido_name;
                $final_url = base_url('movietrailer/' . strtolower($subcat_name) . '/' . $random . '/' . $vido_name);
            } else {
                $making_url = 'videosong/' . strtolower($subcat_name) . '/' . $random . '/' . $vido_name;
                $final_url = base_url('videosong/' . strtolower($subcat_name) . '/' . $random . '/' . $vido_name);
            }

            $this->load->helper('file');

            $data = '$route["' . $making_url . '"] = "' . $current_url . '";';

            if (!write_file('application/cache/routes.php', PHP_EOL . '<?php ' . $data . ' ?>', "a+")) {
                echo 'Unable to write the file';
            } else {
                echo 'File written!' . $current_url . '.........' . $making_url . '...' . $final_url;
                $data = '$route["' . $making_url . '/amp"] = "' . $current_url . '/amp";';

                write_file('application/cache/routes.php', PHP_EOL . '<?php ' . $data . ' ?>', "a+");
            }

            $data = array('current_url' => '' . $current_url,
                'making_url' => '' . $making_url,
                'final_url' => '' . $final_url,
                'new_final_url' => '' . str_replace(base_url(), 'https://www.comingtrailer.com/', $final_url)
            );

            $insert = $this->db->insert('video_url', $data);
            if ($insert) {
                return $this->db->insert_id();
            } else {
                return false;
            }
        } else {
            return 0;
        }
    }

    public function setSEOURLPoster($subcat_id, $video_id, $video_name, $isedit) {
        $total = 0;

        if ($isedit == 'edit') {
            $this->db->select('*');
            $this->db->from('poster AS a'); // I use aliasing make joins easier
            // $this->db->join('sub_category AS b', 'a.subcat_id = b.id', 'INNER');

            $this->db->where('a.subcat_id', '' . $subcat_id);
            $this->db->where('a.poster_name', '' . $video_name);
            // $this->db->order_by("menu_order", "asc");
            $result = $this->db->get();

            $total = $result->num_rows();
        }
        if ($total == 0) {

            $subcat_name = $this->getSubCategoryName($subcat_id);

            $current_url = 'PosterDetail/index/' . $subcat_id . '/' . $video_id;

            $video_name = rtrim($video_name);

            $vido_name = str_replace(' ', '-', $video_name);

            $vido_name = preg_replace('/[^A-Za-z0-9\-]/', '', $vido_name);

            $vido_name = preg_replace('/-+/', '-', $vido_name);

            $vido_name = rtrim($vido_name, '-');

//            $vido_name = str_replace(' ', '-', $vido_name); 

            $random = $this->getRand();

            $subcat_name = str_replace(" ", "-", $subcat_name);

            $making_url = 'movieposter/' . strtolower($subcat_name) . '/' . $random . '/' . $vido_name;
            $final_url = base_url('movieposter/' . strtolower($subcat_name) . '/' . $random . '/' . $vido_name);

            $this->load->helper('file');

            $data = '$route["' . $making_url . '"] = "' . $current_url . '";';

            if (!write_file('application/cache/routes.php', PHP_EOL . '<?php ' . $data . ' ?>', "a+")) {
                echo 'Unable to write the file';
            } else {
                echo 'File written!' . $current_url . '.........' . $making_url . '...' . $final_url;

                $data = '$route["' . $making_url . '/amp"] = "' . $current_url . '/amp";';

                write_file('application/cache/routes.php', PHP_EOL . '<?php ' . $data . ' ?>', "a+");
            }

            $data = array('current_url' => '' . $current_url,
                'making_url' => '' . $making_url,
                'final_url' => '' . $final_url,
                'new_final_url' => '' . str_replace(base_url(), 'https://www.comingtrailer.com/', $final_url)
            );

            $insert = $this->db->insert('video_url', $data);
            if ($insert) {
                return $this->db->insert_id();
            } else {
                return false;
            }
        } else {
            return 0;
        }
    }

    public function setSEOURLCast($video_id, $video_name, $table_name, $isedit) {
        $total = 0;
        if ($isedit == 'edit') {
            $this->db->select('*');

            if ($table_name == 'released_by') {
//                $table_name = "relby";
                $column = "rel_by_name";
            } else {
                $column = $table_name . "_name";
            }

            $this->db->from($table_name . ' AS a'); // I use aliasing make joins easier
            // $this->db->join('sub_category AS b', 'a.subcat_id = b.id', 'INNER');

            $this->db->where('a.' . $column, '' . $video_name);
            // $this->db->order_by("menu_order", "asc");
            $result = $this->db->get();

            $total = $result->num_rows();
        }
        if ($total == 0) {

            //$subcat_name = $this->getSubCategoryName($subcat_id);
            $this->load->helper('file');
            if ($table_name == 'released_by') {
                $table_name = "relby";
            }
            $current_url = 'individual/index/' . $table_name . '/' . $video_id;
            $video_name = rtrim($video_name);
            $vido_name = str_replace(' ', '-', $video_name);
            $vido_name = preg_replace('/[^A-Za-z0-9\-]/', '', $vido_name);
            $vido_name = preg_replace('/-+/', '-', $vido_name);
            $vido_name = rtrim($vido_name, '-');
            $random = $this->getRand();

            if ($table_name == 'cast') {
                $making_url = 'actor/' . $random . '/' . $vido_name;
                $final_url = base_url('actor/' . $random . '/' . $vido_name);

                $data = '$route["' . $making_url . '"] = "' . $current_url . '";';
                write_file('application/cache/routes.php', PHP_EOL . '<?php ' . $data . ' ?>', "a+");

                $data1 = '$route["' . $making_url . '/song"] = "' . $current_url . '/s";';
                write_file('application/cache/routes.php', PHP_EOL . '<?php ' . $data1 . ' ?>', "a+");

                $data2 = '$route["' . $making_url . '/trailer"] = "' . $current_url . '/t";';
                write_file('application/cache/routes.php', PHP_EOL . '<?php ' . $data2 . ' ?>', "a+");

                $data3 = '$route["' . $making_url . '/poster"] = "' . $current_url . '/p";';
                write_file('application/cache/routes.php', PHP_EOL . '<?php ' . $data3 . ' ?>', "a+");
            } else if ($table_name == 'singer') {
                $making_url = 'singer/' . $random . '/' . $vido_name;
                $final_url = base_url('singer/' . $random . '/' . $vido_name);

                $data = '$route["' . $making_url . '"] = "' . $current_url . '";';
                write_file('application/cache/routes.php', PHP_EOL . '<?php ' . $data . ' ?>', "a+");

                $data1 = '$route["' . $making_url . '/song"] = "' . $current_url . '/s";';
                write_file('application/cache/routes.php', PHP_EOL . '<?php ' . $data1 . ' ?>', "a+");

                $data2 = '$route["' . $making_url . '/trailer"] = "' . $current_url . '/t";';
                write_file('application/cache/routes.php', PHP_EOL . '<?php ' . $data2 . ' ?>', "a+");
            } else if ($table_name == 'director') {
                $making_url = 'director/' . $random . '/' . $vido_name;
                $final_url = base_url('director/' . $random . '/' . $vido_name);

                $data = '$route["' . $making_url . '"] = "' . $current_url . '";';
                write_file('application/cache/routes.php', PHP_EOL . '<?php ' . $data . ' ?>', "a+");

                $data1 = '$route["' . $making_url . '/song"] = "' . $current_url . '/s";';
                write_file('application/cache/routes.php', PHP_EOL . '<?php ' . $data1 . ' ?>', "a+");

                $data2 = '$route["' . $making_url . '/trailer"] = "' . $current_url . '/t";';
                write_file('application/cache/routes.php', PHP_EOL . '<?php ' . $data2 . ' ?>', "a+");

                $data3 = '$route["' . $making_url . '/poster"] = "' . $current_url . '/p";';
                write_file('application/cache/routes.php', PHP_EOL . '<?php ' . $data3 . ' ?>', "a+");
            } else if ($table_name == 'music') {
                $making_url = 'musicdirector/' . $random . '/' . $vido_name;
                $final_url = base_url('musicdirector/' . $random . '/' . $vido_name);

                $data = '$route["' . $making_url . '"] = "' . $current_url . '";';
                write_file('application/cache/routes.php', PHP_EOL . '<?php ' . $data . ' ?>', "a+");

                $data1 = '$route["' . $making_url . '/song"] = "' . $current_url . '/s";';
                write_file('application/cache/routes.php', PHP_EOL . '<?php ' . $data1 . ' ?>', "a+");

                $data2 = '$route["' . $making_url . '/trailer"] = "' . $current_url . '/t";';
                write_file('application/cache/routes.php', PHP_EOL . '<?php ' . $data2 . ' ?>', "a+");
            } else if ($table_name == 'relby') {
                $making_url = 'company/' . $random . '/' . $vido_name;
                $final_url = base_url('company/' . $random . '/' . $vido_name);

                $data = '$route["' . $making_url . '"] = "' . $current_url . '";';

                write_file('application/cache/routes.php', PHP_EOL . '<?php ' . $data . ' ?>', "a+");

                $data1 = '$route["' . $making_url . '/song"] = "' . $current_url . '/s";';

                write_file('application/cache/routes.php', PHP_EOL . '<?php ' . $data1 . ' ?>', "a+");

                $data2 = '$route["' . $making_url . '/trailer"] = "' . $current_url . '/t";';

                write_file('application/cache/routes.php', PHP_EOL . '<?php ' . $data2 . ' ?>', "a+");
            }

            $data = array('current_url' => '' . $current_url,
                'making_url' => '' . $making_url,
                'final_url' => '' . $final_url,
                'new_final_url' => '' . str_replace(base_url(), 'https://www.comingtrailer.com/', $final_url)
            );

            $insert = $this->db->insert('video_url', $data);
            if ($insert) {
                return $this->db->insert_id();
            } else {
                return false;
            }
        } else {
            return 0;
        }
    }

    public function setSEOURLMovie($subcat_id, $video_id, $video_name, $table_name, $isedit) {

        $total = 0;
        if ($isedit == 'edit') {
            $this->db->select('*');

            $this->db->from('movie AS a'); // I use aliasing make joins easier
            // $this->db->join('sub_category AS b', 'a.subcat_id = b.id', 'INNER');

            $this->db->where('a.movie_name', '' . $video_name);
            $this->db->where('a.subcat_id', '' . $subcat_id);
            // $this->db->order_by("menu_order", "asc");
            $result = $this->db->get();

            $total = $result->num_rows();
        }
        if ($total == 0) {

            $subcat_name = $this->getSubCategoryName($subcat_id);

            $current_url = 'movieIndividual/index/' . $video_id;

            $video_name = rtrim($video_name);

            $vido_name = str_replace(' ', '-', $video_name);

            $vido_name = preg_replace('/[^A-Za-z0-9\-]/', '', $vido_name);

            $vido_name = preg_replace('/-+/', '-', $vido_name);

            $vido_name = rtrim($vido_name, '-');

            $random = $this->getRand();

            $subcat_name = str_replace(" ", "-", $subcat_name);

            $making_url = 'movie/' . $random . '/' . $vido_name;
            $final_url = base_url('movie/' . $random . '/' . $vido_name);

            $this->load->helper('file');

            $data = '$route["' . $making_url . '"] = "' . $current_url . '";';

            if (!write_file('application/cache/routes.php', PHP_EOL . '<?php ' . $data . ' ?>', "a+")) {
                echo 'Unable to write the file';
            } else {
                echo 'File written!' . $current_url . '.........' . $making_url . '...' . $final_url;
            }

            //temprory block because of multiple category  
            //   $this->setMovieLanguage($subcat_name,$subcat_id);

            $data = array('current_url' => '' . $current_url,
                'making_url' => '' . $making_url,
                'final_url' => '' . $final_url,
                'new_final_url' => '' . str_replace(base_url(), 'https://www.comingtrailer.com/', $final_url)
            );

            $insert = $this->db->insert('video_url', $data);

            if ($insert) {
                return $this->db->insert_id();
            } else {
                return false;
            }
        } else {
            return 0;
        }
    }

    public function setMovieLanguage($subcat_name, $subcat_id) {

        $this->db->select('*');
        $this->db->from('video_url');

        $current_url = 'AllDetail/index/movie/' . $subcat_id;

        $this->db->where(array('current_url' => $current_url));

        $result = $this->db->get();


        if ($result->num_rows() == 0) {

            $subcat_name = str_replace(" ", "-", $subcat_name);

            $subcat_name = preg_replace('/[^A-Za-z0-9\-]/', '', $subcat_name);

            $subcat_name = preg_replace('/-+/', '-', $subcat_name);

            $subcat_name = rtrim($subcat_name, '-');

            $making_url = 'movie/' . strtolower($subcat_name);
            $final_url = base_url('movie/' . strtolower($subcat_name));

            $this->load->helper('file');

            $data = '$route["' . $making_url . '"] = "' . $current_url . '";';

            if (!write_file('application/cache/routes.php', PHP_EOL . '<?php ' . $data . ' ?>', "a+")) {
//                        echo 'Unable to write the file';
            } else {
//                        echo 'File written!'.$current_url.'.........'.$making_url.'...'.$final_url;
            }

            $data = array('current_url' => '' . $current_url,
                'making_url' => '' . $making_url,
                'final_url' => '' . $final_url,
                'new_final_url' => '' . str_replace(base_url(), 'https://www.comingtrailer.com/', $final_url)
            );

            $insert = $this->db->insert('video_url', $data);

            if ($insert) {
                return $this->db->insert_id();
            } else {
                return false;
            }
        }
    }

    public function setTrailerLanguage($cat_id, $subcat_id) {

        $subcat_name = $this->getSubCategoryName($subcat_id);

        $this->db->select('*');
        $this->db->from('video_url');

        if ($cat_id == 3) {
            $current_url = 'MoviePoster/index/' . $cat_id . '/' . $subcat_id;
        } else {
            $current_url = 'MovieTrailer/index/' . $cat_id . '/' . $subcat_id;
        }

        $this->db->where(array('current_url' => $current_url));

        $result = $this->db->get();

        $subcat_name = str_replace(" ", "-", $subcat_name);

        $subcat_name = preg_replace('/[^A-Za-z0-9\-]/', '', $subcat_name);

        $subcat_name = preg_replace('/-+/', '-', $subcat_name);
        $subcat_name = rtrim($subcat_name, '-');
        if ($result->num_rows() == 0) {
            if ($cat_id == 1) {
                $making_url = 'movietrailer/' . strtolower($subcat_name);
                $final_url = base_url('movietrailer/' . strtolower($subcat_name));
            } else if ($cat_id == 2) {
                $making_url = 'videosong/' . strtolower($subcat_name);
                $final_url = base_url('videosong/' . strtolower($subcat_name));
            } else if ($cat_id == 3) {
                $making_url = 'movieposter/' . strtolower($subcat_name);
                $final_url = base_url('movieposter/' . strtolower($subcat_name));
            }

            $this->load->helper('file');

            $data = '$route["' . $making_url . '"] = "' . $current_url . '";';

            if (!write_file('application/cache/routes.php', PHP_EOL . '<?php ' . $data . ' ?>', "a+")) {
//                        echo 'Unable to write the file';
            } else {
//                        echo 'File written!'.$current_url.'.........'.$making_url.'...'.$final_url;
            }

            $data = array('current_url' => '' . $current_url,
                'making_url' => '' . $making_url,
                'final_url' => '' . $final_url,
                'new_final_url' => '' . str_replace(base_url(), 'https://www.comingtrailer.com/', $final_url)
            );

            $insert = $this->db->insert('video_url', $data);
            if ($insert) {
                return $this->db->insert_id();
            } else {
                return false;
            }
        } else {
            foreach ($result->result_array() as $value_id) {
                $insert_id = $value_id['id'];
            }

            return $insert_id;
        }
    }

    public function getSeoUrl($table, $id) {

        $this->db->select('*');
        $this->db->from($table . ' AS a'); // I use aliasing make joins easier
        // $this->db->join('sub_category AS b', 'a.subcat_id = b.id', 'INNER');
        $this->db->where(array('a.id' => '' . $id));
        // $this->db->order_by("menu_order", "asc");
        $sub['result'] = $this->db->get();
        $sub_inc = 0;
        $final_url = '';
        foreach ($sub['result']->result_array() as $sub_cats) {
            //$sub_cat[$sub_inc++] = array('sub_id' => $sub_cats['subcat_id'], 'sub_name' => $sub_cats['subcat_name']);
            $final_url = $sub_cats['final_url'];
        }
        return $final_url;
    }

    //SEND notification with GCM
    function send_notification($registatoin_ids, $message) {

        // Set POST variables
        $url = 'https://fcm.googleapis.com/fcm/send';

        $fields = array(
            'registration_ids' => $registatoin_ids,
            'data' => $message,
        );

        $headers = array(
            'Authorization: key= AIzaSyBf-Qpd3MQc2X9Xi_EankK5NBnkudH0PCA',
            'Content-Type: application/json'
        );
        // Open connection
        $ch = curl_init();

        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
//		die('Curl failed: ' . curl_error($ch));
        } else {
            echo 'send' . $result;
        }

        // Close connection
        curl_close($ch);

        //echo $result;
    }

}
