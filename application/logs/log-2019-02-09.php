<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-02-09 06:50:37 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('bd6cf7be5893d4a492f2c02fa9d82fec40522e73', '66.249.79.167', 1549675194, '__ci_last_regenerate|i:1549675194;')
ERROR - 2019-02-09 06:50:37 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('cca86f87b71eed10dc9422aa9375bb23') AS ci_session_lock
ERROR - 2019-02-09 06:51:22 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('ac7f1499a57942a39f0683b12b6327b5b8472203', '157.55.39.75', 1549675238, '__ci_last_regenerate|i:1549675237;')
ERROR - 2019-02-09 06:51:22 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('b81b066ca7b4fd1bc622425dc646f84b52bfffda', '40.77.167.177', 1549675237, '__ci_last_regenerate|i:1549675237;')
ERROR - 2019-02-09 06:51:22 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('706a9f1e8ba457aca1ebbf3ecec61ad38a39abfa', '66.249.79.167', 1549675238, '__ci_last_regenerate|i:1549675237;')
ERROR - 2019-02-09 06:51:22 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('0a4308800dca2226de17183b1b6246bf') AS ci_session_lock
ERROR - 2019-02-09 06:51:22 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('6f5424f30ac983b33ec761b2da774a4b') AS ci_session_lock
ERROR - 2019-02-09 06:51:22 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('b3457325e5acfc7b13249fc6857d4dd2') AS ci_session_lock
ERROR - 2019-02-09 18:58:49 --> Query error: Cannot add or update a child row: a foreign key constraint fails (`cominlvi_trailer`.`movie_map_cast`, CONSTRAINT `movie_map_cast_ibfk_2` FOREIGN KEY (`cast_id`) REFERENCES `cast` (`id`) ON DELETE CASCADE ON UPDATE CASCADE) - Invalid query: INSERT INTO `movie_map_cast` (`movie_id`, `cast_id`) VALUES ('2322', 17037)
ERROR - 2019-02-09 22:59:49 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '(select count(video_map_movie.id) from video_map_movie where video_id = video.id' at line 10 - Invalid query: SELECT video.id as id,sub_category.subcat_name,video.video_name,
                    CONCAT('timthumb.php?src=https://www.comingtrailer.com/images/videothumb/',video.video_thumb,'&w=285&h=160') as video_thumb,                    
                    (case when video.video_thumb is not null then CONCAT('https://www.comingtrailer.com/images/videothumb/',video.video_thumb) else null end) as thumb,
                    CONCAT(video.liked,' Likes') as liked,CONCAT(video.play,' Playing') as play,video_url.final_url, 
                    (SELECT group_concat(personality_name) FROM `video_map_cast` inner join personality on personality.id = personality_id where video_id = video.id and is_cast = 1) as cast
                    FROM video 
                    LEFT JOIN sub_category ON video.subcat_id=sub_category.id
                    LEFT JOIN video_url ON video_url.id=video.seo_url_id 
                    WHERE cat_id='2' AND subcat_id='1' AND    
                    video.is_deleted='0' (select count(video_map_movie.id) from video_map_movie where video_id = video.id and movie_id is not null) > 0 
                    group by video.id
                    ORDER BY video.rel_date DESC 
                     LIMIT 0,20
ERROR - 2019-02-09 23:00:37 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '(select count(video_map_movie.id) from video_map_movie where video_id = video.id' at line 10 - Invalid query: SELECT video.id as id,sub_category.subcat_name,video.video_name,
                    CONCAT('timthumb.php?src=https://www.comingtrailer.com/images/videothumb/',video.video_thumb,'&w=285&h=160') as video_thumb,                    
                    (case when video.video_thumb is not null then CONCAT('https://www.comingtrailer.com/images/videothumb/',video.video_thumb) else null end) as thumb,
                    CONCAT(video.liked,' Likes') as liked,CONCAT(video.play,' Playing') as play,video_url.final_url, 
                    (SELECT group_concat(personality_name) FROM `video_map_cast` inner join personality on personality.id = personality_id where video_id = video.id and is_cast = 1) as cast
                    FROM video 
                    LEFT JOIN sub_category ON video.subcat_id=sub_category.id
                    LEFT JOIN video_url ON video_url.id=video.seo_url_id 
                    WHERE cat_id='2' AND subcat_id='1' AND    
                    video.is_deleted='0' (select count(video_map_movie.id) from video_map_movie where video_id = video.id and movie_id is not null) > 0 
                    group by video.id
                    ORDER BY video.rel_date DESC 
                     LIMIT 0,20
ERROR - 2019-02-09 23:02:07 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '(select count(video_map_movie.id) from video_map_movie where video_id = video.id' at line 10 - Invalid query: SELECT video.id as id,sub_category.subcat_name,video.video_name,
                    CONCAT('timthumb.php?src=https://www.comingtrailer.com/images/videothumb/',video.video_thumb,'&w=285&h=160') as video_thumb,                    
                    (case when video.video_thumb is not null then CONCAT('https://www.comingtrailer.com/images/videothumb/',video.video_thumb) else null end) as thumb,
                    CONCAT(video.liked,' Likes') as liked,CONCAT(video.play,' Playing') as play,video_url.final_url, 
                    (SELECT group_concat(personality_name) FROM `video_map_cast` inner join personality on personality.id = personality_id where video_id = video.id and is_cast = 1) as cast
                    FROM video 
                    LEFT JOIN sub_category ON video.subcat_id=sub_category.id
                    LEFT JOIN video_url ON video_url.id=video.seo_url_id 
                    WHERE cat_id='2' AND subcat_id='1' AND    
                    video.is_deleted='0' (select count(video_map_movie.id) from video_map_movie where video_id = video.id and movie_id is not null) > 0 
                    group by video.id
                    ORDER BY video.rel_date DESC 
                     LIMIT 0,20
ERROR - 2019-02-09 23:02:30 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '(select count(video_map_movie.id) from video_map_movie where video_id = video.id' at line 10 - Invalid query: SELECT video.id as id,sub_category.subcat_name,video.video_name,
                    CONCAT('timthumb.php?src=https://www.comingtrailer.com/images/videothumb/',video.video_thumb,'&w=285&h=160') as video_thumb,                    
                    (case when video.video_thumb is not null then CONCAT('https://www.comingtrailer.com/images/videothumb/',video.video_thumb) else null end) as thumb,
                    CONCAT(video.liked,' Likes') as liked,CONCAT(video.play,' Playing') as play,video_url.final_url, 
                    (SELECT group_concat(personality_name) FROM `video_map_cast` inner join personality on personality.id = personality_id where video_id = video.id and is_cast = 1) as cast
                    FROM video 
                    LEFT JOIN sub_category ON video.subcat_id=sub_category.id
                    LEFT JOIN video_url ON video_url.id=video.seo_url_id 
                    WHERE cat_id='2' AND subcat_id='1' AND    
                    video.is_deleted='0' (select count(video_map_movie.id) from video_map_movie where video_id = video.id and movie_id is not null) > 0 
                    group by video.id
                    ORDER BY video.rel_date DESC 
                     LIMIT 20,20
