<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Home
 *
 * @author yoo
 */
class AdmViewAllUser extends MY_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('adm_userdata_model');
    }
    public function index($subscriber_flag = ''){
          
        $this->data['controller']=$this;
        $this->data['userdata'] = $this->getAllUsreData($subscriber_flag);
        $this->data['min_year'] = $this->WebService->getMinYear('user','created');
        $this->load->view('header_footer/header');
        $this->load->view('header_footer/sidebar');
        $this->load->view('userdetails',$this->data);
        
    }
    
    public function payoutData(){
        $this->data['controller']=$this;
        $this->data['payoutuserdata'] = $this->getAllPaiedUsreData();
        
        $this->load->view('header_footer/header');
        $this->load->view('header_footer/sidebar');
        $this->load->view('user_payout_details',$this->data);
    }
    
    public function WithdrawReqData(){
        $this->data['controller']=$this;
        $this->data['withdrawuserdata'] = $this->getAllWithdrawReqUserData();
        
        $this->load->view('header_footer/header');
        $this->load->view('header_footer/sidebar');
        $this->load->view('user_withdraw_req_details',$this->data);
    }

    public function approveWithdrawReq($id,$is_approved){
        $this->db->where('id',$id);
        $this->db->update('withdraw_req', array('is_approved' => $is_approved,'message'=>trim($this->input->post('reject_reason')))); 
        redirect(base_url('AdmViewAllUser/WithdrawReqData'));
    }

    public function searchByNews(){

        $newsletter = $this->input->post('news');
        $from = $this->input->post('from_user');
        $this->data['controller']=$this;
        $this->data['is_subscribe']=$newsletter;
        if($from == 'user'){
            $this->data['userdata'] = $this->getAllUsreData();
        }else if($from == 'pay'){
            $this->data['payoutuserdata'] = $this->getAllPaiedUsreData();
        }else if($from == 'wid_req'){
             $this->data['withdrawuserdata'] = $this->getAllWithdrawReqUserData();
        }
        $this->load->view('header_footer/header');
        $this->load->view('header_footer/sidebar');
        if($from == 'user'){
            $this->load->view('userdetails',$this->data);
        }else if($from == 'pay'){
            $this->load->view('user_payout_details',$this->data);
        }else if($from == 'wid_req'){
             $this->load->view('user_withdraw_req_details',$this->data);
        }
        
        
        
    }

        public function getAllUsreData($subscriber_flag = ''){
        return $this->adm_userdata_model->getAllUserData($subscriber_flag);
    }
    public function getAllPaiedUsreData(){
      
        return $this->adm_userdata_model->getAllPaiedUserData();
    }
    public function getAllWithdrawReqUserData(){
      
        return $this->adm_userdata_model->getAllWithdrawReqUserData();
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
     
     public function getAllReqBankUserData($user_id,$withdraw_type){
         return $this->adm_userdata_model->getAllReqBankUserData($user_id,$withdraw_type);
     }
     
     public function getWithdrawReqUserData($user_id){
         return $this->adm_userdata_model->getWithdrawReqUserData($user_id);
     }
     
     public function getWithdrawReqUserPaytmNo($user_id){
         return $this->adm_userdata_model->getWithdrawReqUserPaytmNo($user_id);
     }
     
     public function totalPay(){
        
        $this->db->select('SUM(rupees) AS total_pay');
        $result = $this->db->get('withdraw');
        $pay = 0;
        if($result->num_rows()>0){
            foreach ($result->result_array() as $value) {
                $pay = $value['total_pay'];
            }
        }else{
            $pay = 0;
        }
        
        return $pay;
    }
     
     public function totalUserCount(){
        
        $this->db->select('COUNT(*) AS total_user');
        $result = $this->db->get('user');
        $count = 0;
        if($result->num_rows()>0){
            foreach ($result->result_array() as $value) {
                $count = $value['total_user'];
            }
        }else{
            $count = 0;
        }
        
        return $count;
    }
     
     public function totalNewsLetterCount(){
        
        $this->db->select('COUNT(*) AS total_news');
        $result = $this->db->get('newsletter');
        $count = 0;
        if($result->num_rows()>0){
            foreach ($result->result_array() as $value) {
                $count = $value['total_news'];
            }
        }else{
            $count = 0;
        }
        
        return $count;
    }
    
}
