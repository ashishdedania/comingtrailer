<?php header("Content-Type: text/xml;charset=iso-8859-1"); ?>


<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
       
    <?php 
    
   //print_r($datas);exit;
    foreach($datas as $url) { 
        
//        echo $url['created'].'..'.$url['updated'];
        
        $modify='';

         if(!empty(trim($url['personality_name']))){
          $modify = date('Y-m-dTH:i:sP', strtotime($url['updated']));;
            $modify = str_replace('IST', 'T', $modify);}
        
        

            if(!empty(trim($url['personality_name']))){

        ?>



    <url>
        <loc><?= base_url('personality/').str_replace(" ","-",preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $url['personality_name']))?></loc>
        <lastmod><?= $modify; ?></lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    <?php }} ?>

</urlset>