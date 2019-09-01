<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-12-11 06:24:40 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `user_activity` = 'liked' AND `shared_with` = ''' at line 3 - Invalid query: SELECT *
FROM `user_activity`
WHERE `user_id` = '' AND `cat_id` = '' AND `common_id` =  AND `user_activity` = 'liked' AND `shared_with` = ''
ERROR - 2018-12-11 06:24:42 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
ERROR - 2018-12-11 17:53:00 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `video` SET `youtube_views` = '43937'
WHERE `id` = '4160'
ERROR - 2018-12-11 17:53:00 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('dd98007e7902bfd2fd8e02e18461294acca0fe54', '43.225.54.56', 1544530980, '__ci_last_regenerate|i:1544530683;')
ERROR - 2018-12-11 17:53:00 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('a4dc8eb64b5cd4bab0a28cd5f7f70d18') AS ci_session_lock
ERROR - 2018-12-11 17:53:05 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('0d81a108c9af629ec8dbe266d9543901d19a9d37', '40.77.167.41', 1544530942, '__ci_last_regenerate|i:1544530942;')
ERROR - 2018-12-11 17:53:05 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('c5f86995cb816fd08f8a2ee327bdeadb') AS ci_session_lock
ERROR - 2018-12-11 17:53:50 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('b23b7181ab712e4a3bb0512a870f507c6a948ab7', '112.133.244.124', 1544530985, '__ci_last_regenerate|i:1544530985;')
ERROR - 2018-12-11 17:53:50 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('26d3a6364d6e62c5e23b4f0085a3a8cf') AS ci_session_lock
