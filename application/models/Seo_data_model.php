<?php

/*

 * To change this license header, choose License Headers in Project Properties.

 * To change this template file, choose Tools | Templates

 * and open the template in the editor.

 */

/**

 * Description of Seo_data_model

 *

 * @author yoo

 */
class Seo_data_model extends CI_Model {

    //put your code here



    public function __construct() {

        // parent::__construct();

        $this->load->database();

        $this->load->helper('url');
    }

    public function getSEO($type, $datas, $link) {

        $twitter_player = '';

        $video_twit_director = '';

        $video_release = '';

        $created = '';

        $updated = '';

        if ($type == 'trailer') { 




            $title = $datas->data[0]->video_name . ' Watch it Online Free on Coming Trailer.com';

            $cast = '';

            foreach ($datas->data[0]->video_cast as $value) {

                $cast = $cast . '' . $value->cast_name . ', ';
            }

            $cast = rtrim($cast, ', ');

            $music_by = '';

            foreach ($datas->data[0]->Music as $value) {

                $music_by = $music_by . '' . $value->music_name . ', ';
            }

            $music_by = rtrim($music_by, ', ');

            if ($datas->data[0]->video_desc == '') {

                $desc = $datas->data[0]->video_name . ' Watch it Online Free. Play Online HD ' . $datas->data[0]->video_name . ' Starring ' . $cast . '. HD ' . $datas->data[0]->video_name . ' Free on Coming Trailer.com.';
            } else {

                $desc = $datas->data[0]->video_desc;
            }

            if ($cast == '') {
                $cast = $cast;
            } else {
                $cast = ', ' . $cast;
            }
            $cast = rtrim($cast, ', ');
            $my_key = '';
            if ($datas->data[0]->video_keywords == '') {
                $my_key = $datas->data[0]->video_keywords;
            } else {
                $my_key = ',' . $datas->data[0]->video_keywords;
            }


            $keywords = $datas->data[0]->video_name . ',HD ' . $datas->data[0]->video_name . ',Watch it Online HD ' . $datas->data[0]->video_name . '' . $cast . '' . $my_key;



            //new

            $title = 'Watch online '.$datas->data[0]->video_name.' ';

            if($cast != '')
            {
                $cast = substr($cast, 1); 
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
                    $cast = substr($cast, 1);
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






            if ($datas->data[0]->video_thumb == 'http://odedara.com/comingtrailer/images/videothumb/test') {
                $image = 'http://odedara.com/comingtrailer/resources/images/video-no-image.jpg';
            } else {
                $image = $datas->data[0]->video_thumb;
            }

            $content_type = 'website';

            $twitter_card = 'summary_large_image';



            $video_twit_director = '';

            foreach ($datas->data[0]->Director as $value) {

                $video_twit_director = $video_twit_director . '' . $value->director_name . ', ';
            }


            if ($datas->data[0]->movies[0]->my_release == '0000-00-00') {
                $video_release = '';
            } else if ($datas->data[0]->movies[0]->my_release == '') {
                $video_release = '';
            } else {

                $video_release = date('d M Y', strtotime($datas->data[0]->movies[0]->my_release));
            }

            $created = $datas->data[0]->release_date;
            $updated = $datas->data[0]->updated;
//            $seo = '<title>'.$title.'</title>'.
//                   '<meta name="description" content="'.$desc.'" />'.
//                    '<meta name="keywords" content="'.$keywords.'" />';
        }

        if ($type == 'video') { 

            //echo '<pre>'; print_r($datas); die('lll');

            $movie_name = '';
            if (!empty($datas->data[0]->movies[0]->movie_name)) {
                $movie_name = 'From ' . $datas->data[0]->movies[0]->movie_name . ' Movie';
            }
            $title = $datas->data[0]->video_name . ' Video Song ' . $movie_name . ' Watch it Online Free on Coming Trailer.com';

            $cast = '';

            foreach ($datas->data[0]->video_cast as $value) {

                $cast = $cast . '' . $value->cast_name . ', ';
            }

            $cast = rtrim($cast, ', ');

            $music_by = '';

            foreach ($datas->data[0]->Music as $value) {

                $music_by = $music_by . '' . $value->music_name . ', ';
            }

            $singer = '';

            foreach ($datas->data[0]->singer as $value) {
                $singer = $singer . '' . $value->singer_name . ', ';
            }
            $singer = rtrim($singer, ', ');
            $music_by = rtrim($music_by, ', ');

            if ($datas->data[0]->video_desc == '') {
                $mycast = '';
                if ($cast != '') {
                    $mycast = 'Starring ' . $cast . ' and ';
                } else {
                    $mycast = '';
                }

                $myartist = '';
                if ($singer != '') {
                    $myartist = 'Singer by ' . $singer . ' and ';
                } else {
                    $myartist = '';
                }

                $mymusic_by = '';
                if ($music_by != '') {
                    $mymusic_by = 'Music by ' . $music_by;
                }
                $desc = '' . $datas->data[0]->video_name . ' Video Song ' . $movie_name . ' Watch it Online Free.'
                        . ' Play Online HD ' . $datas->data[0]->video_name . ' Video Song ' . $mycast . ''
                        . '' . $myartist . '' . $mymusic_by . ' Free on ComingTrailer.com.';
            } else {

                $desc = $datas->data[0]->video_desc;
            }

            if ($cast == '') {
                $cast = $cast;
            } else {
                $cast = ', ' . $cast;
            }
            $cast = rtrim($cast, ', ');

            $my_key = '';
            if ($datas->data[0]->video_keywords == '') {
                $my_key = $datas->data[0]->video_keywords;
            } else {
                $my_key = ', ' . $datas->data[0]->video_keywords;
            }

            if ($music_by == '') {
                $music_by = $music_by;
            } else {
                $music_by = ', ' . $music_by;
            }
            $music_by = rtrim($music_by, ', ');
            if ($singer == '') {
                $singer = $singer;
            } else {
                $singer = ', ' . $singer;
            }
            $singer = rtrim($singer, ', ');
            $movie_name = '';
            if (!empty($datas->data[0]->movies[0]->movie_name)) {
                $movie_name = ', ' . $datas->data[0]->movies[0]->movie_name . '';
            }

            $keywords = '' . $datas->data[0]->video_name . ' Video Song, HD Video Song, Watch it Online HD ' . $datas->data[0]->video_name . ' Video Song' . $movie_name . '' . $singer . '' . $music_by . '' . $cast . '' . $my_key;

            $keywords = rtrim($keywords, ', ');

            $keywords = rtrim($keywords, ',');




            //new


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

                        $cast = substr($cast, 1);
                        $desc = $desc . 'Starring ' . $cast;
                    } 

                    if ($singer != '') {
                        $singer = substr($singer, 1);
                        $desc = $desc . ' and Singer by ' . $singer;
                    } 

                    if ($music_by != '') {
                        $music_by = substr($music_by, 1);
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

                        $cast = substr($cast, 1);
                        $desc = $desc . 'Starring ' . $cast;
                    } 

                    if ($singer != '') {
                        $singer = substr($singer, 1);
                        $desc = $desc . ' and Singer by ' . $singer;
                    } 

                    if ($music_by != '') {
                        $music_by = substr($music_by, 1);
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



            





            if ($datas->data[0]->video_thumb == 'http://odedara.com/comingtrailer/images/videothumb/test') {
                $image = 'http://odedara.com/comingtrailer/resources/images/video-no-image.jpg';
            } else {
                $image = $datas->data[0]->video_thumb;
            }

            $content_type = 'website';

            $twitter_card = 'summary_large_image';



            $video_twit_director = '';

            foreach ($datas->data[0]->Director as $value) {

                $video_twit_director = $video_twit_director . '' . $value->director_name . ', ';
            }

            if ($datas->data[0]->movies[0]->my_release == '0000-00-00') {
                $video_release = '';
            } else if ($datas->data[0]->movies[0]->my_release == '') {
                $video_release = '';
            } else {

                $video_release = date('d M Y', strtotime($datas->data[0]->movies[0]->my_release));
            }

            $created = $datas->data[0]->release_date;
            $updated = $datas->data[0]->updated;
        }



        if ($type == 'poster') {

            $title = $datas->data[0]->poster_name . ' Movie HD Poster Wallpaper & First Look Free on Coming Trailer.com';

            if ($datas->data[0]->poster_desc == '') {

                $desc = $datas->data[0]->poster_name . ' Movie HD Poster Wallpaper & First Look Free Online. '
                        . 'Download ' . $datas->data[0]->poster_name . ' Movie HD Poster Wallpaper & First Look '
                        . 'Free on Coming Trailer.com.';
            } else {

                $desc = $datas->data[0]->poster_desc;
            }

            $my_key = '';

            if ($datas->data[0]->poster_keywords != '') {
                $my_key = ', ' . $datas->data[0]->poster_keywords;
            }

            $keywords = 'Download HD Poster ' . $datas->data[0]->poster_name . ', ' . $datas->data[0]->poster_name . ' HD Wallpaper, ' . $datas->data[0]->poster_name . ' Movie HD Wallpapers, High Resolution Wallpapers, Movie Wallpaper, Free Hd Wallaper, Free HD Poster, ALl New Poster, ' . $datas->data[0]->poster_name . ' Movie First Look, Free Poster Image'
                    . '' . $my_key;



//            print_r($datas->data[0]->poster_id);exit;    $img->poster_img

            $pos_og_img = '';

            $trailer_data = $datas->data;

            foreach ($trailer_data as $trailer) {

                //echo $trailer->poster_id;

                foreach ($trailer->poster_img as $img) {
                    if (str_replace("285X160-", "", $img->poster_img) != '') {
                        $pos_og_img = $pos_og_img . '<meta property="og:image" content="' . str_replace("285X160-", "", $img->poster_img) . '">';
                    }
                }



                foreach ($trailer->firstlook_img as $img) {
                    if (str_replace("285X160-", "", $img->poster_img) != '') {
                        $pos_og_img = $pos_og_img . '<meta property="og:image" content="' . str_replace("285X160-", "", $img->poster_img) . '">';
                    }
                }



                foreach ($trailer->wallpaper_img as $img) {
                    if (str_replace("285X160-", "", $img->poster_img) != '') {
                        $pos_og_img = $pos_og_img . '<meta property="og:image" content="' . str_replace("285X160-", "", $img->poster_img) . '">';
                    }
                }
            }





//            foreach ($datas->data[0] as $value) {
//                echo $value->poster_id;
//            }exit;
//            for($a = 0;$a<strlen($datas->data->poster_img);$a++){
//                
//            }
//            exit;

            $image = str_replace("285X160-", "", $datas->data[0]->poster_img[0]->poster_img);

            $content_type = 'website';

            $twitter_card = 'summary_large_image';



            $video_twit_director = '';

            foreach ($datas->data[0]->director as $value) {

                $video_twit_director = $video_twit_director . '' . $value->director_name . ', ';
            }


            if ($datas->data[0]->movies[0]->my_release == '0000-00-00') {
                $video_release = '';
            } else if ($datas->data[0]->movies[0]->my_release == '') {
                $video_release = '';
            } else {

                $video_release = date('d M Y', strtotime($datas->data[0]->movies[0]->my_release));
            }


            $created = $datas->data[0]->created;
            $updated = $datas->data[0]->updated;

//            echo $updated;
        }

        if (($type == 'cast') || ($type == 'singer') || ($type == 'director') || ($type == 'music')) { 

//            $link = $this->data['individual_detail']['seo_url_id'];

            //echo '<pre>'; print_r($datas); die('llll');

            $indi_name = $this->data['individual_detail'][$type . '_name'];



            $title_indi = array(
                'cast' => $indi_name . ' Video Songs & Trailer Watch it: Download ' . $indi_name . ' HD Poster Free on Coming Trailer.com',
                'singer' => $indi_name . ' Video Songs Watch it: ' . $indi_name . ' Hit New Video Songs Free on Coming Trailer.com',
                'director' => $indi_name . ' Movie Video Songs & Trailer Watch it: Download ' . $indi_name . ' Movie HD Poster Free on Coming Trailer.com',
                'music' => $indi_name . ' Movie Video Songs & Trailer Watch it: ' . $indi_name . ' Hit Music Album Video Songs Free on Coming Trailer.com',
                'relby' => $indi_name . ' Movie Video Songs Watch it: ' . $indi_name . ' Movie Video Songs Free on Coming Trailer.com'
            );

            $keywords_indi = array(
                'cast' => $indi_name . ' Video Songs Watch it, ' . $indi_name . ' Video Songs, ' . $indi_name . ' songs, ' . $indi_name . ' Trailer, ' . $indi_name . ' Official Trailer, Official Trailer, New Official Trailer, Download ' . $indi_name . ' HD Movie Poster, Movie Poster, Download HD Wallpaper, ' . $indi_name . ' Video songs, ' . $indi_name . ' hit Video songs ',
                'singer' => $indi_name . ' Video Songs Watch it, ' . $indi_name . ' songs, ' . $indi_name . ' hit Video Songs, ' . $indi_name . ' Video Songs, Video Songs, ' . $indi_name . ' all album Video songs, ' . $indi_name . ' New Video songs, New Video songs',
                'director' => $indi_name . ' Movie Video Songs Watch it, ' . $indi_name . ' Movie Songs, ' . $indi_name . ' Movie Trailer, Official Trailer, New Official Trailer, Download ' . $indi_name . ' Movie HD Poster, Movie Poster, First Look, Download HD Wallpaper, ' . $indi_name . ' Movie Video Songs, ' . $indi_name . ' hit Movie Video Songs',
                'music' => $indi_name . ' Movie Video Songs Watch it, ' . $indi_name . ' Movie songs, ' . $indi_name . ' hit Movie Video Songs, ' . $indi_name . ' Movie Video Songs, Video Songs, ' . $indi_name . ' all Movie Video songs, ' . $indi_name . ' New Movie Video songs, New Video songs, ' . $indi_name . ' Movie Trailer, Official Trailer, New Official Trailer',
                'relby' => $indi_name . ' video songs Watch it, ' . $indi_name . ' video songs online,  ' . $indi_name . ' free video songs, ' . $indi_name . ' Trailer, ' . $indi_name . ' all video songs, watch it ' . $indi_name . ' songs, ' . $indi_name . ' official Trailer, Official trailer, ' . $indi_name . ' New Video, ' . $indi_name . ' New Trailer'
            );



            $desc_indi = array(
                'cast' => $indi_name . ' Video Songs & Trailer Watch it - Download ' . $indi_name . ' HD Poster Free. Play ' . $indi_name . ' Video Songs & Trailer and Download Movie HD Poster First Look and Wallpaper on Coming Trailer.com.',
                'singer' => $indi_name . ' Video Songs Watch it - Play ' . $indi_name . ' All Hit Video Songs Free Online. Play ' . $indi_name . ' Movie Hit Video Songs and music album on Coming Trailer.com.',
                'director' => $indi_name . ' Movie Video Songs & Trailer Watch it - Download ' . $indi_name . ' Movie HD Poster Free. Play ' . $indi_name . ' Movie Video Songs & Trailer and Download Movie HD Poster First Look and Wallpaper on Coming Trailer.com.',
                'music' => $indi_name . ' Movie Video Songs & Trailer Watch it - Play ' . $indi_name . ' All Movie Hit Video Songs Free Online. Play ' . $indi_name . ' Movie Hit Video Songs and music album on Coming Trailer.com.',
                'relby' => $indi_name . ' Video Songs & Trailer Watch it - Play ' . $indi_name . ' All Movie Hit Video Songs & Trailer Free Online. Play ' . $indi_name . ' Movie Hit Video Songs and music album on Coming Trailer.com.'
            );



            $title = $title_indi[$type];

            if ($datas[$type . '_desc'] == '') {

                $desc = $desc_indi[$type];
            } else {

                $desc = $datas[$type . '_desc'];
            }

            $keywords = $keywords_indi[$type] . ', ' . $datas[$type . '_keywords'];





            





            if ($type == 'cast') {
                $directory = 'actors';
            } else if ($type == 'singer') {
                $directory = 'singers';
            } else if ($type == 'director') {
                $directory = 'directors';
            } else if ($type == 'music') {
                $directory = 'music';
            }
            if ($datas[$type . '_img'] == '') {
                $image = 'http://odedara.com/comingtrailer/resources/images/no-user.svg';
            } else {

                if ($datas[$type . '_img'] === '500X500-') {
                    $image = 'http://odedara.com/comingtrailer/resources/images/no-user.svg';
                } else {
                    $image = base_url('images/' . $directory . '/' . $datas[$type . '_img']);
                }
            }

            $content_type = 'website';

            $twitter_card = 'summary_large_image';

            $created = $datas['created'];
            $updated = $datas['updated'];
        } else if ($type == 'relby') { //echo '<pre>'; print_r($datas); die('llll');

//            $link = $this->data['individual_detail']['seo_url_id'];

            /*$indi_name = $this->data['individual_detail']['rel_by_name'];



            $title_indi = array(
                'relby' => $indi_name . ' Video Songs & Trailer Watch it: ' . $indi_name . ' Video Songs Free on Coming Trailer.com'
            );

            $keywords_indi = array(
                'relby' => $indi_name . ' video songs Watch it, ' . $indi_name . ' video songs online,  ' . $indi_name . ' free video songs, ' . $indi_name . ' Trailer, ' . $indi_name . ' all video songs, watch it ' . $indi_name . ' songs, ' . $indi_name . ' official Trailer, Official trailer, ' . $indi_name . ' New Video, ' . $indi_name . ' New Trailer'
            );



            $desc_indi = array(
                'relby' => $indi_name . ' Video Songs & Trailer Watch it - Play ' . $indi_name . ' All Movie Hit Video Songs & Trailer Free Online. Play ' . $indi_name . ' Movie Hit Video Songs and music album on Coming Trailer.com.'
            );



            $title = $title_indi[$type];

            if ($datas['rel_by_desc'] == '') {

                $desc = $desc_indi[$type];
            } else {

                $desc = $datas['rel_by_desc'];
            }

            $keywords = $keywords_indi[$type] . ', ' . $datas['rel_by_keywords'];



*/


            //new

            $title = '';

            if ($datas['rel_by_title'] == '') {
            
                $title = $datas['rel_by_name'].' Video Song & Trailer Watch Online - Check out the all latest '.$datas['rel_by_name'].' video on Coming Trailer';
            }else{

                $title = $datas['rel_by_title'];
            }



            $desc = '';

            if ($datas['rel_by_desc'] == '') {

                
                $desc = 'Watch here! latest '.$datas['rel_by_name'].' videos at Coming Trailer. Also checkout the '.$datas['rel_by_name'].' popular videos and earn money on Coming Trailer   ';



            } else {

                $desc = $datas['rel_by_desc'];
            }




            
            $keywords = $datas['rel_by_name'].' latest trailer, '.$datas['rel_by_name'].' videos, watch online '.$datas['rel_by_name'].' video songs, '.$datas['rel_by_name'].' video songs on coming trailer, latest '.$datas['rel_by_name'].' video, '.$datas['rel_by_name'].' all video songs';


            if ($datas['rel_by_keywords'] != '') {
                $keywords = $keywords. ', ' . $datas['rel_by_keywords'];
            }

            //new





            if ($datas['rel_by_img'] == '') {
                $image = 'https://www.comingtrailer.com/resources/images/no-movie.svg';
                 
            } else {
                if ($datas['rel_by_img'] == '500x500-') {
                    $image = 'https://www.comingtrailer.com/resources/images/no-movie.svg';
                } else {
                    $image = base_url('images/channel/' . $datas['rel_by_img']);
                }
            }
            $content_type = 'website';

            $twitter_card = 'summary_large_image';

            $created = $datas['created'];
            $updated = $datas['updated'];
        }



        if ($type == 'movie') {



            $title = '';

            if ($datas['movie_title'] == '') {
            
                /*$title = $datas['movie_name'] . ' Movie Video Songs & Trailer Watch it: Download ' . $datas['movie_name'] . ' Movie HD Poster Free on Coming Trailer.com';*/
                $title = $datas['movie_name'] .' Movie Cast, Singer, Director, Music Director, '.$datas['movie_name'] .' Trailers & Teaser, Video Songs, '.$datas['movie_name'] .' Poster - Coming Trailer';
            }else{

                $title = $datas['movie_title'];
            }





            $desc = '';

            if ($datas['movie_desc'] == '') {

                /*$desc = $datas['movie_name'] . ' Movie Video Songs & Trailer Watch it - Download ' . $datas['movie_name'] . ' Movie HD Poster Free. Play ' . $datas['movie_name'] . ' Movie Video Songs & Trailer and Download Movie HD Poster First Look and Wallpaper on Coming Trailer.com.';*/

                $desc = $datas['movie_name'].' movie trailers, teaser & lead Cast, singer, director, music director, – Watch '.$datas['movie_name'].' full videos online & download movie HD poster, first look & wallpaper on Coming Trailer';



            } else {

                $desc = $datas['movie_desc'];
            }


            /*$this->db->select('*');
            $this->db->from('movie_map_cast');
            $this->db->where(array('movie_id' => $datas['id']));
            $castsdata = $this->db->get();
*/

            $castsdata = $this->My_model->getresult("SELECT personality.id as id,personality.personality_name as name from personality left join movie_map_cast on movie_map_cast.personality_id = personality.id where movie_map_cast.movie_id = ".$datas['id']);

            $cname = '';

            if(count($castsdata) > 0)
            {
                foreach($castsdata as $c)
                {
                    $cname = $cname.', '.$c['name'].' movie';

                }

            }

            //echo '<pre>'; print_r($castsdata); die;

            /*$keywords = $datas['movie_name'] . ' video songs Watch it, ' . $datas['movie_name'] . ' video songs online,  ' . $datas['movie_name'] . ' free video songs, ' . $datas['movie_name'] . ' trailer, ' . $datas['movie_name'] . ' all video songs, ' . $datas['movie_name'] . ' official trailer, Official trailer, Download ' . $datas['movie_name'] . ' HD Poster, First Look, Movie Poster, ' . $datas['movie_name'] . ' HD Wallpaper'
                    . '' . $mykeyword;*/

            $keywords = $datas['movie_name'].' Trailers, '.$datas['movie_name'].' Teaser, '.$datas['movie_name'].' Video Songs, '.$datas['movie_name'].' Movie Poster, '.$datas['movie_name'].' First Look, '.$datas['movie_name'].' HD Wallpaper'.$cname;


            if ($datas['movie_keywords'] != '') {
                $keywords = $keywords. ', ' . $datas['movie_keywords'];
            }

            

            if ($datas['my_release'] == '0000-00-00') {
                $video_release = '';
            } else {
                $video_release = date('d M Y', strtotime($datas['my_release']));
            }

            if ($datas['movie_img'] == '') {
                $image = 'https://www.comingtrailer.com/resources/images/no-movie.svg';
            } else {
                $image = base_url('images/movies/' . $datas['movie_img']);
            }

            $content_type = 'website';

            $twitter_card = 'summary_large_image';

            $created = $datas['rel_date'];
            $updated = $datas['updated'];
        }



        if ($type == 'home') {

            $query = $this->db->get_where('home_seo', array('id' => 1));

            $seos = $query->row_array();



            $title = $seos['title'];

            $desc = $seos['description'];

            $keywords = $seos['keywords'];



            $image = '' . base_url('resources/images/comingtrailer-social.png');

            $content_type = 'website';

            $twitter_card = 'summary_large_image';
        }



        if ($type == 'MovieTrailer') {



            $title = $datas['title'];

            $desc = $datas['description'];

            $keywords = $datas['keywords'];



            $image = '' . base_url('resources/images/comingtrailer-social.png');

            $content_type = 'website';

            $twitter_card = 'summary_large_image';
        }



        if ($type == 'MoviePoster') {



            $title = $datas['title'];

            $desc = $datas['description'];

            $keywords = $datas['keywords'];
            $image = '' . base_url('resources/images/comingtrailer-social.png');

            $content_type = 'website';

            $twitter_card = 'summary_large_image';
        }
        if ($type == 'individual') {
            $title = $datas['title'];

            $desc = $datas['description'];

            $keywords = $datas['keywords'];

            $image = '' . base_url('resources/images/comingtrailer-social.png');

            $content_type = 'website';

            $twitter_card = 'summary_large_image';
        }

        if ($type == 'personality') {


            if($datas['for_seo'] == 'is_cast')
            {

                /*$title = 'Akshay Kumar Latest Movie Teaser & HD Poster, Photos and Videos of Akshay Kumar  - Coming Trailer';

                $description = 'Check out the list of all Akshay Kumar letest movies along with photos, videos and trailer. Also find latest Akshay Kumar movie first look & hd poster on Coming Trailer';

                $eywords = 'Akshay Kumar, Akshay Kumar movies teaser, Akshay Kumar movies, Akshay Kumar photos, Akshay Kumar videos, Akshay Kumar Movies hd poster, Akshay Kumar movies HD wallpaper';
*/



                $title = '';

                if ($datas['personality_title'] == '') {
                
                    $title = $datas['personality_name'].' Latest Movie Teaser & HD Poster, Photos and Videos of '.$datas['personality_name'].'  - Coming Trailer';
                }else{

                    $title = $datas['personality_title'];
                }



                $desc = '';

                if ($datas['personality_desc'] == '') {

                    
                    $desc = 'Check out the list of all '.$datas['personality_name'].' letest movies along with photos, videos and trailer. Also find latest '.$datas['personality_name'].' movie first look & hd poster on Coming Trailer';



                } else {

                    $desc = $datas['personality_desc'];
                }




                
                $keywords = $datas['personality_name'].', '.$datas['personality_name'].' movies teaser, '.$datas['personality_name'].' movies, '.$datas['personality_name'].' photos, '.$datas['personality_name'].' videos, '.$datas['personality_name'].' Movies hd poster, '.$datas['personality_name'].' movies HD wallpaper';


                if ($datas['personality_keywords'] != '') {
                    $keywords = $keywords. ', ' . $datas['personality_keywords'];
                }

            }

            if($datas['for_seo'] == 'is_singer')
            {

                /*Suggsted Title : Arijit Singh Latest Movie Songs & Hit Music video songs Online Free on Coming Trailer

Suggsted Description: Play Arijit Singh latest movie hit video songs and music album. Watch best of Arijit Singh songs online on Coming Trailer.

Suggested Keywords: Best of Arijit Singh video songs, Arijit Singh songs, Arijit Singh all laltest Songs, watch online arijit singh video songs, Arijit Singh new video songs,*/


                $title = '';

                if ($datas['personality_title'] == '') {
                
                    $title = $datas['personality_name'].' Latest Movie Songs & Hit Music video songs Online Free on Coming Trailer';
                }else{

                    $title = $datas['personality_title'];
                }



                $desc = '';

                if ($datas['personality_desc'] == '') {

                    
                    $desc = 'Play '.$datas['personality_name'].' latest movie hit video songs and music album. Watch best of '.$datas['personality_name'].' songs online on Coming Trailer';



                } else {

                    $desc = $datas['personality_desc'];
                }




                
                $keywords = 'Best of '.$datas['personality_name'].' video songs, '.$datas['personality_name'].' songs, '.$datas['personality_name'].' all latest Songs, watch online '.$datas['personality_name'].' video songs, '.$datas['personality_name'].' new video songs';


                if ($datas['personality_keywords'] != '') {
                    $keywords = $keywords. ', ' . $datas['personality_keywords'];
                }


            }

            if($datas['for_seo'] == 'is_music_director')
            {


                /*
                Suggsted Title : Meet Bros Latest video songs, Videos and Photos of Meet Bros on Coming Trailer

Suggsted Description: Meet Bros Songs Latest and popular meet bros songs. Explore Meet Bros upcoming movies video songs and photos. Also find HD posters and videos on Coming Trailer

Suggested Keywords: Meet Bros latest songs, Meet Bros upcoming video songs, Meet Bros movies songs, popular Meet Bros songs, latest video songs on Coming Trailer, watch online meet bros songs 
                */

                $title = '';

                if ($datas['personality_title'] == '') {
                
                    $title = $datas['personality_name'].' Latest video songs, Videos and Movies of '.$datas['personality_name'].' on Coming Trailer';
                }else{

                    $title = $datas['personality_title'];
                }



                $desc = '';

                if ($datas['personality_desc'] == '') {

                    
                    $desc = $datas['personality_name'].' Songs Latest and popular '.$datas['personality_name'].' songs. Explore '.$datas['personality_name'].' upcoming movies video songs and Movies. Also play videos and music album online on Coming Trailer';





                } else {

                    $desc = $datas['personality_desc'];
                }




                
                $keywords = $datas['personality_name'].' latest songs, '.$datas['personality_name'].' upcoming video songs, '.$datas['personality_name'].' movies songs, popular '.$datas['personality_name'].' songs, latest video songs on Coming Trailer, watch online '.$datas['personality_name'].' songs';


                if ($datas['personality_keywords'] != '') {
                    $keywords = $keywords. ', ' . $datas['personality_keywords'];
                }

            }

            if($datas['for_seo'] == 'is_director')
            {


                /*
                Suggsted Title : Dinesh Vijan Movie Trailer and Teaser, Dinesh Vijan Latest Movies HD Poster on Coming Trailer

Suggsted Description: Check out the list of all Dinesh Vijan movies Trailer, Teaser along with photos and videos. Also find the upcoming Dinesh Vijan movies list on Coming Trailer

Suggested Keywords: Dinesh Vijan, Dinesh Vijan Movies, Dinesh Vijan movie poster, Dinesh Vijan Videos, Dinesh Vijan all movies list, Dinesh Vijan movies HD poster

                */


                $title = '';

                if ($datas['personality_title'] == '') {
                
                    $title = $datas['personality_name'].' Movie Trailer and Teaser, '.$datas['personality_name'].' Latest Movies HD Poster on Coming Trailer';
                }else{

                    $title = $datas['personality_title'];
                }



                $desc = '';

                if ($datas['personality_desc'] == '') {

                    
                    $desc = 'Check out the list of all '.$datas['personality_name'].' movies Trailer, Teaser along with photos and videos. Also find the upcoming '.$datas['personality_name'].' movies list on Coming Trailer';



                } else {

                    $desc = $datas['personality_desc'];
                }




                
                $keywords = $datas['personality_name'].', '.$datas['personality_name'].' Movies, '.$datas['personality_name'].' movie poster, '.$datas['personality_name'].' Videos, '.$datas['personality_name'].' all movies list, '.$datas['personality_name'].' movies HD poster';


                if ($datas['personality_keywords'] != '') {
                    $keywords = $keywords. ', ' . $datas['personality_keywords'];
                }

            }




            /*if (!empty($post['personality_img']) && file_exists('images/personality/' . $post['personality_img'])) {
                    $img = base_url() . 'images/personality/' . $post['personality_img'];
                } else {
                    $img = base_url() . 'images/no-user.svg';
                }*/

            

            //$image = base_url('resources/images/no-user.svg');


            if (!empty($datas['personality_img']) && file_exists('images/personality/' . $datas['personality_img'])) {
                    $image = base_url() . 'images/personality/' . $datas['personality_img'];
                } else {
                    $image = base_url() . 'images/no-user.svg';
                }


            $content_type = 'website';

            $twitter_card = 'summary_large_image';
        }

        if ($type == 'AboutUs') {

            $title = $datas['title'];

            $desc = $datas['description'];

            $keywords = $datas['keywords'];

            $image = '' . base_url('resources/images/comingtrailer-social.png');

            $content_type = 'website';

            $twitter_card = 'summary_large_image';
        }

        if ($type == 'ContactUs') {

            $title = $datas['title'];

            $desc = $datas['description'];

            $keywords = $datas['keywords'];

            $image = '' . base_url('resources/images/comingtrailer-social.png');

            $content_type = 'website';

            $twitter_card = 'summary_large_image';
        }

        if ($type == 'Faq') {
            $title = $datas['title'];

            $desc = $datas['description'];

            $keywords = $datas['keywords'];
            $image = '' . base_url('resources/images/comingtrailer-social.png');

            $content_type = 'website';

            $twitter_card = 'summary_large_image';
        }

        if ($type == 'Advertise') {
            $title = $datas['title'];

            $desc = $datas['description'];

            $keywords = $datas['keywords'];
            $image = '' . base_url('resources/images/comingtrailer-social.png');

            $content_type = 'website';

            $twitter_card = 'summary_large_image';
        }

        if ($type == 'Partnership') {

            $title = $datas['title'];

            $desc = $datas['description'];

            $keywords = $datas['keywords'];
            $image = '' . base_url('resources/images/comingtrailer-social.png');

            $content_type = 'website';

            $twitter_card = 'summary_large_image';
        }

        $video_tag = '';

        if (($type == 'trailer') || ($type == 'video')) {

            $saprate_keyword = explode(',', $keywords);

            $keword_tag = '';

            foreach ($saprate_keyword as $value) {

                $keword_tag = $keword_tag . '<meta property="og:video:tag" content="' . rtrim($value) . '">' . PHP_EOL;
            }
            $video_director = '';

            foreach ($datas->data[0]->Director as $value) {
//                echo $value->seo_url_id;exit;
                if ($value->seo_url_id > 0) {
                    $seo_url = $this->getSeoUrl($value->seo_url_id);

                    $video_director = $video_director . '<meta property="video:director" content="' . $seo_url . '"/>' . PHP_EOL;
                } else {
                    //  $video_director = $video_director.'<meta property="video:director" content="'.base_url('individual/index/director/'.$value->director_id).'"/>'.PHP_EOL;
                }
            }

            $musician = '';

            foreach ($datas->data[0]->Music as $value) {
                if ($value->seo_url_id > 0) {
                    $seo_url = $this->getSeoUrl($value->seo_url_id);
                    $musician = $musician . '<meta property="music:musician" content="' . $seo_url . '"/>' . PHP_EOL;
                } else {
                    // $musician = $musician.'<meta property="music:musician" content="'. base_url('individual/index/music/'.$value->music_id).'"/>'.PHP_EOL;
                }
            }

            foreach ($datas->data[0]->singer as $value) {
                if ($value->seo_url_id > 0) {
                    $seo_url = $this->getSeoUrl($value->seo_url_id);
                    $musician = $musician . '<meta property="music:musician" content="' . $seo_url . '"/>' . PHP_EOL;
                } else {
                    // $musician = $musician.'<meta property="music:musician" content="'. base_url('individual/index/music/'.$value->music_id).'"/>'.PHP_EOL;
                }
            }


            $actor = '';

            foreach ($datas->data[0]->video_cast as $value) {

                if ($value->seo_url_id > 0) {
                    $seo_url = $this->getSeoUrl($value->seo_url_id);
                    $actor = $actor . '<meta property="video:actor" content="' . $seo_url . '"/>' . PHP_EOL;
                } else {
                    // $actor = $actor.'<meta property="video:actor" content="'. base_url('individual/index/cast/'.$value->cast_id).'"/>'.PHP_EOL;
                }
            }

            $twitter_player = '<meta name="twitter:player" content="' . $link . '">' . PHP_EOL
                    . '<meta name="twitter:player:width" content="1280">' . PHP_EOL
                    . '<meta name="twitter:player:height" content="720">';

            $video_tag = '<meta property="og:video:url" content="' . $link . '">' . PHP_EOL
                    . '' . PHP_EOL
                    . '<meta property="og:video:type" content="video">' . PHP_EOL
                    . '<meta property="og:video:width" content="1280">' . PHP_EOL
                    . '<meta property="og:video:height" content="720">' . PHP_EOL
                    . '<link rel="amphtml" href="' . $link . '/amp">' . PHP_EOL
                    . '' . $keword_tag . '' . $video_director . '' . $musician . '' . $actor;
        }

        $seo = '<title>' . $title . '</title>' . PHP_EOL .
                '<meta name="description" content="' . $desc . '" />' . PHP_EOL .
                '<meta name="keywords" content="' . $keywords . '" />' . PHP_EOL
                . '<link rel="canonical" href="' . $link . '"/>' . PHP_EOL
                . '<link rel="alternate" href="android-app://com.coming/' . $link . '"/>' . PHP_EOL
                . '<meta property="al:android:url" content="' . $link . '">' . PHP_EOL
                . '<meta property="og:site_name" content="Coming Trailer">' . PHP_EOL
                . '<meta property="og:title" content="' . $title . '">' . PHP_EOL
                . '<meta property="og:image" content="' . $image . '">' . PHP_EOL
                . '<meta property="og:description" content="' . $desc . '">' . PHP_EOL
                . '<meta name="news_keywords" content="' . $keywords . '">' . PHP_EOL
                . '<meta property="og:type" content="' . $content_type . '">' . PHP_EOL
                . '' . $video_tag . '' . PHP_EOL
//
//                . '<meta property="al:android:app_name" content="Coming Trailer">'.PHP_EOL
//
//                . '<meta property="al:android:package" content="com.coming">'.PHP_EOL
//
//                . '<meta property="al:web:url" content="android link&amp;feature=applinks">'.PHP_EOL
//                . '<meta property="fb:app_id" content="87741124305">'.PHP_EOL
                . '<meta name="twitter:card" content="' . $twitter_card . '">' . PHP_EOL
                . '<meta name="twitter:site" content="@ComingTrailerIn">' . PHP_EOL
                . '<meta name="twitter:url" content="' . $link . '">' . PHP_EOL
                . '<meta name="twitter:title" content="' . $title . '">' . PHP_EOL
                . '<meta name="twitter:description" content="' . $desc . '">' . PHP_EOL
                . '<meta name="twitter:image" content="' . $image . '">' . PHP_EOL

//                . '<meta name="twitter:app:name:googleplay" content="Coming Trailer">'.PHP_EOL
//
//                . '<meta name="twitter:app:id:googleplay" content="App ID">'.PHP_EOL
//
//                . '<meta name="twitter:app:url:googleplay" content="App URL">'.PHP_EOL
                . '' . $twitter_player . '' . PHP_EOL;
        if ($this->uri->segment(3)) {
            $seo .= '<meta property="al:android:app_name" content="Coming Trailer">' . PHP_EOL
                    . '<meta property="al:android:package" content="com.coming">' . PHP_EOL
                    . '<meta name="twitter:app:name:googleplay" content="Coming Trailer">' . PHP_EOL
                    . '<meta name="twitter:app:id:googleplay" content="com.coming">' . PHP_EOL
                    . '<meta name="twitter:app:url:googleplay" content="' . $link . '">' . PHP_EOL
                    . '<meta property="fb:app_id" content="1544062205836283">' . PHP_EOL;
        }
//        echo $updated;exit;
        if ($created != '') {
            $created = new DateTime($created, new DateTimeZone('asia/kolkata'));
            $updated = (!empty($updated) && $updated != '0000-00-00 00:00:00') ? new DateTime($updated, new DateTimeZone('asia/kolkata')) : $created;
            $seo = $seo . '<meta itemprop="datePublished" content="' . $created->format('Y-m-d\TH:i:sP') . '"/>' . '' . PHP_EOL
                    . '<meta itemprop="dateModified" content="' . $updated->format('Y-m-d\TH:i:sP') . '"/>' . '' . PHP_EOL
                    . '<meta property="og:updated_time" content="' . $updated->format('Y-m-d\TH:i:sP') . '" />' . '' . PHP_EOL;
        }


        if ($type == 'poster') {

            $seo = $seo . $pos_og_img . PHP_EOL;
            $seo = $seo . '<link rel="amphtml" href="' . $link . '/amp">' . PHP_EOL;
            if ($video_release != '') {
                $seo = $seo . '<meta property="video:release_date" content="' . $video_release . '">' . PHP_EOL;
            }
        } else if ($type == 'trailer' || $type == 'video') {
            if ($video_release != '') {
                $seo = $seo . '<meta property="video:release_date" content="' . $video_release . '">' . PHP_EOL;
            }
        } else if ($type == 'movie') {

            if ($video_release != '') {
                $seo = $seo . '<meta property="video:release_date" content="' . $video_release . '">' . PHP_EOL;
            }
        }
        return $seo;
    }

    public function getSeoUrl($seo_id) {
//        echo '$seo_id';exit;
//        echo $table_nmae;exit;
        $final_url = $this->WebService->getSeoUrl('video_url', $seo_id);
        return $final_url;
    }

}
