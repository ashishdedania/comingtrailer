<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdminHome
 *
 * @author yoo
 */
class Adm_movie_model extends CI_Model {

    //put your code here
    public function __construct() {
        // parent::__construct();
        $this->load->database();
        $this->load->model('Adm_sitemap_model');
    }

    public function getAllData($tablename, $id_tag, $name_tag, $subcat_id, $status = 0) {
        //Data for actor,singer,director etc...
        if ($this->input->post('search_year')) {
            //echo $this->input->post('search_year');exit;
            $this->db->where("DATE_FORMAT(`rel_date`,'%Y')", $this->input->post('search_year'));
        }
        if ($this->input->post('search_month')) {
            $this->db->where("DATE_FORMAT(`rel_date`,'%c')", $this->input->post('search_month'));
        }
        if ($this->input->post('search_keyword')) {
            // echo $this->input->post('search_keyword');exit;
            if ($this->input->post('ajax')) {
                if ($this->input->post('search_keyword') == '0-9') {
                    $this->db->where(array('LOWER(`' . $tablename . '_name`) RLIKE ' => '^[0-9].*'));
                } else {
                    $this->db->like('LOWER(`' . $tablename . '_name`)', $this->input->post('search_keyword'), 'after');
                }
            } else {
                $this->db->like('LOWER(`' . $tablename . '_name`)', $this->input->post('search_keyword'));
            }
        }

        if ($subcat_id > 0) {
            $movie_result = $this->db->where("find_in_set('" . $subcat_id . "',subcat_id) <> 0");
        }
        if ($tablename == 'movie') {

            $this->db->order_by("rel_date", "desc");
        }
        $movie_result = $this->db->where('status', $status);
        $movie_result = $this->db->get($tablename);


        $num = $movie_result->num_rows();
        if ($num > 0) {

            foreach ($movie_result->result_array() as $movie) {
                if ($tablename == 'movie') {
                    $movies[] = array('' . $id_tag => '' . $movie['id'], '' . $name_tag => '' . $movie['' . $name_tag], 'rel_date' => '' . $movie['rel_date'], 'created' => '' . $movie['created'], 'count' => $num,
                        'seo_url_id' => $movie['seo_url_id']);
                } else {
                    $movies[] = array('' . $id_tag => '' . $movie['id'], '' . $name_tag => '' . $movie['' . $name_tag], 'created' => '', 'count' => $num);
                }
            }
        } else {
            $movies[] = array('' . $id_tag => '', '' . $name_tag => '', 'count' => 0, 'seo_url_id' => 0);
        }
        $finalarray = $movies;
        return $finalarray;
    }

    public function getRowData($tablename, $id) {
        //Data for actor,singer,director etc...
        $data_result = $this->db->get_where($tablename, array('id' => $id));

//            $num = $movie_result->num_rows();
//            if($num>0){
//                foreach ($movie_result->result_array() as $movie) {
//                      $movies[] = array(''.$id_tag=>''.$movie['id'],''.$name_tag=>''.$movie[''.$name_tag]);
//                }
//            }else{
//                $movies[] = array(''.$id_tag=>'',''.$name_tag=>'');
//            }
//            $finalarray = $movies;
        return $data_result->row_array();
    }

    public function getMovieSubcat() {
        $this->db->distinct();
        $this->db->select('b.id AS subcat_id,b.subcat_name');
        $this->db->from('movie AS a'); // I use aliasing make joins easier
        $this->db->join('sub_category AS b', 'a.subcat_id = b.id', 'INNER');

        // $this->db->order_by("menu_order", "asc");
        $sub['result'] = $this->db->get();
        //$sub['result'] = $this->db->get('sub_category'); 
        $sub_inc = 0;
        foreach ($sub['result']->result_array() as $sub_cats) {
            $sub_cat[$sub_inc++] = array('sub_id' => $sub_cats['subcat_id'], 'sub_name' => $sub_cats['subcat_name']);
        }
        return $sub_cat;
    }

