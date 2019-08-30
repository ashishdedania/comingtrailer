<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-04-20 00:35:04 --> Query error: Unknown column 'is_songs' in 'where clause' - Invalid query: SELECT personality.id as id,personality_name as name,personality_title as title,
                    personality_desc as description, personality_keywords as keywords,
                    CONCAT('timthumb.php?src=https://www.comingtrailer.com/images/personality/',personality.personality_img,'&w=285&h=160') as personality_thumb,                    
                    (case when personality.personality_img is not null then CONCAT('https://www.comingtrailer.com/images/personality/',personality.personality_img) else null end) as thumb
                    FROM personality                     
                    WHERE status = 0 and is_songs = 1                     
                     LIMIT 0,20
ERROR - 2019-04-20 00:35:12 --> Query error: Unknown column 'is_song' in 'where clause' - Invalid query: SELECT personality.id as id,personality_name as name,personality_title as title,
                    personality_desc as description, personality_keywords as keywords,
                    CONCAT('timthumb.php?src=https://www.comingtrailer.com/images/personality/',personality.personality_img,'&w=285&h=160') as personality_thumb,                    
                    (case when personality.personality_img is not null then CONCAT('https://www.comingtrailer.com/images/personality/',personality.personality_img) else null end) as thumb
                    FROM personality                     
                    WHERE status = 0 and is_song = 1                     
                     LIMIT 0,20
ERROR - 2019-04-20 00:35:21 --> Query error: Unknown column 'is_video' in 'where clause' - Invalid query: SELECT personality.id as id,personality_name as name,personality_title as title,
                    personality_desc as description, personality_keywords as keywords,
                    CONCAT('timthumb.php?src=https://www.comingtrailer.com/images/personality/',personality.personality_img,'&w=285&h=160') as personality_thumb,                    
                    (case when personality.personality_img is not null then CONCAT('https://www.comingtrailer.com/images/personality/',personality.personality_img) else null end) as thumb
                    FROM personality                     
                    WHERE status = 0 and is_video = 1                     
                     LIMIT 0,20
ERROR - 2019-04-20 00:35:32 --> Query error: Unknown column 'is_song' in 'where clause' - Invalid query: SELECT personality.id as id,personality_name as name,personality_title as title,
                    personality_desc as description, personality_keywords as keywords,
                    CONCAT('timthumb.php?src=https://www.comingtrailer.com/images/personality/',personality.personality_img,'&w=285&h=160') as personality_thumb,                    
                    (case when personality.personality_img is not null then CONCAT('https://www.comingtrailer.com/images/personality/',personality.personality_img) else null end) as thumb
                    FROM personality                     
                    WHERE status = 0 and is_song = 1                     
                     LIMIT 0,20
ERROR - 2019-04-20 00:35:38 --> Query error: Unknown column 'is_Song' in 'where clause' - Invalid query: SELECT personality.id as id,personality_name as name,personality_title as title,
                    personality_desc as description, personality_keywords as keywords,
                    CONCAT('timthumb.php?src=https://www.comingtrailer.com/images/personality/',personality.personality_img,'&w=285&h=160') as personality_thumb,                    
                    (case when personality.personality_img is not null then CONCAT('https://www.comingtrailer.com/images/personality/',personality.personality_img) else null end) as thumb
                    FROM personality                     
                    WHERE status = 0 and is_Song = 1                     
                     LIMIT 0,20
ERROR - 2019-04-20 01:08:53 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'as singer,(SELECT group_concat(personality_name) FROM `video_map_music` inner jo' at line 1 - Invalid query: (SELECT group_concat(personality_name) FROM `video_map_singer` inner join personality on personality.id = personality_id where video_id = video.id and is_singer = 1) as singer,(SELECT group_concat(personality_name) FROM `video_map_music` inner join personality on personality.id = personality_id where video_id = video.id and is_music_director = 1) as music_director,(SELECT group_concat(personality_name) FROM `video_map_director` inner join personality on personality.id = personality_id where video_id = video.id and is_director = 1) as director where video_id = 
ERROR - 2019-04-20 01:10:15 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'as singer,(SELECT group_concat(personality_name) FROM `video_map_music` inner jo' at line 1 - Invalid query: (SELECT group_concat(personality_name) FROM `video_map_singer` inner join personality on personality.id = personality_id where video_id = video.id and is_singer = 1) as singer,(SELECT group_concat(personality_name) FROM `video_map_music` inner join personality on personality.id = personality_id where video_id = video.id and is_music_director = 1) as music_director,(SELECT group_concat(personality_name) FROM `video_map_director` inner join personality on personality.id = personality_id where video_id = video.id and is_director = 1) as director where video_id = 12874
ERROR - 2019-04-20 01:11:09 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') as singer where video_id = 12874' at line 1 - Invalid query: SELECT group_concat(personality_name) FROM `video_map_singer` inner join personality on personality.id = personality_id where video_id = video.id and is_singer = 1) as singer where video_id = 12874
ERROR - 2019-04-20 01:13:02 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') as singer' at line 1 - Invalid query: SELECT group_concat(personality_name) FROM `video_map_singer` inner join personality on personality.id = personality_id where video_id = 12874 and is_singer = 1) as singer 
ERROR - 2019-04-20 01:29:52 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: SELECT personality.personality_name as name from personality left join video_map_cast on video_map_cast.personality_id = personality.id where personality.is_cast = 1 and video_map_cast.video_id = 
ERROR - 2019-04-20 01:41:39 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: SELECT personality.personality_name as name from personality left join video_map_cast on video_map_cast.personality_id = personality.id where personality.is_cast = 1 and video_map_cast.video_id = 
ERROR - 2019-04-20 02:28:02 --> Unable to connect to the database
ERROR - 2019-04-20 02:28:02 --> Unable to connect to the database
ERROR - 2019-04-20 02:28:02 --> Unable to connect to the database
ERROR - 2019-04-20 13:38:38 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
ERROR - 2019-04-20 13:39:16 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
