<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdmAddSubCat
 *
 * @author yoo
 */
class AdmAddSubCat extends MY_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('adm_home_model');
    }
    public function index(){
        
        $this->data['maincat'] = $this->adm_home_model->getAllMainCat();
        
        $this->load->view('header_footer/header');
        $this->load->view('header_footer/sidebar');
        $this->load->view('adm_addNewSub_cat',$this->data);
        
    }
    
    public function load($isInserted){
        
        if($isInserted){
           $this->data['inserted'] = 'Sub category Successfully added';
       }else{
           $this->data['inserted'] = 'Sub category not added, Please try again';
       }
        
        $this->data['maincat'] = $this->adm_home_model->getAllMainCat();
        
        $this->load->view('header_footer/header');
        $this->load->view('header_footer/sidebar');
        $this->load->view('adm_addNewSub_cat',$this->data);
        
    }
    
    public function addSubCat(){
                
       $isInserted = $this->adm_home_model->setSubCat();
       
       $this->load($isInserted);
        
    }
    
}