    public function getSubcat() {
        $sub['result'] = $this->db->get('sub_category');
        $sub_inc = 0;
        foreach ($sub['result']->result_array() as $sub_cats) {
            $sub_cat[$sub_inc++] = array('sub_id' => $sub_cats['id'], 'sub_name' => $sub_cats['subcat_name']);
        }
        return $sub_cat;
    }

    public function addMovieMapCast($video_id, $expod_data) {
        //$this->explodeAndSave('movie_map_cast', $video_id, $expod_data, 'movie_id', 'cast_id', 'cast', 'cast_name');
    }

    public function addMovieMapSinger($video_id, $expod_data) {
        //$this->explodeAndSave('movie_map_singer', $video_id, $expod_data, 'movie_id', 'singer_id', 'singer', 'singer_name');
    }

    public function addMovieMapMusic($video_id, $expod_data) {
        //$this->explodeAndSave('movie_map_music', $video_id, $expod_data, 'movie_id', 'music_id', 'music', 'music_name');
    }

    public function addMovieMapDirector($video_id, $expod_data) {
        //$this->explodeAndSave('movie_map_director', $video_id, $expod_data, 'movie_id', 'director_id', 'director', 'director_name');
    }

    public function explodeAndSave($tablename, $id, $data, $pri_idtag, $sec_idtag, $main_table, $main_col_name) {
        $datas = explode(",", $data);

        $this->db->where('' . $pri_idtag, $id);
        $this->db->delete('' . $tablename);
        $subcat_id = $this->input->post('subcat');
        foreach ($datas as $value) {
            //$cat = trim($cat);
            if ($value != '') {
                $this->db->where('' . $main_col_name, trim($value));
                $query = $this->db->get('' . $main_table);
                //$query = $this->db->get_where(''.$main_table,array(''.$main_col_name,''.$value));
                // echo $query->num_rows().'...'.$main_table.'...'.$main_col_name.'...'.$value;exit;
                if ($query->num_rows() > 0) {
                    foreach ($query->result_array() as $value_id) {
                        $data_array = array(
                            $pri_idtag => $id,
                            $sec_idtag => trim($value_id['id'])
                        );

                        $insert = $this->db->insert($tablename, $data_array);
                    }
                } else {
                    if ($main_table == 'movie') {
                        $data_array = array(
                            $main_col_name => trim($value),
                            'subcat_id' => $subcat_id
                        );
                    } else {
                        $data_array = array(
                            $main_col_name => trim($value)
                        );
                    }

                    $insert = $this->db->insert($main_table, $data_array);

                    $insert_id = $this->db->insert_id();

                    if ($main_table == 'movie') {

                        $seo_url_id = $this->WebService->setSEOURLMovie($subcat_id, $insert_id, trim($value), 'movie', 'add');

                        $userData = array(
                            'seo_url_id' => $seo_url_id
                        );

                        $insertUserData = $this->editCastData($insert_id, $userData, '' . $main_table);
                    } else {
                        $seo_url_id = $this->WebService->setSEOURLCast($insert_id, trim($value), '' . $main_table, 'add');

                        $userData = array(
                            'seo_url_id' => $seo_url_id
                        );

                        $insertUserData = $this->editCastData($insert_id, $userData, '' . $main_table);
                    }

                    $data_array = array(
                        $pri_idtag => $id,
                        $sec_idtag => $insert_id
                    );

                    $insert = $this->db->insert($tablename, $data_array);
                }

//        $datas = explode(",", $data);
//        
//        $this->db->where(''.$pri_idtag, $id);
//        $this->db->delete(''.$tablename);
//        
//        foreach($datas as $value) {
//            //$cat = trim($cat);
//          
//            $data_array = array(
//                $pri_idtag => $id,
//                $sec_idtag => trim($value)
//            );
//            
//            $insert = $this->db->insert($tablename,$data_array);
//            if($insert){
//                return $this->db->insert_id();
//            }else{
//                return false;    
//            }
//            $this->Adm_sitemap_model->generateMASDMCSitemap(''.$main_table);
            }
        }
    }

