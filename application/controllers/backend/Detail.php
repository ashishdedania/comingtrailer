<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Detail extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        
    }

    public function video_list() {
        $columns = array("video.id", 'video.rel_date', 'video.video_name','video.video_thumb',
            'movie.movie_name', 'video.play', 'video.liked', 'video.youtube_views',
            'sub_category.subcat_name', 'video_map_movie.movie_id',
            'video.subcat_id', 'video.video_desc', 'video_url.final_url', 'video.is_deleted');

        $start_date = $this->input->post('columns')[3]['search']['value'];
        $end_date = $this->input->post('columns')[4]['search']['value'];
        $month = $this->input->post('columns')[1]['search']['value'];
        $search_keyword = $this->input->post('columns')[2]['search']['value'];
        $year = $this->input->post('columns')[0]['search']['value'];

        $channel_id = $this->input->post('channel_id');
        $music_director = $this->input->post('music_director');
        $director_id = $this->input->post('director_id');
        $singer_id = $this->input->post('singer_id');
        $cast_id = $this->input->post('cast_id');
        $movie_id = $this->input->post('movie_id');
        $personality_id = $this->input->post('personality_id');
        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = $columns[$this->input->post('order')[0]['column']];
        $dir = $this->input->post('order')[0]['dir'];

        $where2 = "";
        $category_id = 2;

        if (!empty($start_date) && !empty($end_date)) {
            $where2.=" AND DATE(video.rel_date) BETWEEN '" . $start_date . "' AND '" . $end_date . "'";
        }
        if (!empty($year)) {
            $where2.=" AND YEAR(video.rel_date) = " . $year;
        }

        if (!empty($month)) {
            $where2.=" AND MONTH(video.rel_date) = " . $month;
        }

        if (!empty($channel_id)) {
            $left = "LEFT JOIN video_map_relby ON video_map_relby.video_id=video.id";
            $left.=" LEFT JOIN video_map_movie ON video_map_movie.video_id=video.id";
            $AND = "AND video_map_relby.rel_by_id=" . $channel_id;
        }

        if (!empty($music_director)) {
            $left = "LEFT JOIN video_map_music ON video_map_music.video_id=video.id";
            $left.=" LEFT JOIN video_map_movie ON video_map_movie.video_id=video.id";
            $AND = "AND video_map_music.music_id=" . $music_director;
        }

        if (!empty($director_id)) {
            $left = "LEFT JOIN video_map_director ON video_map_director.video_id=video.id";
            $left.=" LEFT JOIN video_map_movie ON video_map_movie.video_id=video.id";
            $AND = "AND video_map_director.director_id=" . $director_id;
        }

        if (!empty($singer_id)) {
            $left = "LEFT JOIN video_map_singer ON video_map_singer.video_id=video.id";
            $left.=" LEFT JOIN video_map_movie ON video_map_movie.video_id=video.id";
            $AND = "AND video_map_singer.singer_id=" . $singer_id;
        }

        if (!empty($cast_id)) {
            $left = "LEFT JOIN video_map_cast ON video_map_cast.video_id=video.id";
            $left.=" LEFT JOIN video_map_movie ON video_map_movie.video_id=video.id";
            $AND = "AND video_map_cast.cast_id=" . $cast_id;
        }
        
        if(!empty($personality_id)) {
            $left=" LEFT JOIN video_map_movie ON video_map_movie.video_id=video.id";
            $AND = "AND ("
                    . "(select count(video_map_cast.video_id) from video_map_cast where video_map_cast.video_id=video.id and video_map_cast.personality_id = ".$personality_id.") > 0 OR "
                    . "(select count(video_map_singer.video_id) from video_map_singer where video_map_singer.video_id=video.id and video_map_singer.personality_id = ".$personality_id.") > 0 OR "
                    . "(select count(video_map_director.video_id) from video_map_director where video_map_director.video_id=video.id and video_map_director.personality_id = ".$personality_id.") > 0 OR "
                    . "(select count(video_map_music.video_id) from video_map_music where video_map_music.video_id=video.id and video_map_music.personality_id = ".$personality_id.") > 0"
                    . ")";
        }
        
        if (!empty($movie_id)) {
            $left = "LEFT JOIN video_map_movie ON video_map_movie.video_id=video.id";
            $AND = "AND video_map_movie.movie_id=" . $movie_id;
        }


        $totalData = $this->My_model->getresult("select count(video.id) as tot from video
               $left
               where video.cat_id=" . $category_id . " $AND ");

        $totalFiltered = $totalData[0]['tot'];

        if (empty($this->input->post('search')['value']) && empty($year) && empty($month) && empty($search_keyword) && empty($start_date) && empty($end_date)) {

            $posts = $this->My_model->getresult("

               SELECT " . implode(',', $columns) . " FROM video
               LEFT JOIN sub_category ON sub_category.id=video.subcat_id
               LEFT JOIN video_url ON video_url.id=video.seo_url_id
               $left
               LEFT JOIN movie ON movie.id=video_map_movie.movie_id
               where video.cat_id=" . $category_id . " 
               $AND
               ORDER BY $order $dir
               LIMIT $start,$limit

            ");
        } else {
            $search = $this->input->post('search')['value'];

            if (!empty($search_keyword)) {
                $search = $search_keyword;
            }

            $where = "where video.cat_id=" . $category_id . " $AND  AND ";
            $where.=" ( " . implode(" LIKE '%" . $search . "%' OR ", $columns) . " LIKE '%" . $search . "%' )";

            $where.=$where2;

            $posts = $this->My_model->getresult("

               SELECT " . implode(',', $columns) . " FROM video
               LEFT JOIN sub_category ON sub_category.id=video.subcat_id
               LEFT JOIN video_url ON video_url.id=video.seo_url_id
               $left
               LEFT JOIN movie ON movie.id=video_map_movie.movie_id
               $where
               ORDER BY $order $dir
               LIMIT $start,$limit

            ");



            $totalData = $this->My_model->getresult("select count(video.id) as tot from video
               LEFT JOIN sub_category ON sub_category.id=video.subcat_id
               LEFT JOIN video_url ON video_url.id=video.seo_url_id
               $left
               LEFT JOIN movie ON movie.id=video_map_movie.movie_id
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
                        $playlist_html .= '<li style="cursor:pointer;" onclick="playlistli(this);return false;"><input type="checkbox" ' . $link . '> <span>' . html_escape($play_list_value['name']) . '</span></li>';
                    }
                    $playlist_html .= '</ul>';
                }
                $action .= '<a class="icon-playlist" style="cursor:pointer;" data-container="body" data-toggle="popover" data-placement="top" data-html="true" data-content=\'<div class="list">' . $playlist_html . '</div><hr/><div><input type="text" class="newplaylist" name="playlist_name" onblur="create_playlist(this);return false;" id="' . $post['id'] . '"></div>\' ></a>';
                if ($post['is_deleted'] == "0") {
                    $action.="<a href='" . base_url() . "backend/video/edit?id=" . $post['id'] . "' class='icon-edit'></a>";
                    $action.="<a target=\"_blank\" href=\"" . $post['final_url'] . "\" class=\"icon-view\"></a>";
                    $action.= " <a onclick=\"return confirm('Are You Sure You Want To Delete?')\"  href='" . base_url() . "backend/video/status?id=" . $post['id'] . "' class='icon-delete'></a>";
                } else {
                    $action.= " <a onclick=\"return confirm('Are You Sure You Want To Reactive?')\"  href='" . base_url() . "backend/video/status?id=" . $post['id'] . "' class='icon-restore'></a>";
                    $action.="<a target=\"_blank\" href=\"" . $post['final_url'] . "\" class=\"icon-view\"></a>";
                    $action.= " <a onclick=\"return confirm('Are You Sure You Want To Delete?')\"  href='" . base_url() . "backend/video/delete?id=" . $post['id'] . "' class='icon-delete'></a>";
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
                $nestedData["video_name"] = "<a href='" . base_url() . "backend/video/edit?id=" . $post['id'] . "'>" . $post['video_name'] . "</a>";
                $nestedData["movie_name"] = "<a href='" . base_url() . "backend/movie/edit?id=" . $post['movie_id'] . "'>" . $post['movie_name'] . "</a>";
                $nestedData["play"] = $post['play'];
                $nestedData["like"] = $post['liked'];
                $nestedData["youtube_views"] = $post['youtube_views'];
                $nestedData["category_name"] = "<a href='javascript:void(0);' id='cat_" . $post['subcat_id'] . "'>" . $post['subcat_name'] . "</a>";
                $nestedData["created"] = date("d M Y, h:i A", strtotime($post['rel_date']));
                $nestedData["action"] = $action;
                $nestedData["cast"] = rtrim($cast, ",");
                $nestedData["music"] = rtrim($music, ",");
                $nestedData["singer"] = rtrim($singer, ",");
                $nestedData["director"] = rtrim($director, ",");
                $nestedData["rel_by"] = rtrim($rel_by, ",");
                $nestedData["description"] = $post['video_desc'];
                 $nestedData["video_thumb"] = '<img src="'.BASE_URL().'images/videothumb/'.$post['video_thumb'].'" height = "30px"> ' ;

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

    public function trailer_list() {
        $columns = array("video.id", 'video.rel_date', 'video.video_name','video.video_thumb',
            'movie.movie_name', 'video.play', 'video.liked', 'video.youtube_views',
            'sub_category.subcat_name', 'video_map_movie.movie_id',
            'video.subcat_id', 'video.video_desc', 'video_url.final_url', 'video.is_deleted');

        $start_date = $this->input->post('columns')[3]['search']['value'];
        $end_date = $this->input->post('columns')[4]['search']['value'];
        $month = $this->input->post('columns')[1]['search']['value'];
        $search_keyword = $this->input->post('columns')[2]['search']['value'];
        $year = $this->input->post('columns')[0]['search']['value'];

        $channel_id = $this->input->post('channel_id');
        $music_director = $this->input->post('music_director');
        $director_id = $this->input->post('director_id');
        $singer_id = $this->input->post('singer_id');
        $cast_id = $this->input->post('cast_id');
        $movie_id = $this->input->post('movie_id');
        $personality_id = $this->input->post('personality_id');
        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = $columns[$this->input->post('order')[0]['column']];
        $dir = $this->input->post('order')[0]['dir'];


        $where2 = "";
        $category_id = 1;

        if (!empty($start_date) && !empty($end_date)) {
            $where2.=" AND DATE(video.rel_date) BETWEEN '" . $start_date . "' AND '" . $end_date . "'";
        }
        if (!empty($year)) {
            $where2.=" AND YEAR(video.rel_date) = " . $year;
        }

        if (!empty($month)) {
            $where2.=" AND MONTH(video.rel_date) = " . $month;
        }

        if (!empty($channel_id)) {
            $left = "LEFT JOIN video_map_relby ON video_map_relby.video_id=video.id";
            $left.=" LEFT JOIN video_map_movie ON video_map_movie.video_id=video.id";
            $AND = "AND video_map_relby.rel_by_id=" . $channel_id;
        }

        if (!empty($music_director)) {
            $left = "LEFT JOIN video_map_music ON video_map_music.video_id=video.id";
            $left.=" LEFT JOIN video_map_movie ON video_map_movie.video_id=video.id";
            $AND = "AND video_map_music.music_id=" . $music_director;
        }

        if (!empty($director_id)) {
            $left = "LEFT JOIN video_map_director ON video_map_director.video_id=video.id";
            $left.=" LEFT JOIN video_map_movie ON video_map_movie.video_id=video.id";
            $AND = "AND video_map_director.director_id=" . $director_id;
        }

        if (!empty($singer_id)) {
            $left = "LEFT JOIN video_map_singer ON video_map_singer.video_id=video.id";
            $left.=" LEFT JOIN video_map_movie ON video_map_movie.video_id=video.id";
            $AND = "AND video_map_singer.singer_id=" . $singer_id;
        }

        if (!empty($cast_id)) {
            $left = "LEFT JOIN video_map_cast ON video_map_cast.video_id=video.id";
            $left.=" LEFT JOIN video_map_movie ON video_map_movie.video_id=video.id";
            $AND = "AND video_map_cast.cast_id=" . $cast_id;
        }

        if(!empty($personality_id)) {
            $left=" LEFT JOIN video_map_movie ON video_map_movie.video_id=video.id";
            $AND = "AND ("
                    . "(select count(video_map_cast.video_id) from video_map_cast where video_map_cast.video_id=video.id and video_map_cast.personality_id = ".$personality_id.") > 0 OR "
                    . "(select count(video_map_singer.video_id) from video_map_singer where video_map_singer.video_id=video.id and video_map_singer.personality_id = ".$personality_id.") > 0 OR "
                    . "(select count(video_map_director.video_id) from video_map_director where video_map_director.video_id=video.id and video_map_director.personality_id = ".$personality_id.") > 0 OR "
                    . "(select count(video_map_music.video_id) from video_map_music where video_map_music.video_id=video.id and video_map_music.personality_id = ".$personality_id.") > 0"
                    . ")";
        }
        
        if (!empty($movie_id)) {
            $left = "LEFT JOIN video_map_movie ON video_map_movie.video_id=video.id";
            $AND = "AND video_map_movie.movie_id=" . $movie_id;
        }


        $totalData = $this->My_model->getresult("select count(video.id) as tot from video
               $left
               where video.cat_id=" . $category_id . " $AND ");

        $totalFiltered = $totalData[0]['tot'];

        if (empty($this->input->post('search')['value']) && empty($year) && empty($month) && empty($search_keyword) && empty($start_date) && empty($end_date)) {
            $posts = $this->My_model->getresult("

               SELECT " . implode(',', $columns) . " FROM video
               LEFT JOIN sub_category ON sub_category.id=video.subcat_id
               LEFT JOIN video_url ON video_url.id=video.seo_url_id
               $left
               LEFT JOIN movie ON movie.id=video_map_movie.movie_id
               where video.cat_id=" . $category_id . " 
               $AND
               ORDER BY $order $dir
               LIMIT $start,$limit

            ");
        } else {
            $search = $this->input->post('search')['value'];

            if (!empty($search_keyword)) {
                $search = $search_keyword;
            }

            $where = "where video.cat_id=" . $category_id . " $AND  AND ";
            $where.=" ( " . implode(" LIKE '%" . $search . "%' OR ", $columns) . " LIKE '%" . $search . "%' )";

            $where.=$where2;

            $posts = $this->My_model->getresult("

               SELECT " . implode(',', $columns) . " FROM video
               LEFT JOIN sub_category ON sub_category.id=video.subcat_id
               LEFT JOIN video_url ON video_url.id=video.seo_url_id
               $left
               LEFT JOIN movie ON movie.id=video_map_movie.movie_id
               $where
               ORDER BY $order $dir
               LIMIT $start,$limit

            ");



            $totalData = $this->My_model->getresult("select count(video.id) as tot from video
               LEFT JOIN sub_category ON sub_category.id=video.subcat_id
               LEFT JOIN video_url ON video_url.id=video.seo_url_id
               $left
               LEFT JOIN movie ON movie.id=video_map_movie.movie_id
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
                        $playlist_html .= '<li style="cursor:pointer;" onclick="playlistli(this);return false;"><input type="checkbox" ' . $link . '> <span>' . html_escape($play_list_value['name']) . '</span></li>';
                    }
                    $playlist_html .= '</ul>';
                }
                $action .= '<a class="icon-playlist" style="cursor:pointer;" data-container="body" data-toggle="popover" data-placement="top" data-html="true" data-content=\'<div class="list">' . $playlist_html . '</div><hr/><div><input type="text" class="newplaylist" name="playlist_name" onblur="create_playlist(this);return false;" id="' . $post['id'] . '"></div>\' ></a>';
                if ($post['is_deleted'] == "0") {
                    $action.="<a href='" . base_url() . "backend/video/edit?id=" . $post['id'] . "' class='icon-edit'></a>";
                    $action.="<a target=\"_blank\" href=\"" . $post['final_url'] . "\" class=\"icon-view\"></a>";
                    $action.= " <a onclick=\"return confirm('Are You Sure You Want To Delete?')\"  href='" . base_url() . "backend/video/status?id=" . $post['id'] . "' class='icon-delete'></a>";
                } else {
                    $action.= " <a onclick=\"return confirm('Are You Sure You Want To Reactive?')\"  href='" . base_url() . "backend/video/status?id=" . $post['id'] . "' class='icon-restore'></a>";
                    $action.="<a target=\"_blank\" href=\"" . $post['final_url'] . "\" class=\"icon-view\"></a>";
                    $action.= " <a onclick=\"return confirm('Are You Sure You Want To Delete?')\"  href='" . base_url() . "backend/video/delete?id=" . $post['id'] . "' class='icon-delete'></a>";
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
                $nestedData["video_name"] = "<a href='" . base_url() . "backend/video/edit?id=" . $post['id'] . "'>" . $post['video_name'] . "</a>";
                $nestedData["movie_name"] = "<a href='" . base_url() . "backend/movie/edit?id=" . $post['movie_id'] . "'>" . $post['movie_name'] . "</a>";
                $nestedData["play"] = $post['play'];
                $nestedData["like"] = $post['liked'];
                $nestedData["youtube_views"] = $post['youtube_views'];
                $nestedData["category_name"] = "<a href='javascript:void(0);' id='cat_" . $post['subcat_id'] . "'>" . $post['subcat_name'] . "</a>";
                $nestedData["created"] = date("d M Y, h:i A", strtotime($post['rel_date']));
                $nestedData["action"] = $action;
                $nestedData["cast"] = rtrim($cast, ",");
                $nestedData["music"] = rtrim($music, ",");
                $nestedData["singer"] = rtrim($singer, ",");
                $nestedData["director"] = rtrim($director, ",");
                $nestedData["rel_by"] = rtrim($rel_by, ",");
                $nestedData["description"] = $post['video_desc'];
                $nestedData["video_thumb"] = '<img src="'.BASE_URL().'images/videothumb/'.$post['video_thumb'].'" height = "30px"> ' ;

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

    public function movie_list() {
        $columns = array("movie.id", 'movie.my_release', 'movie.rel_date', 'movie.movie_name',
            'movie.movie_img', 'sub_category.subcat_name', 'movie.subcat_id', 'video_url.final_url', 'status');

        $start_date = $this->input->post('columns')[3]['search']['value'];
        $end_date = $this->input->post('columns')[4]['search']['value'];
        $month = $this->input->post('columns')[1]['search']['value'];
        $search_keyword = $this->input->post('columns')[2]['search']['value'];
        $year = $this->input->post('columns')[0]['search']['value'];

        $channel_id = $this->input->post('channel_id');
        $music_director = $this->input->post('music_director');
        $director_id = $this->input->post('director_id');
        $singer_id = $this->input->post('singer_id');
        $cast_id = $this->input->post('cast_id');
        $movie_id = $this->input->post('movie_id');
        $personality_id = $this->input->post('personality_id');

        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = $columns[$this->input->post('order')[0]['column']];
        $dir = $this->input->post('order')[0]['dir'];


        $where2 = "";
        $category_id = 1;


        if (!empty($start_date) && !empty($end_date)) {
            $where2.=" AND DATE(movie.my_release) BETWEEN '" . $start_date . "' AND '" . $end_date . "'";
        }
        if (!empty($year)) {
            $where2.=" AND YEAR(movie.my_release) = " . $year;
        }

        if (!empty($month)) {
            $where2.=" AND MONTH(movie.my_release) = " . $month;
        }

        if (!empty($music_director)) {
            $left = "LEFT JOIN movie_map_music ON movie_map_music.movie_id=movie.id";
            $AND = "AND movie_map_music.music_id=" . $music_director;
        }

        if (!empty($director_id)) {
            $left = "LEFT JOIN movie_map_director ON movie_map_director.movie_id=movie    .id";
            $AND = "AND movie_map_director.director_id=" . $director_id;
        }

        if (!empty($singer_id)) {
            $left = " LEFT JOIN movie_map_singer ON movie_map_singer.movie_id=movie.id";
            $AND = "AND movie_map_singer.singer_id=" . $singer_id;
        }

        if (!empty($cast_id)) {
            $left = " LEFT JOIN movie_map_cast ON movie_map_cast.movie_id=movie.id";
            $AND = "AND movie_map_cast.cast_id=" . $cast_id;
        }

        if(!empty($personality_id)) {
            $AND = "AND ("
                    . "(select count(movie_map_cast.movie_id) from movie_map_cast where movie_map_cast.movie_id=movie.id and movie_map_cast.personality_id = ".$personality_id.") > 0 OR "
                    . "(select count(movie_map_singer.movie_id) from movie_map_singer where movie_map_singer.movie_id=movie.id and movie_map_singer.personality_id = ".$personality_id.") > 0 OR "
                    . "(select count(movie_map_director.movie_id) from movie_map_director where movie_map_director.movie_id=movie.id and movie_map_director.personality_id = ".$personality_id.") > 0 OR "
                    . "(select count(movie_map_music.movie_id) from movie_map_music where movie_map_music.movie_id=movie.id and movie_map_music.personality_id = ".$personality_id.") > 0"
                    . ")";
        }

        $totalData = $this->My_model->getresult("select count(movie.id) as tot from movie
               $left
               where 1 $AND ");

        $totalFiltered = $totalData[0]['tot'];

        if (empty($this->input->post('search')['value']) && empty($year) && empty($month) && empty($search_keyword) && empty($start_date) && empty($end_date)) {
            $posts = $this->My_model->getresult("

               SELECT DISTINCT " . implode(',', $columns) . " FROM movie
               LEFT JOIN sub_category ON sub_category.id=movie.subcat_id
               LEFT JOIN video_url ON video_url.id=movie.seo_url_id
               $left
               where 1
               $AND
               ORDER BY $order $dir
               LIMIT $start,$limit

            ");
        } else {
            $search = $this->input->post('search')['value'];

            if (!empty($search_keyword)) {
                $search = $search_keyword;
            }

            $where = "where 1 $AND  AND ";
            $where.=" ( " . implode(" LIKE '%" . $search . "%' OR ", $columns) . " LIKE '%" . $search . "%' )";

            $where.=$where2;

            $posts = $this->My_model->getresult("

               SELECT " . implode(',', $columns) . " FROM movie
               LEFT JOIN sub_category ON sub_category.id=movie.subcat_id
               LEFT JOIN video_url ON video_url.id=movie.seo_url_id
               $left
               $where
               ORDER BY $order $dir
               LIMIT $start,$limit

            ");

            $totalData = $this->My_model->getresult("select count(movie.id) as tot from movie
               LEFT JOIN sub_category ON sub_category.id=movie.subcat_id
               LEFT JOIN video_url ON video_url.id=movie.seo_url_id
               $left
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
                if ($post['status'] == "0") {
                    $action.="<a href='" . base_url() . "backend/movie/edit?id=" . $post['id'] . "' class='icon-edit'></a>";
                    $action.="<a target=\"_blank\" href=\"" . $post['final_url'] . "\" class=\"icon-view\"></a>";
                    $action.= " <a onclick=\"return confirm('Are You Sure You Want To Delete?')\"  href='" . base_url() . "backend/movie/status?id=" . $post['id'] . "' class='icon-delete'></a>";
                } else {
                    $action.= " <a onclick=\"return confirm('Are You Sure You Want To Reactive?')\"  href='" . base_url() . "backend/movie/status?id=" . $post['id'] . "' class='icon-restore'></a>";
                    $action.="<a target=\"_blank\" href=\"" . $post['final_url'] . "\" class=\"icon-view\"></a>";
                    $action.= " <a onclick=\"return confirm('Are You Sure You Want To Delete?')\"  href='" . base_url() . "backend/movie/delete?id=" . $post['id'] . "' class='icon-delete'></a>";
                }


                if (!empty($post['movie_img']) && file_exists('./images/movies/' . $post['movie_img'])) {
                    $img = base_url() . 'images/movies/' . $post['movie_img'];
                } else {
                    $img = base_url() . 'images/no-image.svg';
                }

                $img = '<img id="videoimg" src="' . $img . '" alt="' . $post['movie_name'] . '" height="30" width="30">';


                $nestedData["number"] = $number;
                $nestedData["img"] = $img;
                $nestedData["movie_name"] = "<a href='" . base_url() . "backend/movie/edit?id=" . $post['id'] . "'>" . $post['movie_name'] . "</a>";
                $nestedData["category_name"] = "<a href='javascript:void(0);' id='cat_" . $post['subcat_id'] . "'>" . $post['subcat_name'] . "</a>";
                $nestedData["release_date"] = (date("d M Y", strtotime($post['my_release'])) != "01 Jan 1970" &&
                        date("d M Y", strtotime($post['my_release'])) != "30 Nov -0001") ?
                        date("d M Y", strtotime($post['my_release'])) : "";
                $nestedData["date"] = (date("d M Y", strtotime($post['rel_date'])) != "01 Jan 1970" && date("d M Y", strtotime($post['rel_date'])) != "30 Nov -0001") ?
                        date("d M Y, h:i:s A", strtotime($post['rel_date'])) : "";
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

    public function poster_list() {
        $columns = array("poster.id", 'poster.rel_date', 'poster.poster_name',
            'movie.movie_name', 'poster.likes', 'poster.views',
            'sub_category.subcat_name', 'poster_map_movie.movie_id',
            'poster.subcat_id', 'poster.poster_desc', 'video_url.final_url', 'poster.is_deleted');

        $AND = $left = "";

        $cast_id = $this->input->post("cast_id");
        $director_id = $this->input->post("director_id");
        $personality_id = $this->input->post('personality_id');
        $movie_id = $this->input->post("movie_id");

        $start_date = $this->input->post('columns')[3]['search']['value'];
        $end_date = $this->input->post('columns')[4]['search']['value'];
        $month = $this->input->post('columns')[1]['search']['value'];
        $search_keyword = $this->input->post('columns')[2]['search']['value'];
        $year = $this->input->post('columns')[0]['search']['value'];

        if (!empty($director_id)) {
            $left = "LEFT JOIN poster_map_director ON poster_map_director.poster_id=poster.id";
            $AND = " AND poster_map_director.director_id=" . $director_id;
        }

        if (!empty($cast_id)) {
            $left = "LEFT JOIN poster_map_cast ON poster_map_cast.poster_id=poster.id";
            $AND = " AND poster_map_cast.cast_id=" . $cast_id;
        }
        
        if(!empty($personality_id)) {
            $AND = "AND ("
                    . "(select count(poster_map_cast.poster_id) from poster_map_cast where poster_map_cast.poster_id=poster.id and poster_map_cast.personality_id = ".$personality_id.") > 0 OR "                    
                    . "(select count(poster_map_director.poster_id) from poster_map_director where poster_map_director.poster_id=poster.id and poster_map_director.personality_id = ".$personality_id.") > 0"
                    . ")";
        }

        if (!empty($movie_id)) {
            $AND = " AND poster_map_movie.movie_id=" . $movie_id;
        }


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
            $where2.=" AND DATE(poster.rel_date) BETWEEN '" . $start_date . "' AND '" . $end_date . "'";
        }
        if (!empty($year)) {
            $where2.=" AND YEAR(poster.rel_date) = " . $year;
        }

        if (!empty($month)) {
            $where2.=" AND MONTH(poster.rel_date) = " . $month;
        }

        $totalData = $this->My_model->getresult("select count(poster.id) as tot from poster
        LEFT JOIN poster_map_movie ON poster_map_movie.poster_id=poster.id
        $left
        where 1 $AND
        ");
        $totalFiltered = $totalData[0]['tot'];

        if (empty($this->input->post('search')['value']) && empty($year) && empty($month) && empty($search_keyword) && empty($start_date) && empty($end_date)) {
            $posts = $this->My_model->getresult("

               SELECT " . implode(',', $columns) . " FROM poster
               LEFT JOIN sub_category ON sub_category.id=poster.subcat_id
               LEFT JOIN poster_map_movie ON poster_map_movie.poster_id=poster.id 
               LEFT JOIN movie ON movie.id=poster_map_movie.movie_id
               LEFT JOIN video_url ON video_url.id=poster.seo_url_id
               $left
               where 1 $AND
               ORDER BY $order $dir
               LIMIT $start,$limit

            ");
        } else {
            $search = $this->input->post('search')['value'];

            if (!empty($search_keyword)) {
                $search = $search_keyword;
            }

            $where = "where 1 $AND AND ";
            $where.=" ( " . implode(" LIKE '%" . $search . "%' OR ", $columns) . " LIKE '%" . $search . "%' )";

            $where.=$where2;

            $posts = $this->My_model->getresult("

               SELECT " . implode(',', $columns) . " FROM poster
               LEFT JOIN sub_category ON sub_category.id=poster.subcat_id
               LEFT JOIN poster_map_movie ON poster_map_movie.poster_id=poster.id
               LEFT JOIN movie ON movie.id=poster_map_movie.movie_id 
               LEFT JOIN video_url ON video_url.id=poster.seo_url_id
               $left
               $where
               ORDER BY $order $dir
               LIMIT $start,$limit

            ");

            $totalData = $this->My_model->getresult("select count(poster.id) as tot from poster
               LEFT JOIN sub_category ON sub_category.id=poster.subcat_id
               LEFT JOIN poster_map_movie ON poster_map_movie.poster_id=poster.id
               LEFT JOIN movie ON movie.id=poster_map_movie.movie_id
               LEFT JOIN video_url ON video_url.id=poster.seo_url_id
               $left
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
                if ($post['is_deleted'] == "0") {
                    $action.="<a href='" . base_url() . "backend/poster/edit?id=" . $post['id'] . "' class='icon-edit'></a>";
                    $action.="<a target=\"_blank\" href=\"" . $post['final_url'] . "\" class=\"icon-view\"></a>";
                    $action.= " <a onclick=\"return confirm('Are You Sure You Want To Delete?')\"  href='" . base_url() . "backend/poster/status?id=" . $post['id'] . "' class='icon-delete'></a>";
                } else {
                    $action.= " <a onclick=\"return confirm('Are You Sure You Want To Reactive?')\"  href='" . base_url() . "backend/poster/status?id=" . $post['id'] . "' class='icon-restore'></a>";
                    $action.="<a target=\"_blank\" href=\"" . $post['final_url'] . "\" class=\"icon-view\"></a>";
                    $action.= " <a onclick=\"return confirm('Are You Sure You Want To Delete?')\"  href='" . base_url() . "backend/poster/delete?id=" . $post['id'] . "' class='icon-delete'></a>";
                }


                $cast_list = $this->My_model->getresult("select personality.personality_name as name,personality.id from poster_map_cast LEFT JOIN personality ON personality.id=poster_map_cast.personality_id where poster_id=" . $id);
                $director_list = $this->My_model->getresult("select personality.personality_name as name,personality.id from poster_map_director LEFT JOIN personality ON personality.id=poster_map_director.personality_id where poster_id=" . $id);

                $cast = "";
                foreach ($cast_list as $row) {
                    $cast.=" <a href='" . base_url() . "backend/personality/edit?id=" . $row['id'] . "'>" . $row['name'] . "</a>,";
                }

                $director = "";
                foreach ($director_list as $row) {
                    $director.=" <a href='" . base_url() . "backend/personality/edit?id=" . $row['id'] . "'>" . $row['name'] . "</a>,";
                }

                $nestedData["number"] = $number;
                $nestedData["poster_name"] = "<a href='" . base_url() . "backend/poster/edit?id=" . $post['id'] . "'>" . $post['poster_name'] . "</a>";
                $nestedData["movie_name"] = "<a href='" . base_url() . "backend/movie/edit?id=" . $post['movie_id'] . "'>" . $post['movie_name'] . "</a>";
                $nestedData["views"] = $post['views'];
                $nestedData["views"] = $post['views'];
                $nestedData["likes"] = $post['likes'];
                $nestedData["category_name"] = "<a href='javascript:void(0);' id='cat_" . $post['subcat_id'] . "'>" . $post['subcat_name'] . "</a>";
                $nestedData["created"] = date("d M Y, h:i:s A", strtotime($post['rel_date']));
                $nestedData["action"] = $action;
                $nestedData["cast"] = rtrim($cast, ",");
                $nestedData["director"] = rtrim($director, ",");
                $nestedData["description"] = $post['poster_desc'];
            
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

}
