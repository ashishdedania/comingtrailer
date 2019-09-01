<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-09-26 05:52:38 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `video` SET `youtube_views` = '4059171'
WHERE `id` = '4193'
ERROR - 2018-09-26 05:52:38 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('7c48e761dc96eef63c213e537f126d1a86f4781c', '43.225.54.56', 1537921358, '__ci_last_regenerate|i:1537921083;')
ERROR - 2018-09-26 05:52:38 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('45e7f1ded06a670adcf797c1d4a392e8') AS ci_session_lock
ERROR - 2018-09-26 05:52:42 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('50c73e8486b8bb3ba0059e63f886e599d7fad4f2', '66.249.79.186', 1537921317, '__ci_last_regenerate|i:1537921316;')
ERROR - 2018-09-26 05:52:42 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('abfa36dc333c84803dfeba34a9348db0') AS ci_session_lock
ERROR - 2018-09-26 05:53:27 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('c54a769f98fb767e77954d43728f972d2197423c', '66.249.79.190', 1537921363, '__ci_last_regenerate|i:1537921362;')
ERROR - 2018-09-26 05:53:27 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('564d67a58b2304cdd991b60f29baa13c') AS ci_session_lock
ERROR - 2018-09-26 05:53:27 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('13b357b94ae1423c849e8e8fa8d195b02e2bcc36', '169.239.220.35', 1537921364, '__ci_last_regenerate|i:1537921362;')
ERROR - 2018-09-26 05:53:28 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('8ef07c653513d279cb430f7ac7420e2e') AS ci_session_lock
ERROR - 2018-09-26 10:05:30 --> Unable to connect to the database
ERROR - 2018-09-26 10:05:39 --> Unable to connect to the database
ERROR - 2018-09-26 10:05:49 --> Unable to connect to the database
ERROR - 2018-09-26 10:06:02 --> Unable to connect to the database
ERROR - 2018-09-26 10:06:03 --> Unable to connect to the database
ERROR - 2018-09-26 10:06:09 --> Unable to connect to the database
ERROR - 2018-09-26 10:06:11 --> Unable to connect to the database
ERROR - 2018-09-26 10:06:15 --> Unable to connect to the database
ERROR - 2018-09-26 10:06:35 --> Unable to connect to the database
ERROR - 2018-09-26 10:06:38 --> Unable to connect to the database
ERROR - 2018-09-26 10:06:39 --> Unable to connect to the database
ERROR - 2018-09-26 10:06:42 --> Unable to connect to the database
ERROR - 2018-09-26 10:06:42 --> Unable to connect to the database
ERROR - 2018-09-26 10:06:46 --> Unable to connect to the database
ERROR - 2018-09-26 10:08:04 --> Unable to connect to the database
ERROR - 2018-09-26 10:09:01 --> Unable to connect to the database
ERROR - 2018-09-26 10:45:58 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'order by end_date asc' at line 2 - Invalid query: SELECT user.id,user.created,user.name,user.mobile,user.email,user.gender,user.img,weekly_winners.start_date,weekly_winners.end_date,weekly_winners.user_id,weekly_winners.winning_prize,weekly_winners.id as winner_id FROM weekly_winners               
               INNER JOIN user ON user.id=weekly_winners.user_id where  order by end_date asc
ERROR - 2018-09-26 17:05:13 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('7921994688da5c531c676bfd159d9acd', 300) AS ci_session_lock
ERROR - 2018-09-26 17:05:18 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('7921994688da5c531c676bfd159d9acd', 300) AS ci_session_lock
ERROR - 2018-09-26 18:36:19 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('b374cf63c172673340a85145251ad601', 300) AS ci_session_lock
ERROR - 2018-09-26 21:09:04 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'order by end_date asc' at line 2 - Invalid query: SELECT user.id,user.created,user.name,user.mobile,user.email,user.gender,user.img,weekly_winners.start_date,weekly_winners.end_date,weekly_winners.user_id,weekly_winners.winning_prize,weekly_winners.id as winner_id FROM weekly_winners               
               INNER JOIN user ON user.id=weekly_winners.user_id where  order by end_date asc
