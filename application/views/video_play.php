<div class="container cf">
    <div class="wrapper-content">
        <div class="wrap-inside">
            <!--<div class="top-jaherat"><div class="block">
            <?php
            $video_movie_id = '';
            $video_cat_id = '';
            $current_video_id = '';
            $subcat_id = 0;
            $total_likes = 0;
            $total_play = 0;
            $datas = json_decode($head_adv);
            $adv_data = $datas->data;
            foreach ($adv_data as $adv) {
                if (!empty($adv)) {
                    if ($adv->adv_option == 'C') {
                        echo $adv->google_code;
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
            </div>-->
            <?php
            $datas = json_decode($trailer);
            $trailer_data = $datas->data;
            foreach ($trailer_data as $trailer) {
                if (!empty($trailer)) {
                    $video_id = $trailer->video_id;
                    $current_video_id = $trailer->video_id;
                    $video_cat_id = $trailer->cat_id;
                    $total_likes = $trailer->total_likes;
//                        echo $total_likes;exit;
                    $total_play = $trailer->total_play;
                    ?>
                    <div class="videoBlock">
                        <div class="videoPlayerContainer">
                            <?php
                            $url = $trailer->video_url;
                            if (strpos($trailer->video_url, 'youtu.be') !== false) {
                                $step1 = explode('be/', $url);
                                $vedio_id = $step1[1];
//                                    echo $vedio_id;exit;
                            } else {

                                $step1 = explode('v=', $url);
                                $step2 = explode('&', $step1[1]);
                                $vedio_id = $step2[0];
                            }
                            ?>
                            <iframe id="player" width="560" height="315" src="https://www.youtube.com/embed/<?php echo $vedio_id; ?>?autoplay=1&enablejsapi=1&modestbranding=1;rel=0&amp;showinfo=0;" allowfullscreen="1" allow="autoplay; encrypted-media" title="YouTube video player"></iframe>
                        </div>
                    </div>
                    <div class="vpDetails">
                        <div class="cf">
                            <div class="info">
                                <h1>
                                    <?php echo $trailer->video_name ?>
                                    <?php if ($this->session->userdata('admLoggedId')) { ?>
                                        <a href="<?php echo base_url('backend/video/edit?id=' . $video_id); ?>" class="icon-edit" target="blank">Edit</a>
                                    <?php } ?>
                                </h1>
                                <p class="meta-info"> 
                                    <span id="total_play"><?php echo $trailer->total_play ?> playing</span>
                                    <span id="total_likes"><?php echo $trailer->total_likes ?> likes</span>
                                    <span><?php echo date('M d, Y', strtotime($trailer->release_date)); ?></span>
                                    <?php
                                    if (!($trailer->movies[0]->my_release == '0000-00-00') && !($trailer->movies[0]->my_release == '')) {

                                        foreach ($trailer->movies as $value) {
                                            $video_movie_id = $value->movie_id;
                                            ?>
                                            <span>Release : <?php echo date('d M Y', strtotime($value->my_release)); ?></span>
                                            <?php
                                        }
                                    }
                                    ?>
                                </p>
                            </div>
                            <div class="like">
                                <?php
                                if ($this->session->userdata('front_userdata')) {
                                    $isliked = $controller->getIsLiked($current_video_id, $video_cat_id);
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

                                    <a href="javascript:void(0)" id="" class="icon-like" onclick="showPopup()"></a>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <ul class="m-list">
                            <?php
//                                    print_r($trailer->Music[0]->music_id);
                            if (!empty($trailer->video_cast[0]->cast_name)) {
                                ?>
                                <li class="cf">

                                    <label>Cast</label>
                                    <p>
                                        <?php
                                        foreach ($trailer->video_cast as $value) {
//                                            $seo_urls = $controller->getSeoUrl($value->seo_url_id);
                                            ?>
                                        <a href="<?php echo base_url()."personality/".str_replace(" ", "-", str_replace(["(", ")"], "", $value->cast_name)); ?>"><?php echo $value->cast_name ?></a> 
                                            <?php
                                        }
                                        ?>  
                                    </p>

                                </li>
                            <?php } ?>
                            <?php
//                                    print_r($trailer->Music[0]->music_id);
                            if (!empty($trailer->Director[0]->director_name)) {
                                ?>
                                <li class="cf"><label>Director</label>
                                    <p>
                                        <?php
                                        foreach ($trailer->Director as $value) {
//                                            $seo_urls = $controller->getSeoUrl($value->seo_url_id);
                                            ?>
                                            <a href="<?php echo base_url()."personality/".str_replace(" ", "-", str_replace(["(", ")"], "", $value->director_name)); ?>"><?php echo $value->director_name; ?></a>
                                            <?php
                                        }
                                        ?>
                                    </p>
                                </li>
                            <?php } ?>
                            <?php
//                                    print_r($trailer->Music[0]->music_id);
                            if (!empty($trailer->singer[0]->singer_name)) {
                                ?>
                                <li class="cf"><label>Singer</label>
                                    <p>
                                        <?php
                                        foreach ($trailer->singer as $value) {
//                                            $seo_urls = $controller->getSeoUrl($value->seo_url_id);
                                            ?>
                                            <a href="<?php echo base_url()."personality/".str_replace(" ", "-", str_replace(["(", ")"], "", $value->singer_name)); ?>"><?php echo $value->singer_name; ?></a>
                                            <?php
                                        }
                                        ?>
                                    </p>
                                </li>
                                <?php
                            }
//                                    print_r($trailer->Music[0]->music_id);
                            if (!empty($trailer->Music[0]->music_name)) {
                                ?>
                                <li class="cf">

                                    <label>Music By</label>
                                    <p>
                                        <?php
                                        foreach ($trailer->Music as $value) {
//                                            $seo_urls = $controller->getSeoUrl($value->seo_url_id);
                                            ?>
                                            <a href="<?php echo base_url()."personality/".str_replace(" ", "-", str_replace(["(", ")"], "", $value->music_name)); ?>"><?php echo $value->music_name; ?></a>
                                            <?php
                                        }
                                        ?>
                                        <!--<a href="">Meet Bros</a> <a href="">Chirantan Bhatt</a>-->
                                    </p>
                                </li>
                            <?php } ?>
                            <?php
//                                    print_r($trailer->Music[0]->music_id);
                            if (!empty($trailer->movies[0]->movie_name)) {
                                ?>
                                <li class="cf">
                                    <label>Movie</label>
                                    <p>
                                        <?php
                                        foreach ($trailer->movies as $value) {
                                            $video_movie_id = $value->movie_id;
                                            $seo_urls = $controller->getSeoUrl($value->seo_url_id);
                                            ?>
                                            <a href="<?php echo $seo_urls; ?>"><?php echo $value->movie_name; ?></a>
                                            <?php
                                        }
                                        ?>
                                    </p>
                                </li>
                            <?php } ?>
                            <li class="cf">
                                <label>Language</label>
                                <p>
                                    <?php
                                    $subcat_id = $trailer->subcat_id;
                                    if ($cat_id == 1) {
                                        ?>
                                        <a href="<?php echo base_url('movietrailer/' . strtolower($trailer->subcat_name)); ?>"><?php echo $trailer->subcat_name; ?></a>
                                        <?php
                                    } else {
                                        ?>

                                        <a href="<?php echo base_url('videosong/' . strtolower($trailer->subcat_name)); ?>"><?php echo $trailer->subcat_name; ?></a>
                                        <?php
                                    }
                                    ?>
                                </p>
                            </li>
                            <?php
//                                    print_r($trailer->Music[0]->music_id);
                            if (!empty($trailer->releasedBy[0]->rel_by_name)) {
                                ?>
                                <li class="cf">
                                    <label>&COPY;</label>
                                    <p>
                                        <?php
                                        foreach ($trailer->releasedBy as $value) {
                                            $video_rel_id = $value->rel_by_id;
                                            $seo_urls = $controller->getSeoUrl($value->seo_url_id);
                                            ?>
                                            <a href="<?php echo $seo_urls; ?>"><?php echo $value->rel_by_name; ?></a>
                                            <?php
                                        }
                                        ?>
                                    </p>
                                </li>
                            <?php } ?>

                        </ul>

                        <?php echo $item_prop; ?>

                        <div class="share-on cf">
                            <a onclick="var left = (screen.width / 2) - (550 / 2),
                                            top = (screen.height / 2) - (285 / 2);
                                    window.open('https://www.facebook.com/sharer/sharer.php?u=<?php echo $mylink; ?>', 'FB Sharing', 'height=450, width=550, top=' + top + ', left=' + left + ', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0');" href="javascript:void(0)" class="facebook">Share on Facebook</a>
                            <a onClick="var left = (screen.width / 2) - (550 / 2),
                                            top = (screen.height / 2) - (285 / 2);
                                    window.open('https://twitter.com/share?url=<?php echo $mylink; ?>&text=<?php echo $trailer->video_name ?> via @ComingTrailerIn', 'Twitter sharing', 'height=285,width=550,resizable,scrollbars,status,top=' + top + ',left=' + left)"  href="javascript:void(0)" class="twitter">Share on Twitter</a>

                            <a href="https://plus.google.com/share?url=<?php echo $mylink; ?>" onclick="var left = (screen.width / 2) - (600 / 2),
                                            top = (screen.height / 2) - (600 / 2);
                                    javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600,top=' + top + ',left=' + left);
                                    return false;" class="google">Share on Google+</a>

                        </div>
                    </div>
                    <?php
                }
            }
            ?>

            <?php
//                echo $video_movie_id;
            if (!empty($video_movie_id)) {//$video_cat_id
                $songs_data = $controller->getVideoByMovie(1, $video_movie_id, $video_id);
//                                    print_r($songs_data);exit;
                $datas = json_decode($songs_data[0]);
//                            echo print_r($datas->data);
                if (!empty($datas->data[0]->video_name)) {
                    ?>

                    <div class="related-wrap">
                        <div class="title_box">
                            <div class="cf"><h2>Trailer</h2></div>
                        </div>
                        <ul class="grid-item cf">
                            <?php
                            if (!empty($video_movie_id)) {
                                //$songs_data = $controller->getVideoByMovie($video_cat_id,$video_movie_id,$video_id);
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
                                                    <div class="ct-box">
                                                        <div class="ct-thumbnail"><a href="<?php echo $seo_urls; ?>" class="play"></a> 
                                                            <a href="<?php echo $seo_urls; ?>">
                                                                <?php
                                                                $filename = $trailer->video_thumb;
                                                                if (file_exists(str_replace(base_url(), "./", $filename))) {
                                                                    ?>
                                                                    <img src="<?php echo base_url() . "timthumb.php?src=" . $trailer->video_thumb . "&w=285&h=160"; ?>" alt="<?php echo $trailer->video_name; ?>" />
                                                                <?php } else {
                                                                    ?>
                                                                    <img src="<?php echo base_url('resources/images/no-image.svg'); ?>" alt="<?php echo $trailer->video_name; ?>" />
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



            <?php
//                echo $video_movie_id;
            if (!empty($video_movie_id)) {//$video_cat_id
                $songs_data = $controller->getVideoByMovie(2, $video_movie_id, $video_id);
//                                    print_r($songs_data);exit;
                $datas = json_decode($songs_data[0]);
//                            echo print_r($datas->data);
                if (!empty($datas->data[0]->video_name)) {
                    ?>

                    <div class="related-wrap">
                        <div class="title_box">
                            <div class="cf"><h2>Songs</h2></div>
                        </div>
                        <ul class="grid-item cf">
                            <?php
                            if (!empty($video_movie_id)) {
                                //$songs_data = $controller->getVideoByMovie($video_cat_id,$video_movie_id,$video_id);
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
                                                    <div class="ct-box">
                                                        <div class="ct-thumbnail"><a href="<?php echo $seo_urls; ?>" class="play"></a> 
                                                            <a href="<?php echo $seo_urls; ?>">
                                                                <?php
                                                                $filename = $trailer->video_thumb;
                                                                if (file_exists(str_replace(base_url(), "./", $filename))) {
                                                                    ?>
                                                                    <img src="<?php echo base_url() . "timthumb.php?src=" . $trailer->video_thumb . "&w=285&h=160"; ?>" alt="<?php echo $trailer->video_name; ?>" />
                                                                <?php } else {
                                                                    ?>
                                                                    <img src="<?php echo base_url('resources/images/no-image.svg'); ?>" alt="<?php echo $trailer->video_name; ?>" />
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

            <?php
            if (!empty($video_movie_id)) {
                $songs_data = $controller->getPosterByMovie($video_cat_id, $video_movie_id);

                $datas = json_decode($songs_data[0]);
//                            echo print_r($datas);exit;
                if (!empty($datas->data[0]->poster_name)) {
                    ?>
                    <div class="related-wrap">
                        <div class="title_box">
                            <div class="cf"><h2>Poster</h2></div>
                        </div>
                        <ul class="grid-item cf">
                            <?php
                            if (!empty($video_movie_id)) {
                                // $songs_data = $controller->getPosterByMovie($video_cat_id,$video_movie_id);
                                foreach ($songs_data as $songs) {
                                    $datas = json_decode($songs);
                                    if (!empty($datas)) {
                                        $trailer_data = $datas->data;
                                        foreach ($trailer_data as $trailer) {
                                            if (!empty($trailer)) {
                                                $poster_id = $trailer->poster_id;
                                                $seo_urls = $controller->getSeoUrl($trailer->seo_url_id);
                                                //echo $video_id;
                                                ?>
                                                <li class="item">
                                                    <div class="ct-box">
                                                        <div class="ct-thumbnail">
                                                            <a href="">
                                                                <?php
                                                                foreach ($trailer->poster_img1 as $img) {
                                                                    ?>
                                                                    <a href="<?php echo $seo_urls; ?>" class="zoom"></a> 
                                                                    <a href="<?php echo $seo_urls; ?>">
                                                                        <?php
                                                                        $filename = $img->poster_img;
                                                                        if (@getimagesize($filename)) {
                                                                            ?>

                                                                            <img src="<?php echo $img->poster_img ?>" alt="<?php echo $trailer->poster_name; ?>" />
                                                                        <?php } else {
                                                                            ?>
                                                                            <img src="<?php echo base_url('resources/images/no-image.svg'); ?>" alt="<?php echo $trailer->poster_name; ?>" />
                                                                        <?php }
                                                                        ?>
                                                                    </a>
                                                                    <?php
                                                                    break;
                                                                }
                                                                ?>
                                                            </a>
                                                        </div>
                                                        <div class="ct-content"><h3><a href="<?php echo $seo_urls; ?>">
                                                                    <?php echo $trailer->poster_name; ?></a></h3> 
                                                            <p class="meta-info"> 
                                                                <span><?php echo $trailer->total_views; ?> views</span>

                                                                <span><?php echo $trailer->total_likes; ?> likes</span> 
                                                            </p>
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
        <!--<div class="sidebar-jaherat">
            <div class="jaherat300">
        <?php
        $datas = json_decode($side_adv);
        $adv_data = $datas->data;
        foreach ($adv_data as $adv) {
            if (!empty($adv)) {
                if ($adv->adv_option == 'C') {
                    echo $adv->google_code;
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
        </div>-->
        <div class="grid-item">
            <?php
            if ($cat_id == 1) {
                ?>

                <h2>Related Trailer</h2>
                <?php
            } else {
                ?>
                <h2>Related Video Songs</h2>
            <?php } ?>
            <ul>
                <?php
                //print_r($video_week_trend);
                $related_video = $controller->getRelatedVideo($video_id, $cat_id, $subcat_id);
                foreach ($related_video as $key => $val) {
                    $seo_urls = $controller->getSeoUrl($val->seo_url_id);
                    ?>
                    <li class="item">
                        <div class="ct-box cf">
                            <div class="ct-thumbnail">
                                <a href="<?php echo $seo_urls; ?>" class="play"></a> 
                                <a href="<?php echo $seo_urls; ?>">
                                    <?php
                                    $filename = './images/videothumb/' . $val->video_thumb;
                                    if (file_exists($filename)) {
                                        ?>
                                        <img src="<?php echo base_url() . "timthumb.php?src=" . base_url('images/videothumb/' . $val->video_thumb) . "&w=285&h=160"; ?>" alt="<?php echo $val->video_name; ?>" width="100" height="56" />
                                    <?php } else {
                                        ?>
                                        <img src="<?php echo base_url('resources/images/no-image.svg'); ?>" alt="<?php echo $val->video_name; ?>" width="100" height="56"/>
                                    <?php }
                                    ?>
                                </a>
                            </div>
                            <div class="ct-content">
                                <h3>
                                    <a href="<?php echo $seo_urls; ?>">
                                        <?php echo $val->video_name; ?>
                                    </a>
                                </h3> 
                                <p class="meta-info"> 
                                    <span><?php echo $val->play; ?> playing</span>
                                    <span><?php echo $val->liked; ?> likes</span> 
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

<script src="//cdn.optimizely.com/js/21882493.js"></script>
<script>

                        /* _optimizely_evaluate=force */
//this is a boilerplate set of calls to append a new script to your head tag
                        var head = document.getElementsByTagName('head')[0];
                        var script = document.createElement('script');
                        script.type = 'text/javascript';
                        script.src = "https://www.youtube.com/iframe_api";
                        head.appendChild(script);
                        /**
                         * iFrame API (for iframe videos)
                         * onYouTubeIframeAPIReady is called for each player when it is ready
                         */
                        ytplayer = document.getElementById("player");
                        window.onYouTubeIframeAPIReady = function () {

                            $('#player').each(function () {
                                var iframe = optimizely.$(this);
                                // get the player(s)
                                player = new YT.Player(iframe[0], {
                                    events: {
                                        'onReady': function (e) {
                                            console.log('YouTube player \'' + iframe.attr('id') + '\': ready');
                                            e.target._donecheck = true;
                                        },
                                        'onStateChange': function (e) {
                                            onStateChange(iframe.attr('id'), e);
                                        }
                                    }
                                });
                            });
                        };

//execute the API calls for play, pause, and finish
                        window.onStateChange = function (playerid, state) {
                            if (state.data === 0) {
                                onFinish(playerid);
                            } else if (state.data === 1) {
                                onPlay(playerid);
                            } else if (state.data === 2) {
                                onPause(playerid);
                            }
                        };

//for each of the above three states, make a custom event API call to Optimizely
                        window.onPause = function (id) {
//    var time = ytplayer.getCurrentTime();
//    var timedu = ytplayer.getduration();
                            console.log('YouTube player \'' + id + '\': pause');
                            window['optimizely'] = window['optimizely'] || [];
                            window.optimizely.push(["trackEvent", id + "Pause"]);
                        };

                        window.onFinish = function (id) {
                            console.log('YouTube player \'' + id + '\': finish');
                            window['optimizely'] = window['optimizely'] || [];
                            window.optimizely.push(["trackEvent", id + "Finish"]);
                        };

                        window.onPlay = function (id) {
//    ytplayer = document.getElementById(""+id);
//    var time = ytplayer.getCurrentTime();
//    var timedu = ytplayer.getduration();

                            console.log('YouTube player \'' + id + '\': play');
                            window['optimizely'] = window['optimizely'] || [];
                            window.optimizely.push(["trackEvent", id + "Play"]);
                        };
                        /* _optimizely_evaluate=safe */

//console.log(player);
                        var player;  // Reference to global player object.

// call the function every 1 second.
                        setInterval(displTime, 1000);  // PUT THIS STATEMENT JUST AFTER THE PLAYER HAS BEEN CREATED. 
                        var call = 0;
                        function displTime() {
//if (! player)
                            //alert("NO player object !");  // Check if player has been set. 
// player.getCurrentTime() or player.getDuration()
                            var mind = player.getCurrentTime();   // returns elapsed time in seconds 
                            var m = Math.floor(mind / 60);
                            var secd = mind % 60;
                            var s = Math.ceil(secd);
//$("#pt").html(m + ":" + s);  // Using the JQUERY library to write to body

                            console.log('YouTube player \'' + m + ":" + s);

                            if (parseInt(s) === 45) {
                                if (call === 0) {
                                    //alert('done');
                                    setPlayTotal();
                                    call = 1;
                                }
                            }

                        }
                        var cat_id = '<?php echo '' . $video_cat_id; ?>';
                        var video_id = '<?php echo '' . $current_video_id; ?>';
                        function setViewTotal() {

                            /*$.ajax({
                                type: 'POST',
                                url: '<?php echo base_url('VideoDetail/setVideoView'); ?>',
                                data: 'cat_id=' + cat_id + '&video_id=' + video_id,
                                success: function (html) {
                                    //alert(html);

                                    var play = parseInt('<?php echo $total_play; ?>') + 1;

                                    document.getElementById("total_play").textContent = play + ' playing';
                                }
                            });*/


                        }
                        //setViewTotal();
                        function setPlayTotal() {

                            /*$.ajax({
                                type: 'POST',
                                url: '<?php echo base_url('VideoDetail/setVideoPlay'); ?>',
                                data: 'cat_id=' + cat_id + '&video_id=' + video_id,
                                success: function (html) {
                                    //alert(html);

//                   var play = parseInt('<?php echo $total_play; ?>') + 1;
//                    
//                    document.getElementById("total_play").textContent = play + ' playing';
                                }
                            });
*/

                        }

                        function setDisLikes() {

                            $.ajax({
                                type: 'POST',
                                url: '<?php echo base_url('VideoDetail/setDisLike'); ?>',
                                data: 'cat_id=' + cat_id + '&video_id=' + video_id,
                                success: function (html) {
                                    //alert(html);
//alert('<?php echo $total_likes; ?>');
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
                                url: '<?php echo base_url('VideoDetail/setLike'); ?>',
                                data: 'cat_id=' + cat_id + '&video_id=' + video_id,
                                success: function (html) {
//                    alert('<?php echo $total_likes; ?>');
                                    total_likes = (parseInt(total_likes) + 1);
                                    var likes = total_likes;

                                    document.getElementById("total_likes").textContent = likes + ' Likes';

                                    document.getElementById("likes").className = "icon-liked";

                                    document.getElementById('likes').setAttribute("onClick", "setDisLikes()");

                                    document.getElementById('likes').setAttribute("id", "liked");
                                }
                            });


                        }

                        function sharefbtext(image_url) {

                            FB.init({appId: '157848711413331', status: true, cookie: true, version: 'v2.8'});
                            FB.ui(
                                    {
                                        method: 'feed',
                                        href: '' + $(location).attr('href'),
                                        link: '<?php echo $mylink; ?>',
                                        picture: '' + image_url,
                                        caption: '<?php echo $mylink; ?>'
                                    },
                            function (response) {
                                if (response && response.post_id) {
                                    //alert('success');

                                } else {
                                    //alert('error');
                                    setSharePoints('Facebook');
                                }
                            }
                            );
                        }

                        function setSharePoints(share_with) {

                            $.ajax({
                                type: 'POST',
                                url: '<?php echo base_url('VideoDetail/setShare'); ?>',
                                data: 'cat_id=' + cat_id + '&video_id=' + video_id + '&share_with=' + share_with,
                                success: function (html) {
                                    //alert(html);

//                   var likes = parseInt('<?php echo $total_likes; ?>') + 1;
//                    
//                    document.getElementById("total_likes").textContent = likes + ' Likes';
//                    
//                    document.getElementById("likes").className = "icon-liked";
                                }
                            });


                        }



</script>