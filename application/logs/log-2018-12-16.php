<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-12-16 04:44:35 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `video` SET `youtube_views` = '205371'
WHERE `id` = '2681'
ERROR - 2018-12-16 04:44:35 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('eb6827910cd8fb433f52895de463cd8481a11896', '43.225.54.56', 1544915675, '__ci_last_regenerate|i:1544915522;')
ERROR - 2018-12-16 04:44:35 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('fa729e7d9edc625c197d234168546095') AS ci_session_lock
ERROR - 2018-12-16 04:44:50 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('24c00e1767994273bc0b566b9ad14ef129a21da7', '66.249.79.167', 1544915644, '__ci_last_regenerate|i:1544915642;')
ERROR - 2018-12-16 04:44:50 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('56d81f65e905a6795f4cfce64ae44ab0') AS ci_session_lock
ERROR - 2018-12-16 04:45:35 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('4ac2c0232e061acffc6e2e46dedec6a786a177c0', '66.249.79.167', 1544915690, '__ci_last_regenerate|i:1544915690;')
ERROR - 2018-12-16 04:45:35 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('ff535b1f81ab9a979431c91e66cec6ac85745b1e', '207.46.13.134', 1544915690, '__ci_last_regenerate|i:1544915690;')
ERROR - 2018-12-16 04:45:35 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('c845cecfe43586e192ca00fe95be4bb3') AS ci_session_lock
ERROR - 2018-12-16 04:45:35 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('e57c38153c5dd70dbba9dec9857653701946d435', '117.230.152.107', 1544915690, '__ci_last_regenerate|i:1544915690;')
ERROR - 2018-12-16 04:45:35 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('4beb61178f26990c4f3656e328211c8b') AS ci_session_lock
ERROR - 2018-12-16 04:45:35 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('fb23a810766dd2165c28dd61ead2351e') AS ci_session_lock
ERROR - 2018-12-16 08:54:33 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `user_activity` = 'liked' AND `shared_with` = ''' at line 3 - Invalid query: SELECT *
FROM `user_activity`
WHERE `user_id` = '' AND `cat_id` = '' AND `common_id` =  AND `user_activity` = 'liked' AND `shared_with` = ''
ERROR - 2018-12-16 08:54:59 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
ERROR - 2018-12-16 17:41:49 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `adsense` AS `a`
WHERE `width` = '300'
AND `height` = '600'
ERROR - 2018-12-16 17:41:49 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('17a44c13420827ddee6ef8ceaafc0da2bd9ab5f2', '64.233.172.154', 1544962264, '__ci_last_regenerate|i:1544962264;')
ERROR - 2018-12-16 17:41:49 --> Query error: MySQL server has gone away - Invalid query: SELECT *, `c`.`id` AS `subcat_id`, `a`.`id` AS `poster_id`, `a`.`created` as `creates`, `a`.`updated` as `updates`
FROM `poster` AS `a`
INNER JOIN `sub_category` AS `c` ON `a`.`subcat_id` = `c`.`id`
WHERE `a`.`subcat_id` = '3'
AND `a`.`id` = '1140'
ORDER BY `a`.`rel_date` DESC
ERROR - 2018-12-16 17:41:50 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('237cc63e2099341e0afd2e45d4c3fded') AS ci_session_lock
ERROR - 2018-12-16 17:41:50 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('223d6a31be61e5c5ac1000f24abc4afd08c48fb6', '157.48.246.108', 1544962310, '__ci_last_regenerate|i:1544962309;')
ERROR - 2018-12-16 17:41:50 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('017331ad332390d3304eb40f3d8219b2') AS ci_session_lock
ERROR - 2018-12-16 17:41:50 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('7edc10c809ee86329b6ef40b3b288d78e47ff1d1', '66.249.79.172', 1544962310, '__ci_last_regenerate|i:1544962309;')
ERROR - 2018-12-16 17:41:50 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('3ebc205dcc024efb53dd8719c319b1a4') AS ci_session_lock
ERROR - 2018-12-16 17:42:34 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('1e660b7b0cb929d9a5fa062322e405890a4017ac', '42.107.220.148', 1544962309, '__ci_last_regenerate|i:1544962309;')
ERROR - 2018-12-16 17:42:34 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('d2ac63c2431851343afc892156b536da') AS ci_session_lock
ERROR - 2018-12-16 21:57:06 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `user_activity` = 'liked' AND `shared_with` = ''' at line 3 - Invalid query: SELECT *
FROM `user_activity`
WHERE `user_id` = '' AND `cat_id` = '' AND `common_id` =  AND `user_activity` = 'liked' AND `shared_with` = ''
ERROR - 2018-12-16 21:57:19 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