ERROR - 2018-09-26 21:29:57 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'having activity_play > 0' at line 7 - Invalid query: 

               SELECT user.id,user.created,user.name,user.mobile,user.email,user.gender,user_points.earn_points,user_points.total_video_play,user.img,user_points.earn_points,user_points.total_invite,user_points.total_social_likes,user_points.total_share,user_points.totla_frnds_share,user_points.total_likes,user_points.total_earn_rs,newsletter.id as subscriber,(SELECT count(*) FROM `user_activity` where user_activity.user_id = user.id and user_activity.user_activity = "play" and date(user_activity.created) >= "2018-09-17" AND date(user_activity.created) <= "2018-09-23") as activity_play FROM user
               LEFT JOIN user_points ON user.id=user_points.user_id
               LEFT JOIN newsletter ON user.email=newsletter.email
               where 1 AND ( user.id LIKE '%%' OR user.created LIKE '%%' OR user.name LIKE '%%' OR user.mobile LIKE '%%' OR user.email LIKE '%%' OR user_points.earn_points LIKE '%%' OR user.gender LIKE '%%' )
               ORDER BY (SELECT count(*) FROM `user_activity` where user_activity.user_id = user.id and user_activity.user_activity = "play" and date(user_activity.created) >= "2018-09-17" AND date(user_activity.created) <= "2018-09-23") desc
               LIMIT 0,10
                having activity_play > 0
            
ERROR - 2018-09-26 21:30:15 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'having activity_play > 0' at line 7 - Invalid query: 

               SELECT user.id,user.created,user.name,user.mobile,user.email,user.gender,user_points.earn_points,user_points.total_video_play,user.img,user_points.earn_points,user_points.total_invite,user_points.total_social_likes,user_points.total_share,user_points.totla_frnds_share,user_points.total_likes,user_points.total_earn_rs,newsletter.id as subscriber,(SELECT count(*) FROM `user_activity` where user_activity.user_id = user.id and user_activity.user_activity = "play" and date(user_activity.created) >= "2018-09-17" AND date(user_activity.created) <= "2018-09-23") as activity_play FROM user
               LEFT JOIN user_points ON user.id=user_points.user_id
               LEFT JOIN newsletter ON user.email=newsletter.email
               where 1 AND ( user.id LIKE '%%' OR user.created LIKE '%%' OR user.name LIKE '%%' OR user.mobile LIKE '%%' OR user.email LIKE '%%' OR user_points.earn_points LIKE '%%' OR user.gender LIKE '%%' )
               ORDER BY (SELECT count(*) FROM `user_activity` where user_activity.user_id = user.id and user_activity.user_activity = "play" and date(user_activity.created) >= "2018-09-17" AND date(user_activity.created) <= "2018-09-23") desc
               LIMIT 0,10
                having activity_play > 0
            
ERROR - 2018-09-26 21:31:32 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'having activity_play > 0
                LIMIT 0,10' at line 6 - Invalid query: 

               SELECT user.id,user.created,user.name,user.mobile,user.email,user.gender,user_points.earn_points,user_points.total_video_play,user.img,user_points.earn_points,user_points.total_invite,user_points.total_social_likes,user_points.total_share,user_points.totla_frnds_share,user_points.total_likes,user_points.total_earn_rs,newsletter.id as subscriber,(SELECT count(*) FROM `user_activity` where user_activity.user_id = user.id and user_activity.user_activity = "play" and date(user_activity.created) >= "2018-09-17" AND date(user_activity.created) <= "2018-09-23") as activity_play FROM user
               LEFT JOIN user_points ON user.id=user_points.user_id
               LEFT JOIN newsletter ON user.email=newsletter.email
               where 1 AND ( user.id LIKE '%%' OR user.created LIKE '%%' OR user.name LIKE '%%' OR user.mobile LIKE '%%' OR user.email LIKE '%%' OR user_points.earn_points LIKE '%%' OR user.gender LIKE '%%' )
               ORDER BY (SELECT count(*) FROM `user_activity` where user_activity.user_id = user.id and user_activity.user_activity = "play" and date(user_activity.created) >= "2018-09-17" AND date(user_activity.created) <= "2018-09-23") desc
                having activity_play > 0
                LIMIT 0,10
            
ERROR - 2018-09-26 21:45:20 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'order by end_date asc' at line 2 - Invalid query: SELECT user.id,user.created,user.name,user.mobile,user.email,user.gender,user.img,weekly_winners.start_date,weekly_winners.end_date,weekly_winners.user_id,weekly_winners.winning_prize,weekly_winners.id as winner_id FROM weekly_winners               
               INNER JOIN user ON user.id=weekly_winners.user_id where  order by end_date asc
