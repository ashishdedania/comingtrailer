<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of VideoDetail
 *
 * @author yoo
 */
class VideoDetail extends CI_Controller {

    //put your code here

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('adm_home_model');
        $this->load->model('WebService');
        $this->load->model('Front_Model');
        $this->load->model('Seo_data_model');
    }

    public function index($cat_id = '', $subcat_id = '', $video_id = '', $is_amp = '') {
//phpinfo();
//die('kkk');

        //die('issue');


            $type = 'video';
            $ip   = $this->getRealIpAddr();
            $id   = $video_id;

            $sql = "SELECT count(*) as total FROM ip_address_view WHERE type = '".$type."' and ipaddress = '".$ip."' and item_id = ".$id."";
            $data = $this->My_model->getresult($sql);
            if($data[0]['total'] == 0)
            {

                $sql = "SELECT count(*) as total FROM video WHERE id = ".$id."";
                $data = $this->My_model->getresult($sql);
                if($data[0]['total'] > 0)
                {

                    $sql      = "SELECT * FROM video WHERE id = ".$id;
                    $data     = $this->My_model->getresult($sql);
                    $addpoint = $data[0]['play'];

                    $newt = 1 + $addpoint;
                    
                    


                    $this->db->update('video',['play' => $newt],array('id'=>$id));

                    

                    $this->db->insert('ip_address_view',['type' => $type, 'ipaddress'=>$ip, 'item_id'=>$id, 'created'=>date("Y-m-d H:i:s")]);
                    

                }

             

            }

        if ($is_amp != 'amp') {
            if (($cat_id == '') || ($subcat_id == '') || ($video_id == '')) {
                redirect('My404');
            }



            
            



            $this->data['trailer'] = $this->WebService->getIndividualTrailer($cat_id, $subcat_id, '', '', $video_id);

            $this->data['head_adv'] = $this->WebService->getAdsense(728, 90);
            $this->data['side_adv'] = $this->WebService->getAdsense(300, 250);
            $this->data['controller'] = $this;

            $this->data['cat_id'] = $cat_id;

            //For SEO
            $temp = json_decode($this->data['trailer']);
            //print_r($temp);exit;
            $type = '';
            if ($cat_id == 1) {
                $type = 'trailer';
                //            $this->data['seo']['title']= $temp->data[0]->video_name.' Trailer Watch it: Free on ComingTrailer.com';
                //            $this->data['seo']['keywords']= $temp->data[0]->video_name.' Trailer, Watch it Online HD '.$temp->data[0]->video_name.' Trailer, '.$temp->data[0]->video_keywords;
            }
            if ($cat_id == 2) {
                $type = 'video';
                //            $this->data['seo']['title']= $temp->data[0]->video_name.' Video Song Watch it: Free on ComingTrailer.com';
                //            $this->data['seo']['keywords']= $temp->data[0]->video_name.' Video Song, Watch it Online HD '.$temp->data[0]->video_name.' Video Song, '.$temp->data[0]->video_keywords;
            }
            //        $this->data['seo']['description']= $temp->data[0]->video_desc;
            //        $link = base_url('VideoDetail/index/'.$cat_id.'/'.$subcat_id.'/'.$video_id);
            $datas = json_decode($this->data['trailer']);
            if ($datas->status == 1) {
                redirect('My404');
            }
            $link = $this->getSeoUrl($datas->data[0]->seo_url_id);
            $this->data['mylink'] = $link;

            $this->data['seo_data'] = $this->Seo_data_model->getSEO($type, json_decode($this->data['trailer']), $link);

            //Footer links
            $this->data['top_actors'] = $this->adm_home_model->getTopActors();
            $this->data['top_singers'] = $this->adm_home_model->getTopSingers();

            $this->data['trailer_cat'] = $this->adm_home_model->getSubCat(1);
            $this->data['video_cat'] = $this->adm_home_model->getSubCat(2);


            $this->data['item_prop'] = $this->getItemProp($cat_id, $this->data['trailer'], $link);

            $this->load->view('header_footer/front_header', $this->data);
            $this->load->view('video_play');
            $this->load->view('header_footer/front_footer', $this->data);
        } else if ($is_amp == 'amp') {

            $this->data['trailer'] = $this->WebService->getIndividualTrailer($cat_id, $subcat_id, '', '', $video_id);

            $this->data['head_adv'] = $this->WebService->getAdsense(300, 90);
            $this->data['side_adv'] = $this->WebService->getAdsense(300, 251);

            $this->data['controller'] = $this;

            $this->data['cat_id'] = $cat_id;


            $datas = json_decode($this->data['trailer']); //echo '<pre>'; print_r($datas); die('ppp');
            if ($datas->status == 1) {
                redirect('My404');
            }
            $link = $this->getSeoUrl($datas->data[0]->seo_url_id);
            $this->data['mylink'] = $link;

            $cast = '';

            foreach ($datas->data[0]->video_cast as $value) {

                $cast = $cast . '' . $value->cast_name . ', ';
            }

            $cast = rtrim($cast, ', ');

            if ($cast == '') {
                $cast = $cast;
            } else {
                $cast = '' . $cast;
            }
//            $cast = rtrim($cast);
            $my_key = '';
            if ($datas->data[0]->video_keywords == '') {
                $my_key = $datas->data[0]->video_keywords;
            } else {
                $my_key = ',' . $datas->data[0]->video_keywords;
            }



            if ($cat_id == 1) {
                $this->data['title'] = $datas->data[0]->video_name . ' Watch it Online Free on Coming Trailer.com';
                $this->data['keywords'] = $datas->data[0]->video_name . ',HD ' . $datas->data[0]->video_name . ',Watch it Online HD ' . $datas->data[0]->video_name . ', ' . $cast . '' . $my_key;

                if ($datas->data[0]->video_desc == '') {

                    $desc = $datas->data[0]->video_name . ' Watch it Online Free. Play Online HD ' . $datas->data[0]->video_name . ' Starring ' . $cast . '. HD ' . $datas->data[0]->video_name . ' Free on Coming Trailer.com.';
                } else {

                    $desc = $datas->data[0]->video_desc;
                }

                $this->data['desc'] = '' . $desc;
            } else if ($cat_id == 2) {

                $music_by = '';

                foreach ($datas->data[0]->Music as $value) {

                    $music_by = $music_by . '' . $value->music_name . ', ';
                }

                $byArtist = '';

                foreach ($datas->data[0]->singer as $value) {

                    $byArtist = $byArtist . '' . $value->singer_name . ', ';
                }

                $music_by = rtrim($music_by, ', ');
                $byArtist = rtrim($byArtist, ', ');

//                if($music_by == ''){
//                    $music_by = $music_by;
//                }else{
//                    $music_by = ' '.$music_by;
//                }
                $movie_name = '';
                foreach ($datas->data[0]->movies as $value) {

                    $movie_name = $movie_name . '' . $value->movie_name . ', ';
                }
                $movie_name = rtrim($movie_name, ', ');
                $mymovie = '';
                if ($movie_name != '') {
                    $mymovie = 'From ' . $movie_name . ' Movie';
                }
                $title = $datas->data[0]->video_name . ' Video Song ' . $mymovie . ' Watch it Online Free on Coming Trailer.com';

                $this->data['title'] = $title;

                $mymovie = '';
                if ($movie_name != '') {
                    $mymovie = ', ' . $movie_name . '';
                }

                $myartist = '';
                if ($byArtist != '') {
                    $myartist = ', ' . $byArtist;
                }

                $mymusic_by = '';
                if ($music_by != '') {
                    $mymusic_by = ', ' . $music_by;
                }

                $mycast = '';
                if ($cast != '') {
                    $mycast = ', ' . $cast;
                } else {
                    $mycast = '';
                }

                $my_key = '';
                if ($datas->data[0]->video_keywords == '') {
                    $my_key = $datas->data[0]->video_keywords;
                } else {
                    $my_key = ', ' . $datas->data[0]->video_keywords;
                }

                $keywords = '' . $datas->data[0]->video_name . ' Video Song, HD Video Song, Watch it Online HD ' . $datas->data[0]->video_name . ' Video Song' . $mymovie . '' . $myartist . '' . $mymusic_by . '' . $mycast . '' . $my_key . '';
                $keywords = rtrim($keywords, ', ');

                $keywords = rtrim($keywords, ',');

                $myartist = '';
                if ($byArtist != '') {
                    $myartist = 'Singer by ' . $byArtist . ' and ';
                } else {
                    $myartist = '';
                }
                $mycast = '';
//            $cast = rtrim($cast,', ');

                if ($cast != '') {
                    $mycast = 'Starring ' . $cast . ' and ';
                } else {
                    $mycast = '';
                }
                $mymovie = '';
                if ($movie_name != '') {
                    $mymovie = 'From ' . $movie_name . ' Movie';
                } else {
                    $mymovie = '';
                }

                $mymusic_by = '';
                if ($music_by != '') {
                    $mymusic_by = 'Music by ' . $music_by;
                }



                if ($datas->data[0]->video_desc == '') {

                    $desc = '' . $datas->data[0]->video_name . ' Video Song ' . $mymovie . ' Watch it Online Free.'
                            . ' Play Online HD ' . $datas->data[0]->video_name . ' Video Song ' . $mycast . ''
                            . '' . $myartist . '' . $mymusic_by . ' Free on ComingTrailer.com.';
                } else {

                    $desc = $datas->data[0]->video_desc;
                }



                $this->data['keywords'] = $keywords;
                $this->data['keywords'] = rtrim($this->data['keywords'], ', ');

                $this->data['keywords'] = rtrim($this->data['keywords'], ',');



                $this->data['desc'] = '' . $desc;
            }
            $pos_og_img = '';
            if ($datas->data[0]->video_thumb_285 == 'http://odedara.com/comingtrailer/images/videothumb/test') {
                $image = 'http://odedara.com/comingtrailer/resources/images/no-image.svg';

                $pos_og_img = $pos_og_img . '"image":{
				"@type": "ImageObject",
				"url": "' . $image . '",
				"height": 160,
				"width": 285
			},';
            } else {
                $image = $datas->data[0]->video_thumb_285;
                $pos_og_img = $pos_og_img . '"image":{
				"@type": "ImageObject",
				"url": "' . $image . '",
				"height": 160,
				"width": 285
			},';
            }
            $this->data['image'] = $pos_og_img;

            $this->data['datePublished'] = '' . date('M d, Y H:i:s', strtotime($datas->data[0]->release_date));
            $val = $datas->data[0]->updated;
            if ($val != '0000-00-00 00:00:00' && $val != '') {
                $this->data['dateModified'] = '' . date('M d, Y H:i:s', strtotime($datas->data[0]->updated));
            } else {
                $this->data['dateModified'] = $this->data['datePublished'];
            }





            if($cat_id == 1)
            {

                //new

                $title = 'Watch online '.$datas->data[0]->video_name.' ';

                if($cast != '')
                {
                    //$cast = substr($cast, 1); 
                    $title = $title.'Starring '.$cast.' on Coming Trailer';
                }

                 
                 $castsdata = $this->My_model->getresult("SELECT movie_id from video_map_movie where video_id = ".$datas->data[0]->video_id);

                    $movie_id = $castsdata[0]['movie_id'];

                    $mdata = $this->My_model->getresult("SELECT movie_name from movie where id = ".$movie_id);

                    $movie_name = $mdata[0]['movie_name'];


                $desc = '';

                if ($datas->data[0]->video_desc == '') {






                    $castsdata = $this->My_model->getresult("SELECT movie_id from video_map_movie where video_id = ".$datas->data[0]->video_id);

                    $movie_id = $castsdata[0]['movie_id'];

                    $mdata = $this->My_model->getresult("SELECT movie_name from movie where id = ".$movie_id);

                    $movie_name = $mdata[0]['movie_name'];


                    //echo '<pre>'; print_r($castsdata); die('ll');
                    
                    $desc = "Watch the ".$datas->data[0]->video_name." upcoming film ".$movie_name." here. Check out ".$datas->data[0]->video_name." from ".$datas->data[0]->subcat_name." movie '".$movie_name."'";

                     

                     if($cast != '')
                    {
                        //$cast = substr($cast, 1);
                        $desc = $desc.' Starring '.$cast.' on Coming Trailer';
                    }



                } else {

                    $desc = $datas->data[0]->video_desc;
                }




                
                $keywords = $movie_name.', '.$movie_name.' movie trailer, '.$movie_name.' trailer';





                foreach ($datas->data[0]->video_cast as $value) {

                    $keywords = $keywords .', '.$value->cast_name.' movie '.$datas->data[0]->video_name.' ';

                    
                }

                


                if ($datas->data[0]->video_keywords != '') {
                    $keywords = $keywords. ', ' . $datas->data[0]->video_keywords;
                }

                //new

            }
            else
            {

            




                    //new



                    $singer = '';

                    foreach ($datas->data[0]->singer as $value) {
                        $singer = $singer . '' . $value->singer_name . ', ';
                    }
                    $singer = rtrim($singer, ', ');


                    $movie_name == '';


                    $castsdata = $this->My_model->getresult("SELECT movie_id from video_map_movie where video_id = ".$datas->data[0]->video_id);

                    

                    if(count($castsdata) > 0)
                    {
                        $movie_id = $castsdata[0]['movie_id'];
                        $mdata = $this->My_model->getresult("SELECT movie_name from movie where id = ".$movie_id);
                        $movie_name = $mdata[0]['movie_name'];



                        $title = $movie_name.' '.$datas->data[0]->subcat_name.' Movie Video Songs, Watch Online '.$datas->data[0]->video_name.' '.$datas->data[0]->subcat_name.' Video Songs on Coming Trailer';



                        $desc = '';

                        if ($datas->data[0]->video_desc == '') {


                            $desc = $movie_name." song ".$datas->data[0]->video_name." : Watch latest ".$movie_name." ".$datas->data[0]->subcat_name." movie song ".$datas->data[0]->video_name." video ";


                            if ($cast != '') {

                                
                                $desc = $desc . 'Starring ' . $cast;
                            } 

                            if ($singer != '') {
                                
                                $desc = $desc . ' and Singer by ' . $singer;
                            } 

                            if ($music_by != '') {
                                
                                $desc = $desc . ' and Music by ' . $music_by;
                            }


                            $desc = $desc ." on Coming Trailer. Watch other ".$movie_name." movie videos on Coming Trailer";
                        } else {

                            $desc = $datas->data[0]->video_desc;
                        }



                        $keywords = $movie_name.', '.$movie_name.' song '.$datas->data[0]->video_name.', '.$movie_name.' video songs, watch online '.$datas->data[0]->video_name.' video';




                        

                        $my = [];


                        foreach ($datas->data[0]->video_cast as $value) {

                            if(!empty($value->cast_name))
                            {

                                if(!in_array($value->cast_name,$my))
                                {

                                 $keywords = $keywords .', '.$value->cast_name.' '.$movie_name.' Video Song';
                                 array_push($my, $value->cast_name);

                                }
                            }

                            
                        }


                        foreach ($datas->data[0]->Music as $value) {

                            if(!empty($value->music_name))
                            {
                                if(!in_array($value->music_name,$my))
                                {

                                 $keywords = $keywords .', '.$value->music_name.' '.$movie_name.' Video Song';
                                 array_push($my, $value->music_name);

                                }


                            
                            }

                            
                        }

                        

                        foreach ($datas->data[0]->singer as $value) {

                            if(!empty($value->singer_name))
                            {


                                if(!in_array($value->singer_name,$my))
                                {

                                 $keywords = $keywords .', '.$value->singer_name.' '.$movie_name.' Video Song';
                                 array_push($my, $value->singer_name);

                                }

                            
                        }
                          
                        }




                        


                        $keywords = $keywords . ', '.$datas->data[0]->video_name.' video song, checkout hd '.$datas->data[0]->video_name.' video';
                        


                        if ($datas->data[0]->video_keywords != '') {
                            $keywords = $keywords. ', ' . $datas->data[0]->video_keywords;
                        }




                    }
                    else
                    {
                        $title = $datas->data[0]->video_name.' Video Song  Watch it Online Free on Coming Trailer';


                        $desc = '';

                        if ($datas->data[0]->video_desc == '') {


                            $desc = $datas->data[0]->video_name.' Video Song  Watch it Online Free. Play Online HD '.$datas->data[0]->video_name.' Video Song '; 



                            if ($cast != '') {

                                
                                $desc = $desc . 'Starring ' . $cast;
                            } 

                            if ($singer != '') {
                                
                                $desc = $desc . ' and Singer by ' . $singer;
                            } 

                            if ($music_by != '') {
                                
                                $desc = $desc . ' and Music by ' . $music_by;
                            }


                            $desc = $desc ." on Coming Trailer";
                        } else {

                            $desc = $datas->data[0]->video_desc;
                        }



                        $keywords = $datas->data[0]->video_name.' Video Song, HD Video Song, Watch Online HD '.$datas->data[0]->video_name.' Video Song';

                        

                        $my = [];


                        foreach ($datas->data[0]->video_cast as $value) {

                            if(!empty($value->cast_name))
                            {

                                if(!in_array($value->cast_name,$my))
                                {

                                 $keywords = $keywords .', '.$value->cast_name.' '.$movie_name.' Video Song';
                                 array_push($my, $value->cast_name);

                                }
                            }

                            
                        }


                        foreach ($datas->data[0]->Music as $value) {

                            if(!empty($value->music_name))
                            {
                                if(!in_array($value->music_name,$my))
                                {

                                 $keywords = $keywords .', '.$value->music_name.' '.$movie_name.' Video Song';
                                 array_push($my, $value->music_name);

                                }


                            
                            }

                            
                        }



                        foreach ($datas->data[0]->singer as $value) {

                            if(!empty($value->singer_name))
                            {


                                if(!in_array($value->singer_name,$my))
                                {

                                 $keywords = $keywords .', '.$value->singer_name.' '.$movie_name.' Video Song';
                                 array_push($my, $value->singer_name);

                                }

                            
                        }
                          
                        }



                       
                        


                        if ($datas->data[0]->video_keywords != '') {
                            $keywords = $keywords. ', ' . $datas->data[0]->video_keywords;
                        }

                    }

                    



                    
                    //new
            }


            $this->data['keywords'] = $keywords;
                $this->data['desc'] = $desc;
                $this->data['title'] = $title;


            $this->data['item_prop'] = $this->getItemProp($cat_id, $this->data['trailer'], $link, $desc, $keywords);
            



            $this->load->view('video_play_amp', $this->data);
        }
    }


    public function getRealIpAddr()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
        {
          $ip=$_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
        {
          $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else
        {
          $ip=$_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }


    public function getItemProp($cat_id, $trailer, $link, $mydesc = '', $mykey = '') { 
        $name = '';
        $movie_name = '';
        $cast = '';
        $director = '';
        $subcat_name = '';
        $music_by = '';
        $byArtist = '';
        $company = '';
        $datas = json_decode($trailer);
        $trailer_data = $datas->data;

        if ($datas->data[0]->video_thumb == 'http://odedara.com/comingtrailer/images/videothumb/test') {
            $image = 'http://odedara.com/comingtrailer/resources/images/video-no-image.jpg';
        } else {
            $image = $datas->data[0]->video_thumb;
        }

        $date_created = '' . $datas->data[0]->release_date;
        $val = $datas->data[0]->updated;
        if ($val != '0000-00-00 00:00:00' && $val != '') {
            $date_modify = '' . date('M d, Y h:m:s', strtotime($datas->data[0]->updated));
        } else {
            $date_modify = $date_created;
        }
        $cast_prop = '';
        $director_prop = '';
        $music_prop = '';
        $singer_prop = '';
        $company_prop = '';
        foreach ($trailer_data as $trailer) {
            if (!empty($trailer)) {
                $name = '' . $trailer->video_name;


                if (!empty($trailer->movies[0]->movie_name)) {
                    foreach ($trailer->movies as $value) {
                        $movie_name = $value->movie_name;
                    }
                }

                foreach ($trailer->video_cast as $value) {
                    $cast_name = $value->cast_name;
                    if ($cast_name != '') {
                        $cast_img = $value->cast_img;
                        $cast_seo_url = base_url()."personality/".str_replace(" ", "-", str_replace(["(", ")"], "", $cast_name));//$this->getSeoUrl($value->seo_url_id);

                        if (($cast_img == '')) {
                            $cast_img = base_url('resources/images/no-user.svg');
                        } else {
                            $cast_img = base_url('images/personality/' . $value->cast_img);
                        }

                        $cast_prop = $cast_prop . '' . PHP_EOL . ''
                                . '<div itemprop="actor" itemscope itemtype="http://schema.org/Person">' . PHP_EOL . '
                                   <meta itemprop="name" content ="' . $cast_name . '" />' . PHP_EOL . '
                                   <meta itemprop="sameAs" content="' . $cast_seo_url . '">' . PHP_EOL . '
                                   <meta itemprop="image" content="' . $cast_img . '" />' . PHP_EOL . '
                                </div>' . PHP_EOL . '';

                        $cast = $cast . $value->cast_name . ', ';
                    }
                }

                foreach ($trailer->Director as $value) {
                    $director_name = $value->director_name;
                    if ($director_name != '') {
                        $director_img = $value->director_img;
                        $director_seo_url = base_url()."personality/".str_replace(" ", "-", str_replace(["(", ")"], "", $director_name));//$this->getSeoUrl($value->seo_url_id);


                        if (($director_img == '') || ($director_img == '500X500-')) {
                            $director_img = base_url('resources/images/no-user.svg');
                        } else {
                            $director_img = base_url('images/personality/' . $value->director_img);
                        }

                        $director_prop = $director_prop . '' . PHP_EOL . ''
                                . '<div itemprop="director" itemscope itemtype="http://schema.org/Person">' . PHP_EOL . '
                                  <meta itemprop="name" content ="' . $director_name . '" />' . PHP_EOL . '
                                  <meta itemprop="sameAs" content="' . $director_seo_url . '">' . PHP_EOL . '
                                  <meta itemprop="image" content="' . $director_img . '" />' . PHP_EOL . '
                               </div>' . PHP_EOL . '';

                        $director = $director . $value->director_name . ', ';
                    }
                }

                foreach ($trailer->Music as $value) {
                    $music_name = $value->music_name;
                    if ($music_name != '') {
                        $music_img = base_url('images/personality/' . $value->music_img);
                        $music_seo_url = base_url()."personality/".str_replace(" ", "-", str_replace(["(", ")"], "", $music_name));//$this->getSeoUrl($value->seo_url_id);

                        if ($value->music_img == '') {
                            $music_img = base_url('resources/images/no-user.svg');
                        } else {
                            $music_img = base_url('images/personality/' . $value->music_img);
                        }

                        $music_prop = $music_prop . '' . PHP_EOL . ''
                                . '<div itemprop="musicBy" itemscope itemtype="http://schema.org/Person">
                                    <meta itemprop="name" content ="' . $music_name . '" />
                                    <meta itemprop="sameAs" content="' . $music_seo_url . '">
                                    <meta itemprop="image" content="' . $music_img . '" />
                                 </div>';

                        $music_by = $music_by . $value->music_name . ', ';
                    }
                }

                foreach ($trailer->singer as $value) {
//                    $music_name = $value->singer_name;
//                    $music_img = $value->singer_img;
//                         $music_seo_url = $this->getSeoUrl($value->seo_url_id);
//
//
//                        if(($music_img == '')){
//                            $music_img = base_url('resources/images/no-user.svg');
//                        }else{
//                             $music_img = base_url('images/singers/'.$value->singer_img);
//                        }
//
//                        $singer_prop = $singer_prop.''.PHP_EOL.''
//                                 . '<div itemprop="byArtist" itemscope itemtype="http://schema.org/Person">
//                                    <meta itemprop="name" content ="'.$music_name.'" />
//                                    <meta itemprop="sameAs" content="'.$music_seo_url.'">
//                                    <meta itemprop="image" content="'.$music_img.'" />
//                                 </div>';



                    $byArtist = $byArtist . $value->singer_name . ', ';
                }

                foreach ($trailer->releasedBy as $value) {

//                    $music_name = $value->rel_by_name;
//                    $music_img = $value->rel_by_img;
//                         $music_seo_url = $this->getSeoUrl($value->seo_url_id);
//
//
//                        if(($music_img == '')){
//                            $music_img = base_url('resources/images/no-user.svg');
//                        }else{
//                             $music_img = base_url('images/channel/'.$value->rel_by_img);
//                        }
//
//                        $company_prop = $company_prop.''.PHP_EOL.''
//                                 . '<div itemprop="company" itemscope itemtype="http://schema.org/Person">
//                                    <meta itemprop="name" content ="'.$music_name.'" />
//                                    <meta itemprop="sameAs" content="'.$music_seo_url.'">
//                                    <meta itemprop="image" content="'.$music_img.'" />
//                                 </div>';

                    $company = $company . $value->rel_by_name . ', ';
                }

                $subcat_name = $trailer->subcat_name;
            }
        }

        $cast = rtrim($cast, ', ');
        $director = rtrim($director, ', ');
        $music_by = rtrim($music_by, ', ');
        $byArtist = rtrim($byArtist, ', ');
        $company = rtrim($company, ', ');
        $item_prop = '<div itemprop="video" itemscope itemtype="http://schema.org/VideoObject">' . PHP_EOL;

        if ($cat_id == 1) {
            $title = $datas->data[0]->video_name . ' Watch it Online Free on Coming Trailer.com';
            $item_prop = $item_prop . '<meta itemprop="name" content="' . $title . '"/>' . PHP_EOL;
            $item_prop = $item_prop . $cast_prop;
            if ($cast != '') {
//                $item_prop = $item_prop.'<meta itemprop="actor" content="'.$cast.'"/>'.PHP_EOL;
            }
            $item_prop = $item_prop . $director_prop;
            if ($director != '') {
//             $item_prop = $item_prop.'<meta itemprop="director" content="'.$director.'"/>'.PHP_EOL;
            }
            if ($company != '') {
                $item_prop = $item_prop . '<meta itemprop="copyrightHolder" content="' . $company . '"/>' . PHP_EOL;
            }
            $mycast = '';
            if ($cast == '') {
                $mycast = $cast;
            } else {
                $mycast = ', ' . $cast;
            }
            $my_key = '';
            if ($datas->data[0]->video_keywords == '') {
                $my_key = $datas->data[0]->video_keywords;
            } else {
                $my_key = ',' . $datas->data[0]->video_keywords;
            }


            $keywords = $datas->data[0]->video_name . ',HD ' . $datas->data[0]->video_name . ',Watch it Online HD ' . $datas->data[0]->video_name . '' . $mycast . '' . $my_key;
            $keywords = rtrim($keywords, ', ');

            $keywords = rtrim($keywords, ',');
            $mycast = '';
            if ($cast != '') {
                $mycast = 'Starring ' . $cast;
            }
            $desc = $datas->data[0]->video_name . ' Watch it Online Free. Play Online HD ' . $datas->data[0]->video_name . ' ' . $mycast . '. HD ' . $datas->data[0]->video_name . ' Free on Coming Trailer.com.';
        } else if ($cat_id == 2) {
            $mymovie = '';
            if ($movie_name != '') {
                $mymovie = 'From ' . $movie_name . ' Movie';
            }
            $title = $datas->data[0]->video_name . ' Video Song ' . $mymovie . ' Watch it Online Free on Coming Trailer.com';
            $item_prop = $item_prop . '<meta itemprop="name" content="' . $title . '"/>' . PHP_EOL;
            $item_prop = $item_prop . $cast_prop;
            if ($cast != '') {
//                $item_prop = $item_prop.'<meta itemprop="actor" content="'.$cast.'"/>'.PHP_EOL;
            }
            $item_prop = $item_prop . $director_prop;
            if ($director != '') {
//             $item_prop = $item_prop.'<meta itemprop="director" content="'.$director.'"/>'.PHP_EOL;
            }
            $item_prop = $item_prop . $singer_prop;
            if ($byArtist != '') {
//             $item_prop = $item_prop.'<meta itemprop="byArtist" content="'.$byArtist.'"/>'.PHP_EOL;
            }
            $item_prop = $item_prop . $music_prop;
            if ($music_by != '') {
//             $item_prop = $item_prop.'<meta itemprop="musicBy" content="'.$music_by.'"/>'.PHP_EOL;
            }
            if ($company != '') {
                $item_prop = $item_prop . '<meta itemprop="copyrightHolder" content="' . $company . '"/>' . PHP_EOL;
            }

            $mymovie = '';
            if ($movie_name != '') {
                $mymovie = ', ' . $movie_name . '';
            }

            $myartist = '';
            if ($byArtist != '') {
                $myartist = ', ' . $byArtist;
            }

            $mymusic_by = '';
            if ($music_by != '') {
                $mymusic_by = ', ' . $music_by;
            }

            $mycast = '';
            if ($cast != '') {
                $mycast = ', ' . $cast;
            } else {
                $mycast = '';
            }

            $my_key = '';
            if ($datas->data[0]->video_keywords == '') {
                $my_key = $datas->data[0]->video_keywords;
            } else {
                $my_key = ', ' . $datas->data[0]->video_keywords;
            }

            $keywords = '' . $datas->data[0]->video_name . ' Video Song, HD Video Song, Watch it Online HD ' . $datas->data[0]->video_name . ' Video Song' . $mymovie . '' . $myartist . '' . $mymusic_by . '' . $mycast . '' . $my_key . '';
            $keywords = rtrim($keywords, ', ');

            $keywords = rtrim($keywords, ',');

            $myartist = '';
            if ($byArtist != '') {
                $myartist = 'Singer by ' . $byArtist . ' and ';
            } else {
                $myartist = '';
            }
            $mycast = '';
            if ($cast != '') {
                $mycast = 'Starring ' . $cast . ' and ';
            } else {
                $mycast = '';
            }
            $mymovie = '';
            if ($movie_name != '') {
                $mymovie = 'From ' . $movie_name . ' Movie';
            } else {
                $mymovie = '';
            }

            $mymusic_by = '';
            if ($music_by != '') {
                $mymusic_by = 'Music by ' . $music_by;
            }



            if ($datas->data[0]->video_desc == '') {

                $desc = '' . $datas->data[0]->video_name . ' Video Song ' . $mymovie . ' Watch it Online Free.'
                        . ' Play Online HD ' . $datas->data[0]->video_name . ' Video Song ' . $mycast . ''
                        . '' . $myartist . '' . $mymusic_by . ' Free on ComingTrailer.com.';
            } else {

                $desc = $datas->data[0]->video_desc;
            }
        }

        $item_prop = $item_prop . '<meta itemprop="embedURL" content="' . $link . '"/>' . PHP_EOL;
        $item_prop = $item_prop . '<meta itemprop="contentUrl" content="' . $link . '"/>' . PHP_EOL;
        $item_prop = $item_prop . '<meta itemprop="thumbnailUrl" content="' . $image . '"/>' . PHP_EOL;
        $item_prop = $item_prop . '<meta itemprop="inLanguage" content="' . $subcat_name . '"/>' . PHP_EOL;
        $item_prop = $item_prop . '<meta itemprop="height" content="1280"/>' . PHP_EOL;
        $item_prop = $item_prop . '<meta itemprop="width" content="720"/>' . PHP_EOL;        

        $created = new DateTime($date_created, new DateTimeZone('asia/kolkata'));
        $item_prop = $item_prop . '<meta itemprop="datePublished" content="' . $created->format('Y-m-d\TH:i:sP') . '"/>' . PHP_EOL;
        $updated = (!empty($date_modify) && $date_modify != '0000-00-00 00:00:00') ? new DateTime($date_modify, new DateTimeZone('asia/kolkata')) : $created;

        $item_prop = $item_prop . '<meta itemprop="dateModified" content="' . $updated->format('Y-m-d\TH:i:sP') . '"/>' . '' . PHP_EOL;
        $item_prop = $item_prop . '<meta property="og:updated_time" content="' . $updated->format('Y-m-d\TH:i:sP') . '" />' . '' . PHP_EOL;

        $item_prop = $item_prop . '<meta itemprop="keywords" content="' . $mykey . '"/>' . PHP_EOL;
        $item_prop = $item_prop . '<meta itemprop="description" content="' . $mydesc . '"/>' . PHP_EOL;
        $item_prop = $item_prop . '</div>';

        return $item_prop;
    }

    public function getSeoUrl($seo_id) {
//        echo '$seo_id';exit;
//        echo $table_nmae;exit;
        $final_url = $this->WebService->getSeoUrl('video_url', $seo_id);
        return $final_url;
    }

    public function getRelatedVideo($video_id, $cat_id, $subcat_id) {
        $related_video = json_decode($this->WebService->getRelatedVideo($video_id, $cat_id, $subcat_id));

        return $related_video;
    }

    public function getVideoByMovie($cat_id, $movie_id, $video_id) {
        return $this->Front_Model->getVideoByMovie($cat_id, $movie_id, $video_id);
    }

    public function getPosterByMovie($cat_id, $movie_id) {
        return $this->Front_Model->getPosterByMovie($cat_id, $movie_id);
    }

    public function setLike() {
        $user_id = $this->session->userdata('front_userdata')->id;

        $video_id = $this->input->post('video_id');
        $cat_id = $this->input->post('cat_id');

        $activity = 'liked';

        $this->WebService->setIsLike($user_id, $cat_id, $activity, $video_id);
    }

    public function setDisLike() {
        $user_id = $this->session->userdata('front_userdata')->id;

        $video_id = $this->input->post('video_id');
        $cat_id = $this->input->post('cat_id');

        $activity = 'disliked';

        $this->WebService->setIsLike($user_id, $cat_id, $activity, $video_id);
    }

    public function getIsLiked($video_id, $cat_id) {
        $user_id = $this->session->userdata('front_userdata')->id;



        return $this->WebService->getUserLike($user_id, $video_id, $cat_id);
    }

    public function setVideoView() {
        $user_id = $this->session->userdata('front_userdata')->id;

        $video_id = $this->input->post('video_id');
        $cat_id = $this->input->post('cat_id');

        $activity = 'play';
        $this->WebService->setViewVideo($user_id, $activity, $video_id, $cat_id);
    }

    public function setVideoPlay() {

        $user_id = $this->session->userdata('front_userdata')->id;

        $video_id = $this->input->post('video_id');
        $cat_id = $this->input->post('cat_id');

        $activity = 'play';


        $this->WebService->setViewPlay($user_id, $activity, $video_id, $cat_id);

        //echo 'done';
    }

    public function setShare() {

        $user_id = $this->session->userdata('front_userdata')->id;
        if ($user_id > 0) {
            $poster_id = $this->input->post('video_id');
            $cat_id = $this->input->post('cat_id');
            $shared_with = $this->input->post('share_with');

            $activity = 'share';


            $this->WebService->setSharing($user_id, $cat_id, $activity, $poster_id, $shared_with);
        }
    }

}
