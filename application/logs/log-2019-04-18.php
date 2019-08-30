<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-04-18 01:17:58 --> Query error: Lost connection to MySQL server during query - Invalid query: 

     SELECT personality.id,personality.created,personality.personality_img,personality.personality_name,personality.status,(SELECT sum(case when (select count(movie_id) from movie_map_cast where movie_map_cast.movie_id = movie.id and movie_map_cast.personality_id = personality.id) > 0 then 1 else 0 end) FROM movie)  as movie,(SELECT sum(case when (select count(video_id) from video_map_cast where video_map_cast.video_id = video.id and video_map_cast.personality_id = personality.id) > 0 then 1  else 0 end) FROM video where video.cat_id = 2) as video,(SELECT sum(case when (select count(poster_id) from poster_map_cast where poster_map_cast.poster_id = poster.id and poster_map_cast.personality_id = personality.id) > 0 then 1 else 0 end) FROM poster) as poster,(SELECT sum(case when (select count(video_id) from video_map_cast where video_map_cast.video_id = video.id and video_map_cast.personality_id = personality.id) > 0 then 1 else 0 end) FROM video where video.cat_id = 1) as trailer FROM personality     
     where personality.is_cast = 1 and personality.status=0
     ORDER BY (SELECT sum(case when (select count(video_id) from video_map_cast where video_map_cast.video_id = video.id and video_map_cast.personality_id = personality.id) > 0 then 1  else 0 end) FROM video where video.cat_id = 2) asc
     LIMIT 0,10

     
ERROR - 2019-04-18 01:17:58 --> Query error: MySQL server has gone away - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1555530478
WHERE `id` = '6d1cd30f8926d088d44d36cf28281ba2385c1378'
ERROR - 2019-04-18 01:17:58 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('08295d9a1c4d4e85c5c72fccaf729875') AS ci_session_lock
ERROR - 2019-04-18 16:22:34 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('fc39af5ea347dd4f4da58331441c902e', 300) AS ci_session_lock
ERROR - 2019-04-18 16:22:34 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('fc39af5ea347dd4f4da58331441c902e', 300) AS ci_session_lock
ERROR - 2019-04-18 16:22:34 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('fc39af5ea347dd4f4da58331441c902e', 300) AS ci_session_lock
ERROR - 2019-04-18 16:22:34 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('fc39af5ea347dd4f4da58331441c902e', 300) AS ci_session_lock
ERROR - 2019-04-18 22:44:42 --> Query error: Unknown column 'is_Chanel' in 'where clause' - Invalid query: SELECT personality.id as id,personality_name as name,personality_title as title,
                    personality_desc as description, personality_keywords as keywords,
                    CONCAT('timthumb.php?src=https://www.comingtrailer.com/images/personality/',personality.personality_img,'&w=285&h=160') as personality_thumb,                    
                    (case when personality.personality_img is not null then CONCAT('https://www.comingtrailer.com/images/personality/',personality.personality_img) else null end) as thumb
                    FROM personality                     
                    WHERE status = 0 and is_Chanel = 1                     
                     LIMIT 0,20
ERROR - 2019-04-18 22:47:38 --> Query error: Unknown column 'is_Channel' in 'where clause' - Invalid query: SELECT personality.id as id,personality_name as name,personality_title as title,
                    personality_desc as description, personality_keywords as keywords,
                    CONCAT('timthumb.php?src=https://www.comingtrailer.com/images/personality/',personality.personality_img,'&w=285&h=160') as personality_thumb,                    
                    (case when personality.personality_img is not null then CONCAT('https://www.comingtrailer.com/images/personality/',personality.personality_img) else null end) as thumb
                    FROM personality                     
                    WHERE status = 0 and is_Channel = 1                     
                     LIMIT 0,20
ERROR - 2019-04-18 22:49:05 --> Query error: Unknown column 'is_Channel' in 'where clause' - Invalid query: SELECT personality.id as id,personality_name as name,personality_title as title,
                    personality_desc as description, personality_keywords as keywords,
                    CONCAT('timthumb.php?src=https://www.comingtrailer.com/images/personality/',personality.personality_img,'&w=285&h=160') as personality_thumb,                    
                    (case when personality.personality_img is not null then CONCAT('https://www.comingtrailer.com/images/personality/',personality.personality_img) else null end) as thumb
                    FROM personality                     
                    WHERE status = 0 and is_Channel = 1                     
                     LIMIT 0,20
ERROR - 2019-04-18 22:51:24 --> Query error: Unknown column 'is_Channel' in 'where clause' - Invalid query: SELECT personality.id as id,personality_name as name,personality_title as title,
                    personality_desc as description, personality_keywords as keywords,
                    CONCAT('timthumb.php?src=https://www.comingtrailer.com/images/personality/',personality.personality_img,'&w=285&h=160') as personality_thumb,                    
                    (case when personality.personality_img is not null then CONCAT('https://www.comingtrailer.com/images/personality/',personality.personality_img) else null end) as thumb
                    FROM personality                     
                    WHERE status = 0 and is_Channel = 1                     
                     LIMIT 0,20
ERROR - 2019-04-18 22:53:31 --> Query error: Unknown column 'is_Channel' in 'where clause' - Invalid query: SELECT personality.id as id,personality_name as name,personality_title as title,
                    personality_desc as description, personality_keywords as keywords,
                    CONCAT('timthumb.php?src=https://www.comingtrailer.com/images/personality/',personality.personality_img,'&w=285&h=160') as personality_thumb,                    
                    (case when personality.personality_img is not null then CONCAT('https://www.comingtrailer.com/images/personality/',personality.personality_img) else null end) as thumb
                    FROM personality                     
                    WHERE status = 0 and is_Channel = 1                     
                     LIMIT 0,20
ERROR - 2019-04-18 22:55:03 --> Query error: Unknown column 'is_channeL' in 'where clause' - Invalid query: SELECT personality.id as id,personality_name as name,personality_title as title,
                    personality_desc as description, personality_keywords as keywords,
                    CONCAT('timthumb.php?src=https://www.comingtrailer.com/images/personality/',personality.personality_img,'&w=285&h=160') as personality_thumb,                    
                    (case when personality.personality_img is not null then CONCAT('https://www.comingtrailer.com/images/personality/',personality.personality_img) else null end) as thumb
                    FROM personality                     
                    WHERE status = 0 and is_channeL = 1                     
                     LIMIT 0,20
