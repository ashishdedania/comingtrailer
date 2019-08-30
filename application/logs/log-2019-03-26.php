<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-03-26 00:12:52 --> Query error: Subquery returns more than 1 row - Invalid query: SELECT poster.id as id,sub_category.subcat_name,poster.poster_name as video_name,CONCAT(poster.likes,' Likes') as liked,CONCAT(poster.views,' Views') as play,video_url.final_url,(select CONCAT('timthumb.php?src=https://www.comingtrailer.com/images/poster/',poster_img.poster_image,'&w=285&h=160') from poster_img where poster_img.poster_id=poster.id order by poster_img.poster_type asc,poster_img.display_order asc limit 1) as video_thumb,
                            (select CONCAT('https://www.comingtrailer.com/images/poster/',poster_img.poster_image) from poster_img where poster_img.poster_id=poster.id order by poster_img.poster_type asc,poster_img.display_order asc ) as thumb
                        FROM poster 
                LEFT JOIN sub_category ON poster.subcat_id=sub_category.id
                LEFT JOIN video_url ON video_url.id=poster.seo_url_id                 
                WHERE subcat_id= '1' AND poster.id= '1071' AND     
                poster.is_deleted='0'                
                group by poster.id                
                ORDER BY poster.rel_date DESC
                LIMIT 0,20
ERROR - 2019-03-26 00:22:37 --> Query error: Subquery returns more than 1 row - Invalid query: SELECT poster.id as id,sub_category.subcat_name,poster.poster_name as video_name,CONCAT(poster.likes,' Likes') as liked,CONCAT(poster.views,' Views') as play,video_url.final_url,(select CONCAT('timthumb.php?src=https://www.comingtrailer.com/images/poster/',poster_img.poster_image,'&w=285&h=160') from poster_img where poster_img.poster_id=poster.id) as video_thumb,
                            (select CONCAT('https://www.comingtrailer.com/images/poster/',poster_img.poster_image) from poster_img where poster_img.poster_id=poster.id) as thumb
                        FROM poster 
                LEFT JOIN sub_category ON poster.subcat_id=sub_category.id
                LEFT JOIN video_url ON video_url.id=poster.seo_url_id                 
                WHERE subcat_id= '1' AND poster.id= '1071' AND     
                poster.is_deleted='0'                
            
                ORDER BY poster.rel_date DESC
                LIMIT 0,20
ERROR - 2019-03-26 00:25:37 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'FROM poster 
                LEFT JOIN sub_category ON poster.subcat_id=sub_cate' at line 1 - Invalid query: SELECT poster.id as id,sub_category.subcat_name,poster.poster_name as video_name,CONCAT(poster.likes,' Likes') as liked,FROM poster 
                LEFT JOIN sub_category ON poster.subcat_id=sub_category.id
                LEFT JOIN video_url ON video_url.id=poster.seo_url_id                 
                WHERE subcat_id= '1' AND poster.id= '1071' AND     
                poster.is_deleted='0'                
            
                ORDER BY poster.rel_date DESC
                LIMIT 0,20
ERROR - 2019-03-26 00:26:05 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'FROM poster 
                LEFT JOIN sub_category ON poster.subcat_id=sub_cate' at line 1 - Invalid query: SELECT poster.id as id,sub_category.subcat_name,poster.poster_name as video_name,CONCAT(poster.likes,' Likes') as liked,FROM poster 
                LEFT JOIN sub_category ON poster.subcat_id=sub_category.id
                LEFT JOIN video_url ON video_url.id=poster.seo_url_id                 
                WHERE subcat_id= '1' AND poster.id= '1071' AND     
                poster.is_deleted='0'                
            
                ORDER BY poster.rel_date DESC
                LIMIT 0,20
ERROR - 2019-03-26 00:26:33 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'LEFT JOIN sub_category ON poster.subcat_id=sub_category.id
                LEFT ' at line 2 - Invalid query: SELECT poster.id as id,sub_category.subcat_name,poster.poster_name as video_name,CONCAT(poster.likes,' Likes') as liked 
                LEFT JOIN sub_category ON poster.subcat_id=sub_category.id
                LEFT JOIN video_url ON video_url.id=poster.seo_url_id                 
                WHERE subcat_id= '1' AND poster.id= '1071' AND     
                poster.is_deleted='0'                
            
                ORDER BY poster.rel_date DESC
                LIMIT 0,20
