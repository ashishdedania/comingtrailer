<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-04-04 00:29:06 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
ERROR - 2019-04-04 00:42:18 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'FROM `weekly_winners` inner join user on user.id = weekly_winners.user_id where ' at line 1 - Invalid query: SELECT name,img as image,winning_prize,start_date as week_start_date,end_date as week_end_date, FROM `weekly_winners` inner join user on user.id = weekly_winners.user_id where end_date = (select max(end_date) from weekly_winners)
ERROR - 2019-04-04 00:45:36 --> Severity: Error --> Call to a member function update_user_profile() on a non-object /home/cominlvi/public_html/application/controllers/api/User.php 100
ERROR - 2019-04-04 18:29:57 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
ERROR - 2019-04-04 18:30:08 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `user_activity` = 'liked' AND `shared_with` = ''' at line 3 - Invalid query: SELECT *
FROM `user_activity`
WHERE `user_id` = '' AND `cat_id` = '' AND `common_id` =  AND `user_activity` = 'liked' AND `shared_with` = ''
