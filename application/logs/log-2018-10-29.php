<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-10-29 02:15:56 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `user_activity` = 'liked' AND `shared_with` = ''' at line 3 - Invalid query: SELECT *
FROM `user_activity`
WHERE `user_id` = '' AND `cat_id` = '' AND `common_id` =  AND `user_activity` = 'liked' AND `shared_with` = ''
ERROR - 2018-10-29 02:15:58 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
ERROR - 2018-10-29 09:47:32 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
ERROR - 2018-10-29 12:53:21 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('7c837ff8724ebba4bdfb79628e6b7b694f14f919', '66.249.79.41', 1540797759, '__ci_last_regenerate|i:1540797750;')
ERROR - 2018-10-29 12:53:21 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('82662c6c30966094c9673e1a7d1ece01') AS ci_session_lock
ERROR - 2018-10-29 12:54:06 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('236e0ded388f30b4162ff559a26fd1347bec01c5', '66.249.79.41', 1540797803, '__ci_last_regenerate|i:1540797801;')
ERROR - 2018-10-29 12:54:06 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('5fc105ae36944c71096cbe3f9bc246b6') AS ci_session_lock
ERROR - 2018-10-29 12:54:06 --> Query error: MySQL server has gone away - Invalid query: SELECT *, `b`.`id` AS `cat_id`, `c`.`id` AS `subcat_id`, `a`.`id` AS `video_id`, `a`.`created` as `creates`, `a`.`updated` as `updates`
FROM `video` AS `a`
INNER JOIN `category` AS `b` ON `a`.`cat_id` = `b`.`id`
INNER JOIN `sub_category` AS `c` ON `a`.`subcat_id` = `c`.`id`
WHERE `a`.`cat_id` = '2'
AND `a`.`subcat_id` = '2'
AND `a`.`id` = '6987'
ORDER BY `a`.`rel_date` DESC
ERROR - 2018-10-29 12:54:06 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('2ed673f8d5472fea737f7d76f5ab56a7b89a4e00', '66.249.79.41', 1540797846, '__ci_last_regenerate|i:1540797846;')
ERROR - 2018-10-29 12:54:06 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('95e3fbe67a0ebd8636f0f9307a375262') AS ci_session_lock
ERROR - 2018-10-29 22:53:44 --> Query error: Unknown column 'p.id' in 'group statement' - Invalid query: SELECT `P`.*, `pi`.`poster_image`
FROM `poster` `P`
INNER JOIN `poster_img` AS `pi` ON `P`.`id` = `pi`.`poster_id`
WHERE LOWER(`poster_name`) LIKE '%%' ESCAPE '!'
AND `is_deleted` = '0'
AND `display_order` = '1'
GROUP BY `p`.`id`
 LIMIT 20
ERROR - 2018-10-29 22:54:22 --> Query error: Unknown column 'p.id' in 'group statement' - Invalid query: SELECT `P`.*, `pi`.`poster_image`
FROM `poster` `P`
INNER JOIN `poster_img` AS `pi` ON `P`.`id` = `pi`.`poster_id`
WHERE LOWER(`poster_name`) LIKE '%%' ESCAPE '!'
AND `is_deleted` = '0'
AND `display_order` = '1'
GROUP BY `p`.`id`
 LIMIT 20
ERROR - 2018-10-29 23:02:06 --> Query error: Unknown column 'p.id' in 'group statement' - Invalid query: SELECT `P`.*, `pi`.`poster_image`
FROM `poster` `P`
INNER JOIN `poster_img` AS `pi` ON `P`.`id` = `pi`.`poster_id`
WHERE LOWER(`poster_name`) LIKE '%amaltash%' ESCAPE '!'
AND `is_deleted` = '0'
AND `display_order` = '1'
GROUP BY `p`.`id`
 LIMIT 20
ERROR - 2018-10-29 23:02:30 --> Query error: Unknown column 'p.id' in 'group statement' - Invalid query: SELECT `P`.*, `pi`.`poster_image`
FROM `poster` `P`
INNER JOIN `poster_img` AS `pi` ON `P`.`id` = `pi`.`poster_id`
WHERE LOWER(`poster_name`) LIKE '%amaltash%' ESCAPE '!'
AND `is_deleted` = '0'
AND `display_order` = '1'
GROUP BY `p`.`id`
 LIMIT 20
ERROR - 2018-10-29 23:02:55 --> Query error: Unknown column 'p.id' in 'group statement' - Invalid query: SELECT `P`.*, `pi`.`poster_image`
FROM `poster` `P`
INNER JOIN `poster_img` AS `pi` ON `P`.`id` = `pi`.`poster_id`
WHERE LOWER(`poster_name`) LIKE '%amar akbar anthony%' ESCAPE '!'
AND `is_deleted` = '0'
AND `display_order` = '1'
GROUP BY `p`.`id`
 LIMIT 20
ERROR - 2018-10-29 23:03:02 --> Query error: Unknown column 'p.id' in 'group statement' - Invalid query: SELECT `P`.*, `pi`.`poster_image`
FROM `poster` `P`
INNER JOIN `poster_img` AS `pi` ON `P`.`id` = `pi`.`poster_id`
WHERE LOWER(`poster_name`) LIKE '%amar akbar anthony%' ESCAPE '!'
AND `is_deleted` = '0'
AND `display_order` = '1'
GROUP BY `p`.`id`
 LIMIT 20
ERROR - 2018-10-29 23:03:21 --> Query error: Unknown column 'p.id' in 'group statement' - Invalid query: SELECT `P`.*, `pi`.`poster_image`
FROM `poster` `P`
INNER JOIN `poster_img` AS `pi` ON `P`.`id` = `pi`.`poster_id`
WHERE LOWER(`poster_name`) LIKE '%amar akbar anthony%' ESCAPE '!'
AND `is_deleted` = '0'
AND `display_order` = '1'
GROUP BY `p`.`id`
 LIMIT 20
ERROR - 2018-10-29 23:03:53 --> Query error: Unknown column 'p.id' in 'group statement' - Invalid query: SELECT `P`.*, `pi`.`poster_image`
FROM `poster` `P`
INNER JOIN `poster_img` AS `pi` ON `P`.`id` = `pi`.`poster_id`
WHERE LOWER(`poster_name`) LIKE '%%' ESCAPE '!'
AND `is_deleted` = '0'
AND `display_order` = '1'
GROUP BY `p`.`id`
 LIMIT 20
ERROR - 2018-10-29 23:04:10 --> Query error: Unknown column 'p.id' in 'group statement' - Invalid query: SELECT `P`.*, `pi`.`poster_image`
FROM `poster` `P`
INNER JOIN `poster_img` AS `pi` ON `P`.`id` = `pi`.`poster_id`
WHERE LOWER(`poster_name`) LIKE '%amar akbar anthony%' ESCAPE '!'
AND `is_deleted` = '0'
AND `display_order` = '1'
GROUP BY `p`.`id`
 LIMIT 20
ERROR - 2018-10-29 23:04:20 --> Query error: Unknown column 'p.id' in 'group statement' - Invalid query: SELECT `P`.*, `pi`.`poster_image`
FROM `poster` `P`
INNER JOIN `poster_img` AS `pi` ON `P`.`id` = `pi`.`poster_id`
WHERE LOWER(`poster_name`) LIKE '%amar akbar anthony%' ESCAPE '!'
AND `is_deleted` = '0'
AND `display_order` = '1'
GROUP BY `p`.`id`
 LIMIT 20
ERROR - 2018-10-29 23:04:41 --> Query error: Unknown column 'p.id' in 'group statement' - Invalid query: SELECT `P`.*, `pi`.`poster_image`
FROM `poster` `P`
INNER JOIN `poster_img` AS `pi` ON `P`.`id` = `pi`.`poster_id`
WHERE LOWER(`poster_name`) LIKE '%thugs of hindostan%' ESCAPE '!'
AND `is_deleted` = '0'
AND `display_order` = '1'
GROUP BY `p`.`id`
 LIMIT 20
ERROR - 2018-10-29 23:04:48 --> Query error: Unknown column 'p.id' in 'group statement' - Invalid query: SELECT `P`.*, `pi`.`poster_image`
FROM `poster` `P`
INNER JOIN `poster_img` AS `pi` ON `P`.`id` = `pi`.`poster_id`
WHERE LOWER(`poster_name`) LIKE '%thugs of hindostan%' ESCAPE '!'
AND `is_deleted` = '0'
AND `display_order` = '1'
GROUP BY `p`.`id`
 LIMIT 20
ERROR - 2018-10-29 23:06:07 --> Query error: Unknown column 'p.id' in 'group statement' - Invalid query: SELECT `P`.*, `pi`.`poster_image`
FROM `poster` `P`
INNER JOIN `poster_img` AS `pi` ON `P`.`id` = `pi`.`poster_id`
WHERE LOWER(`poster_name`) LIKE '%thugs of hindostan%' ESCAPE '!'
AND `is_deleted` = '0'
AND `display_order` = '1'
GROUP BY `p`.`id`
 LIMIT 20
ERROR - 2018-10-29 23:06:38 --> Query error: Unknown column 'p.id' in 'group statement' - Invalid query: SELECT `P`.*, `pi`.`poster_image`
FROM `poster` `P`
INNER JOIN `poster_img` AS `pi` ON `P`.`id` = `pi`.`poster_id`
WHERE LOWER(`poster_name`) LIKE '%thugs of hindostan%' ESCAPE '!'
AND `is_deleted` = '0'
AND `display_order` = '1'
GROUP BY `p`.`id`
 LIMIT 20
ERROR - 2018-10-29 23:31:33 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '.`id`, `P`.*, `pi`.`poster_image`
FROM `poster` `P`
INNER JOIN `poster_img` AS `' at line 1 - Invalid query: SELECT `distinct` `P`.`id`, `P`.*, `pi`.`poster_image`
FROM `poster` `P`
INNER JOIN `poster_img` AS `pi` ON `P`.`id` = `pi`.`poster_id`
WHERE LOWER(`poster_name`) LIKE '%mental hai kya%' ESCAPE '!'
AND `is_deleted` = '0'
AND `display_order` = '1'
ORDER BY `pi`.`poster_type` ASC
 LIMIT 20
ERROR - 2018-10-29 23:36:22 --> Severity: error --> Exception: /home/cominlvi/public_html/application/models/Front_Model.php exists, but doesn't declare class Front_Model /home/cominlvi/public_html/system/core/Loader.php 336
ERROR - 2018-10-29 23:36:38 --> Query error: No tables used - Invalid query: SELECT *
ERROR - 2018-10-29 23:37:14 --> Query error:  - Invalid query: 
