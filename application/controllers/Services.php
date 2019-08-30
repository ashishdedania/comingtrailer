<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Services
 *
 * @author yoo
 */
class Services extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('WebService');
        $this->load->model('Adm_userdata_model');
        $this->load->model('Front_Model');
    }

    public function index() {
        
    }

    public function setShare() {

        $user_id = $this->input->post('user_id');
        $video_id = $this->input->post('video_id');
        $cat_id = $this->input->post('cat_id');
        $shared_with = $this->input->post('share_with');

        if (isset($user_id) && isset($video_id) && isset($cat_id) && isset($shared_with)) {

            $activity = 'share';

            $this->WebService->setSharing($user_id, $cat_id, $activity, $video_id, $shared_with);

            $data = array('status' => 0, 'msg' => 'Success', 'message' => 'Successfully shared');
        } else {
            $data = array('status' => 1, 'msg' => 'Error', 'message' => 'Parameter missing');
        }

        echo json_encode($data);
    }

    public function setLike() {
        $user_id = $this->input->post('user_id');

        $video_id = $this->input->post('video_id');
        $cat_id = $this->input->post('cat_id');
        $isLike = $this->input->post('isLike');

        if ($isLike == 'true') {
            $activity = 'liked';
        } else {

            $activity = 'disliked';
        }

        if (isset($user_id) && isset($video_id) && isset($cat_id)) {
            $this->WebService->setIsLike($user_id, $cat_id, $activity, $video_id);

            if ($isLike == 'true') {
                $data = array('status' => 0, 'msg' => 'Success', 'message' => 'Liked successfully');
            } else {
                $data = array('status' => 0, 'msg' => 'Success', 'message' => 'DisLiked successfully');
            }
        } else {
            $data = array('status' => 1, 'msg' => 'Error', 'message' => 'Parameter missing');
        }

        echo json_encode($data);
    }

    public function setSocialRewardPoints() {

        $user_id = $this->input->post('user_id');
        $shared_with = $this->input->post('shared_with');
        $action = $this->input->post('action');

        if (isset($user_id) && isset($shared_with) && isset($action)) {
            if ($action == 'share') {
                $action = 'social_share';
            } else if ($action == 'follow') {
                $action = 'social_follow';
            } else if ($action == 'subscribe') {
                $action = 'social_subscribe';
            }
            $activity = '' . $action;

            $this->WebService->setSocialMediaLikes($user_id, $activity, $shared_with, 0, $cat_id = 1);

            $this->getSocialReward();
        } else {
            $data = array('status' => 1, 'msg' => 'Error', 'message' => 'Parameter missing');

            echo json_encode($data);
        }
    }

    public function getSocialReward() {

        $user_id = $this->input->post('user_id');
        if (isset($user_id)) {
            $social = array("Facebook", "Twitter", "Google+", "Instagram", "Youtube", "Dailymotion", "Pintrest");

            foreach ($social as $value) {
                $isshared = false;
                $isfollowed = false;
                $total_my_points = '';
                if ($value == 'Youtube') {
                    $isshared = $this->WebService->getSocialRewardPoints($user_id, "social_subscribe", $value, $common_id = 0, $cat_id = 1);
                    $total_my_points = 550;
                    $isfollowed = false;
                } else if ($value == 'Dailymotion') {
                    $isshared = false;
                    $total_my_points = 150;
                    $isfollowed = $this->WebService->getSocialRewardPoints($user_id, "social_follow", $value, $common_id = 0, $cat_id = 1);
                } else if ($value == 'Pintrest') {
                    $isshared = false;
                    $total_my_points = 150;
                    $isfollowed = $this->WebService->getSocialRewardPoints($user_id, "social_follow", $value, $common_id = 0, $cat_id = 1);
                } else {
                    $total_my_points = 150;
                    $isshared = $this->WebService->getSocialRewardPoints($user_id, "social_share", $value, $common_id = 0, $cat_id = 1);
                    $isfollowed = $this->WebService->getSocialRewardPoints($user_id, "social_follow", $value, $common_id = 0, $cat_id = 1);
                }

                $social_data[] = array('social_type' => $value, 'total_points' => $total_my_points, 'flag1' => $isshared, 'flag2' => $isfollowed);
            }

            $data = array('status' => 0, 'msg' => 'Success', 'message' => 'data get successfully', 'data' => $social_data);
        } else {
            $data = array('status' => 1, 'msg' => 'Error', 'message' => 'Parameter missing');
        }

        echo json_encode($data);
    }

    public function setFCMToken() {
        $fcm_token = $this->input->post('fcm_token');

        if (isset($fcm_token)) {
            $data = $this->WebService->setFCMToken($fcm_token);
        } else {
            $data = array('status' => 1, 'msg' => 'Error', 'message' => 'Parameter missing');
        }

        echo json_encode($data);
    }

    public function inviteFriend() {
        $user_id = $this->input->post('user_id');
        $invite_code = $this->input->post('invited_code');

        if (isset($user_id) && isset($invite_code)) {
            $data = $this->WebService->setFriendInvite($user_id, $invite_code);
        } else {
            $data = array('status' => 1, 'msg' => 'Error', 'message' => 'Parameter missing');
        }

        echo json_encode($data);
    }

    public function login() {

        $name = trim($this->input->post('name'));
        $mobile = trim($this->input->post('mobile'));
        $email = trim($this->input->post('email'));
        $gender = trim($this->input->post('gender'));
        $img = trim($this->input->post('img'));
        $social_media = $this->input->post('social_media');
        $social_media_id = trim($this->input->post('social_media_id'));

        if (($name != '') && ($gender != '') && ($img != '') && ($social_media != '') && ($social_media_id != '')
        ) {

            $user_row = $this->WebService->loginSocialMedia();

            $data = array('status' => 0, 'msg' => 'Success', 'message' => 'Suucessfully logged in', 'data' => json_decode($user_row));
        } else {
            $data = array('status' => 1, 'msg' => 'Error', 'message' => 'Parameter missing');
        }

        echo json_encode($data);
    }

    public function setVideoPlay() {

        $user_id = $this->input->post('user_id');

        $video_id = $this->input->post('video_id');
        $cat_id = $this->input->post('cat_id');

        $user_activity = 'play';
        if (isset($user_id) && isset($video_id) && isset($cat_id)) {

            $this->WebService->setViewVideo($user_id, $user_activity, $video_id, $cat_id);

            $data = array('status' => 0, 'msg' => 'Success', 'message' => 'Successfully video played');
        } else {
            $data = array('status' => 1, 'msg' => 'Error', 'message' => 'Parameter missing');
        }

        echo json_encode($data);
    }

    public function setVideoPlayPoint() {

        $user_id = $this->input->post('user_id');

        $video_id = $this->input->post('video_id');
        $cat_id = $this->input->post('cat_id');

        $activity = 'play';
        if (isset($user_id) && isset($video_id) && isset($cat_id)) {

            $this->WebService->setViewPlay($user_id, $activity, $video_id, $cat_id);

            $data = array('status' => 0, 'msg' => 'Success', 'message' => 'Point has beed added for Successfully video played');
        } else {
            $data = array('status' => 1, 'msg' => 'Error', 'message' => 'Parameter missing');
        }

        echo json_encode($data);
    }

    public function getIsLiked() {
        $user_id = $this->input->post('user_id');

        $video_id = $this->input->post('video_id');
        $cat_id = $this->input->post('cat_id');

        if (isset($user_id) && isset($video_id) && isset($cat_id)) {
            $isliked = $this->WebService->getUserLike($user_id, $video_id, $cat_id);

            $data = array('status' => 0, 'msg' => 'Success', 'message' => 'Successfully get liked', 'isliked' => '' . $isliked);
        } else {
            $data = array('status' => 1, 'msg' => 'Error', 'message' => 'Parameter missing');
        }

        echo json_encode($data);
    }

    public function updateUserProfile() {
        $this->WebService->updateUserProfile();
    }

    public function getRelatedVideo() {


        $video_id = $this->input->post('video_id');
        $cat_id = $this->input->post('cat_id');
        $subcat_id = $this->input->post('subcat_id');

        $start = $this->input->post('page_start');
        $limit = $this->input->post('record_limit');

        if ($start == 0) {
            $limit = $limit + 4;
        }


        if (isset($subcat_id) && isset($video_id) && isset($cat_id) && isset($start) && isset($limit)) {
            $data = $this->WebService->getRelatedVideoAPI($video_id, $cat_id, $subcat_id, $start, $limit);

            // $data = array('status' => 0, 'msg' => 'Success','message'=>'Data get Successfully');
        } else {
            $data = array('status' => 1, 'msg' => 'Error', 'message' => 'Parameter missing');
            $data = json_encode($data);
        }

        echo $data;
    }

    public function getVideoAlbum() {

        $user_id = $this->input->post('user_id');
        $video_id = $this->input->post('video_id');
        $cat_id = $this->input->post('cat_id');

        if (isset($user_id) && isset($video_id) && isset($cat_id)) {
            $data = $this->WebService->getVideoAlbum($user_id, $cat_id, $video_id);
        } else {
            $data = array('status' => 1, 'msg' => 'Error', 'message' => 'Parameter missing');
            $data = json_encode($data);
        }

        echo $data;
    }

    public function getNotificationCount() {

        $user_id = $this->input->post('user_id');
        $trailer_subcat_id = $this->input->post('trailer_enable_cat');
        $video_subcat_id = $this->input->post('video_enable_cat');
        $time = $this->input->post('last_notification_time');


        if (isset($user_id) && isset($trailer_subcat_id) && isset($video_subcat_id) && isset($time)) {
            $data = $this->WebService->getNotificationCountAPI($trailer_subcat_id, $video_subcat_id, $time);
        } else {
            $data = array('status' => 1, 'msg' => 'Error', 'message' => 'Parameter missing');
            $data = json_encode($data);
        }

        echo $data;
    }

    public function getSearching() {
        $user_id = $this->input->post('user_id');
        $search_keywords = $this->input->post('global_search_keyword');
        $_POST['api'] = 'api';

        $start = $this->input->post('page_start');
        $limit = $this->input->post('record_limit');

        if (isset($user_id) && isset($start) && isset($search_keywords) && isset($limit)) {
            $data1 = json_decode($this->Front_Model->searchTrailer($start, $limit, 1));

            $total_record = $data1->total_search_result;
//               print_r($data->video);exit;
            $count = 0;
            foreach ($data1->video as $value) {
                $count++;

                $islike = false;
                if ($user_id > 0) {
                    $islike = $this->WebService->getUserLike($user_id, $value->id, $value->cat_id);
                }
                $video_id = $value->id;
                $subcat_name = $this->WebService->getSubCategory($value->cat_id);
                $mysub_cat = '';
                foreach ($subcat_name as $value1) {

                    if ($value1['sub_id'] == $value->subcat_id) {
                        $mysub_cat = $value1['sub_name'];
                    }
                }
                $seo_url = $this->WebService->getSeoUrl('video_url', $value->seo_url_id);
                if ($value->cat_id == 1) {
                    $cat_name = 'Trailer';
                } else if ($value->cat_id == 2) {
                    $cat_name = 'Video Song';
                }
                $mydata[] = array('video_id' => '' . $value->id, 'cat_id' => '' . $value->cat_id, 'cat_name' => '' . $cat_name, 'subcat_id' => '' . $value->subcat_id, 'subcat_name' => '' . $mysub_cat, 'video_name' => '' . $value->video_name,
                    'video_url' => '' . $value->video_url, 'video_thumb' => '' . base_url() . 'images/videothumb/' . $value->video_thumb, 'video_desc' => '' . $value->video_desc,
                    'release_date' => $value->rel_date, 'total_likes' => '' . $value->liked, 'total_play' => '' . $value->play, 'is_liked' => $islike, 'web_url' => $seo_url);
            }
//              print_r($trailer);exit;
//             
            if ($count > 0) {
                $data = array('status' => 0, 'msg' => 'Success', 'message' => 'data get Successfully', 'data' => $mydata, 'total_trailer' => $count, 'total_record' => $total_record);
            } else {
                $trailer[] = array();
                $data = array('status' => 1, 'msg' => 'Error', 'message' => 'Data is not available', 'data' => $trailer[0], 'total_trailer' => 0, 'total_record' => 0);
            }
        } else {
            $data = array('status' => 1, 'msg' => 'Error', 'message' => 'Parameter missing');
//             $data = json_encode($data);
        }

        echo json_encode($data);
    }

    public function getNotification() {
        $user_id = $this->input->post('user_id');
        $trailer_subcat_id = $this->input->post('trailer_enable_cat');
        $video_subcat_id = $this->input->post('video_enable_cat');

        $start = $this->input->post('page_start');
        $limit = $this->input->post('record_limit');

        if (isset($user_id) && isset($start) && isset($trailer_subcat_id) && isset($video_subcat_id) && isset($limit)) {
            $data = $this->WebService->getNotificationAPI($trailer_subcat_id, $video_subcat_id, $start, $limit);
        } else {
            $data = array('status' => 1, 'msg' => 'Error', 'message' => 'Parameter missing');
            $data = json_encode($data);
        }

        echo $data;
    }

    public function getLikedVideo() {
        $user_id = $this->input->post('user_id');
        $user_activity = 'liked';
        $start = $this->input->post('page_start');
        $limit = $this->input->post('record_limit');

        if (isset($user_id) && isset($user_activity) && isset($start) && isset($limit)) {
            $data = $this->WebService->getUserLiked($user_id, 0, 0, $user_activity, $start, $limit);
        } else {
            $data = array('status' => 1, 'msg' => 'Error', 'message' => 'Parameter missing');
            $data = json_encode($data);
        }

        echo $data;
    }

    public function getRewardHistory() {
        $user_id = $this->input->post('user_id');

        $start = $this->input->post('page_start');
        $limit = $this->input->post('record_limit');

        if (isset($user_id) && isset($start) && isset($limit)) {
            $user_activity = 'play';
            $play = $this->WebService->getUserLiked($user_id, 0, 0, $user_activity, $start, $limit);
            $play = json_decode($play);
//            @$play_data = array('total_trailer'=>$play->total_trailer,'total_record'=>$play->total_record,'video'=>$play->data);
//            print_r($play);exit;
//            $user_activity = 'share';
//            $share = $this->WebService->getUserLiked(0,0,0,$user_activity,$start,$limit);
//            $share = json_decode($share);
//            @$share_data = array('total_trailer'=>$share->total_trailer,'total_record'=>$share->total_record,'video'=>$share->data);
//            $array = array_merge($play->data,$share->data);
            $total_trailer = ($play->total_trailer);
            $total_records = ($play->total_record);

            $data = array('status' => 0, 'msg' => 'Success', 'message' => 'Data get Successfully', 'data' => $play->data, 'total_trailer' => $total_trailer, 'total_record' => $total_records);



//            print_r($array);exit;
        } else {
            $data = array('status' => 1, 'msg' => 'Error', 'message' => 'Parameter missing');
            //$data = json_encode($data);
        }

        echo json_encode($data);
    }

    public function getMyRewards() {

        $user_id = $this->input->post('user_id');

        if (isset($user_id)) {
            $data = $this->Adm_userdata_model->getOnePaiedUserData($user_id);
        } else {
            $data = array('status' => 1, 'msg' => 'Error', 'message' => 'Parameter missing');
        }

        echo json_encode($data->row_array());
    }

    public function paytmWithdraw() {

        $email = $this->input->post('email');
        $mobile = $this->input->post('mobile');
        $type = 'paytm';

        if (isset($email) && isset($mobile)) {
            $user_id = $this->Adm_userdata_model->getUserID($email, $mobile);
            if ($user_id > 0) {
                $data = array('user_id' => '' . $user_id,
                    'paytm_no' => '' . $mobile,
                    'acc_no' => '',
                    'acc_name' => '',
                    'bank' => '',
                    'branch' => '',
                    'ifsc_code' => '',
                    'acc_type' => '' . $type
                );
                $is_inserted = $this->Adm_userdata_model->setWithdrawReq($user_id, $data, 'bank_account');

                if ($is_inserted) {

                    $data = array('user_id' => '' . $user_id,
                        'rupees' => '',
                        'is_approved' => '',
                        'message' => ''
                    );
                    $is_inserted = $this->Adm_userdata_model->setWithdrawReq($user_id, $data, 'withdraw_req');

                    $data = array('status' => 0, 'msg' => 'Success', 'message' => 'Got your withdraw request, we will send your money within 72 hours');
                } else {
                    $data = array('status' => 1, 'msg' => 'Error', 'message' => 'Something went wrong please try again');
                }
            } else {
                $data = array('status' => 1, 'msg' => 'Error', 'message' => 'User with this mobile or email is not exist');
            }
        } else {
            $data = array('status' => 1, 'msg' => 'Error', 'message' => 'Parameter missing');
        }

        echo json_encode($data);
    }

    public function bankWithdraw() {

        $email = $this->input->post('email');
        $mobile = $this->input->post('mobile');
        $type = 'bank';

        if (isset($email) && isset($mobile)) {
            $user_id = $this->Adm_userdata_model->getUserID($email, $mobile);
            if ($user_id > 0) {
                $acc_no = $this->input->post('account_no');
                $acc_name = $this->input->post('account_name');
                $bank = $this->input->post('bank_name');
                $branch = $this->input->post('branch_add');
                $ifsc_code = $this->input->post('ifsc_code');


                $data = array('user_id' => '' . $user_id,
                    'paytm_no' => '',
                    'acc_no' => '' . $acc_no,
                    'acc_name' => '' . $acc_name,
                    'bank' => '' . $bank,
                    'branch' => '' . $branch,
                    'ifsc_code' => '' . $ifsc_code,
                    'acc_type' => '' . $type
                );
                $is_inserted = $this->Adm_userdata_model->setWithdrawReq($user_id, $data, 'bank_account');

                if ($is_inserted) {

                    $data = array('user_id' => '' . $user_id,
                        'rupees' => '',
                        'is_approved' => '',
                        'message' => ''
                    );
                    $is_inserted = $this->Adm_userdata_model->setWithdrawReq($user_id, $data, 'withdraw_req');

                    $data = array('status' => 0, 'msg' => 'Success', 'message' => 'Got your withdraw request, we will send your money within 24 hours');
                } else {
                    $data = array('status' => 1, 'msg' => 'Error', 'message' => 'Something went wrong please try again');
                }
            } else {
                $data = array('status' => 1, 'msg' => 'Error', 'message' => 'User with this mobile or email is not exist');
            }
        } else {
            $data = array('status' => 1, 'msg' => 'Error', 'message' => 'Parameter missing');
        }

        echo json_encode($data);
    }

    public function sharePoints() {

        $user_id = $this->input->post('user_id');
        $email = $this->input->post('email');
        $mobile = $this->input->post('mobile');
        $points = $this->input->post('points');

        if (isset($user_id)) {
            $frnd_id = $this->Adm_userdata_model->getUserID($email, $mobile);
            if ($frnd_id > 0) {

                $created = date('Y-m-d H:i:s');

                $data = array(
                    'shared_by_id' => '' . $user_id,
                    'shared_to_id' => '' . $frnd_id,
                    'shared_points' => '' . $points,
                    'created' => $created
                );
                $is_inserted = $this->Adm_userdata_model->setWithdrawReq($user_id, $data, 'user_frnd_share');

                $this->Adm_userdata_model->updatePointShareData($user_id, $frnd_id, 'user_points', $points);

                $data = array('status' => 0, 'msg' => 'Success', 'message' => 'You are successfully shared points with friend');
            } else {
                $data = array('status' => 1, 'msg' => 'Error', 'message' => 'User with this mobile or email is not exist');
            }
        } else {
            $data = array('status' => 1, 'msg' => 'Error', 'message' => 'Parameter missing');
        }

        echo json_encode($data);
    }

    function update_youtube_views($page = 0) {
        $limit = $page * 1000;
        $video_list = $this->My_model->getresult("select * from video where is_deleted = 0 order by id asc limit $limit,1000");
        if (count($video_list) > 0) {
            foreach ($video_list as $video) {
                $video_ID = str_replace(array('http://www.youtube.com/watch?v=', 'https://www.youtube.com/watch?v=', 'https://youtu.be/', 'http://youtu.be/'), '', $video['video_url']);
                $json = file_get_contents("https://www.googleapis.com/youtube/v3/videos?part=statistics&id=" . $video_ID . "&key=AIzaSyBf-Qpd3MQc2X9Xi_EankK5NBnkudH0PCA");
                if ($json != '') {
                    $jsonData = json_decode($json);
                    if (count($jsonData) > 0) {
                        $views = $jsonData->items[0]->statistics->viewCount;
                        $this->My_model->updatedata('video', array('youtube_views' => $views), array('id' => $video['id']));
                    }
                }
            }
            echo "Updation Success!";
        } else {
            echo "No Records Found";
        }
        die();
    }
    
    // function create_personality() {
        // $list = $this->My_model->getresult("select * from cast where cast.cast_name not in (select personality.personality_name from personality)");
        // foreach ($list as $value) {
        //     $form_data = array('personality_name' => $value['cast_name'],
        //         'personality_title' => $value['cast_title'],
        //         'personality_img' => $value['cast_img'],
        //         'personality_desc' => $value['cast_desc'],
        //         'personality_keywords' => $value['cast_keywords'],
        //         'seo_url_id' => 0,
        //         'is_cast' => 1,
        //         'is_director' => 0,
        //         'is_music_director' => 0,
        //         'is_singer' => 0,
        //         'created' => $value['created'],
        //         'updated' => $value['updated']
        //         );
        //     $this->My_model->insertdata($form_data,'personality');
        // }
        // $list = $this->My_model->getresult("select * from singer where singer.singer_name not in (select personality.personality_name from personality)");
        // foreach ($list as $value) {
        //     $is_exist = $this->My_model->getbyid('personality', array('personality_name' => $value['singer_name']));
        //     if (count($is_exist) == 0) {
        //         $form_data = array('personality_name' => $value['singer_name'],
        //             'personality_title' => (is_null($value['singer_title'])) ? "" : $value['singer_title'],
        //             'personality_img' => $value['singer_img'],
        //             'personality_desc' => $value['singer_desc'],
        //             'personality_keywords' => $value['singer_keywords'],
        //             'seo_url_id' => 0,
        //             'is_cast' => 0,
        //             'is_director' => 0,
        //             'is_music_director' => 0,
        //             'is_singer' => 1,
        //             'created' => $value['created'],
        //             'updated' => $value['updated']
        //         );
        //         $this->My_model->insertdata($form_data, 'personality');
        //     } else {                
        //         $this->My_model->updatedata('personality', array('is_singer' => 1), array('id' => $is_exist[0]['id']));
        //     }
        // }
        // $list = $this->My_model->getresult("select * from director where director.director_name not in (select personality.personality_name from personality)");
        // foreach ($list as $value) {
        //     $is_exist = $this->My_model->getbyid('personality', array('personality_name' => $value['director_name']));
        //     if (count($is_exist) == 0) {
        //         $form_data = array('personality_name' => $value['director_name'],
        //             'personality_title' => (is_null($value['director_title'])) ? "" : $value['director_title'],
        //             'personality_img' => $value['director_img'],
        //             'personality_desc' => $value['director_desc'],
        //             'personality_keywords' => $value['director_keywords'],
        //             'seo_url_id' => 0,
        //             'is_cast' => 0,
        //             'is_director' => 1,
        //             'is_music_director' => 0,
        //             'is_singer' => 0,
        //             'created' => $value['created'],
        //             'updated' => $value['updated']
        //         );
        //         $this->My_model->insertdata($form_data, 'personality');
        //     } else {                
        //         $this->My_model->updatedata('personality', array('is_director' => 1), array('id' => $is_exist[0]['id']));
        //     }
        // }

        // $list = $this->My_model->getresult("select * from music where music.music_name not in (select personality.personality_name from personality)");
        // foreach ($list as $value) {
        //     $is_exist = $this->My_model->getbyid('personality', array('personality_name' => $value['music_name']));
        //     if (count($is_exist) == 0) {
        //         $form_data = array('personality_name' => $value['music_name'],
        //             'personality_title' => (is_null($value['music_title'])) ? "" : $value['music_title'],
        //             'personality_img' => $value['music_img'],
        //             'personality_desc' => (is_null($value['music_desc'])) ? "" : $value['music_desc'],
        //             'personality_keywords' => $value['music_keywords'],
        //             'seo_url_id' => 0,
        //             'is_cast' => 0,
        //             'is_director' => 0,
        //             'is_music_director' => 1,
        //             'is_singer' => 0,
        //             'created' => $value['created'],
        //             'updated' => $value['updated']
        //         );
        //         $this->My_model->insertdata($form_data, 'personality');
        //     } else {
        //         $this->My_model->updatedata('personality', array('is_music_director' => 1), array('id' => $is_exist[0]['id']));
        //     }
        // }
    // }
    
    // function update_mapping() {
    //     $this->My_model->update_mapping();
    // }

}
