<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-03-19 00:39:01 --> Unable to connect to the database
ERROR - 2019-03-19 00:39:01 --> Unable to connect to the database
ERROR - 2019-03-19 00:39:01 --> Unable to connect to the database
ERROR - 2019-03-19 00:39:01 --> Unable to connect to the database
ERROR - 2019-03-19 00:39:01 --> Unable to connect to the database
ERROR - 2019-03-19 00:40:18 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '(case when movie.movie_img is not null then CONCAT('https://www.comingtrailer.co' at line 2 - Invalid query: SELECT movie.id as id,MONTH(movie.rel_date) as month,YEAR(movie.rel_date) as year,movie.movie_name,sub_category.subcat_name as subcat_name                   
                    (case when movie.movie_img is not null then CONCAT('https://www.comingtrailer.com/images/movies/',movie.movie_img) else null end) as thumb,
                    video_url.final_url FROM movie                     
                    LEFT JOIN video_url ON video_url.id=movie.seo_url_id 
                     LEFT JOIN sub_category ON sub_category.id=movie.subcat_id 
                    WHERE movie.status='0'
                    group by movie.id
                    ORDER BY year DESC,IF(MONTH(movie.rel_date) < MONTH(NOW()), MONTH(movie.rel_date) + 12, MONTH(movie.rel_date)),
 DAY(movie.rel_date)
                     LIMIT 20,20
ERROR - 2019-03-19 00:57:14 --> Query error: Lost connection to MySQL server during query - Invalid query: 

     SELECT personality.id,personality.created,personality.personality_img,personality.personality_name,personality.status,(SELECT sum(case when (select count(movie_id) from movie_map_cast where movie_map_cast.movie_id = movie.id and movie_map_cast.personality_id = personality.id) > 0 then 1 else 0 end) FROM movie)  as movie,(SELECT sum(case when (select count(video_id) from video_map_cast where video_map_cast.video_id = video.id and video_map_cast.personality_id = personality.id) > 0 then 1  else 0 end) FROM video where video.cat_id = 2) as video,(SELECT sum(case when (select count(poster_id) from poster_map_cast where poster_map_cast.poster_id = poster.id and poster_map_cast.personality_id = personality.id) > 0 then 1 else 0 end) FROM poster) as poster,(SELECT sum(case when (select count(video_id) from video_map_cast where video_map_cast.video_id = video.id and video_map_cast.personality_id = personality.id) > 0 then 1 else 0 end) FROM video where video.cat_id = 1) as trailer FROM personality     
     where personality.is_cast = 1 and personality.status=0
     ORDER BY (SELECT sum(case when (select count(video_id) from video_map_cast where video_map_cast.video_id = video.id and video_map_cast.personality_id = personality.id) > 0 then 1 else 0 end) FROM video where video.cat_id = 1) asc
     LIMIT 0,10

     
ERROR - 2019-03-19 00:57:14 --> Query error: MySQL server has gone away - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1552937234
WHERE `id` = '83bec1973fc517f24b20eceaadac8660d92182d8'
ERROR - 2019-03-19 00:57:14 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('ab003ede9f8cb9092f29cc09ede17bb6') AS ci_session_lock
ERROR - 2019-03-19 00:57:59 --> Query error: Lost connection to MySQL server during query - Invalid query: 

     SELECT personality.id,personality.created,personality.personality_img,personality.personality_name,personality.status,(SELECT sum(case when (select count(movie_id) from movie_map_cast where movie_map_cast.movie_id = movie.id and movie_map_cast.personality_id = personality.id) > 0 then 1 else 0 end) FROM movie)  as movie,(SELECT sum(case when (select count(video_id) from video_map_cast where video_map_cast.video_id = video.id and video_map_cast.personality_id = personality.id) > 0 then 1  else 0 end) FROM video where video.cat_id = 2) as video,(SELECT sum(case when (select count(poster_id) from poster_map_cast where poster_map_cast.poster_id = poster.id and poster_map_cast.personality_id = personality.id) > 0 then 1 else 0 end) FROM poster) as poster,(SELECT sum(case when (select count(video_id) from video_map_cast where video_map_cast.video_id = video.id and video_map_cast.personality_id = personality.id) > 0 then 1 else 0 end) FROM video where video.cat_id = 1) as trailer FROM personality     
     where personality.is_cast = 1 and personality.status=0
     ORDER BY (SELECT sum(case when (select count(video_id) from video_map_cast where video_map_cast.video_id = video.id and video_map_cast.personality_id = personality.id) > 0 then 1 else 0 end) FROM video where video.cat_id = 1) asc
     LIMIT 0,10

     
ERROR - 2019-03-19 00:57:59 --> Query error: MySQL server has gone away - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1552937279
WHERE `id` = '83bec1973fc517f24b20eceaadac8660d92182d8'
ERROR - 2019-03-19 00:57:59 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('ab003ede9f8cb9092f29cc09ede17bb6') AS ci_session_lock
ERROR - 2019-03-19 11:38:25 --> Query error: Lost connection to MySQL server during query - Invalid query: 

     SELECT personality.id,personality.created,personality.personality_img,personality.personality_name,personality.status,(SELECT sum(case when (select count(movie_id) from movie_map_music where movie_map_music.movie_id = movie.id and movie_map_music.personality_id = personality.id) > 0 then 1 else 0 end) FROM movie)  as movie,(SELECT sum(case when (select count(video_id) from video_map_music where video_map_music.video_id = video.id and video_map_music.personality_id = personality.id) > 0 then 1 else 0 end) FROM video where video.cat_id = 2) as video,0 as poster,(SELECT sum(case when (select count(video_id) from video_map_music where video_map_music.video_id = video.id and video_map_music.personality_id = personality.id) > 0 then 1 else 0 end) FROM video where video.cat_id = 1) as trailer FROM personality     
     where personality.is_music_director = 1 and personality.status=0
     ORDER BY (SELECT sum(case when (select count(video_id) from video_map_music where video_map_music.video_id = video.id and video_map_music.personality_id = personality.id) > 0 then 1 else 0 end) FROM video where video.cat_id = 2) asc
     LIMIT 0,10

     
ERROR - 2019-03-19 11:38:25 --> Query error: MySQL server has gone away - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1552975705
WHERE `id` = 'a5a2ff9f6ab843aa3762d3062b1ad95d404b751c'
ERROR - 2019-03-19 11:38:25 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('c1e77b2ec073411ea8d3153b9f5a5239') AS ci_session_lock
ERROR - 2019-03-19 21:51:01 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `user_activity` = 'liked' AND `shared_with` = ''' at line 3 - Invalid query: SELECT *
FROM `user_activity`
WHERE `user_id` = '' AND `cat_id` = '' AND `common_id` =  AND `user_activity` = 'liked' AND `shared_with` = ''
ERROR - 2019-03-19 21:52:40 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
ERROR - 2019-03-19 21:53:27 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
