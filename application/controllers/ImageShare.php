<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ImageShare
 *
 * @author yoo
 */
class ImageShare extends CI_Controller{

    //put your code here
    
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('WebService');
        
    }
    
    public function index($subcat_id = '',$poster_id = '',$image = ''){
        
        $this->data['poster'] = $this->WebService->getIndividualPoster($subcat_id,'','',$poster_id);
        
//        $seo = '<title>'.$poster.'</title>'.PHP_EOL
//                . '<meta property="og:image" content="'.base_url('images/poster/'.$image).'">'.PHP_EOL
//                . '<meta property="og:image:width" content="250">'.PHP_EOL
//                . '<meta property="og:image:height" content="160">'.PHP_EOL;
        
         $datas = json_decode($this->data['poster']);
        if($datas->status == 1){
            redirect('My404');
        }
        $link = $this->getSeoUrl($datas->data[0]->seo_url_id);
        $link = base_url('ImageShare/index/'.$subcat_id.'/'.$poster_id.'/'.$image);
        $this->data['seo_data'] = $this->getSEO('poster',$datas,$link, base_url('images/poster/'.str_replace('285X160-', '', $image)));
        
//        $this->data['seo_data'] = $seo;
        
        $this->load->view('header_footer/front_header',$this->data);
        
    }
    
    public function getSEO($type,$datas,$link,$myimage){
        
        if($type == 'poster'){

            $title =  $datas->data[0]->poster_name.' Movie HD Poster Wallpaper & First Look Free on Coming Trailer.com';

            if($datas->data[0]->poster_desc == ''){

                $desc = $datas->data[0]->poster_name.' Movie HD Poster Wallpaper & First Look Free Online. '

                        . 'Download '.$datas->data[0]->poster_name.' Movie HD Poster Wallpaper & First Look '

                        . 'Free on Coming Trailer.com.';

            }else{

                $desc = $datas->data[0]->poster_desc;

            }

            $keywords = 'Download HD Poster '.$datas->data[0]->poster_name.', '.$datas->data[0]->poster_name.' HD Wallpaper, '.$datas->data[0]->poster_name.' Movie HD Wallpapers, High Resolution Wallpapers, Movie Wallpaper, Free Hd Wallaper, Free HD Poster, ALl New Poster, '.$datas->data[0]->poster_name.' Movie First Look, Free Poster Image'

                    . ''.$datas->data[0]->poster_keywords;

            

//            print_r($datas->data[0]->poster_id);exit;    $img->poster_img

            $pos_og_img = '';

            $trailer_data = $datas->data;

            foreach($trailer_data as $trailer){

                //echo $trailer->poster_id;

                foreach($trailer->poster_img as $img){
                    if(str_replace("285X160-","",$img->poster_img) != ''){
                        $pos_og_img = $pos_og_img.'<meta property="og:image" content="'.str_replace("285X160-","",$img->poster_img).'">';
                    }
                }



                foreach($trailer->firstlook_img as $img){
                    if(str_replace("285X160-","",$img->poster_img) != ''){
                        $pos_og_img = $pos_og_img.'<meta property="og:image" content="'.str_replace("285X160-","",$img->poster_img).'">';
                    }
                }



                foreach($trailer->wallpaper_img as $img){
                    if(str_replace("285X160-","",$img->poster_img) != ''){
                        $pos_og_img = $pos_og_img.'<meta property="og:image" content="'.str_replace("285X160-","",$img->poster_img).'">';
                    }

                }

            }

            $image = str_replace("285X160-","",$datas->data[0]->poster_img[0]->poster_img);

            $content_type = 'website';

            $twitter_card = 'summary_large_image';

            

            $video_twit_director = '';

            foreach($datas->data[0]->director as $value){
                
                $video_twit_director = $video_twit_director.''.$value->director_name.', ';

            }

            
            if($datas->data[0]->movies[0]->my_release == '0000-00-00'){
                $video_release = '';
            }else if($datas->data[0]->movies[0]->my_release == ''){
                $video_release = '';
            }else{
            
                $video_release = date('d M Y',strtotime($datas->data[0]->movies[0]->my_release));

            }

            
            $created = $datas->data[0]->created;
            $updated = $datas->data[0]->updated;
            
        }
        
        
        $seo = '<title>'.$title.'</title>'.PHP_EOL.

               '<meta name="description" content="'.$desc.'" />'.PHP_EOL.

               '<meta name="keywords" content="'.$keywords.'" />'.PHP_EOL

                . '<link rel="canonical" href="'.$link.'"/>'.PHP_EOL

                . '<link rel="alternate" href="android-app://com.comming"/>'.PHP_EOL

                . '<meta property="og:site_name" content="Coming Trailer">'.PHP_EOL

                . '<meta property="og:url" content="'.$link.'">'.PHP_EOL

                . '<meta property="og:title" content="'.$title.'">'.PHP_EOL

                . '<meta property="og:image" content="'.$myimage.'">'.PHP_EOL

                . '<meta property="og:description" content="'.$desc.'">'.PHP_EOL

                . '<meta name="news_keywords" content="'.$keywords.'">'.PHP_EOL

                . '<meta property="og:type" content="'.$content_type.'">'.PHP_EOL

              

                . '<meta property="al:android:url" content="androdi link">'.PHP_EOL

                . '<meta property="al:android:app_name" content="Coming Trailer">'.PHP_EOL

                . '<meta property="al:android:package" content="com.coming">'.PHP_EOL

                . '<meta property="al:web:url" content="android link&amp;feature=applinks">'.PHP_EOL

                . '<meta property="fb:app_id" content="87741124305">'.PHP_EOL

                . '<meta name="twitter:card" content="'.$twitter_card.'">'.PHP_EOL

                . '<meta name="twitter:site" content="@Coming Trailer">'.PHP_EOL

                . '<meta name="twitter:url" content="'.$link.'">'.PHP_EOL

                . '<meta name="twitter:title" content="'.$title.'">'.PHP_EOL

                . '<meta name="twitter:description" content="'.$desc.'">'.PHP_EOL

                . '<meta name="twitter:image" content="'.$image.'">'.PHP_EOL

                . '<meta name="twitter:app:name:googleplay" content="Coming Trailer">'.PHP_EOL

                . '<meta name="twitter:app:id:googleplay" content="App ID">'.PHP_EOL

                . '<meta name="twitter:app:url:googleplay" content="App URL">'.PHP_EOL

                ;
                return $seo;
    }
    
    public function getSeoUrl($seo_id){
//        echo '$seo_id';exit;
//        echo $table_nmae;exit;
        $final_url = $this->WebService->getSeoUrl('video_url',$seo_id);
        return $final_url;
    }
    
}