ERROR - 2019-03-26 00:56:33 --> Query error: Unknown column 'poster_img.poster_type' in 'where clause' - Invalid query: SELECT poster.id as id,sub_category.subcat_name,poster.poster_name as video_name,CONCAT(poster.likes,' Likes') as liked,CONCAT(poster.views,' Views') as play,video_url.final_url,(select CONCAT('timthumb.php?src=https://www.comingtrailer.com/images/poster/',poster_img.poster_image,'&w=285&h=160') from poster_img where poster_img.poster_id=poster.id order by poster_img.poster_type asc,poster_img.display_order asc limit 1) as video_thumb,
                            (select CONCAT('https://www.comingtrailer.com/images/poster/',poster_img.poster_image) from poster_img where poster_img.poster_id=poster.id order by poster_img.poster_type asc,poster_img.display_order asc limit 1) as thumb
                        FROM poster 
                LEFT JOIN sub_category ON poster.subcat_id=sub_category.id
                LEFT JOIN video_url ON video_url.id=poster.seo_url_id                 
                WHERE poster_img.poster_type= '1' AND poster.id= '1071' AND     
                poster.is_deleted='0'                
                group by poster.id                
                ORDER BY poster.rel_date DESC
                LIMIT 0,20
ERROR - 2019-03-26 00:58:06 --> Query error: Not unique table/alias: 'poster' - Invalid query: SELECT poster.id as id,sub_category.subcat_name,poster.poster_name as video_name,CONCAT(poster.likes,' Likes') as liked,CONCAT(poster.views,' Views') as play,video_url.final_url,(select CONCAT('timthumb.php?src=https://www.comingtrailer.com/images/poster/',poster_img.poster_image,'&w=285&h=160') from poster_img where poster_img.poster_id=poster.id order by poster_img.poster_type asc,poster_img.display_order asc limit 1) as video_thumb,
                            (select CONCAT('https://www.comingtrailer.com/images/poster/',poster_img.poster_image) from poster_img where poster_img.poster_id=poster.id order by poster_img.poster_type asc,poster_img.display_order asc limit 1) as thumb
                        FROM poster 
                LEFT JOIN sub_category ON poster.subcat_id=sub_category.id
                LEFT JOIN poster ON poster.id=poster_img.poster_id
                LEFT JOIN video_url ON video_url.id=poster.seo_url_id                 
                WHERE poster_img.poster_type= '1' AND poster.id= '1071' AND     
                poster.is_deleted='0'                
                group by poster.id                
                ORDER BY poster.rel_date DESC
                LIMIT 0,20
ERROR - 2019-03-26 01:18:34 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '&w=285&h=160) else null end) as video_thumb  from poster_img 
                LE' at line 1 - Invalid query: SELECT poster.id as id,sub_category.subcat_name,poster.poster_name as video_name,CONCAT(poster.likes,' Likes') as liked,CONCAT(poster.views,' Views') as play, (case when poster_img.poster_image is not null then concat('https://www.comingtrailer.com/','images/personality/',poster_img.poster_image) else null end) as thumb,video_url.final_url,(case when poster_img.poster_image is not null then concat('timthumb.php?src=https://www.comingtrailer.com/','images/personality/',poster_img.poster_image,&w=285&h=160) else null end) as video_thumb  from poster_img 
                LEFT JOIN poster ON poster.id=poster_img.poster_id
                LEFT JOIN sub_category ON sub_category.id = poster.subcat_id  
                LEFT JOIN video_url ON video_url.id=poster.seo_url_id                
                WHERE poster_img.poster_type= '3' AND poster.id= '1071' AND     
                poster.is_deleted='0'                
            
                ORDER BY poster.rel_date DESC
                LIMIT 0,20
ERROR - 2019-03-26 01:19:33 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '3' AND poster.id= '1071' AND     
                poster.is_deleted='0'         ' at line 1 - Invalid query: SELECT poster.id as id,sub_category.subcat_name,poster.poster_name as video_name,CONCAT(poster.likes,' Likes') as liked,CONCAT(poster.views,' Views') as play, (case when poster_img.poster_image is not null then concat('https://www.comingtrailer.com/','images/personality/',poster_img.poster_image) else null end) as thumb,video_url.final_url,(case when poster_img.poster_image is not null then concat('timthumb.php?src=https://www.comingtrailer.com/','images/personality/',poster_img.poster_image,'/&w=285&h=160) else null end) as video_thumb  from poster_img 
                LEFT JOIN poster ON poster.id=poster_img.poster_id
                LEFT JOIN sub_category ON sub_category.id = poster.subcat_id  
                LEFT JOIN video_url ON video_url.id=poster.seo_url_id                
                WHERE poster_img.poster_type= '3' AND poster.id= '1071' AND     
                poster.is_deleted='0'                
            
                ORDER BY poster.rel_date DESC
                LIMIT 0,20