ERROR - 2018-09-26 21:46:40 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'order by end_date asc' at line 2 - Invalid query: SELECT user.id,user.created,user.name,user.mobile,user.email,user.gender,user.img,weekly_winners.start_date,weekly_winners.end_date,weekly_winners.user_id,weekly_winners.winning_prize,weekly_winners.id as winner_id FROM weekly_winners               
               INNER JOIN user ON user.id=weekly_winners.user_id where  order by end_date asc
ERROR - 2018-09-26 22:14:01 --> Query error: Lost connection to MySQL server during query - Invalid query: 

               SELECT user.id,user.created,user.name,user.mobile,user.email,user.gender,user_points.earn_points,user_points.total_video_play,user.img,user_points.earn_points,user_points.total_invite,user_points.total_social_likes,user_points.total_share,user_points.totla_frnds_share,user_points.total_likes,user_points.total_earn_rs,newsletter.id as subscriber,(SELECT count(*) FROM `user_activity` where user_activity.user_id = user.id and user_activity.user_activity = "play" and date(user_activity.created) >= "2018-09-01" AND date(user_activity.created) <= "2018-09-26") as activity_play FROM user
               LEFT JOIN user_points ON user.id=user_points.user_id
               LEFT JOIN newsletter ON user.email=newsletter.email
               where (SELECT count(*) FROM `user_activity` where user_activity.user_id = user.id and user_activity.user_activity = "play" and date(user_activity.created) >= "2018-09-01" AND date(user_activity.created) <= "2018-09-26") AND ( user.id LIKE '%%' OR user.created LIKE '%%' OR user.name LIKE '%%' OR user.mobile LIKE '%%' OR user.email LIKE '%%' OR user_points.earn_points LIKE '%%' OR user.gender LIKE '%%' ) AND newsletter.email IS NOT NULL
               ORDER BY (SELECT count(*) FROM `user_activity` where user_activity.user_id = user.id and user_activity.user_activity = "play" and date(user_activity.created) >= "2018-09-01" AND date(user_activity.created) <= "2018-09-26") desc
               LIMIT 0,250

            
ERROR - 2018-09-26 22:14:01 --> Query error: MySQL server has gone away - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1537980241
WHERE `id` = '1rsuie0ing0bgusm5m1917ntddevl6lg'
ERROR - 2018-09-26 22:14:01 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('861bc86167d96ec415516bb121d38fe6') AS ci_session_lock
ERROR - 2018-09-26 22:15:21 --> Query error: Lost connection to MySQL server during query - Invalid query: 

               SELECT user.id,user.created,user.name,user.mobile,user.email,user.gender,user_points.earn_points,user_points.total_video_play,user.img,user_points.earn_points,user_points.total_invite,user_points.total_social_likes,user_points.total_share,user_points.totla_frnds_share,user_points.total_likes,user_points.total_earn_rs,newsletter.id as subscriber,(SELECT count(*) FROM `user_activity` where user_activity.user_id = user.id and user_activity.user_activity = "play" and date(user_activity.created) >= "2018-01-01" AND date(user_activity.created) <= "2018-01-31") as activity_play FROM user
               LEFT JOIN user_points ON user.id=user_points.user_id
               LEFT JOIN newsletter ON user.email=newsletter.email
               where (SELECT count(*) FROM `user_activity` where user_activity.user_id = user.id and user_activity.user_activity = "play" and date(user_activity.created) >= "2018-01-01" AND date(user_activity.created) <= "2018-01-31") AND ( user.id LIKE '%%' OR user.created LIKE '%%' OR user.name LIKE '%%' OR user.mobile LIKE '%%' OR user.email LIKE '%%' OR user_points.earn_points LIKE '%%' OR user.gender LIKE '%%' ) AND newsletter.email IS NOT NULL
               ORDER BY (SELECT count(*) FROM `user_activity` where user_activity.user_id = user.id and user_activity.user_activity = "play" and date(user_activity.created) >= "2018-01-01" AND date(user_activity.created) <= "2018-01-31") desc
               LIMIT 0,250

            
