<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-02-16 01:10:38 --> Query error: Unknown column 'is_Actor' in 'where clause' - Invalid query: SELECT personality.id as id,personality_name as name,personality_title as title,
                    personality_desc as description, personality_keywords as keywords,
                    CONCAT('timthumb.php?src=https://www.comingtrailer.com/images/personality/',personality.personality_img,'&w=285&h=160') as personality_thumb,                    
                    (case when personality.personality_img is not null then CONCAT('https://www.comingtrailer.com/images/personality/',personality.personality_img) else null end) as thumb
                    FROM personality                     
                    WHERE status = 0 and is_Actor = 1                     
                     LIMIT 20,20
ERROR - 2019-02-16 23:41:30 --> Query error: Illegal mix of collations for operation 'like' - Invalid query: 

               SELECT movie.id,movie.my_release,movie.rel_date,movie.movie_name,movie.movie_img,video_url.final_url,movie.status,sub_category.subcat_name FROM movie
               LEFT JOIN video_url ON video_url.id=movie.seo_url_id
               LEFT JOIN sub_category ON sub_category.id=movie.subcat_id
               where movie.status=0 AND ( movie.id LIKE '%Ennodadhu﻿%' OR movie.my_release LIKE '%Ennodadhu﻿%' OR movie.rel_date LIKE '%Ennodadhu﻿%' OR movie.movie_name LIKE '%Ennodadhu﻿%' OR movie.movie_img LIKE '%Ennodadhu﻿%' OR video_url.final_url LIKE '%Ennodadhu﻿%' OR movie.status LIKE '%Ennodadhu﻿%' OR sub_category.subcat_name LIKE '%Ennodadhu﻿%' )
               ORDER BY movie.my_release desc
               LIMIT 0,10

            
ERROR - 2019-02-16 23:41:35 --> Query error: Illegal mix of collations for operation 'like' - Invalid query: 

               SELECT movie.id,movie.my_release,movie.rel_date,movie.movie_name,movie.movie_img,video_url.final_url,movie.status,sub_category.subcat_name FROM movie
               LEFT JOIN video_url ON video_url.id=movie.seo_url_id
               LEFT JOIN sub_category ON sub_category.id=movie.subcat_id
               where movie.status=0 AND ( movie.id LIKE '%Ennodadhu﻿%' OR movie.my_release LIKE '%Ennodadhu﻿%' OR movie.rel_date LIKE '%Ennodadhu﻿%' OR movie.movie_name LIKE '%Ennodadhu﻿%' OR movie.movie_img LIKE '%Ennodadhu﻿%' OR video_url.final_url LIKE '%Ennodadhu﻿%' OR movie.status LIKE '%Ennodadhu﻿%' OR sub_category.subcat_name LIKE '%Ennodadhu﻿%' )
               ORDER BY movie.my_release desc
               LIMIT 0,10

            
ERROR - 2019-02-16 23:41:43 --> Query error: Illegal mix of collations for operation 'like' - Invalid query: 

               SELECT movie.id,movie.my_release,movie.rel_date,movie.movie_name,movie.movie_img,video_url.final_url,movie.status,sub_category.subcat_name FROM movie
               LEFT JOIN video_url ON video_url.id=movie.seo_url_id
               LEFT JOIN sub_category ON sub_category.id=movie.subcat_id
               where movie.status=0 AND ( movie.id LIKE '%Ennodadhu﻿%' OR movie.my_release LIKE '%Ennodadhu﻿%' OR movie.rel_date LIKE '%Ennodadhu﻿%' OR movie.movie_name LIKE '%Ennodadhu﻿%' OR movie.movie_img LIKE '%Ennodadhu﻿%' OR video_url.final_url LIKE '%Ennodadhu﻿%' OR movie.status LIKE '%Ennodadhu﻿%' OR sub_category.subcat_name LIKE '%Ennodadhu﻿%' )
               ORDER BY movie.my_release desc
               LIMIT 0,10

            
