<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Adm_sitemap_model
 *
 * @author yoo
 */
class Adm_sitemap_model extends CI_Model{
    //put your code here
    public function __construct() {
       // parent::__construct();
        $this->load->database();
        $this->load->model('WebService');
    }
    
    public function getSEOUrl($table_name,$total_url){ 
        
        $this->db->select('a.created as mycreated,a.updated as myupdated,ad.*');
        $this->db->from($table_name.' AS a');
        $this->db->join('video_url AS ad', 'a.seo_url_id = ad.id');
        
        $start = (int)$total_url - 1000;
        $limit = 1000; 
        //if($limit!='' && $start!=''){
            $this->db->limit($limit, $start);
         //}
        
        $result = $this->db->get();
          
                
//        print_r($beers['result']->result_array());exit;
        return $result->result_array();
    }


    public function getSEOUrl2($table_name,$total_url){
        
        $this->db->select('*');
        $this->db->from($table_name);
        
        
        $start = (int)$total_url - 1000;
        $limit = 1000; 
        //if($limit!='' && $start!=''){
            $this->db->limit($limit, $start);
         //}
        
        $result = $this->db->get();
          
                
//        print_r($beers['result']->result_array());exit;
        return $result->result_array();
    }
    
    
    
    public function generateMASDMCSitemap($table_name){




        if($table_name == 'personality'){

            $this->db->select('*');
            $this->db->from($table_name);
        }
        else
        {
            $this->db->select('ad.final_url,a.`seo_url_id`');
            $this->db->from($table_name.' AS a');
            $this->db->join('video_url AS ad', 'a.seo_url_id = ad.id');

        }
        
        

        
        $result = $this->db->get();




        $num = 0;
        if($result->num_rows() > 0 ){
            $total = $result->num_rows();
            $file_parts = ceil($total/1000);
            $parm = 1000;
            for ($i = 0;$i<$file_parts;$i++) {
                if($table_name == 'cast'){
                    if($i == 0){
                        $filename = 'actor';
                    }else{
                        $filename = 'actor'.$i;
                    }
                }else if($table_name == 'released_by'){
                    if($i == 0){
                        $filename = 'company';
                    }else{
                        $filename = 'company'.$i;
                    }
                }else{
                    if($i == 0){
                        $filename = $table_name;
                    }else{
                        $filename = $table_name.''.$i;
                    }
                }
//                if($total < 40000){
                    $this->db->select('*');
                    $this->db->from('sitemap');
                    $this->db->where('file_name',$filename.'.xml');
                    $result_data = $this->db->get();
                    
                    if($result_data->num_rows() == 0){
                        
                        $this->load->helper('file');

                        $current = 'Sitemap/index/'.$table_name.'/'.$parm;
                        
//                        $data = '$route["' . $filename . '.xml"] = "'.$current.'";';
                        $data = '$route["' . $filename . '.xml"] = "' . $current . '";';

                        if ( ! write_file('application/cache/routes.php', PHP_EOL.'<?php '.$data.' ?>', "a+"))
                        {
                                echo 'Unable to write the file';
                        }
                        else
                        {
                                echo 'File written!';
                        }
                        
                        $data = array(
                            'file_name' => $filename.'.xml',
                            'type' => $table_name ,
                            'total_url' => $parm

                        );

                       $this->db->insert('sitemap', $data); 
                       $insert_id = $this->db->insert_id();
                    }else{
                        $updated = date('Y-m-d H:i:s');
                        $data = array(
                            
                            'updated' => $updated

                        );
//                    $this->db->set('updated', 'DATE_ADD(NOW(), INTERVAL 1 MINUTE)', FALSE);
                        $this->db->where('file_name', $filename.'.xml');
                       $this->db->update('sitemap',$data); 
                    }
//                }else{
//                    
//                }
                $parm = $parm + 1000;
            }
            
            $this->generateCommanFiles();
            
//            echo $parm;exit;
        }
        
    }
    
    
    public function getSEOUrlPost($total_url){
        
        $start = (int)$total_url - 1000;
        $limit = 1000;
        
        $sql = "SELECT * FROM `video_url` WHERE `current_url` like 'VideoDetail/index/1%'"
                . " or `current_url` like 'VideoDetail/index/2%'"
                . " or `current_url` like 'PosterDetail/index/%' limit ".$start.",".$limit;
        
        $result = $this->db->query($sql);
//        echo $result->num_rows();exit;
        if($result->num_rows() > 0){
            foreach ($result->result_array() as $value) {
                
                $url = $value['final_url'];
                $seo_id = $value['id'];
                $current = $value['current_url'];
                
//                $haystack = "foo bar baz";
//                $needle   = "bar";
                $table_name = "";
                if( strpos( $current, 'VideoDetail' ) !== false ) {
                    $table_name = 'video';
                }else{
                    $table_name = 'poster';
                }
                
                $this->db->select('updated,created');
                $this->db->from($table_name.' AS a');
                $this->db->where('seo_url_id',$seo_id);
                
                $result_data = $this->db->get();
                
                if($result_data->num_rows() > 0){
                    foreach ($result_data->result_array() as $value1) {
                        
                        $data[]  = array('final_url'=>$url,'myupdated'=>''.$value1['updated'],'mycreated'=>''.$value1['created']);
                        
                    }
                }
                else
                {
                    $data[]  = array('final_url'=>$url,'myupdated'=>'','mycreated'=>'');
                }
                
            }
        }else{
            $data[] = array('final_url'=>'','updated'=>'','created'=>'');
        }
          
//        print_r($beers['result']->result_array());exit;
        return $data;
    }
    
