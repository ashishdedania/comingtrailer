<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-12-31 07:14:05 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('20e48b0a65933c7e8568a8cd32ea31c2b9d10749', '66.249.79.167', 1546220602, '__ci_last_regenerate|i:1546220602;')
ERROR - 2018-12-31 07:14:05 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('47ccfd0112dd0d3ab1766843ac4458eb') AS ci_session_lock
ERROR - 2018-12-31 07:14:50 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('b3ab58ce47005e842f69758f515cb7dc57f92aef', '66.249.79.167', 1546220647, '__ci_last_regenerate|i:1546220645;')
ERROR - 2018-12-31 07:14:50 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1546220645
WHERE `id` = '8afbe2dada9689459baf3a65c1adba62cd4598d9'
ERROR - 2018-12-31 07:14:50 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('7140d2348c0a0f5543451a14454bebca') AS ci_session_lock
ERROR - 2018-12-31 07:14:50 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('4da7bc777c3ff578fdebcfe067ebc873') AS ci_session_lock
ERROR - 2018-12-31 07:14:50 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('92a0c3a0ec081edbf0facba371b800b5fd4c628c', '157.55.39.157', 1546220646, '__ci_last_regenerate|i:1546220645;')
ERROR - 2018-12-31 07:14:50 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('055eeee29030421168907e35e11227827c9668b3', '117.215.91.34', 1546220645, '__ci_last_regenerate|i:1546220645;')
ERROR - 2018-12-31 07:14:50 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('d2166e9661bafeab3a89f2b8373e9f0e') AS ci_session_lock
ERROR - 2018-12-31 07:14:50 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('816a9cec11befdba98a2d7b9e66c5491') AS ci_session_lock
ERROR - 2018-12-31 07:14:50 --> Query error: MySQL server has gone away - Invalid query: SELECT *, `c`.`id` AS `subcat_id`, `a`.`id` AS `poster_id`, `a`.`created` as `creates`, `a`.`updated` as `updates`
FROM `poster` AS `a`
INNER JOIN `sub_category` AS `c` ON `a`.`subcat_id` = `c`.`id`
WHERE `a`.`subcat_id` = '3'
AND `a`.`id` = '951'
ORDER BY `a`.`rel_date` DESC
ERROR - 2018-12-31 07:14:50 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('e51860f26f939b368feb5b6e800ccd75e5c8130d', '66.249.79.172', 1546220690, '__ci_last_regenerate|i:1546220690;')
ERROR - 2018-12-31 07:14:50 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('ac421bb1d6c10c9790ffe77bbd9269c3') AS ci_session_lock
ERROR - 2018-12-31 08:33:21 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
