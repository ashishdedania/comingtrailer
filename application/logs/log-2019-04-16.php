<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-04-16 06:11:14 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `user_activity` = 'liked' AND `shared_with` = ''' at line 3 - Invalid query: SELECT *
FROM `user_activity`
WHERE `user_id` = '' AND `cat_id` = '' AND `common_id` =  AND `user_activity` = 'liked' AND `shared_with` = ''
ERROR - 2019-04-16 06:11:37 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
ERROR - 2019-04-16 07:25:55 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
ERROR - 2019-04-16 21:17:42 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 's Most Wanted%'' at line 1 - Invalid query: select id,movie_name,movie_img from movie WHERE trim(movie_name) LIKE '%India's Most Wanted%'
ERROR - 2019-04-16 21:54:52 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'el%'' at line 1 - Invalid query: select id,personality_name,personality_img from personality WHERE trim(personality_name) LIKE '%Invizib'el%'
ERROR - 2019-04-16 21:56:09 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'el' and id!=19551' at line 1 - Invalid query: select * from personality where personality_name='Invizib'el' and id!=19551