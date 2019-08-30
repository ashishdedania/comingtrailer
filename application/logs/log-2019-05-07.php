<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-05-07 00:09:16 --> Severity: Error --> Call to a member function update_user_profile() on a non-object /home/cominlvi/public_html/application/controllers/api/User.php 107
ERROR - 2019-05-07 00:21:09 --> Severity: Error --> Call to a member function update_user_profile() on a non-object /home/cominlvi/public_html/application/controllers/api/User.php 107
ERROR - 2019-05-07 00:25:14 --> Severity: error --> Exception: /home/cominlvi/public_html/application/models/Front_Model.php exists, but doesn't declare class Front_Model /home/cominlvi/public_html/system/core/Loader.php 336
ERROR - 2019-05-07 03:09:36 --> Unable to connect to the database
ERROR - 2019-05-07 03:09:36 --> Unable to connect to the database
ERROR - 2019-05-07 03:09:36 --> Unable to connect to the database
ERROR - 2019-05-07 14:14:34 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `user_activity` = 'liked' AND `shared_with` = ''' at line 3 - Invalid query: SELECT *
FROM `user_activity`
WHERE `user_id` = '' AND `cat_id` = '' AND `common_id` =  AND `user_activity` = 'liked' AND `shared_with` = ''
ERROR - 2019-05-07 14:15:38 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
ERROR - 2019-05-07 22:07:22 --> Query error: Cannot add or update a child row: a foreign key constraint fails (`cominlvi_trailer`.`user_activity`, CONSTRAINT `user_activity_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE) - Invalid query: INSERT INTO `user_activity` (`user_id`, `cat_id`, `common_id`, `user_activity`, `shared_with`, `earn_points`, `created`) VALUES ('3', '1', '109', 'play', '', '3', '2019-05-07 22:07:22')
ERROR - 2019-05-07 23:20:16 --> Query error: Illegal mix of collations for operation 'like' - Invalid query: 

               SELECT poster.id,poster.rel_date,poster.poster_name,movie.movie_name,poster.likes,poster.views,sub_category.subcat_name,poster_map_movie.movie_id,poster.subcat_id,poster.poster_desc,video_url.final_url,poster.is_deleted FROM poster
               LEFT JOIN sub_category ON sub_category.id=poster.subcat_id
               LEFT JOIN poster_map_movie ON poster_map_movie.poster_id=poster.id
               LEFT JOIN movie ON movie.id=poster_map_movie.movie_id
               LEFT JOIN video_url ON video_url.id=poster.seo_url_id
               where is_deleted=0 AND ( poster.id LIKE '%Bharat_TheFilm ⁩%' OR poster.rel_date LIKE '%Bharat_TheFilm ⁩%' OR poster.poster_name LIKE '%Bharat_TheFilm ⁩%' OR movie.movie_name LIKE '%Bharat_TheFilm ⁩%' OR poster.likes LIKE '%Bharat_TheFilm ⁩%' OR poster.views LIKE '%Bharat_TheFilm ⁩%' OR sub_category.subcat_name LIKE '%Bharat_TheFilm ⁩%' OR poster_map_movie.movie_id LIKE '%Bharat_TheFilm ⁩%' OR poster.subcat_id LIKE '%Bharat_TheFilm ⁩%' OR poster.poster_desc LIKE '%Bharat_TheFilm ⁩%' OR video_url.final_url LIKE '%Bharat_TheFilm ⁩%' OR poster.is_deleted LIKE '%Bharat_TheFilm ⁩%' )
               ORDER BY poster.rel_date desc
               LIMIT 0,10

            
ERROR - 2019-05-07 23:44:28 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
ERROR - 2019-05-07 23:49:52 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `user_activity` = 'liked' AND `shared_with` = ''' at line 3 - Invalid query: SELECT *
FROM `user_activity`
WHERE `user_id` = '' AND `cat_id` = '' AND `common_id` =  AND `user_activity` = 'liked' AND `shared_with` = ''
