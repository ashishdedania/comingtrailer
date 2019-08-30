<div class="container cf">
    <div class="wrapper-full-content">
        <div class="top-wrap">

            <div class="search-results cf">
                <p>Search Results for: <?php echo $this->session->userdata('global_search_keyword'); ?></p>
                <select class="select" name="filter" id="filter">
                    <option value="all" disabled>Filters</option>
                    <option value="trailer" selected>Movie Trailer</option>
                    <option value="video">Video Song</option>
                    <option value="poster">Movie Poster</option>
                    <option value="movie">Movie</option>
                    <option value="cast">Actor</option>
                    <option value="singer">Singer</option>
                    <option value="director">Director</option>
                    <option value="music">Music Director</option>
                    <option value="released_by">Company</option>
                </select>
            </div>
        </div>

        <div class="content-container" id = "content">
            <p class="results-number">About <strong id="total_search_result"><?php echo $this->session->userdata('total_search_result'); ?></strong> results</p>
            <div class="search-list cf">
                <ul>
                    <?php
                    //print_r($search_result);exit;
                    $individual = array('cast' => 'cast', 'director' => 'director', 'music' => 'music', 'singer' => 'singer', 'released_by' => 'rel_by');
                    $images_folder = array(
                        'cast' => 'actors',
                        'director' => 'directors',
                        'movie' => 'movies',
                        'music' => 'music',
                        'poster' => 'poster',
                        'video' => 'videothumb',
                        'singer' => 'singers',
                        'rel_by' => 'channel'
                    );
                    if ($search_result->total_search_result > 0) {
                        foreach ($individual as $k => $v) {
                            if (isset($search_result->$k)) {
                                foreach ($search_result->$k as $key => $value) {
                                    $seo_urls = $controller->getSeoUrl($value->detail->seo_url_id);
                                    ?>
                                    <li class="item all <?php echo $v; ?>">
                                        <div class="ct-box cf">
                                            <div class="ct-thumbnail">
                <!--                                                <a href="<?php echo $seo_urls; ?>" class="play"></a> -->
                                                <?php
                                                $temp = $v . '_img';
                                                $default_mstp = '';
                                                if ($k == 'released_by') {
                                                    $default_mstp = 't';
                                                }
                                                ?>
                                                <a href="<?php echo $seo_urls; ?>">
                                                    <?php
                                                    echo $images_folder[$v];
                                                    if($images_folder[$v] == 'videothumb') {
                                                        $filename = './images/' . $images_folder[$v] . '/' . $value->detail->$temp;
                                                        $image = base_url()."timthumb.php?src=".base_url('images/' . $images_folder[$v] . '/' . $value->detail->$temp)."&w=285&h=160";
                                                    } else {
                                                        $filename = base_url('images/' . $images_folder[$v] . '/' . $value->detail->$temp);
                                                        $image = base_url('images/' . $images_folder[$v] . '/' . $value->detail->$temp);
                                                    }
                                                    if (($images_folder[$v] != 'videothumb' && @getimagesize($filename)) || ($images_folder[$v] == 'videothumb' && file_exists($filename))) {
                                                        ?>
                                                        <img src="<?php echo $image; ?>" alt="<?php
                                                        $temp = $v . '_name';
                                                        echo $value->detail->$temp;
                                                        ?>">
                                                             <?php
                                                         } else {

                                                             if ($k == 'movie') {
                                                                 ?>
                                                            <img src="<?php echo base_url('resources/images/no-movie.svg'); ?>" alt="<?php
                                                            $temp = $v . '_name';
                                                            echo $value->detail->$temp;
                                                            ?>" />
                                                                 <?php
                                                             } else {
                                                                 ?>
                                                            <img src="<?php echo base_url('resources/images/no-user.svg'); ?>" alt="<?php
                                                            $temp = $v . '_name';
                                                            echo $value->detail->$temp;
                                                            ?>" />
                                                                 <?php
                                                             }
                                                         }
                                                         ?>

                                                </a>
                                            </div>
                                            <div class="ct-content">
                                                <h3><a href="<?php echo $seo_urls; ?>"><?php
                                                        $temp = $v . '_name';
                                                        echo $value->detail->$temp;
                                                        ?></a></h3> 
                                                <p class="meta-info">
                                                    <?php if ($k != 'released_by') { ?>
                                                        <span><?php echo $value->m; ?> Movies</span>
                                                    <?php } ?>
                                                    <span><?php echo $value->s; ?> Songs</span> 
                                                    <span><?php echo $value->t; ?> Trailers</span>
                                                    <?php if ($v != 'music' && $v != 'singer' && $k != 'released_by') { ?>
                                                        <span><?php echo $value->p; ?> Poster</span> 
                                                    <?php } ?>
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <?php
                                }
                            }
                        }
                    }
                    ?>


                </ul>
                <ul>
                    <?php
                    if (isset($search_result->movie)) {
                        foreach ($search_result->movie as $key => $value) {
                            $seo_urls = $controller->getSeoUrl($value->detail->seo_url_id);
                            ?>
                            <li class="item all movie">
                                <div class="ct-box cf">
                                    <div class="ct-thumbnail">
                                        <a href="<?php echo $seo_urls; ?>">
                                            <?php
                                            $filename = base_url('images/' . $images_folder['movie'] . '/' . $value->detail->movie_img);
                                            if (@getimagesize($filename)) {
                                                ?>
                                                <img src="<?php echo base_url('images/' . $images_folder['movie'] . '/' . $value->detail->movie_img); ?>" alt="<?php echo $value->detail->movie_name; ?>">
                                            <?php } else {
                                                ?>
                                                <img src="<?php echo base_url('resources/images/no-movie.svg'); ?>" alt="<?php echo $value->detail->movie_name; ?>" />
                                            <?php }
                                            ?>
                                        </a>
                                    </div>
                                    <div class="ct-content">
                                        <h3><a href="<?php echo $seo_urls; ?>"><?php echo $value->detail->movie_name; ?></a></h3> 
                                        <p class="meta-info">
                                            <span><?php echo $value->s; ?> Songs</span> 
                                            <span><?php echo $value->t; ?> Trailers</span> 
                                            <span><?php echo $value->p; ?> Poster</span> 
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <?php
                        }
                    }
                    if (isset($search_result->video)) {
                        foreach ($search_result->video as $key => $value) {
                            $seo_urls = $controller->getSeoUrl($value->seo_url_id);
                            ?>
                            <li class="item all video<?php echo $value->cat_id; ?>">
                                <div class="ct-box cf">
                                    <div class="ct-thumbnail">
                                        <a href="<?php echo $seo_urls; ?>" class="play">

                                        </a> 
                                        <a href="<?php echo $seo_urls; ?>">
                                            <?php
                                            $filename = 'images/' . $images_folder['video'] . '/' . $value->video_thumb;
                                            if (file_exists($filename)) {
                                                ?>
                                                <img src="<?php echo base_url() . "timthumb.php?src=" . base_url('images/' . $images_folder['video'] . '/' . $value->video_thumb) . "&w=285&h=160"; ?>" alt="<?php echo $value->video_name; ?>">
                                            <?php } else {
                                                ?>
                                                <img src="<?php echo base_url('resources/images/no-image.svg'); ?>" alt="<?php echo $value->video_name; ?>" />
                                            <?php }
                                            ?>
                                        </a>
                                    </div>
                                    <div class="ct-content">
                                        <h3>
                                            <a href="<?php echo $seo_urls; ?>"><?php echo $value->video_name; ?></a>
                                        </h3>
                                        <p class="meta-info"> 
                                            <span><?php echo $value->play; ?> playing</span>
                                            <span><?php echo $value->liked; ?> likes</span> 
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <?php
                        }
                    }
                    if (isset($search_result->poster)) {
                        foreach ($search_result->poster as $key => $value) {
                            $seo_urls = $controller->getSeoUrl($value->seo_url_id);
                            ?>
                            <li class="item all poster">
                                <div class="ct-box cf">
                                    <div class="ct-thumbnail">
                                        <a href="<?php echo $seo_urls; ?>" class="zoom"></a>
                                        <a href="<?php echo $seo_urls; ?>">
                                            <?php
                                            $filename = base_url() . 'images/' . $images_folder['poster'] . '/' . $value->poster_image;
                                            if (@getimagesize($filename)) {
                                                ?>
                                                <img src="<?php echo base_url() . 'timthumb.php?src=' . base_url() . 'images/' . $images_folder['poster'] . '/' . $value->poster_image . '&w=285&h=160'; ?>" alt="<?php echo $value->poster_name; ?>">
                                            <?php } else {
                                                ?>
                                                <img src="<?php echo base_url('resources/images/no-image.svg'); ?>" alt="<?php echo $value->poster_name; ?>" />
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
                    }
                    ?>

                </ul>

            </div>

            <div class="search-pager">
                <?php
                $total_result = $this->session->userdata('total_search_result');
//                echo $total_result.'....'.ceil($total_result / 20).'....'.$current_page;
                $total_pages = ceil($total_result / 20);
                if ($total_pages != 1) {
                    if ($current_page != 1) {
                        ?>
                        <a href="<?php echo base_url('search/index/' . ($current_page - 1)); ?>"><< Previous</a>
                        <?php
                    }
                    $mypage = $current_page;
                    if ($total_pages < ($current_page + 4)) {
                        $total = $current_page + 4;
                        $dif = $total - $total_pages;
                        $current_page = $current_page - $dif;
                        if ($current_page < 0) {
                            $current_page = $mypage;
                        }
                    }
                    for ($i = $current_page; $i <= ($current_page + 4); $i++) {
                        if ($total_pages >= $i) {
                            echo '<a href="' . base_url('search/index/' . $i) . '" class="' . ($i == $mypage ? 'current' : '') . '">' . $i . '</a>';
                        }
                    }
                    if ($current_page != $total_pages) {
                        if ($total_pages > $mypage) {
                            ?>
                            <a href="<?php echo base_url('search/index/' . ($mypage + 1)); ?>">Next >></a>
                            <?php
                        }
                    }
                }
                ?>
            </div>

        </div>

    </div>

    <div class="wrapper-full-sidebar">
        <div class="sidebar-jaherat">
            <div class="jaherat300">
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
            <div class="jaherat600">
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
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#filter').on('change', function () {
//           $('.all').hide();
//           $('.'+$(this).val()).show();
//           $('#total_search_result').html($('.'+$(this).val()).length);
            var selected = $(this).val();
            //alert(selected);
            var search_keywords = '<?php echo $this->session->userdata('global_search_keyword'); ?>';
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('Search/searchTrailer/1'); ?>',
                data: 'global_search_keyword=' + search_keywords + '&selected=' + selected,
                success: function (html) {
//                    alert(html);
                    $('#content').html(html);


                    //start = (parseInt(start) + 5);

                    // search_keyword = search_keywords;

                }
            });

        });

    });
</script>