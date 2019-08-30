<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-04-06 13:51:04 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: select * from video_map_movie where video_id = 
ERROR - 2019-04-06 13:51:47 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'limit 1' at line 1 - Invalid query: SELECT * from video where id =  limit 1 
ERROR - 2019-04-06 13:52:42 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: select * from video_map_movie where video_id = 
ERROR - 2019-04-06 20:24:42 --> Query error: Unknown column 'is_actor' in 'where clause' - Invalid query: SELECT personality.id as id,personality_name as name,personality_title as title,
                    personality_desc as description, personality_keywords as keywords,
                    CONCAT('timthumb.php?src=https://www.comingtrailer.com/images/personality/',personality.personality_img,'&w=285&h=160') as personality_thumb,                    
                    (case when personality.personality_img is not null then CONCAT('https://www.comingtrailer.com/images/personality/',personality.personality_img) else null end) as thumb
                    FROM personality                     
                    WHERE status = 0 and is_actor = 1                     
                     LIMIT 0,20
ERROR - 2019-04-06 22:48:20 --> Query error: Cannot add or update a child row: a foreign key constraint fails (`cominlvi_trailer`.`user_activity`, CONSTRAINT `user_activity_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE) - Invalid query: INSERT INTO `user_activity` (`user_id`, `cat_id`, `common_id`, `user_activity`, `shared_with`, `earn_points`, `created`) VALUES ('3', '1', '0', 'social_follow', 'Google+', '150', '2019-04-06 22:48:20')
