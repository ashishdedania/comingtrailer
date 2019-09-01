<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Individual
 *
 * @author yoo
 */
class Individual extends CI_Controller{

    //put your code here
    
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->model('WebService');
        $this->load->model('Seo_data_model');
        $this->load->model('adm_home_model');
    }
    
    public function index($table = '', $id = '', $mstp = 'm'){ 

        if(($table == '') || ($id == '')){
            redirect('My404');
        }
        if($table == 'cast' || $table == 'singer' || $table == 'director' || $table == 'music' )
        {
            redirect('My404');   
        }
        if($table == 'relby'){
            if($mstp == 'm'){
                $mstp = 's';
            }
            $result = $this->db->get_where('released_by',array("id"=>$id,"status"=>0))->result_array();
        }else $result = $this->db->get_where($table,array("id"=>$id,"status"=>0))->result_array();
        if(empty($result)){
            redirect('My404');
        }      
        $map_arr = ['m'=>'movie','s'=>'video','t'=>'video','p'=>'poster'];
        $label_map_arr = ['m'=>'Movie','s'=>'Song','t'=>'Trailer','p'=>'Poster'];
        $curretn_key = '';
        foreach($map_arr as $key => $val){
            if(!($key == 'p' && ($table == 'music' || $table == 'singer'))){
                if($table == 'relby'){
                    if(($key == 's' || $key == 't')){
                        $result = $this->getMSTPdata($table, $id, $key);
                        $this->data['total'][$label_map_arr[$key]] = count($result);
                        if($key == $mstp){
                            //echo $this->db->last_query();exit;
                            $curretn_key = $key;
                            $this->data['mstp_detail'] = $result;
                        }
                    }
                }else{
                    $result = $this->getMSTPdata($table, $id, $key);
                    $this->data['total'][$label_map_arr[$key]] = count($result);
                    if($key == $mstp){
                        $curretn_key = $key;
                        $this->data['mstp_detail'] = $result;
                        // print_r($this->data['mstp_detail']);exit;
                    }
                }
            }
            //echo $this->db->last_query().'<br>';
        }
        if($table == 'relby'){
             $this->data['individual_detail'] = $this->db->get_where('released_by',array('id'=>$id))->row_array();
//             $this->data['year_list'] = $this->WebService->getMinYear($table);
        }else{
            $this->data['individual_detail'] = $this->db->get_where($table,array('id'=>$id))->row_array();
//            $this->data['year_list'] = $this->WebService->getMinYear($table,'created');
        }
//        echo $curretn_key;exit;
        if($curretn_key == 'm'){
            $this->data['year_list'] = $this->WebService->getMinYear('movie');
         }else if($curretn_key == 's'){
             $this->data['year_list'] = $this->WebService->getMinYear('video','rel_date');
         }
         else if($curretn_key == 't'){
             $this->data['year_list'] = $this->WebService->getMinYear('video','rel_date');
         }else if($curretn_key == 'p'){
             $this->data['year_list'] = $this->WebService->getMinYear('poster','rel_date');
         }
        
        $this->data['label'] = $label_map_arr[$mstp];
        //echo '<pre>';print_r($this->data['mstp_detail']);exit;
        $this->data['head_adv'] = $this->WebService->getAdsense(300,250);
        $this->data['side_adv'] = $this->WebService->getAdsense(300,600);
        $this->data['table'] = $table;
        $this->data['id'] = $id;
        $this->data['mstp'] = $mstp;
        $this->data['mapped_table'] = $map_arr[$mstp];
        //For SEO
//        if($table == 'relby'){
//            $indi_name = $this->data['individual_detail']['rel_by_name'];
//        }else{
//            $indi_name = $this->data['individual_detail'][$table.'_name'];
//
//        }
        
        
//        if($table == 'relby'){
//            $this->data['seo']['description']= $this->data['individual_detail']['rel_by_desc'] ;
//            $this->data['seo']['keywords']= $keywords[$table].$this->data['individual_detail']['rel_by_keywords'] ;
//
//        }else{
//            $this->data['seo']['description']= $this->data['individual_detail'][$table.'_desc'] ;
//            $this->data['seo']['keywords']= $keywords[$table].$this->data['individual_detail'][$table.'_keywords'] ;
//
//        }
         
        
        
//        $link = base_url('individual/index/'.$table.'/'.$id);
        $link = $this->getSeoUrl($this->data['individual_detail']['seo_url_id']);
        $type = $table; 
        $this->data['seo_data'] = $this->Seo_data_model->getSEO($type,$this->data['individual_detail'],$link);
                
        //Footer links
        $this->data['top_actors'] = $this->adm_home_model->getTopActors();
        $this->data['top_singers'] = $this->adm_home_model->getTopSingers();
        
        $this->data['trailer_cat'] = $this->adm_home_model->getSubCat(1);
        $this->data['video_cat'] = $this->adm_home_model->getSubCat(2);
        
        $this->data['controller']=$this;
        $this->data['item_prop']=$this->getItemProp($table,$this->data['individual_detail'],$link);
        
        $this->load->view('header_footer/front_header',$this->data);
        $this->load->view('individual');
        $this->load->view('header_footer/front_footer',$this->data);
        
    }
    
    public function getItemProp($table,$individual_detail,$link){
        $name = '';
        if($table == 'relby'){
            $name = trim($individual_detail['rel_by_name']);
        }else{
            $name = trim($individual_detail[$table.'_name']);
        }
        $itemprop = '<div itemscope itemtype="http://schema.org/Person">'.PHP_EOL;
        $itemprop = $itemprop.'<meta itemprop="name" content ="'.$name.'" />'.PHP_EOL;
        if($table == 'cast'){
            $itemprop = $itemprop.'<meta itemprop="actor" content ="'.$name.'" />'.PHP_EOL;
            $desc = ''.$name.' Video Songs & Trailer Watch it - Download '.$name.' HD Poster Free. Play '.$name.' Video Songs & Trailer and Download Movie HD Poster First Look and Wallpaper on Coming Trailer.com.';
            $itemprop = $itemprop.'<meta itemprop="description" content ="'.$desc.'" />'.PHP_EOL;
            
            $filename = base_url('images/actors/'.$individual_detail[$table.'_img']);
            if(@getimagesize($filename)) {
                 $image = base_url('images/actors/'.$individual_detail[$table.'_img']);
            }else{
                $image = base_url('resources/images/no-movie.svg');
            }
            $itemprop = $itemprop.'<meta itemprop="image" content ="'.$image.'" />'.PHP_EOL;
            
        }else if($table == 'singer'){
//           $itemprop = $itemprop.'<meta itemprop="singer" content ="'.$name.'" />'.PHP_EOL;
           $desc = ''.$name.' Video Songs Watch it - Play '.$name.' All Hit Video Songs Free Online. Play '.$name.' Movie Hit Video Songs and music album on Coming Trailer.com.';
           $itemprop = $itemprop.'<meta itemprop="description" content ="'.$desc.'" />'.PHP_EOL;
           
           $filename = base_url('images/singers/'.$individual_detail[$table.'_img']);
            if(@getimagesize($filename)) {
                 $image = base_url('images/singers/'.$individual_detail[$table.'_img']);
            }else{
                $image = base_url('resources/images/no-movie.svg');
            }
            $itemprop = $itemprop.'<meta itemprop="image" content ="'.$image.'" />'.PHP_EOL;
           
        }else if($table == 'director'){
           $itemprop = $itemprop.'<meta itemprop="director" content ="'.$name.'" />'.PHP_EOL;
           $desc = ''.$name.' Movie Video Songs & Trailer Watch it - Download '.$name.' Movie HD Poster Free. Play '.$name.' Movie Video Songs & Trailer and Download Movie HD Poster First Look and Wallpaper on Coming Trailer.com.';
           $itemprop = $itemprop.'<meta itemprop="description" content ="'.$desc.'" />'.PHP_EOL;
           
           $filename = base_url('images/directors/'.$individual_detail[$table.'_img']);
            if(@getimagesize($filename)) {
                 $image = base_url('images/directors/'.$individual_detail[$table.'_img']);
            }else{
                $image = base_url('resources/images/no-movie.svg');
            }
            $itemprop = $itemprop.'<meta itemprop="image" content ="'.$image.'" />'.PHP_EOL;
           
        }else if($table == 'music'){
            $itemprop = $itemprop.'<meta itemprop="musicBy" content ="'.$name.'" />'.PHP_EOL;
            $desc = ''.$name.' Movie Video Songs & Trailer Watch it - Play '.$name.' All Movie Hit Video Songs Free Online. Play '.$name.' Movie Hit Video Songs and music album on Coming Trailer.com.';
            $itemprop = $itemprop.'<meta itemprop="description" content ="'.$desc.'" />'.PHP_EOL;
            
            $filename = base_url('images/music/'.$individual_detail[$table.'_img']);
            if(@getimagesize($filename)) {
                 $image = base_url('images/music/'.$individual_detail[$table.'_img']);
            }else{
                $image = base_url('resources/images/no-movie.svg');
            }
            $itemprop = $itemprop.'<meta itemprop="image" content ="'.$image.'" />'.PHP_EOL;
            
        }else if($table == 'relby'){
            $itemprop = $itemprop.'<meta itemprop="copyrightHolder" content ="'.$name.'" />'.PHP_EOL;
            $desc = ''.$name.' Video Songs & Trailer Watch it - Play '.$name.' All Movie Hit Video Songs & Trailer Free Online. Play '.$name.' Movie Hit Video Songs and music album on Coming Trailer.com.';
            $itemprop = $itemprop.'<meta itemprop="description" content ="'.$desc.'" />'.PHP_EOL;
            
            $filename = base_url('images/channel/'.$individual_detail['rel_by_img']);
            if(@getimagesize($filename)) {
                 $image = base_url('images/channel/'.$individual_detail['rel_by_img']);
            }else{
                $image = base_url('resources/images/no-movie.svg');
            }
            $itemprop = $itemprop.'<meta itemprop="image" content ="'.$image.'" />'.PHP_EOL;
        }
        
         $itemprop = $itemprop.'<meta itemprop="url" content="'.$link.'" />'.PHP_EOL;
         $itemprop = $itemprop.'<meta itemprop="url" content="android-app URL" />'.PHP_EOL;
        
        $itemprop = $itemprop.'</div>';
        
        return $itemprop;
    }

        public function getSeoUrl($seo_id){
//        echo '$seo_id';exit;
//        echo $table_nmae;exit;
        $final_url = $this->WebService->getSeoUrl('video_url',$seo_id);
        return $final_url;
    }
    

        public function getMSTPdata($table, $id, $mstp = 'm'){
        $map_arr = ['m'=>'movie','s'=>'video','t'=>'video','p'=>'poster'];
        $this->db->select('*');
        
        $this->db->from($map_arr[$mstp].'_map_'.$table.' AS map');// I use aliasing make joins easier
        $this->db->join($map_arr[$mstp].' AS mapped', 'mapped.id = map.'.$map_arr[$mstp].'_id', 'INNER');
        if($table == 'relby'){
            $this->db->where(array('map.rel_by_id'=>$id));
        }else{
            $this->db->where(array('map.'.$table.'_id'=>$id));
        }
        if($mstp != 'm'){
            $this->db->where('mapped.is_deleted',0);
        }
        if($mstp == 't'){ //--> Get Video Trailer
            $this->db->where('mapped.cat_id',1);
        }elseif($mstp == 's'){ //--> Get video Songs
            $this->db->where('mapped.cat_id',2);
        }
        
        if($this->input->post('search_year')){
            //echo $this->input->post('search_year');exit;
            
            $this->db->where("DATE_FORMAT(`mapped`.`rel_date`,'%Y')",$this->input->post('search_year'));
        }
        
        if($this->input->post('search_month')){
                //echo $this->input->post('search_month');exit;
                $this->db->where("DATE_FORMAT(`mapped`.`rel_date`,'%c')",$this->input->post('search_month'));
            }
        
        if($this->input->post('search_keyword')){
            if($this->input->post('search_keyword') == '0-9'){
                //echo $this->input->post('search_keyword');exit;
                $this->db->where(array('`mapped`.`'.$map_arr[$mstp].'_name` RLIKE '=>'^[0-9].*'));
            }else{
                //$this->db->like('`mapped`.`'.$map_arr[$mstp].'_name`',$this->input->post('search_keyword'), 'after');
                //$this->db->or_like('`mapped`.`'.$map_arr[$mstp].'_name`', lcfirst($this->input->post('search_keyword')), 'after');
                $this->db->where('(`mapped`.`'.$map_arr[$mstp].'_name` LIKE "'.$this->input->post('search_keyword').'%" OR `mapped`.`'.$map_arr[$mstp].'_name` LIKE "'.lcfirst($this->input->post('search_keyword')).'%")');
            }
        }
        $this->db->order_by("mapped.rel_date", "desc");
        return $this->db->get()->result_array();
    }
    
    public function searchMSTP($table, $id, $mstp = 'm'){
        if(!$this->input->is_ajax_request()){
           exit('No direct script access allowed');
        }
        $result = $this->getMSTPdata($table, $id, $mstp);
//        print_r($result);exit;
        if(count($result) > 0){
            $mstp_data = '';
            $map_arr = ['m'=>'movie','s'=>'video','t'=>'video','p'=>'poster'];
            foreach($result as $key => $val){
                $seo_url = $this->getSeoUrl($val['seo_url_id']);
                if($val[$map_arr[$mstp].'_name'] != ''){
                    if($map_arr[$mstp] == 'movie'){
                        $time=strtotime($val['rel_date']);
                        $dates = '';
                        if($val['rel_date'] != '0000-00-00'){
                            if($val['rel_date'] != ''){
                                $dates = date('Y',$time);

                            }

                        }
                        $mstp_data .= '<li><a href="' . $seo_url. '">' . $val[$map_arr[$mstp].'_name'] . '</a><a href="javascript:void(0)" onclick="selectYear('.$dates.');" class="year">'.$dates.'</a></li>';
                    }else{
                        $mstp_data .= '<li><a href="' . $seo_url. '">' . $val[$map_arr[$mstp].'_name'] . '</a></li>' . '';
                    }
                }
            }
            echo rtrim($mstp_data,', ');
        }else echo 'No Data Found';
    }
}
