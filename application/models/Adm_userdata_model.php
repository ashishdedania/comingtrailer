<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdminHome
 *
 * @author yoo
 */
class Adm_userdata_model extends CI_Model {

    //put your code here
    public function __construct() {
        // parent::__construct();
        $this->load->database();
        $this->load->model('WebService');
    }

    public function getAllUserData($subscriber_flag = '') {

        $this->db->select('*,a.id AS users_id');
        $this->db->from('user AS a'); // I use aliasing make joins easier
        $this->db->join('user_points AS b', 'a.id = b.user_id', 'INNER');
        if ($subscriber_flag) {
            if ($subscriber_flag == 'Y') {
                $this->db->where('a.email IN(SELECT `email` FROM `newsletter`)');
            } else {
                $this->db->where('a.email NOT IN(SELECT `email` FROM `newsletter`)');
            }
        }
        if ($this->input->post('search_year')) {
            //echo $this->input->post('search_year');exit;
            $this->db->where("DATE_FORMAT(`a`.`created`,'%Y')", $this->input->post('search_year'));
        }
        if ($this->input->post('search_month')) {
            //echo $this->input->post('search_month');exit;
            $this->db->where("DATE_FORMAT(`a`.`created`,'%c')", $this->input->post('search_month'));
        }
        if ($this->input->post('search_keyword')) {
            $this->db->like('LOWER(`a`.`name`)', strtolower($this->input->post('search_keyword')));
        }
        $result = $this->db->get();

        return $result;
    }

    public function getAllPaiedUserData() {

        $this->db->select('*,c.id AS users_id');
        $this->db->from('withdraw AS a'); // I use aliasing make joins easier

        $this->db->join('user AS c', 'a.user_id = c.id', 'INNER');
        $this->db->join('user_points AS b', 'c.id = b.user_id', 'INNER');
        if ($this->input->post('search_year')) {
            //echo $this->input->post('search_year');exit;
            if ($this->input->post('search_month')) {
                //echo $this->input->post('search_month');exit;
                $this->db->where("DATE_FORMAT(`c`.`created`,'%c')", $this->input->post('search_month'));
            }
            $this->db->where("DATE_FORMAT(`c`.`created`,'%Y')", $this->input->post('search_year'));
        }
        if ($this->input->post('search_keyword')) {
            $this->db->like('LOWER(`c`.`name`)', strtolower($this->input->post('search_keyword')));
        }
        $result = $this->db->get();

        return $result;
    }

    public function getAllWithdrawReqUserData() {

        $this->db->select('*,c.id AS users_id,a.id AS withdraw_req_id');
        $this->db->from('withdraw_req AS a'); // I use aliasing make joins easier

        $this->db->join('user AS c', 'a.user_id = c.id', 'INNER');
        $this->db->join('user_points AS b', 'c.id = b.user_id', 'INNER');
        if ($this->input->post('search_year')) {
            //echo $this->input->post('search_year');exit;
            if ($this->input->post('search_month')) {
                //echo $this->input->post('search_month');exit;
                $this->db->where("DATE_FORMAT(`c`.`created`,'%c')", $this->input->post('search_month'));
            }
            $this->db->where("DATE_FORMAT(`c`.`created`,'%Y')", $this->input->post('search_year'));
        }
        if ($this->input->post('search_keyword')) {
            $this->db->like('LOWER(`c`.`name`)', strtolower($this->input->post('search_keyword')));
        }
        $result = $this->db->get();

        return $result;
    }

    public function getWithdrawReqUserData($user_id) {
        $result = $this->db->get_where('withdraw_req', array('user_id' => $user_id));

        return $result;
    }

    public function getWithdrawReqUserPaytmNo($user_id) {


        $result = $this->db->get_where('bank_account', array('user_id' => $user_id, 'acc_type' => 'paytm'));

        return $result;
    }

    public function getAllPayoutUserData($user_id, $withdraw_type) {


        $result = $this->db->get_where('withdraw', array('user_id' => $user_id, 'withdraw_type' => $withdraw_type));

        return $result;
    }

