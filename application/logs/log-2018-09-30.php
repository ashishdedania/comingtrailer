<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-09-30 03:59:05 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `video` SET `youtube_views` = '4024513'
WHERE `id` = '4661'
ERROR - 2018-09-30 03:59:05 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('3m166ntgarqg1bk38i669ru7ftvoopl9', '43.225.54.56', 1538260145, '__ci_last_regenerate|i:1538259847;')
ERROR - 2018-09-30 03:59:05 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('741ddc712215bc52f8be3a4f756f49b7') AS ci_session_lock
ERROR - 2018-09-30 03:59:05 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('fduduenemkrq919kakknmi0li6julrmp', '43.225.54.56', 1538260103, '__ci_last_regenerate|i:1538260103;')
ERROR - 2018-09-30 03:59:05 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('6893eb4427d48981be1da855b2e0c9b9') AS ci_session_lock
ERROR - 2018-09-30 07:33:40 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('8638c92bde5ae65b4523fefe1c217159', 300) AS ci_session_lock
ERROR - 2018-09-30 07:34:00 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('8638c92bde5ae65b4523fefe1c217159', 300) AS ci_session_lock
ERROR - 2018-09-30 08:21:55 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('e9731296b0e0273af11b6d6604a4171d', 300) AS ci_session_lock
ERROR - 2018-09-30 12:04:12 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('2fdabf0a9ee7360ba7df600e91ae22d0', 300) AS ci_session_lock
ERROR - 2018-09-30 12:04:17 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('2fdabf0a9ee7360ba7df600e91ae22d0', 300) AS ci_session_lock
ERROR - 2018-09-30 14:01:15 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('190be6393e8b6a71be966891b32b51e2', 300) AS ci_session_lock
ERROR - 2018-09-30 15:06:03 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
ERROR - 2018-09-30 18:10:04 --> Query error: Unknown column '6176user_activity.created' in 'where clause' - Invalid query: SELECT user_activity.created as created,(case when (cat_id = 1 OR cat_id = 2) then (select video.video_name from video where video.id = user_activity.common_id) when cat_id = 3 then (select poster.poster_name from poster where poster.id = user_activity.common_id) else "" end) as name,(case when cat_id = 1 then "Trailer" when cat_id = 2 then "Video" when cat_id = 3 then "Poster" else "" end) as category FROM `user_activity` where user_activity = "liked" and user_id = 6176user_activity.created BETWEEN 2018-09-30 and 2018-09-30 ORDER BY user_activity.created desc LIMIT 0,10
ERROR - 2018-09-30 20:33:08 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `user_activity` = 'liked' AND `shared_with` = ''' at line 3 - Invalid query: SELECT *
FROM `user_activity`
WHERE `user_id` = '' AND `cat_id` = '' AND `common_id` =  AND `user_activity` = 'liked' AND `shared_with` = ''
ERROR - 2018-09-30 20:41:32 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
