<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-04-28 02:51:05 --> Query error: Unknown column 'video_map_movie.movie_id' in 'field list' - Invalid query: 

               SELECT video.id,video.rel_date,video.video_name,video.video_thumb,movie.movie_name,video.play,video.liked,video.youtube_views,sub_category.subcat_name,video_map_movie.movie_id,video.subcat_id,video.video_desc,video_url.final_url,video.is_deleted FROM video
               LEFT JOIN sub_category ON sub_category.id=video.subcat_id
               LEFT JOIN video_url ON video_url.id=video.seo_url_id
               
               LEFT JOIN movie ON movie.id=video_map_movie.movie_id
               where video.cat_id=1 
               
               ORDER BY video.rel_date desc
               LIMIT 0,10

            
ERROR - 2019-04-28 02:51:05 --> Query error: Unknown column 'video_map_movie.movie_id' in 'field list' - Invalid query: 

               SELECT video.id,video.rel_date,video.video_name,video.video_thumb,movie.movie_name,video.play,video.liked,video.youtube_views,sub_category.subcat_name,video_map_movie.movie_id,video.subcat_id,video.video_desc,video_url.final_url,video.is_deleted FROM video
               LEFT JOIN sub_category ON sub_category.id=video.subcat_id
               LEFT JOIN video_url ON video_url.id=video.seo_url_id
               
               LEFT JOIN movie ON movie.id=video_map_movie.movie_id
               where video.cat_id=2 
               
               ORDER BY video.rel_date desc
               LIMIT 0,10

            
ERROR - 2019-04-28 03:33:14 --> Query error: Unknown column 'is_Channel' in 'where clause' - Invalid query: SELECT personality.id as id,personality_name as name,personality_title as title,
                    personality_desc as description, personality_keywords as keywords,
                    CONCAT('timthumb.php?src=https://www.comingtrailer.com/images/personality/',personality.personality_img,'&w=285&h=160') as personality_thumb,                    
                    (case when personality.personality_img is not null then CONCAT('https://www.comingtrailer.com/images/personality/',personality.personality_img) else null end) as thumb
                    FROM personality                     
                    WHERE status = 0 and is_Channel = 1                     
                     LIMIT 0,20
ERROR - 2019-04-28 03:38:39 --> Query error: Lost connection to MySQL server during query - Invalid query: 

     SELECT personality.id,personality.created,personality.personality_img,personality.personality_name,personality.status,(SELECT sum(case when (select count(movie_id) from movie_map_cast where movie_map_cast.movie_id = movie.id and movie_map_cast.personality_id = personality.id) > 0 then 1 else 0 end) FROM movie) as movie,(SELECT sum(case when (select count(video_id) from video_map_cast where video_map_cast.video_id = video.id and video_map_cast.personality_id = personality.id) > 0 then 1  else 0 end) FROM video where video.cat_id = 2) as video,(SELECT sum(case when (select count(poster_id) from poster_map_cast where poster_map_cast.poster_id = poster.id and poster_map_cast.personality_id = personality.id) > 0 then 1 else 0 end) FROM poster) as poster,(SELECT sum(case when (select count(video_id) from video_map_cast where video_map_cast.video_id = video.id and video_map_cast.personality_id = personality.id) > 0 then 1 else 0 end) FROM video where video.cat_id = 1) as trailer FROM personality
     where personality.status=0 AND personality.is_cast = 1 and  ( personality.id LIKE '%-%' OR personality.created LIKE '%-%' OR personality.personality_img LIKE '%-%' OR personality.personality_name LIKE '%-%' OR personality.status LIKE '%-%' )
     ORDER BY (SELECT sum(case when (select count(movie_id) from movie_map_cast where movie_map_cast.movie_id = movie.id and movie_map_cast.personality_id = personality.id) > 0 then 1 else 0 end) FROM movie) asc
     LIMIT 0,10

     
