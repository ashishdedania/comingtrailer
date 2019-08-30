<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-03-11 00:43:17 --> Query error: Unknown column 'is_all' in 'where clause' - Invalid query: select count(id) as tot from personality where is_all = 1 and status=0
ERROR - 2019-03-11 16:35:29 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `user_activity` = 'liked' AND `shared_with` = ''' at line 3 - Invalid query: SELECT *
FROM `user_activity`
WHERE `user_id` = '' AND `cat_id` = '' AND `common_id` =  AND `user_activity` = 'liked' AND `shared_with` = ''
ERROR - 2019-03-11 16:37:28 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
ERROR - 2019-03-11 16:38:35 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `user_activity` = 'liked' AND `shared_with` = ''' at line 3 - Invalid query: SELECT *
FROM `user_activity`
WHERE `user_id` = '' AND `cat_id` = '' AND `common_id` =  AND `user_activity` = 'liked' AND `shared_with` = ''
ERROR - 2019-03-11 16:38:47 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
ERROR - 2019-03-11 16:46:51 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
ERROR - 2019-03-11 17:09:58 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
ERROR - 2019-03-11 18:30:19 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `user_activity` = 'liked' AND `shared_with` = ''' at line 3 - Invalid query: SELECT *
FROM `user_activity`
WHERE `user_id` = '' AND `cat_id` = '' AND `common_id` =  AND `user_activity` = 'liked' AND `shared_with` = ''
ERROR - 2019-03-11 23:27:10 --> Query error: Illegal mix of collations for operation 'like' - Invalid query: 

               SELECT poster.id,poster.rel_date,poster.poster_name,movie.movie_name,poster.likes,poster.views,sub_category.subcat_name,poster_map_movie.movie_id,poster.subcat_id,poster.poster_desc,video_url.final_url,poster.is_deleted FROM poster
               LEFT JOIN sub_category ON sub_category.id=poster.subcat_id
               LEFT JOIN poster_map_movie ON poster_map_movie.poster_id=poster.id
               LEFT JOIN movie ON movie.id=poster_map_movie.movie_id
               LEFT JOIN video_url ON video_url.id=poster.seo_url_id
               where is_deleted=0 AND ( poster.id LIKE '%rahmāstra%' OR poster.rel_date LIKE '%rahmāstra%' OR poster.poster_name LIKE '%rahmāstra%' OR movie.movie_name LIKE '%rahmāstra%' OR poster.likes LIKE '%rahmāstra%' OR poster.views LIKE '%rahmāstra%' OR sub_category.subcat_name LIKE '%rahmāstra%' OR poster_map_movie.movie_id LIKE '%rahmāstra%' OR poster.subcat_id LIKE '%rahmāstra%' OR poster.poster_desc LIKE '%rahmāstra%' OR video_url.final_url LIKE '%rahmāstra%' OR poster.is_deleted LIKE '%rahmāstra%' )
               ORDER BY poster.rel_date desc
               LIMIT 0,10

            
