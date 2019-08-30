<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-12-27 07:49:13 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `video` SET `youtube_views` = '570952'
WHERE `id` = '3300'
ERROR - 2018-12-27 07:49:13 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('3c2ba18fa4811d87f08661a667189d2d5a72987b', '43.225.54.56', 1545877153, '__ci_last_regenerate|i:1545877082;')
ERROR - 2018-12-27 07:49:13 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('f71b9b68643249520e66e978b5837d29') AS ci_session_lock
ERROR - 2018-12-27 07:49:28 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('87f906cfc9beb7c6b5fbe0cd5e3f1341ab15df45', '66.249.79.167', 1545877124, '__ci_last_regenerate|i:1545877124;')
ERROR - 2018-12-27 07:49:28 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('07ad60673f84d0bfb631bea66b1fa68e') AS ci_session_lock
ERROR - 2018-12-27 07:49:28 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `cast`
WHERE `id` = '326'
AND `status` =0
ERROR - 2018-12-27 07:49:28 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('b685b9e768ba7157136bd6f1bf15be9cb91fde20', '66.249.79.167', 1545877168, '__ci_last_regenerate|i:1545877168;')
ERROR - 2018-12-27 07:49:28 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('b1ed6877045a77fbb70d6a23e1657288') AS ci_session_lock
ERROR - 2018-12-27 07:50:18 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('a4bfa70e5ca1d3306bba0370a7f6234498b60e61', '157.55.39.228', 1545877172, '__ci_last_regenerate|i:1545877172;')
ERROR - 2018-12-27 07:50:18 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('6bff12c598ba8e42a8431c1a0f342bc7') AS ci_session_lock
ERROR - 2018-12-27 20:40:32 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `user_activity` = 'liked' AND `shared_with` = ''' at line 3 - Invalid query: SELECT *
FROM `user_activity`
WHERE `user_id` = '' AND `cat_id` = '' AND `common_id` =  AND `user_activity` = 'liked' AND `shared_with` = ''
ERROR - 2018-12-27 20:41:00 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
