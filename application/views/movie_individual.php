<div class="container cf">
    <div class="wrapper-full-content">
        <div class="top-wrap">
            <?php
            $trailer_count = 0;
            $video_songe_count = 0;
            $poster_count = 0;
            ?>
            <div class="page-header cf">
                <div class="blurimg">
                    <?php
                    $external_link = base_url('images/movies/' . $movie['movie_img']);
//                        if (@getimagesize($external_link)) {
//                        echo  'image exists';
//                        } else {
//                        echo  'image does not exist';
//                        }exit; 

                    if (@getimagesize($external_link)) {
                        ?>
                        <img id="image" src="<?php echo base_url() ?>images/movies/<?php echo '' . $movie['movie_img']; ?>" alt="<?php echo '' . $movie['movie_name']; ?>" /> 
                    <?php } else {
                        ?>
                        <img id="image" src="<?php echo base_url('resources/images/no-movie.svg'); ?>" alt="<?php echo '' . $movie['movie_name']; ?>" /> 
                    <?php }
                    ?>
                </div>
                <div class="profile-art">
                    <?php
                    $external_link = base_url('images/movies/' . $movie['movie_img']);

                    if (@getimagesize($external_link)) {
                        ?>
                        <img id="image" src="<?php echo base_url() ?>images/movies/<?php echo '' . $movie['movie_img']; ?>" alt="<?php echo '' . $movie['movie_name']; ?>" /> 
                    <?php } else {
                        ?>
                        <img id="image" src="<?php echo base_url('resources/images/no-movie.svg'); ?>" alt="<?php echo '' . $movie['movie_name']; ?>" /> 
                    <?php }
                    ?>
                </div>
                <div class="meta-info">
                    <h1>
                        <?php echo '' . $movie['movie_name']; ?>
                        <?php
                        if ($this->session->userdata('admLoggedId')) {
                            ?>
                            <a href="<?php echo base_url('backend/movie/edit?id=' . $movie['id']); ?>" class="icon-edit" target="blank">Edit</a>
                        <?php } ?>
                    </h1>
                    <div class="languages">
                        <?php
                        if (!empty($sub_categories)) {
                            foreach ($sub_categories as $row) {
                                ?>
                                <a href="<?php echo base_url() . 'movie/' . strtolower($row['subcat_name']); ?>"><?php echo $row['subcat_name']; ?></a>
                                <?php
                            }
                        }
                        ?>
                    </div>
                    <p>
                        <span id="songs_count"></span>
                        <span id="trailer_count"></span> 
                        <span id="poster_count"></span> 
                        <!--<span>50 Poster</span>--> 
                    </p>
