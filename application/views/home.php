<div itemscope itemtype="http://schema.org/Organization">
    <meta itemprop="url" content="<?php echo base_url() ?>"/>
    <meta itemprop="name" content="Coming Trailer.com"/>
    <link itemprop="logo" href="<?php echo base_url() ?>resources/images/logo.svg" />
    <link itemprop="sameAs" href="https://www.facebook.com/ComingTrailerOfficial/" />
    <link itemprop="sameAs" href="https://twitter.com/ComingTrailerIn" />
    <link itemprop="sameAs" href="https://www.instagram.com/comingtrailer" />
    <link itemprop="sameAs" href="http://www.youtube.com/comingtrailer" />
    <link itemprop="sameAs" href="https://plus.google.com/+Comingtrailer" />
    <link itemprop="sameAs" href="http://www.dailymotion.com/comingtrailer" />
    <link itemprop="sameAs" href="https://www.pinterest.com/comingtrailer" />
    <meta itemprop="description" content="Hey! You just arrived on a station called Entertainment…  We at Coming Trailer.com. make sure that any individual doesn't miss any new release starting from a poster release, movie announcement, video songs, teasers or trailers. Apart from being the unmatched destination for Indian cine industry, we make available each new media sensation on our portal. Watch out the newly released movie posters, movie teasers, trailers, video songs and much more. We bet you won't stop yourself sharing the news with your besties. Come and explore the all at Coming Trailer.com."/>
</div>


<div class="container cf">
    <div class="wrapper-content">
        <div class="wrap-inside">
            <div class="top-jaherat">
                <div class="block">
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
                                    <img src="<?php echo $adv->adv_image ?>" />
                                </a>
                                <?php
                            }
                        }
                    }
                    ?>
                </div>
            </div>

            <?php
            if (!empty($home_data)) {
                foreach ($home_data as $key => $value) {
                    ?>
                    <div class="title_box">
                        <div class="cf"><h2><?php echo $value['name']; ?></h2>
                            <a href="<?php echo $value['url']; ?>" class="show-more">Show more</a>
                        </div>
                    </div>
                    <ul class="grid-item cf">
                        <?php foreach ($value['value'] as $key2 => $val) { ?>
                            <li class="item">
                                <div class="ct-box">
                                    <div class="ct-thumbnail">

                                        <?php if ($key < 16) { ?>
                                            <a href="<?php echo $val['final_url']; ?>" class="play"></a> 
                                        <?php } else { ?>
                                            <a href="<?php echo $val['final_url']; ?>" class="zoom"></a> 
                                        <?php } ?>
                                        <a href="<?php echo $val['final_url']; ?>">
                                            <?php if (file_exists($val['thumb'])) { ?>
                                                <img src="<?php echo base_url() . $val['video_thumb']; ?>" alt="<?php echo $val['video_name']; ?>" />
                                            <?php } else { ?>
                                                <img src="<?php echo base_url() . "images/no-image.svg"; ?>" alt="<?php echo $val['video_name']; ?>" />  
                                            <?php } ?>
                                        </a>
                                    </div>
                                    <div class="ct-content">
                                        <h3>
                                            <a href="<?php echo $val['final_url']; ?>">
                                                <?php echo $val['video_name']; ?>
                                            </a>
                                        </h3> 
                                        <p class="meta-info"> 
                                            <span><?php echo $val['play']; ?></span>
                                            <span><?php echo $val['liked']; ?></span> 
                                        </p>
                                    </div>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                    <?php
                }
            }
            ?>
        </div>
    </div>

    <div class="wrapper-sidebar">
        <div class="sidebar-jaherat">
            <div class="jaherat300">
                <?php
                $datas = json_decode($side_adv);
                $adv_data = $datas->data;
                foreach ($adv_data as $adv) {
                    if (!empty($adv)) {
                        if ($adv->adv_option == 'C') {
                            echo $adv->google_code;
                            ?>
                        <?php } else { ?>
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


        <div class="grid-item">
            <h2>Trending this Week</h2>
            <ul>
                <?php
//print_r($video_week_trend);
                foreach ($video_week_trend as $key => $val) {
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
                                        <img src="<?php
                                        echo base_url('resources/images/no-image.svg');
                                        ;
                                        ?>" alt="<?php echo $val->video_name; ?>" width="100" height="56"/>
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
                <?php } ?>
            </ul>

        </div>

    </div>
</div>

</div>
<script type="application/ld+json">
    {
    "@context": "http://schema.org",
    "@type": "WebSite",
    "url": "https://www.comingtrailer.com/",
    "potentialAction": {
    "@type": "SearchAction",
    "target": "https://www.comingtrailer.com/search?q={search_term_string}",
    "query-input": "required name=search_term_string"
    }
    }
</script>