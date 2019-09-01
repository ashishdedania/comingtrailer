<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-09-28 01:46:20 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'ORDER BY   LIMIT ,' at line 1 - Invalid query: select user_activity.created as created,video.video_name as name,sub_category.subcat_name as category FROM `user_activity` INNER JOIN video on video.id = common_id left JOIN sub_category on sub_category.id = video.subcat_id where user_activity = "play" and user_activity.cat_id in (1,2) and user_id =  ORDER BY   LIMIT ,
ERROR - 2018-09-28 02:10:53 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 2 - Invalid query: SELECT user.id,user.created,user.name,user.mobile,user.email,user.gender,user.img,weekly_winners.start_date,weekly_winners.end_date,weekly_winners.user_id,weekly_winners.winning_prize,weekly_winners.id as winner_id FROM weekly_winners               
               INNER JOIN user ON user.id=weekly_winners.user_id where 
ERROR - 2018-09-28 02:11:06 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'desc
               LIMIT 0,10' at line 2 - Invalid query: SELECT user.id,user.created,user.name,user.mobile,user.email,user.gender,user.img,weekly_winners.start_date,weekly_winners.end_date,weekly_winners.user_id,weekly_winners.winning_prize,weekly_winners.id as winner_id FROM weekly_winners               
               INNER JOIN user ON user.id=weekly_winners.user_id where  weekly_winners.end_date = 'Week' ORDER BY  desc
               LIMIT 0,10
ERROR - 2018-09-28 02:12:56 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 2 - Invalid query: SELECT user.id,user.created,user.name,user.mobile,user.email,user.gender,user.img,weekly_winners.start_date,weekly_winners.end_date,weekly_winners.user_id,weekly_winners.winning_prize,weekly_winners.id as winner_id FROM weekly_winners               
               INNER JOIN user ON user.id=weekly_winners.user_id where 
ERROR - 2018-09-28 10:31:56 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `video` SET `youtube_views` = '1002176'
WHERE `id` = '241'
ERROR - 2018-09-28 10:31:56 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('34989a2b0d651481f82bf4de8bcdbd5e78aaf045', '43.225.54.56', 1538110916, '__ci_last_regenerate|i:1538110812;')
ERROR - 2018-09-28 10:31:56 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('3513c6a746865148e8213fe54d09302e') AS ci_session_lock
ERROR - 2018-09-28 10:32:06 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('6a46db0826d379065441b20364276ba9eb08dc21', '173.208.200.154', 1538110882, '__ci_last_regenerate|i:1538110882;')
ERROR - 2018-09-28 10:32:06 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('6495fc1fa042d248cb35741c0df4410f') AS ci_session_lock
ERROR - 2018-09-28 11:12:22 --> Unable to connect to the database
ERROR - 2018-09-28 11:12:22 --> Unable to connect to the database
ERROR - 2018-09-28 11:12:23 --> Unable to connect to the database
ERROR - 2018-09-28 11:12:23 --> Unable to connect to the database
ERROR - 2018-09-28 11:12:23 --> Unable to connect to the database
ERROR - 2018-09-28 11:12:23 --> Unable to connect to the database
ERROR - 2018-09-28 17:01:13 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('7531acac6c83156baf1c6264e7bdb7ce', 300) AS ci_session_lock
ERROR - 2018-09-28 17:01:23 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('7531acac6c83156baf1c6264e7bdb7ce', 300) AS ci_session_lock
ERROR - 2018-09-28 17:02:53 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('8ae1c6a8e8879b6f8f1c65a83a834c36', 300) AS ci_session_lock
ERROR - 2018-09-28 18:47:58 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('d1c09f7b4e0f67045cb7597aee4eabfc', 300) AS ci_session_lock
ERROR - 2018-09-28 18:48:18 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('d1c09f7b4e0f67045cb7597aee4eabfc', 300) AS ci_session_lock
ERROR - 2018-09-28 22:28:32 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 3 - Invalid query: SELECT user.id,user.created,user.name,user.mobile,user.email,user.gender,user.img,weekly_winners.start_date,weekly_winners.end_date,weekly_winners.user_id,weekly_winners.winning_prize,weekly_winners.id as winner_id FROM weekly_winners               
               INNER JOIN user ON user.id=weekly_winners.user_id where  1  ORDER BY weekly_winners.end_date desc
               LIMIT ,
ERROR - 2018-09-28 22:28:48 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 3 - Invalid query: SELECT user.id,user.created,user.name,user.mobile,user.email,user.gender,user.img,weekly_winners.start_date,weekly_winners.end_date,weekly_winners.user_id,weekly_winners.winning_prize,weekly_winners.id as winner_id FROM weekly_winners               
               INNER JOIN user ON user.id=weekly_winners.user_id where  1  ORDER BY weekly_winners.end_date desc
               LIMIT ,
ERROR - 2018-09-28 23:57:13 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'as winner_id LIKE '%f%' ) ORDER BY weekly_winners.end_date desc
               L' at line 3 - Invalid query: SELECT user.id,user.created,user.name,user.mobile,user.email,user.gender,user.img,weekly_winners.start_date,weekly_winners.end_date,weekly_winners.user_id,weekly_winners.winning_prize,weekly_winners.id as winner_id FROM weekly_winners               
               INNER JOIN user ON user.id=weekly_winners.user_id 
               where 1 and  1  AND  ( user.id LIKE '%f%' OR user.created LIKE '%f%' OR user.name LIKE '%f%' OR user.mobile LIKE '%f%' OR user.email LIKE '%f%' OR user.gender LIKE '%f%' OR user.img LIKE '%f%' OR weekly_winners.start_date LIKE '%f%' OR weekly_winners.end_date LIKE '%f%' OR weekly_winners.user_id LIKE '%f%' OR weekly_winners.winning_prize LIKE '%f%' OR weekly_winners.id as winner_id LIKE '%f%' ) ORDER BY weekly_winners.end_date desc
               LIMIT 0,10
ERROR - 2018-09-28 23:57:14 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'as winner_id LIKE '%fd%' ) ORDER BY weekly_winners.end_date desc
               ' at line 3 - Invalid query: SELECT user.id,user.created,user.name,user.mobile,user.email,user.gender,user.img,weekly_winners.start_date,weekly_winners.end_date,weekly_winners.user_id,weekly_winners.winning_prize,weekly_winners.id as winner_id FROM weekly_winners               
               INNER JOIN user ON user.id=weekly_winners.user_id 
               where 1 and  1  AND  ( user.id LIKE '%fd%' OR user.created LIKE '%fd%' OR user.name LIKE '%fd%' OR user.mobile LIKE '%fd%' OR user.email LIKE '%fd%' OR user.gender LIKE '%fd%' OR user.img LIKE '%fd%' OR weekly_winners.start_date LIKE '%fd%' OR weekly_winners.end_date LIKE '%fd%' OR weekly_winners.user_id LIKE '%fd%' OR weekly_winners.winning_prize LIKE '%fd%' OR weekly_winners.id as winner_id LIKE '%fd%' ) ORDER BY weekly_winners.end_date desc
               LIMIT 0,10
