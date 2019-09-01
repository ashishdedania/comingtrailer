<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Sitemap
 *
 * @author yoo
 */
class Sitemap extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('WebService');
        $this->load->model('adm_home_model');
        $this->load->model('Adm_sitemap_model');
    }
    
    public function index($type,$total){ 
        
        //echo $type.'...'.$total;exit;
        
        if($type == 'sitemap'){
           
            $this->data['datas_comman'] = $this->Adm_sitemap_model->getCommanSitemap();
            $this->data['datas'] = $this->Adm_sitemap_model->getSEOUrlCat($type,$total);
            $this->data['datasmovie'] = $this->Adm_sitemap_model->generateMovieCat();
            $this->data['datas_main'] = $this->Adm_sitemap_model->getMainSiteData();
            //echo '<pre>';print_r($this->data); die;
            
            $this->load->view("sitemap_comman",$this->data);
        }else if($type == 'post'){
            $this->data['datas'] = $this->Adm_sitemap_model->getSEOUrlPost($total);//select urls from DB to Array
            //var_dump($data);exit;

            $this->load->view("sitemap",$this->data);
        }else if($type == 'files'){
             $this->data['datas'] = $this->Adm_sitemap_model->getSitemapFiles();//select urls from DB to Array
            //var_dump($data);exit;

            $this->load->view("sitemap_files",$this->data);
        
        }else if($type == 'personality'){
            $this->data['datas'] = $this->Adm_sitemap_model->getSEOUrl2($type,$total);//select urls from DB to Array
            

            $this->load->view("sitemap3",$this->data);
        }
        else{
            
            $this->data['datas'] = $this->Adm_sitemap_model->getSEOUrl($type,$total);//select urls from DB to Array
            //var_dump($data);exit;

            $this->load->view("sitemap",$this->data);
        }
        
    }
    
    public function generateSitemap(){
        
        $this->generate();
        $this->generatePost();
        
        echo 'Sitemap generated successfully';
        
        sleep(15);
        
        redirect('AdminHome');
    }

        public function generate(){
        
        //$all = array('movie','cast','singer','director','music','released_by');
        $all = array('movie','personality','released_by');
        
        for($i=0;$i<sizeof($all);$i++){
            $data = $all[$i];
            $this->Adm_sitemap_model->generateMASDMCSitemap($data);
        }
    }
    
    public function generatePost(){
        
//        $all[] = array('movie','cast','singer','director','music','released_by');
        
//        for($i=0;$i<sizeof(all);$i++){
            $this->Adm_sitemap_model->generatePost();
//        }
            echo 'generated';
    }
    
}
