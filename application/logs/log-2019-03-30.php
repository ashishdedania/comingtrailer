<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-03-30 01:00:33 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 's%' OR video.rel_date LIKE '%Lakshmi's%' OR video.video_name LIKE '%Lakshmi's%' ' at line 6 - Invalid query: 

               SELECT video.id,video.rel_date,video.video_name,video.video_thumb,movie.movie_name,video.play,video.liked,video.youtube_views,sub_category.subcat_name,video_map_movie.movie_id,video.subcat_id,video.video_desc,video_url.final_url,video.is_deleted FROM video
               LEFT JOIN sub_category ON sub_category.id=video.subcat_id
               LEFT JOIN video_map_movie ON video_map_movie.video_id=video.id
               LEFT JOIN movie ON movie.id=video_map_movie.movie_id
               LEFT JOIN video_url ON video_url.id=video.seo_url_id
               where video.cat_id=1 AND video.is_deleted=0 AND  ( video.id LIKE '%Lakshmi's%' OR video.rel_date LIKE '%Lakshmi's%' OR video.video_name LIKE '%Lakshmi's%' OR video.video_thumb LIKE '%Lakshmi's%' OR movie.movie_name LIKE '%Lakshmi's%' OR video.play LIKE '%Lakshmi's%' OR video.liked LIKE '%Lakshmi's%' OR video.youtube_views LIKE '%Lakshmi's%' OR sub_category.subcat_name LIKE '%Lakshmi's%' OR video_map_movie.movie_id LIKE '%Lakshmi's%' OR video.subcat_id LIKE '%Lakshmi's%' OR video.video_desc LIKE '%Lakshmi's%' OR video_url.final_url LIKE '%Lakshmi's%' OR video.is_deleted LIKE '%Lakshmi's%' )
               ORDER BY video.rel_date desc
               LIMIT 0,10

            
ERROR - 2019-03-30 01:00:37 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 's%' OR video.rel_date LIKE '%Lakshmi's%' OR video.video_name LIKE '%Lakshmi's%' ' at line 6 - Invalid query: 

               SELECT video.id,video.rel_date,video.video_name,video.video_thumb,movie.movie_name,video.play,video.liked,video.youtube_views,sub_category.subcat_name,video_map_movie.movie_id,video.subcat_id,video.video_desc,video_url.final_url,video.is_deleted FROM video
               LEFT JOIN sub_category ON sub_category.id=video.subcat_id
               LEFT JOIN video_map_movie ON video_map_movie.video_id=video.id
               LEFT JOIN movie ON movie.id=video_map_movie.movie_id
               LEFT JOIN video_url ON video_url.id=video.seo_url_id
               where video.cat_id=1 AND video.is_deleted=0 AND  ( video.id LIKE '%Lakshmi's%' OR video.rel_date LIKE '%Lakshmi's%' OR video.video_name LIKE '%Lakshmi's%' OR video.video_thumb LIKE '%Lakshmi's%' OR movie.movie_name LIKE '%Lakshmi's%' OR video.play LIKE '%Lakshmi's%' OR video.liked LIKE '%Lakshmi's%' OR video.youtube_views LIKE '%Lakshmi's%' OR sub_category.subcat_name LIKE '%Lakshmi's%' OR video_map_movie.movie_id LIKE '%Lakshmi's%' OR video.subcat_id LIKE '%Lakshmi's%' OR video.video_desc LIKE '%Lakshmi's%' OR video_url.final_url LIKE '%Lakshmi's%' OR video.is_deleted LIKE '%Lakshmi's%' )
               ORDER BY video.rel_date desc
               LIMIT 0,10

            
ERROR - 2019-03-30 12:57:55 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `user_activity` = 'liked' AND `shared_with` = ''' at line 3 - Invalid query: SELECT *
FROM `user_activity`
WHERE `user_id` = '' AND `cat_id` = '' AND `common_id` =  AND `user_activity` = 'liked' AND `shared_with` = ''
ERROR - 2019-03-30 12:57:55 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
ERROR - 2019-03-30 22:18:37 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
