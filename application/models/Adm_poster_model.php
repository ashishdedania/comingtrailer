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
class Adm_poster_model extends CI_Model{
    //put your code here
    public function __construct() {
       // parent::__construct();
        $this->load->database();
        $this->load->model('WebService');
        $this->load->model('Adm_sitemap_model');
    }
    
       
   
    public function addPosterMapMovie($video_id,$expod_data){
        $this->explodeAndSave('poster_map_movie',$video_id,$expod_data,'poster_id','movie_id','movie','movie_name');
    }
    
    public function addPosterMapCast($video_id,$expod_data){
        $this->explodeAndSave('poster_map_cast',$video_id,$expod_data,'poster_id','cast_id','cast','cast_name');
    }
    
       
    public function addPosterMapDirector($video_id,$expod_data){
        $this->explodeAndSave('poster_map_director',$video_id,$expod_data,'poster_id','director_id','director','director_name');
    }
    
    
    public function explodeAndSave($tablename,$id,$data,$pri_idtag,$sec_idtag,$main_table,$main_col_name){
        
        $datas = explode(",", $data);
        
        $this->db->where(''.$pri_idtag, $id);
        $this->db->delete(''.$tablename);
        $subcat_id = $this->input->post('subcat');
        foreach($datas as $value) {
            //$cat = trim($cat);
            if($value != ''){
            $this->db->where(''.$main_col_name, trim($value));
            $query = $this->db->get(''.$main_table);
           //$query = $this->db->get_where(''.$main_table,array(''.$main_col_name,''.$value));
           // echo $query->num_rows().'...'.$main_table.'...'.$main_col_name.'...'.$value;exit;
            if($query->num_rows()>0){
                foreach ($query->result_array() as $value_id) {
                    $data_array = array(
                        $pri_idtag => $id,
                        $sec_idtag => trim($value_id['id'])
                    );

                    $insert = $this->db->insert($tablename,$data_array);
                }
            }else{
                if($main_table == 'movie'){
                    $data_array = array(
                            $main_col_name => trim($value),
                            'subcat_id' => $subcat_id,
                            'rel_date' => date('y-m-d')

                        );
                }else{
                    $data_array = array(
                            $main_col_name => trim($value)

                        );
                }

                    $insert = $this->db->insert($main_table,$data_array);
                    
                    $insert_id = $this->db->insert_id();
                    
                    if($main_table == 'movie'){
                    
                        $seo_url_id = $this->WebService->setSEOURLMovie($subcat_id,$insert_id,trim($value),'movie','add');
                            
                        $userData = array(
                        'seo_url_id' => $seo_url_id
                                );

                        $insertUserData = $this->editCastData($insert_id,$userData,''.$main_table);
                    
                    }else{
                        $seo_url_id = $this->WebService->setSEOURLCast($insert_id,trim($value),''.$main_table,'add');
                            
                        $userData = array(
                        'seo_url_id' => $seo_url_id
                                );

                        $insertUserData = $this->editCastData($insert_id,$userData,''.$main_table);
                    }
                    
                    $data_array = array(
                        $pri_idtag => $id,
                        $sec_idtag => $insert_id
                    );

                    $insert = $this->db->insert($tablename,$data_array);
                    
            }
        
//        $datas = explode(",", $data);
//        
//        $this->db->where(''.$pri_idtag, $id);
//        $this->db->delete(''.$tablename);
//        
//        foreach($datas as $value) {
//            //$cat = trim($cat);
//          
//            $data_array = array(
//                $pri_idtag => $id,
//                $sec_idtag => trim($value)
//            );
//            
//            $insert = $this->db->insert($tablename,$data_array);
        
//            if($insert){
//                return $this->db->insert_id();
//            }else{
//                return false;    
//            }
//            $this->Adm_sitemap_model->generateMASDMCSitemap(''.$main_table);
        }
        }
        
        
    }
    
    public function editCastData($video_id, $data = array(), $tablename) {
//        if(!array_key_exists("created",$data)){
//            $data['created'] = date("Y-m-d H:i:s");
//        }
//        if(!array_key_exists("modified",$data)){
//            $data['modified'] = date("Y-m-d H:i:s");
//        }
        $this->db->set('updated', 'DATE_ADD(NOW(), INTERVAL 1 MINUTE)', FALSE);
        $this->db->where('id', $video_id);

        return $this->db->update('' . $tablename, $data);
//        if($insert){
//            return $this->db->insert_id();
//        }else{
//            return false;    
//        }
    }

    public function addPosterData($data = array()){
//        if(!array_key_exists("created",$data)){
//            $data['created'] = date("Y-m-d H:i:s");
//        }
//        if(!array_key_exists("modified",$data)){
//            $data['modified'] = date("Y-m-d H:i:s");
//        }
        $insert = $this->db->insert('poster',$data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;    
        }
    }
    
    public function editPosterData($video_id,$data = array()){
//        if(!array_key_exists("created",$data)){
//            $data['created'] = date("Y-m-d H:i:s");
//        }
//        if(!array_key_exists("modified",$data)){
//            $data['modified'] = date("Y-m-d H:i:s");
//        }
        $this->db->set('updated', 'DATE_ADD(NOW(), INTERVAL 1 MINUTE)', FALSE);
        $this->db->where('id', $video_id);
        
            return $this->db->update('poster',$data);
//        if($insert){
//            return $this->db->insert_id();
//        }else{
//            return false;    
//        }
    }
    
    public function addPosterImage($data = array()){
//        if(!array_key_exists("created",$data)){
//            $data['created'] = date("Y-m-d H:i:s");
//        }
//        if(!array_key_exists("modified",$data)){
//            $data['modified'] = date("Y-m-d H:i:s");
//        }
        $insert = $this->db->insert('poster_img',$data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;    
        }
    }
    
    public function updatePosterType($data = array(),$image_id){
//        if(!array_key_exists("created",$data)){
//            $data['created'] = date("Y-m-d H:i:s");
//        }
//        if(!array_key_exists("modified",$data)){
//            $data['modified'] = date("Y-m-d H:i:s");
//        }
        $this->db->where('id', $image_id);
        
            return $this->db->update('poster_img',$data);
    }
    
    public function get_poster_image_count($id = 0)
    {
        
        $query = $this->db->get_where('poster_img', array('poster_id' => $id));
        return $query->num_rows();
    }
    
    
    public function get_poster_by_id($id = 0)
    {
        if ($id === 0)
        {
            $query = $this->db->get('poster');
            return $query->result_array();
        }
 
        $query = $this->db->get_where('poster', array('id' => $id));
        return $query->row_array();
    }
    
}
