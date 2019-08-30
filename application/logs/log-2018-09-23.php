<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-09-23 01:30:01 --> Query error: Unknown column 'assets' in 'where clause' - Invalid query: SELECT *, YEAR(`rel_date`) AS `rel_year`, `video_name` AS `name`, `video`.`id` AS `mstp_id`
FROM `video`
INNER JOIN `video_map_movie` ON `video`.`id` = `video_id`
INNER JOIN `sub_category` ON video.`subcat_id` = `sub_category`.`id`
WHERE `video`.`id` IN(SELECT `video_id` FROM `video_map_movie` WHERE `movie_id` = 'assets')
AND `movie_id` = `assets`
AND `video`.`is_deleted` =0
AND `cat_id` = 1
ORDER BY YEAR(`rel_date`) DESC
ERROR - 2018-09-23 01:30:01 --> Query error: Unknown column 'assets' in 'where clause' - Invalid query: SELECT *, YEAR(`rel_date`) AS `rel_year`, `video_name` AS `name`, `video`.`id` AS `mstp_id`
FROM `video`
INNER JOIN `video_map_movie` ON `video`.`id` = `video_id`
INNER JOIN `sub_category` ON video.`subcat_id` = `sub_category`.`id`
WHERE `video`.`id` IN(SELECT `video_id` FROM `video_map_movie` WHERE `movie_id` = 'assets')
AND `movie_id` = `assets`
AND `video`.`is_deleted` =0
AND `cat_id` = 1
ORDER BY YEAR(`rel_date`) DESC
ERROR - 2018-09-23 14:16:01 --> Unable to connect to the database
ERROR - 2018-09-23 14:16:01 --> Unable to connect to the database
ERROR - 2018-09-23 14:16:01 --> Unable to connect to the database
ERROR - 2018-09-23 14:16:02 --> Unable to connect to the database
ERROR - 2018-09-23 14:16:02 --> Unable to connect to the database
ERROR - 2018-09-23 14:16:02 --> Unable to connect to the database
ERROR - 2018-09-23 14:16:02 --> Unable to connect to the database
ERROR - 2018-09-23 14:16:02 --> Unable to connect to the database
ERROR - 2018-09-23 14:16:02 --> Unable to connect to the database
ERROR - 2018-09-23 14:16:03 --> Unable to connect to the database
ERROR - 2018-09-23 15:24:39 --> Query error: Column 'cat_id' cannot be null - Invalid query: INSERT INTO `video` (`cat_id`, `subcat_id`, `video_name`, `video_url`, `video_desc`, `video_keywords`, `rel_date`, `created`) VALUES (NULL, NULL, '', 'https://www.youtube.com/watch?v=HRLRU6C6RqU', NULL, NULL, '2018-09-23 15:24:39', '2018-09-23 15:24:39')
ERROR - 2018-09-23 17:53:22 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('ee8ddaae9885b1203716662d6714a77659a742c6', '42.107.216.181', 1537705356, '__ci_last_regenerate|i:1537705356;')
ERROR - 2018-09-23 17:53:22 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('d725d934524072ba2cacad039747e665') AS ci_session_lock
ERROR - 2018-09-23 17:53:22 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('2761ddffcb907cf1d1d0297a122df5a7583de4c0', '42.107.216.181', 1537705356, '__ci_last_regenerate|i:1537705356;')
ERROR - 2018-09-23 17:53:22 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('0ba4ce5ddd1472d7c17f0a7b682dbe97') AS ci_session_lock
ERROR - 2018-09-23 17:54:07 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('3e54d96b5cafc2336a6cb3f1c0bec747b768395a', '42.107.216.181', 1537705402, '__ci_last_regenerate|i:1537705402;')
ERROR - 2018-09-23 17:54:07 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('854fd4ae12d6f6dd26c636414570e774') AS ci_session_lock
ERROR - 2018-09-23 17:54:07 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `video` (`cat_id`, `subcat_id`, `video_name`, `video_url`, `video_desc`, `video_keywords`, `rel_date`, `created`, `video_thumb`) VALUES ('2', '2', 'Geography', 'https://www.youtube.com/watch?v=tuceUhmWQvc', '', '', '2018-09-21 17:53:22', '2018-09-23 17:53:22', 'Geography.jpg')
ERROR - 2018-09-23 17:54:07 --> Database: Failure during an automated transaction commit/rollback!
ERROR - 2018-09-23 17:54:07 --> Query error: MySQL server has gone away - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1537705447
WHERE `id` = '4a99f4af9d0bfb785a13a34258bad1f8ff6f0cf8'
ERROR - 2018-09-23 17:54:07 --> Database: Failure during an automated transaction commit/rollback!
ERROR - 2018-09-23 17:54:07 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('a447e7f0cdce96bd6136f53f4a4419ed') AS ci_session_lock
ERROR - 2018-09-23 17:54:07 --> Database: Failure during an automated transaction commit/rollback!
ERROR - 2018-09-23 17:54:07 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('398661ae21869f515a6a2b233cd766558b768fed', '42.107.216.181', 1537705402, '__ci_last_regenerate|i:1537705402;')
ERROR - 2018-09-23 17:54:07 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('ad4abcb72b8a20c20e151b966f61d0d0') AS ci_session_lock
ERROR - 2018-09-23 17:54:07 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('4ceae7816229a6667afb58f9b96ba30d3b3fc38c', '42.107.216.181', 1537705402, '__ci_last_regenerate|i:1537705402;')
ERROR - 2018-09-23 17:54:07 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('445e9b20a0d5c0ebf06fc20eabee5842') AS ci_session_lock
ERROR - 2018-09-23 17:54:07 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('e0a95bac096f10d0b3843ecac5f6016fc7e81b69', '42.107.200.109', 1537705402, '__ci_last_regenerate|i:1537705402;')
ERROR - 2018-09-23 17:54:07 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('cb9dcf3ab13c636b5aa68c28cab0733e') AS ci_session_lock
ERROR - 2018-09-23 17:54:07 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('cae010669eb354af8e11a28490f0784e50b28bf0', '42.107.216.181', 1537705402, '__ci_last_regenerate|i:1537705402;')
ERROR - 2018-09-23 17:54:07 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('84fa3c17b43b204db4a4cba77db85ce1') AS ci_session_lock
ERROR - 2018-09-23 17:54:07 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('6380b135873e61ad97aae5dd98bc89e43a099675', '42.107.216.181', 1537705402, '__ci_last_regenerate|i:1537705402;')
ERROR - 2018-09-23 17:54:07 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('14824bc56ae26cc1c7d5a0e0c636821b') AS ci_session_lock
ERROR - 2018-09-23 17:54:07 --> Query error: MySQL server has gone away - Invalid query: SELECT *, `c`.`id` AS `subcat_id`, `a`.`id` AS `poster_id`, `a`.`created` as `creates`, `a`.`updated` as `updates`
FROM `poster` AS `a`
INNER JOIN `sub_category` AS `c` ON `a`.`subcat_id` = `c`.`id`
WHERE `a`.`subcat_id` = '3'
AND `a`.`id` = '1445'
ORDER BY `a`.`rel_date` DESC
ERROR - 2018-09-23 17:54:07 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('370aaea185f03e3ac1c0788b19b506269caa1a3d', '37.9.113.105', 1537705447, '__ci_last_regenerate|i:1537705447;')
ERROR - 2018-09-23 17:54:07 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('6ae4a648cb7ce0ca56d88228abad4fe1') AS ci_session_lock
ERROR - 2018-09-23 21:57:48 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'asc
               LIMIT 0,10' at line 5 - Invalid query: 

               SELECT user.id,user.created,user.name,user.mobile,user.email,user.gender,user_points.earn_points,user_points.total_video_play,user.img,user_points.earn_points,user_points.total_invite,user_points.total_social_likes,user_points.total_share,user_points.totla_frnds_share,user_points.total_likes,user_points.total_earn_rs,newsletter.id as subscriber,(SELECT count(*) FROM `user_activity` where user_activity.user_id = user.id and user_activity.user_activity = "play" and user_activity.created BETWEEN "2018-09-02" AND "2018-09-08") FROM user
               LEFT JOIN user_points ON user.id=user_points.user_id
               LEFT JOIN newsletter ON user.email=newsletter.email
               where 1 AND ( user.id LIKE '%%' OR user.created LIKE '%%' OR user.name LIKE '%%' OR user.mobile LIKE '%%' OR user.email LIKE '%%' OR user_points.earn_points LIKE '%%' OR user.gender LIKE '%%' )
               ORDER BY  asc
               LIMIT 0,10

            