ERROR - 2019-02-16 23:41:50 --> Query error: Illegal mix of collations for operation 'like' - Invalid query: 

               SELECT poster.id,poster.rel_date,poster.poster_name,movie.movie_name,poster.likes,poster.views,sub_category.subcat_name,poster_map_movie.movie_id,poster.subcat_id,poster.poster_desc,video_url.final_url,poster.is_deleted FROM poster
               LEFT JOIN sub_category ON sub_category.id=poster.subcat_id
               LEFT JOIN poster_map_movie ON poster_map_movie.poster_id=poster.id
               LEFT JOIN movie ON movie.id=poster_map_movie.movie_id
               LEFT JOIN video_url ON video_url.id=poster.seo_url_id
               where is_deleted=0 AND ( poster.id LIKE '%Ennodadhu﻿%' OR poster.rel_date LIKE '%Ennodadhu﻿%' OR poster.poster_name LIKE '%Ennodadhu﻿%' OR movie.movie_name LIKE '%Ennodadhu﻿%' OR poster.likes LIKE '%Ennodadhu﻿%' OR poster.views LIKE '%Ennodadhu﻿%' OR sub_category.subcat_name LIKE '%Ennodadhu﻿%' OR poster_map_movie.movie_id LIKE '%Ennodadhu﻿%' OR poster.subcat_id LIKE '%Ennodadhu﻿%' OR poster.poster_desc LIKE '%Ennodadhu﻿%' OR video_url.final_url LIKE '%Ennodadhu﻿%' OR poster.is_deleted LIKE '%Ennodadhu﻿%' )
               ORDER BY poster.rel_date desc
               LIMIT 0,10

            
ERROR - 2019-02-16 23:42:03 --> Query error: Illegal mix of collations for operation 'like' - Invalid query: 

               SELECT video.id,video.rel_date,video.video_name,movie.movie_name,video.play,video.liked,video.youtube_views,sub_category.subcat_name,video_map_movie.movie_id,video.subcat_id,video.video_desc,video_url.final_url,video.is_deleted FROM video
               LEFT JOIN sub_category ON sub_category.id=video.subcat_id
               LEFT JOIN video_map_movie ON video_map_movie.video_id=video.id
               LEFT JOIN movie ON movie.id=video_map_movie.movie_id
               LEFT JOIN video_url ON video_url.id=video.seo_url_id
               where video.cat_id=2 AND  is_deleted=0 AND  ( video.id LIKE '%Ennodadhu﻿%' OR video.rel_date LIKE '%Ennodadhu﻿%' OR video.video_name LIKE '%Ennodadhu﻿%' OR movie.movie_name LIKE '%Ennodadhu﻿%' OR video.play LIKE '%Ennodadhu﻿%' OR video.liked LIKE '%Ennodadhu﻿%' OR video.youtube_views LIKE '%Ennodadhu﻿%' OR sub_category.subcat_name LIKE '%Ennodadhu﻿%' OR video_map_movie.movie_id LIKE '%Ennodadhu﻿%' OR video.subcat_id LIKE '%Ennodadhu﻿%' OR video.video_desc LIKE '%Ennodadhu﻿%' OR video_url.final_url LIKE '%Ennodadhu﻿%' OR video.is_deleted LIKE '%Ennodadhu﻿%' )
               ORDER BY video.rel_date desc
               LIMIT 0,10

            
ERROR - 2019-02-16 23:42:43 --> Query error: Illegal mix of collations for operation 'like' - Invalid query: 

               SELECT video.id,video.rel_date,video.video_name,movie.movie_name,video.play,video.liked,video.youtube_views,sub_category.subcat_name,video_map_movie.movie_id,video.subcat_id,video.video_desc,video_url.final_url,video.is_deleted FROM video
               LEFT JOIN sub_category ON sub_category.id=video.subcat_id
               LEFT JOIN video_map_movie ON video_map_movie.video_id=video.id
               LEFT JOIN movie ON movie.id=video_map_movie.movie_id
               LEFT JOIN video_url ON video_url.id=video.seo_url_id
               where video.cat_id=2 AND  is_deleted=0 AND  ( video.id LIKE '%Ennodadhu﻿%' OR video.rel_date LIKE '%Ennodadhu﻿%' OR video.video_name LIKE '%Ennodadhu﻿%' OR movie.movie_name LIKE '%Ennodadhu﻿%' OR video.play LIKE '%Ennodadhu﻿%' OR video.liked LIKE '%Ennodadhu﻿%' OR video.youtube_views LIKE '%Ennodadhu﻿%' OR sub_category.subcat_name LIKE '%Ennodadhu﻿%' OR video_map_movie.movie_id LIKE '%Ennodadhu﻿%' OR video.subcat_id LIKE '%Ennodadhu﻿%' OR video.video_desc LIKE '%Ennodadhu﻿%' OR video_url.final_url LIKE '%Ennodadhu﻿%' OR video.is_deleted LIKE '%Ennodadhu﻿%' )
               ORDER BY video.rel_date desc
               LIMIT 0,10

            
