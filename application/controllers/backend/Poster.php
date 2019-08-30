<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Poster extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->data['search_year'] = $this->My_model->getresult("select YEAR(poster.rel_date) as year from poster group by YEAR(poster.rel_date) ORDER BY YEAR(poster.rel_date) DESC ");
        $this->data['category'] = $this->My_model->getall("sub_category");
        $this->data['view_name'] = "poster_tb_view.php";
        $this->data['message'] = $this->session->flashdata('message');
        $this->load->view('backend/layout', $this->data);
    }

    public function add() {
        $this->data['category'] = $this->My_model->getall("sub_category");
        $this->data['view_name'] = "poster_view.php";
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

        $this->My_model->updatedata("seo", $data, array("category_id" => "3", "sub_category_id" => $this->input->post("sub_category_id")));

        $this->session->set_flashdata("message", "success_SEO Content Save Successfully.");
        redirect("backend/poster");
    }

    public function save() { 




        
        //$date = date("Y-m-d H:i:s", strtotime($this->input->post("date") . date("H:i:s")));
         $date = date("Y-m-d", strtotime($this->input->post("date"))).' '.date('H:i:s');
        $cat_id = 3;
        $subcat_id = $this->input->post("subcat_id");
        $name = trim($this->input->post("name"));
        $name = trim(preg_replace('/\s\s+/', ' ', str_replace("\n", " ", $name)));
        $description = $this->input->post("description");
        $keywords = $this->input->post("keywords");
        $movie_id = $this->input->post("movie_id");
        $cast = $this->input->post("cast");
        $director = $this->input->post("director");


        $data = array(
            "rel_date" => $date,
            "subcat_id" => $subcat_id,
            "poster_name" => $name,
            "poster_desc" => $description,
            "poster_keywords" => $keywords,
            "created" => date("Y-m-d H:i:s"),
        );

        $check = $this->My_model->getbyid("poster", array("poster_name" => $name));
        if (empty($check)) {
            $poster_id = $this->My_model->insertdata($data, "poster");
            $seo_url_id = $this->WebService->setSEOURLPoster($subcat_id, $poster_id, $name, 'add');
            $this->My_model->updatedata("poster", array("seo_url_id" => $seo_url_id), array("id" => $poster_id));

            if (!empty($movie_id)) {
                if (is_numeric($movie_id)) {
                    $this->My_model->insertdata(array("poster_id" => $poster_id, "movie_id" => $movie_id), "poster_map_movie");
                } else {
                    $movie_id = $this->save_new_movie($movie_id, $subcat_id);
                    if (is_numeric($movie_id)) {
                        $check = $this->My_model->getbyid("poster_map_movie", array("poster_id" => $poster_id, "movie_id" => $movie_id));
                        if (empty($check)) {
                            $this->My_model->insertdata(array("poster_id" => $poster_id, "movie_id" => $movie_id), "poster_map_movie");
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
                        $this->My_model->insertdata(array("poster_id" => $poster_id, "personality_id" => $cast_id), "poster_map_cast");
                    } else {
                        $cast_id = $this->save_new_personality($cast_id,'cast');
                        if (is_numeric($cast_id)) {
                            $check = $this->My_model->getbyid("poster_map_cast", array("poster_id" => $poster_id, "personality_id" => $cast_id));
                            if (empty($check)) {
                                $this->My_model->insertdata(array("poster_id" => $poster_id, "personality_id" => $cast_id), "poster_map_cast");
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

            // director mapping for movie if new cast then inserting it and then mapping
            if (!empty($director)) {
                foreach ($director as $director_id) {
                    if (is_numeric($director_id)) {
                        $check2 = $this->My_model->getbyid("movie_map_director", array("movie_id" => $movie_id, "personality_id" => $director_id));
                        $this->My_model->updatedata("personality", array("is_director" => 1), array("id" => $director_id));
                        if (empty($check2)) {
                            $this->My_model->insertdata(array("movie_id" => $movie_id, "personality_id" => $director_id), "movie_map_director");
                        }
                        $this->My_model->insertdata(array("poster_id" => $poster_id, "personality_id" => $director_id), "poster_map_director");
                    } else {
                        $director_id = $this->save_new_personality($director_id,"director");
                        if (is_numeric($director_id)) {
                            $check = $this->My_model->getbyid("poster_map_director", array("poster_id" => $poster_id, "personality_id" => $director_id));
                            if (empty($check)) {
                                $this->My_model->insertdata(array("poster_id" => $poster_id, "personality_id" => $director_id), "poster_map_director");
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

            $number_of_files = sizeof($_FILES['picture']['name']);
            $files = $_FILES['picture'];
            //Check whether user upload picture
            if ($number_of_files > 0) {

                $counts = 0;
                for ($i = 0; $i < $number_of_files; $i++) {
                    if (!empty($_FILES['picture']['name'][$i])) {


                        


                        $config['upload_path'] = './images/poster/';
                        $config['allowed_types'] = 'jpg|jpeg|png|gif|JPG';
                        $config['file_name'] = $_FILES['picture']['name'][$i];
                        $config['file_name'] = str_replace(" ", "-", trim($name));
                        $config['file_name'] = preg_replace('/[^A-Za-z0-9\-]/', '', $config['file_name']);
                        $config['file_name'] = preg_replace('/-+/', '-', $config['file_name']);

                        $_FILES['uploadedimage']['name'] = $files['name'][$i];
                        $_FILES['uploadedimage']['type'] = $files['type'][$i];
                        $_FILES['uploadedimage']['tmp_name'] = $files['tmp_name'][$i];
                        $_FILES['uploadedimage']['error'] = $files['error'][$i];
                        $_FILES['uploadedimage']['size'] = $files['size'][$i];

                        //Load upload library and initialize configuration
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                        if ($this->upload->do_upload('uploadedimage')) {

$imagedetails = [];

                            $uploadData = $this->upload->data(); 
                            $picture = $uploadData['file_name'];
                            

                            $imagedetails = getimagesize('images/poster/'.$uploadData['file_name']);
                            $width = $imagedetails[0];
                            $height = $imagedetails[1];


                            $poster = 0;
                            $firstlook = 0;
                            $wallpaper = 0;
                            $image_new_id = $_POST["image_new_id"][$i];
                            $poster_type = $this->input->post('poster_type_' . $image_new_id);
                            //$width = $this->input->post('poster_width_' . $image_new_id);
                            //$height = $this->input->post('poster_height_' . $image_new_id);
                            $counts = $counts + 1;
                            $userData = array(
                                'poster_id' => $poster_id,
                                'poster_image' => $picture,
                                'display_order' => ($counts),
                                'poster_type' => $poster_type,
                                'firstlook_order' => $firstlook,
                                'wallpaper_order' => $wallpaper,
                                'width' => $width,
                                'height' => $height
                            );

                            $insertUserData = $this->My_model->insertdata($userData, "poster_img");
                        } else {
                            $picture = '';
                        }
                    } else {
                        $picture = '';
                    }
                }
            }

            $this->session->set_flashdata("message", "success_Poster Add Successfully.");
        } else {
            $this->session->set_flashdata("message", "danger_Poster Name Already Exist.");
        }
        redirect("backend/poster/add");
    }

    public function update() { //echo '<pre>'; print_r($_POST); die('oooo');
        $poster_id = $this->input->post("id");
        //$date = date("Y-m-d H:i:s", strtotime(str_replace("/", "-", $this->input->post("date"))));
         $date = date("Y-m-d", strtotime($this->input->post("date"))).' '.date('H:i:s');

        $cat_id = 3;
        $subcat_id = $this->input->post("subcat_id");
        $name = trim($this->input->post("name"));
        $name = trim(preg_replace('/\s\s+/', ' ', str_replace("\n", " ", $name)));
        $description = $this->input->post("description");
        $keywords = $this->input->post("keywords");
        $movie_id = $this->input->post("movie_id");
        $cast = $this->input->post("cast");
        $director = $this->input->post("director");
        $image_id = $this->input->post("image_id");

        //print_r(date('h:i:s'));exit;

        $data = array(
            "rel_date" => $date,
            "subcat_id" => $subcat_id,
            "poster_name" => $name,
            "poster_desc" => $description,
            "poster_keywords" => $keywords,
            "updated" => date("Y-m-d H:i:s")
        );
        //print_r($data);exit;
        $seo_url_id = $this->WebService->setSEOURLPoster($subcat_id, $poster_id, $name, 'add');
        if ($seo_url_id > 0) {
            $data['seo_url_id'] = $seo_url_id;
        }
        $this->My_model->updatedata("poster", $data, array("id" => $poster_id));

        $this->My_model->deletedata("poster_map_movie", array("poster_id" => $poster_id));
        if (!empty($movie_id)) {
            if (is_numeric($movie_id)) {
                $this->My_model->insertdata(array("poster_id" => $poster_id, "movie_id" => $movie_id), "poster_map_movie");
            } else {
                $movie_id = $this->save_new_movie($movie_id, $subcat_id);
                if (is_numeric($movie_id)) {
                    $check = $this->My_model->getbyid("poster_map_movie", array("poster_id" => $poster_id, "movie_id" => $movie_id));
                    if (empty($check)) {
                        $this->My_model->insertdata(array("poster_id" => $poster_id, "movie_id" => $movie_id), "poster_map_movie");
                    }
                }
            }
        }

        $this->My_model->deletedata("poster_map_cast", array("poster_id" => $poster_id));
        // cast mapping for movie if new cast then inserting it and then mapping
        if (!empty($cast)) {
            foreach ($cast as $cast_id) {
                if (is_numeric($cast_id)) {
                    $check2 = $this->My_model->getbyid("movie_map_cast", array("movie_id" => $movie_id, "personality_id" => $cast_id));
                    $this->My_model->updatedata("personality", array("is_cast" => 1), array("id" => $cast_id));
                    if (empty($check2)) {
                        $this->My_model->insertdata(array("movie_id" => $movie_id, "personality_id" => $cast_id), "movie_map_cast");
                    }
                    $this->My_model->insertdata(array("poster_id" => $poster_id, "personality_id" => $cast_id), "poster_map_cast");
                } else {
                    $cast_id = $this->save_new_personality($cast_id,'cast');
                    if (is_numeric($cast_id)) {
                        $check = $this->My_model->getbyid("poster_map_cast", array("poster_id" => $poster_id, "personality_id" => $cast_id));
                        if (empty($check)) {
                            $this->My_model->insertdata(array("poster_id" => $poster_id, "personality_id" => $cast_id), "poster_map_cast");
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

        $this->My_model->deletedata("poster_map_director", array("poster_id" => $poster_id));
        // director mapping for movie if new cast then inserting it and then mapping
        if (!empty($director)) {
            foreach ($director as $director_id) {
                if (is_numeric($director_id)) {
                    $check2 = $this->My_model->getbyid("movie_map_director", array("movie_id" => $movie_id, "personality_id" => $director_id));
                    $this->My_model->updatedata("personality", array("is_director" => 1), array("id" => $director_id));
                    if (empty($check2)) {
                        $this->My_model->insertdata(array("movie_id" => $movie_id, "personality_id" => $director_id), "movie_map_director");
                    }
                    $this->My_model->insertdata(array("poster_id" => $poster_id, "personality_id" => $director_id), "poster_map_director");
                } else {
                    $director_id = $this->save_new_personality($director_id,'director');
                    if (is_numeric($director_id)) {
                        $check = $this->My_model->getbyid("poster_map_director", array("poster_id" => $poster_id, "personality_id" => $director_id));
                        if (empty($check)) {
                            $this->My_model->insertdata(array("poster_id" => $poster_id, "personality_id" => $director_id), "poster_map_director");
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

        $number_of_files = sizeof($_FILES['picture']['name']);
        $files = $_FILES['picture'];
        //Check whether user upload picture
        if ($number_of_files > 0) {

            $counts = count($this->My_model->getbyid("poster_img", array("poster_id" => $poster_id)));
            for ($i = 0; $i < $number_of_files; $i++) {
                if (!empty($_FILES['picture']['name'][$i])) {


                    


                    $config['upload_path'] = './images/poster/';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif|JPG';
                    $config['file_name'] = $_FILES['picture']['name'][$i];
                    $config['file_name'] = str_replace(" ", "-", trim($name));
                    $config['file_name'] = preg_replace('/[^A-Za-z0-9\-]/', '', $config['file_name']);
                    $config['file_name'] = preg_replace('/-+/', '-', $config['file_name']);

                    $_FILES['uploadedimage']['name'] = $files['name'][$i];
                    $_FILES['uploadedimage']['type'] = $files['type'][$i];
                    $_FILES['uploadedimage']['tmp_name'] = $files['tmp_name'][$i];
                    $_FILES['uploadedimage']['error'] = $files['error'][$i];
                    $_FILES['uploadedimage']['size'] = $files['size'][$i];

                    //Load upload library and initialize configuration
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    
                    if ($this->upload->do_upload('uploadedimage')) {
                        $uploadData = $this->upload->data();
                        $picture = $uploadData['file_name'];
$imagedetails = [];

                        $imagedetails = getimagesize('images/poster/'.$uploadData['file_name']);
                        $width = $imagedetails[0];
                        $height = $imagedetails[1];

                        $poster = 0;
                        $firstlook = 0;
                        $wallpaper = 0;
                        $image_new_id = $_POST["image_new_id"][$i];
                        $poster_type = $this->input->post('poster_type_' . $image_new_id);
                        $posImg = $this->My_model->getresult("select * from poster_img where poster_type='" . $poster_type . "' and poster_id='" . $poster_id . "' Order By display_order");

                        $count = 2;
                        foreach ($posImg as $vkey => $vv) {

                            $this->My_model->updatedata("poster_img", array("display_order" => $count), array("id" => $vv['id']));
                            $count++;
                        }

                        //$counts = $counts + 1;
                        $userData = array(
                            'poster_id' => $poster_id,
                            'poster_image' => $picture,
                            'display_order' => 1,
                            'poster_type' => $poster_type,
                            'firstlook_order' => $firstlook,
                            'wallpaper_order' => $wallpaper,
                            'width' => $width,
                            'height' => $height
                        );

                        $insertUserData = $this->My_model->insertdata($userData, "poster_img");
                    } else {
                        $picture = '';
                    }
                } else {

                    $picture = '';
                }
            }
        }

        if (!empty($image_id)) {
            foreach ($image_id as $key => $value) {

                $poster_type = $this->input->post("poster_type_" . $value);
                
                        

                $this->My_model->updatedata("poster_img", array("poster_type" => $poster_type), array("id" => $value));
            }
        }

        $this->session->set_flashdata("message", "success_Poster Update Successfully.");
        redirect("backend/poster/edit?id=" . $poster_id);
    }

    public function updateOrder() {

        $idArray = explode(",", $_POST['ids']);

        $poster_type = $this->My_model->getbyid("poster_img", array("id" => $idArray[0]));

        $type = $_POST['type'];
        $count = 1;
        foreach ($idArray as $id) {

            //echo $id.'...'.$count;
            $update_col = '';
            if ($type == 'poster') {
                $update_col = 'display_order';
            } else if ($type == 'firstlook') {
                $update_col = 'firstlook_order';
            } else {
                $update_col = 'wallpaper_order';
            }
            if ($count == 1) {

                $result = $this->My_model->getbyid("poster_img", array("id" => $id));
                $firstimg = $result[0]['poster_image'];

//                if (true) {
//                    //$this->image_lib->clear();
//                    $config['image_library'] = 'gd2';
//                    $config['source_image'] = "images/poster/285Xheight-" . $firstimg;
//                    $config['new_image'] = "images/poster/" . '285X160-' . $firstimg;
//                    $config['quality'] = "100%";
//                    $config['maintain_ratio'] = FALSE;
//                    $config['width'] = 285;
//                    $config['height'] = 160;
//                    $config['x_axis'] = '0';
//                    $config['y_axis'] = '0';
//                    $this->load->library('image_lib', $config);
//                    $this->image_lib->initialize($config);
//                    $this->image_lib->resize();
//                    $success = $this->image_lib->crop();
//                    //echo $success;
//                }
            }
            $update = $this->My_model->updatedata("poster_img", array($update_col => $count), array("id" => $id, "poster_type" => $poster_type[0]['poster_type']));
            $count ++;
        }

        return TRUE;
    }

    public function edit() {
        $id = $this->input->get('id');
        $result = $this->My_model->getbyid("poster", array("id" => $id));
        $movie_list = $this->My_model->getresult("select movie.movie_name as name,movie.id from poster_map_movie LEFT JOIN movie ON movie.id=poster_map_movie.movie_id where poster_id=" . $id);
        $result[0]["movie_id"] = $movie_list[0]['id'];
        $result[0]["movie_name"] = $movie_list[0]['name'];

        $url = $this->My_model->getbyid("video_url", array("id" => $result[0]["seo_url_id"]));
        $result[0]["final_url"] = $url[0]['final_url'];
        $this->data['edit_data'] = $result[0];

        $this->data['cast_list'] = $this->My_model->getresult("select personality.personality_name as name,personality.id from poster_map_cast LEFT JOIN personality ON personality.id=poster_map_cast.personality_id where poster_id=" . $id);
        $this->data['director_list'] = $this->My_model->getresult("select personality.personality_name as name,personality.id from poster_map_director LEFT JOIN personality ON personality.id=poster_map_director.personality_id where poster_id=" . $id);
        $this->data['category'] = $this->My_model->getall("sub_category");

        $this->data['last_record'] = $this->My_model->getresult("select poster_type from poster_img where poster_id=" . $id . " and id=(SELECT MAX(id) as id FROM `poster_img`)");

        $this->data['images_1'] = $this->My_model->getresult("select * from poster_img where poster_id=" . $id . " and poster_type=1 ORDER BY display_order");
        $this->data['images_2'] = $this->My_model->getresult("select * from poster_img where poster_id=" . $id . " and poster_type=2 ORDER BY display_order");
        $this->data['images_3'] = $this->My_model->getresult("select * from poster_img where poster_id=" . $id . " and poster_type=3 ORDER BY display_order");

        $newImages = array();
        $display_order = array(1 => "Poster", 2 => "First Look", 3 => "Wallpaper");
        $newImages[0][$display_order[$this->data['images_1'][0]['poster_type']]] = $this->data['images_1'];
        $newImages[1][$display_order[$this->data['images_2'][0]['poster_type']]] = $this->data['images_2'];
        $newImages[2][$display_order[$this->data['images_3'][0]['poster_type']]] = $this->data['images_3'];

        $this->data['newImages'] = $newImages;

        $this->data['view_name'] = "poster_view.php";
        $this->data['message'] = $this->session->flashdata('message');
        $this->load->view('backend/layout', $this->data);
    }

    public function status() {
        $id = $this->input->get('id');
        $result = $this->My_model->getbyid("poster", array("id" => $id));
        if ($result[0]['is_deleted'] == "0") {
            $this->My_model->updatedata("poster", array("is_deleted" => "1"), array("id" => $id));
            $this->session->set_flashdata("message", "success_Poster Deleted Successfully.");
        } else {
            $this->My_model->updatedata("poster", array("is_deleted" => "0"), array("id" => $id));
            $this->session->set_flashdata("message", "success_Poster Reactive Successfully.");
        }
        redirect("backend/poster");
    }

    public function delete() {
        $id = $this->input->get('id');
        $result = $this->My_model->getbyid("poster_img", array("poster_id" => $id));
        foreach ($result as $key => $value) {
            @unlink("./images/poster/" . $value['poster_image']);
            @unlink("./images/poster/285Xheight-" . $value['poster_image']);
            @unlink("./images/poster/285X160-" . $value['poster_image']);
        }
        $this->My_model->deletedata("poster", array("id" => $id));
        $this->session->set_flashdata("message", "success_Poster Deleted Successfully.");
        redirect("backend/poster");
    }

    public function delete_image() {
        $id = $this->input->get('id');
        $result = $this->My_model->getbyid("poster_img", array("id" => $id));
        @unlink("./images/poster/" . $result[0]['poster_image']);
        $this->My_model->deletedata("poster_img", array("id" => $id));
        $this->session->set_flashdata("message", "success_Poster Deleted Successfully.");
        redirect("backend/poster/edit?id=" . $result[0]['poster_id']);
    }

    public function poster_list() {
        $columns = array("poster.id", 'poster.rel_date', 'poster.poster_name',
            'movie.movie_name', 'poster.likes', 'poster.views',
            'sub_category.subcat_name', 'poster_map_movie.movie_id',
            'poster.subcat_id', 'poster.poster_desc', 'video_url.final_url', 'poster.is_deleted');

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
            $where2.=" AND DATE(poster.rel_date) BETWEEN '" . $start_date . "' AND '" . $end_date . "'";
        }

        if (!empty($year)) {
            $where2.=" AND YEAR(poster.rel_date) = " . $year;
        }

        if (!empty($month)) {
            $where2.=" AND MONTH(poster.rel_date) = " . $month;
        }
        $is_deleted = 0;
        if (!empty($status)) {
            if ($status == "delete") {
                $is_deleted = 1;
                $sub_category_id = 0;
            } else {

                $catid = explode("_", $status);
                $where2 .= " AND poster.subcat_id=" . $catid[1];
                $sub_category_id = $catid[1];
            }
        }

        $seo_data = $this->My_model->getresult("SELECT * from seo WHERE category_id=3 AND sub_category_id='" . $sub_category_id . "' LIMIT 0,1");

        $totalData = $this->My_model->getresult("select count(id) as tot from poster where poster.is_deleted=0");
        $totalFiltered = $totalData[0]['tot'];

        if (empty($this->input->post('search')['value']) && empty($year) && empty($month) && empty($search_keyword) && empty($status) && empty($start_date) && empty($end_date)) {
            $posts = $this->My_model->getresult("

               SELECT " . implode(',', $columns) . " FROM poster
               LEFT JOIN sub_category ON sub_category.id=poster.subcat_id
               LEFT JOIN poster_map_movie ON poster_map_movie.poster_id=poster.id
               LEFT JOIN movie ON movie.id=poster_map_movie.movie_id
               LEFT JOIN video_url ON video_url.id=poster.seo_url_id
               where is_deleted=0
               ORDER BY $order $dir
               LIMIT $start,$limit

            ");
        } else {

            $search = trim($this->input->post('search')['value']);
            $search = preg_replace('!\s+!', ' ', $search);

            if (!empty($search_keyword)) {
                $search = $search_keyword;
            }

            $where = "where is_deleted=" . $is_deleted . " AND";
            $where.=" ( " . implode(" LIKE '%" . $search . "%' OR ", $columns) . " LIKE '%" . $search . "%' )";

            $where.=$where2;

            $posts = $this->My_model->getresult("

               SELECT " . implode(',', $columns) . " FROM poster
               LEFT JOIN sub_category ON sub_category.id=poster.subcat_id
               LEFT JOIN poster_map_movie ON poster_map_movie.poster_id=poster.id
               LEFT JOIN movie ON movie.id=poster_map_movie.movie_id
               LEFT JOIN video_url ON video_url.id=poster.seo_url_id
               $where
               ORDER BY $order $dir
               LIMIT $start,$limit

            ");



            $totalData = $this->My_model->getresult("select count(poster.id) as tot from poster
               LEFT JOIN sub_category ON sub_category.id=poster.subcat_id
               LEFT JOIN poster_map_movie ON poster_map_movie.poster_id=poster.id
               LEFT JOIN movie ON movie.id=poster_map_movie.movie_id
               LEFT JOIN video_url ON video_url.id=poster.seo_url_id
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
        $output['seo_data'] = $seo_data[0];
        //output to json format
        echo json_encode($output);
    }

}
