<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-10-10 00:48:17 --> Severity: Error --> Cannot use object of type stdClass as array /home/cominlvi/public_html/application/controllers/Search.php 33
ERROR - 2018-10-10 02:30:33 --> Query error: Unknown column 'video_map_movie.movie_id' in 'field list' - Invalid query: 

               SELECT video.id,video.rel_date,video.video_name,movie.movie_name,video.play,video.liked,video.youtube_views,sub_category.subcat_name,video_map_movie.movie_id,video.subcat_id,video.video_desc,video_url.final_url,video.is_deleted FROM video
               LEFT JOIN sub_category ON sub_category.id=video.subcat_id
               LEFT JOIN video_url ON video_url.id=video.seo_url_id
               
               LEFT JOIN movie ON movie.id=video_map_movie.movie_id
               where video.cat_id=1 
               
               ORDER BY video.rel_date desc
               LIMIT 0,10

            
ERROR - 2018-10-10 02:30:33 --> Query error: Unknown column 'video_map_movie.movie_id' in 'field list' - Invalid query: 

               SELECT video.id,video.rel_date,video.video_name,movie.movie_name,video.play,video.liked,video.youtube_views,sub_category.subcat_name,video_map_movie.movie_id,video.subcat_id,video.video_desc,video_url.final_url,video.is_deleted FROM video
               LEFT JOIN sub_category ON sub_category.id=video.subcat_id
               LEFT JOIN video_url ON video_url.id=video.seo_url_id
               
               LEFT JOIN movie ON movie.id=video_map_movie.movie_id
               where video.cat_id=2 
               
               ORDER BY video.rel_date desc
               LIMIT 0,10

            
ERROR - 2018-10-10 05:09:44 --> Unable to connect to the database
ERROR - 2018-10-10 05:09:44 --> Unable to connect to the database
ERROR - 2018-10-10 05:09:44 --> Unable to connect to the database
ERROR - 2018-10-10 05:09:44 --> Unable to connect to the database
ERROR - 2018-10-10 05:09:44 --> Unable to connect to the database
ERROR - 2018-10-10 05:09:44 --> Unable to connect to the database
ERROR - 2018-10-10 05:09:44 --> Unable to connect to the database
ERROR - 2018-10-10 06:31:10 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `video` SET `youtube_views` = '313044'
WHERE `id` = '84'
ERROR - 2018-10-10 06:31:10 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('3643c1309a045ba067f8955432c5fc5a9b2562ae', '43.225.54.56', 1539133270, '__ci_last_regenerate|i:1539133206;')
ERROR - 2018-10-10 06:31:10 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('2ba6756e488ec7665ef7c136d7bbc811') AS ci_session_lock
ERROR - 2018-10-10 06:31:20 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('55aeea444aa85912b5b2f82d758293b0e351908b', '66.249.79.186', 1539133237, '__ci_last_regenerate|i:1539133237;')
ERROR - 2018-10-10 06:31:20 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('66e868d211e827b1aafdfef72841b937') AS ci_session_lock
ERROR - 2018-10-10 06:31:25 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('44f7acb94dac0aaa00ef19c6de796fdae816bd43', '66.249.79.186', 1539133239, '__ci_last_regenerate|i:1539133220;')
ERROR - 2018-10-10 06:31:25 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('5f27ace750650cce429e34cc7b98ddee') AS ci_session_lock
ERROR - 2018-10-10 06:32:05 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('83cf71b63e2cd822762248c6627ccdac207fe9a5', '66.249.79.186', 1539133282, '__ci_last_regenerate|i:1539133280;')
ERROR - 2018-10-10 06:32:05 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('0d30e7eb3c2ad7d47e85df79a64120b1') AS ci_session_lock
ERROR - 2018-10-10 06:32:05 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('c72360ed26b4a5a8b65e88cc092ffa4d2c9b6810', '66.249.79.186', 1539133282, '__ci_last_regenerate|i:1539133280;')
ERROR - 2018-10-10 06:32:05 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('47a14289edf15d0add5ff8c3491b9074') AS ci_session_lock
ERROR - 2018-10-10 07:56:46 --> Unable to connect to the database
ERROR - 2018-10-10 07:56:46 --> Unable to connect to the database
ERROR - 2018-10-10 07:56:46 --> Unable to connect to the database
ERROR - 2018-10-10 07:56:46 --> Unable to connect to the database
ERROR - 2018-10-10 10:01:51 --> Unable to connect to the database
ERROR - 2018-10-10 11:48:02 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('29d0507702f94e5443ed12af57c657aa', 300) AS ci_session_lock
ERROR - 2018-10-10 13:08:54 --> Unable to connect to the database
ERROR - 2018-10-10 13:08:54 --> Unable to connect to the database
ERROR - 2018-10-10 13:08:54 --> Unable to connect to the database
ERROR - 2018-10-10 13:08:55 --> Unable to connect to the database
ERROR - 2018-10-10 13:08:55 --> Unable to connect to the database
ERROR - 2018-10-10 13:08:55 --> Unable to connect to the database
ERROR - 2018-10-10 14:38:32 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
ERROR - 2018-10-10 18:33:20 --> Unable to connect to the database
ERROR - 2018-10-10 18:33:20 --> Unable to connect to the database
ERROR - 2018-10-10 18:33:20 --> Unable to connect to the database
ERROR - 2018-10-10 18:33:21 --> Unable to connect to the database
ERROR - 2018-10-10 18:33:21 --> Unable to connect to the database
ERROR - 2018-10-10 18:33:21 --> Unable to connect to the database
ERROR - 2018-10-10 18:33:21 --> Unable to connect to the database
ERROR - 2018-10-10 18:33:21 --> Unable to connect to the database
