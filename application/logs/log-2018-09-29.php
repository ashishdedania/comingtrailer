<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-09-29 00:01:38 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'as winner_id LIKE '%fd%' ) ORDER BY weekly_winners.end_date desc
               ' at line 3 - Invalid query: SELECT user.id,user.created,user.name,user.mobile,user.email,user.gender,user.img,weekly_winners.start_date,weekly_winners.end_date,weekly_winners.user_id,weekly_winners.winning_prize,weekly_winners.id as winner_id FROM weekly_winners               
               INNER JOIN user ON user.id=weekly_winners.user_id 
               where 1 and  1  AND  ( user.id LIKE '%fd%' OR user.created LIKE '%fd%' OR user.name LIKE '%fd%' OR user.mobile LIKE '%fd%' OR user.email LIKE '%fd%' OR user.gender LIKE '%fd%' OR user.img LIKE '%fd%' OR weekly_winners.start_date LIKE '%fd%' OR weekly_winners.end_date LIKE '%fd%' OR weekly_winners.user_id LIKE '%fd%' OR weekly_winners.winning_prize LIKE '%fd%' OR weekly_winners.id as winner_id LIKE '%fd%' ) ORDER BY weekly_winners.end_date desc
               LIMIT 0,10
ERROR - 2018-09-29 00:06:28 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'SELECT count(*) FROM `user_activity` where user_activity.user_id = weekly_winner' at line 2 - Invalid query: SELECT user.id,user.created,user.name,user.mobile,user.email,user.gender,user.img,weekly_winners.start_date,weekly_winners.end_date,weekly_winners.user_id,weekly_winners.winning_prize,weekly_winners.id as winner_id FROM weekly_winners               
               INNER JOIN user ON user.id=weekly_winners.user_id where  1  ORDER BY weekly_winners.end_date,s(SELECT count(*) FROM `user_activity` where user_activity.user_id = weekly_winners.user_id and user_activity.user_activity = "play") desc
               LIMIT 0,10
ERROR - 2018-09-29 00:12:18 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'as winner_id LIKE '%a%' ) ORDER BY weekly_winners.end_date desc , (SELECT count(' at line 3 - Invalid query: SELECT user.id,user.created,user.name,user.mobile,user.email,user.gender,user.img,weekly_winners.start_date,weekly_winners.end_date,weekly_winners.user_id,weekly_winners.winning_prize,weekly_winners.id as winner_id FROM weekly_winners               
               INNER JOIN user ON user.id=weekly_winners.user_id 
               where 1 and  1  AND  ( user.id LIKE '%a%' OR user.created LIKE '%a%' OR user.name LIKE '%a%' OR user.mobile LIKE '%a%' OR user.email LIKE '%a%' OR user.gender LIKE '%a%' OR user.img LIKE '%a%' OR weekly_winners.start_date LIKE '%a%' OR weekly_winners.end_date LIKE '%a%' OR weekly_winners.user_id LIKE '%a%' OR weekly_winners.winning_prize LIKE '%a%' OR weekly_winners.id as winner_id LIKE '%a%' ) ORDER BY weekly_winners.end_date desc , (SELECT count(*) FROM `user_activity` where user_activity.user_id = weekly_winners.user_id and user_activity.user_activity = "play") desc
               LIMIT 0,10
ERROR - 2018-09-29 00:12:19 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'as winner_id LIKE '%ad%' ) ORDER BY weekly_winners.end_date desc , (SELECT count' at line 3 - Invalid query: SELECT user.id,user.created,user.name,user.mobile,user.email,user.gender,user.img,weekly_winners.start_date,weekly_winners.end_date,weekly_winners.user_id,weekly_winners.winning_prize,weekly_winners.id as winner_id FROM weekly_winners               
               INNER JOIN user ON user.id=weekly_winners.user_id 
               where 1 and  1  AND  ( user.id LIKE '%ad%' OR user.created LIKE '%ad%' OR user.name LIKE '%ad%' OR user.mobile LIKE '%ad%' OR user.email LIKE '%ad%' OR user.gender LIKE '%ad%' OR user.img LIKE '%ad%' OR weekly_winners.start_date LIKE '%ad%' OR weekly_winners.end_date LIKE '%ad%' OR weekly_winners.user_id LIKE '%ad%' OR weekly_winners.winning_prize LIKE '%ad%' OR weekly_winners.id as winner_id LIKE '%ad%' ) ORDER BY weekly_winners.end_date desc , (SELECT count(*) FROM `user_activity` where user_activity.user_id = weekly_winners.user_id and user_activity.user_activity = "play") desc
               LIMIT 0,10