    public function addMovieCastData($movie_id, $cast_id) {
        $this->db->select('*');
        $this->db->from('movie_map_cast AS a');
        $this->db->where('movie_id', trim($movie_id));
        $this->db->where('personality_id', trim($cast_id));
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            
        } else {
            $data_array = array(
                'movie_id' => trim($movie_id),
                'personality_id' => trim($cast_id)
            );

            $insert = $this->db->insert('movie_map_cast', $data_array);
        }
    }

    public function addMovieDirectorData($movie_id, $director_id) {
        $this->db->select('*');
        $this->db->from('movie_map_director AS a');
        $this->db->where('movie_id', trim($movie_id));
        $this->db->where('personality_id', trim($director_id));
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            
        } else {
            $data_array = array(
                'movie_id' => trim($movie_id),
                'personality_id' => trim($director_id)
            );

            $insert = $this->db->insert('movie_map_director', $data_array);
        }
    }

    public function addMovieMusicData($movie_id, $music_id) {
        $this->db->select('*');
        $this->db->from('movie_map_music AS a');
        $this->db->where('movie_id', trim($movie_id));
        $this->db->where('personality_id', trim($music_id));
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            
        } else {
            $data_array = array(
                'movie_id' => trim($movie_id),
                'personality_id' => trim($music_id)
            );

            $insert = $this->db->insert('movie_map_music', $data_array);
        }
    }

    public function addMovieSingerData($movie_id, $singer_id) {
        $this->db->select('*');
        $this->db->from('movie_map_singer AS a');
        $this->db->where('movie_id', trim($movie_id));
        $this->db->where('personality_id', trim($singer_id));
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            
        } else {
            $data_array = array(
                'movie_id' => trim($movie_id),
                'personality_id' => trim($singer_id)
            );

            $insert = $this->db->insert('movie_map_singer', $data_array);
        }
    }

    public function editCastData($video_id, $data = array(), $tablename) {
//        if(!array_key_exists("created",$data)){
//            $data['created'] = date("Y-m-d H:i:s");
//        }
//        if(!array_key_exists("modified",$data)){
//            $data['modified'] = date("Y-m-d H:i:s");
//        }
        $this->db->set('updated', 'DATE_ADD(NOW(), INTERVAL 1 MINUTE)', FALSE);
        $this->db->where('id', $video_id);

        return $this->db->update('' . $tablename, $data);
//        if($insert){
//            return $this->db->insert_id();
//        }else{
//            return false;    
//        }
    }

    public function addMovieData($data = array()) {
//        if(!array_key_exists("created",$data)){
//            $data['created'] = date("Y-m-d H:i:s");
//        }
//        if(!array_key_exists("modified",$data)){
//            $data['modified'] = date("Y-m-d H:i:s");
//        }

        $created = date('Y-m-d H:i:s');
        $updated = date('Y-m-d H:i:s');

        $data['created'] = $created;
        $data['updated'] = $updated;


        $insert = $this->db->insert('movie', $data);
        if ($insert) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function editMovieData($movie_id, $data = array()) {
//        if(!array_key_exists("created",$data)){
//            $data['created'] = date("Y-m-d H:i:s");
//        }
//        if(!array_key_exists("modified",$data)){
//            $data['modified'] = date("Y-m-d H:i:s");
//        }
//        $this->db->set('updated', 'DATE_ADD(NOW(), INTERVAL 1 MINUTE)', FALSE);

        $updated = date('Y-m-d H:i:s');

        $data['updated'] = $updated;


        $this->db->where('id', $movie_id);

        return $this->db->update('movie', $data);
//        if($insert){
//            return $this->db->insert_id();
//        }else{
//            return false;    
//        }
    }

    public function get_video_by_id($id = 0) {
        if ($id === 0) {
            $query = $this->db->get('video');
            return $query->result_array();
        }

        $query = $this->db->get_where('video', array('id' => $id));
        return $query->row_array();
    }

}