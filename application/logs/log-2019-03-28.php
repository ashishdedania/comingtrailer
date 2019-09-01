<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-03-28 12:33:07 --> Query error: Lost connection to MySQL server during query - Invalid query: 

               SELECT user.id,user.created,user.name,user.mobile,user.email,user.gender,user_points.earn_points,user_points.total_video_play,user.img,user_points.earn_points,user_points.total_invite,user_points.total_social_likes,user_points.total_share,user_points.totla_frnds_share,user_points.total_likes,user_points.total_earn_rs,newsletter.id as subscriber,(SELECT count(*) FROM `user_activity` where user_activity.user_id = user.id and user_activity.user_activity = "play") as activity_play,
               (select sum(shared_points) from user_frnd_share where shared_by_id = user.id) as point_share,
               (select sum(shared_points) from user_frnd_share where shared_to_id = user.id) as point_receive
               FROM user
               LEFT JOIN user_points ON user.id=user_points.user_id
               LEFT JOIN newsletter ON user.email=newsletter.email
               ORDER BY user.created desc
               LIMIT 0,10

            
ERROR - 2019-03-28 12:33:07 --> Query error: MySQL server has gone away - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1553756587
WHERE `id` = '4bvfse2a8fr04ko0mi2i8ib8koqvvo84'
ERROR - 2019-03-28 12:33:07 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('74723ed332b84124b0bed07e6191c76c') AS ci_session_lock
ERROR - 2019-03-28 17:35:08 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `video` SET `youtube_views` = '14915'
WHERE `id` = '1571'
ERROR - 2019-03-28 17:35:08 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `video` SET `youtube_views` = '12878141'
WHERE `id` = '3373'
ERROR - 2019-03-28 17:35:08 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('u6n4n7v6a1rht7nv8859ji7dvatnadga', '43.225.54.56', 1553774708, '__ci_last_regenerate|i:1553774466;')
ERROR - 2019-03-28 17:35:08 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('88397fee61027d163aa8f7846cf15afa') AS ci_session_lock
ERROR - 2019-03-28 17:35:08 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('sr1vfkbgg5vr5u5cp7lh17ght2q4t8hi', '43.225.54.56', 1553774708, '__ci_last_regenerate|i:1553774585;')
ERROR - 2019-03-28 17:35:08 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `video` SET `youtube_views` = '6226'
WHERE `id` = '2476'
ERROR - 2019-03-28 17:35:08 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('h42inp52hk1kro73badqug47iloss6ge', '43.225.54.56', 1553774708, '__ci_last_regenerate|i:1553774524;')
ERROR - 2019-03-28 17:35:08 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('f655b3d55f841a1c70294610d967f63f') AS ci_session_lock
ERROR - 2019-03-28 17:35:08 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `video` SET `youtube_views` = '28946'
WHERE `id` = '4259'
ERROR - 2019-03-28 17:35:08 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('k82fl65e0igmq21h8p85r1cvqkocj5ql', '43.225.54.56', 1553774708, '__ci_last_regenerate|i:1553774644;')
ERROR - 2019-03-28 17:35:08 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('c8f88eb22336f1287bf3acd30abe0587') AS ci_session_lock
ERROR - 2019-03-28 17:35:08 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('3c76a27f7adf97343bb9ebb86328b9e7') AS ci_session_lock
ERROR - 2019-03-28 17:35:18 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('ulshcq9nbf9fts6c2dg841flcf596tcc', '66.249.79.167', 1553774676, '__ci_last_regenerate|i:1553774674;')
ERROR - 2019-03-28 17:35:18 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('c41bcf027131c0def56c4fd65b8fe3d0') AS ci_session_lock
ERROR - 2019-03-28 21:26:00 --> Query error: Lost connection to MySQL server during query - Invalid query: 

               SELECT user.id,user.created,user.name,user.mobile,user.email,user.gender,user_points.earn_points,user_points.total_video_play,user.img,user_points.earn_points,user_points.total_invite,user_points.total_social_likes,user_points.total_share,user_points.totla_frnds_share,user_points.total_likes,user_points.total_earn_rs,newsletter.id as subscriber,(SELECT count(*) FROM `user_activity` where user_activity.user_id = user.id and user_activity.user_activity = "play") as activity_play,
               (select sum(shared_points) from user_frnd_share where shared_by_id = user.id) as point_share,
               (select sum(shared_points) from user_frnd_share where shared_to_id = user.id) as point_receive
               FROM user
               LEFT JOIN user_points ON user.id=user_points.user_id
               LEFT JOIN newsletter ON user.email=newsletter.email
               ORDER BY user.created desc
               LIMIT 0,10

            
ERROR - 2019-03-28 21:26:00 --> Query error: MySQL server has gone away - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1553788560
WHERE `id` = 'f6h5jhehdddp8egnah6fqccu2eug54b7'
ERROR - 2019-03-28 21:26:00 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('6acf6a24604810945022fb54ecc138de') AS ci_session_lock
ERROR - 2019-03-28 23:37:23 --> Query error: Column 'category' cannot be null - Invalid query: INSERT INTO `contact_us_data` (`first_name`, `last_name`, `email`, `phone`, `category`, `message`, `created`) VALUES ('Strom', 'Strom', 'marketing@cold-email-crusher.com', '8074450705', NULL, NULL, '2019-03-28 23:37:22')
