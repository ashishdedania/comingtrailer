<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-02-25 21:38:13 --> Query error: Cannot add or update a child row: a foreign key constraint fails (`cominlvi_trailer`.`movie_map_cast`, CONSTRAINT `movie_map_cast_ibfk_2` FOREIGN KEY (`cast_id`) REFERENCES `cast` (`id`) ON DELETE CASCADE ON UPDATE CASCADE) - Invalid query: INSERT INTO `movie_map_cast` (`movie_id`, `cast_id`) VALUES ('2664', 17717)
ERROR - 2019-02-25 23:03:30 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'souza%'' at line 1 - Invalid query: select id,personality_name,personality_img from personality WHERE trim(personality_name) LIKE '%Ankit D'souza%'
ERROR - 2019-02-25 23:03:56 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'souza%'' at line 1 - Invalid query: select id,personality_name,personality_img from personality WHERE trim(personality_name) LIKE '%Ankit D'souza%'
