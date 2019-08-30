<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-02-17 11:50:11 --> Query error: Lost connection to MySQL server during query - Invalid query: 

     SELECT personality.id,personality.created,personality.personality_img,personality.personality_name,personality.status,(SELECT sum(case when (select count(movie_id) from movie_map_director where movie_map_director.movie_id = movie.id and movie_map_director.personality_id = personality.id) > 0 then 1 else 0 end) FROM movie)  as movie,(SELECT sum(case when (select count(video_id) from video_map_director where video_map_director.video_id = video.id and video_map_director.personality_id = personality.id) > 0 then 1 else 0 end) FROM video where video.cat_id = 2) as video,(SELECT sum(case when (select count(poster_id) from poster_map_director where poster_map_director.poster_id = poster.id and poster_map_director.personality_id = personality.id) > 0 then 1 else 0 end) FROM poster) as poster,(SELECT sum(case when (select count(video_id) from video_map_director where video_map_director.video_id = video.id and video_map_director.personality_id = personality.id) > 0 then 1 else 0 end) FROM video where video.cat_id = 1) as trailer FROM personality     
     where personality.is_director = 1 and personality.status=0
     ORDER BY personality.created desc
     LIMIT 0,4000

     
ERROR - 2019-02-17 11:50:11 --> Query error: MySQL server has gone away - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1550384411
WHERE `id` = 'd6cbe680de1e8be619bf25e710f1c3eff82425bb'
ERROR - 2019-02-17 11:50:11 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('af792c1947e82c9a4e309ffe7fec5751') AS ci_session_lock
ERROR - 2019-02-17 13:46:06 --> Query error: Unknown column 'mapped.video_thumb' in 'field list' - Invalid query: SELECT `map`.*, `mapped`.*, (case when mapped.video_thumb is not null then CONCAT('https://www.comingtrailer.com/images/movies/', mapped.movie_img) else null end) as thumb
FROM `movie_map_cast` AS `map`
INNER JOIN `movie` AS `mapped` ON `mapped`.`id` = `map`.`movie_id`
WHERE `map`.`personality_id` = '1'
GROUP BY `mapped`.`id`
ORDER BY `mapped`.`rel_date` DESC
ERROR - 2019-02-17 13:46:52 --> Query error: Unknown column 'mapped.video_thumb' in 'field list' - Invalid query: SELECT `map`.*, `mapped`.*, (case when mapped.video_thumb is not null then CONCAT('https://www.comingtrailer.com/images/movies/', mapped.movie_img) else null end) as thumb
FROM `movie_map_cast` AS `map`
INNER JOIN `movie` AS `mapped` ON `mapped`.`id` = `map`.`movie_id`
WHERE `map`.`personality_id` = '1'
GROUP BY `mapped`.`id`
ORDER BY `mapped`.`rel_date` DESC
ERROR - 2019-02-17 13:47:13 --> Query error: Unknown column 'mapped.video_thumb' in 'field list' - Invalid query: SELECT `map`.*, `mapped`.*, (case when mapped.video_thumb is not null then CONCAT('https://www.comingtrailer.com/images/movies/', mapped.movie_img) else null end) as thumb
FROM `movie_map_cast` AS `map`
INNER JOIN `movie` AS `mapped` ON `mapped`.`id` = `map`.`movie_id`
WHERE `map`.`personality_id` = '1'
GROUP BY `mapped`.`id`
ORDER BY `mapped`.`rel_date` DESC
ERROR - 2019-02-17 13:48:49 --> Query error: Unknown column 'mapped.video_thumb' in 'field list' - Invalid query: SELECT `map`.*, `mapped`.*, (case when mapped.video_thumb is not null then CONCAT('https://www.comingtrailer.com/images/movies/', mapped.movie_img) else null end) as thumb
FROM `movie_map_cast` AS `map`
INNER JOIN `movie` AS `mapped` ON `mapped`.`id` = `map`.`movie_id`
WHERE `map`.`personality_id` = '1'
GROUP BY `mapped`.`id`
ORDER BY `mapped`.`rel_date` DESC
ERROR - 2019-02-17 13:52:45 --> Query error: Unknown column 'mapped.video_thumb' in 'field list' - Invalid query: SELECT `map`.*, `mapped`.*, (case when mapped.video_thumb is not null then CONCAT('https://www.comingtrailer.com/images/movies/', mapped.movie_img) else null end) as thumb
FROM `movie_map_cast` AS `map`
INNER JOIN `movie` AS `mapped` ON `mapped`.`id` = `map`.`movie_id`
WHERE `map`.`personality_id` = '1'
GROUP BY `mapped`.`id`
ORDER BY `mapped`.`rel_date` DESC
ERROR - 2019-02-17 13:54:27 --> Query error: Unknown column 'mapped.video_thumb' in 'field list' - Invalid query: SELECT `map`.*, `mapped`.*, (case when mapped.video_thumb is not null then CONCAT('https://www.comingtrailer.com/images/movies/', mapped.movie_img) else null end) as thumb
FROM `movie_map_cast` AS `map`
INNER JOIN `movie` AS `mapped` ON `mapped`.`id` = `map`.`movie_id`
WHERE `map`.`personality_id` = '1'
GROUP BY `mapped`.`id`
ORDER BY `mapped`.`rel_date` DESC
ERROR - 2019-02-17 13:54:40 --> Query error: Unknown column 'mapped.video_thumb' in 'field list' - Invalid query: SELECT `map`.*, `mapped`.*, (case when mapped.video_thumb is not null then CONCAT('https://www.comingtrailer.com/images/movies/', mapped.movie_img) else null end) as thumb
FROM `movie_map_cast` AS `map`
INNER JOIN `movie` AS `mapped` ON `mapped`.`id` = `map`.`movie_id`
WHERE `map`.`personality_id` = '2'
GROUP BY `mapped`.`id`
ORDER BY `mapped`.`rel_date` DESC
ERROR - 2019-02-17 13:57:58 --> Query error: Unknown column 'mapped.video_thumb' in 'field list' - Invalid query: SELECT `map`.*, `mapped`.*, (case when mapped.video_thumb is not null then CONCAT('https://www.comingtrailer.com/images/movies/', mapped.movie_img) else null end) as thumb
FROM `movie_map_cast` AS `map`
INNER JOIN `movie` AS `mapped` ON `mapped`.`id` = `map`.`movie_id`
WHERE `map`.`personality_id` = '2'
GROUP BY `mapped`.`id`
ORDER BY `mapped`.`rel_date` DESC
ERROR - 2019-02-17 14:01:14 --> Query error: Unknown column 'mapped.video_thumb' in 'field list' - Invalid query: SELECT `map`.*, `mapped`.*, (case when mapped.video_thumb is not null then CONCAT('https://www.comingtrailer.com/images/movies/', mapped.movie_img) else null end) as thumb
FROM `movie_map_cast` AS `map`
INNER JOIN `movie` AS `mapped` ON `mapped`.`id` = `map`.`movie_id`
WHERE `map`.`personality_id` = '2'
GROUP BY `mapped`.`id`
ORDER BY `mapped`.`rel_date` DESC
ERROR - 2019-02-17 14:01:22 --> Query error: Unknown column 'mapped.video_thumb' in 'field list' - Invalid query: SELECT `map`.*, `mapped`.*, (case when mapped.video_thumb is not null then CONCAT('https://www.comingtrailer.com/images/movies/', mapped.movie_img) else null end) as thumb
FROM `movie_map_cast` AS `map`
INNER JOIN `movie` AS `mapped` ON `mapped`.`id` = `map`.`movie_id`
WHERE `map`.`personality_id` = '2'
GROUP BY `mapped`.`id`
ORDER BY `mapped`.`rel_date` DESC
ERROR - 2019-02-17 14:01:31 --> Query error: Unknown column 'mapped.video_thumb' in 'field list' - Invalid query: SELECT `map`.*, `mapped`.*, (case when mapped.video_thumb is not null then CONCAT('https://www.comingtrailer.com/images/movies/', mapped.movie_img) else null end) as thumb
FROM `movie_map_cast` AS `map`
INNER JOIN `movie` AS `mapped` ON `mapped`.`id` = `map`.`movie_id`
WHERE `map`.`personality_id` = '2'
GROUP BY `mapped`.`id`
ORDER BY `mapped`.`rel_date` DESC
ERROR - 2019-02-17 15:25:37 --> Query error: Unknown column 'mapped.video_thumb' in 'field list' - Invalid query: SELECT `map`.*, `mapped`.*, (case when mapped.video_thumb is not null then CONCAT('https://www.comingtrailer.com/images/movies/', mapped.movie_img) else null end) as thumb
FROM `movie_map_cast` AS `map`
INNER JOIN `movie` AS `mapped` ON `mapped`.`id` = `map`.`movie_id`
WHERE `map`.`personality_id` = '1'
GROUP BY `mapped`.`id`
ORDER BY `mapped`.`rel_date` DESC
ERROR - 2019-02-17 16:36:42 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'limit 1' at line 1 - Invalid query: SELECT * from video where id =  limit 1 
ERROR - 2019-02-17 16:53:13 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '3,4,7,8' at line 1 - Invalid query: SELECT subcat_name as name from sub_category where id = 1,3,4,7,8
ERROR - 2019-02-17 16:54:31 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '3' at line 1 - Invalid query: SELECT subcat_name as name from sub_category where id = 1,3
ERROR - 2019-02-17 17:31:59 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `video` SET `youtube_views` = '454271'
WHERE `id` = '308'
ERROR - 2019-02-17 17:31:59 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('07538e5e0c23367027dcdf118791bfc3b3c68ffc', '43.225.54.56', 1550404919, '__ci_last_regenerate|i:1550404805;')
ERROR - 2019-02-17 17:31:59 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `video` SET `youtube_views` = '123527'
WHERE `id` = '1184'
ERROR - 2019-02-17 17:31:59 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('0cd6438c321abbab574fcfb5461f1d64') AS ci_session_lock
ERROR - 2019-02-17 17:31:59 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('7a780ca637d5fdd9561fb2f5bccf99b96017c504', '46.229.168.150', 1550404877, '__ci_last_regenerate|i:1550404877;')
ERROR - 2019-02-17 17:31:59 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('79ede1b01cb65116bdf915da0f44c56e') AS ci_session_lock
ERROR - 2019-02-17 17:31:59 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('b30174d1118ff7e23058548393c5735fe250b9e1', '43.225.54.56', 1550404919, '__ci_last_regenerate|i:1550404863;')
ERROR - 2019-02-17 17:31:59 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('3da4a91c02426e1868d3c595e011214e') AS ci_session_lock
ERROR - 2019-02-17 18:00:30 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'FROM `weekly_winners` inner join user on user.id = weekly_winners.user_id where ' at line 1 - Invalid query: SELECT name,img as image,winning_prize,start_date as week_start_date,end_date as week_end_date, FROM `weekly_winners` inner join user on user.id = weekly_winners.user_id where end_date = (select max(end_date) from weekly_winners)
ERROR - 2019-02-17 18:00:43 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'limit 1' at line 1 - Invalid query: SELECT * from user where id =  limit 1
ERROR - 2019-02-17 18:00:52 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'limit 1' at line 1 - Invalid query: SELECT * from user where id =  limit 1
ERROR - 2019-02-17 18:04:44 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `user_activity` = 'liked' AND `shared_with` = ''' at line 3 - Invalid query: SELECT *
FROM `user_activity`
WHERE `user_id` = '' AND `cat_id` = '' AND `common_id` =  AND `user_activity` = 'liked' AND `shared_with` = ''
ERROR - 2019-02-17 18:05:03 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
ERROR - 2019-02-17 18:05:40 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `user_activity` = 'liked' AND `shared_with` = ''' at line 3 - Invalid query: SELECT *
FROM `user_activity`
WHERE `user_id` = '' AND `cat_id` = '' AND `common_id` =  AND `user_activity` = 'liked' AND `shared_with` = ''
ERROR - 2019-02-17 18:05:44 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
ERROR - 2019-02-17 18:48:32 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
ERROR - 2019-02-17 18:55:17 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
