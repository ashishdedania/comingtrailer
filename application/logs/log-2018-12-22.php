<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-12-22 00:28:31 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `user_activity` = 'liked' AND `shared_with` = ''' at line 3 - Invalid query: SELECT *
FROM `user_activity`
WHERE `user_id` = '' AND `cat_id` = '' AND `common_id` =  AND `user_activity` = 'liked' AND `shared_with` = ''
ERROR - 2018-12-22 00:28:52 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
ERROR - 2018-12-22 02:18:01 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
ERROR - 2018-12-22 02:36:39 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `user_activity` = 'liked' AND `shared_with` = ''' at line 3 - Invalid query: SELECT *
FROM `user_activity`
WHERE `user_id` = '' AND `cat_id` = '' AND `common_id` =  AND `user_activity` = 'liked' AND `shared_with` = ''
ERROR - 2018-12-22 17:44:01 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `user_activity` = 'liked' AND `shared_with` = ''' at line 3 - Invalid query: SELECT *
FROM `user_activity`
WHERE `user_id` = '' AND `cat_id` = '' AND `common_id` =  AND `user_activity` = 'liked' AND `shared_with` = ''
ERROR - 2018-12-22 17:44:28 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
ERROR - 2018-12-22 17:46:56 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `video` SET `youtube_views` = '21142'
WHERE `id` = '2973'
ERROR - 2018-12-22 17:46:56 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('15adf0a2c5a5c32e1e643d5cf50dbc8f7e2cb56c', '43.225.54.56', 1545481016, '__ci_last_regenerate|i:1545480724;')
ERROR - 2018-12-22 17:46:56 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('e2b46ba0c6e0dcf18cb4b22662d84183') AS ci_session_lock
ERROR - 2018-12-22 17:46:56 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT `data`
FROM `ci_sessions`
WHERE `id` = '5acf9f46ca36314cc82bd4588015d169979c028b'
ERROR - 2018-12-22 17:46:56 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('84425ec21f3502ebbc325c40a157f1c6') AS ci_session_lock
ERROR - 2018-12-22 17:46:56 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('de084443b54059439a0246d785f8574b10249526', '66.249.79.167', 1545480973, '__ci_last_regenerate|i:1545480973;')
ERROR - 2018-12-22 17:46:56 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('db5b8d4160ab384689bb110e9a3d4bc5') AS ci_session_lock
ERROR - 2018-12-22 17:47:36 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('baffabdb840f81e06c5a4706c5157a48', 300) AS ci_session_lock
ERROR - 2018-12-22 17:47:41 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1545481016
WHERE `id` = '8a4862adedcfcf76c39ea3569aee5e4664756b1b'
ERROR - 2018-12-22 17:47:41 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('b8e19fcf3338dba2bfbd500a108c7b2b') AS ci_session_lock
ERROR - 2018-12-22 17:47:41 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1545481016
WHERE `id` = '2ce89c280e63efe7615ec50cf1b8b619368e1395'
ERROR - 2018-12-22 17:47:41 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('15f0da5f405288f09ee21d2e693bd0e0ce5369f6', '188.50.69.237', 1545481017, '__ci_last_regenerate|i:1545481016;')
ERROR - 2018-12-22 17:47:41 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('baffabdb840f81e06c5a4706c5157a48') AS ci_session_lock
ERROR - 2018-12-22 17:47:41 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('f414292f15c313727b905241b7f63e7b') AS ci_session_lock
ERROR - 2018-12-22 17:47:41 --> Query error: MySQL server has gone away - Invalid query: SELECT *, `b`.`id` AS `cat_id`, `c`.`id` AS `subcat_id`, `a`.`id` AS `video_id`, `a`.`created` as `creates`, `a`.`updated` as `updates`
FROM `video` AS `a`
INNER JOIN `category` AS `b` ON `a`.`cat_id` = `b`.`id`
INNER JOIN `sub_category` AS `c` ON `a`.`subcat_id` = `c`.`id`
WHERE `a`.`cat_id` = '2'
AND `a`.`subcat_id` = '1'
AND `a`.`id` = '8594'
ORDER BY `a`.`rel_date` DESC
ERROR - 2018-12-22 17:47:41 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('72aa7015fc0930e4f5309bd7e34df38cec26eb22', '66.249.79.167', 1545481061, '__ci_last_regenerate|i:1545481061;')
ERROR - 2018-12-22 17:47:41 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('9eb851c24a44a62f94044118b708188a') AS ci_session_lock
ERROR - 2018-12-22 17:47:46 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('fd28184a3ab522e54a5a2e4a23b7bc67257ec558', '157.55.39.245', 1545481024, '__ci_last_regenerate|i:1545481016;')
ERROR - 2018-12-22 17:47:47 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('edf2e7748ed6f5f76171036cd8d3faef') AS ci_session_lock
ERROR - 2018-12-22 17:48:12 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('baffabdb840f81e06c5a4706c5157a48', 300) AS ci_session_lock
ERROR - 2018-12-22 17:48:27 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1545481061
WHERE `id` = '2ce89c280e63efe7615ec50cf1b8b619368e1395'
ERROR - 2018-12-22 17:48:27 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('b214671d8db37e978b76512a0e03a06696e1fea9', '66.249.79.167', 1545481062, '__ci_last_regenerate|i:1545481061;')
ERROR - 2018-12-22 17:48:27 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('baffabdb840f81e06c5a4706c5157a48') AS ci_session_lock
ERROR - 2018-12-22 17:48:27 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('bb1a1a831473bba2f732365659829c59') AS ci_session_lock
ERROR - 2018-12-22 17:48:27 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `adsense` AS `a`
WHERE `width` = '300'
AND `height` = '600'
ERROR - 2018-12-22 17:48:27 --> Query error: MySQL server has gone away - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1545481107
WHERE `id` = '2ce89c280e63efe7615ec50cf1b8b619368e1395'
ERROR - 2018-12-22 17:48:27 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('baffabdb840f81e06c5a4706c5157a48') AS ci_session_lock
ERROR - 2018-12-22 17:50:32 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `video` SET `youtube_views` = '672882'
WHERE `id` = '3310'
ERROR - 2018-12-22 17:50:32 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('ba93768603c78bae645052f911d636af61382515', '43.225.54.56', 1545481232, '__ci_last_regenerate|i:1545481107;')
ERROR - 2018-12-22 17:50:32 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('ac45bae4639af1cf078eb1ac7f45f1b4') AS ci_session_lock
ERROR - 2018-12-22 17:50:37 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('12e00ed3470347c7ed01160e114faa956ac9693f', '66.249.79.167', 1545481194, '__ci_last_regenerate|i:1545481193;')
ERROR - 2018-12-22 17:50:37 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('c33b4134a8c644826333625075f80939') AS ci_session_lock
ERROR - 2018-12-22 17:50:57 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('f28496a6fd78643b8b6c3e94de4bda03aec22069', '66.249.79.167', 1545481212, '__ci_last_regenerate|i:1545481187;')
ERROR - 2018-12-22 17:51:00 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('d28bc3f1915936d3a11f37b75c894f78') AS ci_session_lock
ERROR - 2018-12-22 17:51:22 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('1a395121967b7a0005aa6630fc5b9aa3232575e9', '157.32.183.248', 1545481239, '__ci_last_regenerate|i:1545481237;')
ERROR - 2018-12-22 17:51:22 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1545481237
WHERE `id` = 'fae8605aa8aa8dcd9068fdfa719b0c607ac5683f'
ERROR - 2018-12-22 17:51:22 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('d01576ab067907403b1e9d0d499d8562') AS ci_session_lock
ERROR - 2018-12-22 17:51:22 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('681b5c196800d8087d4287f7c219bdf1') AS ci_session_lock
ERROR - 2018-12-22 17:51:22 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('b1528522bb90e38a2169e7851ecd04b4940e73c6', '94.129.142.166', 1545481237, '__ci_last_regenerate|i:1545481237;')
ERROR - 2018-12-22 17:51:22 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('013a2db34532839f7b878fc051f2761a') AS ci_session_lock
ERROR - 2018-12-22 17:51:22 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('cde99675b4ae78b832ab1fe0ec3f8c3d04f49abb', '157.32.183.248', 1545481239, '__ci_last_regenerate|i:1545481237;')
ERROR - 2018-12-22 17:51:22 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('c0b57581377d2c79e8636e133565cca785ac4209', '42.110.198.242', 1545481237, '__ci_last_regenerate|i:1545481237;')
ERROR - 2018-12-22 17:51:22 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('b1ee6586e5e5bd65bca8b40de42d460c') AS ci_session_lock
ERROR - 2018-12-22 17:51:22 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('0a213cf9eaae8a02b52c10f966d41c4f') AS ci_session_lock
ERROR - 2018-12-22 17:51:27 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1545481241
WHERE `id` = '64f25e8a601ca1f932b49235b783b19d727bff9c'
ERROR - 2018-12-22 17:51:27 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('b59503d3b8d2b527b50cb3f7dbd6837b') AS ci_session_lock
ERROR - 2018-12-22 23:18:07 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'Souza%'' at line 1 - Invalid query: select id,singer_name,singer_img from singer WHERE trim(singer_name) LIKE '%Anthony D'Souza%'
ERROR - 2018-12-22 23:18:39 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'Souza%'' at line 1 - Invalid query: select id,singer_name,singer_img from singer WHERE trim(singer_name) LIKE '%Anthony D'Souza%'
ERROR - 2018-12-22 23:18:43 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'Sou%'' at line 1 - Invalid query: select id,singer_name,singer_img from singer WHERE trim(singer_name) LIKE '%Anthony D'Sou%'
ERROR - 2018-12-22 23:18:43 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'Souz%'' at line 1 - Invalid query: select id,singer_name,singer_img from singer WHERE trim(singer_name) LIKE '%Anthony D'Souz%'
ERROR - 2018-12-22 23:18:43 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'So%'' at line 1 - Invalid query: select id,singer_name,singer_img from singer WHERE trim(singer_name) LIKE '%Anthony D'So%'
ERROR - 2018-12-22 23:18:43 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '%'' at line 1 - Invalid query: select id,singer_name,singer_img from singer WHERE trim(singer_name) LIKE '%Anthony D'%'
ERROR - 2018-12-22 23:18:43 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'S%'' at line 1 - Invalid query: select id,singer_name,singer_img from singer WHERE trim(singer_name) LIKE '%Anthony D'S%'