ERROR - 2019-03-26 01:21:14 --> Query error: Unknown column 'w' in 'field list' - Invalid query: SELECT poster.id as id,sub_category.subcat_name,poster.poster_name as video_name,CONCAT(poster.likes,' Likes') as liked,CONCAT(poster.views,' Views') as play, (case when poster_img.poster_image is not null then concat('https://www.comingtrailer.com/','images/personality/',poster_img.poster_image) else null end) as thumb,video_url.final_url,(case when poster_img.poster_image is not null then concat('timthumb.php?src=https://www.comingtrailer.com/','images/personality/',poster_img.poster_image&w=285&h=160) else null end) as video_thumb  from poster_img 
                LEFT JOIN poster ON poster.id=poster_img.poster_id
                LEFT JOIN sub_category ON sub_category.id = poster.subcat_id  
                LEFT JOIN video_url ON video_url.id=poster.seo_url_id                
                WHERE poster_img.poster_type= '3' AND poster.id= '1071' AND     
                poster.is_deleted='0'                
            
                ORDER BY poster.rel_date DESC
                LIMIT 0,20
ERROR - 2019-03-26 10:58:03 --> Query error: Column 'user_id' cannot be null - Invalid query: INSERT INTO `user_activity` (`user_id`, `cat_id`, `common_id`, `user_activity`, `shared_with`, `earn_points`, `created`) VALUES (NULL, '1', '12154', 'liked', '', '0', '2019-03-26 10:58:03')
ERROR - 2019-03-26 10:58:24 --> Query error: Column 'user_id' cannot be null - Invalid query: INSERT INTO `user_activity` (`user_id`, `cat_id`, `common_id`, `user_activity`, `shared_with`, `earn_points`, `created`) VALUES (NULL, '1', '12154', 'liked', '', '0', '2019-03-26 10:58:24')
ERROR - 2019-03-26 10:58:25 --> Query error: Column 'user_id' cannot be null - Invalid query: INSERT INTO `user_activity` (`user_id`, `cat_id`, `common_id`, `user_activity`, `shared_with`, `earn_points`, `created`) VALUES (NULL, '1', '12154', 'liked', '', '0', '2019-03-26 10:58:25')
ERROR - 2019-03-26 10:58:36 --> Query error: Column 'user_id' cannot be null - Invalid query: INSERT INTO `user_activity` (`user_id`, `cat_id`, `common_id`, `user_activity`, `shared_with`, `earn_points`, `created`) VALUES (NULL, '1', '12154', 'liked', '', '0', '2019-03-26 10:58:36')
ERROR - 2019-03-26 13:58:00 --> Unable to connect to the database
ERROR - 2019-03-26 13:58:08 --> Unable to connect to the database
ERROR - 2019-03-26 13:58:16 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('deceb6b510850e8304315b70049d5439', 300) AS ci_session_lock
ERROR - 2019-03-26 13:58:16 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('deceb6b510850e8304315b70049d5439', 300) AS ci_session_lock
ERROR - 2019-03-26 13:58:16 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('deceb6b510850e8304315b70049d5439', 300) AS ci_session_lock
ERROR - 2019-03-26 13:58:41 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('deceb6b510850e8304315b70049d5439', 300) AS ci_session_lock
ERROR - 2019-03-26 13:58:41 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('deceb6b510850e8304315b70049d5439', 300) AS ci_session_lock
ERROR - 2019-03-26 13:58:46 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('deceb6b510850e8304315b70049d5439', 300) AS ci_session_lock
ERROR - 2019-03-26 21:26:00 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 's Vempa%'' at line 1 - Invalid query: select id,personality_name,personality_img from personality WHERE trim(personality_name) LIKE '%V Rama Krishna's Vempa%'
ERROR - 2019-03-26 21:48:37 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `user_activity` = 'liked' AND `shared_with` = ''' at line 3 - Invalid query: SELECT *
FROM `user_activity`
WHERE `user_id` = '' AND `cat_id` = '' AND `common_id` =  AND `user_activity` = 'liked' AND `shared_with` = ''
ERROR - 2019-03-26 21:49:10 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
ERROR - 2019-03-26 22:13:54 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
