<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-06-24 11:36:34 --> Query error: Expression #4 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'cominlvi_trailer.poster_img.poster_type' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT poster.id as id,sub_category.subcat_name,poster.poster_name as video_name,poster_img.poster_type, CONCAT(poster.likes,' Likes') as liked,CONCAT(poster.views,' Views') as play,video_url.final_url,
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
ERROR - 2019-06-24 11:36:46 --> Query error: Expression #4 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'cominlvi_trailer.poster_img.poster_type' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT poster.id as id,sub_category.subcat_name,poster.poster_name as video_name,poster_img.poster_type, CONCAT(poster.likes,' Likes') as liked,CONCAT(poster.views,' Views') as play,video_url.final_url,
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
ERROR - 2019-06-24 11:37:50 --> Query error: Expression #4 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'cominlvi_trailer.poster_img.poster_type' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT poster.id as id,sub_category.subcat_name,poster.poster_name as video_name,poster_img.poster_type, CONCAT(poster.likes,' Likes') as liked,CONCAT(poster.views,' Views') as play,video_url.final_url,
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
ERROR - 2019-06-24 11:40:55 --> Query error: Expression #4 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'cominlvi_trailer.poster_img.poster_type' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT poster.id as id,sub_category.subcat_name,poster.poster_name as video_name,poster_img.poster_type, CONCAT(poster.likes,' Likes') as liked,CONCAT(poster.views,' Views') as play,video_url.final_url,
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
ERROR - 2019-06-24 11:45:18 --> Query error: Expression #4 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'cominlvi_trailer.poster_img.poster_type' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT poster.id as id,sub_category.subcat_name,poster.poster_name as video_name,poster_img.poster_type, CONCAT(poster.likes,' Likes') as liked,CONCAT(poster.views,' Views') as play,video_url.final_url,
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
ERROR - 2019-06-24 11:50:32 --> Severity: error --> Exception: syntax error, unexpected ';', expecting ',' or ')' /var/www/html/ctw/application/controllers/api/Home.php 329
ERROR - 2019-06-24 11:50:50 --> Severity: error --> Exception: syntax error, unexpected ';', expecting ',' or ')' /var/www/html/ctw/application/controllers/api/Home.php 329
ERROR - 2019-06-24 11:51:16 --> Severity: error --> Exception: syntax error, unexpected ';', expecting ',' or ')' /var/www/html/ctw/application/controllers/api/Home.php 329
ERROR - 2019-06-24 11:51:48 --> Severity: error --> Exception: syntax error, unexpected ';', expecting ',' or ')' /var/www/html/ctw/application/controllers/api/Home.php 329
ERROR - 2019-06-24 11:52:21 --> Severity: error --> Exception: syntax error, unexpected ';', expecting ',' or ')' /var/www/html/ctw/application/controllers/api/Home.php 329
