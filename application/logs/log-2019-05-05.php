<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-05-05 00:55:17 --> Severity: Error --> Call to a member function deletedata() on a non-object /home/cominlvi/public_html/application/controllers/api/User.php 47
ERROR - 2019-05-05 00:56:19 --> Severity: Error --> Call to a member function deletedata() on a non-object /home/cominlvi/public_html/application/controllers/api/User.php 47
ERROR - 2019-05-05 01:57:10 --> Severity: Error --> Call to undefined method Detail::db_query() /home/cominlvi/public_html/application/controllers/api/Detail.php 367
ERROR - 2019-05-05 02:00:07 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '(video.liked,' Likes') as liked,CONCAT(video.play,' Playing') as play,video_url.' at line 4 - Invalid query: SELECT video.id as id,sub_category.subcat_name,video.video_name,
                                       
                    (case when video.video_thumb is not null then CONCAT('https://www.comingtrailer.com/images/videothumb/',video.video_thumb) else null end) as thumb,video.video_url 
                    CONCAT(video.liked,' Likes') as liked,CONCAT(video.play,' Playing') as play,video_url.final_url, 
                    (SELECT group_concat(personality_name) FROM `video_map_cast` inner join personality on personality.id = personality_id where video_id = video.id and is_cast = 1) as cast,(SELECT group_concat(personality_name) FROM `video_map_singer` inner join personality on personality.id = personality_id where video_id = video.id and is_singer = 1) as singer,(SELECT group_concat(personality_name) FROM `video_map_music` inner join personality on personality.id = personality_id where video_id = video.id and is_music_director = 1) as music_director,(SELECT group_concat(personality_name) FROM `video_map_director` inner join personality on personality.id = personality_id where video_id = video.id and is_director = 1) as director
                    FROM video 
                    LEFT JOIN sub_category ON video.subcat_id=sub_category.id
                    LEFT JOIN video_url ON video_url.id=video.seo_url_id 
                    WHERE video.id= 13632 and video.is_deleted='0' 
ERROR - 2019-05-05 02:16:52 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: SELECT * from user_activity where user_id = 19977 and user_activity = "liked" and cat_id != 3 limit 
ERROR - 2019-05-05 02:20:17 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'order_by created DESC  LIMIT 0,20' at line 1 - Invalid query: SELECT * from user_activity where user_id = 19977 and user_activity = "liked" and cat_id != 3 order_by created DESC  LIMIT 0,20
