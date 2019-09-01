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
class Adm_data_model extends CI_Model {

    //put your code here
    public function __construct() {
        // parent::__construct();
        $this->load->database();
        $this->load->model('WebService');
        $this->load->model('Adm_sitemap_model');
    }

    public function addCastData($data = array(), $tablename) {
//        if(!array_key_exists("created",$data)){
//            $data['created'] = date("Y-m-d H:i:s");
//        }
//        if(!array_key_exists("modified",$data)){
//            $data['modified'] = date("Y-m-d H:i:s");
//        }
//        echo $data['cast_name'];exit;
       
       $created = date('Y-m-d H:i:s');
        $updated = date('Y-m-d H:i:s');

        $data['created'] = $created;
        $data['updated'] = $updated;
        
        $insert = $this->db->insert('' . $tablename, $data);
        if ($insert) {
            return $this->db->insert_id();
        } else {
            return false;
        }
            
    }

    public function editCastData($video_id, $data = array(), $tablename) {
//        if(!array_key_exists("created",$data)){
//            $data['created'] = date("Y-m-d H:i:s");
//        }
//        if(!array_key_exists("modified",$data)){
//            $data['modified'] = date("Y-m-d H:i:s");
//        }
        
        
 //       $this->db->set('updated', 'DATE_ADD(NOW(), INTERVAL 1 MINUTE)', FALSE);
 
 	$updated = date('Y-m-d H:i:s');
                    
        $data['updated'] = $updated;
 
        $this->db->where('id', $video_id);

        return $this->db->update('' . $tablename, $data);
//        if($insert){
//            return $this->db->insert_id();
//        }else{
//            return false;    
//        }
    }

    public function deleteStatus($table,$id,$status){
        
        $this->db->set('status',$status);
        $this->db->where('id',$id);
        $this->db->update($table);
        
        
    }

    public function deleteData($tablname, $id, $seo_url_id) {

        $this->db->select('*');
            $this->db->from(''.$tablname);
            //$this->db->join('sub_category', 'category.id = sub_category.cat_id');
            $this->db->where('id', $id);
            $beers['result'] = $this->db->get(); 
            
            if($beers['result']->num_rows()>0){
                
                foreach ($beers['result']->result_array() as $value_id) {
                   
                    
                    $path = '';
                    if($tablname == 'movie'){
                        $img_col = $value_id['movie_img'];
                    
                        $img = $img_col;
                        $path = 'images/movies/'.$img;
                    }else if($tablname == 'cast'){
                        $img_col = $value_id['cast_img'];
                    
                        $img = $img_col;
                        $path = 'images/actors/'.$img;
                    }
                    else if($tablname == 'singer'){
                        $img_col = $value_id['singer_img'];
                    
                        $img = $img_col;
                        $path = 'images/singers/'.$img;
                    }else if($tablname == 'director'){
                        $img_col = $value_id['director_img'];
                    
                        $img = $img_col;
                        $path = 'images/directors/'.$img;
                    }
                    else if($tablname == 'music'){
                        $img_col = $value_id['music_img'];
                    
                        $img = $img_col;
                        $path = 'images/music/'.$img;
                    }else if($tablname == 'released_by'){
                        $img_col = $value_id['rel_by_img'];
                    
                        $img = $img_col;
                        $path = 'images/channel/'.$img;
                    }
                    
//                    unlink('images/movies/'.$img);
                    unlink($path);
                    //unlink('images/poster/285X160-'.$img);
                    
                    
//                    $this->db->where('id', $value_id['id']);
//                    $this->db->delete('poster_img');
                    
                }
            }
        
            $this->db->where('id', $seo_url_id);
        $this->db->delete('video_url');
            
        $this->db->where('id', $id);
        $this->db->delete('' . $tablname);
    }

    public function getAllData($tablename, $id_tag, $name_tag,$status = 0,$type = '') {
        //Data for actor,singer,director etc...
        if($this->input->post('search_year')){
            $this->db->where("DATE_FORMAT(`created`,'%Y')",$this->input->post('search_year'));
        }
        if($this->input->post('search_month')){
            $this->db->where("DATE_FORMAT(`created`,'%c')",$this->input->post('search_month'));
        }
        if($this->input->post('search_keyword')){
            if($this->input->post('ajax')){
                 if($this->input->post('search_keyword') == '0-9'){
                     if($tablename == 'released_by'){
                        $this->db->where(array('LOWER(`'.'rel_by_name`) RLIKE '=>'^[0-9].*'));
                     }else{
                         $this->db->where(array('LOWER(`'.$tablename.'_name`) RLIKE '=>'^[0-9].*'));
                     }
                 }else{
                     
                     if($tablename == 'released_by'){
                         
                        $this->db->like('LOWER(`'.'rel_by_name`)',$this->input->post('search_keyword'),'after');
                     }else{
                         
                         $this->db->like('LOWER(`'.$tablename.'_name`)',$this->input->post('search_keyword'),'after');
                     }
                 }
            }else{
                if($tablename == 'released_by'){
                    $this->db->like('LOWER(`'.'rel_by_name`)',$this->input->post('search_keyword'),'after');
                }else{
                    $this->db->like('LOWER(`'.$tablename.'_name`)',$this->input->post('search_keyword'),'after');
                }
            }
        }
        if($type != '') {
            $this->db->where($type,1);
        }
        $this->db->where('status',$status);
        $movie_result = $this->db->get($tablename);

        $num = $movie_result->num_rows();
        
        if ($num > 0) {
            foreach ($movie_result->result_array() as $movie) {
                $movies[] = array('' . $id_tag => '' . $movie['id'], '' . $name_tag => '' . $movie['' . $name_tag], 'count' => $num
                        , 'seo_url_id' => $movie['seo_url_id']);
            }
        } else {
            $movies[] = array('' . $id_tag => '', '' . $name_tag => '', 'count' => 0, 'seo_url_id' => 0);
        }
        $finalarray = $movies;


        return $finalarray;
    }

