<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-11-14 04:18:15 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('3fca682b85bd50a7d7a42054deb907f759fa9796', '66.249.79.170', 1542149251, '__ci_last_regenerate|i:1542149251;')
ERROR - 2018-11-14 04:18:15 --> Query error: MySQL server has gone away - Invalid query: SELECT *, `b`.`id` AS `cat_id`, `c`.`id` AS `subcat_id`, `a`.`id` AS `video_id`, `a`.`created` as `creates`, `a`.`updated` as `updates`
FROM `video` AS `a`
INNER JOIN `category` AS `b` ON `a`.`cat_id` = `b`.`id`
INNER JOIN `sub_category` AS `c` ON `a`.`subcat_id` = `c`.`id`
WHERE `a`.`cat_id` = '2'
AND `a`.`subcat_id` = '2'
AND `a`.`id` = '1932'
ORDER BY `a`.`rel_date` DESC
ERROR - 2018-11-14 04:18:15 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('86323b1fb6a4522a16f01845d460af84') AS ci_session_lock
ERROR - 2018-11-14 04:18:15 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('9ff7587583ac0ad4adb6fe025167a84da4788cf5', '66.249.79.170', 1542149295, '__ci_last_regenerate|i:1542149295;')
ERROR - 2018-11-14 04:18:15 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('d09801a3516805c62777d2b3fa2d022c') AS ci_session_lock
ERROR - 2018-11-14 04:19:15 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('90cd5a1e706fbebf94da7638cdc9663faf7da4a6', '66.249.79.167', 1542149313, '__ci_last_regenerate|i:1542149312;')
ERROR - 2018-11-14 04:19:15 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('36bb0f929d12040922e02ed5c97ba984') AS ci_session_lock
ERROR - 2018-11-14 09:45:15 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
ERROR - 2018-11-14 17:07:34 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `user_activity` = 'liked' AND `shared_with` = ''' at line 3 - Invalid query: SELECT *
FROM `user_activity`
WHERE `user_id` = '' AND `cat_id` = '' AND `common_id` =  AND `user_activity` = 'liked' AND `shared_with` = ''
ERROR - 2018-11-14 17:45:24 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `user_activity` = 'liked' AND `shared_with` = ''' at line 3 - Invalid query: SELECT *
FROM `user_activity`
WHERE `user_id` = '' AND `cat_id` = '' AND `common_id` =  AND `user_activity` = 'liked' AND `shared_with` = ''
