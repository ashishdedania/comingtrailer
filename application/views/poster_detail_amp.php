<!DOCTYPE html>
<html amp>
    <head>
        <meta charset="utf-8">
        <title><?php echo $title ?></title>
        <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no,minimal-ui">
        <link rel="canonical" href="<?php echo $mylink; ?>" />
        <link rel="icon" type="image/ico" href="<?php echo base_url() ?>/resources/images/favicon.png" />
        <meta name="news_keywords" content="<?php echo $keywords; ?>" />
        <script async src="https://cdn.ampproject.org/v0.js"></script>
        <script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script>
        <script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
        <script async custom-element="amp-ad" src="https://cdn.ampproject.org/v0/amp-ad-0.1.js"></script>
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
            "headline": "<?php echo $title ?>",
            <?php
            if ($img != '') {
                echo $img;
            }
            ?>
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
            .vpDetails .posterBlock .image-card .download span{color: #666; display:none; font-size: 11px;}
            .imgdisclaimer{display:block; font-size:12px; color:#999;}

            #footer{border-top:1px solid #d1d1d1; text-align: center; background:#fff; margin-top:20px; padding:15px;}
            #footer p{font-size:14px; color:#bbbbbb; margin:0; padding:0;}
            #footer a{font-size:15px; color:#3e8ede; margin-bottom:5px; }
        </style>
        <?php // echo $seo_data;    ?>
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
        $current_poster_id = '';
        $subcat_id = '';
        $total_likes = 0;
        $total_views = 0;
        $poster_name = '';
        ?>
        <div class="top-jaherat">

            <?php
            $datas = json_decode($head_adv);
            $adv_data = $datas->data;
            foreach ($adv_data as $adv) {
                if (!empty($adv)) {
                    if ($adv->adv_option == 'C') {
                        echo $adv->google_code;
                    } else {
                        ?>
                        <a href="<?php echo $adv->image_link; ?>" rel="nofollow noreferrer" target="_blank">
                            <amp-img src="<?php echo $adv->adv_image ?>" width="300" height="90"></amp-img>
                        </a>
                        <?php
                    }
                }
            }
            ?>


        </div>

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
                $subcat_id = $trailer->subcat_id;
                ?>

                <div class="vpDetails">
                    <div class="info">
                        <h1><?php echo $trailer->poster_name; ?></h1>
                        <p> <span><?php echo $trailer->total_views; ?> View</span>
                            <span><?php echo $trailer->total_likes; ?> likes</span> 
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
                                    <span>Release : <?php echo date('d M Y', strtotime($val)); ?></span></p>
                                <?php
                                break;
                            }
                        }
                        ?>
                    </div>

                    <div class="posterBlock">

                        <?php
                        $no = 0;