ERROR - 2018-09-29 00:13:53 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'as winner_id LIKE '%a%' ) ORDER BY weekly_winners.end_date desc , (SELECT count(' at line 3 - Invalid query: SELECT user.id,user.created,user.name,user.mobile,user.email,user.gender,user.img,weekly_winners.start_date,weekly_winners.end_date,weekly_winners.user_id,weekly_winners.winning_prize,weekly_winners.id as winner_id FROM weekly_winners               
               INNER JOIN user ON user.id=weekly_winners.user_id 
               where 1 and  1  AND  ( user.id LIKE '%a%' OR user.created LIKE '%a%' OR user.name LIKE '%a%' OR user.mobile LIKE '%a%' OR user.email LIKE '%a%' OR user.gender LIKE '%a%' OR user.img LIKE '%a%' OR weekly_winners.start_date LIKE '%a%' OR weekly_winners.end_date LIKE '%a%' OR weekly_winners.user_id LIKE '%a%' OR weekly_winners.winning_prize LIKE '%a%' OR weekly_winners.id as winner_id LIKE '%a%' ) ORDER BY weekly_winners.end_date desc , (SELECT count(*) FROM `user_activity` where user_activity.user_id = weekly_winners.user_id and user_activity.user_activity = "play") desc
               LIMIT 0,10
ERROR - 2018-09-29 00:13:54 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'as winner_id LIKE '%aki%' ) ORDER BY weekly_winners.end_date desc , (SELECT coun' at line 3 - Invalid query: SELECT user.id,user.created,user.name,user.mobile,user.email,user.gender,user.img,weekly_winners.start_date,weekly_winners.end_date,weekly_winners.user_id,weekly_winners.winning_prize,weekly_winners.id as winner_id FROM weekly_winners               
               INNER JOIN user ON user.id=weekly_winners.user_id 
               where 1 and  1  AND  ( user.id LIKE '%aki%' OR user.created LIKE '%aki%' OR user.name LIKE '%aki%' OR user.mobile LIKE '%aki%' OR user.email LIKE '%aki%' OR user.gender LIKE '%aki%' OR user.img LIKE '%aki%' OR weekly_winners.start_date LIKE '%aki%' OR weekly_winners.end_date LIKE '%aki%' OR weekly_winners.user_id LIKE '%aki%' OR weekly_winners.winning_prize LIKE '%aki%' OR weekly_winners.id as winner_id LIKE '%aki%' ) ORDER BY weekly_winners.end_date desc , (SELECT count(*) FROM `user_activity` where user_activity.user_id = weekly_winners.user_id and user_activity.user_activity = "play") desc
               LIMIT 0,10
ERROR - 2018-09-29 00:13:55 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'as winner_id LIKE '%akis%' ) ORDER BY weekly_winners.end_date desc , (SELECT cou' at line 3 - Invalid query: SELECT user.id,user.created,user.name,user.mobile,user.email,user.gender,user.img,weekly_winners.start_date,weekly_winners.end_date,weekly_winners.user_id,weekly_winners.winning_prize,weekly_winners.id as winner_id FROM weekly_winners               
               INNER JOIN user ON user.id=weekly_winners.user_id 
               where 1 and  1  AND  ( user.id LIKE '%akis%' OR user.created LIKE '%akis%' OR user.name LIKE '%akis%' OR user.mobile LIKE '%akis%' OR user.email LIKE '%akis%' OR user.gender LIKE '%akis%' OR user.img LIKE '%akis%' OR weekly_winners.start_date LIKE '%akis%' OR weekly_winners.end_date LIKE '%akis%' OR weekly_winners.user_id LIKE '%akis%' OR weekly_winners.winning_prize LIKE '%akis%' OR weekly_winners.id as winner_id LIKE '%akis%' ) ORDER BY weekly_winners.end_date desc , (SELECT count(*) FROM `user_activity` where user_activity.user_id = weekly_winners.user_id and user_activity.user_activity = "play") desc
               LIMIT 0,10
