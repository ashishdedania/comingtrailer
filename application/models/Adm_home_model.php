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
class Adm_home_model extends CI_Model{
    //put your code here
    public function __construct() {
       // parent::__construct();
        $this->load->database();
        $this->load->model('WebService');
        $this->load->model('Adm_sitemap_model');
    }
    
    public function getSubCat($subcat_id){
        
        $subcat = $this->WebService->getSubCategory($subcat_id);
        
       // print_r($subcat);exit;
       return $subcat;
    }
    
    public function getTopActors(){
      
        $this->db->select('a.`cast_id`,COUNT(a.`cast_id`) AS count,ad.cast_name,ad.`seo_url_id`');
        $this->db->from('video_map_cast AS a');
        $this->db->join('cast AS ad', 'a.cast_id = ad.id');
        $this->db->group_by('a.`cast_id`');
        $this->db->order_by('count','desc');
        $this->db->limit('8','0');
        
        $beers['result'] = $this->db->get(); 
//        print_r($beers['result']->result_array());exit;
        return $beers['result']->result_array();
        
       // print_r($subcat);exit;
//       return $subcat;
    }
    
    public function getTopSingers(){
        
        $this->db->select('a.`singer_id`,COUNT(a.`singer_id`) AS count,ad.singer_name,ad.`seo_url_id`');
        $this->db->from('video_map_singer AS a');
        $this->db->join('singer AS ad', 'a.singer_id = ad.id');
        $this->db->group_by('a.`singer_id`');
        $this->db->order_by('count','desc');
        $this->db->limit('8','0');
        
        $beers['result'] = $this->db->get(); 
//        print_r($beers['result']->result_array());exit;
        return $beers['result']->result_array();
        
       // print_r($subcat);exit;
//       return $subcat;
    }
    
    public function getAllMainCat(){
        $this->db->select('category.*');
        $this->db->from('category');
        //$this->db->join('sub_category', 'category.id = sub_category.cat_id');
        $beers['result'] = $this->db->get(); 
        
        return $beers['result']->result_array();
    }
    
    public function delete($id,$table,$seo_url_id,$cat_id){
        
        if($table == 'poster'){
            $this->db->select('*');
            $this->db->from('poster_img');
            //$this->db->join('sub_category', 'category.id = sub_category.cat_id');
            $this->db->where('poster_id', $id);
            $beers['result'] = $this->db->get(); 
            
            if($beers['result']->num_rows()>0){
                
                foreach ($beers['result']->result_array() as $value_id) {
                   
//                    echo 'test';exit;
                    $img = str_replace(base_url(), '', $value_id['poster_image']);
                    
//                     $filename = $trailer->video_thumb_285;
                        if(@getimagesize('images/poster/'.$value_id['poster_image'])) {
                            
                            unlink('images/poster/'.$value_id['poster_image']);
                        }
                        
                        if(@getimagesize('images/poster/285Xheight-'.$value_id['poster_image'])){
                            unlink('images/poster/285Xheight-'.$value_id['poster_image']);
                        }
                        
                        if(@getimagesize('images/poster/285X160-'.$value_id['poster_image'])){
                            unlink('images/poster/285X160-'.$value_id['poster_image']);
                        }
                    
                    
                    $this->db->where('id', $value_id['id']);
                    $this->db->delete('poster_img');
                    
                }
            }
            
//            $this->db->select('*');
//            $this->db->from('poster');
//            //$this->db->join('sub_category', 'category.id = sub_category.cat_id');
//            $this->db->where('id', $id);
//            $result = $this->db->get(); 
            
            
            
        }else{
            
            $this->db->select('*');
            $this->db->from('video');
            //$this->db->join('sub_category', 'category.id = sub_category.cat_id');
            $this->db->where('id', $id);
            $result = $this->db->get(); 
            
            if($result->num_rows()>0){
                
                foreach ($result->result_array() as $value_id) {
                    
                    $img = $value_id['video_thumb'];
                    
                    @unlink('images/videothumb/'.$img);
            //        unlink('images/videothumb/1280X720-'.$image_path);
                    @unlink('images/videothumb/285X160-'.$img);
                    
                }
            }
            
        }
        
        $this->db->where('id', $seo_url_id);
        $this->db->delete('video_url');
        
        $this->db->where('cat_id', $cat_id);
        $this->db->where('common_id', $id);
        $this->db->delete('user_activity');
        
        $this->db->where('id', $id);
        $this->db->delete(''.$table);
    }

