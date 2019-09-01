<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $total = $this->My_model->getresult("select count(id) as tot from user");
        $totalsubs = $this->My_model->getresult("select count(newsletter.id) as tot from newsletter INNER JOIN user ON user.email=newsletter.email WHERE user.email!=''");
        $this->data['search_year'] = $this->My_model->getresult("select YEAR(user.created) as year from user group by YEAR(user.created) ORDER BY YEAR(user.created) DESC ");
        $this->data['total_subs'] = $totalsubs[0]['tot'];
        $this->data['total'] = $total[0]['tot'];
        $this->data['view_name'] = "user_tb_view.php";
        $this->data['message'] = $this->session->flashdata('message');
        $this->load->view('backend/layout', $this->data);
    }

    public function withdraw() {
        $this->data['view_name'] = "user_withdraw_tb_view.php";
        $this->data['message'] = $this->session->flashdata('message');
        $this->load->view('backend/layout', $this->data);
    }

    public function withdraw_reject() {
        $this->data['view_name'] = "user_withdraw_reject_tb_view.php";
        $this->data['message'] = $this->session->flashdata('message');
        $this->load->view('backend/layout', $this->data);
    }

    public function withdraw_payout() {
        $this->data['view_name'] = "user_withdraw_payout_tb_view.php";
        $this->data['message'] = $this->session->flashdata('message');
        $this->load->view('backend/layout', $this->data);
    }

    public function weekly_winners() {
        $total = $this->My_model->getresult("select count(id) as tot from weekly_winners");
        $this->data['total'] = $total[0]['tot'];
        $this->data['view_name'] = "weekly_winners_tb_view.php";
        $this->data['search_year'] = $this->My_model->getresult("select YEAR(weekly_winners.end_date) as year from weekly_winners group by YEAR(weekly_winners.end_date) ORDER BY YEAR(weekly_winners.end_date) DESC ");
      //  echo "<pre>";print_r($this->data);exit;
        $this->data['message'] = $this->session->flashdata('message');
        $this->load->view('backend/layout', $this->data);
    }

    public function view() {
        $this->data['user_id'] = $this->input->get('id');
        $this->data['view_name'] = "one_user_info_tb_view.php";
        $this->data['message'] = $this->session->flashdata('message');
        $this->load->view('backend/layout', $this->data);
    }

    public function user_list() {
        $columns = array("user.id", 'user.created', 'user.name',
            'user.mobile', 'user.email', 'user.gender',
            'user_points.earn_points', 'user_points.total_video_play', 'user.img',
            'user_points.earn_points', 'user_points.total_invite', 'user_points.total_social_likes',
            'user_points.total_share', 'user_points.totla_frnds_share',
            'user_points.total_likes', 'user_points.total_earn_rs', 'newsletter.id as subscriber'
        );
        $order_columns = array("user.id", 'user.created', 'user.name', 'user.mobile', 'user.email', 'user_points.earn_points', 'user.gender');

        $start_date = $this->input->post('columns')[4]['search']['value'];
        $end_date = $this->input->post('columns')[5]['search']['value'];

        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $video_plays = '(SELECT count(*) FROM `user_activity` where user_activity.user_id = user.id and '
                . 'user_activity.user_activity = "play"';
        if (!empty($start_date) && !empty($end_date)) {
            $video_plays .= ' and date(user_activity.created) >= "' . $start_date . '" AND date(user_activity.created) <= "' . $end_date . '"';
        }
        $video_plays .= ')';
        $where_video_play = '1';
        if ($this->input->post('order')[0]['column'] == 7) {
            $order = $video_plays;
            $where_video_play = $video_plays;
        } else {
            $order = $order_columns[$this->input->post('order')[0]['column']];
        }
        $dir = $this->input->post('order')[0]['dir'];

        $year = $this->input->post('columns')[0]['search']['value'];
        $month = $this->input->post('columns')[1]['search']['value'];
        $search_keyword = $this->input->post('columns')[2]['search']['value'];
        $newsletter = $this->input->post('columns')[3]['search']['value'];
        $where2 = "";

        if (!empty($start_date) && !empty($end_date) && $this->input->post('order')[0]['column'] != 7) {
            $where2.=" AND DATE(user.created) BETWEEN '" . $start_date . "' AND '" . $end_date . "'";
        }

        if (!empty($year)) {
            $where2.=" AND YEAR(user.created) = " . $year;
        }

        if (!empty($month)) {
            $where2.=" AND MONTH(user.created) = " . $month;
        }

        if (!empty($newsletter) && $newsletter == "yes") {
            $where2.=" AND newsletter.email IS NOT NULL";
        } else if (!empty($newsletter) && $newsletter == "no") {
            $where2.=" AND newsletter.email IS NULL";
        }
        $point_share = '(select sum(shared_points) from user_frnd_share where shared_by_id = user.id)';
        $point_receive = '(select sum(shared_points) from user_frnd_share where shared_to_id = user.id)';
        $totalData = $this->My_model->getresult("select count(user.id) as tot from user");
        $totalFiltered = $totalData[0]['tot'];

        if (empty($this->input->post('search')['value']) && empty($year) && empty($month) && empty($search_keyword) && empty($newsletter) && empty($start_date) && empty($end_date)) {
            $posts = $this->My_model->getresult("

               SELECT " . implode(',', $columns) . "," . $video_plays . " as activity_play,
               $point_share as point_share,
               $point_receive as point_receive
               FROM user
               LEFT JOIN user_points ON user.id=user_points.user_id
               LEFT JOIN newsletter ON user.email=newsletter.email
               ORDER BY $order $dir
               LIMIT $start,$limit

            ");
        } else {
            $search = $this->input->post('search')['value'];

            if (!empty($search_keyword)) {
                $search = $search_keyword;
            }

            $where = "where $where_video_play AND";
            $where.=" ( " . implode(" LIKE '%" . $search . "%' OR ", $order_columns) . " LIKE '%" . $search . "%' )";

            $where.=$where2;

            $posts = $this->My_model->getresult("

               SELECT " . implode(',', $columns) . "," . $video_plays . " as activity_play,
               $point_share as point_share,
               $point_receive as point_receive
               FROM user
               LEFT JOIN user_points ON user.id=user_points.user_id
               LEFT JOIN newsletter ON user.email=newsletter.email
               $where
               ORDER BY $order $dir
               LIMIT $start,$limit

            ");

            $totalData = $this->My_model->getresult("select count(user.id) as tot from user
            LEFT JOIN user_points ON user.id=user_points.user_id
            LEFT JOIN newsletter ON user.email=newsletter.email
             $where
            ");
            $totalFiltered = $totalData[0]['tot'];
        }

        $number = ($start + 1);
        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $action = "<a href='" . base_url() . "backend/user/view?id=" . $post['id'] . "' class='icon-view'></a>";
                if ($this->input->post('order')[0]['column'] == 7 && !empty($start_date) && !empty($end_date)) {
                    $is_exist = $this->My_model->getbyid("weekly_winners", array('start_date' => $start_date, 'end_date' => $end_date, 'user_id' => $post['id']));
                    $is_winner = '';
                    if (count($is_exist) > 0) {
                        $is_winner = 'active';
                    }
                    $action .= "<a href='#' onclick='update_winner(this," . $post['id'] . ");return false;' class='icon-trophy " . $is_winner . "'></a>";
                }
                if (!empty($post['img'])) {
                    $img = $post['img'];
                } else {
                    $img = base_url() . 'assets/images/no-user.svg';
                }
                $name = '<img id="videoimg" src="' . $img . '" alt="' . $post['name'] . '" height="20" width="20"><br>';
                $name.="<a href='" . base_url() . "backend/user/view?id=" . $post['id'] . "'>" . $post['name'] . "</a>";

                if (!empty($post['subscriber'])) {
                    $subscriber = "YES";
                } else {
                    $subscriber = "NO";
                }

                $nestedData["number"] = $number;
                $nestedData["name"] = $name;
                $nestedData["email"] = $post['email'];
                $nestedData["gender"] = $post['gender'];
                $nestedData["point"] = $post['earn_points'];
                $nestedData["mobile"] = $post['mobile'];
                $nestedData["total_social_likes"] = $post['total_social_likes'];
                $nestedData["total_invite"] = $post['total_invite'];
                $nestedData["total_video_play"] = $post['total_video_play'];
                $nestedData["total_share"] = $post['total_share'];
                $nestedData["activity_play"] = $post['activity_play'];
                $nestedData["totla_frnds_share"] = $post['totla_frnds_share'];
                $nestedData["total_likes"] = $post['total_likes'];
               // $nestedData["total_earn_rs"] = $post['total_earn_rs'];
                $nestedData["total_earn_rs"] = (($post['earn_points'] * 100)/5000);
                $nestedData["subscriber"] = $subscriber;
                $nestedData['point_share'] = $post['point_share'];
                $nestedData['point_receive'] = $post['point_receive'];
                $nestedData["created"] = date("d M Y, h:i A", strtotime($post['created']));
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

    public function user_withdraw_list() {
        $columns = array("user.id", 'user.created', 'user.name',
            'user.mobile', 'user.email', 'user.gender',
            'user_points.earn_points', 'user.img',
            'user_points.earn_points', 'user_points.total_invite', 'user_points.total_social_likes',
            'user_points.total_video_play', 'user_points.total_share', 'user_points.totla_frnds_share',
            'user_points.total_likes', 'user_points.total_earn_rs', 'newsletter.id as subscriber',
            'withdraw_req.id as withdraw_req_id',
            'withdraw_req.created as withdraw_req_date', 'withdraw_req.rupees', 'withdraw_req.message', 'withdraw_req.is_approved',
            'bank_account.acc_type', 'bank_account.paytm_no', 'bank_account.acc_no', 'bank_account.acc_name', 'bank_account.bank',
            'bank_account.branch', 'bank_account.ifsc_code',
        );
        $order_columns = array("user.id", 'withdraw_req.created', 'user.name', 'user.mobile', 'user.email', 'user_points.earn_points', 'user.gender');

        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = $order_columns[$this->input->post('order')[0]['column']];
        $dir = $this->input->post('order')[0]['dir'];

        $year = $this->input->post('columns')[0]['search']['value'];
        $month = $this->input->post('columns')[1]['search']['value'];
        $search_keyword = $this->input->post('columns')[2]['search']['value'];

        $where2 = "";

        if (!empty($year)) {
            $where2.=" AND YEAR(user.created) = " . $year;
        }

        if (!empty($month)) {
            $where2.=" AND MONTH(user.created) = " . $month;
        }

        $totalData = $this->My_model->getresult("select count(withdraw_req.id) as tot from withdraw_req where is_approved=0");
        $totalFiltered = $totalData[0]['tot'];

        if (empty($this->input->post('search')['value']) && empty($year) && empty($month) && empty($search_keyword)) {
            $posts = $this->My_model->getresult("
               SELECT " . implode(',', $columns) . " FROM withdraw_req
               LEFT JOIN user_points ON withdraw_req.user_id=user_points.user_id
               LEFT JOIN user ON user.id=withdraw_req.user_id
               LEFT JOIN newsletter ON user.email=newsletter.email
               INNER JOIN bank_account ON bank_account.id=withdraw_req.account_id
               where is_approved=0 
               ORDER BY $order $dir
               LIMIT $start,$limit
            ");
        } else {
            $search = $this->input->post('search')['value'];

            if (!empty($search_keyword)) {
                $search = $search_keyword;
            }

            $where = "where is_approved=0 AND";
            $where.=" ( " . implode(" LIKE '%" . $search . "%' OR ", $order_columns) . " LIKE '%" . $search . "%' )";

            $where.=$where2;

            $posts = $this->My_model->getresult("
               SELECT " . implode(',', $columns) . " FROM withdraw_req
               LEFT JOIN user_points ON withdraw_req.user_id=user_points.user_id
               LEFT JOIN user ON user.id=withdraw_req.user_id
               LEFT JOIN newsletter ON user.email=newsletter.email
               INNER JOIN bank_account ON bank_account.id=withdraw_req.account_id
               $where
               ORDER BY $order $dir
               LIMIT $start,$limit
            ");

            $totalData = $this->My_model->getresult("SELECT count(withdraw_req.id) FROM withdraw_req
               LEFT JOIN user_points ON withdraw_req.user_id=user_points.user_id
               LEFT JOIN user ON user.id=withdraw_req.user_id
               LEFT JOIN newsletter ON user.email=newsletter.email
             $where
            ");
            $totalFiltered = $totalData[0]['tot'];
        }

        $number = ($start + 1);
        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $action = "<a href='" . base_url() . "backend/user/view?id=" . $post['id'] . "' class='icon-view'></a>";
                if (!empty($post['img'])) {
                    $img = $post['img'];
                } else {
                    $img = base_url() . 'assets/images/no-user.svg';
                }
                $name = '<img id="videoimg" src="' . $img . '" alt="' . $post['name'] . '" height="20" width="20"><br>';
                $name.="<a href='" . base_url() . "backend/user/view?id=" . $post['id'] . "'>" . $post['name'] . "</a>";

                if (!empty($post['subscriber'])) {
                    $subscriber = "YES";
                } else {
                    $subscriber = "NO";
                }

                $nestedData["number"] = $number;
                $nestedData["name"] = $name;
                $nestedData["email"] = $post['email'];
                $nestedData["gender"] = $post['gender'];
                $nestedData["point"] = $post['earn_points'];
                $nestedData["mobile"] = $post['mobile'];
                $nestedData["total_social_likes"] = $post['total_social_likes'];
                $nestedData["total_invite"] = $post['total_invite'];
                $nestedData["total_video_play"] = $post['total_video_play'];
                $nestedData["total_share"] = $post['total_share'];
                $nestedData["totla_frnds_share"] = $post['totla_frnds_share'];
                $nestedData["total_likes"] = $post['total_likes'];
                //$nestedData["total_earn_rs"] = $post['total_earn_rs'];
                $nestedData["total_earn_rs"] = (($post['earn_points'] * 100 )/5000);
                //$nestedData["rupees"] = $post['rupees'];
                $nestedData["rupees"] =(($post['earn_points'] * 100 )/5000);
                $nestedData["message"] = $post['message'];
                $nestedData["is_approved"] = $post['is_approved'];
                $nestedData["acc_type"] = $post['acc_type'];
                $nestedData["paytm_no"] = $post['paytm_no'];
                $nestedData["acc_no"] = $post['acc_no'];
                $nestedData["acc_name"] = $post['acc_name'];
                $nestedData["bank"] = $post['bank'];
                $nestedData["branch"] = $post['branch'];
                $nestedData["ifsc_code"] = $post['ifsc_code'];
                $nestedData["withdraw_req_id"] = $post['withdraw_req_id'];
                $nestedData["subscriber"] = $subscriber;
                $nestedData["created"] = date("d M Y, h:i:s A", strtotime($post['withdraw_req_date']));
                $nestedData["withdraw_req_date"] = date("d M Y, h:i A", strtotime($post['withdraw_req_date']));
                $nestedData["action"] = $action;
                $point_share=  $this->db->query('select sum(shared_points) from user_frnd_share where shared_by_id = "'.$post['id'].'"')->row();
               $point_receive=  $this->db->query('select sum(shared_points) from user_frnd_share where shared_to_id = "'.$post['id'].'"')->row();
               if($point_share->shared_points != null)
               {
                    $nestedData['point_share'] = $point_share->shared_points;
                    $nestedData['point_receive']  = $point_receive->shared_points;
               }
               else
               {
                    $nestedData['point_share'] = 0;
                    $nestedData['point_receive']  =0;
               }
                
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

    public function user_withdraw_reject_list() {
        $columns = array("user.id", 'user.created', 'user.name',
            'user.mobile', 'user.email', 'user.gender',
            'user_points.earn_points', 'user.img',
            'user_points.earn_points', 'user_points.total_invite', 'user_points.total_social_likes',
            'user_points.total_video_play', 'user_points.total_share', 'user_points.totla_frnds_share',
            'user_points.total_likes', 'user_points.total_earn_rs', 'newsletter.id as subscriber',
            'withdraw_req.id as withdraw_req_id',
            'withdraw_req.created as withdraw_req_date', 'withdraw_req.rupees', 'withdraw_req.message', 'withdraw_req.is_approved',
            'bank_account.acc_type', 'bank_account.paytm_no', 'bank_account.acc_no', 'bank_account.acc_name', 'bank_account.bank',
            'bank_account.branch', 'bank_account.ifsc_code', 'withdraw_req.updated'
        );
        $order_columns = array("user.id", 'withdraw_req.updated', 'user.name', 'user.mobile', 'user.email', 'user_points.earn_points', 'user.gender');

        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = $order_columns[$this->input->post('order')[0]['column']];
        $dir = $this->input->post('order')[0]['dir'];

        $year = $this->input->post('columns')[0]['search']['value'];
        $month = $this->input->post('columns')[1]['search']['value'];
        $search_keyword = $this->input->post('columns')[2]['search']['value'];

        $start_date = $this->input->post('columns')[4]['search']['value'];
        $end_date = $this->input->post('columns')[5]['search']['value'];

        $where2 = "";
        if (!empty($start_date) && !empty($end_date)) {
            $where2.=" AND DATE(withdraw_req.updated) BETWEEN '" . $start_date . "' AND '" . $end_date . "'";
        }

        if (!empty($year)) {
            $where2.=" AND YEAR(user.created) = " . $year;
        }

        if (!empty($month)) {
            $where2.=" AND MONTH(user.created) = " . $month;
        }

        $totalData = $this->My_model->getresult("select count(withdraw_req.id) as tot from withdraw_req where is_approved=2");
        $totalFiltered = $totalData[0]['tot'];

        if (empty($this->input->post('search')['value']) && empty($year) && empty($month) && empty($search_keyword)) {
            $posts = $this->My_model->getresult("
               SELECT " . implode(',', $columns) . " FROM withdraw_req
               LEFT JOIN user_points ON withdraw_req.user_id=user_points.user_id
               INNER JOIN user ON user.id=withdraw_req.user_id
               LEFT JOIN newsletter ON user.email=newsletter.email
               INNER JOIN bank_account ON bank_account.id=withdraw_req.account_id 
               where is_approved=2 
               ORDER BY $order $dir
               LIMIT $start,$limit
            ");
        } else {
            $search = $this->input->post('search')['value'];

            if (!empty($search_keyword)) {
                $search = $search_keyword;
            }

            $where = "where is_approved=2 AND";
            $where.=" ( " . implode(" LIKE '%" . $search . "%' OR ", $order_columns) . " LIKE '%" . $search . "%' )";

            $where.=$where2;

            $posts = $this->My_model->getresult("
               SELECT " . implode(',', $columns) . " FROM withdraw_req
               LEFT JOIN user_points ON withdraw_req.user_id=user_points.user_id
               INNER JOIN user ON user.id=withdraw_req.user_id
               LEFT JOIN newsletter ON user.email=newsletter.email
               INNER JOIN bank_account ON bank_account.id=withdraw_req.account_id               
               $where
               ORDER BY $order $dir
               LIMIT $start,$limit
            ");

            $totalData = $this->My_model->getresult("SELECT count(withdraw_req.id) FROM withdraw_req
               LEFT JOIN user_points ON withdraw_req.user_id=user_points.user_id
               INNER JOIN user ON user.id=withdraw_req.user_id
               LEFT JOIN newsletter ON user.email=newsletter.email
             $where
            ");
            $totalFiltered = $totalData[0]['tot'];
        }

        $number = ($start + 1);
        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $action = "<a href='" . base_url() . "backend/user/view?id=" . $post['id'] . "' class='icon-view'></a>";
                if (!empty($post['img'])) {
                    $img = $post['img'];
                } else {
                    $img = base_url() . 'assets/images/no-user.svg';
                }
                $name = '<img id="videoimg" src="' . $img . '" alt="' . $post['name'] . '" height="20" width="20"><br>';
                $name.="<a href='" . base_url() . "backend/user/view?id=" . $post['id'] . "'>" . $post['name'] . "</a>";

                if (!empty($post['subscriber'])) {
                    $subscriber = "YES";
                } else {
                    $subscriber = "NO";
                }

                $nestedData["number"] = $number;
                $nestedData["name"] = $name;
                $nestedData["email"] = $post['email'];
                $nestedData["gender"] = $post['gender'];
                $nestedData["point"] = $post['earn_points'];
                $nestedData["mobile"] = $post['mobile'];
                $nestedData["total_social_likes"] = $post['total_social_likes'];
                $nestedData["total_invite"] = $post['total_invite'];
                $nestedData["total_video_play"] = $post['total_video_play'];
                $nestedData["total_share"] = $post['total_share'];
                $nestedData["totla_frnds_share"] = $post['totla_frnds_share'];
                $nestedData["total_likes"] = $post['total_likes'];
               // $nestedData["total_earn_rs"] = $post['total_earn_rs'];
                 $nestedData["total_earn_rs"] = (($post['earn_points'] * 100)/5000);
                //$nestedData["rupees"] = $post['rupees'];
                 $nestedData["rupees"] =(($post['earn_points'] * 100)/5000);
                $nestedData["message"] = $post['message'];
                $nestedData["is_approved"] = $post['is_approved'];
                $nestedData["acc_type"] = $post['acc_type'];
                $nestedData["paytm_no"] = $post['paytm_no'];
                $nestedData["acc_no"] = $post['acc_no'];
                $nestedData["acc_name"] = $post['acc_name'];
                $nestedData["bank"] = $post['bank'];
                $nestedData["branch"] = $post['branch'];
                $nestedData["ifsc_code"] = $post['ifsc_code'];
                $nestedData["withdraw_req_id"] = $post['withdraw_req_id'];
                $nestedData["subscriber"] = $subscriber;
                $nestedData["created"] = date("d M Y, h:i:s A", strtotime($post['updated']));
                $nestedData["withdraw_req_date"] = date("d M Y, h:i A", strtotime($post['withdraw_req_date']));
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

    public function user_withdraw_payout_list() {
        $columns = array("user.id", 'user.created', 'user.name',
            'user.mobile', 'user.email', 'user.gender',
            'user_points.earn_points', 'user.img',
            'user_points.earn_points', 'user_points.total_invite', 'user_points.total_social_likes',
            'user_points.total_video_play', 'user_points.total_share', 'user_points.totla_frnds_share',
            'user_points.total_likes', 'user_points.total_earn_rs', 'newsletter.id as subscriber',
            'withdraw_req.id as withdraw_req_id',
            'withdraw_req.created as withdraw_req_date', 'withdraw_req.rupees', 'withdraw_req.message', 'withdraw_req.is_approved',
            'bank_account.acc_type', 'bank_account.paytm_no', 'bank_account.acc_no', 'bank_account.acc_name', 'bank_account.bank',
            'bank_account.branch', 'bank_account.ifsc_code',
        );
        $order_columns = array("user.id", 'withdraw_req.updated', 'user.name', 'user.mobile', 'user.email', 'user_points.earn_points', 'user.gender');

        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = $order_columns[$this->input->post('order')[0]['column']];
        $dir = $this->input->post('order')[0]['dir'];

        $year = $this->input->post('columns')[0]['search']['value'];
        $month = $this->input->post('columns')[1]['search']['value'];
        $search_keyword = $this->input->post('columns')[2]['search']['value'];

        $start_date = $this->input->post('columns')[4]['search']['value'];
        $end_date = $this->input->post('columns')[5]['search']['value'];

        $where2 = "";
        if (!empty($start_date) && !empty($end_date)) {
            $where2.=" AND DATE(withdraw_req.updated) BETWEEN '" . $start_date . "' AND '" . $end_date . "'";
        }
        if (!empty($year)) {
            $where2.=" AND YEAR(user.created) = " . $year;
        }

        if (!empty($month)) {
            $where2.=" AND MONTH(user.created) = " . $month;
        }

        $totalData = $this->My_model->getresult("select count(withdraw_req.id) as tot from withdraw_req where is_approved=1");
        $totalFiltered = $totalData[0]['tot'];

        if (empty($this->input->post('search')['value']) && empty($year) && empty($month) && empty($search_keyword)) {
            $posts = $this->My_model->getresult("
               SELECT " . implode(',', $columns) . " FROM withdraw_req
               LEFT JOIN user_points ON withdraw_req.user_id=user_points.user_id
               INNER JOIN user ON user.id=withdraw_req.user_id
               LEFT JOIN newsletter ON user.email=newsletter.email
               INNER JOIN bank_account ON bank_account.id=withdraw_req.account_id 
               where is_approved=1 
               ORDER BY $order $dir
               LIMIT $start,$limit
            ");
        } else {
            $search = $this->input->post('search')['value'];

            if (!empty($search_keyword)) {
                $search = $search_keyword;
            }

            $where = "where is_approved=1 AND";
            $where.=" ( " . implode(" LIKE '%" . $search . "%' OR ", $order_columns) . " LIKE '%" . $search . "%' )";

            $where.=$where2;

            $posts = $this->My_model->getresult("
               SELECT " . implode(',', $columns) . " FROM withdraw_req
               LEFT JOIN user_points ON withdraw_req.user_id=user_points.user_id
               INNER JOIN user ON user.id=withdraw_req.user_id
               LEFT JOIN newsletter ON user.email=newsletter.email
               INNER JOIN bank_account ON bank_account.id=withdraw_req.account_id               
               $where
               ORDER BY $order $dir
               LIMIT $start,$limit
            ");

            $totalData = $this->My_model->getresult("SELECT count(withdraw_req.id) FROM withdraw_req
               LEFT JOIN user_points ON withdraw_req.user_id=user_points.user_id
               INNER JOIN user ON user.id=withdraw_req.user_id
               LEFT JOIN newsletter ON user.email=newsletter.email
             $where
            ");
            $totalFiltered = $totalData[0]['tot'];
        }

        $number = ($start + 1);
        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $action = "<a href='" . base_url() . "backend/user/view?id=" . $post['id'] . "' class='icon-view'></a>";
                if (!empty($post['img'])) {
                    $img = $post['img'];
                } else {
                    $img = base_url() . 'assets/images/no-user.svg';
                }
                $name = '<img id="videoimg" src="' . $img . '" alt="' . $post['name'] . '" height="20" width="20"><br>';
                $name.="<a href='" . base_url() . "backend/user/view?id=" . $post['id'] . "'>" . $post['name'] . "</a>";

                if (!empty($post['subscriber'])) {
                    $subscriber = "YES";
                } else {
                    $subscriber = "NO";
                }

                $nestedData["number"] = $number;
                $nestedData["name"] = $name;
                $nestedData["email"] = $post['email'];
                $nestedData["gender"] = $post['gender'];
                $nestedData["point"] = $post['earn_points'];
                $nestedData["mobile"] = $post['mobile'];
                $nestedData["total_social_likes"] = $post['total_social_likes'];
                $nestedData["total_invite"] = $post['total_invite'];
                $nestedData["total_video_play"] = $post['total_video_play'];
                $nestedData["total_share"] = $post['total_share'];
                $nestedData["totla_frnds_share"] = $post['totla_frnds_share'];
                $nestedData["total_likes"] = $post['total_likes'];
                //$nestedData["total_earn_rs"] = $post['total_earn_rs'];
                $nestedData["total_earn_rs"] = (($post['earn_points'] * 100)/5000);
                //$nestedData["rupees"] = $post['rupees'];
                $nestedData["rupees"] = (($post['earn_points'] * 100)/5000);
                $nestedData["message"] = $post['message'];
                $nestedData["is_approved"] = $post['is_approved'];
                $nestedData["acc_type"] = $post['acc_type'];
                $nestedData["paytm_no"] = $post['paytm_no'];
                $nestedData["acc_no"] = $post['acc_no'];
                $nestedData["acc_name"] = $post['acc_name'];
                $nestedData["bank"] = $post['bank'];
                $nestedData["branch"] = $post['branch'];
                $nestedData["ifsc_code"] = $post['ifsc_code'];
                $nestedData["withdraw_req_id"] = $post['withdraw_req_id'];
                $nestedData["subscriber"] = $subscriber;
                $nestedData["created"] = date("d M Y, h:i:s A", strtotime($post['updated']));
                $nestedData["withdraw_req_date"] = date("d M Y, h:i A", strtotime($post['withdraw_req_date']));
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

    public function weekly_winners_list() {
        $columns = array("user.id", 'user.created', 'user.name',
            'user.mobile', 'user.email', 'user.gender',
            'user.img', 'weekly_winners.start_date', 'weekly_winners.end_date',
            'weekly_winners.user_id', 'weekly_winners.winning_prize', 'weekly_winners.id as winner_id',
        );
        $columns_search = array('user.created', 'user.name',
            'user.mobile', 'user.email', 'user.gender',
            'user.img', 'weekly_winners.start_date', 'weekly_winners.end_date',
            'weekly_winners.winning_prize'
        );
        
        $limit = $this->input->post('length');
        $year = $this->input->post('year');
        $start = $this->input->post('start');
        $video_plays = '(SELECT count(*) FROM `user_activity` where user_activity.user_id = weekly_winners.user_id and '
                . 'user_activity.user_activity = "play")';
        $order = "weekly_winners.end_date";
        $dir = 'desc';
        $search_keyword = $this->input->post('columns')[2]['search']['value'];
        $where2 = " 1 ";
        if (!empty($year)) {
            $where2.=" AND YEAR(weekly_winners.end_date) = " . $year;
        }
        $totalData = $this->My_model->getresult("SELECT count(weekly_winners.id) as tot FROM weekly_winners               
               INNER JOIN user ON user.id=weekly_winners.user_id where " . $where2);
        $totalFiltered = $totalData[0]['tot'];

        if (empty($this->input->post('search')['value']) && empty($search_keyword)) {
            $posts = $this->My_model->getresult("SELECT " . implode(',', $columns) . " FROM weekly_winners               
               INNER JOIN user ON user.id=weekly_winners.user_id where " . $where2 . " ORDER BY $order $dir , $video_plays $dir
               LIMIT $start,$limit");
        } else {
            $search = $this->input->post('search')['value'];
            if (!empty($search_keyword)) {
                $search = $search_keyword;
            }
            $where = "where ";
            $where.= ($where2 != '') ? $where2 . " AND " : $where2;
            if ($search != '') {
                $where.= " ( " . implode(" LIKE '%" . $search . "%' OR ", $columns_search) . " LIKE '%" . $search . "%' )";
            }
            $posts = $this->My_model->getresult("SELECT " . implode(',', $columns) . " FROM weekly_winners               
               INNER JOIN user ON user.id=weekly_winners.user_id 
               $where ORDER BY $order $dir , $video_plays $dir
               LIMIT $start,$limit"
            );

            $totalData = $this->My_model->getresult("SELECT count(weekly_winners.id) as tot FROM weekly_winners               
               INNER JOIN user ON user.id=weekly_winners.user_id
             $where
            ");
            $totalFiltered = $totalData[0]['tot'];
        }

        $number = 1;
        $data = array();
        if (!empty($posts)) {
            $weeks_arr = array();
            foreach ($posts as $post) {
                if (!in_array($post['end_date'], $weeks_arr)) {
                    $nestedData["number"] = (count($weeks_arr) + 1) . " week " . date('Y M d',strtotime($post['end_date']));
                    $nestedData["name"] = '';
                    $nestedData["email"] = '';
                    $nestedData["gender"] = '';
                    $nestedData["mobile"] = '';
                    $nestedData["rs"] = '';
                    $nestedData["action"] = '';
                    $data[] = $nestedData;
                    array_push($weeks_arr, $post['end_date']);
                    $number = 1;
                }
                $rs = '<a ondblclick="get_update(' . $post['winner_id'] . ');return false;" data-value="' . $post['winner_id'] . '" style="cursor:pointer;">' . $post['winning_prize'] . '</a><input style="width: 100%;display:none;" onblur="update_prize(this);return;" name="prize' . $post['winner_id'] . '" value="' . $post['winning_prize'] . '" />';
                $action = '<a onclick=\'remove_winner("' . $post['winner_id'] . '","' . $post['end_date'] . '");return false;\' class="icon-delete"></a>';
                if (!empty($post['img'])) {
                    $img = $post['img'];
                } else {
                    $img = base_url() . 'assets/images/no-user.svg';
                }
                $name = '<img id="videoimg" src="' . $img . '" alt="' . $post['name'] . '" height="20" width="20"><br>';
                $name.="<a href='" . base_url() . "backend/user/view?id=" . $post['id'] . "'>" . $post['name'] . "</a>";

                if (!empty($post['subscriber'])) {
                    $subscriber = "YES";
                } else {
                    $subscriber = "NO";
                }

                $nestedData["number"] = $number;
                $nestedData["name"] = $name;
                $nestedData["email"] = $post['email'];
                $nestedData["gender"] = $post['gender'];
                $nestedData["mobile"] = $post['mobile'];
                $nestedData["rs"] = $rs;
                $nestedData["action"] = $action;
                $data[] = $nestedData;
                $number++;
            }
        }
        $output = array(
            "draw" => intval($this->input->post('draw')),
            "recordsTotal" => intval($totalData) + count($weeks_arr),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data,
        );
        $csrf_name = $this->security->get_csrf_token_name();
        $csrf_hash = $this->security->get_csrf_hash();
        $output[$csrf_name] = $csrf_hash;
        //output to json format
        echo json_encode($output);
    }

    function get_one_user_info() {
        $columns = array("user.id", 'user.created', 'user.name',
            'user.mobile', 'user.email', 'user.gender',
            'user_points.earn_points', 'user_points.total_video_play', 'user.img',
            'user_points.earn_points', 'user_points.total_invite', 'user_points.total_social_likes',
            'user_points.total_share', 'user_points.totla_frnds_share',
            'user_points.total_likes', 'user_points.total_earn_rs', 'newsletter.id as subscriber'
        );
        $user_id = $this->input->post('user_id');
        $video_plays = '(SELECT count(*) FROM `user_activity` where user_activity.user_id = user.id and '
                . 'user_activity.user_activity = "play")';
        $totalData = $this->My_model->getresult("select count(user.id) as tot from user where user.id = " . $user_id);
        $totalFiltered = $totalData[0]['tot'];
        $posts = $this->My_model->getresult("
               SELECT " . implode(',', $columns) . ",$video_plays as activity_play,
                (select sum(shared_points) from user_frnd_share where shared_by_id = user.id) as point_share,
                (select sum(shared_points) from user_frnd_share where shared_to_id = user.id) as point_receive 
                FROM user
               LEFT JOIN user_points ON user.id=user_points.user_id
               LEFT JOIN newsletter ON user.email=newsletter.email
               where user.id = $user_id        
            ");
        $withdraw_req = $this->My_model->getresult("SELECT withdraw_req.id as withdraw_req_id,
            withdraw_req.created as withdraw_req_date,withdraw_req.rupees,withdraw_req.message,withdraw_req.is_approved,
            bank_account.acc_type,bank_account.paytm_no,bank_account.acc_no,bank_account.acc_name,bank_account.bank,
            bank_account.branch,bank_account.ifsc_code FROM withdraw_req
            LEFT JOIN user_points ON withdraw_req.user_id=user_points.user_id            
            INNER JOIN bank_account ON bank_account.id=withdraw_req.account_id
            where is_approved=1 and withdraw_req.user_id = " . $user_id);
        $number = 1;
        $data = array();
        if (!empty($posts)) {
            $withdraw_history = '<table cellpadding="5" cellspacing="0" border="0" style="margin:0;width: 50%;">';
            if (count($withdraw_req) > 0) {
                foreach ($withdraw_req as $withdraw_req_value) {
                    if ($withdraw_req_value['acc_type'] == 'paytm') {
                        $title = 'BY PAYTM: ';
                        $by = $withdraw_req_value['paytm_no'];
                    } else {
                        $title = 'BY BANK: ';
                        $space = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                        $by = 'Account Number:' . $withdraw_req_value['acc_no'] . '<br>' . space .
                                ' Name: ' . $withdraw_req_value['acc_name'] . '<br>' . space .
                                ' Bank: ' . $withdraw_req_value['bank'] . '<br>' . space .
                                ' Branch: ' . $withdraw_req_value['branch'] . '<br>' . space .
                                ' IFSC Code: ' . $withdraw_req_value['ifsc_code'];
                    }
                    $withdraw_history .= '<tr><td><strong>WITHDRAW HISTORY : </strong>(Point ' . $withdraw_req_value['point'] . ') '
                            . '(Rs.' . $withdraw_req_value['rupees'] . ') ' . date("d M Y, h:i A", strtotime($withdraw_req_value['withdraw_req_date'])) . '</td>'
                            . '</tr><tr><td><strong>' . title . ' </strong>' . by . '</td></tr>';
                }
            }
            $withdraw_history .= '</table>';

            foreach ($posts as $post) {
                if (!empty($post['img'])) {
                    $img = $post['img'];
                } else {
                    $img = base_url() . 'assets/images/no-user.svg';
                }
                $name = '<img id="videoimg" src="' . $img . '" alt="' . $post['name'] . '" height="20" width="20"><br>';
                $name.=$post['name'];

                if (!empty($post['subscriber'])) {
                    $subscriber = "YES";
                } else {
                    $subscriber = "NO";
                }

                $nestedData["number"] = $number;
                $nestedData["name"] = $name;
                $nestedData["email"] = $post['email'];
                $nestedData["gender"] = $post['gender'];
                $nestedData["point"] = $post['earn_points'];
                $nestedData["mobile"] = $post['mobile'];
                $nestedData["total_social_likes"] = $post['total_social_likes'];
                $nestedData["total_invite"] = $post['total_invite'];
                $nestedData["total_video_play"] = $post['total_video_play'];
                $nestedData["total_share"] = $post['total_share'];
                $nestedData["activity_play"] = $post['activity_play'];
                $nestedData["totla_frnds_share"] = $post['totla_frnds_share'];
                $nestedData["total_likes"] = $post['total_likes'];
                //$nestedData["total_earn_rs"] = $post['total_earn_rs'];
                $nestedData["total_earn_rs"] = (($post['earn_points'] * 100)/5000);
                $nestedData['point_share'] = (!empty($post['point_share'])) ? $post['point_share'] : 0;
                $nestedData['point_receive'] = (!empty($post['point_receive'])) ? $post['point_receive'] : 0;
                $nestedData["subscriber"] = $subscriber;
                $nestedData['withdraw_history'] = $withdraw_history;
                $nestedData["created"] = date("d M Y, h:i A", strtotime($post['created']));

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

    function user_activity() {
        $html = '';
        $likes = array();
        $plays = array();
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('user_id');
            if (is_numeric($id)) {
                $user = $this->My_model->getresult("SELECT * from user where user.id = " . $id);
                if (count($user) > 0) {
                    $user = $user[0];
                    $html .= '
                            <div class="list">
                                <ul>
                                    <li class="title-bar">WITHDRAWAL HISTORY</li> ';
                                    $withdrawls_history = $this->My_model->getresult("select withdraw_req.*, user_points.earn_points from  withdraw_req join user_points on user_points.user_id = withdraw_req.user_id where withdraw_req.user_id = '" . $id . "' and withdraw_req.is_approved=1");     
                                     if (count($withdrawls_history) > 0) {
                                        foreach ($withdrawls_history as $withdrwals) {
                                           // $html .= '<li>Rs. ' . $withdrals['winning_prize'] . '<span>' . date("d M Y", strtotime($weekly_win['created'])) . '</span></li>';
                                            $account_info = $this->db->get_where('bank_account',array('id'=>$withdrwals['account_id']))->row();
                                            //print_r($acc_type);exit;
                                            $html .= '<li>(Point ' . $withdrwals['earn_points'] . ') '
                            . '(Rs.' . (($withdrwals['earn_points'] *100)/5000) . ') '  . '<span>' . date("d M Y, h:i A", strtotime($withdrwals['created'])) . '</span>';
                                        if($account_info->acc_type == 'paytm')
                                        {
                                            $html.= '<span>By Paytm :'.$account_info->paytm_no.' </span>';
                                        }
                                        else
                                        {
                                            $html.= '<span>By Bank : </span>';
                                            $html.= '<span>Account No:'.$account_info->acc_no.' </span>';
                                            $html.= '<span>Name:'.$account_info->acc_name.' </span>';
                                            $html.= '<span>Bank:'.$account_info->bank.' </span>';
                                            $html.= '<span>Branch:'.$account_info->branch.' </span>';
                                            $html.= '<span>IFSC Code:'.$account_info->ifsc_code.' </span>';
                                            
                                           

                                        }
                                            $html .= '</li>';
                                        }
                                    }  
                               $html .='<br>

                                     <li class="title-bar">WEEKLY WINNERS</li>';  

                                     $weekly_wins = $this->My_model->getresult("select * from weekly_winners where user_id = '" . $id . "'");     
                                     if (count($weekly_wins) > 0) {
                                        foreach ($weekly_wins as $weekly_win) {
                                            $html .= '<li>Rs. ' . $weekly_win['winning_prize'] . '<span>' . date("d M Y", strtotime($weekly_win['created'])) . '</span></li>';
                                        }
                                    }                            
                               $html.='</ul>
                            </div>
                            <div class="list">
                                <ul>
                                    <li class="title-bar">INVITE FRIENDS</li>';
                    if ($user['share_code'] != '') {
                        $invite_friends = $this->My_model->getresult("select * from user where shared_code = '" . $user['share_code'] . "'");
                        if (count($invite_friends) > 0) {
                            foreach ($invite_friends as $invite_friends_value) {
                                $html .= '<li>' . $invite_friends_value['name'] . '<span>' . date("d M Y, h:i A", strtotime($invite_friends_value['created'])) . '</span></li>';
                            }
                        }
                    }
                    $html .= '</ul>
                        </div>
                        <div class="list">
                            <ul>
                                <li class="title-bar">POINT SHARE</li>';
                    $points_share = $this->My_model->getresult("select name,mobile,shared_points,user_frnd_share.created from user_frnd_share inner join user on user.id = shared_to_id where shared_by_id = '" . $id . "'");
                    if (count($points_share) > 0) {
                        foreach ($points_share as $points_share_value) {
                            $html .= '<li>' . $points_share_value['name'] . ' ' . $points_share_value['mobile'] . '<span>Point ' . $points_share_value['shared_points'] . '</span><span>' . date("d M Y, h:i A", strtotime($points_share_value['created'])) . '</span></li>';
                        }
                    }
                    $html .= '</ul>
                        </div>
                        <div class="list">
                            <ul>
                                <li class="title-bar">POINT RECEIVE</li>';
                    $points_receive = $this->My_model->getresult("select name,mobile,shared_points,user_frnd_share.created from user_frnd_share inner join user on user.id = shared_by_id where shared_to_id = '" . $id . "'");
                    if (count($points_receive) > 0) {
                        foreach ($points_receive as $points_receive_value) {
                            $html .= '<li>' . $points_receive_value['name'] . ' ' . $points_receive_value['mobile'] . '<span>Point ' . $points_receive_value['shared_points'] . '</span><span>' . date("d M Y, h:i A", strtotime($points_receive_value['created'])) . '</span></li>';
                        }
                    }
                    $html .= '</ul></div>';
                }
            }
        }
        die(json_encode(array('data' => $html, 'likes' => $likes, 'plays' => $plays)));
    }

    function user_likes() {
        $id = $this->input->post('user_id');
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        
        $created = "user_activity.created";
        $name = '(case when (cat_id = 1 OR cat_id = 2) then '
                . '(select video.video_name from video where video.id = user_activity.common_id) '
                . 'when cat_id = 3 then (select poster.poster_name from poster where poster.id = user_activity.common_id) '
                . 'else "" end)';
        $category = '(case when cat_id = 1 then "Trailer" when cat_id = 2 then "Video" when cat_id = 3 then "Poster" else "" end)';
        $where = "";
        if (!empty($start_date) && !empty($end_date)) {
            $where = $created . " BETWEEN " . $start_date . " and " . $end_date;
        }
        $search_keyword = $this->input->post('search')['value'];
        if (!empty($search_keyword)) {
            $search = $search_keyword;
        }
        if ($search != '') {
            $where.=" AND ( " . implode(" LIKE '%" . $search . "%' OR ", array($created, $name, $category)) . " LIKE '%" . $search . "%' )";
        }

        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        if ($this->input->post('order')[0]['column'] == 1) {
            $order = $created;
        } elseif ($this->input->post('order')[0]['column'] == 2) {
            $order = $name;
        } elseif ($this->input->post('order')[0]['column'] == 3) {
            $order = $category;
        }
        $dir = $this->input->post('order')[0]['dir'];
        $posts = $this->My_model->getresult('SELECT ' . $created . ' as created,' . $name . ' as name,' . $category . ' as category'
                . ' FROM `user_activity` where user_activity = "liked" and user_id = ' . $id
                . $where
                . ' ORDER BY ' . $order . ' ' . $dir
                . ' LIMIT ' . $start . ',' . $limit
        );
        $totalData = $this->My_model->getresult('select count(user_activity.id) as tot FROM `user_activity` where user_activity = "liked" and user_id = ' . $id);

        $totalFiltered = $totalData[0]['tot'];
        $number = ($start + 1);
        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $nestedData["number"] = $number;
                $nestedData["name"] = $post['name'];
                $nestedData["category"] = $post['category'];
                $nestedData["created"] = date("d M Y, h:i A", strtotime($post['created']));
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

    function user_plays() {
        $id = $this->input->post('user_id');
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        
        $created = "user_activity.created";
        $name = 'video.video_name';
        $category = 'sub_category.subcat_name';
        $where = "";
        $search_keyword = $this->input->post('search')['value'];
        $search = '';
        if (!empty($search_keyword)) {
            $search = $search_keyword;
        }
        if (!empty($start_date) && !empty($end_date)) {
            $where = $created . " BETWEEN " . $start_date . " and " . $end_date;
        }
        if ($search != '') {
            $where.=" AND ( " . implode(" LIKE '%" . $search . "%' OR ", array($created, $name, $category)) . " LIKE '%" . $search . "%' )";
        }
        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        if ($this->input->post('order')[0]['column'] == 1) {
            $order = $created;
        } elseif ($this->input->post('order')[0]['column'] == 2) {
            $order = $name;
        } elseif ($this->input->post('order')[0]['column'] == 3) {
            $order = $category;
        }
        $dir = $this->input->post('order')[0]['dir'];
        $posts = $this->My_model->getresult('select ' . $created . ' as created,' . $name . ' as name,' . $category . ' as category FROM `user_activity` '
                . 'INNER JOIN video on video.id = common_id '
                . 'left JOIN sub_category on sub_category.id = video.subcat_id '
                . 'where user_activity = "play" and user_activity.cat_id in (1,2) and user_id = ' . $id
                . $where
                . ' ORDER BY ' . $order . ' ' . $dir
                . ' LIMIT ' . $start . ',' . $limit
        );
        $totalData = $this->My_model->getresult('select count(*) as tot FROM `user_activity` where user_activity = "play" and user_id = ' . $id);

        $totalFiltered = $totalData[0]['tot'];
        $number = ($start + 1);
        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $nestedData["number"] = $number;
                $nestedData["name"] = $post['name'];
                $nestedData["category"] = $post['category'];
                $nestedData["created"] = date("d M Y, h:i A", strtotime($post['created']));
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

    function update_withdraw_approval() {
        $is_updated = false;
        if ($this->input->is_ajax_request()) {
            $message = $this->input->post('approval_message');
            $action = $this->input->post('action');
            $withdraw_id = $this->input->post('withdraw_req_id');
            $data = array('is_approved' => $action, 'message' => $message);
            $response = $this->My_model->updatedata("withdraw_req", $data, array("id" => $withdraw_id));
            if ($response) {
                $is_updated = true;
            }
        }
        die(json_encode(array('is_updated' => $is_updated)));
    }

    function update_weekly_winner() {
        $is_updated = false;
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('id');
            $start_date = $this->input->post('start_date');
            $end_date = $this->input->post('end_date');
            $is_win = $this->input->post('is_win');
            $data = array('start_date' => $start_date, 'end_date' => $end_date, 'user_id' => $id);
            if ($is_win == 1) {
                $is_exist = $this->My_model->getbyid("weekly_winners", $data);
                if (count($is_exist) == 0) {
                    $response = $this->My_model->insertdata($data, "weekly_winners");
                }
            } else if ($is_win == 0) {
                $response = $this->My_model->deletedata("weekly_winners", $data);
            }
            if ($response) {
                $is_updated = true;
            }
        }
        die(json_encode(array('is_updated' => $is_updated)));
    }

    function update_winning_prize() {
        $is_updated = false;
        if ($this->input->is_ajax_request()) {
            $winning_prize = $this->input->post('winning_prize');
            $winner_id = $this->input->post('winner_id');
            $data = array('start_date' => $start_date, 'end_date' => $end_date, 'user_id' => $id);
            $response = $this->My_model->updatedata("weekly_winners", array('winning_prize' => $winning_prize), array("id" => $winner_id));
            if ($response) {
                $is_updated = true;
            }
        }
        die(json_encode(array('is_save' => $is_updated)));
    }

    function remove_winner() {
        $is_updated = false;
        if ($this->input->is_ajax_request()) {
            $user_id = $this->input->post('user_id');
            $winner_id = $this->input->post('winner_id');
            $response = $this->My_model->deletedata("weekly_winners", array('id' => $winner_id));
            if ($response) {
                $is_updated = true;
            }
        }
        die(json_encode(array('is_save' => $is_updated)));
    }

}