    public function generatePost(){
        
        $sql = "SELECT * FROM `video_url` WHERE `current_url` like 'VideoDetail/index/1%'"
                . " or `current_url` like 'VideoDetail/index/2%'"
                . " or `current_url` like 'PosterDetail/index/%'";
        
        $result = $this->db->query($sql);
        $num = 0;
        if($result->num_rows() > 0 ){
            $total = $result->num_rows();
            $file_parts = ceil($total/1000);
            $parm = 1000;
            for ($i = 0;$i<$file_parts;$i++) {
                    $table_name = 'post';
                    if($i == 0){
                        $filename = 'sitemap-post';
                    }else{
                        $filename = 'sitemap-post'.''.$i;
                    }
                
//                if($total < 40000){
                    $this->db->select('*');
                    $this->db->from('sitemap');
                    $this->db->where('file_name',$filename.'.xml');
                    $result_data = $this->db->get();
                    
                    if($result_data->num_rows() == 0){
                        
                        $this->load->helper('file');

                        $current = 'Sitemap/index/'.$table_name.'/'.$parm;
                        
//                        $data = '$route["' . $filename . '.xml"] = "'.$current.'";';
                        $data = '$route["' . $filename . '.xml"] = "' . $current . '";';

                        if ( ! write_file('application/cache/routes.php', PHP_EOL.'<?php '.$data.' ?>', "a+"))
                        {
                                echo 'Unable to write the file';
                        }
                        else
                        {
                                echo 'File written!';
                        }
                        
                        $data = array(
                            'file_name' => $filename.'.xml',
                            'type' => $table_name ,
                            'total_url' => $parm

                        );

                       $this->db->insert('sitemap', $data); 
                       $insert_id = $this->db->insert_id();
                    }else{
                        $updated = date('Y-m-d H:i:s');
                        $data = array(
                            'updated' => $updated

                        );
//                    $this->db->set('updated', 'DATE_ADD(NOW(), INTERVAL 1 MINUTE)', FALSE);
                        $this->db->where('file_name', $filename.'.xml');
                       $this->db->update('sitemap',$data); 
//                       $insert_id = $this->db->insert_id();
                    }
//                }else{
//                    
//                }
                $parm = $parm + 1000;
            }
            
            $this->generateCommanFiles();
            
        }
        
    }
    
    public function updateSubCatURl($name,$cat,$subcat){
        
        $url = ''.$name.'/index/'.$cat.'/'.$subcat;
        
        $updated = date('Y-m-d H:i:s');
        $data = array(
            'updated' => $updated

        );
        
//         $this->db->set('updated', 'DATE_ADD(NOW(), INTERVAL 1 MINUTE)', FALSE);
        $this->db->where('current_url', $url);
       $this->db->update('video_url',$data); 
        
    }

        public function getSEOUrlCat($table_name,$total_url){
        
        $this->db->select('*');
        $this->db->from('cat_map_subcat AS a');
        $this->db->join('video_url AS ad', 'a.seo_url_id = ad.id');
        
//        $start = $total_url - 40000;
//        $limit = $total_url;
//        
//        if($limit!='' && $start!=''){
//            $this->db->limit($limit, $start);
//         }
        
        $result = $this->db->get();
          
                
//        print_r($beers['result']->result_array());exit;
        return $result->result_array();
    }
    
     public function generateMovieCat(){
        
        $sql = "SELECT * FROM `video_url` WHERE `current_url` like 'AllDetail/index/movie/%'";
        
        $result = $this->db->query($sql);
        
        return $result->result_array();
    }
    
    public function getSitemapFiles(){
        
        $this->db->select('*');
        $this->db->from('sitemap AS a');
//        $this->db->join('video_url AS ad', 'a.seo_url_id = ad.id');
        
//        $start = $total_url - 40000;
//        $limit = $total_url;
//        
//        if($limit!='' && $start!=''){
//            $this->db->limit($limit, $start);
//         }
        
        $result = $this->db->get();
          
                
//        print_r($beers['result']->result_array());exit;
        return $result->result_array();
    }
    
