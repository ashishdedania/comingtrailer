<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-05-27 00:12:14 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('c4e170daa5fe638720b196da555ae4eb', 300) AS ci_session_lock
ERROR - 2019-05-27 00:23:42 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `user_activity` = 'liked' AND `shared_with` = ''' at line 3 - Invalid query: SELECT *
FROM `user_activity`
WHERE `user_id` = '' AND `cat_id` = '' AND `common_id` =  AND `user_activity` = 'liked' AND `shared_with` = ''
ERROR - 2019-05-27 00:43:23 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