ERROR - 2018-09-23 21:58:17 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'asc
               LIMIT 0,100' at line 5 - Invalid query: 

               SELECT user.id,user.created,user.name,user.mobile,user.email,user.gender,user_points.earn_points,user_points.total_video_play,user.img,user_points.earn_points,user_points.total_invite,user_points.total_social_likes,user_points.total_share,user_points.totla_frnds_share,user_points.total_likes,user_points.total_earn_rs,newsletter.id as subscriber,(SELECT count(*) FROM `user_activity` where user_activity.user_id = user.id and user_activity.user_activity = "play" and user_activity.created BETWEEN "2018-09-02" AND "2018-09-08") FROM user
               LEFT JOIN user_points ON user.id=user_points.user_id
               LEFT JOIN newsletter ON user.email=newsletter.email
               where 1 AND ( user.id LIKE '%%' OR user.created LIKE '%%' OR user.name LIKE '%%' OR user.mobile LIKE '%%' OR user.email LIKE '%%' OR user_points.earn_points LIKE '%%' OR user.gender LIKE '%%' )
               ORDER BY  asc
               LIMIT 0,100

            
ERROR - 2018-09-23 21:58:34 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'asc
               LIMIT 0,50' at line 5 - Invalid query: 

               SELECT user.id,user.created,user.name,user.mobile,user.email,user.gender,user_points.earn_points,user_points.total_video_play,user.img,user_points.earn_points,user_points.total_invite,user_points.total_social_likes,user_points.total_share,user_points.totla_frnds_share,user_points.total_likes,user_points.total_earn_rs,newsletter.id as subscriber,(SELECT count(*) FROM `user_activity` where user_activity.user_id = user.id and user_activity.user_activity = "play" and user_activity.created BETWEEN "2018-09-02" AND "2018-09-08") FROM user
               LEFT JOIN user_points ON user.id=user_points.user_id
               LEFT JOIN newsletter ON user.email=newsletter.email
               where 1 AND ( user.id LIKE '%%' OR user.created LIKE '%%' OR user.name LIKE '%%' OR user.mobile LIKE '%%' OR user.email LIKE '%%' OR user_points.earn_points LIKE '%%' OR user.gender LIKE '%%' )
               ORDER BY  asc
               LIMIT 0,50

            
