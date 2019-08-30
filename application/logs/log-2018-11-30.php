<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-11-30 07:35:27 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('9d6a335c56537d973cfec9d604bea980d85fe3af', '66.249.79.167', 1543543484, '__ci_last_regenerate|i:1543543484;')
ERROR - 2018-11-30 07:35:27 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('9cabcf4e70bb10d96c641ff8b9adc6d4') AS ci_session_lock
ERROR - 2018-11-30 07:35:33 --> Query error: MySQL server has gone away - Invalid query: SELECT p.*,(select poster_img.poster_image from poster_img where poster_img.poster_id=p.id order by poster_img.poster_type asc,poster_img.display_order asc limit 1) as poster_image FROM `poster` `p` WHERE `p`.`id` != 187 AND `p`.`subcat_id` = 1 group by p.id order by `p`.`rel_date` desc limit 10
ERROR - 2018-11-30 07:35:33 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('ca88c59165c44770e1df1b2c62aebdda45dc0378', '66.249.79.167', 1543543533, '__ci_last_regenerate|i:1543543527;')
ERROR - 2018-11-30 07:35:33 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('fd354a5b9c790d667e3d7efe676e94f4') AS ci_session_lock
ERROR - 2018-11-30 07:36:12 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('f34ed3248b1686dcec49a28f3bd1f4ebab11bcef', '49.15.216.72', 1543543527, '__ci_last_regenerate|i:1543543527;')
ERROR - 2018-11-30 07:36:12 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('573412e809aee2601951dccb4bc885c8') AS ci_session_lock
ERROR - 2018-11-30 07:36:57 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('6531c07c30a5851acf0f9b63a20617368581110b', '66.249.79.167', 1543543573, '__ci_last_regenerate|i:1543543572;')
ERROR - 2018-11-30 07:36:57 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('9802f987d0d89a322595925db87abffa0b798ede', '43.225.54.56', 1543543572, '__ci_last_regenerate|i:1543543572;')
ERROR - 2018-11-30 07:36:57 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('a0ce7f1b14e17c225d645268efe61d93') AS ci_session_lock
ERROR - 2018-11-30 07:36:57 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('18db31a882eaf230f6f1cccf01fa0e11') AS ci_session_lock
ERROR - 2018-11-30 07:36:57 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `video` SET `youtube_views` = '8190'
WHERE `id` = '1123'
ERROR - 2018-11-30 07:36:57 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('674e1c8057a9cb5fc5f85ea94f2ddceab14e0343', '43.225.54.56', 1543543617, '__ci_last_regenerate|i:1543543572;')
ERROR - 2018-11-30 07:36:57 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('c9b3df99af1e7dde7c9134a7d4c97f4f') AS ci_session_lock
