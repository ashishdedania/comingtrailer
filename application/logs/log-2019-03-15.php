<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-03-15 01:58:49 --> Query error: Unknown column 'twit_link' in 'field list' - Invalid query: UPDATE `movie` SET `movie_name` = 'Veere Di Wedding', `movie_title` = '', `movie_desc` = '', `movie_keywords` = '', `rel_date` = '2018-06-01 10:00:06', `my_release` = '2018-06-01', `subcat_id` = '1', `updated` = '2019-03-15 01:58:49', `fb_link` = 'www.fb.com', `insta_link` = 'www.insta.com', `twit_link` = 'www.twitter.com'
WHERE `id` = '413'
ERROR - 2019-03-15 02:02:32 --> Query error: Unknown column 'full_movie' in 'field list' - Invalid query: UPDATE `movie` SET `movie_name` = 'Veere Di Wedding', `movie_title` = '', `movie_desc` = '', `movie_keywords` = '', `rel_date` = '2018-06-01 10:00:06', `my_release` = '2018-06-01', `subcat_id` = '1', `updated` = '2019-03-15 02:02:32', `fb_link` = 'www.fb.com', `insta_link` = 'www.insta.com', `twit_link` = 'www.twitter.com', `full_movie` = 'www.www.com'
WHERE `id` = '413'
ERROR - 2019-03-15 23:18:43 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'LIMIT ,' at line 10 - Invalid query: 

               SELECT poster.id,poster.rel_date,poster.poster_name,movie.movie_name,poster.likes,poster.views,sub_category.subcat_name,poster_map_movie.movie_id,poster.subcat_id,poster.poster_desc,video_url.final_url,poster.is_deleted FROM poster
               LEFT JOIN sub_category ON sub_category.id=poster.subcat_id
               LEFT JOIN poster_map_movie ON poster_map_movie.poster_id=poster.id
               
               LEFT JOIN movie ON movie.id=poster_map_movie.movie_id
               LEFT JOIN video_url ON video_url.id=poster.seo_url_id
               
               where 1 
               ORDER BY  
               LIMIT ,

            
ERROR - 2019-03-15 23:26:38 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'LIMIT ,' at line 10 - Invalid query: 

               SELECT poster.id,poster.rel_date,poster.poster_name,movie.movie_name,poster.likes,poster.views,sub_category.subcat_name,poster_map_movie.movie_id,poster.subcat_id,poster.poster_desc,video_url.final_url,poster.is_deleted FROM poster
               LEFT JOIN sub_category1 ON sub_category.id=poster.subcat_id
               LEFT JOIN poster_map_movie ON poster_map_movie.poster_id=poster.id
               
               LEFT JOIN movie ON movie.id=poster_map_movie.movie_id
               LEFT JOIN video_url ON video_url.id=poster.seo_url_id
               
               where 1 
               ORDER BY  
               LIMIT ,

            
ERROR - 2019-03-15 23:27:58 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 9 - Invalid query: 

               SELECT poster.id,poster.rel_date,poster.poster_name,movie.movie_name,poster.likes,poster.views,sub_category.subcat_name,poster_map_movie.movie_id,poster.subcat_id,poster.poster_desc,video_url.final_url,poster.is_deleted FROM poster
               LEFT JOIN sub_category ON sub_category.id=poster.subcat_id
               LEFT JOIN poster_map_movie ON poster_map_movie.poster_id=poster.id
               
               LEFT JOIN movie ON movie.id=poster_map_movie.movie_id
               LEFT JOIN video_url ON video_url.id=poster.seo_url_id
               
               where 1 
               ORDER BY  

            
ERROR - 2019-03-15 23:35:34 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'LIMIT ,' at line 10 - Invalid query: 

               SELECT poster.id,poster.rel_date,poster.poster_name,movie.movie_name,poster.likes,poster.views,sub_category.subcat_name,poster_map_movie.movie_id,poster.subcat_id,poster.poster_desc,video_url.final_url,poster.is_deleted FROM poster
               LEFT JOIN sub_category ON sub_category.id=poster.subcat_id
               LEFT JOIN poster_map_movie ON poster_map_movie.poster_id=poster.id
               
               LEFT JOIN movie ON movie.id=poster_map_movie.movie_id
               LEFT JOIN video_url ON video_url.id=poster.seo_url_id
               
               where 1 
               ORDER BY  
               LIMIT ,

            
