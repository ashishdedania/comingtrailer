<?php header("Content-Type: text/xml;charset=iso-8859-1"); ?>


<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
       
    <?php 
    
    //print_r($datas);exit;
    foreach($datas as $url) { 
        
//        echo $url['created'].'..'.$url['updated'];
        
        if($url['mycreated'] > $url['myupdated']){
            $modify = date('Y-m-dTH:i:sP', strtotime($url['mycreated']));;
            $modify = str_replace('IST', 'T', $modify);
        }else{
            $modify = date('Y-m-dTH:i:sP', strtotime($url['myupdated']));;
            $modify = str_replace('IST', 'T', $modify);
        }
        
        ?>
    <url>
        <loc><?= preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $url['final_url']);; ?></loc>
        <lastmod><?= $modify; ?></lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    <?php } ?>

</urlset>