    public function getCommanSitemap(){
        $comman = array('movietrailer','videosong','movieposter','movie','actor','singer','director','musicdirector',
            'company','aboutus','contactus','faq','advertise','partnership','terms-privacy');
        
        for($i = 0;$i<sizeof($comman);$i++){
            
            $type = $comman[$i];
            if($type == 'movietrailer'){
                $query = $this->db->query("SELECT MAX( updated ) AS updated, MAX( created ) created FROM  `video` where cat_id = 1");
                $result = $query->result_array();
                $priority = '1.0';
                $freq = 'hourly';
            }else if($type == 'videosong'){
                $query = $this->db->query("SELECT MAX( updated ) AS updated, MAX( created ) created FROM  `video` where cat_id = 2 ");
                $result = $query->result_array();
                $priority = '1.0';
                $freq = 'hourly';
            }else if($type == 'movieposter'){
                $query = $this->db->query("SELECT MAX( updated ) AS updated, MAX( created ) created FROM  `poster`");
                $result = $query->result_array();
                $priority = '1.0';
                $freq = 'hourly';
            }else if($type == 'movie'){
                $query = $this->db->query("SELECT MAX( updated ) AS updated, MAX( created ) created FROM  `movie`");
                $result = $query->result_array();
                $priority = '1.0';
                $freq = 'hourly';
            }else if($type == 'actor'){
                $query = $this->db->query("SELECT MAX( updated ) AS updated, MAX( created ) created FROM  `cast`");
                $result = $query->result_array();
                $priority = '1.0';
                $freq = 'hourly';
            }else if($type == 'singer'){
                $query = $this->db->query("SELECT MAX( updated ) AS updated, MAX( created ) created FROM  `singer`");
                $result = $query->result_array();
                $priority = '1.0';
                $freq = 'hourly';
            }else if($type == 'director'){
                $query = $this->db->query("SELECT MAX( updated ) AS updated, MAX( created ) created FROM  `director`");
                $result = $query->result_array();
                $priority = '1.0';
                $freq = 'hourly';
            }else if($type == 'musicdirector'){
                $query = $this->db->query("SELECT MAX( updated ) AS updated, MAX( created ) created FROM  `music`");
                $result = $query->result_array();
                $priority = '1.0';
                $freq = 'hourly';
            }else if($type == 'company'){
                $query = $this->db->query("SELECT MAX( updated ) AS updated, MAX( created ) created FROM  `released_by`");
                $result = $query->result_array();
                $priority = '1.0';
                $freq = 'hourly';
            }else if($type == 'aboutus'){
                $query = $this->db->query("SELECT MAX( updated ) AS updated, MAX( created ) created FROM  `about_us`");
                $result = $query->result_array();
                $priority = '0.8';
                $freq = 'monthly';
            }else if($type == 'contactus'){
                $query = $this->db->query("SELECT MAX( updated ) AS updated, MAX( created ) created FROM  `contact_us`");
                $result = $query->result_array();
                $priority = '0.8';
                $freq = 'monthly';
            }else if($type == 'faq'){
                $query = $this->db->query("SELECT MAX( updated ) AS updated, MAX( created ) created FROM  `faq`");
                $result = $query->result_array();
                $priority = '0.8';
                $freq = 'monthly';
            }else if($type == 'advertise'){
                $query = $this->db->query("SELECT MAX( updated ) AS updated, MAX( created ) created FROM  `advertise`");
                $result = $query->result_array();
                $priority = '0.8';
                $freq = 'monthly';
            }else if($type == 'partnership'){
                $query = $this->db->query("SELECT MAX( updated ) AS updated, MAX( created ) created FROM  `partnership`");
                $result = $query->result_array();
                $priority = '0.8';
                $freq = 'monthly';
            }else if($type == 'terms-privacy'){
                $query = $this->db->query("SELECT MAX( updated ) AS updated, MAX( created ) created FROM  `terms_privacy`");
                $result = $query->result_array();
                $priority = '0.8';
                $freq = 'monthly';
            }
            
            //$result = $this->db->get();
            
            //if($result->num_rows() > 0){
                
                foreach ($result as $value) {
                    //echo $type;
                    if($value['created'] > $value['updated']){
                        $modify = $value['created'];
                    }else{
                                               
                        $modify = $value['updated'];
                    }
                    
                    $data[] = array('final_url'=>''.$type,
                        'modify'=>$modify,
                        'freq'=>$freq,
                        'priority'=>$priority);
                    
                }
                
            //}
            
        }
        
        return $data;
        
        
    }
    
    public function generateCommanFiles(){
//        $this->db->set('updated', 'DATE_ADD(NOW(), INTERVAL 1 MINUTE)', FALSE);
        
        
         $updated = date('Y-m-d H:i:s');
        $data = array(
            'updated' => $updated

        );
        
        $this->db->where('file_name', 'sitemap.xml');

        return $this->db->update('sitemap',$data);
    }
    
    public function getMainSiteData(){
        $query = $this->db->query("SELECT MAX( updated ) AS updated, MAX( created ) created FROM  `sitemap`");
                $result = $query->result_array();
                $priority = '1.0';
                $freq = 'hourly';
                
                foreach ($result as $value) {
                    //echo $type;
                    if($value['created'] > $value['updated']){
                        $modify = $value['created'];
                    }else{
                                               
                        $modify = $value['updated'];
                    }
                    
                    $data[] = array('final_url'=>''. base_url(),
                        'modify'=>$modify,
                        'freq'=>$freq,
                        'priority'=>$priority);
                    
                }
            return $data;    
    }
    
}
