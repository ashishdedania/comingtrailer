<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-11-23 17:53:37 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1542975771
WHERE `id` = 'c5b7ab9750f8efe74c868b3cca6048346440188b'
ERROR - 2018-11-23 17:53:37 --> Query error: MySQL server has gone away - Invalid query: SELECT `data`
FROM `ci_sessions`
WHERE `id` = 'c5b7ab9750f8efe74c868b3cca6048346440188b'
ERROR - 2018-11-23 17:53:38 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('8bbb5f6cda08f2e718e2712b0a19ed48') AS ci_session_lock
ERROR - 2018-11-23 17:53:38 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('8bbb5f6cda08f2e718e2712b0a19ed48') AS ci_session_lock
ERROR - 2018-11-23 17:54:22 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1542975818
WHERE `id` = '9d1627a30fe09df9fc075c415cd6689d88fbe56d'
ERROR - 2018-11-23 17:54:24 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('20370177f4cb454026dc588d170fc5a0') AS ci_session_lock
ERROR - 2018-11-23 17:54:24 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('d678024573a725eda4daa5498bfebf9b1520e3d0', '66.249.79.186', 1542975818, '__ci_last_regenerate|i:1542975817;')
ERROR - 2018-11-23 17:54:24 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('27d2f69719fbf3b5b3330d96d100207f') AS ci_session_lock
ERROR - 2018-11-23 17:54:24 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('60553bfda5a329f8fcf46f9eb16c1fbdf565a66e', '141.0.9.165', 1542975818, '__ci_last_regenerate|i:1542975817;')
ERROR - 2018-11-23 17:54:24 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('4fcbfcb512da78f9ce0fb4817dadce9a') AS ci_session_lock
ERROR - 2018-11-23 17:54:24 --> Query error: MySQL server has gone away - Invalid query: UPDATE `video` SET `play` = play+1
WHERE `id` = '6109'
ERROR - 2018-11-23 17:54:24 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('0aa35a7b71445662e90de2b21b14658c1d1562d6', '66.249.79.186', 1542975864, '')
ERROR - 2018-11-23 17:54:24 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('d693d6942604d2e1f6c8578177f6871e') AS ci_session_lock
ERROR - 2018-11-23 17:55:09 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('f2d71811f74a9dfe0462124c2cd7d9605b21c92a', '137.97.73.120', 1542975864, '__ci_last_regenerate|i:1542975864;')
ERROR - 2018-11-23 17:55:09 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('adb6283fdd1f257103894f317b51e3db') AS ci_session_lock
ERROR - 2018-11-23 17:55:09 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('127846e41184387268bb00885e059802b4d8d996', '157.32.65.190', 1542975865, '__ci_last_regenerate|i:1542975864;')
ERROR - 2018-11-23 17:55:09 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('5bc8b8ffe6ef496a92526d7361820ad6') AS ci_session_lock
ERROR - 2018-11-23 17:55:09 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('26eacdc307b493396eac673ae3e5eac812d717f5', '42.190.84.44', 1542975864, '__ci_last_regenerate|i:1542975864;')
ERROR - 2018-11-23 17:55:09 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `video` SET `youtube_views` = '406115'
WHERE `id` = '4200'
ERROR - 2018-11-23 17:55:09 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('6d4f732db8da9484db555e20884ed3ea357eb6ff', '43.225.54.56', 1542975909, '__ci_last_regenerate|i:1542975864;')
ERROR - 2018-11-23 17:55:09 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('e1ac68803a89c18be1346eadd1079fbe') AS ci_session_lock
ERROR - 2018-11-23 17:55:09 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('2af88ff69db571beee35369c55c13bdd') AS ci_session_lock
ERROR - 2018-11-23 17:55:09 --> Query error: MySQL server has gone away - Invalid query: SELECT *, `c`.`id` AS `subcat_id`, `a`.`id` AS `poster_id`, `a`.`created` as `creates`, `a`.`updated` as `updates`
FROM `poster` AS `a`
INNER JOIN `sub_category` AS `c` ON `a`.`subcat_id` = `c`.`id`
WHERE `a`.`subcat_id` = '3'
AND `a`.`id` = '546'
ORDER BY `a`.`rel_date` DESC
ERROR - 2018-11-23 17:55:09 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('0fb0cad5f253f486e12167868be140a4783c5716', '40.77.167.58', 1542975909, '__ci_last_regenerate|i:1542975909;')
ERROR - 2018-11-23 17:55:09 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('88e4a84815ed0e1574c4d0507eb7d728') AS ci_session_lock
ERROR - 2018-11-23 17:55:54 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('a07185b1cd7b247454b06da6f0d052bc9823cfb9', '139.167.255.27', 1542975909, '__ci_last_regenerate|i:1542975909;')
ERROR - 2018-11-23 17:55:54 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('20d823bbac1533b2496ca08ad70fdbfc') AS ci_session_lock
ERROR - 2018-11-23 17:55:54 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('6290f2166d6d22b6a3cf0541bc885706f6eaafb6', '47.29.19.132', 1542975910, '__ci_last_regenerate|i:1542975909;')
ERROR - 2018-11-23 17:55:54 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('ac85f1750847e5b6713f802ac2335da5') AS ci_session_lock
ERROR - 2018-11-23 17:55:54 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('77a88e4128d2ac264fcea2a853da1536b67f6951', '46.229.168.136', 1542975909, '__ci_last_regenerate|i:1542975909;')
ERROR - 2018-11-23 17:55:54 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('53f31e16b8a0ddec93bbb4ed74a73cec') AS ci_session_lock
ERROR - 2018-11-23 17:55:54 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('bcde03ec90a8b6db2e9a0a96bcf6c0d686837330', '117.206.135.109', 1542975909, '__ci_last_regenerate|i:1542975909;')
ERROR - 2018-11-23 17:55:54 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('a35c968f9d6b7c5d2fdb6c2a731590d0') AS ci_session_lock
ERROR - 2018-11-23 17:55:54 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('efbd7b118e7be999ec2e115e2e50b68f238cb702', '46.229.168.136', 1542975909, '__ci_last_regenerate|i:1542975909;')
ERROR - 2018-11-23 17:55:54 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('7e018ab5ad7fbc4878711b4f419a33c6') AS ci_session_lock
ERROR - 2018-11-23 17:55:54 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('58967fbdbdfa56356aeec4eb3ff4e0bfc2730c9d', '47.29.19.132', 1542975910, '__ci_last_regenerate|i:1542975909;')
ERROR - 2018-11-23 17:55:54 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('aabce0d7b37cb0892e51865ed976f368') AS ci_session_lock
ERROR - 2018-11-23 17:55:54 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('4a9ff628589515d098658fdf495e83d4c72619c9', '103.81.77.13', 1542975909, '__ci_last_regenerate|i:1542975909;')
ERROR - 2018-11-23 17:55:54 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('e2c9982392347b7abb3bdea9a85e7ff2') AS ci_session_lock
ERROR - 2018-11-23 17:55:54 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('63b49ea2df35ac11976affc3e0fe640ebf0f412e', '66.249.79.186', 1542975909, '__ci_last_regenerate|i:1542975909;')
ERROR - 2018-11-23 17:55:54 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('db46e9e9ad568108047bd678bd8216af') AS ci_session_lock
ERROR - 2018-11-23 17:55:54 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('9c6fa1d4d8ac8c8733018c4a7c6d92cf6628e085', '157.32.65.190', 1542975910, '__ci_last_regenerate|i:1542975909;')
ERROR - 2018-11-23 17:55:54 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('0fd0d2610bda084dc70634324ccffb91') AS ci_session_lock
ERROR - 2018-11-23 17:55:54 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('8e8447d815a9dc74d3c8a9f55e11474a34363872', '66.249.79.186', 1542975909, '__ci_last_regenerate|i:1542975909;')
ERROR - 2018-11-23 17:55:54 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('a5da5b885ae1efb1a0512e5028f5d798') AS ci_session_lock
ERROR - 2018-11-23 17:55:54 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('5f905f71d18fa51627b153a4fe2ff111b9fef4d9', '47.29.19.132', 1542975910, '__ci_last_regenerate|i:1542975909;')
ERROR - 2018-11-23 17:55:54 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('bd12bb2635dcd003adaf2a22f662e861') AS ci_session_lock
ERROR - 2018-11-23 17:56:54 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1542975969, `data` = '__ci_last_regenerate|i:1542975954;front_userdata|O:8:\"stdClass\":17:{s:2:\"id\";s:3:\"441\";s:4:\"name\";s:13:\"5a30b10aebb85\";s:6:\"mobile\";s:0:\"\";s:5:\"email\";s:34:\"jsollazzo@raritanbayaccounting.com\";s:6:\"gender\";s:0:\"\";s:12:\"love_country\";s:1:\"1\";s:12:\"social_media\";s:2:\"WA\";s:3:\"img\";s:0:\"\";s:15:\"social_media_id\";s:0:\"\";s:10:\"share_code\";s:8:\"iRi8o441\";s:11:\"shared_code\";s:0:\"\";s:13:\"isEmailVerify\";s:1:\"1\";s:11:\"isNumVerify\";s:1:\"1\";s:12:\"verify_token\";s:0:\"\";s:7:\"updated\";s:19:\"2017-12-13 10:17:42\";s:7:\"created\";s:19:\"2017-12-13 10:17:42\";s:10:\"share_link\";s:49:\"https://www.comingtrailer.com/home/index/iRi8o441\";}'
WHERE `id` = '07cb080092c59eb00b5900714c90073536699c40'
ERROR - 2018-11-23 17:56:54 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('7d4e0c0064fa67d4e6dc40c3a9b2f01e') AS ci_session_lock
ERROR - 2018-11-23 17:56:54 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `adsense` AS `a`
WHERE `width` = '300'
AND `height` = '600'
ERROR - 2018-11-23 17:56:54 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('1a50bcb69c1f9afc316db27414cbf9a1080b4757', '223.228.148.77', 1542976014, '__ci_last_regenerate|i:1542976014;')
ERROR - 2018-11-23 17:56:54 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('c2df674089656da5e080ec132b176b1e') AS ci_session_lock
ERROR - 2018-11-23 17:57:39 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('af4dd83e671b26c5ad4ff85fcdf4b095cb94bec8', '157.55.39.88', 1542976014, '__ci_last_regenerate|i:1542976014;')
ERROR - 2018-11-23 17:57:39 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('6f1afeb0f149301abb36b3f03c45d3d1') AS ci_session_lock
ERROR - 2018-11-23 17:57:39 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('46a07527c546da6727d9a62a321a4c0d97eaf7c9', '66.249.79.186', 1542976014, '__ci_last_regenerate|i:1542976014;')
ERROR - 2018-11-23 17:57:39 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('a8ff40b670837afd9c1ce05e9cc37e2f') AS ci_session_lock
ERROR - 2018-11-23 17:57:39 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('e57d36fa274863063efa276973c510b4e58d7c97', '66.249.79.186', 1542976014, '__ci_last_regenerate|i:1542976014;')
ERROR - 2018-11-23 17:57:39 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('66b0abf53a66e51abc673498c557bceb') AS ci_session_lock
ERROR - 2018-11-23 17:57:39 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('660b1816a3f5a788c5f2423b4a3acd996aa2934f', '103.102.42.14', 1542976015, '__ci_last_regenerate|i:1542976014;')
ERROR - 2018-11-23 17:57:39 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('6eda513d9f0e297098492b96a118762c') AS ci_session_lock
