<?php
$datas = json_decode($trailer);
$trailer_data = $datas->data;
$nodata = '';
$no = 1;
foreach ($trailer_data as $trailer) {
    if (!empty($trailer)) {
        $video_id = $trailer->video_id;
        $seo_urls = $controller->getSeoUrl($trailer->seo_url_id);
        $nodata = 'yes';
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
                            <img src="<?php
                            echo base_url('resources/images/no-image.svg');
                            ;
                            ?>" alt="<?php echo $trailer->video_name; ?>" />
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
        $no++;
    }
}

if ($no >= 50) {
    ?>
    
    <?php
} else {
    ?>
    
    <?php
}

if ($nodata == '') {
    
}
?>
