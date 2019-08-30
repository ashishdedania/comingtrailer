<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-02-24 09:29:18 --> Query error: Unknown column 'mapped.video_thumb' in 'field list' - Invalid query: SELECT `map`.*, `mapped`.*, (case when mapped.video_thumb is not null then CONCAT('https://www.comingtrailer.com/images/movies/', mapped.movie_img) else null end) as thumb
FROM `movie_map_cast` AS `map`
INNER JOIN `movie` AS `mapped` ON `mapped`.`id` = `map`.`movie_id`
WHERE `map`.`personality_id` = '1'
GROUP BY `mapped`.`id`
ORDER BY `mapped`.`rel_date` DESC
ERROR - 2019-02-24 14:57:24 --> Query error: Cannot add or update a child row: a foreign key constraint fails (`cominlvi_trailer`.`movie_map_cast`, CONSTRAINT `movie_map_cast_ibfk_2` FOREIGN KEY (`cast_id`) REFERENCES `cast` (`id`) ON DELETE CASCADE ON UPDATE CASCADE) - Invalid query: INSERT INTO `movie_map_cast` (`movie_id`, `cast_id`) VALUES ('2492', 17700)
ERROR - 2019-02-24 20:29:29 --> Query error: Unknown column 'mapped.video_thumb' in 'field list' - Invalid query: SELECT `map`.*, `mapped`.*, (case when mapped.video_thumb is not null then CONCAT('https://www.comingtrailer.com/images/movies/', mapped.movie_img) else null end) as thumb
FROM `movie_map_cast` AS `map`
INNER JOIN `movie` AS `mapped` ON `mapped`.`id` = `map`.`movie_id`
WHERE `map`.`personality_id` = '1'
GROUP BY `mapped`.`id`
ORDER BY `mapped`.`rel_date` DESC
ERROR - 2019-02-24 20:35:32 --> Query error: Table 'cominlvi_trailer._map_relby' doesn't exist - Invalid query: SELECT `map`.*, `mapped`.*
FROM `_map_relby` AS `map`
INNER JOIN `AS` `mapped` ON `mapped`.`id` = `map`.`_id`
WHERE `map`.`rel_by_id` = '1'
GROUP BY `mapped`.`id`
ORDER BY `mapped`.`rel_date` DESC
ERROR - 2019-02-24 20:36:55 --> Query error: Table 'cominlvi_trailer._map_relby' doesn't exist - Invalid query: SELECT `map`.*, `mapped`.*
FROM `_map_relby` AS `map`
INNER JOIN `AS` `mapped` ON `mapped`.`id` = `map`.`_id`
WHERE `map`.`rel_by_id` = '1'
GROUP BY `mapped`.`id`
ORDER BY `mapped`.`rel_date` DESC
ERROR - 2019-02-24 20:39:40 --> Query error: Table 'cominlvi_trailer._map_relby' doesn't exist - Invalid query: SELECT `map`.*, `mapped`.*
FROM `_map_relby` AS `map`
INNER JOIN `AS` `mapped` ON `mapped`.`id` = `map`.`_id`
WHERE `map`.`rel_by_id` = '1'
GROUP BY `mapped`.`id`
ORDER BY `mapped`.`rel_date` DESC
ERROR - 2019-02-24 20:47:37 --> Query error: Table 'cominlvi_trailer._map_released_by' doesn't exist - Invalid query: SELECT `map`.*, `mapped`.*
FROM `_map_released_by` AS `map`
INNER JOIN `AS` `mapped` ON `mapped`.`id` = `map`.`_id`
WHERE `map`.`rel_by_id` = '1'
GROUP BY `mapped`.`id`
ORDER BY `mapped`.`rel_date` DESC
ERROR - 2019-02-24 20:48:44 --> Query error: Unknown column 'mapped.video_thumb' in 'field list' - Invalid query: SELECT `map`.*, `mapped`.*, (case when mapped.video_thumb is not null then CONCAT('https://www.comingtrailer.com/images/movies/', mapped.movie_img) else null end) as thumb
FROM `movie_map_cast` AS `map`
INNER JOIN `movie` AS `mapped` ON `mapped`.`id` = `map`.`movie_id`
WHERE `map`.`personality_id` = '1'
GROUP BY `mapped`.`id`
ORDER BY `mapped`.`rel_date` DESC
ERROR - 2019-02-24 20:51:10 --> Query error: Unknown column 'mapped.video_thumb' in 'field list' - Invalid query: SELECT `map`.*, `mapped`.*, (case when mapped.video_thumb is not null then CONCAT('https://www.comingtrailer.com/images/movies/', mapped.movie_img) else null end) as thumb
FROM `movie_map_cast` AS `map`
INNER JOIN `movie` AS `mapped` ON `mapped`.`id` = `map`.`movie_id`
WHERE `map`.`personality_id` = '1'
GROUP BY `mapped`.`id`
ORDER BY `mapped`.`rel_date` DESC
ERROR - 2019-02-24 20:53:37 --> Query error: Unknown column 'mapped.video_thumb' in 'field list' - Invalid query: SELECT `map`.*, `mapped`.*, (case when mapped.video_thumb is not null then CONCAT('https://www.comingtrailer.com/images/movies/', mapped.movie_img) else null end) as thumb
FROM `movie_map_cast` AS `map`
INNER JOIN `movie` AS `mapped` ON `mapped`.`id` = `map`.`movie_id`
WHERE `map`.`personality_id` = '1'
GROUP BY `mapped`.`id`
ORDER BY `mapped`.`rel_date` DESC
ERROR - 2019-02-24 20:55:14 --> Query error: Unknown column 'mapped.video_thumb' in 'field list' - Invalid query: SELECT `map`.*, `mapped`.*, (case when mapped.video_thumb is not null then CONCAT('https://www.comingtrailer.com/images/movies/', mapped.movie_img) else null end) as thumb
FROM `movie_map_cast` AS `map`
INNER JOIN `movie` AS `mapped` ON `mapped`.`id` = `map`.`movie_id`
WHERE `map`.`personality_id` = '1'
GROUP BY `mapped`.`id`
ORDER BY `mapped`.`rel_date` DESC
ERROR - 2019-02-24 20:55:27 --> Query error: Unknown column 'mapped.video_thumb' in 'field list' - Invalid query: SELECT `map`.*, `mapped`.*, (case when mapped.video_thumb is not null then CONCAT('https://www.comingtrailer.com/images/movies/', mapped.movie_img) else null end) as thumb
FROM `movie_map_cast` AS `map`
INNER JOIN `movie` AS `mapped` ON `mapped`.`id` = `map`.`movie_id`
WHERE `map`.`personality_id` = '1'
GROUP BY `mapped`.`id`
ORDER BY `mapped`.`rel_date` DESC
ERROR - 2019-02-24 20:57:24 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '(SELECT group_concat(personality_name) FROM `video_map_cast` inner join personal' at line 1 - Invalid query: SELECT `map`.*, mapped.*(SELECT group_concat(personality_name) FROM `video_map_cast` inner join personality on personality.id = personality_id where video_id = mapped.id and is_cast = 1) as cast
FROM `video_map_cast` AS `map`
INNER JOIN `video` AS `mapped` ON `mapped`.`id` = `map`.`video_id`
WHERE `map`.`personality_id` = '1'
AND `mapped`.`is_deleted` =0
AND `mapped`.`cat_id` = 2
GROUP BY `mapped`.`id`
ORDER BY `mapped`.`rel_date` DESC
ERROR - 2019-02-24 20:58:06 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'SELECT group_concat(personality_name) FROM `video_map_cast` inner join personali' at line 1 - Invalid query: SELECT `map`.*, mapped.*SELECT group_concat(personality_name) FROM `video_map_cast` inner join personality on personality.id = personality_id where video_id = mapped.id and is_cast = 1) as cast
FROM `video_map_cast` AS `map`
INNER JOIN `video` AS `mapped` ON `mapped`.`id` = `map`.`video_id`
WHERE `map`.`personality_id` = '1'
AND `mapped`.`is_deleted` =0
AND `mapped`.`cat_id` = 2
GROUP BY `mapped`.`id`
ORDER BY `mapped`.`rel_date` DESC