//print_r($trailer->poster_img);
                        foreach ($trailer->poster_img as $img) {
                            if (!empty($img->poster_img)) {

                                if ($no == 0) {
                                    ?>
                                    <h2>Poster</h2>
                                    <?php
                                    $no++;
                                }
                                ?>

                                <div class="image-card">
                                    <?php
                                    list($width, $height) = getimagesize(str_replace('285X160-', '', $img->poster_img));
//                            echo "width: " . $width . "<br />";
//                            echo "height: " .  $height;
                                    $size = $width . 'x' . $height;
                                    $down_img = str_replace('285X160-', '', $img->poster_img);
                                    $down_img = str_replace('http://', '', $down_img);
                                    ?>

                                    <amp-img src="<?php echo str_replace('285X160-', '', $img->poster_img); ?>" height="<?php echo $height; ?>" width="<?php echo $width; ?>" layout="responsive" alt="<?php echo $poster_name; ?>"></amp-img>
                                    <?php if ($this->session->userdata('front_userdata')) { ?>
                                        <a href="<?php echo str_replace('285X160-', '', $img->poster_img); ?>" download="<?php echo $down_img; ?>" class="download">
                                            <label>Download</label> 
                                            <span>Size: <?php echo $size; ?></span>
                                        </a>
                                    <?php } ?>
                                </div>
                                <?php
                            }
                        }
                        ?>

                        <?php
                        $no = 0;
                        foreach ($trailer->firstlook_img as $img) {
                            if (!empty($img->poster_img)) {

                                if ($no == 0) {
                                    ?>
                                    <h2>First Look & Images</h2>
                                    <?php
                                    $no++;
                                }
                                ?>       



                                <div class="image-card">
                                    <?php
                                    list($width, $height) = getimagesize(str_replace('285X160-', '', $img->poster_img));
//                            echo "width: " . $width . "<br />";
//                            echo "height: " .  $height;
                                    $size = $width . 'x' . $height;
                                    $down_img = str_replace('285X160-', '', $img->poster_img);
                                    $down_img = str_replace('http://', '', $down_img);
                                    ?>
                                    <amp-img src="<?php echo str_replace('285X160-', '', $img->poster_img); ?>" layout="responsive" height="<?php echo $height; ?>" width="<?php echo $width; ?>" alt="<?php echo $poster_name; ?>"></amp-img>
                                    <?php if ($this->session->userdata('front_userdata')) { ?>
                                        <a download="<?php echo $down_img; ?>" href="<?php echo str_replace('285X160-', '', $img->poster_img); ?>" class="download">
                                            <label>Download</label> <span>Size: <?php echo $size; ?></span></a>
                                    <?php } ?>
                                </div>

                                <?php
                            }
                        }
                        ?>




                        <?php
                        $no = 0;
                        foreach ($trailer->wallpaper_img as $img) {
                            if (strlen($img->poster_img) > 0) {
                                if ($no == 0) {
                                    ?>
                                    <h2>Wallpaper</h2>
                                    <?php
                                    $no++;
                                }
                                ?>
                                <div class="image-card">
                                    <?php
                                    list($width, $height) = getimagesize(str_replace('285X160-', '', $img->poster_img));
//                            echo "width: " . $width . "<br />";
//                            echo "height: " .  $height;
                                    $size = $width . 'x' . $height;
                                    $down_img = str_replace('285X160-', '', $img->poster_img);
                                    $down_img = str_replace('http://', '', $down_img);
                                    ?>
                                    <amp-img src="<?php echo str_replace('285X160-', '', $img->poster_img); ?>" layout="responsive" height="<?php echo $height; ?>" width="<?php echo $width; ?>" alt="<?php echo $poster_name; ?>"></amp-img>
                                    <?php if ($this->session->userdata('front_userdata')) { ?>
                                        <a download="<?php echo $down_img; ?>" href="<?php echo str_replace('285X160-', '', $img->poster_img); ?>" class="download">
                                            <label>Download</label> 
                                            <span>Size: <?php echo $size; ?></span></a>
                                    <?php } ?>
                                </div>
                                <?php
                            }
                        }
                        ?>


                    </div>
                    <span class="imgdisclaimer">Disclaimer: All images are copyright to their respective owners.</span>
                </div>
                <?php
            }//$trailer empty
        }
        ?>

        <div class="wrapper-sidebar">
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
                                <amp-img src="<?php echo $adv->adv_image ?>" width="300" height="250"></amp-img>
                            </a>
                            <?php
                        }
                    }
                }
                ?>

            </div>
            <div class="grid-item">
                <h2>Related</h2>
                <ul>
                    <?php
                    $related_poster = $controller->getRelatedPoster($current_poster_id, $subcat_id);
                    foreach ($related_poster as $key => $value) {

                        $seo_urls = $controller->getSeoUrl($value->seo_url_id);
                        ?>
                        <li class="item">
                            <div class="ct-box cf">
                                <div class="ct-thumbnail">
                                    <a href="<?php echo $seo_urls; ?>">
                                        <?php
                                        $filename = base_url('images/poster/' . $value->poster_image);
                                        if (@getimagesize($filename)) {
                                            ?>
                                            <amp-img src="<?php echo base_url() . 'timthumb.php?src=' . base_url() . 'images/poster/' . str_replace('285X160-', '', $value->poster_image) . '&w=285&h=160'; ?>" alt="<?php echo $value->poster_name; ?>" width="100" height="56"></amp-img></a></div>
                                <?php } else {
                                    ?>
                                    <amp-img src="<?php echo base_url('resources/images/no-image.svg'); ?>" alt="<?php echo $value->poster_name; ?>" width="100" height="56"></amp-img></a></div>

                            <?php }
                            ?>

                            <div class="ct-content"><h3>
                                    <a href="<?php echo $seo_urls; ?>">
                                        <?php echo $value->poster_name; ?></a></h3> 
                                <p> <span><?php echo $value->views; ?> views</span>
                                    <span><?php echo $value->likes; ?> likes</span> </p></div>
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
    <script type="text/javascript" src="<?php echo base_url() ?>resources/js/jquery-3.2.0.min.js"></script>

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

    setViewTotal();


    

</script>
</body>
</html>
