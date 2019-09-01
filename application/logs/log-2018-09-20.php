<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-09-20 00:16:06 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
ERROR - 2018-09-20 00:21:44 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
ERROR - 2018-09-20 00:47:24 --> Query error: Not unique table/alias: 'bank_account' - Invalid query: 

               SELECT user.id,user.created,user.name,user.mobile,user.email,user.gender,user_points.earn_points,user.img,user_points.earn_points,user_points.total_invite,user_points.total_social_likes,user_points.total_video_play,user_points.total_share,user_points.totla_frnds_share,user_points.total_likes,user_points.total_earn_rs,newsletter.id as subscriber FROM user
               LEFT JOIN user_points ON user.id=user_points.user_id
               LEFT JOIN newsletter ON user.email=newsletter.email
               LEFT JOIN bank_account ON bank_account.user_id=user.id
               LEFT JOIN bank_account ON bank_account.user_id=user.id
               ORDER BY user.created desc
               LIMIT 0,10

            
ERROR - 2018-09-20 00:47:31 --> Query error: Not unique table/alias: 'bank_account' - Invalid query: 

               SELECT user.id,user.created,user.name,user.mobile,user.email,user.gender,user_points.earn_points,user.img,user_points.earn_points,user_points.total_invite,user_points.total_social_likes,user_points.total_video_play,user_points.total_share,user_points.totla_frnds_share,user_points.total_likes,user_points.total_earn_rs,newsletter.id as subscriber FROM user
               LEFT JOIN user_points ON user.id=user_points.user_id
               LEFT JOIN newsletter ON user.email=newsletter.email
               LEFT JOIN bank_account ON bank_account.user_id=user.id
               LEFT JOIN bank_account ON bank_account.user_id=user.id
               ORDER BY user.created desc
               LIMIT 0,25

            
ERROR - 2018-09-20 00:47:38 --> Query error: Not unique table/alias: 'bank_account' - Invalid query: 

               SELECT user.id,user.created,user.name,user.mobile,user.email,user.gender,user_points.earn_points,user.img,user_points.earn_points,user_points.total_invite,user_points.total_social_likes,user_points.total_video_play,user_points.total_share,user_points.totla_frnds_share,user_points.total_likes,user_points.total_earn_rs,newsletter.id as subscriber FROM user
               LEFT JOIN user_points ON user.id=user_points.user_id
               LEFT JOIN newsletter ON user.email=newsletter.email
               LEFT JOIN bank_account ON bank_account.user_id=user.id
               LEFT JOIN bank_account ON bank_account.user_id=user.id
               ORDER BY user.created desc
               LIMIT 0,10

            
ERROR - 2018-09-20 00:48:18 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'asc
               LIMIT 0,10' at line 4 - Invalid query: 

               SELECT user.id,user.created,user.name,user.mobile,user.email,user.gender,user_points.earn_points,user.img,user_points.earn_points,user_points.total_invite,user_points.total_social_likes,user_points.total_video_play,user_points.total_share,user_points.totla_frnds_share,user_points.total_likes,user_points.total_earn_rs,newsletter.id as subscriber FROM user
               LEFT JOIN user_points ON user.id=user_points.user_id
               LEFT JOIN newsletter ON user.email=newsletter.email
               ORDER BY  asc
               LIMIT 0,10

            
ERROR - 2018-09-20 00:48:23 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'desc
               LIMIT 0,10' at line 4 - Invalid query: 

               SELECT user.id,user.created,user.name,user.mobile,user.email,user.gender,user_points.earn_points,user.img,user_points.earn_points,user_points.total_invite,user_points.total_social_likes,user_points.total_video_play,user_points.total_share,user_points.totla_frnds_share,user_points.total_likes,user_points.total_earn_rs,newsletter.id as subscriber FROM user
               LEFT JOIN user_points ON user.id=user_points.user_id
               LEFT JOIN newsletter ON user.email=newsletter.email
               ORDER BY  desc
               LIMIT 0,10

            
