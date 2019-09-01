<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-02-19 04:06:50 --> Unable to connect to the database
ERROR - 2019-02-19 04:06:50 --> Unable to connect to the database
ERROR - 2019-02-19 04:06:50 --> Unable to connect to the database
ERROR - 2019-02-19 04:06:50 --> Unable to connect to the database
ERROR - 2019-02-19 14:11:15 --> Query error: Column 'category' cannot be null - Invalid query: INSERT INTO `contact_us_data` (`first_name`, `last_name`, `email`, `phone`, `category`, `message`, `created`) VALUES ('Jack Diamond', 'Jack Diamond', 'jack@leadgenerationonsterods.com', '2129094428', NULL, NULL, '2019-02-19 14:11:15')
ERROR - 2019-02-19 14:44:59 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `user_activity` = 'liked' AND `shared_with` = ''' at line 3 - Invalid query: SELECT *
FROM `user_activity`
WHERE `user_id` = '' AND `cat_id` = '' AND `common_id` =  AND `user_activity` = 'liked' AND `shared_with` = ''
ERROR - 2019-02-19 14:48:03 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
ERROR - 2019-02-19 17:35:49 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `video` SET `youtube_views` = '59741'
WHERE `id` = '1307'
ERROR - 2019-02-19 17:35:49 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('4ead9b433547d58b223d5417ff055b127a73ed7c', '43.225.54.56', 1550577949, '__ci_last_regenerate|i:1550577663;')
ERROR - 2019-02-19 17:35:49 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('f0900ab368378256c72004cd48dc6a4e') AS ci_session_lock
ERROR - 2019-02-19 17:35:49 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `video` SET `youtube_views` = '26110'
WHERE `id` = '3293'
ERROR - 2019-02-19 17:35:49 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `video` SET `youtube_views` = '844609'
WHERE `id` = '2283'
ERROR - 2019-02-19 17:35:49 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('93fb95b5690681b1288a4206552d204d935696ac', '43.225.54.56', 1550577949, '__ci_last_regenerate|i:1550577784;')
ERROR - 2019-02-19 17:35:49 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('8c411891edcb7808810a825d6bc7cf3d') AS ci_session_lock
ERROR - 2019-02-19 17:35:49 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('bce53a07b3331887b5f9f75202648b13b87114db', '43.225.54.56', 1550577949, '__ci_last_regenerate|i:1550577725;')
ERROR - 2019-02-19 17:35:49 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('baf820176355ebe9d9f857de925d63ba') AS ci_session_lock
ERROR - 2019-02-19 17:35:49 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `video` SET `youtube_views` = '1400835'
WHERE `id` = '4284'
ERROR - 2019-02-19 17:35:49 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('ea462006ddfc8f9cbebcb8e9613c8baaa746bf8d', '43.225.54.56', 1550577949, '__ci_last_regenerate|i:1550577845;')
ERROR - 2019-02-19 17:35:49 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('99fa4842614f920f4afe766ecb2e09d4') AS ci_session_lock
ERROR - 2019-02-19 21:32:08 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '%' OR video.rel_date LIKE '%Laxmi Raai'%' OR video.video_name LIKE '%Laxmi Raai'' at line 6 - Invalid query: 

               SELECT video.id,video.rel_date,video.video_name,movie.movie_name,video.play,video.liked,video.youtube_views,sub_category.subcat_name,video_map_movie.movie_id,video.subcat_id,video.video_desc,video_url.final_url,video.is_deleted FROM video
               LEFT JOIN sub_category ON sub_category.id=video.subcat_id
               LEFT JOIN video_map_movie ON video_map_movie.video_id=video.id
               LEFT JOIN movie ON movie.id=video_map_movie.movie_id
               LEFT JOIN video_url ON video_url.id=video.seo_url_id
               where video.cat_id=1 AND video.is_deleted=0 AND  ( video.id LIKE '%Laxmi Raai'%' OR video.rel_date LIKE '%Laxmi Raai'%' OR video.video_name LIKE '%Laxmi Raai'%' OR movie.movie_name LIKE '%Laxmi Raai'%' OR video.play LIKE '%Laxmi Raai'%' OR video.liked LIKE '%Laxmi Raai'%' OR video.youtube_views LIKE '%Laxmi Raai'%' OR sub_category.subcat_name LIKE '%Laxmi Raai'%' OR video_map_movie.movie_id LIKE '%Laxmi Raai'%' OR video.subcat_id LIKE '%Laxmi Raai'%' OR video.video_desc LIKE '%Laxmi Raai'%' OR video_url.final_url LIKE '%Laxmi Raai'%' OR video.is_deleted LIKE '%Laxmi Raai'%' )
               ORDER BY video.rel_date desc
               LIMIT 0,10

            
ERROR - 2019-02-19 22:09:02 --> Unable to connect to the database
ERROR - 2019-02-19 22:09:03 --> Unable to connect to the database
ERROR - 2019-02-19 22:09:04 --> Unable to connect to the database
ERROR - 2019-02-19 22:09:04 --> Unable to connect to the database
ERROR - 2019-02-19 22:09:06 --> Unable to connect to the database
ERROR - 2019-02-19 22:09:07 --> Unable to connect to the database
ERROR - 2019-02-19 22:09:09 --> Unable to connect to the database
