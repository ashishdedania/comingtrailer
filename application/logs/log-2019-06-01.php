<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-06-01 07:08:24 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '><script>prompt(1)</script>%" order by created DESC' at line 1 - Invalid query: SELECT * FROM video WHERE cat_id = 1 and video_name LIKE "%'></script>"><script>prompt(1)</script>%" order by created DESC
ERROR - 2019-06-01 09:09:18 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '><script>prompt(1)</script>%" order by created DESC' at line 1 - Invalid query: SELECT * FROM video WHERE cat_id = 1 and video_name LIKE "%'></script>"><script>prompt(1)</script>%" order by created DESC
ERROR - 2019-06-01 17:49:13 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('2d64b7fcc0ba7913a6d6075947c53b7ff144fb73', '27.61.62.148', 1559391508, '__ci_last_regenerate|i:1559391508;')
ERROR - 2019-06-01 17:49:13 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('830ff462a2c6016c7e88dbcc8fe4ee4a') AS ci_session_lock
ERROR - 2019-06-01 17:49:14 --> Query error: MySQL server has gone away - Invalid query: SELECT `d`.`id`, `d`.`video_name`
FROM `video` AS `d`
INNER JOIN `video_map_movie` AS `e` ON `d`.`id` = `e`.`video_id`
WHERE `e`.`video_id` !=0 and `e`.`movie_id` = '2231'
ORDER BY `d`.`rel_date` DESC
ERROR - 2019-06-01 17:49:14 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('b2b0fffab67f58c55b095ef84d7c47f6f8c9680b', '137.97.23.62', 1559391554, '__ci_last_regenerate|i:1559391553;')
ERROR - 2019-06-01 17:49:14 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('e7736896fdb58c0faa04cb3afcbfeac8') AS ci_session_lock
ERROR - 2019-06-01 17:49:23 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('503501fd8d9d7df09aeed1c5e4867634', 300) AS ci_session_lock
ERROR - 2019-06-01 17:49:53 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('503501fd8d9d7df09aeed1c5e4867634', 300) AS ci_session_lock
ERROR - 2019-06-01 17:49:58 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('1972938e79631bc13c9f3f883d9fef32caf30577', '66.249.79.167', 1559391553, '__ci_last_regenerate|i:1559391553;')
ERROR - 2019-06-01 17:49:58 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1559391553
WHERE `id` = '1df25fe483632474c9502561a9b663392a96b0cf'
ERROR - 2019-06-01 17:49:58 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('cb02ee29d610ecf85b0a120d591dc360eb278d82', '207.46.13.171', 1559391554, '__ci_last_regenerate|i:1559391553;')
ERROR - 2019-06-01 17:49:58 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('471b542ed4516684c5e297e2c01c9d77') AS ci_session_lock
ERROR - 2019-06-01 17:49:58 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('503501fd8d9d7df09aeed1c5e4867634') AS ci_session_lock
ERROR - 2019-06-01 17:49:58 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('956e125cfee449fd22a30b2644f86ecc') AS ci_session_lock
ERROR - 2019-06-01 17:50:43 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1559391598
WHERE `id` = '1df25fe483632474c9502561a9b663392a96b0cf'
ERROR - 2019-06-01 17:50:43 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('503501fd8d9d7df09aeed1c5e4867634') AS ci_session_lock
ERROR - 2019-06-01 17:50:43 --> Query error: MySQL server has gone away - Invalid query: SELECT `data`
FROM `ci_sessions`
WHERE `id` = '1df25fe483632474c9502561a9b663392a96b0cf'
ERROR - 2019-06-01 17:50:43 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('503501fd8d9d7df09aeed1c5e4867634') AS ci_session_lock
ERROR - 2019-06-01 17:51:28 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1559391646
WHERE `id` = '1df25fe483632474c9502561a9b663392a96b0cf'
ERROR - 2019-06-01 17:51:28 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('f5cacf237c67bccb595143e5b514f1de58ebe04d', '37.9.113.105', 1559391644, '__ci_last_regenerate|i:1559391643;')
ERROR - 2019-06-01 17:51:28 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('503501fd8d9d7df09aeed1c5e4867634') AS ci_session_lock
ERROR - 2019-06-01 17:51:28 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('1aed519b1ab02bf1bccfac724b8e5d6e') AS ci_session_lock
ERROR - 2019-06-01 17:51:28 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `movie`
WHERE `id` = '980'
ERROR - 2019-06-01 17:51:28 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('5228a45591581df276a11ebba42866450730ea70', '207.46.13.171', 1559391688, '__ci_last_regenerate|i:1559391688;')
ERROR - 2019-06-01 17:51:28 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('8fc5650ab15496b6bcbce6df9cf3bd84') AS ci_session_lock
ERROR - 2019-06-01 17:52:13 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('3fd4060b6539b6803b5982262cd1982193c460f9', '137.97.68.164', 1559391688, '__ci_last_regenerate|i:1559391688;')
ERROR - 2019-06-01 17:52:13 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('cb4681f30e63db0425d68f8a49d9445d') AS ci_session_lock
ERROR - 2019-06-01 17:52:13 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('30de63bc405d7194fbc3a706871159c33aabb8b5', '64.233.172.163', 1559391688, '__ci_last_regenerate|i:1559391688;')
ERROR - 2019-06-01 17:52:13 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('788872de8278c1533d56a253976ccc1aca0ba738', '112.79.77.99', 1559391689, '__ci_last_regenerate|i:1559391688;')
ERROR - 2019-06-01 17:52:13 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('41173abb711b085aa1b82b8d7a98578a') AS ci_session_lock
ERROR - 2019-06-01 17:52:13 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('228caabdc35b54efa81e058a52a17fe8') AS ci_session_lock
ERROR - 2019-06-01 17:52:13 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('2b0da2fde05833569ca22f17654ba3a865e11ec6', '207.46.13.95', 1559391688, '__ci_last_regenerate|i:1559391688;')
ERROR - 2019-06-01 17:52:13 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('88c8b87f61ad9762989fde033ceaf734') AS ci_session_lock
ERROR - 2019-06-01 17:52:13 --> Query error: MySQL server has gone away - Invalid query: SELECT *, `b`.`id` AS `cat_id`, `c`.`id` AS `subcat_id`, `a`.`id` AS `video_id`, `a`.`created` as `creates`, `a`.`updated` as `updates`
FROM `video` AS `a`
INNER JOIN `category` AS `b` ON `a`.`cat_id` = `b`.`id`
INNER JOIN `sub_category` AS `c` ON `a`.`subcat_id` = `c`.`id`
WHERE `a`.`cat_id` = '2'
AND `a`.`subcat_id` = '2'
AND `a`.`id` = '3046'
ORDER BY `a`.`rel_date` DESC
ERROR - 2019-06-01 17:52:13 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('deb369997dc77495d6d58a382382eecb56084f28', '37.9.113.105', 1559391733, '__ci_last_regenerate|i:1559391733;')
ERROR - 2019-06-01 17:52:13 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('3e7a1d89787615e92ffa9c616567dae8') AS ci_session_lock
ERROR - 2019-06-01 17:52:58 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT `data`
FROM `ci_sessions`
WHERE `id` = '48bf3f3c760f2a930f10f6e10b76c0b4bffca3ee'
ERROR - 2019-06-01 17:52:58 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('e8c6116494d1c023921b8b85ae080c2c') AS ci_session_lock
ERROR - 2019-06-01 17:52:58 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('5304252036e4669cef731a98ae957c959d2ce9a6', '207.46.13.95', 1559391734, '__ci_last_regenerate|i:1559391733;')
ERROR - 2019-06-01 17:52:58 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('185c3f620871d9c470ef0c82fbe912bd') AS ci_session_lock
ERROR - 2019-06-01 17:53:43 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('cb1f45497321c235888e92179a5851221fa9c5b5', '137.97.100.8', 1559391778, '__ci_last_regenerate|i:1559391778;')
ERROR - 2019-06-01 17:53:43 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('780b9d6b8915648475bec34bdf7609b5') AS ci_session_lock
ERROR - 2019-06-01 17:53:43 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('f2657f54a23bf43ee85d767c88990f6130f09b80', '117.230.172.191', 1559391778, '__ci_last_regenerate|i:1559391778;')
ERROR - 2019-06-01 17:53:43 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('8f1d18b756c96a37521f4f14085b90afad5c611e', '207.46.13.95', 1559391780, '__ci_last_regenerate|i:1559391778;')
ERROR - 2019-06-01 17:53:43 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('2d64b7fcc0ba7913a6d6075947c53b7ff144fb73', '106.200.63.148', 1559391777, '__ci_last_regenerate|i:1559391777;')
ERROR - 2019-06-01 17:53:43 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('085c1019900bf7d2d988bd7cb53e36c1') AS ci_session_lock
ERROR - 2019-06-01 17:53:43 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT `data`
FROM `ci_sessions`
WHERE `id` = 'ee4ab7c265193d972f9fafc0dbd99702d4dd7baf'
ERROR - 2019-06-01 17:53:43 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('64dacc1ea5fa7df82bbcf5a2cb94ce75') AS ci_session_lock
ERROR - 2019-06-01 17:53:43 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('830ff462a2c6016c7e88dbcc8fe4ee4a') AS ci_session_lock
ERROR - 2019-06-01 17:53:43 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('48caa519c67dd0f24f3f225d00e39ad3') AS ci_session_lock
ERROR - 2019-06-01 17:54:28 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('cec5f44ccbef924d1b36f772a796aa3db41b50fe', '157.55.39.218', 1559391823, '__ci_last_regenerate|i:1559391823;')
ERROR - 2019-06-01 17:54:28 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('a18484d2322b41ddfe7443f68257d5614d064b16', '176.204.209.96', 1559391823, '__ci_last_regenerate|i:1559391823;')
ERROR - 2019-06-01 17:54:28 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('2d64b7fcc0ba7913a6d6075947c53b7ff144fb73', '106.200.63.148', 1559391823, '__ci_last_regenerate|i:1559391823;')
ERROR - 2019-06-01 17:54:28 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('9be3eccee75da4579eacebcb2d0fb106') AS ci_session_lock
ERROR - 2019-06-01 17:54:28 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('830ff462a2c6016c7e88dbcc8fe4ee4a') AS ci_session_lock
ERROR - 2019-06-01 17:54:28 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('5273a0544f8947de83b5122e37e40b9b') AS ci_session_lock
ERROR - 2019-06-01 17:54:28 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('78f4e159c1575890e4273226da2a2c693855cdcf', '157.48.250.15', 1559391824, '__ci_last_regenerate|i:1559391823;')
ERROR - 2019-06-01 17:54:28 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('941f4e1720a83063d35367b10cd60acb667e741b', '117.230.149.21', 1559391823, '__ci_last_regenerate|i:1559391823;')
ERROR - 2019-06-01 17:54:28 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('033c47a97784106e41bb5e35404eaf28') AS ci_session_lock
ERROR - 2019-06-01 17:54:28 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('0821a55473d1efe7f8c2a9eb29afd73f') AS ci_session_lock
ERROR - 2019-06-01 17:54:28 --> Query error: MySQL server has gone away - Invalid query: SELECT *, `b`.`id` AS `cat_id`, `c`.`id` AS `subcat_id`, `a`.`id` AS `video_id`, `a`.`created` as `creates`, `a`.`updated` as `updates`
FROM `video` AS `a`
INNER JOIN `category` AS `b` ON `a`.`cat_id` = `b`.`id`
INNER JOIN `sub_category` AS `c` ON `a`.`subcat_id` = `c`.`id`
WHERE `a`.`cat_id` = '2'
AND `a`.`subcat_id` = '4'
AND `a`.`id` = '1339'
ORDER BY `a`.`rel_date` DESC
ERROR - 2019-06-01 17:54:28 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('860bade59a73abe0dd62f298d5b4343c52fe922c', '37.9.113.105', 1559391868, '__ci_last_regenerate|i:1559391868;')
ERROR - 2019-06-01 17:54:28 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('60c7ef493848ea9be98b75b67768b73c') AS ci_session_lock
ERROR - 2019-06-01 17:54:48 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('f11717009781d6ec1086362186b097bad25270a2', '176.204.209.96', 1559391846, '__ci_last_regenerate|i:1559391846;')
ERROR - 2019-06-01 17:54:48 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('abb2d509337e6f2bcb5d732e46fb52a3') AS ci_session_lock
ERROR - 2019-06-01 17:55:13 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('6d15ef43c96235ff834b809364a83afd538db322', '103.83.245.14', 1559391868, '__ci_last_regenerate|i:1559391868;')
ERROR - 2019-06-01 17:55:13 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('7c452bff33ca567b01c04f58ea6462d59ef1ca1c', '114.29.236.181', 1559391869, '__ci_last_regenerate|i:1559391868;')
ERROR - 2019-06-01 17:55:13 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('faab08bc02476fde0c1e2e3812bd1e14') AS ci_session_lock
ERROR - 2019-06-01 17:55:13 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('7872cf780a87a6f7352d6d45ed457bce') AS ci_session_lock
ERROR - 2019-06-01 17:55:13 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('9118c98d5440308a3898cbaa19023c60a80a660c', '157.55.39.218', 1559391868, '__ci_last_regenerate|i:1559391868;')
ERROR - 2019-06-01 17:55:13 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('01ef43cec468addb99739af8e1c89d6bdaa82d49', '157.48.250.15', 1559391868, '__ci_last_regenerate|i:1559391868;')
ERROR - 2019-06-01 17:55:13 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('fc3b3998d99f0de06a7e7bb45ed8e91a') AS ci_session_lock
ERROR - 2019-06-01 17:55:13 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('632ff0186a4397d2cfc4a881b3839534') AS ci_session_lock
ERROR - 2019-06-01 17:55:33 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('e38c97e87b0a3e2a507c8db7f203eeaff7947bb9', '37.9.113.105', 1559391888, '__ci_last_regenerate|i:1559391888;')
ERROR - 2019-06-01 17:55:33 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('fa996013f693979fe1113464fb7cc636') AS ci_session_lock
ERROR - 2019-06-01 17:55:58 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('6e0cb7c8f3e6d7faf94b566c6cef1c1b3e7d5df2', '49.35.38.79', 1559391915, '__ci_last_regenerate|i:1559391913;')
ERROR - 2019-06-01 17:55:58 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('ac0c5d54b7ad79fee9b766034acce563') AS ci_session_lock
ERROR - 2019-06-01 17:56:18 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('b13650af29a0100a85e2f7ac41020b757011eddb', '66.249.79.167', 1559391933, '__ci_last_regenerate|i:1559391933;')
ERROR - 2019-06-01 17:56:18 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('6db93e9d83f47fd333ee3947bec61d9175952dd7', '27.59.132.145', 1559391934, '__ci_last_regenerate|i:1559391933;')
ERROR - 2019-06-01 17:56:18 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('a70a5bfd0e72b3be01291ee2d3060d1f') AS ci_session_lock
ERROR - 2019-06-01 17:56:18 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('4e6575db439d12db4eb890665d3008b2') AS ci_session_lock
ERROR - 2019-06-01 17:56:43 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('b5eb45d0761948b864046e80d7537b33129bad4f', '157.55.39.218', 1559391958, '__ci_last_regenerate|i:1559391958;')
ERROR - 2019-06-01 17:56:43 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('a7933d76a4d0dcdf626a7ea339dd30e2') AS ci_session_lock
ERROR - 2019-06-01 17:56:43 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('a851e0659cfbcfc1a900b638c78d77fd84fe3690', '27.59.132.145', 1559391959, '__ci_last_regenerate|i:1559391958;')
ERROR - 2019-06-01 17:56:43 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('1f1c565dda67fd31f8b5647dfa08f0d7736538f0', '49.35.38.79', 1559391960, '__ci_last_regenerate|i:1559391958;')
ERROR - 2019-06-01 17:56:43 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('1543a2dafa7a53686927108a58711161') AS ci_session_lock
ERROR - 2019-06-01 17:56:43 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('4cb9aea453e989a581cf725c9bc4e26f') AS ci_session_lock
ERROR - 2019-06-01 17:56:43 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('9b9106dbaa38ada0911a18dac3541bf1a4b883f4', '27.59.132.145', 1559391959, '__ci_last_regenerate|i:1559391958;')
ERROR - 2019-06-01 17:56:43 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('806decdace33bcbe3b7adc0611e65964') AS ci_session_lock
ERROR - 2019-06-01 17:56:43 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('2c43574b269c0df2a919cb23695ef2c53712eabd', '27.59.132.145', 1559391959, '__ci_last_regenerate|i:1559391958;')
ERROR - 2019-06-01 17:56:43 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('aabf7de11e5d5ea8f1710b537fc5c36e') AS ci_session_lock
ERROR - 2019-06-01 17:56:43 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('08f2976e115253d5d8a46993f77d0ce17660d7c1', '207.46.13.171', 1559391959, '__ci_last_regenerate|i:1559391958;')
ERROR - 2019-06-01 17:56:43 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('a66b0101d14f42f9b3e11d0bcbbab799') AS ci_session_lock
ERROR - 2019-06-01 17:56:43 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('7c547489d33f47e21a49399ff2e2cf4853d0b047', '27.59.132.145', 1559391959, '__ci_last_regenerate|i:1559391958;')
ERROR - 2019-06-01 17:56:43 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('a02d7b8fa2b6a5a185e5938a3b607db6') AS ci_session_lock
ERROR - 2019-06-01 17:56:43 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('e399715b2a75dad3a23261924621f978bf4dabbe', '27.59.132.145', 1559391959, '__ci_last_regenerate|i:1559391958;')
ERROR - 2019-06-01 17:56:43 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('a02c1e91e63ada5702615ef1c271be91') AS ci_session_lock
ERROR - 2019-06-01 17:57:28 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('41747b163d2352ccf2e6a33e307411f1db808e80', '47.29.131.68', 1559392005, '__ci_last_regenerate|i:1559392003;')
ERROR - 2019-06-01 17:57:28 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('44b80dead49b8694beae86fad77326a2') AS ci_session_lock
ERROR - 2019-06-01 17:57:28 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('0843465949967ba458ef6e7c6c26ba2d97d1ccd7', '27.59.132.145', 1559392004, '__ci_last_regenerate|i:1559392003;')
ERROR - 2019-06-01 17:57:28 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('d8fcf4f43c51956f58282861584eb05a') AS ci_session_lock
ERROR - 2019-06-01 17:57:28 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('d044ff019cbda748232e71b887361d6c2b3e9cdf', '27.59.132.145', 1559392004, '__ci_last_regenerate|i:1559392003;')
ERROR - 2019-06-01 17:57:28 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('4abdb2faa5ce99690646f9f602269688') AS ci_session_lock
ERROR - 2019-06-01 17:57:28 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('453b86bbfc0635b1a8f810728317c324f03d15ee', '27.59.132.145', 1559392004, '__ci_last_regenerate|i:1559392003;')
ERROR - 2019-06-01 17:57:28 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('3875862c256a05d41c6e073cee3c281759b3809e', '27.59.132.145', 1559392004, '__ci_last_regenerate|i:1559392003;')
ERROR - 2019-06-01 17:57:28 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('b0ae6c05bad4163fb83d901cced8b9a6') AS ci_session_lock
ERROR - 2019-06-01 17:57:28 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('c68b7a5769103cc3b57222e8b75f82fa') AS ci_session_lock
ERROR - 2019-06-01 17:57:28 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `poster` SET `views` = views+1
WHERE `id` = '1858'
ERROR - 2019-06-01 17:57:28 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('1f1c565dda67fd31f8b5647dfa08f0d7736538f0', '49.35.38.79', 1559392048, '')
ERROR - 2019-06-01 17:57:28 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('4cb9aea453e989a581cf725c9bc4e26f') AS ci_session_lock
ERROR - 2019-06-01 17:57:28 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('aa836281bf7ff52ad79802dadb2ee70c126ebf72', '27.59.132.145', 1559392004, '__ci_last_regenerate|i:1559392003;')
ERROR - 2019-06-01 17:57:28 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('ff6075fff7509a29072dfb86e0a1ecb6') AS ci_session_lock
ERROR - 2019-06-01 17:57:28 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('389e82d009ccee466bef8ff156cd4aeb3a7bacbb', '27.59.132.145', 1559392004, '__ci_last_regenerate|i:1559392003;')
ERROR - 2019-06-01 17:57:28 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('6ba44b852ca4fa0c6140cc51a9a559e6') AS ci_session_lock
ERROR - 2019-06-01 17:57:28 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('8051cf47cca6c8bf58b67d2984bbdd4c7ac41894', '27.59.132.145', 1559392004, '__ci_last_regenerate|i:1559392003;')
ERROR - 2019-06-01 17:57:28 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('4746c1992aafd2ea2a8e0595188a1495') AS ci_session_lock
ERROR - 2019-06-01 17:57:28 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `adsense` AS `a`
WHERE `width` = '300'
AND `height` = '600'
ERROR - 2019-06-01 17:57:28 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('f3f3debbedc7aaa37f111ae82d2bc3ad') AS ci_session_lock
ERROR - 2019-06-01 17:57:28 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('f3f3debbedc7aaa37f111ae82d2bc3ad') AS ci_session_lock
ERROR - 2019-06-01 17:57:33 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('49e6f8e6d80053d3c36196867435615aa091b896', '47.29.131.68', 1559392009, '__ci_last_regenerate|i:1559392008;')
ERROR - 2019-06-01 17:57:33 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('494e57fa9320f7269d986deaa7684900') AS ci_session_lock
ERROR - 2019-06-01 17:58:13 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('7f5bc45887280805f96ec87c4eb3f728f76ae662', '207.46.13.161', 1559392049, '__ci_last_regenerate|i:1559392048;')
ERROR - 2019-06-01 17:58:13 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('3d4fe725e47075eb36e03e09a389016d625c47dc', '207.46.13.95', 1559392049, '__ci_last_regenerate|i:1559392048;')
ERROR - 2019-06-01 17:58:13 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('8886b734678be82d48d4d5e5d3b3ce110038987f', '207.46.13.171', 1559392048, '__ci_last_regenerate|i:1559392048;')
ERROR - 2019-06-01 17:58:13 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('ed5ce2ab77936f596c90ecec6fa43149') AS ci_session_lock
ERROR - 2019-06-01 17:58:13 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('52309214892f08732c597967753c3df54a3ce4bf', '42.111.152.168', 1559392048, '__ci_last_regenerate|i:1559392048;')
ERROR - 2019-06-01 17:58:13 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('1c36cb858d22643d365b129afbbdcc24') AS ci_session_lock
ERROR - 2019-06-01 17:58:13 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('c3b61bc20de9e387dbd51cd43a06478c') AS ci_session_lock
ERROR - 2019-06-01 17:58:13 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('ca3c3d6fd78cb1db99fc2e142f08106a') AS ci_session_lock
ERROR - 2019-06-01 17:58:13 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('4fc4a34f5de4ae5ee16c9d5b642221233cd0fbbf', '27.59.132.145', 1559392049, '__ci_last_regenerate|i:1559392048;')
ERROR - 2019-06-01 17:58:13 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('2e792dd2ce3d8926aeb25507ac751a8c') AS ci_session_lock
ERROR - 2019-06-01 17:58:58 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `poster` SET `views` = views+1
WHERE `id` = '1665'
ERROR - 2019-06-01 17:58:58 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('df7e92228709d561fb2bc45fe01dd37a92d1aee4', '37.9.113.105', 1559392094, '__ci_last_regenerate|i:1559392093;')
ERROR - 2019-06-01 17:58:58 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('6a3fed2f3fa2b51b2fdaf3be4f651735') AS ci_session_lock
ERROR - 2019-06-01 17:58:58 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('49e6f8e6d80053d3c36196867435615aa091b896', '47.29.131.68', 1559392138, '')
ERROR - 2019-06-01 17:58:58 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('8cf5dd0abc49cac9790c6d18824c8f4bd887e2e3', '27.59.132.145', 1559392094, '__ci_last_regenerate|i:1559392093;')
ERROR - 2019-06-01 17:58:58 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('494e57fa9320f7269d986deaa7684900') AS ci_session_lock
ERROR - 2019-06-01 17:58:58 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('edfb9bda0d0039dbcecfe3e259ac69e4f5cb5412', '27.59.132.145', 1559392094, '__ci_last_regenerate|i:1559392093;')
ERROR - 2019-06-01 17:58:58 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('002ee07347fd46d4266f63a3b6806bf3c2cffea7', '27.59.132.145', 1559392094, '__ci_last_regenerate|i:1559392093;')
ERROR - 2019-06-01 17:58:58 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('84981a7057fa8865df76edf0d66fcb45') AS ci_session_lock
ERROR - 2019-06-01 17:58:58 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('712846221a67d8ee958bdd367cbaa183') AS ci_session_lock
ERROR - 2019-06-01 17:58:58 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('067353c7c323c81e47e2523a1a36970ac6978c5c', '27.59.132.145', 1559392094, '__ci_last_regenerate|i:1559392093;')
ERROR - 2019-06-01 17:58:58 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('76927b19acbe10cbfab34c604d5f0183') AS ci_session_lock
ERROR - 2019-06-01 17:58:58 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('182980fb4e916101ce452706f66865d29569d3bd', '27.59.132.145', 1559392094, '__ci_last_regenerate|i:1559392093;')
ERROR - 2019-06-01 17:58:58 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('e2b9099fe53ddac133cfeda82a6f0d72') AS ci_session_lock
ERROR - 2019-06-01 17:58:58 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('9d38c0a0172702e7d343d0be837148bca749482b', '42.107.220.45', 1559392093, '__ci_last_regenerate|i:1559392093;')
ERROR - 2019-06-01 17:58:58 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('54e21830c1a258035d79568d00c567a2') AS ci_session_lock
ERROR - 2019-06-01 17:58:58 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('9fc213a2df2f2e9c8eb1bbe5ad666d963bb80637', '66.249.79.167', 1559392094, '__ci_last_regenerate|i:1559392093;')
ERROR - 2019-06-01 17:58:58 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('9c5df07140129abeadb68667fa208f3298962929', '137.97.138.146', 1559392093, '__ci_last_regenerate|i:1559392093;')
ERROR - 2019-06-01 17:58:58 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('c9acee58936151086e33c0f7d8934180') AS ci_session_lock
ERROR - 2019-06-01 17:58:58 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('ab317f41c72800a7bc1e4ca1788d0e48') AS ci_session_lock
ERROR - 2019-06-01 17:58:58 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('8c802361c56ea191d333e5f97b4a069bc65b7a49', '115.248.212.49', 1559392096, '__ci_last_regenerate|i:1559392093;')
ERROR - 2019-06-01 17:58:58 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('f2657f54a23bf43ee85d767c88990f6130f09b80', '117.230.172.191', 1559392093, '__ci_last_regenerate|i:1559392093;')
ERROR - 2019-06-01 17:58:58 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('085c1019900bf7d2d988bd7cb53e36c1') AS ci_session_lock
ERROR - 2019-06-01 17:58:58 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('43088a14ab56d7d1b99d6edcaad5162f1d895b8b', '107.167.105.117', 1559392096, '__ci_last_regenerate|i:1559392093;')
ERROR - 2019-06-01 17:58:58 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('21fe25105af513f1dfc8703da7dbbad2') AS ci_session_lock
ERROR - 2019-06-01 17:58:58 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('abb30f86af9cd0fd3c1b55e72d7eee73') AS ci_session_lock
ERROR - 2019-06-01 17:58:58 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('a469182a334fe1b056d704b7f382a15b') AS ci_session_lock
ERROR - 2019-06-01 17:58:59 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `movie`
WHERE `id` = '2614'
ERROR - 2019-06-01 17:58:59 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('439856b2064d56ffcf841ce12cb2bd3c6f97695a', '27.59.132.145', 1559392139, '__ci_last_regenerate|i:1559392138;')
ERROR - 2019-06-01 17:58:59 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('0af132cec83c6cbef72ee9893e61e267') AS ci_session_lock
ERROR - 2019-06-01 17:59:43 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('aa0e95da7e2a47f1b9093ac269149e9c486c6a94', '27.59.132.145', 1559392140, '__ci_last_regenerate|i:1559392138;')
ERROR - 2019-06-01 17:59:43 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('ef048e512b417c41d55f9f723bc8ddd3c4054bd1', '27.59.132.145', 1559392140, '__ci_last_regenerate|i:1559392138;')
ERROR - 2019-06-01 17:59:43 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('4796ee7a10de3070f276f8c6517283a72ef62629', '207.46.13.161', 1559392139, '__ci_last_regenerate|i:1559392138;')
ERROR - 2019-06-01 17:59:43 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('92908e1c5074530ea760b27bf85a7fe6fe091072', '27.59.132.145', 1559392139, '__ci_last_regenerate|i:1559392138;')
ERROR - 2019-06-01 17:59:43 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('6a2ab59bb52481f9004d78c90b852816') AS ci_session_lock
ERROR - 2019-06-01 17:59:43 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('9410d37fd0b29a4e1827295d9e828f90') AS ci_session_lock
ERROR - 2019-06-01 17:59:43 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('2d1431d0ade31ff88e389e22befecaef') AS ci_session_lock
ERROR - 2019-06-01 17:59:43 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('9cbb56676145f60c12955f1165fca886') AS ci_session_lock
ERROR - 2019-06-01 17:59:43 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('2095e461730e040cb73fd5af21d94b165fb5e417', '27.59.132.145', 1559392139, '__ci_last_regenerate|i:1559392138;')
ERROR - 2019-06-01 17:59:43 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('cf8d881a79185a006f40a1522bfc254f') AS ci_session_lock
ERROR - 2019-06-01 17:59:43 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('0aa2351125fe94f1951e210c686f8b569b5cfd67', '37.9.113.105', 1559392183, '__ci_last_regenerate|i:1559392183;')
ERROR - 2019-06-01 17:59:43 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('9a07a594c5938679a87d1323b89bff30') AS ci_session_lock
ERROR - 2019-06-01 17:59:48 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('8255f1e3c6c8f8486015dc3898f3c7d3cc2b799f', '107.167.105.117', 1559392142, '__ci_last_regenerate|i:1559392138;')
ERROR - 2019-06-01 17:59:48 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('74c0dd07dcb3e61a5d2d6800f849758f') AS ci_session_lock
ERROR - 2019-06-01 18:00:28 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('d87680dc7e00b81d5162f9dc97cc1feb93b8e9df', '107.167.105.117', 1559392186, '__ci_last_regenerate|i:1559392183;')
ERROR - 2019-06-01 18:00:28 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('8464cd333bef97a7896be63d965f7050') AS ci_session_lock
ERROR - 2019-06-01 18:00:33 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT `data`
FROM `ci_sessions`
WHERE `id` = '77ea51ad8797640c9cc396dbb34ba15a72e2c7ec'
ERROR - 2019-06-01 18:00:33 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('a7349b4af3d9d83c6a79258c87e93c19') AS ci_session_lock
ERROR - 2019-06-01 18:00:43 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT `data`
FROM `ci_sessions`
WHERE `id` = '946c759ce1427c1a4bd2d0ad7e602e30b8730b01'
ERROR - 2019-06-01 18:00:43 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT `data`
FROM `ci_sessions`
WHERE `id` = '524b7e24d8022ff60281405c5cf6468e1c8d2836'
ERROR - 2019-06-01 18:00:43 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('833514d1d576ae921fdc63888256a90f') AS ci_session_lock
ERROR - 2019-06-01 18:00:43 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('eb28e222e5171ba2a0ad2a87ae12502e') AS ci_session_lock
ERROR - 2019-06-01 18:01:03 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT `data`
FROM `ci_sessions`
WHERE `id` = 'b03c9691973fe66d000bdc7949ba1d5840866604'
ERROR - 2019-06-01 18:01:03 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('58cf734ee385cc5b29515742c6cd4acd') AS ci_session_lock
ERROR - 2019-06-01 18:01:33 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT `data`
FROM `ci_sessions`
WHERE `id` = '652a5200c2ecd17f0879ab1b2f679e42958ccfc3'
ERROR - 2019-06-01 18:01:33 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('d77f84864ae1ddf8ed1bfc259350dc5e') AS ci_session_lock
ERROR - 2019-06-01 18:01:38 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT `data`
FROM `ci_sessions`
WHERE `id` = '62e6d8dc994836d4776a14d9af9587b42e1d0281'
ERROR - 2019-06-01 18:01:38 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT `data`
FROM `ci_sessions`
WHERE `id` = 'ef07e39bcda2dfe427678aa84491e6e300b8e83e'
ERROR - 2019-06-01 18:01:38 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('42294398be8b0e4e7bcabc506f859a92') AS ci_session_lock
ERROR - 2019-06-01 18:01:38 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('3abb5018ed5d566ce05f831fc38c21e0') AS ci_session_lock
ERROR - 2019-06-01 18:02:14 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT `data`
FROM `ci_sessions`
WHERE `id` = '4abfa282cf9890ef21992eca8babc0650d4862b8'
ERROR - 2019-06-01 18:02:14 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('0317524b972ad4ad5e3204dc1b4f015a') AS ci_session_lock
ERROR - 2019-06-01 18:05:59 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `video` SET `play` = play+1
WHERE `id` = '5352'
ERROR - 2019-06-01 18:05:59 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('5ab5b2f448abaf71c3939ff3d86f2b1334c1f205', '136.243.17.161', 1559392513, '__ci_last_regenerate|i:1559392513;')
ERROR - 2019-06-01 18:05:59 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('b6ba1f839e80d03617cf4fdbdd9687b4d59a1832', '66.249.79.167', 1559392559, '')
ERROR - 2019-06-01 18:05:59 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('f84a07037132abe77bd25b2239db0085') AS ci_session_lock
ERROR - 2019-06-01 18:05:59 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('70b101599f14b81fd728fd10b4f5c0c9') AS ci_session_lock
ERROR - 2019-06-01 18:06:44 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('6b0df000f451edc32a5488dbba65da61600e37b4', '66.249.79.167', 1559392559, '__ci_last_regenerate|i:1559392559;')
ERROR - 2019-06-01 18:06:44 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('acb153b60e1eb120f2b75d77d0f9bc611ca8252a', '49.15.139.15', 1559392559, '__ci_last_regenerate|i:1559392559;')
ERROR - 2019-06-01 18:06:44 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('7a0a9be26f85f3b195b0bb665030a223') AS ci_session_lock
ERROR - 2019-06-01 18:06:44 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('2244e2d755788c5e7b85a7ad41c82462') AS ci_session_lock
ERROR - 2019-06-01 18:07:29 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('3c067720b11c89a9f3d5d6fc1eff6a1b6c846c08', '207.46.13.161', 1559392604, '__ci_last_regenerate|i:1559392604;')
ERROR - 2019-06-01 18:07:29 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('debcf88070ca8c0514ed42d51362592f') AS ci_session_lock
ERROR - 2019-06-01 18:07:34 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('acb153b60e1eb120f2b75d77d0f9bc611ca8252a', '49.15.139.15', 1559392610, '__ci_last_regenerate|i:1559392610;')
ERROR - 2019-06-01 18:07:34 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('2244e2d755788c5e7b85a7ad41c82462') AS ci_session_lock
ERROR - 2019-06-01 18:08:14 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('3d33e9ab0abc977762d3f6db855aa5529b8b5c44', '109.177.178.222', 1559392649, '__ci_last_regenerate|i:1559392649;')
ERROR - 2019-06-01 18:08:14 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('61ca3d24cb93721ed5d15335a297c6af') AS ci_session_lock
ERROR - 2019-06-01 18:08:14 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('25804cc739a25bbd15cf718a17915c89a11a207d', '66.249.79.170', 1559392649, '__ci_last_regenerate|i:1559392649;')
ERROR - 2019-06-01 18:08:14 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('35881a79989451082d832d4e912587f9b9e1289c', '109.177.178.222', 1559392649, '__ci_last_regenerate|i:1559392649;')
ERROR - 2019-06-01 18:08:14 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('295a583412f0549c1e3b0c44ade8ee7145e2bbfc', '109.177.178.222', 1559392649, '__ci_last_regenerate|i:1559392649;')
ERROR - 2019-06-01 18:08:14 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('fa328f423235f09a44be21ed7cae10fb') AS ci_session_lock
ERROR - 2019-06-01 18:08:14 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('3a0b0c3c7206919c7e5e60829fcc70194fb26864', '109.177.178.222', 1559392649, '__ci_last_regenerate|i:1559392649;')
ERROR - 2019-06-01 18:08:14 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('30b57f7835bc0ec9f6ec7fb931635464') AS ci_session_lock
ERROR - 2019-06-01 18:08:14 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('e0c47b865c07d0b1455a19262e301f07') AS ci_session_lock
ERROR - 2019-06-01 18:08:14 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('82db334494b5f321775d846877290b5d') AS ci_session_lock
ERROR - 2019-06-01 18:08:59 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('2ee506d2932d0cdd5148db49d1c718e350897849', '42.106.65.72', 1559392694, '__ci_last_regenerate|i:1559392694;')
ERROR - 2019-06-01 18:08:59 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('2c0618e2a579b7599436f47d8b018f6180efc997', '157.33.45.14', 1559392695, '__ci_last_regenerate|i:1559392694;')
ERROR - 2019-06-01 18:08:59 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('76c0e43b81ec5384237ac76626f73614df507070', '87.250.224.108', 1559392696, '__ci_last_regenerate|i:1559392694;')
ERROR - 2019-06-01 18:08:59 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('992c1afd89e444871a1ac23b35a14712') AS ci_session_lock
ERROR - 2019-06-01 18:08:59 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('431a4eedf9cebcb8b334774f2d0d99cc') AS ci_session_lock
ERROR - 2019-06-01 18:08:59 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('cdc4d5c90ac4b4dfc1f0a182ea0b1f2d') AS ci_session_lock
ERROR - 2019-06-01 18:09:44 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('2768ef4b119cf2661ff873a7eac76f0bb10d5dbf', '157.50.94.80', 1559392739, '__ci_last_regenerate|i:1559392739;')
ERROR - 2019-06-01 18:09:44 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('fba2247870d280107d77590175404148fb51be4e', '207.46.13.161', 1559392739, '__ci_last_regenerate|i:1559392739;')
ERROR - 2019-06-01 18:09:44 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('aa6fb9e89a10e600fd08312b12d8466a0fdcc3f1', '27.97.168.189', 1559392739, '__ci_last_regenerate|i:1559392739;')
ERROR - 2019-06-01 18:09:44 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('e9706e4e8bbc95014ccef65d298d3dc3') AS ci_session_lock
ERROR - 2019-06-01 18:09:44 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('cc0e331d61d0aded85a03b3ad41eedac') AS ci_session_lock
ERROR - 2019-06-01 18:09:44 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('71b7e2c7e1ace5677e388ec942c5df7f') AS ci_session_lock
ERROR - 2019-06-01 18:10:29 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('ed0869cc294676291e1768299ffa7fe789f2ecc5', '157.33.95.28', 1559392785, '__ci_last_regenerate|i:1559392784;')
ERROR - 2019-06-01 18:10:29 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('fc1c090e227a3d04e4a73c8c4d998f5e4e894fe2', '117.230.180.49', 1559392784, '__ci_last_regenerate|i:1559392784;')
ERROR - 2019-06-01 18:10:29 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('a2fcfe58797719bb698c8615444c90fa70ff91a7', '37.9.113.147', 1559392786, '__ci_last_regenerate|i:1559392784;')
ERROR - 2019-06-01 18:10:29 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('d2a324c3d3506fd6465582a0fd9839bc') AS ci_session_lock
ERROR - 2019-06-01 18:10:29 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('b391324664261f261513611af76b1dd3c3837b8b', '207.46.13.95', 1559392784, '__ci_last_regenerate|i:1559392784;')
ERROR - 2019-06-01 18:10:29 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('0cd465108c70ae9f7f2f26f0129748f6') AS ci_session_lock
ERROR - 2019-06-01 18:10:29 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('2ae899172a515580c3f8999bb1b5d7e6') AS ci_session_lock
ERROR - 2019-06-01 18:10:29 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('6f583f02300021dca3c01e225e8e2aec') AS ci_session_lock
ERROR - 2019-06-01 18:10:29 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('ed99bc6dbe8ec1229a9eafb337c4ebd870ec8f99', '188.71.211.44', 1559392784, '__ci_last_regenerate|i:1559392784;')
ERROR - 2019-06-01 18:10:29 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('1452d4d2a5a328e810008cd88f0efbfa') AS ci_session_lock
ERROR - 2019-06-01 18:11:14 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('0300fd69f54a840afbb04b32780bbe1e0cda9127', '54.36.148.146', 1559392829, '__ci_last_regenerate|i:1559392829;')
ERROR - 2019-06-01 18:11:14 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('9c79699ace0cd533f3881f6b9b3221e2') AS ci_session_lock
ERROR - 2019-06-01 18:11:14 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('44b5f1233924b288aa4710a58732615691ef1391', '207.46.13.95', 1559392829, '__ci_last_regenerate|i:1559392829;')
ERROR - 2019-06-01 18:11:14 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('378822999d4d72817da45332715fa65c') AS ci_session_lock
ERROR - 2019-06-01 18:11:14 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('a39e2f4bc8edd5dcbc22d3a1479fae7f17d3ca41', '122.163.195.6', 1559392832, '__ci_last_regenerate|i:1559392829;')
ERROR - 2019-06-01 18:11:14 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('58b404f1d080ffbae075494bdf3b03be') AS ci_session_lock
ERROR - 2019-06-01 18:11:59 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('2a855c666ecf60977a11599f45849de79d9e221e', '66.249.79.167', 1559392875, '__ci_last_regenerate|i:1559392874;')
ERROR - 2019-06-01 18:11:59 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('8068ffec64ba28290cc654d1a06699f3078d22fb', '37.9.113.105', 1559392874, '__ci_last_regenerate|i:1559392874;')
ERROR - 2019-06-01 18:11:59 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('a3fb348b0c32db0c8da424f09898fa33') AS ci_session_lock
ERROR - 2019-06-01 18:11:59 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('9b32d6ccdac90f1daf7e039055ed4ce5') AS ci_session_lock
ERROR - 2019-06-01 18:11:59 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `poster` SET `views` = views+1
WHERE `id` = '1518'
ERROR - 2019-06-01 18:11:59 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('a39e2f4bc8edd5dcbc22d3a1479fae7f17d3ca41', '122.163.195.6', 1559392919, '')
ERROR - 2019-06-01 18:11:59 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('58b404f1d080ffbae075494bdf3b03be') AS ci_session_lock
ERROR - 2019-06-01 18:12:09 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('58b404f1d080ffbae075494bdf3b03be', 300) AS ci_session_lock
ERROR - 2019-06-01 18:12:14 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('58b404f1d080ffbae075494bdf3b03be', 300) AS ci_session_lock
ERROR - 2019-06-01 18:12:14 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('58b404f1d080ffbae075494bdf3b03be', 300) AS ci_session_lock
ERROR - 2019-06-01 18:12:44 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('a39e2f4bc8edd5dcbc22d3a1479fae7f17d3ca41', '122.163.195.6', 1559392919, '__ci_last_regenerate|i:1559392919;')
ERROR - 2019-06-01 18:12:44 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('b324ef27b2f53836f6b0d07ff8b5cb6ddade2ee8', '106.203.28.170', 1559392919, '__ci_last_regenerate|i:1559392919;')
ERROR - 2019-06-01 18:12:44 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('2303d472ba20842d8f3b3596936d9e93fc55a470', '188.70.9.38', 1559392919, '__ci_last_regenerate|i:1559392919;')
ERROR - 2019-06-01 18:12:44 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('58b404f1d080ffbae075494bdf3b03be') AS ci_session_lock
ERROR - 2019-06-01 18:12:44 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('3dd7e13feea2a90e7bc60cb7922e4f8f') AS ci_session_lock
ERROR - 2019-06-01 18:12:44 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('c7069452c3f5773640d3dbfd84e9b1ee') AS ci_session_lock
ERROR - 2019-06-01 18:12:44 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('3880f8c5ae416eeb3a0e7afbcae8ccdad57eea06', '207.46.13.171', 1559392919, '__ci_last_regenerate|i:1559392919;')
ERROR - 2019-06-01 18:12:44 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('1213c4d69afc99a0cedf6fdec6b932187afb3e2f', '37.9.113.105', 1559392964, '__ci_last_regenerate|i:1559392964;')
ERROR - 2019-06-01 18:12:44 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('7d2280833796f661437b8fca07c97d9c') AS ci_session_lock
ERROR - 2019-06-01 18:12:44 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('7da719e6b32c2a29df7fd1e6745151a4') AS ci_session_lock
ERROR - 2019-06-01 18:12:44 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('623ba478bbb3a03de0f013418f154523ad78bd3c', '103.28.132.224', 1559392919, '__ci_last_regenerate|i:1559392919;')
ERROR - 2019-06-01 18:12:44 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('ac5e613fa78ecc5be01d5ee8ec5ec982') AS ci_session_lock
ERROR - 2019-06-01 18:13:29 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('d23eea9d95bcae38f64d64cc70957bdf1eebf9bf', '104.131.110.123', 1559392965, '__ci_last_regenerate|i:1559392964;')
ERROR - 2019-06-01 18:13:29 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('a39e2f4bc8edd5dcbc22d3a1479fae7f17d3ca41', '122.163.195.6', 1559392964, '__ci_last_regenerate|i:1559392964;')
ERROR - 2019-06-01 18:13:29 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `video` SET `play` = play+1
WHERE `id` = '1669'
ERROR - 2019-06-01 18:13:29 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('58b404f1d080ffbae075494bdf3b03be') AS ci_session_lock
ERROR - 2019-06-01 18:13:29 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('0355f3ae6b86b23f77270a82671b5c211b366f16', '66.249.79.167', 1559393009, '')
ERROR - 2019-06-01 18:13:29 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('ecb591875d1c0dad0020dc5781026b5b') AS ci_session_lock
ERROR - 2019-06-01 18:13:29 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('f9e939d21e344feb59eb09c039dcbbe5') AS ci_session_lock
ERROR - 2019-06-01 18:14:14 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('a3cdae5fa2fef50d0b6fee916ea409fc6628387e', '37.9.113.105', 1559393010, '__ci_last_regenerate|i:1559393009;')
ERROR - 2019-06-01 18:14:14 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('e805b6a8f38d9c73721dd1cc3e083cde53687436', '207.46.13.161', 1559393009, '__ci_last_regenerate|i:1559393009;')
ERROR - 2019-06-01 18:14:14 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('b41d9ff116bd8837cb403c9d13ed005695b354c4', '42.107.195.48', 1559393009, '__ci_last_regenerate|i:1559393009;')
ERROR - 2019-06-01 18:14:14 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('3566777352feeb82c5c8115713903e7e') AS ci_session_lock
ERROR - 2019-06-01 18:14:14 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('5d9ff0cd079684bf0e1ec35a1b2d9358') AS ci_session_lock
ERROR - 2019-06-01 18:14:14 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('94dc547a9c7814e8ee56b8448d883b0a') AS ci_session_lock
ERROR - 2019-06-01 18:14:14 --> Query error: MySQL server has gone away - Invalid query: SELECT *, `b`.`id` AS `cat_id`, `c`.`id` AS `subcat_id`, `a`.`id` AS `video_id`, `a`.`created` as `creates`, `a`.`updated` as `updates`
FROM `video` AS `a`
INNER JOIN `category` AS `b` ON `a`.`cat_id` = `b`.`id`
INNER JOIN `sub_category` AS `c` ON `a`.`subcat_id` = `c`.`id`
WHERE `a`.`cat_id` = '2'
AND `a`.`subcat_id` = '1'
AND `a`.`id` = '11837'
ORDER BY `a`.`rel_date` DESC
ERROR - 2019-06-01 18:14:14 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('4513187f5117eab08185f8052d0bbc09e07a63c6', '157.55.39.218', 1559393054, '__ci_last_regenerate|i:1559393054;')
ERROR - 2019-06-01 18:14:14 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('bc95412fb9bc1a7a396c7bb36290792f') AS ci_session_lock
ERROR - 2019-06-01 18:14:59 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('ef0ac424d6b7781547a21d5e443f94903277fbe5', '64.233.173.35', 1559393054, '__ci_last_regenerate|i:1559393054;')
ERROR - 2019-06-01 18:14:59 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('e08cc2e297f3e1059e0a66bcd283fd17') AS ci_session_lock
ERROR - 2019-06-01 18:15:44 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('45ee0754fa6c24408a1dab81386decd9d1ed078e', '37.9.113.147', 1559393099, '__ci_last_regenerate|i:1559393099;')
ERROR - 2019-06-01 18:15:44 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('b60ea19a2370ec2849380878f5f2ea695576d2d9', '207.46.13.171', 1559393100, '__ci_last_regenerate|i:1559393099;')
ERROR - 2019-06-01 18:15:44 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('0ee41c9aa622f33a20f816344236cd3cb426cfd0', '137.97.90.41', 1559393099, '__ci_last_regenerate|i:1559393099;')
ERROR - 2019-06-01 18:15:44 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('faf628214706e8d8f7d7700f9a52283a') AS ci_session_lock
ERROR - 2019-06-01 18:15:44 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('843ee7a082a540b2e19584cedd188302382feaef', '207.46.13.161', 1559393100, '__ci_last_regenerate|i:1559393099;')
ERROR - 2019-06-01 18:15:44 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('cb1f55f2be35db46ac7ab3b1a2ffe3d3') AS ci_session_lock
ERROR - 2019-06-01 18:15:44 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('f30cd4a76bec934b64ad620390df10f6ec142f80', '207.46.13.95', 1559393102, '__ci_last_regenerate|i:1559393099;')
ERROR - 2019-06-01 18:15:44 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('4ad6dd376d8e9cbf33a435808d96fe88') AS ci_session_lock
ERROR - 2019-06-01 18:15:44 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('01bfb60e5b30e64e74a324b776221235d1914c8d', '27.97.173.55', 1559393099, '__ci_last_regenerate|i:1559393099;')
ERROR - 2019-06-01 18:15:44 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('9277e934230843af62ad47ed0d040fdc') AS ci_session_lock
ERROR - 2019-06-01 18:15:44 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('42f1ef032f73569e6d7ad5060b2b0cf2') AS ci_session_lock
ERROR - 2019-06-01 18:15:44 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('520ed8efcfdab5e2fc27c4133aea72b5') AS ci_session_lock
ERROR - 2019-06-01 18:15:44 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('ce05ec5d3c5b5cc998e07854e19ca9440ecbb489', '66.249.79.167', 1559393099, '__ci_last_regenerate|i:1559393099;')
ERROR - 2019-06-01 18:15:44 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('6784f0d071a16737983154929ff5df37') AS ci_session_lock
ERROR - 2019-06-01 18:16:29 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('16def02b8ce8eaa486bf931c6f884245f635cf2b', '207.46.13.161', 1559393145, '__ci_last_regenerate|i:1559393144;')
ERROR - 2019-06-01 18:16:30 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('aa380c9efd83047f35c7906568aac1d1') AS ci_session_lock
ERROR - 2019-06-01 18:16:30 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('edb6bafe9ff4e8bf8ed5668586898f50db864f40', '42.111.158.74', 1559393144, '__ci_last_regenerate|i:1559393144;')
ERROR - 2019-06-01 18:16:30 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('9f70b7c75388c500311918ac05051c9e') AS ci_session_lock
ERROR - 2019-06-01 18:16:30 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('772c0fe5a9cdc00ba9c20f6b50e40e9781241f42', '37.9.113.147', 1559393190, '__ci_last_regenerate|i:1559393190;')
ERROR - 2019-06-01 18:16:30 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('cd8f04ac54cbc7f3697e0519b07ebcf2') AS ci_session_lock
ERROR - 2019-06-01 18:16:35 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('b0afb8ffc7b4c98ef6608b44b6e2298b60176d43', '207.46.13.95', 1559393148, '__ci_last_regenerate|i:1559393144;')
ERROR - 2019-06-01 18:16:35 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('38f2adbfc37addff87350ac380665f60') AS ci_session_lock
ERROR - 2019-06-01 18:17:15 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('39a2e366f4b88430f9bfe807c402d9b645a4c964', '157.46.34.150', 1559393190, '__ci_last_regenerate|i:1559393190;')
ERROR - 2019-06-01 18:17:15 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('d5d20f24c7fe11789f72e83e9abc21ea') AS ci_session_lock
ERROR - 2019-06-01 18:17:20 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('e1f106f57070748166a3d855e46b5b9431fe4a59', '27.97.178.45', 1559393195, '__ci_last_regenerate|i:1559393195;')
ERROR - 2019-06-01 18:17:20 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('523a562a6eca33570f43cabba68b81751a3adead', '37.9.113.105', 1559393196, '__ci_last_regenerate|i:1559393195;')
ERROR - 2019-06-01 18:17:20 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('d3b826ebbb2d99c515b48d72b25f9a3a') AS ci_session_lock
ERROR - 2019-06-01 18:17:20 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('deea57aa48a55e502eca4e8312c14934') AS ci_session_lock
ERROR - 2019-06-01 18:18:05 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('ec59db6f18b4cf3bf244a748c2a58dcb2022ed23', '64.233.172.160', 1559393239, '__ci_last_regenerate|i:1559393235;')
ERROR - 2019-06-01 18:18:05 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('db8d8f23cf0fb6075e2756f900d6ae58') AS ci_session_lock
ERROR - 2019-06-01 18:18:05 --> Query error: MySQL server has gone away - Invalid query: SELECT *, `b`.`id` AS `cat_id`, `c`.`id` AS `subcat_id`, `a`.`id` AS `video_id`, `a`.`created` as `creates`, `a`.`updated` as `updates`
FROM `video` AS `a`
INNER JOIN `category` AS `b` ON `a`.`cat_id` = `b`.`id`
INNER JOIN `sub_category` AS `c` ON `a`.`subcat_id` = `c`.`id`
WHERE `a`.`cat_id` = '1'
AND `a`.`subcat_id` = '4'
AND `a`.`id` = '14330'
ORDER BY `a`.`rel_date` DESC
ERROR - 2019-06-01 18:18:05 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('a6810e7e37d8f3bc18473753f865da73639bdb64', '66.249.79.167', 1559393285, '__ci_last_regenerate|i:1559393285;')
ERROR - 2019-06-01 18:18:05 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('388595af6275abaee8c045dba578cc22') AS ci_session_lock
ERROR - 2019-06-01 18:18:05 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `personality`
WHERE REPLACE(REPLACE(personality_name,')',''),'(','') = 'Sayali Bhagat' OR REPLACE(REPLACE(personality_name,')',''),'(','') = 'Sayali-Bhagat' OR REPLACE(REPLACE(personality_name,')',''),'(','') = 'Sayali-Bhagat'
ERROR - 2019-06-01 18:18:05 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('8a9aa066edaa7f58004602a94150e82ab54f8297', '37.9.113.105', 1559393285, '__ci_last_regenerate|i:1559393285;')
ERROR - 2019-06-01 18:18:05 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('f34b54c758d8e428ae41f37bb96b8808') AS ci_session_lock
ERROR - 2019-06-01 18:22:46 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('c6fd6060ce5ee7d4b6bb9223c794690b1559bb1b', '66.249.79.172', 1559393520, '__ci_last_regenerate|i:1559393520;')
ERROR - 2019-06-01 18:22:46 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('d35f15c0bcb79b7f7550dae81e373e0c') AS ci_session_lock
ERROR - 2019-06-01 18:23:31 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1559393566
WHERE `id` = '231f5dac289e0e12251d1ab21a12fcd9d36b659f'
ERROR - 2019-06-01 18:23:31 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('1c32e82bee2f7e474d0986999b34d6a6') AS ci_session_lock
ERROR - 2019-06-01 18:24:31 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('594c422aebf13f7d681dbf58d47f41ba1ee45c07', '37.211.103.18', 1559393626, '__ci_last_regenerate|i:1559393626;')
ERROR - 2019-06-01 18:24:31 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('3fbf751ff41640329a3f74fbb7b056ec') AS ci_session_lock
ERROR - 2019-06-01 18:25:41 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('7a7be3ee7fe55f91304d7ce9df0f73e89652d41f', '223.229.202.255', 1559393699, '__ci_last_regenerate|i:1559393699;')
ERROR - 2019-06-01 18:25:41 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('56103aebfe021ce0d8364d03dc15eb6a') AS ci_session_lock
ERROR - 2019-06-01 18:26:01 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('1204088b8f00bd605e58acfaa8e8139c30d00385', '223.229.202.255', 1559393719, '__ci_last_regenerate|i:1559393719;')
ERROR - 2019-06-01 18:26:01 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('7f8667e309fb4594adbfa78892119a67') AS ci_session_lock
ERROR - 2019-06-01 18:26:26 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('6a87dfec6b801ae52e9225084052bcde2b9c5115', '207.46.13.95', 1559393741, '__ci_last_regenerate|i:1559393741;')
ERROR - 2019-06-01 18:26:26 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('a4ac0b4487ab39fb5119ba14f93f6ba35d217861', '49.15.139.81', 1559393741, '__ci_last_regenerate|i:1559393741;')
ERROR - 2019-06-01 18:26:26 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('33dc4e488169b3dd4719db16cc6e36f9') AS ci_session_lock
ERROR - 2019-06-01 18:26:26 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('a8a8e8040c40d91cfd91f0d62e7e5f41') AS ci_session_lock
ERROR - 2019-06-01 18:26:31 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('29921f19e39cac5911c8f44bf14f232b00f2b40c', '207.46.13.161', 1559393747, '__ci_last_regenerate|i:1559393741;')
ERROR - 2019-06-01 18:26:31 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('549da6123a52f9ae81b18ef679bc13b4') AS ci_session_lock
ERROR - 2019-06-01 18:27:11 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('eee6632925962187fcdd68ef250380d9cce4397c', '207.46.13.95', 1559393788, '__ci_last_regenerate|i:1559393786;')
ERROR - 2019-06-01 18:27:11 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('a63b5af2ef3f3a94f91f2e78b81353f4') AS ci_session_lock
ERROR - 2019-06-01 18:27:11 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('f7a35b922d3780b75785e2b864d32a4b74b87bdf', '27.59.104.51', 1559393789, '__ci_last_regenerate|i:1559393786;')
ERROR - 2019-06-01 18:27:11 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('242eb170f21e92a60ffae01a61c4f87cf01df0cc', '223.238.76.154', 1559393786, '__ci_last_regenerate|i:1559393786;')
ERROR - 2019-06-01 18:27:11 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('330dc8fca2f35c47ee95aa76f6fcfe77') AS ci_session_lock
ERROR - 2019-06-01 18:27:11 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('77a93b6a19740c7ef03c8fb235671edc') AS ci_session_lock
ERROR - 2019-06-01 18:27:11 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('5de1745336a8aebbaeb5d4a78f3d2cc430790ba8', '61.3.77.187', 1559393786, '__ci_last_regenerate|i:1559393786;')
ERROR - 2019-06-01 18:27:11 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('e1861d15ad99eff6c7670c6576715ee999592d5b', '66.249.79.167', 1559393786, '__ci_last_regenerate|i:1559393786;')
ERROR - 2019-06-01 18:27:11 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('c930de3ee3aded4b15c7dace7f71d53b') AS ci_session_lock
ERROR - 2019-06-01 18:27:12 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('541625fcfdfc820e99400677f8b526fe') AS ci_session_lock
ERROR - 2019-06-01 18:27:56 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('01bbc86f157ec2525e944954c9556a53df18f79c', '137.97.75.129', 1559393831, '__ci_last_regenerate|i:1559393831;')
ERROR - 2019-06-01 18:27:56 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('2e05c4ad6c3542fb882032cd6fdf8460') AS ci_session_lock
ERROR - 2019-06-01 18:28:41 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('aaa7d64134c0f2ad6ddf6e969f58fadc8e409088', '157.44.83.186', 1559393876, '__ci_last_regenerate|i:1559393876;')
ERROR - 2019-06-01 18:28:41 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('67b7558b35670fa4682664cbd4f7fa27b2f7874f', '117.98.176.202', 1559393876, '__ci_last_regenerate|i:1559393876;')
ERROR - 2019-06-01 18:28:41 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('4ead75c4a5da0c8ed00a70a9992f03916b8519f8', '66.249.79.167', 1559393876, '__ci_last_regenerate|i:1559393876;')
ERROR - 2019-06-01 18:28:41 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('9ea8325ab12be665cebff98e201d98fc31587afc', '207.46.13.95', 1559393877, '__ci_last_regenerate|i:1559393876;')
ERROR - 2019-06-01 18:28:41 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('3ec669c32e7a3f3f8788df6ac71b566c') AS ci_session_lock
ERROR - 2019-06-01 18:28:41 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('7ba1af5011731156a60ca98ee26ad09c') AS ci_session_lock
ERROR - 2019-06-01 18:28:41 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT `data`
FROM `ci_sessions`
WHERE `id` = '9ca31bc065f85e8a8c7371fce2fa6ae7dd49dc32'
ERROR - 2019-06-01 18:28:41 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('9e4d71d16d25db828d7b5dec4a765e7a') AS ci_session_lock
ERROR - 2019-06-01 18:28:41 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('2ca0e5e42ceb74808358e70c2509e411') AS ci_session_lock
ERROR - 2019-06-01 18:28:42 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('c38396d8e6953ac9842d4bf2362f0c7e') AS ci_session_lock
ERROR - 2019-06-01 18:29:26 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('8a72e34cee9a009561f705f65a27a304b55d7033', '199.59.150.182', 1559393922, '__ci_last_regenerate|i:1559393921;')
ERROR - 2019-06-01 18:29:26 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('a5d3f5db78a14dad305422ff040a47bf') AS ci_session_lock
ERROR - 2019-06-01 18:29:26 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('3b03d6f4a76c3823b85800f4a4a06d250ef70f81', '106.200.52.159', 1559393921, '__ci_last_regenerate|i:1559393921;')
ERROR - 2019-06-01 18:29:26 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('26d4bb32c5f0c55b9cabb3a6f286fd06') AS ci_session_lock
ERROR - 2019-06-01 18:29:26 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('c5769d12552ca897ebd313969d76bd92572f46f2', '37.200.154.80', 1559393921, '__ci_last_regenerate|i:1559393921;')
ERROR - 2019-06-01 18:29:26 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('15f2f8f995722289ce5de8e942e3303c') AS ci_session_lock
ERROR - 2019-06-01 18:29:26 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('4c565c6048d804ab257b26948298b5ebcdd1d4d3', '41.79.47.147', 1559393921, '__ci_last_regenerate|i:1559393921;')
ERROR - 2019-06-01 18:29:26 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('083f7ba715f50b29bd5424be367480a5111a54a2', '137.97.69.207', 1559393921, '__ci_last_regenerate|i:1559393921;')
ERROR - 2019-06-01 18:29:26 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('a1e442c7889af282253bb582ebecde26') AS ci_session_lock
ERROR - 2019-06-01 18:29:26 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('e578a48cc45f8459a72ac5d28285fe8e') AS ci_session_lock
ERROR - 2019-06-01 18:29:26 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('78c83ad0d984b35e48e72db9f459e8515b8c87e0', '223.186.142.161', 1559393921, '__ci_last_regenerate|i:1559393921;')
ERROR - 2019-06-01 18:29:26 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('9bd502756e594ba34189cc25334fd7c5') AS ci_session_lock
ERROR - 2019-06-01 18:30:01 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('01bbc86f157ec2525e944954c9556a53df18f79c', '137.97.75.129', 1559393957, '__ci_last_regenerate|i:1559393957;')
ERROR - 2019-06-01 18:30:01 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('2e05c4ad6c3542fb882032cd6fdf8460') AS ci_session_lock
ERROR - 2019-06-01 18:30:12 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('af8ff62b4ba9acd4a5ac2a04e201374dfb1126d9', '157.55.39.218', 1559393968, '__ci_last_regenerate|i:1559393966;')
ERROR - 2019-06-01 18:30:12 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('02de555c643f9d079c1ae0f8d8d6c329ef5eaa9a', '207.46.13.161', 1559393967, '__ci_last_regenerate|i:1559393966;')
ERROR - 2019-06-01 18:30:12 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('5b832c8223f251b28801abb3d012c45e905f5bf1', '27.97.169.157', 1559393967, '__ci_last_regenerate|i:1559393966;')
ERROR - 2019-06-01 18:30:12 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('7c3cb5df0a53fab464c8545bbc115ae0') AS ci_session_lock
ERROR - 2019-06-01 18:30:12 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('5370ce29b125305715a143f1b8aee9a0be057709', '27.97.169.157', 1559393967, '__ci_last_regenerate|i:1559393966;')
ERROR - 2019-06-01 18:30:12 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('796acc7f325a88e0ee998450b0400684500b920f', '106.208.88.235', 1559393968, '__ci_last_regenerate|i:1559393966;')
ERROR - 2019-06-01 18:30:12 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('a6d9f5bf5765eb8d928bb37a87f86527') AS ci_session_lock
ERROR - 2019-06-01 18:30:12 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('8f162c931ca998d2f9660f6fccfa1dae') AS ci_session_lock
ERROR - 2019-06-01 18:30:12 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('f225c83ed5b0a2978475e29e34ab7397') AS ci_session_lock
ERROR - 2019-06-01 18:30:12 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('037fd7c4388150fe7a486752d84b1a22') AS ci_session_lock
ERROR - 2019-06-01 18:30:57 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `video` SET `youtube_views` = '1126430'
WHERE `id` = '14'
ERROR - 2019-06-01 18:30:57 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('81d6159d82e911d7040591416d8f9acd05427127', '43.225.54.56', 1559394057, '__ci_last_regenerate|i:1559394012;')
ERROR - 2019-06-01 18:30:57 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('bbeadcbdcc02c4b55f111e9fe2610432') AS ci_session_lock
ERROR - 2019-06-01 18:31:32 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('a8c94d1fb09ed6259f527689bc70a04d6167ed94', '66.249.79.167', 1559394047, '__ci_last_regenerate|i:1559394046;')
ERROR - 2019-06-01 18:31:32 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('7f3e6443577be46836b4fa15f19533ea') AS ci_session_lock
ERROR - 2019-06-01 18:32:17 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('7d11534ffc4077a179cb0bfcb5f999bfb60ffeb9', '106.208.88.235', 1559394093, '__ci_last_regenerate|i:1559394092;')
ERROR - 2019-06-01 18:32:17 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('a29ddce005b55e28e62eb83a70f60a3c') AS ci_session_lock
ERROR - 2019-06-01 18:32:17 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `video` SET `youtube_views` = '6003'
WHERE `id` = '1124'
ERROR - 2019-06-01 18:32:17 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('9324f4f198857398677a5579e5da5f5e2be5cbec', '157.46.91.164', 1559394092, '__ci_last_regenerate|i:1559394092;')
ERROR - 2019-06-01 18:32:17 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('8e69c63326f3f7e91357073033160792') AS ci_session_lock
ERROR - 2019-06-01 18:32:17 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('777cff8a2e3796d0429c68ecfd05e6d51fd2d17e', '43.225.54.56', 1559394137, '__ci_last_regenerate|i:1559394092;')
ERROR - 2019-06-01 18:32:17 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('371b5ca5f0825f8a53e02c8b0b76422e') AS ci_session_lock
ERROR - 2019-06-01 18:32:17 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('bb8d511ee8680e39132332f1b59791ac1d43e4e5', '106.208.88.235', 1559394093, '__ci_last_regenerate|i:1559394092;')
ERROR - 2019-06-01 18:32:17 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('56483222d8b5726a478931e74c7aa491') AS ci_session_lock
ERROR - 2019-06-01 18:32:17 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('d99b7637da1d4510443ccfb3ef8c0a04ccf05204', '169.149.28.68', 1559394093, '__ci_last_regenerate|i:1559394092;')
ERROR - 2019-06-01 18:32:17 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('f411be839fd6bf658105614d91a28eee') AS ci_session_lock
ERROR - 2019-06-01 18:33:02 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('8258c5b071fa2a09312cb2b6b88633dec0ade78a', '112.79.149.82', 1559394137, '__ci_last_regenerate|i:1559394137;')
ERROR - 2019-06-01 18:33:02 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('cde7d53f30b12c32a6c165a04af7b3fba16764de', '2.50.253.92', 1559394138, '__ci_last_regenerate|i:1559394137;')
ERROR - 2019-06-01 18:33:02 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `poster` SET `views` = views+1
WHERE `id` = '1199'
ERROR - 2019-06-01 18:33:02 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('e801149ca9a6f3a5af71e6531dbf04b7') AS ci_session_lock
ERROR - 2019-06-01 18:33:02 --> Query error: MySQL server has gone away - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1559394182
WHERE `id` = 'b084d718e15d8789b45bc421234d4df629445a14'
ERROR - 2019-06-01 18:33:02 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('9406b2812b36b9f8e943351bc21f93cc') AS ci_session_lock
ERROR - 2019-06-01 18:33:02 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('dd7c735e3676a94777c462ff73bbc697e545223a', '223.238.76.154', 1559394137, '__ci_last_regenerate|i:1559394137;')
ERROR - 2019-06-01 18:33:02 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('ff4d1b1d6637251e489533384572641c') AS ci_session_lock
ERROR - 2019-06-01 18:33:02 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('7ac55d25f6314c49fef93dc87ae018423a4ed4ad', '157.55.39.218', 1559394137, '__ci_last_regenerate|i:1559394137;')
ERROR - 2019-06-01 18:33:02 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('06117e5bad15b97e46a215cab163525d475543ff', '106.208.88.235', 1559394138, '__ci_last_regenerate|i:1559394137;')
ERROR - 2019-06-01 18:33:02 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('6e4a0a7d685be3710e9e479d12c4f1ea') AS ci_session_lock
ERROR - 2019-06-01 18:33:02 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `video` SET `youtube_views` = '356162'
WHERE `id` = '2154'
ERROR - 2019-06-01 18:33:02 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('faf05a451ccaa9957a7d174e984cc7a8') AS ci_session_lock
ERROR - 2019-06-01 18:33:02 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('b17dac386ed6049385107f102a228a3136018b4b', '43.225.54.56', 1559394182, '__ci_last_regenerate|i:1559394137;')
ERROR - 2019-06-01 18:33:02 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('d08e1cb7002764e97173afc0fad92a9649590b96', '106.203.106.222', 1559394137, '__ci_last_regenerate|i:1559394137;')
ERROR - 2019-06-01 18:33:02 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('d87c1e8b27036261e161cdd48f4e0382') AS ci_session_lock
ERROR - 2019-06-01 18:33:02 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('a0608b5d2e59221a7b8557a2b9f8f21d') AS ci_session_lock
ERROR - 2019-06-01 18:33:02 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('65032cb44114af500922f20f7d851be3') AS ci_session_lock
ERROR - 2019-06-01 18:33:47 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('8fbce1633d9ea8bcffffa89e0c2996605d391695', '106.197.184.22', 1559394183, '__ci_last_regenerate|i:1559394182;')
ERROR - 2019-06-01 18:33:47 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('a4de8459a033c9e4a19400341c0cd325855ce8db', '207.46.13.95', 1559394183, '__ci_last_regenerate|i:1559394182;')
ERROR - 2019-06-01 18:33:47 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('a83c6489da26d25be3f45919e770658f') AS ci_session_lock
ERROR - 2019-06-01 18:33:47 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('283bec8785f124025360299b04cd08b3') AS ci_session_lock
ERROR - 2019-06-01 18:33:47 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `video` SET `youtube_views` = '87974745'
WHERE `id` = '3184'
ERROR - 2019-06-01 18:33:47 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('0dd8f84e48d2e5fbb014cf165168c593ea247e20', '43.225.54.56', 1559394227, '__ci_last_regenerate|i:1559394182;')
ERROR - 2019-06-01 18:33:47 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('c2abe846bb33cab675b76770335b1626') AS ci_session_lock
ERROR - 2019-06-01 18:33:47 --> Query error: MySQL server has gone away - Invalid query: SELECT *, `c`.`id` AS `subcat_id`, `a`.`id` AS `poster_id`, `a`.`created` as `creates`, `a`.`updated` as `updates`
FROM `poster` AS `a`
INNER JOIN `sub_category` AS `c` ON `a`.`subcat_id` = `c`.`id`
WHERE `a`.`subcat_id` = '3'
AND `a`.`id` = '1844'
ORDER BY `a`.`rel_date` DESC
ERROR - 2019-06-01 18:33:47 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `movie`
WHERE `id` = '2840'
ERROR - 2019-06-01 18:33:47 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('b7e45a1407f317a1e58023f479da93cf9663cb31', '64.233.172.163', 1559394227, '__ci_last_regenerate|i:1559394227;')
ERROR - 2019-06-01 18:33:47 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('b20d7c05d18935c42101c4dcedf868e7') AS ci_session_lock
ERROR - 2019-06-01 18:33:47 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('90353cec518261bdf0e8280668af06ab89c4803d', '106.197.184.22', 1559394227, '__ci_last_regenerate|i:1559394227;')
ERROR - 2019-06-01 18:33:47 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('5ddd2be9de8b26c6c73b92bde401ae47') AS ci_session_lock
ERROR - 2019-06-01 18:34:02 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('8258c5b071fa2a09312cb2b6b88633dec0ade78a', '112.79.149.82', 1559394198, '__ci_last_regenerate|i:1559394198;')
ERROR - 2019-06-01 18:34:02 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('65032cb44114af500922f20f7d851be3') AS ci_session_lock
ERROR - 2019-06-01 18:34:32 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('fb9ed794b658be4d010293996a2fcddac16ddc5d', '64.233.172.163', 1559394228, '__ci_last_regenerate|i:1559394227;')
ERROR - 2019-06-01 18:34:32 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('0e6b6cdb638855efed0d23616607479789cfd35c', '207.46.13.95', 1559394227, '__ci_last_regenerate|i:1559394227;')
ERROR - 2019-06-01 18:34:32 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('c127e9725508d194487bf40668971d90') AS ci_session_lock
ERROR - 2019-06-01 18:34:32 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('4377224d6d39b56a6f2f536bfcc045f1') AS ci_session_lock
ERROR - 2019-06-01 18:35:17 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `video` SET `youtube_views` = '2806069'
WHERE `id` = '4203'
ERROR - 2019-06-01 18:35:17 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('56b69227a580e03aa85c3279dc045849f5f84028', '207.46.13.95', 1559394272, '__ci_last_regenerate|i:1559394272;')
ERROR - 2019-06-01 18:35:17 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('b251a014bfee30c9540b24f8def9c905958e66b6', '207.46.13.161', 1559394272, '__ci_last_regenerate|i:1559394272;')
ERROR - 2019-06-01 18:35:17 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('e06edebef64d1c4e966d4f7c066c89c7aa6d3d13', '43.225.54.56', 1559394317, '__ci_last_regenerate|i:1559394272;')
ERROR - 2019-06-01 18:35:17 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('8a7184a7a73ede23a220ef4b1227ced0') AS ci_session_lock
ERROR - 2019-06-01 18:35:17 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('69bdc3fcfb2e8d498d26b3abee1a82c7') AS ci_session_lock
ERROR - 2019-06-01 18:35:17 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('2469114e92315003a33c4438fdb19ed4') AS ci_session_lock
ERROR - 2019-06-01 18:35:37 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('8258c5b071fa2a09312cb2b6b88633dec0ade78a', '112.79.149.82', 1559394295, '__ci_last_regenerate|i:1559394295;')
ERROR - 2019-06-01 18:35:37 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('65032cb44114af500922f20f7d851be3') AS ci_session_lock
ERROR - 2019-06-01 18:35:52 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('9324f4f198857398677a5579e5da5f5e2be5cbec', '157.46.91.164', 1559394310, '__ci_last_regenerate|i:1559394310;')
ERROR - 2019-06-01 18:35:52 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('8e69c63326f3f7e91357073033160792') AS ci_session_lock
ERROR - 2019-06-01 21:10:00 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '><script>prompt(1)</script>%" order by created DESC' at line 1 - Invalid query: SELECT * FROM video WHERE cat_id = 1 and video_name LIKE "%'></script>"><script>prompt(1)</script>%" order by created DESC
