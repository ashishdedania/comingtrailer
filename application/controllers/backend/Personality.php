<?php

/**
 * Backend personality operations
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Personality extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index($occupation = 'cast') {
       // print_r($occupation);exit;
        if($occupation == 'all')
        {
            $occupation = 'cast';
            $occupation1 = 'all';
        }
        $this->data['search_year'] = $this->My_model->getresult("select YEAR(personality.created) as year from personality where is_" . $occupation . " = 1 group by YEAR(personality.created) ORDER BY YEAR(personality.created) DESC ");
        $seo_data = $this->My_model->getresult("SELECT * from seo_individual WHERE  individual='C' LIMIT 0,1");
        $this->data['seo_data'] = $seo_data[0];
        $this->data['occupation'] = $occupation;
        if($occupation1 == 'all')
        {
            $this->data['occupation1'] = 'all';
        }
        if($occupation1 == 'cast')
        {
            $this->data['occupation1'] = 'cast';
        }
        $this->data['view_name'] = "personality_tb_view.php";
        $this->data['message'] = $this->session->flashdata('message');
       //print_r($this->data);exit;
        $this->load->view('backend/layout', $this->data);
    }

    public function add() {
        $this->data['view_name'] = "personality_view.php";        
        $this->data['message'] = $this->session->flashdata('message');
        $this->load->view('backend/layout', $this->data);
    }

    public function save_seo_data() {
        $data = array(
            "individual" => $this->input->post("individual"),
            "name" => $this->input->post("name"),
            "title" => $this->input->post("title"),
            "description" => $this->input->post("description"),
            "keywords" => $this->input->post("keywords"),
            "updated" => date("Y-m-d H:i:s")
        );

        $this->My_model->updatedata("seo_individual", $data, array("individual" => $this->input->post("individual")));

        $this->session->set_flashdata("message", "success_SEO Content Save Successfully.");
        redirect("backend/personality");
    }

    public function save() {

        $name = trim($this->input->post("name"));
        $name = trim(preg_replace('/\s\s+/', ' ', str_replace("\n", " ", $name)));
        $name = str_replace(' - ','-',$name);
        $title = $this->input->post("title");
        $is_cast = $this->input->post("is_cast");
        $is_director = $this->input->post("is_director");
        $is_singer = $this->input->post("is_singer");
        $is_music_director = $this->input->post("is_music_director");
        $description = $this->input->post("description");
        $keyword = $this->input->post("keyword");
        $for_seo = '';

        if(!empty($is_cast))
        {
            $for_seo = 'is_cast';
        }

        if(!empty($is_director))
        {
            $for_seo = 'is_director';
        }

        if(!empty($is_singer))
        {
            $for_seo = 'is_singer';
        }

        if(!empty($is_music_director))
        {
            $for_seo = 'is_music_director';
        }

        $data = array(
            "personality_name" => $name,
            "personality_title" => $title,
            "personality_desc" => $description,
            "personality_keywords" => $keyword,
            "is_cast" => (!empty($is_cast)) ? $is_cast : 0,
            "is_director" => (!empty($is_director)) ? $is_director : 0,
            "is_singer" => (!empty($is_singer)) ? $is_singer : 0,
            "is_music_director" => (!empty($is_music_director)) ? $is_music_director : 0,
            "created" => date("Y-m-d H:i:s"),
            "for_seo" => $for_seo
        );

        $name = preg_replace('/\s+/', ' ', $name);
        $check = $this->My_model->getbyid("personality", array("personality_name" => $name));
        if (empty($check)) {

            $new_name = "500X500-" . str_replace(" ", "-", $name);
            $new_name = str_replace([".", "@", "$", '%'], "", $new_name);
            $config = array(
                'upload_path' => "./images/personality/",
                'allowed_types' => "gif|jpg|png|jpeg"
            );
            $config['file_name'] = $new_name;
            $this->upload->initialize($config);

            if ($this->upload->do_upload("user_file")) {
                $updata = array('upload_data' => $this->upload->data());
                $data['personality_img'] = $updata['upload_data']['file_name'];
                $this->image_resize("./images/personality/" . $updata['upload_data']['file_name'], "personality");
            }

            $id = $this->My_model->insertdata($data, "personality");
//            $seo_url_id = $this->WebService->setSEOURLCast($id, $name, "cast", "add");
//            $this->My_model->updatedata("personality", array("seo_url_id" => $seo_url_id), array("id" => $id));

            $this->session->set_flashdata("message", "success_Personality Add Successfully.");
            redirect("backend/personality/add");
        } else {
            $this->session->set_flashdata("message", "danger_Personality Name Already Exist.");
            redirect("backend/personality/add");
        }
    }

    public function update() {

        $id = $this->input->post("id");
        $name = trim($this->input->post("name"));
        $name = trim(preg_replace('/\s\s+/', ' ', str_replace("\n", " ", $name)));
        $name = str_replace(' - ','-',$name);
        $is_cast = $this->input->post("is_cast");
        $is_director = $this->input->post("is_director");
        $is_singer = $this->input->post("is_singer");
        $is_music_director = $this->input->post("is_music_director");
        $title = $this->input->post("title");
        $description = $this->input->post("description");
        $keyword = $this->input->post("keyword");
        $for_seo = $this->input->post("for_seo");


        $name = preg_replace('/\s+/', ' ', $name);
        $check = $this->My_model->getresult("select * from personality where personality_name='" . $name . "' and id!=" . $id);
        if (empty($check)) {

            $data = array(
                "personality_name" => $name,
                "personality_title" => $title,
                "personality_desc" => $description,
                "personality_keywords" => $keyword,
                "is_cast" => (!empty($is_cast)) ? $is_cast : 0,
                "is_director" => (!empty($is_director)) ? $is_director : 0,
                "is_singer" => (!empty($is_singer)) ? $is_singer : 0,
                "is_music_director" => (!empty($is_music_director)) ? $is_music_director : 0,
                "for_seo" =>$for_seo,
                "updated" => date("Y-m-d H:i:s")
            );

            $new_name = "500X500-" . str_replace(" ", "-", $name);
            $new_name = str_replace([".", "@", "$", '%'], "", $new_name);
            $config = array(
                'upload_path' => "./images/personality/",
                'allowed_types' => "gif|jpg|png|jpeg"
            );
            $config['file_name'] = $new_name;
            $this->upload->initialize($config);

            if (!empty($_FILES['user_file']['name'])) {
                $result = $this->My_model->getbyid("personality", array("id" => $id));
                if (!empty($result[0]['personality_img'])) {
                    @unlink("./images/personality/" . $result[0]['personality_img']);
                }
            }

            if ($this->upload->do_upload("user_file")) {
                $updata = array('upload_data' => $this->upload->data());
                $data['personality_img'] = $updata['upload_data']['file_name'];
                $this->image_resize("./images/personality/" . $updata['upload_data']['file_name'], "personality");
            }
//
//            $seo_url_id = $this->WebService->setSEOURLCast($id, $name, "cast", "edit");
//
//            if ($seo_url_id > 0) {
//                $data['seo_url_id'] = $seo_url_id;
//            }

            $this->My_model->updatedata("personality", $data, array("id" => $id));
            $this->session->set_flashdata("message", "success_Personality Update Successfully.");
            redirect("backend/personality/edit?id=" . $id);
        } else {
            $this->session->set_flashdata("message", "danger_Personality Name Already Exist.");
            redirect("backend/personality/edit?id=" . $id);
        }
    }

    public function edit() {
        $this->data['search_year'] = $this->My_model->getresult("select YEAR(personality.created) as year from personality group by YEAR(personality.created) ORDER BY YEAR(personality.created) DESC ");
        $id = $this->input->get("id");
        $result = $this->My_model->getbyid("personality", array("id" => $id));
//        $url = $this->My_model->getbyid("video_url", array("id" => $result[0]["seo_url_id"]));
//        $result[0]["final_url"] = $url[0]['final_url'];
        $this->data['edit_data'] = $result[0];
        $this->data['view_name'] = "personality_view.php";
        $this->data['message'] = $this->session->flashdata('message');
        $this->load->view('backend/layout', $this->data);
    }

    public function status() {
        $id = $this->input->get('id');
        $result = $this->My_model->getbyid("personality", array("id" => $id));
        if ($result[0]['status'] == "0") {
            $this->My_model->updatedata("personality", array("status" => "1"), array("id" => $id));
            $this->session->set_flashdata("message", "success_Personality Deleted Successfully.");
        } else {
            $this->My_model->updatedata("personality", array("status" => "0"), array("id" => $id));
            $this->session->set_flashdata("message", "success_Personality Reactive Successfully.");
        }
        redirect("backend/personality");
    }

    public function delete() {
        $id = $this->input->get('id');
        $result = $this->My_model->getbyid("personality", array("id" => $id));
        if (!empty($result[0]['personality_img'])) {
            @unlink("./images/personality/" . $result[0]['personality_img']);
        }
        $this->My_model->deletedata("personality", array("id" => $id));
        $this->session->set_flashdata("message", "success_Personality Deleted Successfully.");
        redirect("backend/personality");
    }

    public function personality_list() {
        $columns = array("personality.id", 'personality.created', 'personality.personality_img',
            'personality.personality_name', 'personality.status');
        $occupation = $this->input->post('occupation');
        if ($occupation == 'singer') {
            $movie_count = "(SELECT sum(case when "
                    . "(select count(movie_id) from movie_map_singer where movie_map_singer.movie_id = movie.id and movie_map_singer.personality_id = personality.id) > 0 then 1 "                    
                    . "else 0 end) FROM movie)";
            $video_count = "(SELECT sum(case when "                    
                    . "(select count(video_id) from video_map_singer where video_map_singer.video_id = video.id and video_map_singer.personality_id = personality.id) > 0 then 1 "                    
                    . "else 0 end) FROM video where video.cat_id = 2)";
            $trailer_count = "(SELECT sum(case when "                    
                    . "(select count(video_id) from video_map_singer where video_map_singer.video_id = video.id and video_map_singer.personality_id = personality.id) > 0 then 1 else 0 end) "
                    . "FROM video where video.cat_id = 1)";
            $poster_count = "0";
        } else if ($occupation == 'director') {
            $movie_count = "(SELECT sum(case when "                    
                    . "(select count(movie_id) from movie_map_director where movie_map_director.movie_id = movie.id and movie_map_director.personality_id = personality.id) > 0 then 1 "
                    . "else 0 end) FROM movie)";
            $video_count = "(SELECT sum(case when "                    
                    . "(select count(video_id) from video_map_director where video_map_director.video_id = video.id and video_map_director.personality_id = personality.id) > 0 then 1 else 0 end) "
                    . "FROM video where video.cat_id = 2)";
            $trailer_count = "(SELECT sum(case when "                    
                    . "(select count(video_id) from video_map_director where video_map_director.video_id = video.id and video_map_director.personality_id = personality.id) > 0 then 1 else 0 end) "
                    . "FROM video where video.cat_id = 1)";
            $poster_count = "(SELECT sum(case when "                   
                    . "(select count(poster_id) from poster_map_director where poster_map_director.poster_id = poster.id and poster_map_director.personality_id = personality.id) > 0 then 1 else 0 end) "
                    . "FROM poster)";
        } else if ($occupation == 'music_director') {
            $movie_count = "(SELECT sum(case when "                    
                    . "(select count(movie_id) from movie_map_music where movie_map_music.movie_id = movie.id and movie_map_music.personality_id = personality.id) > 0 then 1 "                    
                    . "else 0 end) FROM movie)";
            $video_count = "(SELECT sum(case when "                    
                    . "(select count(video_id) from video_map_music where video_map_music.video_id = video.id and video_map_music.personality_id = personality.id) > 0 then 1 else 0 end) "
                    . "FROM video where video.cat_id = 2)";
            $trailer_count = "(SELECT sum(case when "                    
                    . "(select count(video_id) from video_map_music where video_map_music.video_id = video.id and video_map_music.personality_id = personality.id) > 0 then 1 "
                    . "else 0 end) "
                    . "FROM video where video.cat_id = 1)";
            $poster_count = "0";
        } else {            
            $movie_count = "(SELECT sum(case when "
                    . "(select count(movie_id) from movie_map_cast where movie_map_cast.movie_id = movie.id and movie_map_cast.personality_id = personality.id) > 0 then 1 "
                    . "else 0 end) FROM movie)";
            $video_count = "(SELECT sum(case when "
                    . "(select count(video_id) from video_map_cast where video_map_cast.video_id = video.id and video_map_cast.personality_id = personality.id) > 0 then 1 "
                    . " else 0 end) FROM video where video.cat_id = 2)";
            $trailer_count = "(SELECT sum(case when "
                    . "(select count(video_id) from video_map_cast where video_map_cast.video_id = video.id and video_map_cast.personality_id = personality.id) > 0 then 1 "
                    . "else 0 end) FROM video where video.cat_id = 1)";
            $poster_count = "(SELECT sum(case when "
                    . "(select count(poster_id) from poster_map_cast where poster_map_cast.poster_id = poster.id and poster_map_cast.personality_id = personality.id) > 0 then 1 "
                    . "else 0 end) "
                    . "FROM poster)";
        }
        $date = explode("@", $this->input->post('columns')[4]['search']['value']);
        $start_date = $date[0];
        $end_date = $date[1];

        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        if ($this->input->post('order')[0]['column'] == 4) {
            $order = $movie_count;
        } elseif ($this->input->post('order')[0]['column'] == 5) {
            $order = $video_count;
        } elseif ($this->input->post('order')[0]['column'] == 6) {
            $order = $trailer_count;
        } elseif ($this->input->post('order')[0]['column'] == 7) {
            $order = $poster_count;
        } else {
            $order = $columns[$this->input->post('order')[0]['column']];
        }
        //print_r($order);exit;
        $dir = $this->input->post('order')[0]['dir'];

        $year = $this->input->post('columns')[0]['search']['value'];
        $month = $this->input->post('columns')[1]['search']['value'];
        $search_keyword = $this->input->post('columns')[2]['search']['value'];
        $status = $this->input->post('columns')[3]['search']['value'];
        $where2 = "";

        if (!empty($start_date) && !empty($end_date)) {
            $where2.=" AND DATE(personality.created) BETWEEN '" . $start_date . "' AND '" . $end_date . "'";
        }

        if (!empty($year)) {
            $where2.=" AND YEAR(personality.created) = " . $year;
        }

        if (!empty($month)) {
            $where2.=" AND MONTH(personality.created) = " . $month;
        }
        $is_deleted = 0;
        if (!empty($status)) {
            $is_deleted = 1;
        }

        $totalData = $this->My_model->getresult("select count(id) as tot from personality where is_" . $occupation . " = 1 and status=0");
        $totalFiltered = $totalData[0]['tot'];
        if (empty($this->input->post('search')['value']) && empty($year) && empty($month) && empty($search_keyword) && empty($status) && empty($start_date) && empty($end_date)) {
            $posts = $this->My_model->getresult("

     SELECT " . implode(',', $columns) . "," . $movie_count . "  as movie," . $video_count . " as video," . $poster_count . " as poster," . $trailer_count . " as trailer FROM personality     
     where personality.is_" . $occupation . " = 1 and personality.status=0
     ORDER BY $order $dir
     LIMIT $start,$limit

     ");
        } else {

            $search = trim($this->input->post('search')['value']);
            $search = preg_replace('!\s+!', ' ', $search);

            if (!empty($search_keyword)) {
                $search = $search_keyword;
            }

            $where = "where personality.status=" . $is_deleted . " AND";
            if ($is_deleted == 0) {
                $where.=" personality.is_" . $occupation . " = 1 and ";
            }
            $where.=" ( " . implode(" LIKE '%" . $search . "%' OR ", $columns) . " LIKE '%" . $search . "%' )";

            $where.=$where2;

            $posts = $this->My_model->getresult("

     SELECT " . implode(',', $columns) . "," . $movie_count . " as movie," . $video_count . " as video," . $poster_count . " as poster," . $trailer_count . " as trailer FROM personality
     $where
     ORDER BY $order $dir
     LIMIT $start,$limit

     ");

            $totalData = $this->My_model->getresult("select count(personality.id) as tot from personality      
      $where
      ");
            $totalFiltered = $totalData[0]['tot'];
        }

        $number = ($start + 1);
        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $action = "";
                if ($post['status'] == "0") {
                    $action.="<a href='" . base_url() . "backend/personality/edit?id=" . $post['id'] . "' class='icon-edit'></a>";
                    $action.="<a target=\"_blank\" href='" . base_url() . "personality/" . str_replace(" ", "-", $post['personality_name']) . "' class=\"icon-view\"></a>";
                    $action.= " <a onclick=\"return confirm('Are You Sure You Want To Delete?')\"  href='" . base_url() . "backend/personality/status?id=" . $post['id'] . "' class='icon-delete'></a>";
                } else {
                    $action.= " <a onclick=\"return confirm('Are You Sure You Want To Reactive?')\"  href='" . base_url() . "backend/personality/status?id=" . $post['id'] . "' class='icon-restore'></a>";
                    $action.="<a target=\"_blank\" href='" . base_url() . "personality/" . str_replace(" ", "-", $post['personality_name']) . "' class=\"icon-view\"></a>";
                    $action.= " <a onclick=\"return confirm('Are You Sure You Want To Delete?')\"  href='" . base_url() . "backend/personality/delete?id=" . $post['id'] . "' class='icon-delete'></a>";
                }
                if (!empty($post['personality_img']) && file_exists('images/personality/' . $post['personality_img'])) {
                    $img = base_url() . 'images/personality/' . $post['personality_img'];
                } else {
                    $img = base_url() . 'images/no-user.svg';
                }
                $img = '<img id="videoimg" src="' . $img . '" alt="' . $post['personality_name'] . '" height="30" width="30">';

                $map_arr = ['m' => 'movie', 's' => 'video', 't' => 'video', 'p' => 'poster'];
                $label_map_arr = ['m' => 'Movie', 's' => 'Song', 't' => 'Trailer', 'p' => 'Poster'];

                $is_set = 0;
                foreach ($map_arr as $key => $val) {
                    $cnt = 0;
                    $data_arr = array();
                    $res = $this->getMSTPdata( $post['id'], $key);
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

                //print_r($total['Movies']);exit;

                $nestedData["number"] = $number;
                $nestedData["img"] = $img;
                $nestedData["personality_name"] = $post['personality_name'];
                $nestedData["movie"] = $total['Movie'];
                $nestedData["video"] = $total['Song'];
                $nestedData["poster"] = $total['Poster'];
                $nestedData["trailer"] = $total['Trailer'];
                $nestedData["created"] = (date("d M Y", strtotime($post['created'])) != "01 Jan 1970" &&
                        date("d M Y", strtotime($post['created'])) != "30 Nov -0001") ?
                        date("d M Y", strtotime($post['created'])) : "";
                $nestedData["action"] = $action;
                $data[] = $nestedData;
                $number++;
            }
        }

        $output = array(
            "draw" => intval($this->input->post('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data,
        );
        $csrf_name = $this->security->get_csrf_token_name();
        $csrf_hash = $this->security->get_csrf_hash();
        $output[$csrf_name] = $csrf_hash;
        //output to json format
        echo json_encode($output);
    }

    public function personality_autosuggetion() {
        $data = array();
        $keyword = $this->input->get("keyword");
        $keyword = trim($keyword['term']);
        $keyword = preg_replace('!\s+!', ' ', $keyword);
        $result = $this->My_model->getresult("select id,personality_name,personality_img from personality WHERE trim(personality_name) LIKE '%" . $keyword . "%'");
        foreach ($result as $row) {
            if (!empty($row['personality_img']) && file_exists('images/personality/' . $row['personality_img'])) {
                $img = base_url() . 'images/personality/' . $row['personality_img'];
            } else {
                $img = base_url() . 'images/no-user.svg';
            }
            $img = '<img style="display: inline-block" id="videoimg" src="' . $img . '" alt="' . $row['personality_name'] . '" height="30" width="30">';
            $data[] = array("id" => $row['id'], "text" => '<span style="display: inline-block">'.$row['personality_name'].'</span>', "img" => $img);
        }
        echo json_encode($data);
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

               
                

                $this->db->order_by("mapped.rel_date", "desc");
                $this->db->group_by("mapped.id");
                $data = $this->db->get()->result_array();
                $result = array_merge($result, $data);
             //   print_r($result);exit;
            }
        }
        
        return $result;
    }


}
