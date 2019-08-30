<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Playlist extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->data['search_year'] = $this->My_model->getresult("select YEAR(playlist.created) as year from playlist group by YEAR(playlist.created) ORDER BY YEAR(playlist.created) DESC ");
        $total = $this->My_model->getresult("select count(id) as tot from playlist");
        $this->data['search_year'] = $this->My_model->getresult("select YEAR(user.created) as year from user group by YEAR(user.created) ORDER BY YEAR(user.created) DESC ");
        $this->data['total'] = $total[0]['tot'];        
        $this->data['view_name'] = "playlist_tb_view.php";
        $this->data['message'] = $this->session->flashdata('message');
        $this->load->view('backend/layout', $this->data);
    }

    public function playlist_list() {
        $columns = array('playlist.id', 'playlist.created', 'playlist.name', 'playlist.playlist_thumb',
            'playlist.show_in_app', 'playlist.is_deleted');

        $limit = $this->input->post('length');
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

        if (!empty($start_date) && !empty($end_date)) {
            $where2.=" AND DATE(playlist.created) BETWEEN '" . $start_date . "' AND '" . $end_date . "'";
        }
        if (!empty($year)) {
            $where2.=" AND YEAR(playlist.created) = " . $year;
        }
        if (!empty($month)) {
            $where2.=" AND MONTH(playlist.created) = " . $month;
        }

        $totalData = $this->My_model->getresult("select count(playlist.id) as tot from playlist");
        $totalFiltered = $totalData[0]['tot'];
        $is_deleted = 0;
        if (!empty($status) && $status == "delete") {
            $is_deleted = 1;
        }
        if (empty($this->input->post('search')['value']) && empty($year) && empty($month) && empty($search_keyword) && empty($status) && empty($start_date) && empty($end_date)) {
            $posts = $this->My_model->getresult("
               SELECT " . implode(',', $columns) . " FROM playlist                
               where playlist.is_deleted=0
               ORDER BY $order $dir
               LIMIT $start,$limit
            ");
        } else {
            $search = trim($this->input->post('search')['value']);
            $search = preg_replace('!\s+!', ' ', $search);

            if (!empty($search_keyword)) {
                $search = $search_keyword;
            }

            $where = "where is_deleted=" . $is_deleted . " AND ";
            $where.=" ( " . implode(" LIKE '%" . $search . "%' OR ", $columns) . " LIKE '%" . $search . "%' )";

            $where.=$where2;

            $posts = $this->My_model->getresult("
               SELECT " . implode(',', $columns) . " FROM playlist                              
               $where
               ORDER BY $order $dir
               LIMIT $start,$limit
            ");

            $totalData = $this->My_model->getresult("select count(playlist.id) as tot from playlist $where");
            $totalFiltered = $totalData[0]['tot'];
        }

        $number = ($start + 1);
        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $id = $post['id'];
                $action = "";
                if ($post['is_deleted'] == "0") {
                    $action.="<a href='" . base_url() . "backend/playlist/edit?id=" . $post['id'] . "' class='icon-edit'></a>";
                    $action.= " <a onclick=\"return confirm('Are You Sure You Want To Delete?')\"  href='" . base_url() . "backend/playlist/status?id=" . $post['id'] . "' class='icon-delete'></a>";
                } else {
                    $action.= " <a onclick=\"return confirm('Are You Sure You Want To Reactive?')\"  href='" . base_url() . "backend/playlist/status?id=" . $post['id'] . "' class='icon-restore'></a>";
                    $action.= " <a onclick=\"return confirm('Are You Sure You Want To Delete?')\"  href='" . base_url() . "backend/playlist/delete?id=" . $post['id'] . "' class='icon-delete'></a>";
                }
                if (!empty($post['playlist_thumb'])) {
                    $img = base_url() . 'images/playlistthumb/' . $post['playlist_thumb'];
                } else {
                    $img = base_url() . 'assets/images/no-user.svg';
                }
                $nestedData["number"] = $number;
                $nestedData["name"] = $post['name'];
                $nestedData["created"] = date("d M Y, h:i:s A", strtotime($post['created']));
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
                $nestedData["action"] = $action;
                $nestedData["img"] = "<img src='$img' width='30' height='30' />";

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

    public function add() {
        $this->data['view_name'] = "playlist_view.php";
        $this->data['category'] = $this->My_model->getall("sub_category");
        $this->data['message'] = $this->session->flashdata('message');
        $this->load->view('backend/layout', $this->data);
    }

    public function edit() {
        $id = $this->input->get("id");
        $edit_data = $this->My_model->getbyid("playlist", array("id" => $id));
        $this->data['edit_data'] = $edit_data[0];
        $totalData = $this->My_model->getresult("select count(playlist_map_video.id) as tot from playlist_map_video WHERE playlist_map_video.playlist_id =" . $id);
        $this->data['total'] = $totalData[0]['tot'];
        $this->data['search_year'] = $this->My_model->getresult("select YEAR(video.rel_date) as year from video where cat_id=2 group by YEAR(video.rel_date) ORDER BY YEAR(video.rel_date) DESC ");
         $this->data['category'] = $this->My_model->getall("sub_category");
        $this->data['view_name'] = "playlist_view.php";
        $this->data['message'] = $this->session->flashdata('message');
        $this->load->view('backend/layout', $this->data);
    }

    public function save() {
        $name = trim($this->input->post("name"));
        $name = trim(preg_replace('/\s\s+/', ' ', str_replace("\n", " ", $name)));
        if (empty($name) !== '') {
            $sub_category = $this->input->post('subcat_id');
            $redirect_link = $this->input->post("redirect_link");
            $date = date("Y-m-d H:i:s", strtotime($this->input->post("date") . date("H:i:s")));
            $show_in_app = $this->input->post("show_in_app");
            $data = array("name" => $name,"subcat_id" =>implode(',', $sub_category), "redirect_link" => $redirect_link,"created" => $date, 'show_in_app' => implode(',', $show_in_app));
            $new_name = str_replace(" ", "-", $name);
            $config = array(
                'upload_path' => "./images/playlistthumb/",
                'allowed_types' => "gif|jpg|png|jpeg",
                'min_width' => 1279,
                'min_height' => 719
            );
            $config['file_name'] = str_replace([".", "@", "$", '%','+'], "", $new_name);
            $this->upload->initialize($config);

            if (!empty($_FILES['file']['name'])) {
                if ($this->upload->do_upload("file")) {
                    $updata = array('upload_data' => $this->upload->data());
                    $data['playlist_thumb'] = $updata['upload_data']['file_name'];
                    $this->image_resize_playlist("./images/playlistthumb/" . $updata['upload_data']['file_name']);
                }
            }
            $playlist_id = $this->My_model->insertdata($data, "playlist");
            $this->session->set_flashdata("message", "success_playlist Add Successfully.");
        } else {
            $this->session->set_flashdata("message", "danger_playlist Name Cant Blank.");
        }
        redirect("backend/playlist/add");
    }

    public function update() {
       // print_r($_POST);exit;
        $name = trim($this->input->post("name"));
        $name = trim(preg_replace('/\s\s+/', ' ', str_replace("\n", " ", $name)));
        if (!empty($name)) {
            $playlist_id = $this->input->post("id");
            $check = count(explode(" ", $this->input->post("date")));
            if ($check > 1)
                $date = date("Y-m-d H:i:s", strtotime($this->input->post("date")));
            else
                $date = date("Y-m-d H:i:s", strtotime($this->input->post("date") . date("H:i:s")));

            $redirect_link = $this->input->post("redirect_link");
            $show_in_app = $this->input->post("show_in_app");
            $sub_category = $this->input->post('subcat_id');
           
            $data = array("name" => $name, "redirect_link" => $redirect_link,
                "created" => $date,);

            $data = array(
                "name" => $name,
                'redirect_link' => $redirect_link,
                'created' => $date,
                'subcat_id' =>  implode(',', $sub_category),
                'show_in_app' => implode(',', $show_in_app),
                "updated" => date("Y-m-d H:i:s")
            );
            $new_name = str_replace(" ", "-", $name);
            $config = array(
                'upload_path' => "./images/playlistthumb/",
                'allowed_types' => "gif|jpg|png|jpeg",
                'min_width' => 1279,
                'min_height' => 719
            );
            $config['file_name'] = str_replace([".", "@", "$", '%','+'], "", $new_name);
            $this->upload->initialize($config);
            $result = $this->My_model->getbyid("playlist", array("id" => $playlist_id));
            if (!empty($_FILES['file']['name'])) {
                if (!empty($result[0]['playlist_thumb'])) {
                    @unlink("./images/playlistthumb/" . $result[0]['playlist_thumb']);
                    @unlink("./images/playlistthumb/285X160-" . $result[0]['playlist_thumb']);
                }
                if ($this->upload->do_upload("file")) {
                    $updata = array('upload_data' => $this->upload->data());
                    $data['playlist_thumb'] = $updata['upload_data']['file_name'];
                    $this->image_resize_playlist("./images/playlistthumb/" . $updata['upload_data']['file_name']);
                }
            }
            $this->My_model->updatedata("playlist", $data, array("id" => $playlist_id));
            $this->session->set_flashdata("message", "success_Playlist Update Successfully.");
            redirect("backend/playlist/edit?id=" . $playlist_id);
        } else {
            $this->session->set_flashdata("message", "success_Playlist cant Blank.");
            redirect("backend/playlist/add");
        }
    }

    public function status() {
        $id = $this->input->get('id');
        $result = $this->My_model->getbyid("playlist", array("id" => $id));
        if ($result[0]['is_deleted'] == "0") {
            $this->My_model->updatedata("playlist", array("is_deleted" => "1"), array("id" => $id));
            $this->session->set_flashdata("message", "success_Playlist Deleted Successfully.");
        } else {
            $this->My_model->updatedata("playlist", array("is_deleted" => "0"), array("id" => $id));
            $this->session->set_flashdata("message", "success_Playlist Reactive Successfully.");
        }
        redirect("backend/playlist");
    }

    public function delete() {
        $id = $this->input->get('id');
        $result = $this->My_model->getbyid("playlist", array("id" => $id));
        if (!empty($result[0]['playlist_thumb'])) {
            @unlink("./images/playlistthumb/" . $result[0]['playlist_thumb']);
            @unlink("./images/playlistthumb/285X160-" . $result[0]['playlist_thumb']);
        }
        $this->My_model->deletedata("playlist", array("id" => $id));
        $this->session->set_flashdata("message", "success_Playlist Deleted Successfully.");
        redirect("backend/playlist");
    }

    public function create() {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('id');
            $name = $this->input->post('playlist_name');
            $is_exist = $this->My_model->getbyid('playlist', array('name' => $name));
            if (count($is_exist) == 0) {
                $response = $this->My_model->insertdata(array('name' => $name), 'playlist');
                if ($response > 0) {
                    $this->My_model->insertdata(array('video_id' => $id, 'playlist_id' => $response), 'playlist_map_video');
                    die(json_encode(array('response' => true, 'message' => "", 'id' => $response)));
                }
            } else {
                die(json_encode(array('response' => true, 'message' => "Playlist already exist!")));
            }
        }
        die(json_encode(array('response' => false, 'message' => "Somthing wrong")));
    }

    public function add_to() {
        if ($this->input->is_ajax_request()) {
            $video_id = $this->input->post('video_id');
            $playlist_id = $this->input->post('playlist_id');
            $is_exist = $this->My_model->getbyid('playlist_map_video', array('video_id' => $video_id, 'playlist_id' => $playlist_id));
            if (count($is_exist) == 0) {
                $response = $this->My_model->insertdata(array('video_id' => $video_id, 'playlist_id' => $playlist_id), 'playlist_map_video');
                if ($response > 0) {
                    die(json_encode(array('response' => true, 'message' => "")));
                }
            } else {
                die(json_encode(array('response' => true, 'message' => "Video in playlist!")));
            }
        }
        die(json_encode(array('response' => false, 'message' => "Somthing wrong")));
    }

    public function remove_from() {
        if ($this->input->is_ajax_request()) {
            $video_id = $this->input->post('video_id');
            $playlist_id = $this->input->post('playlist_id');
            $response = $this->My_model->deletedata('playlist_map_video', array('video_id' => $video_id, 'playlist_id' => $playlist_id));
            if ($response) {
                die(json_encode(array('response' => true, 'message' => "")));
            } else {
                die(json_encode(array('response' => false, 'message' => "Remove Failed")));
            }
        }
        die(json_encode(array('response' => false, 'message' => "Somthing wrong")));
    }

    public function image_resize_playlist($path, $width = 285, $height = 160) {

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
            redirect("backend/playlist/add");
        }

        rename($pathInfo['dirname'] . "/" . $pathInfo['filename'] . "_thumb." . $pathInfo['extension'], $pathInfo['dirname'] . "/" . $new_name . "." . $pathInfo['extension']);
    }

}
