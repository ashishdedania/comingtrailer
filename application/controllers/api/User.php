<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH . 'libraries/REST_Controller.php');

class User extends REST_Controller {

    function __construct() {
        parent::__construct();
        $printarray = array();
        $err_code = CODE_INVALID_SERVICE;
        $message = "";
        $result = false;
        $this->auth = new stdClass;
        $this->load->helper('cookie');
        $this->load->model('my_model');
    }

    function activityFavourite_post() {
        $user_id = $this->input->post('user_id');
        $activity = $this->input->post('activity');
        $category_id = $this->input->post('category_id');
        $common_id = $this->input->post('common_id');
        if (!isset($user_id) || !isset($activity) || !isset($category_id) || !isset($common_id)) {
            $message = 'Invalid api call or parameter missing.';
            $err_code = CODE_PARAM_MISSING;
            $result = false;
        } else {
            $is_user_exist = $this->My_model->getresult("SELECT * from user where id = " . $user_id . " limit 1");
            if (count($is_user_exist) > 0) {
                if ($category_id == 3) {
                    $is_exist = $this->My_model->getresult("SELECT * from poster where id = " . $common_id . " limit 1 ");
                } else {
                    $is_exist = $this->My_model->getresult("SELECT * from video where id = " . $common_id . " limit 1 ");
                }

              //  print_r($is_exist);exit;
                if (count($is_exist) > 0) 
                {
                    if ($activity == 'favourite') 
                    {
                        $is_activity_exist = $this->db->get_where('user_activity', array('user_id' => $user_id, 'cat_id' => $category_id, 'user_activity' => 'liked', 'common_id' => $common_id))->result_array();
//print_r(count($is_activity_exist));exit;
                        if (count($is_activity_exist) == 0) 
                        {
                            $response = $this->my_model->insertdata(array('user_id' => $user_id, 'cat_id' => $category_id,
                                'user_activity' => 'liked',
                                'common_id' => $common_id,'created' => date('Y-m-d H:i:s')), 'user_activity');
                            
                            if ($category_id == 3) 
                            {
                                $update_data['likes'] = $is_exist[0]['likes'] + 1;
                                $this->db->update('poster',$update_data,array('id'=>$common_id));
                            } 
                            else 
                            {
                               $update_data['liked'] = $is_exist[0]['liked'] + 1;
                               $this->db->update('video',$update_data,array('id'=>$common_id));
                            }
                            $message = 'successfully liked';
                            
                        } 
                        else 
                        {
                            $message = "You already like this one";
                            $response = true;
                        }
                    } 
                    else 
                    {
                        $response = $this->my_model->deletedata('user_activity', array('user_id' => $user_id,
                            'cat_id' => $category_id,
                            'common_id' => $common_id,
                            'user_activity' => 'liked'));
                        
                        if ($category_id == 3) 
                        {
                            $update_data['likes'] = $is_exist[0]['likes'] - 1;
                            $this->db->update('poster',$update_data,array('id'=>$common_id));
                        } 
                        else 
                        {
                            $update_data['liked'] = $is_exist[0]['liked'] - 1;
                           $this->db->update('video',$update_data,array('id'=>$common_id));
                        }
                          $message = 'successfully unliked';
                    }
                   // $message = '';
                    $result = true;
                    if (isset($response) && $response == false) {
                        $message = 'Operation failed Please try again!';
                        $result = false;
                    }
                    $err_code = CODE_OK;
                } else {
                    if ($category_id == 3) {
                        $message = 'Poster not available!';
                    } else if ($category_id == 1) {
                        $message = 'Trailer not available!';
                    } else {
                        $message = 'Video song not available!';
                    }
                    $result = false;
                    $err_code = CODE_OK;
                }
            } else {
                $message = 'User not found!';
                $result = false;
                $err_code = CODE_OK;
            }
        }
        $printarray['result'] = $result;
        $printarray['message'] = $message;
        $printarray['errorCode'] = $err_code;
        $this->response($printarray);
    }

