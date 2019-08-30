<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HomeSeo
 *
 * @author yoo
 */
class HomeSeo extends CI_Controller{
    //put your code here
    
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->model('adm_home_model');
        $this->load->model('WebService');
        
    }
    
    public function index(){
        
        $query = $this->db->get_where('home_seo',array('id' => 1)); 
        $this->data['seo'] = $query->row_array();
        
        $this->load->view('header_footer/header');
        $this->load->view('header_footer/sidebar');
        $this->load->view('home_seo',$this->data);
        $this->load->view('header_footer/footer');
    }
    
    public function edit(){
        $seoData =  array(
                        'title' => trim($this->input->post('title')),
                        'description' => trim($this->input->post('description')),
                        'keywords' => trim($this->input->post('keywords'))
                    );
        try {
            $insertSeoData = $this->db->update('home_seo', $seoData, "id = 1");
//            $this->index();
            redirect(base_url('HomeSeo'));
        } catch (Exception $ex) {
            die('DB Data Insertion Error: '. $ex->getMessage());
        }
    }
}
