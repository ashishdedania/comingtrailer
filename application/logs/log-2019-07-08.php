<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-07-08 23:07:16 --> Query error: Unknown column 'movie.full_movie' in 'field list' - Invalid query: SELECT video.id as id,sub_category.subcat_name,video.video_name,
                                       
                    (case when video.video_thumb is not null then CONCAT('http://ctw.local/images/videothumb/',video.video_thumb) else null end) as thumb,
                    CONCAT(video.liked,' Likes') as liked,CONCAT(video.play,' Playing') as play,video_url.final_url,movie.full_movie,
                    (SELECT group_concat(personality_name) FROM `video_map_cast` inner join personality on personality.id = personality_id where video_id = video.id and is_cast = 1) as cast,(SELECT group_concat(personality_name) FROM `video_map_singer` inner join personality on personality.id = personality_id where video_id = video.id and is_singer = 1) as singer,(SELECT group_concat(personality_name) FROM `video_map_music` inner join personality on personality.id = personality_id where video_id = video.id and is_music_director = 1) as music_director,(SELECT group_concat(personality_name) FROM `video_map_director` inner join personality on personality.id = personality_id where video_id = video.id and is_director = 1) as director
                    FROM video 
                    LEFT JOIN sub_category ON video.subcat_id=sub_category.id
                    LEFT JOIN video_url ON video_url.id=video.seo_url_id 
                    WHERE cat_id='1' AND subcat_id='1' AND    
                    video.is_deleted='0' 
                    group by video.id
                    ORDER BY video.rel_date DESC 
                     LIMIT 0,100
ERROR - 2019-07-08 23:28:55 --> Severity: error --> Exception: syntax error, unexpected '$result1' (T_VARIABLE), expecting ';' /var/www/html/ctw/application/controllers/api/Home.php 416