    public function earn_points_post()
    {
        if(isset($_POST['common_id']) && $_POST['common_id'] != "" && isset($_POST['type']) && $_POST['type'] != "" && isset($_POST['user_id']) && $_POST['user_id'] != "" )
        {
            $user_activity = (array)$this->db->get_where('user_activity',array('user_id'=>$_POST['user_id'],'common_id'=>$_POST['common_id'],'user_activity'=>'play'))->row();
            if(empty($user_activity))
            {
                $data['user_id'] = $_POST['user_id'];
                $data['cat_id'] = ($_POST['type'] == 'video') ? 1 : 2;
                $data['common_id'] = $_POST['common_id'];
                $data['user_activity'] = 'play';
                $data['shared_with'] ="";
                $points = (array)$this->db->get_where('points',array('points_for'=>'play'))->row();
                $data['earn_points'] = $points['points'];
                $data['created'] =date('Y-m-d H:i:s');
                $this->db->insert('user_activity',$data);

                $user_earned = (array)$this->db->get_where('user_points',array('user_id'=>$_POST['user_id']))->row();

                $update_data['earn_points'] = $user_earned['earn_points'] + $points['points'];
                $update_data['total_video_play'] = $user_earned['total_video_play'] + 1;

                $this->db->update('user_points',$update_data,array('user_id'=>$_POST['user_id']));

                $video_info = (array)$this->db->get_where('video',array('id'=>$_POST['common_id']))->row();
                $update_data_video['play'] = $video_info['play'] + 1;

                $this->db->update('video',$update_data_video,array('id'=>$_POST['common_id']));
                $result = true;
                $err_code = CODE_OK;
                $message = "earn point successfully";
            }
            else
            {
                $result = false;
                $err_code = CODE_OK;
                $message = "you already earned points with this one ";
            }

        }
        else
        {
            $result = false;
            $err_code = CODE_OK;
            $message = "Paramater missing";
        }
        $printarray['result'] = $result;
        $printarray['message'] = $message;
        $printarray['errorCode'] = $err_code;
        $this->response($printarray);
    }

    function weeklyWinner_get() {
        $previous_week = strtotime("-1 week +1 day");

        $start_week = strtotime("last monday midnight",$previous_week);
        $end_week = strtotime("next sunday",$start_week);

        $start_week = date("Y-m-d",$start_week);
        $end_week = date("Y-m-d",$end_week);
       
        $printarray['data'] = $this->My_model->getresult("SELECT user.name,user.img as image,weekly_winners.winning_prize,weekly_winners.start_date as week_start_date,weekly_winners.end_date as week_end_date FROM `weekly_winners` inner join user on user.id = weekly_winners.user_id where (weekly_winners.start_date between '".$start_week."' and '".$end_week."') ");
        $printarray['result'] = TRUE;
        $printarray['message'] = "";
        $printarray['errorCode'] = CODE_OK;
        $this->response($printarray);
    }

    function updateProfile_post() { 
    	$this->load->model('front_model');
        $user_id = $this->input->post('user_id');
        if (!isset($user_id)) {
            $message = 'Invalid api call or parameter missing.';
            $err_code = CODE_PARAM_MISSING;
            $result = false;
        } else {
            $is_user_exist = $this->My_model->getresult("SELECT * from user where id = " . $user_id . " limit 1");
            if (count($is_user_exist) > 0) {
                $response = $this->front_model->update_user_profile();
                if (!empty($response)) {
                    $printarray['data'] = $response;
                    $message = '';
                    $result = true;
                    $err_code = CODE_OK;

                    if (!empty($_FILES['profile_image']['name'])) 
                    {
                        $config['upload_path'] = 'images/user/';
                        $config['allowed_types'] = 'jpg|jpeg|png|gif|JPG';
                        $config['file_name'] = $user_id . '-' . $_FILES['profile_image']['name'];

                        //Load upload library and initialize configuration
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config); 
                        if ($this->upload->do_upload('profile_image')) {
                            $uploadData = $this->upload->data();
                            $imgpath = base_url('images/user/' . $uploadData['file_name']);

                            //update that user img
                            $this->db->where('id', $is_user_exist[0]['id']);
                            $this->db->update('user', array('img' => $imgpath));


                            $profile = str_replace(base_url('images/user/'),'',$printarray['data']['img']);
                            if (@getimagesize('images/user/' . $profile)) {
                                unlink('images/user/' . $profile);
                            }

                            


                            $printarray['data']['img'] = $imgpath;


                            
                        }

                    }


                    


                } else {
                    $message = 'User updation failed!';
                    $result = false;
                    $err_code = CODE_OK;
                }
            } else {
                $message = 'User not found!';
                $result = false;
                $err_code = CODE_OK;
            }
        }


        





