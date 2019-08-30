<p class="results-number">About <strong id="total_search_result"><?php echo $search_result->total_search_result; ?></strong> results</p>
<div class="search-list cf">
    <ul>
        <?php
        //print_r($search_result);exit;
        $individual = array('cast' => 'cast', 'director' => 'director', 
            'music' => 'music', 'singer' => 'singer', 'released_by' => 'rel_by');
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
//                        $seo_urls = $controller->getSeoUrl($value->detail->seo_url_id);
                        ?>
                        <li class="item all <?php echo $v; ?>">
                            <div class="ct-box cf">
                                <div class="ct-thumbnail">                
                                    <?php
                                    $temp_img = $v . '_img';
                                    $default_mstp = '';
                                    if ($k == 'released_by') {
                                        $default_mstp = 't';
                                    }                                    
                                    $temp = $v . '_name';
                                    if ($k != 'released_by') {
                                        $url = base_url() . 'personality/' . str_replace(" ", "-", str_replace(["(", ")"], "", $value->detail->$temp));
                                    } else {
                                        $url = $seo_urls;
                                    }
                                    ?>
                                    <a href="<?php echo $url; ?>">
                                        <?php
                                        $filename = base_url('images/personality/' . $value->detail->$temp_img);
                                        if (@getimagesize($filename)) {
                                            ?>
                                            <img src="<?php echo base_url('images/personality/' . $value->detail->$temp_img); ?>" alt="<?php
                                            
                                            echo $value->detail->$temp;
                                            ?>">
                                             <?php } else {
                                                 ?>
                                            <img src="<?php echo base_url('resources/images/no-user.svg'); ?>" alt="<?php                                            
                                            echo $value->detail->$temp;
                                            ?>" />
                                             <?php }
                                             ?>

                                    </a>
                                </div>
                                <div class="ct-content">
                                    <?php
                                    $temp = $v . '_name';
                                    if ($k != 'released_by') {
                                        base_url() . 'personality/' . str_replace(" ", "-", str_replace(["(", ")"], "", $value->detail->$temp));
                                    } else {
                                        $url = $seo_urls;
                                    }
                                    ?>                                    
                                    <h3><a href="<?php echo $url; ?>"><?php
                                            
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
</div>

<div class="search-pager">
    <?php
    $total_result = $search_result->total_search_result;
//                echo $total_result;exit;
//                echo $total_result.'....'.ceil($total_result / 20).'....'.$current_page;
    $total_pages = ceil($total_result / 20);
    if ($total_pages != 1) {
        if ($current_page != 1) {
            ?>
            <a href="javascript:void(0)" onclick="mypage('<?php echo ($current_page - 1); ?>')"><< Previous</a>
            <?php
        }
        $mypage = $current_page;
        if ($total_pages < ($current_page + 4)) {
            $total = $current_page + 4;
            $dif = $total - $total_pages;
            $current_page = $current_page - $dif;
            if ($current_page <= 0) {
                $current_page = $mypage;
            }
        }
        for ($i = $current_page; $i <= ($current_page + 4); $i++) {
            if ($total_pages >= $i) {
                ?>
                <a href="javascript:void(0)" onclick="mypage('<?php echo $i; ?>')"><?php echo $i; ?></a>
                <?php
            }
        }
        if ($current_page != $total_pages) {
            if ($total_pages > $mypage) {
                ?>
                <a href="javascript:void(0)" onclick="mypage('<?php echo ($mypage + 1); ?>')">Next >></a>
                <?php
            }
        }
    }
    ?>
</div>
<script type="text/javascript">

    function mypage(page) {
        var search_keywords = '<?php echo $this->input->post('global_search_keyword'); ?>';
        var selected = '<?php echo $this->input->post('selected'); ?>';
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('Search/searchTrailer/'); ?>' + page,
            data: 'global_search_keyword=' + search_keywords + '&selected=' + selected,
            success: function (html) {
//                    alert(html);
                $('#content').html(html);


                //start = (parseInt(start) + 5);

                // search_keyword = search_keywords;

            }
        });
    }

</script>

