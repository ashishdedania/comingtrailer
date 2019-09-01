<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-12-28 01:22:33 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: select movie.movie_name as name,movie.id from poster_map_movie LEFT JOIN movie ON movie.id=poster_map_movie.movie_id where poster_id=
ERROR - 2018-12-28 01:24:31 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: select movie.movie_name as name,movie.id from poster_map_movie LEFT JOIN movie ON movie.id=poster_map_movie.movie_id where poster_id=
ERROR - 2018-12-28 01:53:18 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'asc
               LIMIT 0,10' at line 4 - Invalid query: 

               SELECT director.id,director.created,director.director_name,director.director_img,video_url.final_url,director.status,(SELECT count(distinct movie_id) FROM `movie_map_director` where movie_map_director.director_id = director.id) as movie, (SELECT count(distinct video_id) FROM video INNER JOIN `video_map_director` on video_map_director.video_id = video.id where video_map_director.director_id = director.id and video.cat_id = 2) as video,(SELECT count(distinct video_id) FROM video INNER JOIN `video_map_director` on video_map_director.video_id = video.id where video_map_director.director_id = director.id and video.cat_id = 1) as trailer,(SELECT count(distinct poster_id) FROM `poster_map_director` where poster_map_director.director_id = director.id) as poster FROM director
               LEFT JOIN video_url ON video_url.id=director.seo_url_id
               where director.status=0
               ORDER BY  asc
               LIMIT 0,10

            
ERROR - 2018-12-28 01:53:20 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'asc
               LIMIT 0,10' at line 4 - Invalid query: 

               SELECT director.id,director.created,director.director_name,director.director_img,video_url.final_url,director.status,(SELECT count(distinct movie_id) FROM `movie_map_director` where movie_map_director.director_id = director.id) as movie, (SELECT count(distinct video_id) FROM video INNER JOIN `video_map_director` on video_map_director.video_id = video.id where video_map_director.director_id = director.id and video.cat_id = 2) as video,(SELECT count(distinct video_id) FROM video INNER JOIN `video_map_director` on video_map_director.video_id = video.id where video_map_director.director_id = director.id and video.cat_id = 1) as trailer,(SELECT count(distinct poster_id) FROM `poster_map_director` where poster_map_director.director_id = director.id) as poster FROM director
               LEFT JOIN video_url ON video_url.id=director.seo_url_id
               where director.status=0 AND ( director.id LIKE '%Martial%' OR director.created LIKE '%Martial%' OR director.director_name LIKE '%Martial%' OR director.director_img LIKE '%Martial%' OR video_url.final_url LIKE '%Martial%' OR director.status LIKE '%Martial%' )
               ORDER BY  asc
               LIMIT 0,10

            