    public function getRowData($tablename, $id) {
        //Data for actor,singer,director etc...
        $data_result = $this->db->get_where('' . $tablename, array('id' => $id));

//            $num = $movie_result->num_rows();
//            if($num>0){
//                foreach ($movie_result->result_array() as $movie) {
//                      $movies[] = array(''.$id_tag=>''.$movie['id'],''.$name_tag=>''.$movie[''.$name_tag]);
//                }
//            }else{
//                $movies[] = array(''.$id_tag=>'',''.$name_tag=>'');
//            }
//            $finalarray = $movies;


        return $data_result->row_array();
    }
    
    public function getIndiSEOData($table) {
        //Data for actor,singer,director etc...
        $indi = '';
        if($table == 'cast'){
            $indi = 'C';
        }else if($table == 'music'){
            $indi = 'M';
        }else if($table == 'director'){
            $indi = 'D';
        }else if($table == 'singer'){
            $indi = 'S';
        }else if($table == 'released_by'){
            $indi = 'CH';
        }
        
        
        $data_result = $this->db->get_where('seo_individual', array('individual' => $indi));

//            $num = $movie_result->num_rows();
//            if($num>0){
//                foreach ($movie_result->result_array() as $movie) {
//                      $movies[] = array(''.$id_tag=>''.$movie['id'],''.$name_tag=>''.$movie[''.$name_tag]);
//                }
//            }else{
//                $movies[] = array(''.$id_tag=>'',''.$name_tag=>'');
//            }
//            $finalarray = $movies;


        return $data_result->row_array();
    }
    
    public function getMovieSEOData($sub_cat) {
        
        $data_result = $this->db->get_where('movie_seo', array('sub_category_id' => $sub_cat));
        
        return $data_result->row_array();
        
    }
    

    public function getOldImg($tablename,$id){
        
        $this->db->select('*');
            $this->db->from(''.$tablename);
            //$this->db->join('sub_category', 'category.id = sub_category.cat_id');
            $this->db->where('id', $id);
            $result = $this->db->get(); 
            
            if($tablename == 'released_by'){
                
                if($result->num_rows()>0){

                    foreach ($result->result_array() as $value) {

                        $img = $value['rel_by_img'];
                        
                        @unlink('images/channel/'.$img);

                    }

                }
            
            }else{
                if($tablename == 'cast'){
                    $directory = 'actors';
                }else if($tablename == 'singer'){
                    $directory = 'singers';
                }else if($tablename == 'director'){
                    $directory = 'directors';
                }else if($tablename == 'music'){
                    $directory = 'music';
                }
                
                if($result->num_rows()>0){

                    foreach ($result->result_array() as $value) {

                        $img = $value[$tablename.'_img'];
                        
                        unlink('images/'.$directory.'/'.$img);

                    }

                }
            }
                
        
    }
    
    public function getCatLinks($url){
            $this->db->select('*');
            $this->db->from('video_url');
            //$this->db->join('sub_category', 'category.id = sub_category.cat_id');
            $this->db->where('current_url', $url);
            $result = $this->db->get(); 
            $make_url = '';
            
            if($result->num_rows()>0){
                   
                foreach ($result->result_array() as $value) {

                    $make_url = $value['making_url'];


                }

            }
           
            return $make_url;
            
    }
    
    public function forgot(){
        
        $email = $this->input->post("email");
        
        $this->db->select('*');
            $this->db->from('admin');
            //$this->db->join('sub_category', 'category.id = sub_category.cat_id');
            $this->db->where('email', $email);
            $result = $this->db->get(); 
            $make_url = '';
            
            if($result->num_rows()>0){
                foreach ($result->result_array() as $value) {
                    $id = $value['id'];
                    $uname = $value['username'];
                    // $id = $reg_user->lasdID();  
                    $key = base64_encode($id.''.$uname);
                    //$id = $key;
                    
                    $this->db->set('token',$key);
                    $this->db->where('id',$id);
                    $this->db->update('admin');
                    
                    
                    $message = "     
                        Hello $uname,
                        <br /><br />
                        Welcome to Coming Trailer!<br/>
                        To reset your password  please , just click following link<br/>
                        <br /><br />
                        <a href='". base_url('/ForgotPass/checkReset/'.$key)."'>Click HERE to Reset Password :)</a>
                        <br /><br />
                        Thanks,";
                    
                    $subject = "Confirm Registration";
                    
                    
                    $this->session->set_flashdata('msg', 'Please check your mail, we sent you reset password link '.base_url('ForgotPass/checkReset/'.$key));
                }
            }else{
                $this->session->set_flashdata('msg', 'This email address is not registered, Please enter ragistered email!');
            }
        
    }
    
    public function checkReset($token){
        $email = $token;
        
        $this->db->select('*');
            $this->db->from('admin');
            //$this->db->join('sub_category', 'category.id = sub_category.cat_id');
            $this->db->where('token', $email);
            $result = $this->db->get(); 
            $make_url = '';
            $message = '';
            if($result->num_rows()>0){
                $message = "true";
            }else{
                $message = "false";
            }
            return $message;
    }
    
}
