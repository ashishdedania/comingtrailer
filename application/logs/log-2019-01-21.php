<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-01-21 01:00:20 --> Query error: Lost connection to MySQL server during query - Invalid query: 

     SELECT personality.id,personality.created,personality.personality_img,personality.personality_name,personality.status,(SELECT sum(case when (select count(movie_id) from movie_map_music where movie_map_music.movie_id = movie.id and movie_map_music.personality_id = personality.id) > 0 then 1 else 0 end) FROM movie)  as movie,(SELECT sum(case when (select count(video_id) from video_map_music where video_map_music.video_id = video.id and video_map_music.personality_id = personality.id) > 0 then 1 else 0 end) FROM video where video.cat_id = 2) as video,0 as poster,(SELECT sum(case when (select count(video_id) from video_map_music where video_map_music.video_id = video.id and video_map_music.personality_id = personality.id) > 0 then 1 else 0 end) FROM video where video.cat_id = 1) as trailer FROM personality     
     where personality.is_music_director = 1 and personality.status=0
     ORDER BY (SELECT sum(case when (select count(video_id) from video_map_music where video_map_music.video_id = video.id and video_map_music.personality_id = personality.id) > 0 then 1 else 0 end) FROM video where video.cat_id = 2) asc
     LIMIT 0,10

     