ERROR - 2018-09-23 21:58:42 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'asc
               LIMIT 0,50' at line 5 - Invalid query: 

               SELECT user.id,user.created,user.name,user.mobile,user.email,user.gender,user_points.earn_points,user_points.total_video_play,user.img,user_points.earn_points,user_points.total_invite,user_points.total_social_likes,user_points.total_share,user_points.totla_frnds_share,user_points.total_likes,user_points.total_earn_rs,newsletter.id as subscriber,(SELECT count(*) FROM `user_activity` where user_activity.user_id = user.id and user_activity.user_activity = "play" and user_activity.created BETWEEN "2018-09-02" AND "2018-09-08") FROM user
               LEFT JOIN user_points ON user.id=user_points.user_id
               LEFT JOIN newsletter ON user.email=newsletter.email
               where 1 AND ( user.id LIKE '%%' OR user.created LIKE '%%' OR user.name LIKE '%%' OR user.mobile LIKE '%%' OR user.email LIKE '%%' OR user_points.earn_points LIKE '%%' OR user.gender LIKE '%%' )
               ORDER BY  asc
               LIMIT 0,50

            
ERROR - 2018-09-23 21:58:47 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'asc
               LIMIT 0,50' at line 5 - Invalid query: 

               SELECT user.id,user.created,user.name,user.mobile,user.email,user.gender,user_points.earn_points,user_points.total_video_play,user.img,user_points.earn_points,user_points.total_invite,user_points.total_social_likes,user_points.total_share,user_points.totla_frnds_share,user_points.total_likes,user_points.total_earn_rs,newsletter.id as subscriber,(SELECT count(*) FROM `user_activity` where user_activity.user_id = user.id and user_activity.user_activity = "play" and user_activity.created BETWEEN "2018-09-02" AND "2018-09-08") FROM user
               LEFT JOIN user_points ON user.id=user_points.user_id
               LEFT JOIN newsletter ON user.email=newsletter.email
               where 1 AND ( user.id LIKE '%%' OR user.created LIKE '%%' OR user.name LIKE '%%' OR user.mobile LIKE '%%' OR user.email LIKE '%%' OR user_points.earn_points LIKE '%%' OR user.gender LIKE '%%' )
               ORDER BY  asc
               LIMIT 0,50

            
