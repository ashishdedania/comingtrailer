<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-04-07 00:22:06 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'FROM video 
                    LEFT JOIN sub_category ON video.subcat_id=sub_ca' at line 6 - Invalid query: SELECT video.id as id,sub_category.subcat_name,video.video_name,
                    CONCAT('timthumb.php?src=https://www.comingtrailer.com/images/videothumb/',video.video_thumb,'&w=285&h=160') as video_thumb,                    
                    (case when video.video_thumb is not null then CONCAT('https://www.comingtrailer.com/images/videothumb/',video.video_thumb) else null end) as thumb,
                    CONCAT(video.liked,' Likes') as liked,CONCAT(video.play,' Playing') as play,video_url.final_url, 
                    (SELECT group_concat(personality_name) FROM `video_map_cast` inner join personality on personality.id = personality_id where video_id = video.id and is_director = 1) as cast,
                    FROM video 
                    LEFT JOIN sub_category ON video.subcat_id=sub_category.id
                    LEFT JOIN video_url ON video_url.id=video.seo_url_id 
                    WHERE cat_id='2' AND subcat_id='1' AND    
                    video.is_deleted='0'  and (select count(video_map_movie.id) from video_map_movie where video_id = video.id and movie_id is not null) > 0 
                    group by video.id
                    ORDER BY video.rel_date DESC 
                     LIMIT 60,20