ERROR - 2019-03-15 23:35:46 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 10 - Invalid query: 

               SELECT poster.id,poster.rel_date,poster.poster_name,movie.movie_name,poster.likes,poster.views,sub_category.subcat_name,poster_map_movie.movie_id,poster.subcat_id,poster.poster_desc,video_url.final_url,poster.is_deleted FROM poster
               LEFT JOIN sub_category ON sub_category.id=poster.subcat_id
               LEFT JOIN poster_map_movie ON poster_map_movie.poster_id=poster.id
               
               LEFT JOIN movie ON movie.id=poster_map_movie.movie_id
               LEFT JOIN video_url ON video_url.id=poster.seo_url_id
               
               where 1 
             
               LIMIT ,

            
ERROR - 2019-03-15 23:43:05 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'LIMIT ,' at line 10 - Invalid query: 

               SELECT poster.id,poster.rel_date,poster.poster_name,poster_img.poster_image,movie.movie_name,poster.likes,poster.views,sub_category.subcat_name,poster_map_movie.movie_id,poster.subcat_id,poster.poster_desc,video_url.final_url,poster.is_deleted FROM poster
               LEFT JOIN sub_category ON sub_category.id=poster.subcat_id
               LEFT JOIN poster_map_movie ON poster_map_movie.poster_id=poster.id
               LEFT JOIN poster_img ON poster_img.poster_id=poster.id
               LEFT JOIN movie ON movie.id=poster_map_movie.movie_id
               LEFT JOIN video_url ON video_url.id=poster.seo_url_id
               
               where 1 
               ORDER BY  
               LIMIT ,

            
ERROR - 2019-03-15 23:46:50 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'LIMIT ,' at line 8 - Invalid query: 

               SELECT DISTINCT movie.id,movie.my_release,movie.rel_date,movie.movie_name,movie.movie_img,sub_category.subcat_name,movie.subcat_id,video_url.final_url,status FROM movie
               LEFT JOIN sub_category ON sub_category.id=movie.subcat_id
               LEFT JOIN video_url ON video_url.id=movie.seo_url_id
               
               where 1
               
               ORDER BY  
               LIMIT ,

            
ERROR - 2019-03-15 23:47:12 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'LIMIT ,' at line 9 - Invalid query: 

               SELECT video.id,video.rel_date,video.video_name,video.video_thumb,movie.movie_name,video.play,video.liked,video.youtube_views,sub_category.subcat_name,video_map_movie.movie_id,video.subcat_id,video.video_desc,video_url.final_url,video.is_deleted FROM video
               LEFT JOIN sub_category ON sub_category.id=video.subcat_id
               LEFT JOIN video_url ON video_url.id=video.seo_url_id
               
               LEFT JOIN movie ON movie.id=video_map_movie.movie_id
               where video.cat_id=1 
               
               ORDER BY  
               LIMIT ,

            
ERROR - 2019-03-15 23:56:47 --> Query error: Lost connection to MySQL server during query - Invalid query: 

     SELECT personality.id,personality.created,personality.personality_img,personality.personality_name,personality.status,(SELECT sum(case when (select count(movie_id) from movie_map_cast where movie_map_cast.movie_id = movie.id and movie_map_cast.personality_id = personality.id) > 0 then 1 else 0 end) FROM movie)  as movie,(SELECT sum(case when (select count(video_id) from video_map_cast where video_map_cast.video_id = video.id and video_map_cast.personality_id = personality.id) > 0 then 1  else 0 end) FROM video where video.cat_id = 2) as video,(SELECT sum(case when (select count(poster_id) from poster_map_cast where poster_map_cast.poster_id = poster.id and poster_map_cast.personality_id = personality.id) > 0 then 1 else 0 end) FROM poster) as poster,(SELECT sum(case when (select count(video_id) from video_map_cast where video_map_cast.video_id = video.id and video_map_cast.personality_id = personality.id) > 0 then 1 else 0 end) FROM video where video.cat_id = 1) as trailer FROM personality     
     where personality.is_cast = 1 and personality.status=0
     ORDER BY (SELECT sum(case when (select count(poster_id) from poster_map_cast where poster_map_cast.poster_id = poster.id and poster_map_cast.personality_id = personality.id) > 0 then 1 else 0 end) FROM poster) asc
     LIMIT 0,10

     
ERROR - 2019-03-15 23:56:47 --> Query error: MySQL server has gone away - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1552674407
WHERE `id` = 'e71859d9e0916f8e97dbc0370e50995e226a1895'
ERROR - 2019-03-15 23:56:47 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('68476c57807cf8f2023385e5d607845c') AS ci_session_lock