ERROR - 2019-04-28 03:38:39 --> Query error: MySQL server has gone away - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1556402919
WHERE `id` = 'a43c76edc213b7a1201391eecbedf39f3cd7e8df'
ERROR - 2019-04-28 03:38:39 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('36de5798e70d71a697a8bf2e8f7795b9') AS ci_session_lock
ERROR - 2019-04-28 03:39:39 --> Query error: Lost connection to MySQL server during query - Invalid query: 

     SELECT personality.id,personality.created,personality.personality_img,personality.personality_name,personality.status,(SELECT sum(case when (select count(movie_id) from movie_map_cast where movie_map_cast.movie_id = movie.id and movie_map_cast.personality_id = personality.id) > 0 then 1 else 0 end) FROM movie)  as movie,(SELECT sum(case when (select count(video_id) from video_map_cast where video_map_cast.video_id = video.id and video_map_cast.personality_id = personality.id) > 0 then 1  else 0 end) FROM video where video.cat_id = 2) as video,(SELECT sum(case when (select count(poster_id) from poster_map_cast where poster_map_cast.poster_id = poster.id and poster_map_cast.personality_id = personality.id) > 0 then 1 else 0 end) FROM poster) as poster,(SELECT sum(case when (select count(video_id) from video_map_cast where video_map_cast.video_id = video.id and video_map_cast.personality_id = personality.id) > 0 then 1 else 0 end) FROM video where video.cat_id = 1) as trailer FROM personality     
     where personality.is_cast = 1 and personality.status=0
     ORDER BY (SELECT sum(case when (select count(movie_id) from movie_map_cast where movie_map_cast.movie_id = movie.id and movie_map_cast.personality_id = personality.id) > 0 then 1 else 0 end) FROM movie) asc
     LIMIT 0,10

     
ERROR - 2019-04-28 03:39:39 --> Query error: MySQL server has gone away - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1556402979
WHERE `id` = 'e03c6d3251159ace7379c7fd41cbbfab3c138535'
ERROR - 2019-04-28 03:39:39 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('45d2cb987a91a021a1d00387b96cbad1') AS ci_session_lock
ERROR - 2019-04-28 03:41:19 --> Query error: Lost connection to MySQL server during query - Invalid query: 

     SELECT personality.id,personality.created,personality.personality_img,personality.personality_name,personality.status,(SELECT sum(case when (select count(movie_id) from movie_map_singer where movie_map_singer.movie_id = movie.id and movie_map_singer.personality_id = personality.id) > 0 then 1 else 0 end) FROM movie)  as movie,(SELECT sum(case when (select count(video_id) from video_map_singer where video_map_singer.video_id = video.id and video_map_singer.personality_id = personality.id) > 0 then 1 else 0 end) FROM video where video.cat_id = 2) as video,0 as poster,(SELECT sum(case when (select count(video_id) from video_map_singer where video_map_singer.video_id = video.id and video_map_singer.personality_id = personality.id) > 0 then 1 else 0 end) FROM video where video.cat_id = 1) as trailer FROM personality     
     where personality.is_singer = 1 and personality.status=0
     ORDER BY personality.created desc
     LIMIT 0,4000

     
