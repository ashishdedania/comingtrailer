<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-04-14 00:43:47 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'from video_map_movie 
                    join video on video.id = video_map_mov' at line 2 - Invalid query: SELECT video.*,video_map_movie.video_id,video_map_movie.movie_id,(case when video.video_thumb is not null then concat('https://www.comingtrailer.com/','images/videothumb/',video.video_thumb) else null end) as video_thumb,(SELECT group_concat(personality_name) FROM `video_map_cast` inner join personality on personality.id = personality_id where video_id = video.id and is_cast = 1) as cast,(SELECT group_concat(personality_name) FROM `video_map_singer` inner join personality on personality.id = personality_id where video_id = video.id and is_singer = 1) as singer,(SELECT group_concat(personality_name) FROM `video_map_music` inner join personality on personality.id = personality_id where video_id = video.id and is_music_director = 1) as music_director,(SELECT group_concat(personality_name) FROM `video_map_director` inner join personality on personality.id = personality_id where video_id = video.id and is_director = 1) as director,
                    from video_map_movie 
                    join video on video.id = video_map_movie.video_id
                    join movie on movie.id = video_map_movie.movie_id
                    where video.cat_id = 1 and movie.id=413
ERROR - 2019-04-14 01:07:59 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'order_by video.id DESC' at line 5 - Invalid query: SELECT video.*,video_map_movie.video_id,video_map_movie.movie_id,(case when video.video_thumb is not null then concat('https://www.comingtrailer.com/','images/videothumb/',video.video_thumb) else null end) as video_thumb,(SELECT group_concat(personality_name) FROM `video_map_cast` inner join personality on personality.id = personality_id where video_id = video.id and is_cast = 1) as cast,(SELECT group_concat(personality_name) FROM `video_map_singer` inner join personality on personality.id = personality_id where video_id = video.id and is_singer = 1) as singer,(SELECT group_concat(personality_name) FROM `video_map_music` inner join personality on personality.id = personality_id where video_id = video.id and is_music_director = 1) as music_director,(SELECT group_concat(personality_name) FROM `video_map_director` inner join personality on personality.id = personality_id where video_id = video.id and is_director = 1) as director
                    from video_map_movie 
                    join video on video.id = video_map_movie.video_id
                    join movie on movie.id = video_map_movie.movie_id
                    where video.cat_id = 1 and movie.id=1301 order_by video.id DESC
ERROR - 2019-04-14 01:09:20 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'order_by video.id DASC' at line 5 - Invalid query: SELECT video.*,video_map_movie.video_id,video_map_movie.movie_id,(case when video.video_thumb is not null then concat('https://www.comingtrailer.com/','images/videothumb/',video.video_thumb) else null end) as video_thumb,(SELECT group_concat(personality_name) FROM `video_map_cast` inner join personality on personality.id = personality_id where video_id = video.id and is_cast = 1) as cast,(SELECT group_concat(personality_name) FROM `video_map_singer` inner join personality on personality.id = personality_id where video_id = video.id and is_singer = 1) as singer,(SELECT group_concat(personality_name) FROM `video_map_music` inner join personality on personality.id = personality_id where video_id = video.id and is_music_director = 1) as music_director,(SELECT group_concat(personality_name) FROM `video_map_director` inner join personality on personality.id = personality_id where video_id = video.id and is_director = 1) as director
                    from video_map_movie 
                    join video on video.id = video_map_movie.video_id
                    join movie on movie.id = video_map_movie.movie_id
                    where video.cat_id = 1 and movie.id=1301 order_by video.id DASC
