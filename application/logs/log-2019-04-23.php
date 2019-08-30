<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-04-23 22:55:43 --> Query error: Cannot add or update a child row: a foreign key constraint fails (`cominlvi_trailer`.`user_activity`, CONSTRAINT `user_activity_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE) - Invalid query: INSERT INTO `user_activity` (`user_id`, `cat_id`, `common_id`, `user_activity`, `shared_with`, `earn_points`, `created`) VALUES ('3', '1', '109', 'play', '', '3', '2019-04-23 22:55:43')
