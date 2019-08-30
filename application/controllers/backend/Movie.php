<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Movie extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->data['search_year'] = $this->My_model->getresult("select YEAR(movie.rel_date) as year from movie  group by YEAR(movie.rel_date) ORDER BY YEAR(movie.rel_date) DESC ");
        $this->data['category'] = $this->My_model->getall("sub_category");
        $this->data['view_name'] = "movie_tb_view.php";
        $this->data['message'] = $this->session->flashdata('message');
        $this->load->view('backend/layout', $this->data);
    }

    public function add() {
        $this->data['category'] = $this->My_model->getall("sub_category");
        $this->data['view_name'] = "movie_view.php";
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


        $this->My_model->updatedata("movie_seo", $data, array("sub_category_id" => $this->input->post("sub_category_id")));

        $this->session->set_flashdata("message", "success_SEO Content Save Successfully.");
        redirect("backend/movie");
    }

    public function edit() {
        $id = $this->input->get("id");
        $edit_data = $this->My_model->getbyid("movie", array("id" => $id));
        $url = $this->My_model->getbyid("video_url", array("id" => $edit_data[0]["seo_url_id"]));
        $edit_data[0]["final_url"] = $url[0]['final_url'];
        $this->data['edit_data'] = $edit_data[0];

        $this->data['cast_list'] = $this->My_model->getresult("select personality.personality_name as name,movie_map_cast.id from movie_map_cast LEFT JOIN personality ON personality.id=movie_map_cast.personality_id where movie_id=" . $id);
        $this->data['director_list'] = $this->My_model->getresult("select personality.personality_name as name,movie_map_director.id from movie_map_director LEFT JOIN personality ON personality.id=movie_map_director.personality_id where movie_id=" . $id);
        $this->data['music_list'] = $this->My_model->getresult("select personality.personality_name as name,movie_map_music.id from movie_map_music LEFT JOIN personality ON personality.id=movie_map_music.personality_id where movie_id=" . $id);
        $this->data['singer_list'] = $this->My_model->getresult("select personality.personality_name as name,movie_map_singer.id from movie_map_singer LEFT JOIN personality ON personality.id=movie_map_singer.personality_id where movie_id=" . $id);

        $this->data['category'] = $this->My_model->getall("sub_category");
        $this->data['view_name'] = "movie_view.php";
        $this->data['message'] = $this->session->flashdata('message');
        $this->load->view('backend/layout', $this->data);
    }

    public function save() {

        $movie_name = trim($this->input->post("movie_name"));
        $movie_name = trim(preg_replace('/\s\s+/', ' ', str_replace("\n", " ", $movie_name)));
        $movie_title = $this->input->post("movie_title");
        $fb_link = $this->input->post("fb_link");
        $insta_link = $this->input->post("insta_link");
        $twit_link = $this->input->post("twit_link");
        $full_movie = $this->input->post("full_movie");
        $movie_desc = $this->input->post("movie_desc");
        $movie_keywords = $this->input->post("movie_keywords");
        $check = count(explode(" ", $this->input->post("rel_date")));
        if ($check > 1)
            $rel_date = date("Y-m-d H:i:s", strtotime($this->input->post("rel_date")));
        else
            $rel_date = date("Y-m-d H:i:s", strtotime($this->input->post("rel_date") . date("H:i:s")));
        $my_release = date("Y-m-d", strtotime($this->input->post("my_release")));
        $category_id = implode(",", $this->input->post("category_id"));
        $cast = $this->input->post("cast");
        $singers = $this->input->post("singers");
        $music = $this->input->post("music");
        $director = $this->input->post("director");

        $data = array(
            "movie_name" => $movie_name,
            "movie_title" => $movie_title,
            "movie_desc" => $movie_desc,
            "movie_keywords" => $movie_keywords,
            "rel_date" => $rel_date,
            "my_release" => $my_release,
            "subcat_id" => $category_id,
            "created" => date("Y-m-d H:i:s"),
            "fb_link" => $fb_link,
            "insta_link" => $insta_link,
            "twit_link" => $twit_link,
            "full_movie" => $full_movie
        );

        $check = $this->My_model->getbyid("movie", array("movie_name" => $movie_name));
        if (empty($check)) {

            $new_name = "500-" . str_replace(" ", "-", $movie_name);

            $config = array(
                'upload_path' => "./images/movies/",
                'allowed_types' => "gif|jpg|png|jpeg"
            );
            $config['file_name'] = str_replace([".", "@", "$", '%','+'], "", $new_name);
            $this->upload->initialize($config);

            if ($this->upload->do_upload("user_file")) {
                $updata = array('upload_data' => $this->upload->data());
                $data['movie_img'] = $updata['upload_data']['file_name'];
                $this->image_resize("./images/movies/" . $updata['upload_data']['file_name'], "movie", 500, 1);
            }


            $movie_id = $this->My_model->insertdata($data, "movie");

            $seo_url_id = $this->WebService->setSEOURLMovie($category_id, $movie_id, $movie_name, "movie", "add");

            $this->My_model->updatedata("movie", array("seo_url_id" => $seo_url_id), array("id" => $movie_id));

            // cast mapping for movie if new cast then inserting it and then mapping
            if (!empty($cast)) {
                foreach ($cast as $cast_id) {
                    if (is_numeric($cast_id)) {
                        $this->My_model->insertdata(array("movie_id" => $movie_id, "personality_id" => $cast_id), "movie_map_cast");
                        $this->My_model->updatedata("personality", array("is_cast" => 1), array("id" => $cast_id));
                    } else {
                        $cast_id = $this->save_new_personality($cast_id,'cast');
                        if (is_numeric($cast_id)) {
                            $check = $this->My_model->getbyid("movie_map_cast", array("movie_id" => $movie_id, "personality_id" => $cast_id));
                            if (empty($check)) {
                                $this->My_model->insertdata(array("movie_id" => $movie_id, "personality_id" => $cast_id), "movie_map_cast");
                            }
                        }
                    }
                }
            }


            // singer mapping for movie if new cast then inserting it and then mapping
            if (!empty($singers)) {
                foreach ($singers as $singer_id) {
                    if (is_numeric($singer_id)) {
                        $this->My_model->insertdata(array("movie_id" => $movie_id, "personality_id" => $singer_id), "movie_map_singer");
                        $this->My_model->updatedata("personality", array("is_singer" => 1), array("id" => $singer_id));
                    } else {
                        $singer_id = $this->save_new_personality($singer_id,'singer');
                        if (is_numeric($singer_id)) {
                            $check = $this->My_model->getbyid("movie_map_singer", array("movie_id" => $movie_id, "personality_id" => $singer_id));
                            if (empty($check)) {
                                $this->My_model->insertdata(array("movie_id" => $movie_id, "personality_id" => $singer_id), "movie_map_singer");
                            }
                        }
                    }
                }
            }

            // director mapping for movie if new cast then inserting it and then mapping
            if (!empty($director)) {
                foreach ($director as $director_id) {
                    if (is_numeric($director_id)) {
                        $this->My_model->insertdata(array("movie_id" => $movie_id, "personality_id" => $director_id), "movie_map_director");
                        $this->My_model->updatedata("personality", array("is_director" => 1), array("id" => $director_id));
                    } else {                        
                        $director_id = $this->save_new_personality($director_id,'director');
                        if (is_numeric($director_id)) {
                            $check = $this->My_model->getbyid("movie_map_director", array("movie_id" => $movie_id, "personality_id" => $director_id));
                            if (empty($check)) {
                                $this->My_model->insertdata(array("movie_id" => $movie_id, "personality_id" => $director_id), "movie_map_director");
                            }
                        }
                    }
                }
            }

            // music director mapping for movie if new cast then inserting it and then mapping
            if (!empty($music)) {
                foreach ($music as $music_id) {
                    if (is_numeric($music_id)) {
                        $this->My_model->insertdata(array("movie_id" => $movie_id, "personality_id" => $music_id), "movie_map_music");
                        $this->My_model->updatedata("personality", array("is_music_director" => 1), array("id" => $music_id));
                    } else {
                        $music_id = $this->save_new_personality($music_id,'music_director');
                        if (is_numeric($music_id)) {
                            $check = $this->My_model->getbyid("movie_map_music", array("movie_id" => $movie_id, "personality_id" => $music_id));
                            if (empty($check)) {
                                $this->My_model->insertdata(array("movie_id" => $movie_id, "personality_id" => $music_id), "movie_map_music");
                            }
                        }
                    }
                }
            }
            $this->session->set_flashdata("message", "success_Movie Add Successfully.");
            redirect("backend/movie/add");
        } else {
            $this->session->set_flashdata("message", "danger_Movie Name Already Exist.");
            redirect("backend/movie/add");
        }
    }

    public function update() {
        $movie_id = $this->input->post("id");
        $movie_name = trim($this->input->post("movie_name"));
        $movie_name = trim(preg_replace('/\s\s+/', ' ', str_replace("\n", " ", $movie_name)));
        $movie_title = $this->input->post("movie_title");
        $movie_desc = $this->input->post("movie_desc");
        $movie_keywords = $this->input->post("movie_keywords");
        $my_release = $this->input->post("my_release");
        $rel_date = $this->input->post("rel_date");
        $category_id = implode(",", $this->input->post("category_id"));
        $cast = $this->input->post("cast");
        $singers = $this->input->post("singers");
        $music = $this->input->post("music");
        $director = $this->input->post("director");
        $fb_link = $this->input->post("fb_link");
        $insta_link = $this->input->post("insta_link");
        $twit_link = $this->input->post("twit_link");
        $full_movie = $this->input->post("full_movie");

        $data = array(
            "movie_name" => $movie_name,
            "movie_title" => $movie_title,
            "movie_desc" => $movie_desc,
            "movie_keywords" => $movie_keywords,
            "rel_date" => $rel_date,
            "my_release" => $my_release,
            "subcat_id" => $category_id,
            "updated" => date("Y-m-d H:i:s"),
            "fb_link" => $fb_link,
            "insta_link" => $insta_link,
            "twit_link" => $twit_link,
            "full_movie" => $full_movie
        );

        $check = $this->My_model->getresult("select * from movie where movie_name='" . html_escape($movie_name) . "' and id!=" . $movie_id);
        if (empty($check)) {

            $new_name = "500-" . str_replace(" ", "-", html_escape($movie_name));
            $config = array(
                'upload_path' => "./images/movies/",
                'allowed_types' => "gif|jpg|png|jpeg"
            );
            $config['file_name'] = str_replace([".", "@", "$", '%','+'], "", html_escape($new_name));
            $this->upload->initialize($config);

            if (!empty($_FILES['user_file']['name'])) {
                $result = $this->My_model->getbyid("movie", array("id" => $movie_id));
                if (!empty($result[0]['movie_img'])) {
                    @unlink("./images/movies/" . $result[0]['movie_img']);
                }
            }

            if ($this->upload->do_upload("user_file")) {

                $updata = array('upload_data' => $this->upload->data());
                $data['movie_img'] = $updata['upload_data']['file_name'];
                $this->image_resize("./images/movies/" . $updata['upload_data']['file_name'], "movie", 500, 1);
            }


            $seo_url_id = $this->WebService->setSEOURLMovie($category_id, $movie_id, $movie_name, "movie", "edit");

            if ($seo_url_id > 0) {
                $data['seo_url_id'] = $seo_url_id;
            }

            $this->My_model->updatedata("movie", $data, array("id" => $movie_id));


            // cast mapping for movie if new cast then inserting it and then mapping
            if (!empty($cast)) {
                foreach ($cast as $cast_id) {
                    if (is_numeric($cast_id)) {
                        $this->My_model->insertdata(array("movie_id" => $movie_id, "personality_id" => $cast_id), "movie_map_cast");
                        $this->My_model->updatedata("personality", array("is_cast" => 1), array("id" => $cast_id));
                    } else {
                        $cast_id = $this->save_new_personality($cast_id,'cast');
                        if (is_numeric($cast_id)) {
                            $check = $this->My_model->getbyid("movie_map_cast", array("movie_id" => $movie_id, "personality_id" => $cast_id));
                            if (empty($check)) {
                                $this->My_model->insertdata(array("movie_id" => $movie_id, "personality_id" => $cast_id), "movie_map_cast");
                            }
                        }
                    }
                }
            }
            // singer mapping for movie if new cast then inserting it and then mapping
            if (!empty($singers)) {
                foreach ($singers as $singer_id) {
                    if (is_numeric($singer_id)) {
                        $this->My_model->insertdata(array("movie_id" => $movie_id, "personality_id" => $singer_id), "movie_map_singer");
                        $this->My_model->updatedata("personality", array("is_singer" => 1), array("id" => $singer_id));
                    } else {
                        $singer_id = $this->save_new_personality($singer_id,'singer');
                        if (is_numeric($singer_id)) {
                            $check = $this->My_model->getbyid("movie_map_singer", array("movie_id" => $movie_id, "personality_id" => $singer_id));
                            if (empty($check)) {
                                $this->My_model->insertdata(array("movie_id" => $movie_id, "personality_id" => $singer_id), "movie_map_singer");
                            }
                        }
                    }
                }
            }

            // director mapping for movie if new cast then inserting it and then mapping
            if (!empty($director)) {
                foreach ($director as $director_id) {
                    if (is_numeric($director_id)) {
                        $this->My_model->insertdata(array("movie_id" => $movie_id, "personality_id" => $director_id), "movie_map_director");
                        $this->My_model->updatedata("personality", array("is_director" => 1), array("id" => $director_id));
                    } else {
                        $director_id = $this->save_new_personality($director_id,'director');
                        if (is_numeric($director_id)) {
                            $check = $this->My_model->getbyid("movie_map_director", array("movie_id" => $movie_id, "personality_id" => $director_id));
                            if (empty($check)) {
                                $this->My_model->insertdata(array("movie_id" => $movie_id, "personality_id" => $director_id), "movie_map_director");
                            }
                        }
                    }
                }
            }

            // music director mapping for movie if new cast then inserting it and then mapping
            if (!empty($music)) {
                foreach ($music as $music_id) {
                    if (is_numeric($music_id)) {
                        $this->My_model->insertdata(array("movie_id" => $movie_id, "personality_id" => $music_id), "movie_map_music");
                        $this->My_model->updatedata("personality", array("is_music_director" => 1), array("id" => $music_id));
                    } else {
                        $music_id = $this->save_new_personality($music_id,'music_director');
                        if (is_numeric($music_id)) {
                            $check = $this->My_model->getbyid("movie_map_music", array("movie_id" => $movie_id, "personality_id" => $music_id));
                            if (empty($check)) {
                                $this->My_model->insertdata(array("movie_id" => $movie_id, "personality_id" => $music_id), "movie_map_music");
                            }
                        }
                    }
                }
            }
            $this->session->set_flashdata("message", "success_Movie Update Successfully.");
            redirect("backend/movie/edit?id=" . $movie_id);
        } else {
            $this->session->set_flashdata("message", "danger_Movie Name Already Exist.");
            redirect("backend/movie/edit?id=" . $movie_id);
        }
    }

    public function status() {
        $id = $this->input->get('id');
        $result = $this->My_model->getbyid("movie", array("id" => $id));
        if ($result[0]['status'] == "0") {
            $this->My_model->updatedata("movie", array("status" => "1"), array("id" => $id));
            $this->session->set_flashdata("message", "success_Movie Deleted Successfully.");
        } else {
            $this->My_model->updatedata("movie", array("status" => "0"), array("id" => $id));
            $this->session->set_flashdata("message", "success_Movie Reactive Successfully.");
        }
        redirect("backend/movie");
    }

    public function delete() {
        $id = $this->input->get('id');
        $result = $this->My_model->getbyid("movie", array("id" => $id));
        if (!empty($result[0]['movie_img'])) {
            @unlink("./images/movies/" . $result[0]['movie_img']);
        }
        $this->My_model->deletedata("movie", array("id" => $id));
        $this->session->set_flashdata("message", "success_Movie Deleted Successfully.");
        redirect("backend/movie");
    }

    public function movie_list() {
        $columns = array("movie.id", 'movie.my_release', 'movie.rel_date', 'movie.movie_name',
            'movie.movie_img', 'video_url.final_url', 'movie.status', 'sub_category.subcat_name');

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
            $where2.=" AND ( DATE(movie.my_release) BETWEEN '" . $start_date . "' AND '" . $end_date . "' OR DATE(movie.rel_date) BETWEEN '" . $start_date . "' AND '" . $end_date . "') ";
        }
        if (!empty($year)) {
            $where2.=" AND (YEAR(movie.my_release) = " . $year . " OR YEAR(movie.rel_date) = " . $year . ")";
        }

        if (!empty($month)) {
            $where2.=" AND (MONTH(movie.my_release) = " . $month . " OR MONTH(movie.rel_date) = " . $month . ")";
        }
        $is_deleted = 0;
        if (!empty($status)) {
            if ($status == "delete") {
                $is_deleted = 1;
                $sub_category_id = 0;
            } else {

                $catid = explode("_", $status);
                $where2 .= " AND find_in_set('" . $catid[1] . "',movie.subcat_id) <> 0";
                $sub_category_id = $catid[1];
            }
        }

        $seo_data = $this->My_model->getresult("SELECT * from movie_seo WHERE  sub_category_id='" . $sub_category_id . "' LIMIT 0,1");


        $totalData = $this->My_model->getresult("select count(id) as tot from movie where status=0");
        $totalFiltered = $totalData[0]['tot'];

        if (empty($this->input->post('search')['value']) && empty($year) && empty($month) && empty($search_keyword) && empty($status) && empty($start_date) && empty($end_date)) {
            $posts = $this->My_model->getresult("

               SELECT " . implode(',', $columns) . " FROM movie
               LEFT JOIN video_url ON video_url.id=movie.seo_url_id
               LEFT JOIN sub_category ON sub_category.id=movie.subcat_id
               where movie.status=0
               ORDER BY $order $dir
               LIMIT $start,$limit

            ");
        } else {

            $search = trim($this->input->post('search')['value']);
            $search = preg_replace('!\s+!', ' ', $search);

            if (!empty($search_keyword)) {
                $search = $search_keyword;
            }

            $where = "where movie.status=" . $is_deleted . " AND";
            $where.=" ( " . implode(" LIKE '%" . $search . "%' OR ", $columns) . " LIKE '%" . $search . "%' )";

            $where.=$where2;

            $posts = $this->My_model->getresult("

               SELECT " . implode(',', $columns) . " FROM movie
               LEFT JOIN video_url ON video_url.id=movie.seo_url_id
               LEFT JOIN sub_category ON sub_category.id=movie.subcat_id
               $where
               ORDER BY $order $dir
               LIMIT $start,$limit

            ");



            $totalData = $this->My_model->getresult("select count(movie.id) as tot from movie
              LEFT JOIN video_url ON video_url.id=movie.seo_url_id
              LEFT JOIN sub_category ON sub_category.id=movie.subcat_id
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
                $nestedData["movie_name"] = $post['movie_name'];
                $nestedData["category_name"] = $post['subcat_name'];
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
        $output['seo_data'] = $seo_data[0];
        //output to json format
        echo json_encode($output);
    }

    public function remove_map_data() {
        $id = $this->input->get("id");
        $type = $this->input->get("type");

        if ($type == "cast") {
            $result = $this->My_model->getbyid("movie_map_cast", array("id" => $id));
            $this->My_model->deletedata("movie_map_cast", array("id" => $id));
        } else if ($type == "singer") {
            $result = $this->My_model->getbyid("movie_map_singer", array("id" => $id));
            $this->My_model->deletedata("movie_map_singer", array("id" => $id));
        } else if ($type == "director") {
            $result = $this->My_model->getbyid("movie_map_director", array("id" => $id));
            $this->My_model->deletedata("movie_map_director", array("id" => $id));
        } else if ($type == "music") {
            $result = $this->My_model->getbyid("movie_map_music", array("id" => $id));
            $this->My_model->deletedata("movie_map_music", array("id" => $id));
        }

        $this->session->set_flashdata("message", "success_" . ucfirst($type) . " Remove Successfully.");
        redirect("backend/movie/edit?id=" . $result[0]['movie_id']);
    }

    public function movie_autosuggetion() {

        $data = array();
        $keyword = $this->input->get("keyword");
        $keyword = trim($keyword['term']);
        $keyword = preg_replace('!\s+!', ' ', $keyword);
        $result = $this->My_model->getresult("select id,movie_name,movie_img from movie WHERE trim(movie_name) LIKE '%" . $keyword . "%'");

        foreach ($result as $row) {

            if (!empty($row['movie_img']) && file_exists('./images/movies/' . $row['movie_img'])) {
                $img = base_url() . 'images/movies/' . $row['movie_img'];
            } else {
                $img = base_url() . 'images/no-image.svg';
            }

            $img = '<img style="display: inline-block;" id="videoimg" src="' . $img . '" alt="' . $row['movie_name'] . '" height="30" width="30">';


            $data[] = array("id" => $row['id'], "text" =>'<span style="display: inline-block;">'.$row['movie_name'].'</span>', "img" => $img);
        }

        echo json_encode($data);
    }

    public function get_movie_detail() {
        $data = array();
        $id = $this->input->get("movie_id");
        $data['cast_list'] = "";
        $data['director_list'] = "";
        $data['music_list'] = "";
        $data['singer_list'] = "";

        if (is_numeric($id)) {

            $data['cast_list'] = $this->My_model->getresult("select personality.personality_name as text,personality.id from movie_map_cast LEFT JOIN personality ON personality.id=movie_map_cast.personality_id where movie_id=" . $id);
            $data['director_list'] = $this->My_model->getresult("select personality.personality_name as text,personality.id from movie_map_director LEFT JOIN personality ON personality.id=movie_map_director.personality_id where movie_id=" . $id);
            $data['music_list'] = $this->My_model->getresult("select personality.personality_name as text,personality.id from movie_map_music LEFT JOIN personality ON personality.id=movie_map_music.personality_id where movie_id=" . $id);
            $data['singer_list'] = $this->My_model->getresult("select personality.personality_name as text,personality.id from movie_map_singer LEFT JOIN personality ON personality.id=movie_map_singer.personality_id where movie_id=" . $id);
        }
        echo json_encode($data);
    }

}
