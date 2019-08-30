<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-04-21 11:14:33 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `user_activity` = 'liked' AND `shared_with` = ''' at line 3 - Invalid query: SELECT *
FROM `user_activity`
WHERE `user_id` = '' AND `cat_id` = '' AND `common_id` =  AND `user_activity` = 'liked' AND `shared_with` = ''
ERROR - 2019-04-21 11:14:57 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
ERROR - 2019-04-21 16:19:16 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `user_activity` = 'liked' AND `shared_with` = ''' at line 3 - Invalid query: SELECT *
FROM `user_activity`
WHERE `user_id` = '' AND `cat_id` = '' AND `common_id` =  AND `user_activity` = 'liked' AND `shared_with` = ''
ERROR - 2019-04-21 16:19:17 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
