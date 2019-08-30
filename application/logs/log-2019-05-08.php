<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-05-08 08:44:43 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
ERROR - 2019-05-08 10:18:11 --> Query error: Column 'user_id' cannot be null - Invalid query: INSERT INTO `user_activity` (`user_id`, `cat_id`, `common_id`, `user_activity`, `shared_with`, `earn_points`, `created`) VALUES (NULL, '3', '1494', 'liked', '', '0', '2019-05-08 10:18:11')
