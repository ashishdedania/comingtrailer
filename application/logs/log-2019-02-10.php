<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-02-10 02:56:22 --> Query error: Column 'category' cannot be null - Invalid query: INSERT INTO `contact_us_data` (`first_name`, `last_name`, `email`, `phone`, `category`, `message`, `created`) VALUES ('', 'James', 'james@lightningfunnel.co', '7028449877', NULL, NULL, '2019-02-10 02:56:22')
ERROR - 2019-02-10 18:18:33 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('7162ac94252c81301448e930ff0b4bf4751b5884', '68.183.90.116', 1549802868, '__ci_last_regenerate|i:1549802868;')
ERROR - 2019-02-10 18:18:33 --> Query error: MySQL server has gone away - Invalid query: SELECT *, `b`.`id` AS `cat_id`, `c`.`id` AS `subcat_id`, `a`.`id` AS `video_id`, `a`.`created` as `creates`, `a`.`updated` as `updates`
FROM `video` AS `a`
INNER JOIN `category` AS `b` ON `a`.`cat_id` = `b`.`id`
INNER JOIN `sub_category` AS `c` ON `a`.`subcat_id` = `c`.`id`
WHERE `a`.`cat_id` = '2'
AND `a`.`subcat_id` = '1'
AND `a`.`id` = '3964'
ORDER BY `a`.`rel_date` DESC
ERROR - 2019-02-10 18:18:33 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('9a3b9eda599edd0197b11ed30579736d') AS ci_session_lock
ERROR - 2019-02-10 18:18:33 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('d6bc69b383e863c66ce8534c4fb2f325e0ce3f15', '5.45.207.81', 1549802913, '__ci_last_regenerate|i:1549802913;')
ERROR - 2019-02-10 18:18:33 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('a70a9bbad55d3639971a10de7e0725ed') AS ci_session_lock
ERROR - 2019-02-10 18:19:18 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('018966e269d026bc20371a82eaa57d4a86f4657b', '66.249.79.167', 1549802914, '__ci_last_regenerate|i:1549802913;')
ERROR - 2019-02-10 18:19:18 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('e83734dbbe5dafdfa11d5071233affa226be8a23', '2.90.129.185', 1549802913, '__ci_last_regenerate|i:1549802913;')
ERROR - 2019-02-10 18:19:18 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('4d98374cdf5c74c5f35d858f885229c6') AS ci_session_lock
ERROR - 2019-02-10 18:19:18 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('7896972e17dacde0f6a456f37403fb34') AS ci_session_lock
ERROR - 2019-02-10 18:19:18 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('9c7f870d8a7ebf2ceda428c7f2e6c1fde96d3081', '207.46.13.216', 1549802914, '__ci_last_regenerate|i:1549802913;')
ERROR - 2019-02-10 18:19:18 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('de89161379b325473cc5161695c2df1d') AS ci_session_lock
ERROR - 2019-02-10 18:19:18 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('af75ea764f12cd55135f8a9231f424f314c6b8dd', '66.249.79.167', 1549802914, '__ci_last_regenerate|i:1549802913;')
ERROR - 2019-02-10 18:19:18 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('c59c75910def609985d876aaa90e2b0d') AS ci_session_lock
ERROR - 2019-02-10 18:19:18 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('cc66f2447dc12b688fcfe6bf2ace217bc586b0d6', '68.183.90.116', 1549802913, '__ci_last_regenerate|i:1549802913;')
ERROR - 2019-02-10 18:19:18 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('ae09ada1ef8fe716ff5164075439d33a') AS ci_session_lock
ERROR - 2019-02-10 18:19:18 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('2498624512d27332e34fbd8820f999f876e292e9', '207.46.13.88', 1549802914, '__ci_last_regenerate|i:1549802913;')
ERROR - 2019-02-10 18:19:18 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('9100a4b978746b3bbd81d18e081f9b5c') AS ci_session_lock
ERROR - 2019-02-10 18:20:03 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('b545f90307c75b9390ae146941d9ebe49e9af5a3', '112.196.91.27', 1549802958, '__ci_last_regenerate|i:1549802958;')
ERROR - 2019-02-10 18:20:03 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('b86b559ccb02f77d1f9d68bc706f7afb') AS ci_session_lock
ERROR - 2019-02-10 18:20:03 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('547477a3c76b094aaf4635606f6140857e56152c', '87.250.224.108', 1549802959, '__ci_last_regenerate|i:1549802958;')
ERROR - 2019-02-10 18:20:03 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('4f9b6f036d0d9481807ed19fff6c2283') AS ci_session_lock
ERROR - 2019-02-10 18:20:03 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('a0ffecf4373e3018b183833c8dcc9d88363f75ab', '157.46.18.6', 1549802958, '__ci_last_regenerate|i:1549802958;')
ERROR - 2019-02-10 18:20:03 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('61be0c06533a3c373443de33704df275') AS ci_session_lock
ERROR - 2019-02-10 18:20:03 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('5c88d91d92333bb52e5fbcecc516a1df64392203', '157.46.18.6', 1549802958, '__ci_last_regenerate|i:1549802958;')
ERROR - 2019-02-10 18:20:03 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('4d7993f56471344c21af78ec52ccb829') AS ci_session_lock
ERROR - 2019-02-10 18:20:48 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('f9c1b2c7a27481f617124905f77e943dc893041a', '66.249.79.167', 1549803006, '__ci_last_regenerate|i:1549803003;')
ERROR - 2019-02-10 18:20:48 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('a12ea1a638c85342089d5d17b86787fd') AS ci_session_lock
ERROR - 2019-02-10 18:20:48 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('f5a61a9524f02dba5fa05f755b471f98eac572df', '207.46.13.216', 1549803004, '__ci_last_regenerate|i:1549803003;')
ERROR - 2019-02-10 18:20:48 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('1500005c428402db32ad809626dad2e1df21a131', '47.9.203.242', 1549803003, '__ci_last_regenerate|i:1549803003;')
ERROR - 2019-02-10 18:20:48 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('51adda9105a9e6e83445c52fa5d2e2d7') AS ci_session_lock
ERROR - 2019-02-10 18:20:48 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('2135b8bd29c5c169589452f2c0e8cf108e2d2642', '117.230.15.145', 1549803003, '__ci_last_regenerate|i:1549803003;')
ERROR - 2019-02-10 18:20:48 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('73ae55739179e22e1da7bc444a3c5fd4') AS ci_session_lock
ERROR - 2019-02-10 18:20:48 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('4581e610369efbc94a2ff10d8c4505d7') AS ci_session_lock
ERROR - 2019-02-10 18:20:48 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('0a9e5d622ac71e3bd090b69fa7d5b493813a6395', '42.109.152.120', 1549803003, '__ci_last_regenerate|i:1549803003;')
ERROR - 2019-02-10 18:20:48 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('4dcb40c90f2f22e3da875f0c18555a92') AS ci_session_lock
ERROR - 2019-02-10 18:20:48 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('d9acd66c07f475e231e99615f1869518735cf0a6', '207.46.13.216', 1549803004, '__ci_last_regenerate|i:1549803003;')
ERROR - 2019-02-10 18:20:48 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('75a945fa309a9c50e2188f803e8cec85') AS ci_session_lock
ERROR - 2019-02-10 18:20:48 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('68e6d6673fc8c20ffc94204d93c7263555bac81e', '95.163.255.42', 1549803004, '__ci_last_regenerate|i:1549803003;')
ERROR - 2019-02-10 18:20:48 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('8885ec8cbc006108bf7256bb61cd7ca2') AS ci_session_lock
ERROR - 2019-02-10 18:20:48 --> Query error: Lost connection to MySQL server during query - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1549803003
WHERE `id` = '162ecde1a9d7f402213c81c98b0a04f421d678fc'
ERROR - 2019-02-10 18:20:48 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('f7d3c4ed6bdb439a3a57c6351be5589a') AS ci_session_lock
ERROR - 2019-02-10 18:20:48 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('5f58eb8fa76478589cc0d0fd0d65172ee67befd2', '95.163.255.43', 1549803005, '__ci_last_regenerate|i:1549803003;')
ERROR - 2019-02-10 18:20:48 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('24613713080a80e6e938ff08cdb5d067') AS ci_session_lock
ERROR - 2019-02-10 18:20:48 --> Query error: MySQL server has gone away - Invalid query: SELECT *, `b`.`id` AS `cat_id`, `c`.`id` AS `subcat_id`, `a`.`id` AS `video_id`, `a`.`created` as `creates`, `a`.`updated` as `updates`
FROM `video` AS `a`
INNER JOIN `category` AS `b` ON `a`.`cat_id` = `b`.`id`
INNER JOIN `sub_category` AS `c` ON `a`.`subcat_id` = `c`.`id`
WHERE `a`.`cat_id` = '2'
AND `a`.`subcat_id` = '4'
AND `a`.`id` = '2871'
ORDER BY `a`.`rel_date` DESC
ERROR - 2019-02-10 18:20:48 --> Query error: MySQL server has gone away - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('fc2d3a03dbbdec04818b620f414648a028d5fa38', '178.154.171.58', 1549803048, '__ci_last_regenerate|i:1549803048;')
ERROR - 2019-02-10 18:20:48 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('ba42ff3d7c499f42445290e6ceb90169') AS ci_session_lock
ERROR - 2019-02-10 18:20:53 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('d50fc7fa88fac3cb8e04eebdb57f9dd5490358a4', '207.46.13.216', 1549803007, '__ci_last_regenerate|i:1549803003;')
ERROR - 2019-02-10 18:20:53 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('7780290c04b7a6dfa3ff22b71bea205c') AS ci_session_lock
ERROR - 2019-02-10 18:21:33 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('015509f5c875dad6c95d58ed7d18be8717ab64ca', '95.163.255.42', 1549803049, '__ci_last_regenerate|i:1549803048;')
ERROR - 2019-02-10 18:21:33 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('a49b84921cdc265cfe5504a10b5cf33e2b77bfb9', '27.97.172.177', 1549803048, '__ci_last_regenerate|i:1549803048;')
ERROR - 2019-02-10 18:21:33 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('dfb223f9566c86cb7569e5e868741e71') AS ci_session_lock
ERROR - 2019-02-10 18:21:33 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('20f893a242163283409c935841203ff83f5e3556', '47.247.154.93', 1549803048, '__ci_last_regenerate|i:1549803048;')
ERROR - 2019-02-10 18:21:33 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('228cc480ece9122ba88a5ffca50dcc67') AS ci_session_lock
ERROR - 2019-02-10 18:21:33 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('51a62e3892acb8d9ca573e98a9b04f8a') AS ci_session_lock
ERROR - 2019-02-10 18:21:33 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('bb2786c0d8503482658b381fc0cc2ba267a4949d', '95.163.255.48', 1549803049, '__ci_last_regenerate|i:1549803048;')
ERROR - 2019-02-10 18:21:33 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('2e794c33c6f56392d1e4e8cd934b802a') AS ci_session_lock
ERROR - 2019-02-10 18:21:33 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('6cbf9ebef2c1d61b05aad8e4ad66b3c24ed5f7e8', '66.249.79.167', 1549803049, '__ci_last_regenerate|i:1549803048;')
ERROR - 2019-02-10 18:21:33 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('17b99b54d80f5736d28c09df6919e2cc') AS ci_session_lock
ERROR - 2019-02-10 18:21:33 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('f26f1aba1518ca73a82ae7422fd4b9085e838bb8', '54.36.148.221', 1549803048, '__ci_last_regenerate|i:1549803048;')
ERROR - 2019-02-10 18:21:33 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('d71b09aeeeff6c9322de14d082648b00') AS ci_session_lock
ERROR - 2019-02-10 18:21:38 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('37069a571b58022974cd97249b4db90639e4cb64', '66.249.79.167', 1549803053, '__ci_last_regenerate|i:1549803053;')
ERROR - 2019-02-10 18:21:38 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('c0175fa59e624e26c3b0b6a4b5e92c018c1b7475', '178.154.200.31', 1549803054, '__ci_last_regenerate|i:1549803053;')
ERROR - 2019-02-10 18:21:38 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('aa555dd9fba2b83ca522cc21c2dad04fb970bc81', '207.46.13.87', 1549803053, '__ci_last_regenerate|i:1549803053;')
ERROR - 2019-02-10 18:21:38 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('084f7753ac6dd4f85b93ca570566df7a') AS ci_session_lock
ERROR - 2019-02-10 18:21:38 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('1e6302865f845e1cf583e4ac4d48f9c7') AS ci_session_lock
ERROR - 2019-02-10 18:21:38 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('ecbd215ee6bf1adbe4580fcc457ab46e') AS ci_session_lock
ERROR - 2019-02-10 18:21:38 --> Query error: Lost connection to MySQL server during query - Invalid query: INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('0a8dd452406b790410b17a513c471890e63d5675', '47.247.154.93', 1549803053, '__ci_last_regenerate|i:1549803053;')
ERROR - 2019-02-10 18:21:38 --> Query error: MySQL server has gone away - Invalid query: SELECT RELEASE_LOCK('ed19bbf50e1c536b79b144fbb99fdb0e') AS ci_session_lock
