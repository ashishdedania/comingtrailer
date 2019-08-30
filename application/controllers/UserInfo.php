<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserInfo
 *
 * @author yoo
 */
class UserInfo extends CI_Controller{
    //put your code here
    
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->model('adm_home_model');
        $this->load->model('WebService');
        $this->load->model('Front_Model');
        $this->load->model('Adm_userdata_model');
    }
    
    public function index(){
        if(isset($this->session->userdata('front_userdata')->id)){
            $user_id = $this->session->userdata('front_userdata')->id;
        }else{
            redirect(''. base_url());
        }
        $user_activity = 'liked';
        $this->data['liked_data'] = $this->Front_Model->getUserLiked($user_id,0,0,$user_activity);
        
        $this->data['side_big_adv'] = $this->WebService->getAdsense(300,600);
        $this->data['side_adv'] = $this->WebService->getAdsense(300,250);
        
        $this->data['controller'] = $this;
        
        //Footer links
        $this->data['top_actors'] = $this->adm_home_model->getTopActors();
        $this->data['top_singers'] = $this->adm_home_model->getTopSingers();
        
        $this->data['trailer_cat'] = $this->adm_home_model->getSubCat(1);
        $this->data['video_cat'] = $this->adm_home_model->getSubCat(2);
        
        $this->data['year_list'] = $this->WebService->getMinYear('user','created');
        
        $this->data['seo_data'] = '<title>My Profile - Coming Trailer</title><meta name="robots" content="noindex, nofollow">';
        
        $this->load->view('header_footer/front_header', $this->data);
        $this->load->view('user_info', $this->data);
        $this->load->view('header_footer/front_footer', $this->data);
        
    }
    
    public function rewandHistory(){
        if(isset($this->session->userdata('front_userdata')->id)){
            $user_id = $this->session->userdata('front_userdata')->id;
        }else{
            redirect(''. base_url());
        }
        $user_invite_code = $this->session->userdata('front_userdata')->share_code;
        $this->data['video_play'] = $this->Front_Model->getUserLiked($user_id,0,0,'play');
        $this->data['video_share'] = $this->Front_Model->getUserLiked($user_id,0,0,'share');
        $this->data['invite_friends'] = $this->Front_Model->getSharedFriends($user_id,$user_invite_code);
        $this->data['shared_friends'] = $this->Front_Model->getUserSharedFriends($user_id);
        $this->data['social_share'] = $this->Front_Model->getUserLiked($user_id,0,0,'social_share');
        $this->data['social_follow'] = $this->Front_Model->getUserLiked($user_id,0,0,'social_follow');
        $this->data['social_subs'] = $this->Front_Model->getUserLiked($user_id,0,0,'social_subscribe');

        $this->data['side_big_adv'] = $this->WebService->getAdsense(300,600);
        $this->data['side_adv'] = $this->WebService->getAdsense(300,250);

        $this->data['controller'] = $this;
        
        $this->data['seo_data'] = '<title>My Profile - Coming Trailer</title>';
        
        //Footer links
        $this->data['top_actors'] = $this->adm_home_model->getTopActors();
        $this->data['top_singers'] = $this->adm_home_model->getTopSingers();
        
        $this->data['trailer_cat'] = $this->adm_home_model->getSubCat(1);
        $this->data['video_cat'] = $this->adm_home_model->getSubCat(2);
        
        $this->data['year_list'] = $this->WebService->getMinYear('user','created');
        
        $this->load->view('header_footer/front_header',$this->data);
        $this->load->view('reward_history', $this->data);
        $this->load->view('header_footer/front_footer', $this->data);
    }
    
    public function myReward(){
        if(isset($this->session->userdata('front_userdata')->id)){
            $user_id = $this->session->userdata('front_userdata')->id;
        }else{
            redirect(''. base_url());
        }
        $this->data['user_points'] = $this->Adm_userdata_model->getOnePaiedUserData($user_id);
        
        $this->data['side_big_adv'] = $this->WebService->getAdsense(300,600);
        $this->data['side_adv'] = $this->WebService->getAdsense(300,250);

        $this->data['controller'] = $this;
         $this->data['seo_data'] = '<title>My Profile - Coming Trailer</title>';
        //Footer links
        $this->data['top_actors'] = $this->adm_home_model->getTopActors();
        $this->data['top_singers'] = $this->adm_home_model->getTopSingers();
        
        $this->data['trailer_cat'] = $this->adm_home_model->getSubCat(1);
        $this->data['video_cat'] = $this->adm_home_model->getSubCat(2);
        
        $this->load->view('header_footer/front_header', $this->data);
        $this->load->view('my_rewards', $this->data);
        $this->load->view('header_footer/front_footer', $this->data);
        
    }
    
    public function getSeoUrl($seo_id){
//        echo '$seo_id';exit;
//        echo $table_nmae;exit;
        $final_url = $this->WebService->getSeoUrl('video_url',$seo_id);
        return $final_url;
    }
    

    public function searchReward(){
        $user_id = $this->session->userdata('front_userdata')->id;
        
        $user_invite_code = $this->session->userdata('front_userdata')->share_code;
        $this->data['video_play'] = $this->Front_Model->getUserLiked($user_id,0,0,'play');
        $this->data['video_share'] = $this->Front_Model->getUserLiked($user_id,0,0,'share');
        $this->data['invite_friends'] = $this->Front_Model->getSharedFriends($user_id,$user_invite_code);
        $this->data['shared_friends'] = $this->Front_Model->getUserSharedFriends($user_id);
        $this->data['social_share'] = $this->Front_Model->getUserLiked($user_id,0,0,'social_share');
        $this->data['social_follow'] = $this->Front_Model->getUserLiked($user_id,0,0,'social_follow');
        $this->data['social_subs'] = $this->Front_Model->getUserLiked($user_id,0,0,'social_subscribe');
        $this->data['controller'] = $this;
        $this->load->view('reward_pagination', $this->data);
    }
    
    public function searchData(){
        $user_id = $this->session->userdata('front_userdata')->id;
        $user_activity = 'liked';
        
        $this->data['liked_data'] = $this->Front_Model->getUserLiked($user_id,0,0,$user_activity);
        $this->data['controller'] = $this;
        $this->load->view('user_liked_pagination', $this->data);
    }
    
    public function delete($common_id,$activity,$cat_id){
        
        $user_id = $this->session->userdata('front_userdata')->id;
          
        $this->db->where(array('user_id'=>''.$user_id,'common_id'=>''.$common_id,'user_activity'=>$activity));
        $this->db->delete('user_activity'); 
        
//         $video_id = $this->input->post(''.$common_id);
//        $cat_id = $this->input->post('cat_id');

        $activity = 'disliked';
        
        $this->WebService->setIsLike($user_id,$cat_id,$activity,$common_id);
        
        
        redirect('Me');
    }
}
