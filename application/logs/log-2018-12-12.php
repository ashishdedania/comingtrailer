<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-12-12 07:18:28 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('f12212a365adabf9e74f2a57062b97098ea1af80', '106.192.112.73', 1544579263, '__ci_last_regenerate|i:1544579263;')
ERROR - 2018-12-12 07:18:28 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('ce7512c1a978208270f7ac22ac6b9d20') AS ci_session_lock
ERROR - 2018-12-12 07:19:13 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('e1185310fcf449cd2a12b407ef6e4cdd06a8b049', '43.225.54.56', 1544579308, '__ci_last_regenerate|i:1544579308;')
ERROR - 2018-12-12 07:19:13 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('06bb11c712328e1321352965f73752f7') AS ci_session_lock
ERROR - 2018-12-12 07:19:13 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('9f43aa584d1d53198abb8027581d0bedc8e82a86', '66.249.79.167', 1544579308, '__ci_last_regenerate|i:1544579308;')
ERROR - 2018-12-12 07:19:13 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('5755eacc015aca121bb61a50b78469f37068d9fa', '137.97.137.97', 1544579308, '__ci_last_regenerate|i:1544579308;')
ERROR - 2018-12-12 07:19:13 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('238f361970c77d634d9e75a0a83e42a5') AS ci_session_lock
ERROR - 2018-12-12 07:19:13 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('be3ee08e2a500ef96a0e364fe701d37f') AS ci_session_lock
ERROR - 2018-12-12 23:25:38 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `user_activity` = 'liked' AND `shared_with` = ''' at line 3 - Invalid query: SELECT *
FROM `user_activity`
WHERE `user_id` = '' AND `cat_id` = '' AND `common_id` =  AND `user_activity` = 'liked' AND `shared_with` = ''
ERROR - 2018-12-12 23:26:45 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
