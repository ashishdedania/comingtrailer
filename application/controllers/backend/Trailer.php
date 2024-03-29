<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Trailer extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->data['search_year'] = $this->My_model->getresult("select YEAR(video.rel_date) as year from video where cat_id=1 group by YEAR(video.rel_date) ORDER BY YEAR(video.rel_date) DESC ");
        $this->data['category'] = $this->My_model->getall("sub_category");
        $this->data['view_name'] = "trailer_tb_view.php";
        $this->data['message'] = $this->session->flashdata('message');
        $this->load->view('backend/layout', $this->data);
    }

    public function add() {
        $this->data['main_category'] = $this->My_model->getresult("select * from category where id IN(1,2)");
        $this->data['category'] = $this->My_model->getall("sub_category");
        $this->data['view_name'] = "video_view.php";
        $this->data['message'] = $this->session->flashdata('message');
        $this->load->view('backend/layout', $this->data);
    }

    public function save_seo_data() {
        $data = array(
            "sub_category_id" => $this->input->post("sub_category_id"),
            "name" => $this->input->post("name"),
            "title" => $this->input->post("title"),
            "description" => $this->input->post("description"),
            "keywords" => $this->input->post("keywords"),
            "updated" => date("Y-m-d H:i:s")
        );

        $this->My_model->updatedata("seo", $data, array("category_id" => "1", "sub_category_id" => $this->input->post("sub_category_id")));

        $this->session->set_flashdata("message", "success_SEO Content Save Successfully.");
        redirect("backend/trailer");
    }

    public function edit() {
        $id = $this->input->get("id");
        $this->data['main_category'] = $this->My_model->getresult("select * from category where id IN(1,2)");
        $this->data['category'] = $this->My_model->getall("sub_category");
        $edit_data = $this->My_model->getbyid("video", array("id" => $id));
        $movie_list = $this->My_model->getresult("select movie.movie_name as name,movie.id from video_map_movie LEFT JOIN movie ON movie.id=video_map_movie.movie_id where video_id=" . $id);
        $edit_data[0]["movie_id"] = $movie_list[0]['id'];
        $edit_data[0]["movie_name"] = $movie_list[0]['name'];
        $url = $this->My_model->getbyid("video_url", array("id" => $edit_data[0]["seo_url_id"]));
        $edit_data[0]["final_url"] = $url[0]['final_url'];
        $this->data['edit_data'] = $edit_data[0];

        $this->data['cast_list'] = $this->My_model->getresult("select personality.personality_name as name,personality.id from video_map_cast LEFT JOIN personality ON personality.id=video_map_cast.personality_id where video_id=" . $id);
        $this->data['director_list'] = $this->My_model->getresult("select personality.personality_name as name,personality.id from video_map_director LEFT JOIN personality ON personality.id=video_map_director.personality_id where video_id=" . $id);
        $this->data['music_list'] = $this->My_model->getresult("select personality.personality_name as name,personality.id from video_map_music LEFT JOIN personality ON personality.id=video_map_music.personality_id where video_id=" . $id);
        $this->data['singers_list'] = $this->My_model->getresult("select personality.personality_name as name,personality.id from video_map_singer LEFT JOIN personality ON personality.id=video_map_singer.personality_id where video_id=" . $id);
        $this->data['rel_by_list'] = $this->My_model->getresult("select released_by.rel_by_name as name,released_by.id from video_map_relby LEFT JOIN released_by ON released_by.id=video_map_relby.rel_by_id where video_id=" . $id);

        $this->data['view_name'] = "video_view.php";
        $this->data['message'] = $this->session->flashdata('message');
        $this->load->view('backend/layout', $this->data);
    }

    public function status() {
        $id = $this->input->get('id');
        $result = $this->My_model->getbyid("video", array("id" => $id));
        if ($result[0]['is_deleted'] == "0") {
            $this->My_model->updatedata("video", array("is_deleted" => "1"), array("id" => $id));
            $this->session->set_flashdata("message", "success_Trailer Song Deleted Successfully.");
        } else {
            $this->My_model->updatedata("video", array("is_deleted" => "0"), array("id" => $id));
            $this->session->set_flashdata("message", "success_Trailer Song Reactive Successfully.");
        }
        redirect("backend/trailer");
    }

    public function delete() {
        $id = $this->input->get('id');
        $result = $this->My_model->getbyid("video", array("id" => $id));
        if (!empty($result[0]['video_thumb'])) {
            @unlink("./images/videothumb/" . $result[0]['video_thumb']);
        }
        $this->My_model->deletedata("video", array("id" => $id));
        $this->session->set_flashdata("message", "success_Trailer Deleted Successfully.");
        redirect("backend/trailer");
    }

    public function trailer_list() {
        $columns = array("video.id", 'video.rel_date', 'video.video_name','video.video_thumb',
            'movie.movie_name', 'video.play', 'video.liked', 'video.youtube_views',
            'sub_category.subcat_name', 'video_map_movie.movie_id',
            'video.subcat_id', 'video.video_desc', 'video_url.final_url', 'video.is_deleted');


        $start_date = $this->input->post('columns')[4]['search']['value'];
        $end_date = $this->input->post('columns')[5]['search']['value'];
        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = $columns[$this->input->post('order')[0]['column']];
        $dir = $this->input->post('order')[0]['dir'];

        $year = $this->input->post('columns')[0]['search']['value'];
        $month = $this->input->post('columns')[1]['search']['value'];
        $search_keyword = $this->input->post('columns')[2]['search']['value'];
        $status = $this->input->post('columns')[3]['search']['value'];
        $where2 = "";
        $sub_category_id = 0;

        if (!empty($start_date) && !empty($end_date)) {
            $where2.=" AND DATE(video.rel_date) BETWEEN '" . $start_date . "' AND '" . $end_date . "'";
        }
        if (!empty($year)) {
            $where2.=" AND YEAR(video.rel_date) = " . $year;
        }

        if (!empty($month)) {
            $where2.=" AND MONTH(video.rel_date) = " . $month;
        }

        $is_deleted = 0;
        if (!empty($status)) {
            if ($status == "delete") {
                $is_deleted = 1;
                $sub_category_id = 0;
            } else {

                $catid = explode("_", $status);
                $where2 .= " AND video.subcat_id=" . $catid[1];
                $sub_category_id = $catid[1];
            }
        }

        $seo_data = $this->My_model->getresult("SELECT * from seo WHERE category_id=1 AND sub_category_id='" . $sub_category_id . "' LIMIT 0,1");

        $totalData = $this->My_model->getresult("select count(video.id) as tot from video WHERE cat_id=1 AND video.is_deleted=0");
        $totalFiltered = $totalData[0]['tot'];

        if (empty($this->input->post('search')['value']) && empty($year) && empty($month) && empty($search_keyword) && empty($status) && empty($start_date) && empty($end_date)) {
            $posts = $this->My_model->getresult("

               SELECT " . implode(',', $columns) . " FROM video
               LEFT JOIN sub_category ON sub_category.id=video.subcat_id
               LEFT JOIN video_map_movie ON video_map_movie.video_id=video.id
               LEFT JOIN movie ON movie.id=video_map_movie.movie_id
               LEFT JOIN video_url ON video_url.id=video.seo_url_id
               where video.cat_id=1 AND video.is_deleted=0
               ORDER BY $order $dir
               LIMIT $start,$limit

            ");
        } else {

            $search = trim($this->input->post('search')['value']);
            $search = preg_replace('!\s+!', ' ', $search);


            if (!empty($search_keyword)) {
                $search = $search_keyword;
            }

            $where = "where video.cat_id=1 AND video.is_deleted=" . $is_deleted . " AND ";
            $where.=" ( " . implode(" LIKE '%" . $search . "%' OR ", $columns) . " LIKE '%" . $search . "%' )";

            $where.=$where2;

            $posts = $this->My_model->getresult("

               SELECT " . implode(',', $columns) . " FROM video
               LEFT JOIN sub_category ON sub_category.id=video.subcat_id
               LEFT JOIN video_map_movie ON video_map_movie.video_id=video.id
               LEFT JOIN movie ON movie.id=video_map_movie.movie_id
               LEFT JOIN video_url ON video_url.id=video.seo_url_id
               $where
               ORDER BY $order $dir
               LIMIT $start,$limit

            ");

            $totalData = $this->My_model->getresult("select count(video.id) as tot from video
               LEFT JOIN sub_category ON sub_category.id=video.subcat_id
               LEFT JOIN video_map_movie ON video_map_movie.video_id=video.id
               LEFT JOIN movie ON movie.id=video_map_movie.movie_id
               LEFT JOIN video_url ON video_url.id=video.seo_url_id
             $where
            ");
            $totalFiltered = $totalData[0]['tot'];
        }

        $number = ($start + 1);
        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $id = $post['id'];
                $action = "";
                $play_list = $this->My_model->getresult("select * from playlist");
                $playlist_html = '';
                if (count($play_list) > 0) {
                    $playlist_html .= '<ul>';
                    foreach ($play_list as $play_list_value) {
                        $play_list = $this->My_model->getresult("select playlist_map_video.video_id from playlist_map_video where playlist_map_video.playlist_id = " . $play_list_value['id'] . " and playlist_map_video.video_id = " . $post['id']);
                        if (count($play_list) > 0 and $post['id'] == $play_list[0]['video_id']) {
                            $link = 'checked onchange="remove_from_playlist(this,' . $post['id'] . ',' . $play_list_value['id'] . ');return false;"';
                        } else {
                            $link = 'onchange="add_to_playlist(this,' . $post['id'] . ',' . $play_list_value['id'] . ');return false;"';
                        }
                        $playlist_html .= '<li onclick="playlistli(this);return false;"><input type="checkbox" ' . $link . '> <span>' . html_escape($play_list_value['name']) . '</span></li>';
                    }
                    $playlist_html .= '</ul>';
                }
                $action .= '<a class="icon-playlist" style="cursor:pointer;" data-container="body" data-toggle="popover" data-placement="top" data-html="true" data-content=\'<div class="list">' . $playlist_html . '</div><hr/><div><input type="text" class="newplaylist" name="playlist_name" onblur="create_playlist(this);return false;" id="' . $post['id'] . '"></div>\' ></a>';

                if ($post['is_deleted'] == "0") {
                    $action.="<a href='" . base_url() . "backend/trailer/edit?id=" . $post['id'] . "' class='icon-edit'></a>";
                    $action.="<a target=\"_blank\" href=\"" . $post['final_url'] . "\" class=\"icon-view\"></a>";
                    $action.= " <a onclick=\"return confirm('Are You Sure You Want To Delete?')\"  href='" . base_url() . "backend/trailer/status?id=" . $post['id'] . "' class='icon-delete'></a>";
                } else {
                    $action.= " <a onclick=\"return confirm('Are You Sure You Want To Reactive?')\"  href='" . base_url() . "backend/trailer/status?id=" . $post['id'] . "' class='icon-restore'></a>";
                    $action.="<a target=\"_blank\" href=\"" . $post['final_url'] . "\" class=\"icon-view\"></a>";
                    $action.= " <a onclick=\"return confirm('Are You Sure You Want To Delete?')\"  href='" . base_url() . "backend/trailer/delete?id=" . $post['id'] . "' class='icon-delete'></a>";
                }
                $cast_list = $this->My_model->getresult("select personality.personality_name as name,personality.id from video_map_cast LEFT JOIN personality ON personality.id=video_map_cast.personality_id where video_id=" . $id);
                $director_list = $this->My_model->getresult("select personality.personality_name as name,personality.id from video_map_director LEFT JOIN personality ON personality.id=video_map_director.personality_id where video_id=" . $id);
                $music_list = $this->My_model->getresult("select personality.personality_name as name,personality.id from video_map_music LEFT JOIN personality ON personality.id=video_map_music.personality_id where video_id=" . $id);
                $singers_list = $this->My_model->getresult("select personality.personality_name as name,personality.id from video_map_singer LEFT JOIN personality ON personality.id=video_map_singer.personality_id where video_id=" . $id);
                $rel_by_list = $this->My_model->getresult("select released_by.rel_by_name as name,released_by.id from video_map_relby LEFT JOIN released_by ON released_by.id=video_map_relby.rel_by_id where video_id=" . $id);

                $cast = "";
                foreach ($cast_list as $row) {
                    $cast.=" <a href='" . base_url() . "backend/personality/edit?id=" . $row['id'] . "'>" . $row['name'] . "</a>,";
                }

                $director = "";
                foreach ($director_list as $row) {
                    $director.=" <a href='" . base_url() . "backend/personality/edit?id=" . $row['id'] . "'>" . $row['name'] . "</a>,";
                }

                $music = "";
                foreach ($music_list as $row) {
                    $music.=" <a href='" . base_url() . "backend/personality/edit?id=" . $row['id'] . "'>" . $row['name'] . "</a>,";
                }

                $singer = "";
                foreach ($singers_list as $row) {
                    $singer.=" <a href='" . base_url() . "backend/personality/edit?id=" . $row['id'] . "'>" . $row['name'] . "</a>,";
                }

                $rel_by = "";
                foreach ($rel_by_list as $row) {
                    $rel_by.=" <a href='" . base_url() . "backend/channel/edit?id=" . $row['id'] . "'>" . $row['name'] . "</a>,";
                }


                $nestedData["number"] = $number;
                $nestedData["video_name"] = "<a href='" . base_url() . "backend/trailer/edit?id=" . $post['id'] . "'>" . $post['video_name'] . "</a>";
                $nestedData["movie_name"] = "<a href='" . base_url() . "backend/movie/edit?id=" . $post['movie_id'] . "'>" . $post['movie_name'] . "</a>";
                $nestedData["play"] = $post['play'];
                $nestedData["video_thumb"] = '<img src="'.BASE_URL().'images/videothumb/'.$post['video_thumb'].'" height="25">';
                $nestedData["like"] = $post['liked'];
                $nestedData["youtube_views"] = $post['youtube_views'];
                $nestedData["category_name"] = "<a href='javascript:void(0);' id='cat_" . $post['subcat_id'] . "'>" . $post['subcat_name'] . "</a>";
                $nestedData["created"] = date("d M Y, h:i:s A", strtotime($post['rel_date']));
                $nestedData["action"] = $action;
                $nestedData["cast"] = rtrim($cast, ",");
                $nestedData["music"] = rtrim($music, ",");
                $nestedData["singer"] = rtrim($singer, ",");
                $nestedData["director"] = rtrim($director, ",");
                $nestedData["rel_by"] = rtrim($rel_by, ",");
                $nestedData["description"] = $post['video_desc'];
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
        $output['seo_data'] = $seo_data[0];
        //output to json format
        echo json_encode($output);
    }

}
