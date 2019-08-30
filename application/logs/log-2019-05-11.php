<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-05-11 00:28:03 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 's Most Wanted%' OR video.rel_date LIKE '%India's Most Wanted%' OR video.video_na' at line 6 - Invalid query: 

               SELECT video.id,video.rel_date,video.video_name,video.video_thumb,movie.movie_name,video.play,video.liked,video.youtube_views,sub_category.subcat_name,video_map_movie.movie_id,video.subcat_id,video.video_desc,video_url.final_url,video.is_deleted FROM video
               LEFT JOIN sub_category ON sub_category.id=video.subcat_id
               LEFT JOIN video_map_movie ON video_map_movie.video_id=video.id
               LEFT JOIN movie ON movie.id=video_map_movie.movie_id
               LEFT JOIN video_url ON video_url.id=video.seo_url_id
               where video.cat_id=1 AND video.is_deleted=0 AND  ( video.id LIKE '%India's Most Wanted%' OR video.rel_date LIKE '%India's Most Wanted%' OR video.video_name LIKE '%India's Most Wanted%' OR video.video_thumb LIKE '%India's Most Wanted%' OR movie.movie_name LIKE '%India's Most Wanted%' OR video.play LIKE '%India's Most Wanted%' OR video.liked LIKE '%India's Most Wanted%' OR video.youtube_views LIKE '%India's Most Wanted%' OR sub_category.subcat_name LIKE '%India's Most Wanted%' OR video_map_movie.movie_id LIKE '%India's Most Wanted%' OR video.subcat_id LIKE '%India's Most Wanted%' OR video.video_desc LIKE '%India's Most Wanted%' OR video_url.final_url LIKE '%India's Most Wanted%' OR video.is_deleted LIKE '%India's Most Wanted%' ) AND video.subcat_id=1
               ORDER BY video.rel_date desc
               LIMIT 0,10

            
ERROR - 2019-05-11 00:29:17 --> Query error: Unknown column 'playlist.name1' in 'where clause' - Invalid query: 
                   SELECT playlist.id,playlist.created,playlist.name,playlist.playlist_thumb,playlist.show_in_app,playlist.is_deleted,playlist.redirect_link,playlist.subcat_id FROM playlist                
                   where playlist.is_deleted=0 and playlist.name1 like '%ajay%'  order by playlist.created DESC 
                   
                
ERROR - 2019-05-11 00:29:36 --> Severity: error --> Exception: /home/cominlvi/public_html/application/models/Front_Model.php exists, but doesn't declare class Front_Model /home/cominlvi/public_html/system/core/Loader.php 336
