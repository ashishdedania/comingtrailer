<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-01-09 00:20:09 --> Query error: Illegal mix of collations for operation 'like' - Invalid query: 

               SELECT poster.id,poster.rel_date,poster.poster_name,movie.movie_name,poster.likes,poster.views,sub_category.subcat_name,poster_map_movie.movie_id,poster.subcat_id,poster.poster_desc,video_url.final_url,poster.is_deleted FROM poster
               LEFT JOIN sub_category ON sub_category.id=poster.subcat_id
               LEFT JOIN poster_map_movie ON poster_map_movie.poster_id=poster.id
               LEFT JOIN movie ON movie.id=poster_map_movie.movie_id
               LEFT JOIN video_url ON video_url.id=poster.seo_url_id
               where is_deleted=0 AND ( poster.id LIKE '%The Accidental Prime Minister ‏ @TAPMofficial 10h10 hours ago%' OR poster.rel_date LIKE '%The Accidental Prime Minister ‏ @TAPMofficial 10h10 hours ago%' OR poster.poster_name LIKE '%The Accidental Prime Minister ‏ @TAPMofficial 10h10 hours ago%' OR movie.movie_name LIKE '%The Accidental Prime Minister ‏ @TAPMofficial 10h10 hours ago%' OR poster.likes LIKE '%The Accidental Prime Minister ‏ @TAPMofficial 10h10 hours ago%' OR poster.views LIKE '%The Accidental Prime Minister ‏ @TAPMofficial 10h10 hours ago%' OR sub_category.subcat_name LIKE '%The Accidental Prime Minister ‏ @TAPMofficial 10h10 hours ago%' OR poster_map_movie.movie_id LIKE '%The Accidental Prime Minister ‏ @TAPMofficial 10h10 hours ago%' OR poster.subcat_id LIKE '%The Accidental Prime Minister ‏ @TAPMofficial 10h10 hours ago%' OR poster.poster_desc LIKE '%The Accidental Prime Minister ‏ @TAPMofficial 10h10 hours ago%' OR video_url.final_url LIKE '%The Accidental Prime Minister ‏ @TAPMofficial 10h10 hours ago%' OR poster.is_deleted LIKE '%The Accidental Prime Minister ‏ @TAPMofficial 10h10 hours ago%' )
               ORDER BY poster.rel_date desc
               LIMIT 0,10

            
ERROR - 2019-01-09 00:20:10 --> Query error: Illegal mix of collations for operation 'like' - Invalid query: 

               SELECT poster.id,poster.rel_date,poster.poster_name,movie.movie_name,poster.likes,poster.views,sub_category.subcat_name,poster_map_movie.movie_id,poster.subcat_id,poster.poster_desc,video_url.final_url,poster.is_deleted FROM poster
               LEFT JOIN sub_category ON sub_category.id=poster.subcat_id
               LEFT JOIN poster_map_movie ON poster_map_movie.poster_id=poster.id
               LEFT JOIN movie ON movie.id=poster_map_movie.movie_id
               LEFT JOIN video_url ON video_url.id=poster.seo_url_id
               where is_deleted=0 AND ( poster.id LIKE '%The Accidental Prime Minister ‏ @TAP%' OR poster.rel_date LIKE '%The Accidental Prime Minister ‏ @TAP%' OR poster.poster_name LIKE '%The Accidental Prime Minister ‏ @TAP%' OR movie.movie_name LIKE '%The Accidental Prime Minister ‏ @TAP%' OR poster.likes LIKE '%The Accidental Prime Minister ‏ @TAP%' OR poster.views LIKE '%The Accidental Prime Minister ‏ @TAP%' OR sub_category.subcat_name LIKE '%The Accidental Prime Minister ‏ @TAP%' OR poster_map_movie.movie_id LIKE '%The Accidental Prime Minister ‏ @TAP%' OR poster.subcat_id LIKE '%The Accidental Prime Minister ‏ @TAP%' OR poster.poster_desc LIKE '%The Accidental Prime Minister ‏ @TAP%' OR video_url.final_url LIKE '%The Accidental Prime Minister ‏ @TAP%' OR poster.is_deleted LIKE '%The Accidental Prime Minister ‏ @TAP%' )
               ORDER BY poster.rel_date desc
               LIMIT 0,10

            
