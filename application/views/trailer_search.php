<p class="results-number">About <strong id="total_search_result"><?php echo $search_result->total_search_result; ?></strong> results</p>
<div class="search-list cf">
    <ul>
        <?php
        $images_folder = array(
            'cast' => 'actors',
            'director' => 'directors',
            'movie' => 'movies',
            'music' => 'music',
            'poster' => 'poster',
            'video' => 'videothumb',
            'singer' => 'singers'
        );
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
                                if ($value->video_thumb != '' && file_exists($filename)) {
                                    ?>
                                    <img src="<?php echo base_url()."timthumb.php?src=".base_url('images/' . $images_folder['video'] . '/' . $value->video_thumb)."&w=285&h=160"; ?>" alt="<?php echo $value->video_name; ?>">
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