    public function getAllPayoutBankUserData($user_id, $withdraw_type) {

        $this->db->select('*');
        $this->db->from('withdraw AS a'); // I use aliasing make joins easier
        $this->db->join('bank_account AS b', 'a.account_id = b.id', 'INNER');
        $this->db->where(array('a.user_id' => $user_id, 'a.withdraw_type' => $withdraw_type));
        $result = $this->db->get();
        return $result;
    }

    public function getAllReqBankUserData($user_id, $withdraw_type) {

        $this->db->select('*');
        $this->db->from('bank_account AS a'); // I use aliasing make joins easier
        //$this->db->join('bank_account AS b', 'a.account_id = b.id', 'INNER');       
        $this->db->where(array('a.user_id' => $user_id, 'a.acc_type' => $withdraw_type));
        $result = $this->db->get();
        return $result;
    }

    public function isInNewsLetter($email) {

        $result = $this->db->get_where('newsletter', array('email' => '' . $email));
        $data = '';
        if ($result->num_rows() > 0) {
            $data = 'Yes';
        } else {
            $data = 'No';
        }

        return $data;
    }

    public function getOnePaiedUserData($user_id) {
        $this->db->select('*,a.id AS users_id');
        $this->db->from('user AS a'); // I use aliasing make joins easier
        $this->db->join('user_points AS b', 'a.id = b.user_id', 'INNER');
        $this->db->where(array('a.id' => $user_id));
        $result = $this->db->get();
        return $result;
    }

    public function getUserID($email, $mobile) {
        $this->db->select('*,a.id AS user_id');
        $this->db->from('user AS a'); // I use aliasing make joins easier
        // $this->db->join('user_points AS b', 'a.id = b.user_id', 'INNER');

        $this->db->where('a.email', $email);
        $this->db->or_where('a.mobile', '' . $mobile);

        $user_result = $this->db->get();
        $user_id = 0;
        if ($user_result->num_rows() > 0) {
            foreach ($user_result->result_array() as $value) {
                $user_id = $value['user_id'];
            }
        } else {
            $user_id = 0;
        }

        return $user_id;
    }



    public function getUserIDnew($email, $mobile) {
        $this->db->select('*,a.id AS user_id');
        $this->db->from('user AS a'); // I use aliasing make joins easier
        // $this->db->join('user_points AS b', 'a.id = b.user_id', 'INNER');

        $this->db->where('a.email', $email);
        $this->db->where('a.mobile', '' . $mobile);

        $user_result = $this->db->get();
        $user_id = 0;
        if ($user_result->num_rows() > 0) {
            foreach ($user_result->result_array() as $value) {
                $user_id = $value['user_id'];
            }
        } else {
            $user_id = 0;
        }

        return $user_id;
    }


    public function isWithdrawProgress($userid) {
        $this->db->select('*');
        $this->db->from('withdraw_req'); 
        $this->db->where('user_id', $userid);
        $this->db->where('is_approved', 0);
        

        $user_result = $this->db->get();
        $user_id = 0;
        if ($user_result->num_rows() > 0) {
            return true;
        } else {
            return false;
        }

        
    }


    public function setWithdrawReq($user_id, $data = array(), $table_name) {

        $insert = $this->db->insert('' . $table_name, $data);
        if ($insert) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function updatePointShareData($user_id, $frnd_id, $tablename, $points) {

        $data = array(
            'earn_points' => '(earn_points-' . $points . ')',
            'totla_frnds_share' => $points
        );

        $this->db->set('totla_frnds_share', '' . $points, FALSE);
        $this->db->set('earn_points', 'earn_points-' . $points, FALSE);
        $this->db->where('user_id', $user_id);

        $this->db->update('' . $tablename);


        $data = array(
            'earn_points' => '(earn_points+' . $points . ')',
            'totla_frnds_share' => $points
        );

//        $this->db->set('totla_frnds_share', ''.$points, FALSE);
        $this->db->set('earn_points', 'earn_points+' . $points, FALSE);

        $this->db->where('user_id', $frnd_id);

        $this->db->update('' . $tablename);
    }

}
