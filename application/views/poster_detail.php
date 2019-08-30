<div class="container cf">
    <div class="wrapper-content">
        <div class="wrap-inside">
            <div class="top-jaherat"><div class="block">
                    <?php
                    $video_movie_id = '';
                    $video_cat_id = '';
                    $current_poster_id = '';
                    $subcat_id = '';
                    $total_likes = 0;
                    $total_views = 0;
                    $poster_name = '';
                    $datas = json_decode($head_adv);
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
                </div></div>
            <?php
            $datas = json_decode($poster);
            $trailer_data = $datas->data;
            foreach ($trailer_data as $trailer) {
                if (!empty($trailer)) {
                    $poster_id = $trailer->poster_id;
                    $current_poster_id = $trailer->poster_id;
                    $total_likes = $trailer->total_likes;
                    $total_views = $trailer->total_views;
                    $poster_name = $trailer->poster_name;
                    ?>
                    <div class="vpDetails">
                        <div class="cf">
                            <div class="info">
                                <h1>
                                    <?php echo $trailer->poster_name; ?>
                                    <?php if ($this->session->userdata('admLoggedId')) { ?>
                                        <a target="blank" href="<?php echo base_url('backend/poster/edit?id=' . $poster_id); ?>" class="icon-edit">Edit</a>
                                    <?php } ?>
                                </h1>
                                <p class="meta-info"> <span id="total_views"><?php echo $trailer->total_views; ?> View</span>
                                    <span id="total_likes"><?php echo $trailer->total_likes; ?> likes</span> 
                                    <span><?php echo date('M d, Y', strtotime($trailer->release_date)); ?></span> 
                                    <?php
//                                                                        print_r($trailer->movies[0]->my_release);
                                    $val = $trailer->movies[0]->my_release;
//                                                                        echo $val;
                                    if (!($val == '0000-00-00') && !($val == '')) {
                                        foreach ($trailer->movies as $value) {
                                            //$video_movie_id = $value->movie_id; 
                                            // echo $trailer->my_release;
                                            ?>
                                            <span>Release : <?php echo date('d M Y', strtotime($val)); ?></span>
                                            <?php
                                            break;
                                        }
                                    }
                                    ?>
                            </div>
                            <div class="like">
                                <?php
                                if ($this->session->userdata('front_userdata')) {
                                    $isliked = $controller->getIsLiked($current_poster_id, '3');
                                    // echo $isliked;exit;
                                    if ($isliked == 'yes') {
                                        ?>
                                        <a href="javascript:void(0)" id="liked" class="icon-liked" onclick="setDisLikes()"></a>
                                        <?php
                                    } else {
                                        ?>

                                        <a href="javascript:void(0)" id="likes" class="icon-like" onclick="setLikes()"></a>

                                        <?php
                                    }
                                } else {
                                    ?>
                                    <a href="javascript:void(0)" id="likes" class="icon-like" onclick="showPopup()"></a>
                                    <?php
                                }
                                ?>

                            </div>
                        </div>
                        <ul class="m-list">
                            <?php
                            if (!empty($trailer->poster_cast[0]->cast_name)) {
                                ?>
                                <li class="cf"><label>Cast</label><p>
                                        <?php
                                        foreach ($trailer->poster_cast as $value) {
//                                            $seo_urls = $controller->getSeoUrl($value->seo_url_id);
                                            ?>
                                        <a href="<?php echo base_url().'personality/'.str_replace(" ", "-", str_replace(["(", ")"], "", $value->cast_name)); ?>"><?php echo $value->cast_name ?></a>
                                            <?php
                                        }
                                        ?>

                                    </p></li>
                                <?php
                            }
                            if (!empty($trailer->director[0]->director_name)) {
                                ?>
                                <li class="cf"><label>Director</label><p>
                                        <?php
                                        foreach ($trailer->director as $value) {
//                                            $seo_urls = $controller->getSeoUrl($value->seo_url_id);
                                            ?>
                                            <a href="<?php echo base_url().'personality/'.str_replace(" ", "-", str_replace(["(", ")"], "", $value->director_name)); ?>"><?php echo $value->director_name; ?></a>
                                            <?php
                                        }
                                        ?>
                                    </p></li>
                                <?php
                            }
                            if (!empty($trailer->movies[0]->movie_name)) {
                                ?>
                                <li class="cf"><label>Movie</label><p>
                                        <?php
                                        foreach ($trailer->movies as $value) {
                                            $video_movie_id = $value->movie_id;
                                            $seo_urls = $controller->getSeoUrl($value->seo_url_id);
                                            ?>
                                            <a href="<?php echo $seo_urls; ?>"><?php echo $value->movie_name; ?></a>
                                        <?php } ?>
                                    </p></li>
                            <?php }
                            ?>
                            <li class="cf"><label>Language</label><p>
                                    <?php $subcat_id = $trailer->subcat_id; ?>
                                    <a href="<?php echo base_url('movieposter/' . strtolower($trailer->subcat_name)); ?>"><?php echo $trailer->subcat_name; ?></a>

                                </p></li>
                        </ul>
                        <div class="share-on cf">


                            <a onclick="var left = (screen.width / 2) - (550 / 2),
                                                    top = (screen.height / 2) - (285 / 2);
                                            window.open('https://www.facebook.com/sharer/sharer.php?u=<?php echo $mylink; ?>', 'FB Sharing', 'height=450, width=550, top=' + top + ', left=' + left + ', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0');" href="javascript:void(0)" class="facebook">Share on Facebook</a>
                            <a onClick="var left = (screen.width / 2) - (550 / 2),
                                                    top = (screen.height / 2) - (285 / 2);
                                            window.open('https://twitter.com/share?url=<?php echo $mylink; ?>&text=<?php echo $poster_name; ?> via @ComingTrailerIn', 'Twitter sharing', 'height=285,width=550,resizable,scrollbars,status,top=' + top + ',left=' + left)" 
                               id="twitter" href="javascript:void(0)" id="twitterbutton-example" class="twitter">Share on Twitter</a>
                            <a href="https://plus.google.com/share?url=<?php echo $mylink; ?>" onclick="var left = (screen.width / 2) - (600 / 2),
                                                    top = (screen.height / 2) - (600 / 2);
                                            javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600,top=' + top + ',left=' + left);
                                            return false;" class="google">Share on Google+</a>

                        </div>

                    </div>

                    <div class="posterBlock">                        
                        <?php
                        $images = 1;
                        foreach ($trailer->poster_img as $img) {
                            if (!empty($img->poster_img)) {
                                $count = count($trailer->poster_img);
                                if (($images == 1)) {
                                    ?>
                                    <h2>Poster</h2>
                                    <div class="cf wf-container">
                                        <?php
                                    }
                                    ?>
                                    <div class="image-card wf-box">
                                        <?php if (false) { ?>
                                            <div class="share">
                                                <a href="javascript:void(0)" class="icon-facebook" onclick="sharefbimage('<?php echo $img->poster_img ?>')"><span></span></a>
                                                <a id="twitter_<?php echo $images; ?>" onClick="var left = (screen.width / 2) - (550 / 2),
                                                                                    top = (screen.height / 2) - (285 / 2);
                                                                            window.open('https://twitter.com/share?url=<?php echo $img->poster_img; ?>&text=<?php echo $poster_name; ?> via @ComingTrailerIn', 'Twitter sharing', 'height=285,width=550,resizable,scrollbars,status,top=' + top + ',left=' + left)" href="javascript:void(0)" class="icon-twitter"><span></span></a>


                                                <a href="https://plus.google.com/share?url=<?php echo $img->poster_img ?>" onclick="var left = (screen.width / 2) - (600 / 2),
                                                                                    top = (screen.height / 2) - (600 / 2);
                                                                            javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600,top=' + top + ',left=' + left);
                                                                            return false;" class="icon-google-plus"><span></span></a>

                                                <a href="" class="icon-instagram"><span></span></a>
                                                <a href="javascript:void(0)"
                                                   onClick="var left = (screen.width / 2) - (600 / 2),
                                                                                       top = (screen.height / 2) - (400 / 2);
                                                                               window.open('http://pinterest.com/pin/create/button/?url=<?php echo $img->poster_img ?>&description=<?php echo $poster_name; ?>', 'Pinterest sharing', 'resizable,scrollbars,status,top=' + top + ',left=' + left)" class="icon-pinterest"><span></span></a>
                                            </div>
                                        <?php } ?>
                                        <?php
                                        list($width, $height) = getimagesize(str_replace('285X160-', '', $img->poster_img));
//                            echo "width: " . $width . "<br />";
//                            echo "height: " .  $height;
                                        $size = $width . 'x' . $height;
                                        ?>
                                        <img src="<?php echo base_url() . 'timthumb.php?src=' . str_replace('285X160-', '', $img->poster_img) . '&w=285'; ?>" alt="<?php echo $poster_name; ?>"/>
                                        <?php
                                        $down_img = str_replace('285X160-', '', $img->poster_img);
                                        $down_img = str_replace('http://', '', $down_img);
                                        ?>
                                        <?php if ($this->session->userdata('front_userdata')) { ?>
                                            <div class="content">
                                                <a download="<?php echo $down_img; ?>" href="<?php echo str_replace('285X160-', '', $img->poster_img); ?>" class="download">
                                                    <label>Download</label>
                                                    <span>Size: <?php echo $size; ?></span>
                                                </a>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <?php
                                    if (($count == $images)) {
                                        ?>
                                    </div>
                                    <?php
                                }
                                $images++;
                            }
                        }
                        ?>



                        <?php
                        $images = 1;
                        foreach ($trailer->firstlook_img as $img) {
                            if (!empty($img->poster_img)) {
                                $count = count($trailer->firstlook_img);
                                if (($images == 1)) {
                                    ?>
                                    <h2>First Look & Images</h2>
                                    <div class="cf wf-container1">
                                        <?php
                                    }
                                    ?>                                        
                                    <div class="image-card wf-box">
                                        <?php if (false) { ?>
                                            <div class="share">
                                                <a href="javascript:void(0)" class="icon-facebook" onclick="sharefbimage('<?php echo $img->poster_img ?>')"><span></span></a>
                                                <a id="twitter_<?php echo $images; ?>" onClick="var left = (screen.width / 2) - (550 / 2),
                                                                                    top = (screen.height / 2) - (285 / 2);
                                                                            window.open('https://twitter.com/share?url=<?php echo $img->poster_img; ?>&text=<?php echo $poster_name; ?> via @ComingTrailerIn', 'Twitter sharing', 'height=285,width=550,resizable,scrollbars,status,top=' + top + ',left=' + left)" href="javascript:void(0)" class="icon-twitter"><span></span></a>


                                                <a href="https://plus.google.com/share?url=<?php echo $img->poster_img ?>" onclick="var left = (screen.width / 2) - (600 / 2),
                                                                                    top = (screen.height / 2) - (600 / 2);
                                                                            javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600,top=' + top + ',left=' + left);
                                                                            return false;" class="icon-google-plus"><span></span></a>

                                                <a href="" class="icon-instagram"><span></span></a>
                                                <a href="javascript:void(0)"
                                                   onClick="var left = (screen.width / 2) - (600 / 2),
                                                                                       top = (screen.height / 2) - (400 / 2);
                                                                               window.open('http://pinterest.com/pin/create/button/?url=<?php echo $img->poster_img ?>&description=<?php echo $poster_name; ?>', 'Pinterest sharing', 'resizable,scrollbars,status,top=' + top + ',left=' + left)" class="icon-pinterest"><span></span></a>
                                            </div>
                                        <?php } ?>
                                        <?php
                                        list($width, $height) = getimagesize(str_replace('285X160-', '', $img->poster_img));
//                            echo "width: " . $width . "<br />";
//                            echo "height: " .  $height;
                                        $size = $width . 'x' . $height;
                                        ?>
                                        <img src="<?php echo base_url() . 'timthumb.php?src=' . str_replace('285X160-', '', $img->poster_img) . '&w=285'; ?>" alt="<?php echo $poster_name; ?>"/>
                                        <?php
                                        $down_img = str_replace('285X160-', '', $img->poster_img);
                                        $down_img = str_replace('http://', '', $down_img);
                                        ?>
                                        <?php if ($this->session->userdata('front_userdata')) { ?>
                                            <div class="content">
                                                <a download="<?php echo $down_img; ?>" href="<?php echo str_replace('285X160-', '', $img->poster_img); ?>" class="download">
                                                    <label>Download</label>
                                                    <span>Size: <?php echo $size; ?></span>
                                                </a>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <?php
                                    if (($count == $images)) {
                                        ?>
                                    </div>
                                    <?php
                                }
                                $images++;
                            }
                        }
                        ?>


                        <?php
                        $images = 1;
                        foreach ($trailer->wallpaper_img as $img) {
                            if (strlen($img->poster_img) > 0) {
                                $count = count($trailer->wallpaper_img);
                                if (($images == 1)) {
                                    ?>
                                    <h2>Wallpaper</h2>
                                    <div class="cf wf-container2">
                                        <?php
                                    }
                                    ?>
                                    <div class="image-card wf-box">
                                        <?php if (false) { ?>
                                            <div class="share">
                                                <a href="javascript:void(0)" class="icon-facebook" onclick="sharefbimage('<?php echo $img->poster_img ?>')"><span></span></a>
                                                <a id="twitter_<?php echo $images; ?>" onClick="var left = (screen.width / 2) - (550 / 2),
                                                                                    top = (screen.height / 2) - (285 / 2);
                                                                            window.open('https://twitter.com/share?url=<?php echo $img->poster_img; ?>&text=<?php echo $poster_name; ?> via @ComingTrailerIn', 'Twitter sharing', 'height=285,width=550,resizable,scrollbars,status,top=' + top + ',left=' + left)" href="javascript:void(0)" class="icon-twitter"><span></span></a>


                                                <a href="https://plus.google.com/share?url=<?php echo $img->poster_img ?>" onclick="var left = (screen.width / 2) - (600 / 2),
                                                                                    top = (screen.height / 2) - (600 / 2);
                                                                            javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600,top=' + top + ',left=' + left);
                                                                            return false;" class="icon-google-plus"><span></span></a>

                                                <a href="" class="icon-instagram"><span></span></a>
                                                <a href="javascript:void(0)"
                                                   onClick="var left = (screen.width / 2) - (600 / 2),
                                                                                       top = (screen.height / 2) - (400 / 2);
                                                                               window.open('http://pinterest.com/pin/create/button/?url=<?php echo $img->poster_img ?>&description=<?php echo $poster_name; ?>', 'Pinterest sharing', 'resizable,scrollbars,status,top=' + top + ',left=' + left)" class="icon-pinterest"><span></span></a>
                                            </div>
                                        <?php } ?>
                                        <?php
                                        list($width, $height) = getimagesize(str_replace('285X160-', '', $img->poster_img));
//                            echo "width: " . $width . "<br />";
//                            echo "height: " .  $height;
                                        $size = $width . 'x' . $height;
                                        ?>
                                        <img src="<?php echo base_url() . 'timthumb.php?src=' . str_replace('285X160-', '', $img->poster_img) . '&w=285'; ?>" alt="<?php echo $poster_name; ?>"/>
                                        <?php
                                        $down_img = str_replace('285X160-', '', $img->poster_img);
                                        $down_img = str_replace('http://', '', $down_img);
                                        ?>
                                        <?php if ($this->session->userdata('front_userdata')) { ?>
                                            <div class="content">
                                                <a download="<?php echo $down_img; ?>" href="<?php echo str_replace('285X160-', '', $img->poster_img); ?>" class="download">
                                                    <label>Download</label>
                                                    <span>Size: <?php echo $size; ?></span>
                                                </a>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <?php
                                    if (($count == $images)) {
                                        ?>
                                    </div>
                                    <?php
                                }
                                $images++;
                            }
                        }
                        ?>

                    </div>
                    <span class="imgdisclaimer">Disclaimer: All images are copyright to their respective owners.</span>
                    <?php
                }//$trailer empty
            }
            ?>

            <?php
            if (!empty($video_movie_id)) {
                $songs_data = $controller->getVideoByMovie(1, $video_movie_id, 0);

                $datas = json_decode($songs_data[0]);
                if (!empty($datas)) {
                    ?>
                    <div class="related-wrap">
                        <div class="title_box">
                            <div class="cf"><h2>Trailer</h2></div>
                        </div>
                        <ul class="grid-item cf">
                            <?php
                            if (!empty($video_movie_id)) {
                                // $songs_data = $controller->getVideoByMovie(1,$video_movie_id,0);
                                foreach ($songs_data as $songs) {
                                    $datas = json_decode($songs);
                                    if (!empty($datas)) {
                                        $trailer_data = $datas->data;
                                        foreach ($trailer_data as $trailer) {
                                            if (!empty($trailer)) {
                                                $video_id = $trailer->video_id;
                                                $seo_urls = $controller->getSeoUrl($trailer->seo_url_id);
                                                //echo $video_id;
                                                ?>

                                                <li class="item">
                                                    <!--					<div class="ct-box">
                                                                                                    <div class="ct-thumbnail"><a href="" class="play"></a> <a href=""><img src="images/video-thumbnail.jpg" alt="title name here" /></a></div>
                                                                                                    <div class="ct-content"><h3><a href="#">Jolly LLB 2</a></h3> <p class="meta-info"> <span>395k playing</span><span>222 likes</span> </p></div>
                                                                                            </div>-->
                                                    <div class="ct-box">
                                                        <div class="ct-thumbnail"><a href="<?php echo $seo_urls; ?>" class="play"></a> 
                                                            <a href="<?php echo $seo_urls; ?>">
                                                                <?php
                                                                $filename = $trailer->video_thumb;                                                                
                                                                if (file_exists(str_replace(base_url(), './', $filename))) {
                                                                    ?>
                                                                    <img src="<?php echo base_url() . 'timthumb.php?src=' . $trailer->video_thumb . '&w=285&h=160'; ?>" alt="<?php echo $trailer->video_name; ?>"/>
                                                                <?php } else {
                                                                    ?>
                                                                    <img src="<?php echo base_url('resources/images/no-image.svg'); ?>" alt="<?php echo $trailer->video_name; ?>"/>
                                                                <?php }
                                                                ?>
                                                            </a>
                                                        </div>
                                                        <div class="ct-content"><h3><a href="<?php echo $seo_urls; ?>"><?php echo $trailer->video_name; ?></a></h3> 
                                                            <p class="meta-info"> <span><?php echo $trailer->total_play; ?> playing</span><span><?php echo $trailer->total_likes; ?> likes</span> </p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <?php
                                            }
                                        }
                                    }
                                }
                            }
                            ?>

                        </ul>
                    </div>
                    <?php
                }
            }

            if (!empty($video_movie_id)) {
                $songs_data = $controller->getVideoByMovie(2, $video_movie_id, 0);

                $datas = json_decode($songs_data[0]);
                if (!empty($datas)) {
                    ?>

                    <div class="related-wrap">
                        <div class="title_box">
                            <div class="cf"><h2>Songs</h2></div>
                        </div>
                        <ul class="grid-item cf">
                            <?php
                            if (!empty($video_movie_id)) {
//                                $songs_data = $controller->getVideoByMovie(2,$video_movie_id,0);
                                foreach ($songs_data as $songs) {
                                    $datas = json_decode($songs);
                                    if (!empty($datas)) {
                                        $trailer_data = $datas->data;
                                        foreach ($trailer_data as $trailer) {
                                            if (!empty($trailer)) {
                                                $video_id = $trailer->video_id;
                                                $seo_urls = $controller->getSeoUrl($trailer->seo_url_id);
                                                //echo $video_id;
                                                ?>

                                                <li class="item">
                                                    <!--					<div class="ct-box">
                                                                                                    <div class="ct-thumbnail"><a href="" class="play"></a> <a href=""><img src="images/video-thumbnail.jpg" alt="title name here" /></a></div>
                                                                                                    <div class="ct-content"><h3><a href="#">Jolly LLB 2</a></h3> <p class="meta-info"> <span>395k playing</span><span>222 likes</span> </p></div>
                                                                                            </div>-->
                                                    <div class="ct-box">
                                                        <div class="ct-thumbnail"><a href="<?php echo $seo_urls; ?>" class="play"></a>  
                                                            <a href="<?php echo $seo_urls; ?>">
                                                                <?php
                                                                $filename = $trailer->video_thumb;                                                                
                                                                if (file_exists(str_replace(base_url(), './', $filename))) {
                                                                    ?>
                                                                    <img src="<?php echo base_url() . 'timthumb.php?src=' . $trailer->video_thumb . '&w=285&h=160'; ?>" alt="<?php echo $trailer->video_name; ?>" />
                                                                <?php } else {
                                                                    ?>
                                                                    <img src="<?php echo base_url('resources/images/no-image.svg'); ?>" alt="<?php echo $trailer->video_name; ?>"/>
                                                                <?php }
                                                                ?>
                                                            </a>
                                                        </div>
                                                        <div class="ct-content"><h3><a href="<?php echo $seo_urls; ?>"><?php echo $trailer->video_name; ?></a></h3> 
                                                            <p class="meta-info"> <span><?php echo $trailer->total_play; ?> playing</span><span><?php echo $trailer->total_likes; ?> likes</span> </p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <?php
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                        </ul>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>

    <div class="wrapper-sidebar">
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
            </div></div>
        <div class="grid-item">
            <h2>Related Poster</h2>
            <ul>
                <?php
                $related_poster = $controller->getRelatedPoster($current_poster_id, $subcat_id);
                foreach ($related_poster as $key => $value) {

                    $seo_urls = $controller->getSeoUrl($value->seo_url_id);
                    ?>
                    <li class="item all poster">
                        <div class="ct-box cf">
                            <div class="ct-thumbnail">
                                <a href="<?php echo $seo_urls; ?>" class="zoom"></a>
                                <a href="<?php echo $seo_urls; ?>">
                                    <?php
                                    $filename = base_url() . 'timthumb.php?src=' . base_url() . 'images/poster/' . $value->poster_image . '&w=285&h=160';
                                    if (@getimagesize($filename)) {
                                        ?>
                                        <img src="<?php echo base_url() . 'timthumb.php?src=' . base_url() . 'images/poster/' . $value->poster_image . '&w=285&h=160'; ?>" alt="<?php echo $value->poster_name; ?>" width="100" height="56" />
                                    <?php } else {
                                        ?>
                                        <img src="<?php echo base_url('resources/images/no-image.svg'); ?>" alt="<?php echo $value->poster_name; ?>" width="100" height="56"/>
                                    <?php }
                                    ?>
                                </a>
                            </div>
                            <div class="ct-content">
                                <h3>
                                    <a href="<?php echo $seo_urls; ?>"><?php echo $value->poster_name; ?></a>
                                </h3>
                                <p class="meta-info"> 
                                    <span><?php echo $value->views; ?> views</span>
                                    <span><?php echo $value->likes; ?> likes</span> 
                                </p>
                            </div>
                        </div>
                    </li>
                    <?php
                }
                ?>

            </ul>

        </div>

    </div>


</div>



<script>

    var cat_id = '<?php echo '3'; ?>';
    var video_id = '<?php echo '' . $current_poster_id; ?>';
    
    function setViewTotal() {

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('PosterDetail/setPosterView'); ?>',
            data: 'cat_id=' + cat_id + '&video_id=' + video_id,
            success: function (html) {
                // alert(html);
                var views = parseInt('<?php echo $total_views; ?>') + 1;
                //document.getElementById("total_views").textContent = views + ' View';

            }
        });


    }

    function setDisLikes() {

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('PosterDetail/setDisLike'); ?>',
            data: 'cat_id=' + cat_id + '&video_id=' + video_id,
            success: function (html) {
                //alert(html);
                total_likes = (parseInt(total_likes) - 1);
                var likes = total_likes;

                document.getElementById("total_likes").textContent = likes + ' Likes';

                document.getElementById("liked").className = "icon-like";

                document.getElementById('liked').setAttribute("onClick", "setLikes()");

                document.getElementById('liked').setAttribute("id", "likes");
            }
        });

    }
    var total_likes = '<?php echo $total_likes; ?>';
    function setLikes() {

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('PosterDetail/setLike'); ?>',
            data: 'cat_id=' + cat_id + '&video_id=' + video_id,
            success: function (html) {
                //alert(html);
                total_likes = (parseInt(total_likes) + 1);
                var likes = total_likes;

                document.getElementById("total_likes").textContent = likes + ' Likes';

                document.getElementById("likes").className = "icon-liked";

                document.getElementById('likes').setAttribute("onClick", "setDisLikes()");

                document.getElementById('likes').setAttribute("id", "liked");
            }
        });


    }
    setViewTotal();


    function sharefbimage(image_url) {
//    alert($(location).attr('href'));
        FB.init({appId: '157848711413331', status: true, cookie: true, version: 'v2.8'});
        FB.ui(
                {
                    method: `share`,
                            name: 'Facebook Dialogs',
                    href: '' + $(location).attr('href'),
                    link: '<?php echo $mylink; ?>',
                    picture: '' + image_url,
                    caption: escape("<?php echo $poster_name ?>"),
                    description: ''
                },
        function (response) {
            if (response && response.post_id) {
//                      alert('success');
                setSharePoints('Facebook');
            } else {
//                     alert('error');
            }
        }
        );
    }

    function sharefbtext() {

        FB.init({appId: '157848711413331', status: true, cookie: true, version: 'v2.8'});
        FB.ui(
                {
                    method: 'feed',
                    link: '<?php echo $mylink; ?>',
                    caption: '<?php echo $mylink; ?>'
                },
        function (response) {
            if (response && response.post_id) {
                //alert('success');

            } else {
                // alert('error');
                setSharePoints('Facebook');
            }
        }
        );
    }

    function setSharePoints(share_with) {

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('PosterDetail/setShare'); ?>',
            data: 'cat_id=' + cat_id + '&video_id=' + video_id + '&share_with=' + share_with,
            success: function (html) {
//                    alert(html);

//                   var likes = parseInt('<?php echo $total_likes; ?>') + 1;
//                    
//                    document.getElementById("total_likes").textContent = likes + ' Likes';
//                    
//                    document.getElementById("likes").className = "icon-liked";
            }
        });


    }

</script>
<script>
    $(document).ready(function () {
        var isMobile = $(window).width();
        if (isMobile < 768) {
            $(".image-card img").each(function () {
                var url = new URL(this.src);
                this.src = url.searchParams.get('src');
            });
        }
    });
</script>
<script src="<?php echo base_url() ?>assets/js/responsive_waterfall.js"></script>
<script src="<?php echo base_url() ?>assets/js/water_fall_setting.js"></script>