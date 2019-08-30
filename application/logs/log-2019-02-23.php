<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-02-23 00:11:51 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'IF(MONTH(movie.rel_date) < MONTH(NOW()), MONTH(movie.rel_date) + 12, MONTH(movie' at line 8 - Invalid query: SELECT movie.id as id,'Hindi' as subcat_name,MONTH(movie.rel_date) as month,YEAR(movie.rel_date) as year,movie.movie_name,                    
                    (case when movie.movie_img is not null then CONCAT('https://www.comingtrailer.com/images/movies/',movie.movie_img) else null end) as thumb,
                    video_url.final_url FROM movie                     
                    LEFT JOIN video_url ON video_url.id=movie.seo_url_id 
                    WHERE subcat_id like '%1%' AND    
                    movie.status='0'
                    group by movie.id
                    ORDER IF(MONTH(movie.rel_date) < MONTH(NOW()), MONTH(movie.rel_date) + 12, MONTH(movie.rel_date)),
 DAY(movie.rel_date)  LIMIT 20,20
ERROR - 2019-02-23 00:31:30 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'IF(YEAR(movie.rel_date) < YEAR(NOW()), YEAR(movie.rel_date) + 12, YEAR(movie.rel' at line 8 - Invalid query: SELECT movie.id as id,'Hindi' as subcat_name,MONTH(movie.rel_date) as month,YEAR(movie.rel_date) as year,movie.movie_name,                    
                    (case when movie.movie_img is not null then CONCAT('https://www.comingtrailer.com/images/movies/',movie.movie_img) else null end) as thumb,
                    video_url.final_url FROM movie                     
                    LEFT JOIN video_url ON video_url.id=movie.seo_url_id 
                    WHERE subcat_id like '%1%' AND    
                    movie.status='0'
                    group by movie.id
                    ORDER BY IF(MONTH(movie.rel_date) < MONTH(NOW()), MONTH(movie.rel_date) + 12, MONTH(movie.rel_date)) IF(YEAR(movie.rel_date) < YEAR(NOW()), YEAR(movie.rel_date) + 12, YEAR(movie.rel_date)), DAY(movie.rel_date) 
                     LIMIT 20,20
ERROR - 2019-02-23 00:36:39 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '), MONTH(movie.rel_date) + 12, MONTH(movie.rel_date)), DAY(movie.rel_date) 
    ' at line 8 - Invalid query: SELECT movie.id as id,'Hindi' as subcat_name,MONTH(movie.rel_date) as month,YEAR(movie.rel_date) as year,movie.movie_name,                    
                    (case when movie.movie_img is not null then CONCAT('https://www.comingtrailer.com/images/movies/',movie.movie_img) else null end) as thumb,
                    video_url.final_url FROM movie                     
                    LEFT JOIN video_url ON video_url.id=movie.seo_url_id 
                    WHERE subcat_id like '%1%' AND    
                    movie.status='0'
                    group by movie.id
                    ORDER BY IF((MONTH(movie.rel_date) < MONTH(NOW())) and (YEAR(movie.rel_date) < YEAR(NOW()))), MONTH(movie.rel_date) + 12, MONTH(movie.rel_date)), DAY(movie.rel_date) 
                     LIMIT 20,20
