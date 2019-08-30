<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-11-28 08:54:53 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `user_activity` = 'liked' AND `shared_with` = ''' at line 3 - Invalid query: SELECT *
FROM `user_activity`
WHERE `user_id` = '' AND `cat_id` = '' AND `common_id` =  AND `user_activity` = 'liked' AND `shared_with` = ''
ERROR - 2018-11-28 08:55:04 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
ERROR - 2018-11-28 09:34:55 --> Unable to connect to the database
ERROR - 2018-11-28 09:34:57 --> Unable to connect to the database
ERROR - 2018-11-28 09:34:57 --> Unable to connect to the database
ERROR - 2018-11-28 09:34:57 --> Unable to connect to the database
ERROR - 2018-11-28 09:34:58 --> Unable to connect to the database
ERROR - 2018-11-28 09:34:58 --> Unable to connect to the database
ERROR - 2018-11-28 09:34:58 --> Unable to connect to the database
ERROR - 2018-11-28 09:34:59 --> Unable to connect to the database
ERROR - 2018-11-28 09:34:59 --> Unable to connect to the database
ERROR - 2018-11-28 09:34:59 --> Unable to connect to the database
ERROR - 2018-11-28 09:35:00 --> Unable to connect to the database
ERROR - 2018-11-28 09:35:07 --> Unable to connect to the database
ERROR - 2018-11-28 09:35:09 --> Unable to connect to the database
ERROR - 2018-11-28 09:35:10 --> Unable to connect to the database
ERROR - 2018-11-28 09:35:11 --> Unable to connect to the database
ERROR - 2018-11-28 09:35:11 --> Unable to connect to the database
ERROR - 2018-11-28 09:35:12 --> Unable to connect to the database
ERROR - 2018-11-28 19:09:15 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `video` SET `youtube_views` = '10781'
WHERE `id` = '6880'
ERROR - 2018-11-28 19:09:15 --> Query error: MySQL server has gone away - Invalid query: SELECT *, `c`.`id` AS `subcat_id`, `a`.`id` AS `poster_id`, `a`.`created` as `creates`, `a`.`updated` as `updates`
FROM `poster` AS `a`
INNER JOIN `sub_category` AS `c` ON `a`.`subcat_id` = `c`.`id`
WHERE `a`.`subcat_id` = '1'
AND `a`.`id` = '749'
ORDER BY `a`.`rel_date` DESC
ERROR - 2018-11-28 19:09:15 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('qvr1s8adf0j8f5lc55393ccq1hkt92dl', '66.249.79.167', 1543412311, '__ci_last_regenerate|i:1543412311;')
ERROR - 2018-11-28 19:09:15 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `adsense` AS `a`
WHERE `width` = '300'
AND `height` = '600'
ERROR - 2018-11-28 19:09:15 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('29f0a10199c818cf287c63ac717ff5de') AS ci_session_lock
ERROR - 2018-11-28 19:09:15 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('g303p9jt2thmbcp0qvut3nficmjrbj6a', '157.55.39.206', 1543412355, '__ci_last_regenerate|i:1543412355;')
ERROR - 2018-11-28 19:09:15 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('rbm29m2b7hi2utro1npaj0j8jm1ul3om', '43.225.54.56', 1543412355, '__ci_last_regenerate|i:1543412162;')
ERROR - 2018-11-28 19:09:15 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('iujht7h3sigdtc4jj5lbqv9vouvfu6hq', '37.9.113.105', 1543412355, '__ci_last_regenerate|i:1543412355;')
ERROR - 2018-11-28 19:09:15 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('c152d7e25c375194f272db2abf20edb1') AS ci_session_lock
ERROR - 2018-11-28 19:09:15 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('89164457d955e9aadb2376784107499f') AS ci_session_lock
ERROR - 2018-11-28 19:09:15 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('dda06ceb8eed22e7f608a0f9bd234b4d') AS ci_session_lock
ERROR - 2018-11-28 19:10:00 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('loo7l763b9s87vfdr44hv85dfsi4f4js', '157.55.39.205', 1543412357, '__ci_last_regenerate|i:1543412355;')
ERROR - 2018-11-28 19:10:00 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('9qgrp90n1tnq60gha9qj31et9ctgr8jr', '188.70.36.157', 1543412356, '__ci_last_regenerate|i:1543412355;')
ERROR - 2018-11-28 19:10:00 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('7etrdhflcpr5nk7tie1cuipga5se1pv9', '159.69.91.3', 1543412356, '__ci_last_regenerate|i:1543412355;')
ERROR - 2018-11-28 19:10:00 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('5pf3jr0ditqd2qvajh7u53ov9o0a6ac3', '137.97.75.107', 1543412355, '__ci_last_regenerate|i:1543412355;')
ERROR - 2018-11-28 19:10:00 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('06760298ada82559a2c3c59ae791d5eb') AS ci_session_lock
ERROR - 2018-11-28 19:10:00 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('d10b405c0e9ee6a1cf1f1c4ce4a74df1') AS ci_session_lock
ERROR - 2018-11-28 19:10:00 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('efbc83cf0b3632103efe2bba5097c846') AS ci_session_lock
ERROR - 2018-11-28 19:10:00 --> Query error: MySQL server has gone away - Invalid query: SELECT *, `b`.`id` AS `cat_id`, `c`.`id` AS `subcat_id`, `a`.`id` AS `video_id`, `a`.`created` as `creates`, `a`.`updated` as `updates`
FROM `video` AS `a`
INNER JOIN `category` AS `b` ON `a`.`cat_id` = `b`.`id`
INNER JOIN `sub_category` AS `c` ON `a`.`subcat_id` = `c`.`id`
WHERE `a`.`cat_id` = '2'
AND `a`.`subcat_id` = '5'
AND `a`.`id` = '8263'
ORDER BY `a`.`rel_date` DESC
ERROR - 2018-11-28 19:10:00 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `singer`
WHERE `id` = '3484'
AND `status` =0
ERROR - 2018-11-28 19:10:00 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('9oc5d19o9jfb3c372la4cdrthrlcv5at', '37.9.113.105', 1543412400, '__ci_last_regenerate|i:1543412400;')
ERROR - 2018-11-28 19:10:00 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('9ef7a6eb44fda117ff8e89c0b1812f79') AS ci_session_lock
ERROR - 2018-11-28 19:10:00 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('780hstn2ln10b1j5h2lch1m4ed3nsikd', '66.249.79.167', 1543412400, '__ci_last_regenerate|i:1543412400;')
ERROR - 2018-11-28 19:10:00 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('662cab306196d93c1c2c3eca7a935c3d') AS ci_session_lock
ERROR - 2018-11-28 19:10:00 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('f4d921575fd5023eaa6c73b69fa53181') AS ci_session_lock
ERROR - 2018-11-28 19:10:05 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('d6pt6kelja1jv6tj6rckpukmnuefocs1', '66.249.79.167', 1543412360, '__ci_last_regenerate|i:1543412355;')
ERROR - 2018-11-28 19:10:05 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('a70c9b3386303ffa7312cc544b702c76') AS ci_session_lock
ERROR - 2018-11-28 19:10:45 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('gr91m05mkg5dmsekurmgu6tb3jh0fh6a', '157.55.39.207', 1543412401, '__ci_last_regenerate|i:1543412400;')
ERROR - 2018-11-28 19:10:45 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('i00o59nggvd29mdv0r575t0ta6cipar0', '27.97.177.10', 1543412400, '__ci_last_regenerate|i:1543412400;')
ERROR - 2018-11-28 19:10:45 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('iavd0djdjgof7udto92npgk94assrt3a', '27.97.184.202', 1543412400, '__ci_last_regenerate|i:1543412400;')
ERROR - 2018-11-28 19:10:45 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('290db73dc20d55e6aec90db8c33ddeef') AS ci_session_lock
ERROR - 2018-11-28 19:10:45 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('708a8c6c8d7d7eea7bdf3c7608830a8c') AS ci_session_lock
ERROR - 2018-11-28 19:10:45 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('hirs7ici7qk3g5k6n54okk2qcmkbv7kj', '157.55.39.207', 1543412400, '__ci_last_regenerate|i:1543412400;')
ERROR - 2018-11-28 19:10:45 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('289e0bfdca66f864daa4e7d4fbd16fb8') AS ci_session_lock
ERROR - 2018-11-28 19:10:45 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('959a6f900f297c400a927d6f3a9a221a') AS ci_session_lock
ERROR - 2018-11-28 19:10:50 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('mvajos0cfu4m0mlup73plqqkjmqphqb3', '37.9.113.105', 1543412406, '__ci_last_regenerate|i:1543412405;')
ERROR - 2018-11-28 19:10:50 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('ft8ckrst04kikklq8dn9tdqiecuuep5b', '66.249.79.167', 1543412405, '__ci_last_regenerate|i:1543412405;')
ERROR - 2018-11-28 19:10:50 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('fe8701d1cdad1e44621c43f10b4ca7f7') AS ci_session_lock
ERROR - 2018-11-28 19:10:50 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('fe4bc33a743728d79ca5da239b04ca79') AS ci_session_lock
ERROR - 2018-11-28 19:11:30 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('p2ujmto29gpcleqcip10c8ouenqeiuqs', '47.247.162.50', 1543412445, '__ci_last_regenerate|i:1543412445;')
ERROR - 2018-11-28 19:11:30 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('f435f3110c001758ce3d2b12ce159290') AS ci_session_lock
ERROR - 2018-11-28 19:11:30 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('ft7boprbbsnksgmb6kqeqevo3uhti897', '49.34.15.231', 1543412445, '__ci_last_regenerate|i:1543412445;')
ERROR - 2018-11-28 19:11:30 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('0fp89543l131l7cj0e7hdkfh9nnclq00', '157.55.39.208', 1543412446, '__ci_last_regenerate|i:1543412445;')
ERROR - 2018-11-28 19:11:30 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('8c86c7acce1583c5102c525bb6054093') AS ci_session_lock
ERROR - 2018-11-28 19:11:30 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('44f868e9e70624293afe0483b37e7782') AS ci_session_lock
ERROR - 2018-11-28 19:11:30 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('4q12rmldo7lj76o5ve4b0ptu738q38nm', '66.249.79.167', 1543412445, '__ci_last_regenerate|i:1543412445;')
ERROR - 2018-11-28 19:11:30 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('2d51357ac293b6458926701f810c0465') AS ci_session_lock
ERROR - 2018-11-28 19:11:30 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('il8ujmaf6o90r7scd8ej387mm7r99dr7', '49.15.88.6', 1543412445, '__ci_last_regenerate|i:1543412445;')
ERROR - 2018-11-28 19:11:30 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('175d8540ea035357a56201b7e2da1e70') AS ci_session_lock
ERROR - 2018-11-28 19:11:35 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('3um7o1jtc3lhmj03jeo74pedpvob9uks', '49.15.193.124', 1543412450, '__ci_last_regenerate|i:1543412450;')
ERROR - 2018-11-28 19:11:35 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('79e47adeb5f30ecd20de4ec42ff6d802') AS ci_session_lock
