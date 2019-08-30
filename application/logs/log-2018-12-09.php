<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-12-09 17:45:59 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `video` SET `youtube_views` = '1035867'
WHERE `id` = '2924'
ERROR - 2018-12-09 17:45:59 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('mobc1k17ebbgrah598f6hvv3vor17kuc', '66.249.79.167', 1544357713, '__ci_last_regenerate|i:1544357713;')
ERROR - 2018-12-09 17:45:59 --> Query error: MySQL server has gone away - Invalid query: SELECT *, `b`.`id` AS `cat_id`, `c`.`id` AS `subcat_id`, `a`.`id` AS `video_id`, `a`.`created` as `creates`, `a`.`updated` as `updates`
FROM `video` AS `a`
INNER JOIN `category` AS `b` ON `a`.`cat_id` = `b`.`id`
INNER JOIN `sub_category` AS `c` ON `a`.`subcat_id` = `c`.`id`
WHERE `a`.`cat_id` = '2'
AND `a`.`subcat_id` = '5'
AND `a`.`id` = '8663'
ORDER BY `a`.`rel_date` DESC
ERROR - 2018-12-09 17:45:59 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('1n8km3vfv1746pfiadlh0gfgn97epkng', '43.225.54.56', 1544357759, '__ci_last_regenerate|i:1544357522;')
ERROR - 2018-12-09 17:45:59 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('26mmbglfhqhqc6n2htv6i5pp27op1uth', '66.249.79.167', 1544357759, '__ci_last_regenerate|i:1544357759;')
ERROR - 2018-12-09 17:45:59 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('2894795e77b95601f8ac2d90e49e1eea') AS ci_session_lock
ERROR - 2018-12-09 17:45:59 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('8153da7bbc44cddf6ea55b52858931bb') AS ci_session_lock
ERROR - 2018-12-09 17:45:59 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('05a0000c0f4766bbe7ac6566728c7679') AS ci_session_lock
ERROR - 2018-12-09 17:46:44 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('9rv7d1m03e2gdhudoh96pa56se0im056', '46.229.168.144', 1544357759, '__ci_last_regenerate|i:1544357759;')
ERROR - 2018-12-09 17:46:44 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('6u8fovhsp772u8j86mun6pmofakcrqsb', '46.229.168.144', 1544357759, '__ci_last_regenerate|i:1544357759;')
ERROR - 2018-12-09 17:46:44 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('211f7d41223492099840de39dac1b6b8') AS ci_session_lock
ERROR - 2018-12-09 17:46:44 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('vg7dc26b6snhi4fmhsepptq656f08o7c', '86.97.119.163', 1544357759, '__ci_last_regenerate|i:1544357759;')
ERROR - 2018-12-09 17:46:44 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('53476746e7b939e44d598752f0d5ec0a') AS ci_session_lock
ERROR - 2018-12-09 17:46:44 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('001ec20a41c0376e70d7fa9683439eda') AS ci_session_lock
ERROR - 2018-12-09 17:47:29 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('dducoos1c262m61jisncv7b54vpl311h', '66.249.79.167', 1544357804, '__ci_last_regenerate|i:1544357804;')
ERROR - 2018-12-09 17:47:29 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('jk76ghnqnmeokpo8s0k5buob5gg11415', '137.97.134.246', 1544357804, '__ci_last_regenerate|i:1544357804;')
ERROR - 2018-12-09 17:47:29 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT `data`
FROM `ci_sessions`
WHERE `id` = '5frgq7hohn123lgikq0vvrfotoj6d50t'
ERROR - 2018-12-09 17:47:29 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('47db7e37d6338969780596926e74b1a7') AS ci_session_lock
ERROR - 2018-12-09 17:47:29 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('7387cca2c0235175c5990bba93d58964') AS ci_session_lock
ERROR - 2018-12-09 17:47:29 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('e362d3f32955eace1440292097ec541a') AS ci_session_lock
ERROR - 2018-12-09 17:47:29 --> Query error: MySQL server has gone away - Invalid query: SELECT *, `c`.`id` AS `subcat_id`, `a`.`id` AS `poster_id`, `a`.`created` as `creates`, `a`.`updated` as `updates`
FROM `poster` AS `a`
INNER JOIN `sub_category` AS `c` ON `a`.`subcat_id` = `c`.`id`
WHERE `a`.`subcat_id` = '3'
AND `a`.`id` = '1703'
ORDER BY `a`.`rel_date` DESC
ERROR - 2018-12-09 17:47:29 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('p72atrjqiqaflu1bsk49uvuris1nmgjf', '66.249.79.167', 1544357849, '__ci_last_regenerate|i:1544357849;')
ERROR - 2018-12-09 17:47:29 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('8649cea8b699ecdafd2c5548472dbb55') AS ci_session_lock