ERROR - 2019-04-28 03:41:19 --> Query error: MySQL server has gone away - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1556403079
WHERE `id` = 'e03c6d3251159ace7379c7fd41cbbfab3c138535'
ERROR - 2019-04-28 03:41:19 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('45d2cb987a91a021a1d00387b96cbad1') AS ci_session_lock
ERROR - 2019-04-28 03:41:34 --> Query error: Lost connection to MySQL server during query - Invalid query: 

     SELECT personality.id,personality.created,personality.personality_img,personality.personality_name,personality.status,(SELECT sum(case when (select count(movie_id) from movie_map_cast where movie_map_cast.movie_id = movie.id and movie_map_cast.personality_id = personality.id) > 0 then 1 else 0 end) FROM movie)  as movie,(SELECT sum(case when (select count(video_id) from video_map_cast where video_map_cast.video_id = video.id and video_map_cast.personality_id = personality.id) > 0 then 1  else 0 end) FROM video where video.cat_id = 2) as video,(SELECT sum(case when (select count(poster_id) from poster_map_cast where poster_map_cast.poster_id = poster.id and poster_map_cast.personality_id = personality.id) > 0 then 1 else 0 end) FROM poster) as poster,(SELECT sum(case when (select count(video_id) from video_map_cast where video_map_cast.video_id = video.id and video_map_cast.personality_id = personality.id) > 0 then 1 else 0 end) FROM video where video.cat_id = 1) as trailer FROM personality     
     where personality.is_cast = 1 and personality.status=0
     ORDER BY (SELECT sum(case when (select count(video_id) from video_map_cast where video_map_cast.video_id = video.id and video_map_cast.personality_id = personality.id) > 0 then 1 else 0 end) FROM video where video.cat_id = 1) asc
     LIMIT 0,10

     
ERROR - 2019-04-28 03:41:34 --> Query error: MySQL server has gone away - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1556403094
WHERE `id` = '21785692d122d2aac9e89ecb469a12fbf13ea821'
ERROR - 2019-04-28 03:41:34 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('250bff150d5c98b3852ff4742c04f36f') AS ci_session_lock
ERROR - 2019-04-28 03:42:34 --> Query error: Lost connection to MySQL server during query - Invalid query: 

     SELECT personality.id,personality.created,personality.personality_img,personality.personality_name,personality.status,(SELECT sum(case when (select count(movie_id) from movie_map_cast where movie_map_cast.movie_id = movie.id and movie_map_cast.personality_id = personality.id) > 0 then 1 else 0 end) FROM movie)  as movie,(SELECT sum(case when (select count(video_id) from video_map_cast where video_map_cast.video_id = video.id and video_map_cast.personality_id = personality.id) > 0 then 1  else 0 end) FROM video where video.cat_id = 2) as video,(SELECT sum(case when (select count(poster_id) from poster_map_cast where poster_map_cast.poster_id = poster.id and poster_map_cast.personality_id = personality.id) > 0 then 1 else 0 end) FROM poster) as poster,(SELECT sum(case when (select count(video_id) from video_map_cast where video_map_cast.video_id = video.id and video_map_cast.personality_id = personality.id) > 0 then 1 else 0 end) FROM video where video.cat_id = 1) as trailer FROM personality     
     where personality.is_cast = 1 and personality.status=0
     ORDER BY (SELECT sum(case when (select count(poster_id) from poster_map_cast where poster_map_cast.poster_id = poster.id and poster_map_cast.personality_id = personality.id) > 0 then 1 else 0 end) FROM poster) asc
     LIMIT 0,10

     
ERROR - 2019-04-28 03:42:34 --> Query error: MySQL server has gone away - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1556403154
WHERE `id` = '21785692d122d2aac9e89ecb469a12fbf13ea821'
ERROR - 2019-04-28 03:42:34 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('250bff150d5c98b3852ff4742c04f36f') AS ci_session_lock
ERROR - 2019-04-28 03:44:09 --> Query error: Lost connection to MySQL server during query - Invalid query: 

     SELECT personality.id,personality.created,personality.personality_img,personality.personality_name,personality.status,(SELECT sum(case when (select count(movie_id) from movie_map_cast where movie_map_cast.movie_id = movie.id and movie_map_cast.personality_id = personality.id) > 0 then 1 else 0 end) FROM movie)  as movie,(SELECT sum(case when (select count(video_id) from video_map_cast where video_map_cast.video_id = video.id and video_map_cast.personality_id = personality.id) > 0 then 1  else 0 end) FROM video where video.cat_id = 2) as video,(SELECT sum(case when (select count(poster_id) from poster_map_cast where poster_map_cast.poster_id = poster.id and poster_map_cast.personality_id = personality.id) > 0 then 1 else 0 end) FROM poster) as poster,(SELECT sum(case when (select count(video_id) from video_map_cast where video_map_cast.video_id = video.id and video_map_cast.personality_id = personality.id) > 0 then 1 else 0 end) FROM video where video.cat_id = 1) as trailer FROM personality     
     where personality.is_cast = 1 and personality.status=0
     ORDER BY (SELECT sum(case when (select count(movie_id) from movie_map_cast where movie_map_cast.movie_id = movie.id and movie_map_cast.personality_id = personality.id) > 0 then 1 else 0 end) FROM movie) asc
     LIMIT 0,10

     