        public function setSubCat(){
        
        $this->db->where('subcat_name', ''.$this->input->post('sub_name'));
            $query = $this->db->get('sub_category');
        
            if($query->num_rows()==0){
        
                $data = array(
                    'subcat_name' => $this->input->post('sub_name') ,
                    'sub_title' => $this->input->post('sub_title') ,
                    'sub_desc' => $this->input->post('sub_desc'),
                    'sub_keywords' => $this->input->post('sub_keywords')

                 );

                $this->db->insert('sub_category', $data); 
                $insert_id = $this->db->insert_id();

                //insert SEO row in seo table
                $data = array(
                    'category_id' => $this->input->post('main_cat'),
                    'sub_category_id' => $insert_id
                );
                $this->db->insert('seo', $data);
            }else{
                foreach ($query->result_array() as $value_id) {
                    $insert_id = $value_id['id'];
                }
            }
            
            $this->db->where('cat_id', ''.$this->input->post('main_cat'));
             $this->db->where('subcat_id', ''.$insert_id);
            $query1 = $this->db->get('cat_map_subcat');
            if($query1->num_rows()==0){
        //Mapping(making relation) of subcategory to its category
                $seo_url_id = $this->WebService->setTrailerLanguage($this->input->post('main_cat'),$insert_id);
                $data = array(
                    'cat_id' => $this->input->post('main_cat'),
                    'subcat_id' => $insert_id,
                    'seo_url_id' => $seo_url_id
                 );
                $this->db->insert('cat_map_subcat', $data);
            }
        return ($this->db->affected_rows() != 1) ? false : true;
    }
    
    public function addVideoMapMovie($video_id,$expod_data){
        $this->explodeAndSave('video_map_movie',$video_id,$expod_data,'video_id','movie_id','movie','movie_name');
    }
    
    public function addVideoMapCast($video_id,$expod_data){
        $this->explodeAndSave('video_map_cast',$video_id,$expod_data,'video_id','cast_id','cast','cast_name');
    }
    
    public function addVideoMapSinger($video_id,$expod_data){
        $this->explodeAndSave('video_map_singer',$video_id,$expod_data,'video_id','singer_id','singer','singer_name');
    }
    
    public function addVideoMapMusic($video_id,$expod_data){
        
        $this->explodeAndSave('video_map_music',$video_id,$expod_data,'video_id','music_id','music','music_name');
    }
    
    public function addVideoMapDirector($video_id,$expod_data){
        $this->explodeAndSave('video_map_director',$video_id,$expod_data,'video_id','director_id','director','director_name');
    }
    
    public function addVideoMapRelesed($video_id,$expod_data){
        $this->explodeAndSave('video_map_relby',$video_id,$expod_data,'video_id','rel_by_id','released_by','rel_by_name');
    }