        $printarray['result'] = $result;
        $printarray['message'] = $message;
        $printarray['errorCode'] = $err_code;
        $this->response($printarray);
    }

    function adSense_get() {
        $printarray['result'] = $this->My_model->getresult("SELECT adsense.*,concat('" . base_url() . "images/jaherat',img_name) as img_name from adsense where media = 'A'");
        $printarray['result'] = TRUE;
        $printarray['message'] = "";
        $printarray['errorCode'] = CODE_OK;
        $this->response($printarray);
    }

    function rewardHistory_post() {
        $user_id = $this->input->post('user_id');
        $page = $this->input->post('page');
        if (!isset($user_id)) {
            $message = 'Invalid api call or parameter missing.';
            $err_code = CODE_PARAM_MISSING;
            $result = false;
        } else {
            $is_user_exist = $this->My_model->getresult("SELECT * from user where id = " . $user_id . " limit 1");
            if (count($is_user_exist) > 0) {
                $offset = (isset($page) && $page > 0) ? ($page * API_RECORD_LIMIT) : 0;
                $limit = " LIMIT $offset," . API_RECORD_LIMIT . "";

                $play = $this->WebService->getUserLiked($user_id, 0, 0, "play", $offset, 100);
                $data_result = json_decode($play); 
                $i = 0;
                foreach ($data_result as $key) {
                    $data1[$i] = $key;
                    $i++;
                }
                $printarray['data'] =$data_result;
                $message = '';
                $result = true;
                $err_code = CODE_OK;
            } else {
                $message = 'User not found!';
                $result = false;
                $err_code = CODE_OK;
            }
        }
        $printarray['result'] = $result;
        $printarray['message'] = $message;
        $printarray['errorCode'] = $err_code;
        $this->response($printarray);
    }

    function rewardPoints_post() {
        $user_id = $this->input->post('user_id');
        if (!isset($user_id)) {
            $message = 'Invalid api call or parameter missing.';
            $err_code = CODE_PARAM_MISSING;
            $result = false;
        } else {
            $is_user_exist = $this->My_model->getresult("SELECT * from user where id = " . $user_id . " limit 1");
            if (count($is_user_exist) > 0) {
                $data = $this->Adm_userdata_model->getOnePaiedUserData($user_id);
                $rr =  $data->row_array();
                $printarray['data'] = $rr;  
                $printarray['data']['point_share'] =$rr['totla_frnds_share'];
                $r_point = (array)$this->db->query('select sum(shared_points) as point from user_frnd_share where shared_to_id = '.$user_id)->row();
                $printarray['data']['point_receive'] = $r_point['point'];
                $printarray['data']['total_earn_rs'] = ($rr['earn_points'] * 2) / 100 ;
                $with_his = $this->My_model->getresult("select withdraw_req.*, user_points.earn_points from  withdraw_req join user_points on user_points.user_id = withdraw_req.user_id where withdraw_req.user_id = '" . $user_id . "' and withdraw_req.is_approved=1"); 
                $k = 0;
                error_reporting(1);
                foreach ($with_his as $key) {
                    $row[$k] = $key;
                    $account_info = $this->db->get_where('bank_account',array('id'=>$key['account_id']))->row();
                    if($account_info->acc_type == 'paytm')
                    {
                        $row[$k]['account_type']='paytm';
                        $row[$k]['account_no']=$account_info->paytm_no;
                    }
                    else
                    {
                        $row[$k]['account_type']='bank';
                        $row[$k]['account_no']=$account_info->acc_no;
                        $row[$k]['name']=$account_info->acc_name;
                        $row[$k]['bank']=$account_info->bank;
                        $row[$k]['branch']=$account_info->branch;
                        $row[$k]['ifsc']=$account_info->ifsc_code;
                    }
                    $row[$k]['rupees'] = ($key['earn_points'] * 2 ) / 100;
                    $k++;
                }
                $printarray['data']['withdrawls_history'] = $row;

                $weekly_wins = $this->My_model->getresult("select * from weekly_winners where user_id = '" . $user_id . "'");     
                if (count($weekly_wins) > 0) 
                {
                    $l = 0;
                    foreach ($weekly_wins as $weekly_win) 
                    {
                        $weekly[$l] = $weekly_win;
                        $l++;
                    }
                }
                $printarray['data']['weekly_winners'] = $weekly;
                 
                $printarray['data']['total_video_play'] = $this->db->get_where('user_activity',array('user_activity'=>'play','user_id'=>$user_id))->num_rows();
                $message = '';
                $result = true;
                $err_code = CODE_OK;
            } else {
                $message = 'User not found!';
                $result = false;
                $err_code = CODE_OK;
            }
        }
        $printarray['result'] = $result;
        $printarray['message'] = $message;
        $printarray['errorCode'] = $err_code;
        $this->response($printarray);
    }

    function favorite_post() {
        $user_id = $this->input->post('user_id');
        $mtsp_type = $this->input->post('mtsp_type');
        $mtsp_id = $this->input->post('mtsp_id');
        if (!isset($user_id) || !isset($mtsp_id) || !isset($mtsp_type)) {
            $message = 'Invalid api call or parameter missing.';
            $err_code = CODE_PARAM_MISSING;
            $result = false;
        } else {
            $data_details = $this->db->get_where('favorite',array('user_id'=>$user_id,'mtsp_type'=>$mtsp_type,'mtsp_id'=>$mtsp_id))->num_rows();
            if($data_details > 0)
            {
                $this->db->delete('favorite',array('user_id'=>$user_id,'mtsp_type'=>$mtsp_type,'mtsp_id'=>$mtsp_id));
                $message ="remove favorite successfull";
                $result = true;
                $err_code = CODE_OK;
            }
            else
            {
                $data['user_id'] = $user_id;
                $data['mtsp_id'] = $mtsp_id;
                $data['mtsp_type'] = $mtsp_type;
                $data['created_date'] = date('Y-m-d H:i:s');
                $this->db->insert('favorite',$data);
                $message = 'add in favourite successfull';
                $result = true;
                $err_code = CODE_OK;
            }
            
        }
        $printarray['result'] = $result;
        $printarray['message'] = $message;
        $printarray['errorCode'] = $err_code;
        $this->response($printarray);
    }

    function requestWithdraw_post() {
        $email = $this->input->post('email');
        $mobile = $this->input->post('mobile');
        $points = $this->input->post('point');
        $type = $this->input->post('type'); //'paytm','bank';


        if (!isset($mobile) || (!isset($type) && !in_array($type, array('paytm', 'bank')))) {
            $message = 'Invalid api call or parameter missing.';
            $err_code = CODE_PARAM_MISSING;
            $result = false;
        } else {
            $user_id = $this->Adm_userdata_model->getUserIDnew($email, $mobile);
                       

            if ($user_id > 0) {

                if($this->Adm_userdata_model->isWithdrawProgress($user_id))
                {

                    $message = 'withdraw request is already in progress please wait to finish it!';
                    $result = false;
                    $err_code = CODE_OK;

                }
                else
                {

                    $data = array();
                    if ($type == 'bank') {
                        $acc_no = $this->input->post('account_no');
                        $acc_name = $this->input->post('account_name');
                        $bank = $this->input->post('bank_name');
                        $branch = $this->input->post('branch_add');
                        $ifsc_code = $this->input->post('ifsc_code');
                        $data['user_id'] = $user_id;
                        $data['acc_no'] = $acc_no;
                        $data['acc_name'] = $acc_name;
                        $data['bank'] = $bank;
                        $data['branch'] = $branch;
                        $data['ifsc_code'] = $ifsc_code;
                    } else if ($type == 'paytm') {
                        $data['user_id'] = $user_id;
                        $data['paytm_no'] = $mobile;
                        $data['acc_type'] = $type;
                        $data['points'] = $points;
                    }
                    if (!empty($data)) {
                        //$is_inserted = $this->Adm_userdata_model->setWithdrawReq($user_id, $data, 'bank_account');
                        //if ($is_inserted) {
                            $data = array('user_id'=>$user_id,'rupees' => '','points'=>$points,
                                'is_approved' => '', 'message' => '', 'account_id' => ''); 
                            $is_inserted = $this->Adm_userdata_model->setWithdrawReq($user_id, $data, 'withdraw_req');
                            $message = 'Got your withdraw request, we will send your money within 24 hours';
                            $result = TRUE;
                        //} else { 
                        //    $message = 'Something went wrong please try again';
                        //    $result = false;
                        //}
                    } else {
                        $message = 'Something went wrong please try again';
                        $result = false;
                    }
                    $err_code = CODE_OK;


                }




                
            } else {
                $message = 'User not found!';
                $result = false;
                $err_code = CODE_OK;
            }
        }
        $printarray['result'] = $result;
        $printarray['message'] = $message;
        $printarray['errorCode'] = $err_code;
        $this->response($printarray);
    }

    function share_point_frnd_post() {
        $points = $this->input->post('points');
        $email = $this->input->post('email');
        $mobile = $this->input->post('mobile');
        $user_id = $this->input->post('user_id'); //'paytm','bank';                
        if (!isset($mobile) || (!isset($email) )) {
            $message = 'Invalid api call or parameter missing.';
            $err_code = CODE_PARAM_MISSING;
            $result = false;
        } else {
            $r_user_info = (array)$this->db->query('SELECT * from user where email = "'.$email.'" and mobile = "'.$mobile.'" ')->row();
           // print_r($r_user_info);exit;
            if (!empty($r_user_info))
            {
            	$s_user_info = (array)$this->db->get_where('user_points',array('user_id'=>$user_id))->row();
            	if($s_user_info['earn_points'] >= $points)
            	{
            		$s_user_point =  $s_user_info['earn_points'] - $points;
	            	$update_data_s['earn_points']  = $s_user_point;
	            	$update_data_s['totla_frnds_share'] = $s_user_info['totla_frnds_share'] + $points;
	            	$this->db->update('user_points',$update_data_s,array('user_id'=>$user_id));

	            	$r_user_info = (array)$this->db->get_where('user_points',array('user_id'=>$r_user_info['id']))->row();
	            	$r_user_point = $r_user_info['earn_points'] + $points;
	            	$update_data_r['earn_points']  = $r_user_point;
	            	//$update_data_r['totla_frnds_share'] = $points;
	            	$this->db->update('user_points',$update_data_r,array('user_id'=>$r_user_info['id']));


	            	$transaction['shared_by_id'] = $user_id;
	            	$transaction['shared_to_id'] = $r_user_info['id'];
	            	$transaction['shared_points'] = $points;
	            	$transaction['created'] = date('Y-m-d H:i:s'); 
	            	
	            	$this->db->insert('user_frnd_share',$transaction);

	            	$message = 'Points shared successfully to your friend.';
	                $result = true;
	                $err_code = CODE_OK;
            	}
            	else
            	{
            		$message = 'Not enough points to share.';
	                $result = false;
	                $err_code = CODE_OK;
            	}
            } 
            else 
            {
                $message = 'User not found!';
                $result = false;
                $err_code = CODE_OK;
            }
        }
        $printarray['result'] = $result;
        $printarray['message'] = $message;
        $printarray['errorCode'] = $err_code;
        $this->response($printarray);
    }

    function payout_post() {
        $user_id = $this->input->post('user_id');
        if (!isset($user_id)) {
            $message = 'Invalid api call or parameter missing.';
            $err_code = CODE_PARAM_MISSING;
            $result = false;
        } else {
            $is_user_exist = $this->My_model->getresult("SELECT * from user where id = " . $user_id . " limit 1");
            if (count($is_user_exist) > 0) {
                $payout = $this->My_model->getresult("
               SELECT user.id,user.created,user.name,user.mobile,user.email,user.gender,
            user_points.earn_points,user.img,user_points.total_invite,user_points.total_social_likes,
            user_points.total_video_play,user_points.total_share,user_points.totla_frnds_share,
            user_points.total_likes,user_points.total_earn_rs,newsletter.id as subscriber,
            withdraw_req.id as withdraw_req_id,withdraw_req.created as withdraw_req_date,
            withdraw_req.rupees,withdraw_req.message,withdraw_req.is_approved,bank_account.acc_type,
            bank_account.paytm_no,bank_account.acc_no,bank_account.acc_name,bank_account.bank,
            bank_account.branch,bank_account.ifsc_code FROM withdraw_req
               LEFT JOIN user_points ON withdraw_req.user_id=user_points.user_id
               INNER JOIN user ON user.id=withdraw_req.user_id
               LEFT JOIN newsletter ON user.email=newsletter.email
               INNER JOIN bank_account ON bank_account.id=withdraw_req.account_id 
               where is_approved=1");
                $printarray['data'] = $payout;
                $message = '';
                $result = true;
                $err_code = CODE_OK;
            } else {
                $message = 'User not found!';
                $result = false;
                $err_code = CODE_OK;
            }
        }
        $printarray['result'] = $result;
        $printarray['message'] = $message;
        $printarray['errorCode'] = $err_code;
        $this->response($printarray);
    }

}