ERROR - 2019-01-09 01:23:16 --> Severity: error --> Exception: Unable to locate the model you have specified: Front_Model /home/cominlvi/public_html/system/core/Loader.php 344
ERROR - 2019-01-09 02:18:09 --> Query error: Table 'cominlvi_trailer.spersonality' doesn't exist - Invalid query: SELECT `d`.*
FROM `spersonality` AS `d`
INNER JOIN `movie_map_cast` AS `e` ON `d`.`id` = `e`.`personality_id`
WHERE `e`.`movie_id` = '918'
ERROR - 2019-01-09 02:19:28 --> Query error: Table 'cominlvi_trailer.spersonality' doesn't exist - Invalid query: SELECT `d`.*
FROM `spersonality` AS `d`
INNER JOIN `movie_map_singer` AS `e` ON `d`.`id` = `e`.`personality_id`
WHERE `e`.`movie_id` = '918'
ERROR - 2019-01-09 08:13:43 --> Unable to connect to the database
ERROR - 2019-01-09 08:13:43 --> Unable to connect to the database
ERROR - 2019-01-09 08:13:43 --> Unable to connect to the database
ERROR - 2019-01-09 08:13:43 --> Unable to connect to the database
ERROR - 2019-01-09 08:13:43 --> Unable to connect to the database
ERROR - 2019-01-09 17:45:34 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1547036090
WHERE `id` = 'a2d96e4363e5539b400fdd10efc222df2847a7c1'
ERROR - 2019-01-09 17:45:34 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('4cf51a2789ecbc465e4fe4a1d66320c3') AS ci_session_lock
ERROR - 2019-01-09 17:46:19 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('b5bb4e605b6be3fa3025006a009488a5b086efb5', '137.97.188.218', 1547036134, '__ci_last_regenerate|i:1547036134;')
ERROR - 2019-01-09 17:46:19 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('99bb03f58713a51f5555c9381be77717e897545f', '223.228.159.68', 1547036134, '__ci_last_regenerate|i:1547036134;')
ERROR - 2019-01-09 17:46:19 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('9a9ecb64538875ec395f731029c81f0d') AS ci_session_lock
ERROR - 2019-01-09 17:46:19 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('face83d15c510fc37aa0a5462f508c42') AS ci_session_lock
ERROR - 2019-01-09 17:46:19 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('74b75e2618ba7813f99737de2f659d8ef03ec85f', '103.200.40.10', 1547036134, '__ci_last_regenerate|i:1547036134;')
ERROR - 2019-01-09 17:46:19 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('5ae1cc3e8c662422cb1ed918c4a6d5d1') AS ci_session_lock
ERROR - 2019-01-09 17:46:19 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `adsense` AS `a`
WHERE `width` = '300'
AND `height` = '600'
ERROR - 2019-01-09 17:46:19 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('0477c05829c46c0e78f3382b2179fad955b3a569', '42.107.221.12', 1547036179, '__ci_last_regenerate|i:1547036179;')
ERROR - 2019-01-09 17:46:19 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('9ac4d901137b170deb03051dd8e71063') AS ci_session_lock
ERROR - 2019-01-09 17:47:09 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('309118f0711ed2668fa6ce0667f6e72ec01c8eb2', '66.249.79.167', 1547036184, '__ci_last_regenerate|i:1547036179;')
ERROR - 2019-01-09 17:47:09 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('09e4f9f3dff405d70f80b2fc03dd9a04') AS ci_session_lock
ERROR - 2019-01-09 17:47:09 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('b0889e04a17acb1b13a74642eae6ac201b9c30b2', '157.51.173.167', 1547036184, '__ci_last_regenerate|i:1547036179;')
ERROR - 2019-01-09 17:47:09 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('3b8c44a59cc9009e3e8833f32ff014a5') AS ci_session_lock