    public function explodeAndSave($tablename,$id,$data,$pri_idtag,$sec_idtag,$main_table,$main_col_name){
        
        $datas = explode(",", $data);
        
        $this->db->where(''.$pri_idtag, $id);
        $this->db->delete(''.$tablename);
        $subcat_id = $this->input->post('subcat');
        foreach($datas as $value) {
            //$cat = trim($cat);
//            echo $value;
            if($value != ''){
            $this->db->where(''.$main_col_name, trim($value));
            $query = $this->db->get(''.$main_table);
           //$query = $this->db->get_where(''.$main_table,array(''.$main_col_name,''.$value));
//            echo $query->num_rows().'...'.$main_table.'...'.$main_col_name.'...'.$value;exit
            if($query->num_rows()>0){
                foreach ($query->result_array() as $value_id) {
                    $data_array = array(
                        $pri_idtag => $id,
                        $sec_idtag => trim($value_id['id'])
                    );

                    $insert = $this->db->insert($tablename,$data_array);
                    break;
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
    
    public function addVideoData($data = array()){
//        if(!array_key_exists("created",$data)){
//            $data['created'] = date("Y-m-d H:i:s");
//        }
//        if(!array_key_exists("modified",$data)){
//            $data['modified'] = date("Y-m-d H:i:s");
//        }
        
        $insert = $this->db->insert('video',$data);
        if($insert){
            $insert_id = $this->db->insert_id();
            $rel_date = $this->input->post('reldate');
            $today = date('Y-m-d');
            if($today != $rel_date){
                $this->sendNotification($data,$insert_id);
            }
//            $this->db->set('updated', 'DATE_ADD(NOW(), INTERVAL 1 MINUTE)', FALSE);
//            $this->db->where('id', $insert_id);
//            
//            $this->db->update('video',$data);
            
            return $insert_id;
        }else{
            return false;    
        }
    }
    
    public function editVideoData($video_id,$data = array()){
//        if(!array_key_exists("created",$data)){
//            $data['created'] = date("Y-m-d H:i:s");
//        }
//        if(!array_key_exists("modified",$data)){
//            $data['modified'] = date("Y-m-d H:i:s");
//        }
        $this->db->set('updated', 'DATE_ADD(NOW(), INTERVAL 1 MINUTE)', FALSE);
        $this->db->where('id', $video_id);
        
            return $this->db->update('video',$data);
//        if($insert){
//            return $this->db->insert_id();
//        }else{
//            return false;    
//        }
    }
    
    
    public function sendNotification($videodata = array(),$insert_id){
        
        //Notification Sending
        $this->db->select('fcm_token');
        $this->db->from('fcm');
        $noti['result'] = $this->db->get();
//	$fcm_data = mysqli_query($dbConnect, "SELECT b.fcm_token FROM network a, app_fcm b WHERE (FIND_IN_SET(b.user_id, a.`friends`) != 0) AND a.`id` = '$my_id'");
	
	$r = array();

	if( $noti['result']->num_rows() > 0 ){
		
	
		foreach($noti['result']->result_array() as $data){
			
			$r[] = $data['fcm_token'];
		}
		$message = "Uploaded new video: ".$videodata['video_name'];
                 $created = date('Y-m-d H:i:s');
                $myData = array(
                            'cat_id' => $videodata['cat_id'],
                            'subcat_id' => $videodata['subcat_id'],
                            'comman_id' => $insert_id,
                            'noti_type' => '',
                            'created' => ''.$created
                            
                        );
                
                $this->db->insert('notification',$myData);
                
//
//
			$gcm_reg_id_list = $r;

			$this->WebService->send_notification($gcm_reg_id_list,array('message'=>''.$message,'cat_id'=>$videodata['cat_id'],'subcat_id'=>$videodata['subcat_id']));

	}
	//End Notification Sending
        
    }

    

    public function get_video_by_id($id = 0)
    {
        if ($id === 0)
        {
            $query = $this->db->get('video');
            return $query->result_array();
        }
 
        $query = $this->db->get_where('video', array('id' => $id));
//        print_r($query->row_array());exit;
        return $query->row_array();
    }
	
	// Insert about us content
	public function addAboutUsData($data = array()){
            
             $updated = date('Y-m-d H:i:s');
                    
        $data['updated'] = $updated;
            
        $insert = $this->db->update('about_us',$data);
        if($insert){
            
            $this->generateCommanFiles();
            
            return true;
        }else{
            return false;    
        }
    }
	// Get about us content
	public function getAboutUsData(){
        $this->db->select('about_us_content');
        $this->db->from('about_us');
        $beers['result'] = $this->db->get();
        return $beers['result']->row_array();
    }
	
	
	/**
	* Contact Form
	*/
	// Insert contact us content
	public function addContactUsData($data = array()){
            
             $updated = date('Y-m-d H:i:s');
                    
        $data['updated'] = $updated;
            
        $insert = $this->db->update('contact_us',$data);
        if($insert){
            
            $this->generateCommanFiles();
            
            return true;
        }else{
            return false;    
        }
    }
	// Get contact us content
	public function getContactUsData(){
        $this->db->select('contact_us_content');
        $this->db->from('contact_us');
        $beers['result'] = $this->db->get();
        return $beers['result']->row_array();
    }
	// Insert contact form data
	public function addContactFormData($data = array()){
        $insert = $this->db->insert('contact_us_data',$data);
        if($insert){
            return true;
        }else{
            return false;    
        }
    }
	
	// Get contact form data
    public function getContactFormData(){
		$this->db->select('contact_us_data.*');
        $this->db->from('contact_us_data');
        
        if($this->input->post('search_year')){
            $this->db->where("DATE_FORMAT(`created`,'%Y')",$this->input->post('search_year'));
        }
        if($this->input->post('search_month')){
            $this->db->where("DATE_FORMAT(`created`,'%c')",$this->input->post('search_month'));
        }
        
        if($this->input->post('search_keyword')){
            $this->db->like('LOWER(`first_name`)',$this->input->post('search_keyword'));
            $this->db->or_like('LOWER(`last_name`)',$this->input->post('search_keyword'));
            $this->db->or_like('LOWER(`email`)',$this->input->post('search_keyword'));
            $this->db->or_like('LOWER(`category`)',$this->input->post('search_keyword'));
        }
        
        
		$beers['result'] = $this->db->get();
        return $beers['result']->result_array();
	}
	
	// Insert FAQ content
	public function addFaqData($data = array()){
            
             $updated = date('Y-m-d H:i:s');
                    
        $data['updated'] = $updated;
            
        $insert = $this->db->update('faq',$data);
        if($insert){
            
            $this->generateCommanFiles();
            
            return true;
        }else{
            return false;    
        }
    }
	// Get FAQ content
	public function getFaqData(){
        $this->db->select('faq_content');
        $this->db->from('faq');
        $beers['result'] = $this->db->get();
        return $beers['result']->row_array();
    }
	
	/**
	* Advertise Form
	*/
	// Insert Advertise content
	public function addAdvertiseData($data = array()){
            
             $updated = date('Y-m-d H:i:s');
                    
        $data['updated'] = $updated;
            
        $insert = $this->db->update('advertise',$data);
        if($insert){
            
            $this->generateCommanFiles();
            
            return true;
        }else{
            return false;    
        }
    }
	// Get Advertise content
	public function getAdvertiseData(){
        $this->db->select('advertise_content');
        $this->db->from('advertise');
        $beers['result'] = $this->db->get();
        return $beers['result']->row_array();
    }
	// Insert Advertise form data
	public function addAdvertiseFormData($data = array()){
        $insert = $this->db->insert('advertise_data',$data);
        if($insert){
            return true;
        }else{
            return false;    
        }
    }
	// Get Advertise form data
	public function getAdvertiseFormData(){
		$this->db->select('advertise_data.*');
        $this->db->from('advertise_data');
        
        if($this->input->post('search_year')){
            $this->db->where("DATE_FORMAT(`created`,'%Y')",$this->input->post('search_year'));
        }
        if($this->input->post('search_month')){
            $this->db->where("DATE_FORMAT(`created`,'%c')",$this->input->post('search_month'));
        }
        
        if($this->input->post('search_keyword')){
            $this->db->like('LOWER(`first_name`)',$this->input->post('search_keyword'));
            $this->db->or_like('LOWER(`last_name`)',$this->input->post('search_keyword'));
            $this->db->or_like('LOWER(`email`)',$this->input->post('search_keyword'));
            $this->db->or_like('LOWER(`city`)',$this->input->post('search_keyword'));
            $this->db->or_like('LOWER(`country`)',$this->input->post('search_keyword'));
        }
        
	$beers['result'] = $this->db->get();
        return $beers['result']->result_array();
	}
	/**
	* Partnership Form
	*/
	// Insert Partnership content
	public function addPartnershipData($data = array()){
            
             $updated = date('Y-m-d H:i:s');
                    
        $data['updated'] = $updated;
            
        $insert = $this->db->update('partnership',$data);
        if($insert){
            
            $this->generateCommanFiles();
            
            return true;
        }else{
            return false;    
        }
    }
	// Get Partnership content
    public function getPartnershipData(){
        $this->db->select('partnership_content');
        $this->db->from('partnership');
        $beers['result'] = $this->db->get();
        return $beers['result']->row_array();
    }
	// Insert Partnership form data
	public function addPartnershipFormData($data = array()){
        $insert = $this->db->insert('partnership_data',$data);
        if($insert){
            
            
            
            return true;
        }else{
            return false;    
        }
    }
	// Get Partnership form data
	public function getPartnershipFormData(){
		$this->db->select('partnership_data.*');
        $this->db->from('partnership_data');
        
        if($this->input->post('search_year')){
            $this->db->where("DATE_FORMAT(`created`,'%Y')",$this->input->post('search_year'));
        }
        if($this->input->post('search_month')){
            $this->db->where("DATE_FORMAT(`created`,'%c')",$this->input->post('search_month'));
        }
        
        if($this->input->post('search_keyword')){
            $this->db->like('LOWER(`first_name`)',$this->input->post('search_keyword'));
            $this->db->or_like('LOWER(`last_name`)',$this->input->post('search_keyword'));
            $this->db->or_like('LOWER(`email`)',$this->input->post('search_keyword'));
            $this->db->or_like('LOWER(`city`)',$this->input->post('search_keyword'));
            $this->db->or_like('LOWER(`country`)',$this->input->post('search_keyword'));
        }
        
		$beers['result'] = $this->db->get();
        return $beers['result']->result_array();
	}
	// Insert Terms Privacy content
	public function addTermsPrivacyData($data = array()){
            
            
             $updated = date('Y-m-d H:i:s');
                    
        $data['updated'] = $updated;
            
        $insert = $this->db->update('terms_privacy',$data);
        if($insert){
            
            $this->generateCommanFiles();
            
            return true;
        }else{
            return false;    
        }
    }
	// Get Terms Privacy content
    public function getTermsPrivacyData(){
        $this->db->select('terms_privacy_content');
        $this->db->from('terms_privacy');
        $beers['result'] = $this->db->get();
        
        
        
        return $beers['result']->row_array();
    }
    
    public function getSEOUrl(){
        
        $this->db->select('final_url');
        $this->db->from('video_url');
        $beers['result'] = $this->db->get();
          
//        print_r($beers['result']->result_array());exit;
        return $beers['result'];
    }
    
    public function getVideoImage($video_id,$table_name){
        
        $this->db->select('*');
        $this->db->from(''.$table_name);
        $this->db->where('id',$video_id);
        $beers['result'] = $this->db->get();
        $img_path = '';
       foreach ($beers['result']->result_array() as $value) {
           
           $img_path = $value['video_thumb'];
            
        }
        
        return $img_path;
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
    
}
