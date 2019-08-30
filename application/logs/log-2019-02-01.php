<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-02-01 04:51:30 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('91aed3c3321d70cfbeadea2ac650d259d9cc9b50', '216.244.66.198', 1548976848, '__ci_last_regenerate|i:1548976848;')
ERROR - 2019-02-01 04:51:30 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('ae440b9dd56d76718c1a8a42fc3898a8') AS ci_session_lock
ERROR - 2019-02-01 04:52:15 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('5f6476ff493309a8521e7a855110cb67efd573e1', '66.249.79.167', 1548976892, '__ci_last_regenerate|i:1548976890;')
ERROR - 2019-02-01 04:52:15 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('8c09bd821f50782a29f6d4443d7e9159ec93bfcb', '46.229.168.130', 1548976891, '__ci_last_regenerate|i:1548976890;')
ERROR - 2019-02-01 04:52:15 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('9de26c0383acc9dac0e0a97192c9fb68f2da09ea', '46.229.168.130', 1548976891, '__ci_last_regenerate|i:1548976890;')
ERROR - 2019-02-01 04:52:15 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('a985b2888904d310167110d46372ceff') AS ci_session_lock
ERROR - 2019-02-01 04:52:15 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('985bb166e554602aed8e4fa7fb2e0adb') AS ci_session_lock
ERROR - 2019-02-01 04:52:15 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('8f5178dd318f59e15849e5b23c1ef6b9') AS ci_session_lock
ERROR - 2019-02-01 04:53:00 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('e3291f6c9429e02bd4117fa1e212924d4b852248', '216.244.66.198', 1548976936, '__ci_last_regenerate|i:1548976935;')
ERROR - 2019-02-01 04:53:00 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('6b0f031f09dda66b998de433e63f1217be997127', '207.46.13.37', 1548976936, '__ci_last_regenerate|i:1548976935;')
ERROR - 2019-02-01 04:53:00 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('80653c18caf747c91ea06a5701b240bd') AS ci_session_lock
ERROR - 2019-02-01 04:53:00 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('d1b33e44a2dede38866738ab66d7a65d') AS ci_session_lock
ERROR - 2019-02-01 04:53:00 --> Query error: MySQL server has gone away - Invalid query: SELECT *, `c`.`id` AS `subcat_id`, `a`.`id` AS `poster_id`, `a`.`created` as `creates`, `a`.`updated` as `updates`
FROM `poster` AS `a`
INNER JOIN `sub_category` AS `c` ON `a`.`subcat_id` = `c`.`id`
WHERE `a`.`subcat_id` = '4'
AND `a`.`id` = '697'
ORDER BY `a`.`rel_date` DESC
ERROR - 2019-02-01 04:53:00 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('874a080ee0cb53cddf497263edfd43dfb6ac956f', '66.249.79.167', 1548976980, '__ci_last_regenerate|i:1548976980;')
ERROR - 2019-02-01 04:53:00 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('ce4bfc78eb1ccce40f3a79eaeac13af5') AS ci_session_lock
ERROR - 2019-02-01 12:38:15 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('3e5039254ba46f7b6897e3be48f62525', 300) AS ci_session_lock
ERROR - 2019-02-01 12:38:15 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('3e5039254ba46f7b6897e3be48f62525', 300) AS ci_session_lock
ERROR - 2019-02-01 12:38:15 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('3e5039254ba46f7b6897e3be48f62525', 300) AS ci_session_lock
ERROR - 2019-02-01 12:38:15 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('3e5039254ba46f7b6897e3be48f62525', 300) AS ci_session_lock
ERROR - 2019-02-01 12:38:15 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('3e5039254ba46f7b6897e3be48f62525', 300) AS ci_session_lock
ERROR - 2019-02-01 12:38:20 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('3e5039254ba46f7b6897e3be48f62525', 300) AS ci_session_lock
ERROR - 2019-02-01 13:26:21 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
ERROR - 2019-02-01 13:26:50 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `user_activity` = 'liked' AND `shared_with` = ''' at line 3 - Invalid query: SELECT *
FROM `user_activity`
WHERE `user_id` = '' AND `cat_id` = '' AND `common_id` =  AND `user_activity` = 'liked' AND `shared_with` = ''
ERROR - 2019-02-01 13:27:12 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
ERROR - 2019-02-01 13:27:30 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `user_activity` = 'liked' AND `shared_with` = ''' at line 3 - Invalid query: SELECT *
FROM `user_activity`
WHERE `user_id` = '' AND `cat_id` = '' AND `common_id` =  AND `user_activity` = 'liked' AND `shared_with` = ''
ERROR - 2019-02-01 23:05:29 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '9' at line 1 - Invalid query: SELECT count(*) AS totaldata FROM `video` WHERE `id` != 10668 AND cat_id = 1 AND subcat_id = 5 group by video.id order by id desc limit ,9