ERROR - 2019-01-21 01:00:20 --> Query error: MySQL server has gone away - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1548012620
WHERE `id` = '14covqauh7hc9umj5fn9mgnkev30mf6u'
ERROR - 2019-01-21 01:00:20 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('901916785d2d9947456e93a7812a35ab') AS ci_session_lock
ERROR - 2019-01-21 10:50:31 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `user_activity` = 'liked' AND `shared_with` = ''' at line 3 - Invalid query: SELECT *
FROM `user_activity`
WHERE `user_id` = '' AND `cat_id` = '' AND `common_id` =  AND `user_activity` = 'liked' AND `shared_with` = ''
ERROR - 2019-01-21 10:51:18 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
ERROR - 2019-01-21 17:46:03 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1548072918
WHERE `id` = '1391db5adf8078a7df44dd2cd3dc1157732cb64e'
ERROR - 2019-01-21 17:46:03 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('e39f674fe368def3b62b5506c62f6259') AS ci_session_lock
ERROR - 2019-01-21 17:46:03 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `adsense` AS `a`
WHERE `width` = '300'
AND `height` = '600'
ERROR - 2019-01-21 17:46:03 --> Query error: MySQL server has gone away - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1548072963
WHERE `id` = '9f63bfc2bd952df0b074fc9c4723f77e9b690d60'
ERROR - 2019-01-21 17:46:03 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('d9b8e084fd38d41d29577f5bd9ae3550') AS ci_session_lock
ERROR - 2019-01-21 17:46:48 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('51cea3fbd0836c7d4ff152327d6c6720c89e4c00', '207.46.13.163', 1548072964, '__ci_last_regenerate|i:1548072963;')
ERROR - 2019-01-21 17:46:48 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('c2b0c6810d7b4aa9362eccd7ed9b81d1') AS ci_session_lock
ERROR - 2019-01-21 17:46:48 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('b5d093015677a043e63f09006f3322a863fedce0', '168.235.197.18', 1548072963, '__ci_last_regenerate|i:1548072963;')
ERROR - 2019-01-21 17:46:48 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('c6e192412a3651a7d35ce701ada45c8c55c4cdbc', '66.249.79.167', 1548072964, '__ci_last_regenerate|i:1548072963;')
ERROR - 2019-01-21 17:46:48 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('0a91eb54909cda3fb6d66967a65bf545') AS ci_session_lock
ERROR - 2019-01-21 17:46:48 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1548072963
WHERE `id` = '7b38ce4d3176b7ba67ba0ef9ca11677984d87a92'
ERROR - 2019-01-21 17:46:48 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('47cd14ba6a9f8e64f735e7b32b46e0952b2877c9', '49.15.86.197', 1548072963, '__ci_last_regenerate|i:1548072963;')
ERROR - 2019-01-21 17:46:48 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('5c8ff62e1632179b546a26be7656065f') AS ci_session_lock
ERROR - 2019-01-21 17:46:48 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1548072963, `data` = '__ci_last_regenerate|i:1548072900;global_search_keyword|s:3:\"Kgf\";total_search_result|i:9;'
WHERE `id` = '73b6042ca98bb8dbc13c6f6738074b640f27d7a4'
ERROR - 2019-01-21 17:46:48 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('10944d2b8f78b8fecdfc985f55d275e9c57a0099', '42.110.128.241', 1548072966, '__ci_last_regenerate|i:1548072963;')
ERROR - 2019-01-21 17:46:48 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('7e4775c867e9d539d779de2a7b78e2e6') AS ci_session_lock
ERROR - 2019-01-21 17:46:48 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('46d815ce2d4c18f0db8c7acd5b6e923a') AS ci_session_lock
ERROR - 2019-01-21 17:46:48 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('c9c0c1e22891569820ffa86cda3c91ac') AS ci_session_lock
ERROR - 2019-01-21 17:46:48 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('ac6582429626d49a2c48275571825f81') AS ci_session_lock
ERROR - 2019-01-21 17:46:53 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('cb9bea07de25d1dfe6263f0d07c123c2340b010a', '141.0.8.106', 1548072967, '__ci_last_regenerate|i:1548072963;')
ERROR - 2019-01-21 17:46:53 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('4978eb7789b52d3f736c69d6c5e9e610') AS ci_session_lock
ERROR - 2019-01-21 17:46:53 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('6210b37da1ea211871db4034bb0f873fd6cf7056', '66.249.79.167', 1548072968, '__ci_last_regenerate|i:1548072963;')
ERROR - 2019-01-21 17:46:53 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('603297883e9b8b815e77b1722448f8a4') AS ci_session_lock
ERROR - 2019-01-21 17:47:33 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('2d4ed53fa3b3180746663270fbc1ba39032fb3eb', '106.200.53.214', 1548073008, '__ci_last_regenerate|i:1548073008;')
ERROR - 2019-01-21 17:47:33 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('498909e7a40926fe1be3993a164e7eeaec6121fa', '59.89.133.250', 1548073010, '__ci_last_regenerate|i:1548073008;')
ERROR - 2019-01-21 17:47:33 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('a9e8b63ed6b3bcb472e2398091e8ca4b') AS ci_session_lock
ERROR - 2019-01-21 17:47:33 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('35cf865cf2394b7faaf63bbca5ec4352') AS ci_session_lock
ERROR - 2019-01-21 17:47:34 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('f2e26e952f027c6c91e91ad0f7e813c63be86a29', '137.59.84.14', 1548073008, '__ci_last_regenerate|i:1548073008;')
ERROR - 2019-01-21 17:47:34 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('19a97af976b961a298ebe210fcbd3ad6') AS ci_session_lock
ERROR - 2019-01-21 17:47:39 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('9267c97cb52078fdb994ab75fc19aabb622f1376', '106.67.93.133', 1548073013, '__ci_last_regenerate|i:1548073008;')
ERROR - 2019-01-21 17:47:39 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('ee981b46d7ba6af606b4d833981b56cac54845c4', '207.46.13.130', 1548073012, '__ci_last_regenerate|i:1548073008;')
ERROR - 2019-01-21 17:47:39 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('ac76ed0b20a2dbbfce7b8200afba98b2') AS ci_session_lock
ERROR - 2019-01-21 17:47:39 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('90c38ace9f3674bd2cd87a05d6352f1d') AS ci_session_lock
ERROR - 2019-01-21 17:47:39 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('b0ee038fe9b37249105596c469487e51791b0b2d', '157.55.39.240', 1548073015, '__ci_last_regenerate|i:1548073013;')
ERROR - 2019-01-21 17:47:39 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('3ba3f9da71fd5d79c2478eeb19cfe464') AS ci_session_lock
ERROR - 2019-01-21 17:48:19 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('025e959543003bbacbaee9d2d263e9302309bff5', '66.249.79.167', 1548073054, '__ci_last_regenerate|i:1548073054;')
ERROR - 2019-01-21 17:48:19 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('bf59aba42440d0eca81b1956b3c1b20d') AS ci_session_lock
ERROR - 2019-01-21 17:48:19 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('23ac460adda8d8198214d3c8a67e20e98066fb44', '66.249.79.167', 1548073055, '__ci_last_regenerate|i:1548073054;')
ERROR - 2019-01-21 17:48:19 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('489a8d0e0ed6e5c3268db77545a53363') AS ci_session_lock
ERROR - 2019-01-21 17:48:19 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('3167441de3c09d4aac4e2112c6aabe735923a057', '121.244.55.44', 1548073054, '__ci_last_regenerate|i:1548073054;')
ERROR - 2019-01-21 17:48:19 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('67897270f2e9a8df95eb8748921aaff0') AS ci_session_lock
ERROR - 2019-01-21 17:48:19 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('85fb0c7714d5ab5db444af775b613d8848f6b4c0', '207.46.13.163', 1548073054, '__ci_last_regenerate|i:1548073054;')
ERROR - 2019-01-21 17:48:19 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('7bcaa50781ffc95affdbb4ee833564c1') AS ci_session_lock
ERROR - 2019-01-21 17:48:39 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('2d4ed53fa3b3180746663270fbc1ba39032fb3eb', '106.200.53.214', 1548073077, '__ci_last_regenerate|i:1548073077;')
ERROR - 2019-01-21 17:48:39 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('a9e8b63ed6b3bcb472e2398091e8ca4b') AS ci_session_lock