ERROR - 2018-09-23 22:01:20 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'asc
               LIMIT 0,10' at line 5 - Invalid query: 

               SELECT user.id,user.created,user.name,user.mobile,user.email,user.gender,user_points.earn_points,user_points.total_video_play,user.img,user_points.earn_points,user_points.total_invite,user_points.total_social_likes,user_points.total_share,user_points.totla_frnds_share,user_points.total_likes,user_points.total_earn_rs,newsletter.id as subscriber,(SELECT count(*) FROM `user_activity` where user_activity.user_id = user.id and user_activity.user_activity = "play" and user_activity.created BETWEEN "2018-09-01" AND "2018-09-07") FROM user
               LEFT JOIN user_points ON user.id=user_points.user_id
               LEFT JOIN newsletter ON user.email=newsletter.email
               where 1 AND ( user.id LIKE '%%' OR user.created LIKE '%%' OR user.name LIKE '%%' OR user.mobile LIKE '%%' OR user.email LIKE '%%' OR user_points.earn_points LIKE '%%' OR user.gender LIKE '%%' )
               ORDER BY  asc
               LIMIT 0,10

            
ERROR - 2018-09-23 22:01:24 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'desc
               LIMIT 0,10' at line 5 - Invalid query: 

               SELECT user.id,user.created,user.name,user.mobile,user.email,user.gender,user_points.earn_points,user_points.total_video_play,user.img,user_points.earn_points,user_points.total_invite,user_points.total_social_likes,user_points.total_share,user_points.totla_frnds_share,user_points.total_likes,user_points.total_earn_rs,newsletter.id as subscriber,(SELECT count(*) FROM `user_activity` where user_activity.user_id = user.id and user_activity.user_activity = "play" and user_activity.created BETWEEN "2018-09-01" AND "2018-09-07") FROM user
               LEFT JOIN user_points ON user.id=user_points.user_id
               LEFT JOIN newsletter ON user.email=newsletter.email
               where 1 AND ( user.id LIKE '%%' OR user.created LIKE '%%' OR user.name LIKE '%%' OR user.mobile LIKE '%%' OR user.email LIKE '%%' OR user_points.earn_points LIKE '%%' OR user.gender LIKE '%%' )
               ORDER BY  desc
               LIMIT 0,10

            
ERROR - 2018-09-23 23:04:28 --> Query error: Column 'cat_id' cannot be null - Invalid query: INSERT INTO `video` (`cat_id`, `subcat_id`, `video_name`, `video_url`, `video_desc`, `video_keywords`, `rel_date`, `created`) VALUES (NULL, NULL, '', NULL, NULL, NULL, '2018-09-23 23:04:28', '2018-09-23 23:04:28')
