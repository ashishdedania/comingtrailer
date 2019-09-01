<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-02-03 00:07:52 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: SELECT * from sub_category where LOWER(subcat_name) in ('hindi'
ERROR - 2019-02-03 00:13:33 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'sSELECT movie.id as id,sub_category.subcat_name,movie.movie_name,               ' at line 1 - Invalid query: sSELECT movie.id as id,sub_category.subcat_name,movie.movie_name,                     
                    (case when movie.movie_img is not null then CONCAT('https://www.comingtrailer.com/images/movies/',movie.movie_img) else null end) as thumb,
                    video_url.final_url FROM movie 
                    LEFT JOIN sub_category ON movie.subcat_id=sub_category.id
                    LEFT JOIN video_url ON video_url.id=movie.seo_url_id 
                    WHERE subcat_id like '%1%' AND    
                    movie.status='0'
                    group by movie.id
                    ORDER BY movie.rel_date DESC
                     LIMIT 0,20
ERROR - 2019-02-03 00:15:24 --> Query error: Unknown column 'Hindi' in 'field list' - Invalid query: SELECT movie.id as id,Hindi as subcat_name,movie.movie_name,                     
                    (case when movie.movie_img is not null then CONCAT('https://www.comingtrailer.com/images/movies/',movie.movie_img) else null end) as thumb,
                    video_url.final_url FROM movie                     
                    LEFT JOIN video_url ON video_url.id=movie.seo_url_id 
                    WHERE subcat_id like '%1%' AND    
                    movie.status='0'
                    group by movie.id
                    ORDER BY movie.rel_date DESC
                     LIMIT 0,20
ERROR - 2019-02-03 00:17:03 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'sSELECT movie.id as id,'Hindi' as subcat_name,movie.movie_name,                 ' at line 1 - Invalid query: sSELECT movie.id as id,'Hindi' as subcat_name,movie.movie_name,                     
                    (case when movie.movie_img is not null then CONCAT('https://www.comingtrailer.com/images/movies/',movie.movie_img) else null end) as thumb,
                    video_url.final_url FROM movie                     
                    LEFT JOIN video_url ON video_url.id=movie.seo_url_id 
                    WHERE subcat_id like '%1%' AND    
                    movie.status='0'
                    group by movie.id
                    ORDER BY movie.rel_date DESC
                     LIMIT 0,20
ERROR - 2019-02-03 01:32:51 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'WHERE LOWER(`_name`) LIKE '%ntr%' ESCAPE '!'
AND `status` =0' at line 2 - Invalid query: SELECT *
WHERE LOWER(`_name`) LIKE '%ntr%' ESCAPE '!'
AND `status` =0
ERROR - 2019-02-03 07:29:06 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('c8fc727f9723de0b955a20644cf0d8a8be60e916', '213.174.152.182', 1549159102, '__ci_last_regenerate|i:1549159101;')
ERROR - 2019-02-03 07:29:06 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('3af3dab8ea748f1026e1c54e4aa83d04') AS ci_session_lock
ERROR - 2019-02-03 07:29:51 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('dae4a134695326a174f4c66d2c4e27048b2c9aea', '66.249.79.167', 1549159147, '__ci_last_regenerate|i:1549159146;')
ERROR - 2019-02-03 07:29:51 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('87016acc3f31a025a9bcbdf52e500231e00b5369', '27.97.162.245', 1549159146, '__ci_last_regenerate|i:1549159146;')
ERROR - 2019-02-03 07:29:51 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('7962b0fddd64b217fe8e7ad44aec3fdee76966a8', '207.46.13.214', 1549159146, '__ci_last_regenerate|i:1549159146;')
ERROR - 2019-02-03 07:29:51 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('0eb34e448ec6ca037de5f1c95f0a945c') AS ci_session_lock
ERROR - 2019-02-03 07:29:51 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('8082fff1d8c4d7a92f790c231eee24cb') AS ci_session_lock
ERROR - 2019-02-03 07:29:51 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('096501887b7e014fe0f3a4c6eb478f92') AS ci_session_lock
ERROR - 2019-02-03 07:30:36 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('2757ac6f0dd3492a141a9f82b6e1b5e97694719b', '207.46.13.214', 1549159191, '__ci_last_regenerate|i:1549159191;')
ERROR - 2019-02-03 07:30:36 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('5298e6ca715932151cd0a73f1c1218e9b5af9bf6', '141.0.8.232', 1549159194, '__ci_last_regenerate|i:1549159191;')
ERROR - 2019-02-03 07:30:36 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('ce8a191c34a20fd8b96669b81b19af64efa44cb7', '207.46.13.214', 1549159191, '__ci_last_regenerate|i:1549159191;')
ERROR - 2019-02-03 07:30:36 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('c2ba12b94e4f9bd9aa3d7ef789088ee6') AS ci_session_lock
ERROR - 2019-02-03 07:30:36 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('507e366c956ade9affd1e1e68e84ed78') AS ci_session_lock
ERROR - 2019-02-03 07:30:36 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('932a4962764846eae8540045aa2acd0e') AS ci_session_lock
