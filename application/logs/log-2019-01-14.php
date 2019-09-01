<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-01-14 06:42:14 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `user_activity` = 'liked' AND `shared_with` = ''' at line 3 - Invalid query: SELECT *
FROM `user_activity`
WHERE `user_id` = '' AND `cat_id` = '' AND `common_id` =  AND `user_activity` = 'liked' AND `shared_with` = ''
ERROR - 2019-01-14 08:24:39 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('03mjosrqcv175lberrog8m95g6gh7s83', '66.249.79.167', 1547434435, '__ci_last_regenerate|i:1547434433;')
ERROR - 2019-01-14 08:24:39 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('3dace503a35ae7944fd74ff97a92f38b') AS ci_session_lock
ERROR - 2019-01-14 08:24:39 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('7t2v1arrrajphme0ebbrlagm09h0t1s3', '66.249.79.167', 1547434436, '__ci_last_regenerate|i:1547434435;')
ERROR - 2019-01-14 08:24:39 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('8076400d11f2f35cce87945843081db9') AS ci_session_lock
ERROR - 2019-01-14 17:40:15 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
