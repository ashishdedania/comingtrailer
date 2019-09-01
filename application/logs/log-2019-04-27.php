<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-04-27 02:40:08 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `user_activity` = 'liked' AND `shared_with` = ''' at line 3 - Invalid query: SELECT *
FROM `user_activity`
WHERE `user_id` = '' AND `cat_id` = '' AND `common_id` =  AND `user_activity` = 'liked' AND `shared_with` = ''
ERROR - 2019-04-27 02:40:10 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
ERROR - 2019-04-27 12:27:52 --> Query error: Column 'user_id' cannot be null - Invalid query: INSERT INTO `user_activity` (`user_id`, `cat_id`, `common_id`, `user_activity`, `shared_with`, `earn_points`, `created`) VALUES (NULL, '3', '1625', 'liked', '', '0', '2019-04-27 12:27:52')
ERROR - 2019-04-27 23:59:42 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'ASCs limit 0,15' at line 8 - Invalid query: SELECT movie.id as id,'Hindi' as subcat_name,MONTH(movie.my_release) as month,YEAR(movie.my_release) as year,movie.movie_name, movie.my_release,                   
                        (case when movie.movie_img is not null then CONCAT('https://www.comingtrailer.com/images/movies/',movie.movie_img) else null end) as thumb,
                        video_url.final_url FROM movie                     
                        LEFT JOIN video_url ON video_url.id=movie.seo_url_id 
                        WHERE subcat_id like '%1%' AND movie.id != '123' and     
                        movie.status='0' and YEAR(movie.my_release)= YEAR(movie.my_release)
                        group by movie.id
                        ORDER BY year ASCs limit 0,15
