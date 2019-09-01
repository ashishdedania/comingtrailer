<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-05-24 00:00:59 --> Severity: Error --> Call to a member function getbyid() on a non-object /home/cominlvi/public_html/application/controllers/api/User.php 38
ERROR - 2019-05-24 00:02:28 --> Severity: Error --> Call to a member function insertdata() on a non-object /home/cominlvi/public_html/application/controllers/api/User.php 40
ERROR - 2019-05-24 00:02:30 --> Severity: Error --> Call to a member function insertdata() on a non-object /home/cominlvi/public_html/application/controllers/api/User.php 40
ERROR - 2019-05-24 00:03:10 --> Query error: Table 'cominlvi_trailer.Array' doesn't exist - Invalid query: INSERT INTO Array (`user_activity`) VALUES ('')
ERROR - 2019-05-24 00:09:50 --> Severity: Error --> Call to a member function insertdata() on a non-object /home/cominlvi/public_html/application/controllers/api/User.php 40
ERROR - 2019-05-24 00:12:01 --> Query error: Unknown column 'user_id1' in 'field list' - Invalid query: INSERT INTO `user_activity` (`user_id1`, `cat_id`, `user_activity`, `common_id`) VALUES ('21136', '3', 'liked', '1')
ERROR - 2019-05-24 00:39:20 --> Query error: Unknown column 'likes' in 'field list' - Invalid query: UPDATE `video` SET `likes` = 1
WHERE `id` = '14'