ERROR - 2019-02-16 23:42:49 --> Query error: Illegal mix of collations for operation 'like' - Invalid query: 

               SELECT video.id,video.rel_date,video.video_name,movie.movie_name,video.play,video.liked,video.youtube_views,sub_category.subcat_name,video_map_movie.movie_id,video.subcat_id,video.video_desc,video_url.final_url,video.is_deleted FROM video
               LEFT JOIN sub_category ON sub_category.id=video.subcat_id
               LEFT JOIN video_map_movie ON video_map_movie.video_id=video.id
               LEFT JOIN movie ON movie.id=video_map_movie.movie_id
               LEFT JOIN video_url ON video_url.id=video.seo_url_id
               where video.cat_id=2 AND  is_deleted=0 AND  ( video.id LIKE '%Ennodadhu﻿%' OR video.rel_date LIKE '%Ennodadhu﻿%' OR video.video_name LIKE '%Ennodadhu﻿%' OR movie.movie_name LIKE '%Ennodadhu﻿%' OR video.play LIKE '%Ennodadhu﻿%' OR video.liked LIKE '%Ennodadhu﻿%' OR video.youtube_views LIKE '%Ennodadhu﻿%' OR sub_category.subcat_name LIKE '%Ennodadhu﻿%' OR video_map_movie.movie_id LIKE '%Ennodadhu﻿%' OR video.subcat_id LIKE '%Ennodadhu﻿%' OR video.video_desc LIKE '%Ennodadhu﻿%' OR video_url.final_url LIKE '%Ennodadhu﻿%' OR video.is_deleted LIKE '%Ennodadhu﻿%' )
               ORDER BY video.rel_date desc
               LIMIT 0,10

            
ERROR - 2019-02-16 23:43:17 --> Query error: Illegal mix of collations for operation 'like' - Invalid query: 

     SELECT personality.id,personality.created,personality.personality_img,personality.personality_name,personality.status,(SELECT sum(case when (select count(movie_id) from movie_map_cast where movie_map_cast.movie_id = movie.id and movie_map_cast.personality_id = personality.id) > 0 then 1 else 0 end) FROM movie) as movie,(SELECT sum(case when (select count(video_id) from video_map_cast where video_map_cast.video_id = video.id and video_map_cast.personality_id = personality.id) > 0 then 1  else 0 end) FROM video where video.cat_id = 2) as video,(SELECT sum(case when (select count(poster_id) from poster_map_cast where poster_map_cast.poster_id = poster.id and poster_map_cast.personality_id = personality.id) > 0 then 1 else 0 end) FROM poster) as poster,(SELECT sum(case when (select count(video_id) from video_map_cast where video_map_cast.video_id = video.id and video_map_cast.personality_id = personality.id) > 0 then 1 else 0 end) FROM video where video.cat_id = 1) as trailer FROM personality
     where personality.status=0 AND personality.is_cast = 1 and  ( personality.id LIKE '%Ennodadhu﻿%' OR personality.created LIKE '%Ennodadhu﻿%' OR personality.personality_img LIKE '%Ennodadhu﻿%' OR personality.personality_name LIKE '%Ennodadhu﻿%' OR personality.status LIKE '%Ennodadhu﻿%' )
     ORDER BY personality.created desc
     LIMIT 0,10

     
ERROR - 2019-02-16 23:44:32 --> Query error: Illegal mix of collations for operation 'like' - Invalid query: 

     SELECT personality.id,personality.created,personality.personality_img,personality.personality_name,personality.status,(SELECT sum(case when (select count(movie_id) from movie_map_cast where movie_map_cast.movie_id = movie.id and movie_map_cast.personality_id = personality.id) > 0 then 1 else 0 end) FROM movie) as movie,(SELECT sum(case when (select count(video_id) from video_map_cast where video_map_cast.video_id = video.id and video_map_cast.personality_id = personality.id) > 0 then 1  else 0 end) FROM video where video.cat_id = 2) as video,(SELECT sum(case when (select count(poster_id) from poster_map_cast where poster_map_cast.poster_id = poster.id and poster_map_cast.personality_id = personality.id) > 0 then 1 else 0 end) FROM poster) as poster,(SELECT sum(case when (select count(video_id) from video_map_cast where video_map_cast.video_id = video.id and video_map_cast.personality_id = personality.id) > 0 then 1 else 0 end) FROM video where video.cat_id = 1) as trailer FROM personality
     where personality.status=0 AND personality.is_cast = 1 and  ( personality.id LIKE '%Ennodadhu﻿%' OR personality.created LIKE '%Ennodadhu﻿%' OR personality.personality_img LIKE '%Ennodadhu﻿%' OR personality.personality_name LIKE '%Ennodadhu﻿%' OR personality.status LIKE '%Ennodadhu﻿%' )
     ORDER BY personality.created desc
     LIMIT 0,10

     