ERROR - 2019-04-14 01:11:22 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'DASC' at line 5 - Invalid query: SELECT video.*,video_map_movie.video_id,video_map_movie.movie_id,(case when video.video_thumb is not null then concat('https://www.comingtrailer.com/','images/videothumb/',video.video_thumb) else null end) as video_thumb,(SELECT group_concat(personality_name) FROM `video_map_cast` inner join personality on personality.id = personality_id where video_id = video.id and is_cast = 1) as cast,(SELECT group_concat(personality_name) FROM `video_map_singer` inner join personality on personality.id = personality_id where video_id = video.id and is_singer = 1) as singer,(SELECT group_concat(personality_name) FROM `video_map_music` inner join personality on personality.id = personality_id where video_id = video.id and is_music_director = 1) as music_director,(SELECT group_concat(personality_name) FROM `video_map_director` inner join personality on personality.id = personality_id where video_id = video.id and is_director = 1) as director
                    from video_map_movie 
                    join video on video.id = video_map_movie.video_id
                    join movie on movie.id = video_map_movie.movie_id
                    where video.cat_id = 1 and movie.id=1301 order by video.id DASC
ERROR - 2019-04-14 02:33:20 --> Query error: Unknown column 'NOW' in 'where clause' - Invalid query: SELECT movie.id as id,'Hindi' as subcat_name,MONTH(movie.rel_date) as month,YEAR(movie.rel_date) as year,movie.movie_name,                    
                    (case when movie.movie_img is not null then CONCAT('https://www.comingtrailer.com/images/movies/',movie.movie_img) else null end) as thumb,
                    video_url.final_url FROM movie                     
                    LEFT JOIN video_url ON video_url.id=movie.seo_url_id 
                    WHERE subcat_id like '%1%' and (YEAR(movie.my_release) <= YEAR(NOW))  AND    
                    movie.status='0'
                    group by movie.id
                    ORDER BY year DESC,IF(MONTH(movie.rel_date) < MONTH(NOW()), MONTH(movie.rel_date) + 12, MONTH(movie.rel_date)),
 DAY(movie.rel_date)
                     LIMIT 0,120