ERROR - 2019-04-28 03:44:09 --> Query error: MySQL server has gone away - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1556403249
WHERE `id` = '21785692d122d2aac9e89ecb469a12fbf13ea821'
ERROR - 2019-04-28 03:44:09 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('250bff150d5c98b3852ff4742c04f36f') AS ci_session_lock
ERROR - 2019-04-28 03:48:24 --> Query error: Lost connection to MySQL server during query - Invalid query: 

     SELECT personality.id,personality.created,personality.personality_img,personality.personality_name,personality.status,(SELECT sum(case when (select count(movie_id) from movie_map_singer where movie_map_singer.movie_id = movie.id and movie_map_singer.personality_id = personality.id) > 0 then 1 else 0 end) FROM movie)  as movie,(SELECT sum(case when (select count(video_id) from video_map_singer where video_map_singer.video_id = video.id and video_map_singer.personality_id = personality.id) > 0 then 1 else 0 end) FROM video where video.cat_id = 2) as video,0 as poster,(SELECT sum(case when (select count(video_id) from video_map_singer where video_map_singer.video_id = video.id and video_map_singer.personality_id = personality.id) > 0 then 1 else 0 end) FROM video where video.cat_id = 1) as trailer FROM personality     
     where personality.is_singer = 1 and personality.status=0
     ORDER BY personality.personality_img asc
     LIMIT 0,4000

     
ERROR - 2019-04-28 03:48:24 --> Query error: MySQL server has gone away - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1556403504
WHERE `id` = 'e03c6d3251159ace7379c7fd41cbbfab3c138535'
ERROR - 2019-04-28 03:48:24 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('45d2cb987a91a021a1d00387b96cbad1') AS ci_session_lock
ERROR - 2019-04-28 03:49:14 --> Query error: Lost connection to MySQL server during query - Invalid query: 

     SELECT personality.id,personality.created,personality.personality_img,personality.personality_name,personality.status,(SELECT sum(case when (select count(movie_id) from movie_map_singer where movie_map_singer.movie_id = movie.id and movie_map_singer.personality_id = personality.id) > 0 then 1 else 0 end) FROM movie)  as movie,(SELECT sum(case when (select count(video_id) from video_map_singer where video_map_singer.video_id = video.id and video_map_singer.personality_id = personality.id) > 0 then 1 else 0 end) FROM video where video.cat_id = 2) as video,0 as poster,(SELECT sum(case when (select count(video_id) from video_map_singer where video_map_singer.video_id = video.id and video_map_singer.personality_id = personality.id) > 0 then 1 else 0 end) FROM video where video.cat_id = 1) as trailer FROM personality     
     where personality.is_singer = 1 and personality.status=0
     ORDER BY personality.created asc
     LIMIT 0,4000

     
