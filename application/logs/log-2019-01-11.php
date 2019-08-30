<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-01-11 00:31:16 --> Severity: error --> Exception: /home/cominlvi/public_html/application/models/Front_Model.php exists, but doesn't declare class Front_Model /home/cominlvi/public_html/system/core/Loader.php 336
ERROR - 2019-01-11 00:35:34 --> Query error: Unknown column 'st.status' in 'where clause' - Invalid query: SELECT *
FROM `personality` AS `t`
INNER JOIN `movie_map_cast` AS `map` ON `t`.`id` = `map`.`personality_id`
INNER JOIN `movie` AS `mapped` ON `mapped`.`id` = `map`.`movie_id`
WHERE `map`.`cast_id` = '543'
AND `st`.`status` =0
ERROR - 2019-01-11 00:35:45 --> Query error: Unknown column 'st.status' in 'where clause' - Invalid query: SELECT *
FROM `personality` AS `t`
INNER JOIN `movie_map_director` AS `map` ON `t`.`id` = `map`.`personality_id`
INNER JOIN `movie` AS `mapped` ON `mapped`.`id` = `map`.`movie_id`
WHERE `map`.`director_id` = '5'
AND `st`.`status` =0
ERROR - 2019-01-11 00:42:47 --> Query error: Table 'cominlvi_trailer.movie_map_personality' doesn't exist - Invalid query: SELECT *
FROM `personality` AS `t`
INNER JOIN `movie_map_personality` AS `map` ON `t`.`id` = `map`.`personality_id`
INNER JOIN `movie` AS `mapped` ON `mapped`.`id` = `map`.`movie_id`
WHERE `map`.`personality_id` = '512'
AND `t`.`status` =0
ERROR - 2019-01-11 00:44:30 --> Query error: Unknown column 'personality_name' in 'where clause' - Invalid query: SELECT *
FROM `director`
WHERE LOWER(`personality_name`) LIKE '%anurag%' ESCAPE '!'
AND `status` =0
 LIMIT 20
ERROR - 2019-01-11 00:50:08 --> Query error: Table 'cominlvi_trailer.spersonality' doesn't exist - Invalid query: SELECT *
FROM `spersonality`
WHERE LOWER(`personality_name`) LIKE '%anurag%' ESCAPE '!'
AND `status` =0
 LIMIT 20
ERROR - 2019-01-11 01:01:16 --> Severity: error --> Exception: /home/cominlvi/public_html/application/models/Front_Model.php exists, but doesn't declare class Front_Model /home/cominlvi/public_html/system/core/Loader.php 336
ERROR - 2019-01-11 01:11:30 --> Query error: Table 'cominlvi_trailer.spersonality' doesn't exist - Invalid query: SELECT personality.*, personality_name as cast_name, personality_title as cast_title, personality_desc as cast_desc, personality_keywords as cast_keywords
FROM `spersonality`
WHERE LOWER(`personality_name`) LIKE '%anurag%' ESCAPE '!'
AND `status` =0
AND `is_cast` = 1
 LIMIT 20
ERROR - 2019-01-11 01:55:32 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
ERROR - 2019-01-11 16:52:00 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
ERROR - 2019-01-11 17:27:43 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
ERROR - 2019-01-11 17:46:34 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('7e1ede0e4c39ac0799d48d06f75291610b7f9233', '66.249.79.167', 1547208951, '__ci_last_regenerate|i:1547208949;')
ERROR - 2019-01-11 17:46:34 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('ba20015bb1641eb8f47379f011fbb046') AS ci_session_lock
ERROR - 2019-01-11 17:46:34 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('bada016d4b798b8b469920d24810b7d67a43cd1f', '139.59.74.132', 1547208950, '__ci_last_regenerate|i:1547208949;')
ERROR - 2019-01-11 17:46:34 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('9213e8d67c6bb5f59cd2c9f22871e7fd') AS ci_session_lock
ERROR - 2019-01-11 17:47:39 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('81b90eefb60583822e91c5fee928cd126b0e47bd', '66.249.79.167', 1547209017, '__ci_last_regenerate|i:1547209017;')
ERROR - 2019-01-11 17:47:39 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('bc1cbcd31c7ba0b388d6353830e829d4') AS ci_session_lock
ERROR - 2019-01-11 17:47:39 --> Query error: MySQL server has gone away - Invalid query: SELECT *, `c`.`id` AS `subcat_id`, `a`.`id` AS `poster_id`, `a`.`created` as `creates`, `a`.`updated` as `updates`
FROM `poster` AS `a`
INNER JOIN `sub_category` AS `c` ON `a`.`subcat_id` = `c`.`id`
WHERE `a`.`subcat_id` = '7'
AND `a`.`id` = '765'
ORDER BY `a`.`rel_date` DESC
ERROR - 2019-01-11 17:47:39 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('e743a4959a95b473c2dafd614b70b8dbd8f441e3', '168.235.197.195', 1547209059, '__ci_last_regenerate|i:1547209059;')
ERROR - 2019-01-11 17:47:39 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('50db459b637fe043face6674d7197def') AS ci_session_lock
ERROR - 2019-01-11 17:48:19 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('1ff2cd0b5aca4b34c9e0346a1667a598e924987b', '139.59.74.132', 1547209056, '__ci_last_regenerate|i:1547209056;')
ERROR - 2019-01-11 17:48:19 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('8db4b27600140c3a825e86102c1f734b') AS ci_session_lock
