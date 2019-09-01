<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-03-20 00:41:52 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `user_activity` = 'liked' AND `shared_with` = ''' at line 3 - Invalid query: SELECT *
FROM `user_activity`
WHERE `user_id` = '' AND `cat_id` = '' AND `common_id` =  AND `user_activity` = 'liked' AND `shared_with` = ''
ERROR - 2019-03-20 01:31:52 --> Query error: Lost connection to MySQL server during query - Invalid query: 

     SELECT personality.id,personality.created,personality.personality_img,personality.personality_name,personality.status,(SELECT sum(case when (select count(movie_id) from movie_map_cast where movie_map_cast.movie_id = movie.id and movie_map_cast.personality_id = personality.id) > 0 then 1 else 0 end) FROM movie)  as movie,(SELECT sum(case when (select count(video_id) from video_map_cast where video_map_cast.video_id = video.id and video_map_cast.personality_id = personality.id) > 0 then 1  else 0 end) FROM video where video.cat_id = 2) as video,(SELECT sum(case when (select count(poster_id) from poster_map_cast where poster_map_cast.poster_id = poster.id and poster_map_cast.personality_id = personality.id) > 0 then 1 else 0 end) FROM poster) as poster,(SELECT sum(case when (select count(video_id) from video_map_cast where video_map_cast.video_id = video.id and video_map_cast.personality_id = personality.id) > 0 then 1 else 0 end) FROM video where video.cat_id = 1) as trailer FROM personality     
     where personality.is_cast = 1 and personality.status=0
     ORDER BY (SELECT sum(case when (select count(video_id) from video_map_cast where video_map_cast.video_id = video.id and video_map_cast.personality_id = personality.id) > 0 then 1  else 0 end) FROM video where video.cat_id = 2) asc
     LIMIT 0,10

     
ERROR - 2019-03-20 01:31:52 --> Query error: MySQL server has gone away - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1553025712
WHERE `id` = '36f46eda80aa433a22b9a9a4df2259cfb263c952'
ERROR - 2019-03-20 01:31:52 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('5b0505843672512ebd89b338493e1f84') AS ci_session_lock
ERROR - 2019-03-20 01:48:00 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
ERROR - 2019-03-20 13:41:11 --> Unable to connect to the database
ERROR - 2019-03-20 13:41:13 --> Unable to connect to the database
ERROR - 2019-03-20 13:41:13 --> Unable to connect to the database
ERROR - 2019-03-20 13:41:15 --> Unable to connect to the database
ERROR - 2019-03-20 13:41:21 --> Unable to connect to the database
ERROR - 2019-03-20 14:12:21 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('80d68508795e5396db4289b7a3e9afef', 300) AS ci_session_lock
ERROR - 2019-03-20 14:12:21 --> Query error: MySQL server has gone away - Invalid query: SELECT `data`
FROM `ci_sessions`
WHERE `id` = '27bc48ec723b6afc28dc019946b9f1edf3fe3dee'
ERROR - 2019-03-20 14:12:21 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('80d68508795e5396db4289b7a3e9afef') AS ci_session_lock
ERROR - 2019-03-20 14:12:21 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT *, `b`.`id` AS `subcat_id`
FROM `cat_map_subcat` AS `a`
INNER JOIN `sub_category` AS `b` ON `a`.`subcat_id` = `b`.`id`
WHERE `a`.`cat_id` = '2'
ERROR - 2019-03-20 14:12:21 --> Query error: MySQL server has gone away - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1553071341
WHERE `id` = '27bc48ec723b6afc28dc019946b9f1edf3fe3dee'
ERROR - 2019-03-20 14:12:21 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('80d68508795e5396db4289b7a3e9afef') AS ci_session_lock
ERROR - 2019-03-20 14:12:21 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('80d68508795e5396db4289b7a3e9afef', 300) AS ci_session_lock
ERROR - 2019-03-20 14:12:21 --> Query error: MySQL server has gone away - Invalid query: SELECT `data`
FROM `ci_sessions`
WHERE `id` = '27bc48ec723b6afc28dc019946b9f1edf3fe3dee'
ERROR - 2019-03-20 14:12:21 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('80d68508795e5396db4289b7a3e9afef') AS ci_session_lock
