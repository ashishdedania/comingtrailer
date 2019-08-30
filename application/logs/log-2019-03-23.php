<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-03-23 01:39:27 --> Query error: Lost connection to MySQL server during query - Invalid query: 

     SELECT personality.id,personality.created,personality.personality_img,personality.personality_name,personality.status,(SELECT sum(case when (select count(movie_id) from movie_map_cast where movie_map_cast.movie_id = movie.id and movie_map_cast.personality_id = personality.id) > 0 then 1 else 0 end) FROM movie)  as movie,(SELECT sum(case when (select count(video_id) from video_map_cast where video_map_cast.video_id = video.id and video_map_cast.personality_id = personality.id) > 0 then 1  else 0 end) FROM video where video.cat_id = 2) as video,(SELECT sum(case when (select count(poster_id) from poster_map_cast where poster_map_cast.poster_id = poster.id and poster_map_cast.personality_id = personality.id) > 0 then 1 else 0 end) FROM poster) as poster,(SELECT sum(case when (select count(video_id) from video_map_cast where video_map_cast.video_id = video.id and video_map_cast.personality_id = personality.id) > 0 then 1 else 0 end) FROM video where video.cat_id = 1) as trailer FROM personality     
     where personality.is_cast = 1 and personality.status=0
     ORDER BY (SELECT sum(case when (select count(video_id) from video_map_cast where video_map_cast.video_id = video.id and video_map_cast.personality_id = personality.id) > 0 then 1  else 0 end) FROM video where video.cat_id = 2) asc
     LIMIT 0,10

     
ERROR - 2019-03-23 01:39:27 --> Query error: MySQL server has gone away - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1553285367
WHERE `id` = 'db9af5f37fe67c017ab4413322c31c720e18a9f1'
ERROR - 2019-03-23 01:39:27 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('c9c0d5fe090581731e20c3fed3fa192c') AS ci_session_lock
ERROR - 2019-03-23 13:06:02 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('09425cf9961e00e8247210a257bf28d9', 300) AS ci_session_lock
ERROR - 2019-03-23 13:06:02 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('09425cf9961e00e8247210a257bf28d9', 300) AS ci_session_lock
ERROR - 2019-03-23 23:02:40 --> Query error: Cannot add or update a child row: a foreign key constraint fails (`cominlvi_trailer`.`movie_map_cast`, CONSTRAINT `movie_map_cast_ibfk_2` FOREIGN KEY (`cast_id`) REFERENCES `cast` (`id`) ON DELETE CASCADE ON UPDATE CASCADE) - Invalid query: INSERT INTO `movie_map_cast` (`movie_id`, `cast_id`) VALUES ('2680', 18772)
