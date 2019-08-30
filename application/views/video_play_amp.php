<!DOCTYPE html>
<html amp>
    <head>
        <meta charset="utf-8">
        <title><?php echo $title; ?></title>
        <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no,minimal-ui">
        <link rel="canonical" href="<?php echo $mylink; ?>" />
        <link rel="icon" type="image/ico" href="<?php echo base_url() ?>/resources/images/favicon.png" />
        <meta name="news_keywords" content="<?php echo $keywords; ?>" />
        <script async src="https://cdn.ampproject.org/v0.js"></script>
        <script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script>
        <script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
        <script async custom-element="amp-ad" src="https://cdn.ampproject.org/v0/amp-ad-0.1.js"></script>
        <script async custom-element="amp-youtube" src="https://cdn.ampproject.org/v0/amp-youtube-0.1.js"></script>
        <link rel="amphtml" href="<?php echo $mylink; ?>/amp">
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
        <script type="application/ld+json">
            {
            "@context": "http://schema.org",
            "@type": "NewsArticle",
            "mainEntityOfPage": {
            "@type": "WebPage",
            "@id": "<?php echo $mylink; ?>/amp"
            },
            "headline": "<?php echo $title; ?>",
            <?php echo $image; ?>
            "datePublished": "<?php
            $created = new DateTime($datePublished, new DateTimeZone('asia/kolkata'));
            echo $created->format('Y-m-d\TH:i:sP');
            ?>",			 
            "dateModified": "<?php
            $updated = new DateTime($dateModified, new DateTimeZone('asia/kolkata'));
            echo ($dateModified != 'Nov 30, -0001 00:00:00') ? $updated->format('Y-m-d\TH:i:sP') : $created->format('Y-m-d\TH:i:sP');
            ?>",                        
            "author": {
            "@type": "Organization",
            "name": "COMINGTRAILER.COM"
            },
            "publisher": {
            "@type": "Organization",
            "name": "Coming Trailer",
            "logo": {
            "@type": "ImageObject",
            "url": "<?php echo base_url() ?>resources/images/logo.svg",
            "width": 800,
            "height": 156
            }
            },
            "description": "<?php echo $desc; ?>"
            }
        </script>
        <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>

        <style amp-custom>
            body{background:#e9e9e9; font-family: 'Roboto', Arial, Helvetica, sans-serif;}
            .cf:before, .cf:after { content: ""; display: table; }
            .cf:after { clear: both; }
            a{text-decoration: none; margin:0; padding:0; display: inline-block;}
            img{margin:0; padding:0; max-width: 100%; display: block;}
            .wrapper-content{max-width:1024px; min-width: 320px; margin: auto;}
            #header{background:#fff; padding:10px; text-align: center; box-shadow:0 3px 5px 1px rgba(0, 0, 0, 0.10); z-index:3;}
            #header a{display: inline-block;}
            #header .m-googleplay{ float: right; font-size:13px; color: #fff; font-weight:700; background:#f68a1e; border-radius:50px; padding:5px 10px; margin:3px 0 0 0;}
            #header .m-googleplay:hover{background:#ff9f33;}
            .menu-btn {display: block; background: #FFF; cursor:pointer; border: none; float: left;  padding:6px 5px 4px;}
            .menu-btn span { display: block; height:3px; background: #7d7d7d; width:30px;	margin-bottom:5px;	border-radius:5px;}
            .menu-btn.close {	padding:14px 0; font-size: 20px; color: #999; background: #222; float: right; width: 100%; margin-top: 0;}

            #sidebar1{background:#fff; position: absolute; width: 215px; left:0; top: 0;}
            .sidemenu ul{padding:60px 0 0 0; margin: 0;}
            .sidemenu ul li{list-style: none;}
            .sidemenu ul li a{ font-size:14px; color:#7d7d7d; font-weight:500; display:block; padding:6px 15px;}
            .sidemenu ul li a:hover{background:#f5f5f5; color:#333;}
            .sidemenu .divider{border-top:1px solid #c1c1c1; margin-top: 5px; padding-top: 5px;}

            .top-jaherat{padding:10px 0 0 0; margin:0 auto;text-align: center;}
            .top-jaherat img{margin: 0 auto; width:100%;}
            .videoBlock{margin:10px 0 0 0;}
            /*.videoPlayerContainer { position: relative; height: 0; padding-bottom: 56.25%; padding-top: 30px; overflow: hidden; }
            .videoPlayerContainer iframe, .videoPlayerContainer object, .videoPlayerContainer embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }*/

            .vpDetails{padding:10px; background:#f8f8f8; box-shadow:0 3px 5px 1px #dbdbdb;}
            .vpDetails .info h1{ font-size: 19px; color: #555555; font-weight:500; margin: 0;}
            .vpDetails .info p{margin:0;}
            .vpDetails .info p span{font-size: 12px; color: #9a9a9a; display: inline-block; padding-right: 20px;}

            .wrapper-sidebar{padding:10px 0 0 10px;}
            .wrapper-sidebar .grid-item{padding:10px 0 0 0;}
            .wrapper-sidebar .grid-item h2{font-size:16px; color: #666666; font-weight:500; margin:0; padding:0;}
            .wrapper-sidebar .grid-item ul{margin:0; padding: 0;}
            .wrapper-sidebar .grid-item .item{padding:20px 0 0 0; list-style:none;}
            .wrapper-sidebar .grid-item .item .ct-box .ct-thumbnail{position: relative; float:left; padding:0 10px 0 0;}
            .wrapper-sidebar .grid-item .item .ct-box .ct-content{float: left; width:60%;}
            .wrapper-sidebar .grid-item .item .ct-box .ct-content h3{font-weight:400; margin:0; padding: 0;}
            .wrapper-sidebar .grid-item .item .ct-box .ct-content h3 a{color: #666; font-size:15px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; display: inline-block; text-transform: capitalize; width:98%;}
            .wrapper-sidebar .grid-item .item .ct-box .ct-content h3 a:hover{color:#3e8ede;}
            .wrapper-sidebar .grid-item .item .ct-box .ct-content p{margin:0; padding: 0;}
            .wrapper-sidebar .grid-item .item .ct-box .ct-content p span{font-size: 12px; color: #9a9a9a; display: inline-block; padding-right: 20px;}

            .vpDetails .posterBlock h2{background: #fff; border-radius: 50px; box-shadow:0 3px 5px 1px rgba(0, 0, 0, 0.10); color: #666666; display: inline-block; font-size: 20px; margin-bottom: 15px; padding: 10px 30px;}
            .vpDetails .posterBlock .image-card{padding-bottom:20px; width:100%;}
            .vpDetails .posterBlock .image-card .download{padding:10px; box-shadow:0 2px 8px rgba(0, 0, 0, 0.1); background-color: #fff; display:block; font-size:14px; color: #478cca; font-weight:500;}
            .vpDetails .posterBlock .image-card img{width:100%;}
            .vpDetails .posterBlock .image-card .download label{padding-right:10px; cursor: pointer;}
            .vpDetails .posterBlock .image-card .download span{color: #666; display: inline-block; font-size: 11px;}

            #footer{border-top:1px solid #d1d1d1; text-align: center; background:#fff; margin-top:20px; padding:15px;}
            #footer p{font-size:14px; color:#bbbbbb; margin:0; padding:0;}
            #footer a{font-size:15px; color:#3e8ede; margin-bottom:5px; }
        </style>

    </head>

    <body>
    <amp-analytics type="googleanalytics">
        <script type="application/json">
            {
            "vars": {
            "account": "UA-80643173-1"
            },
            "triggers": {
            "trackPageview": {
            "on": "visible",
            "request": "pageview"
            }
            }
            }
        </script>
    </amp-analytics>
    <amp-sidebar id="sidebar1" layout="nodisplay">
        <button class="menu-btn close" on="tap:sidebar1.close">&times; Close</button>
        <div class="sidemenu">
            <ul>
                <li><a href="<?php echo base_url('movietrailer'); ?>">Movie Trailer</a></li>
                <li><a href="<?php echo base_url('videosong'); ?>">Video Song</a></li>
                <li><a href="<?php echo base_url('movieposter'); ?>">Movie Poster</a></li>
                <li class="divider">
                    <a href="<?php echo base_url('movie'); ?>">Movies</a>
                </li>
                <li><a href="<?php echo base_url('actor'); ?>">Actors</a></li>
                <li><a href="<?php echo base_url('singer'); ?>">Singers</a></li>
                <li><a href="<?php echo base_url('director'); ?>">Directors</a></li>
                <li><a href="<?php echo base_url('musicdirector'); ?>">Music Directors</a></li>
                <li><a href="<?php echo base_url('company'); ?>">Companies</a></li>
            </ul>
        </div>
    </amp-sidebar>

    <div class="wrapper-content">
        <div id="header" class="cf">
            <button class="menu-btn" on="tap:sidebar1.open"><span></span><span></span><span></span></button>
            <a href="<?php echo base_url() ?>" class="logo">
                <amp-img src="<?php echo base_url() ?>resources/images/logo.svg" height="30" width="150" alt="Coming Trailer"></amp-img></a>
            <a href="https://goo.gl/yW7YvS" target="_blank" class="m-googleplay">Download App</a>
        </div>
        <?php
        $video_movie_id = '';
        $video_cat_id = '';
        $current_video_id = '';
        $subcat_id = 0;
        $total_likes = 0;
        $total_play = 0;
        $datas = json_decode($head_adv);
        $adv_data = $datas->data;
        ?>
        <!--<div class="top-jaherat">
        <?php
        foreach ($adv_data as $adv) {
            if (!empty($adv)) {
                if ($adv->adv_option == 'C') {
                    echo $adv->google_code;
                } else {
                    ?>
                                                                                   
                                                                                    
                                                                                    <amp-img width="300" height="90" src="<?php echo $adv->adv_image ?>">
                                                                                        
                                                                                    </amp-img><amp-img src="images/top-jaherat.jpg" height="90" width="728"></amp-img></div>-->
                    <?php
                }
            }
        }
        ?>
        <?php
        $datas = json_decode($trailer);
        $trailer_data = $datas->data;
        foreach ($trailer_data as $trailer) {
            if (!empty($trailer)) {
                $video_id = $trailer->video_id;
                $current_video_id = $trailer->video_id;
                $video_cat_id = $trailer->cat_id;
                $total_likes = $trailer->total_likes;
                $total_play = $trailer->total_play;
                $subcat_id = $trailer->subcat_id;
                ?>

            </div>
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
                        <!--<iframe width="560" height="315" src="https://www.youtube.com/embed/je_4hpfAd1g?modestbranding=1;rel=0&amp;showinfo=0;" frameborder="0" allowfullscreen></iframe>-->
                    <amp-youtube id="player" width="560" height="415" layout="responsive" data-videoid="<?php echo $vedio_id; ?>" autoplay></amp-youtube>

                   <!-- <iframe id="player" width="560" height="415" src="https://www.youtube.com/embed/<?php echo $vedio_id; ?>?autoplay=1&enablejsapi=1&modestbranding=1;rel=0&amp;showinfo=0;" allowfullscreen="1" allow="autoplay; encrypted-media" title="YouTube video player" layout="responsive"></iframe> -->
                </div>
            </div>

            <div class="vpDetails">
                <div class="info">
                    <h1><?php echo $trailer->video_name ?></h1>
                    <p> <span><?php echo $trailer->total_play ?> playing</span>
                        <span><?php echo $trailer->total_likes ?> likes</span> 
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
            </div>

            <?php
        }
    }
    ?>


    <?php echo $item_prop; ?>

    <div class="wrapper-sidebar">
        <!--<div class="jaherat300">
        <?php
        $datas = json_decode($side_adv);
        $adv_data = $datas->data;
        foreach ($adv_data as $adv) {
            if (!empty($adv)) {
                if ($adv->adv_option == 'C') {
                    echo $adv->google_code;
                } else {
                    ?>
                                                                                    <amp-img src="<?php echo $adv->adv_image ?>" width="300" height="250"></amp-img>
                    <?php
                }
            }
        }
        ?>
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
                                <a href="<?php echo $seo_urls; ?>"></a>                                                     
                                <?php
                                $filename = './images/videothumb/' . $val->video_thumb;
                                if (file_exists($filename)) {
                                    ?>
                                    <amp-img src="<?php echo base_url() . "timthumb.php?src=" . base_url('images/videothumb/' . $val->video_thumb) . "&w=285&h=160"; ?>" alt="<?php echo $val->video_name; ?>" width="100" height="56"></amp-img></a></div>

                            <?php } else {
                                ?>
                                <amp-img src="<?php echo base_url('resources/images/no-image.svg'); ?>" alt="<?php echo $val->video_name; ?>" width="100" height="56"></amp-img></a></div>
                        <?php }
                        ?>

                        <div class="ct-content">
                            <h3>
                                <a href="<?php echo $seo_urls; ?>"><?php echo $val->video_name; ?></a>
                            </h3> 
                            <p> <span id="total_play"><?php echo $val->play; ?> playing</span>
                                <span><?php echo $val->liked; ?> likes</span> </p></div>
                        </div>
                    </li>
                    <?php
                }
                ?>


            </ul>

        </div>

    </div>

    <div id="footer">
        <a href="<?php echo base_url(); ?>">Visit Mobile Site</a>
        <p>&copy; 2019 Coming Trailer.com</p>
    </div>  
</div>
</body>



</html>
