<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MovieIndividual
 *
 * @author yoo
 */
class MovieIndividual extends CI_Controller {

    //put your code here

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('adm_home_model');
        $this->load->model('WebService');
        $this->load->model('adm_movie_model');
        $this->load->model('Front_Model');
        $this->load->model('Seo_data_model');
    }

    public function index($movie_id = 0) {

        $this->data['movie'] = $this->adm_movie_model->getRowData('movie', $movie_id);


        if (empty($this->data['movie'])) {
            redirect('My404');
        }

        $this->data['sub_categories'] = $this->My_model->getresult("select id,subcat_name from sub_category where id IN(" . $this->data['movie']['subcat_id'] . ")");
        $this->data['cast'] = $this->getCast($movie_id);
        $this->data['trailers'] = $this->Front_Model->getVideoByMovie(1, $movie_id, 0);
        $this->data['videos'] = $this->Front_Model->getVideoByMovie(2, $movie_id, 0);
        $this->data['poster'] = $this->Front_Model->getPosterByMovie(3, $movie_id);
        $this->data['singer'] = $this->getSinger($movie_id);        
        $this->data['director'] = $this->getDirector($movie_id);
        $this->data['music'] = $this->getMusic($movie_id);

        if ($this->data['music'][0]['music_id'] <= 0) {
            $this->data['music'] = "";
        }
        if ($this->data['director'][0]['director_id'] <= 0) {
            $this->data['director'] = "";
        }
        if ($this->data['singer'][0]['singer_id'] <= 0) {
            $this->data['singer'] = "";
        }
        if ($this->data['cast'][0]['cast_id'] <= 0) {
            $this->data['cast'] = "";
        }

        $this->data['side_big_adv'] = $this->WebService->getAdsense(300, 600);
        $this->data['side_adv'] = $this->WebService->getAdsense(300, 250);

//        $this->data['seo']['title']= $this->data['movie']['movie_name'].' Video Songs & Trailer Watch it: Download '.$this->data['movie']['movie_name'].'HD Poster Free on ComingTrailer.com';
//        $this->data['seo']['description']= $this->data['movie']['movie_desc'] ;
//        $this->data['seo']['keywords']= $this->data['movie']['movie_name'].' video songs Watch it, '.$this->data['movie']['movie_name'].' video songs online, '.$this->data['movie']['movie_name'].' free video songs, '.$this->data['movie']['movie_name'].' trailer, '.$this->data['movie']['movie_name'].' all video songs, watch it '.$this->data['movie']['movie_name'].' songs, '.$this->data['movie']['movie_name'].' official trailer, Official trailer, Download HD Poster '.$this->data['movie']['movie_name'].', '.$this->data['movie']['movie_name'].' HD Wallpaper '.$this->data['movie']['movie_keywords'] ;
        $mydata = $this->data['movie'];
//        echo $mydata['seo_url_id'];exit;
        $link = $this->getSeoUrl($mydata['seo_url_id']);
        $type = 'movie';
        $this->data['seo_data'] = $this->Seo_data_model->getSEO($type, $this->data['movie'], $link);

        $this->data['controller'] = $this;

        //Footer links
        $this->data['top_actors'] = $this->adm_home_model->getTopActors();
        $this->data['top_singers'] = $this->adm_home_model->getTopSingers();

        $this->data['trailer_cat'] = $this->adm_home_model->getSubCat(1);
        $this->data['video_cat'] = $this->adm_home_model->getSubCat(2);

        $this->data['movie_itemprop'] = $this->getMovieItemprop($this->data['movie'], $link, $this->data['cast'], $this->data['director'], $this->data['music'], $this->data['trailers']);

        $this->load->view('header_footer/front_header', $this->data);
        $this->load->view('movie_individual', $this->data);
        $this->load->view('header_footer/front_footer', $this->data);
    }

    public function getSeoUrl($seo_id) {
//        echo '$seo_id';exit;
//        echo $table_nmae;exit;
        $final_url = $this->WebService->getSeoUrl('video_url', $seo_id);
        return $final_url;
    }

    public function getMovieItemprop($movie_data, $link, $cast, $director, $music, $trailers) {

//        print_r($movie_data);exit;
        $external_link = base_url('images/movies/' . $movie_data['movie_img']);

        if (@getimagesize($external_link)) {
            $image = base_url('images/movies/' . $movie_data['movie_img']);
        } else {
            $image = base_url('resources/images/no-movie.svg');
        }
        $sub_cat = $this->WebService->getSubCategoryName($movie_data['subcat_id']);

        $created = $movie_data['rel_date'];
        $modify = $movie_data['updated'];
        $relesed = '';
        if (($movie_data['my_release'] != '0000-00-00') && ($movie_data['my_release'] != '')) {

            $relesed = date('d M Y', strtotime($movie_data['my_release']));
        }

        $movie = '<div itemscope itemtype ="http://schema.org/Movie">' . PHP_EOL
                . '<meta itemprop="name" content="' . $movie_data['movie_name'] . '"/>' . PHP_EOL
                . '<meta itemprop="url" content="' . $link . '"/>' . PHP_EOL
                . '<meta itemprop="image" content="' . $image . '"/>' . PHP_EOL
                . '<meta itemprop="inLanguage" content="' . $sub_cat . '"/>' . PHP_EOL
//                .'<meta itemprop="datePublished" content="'.$created.'"/>'.PHP_EOL
//                .'<meta itemprop="dateModified" content="'.$modify.'"/>'.PHP_EOL

        ;

        if ($relesed != '') {
            $movie = $movie . '<meta itemprop="releasedEvent" content="' . $relesed . '"/>' . PHP_EOL;
        }

        $mycast = '';
        $cast_prop = '';
        foreach ($cast as $value) {
            $cast_img = $value['cast_img'];
            $cast_seo_url = base_url() . "personality/" . str_replace(" ", "-", str_replace(["(", ")"], "", $value['cast_name'])); //$this->getSeoUrl($value['seo_url_id']);
            $cast_name = $value['cast_name'];
            if ($cast_name != '') {
                if ($cast_img == '') {
                    $cast_img = base_url('resources/images/no-user.svg');
                } else {
                    $cast_img = base_url('images/personality/' . $value['cast_img']);
                }

                $cast_prop = $cast_prop . '' . PHP_EOL . ''
                        . '<div itemprop="actor" itemscope itemtype="http://schema.org/Person">' . PHP_EOL . '
                           <meta itemprop="name" content ="' . $cast_name . '" />' . PHP_EOL . '
                           <meta itemprop="sameAs" content="' . $cast_seo_url . '">' . PHP_EOL . '
                           <meta itemprop="image" content="' . $cast_img . '" />' . PHP_EOL . '
                        </div>' . PHP_EOL . '';

                $mycast = $mycast . $value['cast_name'] . ', ';
            }
        }

        $mycast = rtrim($mycast, ', ');
        $movie = $movie . $cast_prop;
        if ($mycast != '') {
//             $movie = $movie.'<meta itemprop="actor" content="'.$mycast.'"/>'.PHP_EOL;
        }

        $keywords = '' . $movie_data['movie_name'] . ' video songs Watch it, ' . $movie_data['movie_name'] . ' video songs online,  ' . $movie_data['movie_name'] . ' free video songs, ' . $movie_data['movie_name'] . ' trailer, ' . $movie_data['movie_name'] . ' all video songs, ' . $movie_data['movie_name'] . ' official trailer, Official trailer, Download ' . $movie_data['movie_name'] . ' HD Poster, First Look, Movie Poster, ' . $movie_data['movie_name'] . ' HD Wallpaper';

        $movie = $movie . '<meta itemprop="keywords" content="' . $keywords . '"/>' . PHP_EOL;

        $mydirector = '';
        $director_prop = '';
        foreach ($director as $value) {
            $director_name = $value['director_name'];
            if ($director_name != '') {
                $director_img = $value['director_img'];
                $director_seo_url = base_url() . "personality/" . str_replace(" ", "-", str_replace(["(", ")"], "", $director_name)); //$this->getSeoUrl($value['seo_url_id']);

                if (($director_img == '')) {
                    $director_img = base_url('resources/images/no-user.svg');
                } else {
                    $director_img = base_url('images/personality/' . $value['director_img']);
                }

                $director_prop = $director_prop . '' . PHP_EOL . ''
                        . '<div itemprop="director" itemscope itemtype="http://schema.org/Person">' . PHP_EOL . '
                            <meta itemprop="name" content ="' . $director_name . '" />' . PHP_EOL . '
                            <meta itemprop="sameAs" content="' . $director_seo_url . '">' . PHP_EOL . '
                            <meta itemprop="image" content="' . $director_img . '" />' . PHP_EOL . '
                         </div>' . PHP_EOL . '';

                $mydirector = $mydirector . $value['director_name'] . ', ';
            }
        }
        $mydirector = rtrim($mydirector, ', ');


        $movie = $movie . $director_prop;


        if ($mydirector != '') {
//             $movie = $movie.'<meta itemprop="director" content="'.$mydirector.'"/>'.PHP_EOL;
        }

        $mymusic = '';
        $music_prop = '';
        foreach ($music as $value) {
            $music_name = $value['music_name'];
            if ($music_name != '') {
                $music_img = $value['music_img'];
                $music_seo_url = base_url() . "personality/" . str_replace(" ", "-", str_replace(["(", ")"], "", $music_name)); //$this->getSeoUrl($value['seo_url_id']);
                if (($music_img == '')) {
                    $music_img = base_url('resources/images/no-user.svg');
                } else {
                    $music_img = base_url('images/personality/' . $value['music_img']);
                }

                $music_prop = $music_prop . '' . PHP_EOL . ''
                        . '<div itemprop="musicBy" itemscope itemtype="http://schema.org/Person">
                            <meta itemprop="name" content ="' . $music_name . '" />
                            <meta itemprop="sameAs" content="' . $music_seo_url . '">
                            <meta itemprop="image" content="' . $music_img . '" />
                         </div>';

                $mymusic = $mymusic . $value['music_name'] . ', ';
            }
        }
        $movie = $movie . $music_prop;

        $mymusic = rtrim($mymusic, ', ');
        if ($mymusic != '') {
//             $movie = $movie.'<meta itemprop="musicBy" content="'.$mymusic.'"/>'.PHP_EOL;
        }

        $mytrailer = '';
        if (!empty($trailers)) {
//             print_r($trailers);exit;
            foreach ($trailers as $songs) {
                $datas = json_decode($songs);
                if (!empty($datas)) {
                    $trailer_data = $datas->data;
                    // $trailer_count = $datas->total_trailer;
//               print_r($trailer_data);exit;
                    foreach ($trailer_data as $trailer) {
                        if (!empty($trailer)) {

                            $video_id = $trailer->video_id;
                            $seo_urls = $this->getSeoUrl($trailer->seo_url_id);
                            $thumb_img = $trailer->video_thumb;
                            $ceated = $trailer->created;
                            $video_name = $trailer->video_name;
                            $my_trail_cast = '';
                            $my_trail_cast_prop = '';
//                        print_r($trailer->video_cast);exit;
                            foreach ($trailer->video_cast as $values) {
                                $cast_name = $values->cast_name;
                                if ($cast_name != '') {
                                    $cast_img = $values->cast_img;

                                    if (($cast_img != '')) {
                                        $cast_img = base_url('images/personality/' . $values->cast_img);
                                        $my_trail_cast_prop = $my_trail_cast_prop . '' . PHP_EOL . ''
                                                . '<meta itemprop="image" content="' . $cast_img . '" />';
                                    } else {

                                        $my_trail_cast_prop = $my_trail_cast_prop . '' . PHP_EOL . ''
                                                . '<meta itemprop="image" content="' . base_url('resources/images/no-user.svg') . '" />';
                                    }
                                    $my_trail_cast = $my_trail_cast . '' . $cast_name . ', ';
                                }
                            }

                            $my_trail_cast = rtrim($my_trail_cast, ', ');

                            if ($my_trail_cast != '') {
//                            $my_trail_cast = ', '.$my_trail_cast;
                            }

                            $my_trail_director = '';
                            $my_trail_director_prop = '';
                            foreach ($trailer->Director as $values) {
                                $cast_name = $values->director_name;
                                if ($cast_name != '') {
                                    $cast_img = $values->director_img;

                                    if (($cast_img != '')) {
                                        $cast_img = base_url('images/personality/' . $values->director_img);
                                        $my_trail_director_prop = $my_trail_director_prop . '' . PHP_EOL . ''
                                                . '<meta itemprop="image" content="' . $cast_img . '" />';
                                    } else {
                                        $my_trail_director_prop = $my_trail_director_prop . '' . PHP_EOL . ''
                                                . '<meta itemprop="image" content="' . base_url('resources/images/no-user.svg') . '" />';
                                    }
                                    $my_trail_director = $my_trail_director . '' . $cast_name . ', ';
                                }
                            }



                            $my_trail_director = rtrim($my_trail_director, ', ');

                            if ($my_trail_director != '') {
                                $my_trail_director = ', ' . $my_trail_director;
                            }

                            $my_trail_singer = '';
                            $my_trail_singer_prop = '';
                            foreach ($trailer->singer as $values) {
                                $cast_name = $values->singer_name;
                                if ($cast_name != '') {
                                    $cast_img = $values->singer_img;

                                    if (($cast_img != '')) {
                                        $cast_img = base_url('images/personality/' . $values->singer_img);
                                        $my_trail_singer_prop = $my_trail_singer_prop . '' . PHP_EOL . ''
                                                . '<meta itemprop="image" content="' . $cast_img . '" />';
                                    } else {
                                        $my_trail_singer_prop = $my_trail_singer_prop . '' . PHP_EOL . ''
                                                . '<meta itemprop="image" content="' . base_url('resources/images/no-user.svg') . '" />';
                                    }
                                    $my_trail_singer = $my_trail_singer . '' . $cast_name . ', ';
                                }
                            }
                            $my_trail_singer = rtrim($my_trail_singer, ', ');

                            if ($my_trail_singer != '') {
                                $my_trail_singer = ', ' . $my_trail_singer;
                            }

                            $my_trail_music = '';
                            $my_trail_music_prop = '';
                            foreach ($trailer->Music as $values) {
                                $cast_name = $values->music_name;
                                if ($cast_name != '') {
                                    $cast_img = $values->music_img;

                                    if (($cast_img != '')) {
                                        $cast_img = base_url('images/personality/' . $values->music_img);
                                        $my_trail_music_prop = $my_trail_music_prop . '' . PHP_EOL . ''
                                                . '<meta itemprop="image" content="' . $cast_img . '" />';
                                    } else {
                                        $my_trail_music_prop = $my_trail_music_prop . '' . PHP_EOL . ''
                                                . '<meta itemprop="image" content="' . base_url('resources/images/no-user.svg') . '" />';
                                    }
                                    $my_trail_music = $my_trail_music . '' . $cast_name . ', ';
                                }
                            }
                            $my_trail_music = rtrim($my_trail_music, ', ');

                            if ($my_trail_music != '') {
                                $my_trail_music = ', ' . $my_trail_music;
                            }

                            $mytrailer = $mytrailer . '' . PHP_EOL . ''
                                    . '<div itemprop="trailer" itemscope itemtype="http://schema.org/VideoObject">
                                    <meta itemprop="name" content ="' . $video_name . ' Video Song Watch it Online Free on Coming Trailer.com" />
                                    <meta itemprop="thumbnailUrl" content="' . $thumb_img . '"/>
                                        
                                    
                                    <meta itemprop="uploadDate" content="' . $ceated . '"/>
                                        <meta itemprop="embedURL" content="' . $seo_urls . '"/>
                                        
                                    <meta itemprop="description" content="' . $video_name . ' Watch it Online Free. Play Online HD ' . $video_name . ' Starring ' . $my_trail_cast . '. HD ' . $video_name . ' Free on Coming Trailer.com."/>
                                 </div>';
//                        <meta itemprop="description" content="'.$video_name.' Trailer, HD '.$video_name.' Trailer,  Watch it Online HD '.$video_name.' Trailer'.$my_trail_cast.''.$my_trail_director.''.$my_trail_singer.''.$my_trail_music.'"/>
//                        $mytrailer = $mytrailer . '<meta itemprop="trailer" content="'.$seo_urls.'"/>'.PHP_EOL;
                        }
                    }
                }
            }
        }
        $mytrailer = rtrim($mytrailer, ', ');
        if ($mytrailer != '') {
            $movie = $movie . $mytrailer . PHP_EOL;
        }

        $movie = $movie . '</div>';

        return $movie;
    }

    public function getCast($movie_id) {
        return $this->WebService->getMovieMapCast($movie_id);
    }

    //Edit Video
    public function getSinger($movie_id) {
        return $this->WebService->getMovieMapSinger($movie_id);
    }

    //Edit Video
    public function getMusic($movie_id) {
        return $this->WebService->getMovieMapMusic($movie_id);
    }

    //Edit Video
    public function getDirector($movie_id) {
        return $this->WebService->getMovieMapDirector($movie_id);
    }

    public function setMovieCast($movie_id, $castid) {
        $this->adm_movie_model->addMovieCastData($movie_id, $castid);
    }

    public function setMovieDirector($movie_id, $castid) {
        $this->adm_movie_model->addMovieDirectorData($movie_id, $castid);
    }

    public function setMovieMusic($movie_id, $castid) {
        $this->adm_movie_model->addMovieMusicData($movie_id, $castid);
    }

    public function setMovieSinger($movie_id, $castid) {
        $this->adm_movie_model->addMovieSingerData($movie_id, $castid);
    }

}