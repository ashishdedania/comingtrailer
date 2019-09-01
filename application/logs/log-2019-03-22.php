<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-03-22 05:51:21 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `user_activity` = 'liked' AND `shared_with` = ''' at line 3 - Invalid query: SELECT *
FROM `user_activity`
WHERE `user_id` = '' AND `cat_id` = '' AND `common_id` =  AND `user_activity` = 'liked' AND `shared_with` = ''
ERROR - 2019-03-22 05:54:11 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `user_activity` = 'liked' AND `shared_with` = ''' at line 3 - Invalid query: SELECT *
FROM `user_activity`
WHERE `user_id` = '' AND `cat_id` = '' AND `common_id` =  AND `user_activity` = 'liked' AND `shared_with` = ''
ERROR - 2019-03-22 05:56:00 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
ERROR - 2019-03-22 05:57:50 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
ERROR - 2019-03-22 11:52:26 --> Query error: Lost connection to MySQL server during query - Invalid query: 

               SELECT user.id,user.created,user.name,user.mobile,user.email,user.gender,user_points.earn_points,user_points.total_video_play,user.img,user_points.earn_points,user_points.total_invite,user_points.total_social_likes,user_points.total_share,user_points.totla_frnds_share,user_points.total_likes,user_points.total_earn_rs,newsletter.id as subscriber,(SELECT count(*) FROM `user_activity` where user_activity.user_id = user.id and user_activity.user_activity = "play") as activity_play,
               (select sum(shared_points) from user_frnd_share where shared_by_id = user.id) as point_share,
               (select sum(shared_points) from user_frnd_share where shared_to_id = user.id) as point_receive
               FROM user
               LEFT JOIN user_points ON user.id=user_points.user_id
               LEFT JOIN newsletter ON user.email=newsletter.email
               ORDER BY user.created desc
               LIMIT 0,10

            
ERROR - 2019-03-22 11:52:26 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('3e8a7061fe627c40e01ff97314290be3', 300) AS ci_session_lock
ERROR - 2019-03-22 11:52:26 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `adsense` AS `a`
WHERE `width` = '300'
AND `height` = '600'
ERROR - 2019-03-22 11:52:26 --> Query error: MySQL server has gone away - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1553235746
WHERE `id` = 'bf16df92363c8a1d8823d994078ae73e2bda06a1'
ERROR - 2019-03-22 11:52:26 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('3e8a7061fe627c40e01ff97314290be3') AS ci_session_lock
ERROR - 2019-03-22 11:52:26 --> Query error: MySQL server has gone away - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1553235746
WHERE `id` = 'bf16df92363c8a1d8823d994078ae73e2bda06a1'
ERROR - 2019-03-22 11:52:26 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('3e8a7061fe627c40e01ff97314290be3') AS ci_session_lock
ERROR - 2019-03-22 11:52:51 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('3e8a7061fe627c40e01ff97314290be3', 300) AS ci_session_lock
ERROR - 2019-03-22 11:52:51 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('3e8a7061fe627c40e01ff97314290be3', 300) AS ci_session_lock
ERROR - 2019-03-22 11:52:51 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('3e8a7061fe627c40e01ff97314290be3', 300) AS ci_session_lock
ERROR - 2019-03-22 12:50:35 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('3e8a7061fe627c40e01ff97314290be3', 300) AS ci_session_lock
ERROR - 2019-03-22 12:50:35 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('3e8a7061fe627c40e01ff97314290be3', 300) AS ci_session_lock
ERROR - 2019-03-22 14:33:37 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('391efb1812b6936f456985e116452207', 300) AS ci_session_lock
ERROR - 2019-03-22 14:33:43 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('391efb1812b6936f456985e116452207', 300) AS ci_session_lock
ERROR - 2019-03-22 14:33:43 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('391efb1812b6936f456985e116452207', 300) AS ci_session_lock
ERROR - 2019-03-22 14:33:43 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('391efb1812b6936f456985e116452207', 300) AS ci_session_lock
ERROR - 2019-03-22 14:33:43 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('391efb1812b6936f456985e116452207', 300) AS ci_session_lock
ERROR - 2019-03-22 14:33:48 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('391efb1812b6936f456985e116452207', 300) AS ci_session_lock
ERROR - 2019-03-22 14:33:48 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('391efb1812b6936f456985e116452207', 300) AS ci_session_lock
ERROR - 2019-03-22 14:33:48 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('391efb1812b6936f456985e116452207', 300) AS ci_session_lock
ERROR - 2019-03-22 22:06:10 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