ERROR - 2019-02-23 00:40:03 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'LIMIT 20,20' at line 10 - Invalid query: SELECT movie.id as id,'Hindi' as subcat_name,MONTH(movie.rel_date) as month,YEAR(movie.rel_date) as year,movie.movie_name,                    
                    (case when movie.movie_img is not null then CONCAT('https://www.comingtrailer.com/images/movies/',movie.movie_img) else null end) as thumb,
                    video_url.final_url FROM movie                     
                    LEFT JOIN video_url ON video_url.id=movie.seo_url_id 
                    WHERE subcat_id like '%1%' AND    
                    movie.status='0'
                    group by movie.id
                    ORDER BY IF(((MONTH(movie.rel_date) < MONTH(NOW())) and ((YEAR(movie.rel_date) < YEAR(NOW()))), MONTH(movie.rel_date) + 12, MONTH(movie.rel_date)),
 DAY(movie.rel_date) 
                     LIMIT 20,20
ERROR - 2019-02-23 00:40:28 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'LIMIT 20,20' at line 9 - Invalid query: SELECT movie.id as id,'Hindi' as subcat_name,MONTH(movie.rel_date) as month,YEAR(movie.rel_date) as year,movie.movie_name,                    
                    (case when movie.movie_img is not null then CONCAT('https://www.comingtrailer.com/images/movies/',movie.movie_img) else null end) as thumb,
                    video_url.final_url FROM movie                     
                    LEFT JOIN video_url ON video_url.id=movie.seo_url_id 
                    WHERE subcat_id like '%1%' AND    
                    movie.status='0'
                    group by movie.id
                    ORDER BY IF(((MONTH(movie.rel_date) < MONTH(NOW())) and ((YEAR(movie.rel_date) < YEAR(NOW()))), MONTH(movie.rel_date) + 12, MONTH(movie.rel_date)),
 DAY(movie.rel_date)   LIMIT 20,20
ERROR - 2019-02-23 00:41:31 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'LIMIT 20,20' at line 8 - Invalid query: SELECT movie.id as id,'Hindi' as subcat_name,MONTH(movie.rel_date) as month,YEAR(movie.rel_date) as year,movie.movie_name,                    
                    (case when movie.movie_img is not null then CONCAT('https://www.comingtrailer.com/images/movies/',movie.movie_img) else null end) as thumb,
                    video_url.final_url FROM movie                     
                    LEFT JOIN video_url ON video_url.id=movie.seo_url_id 
                    WHERE subcat_id like '%1%' AND    
                    movie.status='0'
                    group by movie.id
                    ORDER BY IF((MONTH(movie.rel_date) < MONTH(NOW()) and (YEAR(movie.rel_date) < YEAR(NOW())), MONTH(movie.rel_date) + 12, MONTH(movie.rel_date)), DAY(movie.rel_date)   LIMIT 20,20
ERROR - 2019-02-23 01:35:38 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '== 2019
                        group by movie.id
                        ORDER ' at line 6 - Invalid query: SELECT movie.id as id,'Hindi' as subcat_name,MONTH(movie.rel_date) as month,YEAR(movie.rel_date) as year,movie.movie_name,                    
                        (case when movie.movie_img is not null then CONCAT('https://www.comingtrailer.com/images/movies/',movie.movie_img) else null end) as thumb,
                        video_url.final_url FROM movie                     
                        LEFT JOIN video_url ON video_url.id=movie.seo_url_id 
                        WHERE subcat_id like '%1%' AND    
                        movie.status='0' and year == 2019
                        group by movie.id
                        ORDER BY year DESC,IF(MONTH(movie.rel_date) < MONTH(NOW()), MONTH(movie.rel_date) + 12, MONTH(movie.rel_date)),
     DAY(movie.rel_date) limit 0,10
ERROR - 2019-02-23 01:36:00 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '== '2019'
                        group by movie.id
                        ORDE' at line 6 - Invalid query: SELECT movie.id as id,'Hindi' as subcat_name,MONTH(movie.rel_date) as month,YEAR(movie.rel_date) as year,movie.movie_name,                    
                        (case when movie.movie_img is not null then CONCAT('https://www.comingtrailer.com/images/movies/',movie.movie_img) else null end) as thumb,
                        video_url.final_url FROM movie                     
                        LEFT JOIN video_url ON video_url.id=movie.seo_url_id 
                        WHERE subcat_id like '%1%' AND    
                        movie.status='0' and year == '2019'
                        group by movie.id
                        ORDER BY year DESC,IF(MONTH(movie.rel_date) < MONTH(NOW()), MONTH(movie.rel_date) + 12, MONTH(movie.rel_date)),
     DAY(movie.rel_date) limit 0,10
ERROR - 2019-02-23 01:36:14 --> Query error: Unknown column 'year' in 'where clause' - Invalid query: SELECT movie.id as id,'Hindi' as subcat_name,MONTH(movie.rel_date) as month,YEAR(movie.rel_date) as year,movie.movie_name,                    
                        (case when movie.movie_img is not null then CONCAT('https://www.comingtrailer.com/images/movies/',movie.movie_img) else null end) as thumb,
                        video_url.final_url FROM movie                     
                        LEFT JOIN video_url ON video_url.id=movie.seo_url_id 
                        WHERE subcat_id like '%1%' AND    
                        movie.status='0' and year = '2019'
                        group by movie.id
                        ORDER BY year DESC,IF(MONTH(movie.rel_date) < MONTH(NOW()), MONTH(movie.rel_date) + 12, MONTH(movie.rel_date)),
     DAY(movie.rel_date) limit 0,10
ERROR - 2019-02-23 01:38:54 --> Query error: Unknown column 'date' in 'where clause' - Invalid query: SELECT movie.id as id,'Hindi' as subcat_name,MONTH(movie.rel_date) as month,YEAR(movie.rel_date) as year,movie.movie_name,                    
                        (case when movie.movie_img is not null then CONCAT('https://www.comingtrailer.com/images/movies/',movie.movie_img) else null end) as thumb,
                        video_url.final_url FROM movie                     
                        LEFT JOIN video_url ON video_url.id=movie.seo_url_id 
                        WHERE subcat_id like '%1%' AND    
                        movie.status='0' and YEAR(movie.rel_date)= YEAR( date )
                        group by movie.id
                        ORDER BY year DESC,IF(MONTH(movie.rel_date) < MONTH(NOW()), MONTH(movie.rel_date) + 12, MONTH(movie.rel_date)),
     DAY(movie.rel_date) limit 0,10
ERROR - 2019-02-23 04:10:30 --> Unable to connect to the database
ERROR - 2019-02-23 04:10:30 --> Unable to connect to the database
ERROR - 2019-02-23 04:10:30 --> Unable to connect to the database
ERROR - 2019-02-23 11:22:26 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
ERROR - 2019-02-23 11:23:00 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
ERROR - 2019-02-23 23:35:04 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 5 - Invalid query: SELECT video.*,video_map_movie.video_id,video_map_movie.movie_id 
                    from video_map_movie 
                    join video on video.id = video_map_movie.video_id
                    join movie on movie.id = video_map_movie.movie_id
                    where video.cat_id = 1 and movie.id=
ERROR - 2019-02-23 23:37:17 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 5 - Invalid query: SELECT video.*,video_map_movie.video_id,video_map_movie.movie_id 
                    from video_map_movie 
                    join video on video.id = video_map_movie.video_id
                    join movie on movie.id = video_map_movie.movie_id
                    where video.cat_id = 1 and movie.id=
ERROR - 2019-02-23 23:40:07 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 5 - Invalid query: SELECT video.*,video_map_movie.video_id,video_map_movie.movie_id 
                    from video_map_movie 
                    join video on video.id = video_map_movie.video_id
                    join movie on movie.id = video_map_movie.movie_id
                    where video.cat_id = 1 and movie.id=
ERROR - 2019-02-23 23:41:59 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 5 - Invalid query: SELECT video.*,video_map_movie.video_id,video_map_movie.movie_id 
                    from video_map_movie 
                    join video on video.id = video_map_movie.video_id
                    join movie on movie.id = video_map_movie.movie_id
                    where video.cat_id = 2 and movie.id=
