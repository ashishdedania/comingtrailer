<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-10-04 12:01:01 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('161718a70b97ab37b3e7cea70391485d', 300) AS ci_session_lock
ERROR - 2018-10-04 21:37:29 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `video` SET `youtube_views` = '92881'
WHERE `id` = '1277'
ERROR - 2018-10-04 21:37:29 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('d846b1dc780462790e42bb72cc797116f35875ef', '43.225.54.56', 1538669249, '__ci_last_regenerate|i:1538669164;')
ERROR - 2018-10-04 21:37:29 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('9b6cf25aad7c3fe8c5e5fdc6e1476d5a') AS ci_session_lock
ERROR - 2018-10-04 22:02:48 --> Unable to connect to the database
ERROR - 2018-10-04 22:02:49 --> Unable to connect to the database
ERROR - 2018-10-04 22:02:49 --> Unable to connect to the database
ERROR - 2018-10-04 22:02:49 --> Unable to connect to the database
ERROR - 2018-10-04 22:04:35 --> Unable to connect to the database
ERROR - 2018-10-04 22:04:35 --> Unable to connect to the database
ERROR - 2018-10-04 22:04:36 --> Unable to connect to the database
ERROR - 2018-10-04 22:04:36 --> Unable to connect to the database
ERROR - 2018-10-04 22:04:36 --> Unable to connect to the database
ERROR - 2018-10-04 22:04:37 --> Unable to connect to the database
ERROR - 2018-10-04 22:04:38 --> Unable to connect to the database
ERROR - 2018-10-04 22:04:39 --> Unable to connect to the database
ERROR - 2018-10-04 22:04:43 --> Unable to connect to the database
ERROR - 2018-10-04 22:04:44 --> Unable to connect to the database
ERROR - 2018-10-04 22:04:44 --> Unable to connect to the database
ERROR - 2018-10-04 22:04:45 --> Unable to connect to the database
ERROR - 2018-10-04 22:06:42 --> Unable to connect to the database
ERROR - 2018-10-04 22:07:47 --> Unable to connect to the database
ERROR - 2018-10-04 22:08:06 --> Unable to connect to the database
ERROR - 2018-10-04 22:08:06 --> Unable to connect to the database
ERROR - 2018-10-04 22:08:46 --> Unable to connect to the database
ERROR - 2018-10-04 22:16:13 --> Unable to connect to the database
ERROR - 2018-10-04 22:16:13 --> Unable to connect to the database
ERROR - 2018-10-04 22:16:13 --> Unable to connect to the database
ERROR - 2018-10-04 22:16:14 --> Unable to connect to the database
ERROR - 2018-10-04 22:16:15 --> Unable to connect to the database
ERROR - 2018-10-04 22:16:26 --> Unable to connect to the database
ERROR - 2018-10-04 22:16:27 --> Unable to connect to the database
ERROR - 2018-10-04 22:16:29 --> Unable to connect to the database
ERROR - 2018-10-04 22:16:30 --> Unable to connect to the database
ERROR - 2018-10-04 22:16:30 --> Unable to connect to the database
ERROR - 2018-10-04 22:16:33 --> Unable to connect to the database
ERROR - 2018-10-04 22:16:44 --> Unable to connect to the database
ERROR - 2018-10-04 22:16:45 --> Unable to connect to the database
ERROR - 2018-10-04 22:16:47 --> Unable to connect to the database
ERROR - 2018-10-04 22:16:49 --> Unable to connect to the database
ERROR - 2018-10-04 22:16:51 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('176c98997df700dda47aa02a4b7ca44d', 300) AS ci_session_lock
ERROR - 2018-10-04 22:17:02 --> Unable to connect to the database
ERROR - 2018-10-04 22:18:27 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('176c98997df700dda47aa02a4b7ca44d', 300) AS ci_session_lock
ERROR - 2018-10-04 23:34:12 --> Query error: Unknown column 'assets' in 'where clause' - Invalid query: SELECT *, YEAR(`rel_date`) AS `rel_year`, `video_name` AS `name`, `video`.`id` AS `mstp_id`
FROM `video`
INNER JOIN `video_map_movie` ON `video`.`id` = `video_id`
INNER JOIN `sub_category` ON video.`subcat_id` = `sub_category`.`id`
WHERE `video`.`id` IN(SELECT `video_id` FROM `video_map_movie` WHERE `movie_id` = 'assets')
AND `movie_id` = `assets`
AND `video`.`is_deleted` =0
AND `cat_id` = 1
ORDER BY YEAR(`rel_date`) DESC
ERROR - 2018-10-04 23:34:12 --> Query error: Unknown column 'assets' in 'where clause' - Invalid query: SELECT *, YEAR(`rel_date`) AS `rel_year`, `video_name` AS `name`, `video`.`id` AS `mstp_id`
FROM `video`
INNER JOIN `video_map_movie` ON `video`.`id` = `video_id`
INNER JOIN `sub_category` ON video.`subcat_id` = `sub_category`.`id`
WHERE `video`.`id` IN(SELECT `video_id` FROM `video_map_movie` WHERE `movie_id` = 'assets')
AND `movie_id` = `assets`
AND `video`.`is_deleted` =0
AND `cat_id` = 1
ORDER BY YEAR(`rel_date`) DESC
ERROR - 2018-10-04 23:37:15 --> Query error: Unknown column 'assets' in 'where clause' - Invalid query: SELECT *, YEAR(`rel_date`) AS `rel_year`, `video_name` AS `name`, `video`.`id` AS `mstp_id`
FROM `video`
INNER JOIN `video_map_movie` ON `video`.`id` = `video_id`
INNER JOIN `sub_category` ON video.`subcat_id` = `sub_category`.`id`
WHERE `video`.`id` IN(SELECT `video_id` FROM `video_map_movie` WHERE `movie_id` = 'assets')
AND `movie_id` = `assets`
AND `video`.`is_deleted` =0
AND `cat_id` = 1
ORDER BY YEAR(`rel_date`) DESC
ERROR - 2018-10-04 23:37:15 --> Query error: Unknown column 'assets' in 'where clause' - Invalid query: SELECT *, YEAR(`rel_date`) AS `rel_year`, `video_name` AS `name`, `video`.`id` AS `mstp_id`
FROM `video`
INNER JOIN `video_map_movie` ON `video`.`id` = `video_id`
INNER JOIN `sub_category` ON video.`subcat_id` = `sub_category`.`id`
WHERE `video`.`id` IN(SELECT `video_id` FROM `video_map_movie` WHERE `movie_id` = 'assets')
AND `movie_id` = `assets`
AND `video`.`is_deleted` =0
AND `cat_id` = 1
ORDER BY YEAR(`rel_date`) DESC
ERROR - 2018-10-04 23:38:22 --> Query error: Unknown column 'assets' in 'where clause' - Invalid query: SELECT *, YEAR(`rel_date`) AS `rel_year`, `video_name` AS `name`, `video`.`id` AS `mstp_id`
FROM `video`
INNER JOIN `video_map_relby` ON `video`.`id` = `video_id`
INNER JOIN `sub_category` ON video.`subcat_id` = `sub_category`.`id`
WHERE `video`.`id` IN(SELECT `video_id` FROM `video_map_relby` WHERE `rel_by_id` = 'assets')
AND `rel_by_id` = `assets`
AND `video`.`is_deleted` =0
AND `cat_id` = 1
ORDER BY YEAR(`rel_date`) DESC
ERROR - 2018-10-04 23:38:22 --> Query error: Unknown column 'assets' in 'where clause' - Invalid query: SELECT *, YEAR(`rel_date`) AS `rel_year`, `video_name` AS `name`, `video`.`id` AS `mstp_id`
FROM `video`
INNER JOIN `video_map_relby` ON `video`.`id` = `video_id`
INNER JOIN `sub_category` ON video.`subcat_id` = `sub_category`.`id`
WHERE `video`.`id` IN(SELECT `video_id` FROM `video_map_relby` WHERE `rel_by_id` = 'assets')
AND `rel_by_id` = `assets`
AND `video`.`is_deleted` =0
AND `cat_id` = 1
ORDER BY YEAR(`rel_date`) DESC
ERROR - 2018-10-04 23:41:38 --> Query error: Unknown column 'assets' in 'where clause' - Invalid query: SELECT *, YEAR(`rel_date`) AS `rel_year`, `movie_name` AS `name`, `movie`.`id` AS `mstp_id`
FROM `movie`
INNER JOIN `movie_map_music` ON `movie`.`id` = `movie_id`
WHERE `movie`.`id` IN(SELECT `movie_id` FROM `movie_map_music` WHERE `music_id` = 'assets')
AND `music_id` = `assets`
ORDER BY YEAR(`rel_date`) DESC
ERROR - 2018-10-04 23:41:38 --> Query error: Unknown column 'assets' in 'where clause' - Invalid query: SELECT *, YEAR(`rel_date`) AS `rel_year`, `movie_name` AS `name`, `movie`.`id` AS `mstp_id`
FROM `movie`
INNER JOIN `movie_map_music` ON `movie`.`id` = `movie_id`
WHERE `movie`.`id` IN(SELECT `movie_id` FROM `movie_map_music` WHERE `music_id` = 'assets')
AND `music_id` = `assets`
ORDER BY YEAR(`rel_date`) DESC
ERROR - 2018-10-04 23:42:15 --> Query error: Unknown column 'assets' in 'where clause' - Invalid query: SELECT *, YEAR(`rel_date`) AS `rel_year`, `movie_name` AS `name`, `movie`.`id` AS `mstp_id`
FROM `movie`
INNER JOIN `movie_map_director` ON `movie`.`id` = `movie_id`
WHERE `movie`.`id` IN(SELECT `movie_id` FROM `movie_map_director` WHERE `director_id` = 'assets')
AND `director_id` = `assets`
ORDER BY YEAR(`rel_date`) DESC
ERROR - 2018-10-04 23:42:15 --> Query error: Unknown column 'assets' in 'where clause' - Invalid query: SELECT *, YEAR(`rel_date`) AS `rel_year`, `movie_name` AS `name`, `movie`.`id` AS `mstp_id`
FROM `movie`
INNER JOIN `movie_map_director` ON `movie`.`id` = `movie_id`
WHERE `movie`.`id` IN(SELECT `movie_id` FROM `movie_map_director` WHERE `director_id` = 'assets')
AND `director_id` = `assets`
ORDER BY YEAR(`rel_date`) DESC
ERROR - 2018-10-04 23:42:38 --> Query error: Unknown column 'assets' in 'where clause' - Invalid query: SELECT *, YEAR(`rel_date`) AS `rel_year`, `movie_name` AS `name`, `movie`.`id` AS `mstp_id`
FROM `movie`
INNER JOIN `movie_map_singer` ON `movie`.`id` = `movie_id`
WHERE `movie`.`id` IN(SELECT `movie_id` FROM `movie_map_singer` WHERE `singer_id` = 'assets')
AND `singer_id` = `assets`
ORDER BY YEAR(`rel_date`) DESC
ERROR - 2018-10-04 23:42:39 --> Query error: Unknown column 'assets' in 'where clause' - Invalid query: SELECT *, YEAR(`rel_date`) AS `rel_year`, `movie_name` AS `name`, `movie`.`id` AS `mstp_id`
FROM `movie`
INNER JOIN `movie_map_singer` ON `movie`.`id` = `movie_id`
WHERE `movie`.`id` IN(SELECT `movie_id` FROM `movie_map_singer` WHERE `singer_id` = 'assets')
AND `singer_id` = `assets`
ORDER BY YEAR(`rel_date`) DESC
ERROR - 2018-10-04 23:42:47 --> Query error: Unknown column 'assets' in 'where clause' - Invalid query: SELECT *, YEAR(`rel_date`) AS `rel_year`, `movie_name` AS `name`, `movie`.`id` AS `mstp_id`
FROM `movie`
INNER JOIN `movie_map_cast` ON `movie`.`id` = `movie_id`
WHERE `movie`.`id` IN(SELECT `movie_id` FROM `movie_map_cast` WHERE `cast_id` = 'assets')
AND `cast_id` = `assets`
ORDER BY YEAR(`rel_date`) DESC
ERROR - 2018-10-04 23:42:47 --> Query error: Unknown column 'assets' in 'where clause' - Invalid query: SELECT *, YEAR(`rel_date`) AS `rel_year`, `movie_name` AS `name`, `movie`.`id` AS `mstp_id`
FROM `movie`
INNER JOIN `movie_map_cast` ON `movie`.`id` = `movie_id`
WHERE `movie`.`id` IN(SELECT `movie_id` FROM `movie_map_cast` WHERE `cast_id` = 'assets')
AND `cast_id` = `assets`
ORDER BY YEAR(`rel_date`) DESC
ERROR - 2018-10-04 23:46:36 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('83d7bc6122be1468415310931d12b603', 300) AS ci_session_lock
ERROR - 2018-10-04 23:46:37 --> Severity: Error --> Allowed memory size of 134217728 bytes exhausted (tried to allocate 6125412 bytes) /home/cominlvi/public_html/system/core/Loader.php 938
ERROR - 2018-10-04 23:48:04 --> Severity: Error --> Allowed memory size of 134217728 bytes exhausted (tried to allocate 6125412 bytes) /home/cominlvi/public_html/system/core/Loader.php 938