ERROR - 2018-09-29 00:13:55 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'as winner_id LIKE '%ingare%' ) ORDER BY weekly_winners.end_date desc , (SELECT c' at line 3 - Invalid query: SELECT user.id,user.created,user.name,user.mobile,user.email,user.gender,user.img,weekly_winners.start_date,weekly_winners.end_date,weekly_winners.user_id,weekly_winners.winning_prize,weekly_winners.id as winner_id FROM weekly_winners               
               INNER JOIN user ON user.id=weekly_winners.user_id 
               where 1 and  1  AND  ( user.id LIKE '%ingare%' OR user.created LIKE '%ingare%' OR user.name LIKE '%ingare%' OR user.mobile LIKE '%ingare%' OR user.email LIKE '%ingare%' OR user.gender LIKE '%ingare%' OR user.img LIKE '%ingare%' OR weekly_winners.start_date LIKE '%ingare%' OR weekly_winners.end_date LIKE '%ingare%' OR weekly_winners.user_id LIKE '%ingare%' OR weekly_winners.winning_prize LIKE '%ingare%' OR weekly_winners.id as winner_id LIKE '%ingare%' ) ORDER BY weekly_winners.end_date desc , (SELECT count(*) FROM `user_activity` where user_activity.user_id = weekly_winners.user_id and user_activity.user_activity = "play") desc
               LIMIT 0,10
ERROR - 2018-09-29 00:14:16 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'as winner_id LIKE '%a%' ) ORDER BY weekly_winners.end_date desc , (SELECT count(' at line 3 - Invalid query: SELECT user.id,user.created,user.name,user.mobile,user.email,user.gender,user.img,weekly_winners.start_date,weekly_winners.end_date,weekly_winners.user_id,weekly_winners.winning_prize,weekly_winners.id as winner_id FROM weekly_winners               
               INNER JOIN user ON user.id=weekly_winners.user_id 
               where 1 and  1  AND  ( user.id LIKE '%a%' OR user.created LIKE '%a%' OR user.name LIKE '%a%' OR user.mobile LIKE '%a%' OR user.email LIKE '%a%' OR user.gender LIKE '%a%' OR user.img LIKE '%a%' OR weekly_winners.start_date LIKE '%a%' OR weekly_winners.end_date LIKE '%a%' OR weekly_winners.user_id LIKE '%a%' OR weekly_winners.winning_prize LIKE '%a%' OR weekly_winners.id as winner_id LIKE '%a%' ) ORDER BY weekly_winners.end_date desc , (SELECT count(*) FROM `user_activity` where user_activity.user_id = weekly_winners.user_id and user_activity.user_activity = "play") desc
               LIMIT 0,10
ERROR - 2018-09-29 00:14:16 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'as winner_id LIKE '%aki%' ) ORDER BY weekly_winners.end_date desc , (SELECT coun' at line 3 - Invalid query: SELECT user.id,user.created,user.name,user.mobile,user.email,user.gender,user.img,weekly_winners.start_date,weekly_winners.end_date,weekly_winners.user_id,weekly_winners.winning_prize,weekly_winners.id as winner_id FROM weekly_winners               
               INNER JOIN user ON user.id=weekly_winners.user_id 
               where 1 and  1  AND  ( user.id LIKE '%aki%' OR user.created LIKE '%aki%' OR user.name LIKE '%aki%' OR user.mobile LIKE '%aki%' OR user.email LIKE '%aki%' OR user.gender LIKE '%aki%' OR user.img LIKE '%aki%' OR weekly_winners.start_date LIKE '%aki%' OR weekly_winners.end_date LIKE '%aki%' OR weekly_winners.user_id LIKE '%aki%' OR weekly_winners.winning_prize LIKE '%aki%' OR weekly_winners.id as winner_id LIKE '%aki%' ) ORDER BY weekly_winners.end_date desc , (SELECT count(*) FROM `user_activity` where user_activity.user_id = weekly_winners.user_id and user_activity.user_activity = "play") desc
               LIMIT 0,10
ERROR - 2018-09-29 00:14:16 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'as winner_id LIKE '%akis%' ) ORDER BY weekly_winners.end_date desc , (SELECT cou' at line 3 - Invalid query: SELECT user.id,user.created,user.name,user.mobile,user.email,user.gender,user.img,weekly_winners.start_date,weekly_winners.end_date,weekly_winners.user_id,weekly_winners.winning_prize,weekly_winners.id as winner_id FROM weekly_winners               
               INNER JOIN user ON user.id=weekly_winners.user_id 
               where 1 and  1  AND  ( user.id LIKE '%akis%' OR user.created LIKE '%akis%' OR user.name LIKE '%akis%' OR user.mobile LIKE '%akis%' OR user.email LIKE '%akis%' OR user.gender LIKE '%akis%' OR user.img LIKE '%akis%' OR weekly_winners.start_date LIKE '%akis%' OR weekly_winners.end_date LIKE '%akis%' OR weekly_winners.user_id LIKE '%akis%' OR weekly_winners.winning_prize LIKE '%akis%' OR weekly_winners.id as winner_id LIKE '%akis%' ) ORDER BY weekly_winners.end_date desc , (SELECT count(*) FROM `user_activity` where user_activity.user_id = weekly_winners.user_id and user_activity.user_activity = "play") desc
               LIMIT 0,10
