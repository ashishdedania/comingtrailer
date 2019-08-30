<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-09-24 13:35:09 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'asc
               LIMIT 0,10' at line 5 - Invalid query: 

               SELECT user.id,user.created,user.name,user.mobile,user.email,user.gender,user_points.earn_points,user_points.total_video_play,user.img,user_points.earn_points,user_points.total_invite,user_points.total_social_likes,user_points.total_share,user_points.totla_frnds_share,user_points.total_likes,user_points.total_earn_rs,newsletter.id as subscriber,(SELECT count(*) FROM `user_activity` where user_activity.user_id = user.id and user_activity.user_activity = "play" and user_activity.created BETWEEN "2018-01-01" AND "2018-01-07") FROM user
               LEFT JOIN user_points ON user.id=user_points.user_id
               LEFT JOIN newsletter ON user.email=newsletter.email
               where 1 AND ( user.id LIKE '%%' OR user.created LIKE '%%' OR user.name LIKE '%%' OR user.mobile LIKE '%%' OR user.email LIKE '%%' OR user_points.earn_points LIKE '%%' OR user.gender LIKE '%%' )
               ORDER BY  asc
               LIMIT 0,10

            
ERROR - 2018-09-24 13:35:12 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'desc
               LIMIT 0,10' at line 5 - Invalid query: 

               SELECT user.id,user.created,user.name,user.mobile,user.email,user.gender,user_points.earn_points,user_points.total_video_play,user.img,user_points.earn_points,user_points.total_invite,user_points.total_social_likes,user_points.total_share,user_points.totla_frnds_share,user_points.total_likes,user_points.total_earn_rs,newsletter.id as subscriber,(SELECT count(*) FROM `user_activity` where user_activity.user_id = user.id and user_activity.user_activity = "play" and user_activity.created BETWEEN "2018-01-01" AND "2018-01-07") FROM user
               LEFT JOIN user_points ON user.id=user_points.user_id
               LEFT JOIN newsletter ON user.email=newsletter.email
               where 1 AND ( user.id LIKE '%%' OR user.created LIKE '%%' OR user.name LIKE '%%' OR user.mobile LIKE '%%' OR user.email LIKE '%%' OR user_points.earn_points LIKE '%%' OR user.gender LIKE '%%' )
               ORDER BY  desc
               LIMIT 0,10

            
ERROR - 2018-09-24 13:35:23 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'desc
               LIMIT 40,10' at line 5 - Invalid query: 

               SELECT user.id,user.created,user.name,user.mobile,user.email,user.gender,user_points.earn_points,user_points.total_video_play,user.img,user_points.earn_points,user_points.total_invite,user_points.total_social_likes,user_points.total_share,user_points.totla_frnds_share,user_points.total_likes,user_points.total_earn_rs,newsletter.id as subscriber,(SELECT count(*) FROM `user_activity` where user_activity.user_id = user.id and user_activity.user_activity = "play" and user_activity.created BETWEEN "2018-01-01" AND "2018-01-07") FROM user
               LEFT JOIN user_points ON user.id=user_points.user_id
               LEFT JOIN newsletter ON user.email=newsletter.email
               where 1 AND ( user.id LIKE '%%' OR user.created LIKE '%%' OR user.name LIKE '%%' OR user.mobile LIKE '%%' OR user.email LIKE '%%' OR user_points.earn_points LIKE '%%' OR user.gender LIKE '%%' )
               ORDER BY  desc
               LIMIT 40,10

            
ERROR - 2018-09-24 13:35:29 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'desc
               LIMIT 30,10' at line 5 - Invalid query: 

               SELECT user.id,user.created,user.name,user.mobile,user.email,user.gender,user_points.earn_points,user_points.total_video_play,user.img,user_points.earn_points,user_points.total_invite,user_points.total_social_likes,user_points.total_share,user_points.totla_frnds_share,user_points.total_likes,user_points.total_earn_rs,newsletter.id as subscriber,(SELECT count(*) FROM `user_activity` where user_activity.user_id = user.id and user_activity.user_activity = "play" and user_activity.created BETWEEN "2018-01-01" AND "2018-01-07") FROM user
               LEFT JOIN user_points ON user.id=user_points.user_id
               LEFT JOIN newsletter ON user.email=newsletter.email
               where 1 AND ( user.id LIKE '%%' OR user.created LIKE '%%' OR user.name LIKE '%%' OR user.mobile LIKE '%%' OR user.email LIKE '%%' OR user_points.earn_points LIKE '%%' OR user.gender LIKE '%%' )
               ORDER BY  desc
               LIMIT 30,10

            
