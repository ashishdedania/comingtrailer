<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Video extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->data['search_year'] = $this->My_model->getresult("select YEAR(video.rel_date) as year from video where cat_id=2 group by YEAR(video.rel_date) ORDER BY YEAR(video.rel_date) DESC ");
        $this->data['category'] = $this->My_model->getall("sub_category");
        $this->data['view_name'] = "video_tb_view.php";
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

        $this->My_model->updatedata("seo", $data, array("category_id" => "2", "sub_category_id" => $this->input->post("sub_category_id")));

        $this->session->set_flashdata("message", "success_SEO Content Save Successfully.");
        redirect("backend/video");
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

    public function save() {

        $cat_id = $this->input->post("cat_id");
        $date = date("Y-m-d H:i:s", strtotime($this->input->post("date") . date("H:i:s")));
        $subcat_id = $this->input->post("subcat_id");
        $name = trim(str_replace("\n", " ", $this->input->post("name")));
        $description = $this->input->post("description");
        $keywords = $this->input->post("keywords");
        $movie_id = $this->input->post("movie_id");
        $cast = $this->input->post("cast");
        $singers = $this->input->post("singers");
        $music = $this->input->post("music");
        $director = $this->input->post("director");
        $rel_by = $this->input->post("rel_by");
        $videourl = $this->input->post("videourl");
        $data = array(
            "cat_id" => $cat_id,
            "subcat_id" => $subcat_id,
            "video_name" => $name,
            "video_url" => $videourl,
            "video_desc" => $description,
            "video_keywords" => $keywords,
            "rel_date" => $date,
            "created" => date("Y-m-d H:i:s")
        );


        $new_name = str_replace(" ", "-", $name);
        $config = array(
            'upload_path' => "./images/videothumb/",
            'allowed_types' => "gif|jpg|png|jpeg",
            'min_width' => 1279,
            'min_height' => 719
        );
        $config['file_name'] = str_replace([".", "@", "$", '%', '+'], "", $new_name);
        $this->upload->initialize($config);

        if (!empty($_FILES['attachment']['name'])) {
            if ($this->upload->do_upload("attachment")) {
                $updata = array('upload_data' => $this->upload->data());
                $data['video_thumb'] = $updata['upload_data']['file_name'];
            }
        } else {

            if (!empty($videourl)) {
                $urlvideo_id = explode("?v=", $videourl);
                $urlvideo_id = explode("&", $urlvideo_id[1]);
                $urlvideo_id = $urlvideo_id[0];

                if (getimagesize("https://img.youtube.com/vi/" . $urlvideo_id . "/maxresdefault.jpg") !== false) {

                    $url = "https://img.youtube.com/vi/" . $urlvideo_id . "/maxresdefault.jpg";
                    $new_name = str_replace([".", "@", "$", '%', '+'], "", $new_name);
                    if(file_exists('images/videothumb/'.$new_name.'.jpg'))
                    {
                        $new_name = $new_name.'-'.rand(1,999);
                    }
                    $img = "./images/videothumb/" . $new_name . ".jpg";
                    file_put_contents($img, file_get_contents($url));
                    $data['video_thumb'] = $new_name . ".jpg";
                }
            }
        }


        $video_id = $this->My_model->insertdata($data, "video");

        $seo_url_id = $this->WebService->setSEOURL($cat_id, $subcat_id, $video_id, $name, "add");
        $this->My_model->updatedata("video", array("seo_url_id" => $seo_url_id), array("id" => $video_id));

        if (!empty($movie_id)) {
            if (is_numeric($movie_id)) {

                $this->My_model->insertdata(array("video_id" => $video_id, "movie_id" => $movie_id), "video_map_movie");
            } else {
                $movie_id = $this->save_new_movie($movie_id, $subcat_id);
                if (is_numeric($movie_id)) {
                    $check = $this->My_model->getbyid("video_map_movie", array("video_id" => $video_id, "movie_id" => $movie_id));
                    if (empty($check)) {
                        $this->My_model->insertdata(array("video_id" => $video_id, "movie_id" => $movie_id), "video_map_movie");
                    }
                }
            }
        }


        // cast mapping for movie if new cast then inserting it and then mapping
        if (!empty($cast)) {
            foreach ($cast as $cast_id) {
                if (is_numeric($cast_id)) {
                    $check2 = $this->My_model->getbyid("movie_map_cast", array("movie_id" => $movie_id, "personality_id" => $cast_id));
                    $this->My_model->updatedata("personality", array("is_cast" => 1), array("id" => $cast_id));
                    if (empty($check2)) {
                        $this->My_model->insertdata(array("movie_id" => $movie_id, "personality_id" => $cast_id), "movie_map_cast");
                    }
                    $this->My_model->insertdata(array("video_id" => $video_id, "personality_id" => $cast_id), "video_map_cast");
                } else {
                    $cast_id = $this->save_new_personality($cast_id,"cast");
                    if (is_numeric($cast_id)) {
                        $check = $this->My_model->getbyid("video_map_cast", array("video_id" => $video_id, "personality_id" => $cast_id));
                        if (empty($check)) {
                            $this->My_model->insertdata(array("video_id" => $video_id, "personality_id" => $cast_id), "video_map_cast");
                        }
                    }
                    if (!empty($movie_id)) {
                        $check2 = $this->My_model->getbyid("movie_map_cast", array("movie_id" => $movie_id, "personality_id" => $cast_id));
                        if (empty($check2)) {
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
                    $check2 = $this->My_model->getbyid("movie_map_singer", array("movie_id" => $movie_id, "personality_id" => $singer_id));
                    $this->My_model->updatedata("personality", array("is_singer" => 1), array("id" => $singer_id));
                    if (empty($check2)) {
                        $this->My_model->insertdata(array("movie_id" => $movie_id, "personality_id" => $singer_id), "movie_map_singer");
                    }
                    $this->My_model->insertdata(array("video_id" => $video_id, "personality_id" => $singer_id), "video_map_singer");
                } else {
                    $singer_id = $this->save_new_personality($singer_id,"singer");
                    if (is_numeric($singer_id)) {
                        $check = $this->My_model->getbyid("video_map_singer", array("video_id" => $video_id, "personality_id" => $singer_id));
                        if (empty($check)) {
                            $this->My_model->insertdata(array("video_id" => $video_id, "personality_id" => $singer_id), "video_map_singer");
                        }
                    }
                    if (!empty($movie_id)) {
                        $this->My_model->insertdata(array("movie_id" => $movie_id, "personality_id" => $singer_id), "movie_map_singer");
                    }
                }
            }
        }

        // director mapping for movie if new cast then inserting it and then mapping
        if (!empty($director)) {
            foreach ($director as $director_id) {
                if (is_numeric($director_id)) {
                    $check2 = $this->My_model->getbyid("movie_map_director", array("movie_id" => $movie_id, "personality_id" => $director_id));
                    $this->My_model->updatedata("personality", array("is_director" => 1), array("id" => $director_id));
                    if (empty($check2)) {
                        $this->My_model->insertdata(array("movie_id" => $movie_id, "personality_id" => $director_id), "movie_map_director");
                    }
                    $this->My_model->insertdata(array("video_id" => $video_id, "personality_id" => $director_id), "video_map_director");
                } else {
                    $director_id = $this->save_new_personality($director_id,'director');
                    if (is_numeric($director_id)) {
                        $check = $this->My_model->getbyid("video_map_director", array("video_id" => $video_id, "personality_id" => $director_id));
                        if (empty($check)) {
                            $this->My_model->insertdata(array("video_id" => $video_id, "personality_id" => $director_id), "video_map_director");
                        }
                    }

                    if (!empty($movie_id)) {
                        $check2 = $this->My_model->getbyid("movie_map_director", array("movie_id" => $movie_id, "personality_id" => $director_id));
                        if (empty($check2)) {
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
                    $check2 = $this->My_model->getbyid("movie_map_music", array("movie_id" => $movie_id, "personality_id" => $music_id));
                    $this->My_model->updatedata("personality", array("is_music_director" => 1), array("id" => $music_id));
                    if (empty($check2)) {
                        $this->My_model->insertdata(array("movie_id" => $movie_id, "personality_id" => $music_id), "movie_map_music");
                    }

                    $this->My_model->insertdata(array("video_id" => $video_id, "personality_id" => $music_id), "video_map_music");
                } else {

                    $music_id = $this->save_new_personality($music_id,"music_director");

                    if (is_numeric($music_id)) {
                        $check = $this->My_model->getbyid("video_map_music", array("video_id" => $video_id, "personality_id" => $music_id));
                        if (empty($check)) {
                            $this->My_model->insertdata(array("video_id" => $video_id, "personality_id" => $music_id), "video_map_music");
                        }
                    }

                    if (!empty($movie_id)) {
                        $check2 = $this->My_model->getbyid("movie_map_music", array("movie_id" => $movie_id, "personality_id" => $music_id));

                        if (empty($check2)) {
                            $this->My_model->insertdata(array("movie_id" => $movie_id, "personality_id" => $music_id), "movie_map_music");
                        }
                    }
                }
            }
        }

        // rel by mapping for movie if new cast then inserting it and then mapping
        if (!empty($rel_by)) {
            foreach ($rel_by as $rel_by_id) {
                if (is_numeric($rel_by_id)) {

                    $this->My_model->insertdata(array("video_id" => $video_id, "rel_by_id" => $rel_by_id), "video_map_relby");
                } else {

                    $rel_by_id = $this->save_relby($rel_by_id);
                    if (is_numeric($rel_by_id)) {
                        $check = $this->My_model->getbyid("video_map_relby", array("video_id" => $video_id, "rel_by_id" => $rel_by_id));
                        if (empty($check)) {
                            $this->My_model->insertdata(array("video_id" => $video_id, "rel_by_id" => $rel_by_id), "video_map_relby");
                        }
                    }
                }
            }
        }

        if ($cat_id == 1) {
            $this->session->set_flashdata("message", "success_Trailer Add Successfully.");
            redirect("backend/trailer/add");
        } else {

            $this->session->set_flashdata("message", "success_Video Add Successfully.");
            redirect("backend/video/add");
        }
    }

    public function update() { ///die('fff');
        $video_id = $this->input->post("id");
        $seo_url_id = $this->input->post("seo_url_id");
        $videourl = $this->input->post("videourl");
        $check = count(explode(" ", $this->input->post("date")));
        if ($check > 1)
            $date = date("Y-m-d H:i:s", strtotime($this->input->post("date")));
        else
            $date = date("Y-m-d H:i:s", strtotime($this->input->post("date") . date("H:i:s")));
        $cat_id = $this->input->post("cat_id");
        $subcat_id = $this->input->post("subcat_id");
        $name = trim(str_replace("\n", " ", $this->input->post("name")));
        $description = $this->input->post("description");
        $keywords = $this->input->post("keywords");
        $movie_id = $this->input->post("movie_id");
        $cast = $this->input->post("cast");
        $singers = $this->input->post("singers");
        $music = $this->input->post("music");
        $director = $this->input->post("director");
        $rel_by = $this->input->post("rel_by");

        $data = array(
            "cat_id" => $cat_id,
            "subcat_id" => $subcat_id,
            "video_name" => $name,
            "video_url" => $videourl,
            "video_desc" => $description,
            "video_keywords" => $keywords,
            "rel_date" => $date,
            "updated" => date("Y-m-d H:i:s")
        );
        $new_name = str_replace(" ", "-", $name);
        $config = array(
            'upload_path' => "./images/videothumb/",
            'allowed_types' => "gif|jpg|png|jpeg",
            'min_width' => 1279,
            'min_height' => 719
        );
        $config['file_name'] = str_replace([".", "@", "$", '%', '+'], "", $new_name);
        $this->upload->initialize($config);
        $result = $this->My_model->getbyid("video", array("id" => $video_id));
        if (!empty($_FILES['attachment']['name'])) {
            if ($this->upload->do_upload("attachment")) {
                $updata = array('upload_data' => $this->upload->data());
                $data['video_thumb'] = $updata['upload_data']['file_name'];
            }
        } else if ($this->input->post("videothumburl")) {
            if (!empty($result[0]['video_thumb'])) {
                @unlink("./images/videothumb/" . $result[0]['video_thumb']);
            }
            $content = file_get_contents($this->input->post("videothumburl"));
            $filename = str_replace([".", "@", "$", '%', '+'], "", $new_name) . '.jpg';
            file_put_contents("./images/videothumb/" . $filename, $content);
            $data['video_thumb'] = $filename;
        }

        $seo_url_id = $this->WebService->setSEOURL($cat_id, $subcat_id, $video_id, $name, "edit");
        if ($seo_url_id > 0) {
            $data['seo_url_id'] = $seo_url_id;
        }
        $this->My_model->updatedata("video", $data, array("id" => $video_id));
        $this->My_model->deletedata("video_map_movie", array("video_id" => $video_id));
        if (!empty($movie_id)) {
            if (is_numeric($movie_id)) {

                $this->My_model->insertdata(array("video_id" => $video_id, "movie_id" => $movie_id), "video_map_movie");
            } else {

                $movie_id = $this->save_new_movie($movie_id, $subcat_id);

                if (is_numeric($movie_id)) {
                    $check = $this->My_model->getbyid("video_map_movie", array("video_id" => $video_id, "movie_id" => $movie_id));
                    if (empty($check)) {
                        $this->My_model->insertdata(array("video_id" => $video_id, "movie_id" => $movie_id), "video_map_movie");
                    }
                }
            }
        }


        // cast mapping for movie if new cast then inserting it and then mapping
        $this->My_model->deletedata("video_map_cast", array("video_id" => $video_id));
        if (!empty($cast)) {
            foreach ($cast as $cast_id) {
                if (is_numeric($cast_id)) {
                    $check2 = $this->My_model->getbyid("movie_map_cast", array("movie_id" => $movie_id, "personality_id" => $cast_id));
                    $this->My_model->updatedata("personality", array("is_cast" => 1), array("id" => $cast_id));
                    if (empty($check2) && !empty($movie_id)) {
                        $this->My_model->insertdata(array("movie_id" => $movie_id, "personality_id" => $cast_id), "movie_map_cast");
                    }
                    $this->My_model->insertdata(array("video_id" => $video_id, "personality_id" => $cast_id), "video_map_cast");
                } else {
                    $cast_id = $this->save_new_personality($cast_id,'cast');
                    if (is_numeric($cast_id)) {
                        $check = $this->My_model->getbyid("video_map_cast", array("video_id" => $video_id, "personality_id" => $cast_id));
                        if (empty($check)) {
                            $this->My_model->insertdata(array("video_id" => $video_id, "personality_id" => $cast_id), "video_map_cast");
                        }
                    }
                    if (!empty($movie_id)) {
                        $check2 = $this->My_model->getbyid("movie_map_cast", array("movie_id" => $movie_id, "personality_id" => $cast_id));
                        if (empty($check2)) {
                            $this->My_model->insertdata(array("movie_id" => $movie_id, "cast_id" => $cast_id), "movie_map_cast");
                        }
                    }
                }
            }
        }


        // singer mapping for movie if new cast then inserting it and then mapping
        $this->My_model->deletedata("video_map_singer", array("video_id" => $video_id));
        if (!empty($singers)) {
            foreach ($singers as $singer_id) {
                if (is_numeric($singer_id)) {
                    $check2 = $this->My_model->getbyid("movie_map_singer", array("movie_id" => $movie_id, "personality_id" => $singer_id));
                    $this->My_model->updatedata("personality", array("is_singer" => 1), array("id" => $singer_id));
                    if (empty($check2) && !empty($movie_id)) {
                        $this->My_model->insertdata(array("movie_id" => $movie_id, "personality_id" => $singer_id), "movie_map_singer");
                    }
                    $this->My_model->insertdata(array("video_id" => $video_id, "personality_id" => $singer_id), "video_map_singer");
                } else {
                    $singer_id = $this->save_new_personality($singer_id,'singer');

                    if (is_numeric($singer_id)) {
                        $check = $this->My_model->getbyid("video_map_singer", array("video_id" => $video_id, "personality_id" => $singer_id));
                        if (empty($check)) {
                            $this->My_model->insertdata(array("video_id" => $video_id, "personality_id" => $singer_id), "video_map_singer");
                        }
                    }

                    if (!empty($movie_id)) {
                        $check2 = $this->My_model->getbyid("movie_map_singer", array("movie_id" => $movie_id, "personality_id" => $singer_id));
                        if (empty($check2)) {
                            $this->My_model->insertdata(array("movie_id" => $movie_id, "personality_id" => $singer_id), "movie_map_singer");
                        }
                    }
                }
            }
        }

        // director mapping for movie if new cast then inserting it and then mapping
        $this->My_model->deletedata("video_map_director", array("video_id" => $video_id));
        if (!empty($director)) {
            foreach ($director as $director_id) {
                if (is_numeric($director_id)) {
                    $check2 = $this->My_model->getbyid("movie_map_director", array("movie_id" => $movie_id, "personality_id" => $director_id));
                    $this->My_model->updatedata("personality", array("is_director" => 1), array("id" => $director_id));
                    if (empty($check2) && !empty($movie_id)) {
                        $this->My_model->insertdata(array("movie_id" => $movie_id, "personality_id" => $director_id), "movie_map_director");
                    }
                    $this->My_model->insertdata(array("video_id" => $video_id, "personality_id" => $director_id), "video_map_director");
                } else {
                    $director_id = $this->save_new_personality($director_id,'director');
                    if (is_numeric($director_id)) {
                        $check = $this->My_model->getbyid("video_map_director", array("video_id" => $video_id, "personality_id" => $director_id));
                        if (empty($check)) {
                            $this->My_model->insertdata(array("video_id" => $video_id, "personality_id" => $director_id), "video_map_director");
                        }
                    }

                    if (!empty($movie_id)) {
                        $check2 = $this->My_model->getbyid("movie_map_director", array("movie_id" => $movie_id, "personality_id" => $director_id));
                        if (empty($check2)) {
                            $this->My_model->insertdata(array("movie_id" => $movie_id, "personality_id" => $director_id), "movie_map_director");
                        }
                    }
                }
            }
        }

        // music director mapping for movie if new cast then inserting it and then mapping
        $this->My_model->deletedata("video_map_music", array("video_id" => $video_id));
        if (!empty($music)) {
            foreach ($music as $music_id) {
                if (is_numeric($music_id)) {
                    $check2 = $this->My_model->getbyid("movie_map_music", array("movie_id" => $movie_id, "personality_id" => $music_id));
                    $this->My_model->updatedata("personality", array("is_music_director" => 1), array("id" => $music_id));
                    if (empty($check2) && !empty($movie_id)) {
                        $this->My_model->insertdata(array("movie_id" => $movie_id, "personality_id" => $music_id), "movie_map_music");
                    }
                    $this->My_model->insertdata(array("video_id" => $video_id, "personality_id" => $music_id), "video_map_music");
                } else {
                    $music_id = $this->save_new_personality($music_id,"music_director");
                    if (is_numeric($music_id)) {
                        $check = $this->My_model->getbyid("video_map_music", array("video_id" => $video_id, "personality_id" => $music_id));
                        if (empty($check)) {
                            $this->My_model->insertdata(array("video_id" => $video_id, "personality_id" => $music_id), "video_map_music");
                        }
                    }
                    if (!empty($movie_id)) {
                        $check2 = $this->My_model->getbyid("movie_map_music", array("movie_id" => $movie_id, "personality_id" => $music_id));
                        if (empty($check2)) {
                            $this->My_model->insertdata(array("movie_id" => $movie_id, "personality_id" => $music_id), "movie_map_music");
                        }
                    }
                }
            }
        }

        // rel by mapping for movie if new cast then inserting it and then mapping
        $this->My_model->deletedata("video_map_relby", array("video_id" => $video_id));
        if (!empty($rel_by)) {
            foreach ($rel_by as $rel_by_id) {
                if (is_numeric($rel_by_id)) {

                    $this->My_model->insertdata(array("video_id" => $video_id, "rel_by_id" => $rel_by_id), "video_map_relby");
                } else {

                    $rel_by_id = $this->save_relby($rel_by_id);
                    if (is_numeric($rel_by_id)) {
                        $check = $this->My_model->getbyid("video_map_relby", array("video_id" => $video_id, "rel_by_id" => $rel_by_id));
                        if (empty($check)) {
                            $this->My_model->insertdata(array("video_id" => $video_id, "rel_by_id" => $rel_by_id), "video_map_relby");
                        }
                    }
                }
            }
        }

        if ($cat_id == 1) {
            $this->session->set_flashdata("message", "success_Trailer Update Successfully.");
            redirect("backend/trailer/edit?id=" . $video_id);
        } else {

            $this->session->set_flashdata("message", "success_Video Update Successfully.");
            redirect("backend/video/edit?id=" . $video_id);
        }
    }

    public function status() {
        $id = $this->input->get('id');
        $result = $this->My_model->getbyid("video", array("id" => $id));
        if ($result[0]['is_deleted'] == "0") {
            $this->My_model->updatedata("video", array("is_deleted" => "1"), array("id" => $id));
            $this->session->set_flashdata("message", "success_Video Song Deleted Successfully.");
        } else {
            $this->My_model->updatedata("video", array("is_deleted" => "0"), array("id" => $id));
            $this->session->set_flashdata("message", "success_Video Song Reactive Successfully.");
        }
        redirect("backend/video");
    }

    public function delete() {
        $id = $this->input->get('id');
        $result = $this->My_model->getbyid("video", array("id" => $id));
        if (!empty($result[0]['video_thumb'])) {
            @unlink("./images/videothumb/" . $result[0]['video_thumb']);
        }
        $this->My_model->deletedata("video", array("id" => $id));
        $this->session->set_flashdata("message", "success_Video Song Deleted Successfully.");
        redirect("backend/video");
    }

    public function video_list() {
        $columns = array("video.id", 'video.rel_date', 'video.video_name','video.video_thumb',
            'movie.movie_name', 'video.play', 'video.liked', 'video.youtube_views',
            'sub_category.subcat_name', 'video_map_movie.movie_id',
            'video.subcat_id', 'video.video_desc', 'video_url.final_url', 'video.is_deleted');


        $limit = $this->input->post('length');
        $playlist_id = $this->input->post('playlist_id');
        $start = $this->input->post('start');
        $order = $columns[$this->input->post('order')[0]['column']];
        $dir = $this->input->post('order')[0]['dir'];

        $year = $this->input->post('columns')[0]['search']['value'];
        $month = $this->input->post('columns')[1]['search']['value'];
        $search_keyword = $this->input->post('columns')[2]['search']['value'];
        $status = $this->input->post('columns')[3]['search']['value'];

        $start_date = $this->input->post('columns')[4]['search']['value'];
        $end_date = $this->input->post('columns')[5]['search']['value'];

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

        // if(!empty($startDate)){
        //     $where2.=" AND video.rel_date >= ".date('Y-m-d',strtotime($startDate));
        // }
        // if(!empty($endDate)){
        //     $endDate = $endDate." 11:59:59";
        //     $where2.=" AND video.rel_date <= ".date('Y-m-d',strtotime($endDate));
        // }
        $is_deleted = 0;
        $playlist_join = '';
        if (!empty($playlist_id)) {
            $playlist_join = '(select playlist_map_video.id from playlist_map_video where playlist_map_video.playlist_id = ' . $playlist_id . ' and playlist_map_video.video_id = video.id) is not null and ';
        }
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

        $seo_data = $this->My_model->getresult("SELECT * from seo WHERE category_id=2 AND sub_category_id='" . $sub_category_id . "' LIMIT 0,1");

        $totalData = $this->My_model->getresult("select count(video.id) as tot from video WHERE cat_id=2 AND video.is_deleted=0");
        $totalFiltered = $totalData[0]['tot'];

        if (empty($this->input->post('search')['value']) && empty($year) && empty($month) && empty($search_keyword) && empty($status) && empty($start_date) && empty($end_date) && empty($playlist_id)) {
            $posts = $this->My_model->getresult("

               SELECT " . implode(',', $columns) . " FROM video
               LEFT JOIN sub_category ON sub_category.id=video.subcat_id
               LEFT JOIN video_map_movie ON video_map_movie.video_id=video.id
               LEFT JOIN movie ON movie.id=video_map_movie.movie_id
               LEFT JOIN video_url ON video_url.id=video.seo_url_id
               where video.cat_id=2 AND video.is_deleted=0
               ORDER BY $order $dir
               LIMIT $start,$limit

            ");
        } else {

            $search = trim($this->input->post('search')['value']);
            $search = preg_replace('!\s+!', ' ', $search);

            if (!empty($search_keyword)) {
                $search = $search_keyword;
            }
            if (empty($playlist_id)) {
                $video_cond = 'video.cat_id=2 AND ';
            }
            $where = "where " . $video_cond . " is_deleted=" . $is_deleted . " AND " . $playlist_join;
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
                if (empty($playlist_id)) {
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
                }
                if ($post['is_deleted'] == "0") {
                    $action.="<a href='" . base_url() . "backend/video/edit?id=" . $post['id'] . "' class='icon-edit'></a>";
                    $action.="<a target=\"_blank\" href=\"" . $post['final_url'] . "\" class=\"icon-view\"></a>";
                    $action.= " <a onclick=\"return confirm('Are You Sure You Want To Delete?')\"  href='" . base_url() . "backend/video/status?id=" . $post['id'] . "' class='icon-delete'></a>";
                } else {
                    $action.= " <a onclick=\"return confirm('Are You Sure You Want To Reactive?')\"  href='" . base_url() . "backend/video/status?id=" . $post['id'] . "' class='icon-restore'></a>";
                    $action.="<a target=\"_blank\" href=\"" . $post['final_url'] . "\" class=\"icon-view\"></a>";
                    $action.= " <a onclick=\"return confirm('Are You Sure You Want To Delete?')\"  href='" . base_url() . "backend/video/delete?id=" . $post['id'] . "' class='icon-delete'></a>";
                }
                if (!empty($playlist_id)) {
                    $action .= '<a style="cursor:pointer;" onclick="remove_from_playlist(this,' . $post['id'] . ', ' . $playlist_id . ')">Remove</a>';
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
                $nestedData["video_thumb"] ='<img src="'.BASE_URL().'images/videothumb/'.$post['video_thumb'].'" height = "30px"> ' ;
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
       // echo "<pre>";print_r($data);exit;

        $output = array(
            "draw" => intval($this->input->post('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data,
        );
        //echo "<pre>";print_r($output);exit;
        $csrf_name = $this->security->get_csrf_token_name();
        $csrf_hash = $this->security->get_csrf_hash();
        $output[$csrf_name] = $csrf_hash;
        $output['seo_data'] = $seo_data[0];
        //output to json format
        echo json_encode($output);
    }

    public function image_resize_video($path, $width = 285, $height = 160) {

        $this->load->library("image_lib");
        $pathInfo = pathinfo($path);
        $new_name = $width . "X" . $height . "-" . str_replace(".", "", $pathInfo['filename']);

        // Configuration
        $config['image_library'] = 'GD2';
        $config['source_image'] = $path;
        $config['new_image'] = $path;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = FALSE;
        $config['x_axis'] = '0';
        $config['y_axis'] = '0';
        $config['width'] = $width;
        $config['height'] = $height;

        // Load the Library
        $this->image_lib->clear();
        $this->image_lib->initialize($config);

        // resize image
        $this->image_lib->resize();
        // handle if there is any problem
        if (!$this->image_lib->resize()) {

            $error = array('error' => $this->image_lib->display_errors());
            $this->session->set_flashdata("message", "danger_" . $error['error']);
            redirect("backend/video/add");
        }

        rename($pathInfo['dirname'] . "/" . $pathInfo['filename'] . "_thumb." . $pathInfo['extension'], $pathInfo['dirname'] . "/" . $new_name . "." . $pathInfo['extension']);
    }

}