ERROR - 2019-04-28 03:49:14 --> Query error: MySQL server has gone away - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1556403554
WHERE `id` = 'e03c6d3251159ace7379c7fd41cbbfab3c138535'
ERROR - 2019-04-28 03:49:14 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('45d2cb987a91a021a1d00387b96cbad1') AS ci_session_lock
ERROR - 2019-04-28 03:50:04 --> Query error: Lost connection to MySQL server during query - Invalid query: 

     SELECT personality.id,personality.created,personality.personality_img,personality.personality_name,personality.status,(SELECT sum(case when (select count(movie_id) from movie_map_singer where movie_map_singer.movie_id = movie.id and movie_map_singer.personality_id = personality.id) > 0 then 1 else 0 end) FROM movie)  as movie,(SELECT sum(case when (select count(video_id) from video_map_singer where video_map_singer.video_id = video.id and video_map_singer.personality_id = personality.id) > 0 then 1 else 0 end) FROM video where video.cat_id = 2) as video,0 as poster,(SELECT sum(case when (select count(video_id) from video_map_singer where video_map_singer.video_id = video.id and video_map_singer.personality_id = personality.id) > 0 then 1 else 0 end) FROM video where video.cat_id = 1) as trailer FROM personality     
     where personality.is_singer = 1 and personality.status=0
     ORDER BY personality.personality_name asc
     LIMIT 0,4000

     
ERROR - 2019-04-28 03:50:04 --> Query error: MySQL server has gone away - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1556403604
WHERE `id` = 'e03c6d3251159ace7379c7fd41cbbfab3c138535'
ERROR - 2019-04-28 03:50:04 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('45d2cb987a91a021a1d00387b96cbad1') AS ci_session_lock
ERROR - 2019-04-28 03:53:44 --> Query error: Lost connection to MySQL server during query - Invalid query: 

     SELECT personality.id,personality.created,personality.personality_img,personality.personality_name,personality.status,(SELECT sum(case when (select count(movie_id) from movie_map_cast where movie_map_cast.movie_id = movie.id and movie_map_cast.personality_id = personality.id) > 0 then 1 else 0 end) FROM movie)  as movie,(SELECT sum(case when (select count(video_id) from video_map_cast where video_map_cast.video_id = video.id and video_map_cast.personality_id = personality.id) > 0 then 1  else 0 end) FROM video where video.cat_id = 2) as video,(SELECT sum(case when (select count(poster_id) from poster_map_cast where poster_map_cast.poster_id = poster.id and poster_map_cast.personality_id = personality.id) > 0 then 1 else 0 end) FROM poster) as poster,(SELECT sum(case when (select count(video_id) from video_map_cast where video_map_cast.video_id = video.id and video_map_cast.personality_id = personality.id) > 0 then 1 else 0 end) FROM video where video.cat_id = 1) as trailer FROM personality     
     where personality.is_cast = 1 and personality.status=0
     ORDER BY (SELECT sum(case when (select count(poster_id) from poster_map_cast where poster_map_cast.poster_id = poster.id and poster_map_cast.personality_id = personality.id) > 0 then 1 else 0 end) FROM poster) asc
     LIMIT 0,10

     
ERROR - 2019-04-28 03:53:44 --> Query error: MySQL server has gone away - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1556403824
WHERE `id` = 'd773dd807ca02e55ea3bc58cef4357116a6ef92c'
ERROR - 2019-04-28 03:53:44 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('d413d5268c484f411e859f49eb0414b6') AS ci_session_lock
ERROR - 2019-04-28 04:32:07 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'ands '')' at line 1 - Invalid query: SELECT user.name,user.img as image,weekly_winners.winning_prize,weekly_winners.start_date as week_start_date,weekly_winners.end_date as week_end_date FROM `weekly_winners` inner join user on user.id = weekly_winners.user_id where (weekly_winners.start_date between '' ands '') 
ERROR - 2019-04-28 04:34:09 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'ands '2019-04-21')' at line 1 - Invalid query: SELECT user.name,user.img as image,weekly_winners.winning_prize,weekly_winners.start_date as week_start_date,weekly_winners.end_date as week_end_date FROM `weekly_winners` inner join user on user.id = weekly_winners.user_id where (weekly_winners.start_date between '2019-04-15' ands '2019-04-21') 
ERROR - 2019-04-28 12:20:00 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('8b55a48c9329175728c870149c88b7ee9d8d92a0', '40.77.167.175', 1556434158, '__ci_last_regenerate|i:1556434154;')
ERROR - 2019-04-28 12:20:00 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('41b36bb54a983ce54540cac74991b6e0') AS ci_session_lock