ERROR - 2019-02-16 23:44:45 --> Query error: Illegal mix of collations for operation 'like' - Invalid query: 

               SELECT video.id,video.rel_date,video.video_name,movie.movie_name,video.play,video.liked,video.youtube_views,sub_category.subcat_name,video_map_movie.movie_id,video.subcat_id,video.video_desc,video_url.final_url,video.is_deleted FROM video
               LEFT JOIN sub_category ON sub_category.id=video.subcat_id
               LEFT JOIN video_url ON video_url.id=video.seo_url_id
                LEFT JOIN video_map_movie ON video_map_movie.video_id=video.id
               LEFT JOIN movie ON movie.id=video_map_movie.movie_id
               where video.cat_id=2 AND ((select count(video_map_cast.video_id) from video_map_cast where video_map_cast.video_id=video.id and video_map_cast.personality_id = 17443) > 0 OR (select count(video_map_singer.video_id) from video_map_singer where video_map_singer.video_id=video.id and video_map_singer.personality_id = 17443) > 0 OR (select count(video_map_director.video_id) from video_map_director where video_map_director.video_id=video.id and video_map_director.personality_id = 17443) > 0 OR (select count(video_map_music.video_id) from video_map_music where video_map_music.video_id=video.id and video_map_music.personality_id = 17443) > 0)  AND  ( video.id LIKE '% Ennodadhu﻿%' OR video.rel_date LIKE '% Ennodadhu﻿%' OR video.video_name LIKE '% Ennodadhu﻿%' OR movie.movie_name LIKE '% Ennodadhu﻿%' OR video.play LIKE '% Ennodadhu﻿%' OR video.liked LIKE '% Ennodadhu﻿%' OR video.youtube_views LIKE '% Ennodadhu﻿%' OR sub_category.subcat_name LIKE '% Ennodadhu﻿%' OR video_map_movie.movie_id LIKE '% Ennodadhu﻿%' OR video.subcat_id LIKE '% Ennodadhu﻿%' OR video.video_desc LIKE '% Ennodadhu﻿%' OR video_url.final_url LIKE '% Ennodadhu﻿%' OR video.is_deleted LIKE '% Ennodadhu﻿%' )
               ORDER BY video.rel_date desc
               LIMIT 0,10

            
ERROR - 2019-02-16 23:45:18 --> Query error: Illegal mix of collations for operation 'like' - Invalid query: 

               SELECT user.id,user.created,user.name,user.mobile,user.email,user.gender,user_points.earn_points,user_points.total_video_play,user.img,user_points.earn_points,user_points.total_invite,user_points.total_social_likes,user_points.total_share,user_points.totla_frnds_share,user_points.total_likes,user_points.total_earn_rs,newsletter.id as subscriber,(SELECT count(*) FROM `user_activity` where user_activity.user_id = user.id and user_activity.user_activity = "play") as activity_play,
               (select sum(shared_points) from user_frnd_share where shared_by_id = user.id) as point_share,
               (select sum(shared_points) from user_frnd_share where shared_to_id = user.id) as point_receive
               FROM user
               LEFT JOIN user_points ON user.id=user_points.user_id
               LEFT JOIN newsletter ON user.email=newsletter.email
               where 1 AND ( user.id LIKE '% Ennodadhu﻿%' OR user.created LIKE '% Ennodadhu﻿%' OR user.name LIKE '% Ennodadhu﻿%' OR user.mobile LIKE '% Ennodadhu﻿%' OR user.email LIKE '% Ennodadhu﻿%' OR user_points.earn_points LIKE '% Ennodadhu﻿%' OR user.gender LIKE '% Ennodadhu﻿%' )
               ORDER BY user.created desc
               LIMIT 0,10

            
