<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-06-25 02:26:06 --> Severity: error --> Exception: syntax error, unexpected ';', expecting ',' or ')' /var/www/html/ctw/application/controllers/api/Home.php 329
ERROR - 2019-06-25 02:26:41 --> Severity: error --> Exception: syntax error, unexpected 'LIMIT' (T_STRING), expecting ',' or ')' /var/www/html/ctw/application/controllers/api/Home.php 330
ERROR - 2019-06-25 02:27:22 --> Query error: Expression #4 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'cominlvi_trailer.poster_img.poster_type' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT poster.id as id,sub_category.subcat_name,poster.poster_name as video_name,poster_img.poster_type, CONCAT(poster.likes,' Likes') as liked,CONCAT(poster.views,' Views') as play,video_url.final_url,
                            (select CONCAT('http://ctw.local/images/poster/',poster_img.poster_image) from poster_img where poster_img.poster_id=poster.id order by poster_img.poster_type asc,poster_img.display_order asc limit 1) as thumb
                        FROM poster 
                LEFT JOIN sub_category ON poster.subcat_id=sub_category.id
                LEFT JOIN video_url ON video_url.id=poster.seo_url_id 
                LEFT JOIN poster_img ON poster_img.poster_id=poster.id                 
                WHERE subcat_id='1'  AND    
                poster.is_deleted='0'                
                group by poster.id                
                ORDER BY poster.rel_date DESC 
               LIMIT 0,20
ERROR - 2019-06-25 02:59:42 --> Severity: error --> Exception: Call to undefined function dd() /var/www/html/ctw/application/controllers/api/Home.php 361
ERROR - 2019-06-25 03:22:46 --> Query error: Unknown column 'poster_img.poster_type' in 'field list' - Invalid query: SELECT poster.id as id,sub_category.subcat_name,poster.poster_name as video_name,poster_img.poster_type, CONCAT(poster.likes,' Likes') as liked,CONCAT(poster.views,' Views') as play,video_url.final_url,
                            (select CONCAT('http://ctw.local/images/poster/',poster_img.poster_image) from poster_img where poster_img.poster_id=poster.id order by poster_img.poster_type asc,poster_img.display_order asc limit 1) as thumb
                        FROM poster 
                LEFT JOIN sub_category ON poster.subcat_id=sub_category.id
                LEFT JOIN video_url ON video_url.id=poster.seo_url_id 
                                
                WHERE subcat_id='1' AND poster.is_deleted='0'                
                              
                ORDER BY poster.rel_date DESC 
                LIMIT 20,20
ERROR - 2019-06-25 03:44:11 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'LIMIT , LIMIT 20,20' at line 8 - Invalid query: 

               SELECT poster.id,poster.rel_date,poster.poster_name,movie.movie_name,poster.likes,poster.views,sub_category.subcat_name,poster_map_movie.movie_id,poster.subcat_id,poster.poster_desc,video_url.final_url,poster.is_deleted FROM poster
               LEFT JOIN sub_category ON sub_category.id=poster.subcat_id
               LEFT JOIN poster_map_movie ON poster_map_movie.poster_id=poster.id
               LEFT JOIN movie ON movie.id=poster_map_movie.movie_id
               LEFT JOIN video_url ON video_url.id=poster.seo_url_id
               where is_deleted=0
               ORDER BY  
               LIMIT , LIMIT 20,20

            
ERROR - 2019-06-25 03:45:19 --> Query error: Column 'subcat_id' in where clause is ambiguous - Invalid query: 

               SELECT poster.id,poster.rel_date,poster.poster_name,movie.movie_name,poster.likes,poster.views,sub_category.subcat_name,poster_map_movie.movie_id,poster.subcat_id,poster.poster_desc,video_url.final_url,poster.is_deleted FROM poster
               LEFT JOIN sub_category ON sub_category.id=poster.subcat_id
               LEFT JOIN poster_map_movie ON poster_map_movie.poster_id=poster.id
               LEFT JOIN movie ON movie.id=poster_map_movie.movie_id
               LEFT JOIN video_url ON video_url.id=poster.seo_url_id
               WHERE subcat_id='1' AND poster.is_deleted='0'
               ORDER BY poster.id DESC
               

             LIMIT 20,20
ERROR - 2019-06-25 04:37:25 --> Severity: error --> Exception: syntax error, unexpected '}' /var/www/html/ctw/application/controllers/api/Home.php 363
ERROR - 2019-06-25 04:43:34 --> Severity: error --> Exception: syntax error, unexpected ']' /var/www/html/ctw/application/controllers/api/Home.php 368
ERROR - 2019-06-25 04:52:17 --> Severity: error --> Exception: syntax error, unexpected ''thumb'' (T_CONSTANT_ENCAPSED_STRING), expecting ']' /var/www/html/ctw/application/controllers/api/Home.php 372
ERROR - 2019-06-25 05:15:46 --> 404 Page Not Found: api/Datail/poster
