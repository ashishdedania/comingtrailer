<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-03-10 21:14:56 --> Query error: Lost connection to MySQL server during query - Invalid query: 

     SELECT personality.id,personality.created,personality.personality_img,personality.personality_name,personality.status,(SELECT sum(case when (select count(movie_id) from movie_map_singer where movie_map_singer.movie_id = movie.id and movie_map_singer.personality_id = personality.id) > 0 then 1 else 0 end) FROM movie)  as movie,(SELECT sum(case when (select count(video_id) from video_map_singer where video_map_singer.video_id = video.id and video_map_singer.personality_id = personality.id) > 0 then 1 else 0 end) FROM video where video.cat_id = 2) as video,0 as poster,(SELECT sum(case when (select count(video_id) from video_map_singer where video_map_singer.video_id = video.id and video_map_singer.personality_id = personality.id) > 0 then 1 else 0 end) FROM video where video.cat_id = 1) as trailer FROM personality     
     where personality.is_singer = 1 and personality.status=0
     ORDER BY (SELECT sum(case when (select count(video_id) from video_map_singer where video_map_singer.video_id = video.id and video_map_singer.personality_id = personality.id) > 0 then 1 else 0 end) FROM video where video.cat_id = 2) asc
     LIMIT 0,10

     
ERROR - 2019-03-10 21:14:56 --> Query error: MySQL server has gone away - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1552232696
WHERE `id` = 'i7omtnphvdo290afnvoqu8fon0doj4c5'
ERROR - 2019-03-10 21:14:56 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('a0d8f11d4cda3bcc4026df0ec6f26161') AS ci_session_lock
ERROR - 2019-03-10 21:15:06 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('a0d8f11d4cda3bcc4026df0ec6f26161', 300) AS ci_session_lock
ERROR - 2019-03-10 21:15:21 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('a0d8f11d4cda3bcc4026df0ec6f26161', 300) AS ci_session_lock
ERROR - 2019-03-10 21:15:41 --> Query error: Lost connection to MySQL server during query - Invalid query: 

     SELECT personality.id,personality.created,personality.personality_img,personality.personality_name,personality.status,(SELECT sum(case when (select count(movie_id) from movie_map_director where movie_map_director.movie_id = movie.id and movie_map_director.personality_id = personality.id) > 0 then 1 else 0 end) FROM movie)  as movie,(SELECT sum(case when (select count(video_id) from video_map_director where video_map_director.video_id = video.id and video_map_director.personality_id = personality.id) > 0 then 1 else 0 end) FROM video where video.cat_id = 2) as video,(SELECT sum(case when (select count(poster_id) from poster_map_director where poster_map_director.poster_id = poster.id and poster_map_director.personality_id = personality.id) > 0 then 1 else 0 end) FROM poster) as poster,(SELECT sum(case when (select count(video_id) from video_map_director where video_map_director.video_id = video.id and video_map_director.personality_id = personality.id) > 0 then 1 else 0 end) FROM video where video.cat_id = 1) as trailer FROM personality     
     where personality.is_director = 1 and personality.status=0
     ORDER BY (SELECT sum(case when (select count(movie_id) from movie_map_director where movie_map_director.movie_id = movie.id and movie_map_director.personality_id = personality.id) > 0 then 1 else 0 end) FROM movie) asc
     LIMIT 0,10

     
ERROR - 2019-03-10 21:15:41 --> Query error: MySQL server has gone away - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1552232741
WHERE `id` = 'i7omtnphvdo290afnvoqu8fon0doj4c5'
ERROR - 2019-03-10 21:15:41 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('a0d8f11d4cda3bcc4026df0ec6f26161') AS ci_session_lock
ERROR - 2019-03-10 22:08:19 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: select playlist_map_video.video_id from playlist_map_video where playlist_map_video.playlist_id = 30 and playlist_map_video.video_id = 
