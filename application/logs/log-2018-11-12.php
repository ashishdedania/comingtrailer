<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-11-12 09:42:09 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('33df8aa51557d663fa7a9d436140550a9cbefe8e', '95.108.213.51', 1541995887, '__ci_last_regenerate|i:1541995887;')
ERROR - 2018-11-12 09:42:09 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('b54222c6a370503e96ef4b916377b79067a5e905', '66.249.79.186', 1541995887, '__ci_last_regenerate|i:1541995886;')
ERROR - 2018-11-12 09:42:09 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('3c365d1390a6dff373a68850c3513935') AS ci_session_lock
ERROR - 2018-11-12 09:42:09 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('48f36ef37fb64e77fd7894870b1efe3d') AS ci_session_lock
ERROR - 2018-11-12 09:42:54 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('1bf611005543063d1d67d3287d66b1ba4923d87f', '66.249.79.186', 1541995930, '__ci_last_regenerate|i:1541995929;')
ERROR - 2018-11-12 09:42:54 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('b8e4709ae9feb40b8d423392ba6573f5') AS ci_session_lock
ERROR - 2018-11-12 09:42:54 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('92f8b1405c073929c182d1fc15677ce5b35af0eb', '86.99.154.53', 1541995929, '__ci_last_regenerate|i:1541995929;')
ERROR - 2018-11-12 09:42:54 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('fe7bd237db158f1a901d2a8e1356f020') AS ci_session_lock
ERROR - 2018-11-12 09:42:54 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('d70ed4885eba8eb831425b491e82631f3c447c3c', '42.111.232.104', 1541995929, '__ci_last_regenerate|i:1541995929;')
ERROR - 2018-11-12 09:42:54 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('f8d4140bb5406cd97e7aef0a06766bcd') AS ci_session_lock
ERROR - 2018-11-12 09:42:54 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('dafdbfe9f89750673058ea833b9efbb8c56e01ce', '27.34.106.84', 1541995931, '__ci_last_regenerate|i:1541995929;')
ERROR - 2018-11-12 09:42:54 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('3a663490405641f1ac52c5ee7ada89cb') AS ci_session_lock
ERROR - 2018-11-12 09:42:54 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `video` SET `youtube_views` = '1140574'
WHERE `id` = '2152'
ERROR - 2018-11-12 09:42:54 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('ca9be3debe8e41da844335afaa4f755463bef1b5', '43.225.54.56', 1541995974, '__ci_last_regenerate|i:1541995929;')
ERROR - 2018-11-12 09:42:54 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('d01fad3701cf213bf68a2e1b78582639') AS ci_session_lock
ERROR - 2018-11-12 09:42:54 --> Query error: MySQL server has gone away - Invalid query: SELECT *, `b`.`id` AS `cat_id`, `c`.`id` AS `subcat_id`, `a`.`id` AS `video_id`, `a`.`created` as `creates`, `a`.`updated` as `updates`
FROM `video` AS `a`
INNER JOIN `category` AS `b` ON `a`.`cat_id` = `b`.`id`
INNER JOIN `sub_category` AS `c` ON `a`.`subcat_id` = `c`.`id`
WHERE `a`.`cat_id` = '2'
AND `a`.`subcat_id` = '1'
AND `a`.`id` = '1109'
ORDER BY `a`.`rel_date` DESC
ERROR - 2018-11-12 09:42:54 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('0b3bc5a3588feeb6e0e45382a75cdfff8bc8988c', '178.154.200.25', 1541995974, '__ci_last_regenerate|i:1541995974;')
ERROR - 2018-11-12 09:42:54 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('137356a4a5997d4a9167ba345d49c1ec') AS ci_session_lock
ERROR - 2018-11-12 12:35:26 --> Unable to connect to the database
ERROR - 2018-11-12 12:35:27 --> Unable to connect to the database
ERROR - 2018-11-12 22:20:48 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