ERROR - 2018-09-20 13:19:43 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('2idpi1q4ooeudnqrq30hbn1cel3lek7o', '43.225.54.56', 1537429739, '__ci_last_regenerate|i:1537429739;')
ERROR - 2018-09-20 13:19:43 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('e917acf9fc5d777cd1817b391ed74e93') AS ci_session_lock
ERROR - 2018-09-20 13:20:29 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('86ka3sq0a8bi3fo59prdali7fnd4sb2e', '66.249.79.186', 1537429783, '__ci_last_regenerate|i:1537429737;')
ERROR - 2018-09-20 13:20:29 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('ecc6b19ab2a198969ac0e4867c97173b') AS ci_session_lock
ERROR - 2018-09-20 13:20:29 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('dqoiggj32j4trbdorbm890ic3eq3n9h5', '47.247.2.68', 1537429783, '__ci_last_regenerate|i:1537429783;')
ERROR - 2018-09-20 13:20:29 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('ca15f8e4f3a6629097430b3e8c96cfb2') AS ci_session_lock
ERROR - 2018-09-20 13:20:29 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `poster` SET `views` = views+1
WHERE `id` = '42'
ERROR - 2018-09-20 13:20:29 --> Query error: MySQL server has gone away - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1537429829
WHERE `id` = '1kvrcjqepc8mt493njf46tq03piuslsj'
ERROR - 2018-09-20 13:20:29 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('46f6fc3fd3dbf5434fb3112cab6535dc') AS ci_session_lock
ERROR - 2018-09-20 13:20:29 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `adsense` AS `a`
WHERE `width` = '300'
AND `height` = '600'
ERROR - 2018-09-20 13:20:29 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('4eqtjmks6gve3vuc30nlfv6rn69ad3i3', '43.225.54.56', 1537429829, '__ci_last_regenerate|i:1537429829;')
ERROR - 2018-09-20 13:20:29 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('4fe8948c2515b15996c387e34511ef2e') AS ci_session_lock
ERROR - 2018-09-20 13:21:14 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('l4hm5qth02gt9nvjtur3sneakemnvukb', '37.9.113.105', 1537429829, '__ci_last_regenerate|i:1537429783;')
ERROR - 2018-09-20 13:21:14 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('83e1130ce7e023b5763fdffe3d923ea0') AS ci_session_lock
ERROR - 2018-09-20 13:21:14 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('3lu7pjgrdcg0rr45t983d69rr4p48qn6', '46.229.168.148', 1537429831, '__ci_last_regenerate|i:1537429829;total_search_result|i:20;')
ERROR - 2018-09-20 13:21:14 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('4f08d8be8a36b7709eec10e7cb1bcfc7') AS ci_session_lock
ERROR - 2018-09-20 13:21:59 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('lj2dhc661tssgqf6vacds92ost2ocdb2', '43.225.54.56', 1537429874, '__ci_last_regenerate|i:1537429874;')
ERROR - 2018-09-20 13:21:59 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('7e30de3ab0020dca5982579600c45838') AS ci_session_lock
ERROR - 2018-09-20 13:21:59 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('4rsp3l2n83ff7saktgsqssq2dvjehlrd', '46.229.168.148', 1537429876, '__ci_last_regenerate|i:1537429874;total_search_result|i:20;')
ERROR - 2018-09-20 13:21:59 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('3e88ffc5078f22c1620c0baaf784f2fe') AS ci_session_lock
ERROR - 2018-09-20 13:21:59 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('dnkpc9pup36o1u5kfifehl6a726drs0m', '66.249.79.186', 1537429874, '__ci_last_regenerate|i:1537429874;')
ERROR - 2018-09-20 13:21:59 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('4a3ada5bbf189bf8b75f33423ca9cd0a') AS ci_session_lock
ERROR - 2018-09-20 13:21:59 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('og6vih747ind30nag6gi2cdmatv74fdr', '47.247.2.68', 1537429874, '__ci_last_regenerate|i:1537429874;')
ERROR - 2018-09-20 13:21:59 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('b43d541680e7cb1830af1fce66b8744a') AS ci_session_lock
ERROR - 2018-09-20 13:21:59 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `director`
WHERE `id` = '1601'
AND `status` =0
ERROR - 2018-09-20 13:21:59 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('mospkojvjv153sf0bnhjnvqf8h307rdl', '37.9.113.105', 1537429919, '__ci_last_regenerate|i:1537429919;')
ERROR - 2018-09-20 13:21:59 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('51293302061276b8c9976f3cd4458658') AS ci_session_lock
ERROR - 2018-09-20 13:21:59 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `adsense` AS `a`
WHERE `width` = '300'
AND `height` = '600'
ERROR - 2018-09-20 13:21:59 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('mrskijn340b86h2vghq4gvorfcvcnd9b', '43.225.54.56', 1537429919, '__ci_last_regenerate|i:1537429919;')
ERROR - 2018-09-20 13:21:59 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('1228e0a5824042f267def1adff98e537') AS ci_session_lock
ERROR - 2018-09-20 13:22:44 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('47qeedamp0sgbj1haacscd3qnuca7ghg', '207.46.13.226', 1537429920, '__ci_last_regenerate|i:1537429874;')
ERROR - 2018-09-20 13:22:44 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('e5ffca4714eb7db7361d4428f0878144') AS ci_session_lock
ERROR - 2018-09-20 13:22:44 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('anudbvad4bldftc1aubi8huo1odk1oi5', '47.247.2.68', 1537429919, '__ci_last_regenerate|i:1537429919;')
ERROR - 2018-09-20 13:22:44 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('e399afb5e361e5fc4a6555bebdf6d681') AS ci_session_lock
ERROR - 2018-09-20 13:22:44 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('is9fg8s13b1vfc0vurmm3c731hofscfo', '157.55.39.71', 1537429919, '__ci_last_regenerate|i:1537429919;')
ERROR - 2018-09-20 13:22:44 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('dc9a09530605508a1e7594ecbb7cdda3') AS ci_session_lock
ERROR - 2018-09-20 13:22:44 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `adsense` AS `a`
WHERE `width` = '300'
AND `height` = '600'
ERROR - 2018-09-20 13:22:44 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('tg8bebchgnvb05mmpohrc5u1gbqvo7vu', '43.225.54.56', 1537429964, '__ci_last_regenerate|i:1537429964;')
ERROR - 2018-09-20 13:22:44 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('cab208861e1061ffd5ed24eeb192f7cc') AS ci_session_lock
ERROR - 2018-09-20 13:22:44 --> Query error: MySQL server has gone away - Invalid query: SELECT *, `c`.`id` AS `subcat_id`, `a`.`id` AS `poster_id`, `a`.`created` as `creates`, `a`.`updated` as `updates`
FROM `poster` AS `a`
INNER JOIN `sub_category` AS `c` ON `a`.`subcat_id` = `c`.`id`
WHERE `a`.`subcat_id` = '1'
AND `a`.`id` = '1061'
ORDER BY `a`.`rel_date` DESC
ERROR - 2018-09-20 13:22:44 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('jc5rl36hofdf2tlpdd98dtkc5i454gho', '40.77.167.193', 1537429964, '__ci_last_regenerate|i:1537429964;')
ERROR - 2018-09-20 13:22:44 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('8dacf4d0ba0433b3318ef2e20989262d') AS ci_session_lock
