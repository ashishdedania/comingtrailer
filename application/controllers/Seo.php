<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Seo extends MY_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    public function edit($uri_page,$cat_id,$sub_cat_id){
        
        
        
        try {
            if($this->input->post('seo_id') == ''){
                if($cat_id > 0){
                    $seoData =  array(
                            'category_id' => $cat_id,
                            'sub_category_id' => $sub_cat_id,
                            'name' => trim($this->input->post('name')),
                            'title' => trim($this->input->post('title')),
                            'description' => trim($this->input->post('description')),
                            'keywords' => trim($this->input->post('keywords'))
                        );

                    $insertSeoData = $this->db->insert('seo', $seoData);
                }else{
                    $seoData =  array(
                            'sub_category_id' => $sub_cat_id,
                            'name' => trim($this->input->post('name')),
                            'title' => trim($this->input->post('title')),
                            'description' => trim($this->input->post('description')),
                            'keywords' => trim($this->input->post('keywords'))
                        );

                    $insertSeoData = $this->db->insert('movie_seo', $seoData);
                }
            }else{
                if($cat_id > 0){
                    $seoData =  array(
                            'name' => trim($this->input->post('name')),
                            'title' => trim($this->input->post('title')),
                            'description' => trim($this->input->post('description')),
                            'keywords' => trim($this->input->post('keywords'))
                        );
                    $insertSeoData = $this->db->update('seo', $seoData, "id = ".$this->input->post('seo_id'));
                }else{
                    $seoData =  array(
                            'name' => trim($this->input->post('name')),
                            'title' => trim($this->input->post('title')),
                            'description' => trim($this->input->post('description')),
                            'keywords' => trim($this->input->post('keywords'))
                        );
                    $insertSeoData = $this->db->update('movie_seo', $seoData, "id = ".$this->input->post('seo_id'));
                }
            }
            
            redirect(base_url($uri_page.'/index/'.$cat_id.'/'.$sub_cat_id));
        } catch (Exception $ex) {
            die('DB Data Insertion Error: '. $ex->getMessage());
        }
    }
    
    public function editIndividual($uri_page,$individual){
        $seoData =  array(
                        'name' => trim($this->input->post('name')),
                        'title' => trim($this->input->post('title')),
                        'description' => trim($this->input->post('description')),
                        'keywords' => trim($this->input->post('keywords')),
                        'individual' => $individual
                    );
        try {
            $insertSeoData = $this->db->update('seo_individual', $seoData, "id = ".$this->input->post('seo_id'));
            redirect(base_url($uri_page));
        } catch (Exception $ex) {
            die('DB Data Insertion Error: '. $ex->getMessage());
        }
    }
    
    public function editInfoSEO($uri_page,$individual){
        $seoData =  array(
                        'name' => trim($this->input->post('name')),
                        'title' => trim($this->input->post('title')),
                        'description' => trim($this->input->post('description')),
                        'keywords' => trim($this->input->post('keywords')),
                        'individual' => $individual
                    );
        try {
            $insertSeoData = $this->db->update('seo_individual', $seoData, "id = ".$this->input->post('seo_id'));
            redirect(base_url($uri_page));
        } catch (Exception $ex) {
            die('DB Data Insertion Error: '. $ex->getMessage());
        }
    }
    
}
