<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-09-25 07:16:40 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
ERROR - 2018-09-25 11:06:49 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `user_activity` = 'liked' AND `shared_with` = ''' at line 3 - Invalid query: SELECT *
FROM `user_activity`
WHERE `user_id` = '' AND `cat_id` = '' AND `common_id` =  AND `user_activity` = 'liked' AND `shared_with` = ''
ERROR - 2018-09-25 11:18:19 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
ERROR - 2018-09-25 15:12:17 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'LIMIT ,' at line 5 - Invalid query: 

     SELECT cast.id,cast.created,cast.cast_name,cast.cast_img,video_url.final_url,cast.status,(SELECT count(distinct movie_id) FROM `movie_map_cast` where movie_map_cast.cast_id = cast.id)  as movie,(SELECT count(distinct video_id) FROM video INNER JOIN `video_map_cast` on video_map_cast.video_id = video.id where video_map_cast.cast_id = cast.id and video.cat_id = 2) as video,(SELECT count(distinct poster_id) FROM `poster_map_cast` where poster_map_cast.cast_id = cast.id) as poster,(SELECT count(distinct video_id) FROM video INNER JOIN `video_map_cast` on video_map_cast.video_id = video.id where video_map_cast.cast_id = cast.id and video.cat_id = 1) as trailer FROM cast
     LEFT JOIN video_url ON video_url.id=cast.seo_url_id
     where cast.status=0
     ORDER BY  
     LIMIT ,

     
ERROR - 2018-09-25 17:50:05 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `video` SET `youtube_views` = '725939'
WHERE `id` = '3434'
ERROR - 2018-09-25 17:50:05 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('221e6fea13e4cee8e4f9890d55e6cfd3b93dff2b', '43.225.54.56', 1537878005, '__ci_last_regenerate|i:1537877884;')
ERROR - 2018-09-25 17:50:05 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('a4c17c8bd9ce3adf84ed3e09638bb292') AS ci_session_lock
ERROR - 2018-09-25 17:50:05 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('02360e8d481e49797febed39a03f534fba6dd900', '157.55.39.251', 1537877962, '__ci_last_regenerate|i:1537877962;')
ERROR - 2018-09-25 17:50:05 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('6dfdf7657da9f0b52820f8e13f6c728a') AS ci_session_lock
ERROR - 2018-09-25 17:50:05 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `director`
WHERE `id` = '2252'
AND `status` =0
ERROR - 2018-09-25 17:50:05 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('ca0beacd3832ba51bb725af7548bb1994a0ff16a', '66.249.79.188', 1537878005, '__ci_last_regenerate|i:1537878005;')
ERROR - 2018-09-25 17:50:05 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('ea809a2d601e44dd15177a6c0d078564') AS ci_session_lock
ERROR - 2018-09-25 17:50:50 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('1f0d80c94d9e2552c253eb84958789eea077501d', '66.249.79.186', 1537878006, '__ci_last_regenerate|i:1537878005;')
ERROR - 2018-09-25 17:50:50 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('de18f4726def6fea8afe6a43879d1869') AS ci_session_lock
ERROR - 2018-09-25 17:51:35 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('7b129b23db17d95c177c94cb64e63283563aab16', '66.249.79.186', 1537878050, '__ci_last_regenerate|i:1537878050;')
ERROR - 2018-09-25 17:51:35 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('1e9087cd57688cd3d9cd1e47c21bbcd2') AS ci_session_lock
ERROR - 2018-09-25 17:51:35 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `adsense` AS `a`
WHERE `width` = '300'
AND `height` = '600'
ERROR - 2018-09-25 17:51:35 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('07f9b08e3647f760dd17fd6cf4f8f1ea2b5906f6', '43.225.54.56', 1537878095, '__ci_last_regenerate|i:1537878095;')
ERROR - 2018-09-25 17:51:35 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('c0d0dec31eeb4995310dbfc3a0e1ff85') AS ci_session_lock
ERROR - 2018-09-25 17:52:20 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('d147a508ebaf3dbf595ee73ffe47d22c3f619392', '66.249.79.186', 1537878095, '__ci_last_regenerate|i:1537878095;')
ERROR - 2018-09-25 17:52:20 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('aa5579a25c1624ec27d1cf2f09efcced') AS ci_session_lock
ERROR - 2018-09-25 17:52:20 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `adsense` AS `a`
WHERE `width` = '300'
AND `height` = '600'
ERROR - 2018-09-25 17:52:20 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('9a095b4cafd29b0fe1c27157139df8a2f1662f54', '43.225.54.56', 1537878140, '__ci_last_regenerate|i:1537878140;')
ERROR - 2018-09-25 17:52:20 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('49c14a8b5c2074c30fc7b1a00e48f12a') AS ci_session_lock
ERROR - 2018-09-25 19:53:02 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('4a64ebeb3d58e84f51027d3b7dd2f813277b86e9', '43.225.54.56', 1537885382, '__ci_last_regenerate|i:1537885086;')
ERROR - 2018-09-25 19:53:02 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('9b677c17ae6179a8d85e66b60766e5c6') AS ci_session_lock
ERROR - 2018-09-25 20:00:39 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('ddcdd9f3290a4d335c9083d9f1f4d216', 300) AS ci_session_lock
ERROR - 2018-09-25 21:32:40 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('5d6f121a7e723b93e0913abbb25b7d49', 300) AS ci_session_lock
ERROR - 2018-09-25 21:33:20 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('5d6f121a7e723b93e0913abbb25b7d49', 300) AS ci_session_lock