ERROR - 2018-09-26 22:15:21 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('97fc3752c84e55d2d29dc77205a2e2f7', 300) AS ci_session_lock
ERROR - 2018-09-26 22:15:21 --> Query error: MySQL server has gone away - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1537980321
WHERE `id` = 'rnvndipaal4hoe9fp18ufk522q3fflho'
ERROR - 2018-09-26 22:15:21 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('97fc3752c84e55d2d29dc77205a2e2f7') AS ci_session_lock
ERROR - 2018-09-26 22:16:06 --> Query error: Lost connection to MySQL server during query - Invalid query: 

               SELECT user.id,user.created,user.name,user.mobile,user.email,user.gender,user_points.earn_points,user_points.total_video_play,user.img,user_points.earn_points,user_points.total_invite,user_points.total_social_likes,user_points.total_share,user_points.totla_frnds_share,user_points.total_likes,user_points.total_earn_rs,newsletter.id as subscriber,(SELECT count(*) FROM `user_activity` where user_activity.user_id = user.id and user_activity.user_activity = "play" and date(user_activity.created) >= "2018-01-01" AND date(user_activity.created) <= "2018-01-31") as activity_play FROM user
               LEFT JOIN user_points ON user.id=user_points.user_id
               LEFT JOIN newsletter ON user.email=newsletter.email
               where (SELECT count(*) FROM `user_activity` where user_activity.user_id = user.id and user_activity.user_activity = "play" and date(user_activity.created) >= "2018-01-01" AND date(user_activity.created) <= "2018-01-31") AND ( user.id LIKE '%%' OR user.created LIKE '%%' OR user.name LIKE '%%' OR user.mobile LIKE '%%' OR user.email LIKE '%%' OR user_points.earn_points LIKE '%%' OR user.gender LIKE '%%' ) AND newsletter.email IS NOT NULL
               ORDER BY (SELECT count(*) FROM `user_activity` where user_activity.user_id = user.id and user_activity.user_activity = "play" and date(user_activity.created) >= "2018-01-01" AND date(user_activity.created) <= "2018-01-31") desc
               LIMIT 0,25

            
ERROR - 2018-09-26 22:16:06 --> Query error: MySQL server has gone away - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1537980366
WHERE `id` = 'rnvndipaal4hoe9fp18ufk522q3fflho'
ERROR - 2018-09-26 22:16:06 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('97fc3752c84e55d2d29dc77205a2e2f7') AS ci_session_lock
ERROR - 2018-09-26 22:16:36 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('97fc3752c84e55d2d29dc77205a2e2f7', 300) AS ci_session_lock
ERROR - 2018-09-26 22:16:36 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('97fc3752c84e55d2d29dc77205a2e2f7', 300) AS ci_session_lock
ERROR - 2018-09-26 22:16:51 --> Query error: Lost connection to MySQL server during query - Invalid query: 

               SELECT user.id,user.created,user.name,user.mobile,user.email,user.gender,user_points.earn_points,user_points.total_video_play,user.img,user_points.earn_points,user_points.total_invite,user_points.total_social_likes,user_points.total_share,user_points.totla_frnds_share,user_points.total_likes,user_points.total_earn_rs,newsletter.id as subscriber,(SELECT count(*) FROM `user_activity` where user_activity.user_id = user.id and user_activity.user_activity = "play" and date(user_activity.created) >= "2018-01-01" AND date(user_activity.created) <= "2018-01-31") as activity_play FROM user
               LEFT JOIN user_points ON user.id=user_points.user_id
               LEFT JOIN newsletter ON user.email=newsletter.email
               where (SELECT count(*) FROM `user_activity` where user_activity.user_id = user.id and user_activity.user_activity = "play" and date(user_activity.created) >= "2018-01-01" AND date(user_activity.created) <= "2018-01-31") AND ( user.id LIKE '%%' OR user.created LIKE '%%' OR user.name LIKE '%%' OR user.mobile LIKE '%%' OR user.email LIKE '%%' OR user_points.earn_points LIKE '%%' OR user.gender LIKE '%%' ) AND newsletter.email IS NOT NULL
               ORDER BY (SELECT count(*) FROM `user_activity` where user_activity.user_id = user.id and user_activity.user_activity = "play" and date(user_activity.created) >= "2018-01-01" AND date(user_activity.created) <= "2018-01-31") desc
               LIMIT 0,500

            
ERROR - 2018-09-26 22:16:51 --> Query error: MySQL server has gone away - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1537980411
WHERE `id` = 'rnvndipaal4hoe9fp18ufk522q3fflho'
ERROR - 2018-09-26 22:16:51 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('97fc3752c84e55d2d29dc77205a2e2f7') AS ci_session_lock
