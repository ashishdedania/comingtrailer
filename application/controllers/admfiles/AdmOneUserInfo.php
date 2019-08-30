<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdmOneUserInfo
 *
 * @author yoo
 */
class AdmOneUserInfo extends MY_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('adm_userdata_model');
        $this->load->model('Front_Model');
    }
    public function index($user_id = 0){
        
        $this->data['controller']=$this;
        $this->data['userdata'] = $this->getAllPaiedUsreData($user_id);
        
        
       
        $user_invite_code = '3QQIZ8';
        $this->data['video_play'] = $this->Front_Model->getUserLiked($user_id,0,0,'play');
        $this->data['video_share'] = $this->Front_Model->getUserLiked($user_id,0,0,'share');
        $this->data['invite_friends'] = $this->Front_Model->getSharedFriends($user_id,$user_invite_code);
        $this->data['shared_friends'] = $this->Front_Model->getUserSharedFriends($user_id);
        $this->data['liked_data'] = $this->Front_Model->getUserLiked($user_id,0,0,'liked');
        $this->data['social_share'] = $this->Front_Model->getUserLiked($user_id,0,0,'social_share');
        $this->data['social_follow'] = $this->Front_Model->getUserLiked($user_id,0,0,'social_follow');
        $this->data['social_subs'] = $this->Front_Model->getUserLiked($user_id,0,0,'social_subscribe');
        
        $this->data['controller'] = $this;
        
        $this->load->view('header_footer/header');
        $this->load->view('header_footer/sidebar');
        $this->load->view('adm_one_user_info',$this->data);
        
    }
    
    public function getSeoUrl($seo_id){
//        echo '$seo_id';exit;
//        echo $table_nmae;exit;
        $final_url = $this->WebService->getSeoUrl('video_url',$seo_id);
        return $final_url;
    }
    
    public function getAllPaiedUsreData($user_id){
      
        return $this->adm_userdata_model->getOnePaiedUserData($user_id);
    }
     public function isInNewsLetter($email){
         return $this->adm_userdata_model->isInNewsLetter($email);
     }
    
     public function getAllPayoutUserData($user_id,$withdraw_type){
         return $this->adm_userdata_model->getAllPayoutUserData($user_id,$withdraw_type);
     }
     
      public function getAllPayoutBankUserData($user_id,$withdraw_type){
         return $this->adm_userdata_model->getAllPayoutBankUserData($user_id,$withdraw_type);
     }
     
     public function getWithdrawReqUserData($user_id){
         return $this->adm_userdata_model->getWithdrawReqUserData($user_id);
     }
     
     public function getWithdrawReqUserPaytmNo($user_id){
         return $this->adm_userdata_model->getWithdrawReqUserPaytmNo($user_id);
     }
}
