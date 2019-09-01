<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-10-02 05:56:32 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `video` SET `youtube_views` = '138587'
WHERE `id` = '4674'
ERROR - 2018-10-02 05:56:32 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('7e3d7464eb80dcba228945be9e7a695bb61e4e5b', '43.225.54.56', 1538439992, '__ci_last_regenerate|i:1538439844;')
ERROR - 2018-10-02 05:56:32 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('9c21c1e95e870448d50e35005d23ea95') AS ci_session_lock
ERROR - 2018-10-02 05:56:37 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('a145e1cd09f3430ed22f45a7ab69a8dd07a0b001', '37.9.113.105', 1538439954, '__ci_last_regenerate|i:1538439954;')
ERROR - 2018-10-02 05:56:37 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('751b13526a9e4d13e5d4aa77fdcc3451') AS ci_session_lock
ERROR - 2018-10-02 12:30:34 --> Query error: Lost connection to MySQL server during query - Invalid query: 

               SELECT user.id,user.created,user.name,user.mobile,user.email,user.gender,user_points.earn_points,user_points.total_video_play,user.img,user_points.earn_points,user_points.total_invite,user_points.total_social_likes,user_points.total_share,user_points.totla_frnds_share,user_points.total_likes,user_points.total_earn_rs,newsletter.id as subscriber,(SELECT count(*) FROM `user_activity` where user_activity.user_id = user.id and user_activity.user_activity = "play") as activity_play,
               (select sum(shared_points) from user_frnd_share where shared_by_id = user.id) as point_share,
               (select sum(shared_points) from user_frnd_share where shared_to_id = user.id) as point_receive
               FROM user
               LEFT JOIN user_points ON user.id=user_points.user_id
               LEFT JOIN newsletter ON user.email=newsletter.email
               ORDER BY user.created desc
               LIMIT 0,10

            
ERROR - 2018-10-02 12:30:34 --> Query error: MySQL server has gone away - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1538463634
WHERE `id` = 'tcle5hckrtmchvsrfd65at6fkgt47hep'
ERROR - 2018-10-02 12:30:34 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('5dc01ff6a5afe6165d3688df7b034f2b') AS ci_session_lock
