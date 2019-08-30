<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-10-21 05:32:40 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
ERROR - 2018-10-21 07:54:06 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1540088601
WHERE `id` = 'da8ad3382321e4d4cda43cd9be7c792d2af84056'
ERROR - 2018-10-21 07:54:06 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('244e24cb1c3c74cd10ed144eedcdeb6f') AS ci_session_lock
ERROR - 2018-10-21 07:54:21 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('244e24cb1c3c74cd10ed144eedcdeb6f', 300) AS ci_session_lock
ERROR - 2018-10-21 07:54:21 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('244e24cb1c3c74cd10ed144eedcdeb6f', 300) AS ci_session_lock
ERROR - 2018-10-21 07:54:51 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1540088647
WHERE `id` = 'da8ad3382321e4d4cda43cd9be7c792d2af84056'
ERROR - 2018-10-21 07:54:51 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('244e24cb1c3c74cd10ed144eedcdeb6f') AS ci_session_lock
ERROR - 2018-10-21 07:54:51 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `video` SET `youtube_views` = '401600'
WHERE `id` = '4200'
ERROR - 2018-10-21 07:54:51 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('3157f6651d102a6d497a6166f1c6d9db901c1b10', '43.225.54.56', 1540088691, '__ci_last_regenerate|i:1540088646;')
ERROR - 2018-10-21 07:54:51 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('8d0296cd4137c63fc3a75386cbb3d2b6') AS ci_session_lock
ERROR - 2018-10-21 07:54:51 --> Query error: MySQL server has gone away - Invalid query: SELECT *, `b`.`id` AS `cat_id`, `c`.`id` AS `subcat_id`, `a`.`id` AS `video_id`, `a`.`created` as `creates`, `a`.`updated` as `updates`
FROM `video` AS `a`
INNER JOIN `category` AS `b` ON `a`.`cat_id` = `b`.`id`
INNER JOIN `sub_category` AS `c` ON `a`.`subcat_id` = `c`.`id`
WHERE `a`.`cat_id` = '2'
AND `a`.`subcat_id` = '5'
AND `a`.`id` = '7196'
ORDER BY `a`.`rel_date` DESC
ERROR - 2018-10-21 07:54:51 --> Query error: MySQL server has gone away - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1540088691
WHERE `id` = 'da8ad3382321e4d4cda43cd9be7c792d2af84056'
ERROR - 2018-10-21 07:54:51 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('244e24cb1c3c74cd10ed144eedcdeb6f') AS ci_session_lock
ERROR - 2018-10-21 15:53:13 --> Unable to connect to the database