ERROR - 2018-09-29 00:21:03 --> Query error: Unknown column '9836user_activity.created' in 'where clause' - Invalid query: SELECT user_activity.created as created,(case when (cat_id = 1 OR cat_id = 2) then (select video.video_name from video where video.id = user_activity.common_id) when cat_id = 3 then (select poster.poster_name from poster where poster.id = user_activity.common_id) else "" end) as name,(case when cat_id = 1 then "Trailer" when cat_id = 2 then "Video" when cat_id = 3 then "Poster" else "" end) as category FROM `user_activity` where user_activity = "liked" and user_id = 9836user_activity.created BETWEEN 2018-09-28 and 2018-09-28 ORDER BY user_activity.created desc LIMIT 0,10
ERROR - 2018-09-29 00:32:11 --> Query error: Unknown column '19425user_activity.created' in 'where clause' - Invalid query: SELECT user_activity.created as created,(case when (cat_id = 1 OR cat_id = 2) then (select video.video_name from video where video.id = user_activity.common_id) when cat_id = 3 then (select poster.poster_name from poster where poster.id = user_activity.common_id) else "" end) as name,(case when cat_id = 1 then "Trailer" when cat_id = 2 then "Video" when cat_id = 3 then "Poster" else "" end) as category FROM `user_activity` where user_activity = "liked" and user_id = 19425user_activity.created BETWEEN 2018-09-24 and 2018-09-30 ORDER BY user_activity.created desc LIMIT 0,10
ERROR - 2018-09-29 06:27:29 --> Unable to connect to the database
ERROR - 2018-09-29 06:27:29 --> Unable to connect to the database
ERROR - 2018-09-29 16:54:45 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('6106f08215a95c4e6f59dcc6595a615d', 300) AS ci_session_lock
ERROR - 2018-09-29 17:43:58 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `video` SET `youtube_views` = '3120763'
WHERE `id` = '2404'
ERROR - 2018-09-29 17:43:58 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('misjou0mlrniqg8urtotvcbvk66il5n7', '43.225.54.56', 1538223238, '__ci_last_regenerate|i:1538223122;')
ERROR - 2018-09-29 17:43:58 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('14b7631a7c2f8b573164fdbf73841030') AS ci_session_lock
ERROR - 2018-09-29 17:43:58 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('3r7djdga8vophk3efr6j9p8o211tk858', '66.249.79.186', 1538223196, '__ci_last_regenerate|i:1538223196;')
ERROR - 2018-09-29 17:43:58 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('7f93f3929c9914ce278c17f3acf40bc0') AS ci_session_lock
ERROR - 2018-09-29 17:44:43 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('p3832dbbrhn0f0gm4k0l6ooekgmf9nnd', '216.244.66.198', 1538223239, '__ci_last_regenerate|i:1538223239;')
ERROR - 2018-09-29 17:44:43 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('2c0c04d5aeed61984342ce5161131ebb') AS ci_session_lock
ERROR - 2018-09-29 17:44:43 --> Query error: MySQL server has gone away - Invalid query: SELECT *, `b`.`id` AS `cat_id`, `c`.`id` AS `subcat_id`, `a`.`id` AS `video_id`, `a`.`created` as `creates`, `a`.`updated` as `updates`
FROM `video` AS `a`
INNER JOIN `category` AS `b` ON `a`.`cat_id` = `b`.`id`
INNER JOIN `sub_category` AS `c` ON `a`.`subcat_id` = `c`.`id`
WHERE `a`.`cat_id` = '2'
AND `a`.`subcat_id` = '5'
AND `a`.`id` = '1241'
ORDER BY `a`.`rel_date` DESC
ERROR - 2018-09-29 17:44:43 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('1a46562jnpjd0vn4kn1ou9l5ha72hfpu', '66.249.79.186', 1538223283, '__ci_last_regenerate|i:1538223283;')
ERROR - 2018-09-29 17:44:43 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('dc7a25eb0d8b7ae67209f1e6f3046228') AS ci_session_lock
ERROR - 2018-09-29 23:30:26 --> Unable to connect to the database
ERROR - 2018-09-29 23:30:26 --> Unable to connect to the database
ERROR - 2018-09-29 23:30:26 --> Unable to connect to the database
ERROR - 2018-09-29 23:30:27 --> Unable to connect to the database
ERROR - 2018-09-29 23:30:27 --> Unable to connect to the database
ERROR - 2018-09-29 23:30:27 --> Unable to connect to the database