ERROR - 2018-12-28 17:51:00 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1545999614, `data` = '__ci_last_regenerate|i:1545999572;total_search_result|i:2598;'
WHERE `id` = 'da103880a54cdf23761a2e44fa46ef074dc308a0'
ERROR - 2018-12-28 17:51:00 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT `data`
FROM `ci_sessions`
WHERE `id` = '8051efe4f10066c787a32bd4bb5a27619426b32b'
ERROR - 2018-12-28 17:51:01 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('70511ec7d3adccc6186a326758765470') AS ci_session_lock
ERROR - 2018-12-28 17:51:01 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('27a007946726086b5d5420054c830eb1') AS ci_session_lock
ERROR - 2018-12-28 17:51:45 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1545999660
WHERE `id` = '94beb0f4f88431fae47c09a13bb91dbcdf3f377d'
ERROR - 2018-12-28 17:51:45 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('a5502c66246e0e57e71fb232100dcf0a') AS ci_session_lock
ERROR - 2018-12-28 17:51:45 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('728da88701b0dc4cdb0e8a377975c7e186216e30', '207.46.13.21', 1545999661, '__ci_last_regenerate|i:1545999660;')
ERROR - 2018-12-28 17:51:45 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('4bb56f1d5cea24ec7721ba90eea78265') AS ci_session_lock
ERROR - 2018-12-28 17:51:45 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('8558435d60a3d8f387710941a62e72b7e6853b55', '157.50.104.150', 1545999660, '__ci_last_regenerate|i:1545999660;')
ERROR - 2018-12-28 17:51:45 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('de6efe8abf01d6715f25dc0f90a2415a') AS ci_session_lock
ERROR - 2018-12-28 17:51:45 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('24d71a4df318ef1effa9fec04358ebc16ac3e2a3', '137.97.112.200', 1545999660, '__ci_last_regenerate|i:1545999660;')
ERROR - 2018-12-28 17:51:45 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('21bd60e48c6f2fc5598c2ac77dc324f2') AS ci_session_lock
ERROR - 2018-12-28 17:51:45 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('9d25c96a0b05946ec5ae7a01f468737f2012ff77', '157.37.222.105', 1545999660, '__ci_last_regenerate|i:1545999660;')
ERROR - 2018-12-28 17:51:45 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('2741fd09fe2e259fdb0d0ebe2871ba7b') AS ci_session_lock
ERROR - 2018-12-28 17:51:45 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('dcac1cea323a84d0442acd2111b9ff6e7808ef88', '66.249.79.172', 1545999661, '__ci_last_regenerate|i:1545999660;')
ERROR - 2018-12-28 17:51:45 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('3ff9dfce029fd5421b7d084952664aaa') AS ci_session_lock
ERROR - 2018-12-28 17:51:45 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('fd65b28d5c4f76de11abef415b6ef2b577ee3022', '31.215.65.230', 1545999660, '__ci_last_regenerate|i:1545999660;')
ERROR - 2018-12-28 17:51:45 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('444011f19a08ba4529f99d5878a82567') AS ci_session_lock
ERROR - 2018-12-28 17:51:45 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('fd9d4bc45c1033af864f83e8495abaa52832dcf4', '66.249.79.172', 1545999663, '__ci_last_regenerate|i:1545999660;')
ERROR - 2018-12-28 17:51:45 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('6d58d76f69c0d58567e64f026cf6fd3f') AS ci_session_lock
ERROR - 2018-12-28 17:51:45 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('ae00dc7d0dd64165d3fb35ff6af7a104c3c2cfab', '117.209.169.83', 1545999661, '__ci_last_regenerate|i:1545999660;')
ERROR - 2018-12-28 17:51:45 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('3e640de0fb5e4fafbef6d6e15773fe26') AS ci_session_lock
ERROR - 2018-12-28 17:52:30 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('3fecc1859a65e6723e8d5f50bf19feb0b2897f05', '117.209.169.83', 1545999706, '__ci_last_regenerate|i:1545999705;')
ERROR - 2018-12-28 17:52:30 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('b5018eb518e514584b0fd73fed0efafbea5e5e5b', '49.15.214.62', 1545999705, '__ci_last_regenerate|i:1545999705;')
ERROR - 2018-12-28 17:52:30 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('3873575767aca04c61b0ec29080122bda4665431', '157.50.104.150', 1545999705, '__ci_last_regenerate|i:1545999705;')
ERROR - 2018-12-28 17:52:30 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('432ce99f3aa3ece6d0a582c270f0132409b02d30', '216.244.66.198', 1545999707, '__ci_last_regenerate|i:1545999705;')
ERROR - 2018-12-28 17:52:30 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('76a5b9c4f15cc70f45c0ddd6eb1f23fa') AS ci_session_lock
ERROR - 2018-12-28 17:52:30 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('4aa8042fe3d064509d45ddd568d4cdff8926692c', '51.36.160.137', 1545999705, '__ci_last_regenerate|i:1545999705;')
ERROR - 2018-12-28 17:52:30 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('12f94bb1c38feca370955857ed3afb46') AS ci_session_lock
ERROR - 2018-12-28 17:52:30 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('7d53fd83177ae9c6e1d171b18673a3d8') AS ci_session_lock
ERROR - 2018-12-28 17:52:30 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('48df522561b947f7fbc126c1224b390e') AS ci_session_lock
ERROR - 2018-12-28 17:52:30 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('130824968121c1f372b8848c39152119') AS ci_session_lock
ERROR - 2018-12-28 17:52:30 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('8eb390ce0bc56400abce17e89ea69fbcbe27fc4b', '37.9.113.105', 1545999706, '__ci_last_regenerate|i:1545999705;')
ERROR - 2018-12-28 17:52:30 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT `data`
FROM `ci_sessions`
WHERE `id` = '0c9907aeadd2cdae38c3011f4c7577f220fd4ef7'
ERROR - 2018-12-28 17:52:30 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('664bfc000279564a63f79cf9c28c7a7a') AS ci_session_lock
ERROR - 2018-12-28 17:52:30 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('815e2c7233a00378793e0eb996db9085') AS ci_session_lock
ERROR - 2018-12-28 17:52:30 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('784db21e10ec403f6272025896d2efaf63389d1d', '207.46.13.21', 1545999706, '__ci_last_regenerate|i:1545999705;')
ERROR - 2018-12-28 17:52:30 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('328d4c5274881b05d1f4ea80b7bf850c') AS ci_session_lock
ERROR - 2018-12-28 17:52:35 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT `data`
FROM `ci_sessions`
WHERE `id` = '82cffb400e13a42898b7dcbc8cd40e5710be3f70'
ERROR - 2018-12-28 17:52:35 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('424b71999ee3f49fae1c09ff5ca2ceb1') AS ci_session_lock
ERROR - 2018-12-28 17:52:45 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT `data`
FROM `ci_sessions`
WHERE `id` = '804fc60ed3b5c49a3a4d0469107101ab7fdc1f1d'
ERROR - 2018-12-28 17:52:45 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('7d032eadbfa240e7bba24d81388d368a') AS ci_session_lock
ERROR - 2018-12-28 17:53:10 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT `data`
FROM `ci_sessions`
WHERE `id` = '65adb06d91e0cbd21bd0365fd43993dd1098b620'
ERROR - 2018-12-28 17:53:10 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('e954a2e2cae4f2884e65c3bf0a74274d') AS ci_session_lock
ERROR - 2018-12-28 17:53:10 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT `data`
FROM `ci_sessions`
WHERE `id` = 'b7524928cbdbeba7857d31bb02d65f509557d7b0'
ERROR - 2018-12-28 17:53:10 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('ae7da56f2b2675f0f2d807017fe488ee') AS ci_session_lock
ERROR - 2018-12-28 17:53:10 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT `data`
FROM `ci_sessions`
WHERE `id` = '34cbfc204bc94082a38d1dfd47896b91442ab087'
ERROR - 2018-12-28 17:53:10 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('ee6626ae1884398bea284f663cd84f85') AS ci_session_lock
ERROR - 2018-12-28 17:53:15 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT `data`
FROM `ci_sessions`
WHERE `id` = '89229e7694a2972de227342ad2621ef1e6a41a8e'
ERROR - 2018-12-28 17:53:15 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT `data`
FROM `ci_sessions`
WHERE `id` = 'ffd92d768e1f2b6a62082fef4517b7615fb4b00c'
ERROR - 2018-12-28 17:53:15 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('36c2c675544f4c64e629f50494f060aa') AS ci_session_lock
ERROR - 2018-12-28 17:53:15 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('1293cfb173dff55fa40d535534d50cde') AS ci_session_lock