ERROR - 2019-04-14 02:34:31 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'group by movie.id
                    ORDER BY year DESC,IF(MONTH(movie.rel_date' at line 7 - Invalid query: SELECT movie.id as id,'Hindi' as subcat_name,MONTH(movie.rel_date) as month,YEAR(movie.rel_date) as year,movie.movie_name,                    
                    (case when movie.movie_img is not null then CONCAT('https://www.comingtrailer.com/images/movies/',movie.movie_img) else null end) as thumb,
                    video_url.final_url FROM movie                     
                    LEFT JOIN video_url ON video_url.id=movie.seo_url_id 
                    WHERE subcat_id like '%1%' and (YEAR(movie.my_release) <= YEAR(NOW)  AND    
                    movie.status='0'
                    group by movie.id
                    ORDER BY year DESC,IF(MONTH(movie.rel_date) < MONTH(NOW()), MONTH(movie.rel_date) + 12, MONTH(movie.rel_date)),
 DAY(movie.rel_date)
                     LIMIT 0,120
ERROR - 2019-04-14 03:18:21 --> Query error: Unknown column 'movie.id' in 'where clause' - Invalid query: SELECT video.id as id,sub_category.subcat_name,video.video_name,
                                       
                    (case when video.video_thumb is not null then CONCAT('https://www.comingtrailer.com/images/videothumb/',video.video_thumb) else null end) as thumb,
                    CONCAT(video.liked,' Likes') as liked,CONCAT(video.play,' Playing') as play,video_url.final_url, 
                    (SELECT group_concat(personality_name) FROM `video_map_cast` inner join personality on personality.id = personality_id where video_id = video.id and is_cast = 1) as cast,(SELECT group_concat(personality_name) FROM `video_map_singer` inner join personality on personality.id = personality_id where video_id = video.id and is_singer = 1) as singer,(SELECT group_concat(personality_name) FROM `video_map_music` inner join personality on personality.id = personality_id where video_id = video.id and is_music_director = 1) as music_director,(SELECT group_concat(personality_name) FROM `video_map_director` inner join personality on personality.id = personality_id where video_id = video.id and is_director = 1) as director
                    FROM video 
                    LEFT JOIN sub_category ON video.subcat_id=sub_category.id
                    LEFT JOIN video_url ON video_url.id=video.seo_url_id 
                    WHERE cat_id='2' AND subcat_id='1' AND    
                    video.is_deleted='0'  and movie.id = null 
                    group by video.id
                    ORDER BY video.rel_date DESC 
                     LIMIT 0,20
ERROR - 2019-04-14 03:20:20 --> Query error: FUNCTION cominlvi_trailer.countq does not exist - Invalid query: SELECT video.id as id,sub_category.subcat_name,video.video_name,
                                       
                    (case when video.video_thumb is not null then CONCAT('https://www.comingtrailer.com/images/videothumb/',video.video_thumb) else null end) as thumb,
                    CONCAT(video.liked,' Likes') as liked,CONCAT(video.play,' Playing') as play,video_url.final_url, 
                    (SELECT group_concat(personality_name) FROM `video_map_cast` inner join personality on personality.id = personality_id where video_id = video.id and is_cast = 1) as cast,(SELECT group_concat(personality_name) FROM `video_map_singer` inner join personality on personality.id = personality_id where video_id = video.id and is_singer = 1) as singer,(SELECT group_concat(personality_name) FROM `video_map_music` inner join personality on personality.id = personality_id where video_id = video.id and is_music_director = 1) as music_director,(SELECT group_concat(personality_name) FROM `video_map_director` inner join personality on personality.id = personality_id where video_id = video.id and is_director = 1) as director
                    FROM video 
                    LEFT JOIN sub_category ON video.subcat_id=sub_category.id
                    LEFT JOIN video_url ON video_url.id=video.seo_url_id 
                    WHERE cat_id='2' AND subcat_id='1' AND    
                    video.is_deleted='0'  and (select countq(video_map_movie.id) from video_map_movie where video_id = video.id and movie_id is  null) > 0 
                    group by video.id
                    ORDER BY video.rel_date DESC 
                     LIMIT 0,20
ERROR - 2019-04-14 04:18:48 --> Query error: Lost connection to MySQL server during query - Invalid query: 

     SELECT personality.id,personality.created,personality.personality_img,personality.personality_name,personality.status,(SELECT sum(case when (select count(movie_id) from movie_map_cast where movie_map_cast.movie_id = movie.id and movie_map_cast.personality_id = personality.id) > 0 then 1 else 0 end) FROM movie)  as movie,(SELECT sum(case when (select count(video_id) from video_map_cast where video_map_cast.video_id = video.id and video_map_cast.personality_id = personality.id) > 0 then 1  else 0 end) FROM video where video.cat_id = 2) as video,(SELECT sum(case when (select count(poster_id) from poster_map_cast where poster_map_cast.poster_id = poster.id and poster_map_cast.personality_id = personality.id) > 0 then 1 else 0 end) FROM poster) as poster,(SELECT sum(case when (select count(video_id) from video_map_cast where video_map_cast.video_id = video.id and video_map_cast.personality_id = personality.id) > 0 then 1 else 0 end) FROM video where video.cat_id = 1) as trailer FROM personality     
     where personality.is_cast = 1 and personality.status=0
     ORDER BY (SELECT sum(case when (select count(video_id) from video_map_cast where video_map_cast.video_id = video.id and video_map_cast.personality_id = personality.id) > 0 then 1  else 0 end) FROM video where video.cat_id = 2) asc
     LIMIT 0,10

     
ERROR - 2019-04-14 04:18:48 --> Query error: MySQL server has gone away - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1555195728
WHERE `id` = '5b43963c0f5bb21263de0135a7e8f5bae312660c'
ERROR - 2019-04-14 04:18:48 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('61f17def092068a0f7512b63a70aaf78') AS ci_session_lock
