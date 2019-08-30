<?php header("Content-Type: text/xml;charset=iso-8859-1"); ?>


<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
       
    <?php 
    
//    print_r($datas);exit;
    foreach($datas as $url) { 
        
        if($url['updated'] == ''){
            $modify = date('Y-m-dTH:i:sP', strtotime( $url['created'] ));
            $modify = str_replace('IST', 'T', $modify);
        }else{
            $modify = date('Y-m-dTH:i:sP', strtotime($url['updated']));
            $modify = str_replace('IST', 'T', $modify);
        }
        
        ?>
    <sitemap>
        <loc><?= base_url($url['file_name']); ?></loc>
        <lastmod><?= $modify; ?></lastmod>
    </sitemap>
    <?php } ?>

</sitemapindex>