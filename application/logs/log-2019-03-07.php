<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-03-07 00:19:06 --> Query error: Unknown column 'poster_img.poster_type' in 'field list' - Invalid query: SELECT poster.id as id,sub_category.subcat_name,poster.poster_name as video_name,poster_img.poster_type, CONCAT(poster.likes,' Likes') as liked,CONCAT(poster.views,' Views') as play,video_url.final_url,(select CONCAT('timthumb.php?src=https://www.comingtrailer.com/images/poster/',poster_img.poster_image,'&w=285&h=160') from poster_img where poster_img.poster_id=poster.id order by poster_img.poster_type asc,poster_img.display_order asc limit 1) as video_thumb,
                            (select CONCAT('https://www.comingtrailer.com/images/poster/',poster_img.poster_image) from poster_img where poster_img.poster_id=poster.id order by poster_img.poster_type asc,poster_img.display_order asc limit 1) as thumb
                        FROM poster 
                LEFT JOIN sub_category ON poster.subcat_id=sub_category.id
                LEFT JOIN video_url ON video_url.id=poster.seo_url_id                 
                WHERE subcat_id='1' AND    
                poster.is_deleted='0'                
                group by poster.id                
                ORDER BY poster.rel_date DESC
                LIMIT 0,20
ERROR - 2019-03-07 22:47:01 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '%'' at line 1 - Invalid query: select id,movie_name,movie_img from movie WHERE trim(movie_name) LIKE '%Lakshmi'%'
ERROR - 2019-03-07 22:47:09 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '%' OR video.rel_date LIKE '%Lakshmi'%' OR video.video_name LIKE '%Lakshmi'%' OR ' at line 6 - Invalid query: 

               SELECT video.id,video.rel_date,video.video_name,movie.movie_name,video.play,video.liked,video.youtube_views,sub_category.subcat_name,video_map_movie.movie_id,video.subcat_id,video.video_desc,video_url.final_url,video.is_deleted FROM video
               LEFT JOIN sub_category ON sub_category.id=video.subcat_id
               LEFT JOIN video_map_movie ON video_map_movie.video_id=video.id
               LEFT JOIN movie ON movie.id=video_map_movie.movie_id
               LEFT JOIN video_url ON video_url.id=video.seo_url_id
               where video.cat_id=1 AND video.is_deleted=0 AND  ( video.id LIKE '%Lakshmi'%' OR video.rel_date LIKE '%Lakshmi'%' OR video.video_name LIKE '%Lakshmi'%' OR movie.movie_name LIKE '%Lakshmi'%' OR video.play LIKE '%Lakshmi'%' OR video.liked LIKE '%Lakshmi'%' OR video.youtube_views LIKE '%Lakshmi'%' OR sub_category.subcat_name LIKE '%Lakshmi'%' OR video_map_movie.movie_id LIKE '%Lakshmi'%' OR video.subcat_id LIKE '%Lakshmi'%' OR video.video_desc LIKE '%Lakshmi'%' OR video_url.final_url LIKE '%Lakshmi'%' OR video.is_deleted LIKE '%Lakshmi'%' )
               ORDER BY video.rel_date desc
               LIMIT 0,10

            
