<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-01-16 00:39:07 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 't%' OR video.rel_date LIKE '%She Don't%' OR video.video_name LIKE '%She Don't%' ' at line 6 - Invalid query: 

               SELECT video.id,video.rel_date,video.video_name,movie.movie_name,video.play,video.liked,video.youtube_views,sub_category.subcat_name,video_map_movie.movie_id,video.subcat_id,video.video_desc,video_url.final_url,video.is_deleted FROM video
               LEFT JOIN sub_category ON sub_category.id=video.subcat_id
               LEFT JOIN video_map_movie ON video_map_movie.video_id=video.id
               LEFT JOIN movie ON movie.id=video_map_movie.movie_id
               LEFT JOIN video_url ON video_url.id=video.seo_url_id
               where video.cat_id=2 AND  is_deleted=0 AND  ( video.id LIKE '%She Don't%' OR video.rel_date LIKE '%She Don't%' OR video.video_name LIKE '%She Don't%' OR movie.movie_name LIKE '%She Don't%' OR video.play LIKE '%She Don't%' OR video.liked LIKE '%She Don't%' OR video.youtube_views LIKE '%She Don't%' OR sub_category.subcat_name LIKE '%She Don't%' OR video_map_movie.movie_id LIKE '%She Don't%' OR video.subcat_id LIKE '%She Don't%' OR video.video_desc LIKE '%She Don't%' OR video_url.final_url LIKE '%She Don't%' OR video.is_deleted LIKE '%She Don't%' )
               ORDER BY video.rel_date desc
               LIMIT 0,10

            
ERROR - 2019-01-16 03:41:11 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `user_activity` = 'liked' AND `shared_with` = ''' at line 3 - Invalid query: SELECT *
FROM `user_activity`
WHERE `user_id` = '' AND `cat_id` = '' AND `common_id` =  AND `user_activity` = 'liked' AND `shared_with` = ''
ERROR - 2019-01-16 05:07:33 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
ERROR - 2019-01-16 10:34:48 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `video` SET `youtube_views` = '882531'
WHERE `id` = '793'
ERROR - 2019-01-16 10:34:48 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `video` SET `youtube_views` = '544368'
WHERE `id` = '1656'
ERROR - 2019-01-16 10:34:48 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `video` SET `youtube_views` = '67994'
WHERE `id` = '2509'
ERROR - 2019-01-16 10:34:48 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `video` SET `youtube_views` = '499871'
WHERE `id` = '3348'
ERROR - 2019-01-16 10:34:48 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1547615046
WHERE `id` = '343b83903a6e92d2dcd2174808852b6d6802e940'
ERROR - 2019-01-16 10:34:48 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `video` SET `youtube_views` = '17171857'
WHERE `id` = '4201'
ERROR - 2019-01-16 10:34:48 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT `data`
FROM `ci_sessions`
WHERE `id` = 'c2e1ec77b8d5492dfb6b6fad91cef061411e4598'
ERROR - 2019-01-16 10:34:48 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('abc2d45b4a13536ab40827932ec5f0ec') AS ci_session_lock
ERROR - 2019-01-16 10:34:48 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('ceaa5c4936fb16ceae697c457ab5be297e4e12b2', '43.225.54.56', 1547615088, '__ci_last_regenerate|i:1547615044;')
ERROR - 2019-01-16 10:34:48 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('9c321c1f22a96c961287cdd47e8b0016') AS ci_session_lock
ERROR - 2019-01-16 10:34:48 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('758ea2c57554f9003d5a583899860c946cc884f0', '43.225.54.56', 1547615088, '__ci_last_regenerate|i:1547614805;')
ERROR - 2019-01-16 10:34:48 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('5ea08652de0fc5ec4723d17e2ce6dc5b') AS ci_session_lock
ERROR - 2019-01-16 10:34:48 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('4ea468d6c5bad4242ffe6872d188f485a814e511', '43.225.54.56', 1547615088, '__ci_last_regenerate|i:1547614923;')
ERROR - 2019-01-16 10:34:48 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('6372d0a6a89c89198dadede4784ded2d') AS ci_session_lock
ERROR - 2019-01-16 10:34:48 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('ade83044c6061867400546f0cc174810') AS ci_session_lock
ERROR - 2019-01-16 10:34:48 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('a6caf9651e55a981cec6dea142bc6bf0ce83f34b', '43.225.54.56', 1547615088, '__ci_last_regenerate|i:1547614865;')
ERROR - 2019-01-16 10:34:48 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('916ee79cba178d06e0b7a5f56048183e') AS ci_session_lock
ERROR - 2019-01-16 10:34:48 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('4838ee635b23a2cb8125fe0a811af43b1d7ef898', '43.225.54.56', 1547615088, '__ci_last_regenerate|i:1547614984;')
ERROR - 2019-01-16 10:34:48 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('9849563c3d44af01c86cce98d31a4907') AS ci_session_lock
ERROR - 2019-01-16 10:35:33 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('8ccd19dcdd6202c34489519be801b2812dc6c41c', '117.230.163.5', 1547615088, '__ci_last_regenerate|i:1547615088;')
ERROR - 2019-01-16 10:35:33 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('86afc623fabc94f0753c6c0c9c26382c') AS ci_session_lock
ERROR - 2019-01-16 10:35:33 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('9cb0375d6bcc60002a181c504539ea9f1c87be03', '27.97.179.12', 1547615088, '__ci_last_regenerate|i:1547615088;')
ERROR - 2019-01-16 10:35:33 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('48b25b21302815b330f83a0b68acf208') AS ci_session_lock
ERROR - 2019-01-16 10:35:33 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('0b2069322ad0dee63bd828715dbe38c2a2c9c3a5', '117.230.4.85', 1547615088, '__ci_last_regenerate|i:1547615088;')
ERROR - 2019-01-16 10:35:33 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('e5ca4f707551abf0175cbf6376fd6eac') AS ci_session_lock
ERROR - 2019-01-16 10:35:33 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `cast`
WHERE `id` = '5768'
AND `status` =0
ERROR - 2019-01-16 10:35:33 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('496841db6bdbfd9fc78962d9a47eb4f6a1028aab', '216.244.66.198', 1547615133, '__ci_last_regenerate|i:1547615133;')
ERROR - 2019-01-16 10:35:33 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('1fbf9215a9b916ceea57aeb952d7d931') AS ci_session_lock
ERROR - 2019-01-16 10:36:18 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `video` SET `youtube_views` = '36613052'
WHERE `id` = '5211'
ERROR - 2019-01-16 10:36:18 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('4233d8ce980ec34463f2dddb22a329969c9c05e4', '43.225.54.56', 1547615178, '__ci_last_regenerate|i:1547615133;')
ERROR - 2019-01-16 10:36:18 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('7fce581ea150192d59b158785438a3e6') AS ci_session_lock
ERROR - 2019-01-16 10:36:18 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('0a6ccda569ba823b7aa9429b606130462d6fe447', '54.36.148.159', 1547615133, '__ci_last_regenerate|i:1547615133;')
ERROR - 2019-01-16 10:36:18 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('61dc7d1c68be34472a2d5e6e397db37d08e64e82', '66.249.79.167', 1547615134, '__ci_last_regenerate|i:1547615133;')
ERROR - 2019-01-16 10:36:18 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('6e50500399d97b16e86fb67bf21e1ab9') AS ci_session_lock
ERROR - 2019-01-16 10:36:18 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('a4b0382034671c176723a41ae57bf4db') AS ci_session_lock
ERROR - 2019-01-16 10:36:18 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('d256420a70b8ad5b384d7652274600ece80fc91c', '42.111.3.41', 1547615133, '__ci_last_regenerate|i:1547615133;')
ERROR - 2019-01-16 10:36:18 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('9193a2b6011e088ddf0954075cae39e8') AS ci_session_lock
ERROR - 2019-01-16 10:37:04 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('4dacc845e76b829a74759c1b9a64b0a4a8e5fc32', '216.244.66.198', 1547615179, '__ci_last_regenerate|i:1547615178;')
ERROR - 2019-01-16 10:37:04 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('3f834e6125f070ad58b7f73ceff46056dea2a013', '42.107.193.77', 1547615179, '__ci_last_regenerate|i:1547615178;')
ERROR - 2019-01-16 10:37:04 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('08c026004325020210b7235d6d75a163') AS ci_session_lock
ERROR - 2019-01-16 10:37:04 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('bb9174f77904bdb1e90d451e9c197f94') AS ci_session_lock
ERROR - 2019-01-16 10:37:04 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('c7386b55c099fa25c045cdca78429d48b7c752e0', '141.0.8.160', 1547615179, '__ci_last_regenerate|i:1547615178;')
ERROR - 2019-01-16 10:37:04 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('a8fe490eb16cf6e56d5fde1cb1f8fc64') AS ci_session_lock
ERROR - 2019-01-16 10:37:04 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('d4b4e731bceffe1ad527ac6f15daa7929961a37c', '49.15.92.225', 1547615179, '__ci_last_regenerate|i:1547615178;')
ERROR - 2019-01-16 10:37:04 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `video` SET `youtube_views` = '79587603'
WHERE `id` = '6217'
ERROR - 2019-01-16 10:37:04 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('62877d0f1cf652c11fcf5507cb9c9c1f5a9916fd', '141.0.8.160', 1547615179, '__ci_last_regenerate|i:1547615178;')
ERROR - 2019-01-16 10:37:04 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('494608c45854e057292d0507a6a7901a66b19a50', '141.0.8.160', 1547615179, '__ci_last_regenerate|i:1547615179;')
ERROR - 2019-01-16 10:37:04 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('01fc29dcccd2e197b4a0008a8eb3d0bd') AS ci_session_lock
ERROR - 2019-01-16 10:37:04 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('b51e067eda9ea7a7323f0fcbdf753344') AS ci_session_lock
ERROR - 2019-01-16 10:37:04 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('532222b593f769ac9e4c761b541960eed0ee0714', '5.193.5.120', 1547615179, '__ci_last_regenerate|i:1547615178;')
ERROR - 2019-01-16 10:37:04 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('9e406ce3f978021843a0853a70ea0949') AS ci_session_lock
ERROR - 2019-01-16 10:37:04 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('b5d8f4ed88ee03be113b3923c2691d323ba893f6', '157.46.122.168', 1547615179, '__ci_last_regenerate|i:1547615179;')
ERROR - 2019-01-16 10:37:04 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('8905b13c4e9f0c9a3569ed698418b7ff') AS ci_session_lock
ERROR - 2019-01-16 10:37:04 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('7d92aabd3af4433482c9059b05a19cc359114918', '43.225.54.56', 1547615224, '__ci_last_regenerate|i:1547615178;')
ERROR - 2019-01-16 10:37:04 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('11036aa340504d3ac28af1f95ac0fd77') AS ci_session_lock
ERROR - 2019-01-16 10:37:04 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('b35728f873fb44cf444a9a3241f04bc2') AS ci_session_lock
ERROR - 2019-01-16 10:37:49 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('1f6d6bbb54a64cfc123d8717f5b53a44421475f4', '27.97.186.218', 1547615224, '__ci_last_regenerate|i:1547615224;')
ERROR - 2019-01-16 10:37:49 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('998dd229ba2f63dc3972640187d3ccf95e7e6e0f', '49.15.89.150', 1547615224, '__ci_last_regenerate|i:1547615224;')
ERROR - 2019-01-16 10:37:49 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('d6303ae158a5ac4834d8676821fdb936') AS ci_session_lock
ERROR - 2019-01-16 10:37:49 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('15b326f9759fba41e289c19db9ee712e7460ed65', '66.249.79.170', 1547615225, '__ci_last_regenerate|i:1547615224;')
ERROR - 2019-01-16 10:37:49 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('76a607851c0127d09ed7da91d1396efa') AS ci_session_lock
ERROR - 2019-01-16 10:37:49 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('31ff3df179ba3ff5a923f51a5bb553b8') AS ci_session_lock
ERROR - 2019-01-16 10:37:49 --> Query error: MySQL server has gone away - Invalid query: select * from video where is_deleted = 0 order by id asc limit 7000,1000
ERROR - 2019-01-16 10:37:49 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('edfbf3a7e18341c4d93574e47944be2ff3cdc401', '43.225.54.56', 1547615269, '__ci_last_regenerate|i:1547615269;')
ERROR - 2019-01-16 10:37:49 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('26d609fc9e3712d614c3d6e1ae573a32') AS ci_session_lock
ERROR - 2019-01-16 10:37:54 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1547615228
WHERE `id` = '343b83903a6e92d2dcd2174808852b6d6802e940'
ERROR - 2019-01-16 10:37:54 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('ade83044c6061867400546f0cc174810') AS ci_session_lock
ERROR - 2019-01-16 10:38:34 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('27fbbb4ab02c39f7217e5d3fdeefba3d04cfe75c', '47.11.62.163', 1547615269, '__ci_last_regenerate|i:1547615269;')
ERROR - 2019-01-16 10:38:34 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('d53c1010c2cf51670734c3a43d5e52b2') AS ci_session_lock
ERROR - 2019-01-16 10:38:39 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('6342a6733787c068935fe2d76ddd4bb33156abae', '148.66.147.12', 1547615274, '__ci_last_regenerate|i:1547615274;')
ERROR - 2019-01-16 10:38:39 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('6f0e28d2a4e56eaaa334932989b28daa') AS ci_session_lock
ERROR - 2019-01-16 10:39:19 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('1b4bb4e51087bf0854d2813d7e48bed4db096dbf', '216.244.66.198', 1547615314, '__ci_last_regenerate|i:1547615314;')
ERROR - 2019-01-16 10:39:19 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('aa52487e1dcd0bddbea873432a9d6005') AS ci_session_lock
ERROR - 2019-01-16 10:39:24 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `video` SET `youtube_views` = '57408'
WHERE `id` = '8234'
ERROR - 2019-01-16 10:39:24 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('efdf97358937084430725c75eb26fb97fbc0d268', '43.225.54.56', 1547615364, '__ci_last_regenerate|i:1547615314;')
ERROR - 2019-01-16 10:39:24 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('37e915eb0c65e85efa3d40722f1a01d6') AS ci_session_lock
ERROR - 2019-01-16 10:40:04 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('87a1df07e02efb1f5ddc4462ae9ba30c7284900b', '66.249.79.167', 1547615360, '__ci_last_regenerate|i:1547615359;')
ERROR - 2019-01-16 10:40:04 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('172dd3d879021caf78be119e99fe3ba7') AS ci_session_lock
ERROR - 2019-01-16 10:40:04 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('cc61ce151f10233cd2d2adfca46bb07742c4fbd1', '51.223.153.71', 1547615359, '__ci_last_regenerate|i:1547615359;')
ERROR - 2019-01-16 10:40:04 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('25e5a1e5be9acb2ba78e584489c6c9aa') AS ci_session_lock
ERROR - 2019-01-16 10:40:04 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('0d574dda9f64133a95c43881adae92403bc9cb71', '27.62.67.54', 1547615359, '__ci_last_regenerate|i:1547615359;')
ERROR - 2019-01-16 10:40:04 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('e3700bd2b4ab8a78615ef02ce64ec1448df4297a', '106.198.110.28', 1547615359, '__ci_last_regenerate|i:1547615359;')
ERROR - 2019-01-16 10:40:04 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('2f46cc62f2ecb0be8778ca6446729acf') AS ci_session_lock
ERROR - 2019-01-16 10:40:04 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('ca8ca57900ce764e6ce726ca3fec4336') AS ci_session_lock
ERROR - 2019-01-16 10:40:04 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `video` SET `youtube_views` = '3336'
WHERE `id` = '9235'
ERROR - 2019-01-16 10:40:04 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('8992056a82c7ba09aab390cca4c0e6d9e8571d84', '43.225.54.56', 1547615404, '__ci_last_regenerate|i:1547615359;')
ERROR - 2019-01-16 10:40:04 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('130d3e5a6948cdc77550a3497aea2bd6') AS ci_session_lock
ERROR - 2019-01-16 10:40:04 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('8d75e7cc4bbfb4d9593ced66de72f26fe816eafb', '137.97.68.128', 1547615359, '__ci_last_regenerate|i:1547615359;')
ERROR - 2019-01-16 10:40:04 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('2b6da9e59252b734aa4f0c87af85f6b5') AS ci_session_lock
ERROR - 2019-01-16 11:36:31 --> Unable to connect to the database
ERROR - 2019-01-16 11:36:31 --> Unable to connect to the database
ERROR - 2019-01-16 11:36:31 --> Unable to connect to the database
ERROR - 2019-01-16 11:36:31 --> Unable to connect to the database
ERROR - 2019-01-16 11:36:32 --> Unable to connect to the database
ERROR - 2019-01-16 11:36:32 --> Unable to connect to the database
ERROR - 2019-01-16 11:36:32 --> Unable to connect to the database
ERROR - 2019-01-16 11:36:35 --> Unable to connect to the database
ERROR - 2019-01-16 11:36:35 --> Unable to connect to the database
ERROR - 2019-01-16 11:36:36 --> Unable to connect to the database
ERROR - 2019-01-16 11:36:37 --> Unable to connect to the database
