<?php header("Content-Type: text/xml;charset=iso-8859-1"); ?>


<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <?php 
    
//    print_r($datas);exit;
    foreach($datas_main as $url) { 
       $modify = date('Y-m-dTH:i:sP', strtotime( $url['modify'] ));
       $modify = str_replace('IST', 'T', $modify);
        ?>
    <url>
        <loc><?= $url['final_url']; ?></loc>
        <lastmod><?= $modify; ?></lastmod>
        <changefreq><?= $url['freq']; ?></changefreq>
        <priority><?= $url['priority']; ?></priority>
    </url>
    <?php } ?>

    <?php 
//    print_r($datas);exit;
    foreach($datas_comman as $url) { 
        $modify = date('Y-m-dTH:i:sP', strtotime( $url['modify'] ));
       $modify = str_replace('IST', 'T', $modify);
        ?>
    <url>
        <loc><?= base_url($url['final_url']); ?></loc>
        <lastmod><?= $modify; ?></lastmod>
        <changefreq><?= $url['freq']; ?></changefreq>
        <priority><?= $url['priority']; ?></priority>
    </url>
    <?php } ?>
    
    <?php 
//    print_r($datas);exit;
    foreach($datas as $url) { 
        
        if($url['updated'] == '0000-00-00 00:00:00'){
            $modify = date('Y-m-dTH:i:sP', strtotime( $url['created'] ));
            $modify = str_replace('IST', 'T', $modify);
        }else{
            $modify = date('Y-m-dTH:i:sP', strtotime($url['updated']));
            $modify = str_replace('IST', 'T', $modify);
        }
        
        ?>
    <url>
        <loc><?= $url['final_url']; ?></loc>
        <lastmod><?= $modify; ?></lastmod>
        <changefreq>hourly</changefreq>
        <priority>1.0</priority>
    </url>
    <?php } ?>
    
    <?php 
//    print_r($datas);exit;
    foreach($datasmovie as $url) { 
        
        if($url['updated'] == '0000-00-00 00:00:00'){
            $modify = date('Y-m-dTH:i:sP', strtotime( $url['created'] ));
            $modify = str_replace('IST', 'T', $modify);
        }else{
            $modify = date('Y-m-dTH:i:sP', strtotime($url['updated']));
            $modify = str_replace('IST', 'T', $modify);
        }
        
        ?>
    <url>
        <loc><?= $url['final_url']; ?></loc>
        <lastmod><?= $modify; ?></lastmod>
        <changefreq>hourly</changefreq>
        <priority>1.0</priority>
    </url>
    <?php } ?>
    

</urlset>