<!--                            <p><?php //echo ''.$movie['rel_date'];           ?></p>-->
                    <?php
                    if (!(date('d M Y', strtotime($movie['my_release'])) == '01 Jan 1970') && !($movie['my_release'] == '0000-00-00') && !($movie['my_release'] == '')) {
                        ?>
                        <p>Release : <?php echo date('d M Y', strtotime($movie['my_release'])); ?></p>
                    <?php } ?> 


                    <?php echo $movie_itemprop; ?>

                </div>
            </div>
        </div>

        <div class="movie-page">
            <?php
            $mycast['video_cast'] = array();
            $mycast['video_singer'] = array();
            $mycast['video_director'] = array();
            $mycast['video_music'] = array();
            $datas = json_decode($videos[0]);
            if (!empty($datas)) {
                ?>
                <div class="content-container">
                    <h2>Song</h2>
                    <div class="list-wrap cf">

                        <div class="list">
                            <ul>
                                <?php
                                foreach ($videos as $songs) {
                                    $datas = json_decode($songs);

                                    if (!empty($datas)) {
                                        $trailer_data = $datas->data;

                                        //$video_son$datas->data[0]ge_count = $datas->total_trailer;

                                        foreach ($trailer_data as $trailer) {
                                            if (!empty($trailer)) {
                                                $video_id = $trailer->video_id;
                                                $seo_urls = $controller->getSeoUrl($trailer->seo_url_id);
                                                foreach ($trailer->video_cast as $value) {
                                                    array_push($mycast['video_cast'], $value);
                                                }

                                                foreach ($trailer->singer as $value) {
                                                    array_push($mycast['video_singer'], $value);
                                                }

                                                foreach ($trailer->Director as $value) {
                                                    array_push($mycast['video_director'], $value);
                                                }

                                                foreach ($trailer->Music as $value) {
                                                    array_push($mycast['video_music'], $value);
                                                }
                                                ?>
                                                <li><a href="<?php echo $seo_urls; ?>">
                                                        <?php echo $trailer->video_name; ?>
                                                    </a></li>

                                                <?php
                                                $video_songe_count++;
                                            }
                                        }
                                    }
                                }
//                            print_r($mycast['video_music']);
                                ?>

                            </ul>
                        </div>

                    </div>
                </div>
                <?php
            }

            $datas = json_decode($trailers[0]);
            if (!empty($datas)) {
                ?>

                <?php if (!empty($trailers)) { ?>
                    <div class="content-container">
                        <h2>Trailer</h2>
                        <div class="list-wrap cf">
                            <div class="list">
                                <ul>
                                    <?php
                                    foreach ($trailers as $songs) {
                                        $datas = json_decode($songs);
                                        if (!empty($datas)) {
                                            $trailer_data = $datas->data;
                                            // $trailer_count = $datas->total_trailer;
                                            foreach ($trailer_data as $trailer) {
                                                if (!empty($trailer)) {
                                                    $video_id = $trailer->video_id;
                                                    $seo_urls = $controller->getSeoUrl($trailer->seo_url_id);
                                                    foreach ($trailer->video_cast as $value) {
                                                        array_push($mycast['video_cast'], $value);
                                                    }

                                                    foreach ($trailer->singer as $value) {
                                                        array_push($mycast['video_singer'], $value);
                                                    }

                                                    foreach ($trailer->Director as $value) {
                                                        array_push($mycast['video_director'], $value);
                                                    }

                                                    foreach ($trailer->Music as $value) {
                                                        array_push($mycast['video_music'], $value);
                                                    }
                                                    ?>
                                                    <li><a href="<?php echo $seo_urls; ?>">
                                                            <?php echo $trailer->video_name; ?>
                                                        </a></li>

                                                    <?php
                                                    $trailer_count++;
                                                }
                                            }
//                                        print_r($mycast['video_music']);
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>

                        </div>
                    </div>

                    <?php
                }
            }
            $datas = json_decode($poster[0]);
            if (!empty($datas)) {
                ?>
                <div class="content-container">
                    <h2>Poster</h2>
                    <div class="list-wrap cf">
                        <div class="list">
                            <ul><?php
                                foreach ($poster as $songs) {
                                    $datas = json_decode($songs);
                                    if (!empty($datas)) {
                                        $trailer_data = $datas->data;
                                        //$poster_count = $datas->total_poster;

                                        foreach ($trailer_data as $trailer) {
                                            if (!empty($trailer)) {
                                                $poster_id = $trailer->poster_id;
                                                $seo_urls = $controller->getSeoUrl($trailer->seo_url_id);

                                                foreach ($trailer->poster_cast as $value) {
                                                    array_push($mycast['video_cast'], $value);
                                                }

                                                foreach ($trailer->director as $value) {
                                                    array_push($mycast['video_director'], $value);
                                                }
                                                ?>
                                                <li><a href="<?php echo $seo_urls; ?>">
                                                        <?php echo $trailer->poster_name; ?>
                                                    </a></li>

                                                <?php
                                                $poster_count++;
                                            }
                                        }
//                                        print_r($mycast['video_cast']);
                                    }
                                }
                                ?>
                                <!--<li><a href="#">Raees Movie Hd Wallpaper</a></li>-->
                            </ul>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>

            <?php if (!empty($cast)) { ?>
                <div class="content-container">
                    <h2>Actor</h2>
                    <div class="list-wrap cf">
                        <div class="list full-list">
                            <ul>
                                <?php
//                                            print_r((object)$cast[0]);
                                foreach ($cast as $value) {
                                    array_push($mycast['video_cast'], (object) $value);
                                }
//                                                print_r($mycast['video_cast']);
                                $iscontains = array();
                                foreach ($mycast['video_cast'] as $value) {
//                                                    print_r($value);
                                    if (!empty($value->cast_name)) {
                                        if (!in_array($value->cast_name, $iscontains)) {
//                                            $seo_urls = $controller->getSeoUrl($value->seo_url_id);
                                            ?>
                                            <li><a href="<?php echo base_url() . "personality/" . str_replace(" ", "-", str_replace(["(", ")"], "", $value->cast_name)); ?>">
                                                    <?php
                                                    $filename = base_url('images/personality/' . @$value->cast_img);
                                                    if (@getimagesize($filename)) {
                                                        ?>
                                                        <img src="<?php echo base_url() ?>images/personality/<?php echo $value->cast_img; ?>" alt="<?php echo $value->cast_name; ?>" /> 
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <img src="<?php echo base_url('resources/images/no-user.svg'); ?>" alt="<?php echo $value->cast_name; ?>" /> 
                                                        <?php
                                                    }
                                                    ?>
                                                    <span><?php echo $value->cast_name; ?></span> </a></li>
                                            <?php
                                            array_push($iscontains, $value->cast_name);


                                            if ($this->session->userdata('admLoggedId')) {
                                                $controller->setMovieCast($movie['id'], $value->cast_id);
                                            }
                                        }
                                    }
                                }
                                ?>


                            </ul>
                        </div>
                    </div>
                </div>
            <?php } ?> 
            <?php if (!empty($singer)) { ?>
                <div class="content-container">
                    <h2>Singer</h2>
                    <div class="list-wrap cf">
                        <div class="list full-list">
                            <ul>
                                <?php
                                foreach ($singer as $value) {
                                    array_push($mycast['video_singer'], (object) $value);
                                }
                                $issinger = array();
                                foreach ($mycast['video_singer'] as $value) {
                                    if (!empty($value->singer_name)) {
                                        if (!in_array($value->singer_name, $issinger)) {
//                                            $seo_urls = $controller->getSeoUrl($value->seo_url_id);
                                            ?>
                                            <li><a href="<?php echo base_url() . "personality/" . str_replace(" ", "-", str_replace(["(", ")"], "", $value->singer_name)); ?>">
                                                    <?php
                                                    $filename = base_url('images/personality/' . @$value->singer_img);
                                                    if (@getimagesize($filename)) {
                                                        ?>
                                                        <img src="<?php echo base_url() ?>images/personality/<?php echo $value->singer_img; ?>" alt="<?php echo $value->singer_name; ?>" /> 
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <img id="image" src="<?php echo base_url('resources/images/no-user.svg'); ?>" alt="<?php echo $value->singer_name; ?>" /> 
                                                        <?php
                                                    }
                                                    ?>     
                                                    <span><?php echo $value->singer_name; ?></span> </a></li>
                                            <?php
                                            array_push($issinger, $value->singer_name);

                                            if ($this->session->userdata('admLoggedId')) {
                                                $controller->setMovieSinger($movie['id'], $value->singer_id);
                                            }
                                        }
                                    }
                                }
                                ?>

                            </ul>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (!empty($director)) { ?>
                <div class="content-container">
                    <h2>Director</h2>
                    <div class="list-wrap cf">
                        <div class="list full-list">
                            <ul>
                                <?php                                
                                foreach ($director as $value) {
                                    array_push($mycast['video_director'], (object) $value);
                                }                                                                                               
                                $isdirect = array();
                                foreach ($mycast['video_director'] as $value) {
                                    if (!empty($value->director_name)) {
                                        if (!in_array($value->director_name, $isdirect)) {
//                                            $seo_urls = $controller->getSeoUrl($value->seo_url_id);
                                            ?>
                                            <li><a href="<?php echo base_url() . "personality/" . str_replace(" ", "-", str_replace(["(", ")"], "", $value->director_name)); ?>">
                                                    <?php
                                                    $filename = base_url('images/personality/' . @$value->director_img);                                                    
                                                    if (@getimagesize($filename)) {
                                                        ?>
                                                        <img src="<?php echo base_url() ?>images/personality/<?php echo $value->director_img; ?>" alt="<?php echo $value->director_name; ?>" /> 
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <img src="<?php echo base_url('resources/images/no-user.svg'); ?>" alt="<?php echo $value->director_name; ?>" /> 
                                                        <?php
                                                    }
                                                    ?>        
                                                    <span><?php echo $value->director_name; ?></span> </a></li>
                                            <?php
                                            array_push($isdirect, $value->director_name);

                                            if ($this->session->userdata('admLoggedId')) {
                                                $controller->setMovieDirector($movie['id'], $value->director_id);
                                            }
                                        }
                                    }
                                }
                                ?>

                            </ul>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (!empty($music)) { ?>
                <div class="content-container">
                    <h2>Music Director</h2>
                    <div class="list-wrap cf">
                        <div class="list full-list">
                            <ul>
                                <?php
                                //print_r($cast);
                                foreach ($music as $value) {
                                    array_push($mycast['video_music'], (object) $value);
                                }
                                $ismusic = array();
                                foreach ($mycast['video_music'] as $value) {

                                    if (!empty($value->music_name)) {
                                        if (!in_array($value->music_name, $ismusic)) {
//                                            $seo_urls = $controller->getSeoUrl($value->seo_url_id);
                                            ?>
                                            <li><a href="<?php echo base_url() . "personality/" . str_replace(" ", "-", str_replace(["(", ")"], "", $value->music_name)); ?>">
                                                    <?php
                                                    $filename = base_url('images/personality/' . @$value->music_img);
                                                    if (@getimagesize($filename)) {
                                                        ?>
                                                        <img src="<?php echo base_url() ?>images/personality/<?php echo $value->music_img; ?>" alt="<?php echo $value->music_name; ?>" />
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <img id="image" src="<?php echo base_url('resources/images/no-user.svg'); ?>" alt="<?php echo $value->music_name; ?>" /> 
                                                        <?php
                                                    }
                                                    ?>      
                                                    <span><?php echo $value->music_name; ?></span> </a></li>
                                            <?php
                                            array_push($ismusic, $value->music_name);

                                            if ($this->session->userdata('admLoggedId')) {
                                                $controller->setMovieMusic($movie['id'], $value->music_id);
                                            }
                                        }
                                    }
                                }
                                ?>

                            </ul>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>

    <div class="wrapper-full-sidebar">
        <div class="sidebar-jaherat"><div class="jaherat300">
                <?php
                $datas = json_decode($side_adv);
                $adv_data = $datas->data;
                foreach ($adv_data as $adv) {
                    if (!empty($adv)) {

                        if ($adv->adv_option == 'C') {
                            echo $adv->google_code;
                            ?>

                            <?php
                        } else {
                            ?>
                            <a href="<?php echo $adv->image_link; ?>" rel="nofollow noreferrer" target="_blank">
                                <img src="<?php echo $adv->adv_image ?>" />
                            </a>
                            <?php
                        }
                    }
                }
                ?>
            </div>
            <div class="jaherat600">
                <?php
                $datas = json_decode($side_big_adv);
                $adv_data = $datas->data;
                foreach ($adv_data as $adv) {
                    if (!empty($adv)) {

                        if ($adv->adv_option == 'C') {
                            echo $adv->google_code;
                            ?>

                            <?php
                        } else {
                            ?>
                            <a href="<?php echo $adv->image_link; ?>" rel="nofollow noreferrer" target="_blank">
                                <img src="<?php echo $adv->adv_image ?>" />
                            </a>
                            <?php
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>

</div>
<script type="text/javascript">

    var total_song = '<?php echo $video_songe_count . ' Songs'; ?>';
    var total_trailer = '<?php echo $trailer_count . ' Trailer'; ?>';
    var total_poster = '<?php echo $poster_count . ' Poster'; ?>';

    document.getElementById('songs_count').textContent = total_song;
    document.getElementById('trailer_count').textContent = total_trailer;
    document.getElementById('poster_count').textContent = total_poster;


</script>