ERROR - 2018-09-24 18:52:21 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `video` SET `youtube_views` = '441270'
WHERE `id` = '3902'
ERROR - 2018-09-24 18:52:21 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('7d2763a8a02dc2dd9b5b1a9daa122f709c53bf86', '43.225.54.56', 1537795341, '__ci_last_regenerate|i:1537795083;')
ERROR - 2018-09-24 18:52:21 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('e005af6e2701e1bdaaaeafac69df3c0b') AS ci_session_lock
ERROR - 2018-09-24 18:53:36 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('89571d5ba93f5470c191cd6d5c4ab4bb81c694ce', '207.46.13.63', 1537795371, '__ci_last_regenerate|i:1537795370;')
ERROR - 2018-09-24 18:53:36 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('ffa84b3520f4e1d3c1651af4a326accc') AS ci_session_lock
ERROR - 2018-09-24 18:54:21 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('cea793e08e16ac61187fe648c837d31cfc5868cb', '47.11.144.72', 1537795416, '__ci_last_regenerate|i:1537795416;')
ERROR - 2018-09-24 18:54:21 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('07bad533960bfcf8126d3a2426d2e3fa') AS ci_session_lock
ERROR - 2018-09-24 18:54:21 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `adsense` AS `a`
WHERE `width` = '300'
AND `height` = '600'
ERROR - 2018-09-24 18:54:21 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('089a5c8eb2a6386ddc45e737d302aaaf41adf3a8', '43.225.54.56', 1537795461, '__ci_last_regenerate|i:1537795461;')
ERROR - 2018-09-24 18:54:21 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('23fb7348d5bcb65b70904a1d94245ebc') AS ci_session_lock
ERROR - 2018-09-24 18:55:06 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('284324e2bac509ac46c2a05d61684179d87d9b15', '66.249.79.218', 1537795461, '__ci_last_regenerate|i:1537795416;')
ERROR - 2018-09-24 18:55:06 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('d7ee9d1f7544d177bfc0ae2232bea8c4') AS ci_session_lock
ERROR - 2018-09-24 18:55:06 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('ac3428a74ea216e2c830a00c3d90fcfed5f0aef7', '43.225.54.56', 1537795461, '__ci_last_regenerate|i:1537795461;')
ERROR - 2018-09-24 18:55:06 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `video` SET `youtube_views` = '25291'
WHERE `id` = '4196'
ERROR - 2018-09-24 18:55:06 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('52b965bd79cd05625daf7823be6e8fbb') AS ci_session_lock
ERROR - 2018-09-24 18:55:06 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('f2d3f7ede0b8df1b18bc27319e02af89fbf89ffc', '43.225.54.56', 1537795506, '__ci_last_regenerate|i:1537795461;')
ERROR - 2018-09-24 18:55:06 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('63d393de385a01f830711a29f7a76e38') AS ci_session_lock
ERROR - 2018-09-24 18:55:51 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('d5b954a4c045f03c9bf7c46bf96fc3cce2d36e2f', '43.225.54.56', 1537795507, '__ci_last_regenerate|i:1537795506;')
ERROR - 2018-09-24 18:55:51 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('853e8c0e39f91a600b4b867e97bcef42') AS ci_session_lock
ERROR - 2018-09-24 18:55:51 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('6ef786984bc9897e5cd03fd4fa2f5059a579b994', '18.217.100.175', 1537795507, '__ci_last_regenerate|i:1537795506;')
ERROR - 2018-09-24 18:55:51 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('d010f4155a734bb84d32ef497f0cf707') AS ci_session_lock
ERROR - 2018-09-24 18:55:51 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `adsense` AS `a`
WHERE `width` = '300'
AND `height` = '600'
ERROR - 2018-09-24 18:55:51 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('ac55c4df3d25989343d2af0e7bd424a597026aa9', '43.225.54.56', 1537795551, '__ci_last_regenerate|i:1537795551;')
ERROR - 2018-09-24 18:55:51 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('37833e4ea63f878f3b6fafeac31c3121') AS ci_session_lock
ERROR - 2018-09-24 18:56:36 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('61e823a493a6e3eb3be36e25ba6331d08b9c3113', '66.249.79.218', 1537795552, '__ci_last_regenerate|i:1537795416;')
ERROR - 2018-09-24 18:56:36 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('8eca30a704361bd55672e70200c8b981') AS ci_session_lock
ERROR - 2018-09-24 18:56:36 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('6dc26c98acadf97bc6f6770820e48e5912aa2608', '66.249.79.218', 1537795552, '__ci_last_regenerate|i:1537795551;')
ERROR - 2018-09-24 18:56:36 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('d5c3f5b498c31fcf7df10036c9982b4e') AS ci_session_lock
ERROR - 2018-09-24 18:56:36 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `adsense` AS `a`
WHERE `width` = '300'
AND `height` = '600'
ERROR - 2018-09-24 18:56:36 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('2d18ea11c6993263b2a8de4f2d43c914e2586d1f', '43.225.54.56', 1537795596, '__ci_last_regenerate|i:1537795596;')
ERROR - 2018-09-24 18:56:36 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('605a4c81ffd46f9f01e6d032e353fc0c') AS ci_session_lock
ERROR - 2018-09-24 18:57:21 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('9882b5c3172d4b19e62764b09583cbce5480b812', '207.46.13.139', 1537795597, '__ci_last_regenerate|i:1537795461;')
ERROR - 2018-09-24 18:57:21 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('6677788aeb89783fc1fd1239937d5ccb') AS ci_session_lock
ERROR - 2018-09-24 18:57:21 --> Query error: MySQL server has gone away - Invalid query: SELECT *, `c`.`id` AS `subcat_id`, `a`.`id` AS `poster_id`, `a`.`created` as `creates`, `a`.`updated` as `updates`
FROM `poster` AS `a`
INNER JOIN `sub_category` AS `c` ON `a`.`subcat_id` = `c`.`id`
WHERE `a`.`subcat_id` = '3'
AND `a`.`id` = '548'
ORDER BY `a`.`rel_date` DESC
ERROR - 2018-09-24 18:57:21 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('1011946dd15b9241c19d36430f75f7c2101c8592', '66.249.79.218', 1537795641, '__ci_last_regenerate|i:1537795641;')
ERROR - 2018-09-24 18:57:21 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('6165cfaaed280ba002b9c46d9a423097') AS ci_session_lock
