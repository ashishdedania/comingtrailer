<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-11-13 06:55:09 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
ERROR - 2018-11-13 17:41:42 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('f2baa8d3e8626a11c70df11b0e296d7ab59c3cf7', '66.249.79.186', 1542111056, '__ci_last_regenerate|i:1542111055;')
ERROR - 2018-11-13 17:41:42 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('27bd22fc6e2821bc539bce575bce19fb') AS ci_session_lock
ERROR - 2018-11-13 17:42:27 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('8e2fe833f323ae1b8da7a1de6e7f1448e79ea6d9', '207.46.13.101', 1542111102, '__ci_last_regenerate|i:1542111102;')
ERROR - 2018-11-13 17:42:27 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('fa334726b19b9c3f86d748ea0cfca6c8') AS ci_session_lock
ERROR - 2018-11-13 17:42:27 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('6bd1e3238c74b3e240fa8eaf946c6a11af69507a', '139.167.16.221', 1542111102, '__ci_last_regenerate|i:1542111102;')
ERROR - 2018-11-13 17:42:27 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('395cc8b03123ebf0c44da0d1d6dbd8f3') AS ci_session_lock
ERROR - 2018-11-13 17:42:27 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('cdf4aa3492389953921662f927ab44cf70878928', '66.249.79.186', 1542111105, '__ci_last_regenerate|i:1542111102;')
ERROR - 2018-11-13 17:42:27 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('e511b05d96f80b6889a9d6d7d46b7e34') AS ci_session_lock
ERROR - 2018-11-13 17:42:27 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('68b0c92fd4da588f45bec4fae6b77c0a856894b7', '27.97.163.238', 1542111102, '__ci_last_regenerate|i:1542111102;')
ERROR - 2018-11-13 17:42:27 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('d5c69e471ab1d8c0614f0fd3b451fd22') AS ci_session_lock
ERROR - 2018-11-13 17:42:27 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('f43fdf473405d5eb1aefa6df073baeb64ec36d13', '106.205.163.8', 1542111102, '__ci_last_regenerate|i:1542111102;')
ERROR - 2018-11-13 17:42:27 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('f5896d39885868e8ebb3068d83156f3d') AS ci_session_lock
ERROR - 2018-11-13 17:42:27 --> Query error: MySQL server has gone away - Invalid query: SELECT *, `b`.`id` AS `cat_id`, `c`.`id` AS `subcat_id`, `a`.`id` AS `video_id`, `a`.`created` as `creates`, `a`.`updated` as `updates`
FROM `video` AS `a`
INNER JOIN `category` AS `b` ON `a`.`cat_id` = `b`.`id`
INNER JOIN `sub_category` AS `c` ON `a`.`subcat_id` = `c`.`id`
WHERE `a`.`cat_id` = '2'
AND `a`.`subcat_id` = '1'
AND `a`.`id` = '2775'
ORDER BY `a`.`rel_date` DESC
ERROR - 2018-11-13 17:42:27 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('b910202d6566c16f26a54ad4d7f32e825ae03c6b', '93.158.166.1', 1542111147, '__ci_last_regenerate|i:1542111147;')
ERROR - 2018-11-13 17:42:27 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('76e8367098c342027445708170a8eb77') AS ci_session_lock
