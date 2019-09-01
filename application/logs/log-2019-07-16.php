<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-07-16 06:54:10 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) /var/www/html/ctw/application/controllers/api/Home.php 1136
ERROR - 2019-07-16 06:55:02 --> Severity: error --> Exception: syntax error, unexpected 'public' (T_PUBLIC) /var/www/html/ctw/application/controllers/api/Home.php 1137
ERROR - 2019-07-16 06:55:42 --> Query error: Column 'id' in where clause is ambiguous - Invalid query: SELECT video.id as id,sub_category.subcat_name,video.video_name,video.subcat_id,video.cat_id,
                                       
                    (case when video.video_thumb is not null then CONCAT('http://ctw.local/images/videothumb/',video.video_thumb) else null end) as thumb,
                    CONCAT(video.liked,' Likes') as liked,CONCAT(video.play,' Playing') as play,video_url.final_url, 
                    (SELECT group_concat(personality_name) FROM `video_map_cast` inner join personality on personality.id = personality_id where video_id = video.id and is_cast = 1) as cast,(SELECT group_concat(personality_name) FROM `video_map_singer` inner join personality on personality.id = personality_id where video_id = video.id and is_singer = 1) as singer,(SELECT group_concat(personality_name) FROM `video_map_music` inner join personality on personality.id = personality_id where video_id = video.id and is_music_director = 1) as music_director,(SELECT group_concat(personality_name) FROM `video_map_director` inner join personality on personality.id = personality_id where video_id = video.id and is_director = 1) as director
                    FROM video 
                    LEFT JOIN sub_category ON video.subcat_id=sub_category.id
                    LEFT JOIN video_url ON video_url.id=video.seo_url_id 
                    WHERE id='' AND    
                    video.is_deleted='0'
                    group by video.id
                    ORDER BY video.rel_date DESC
                    LIMIT 0,20
ERROR - 2019-07-16 10:25:02 --> Severity: error --> Exception: syntax error, unexpected '$sql' (T_VARIABLE) /var/www/html/ctw/application/controllers/api/Home.php 842
ERROR - 2019-07-16 10:26:04 --> Severity: error --> Exception: syntax error, unexpected '$sql' (T_VARIABLE) /var/www/html/ctw/application/controllers/api/Home.php 842
ERROR - 2019-07-16 10:26:26 --> Severity: error --> Exception: syntax error, unexpected '$sql' (T_VARIABLE) /var/www/html/ctw/application/controllers/api/Home.php 842
ERROR - 2019-07-16 10:27:52 --> Severity: error --> Exception: syntax error, unexpected '$sql' (T_VARIABLE) /var/www/html/ctw/application/controllers/api/Home.php 842
ERROR - 2019-07-16 10:29:08 --> Severity: error --> Exception: Call to a member function result_array() on boolean /var/www/html/ctw/application/models/My_model.php 125
