<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-03-09 14:49:13 --> Query error: Cannot add or update a child row: a foreign key constraint fails (`cominlvi_trailer`.`movie_map_cast`, CONSTRAINT `movie_map_cast_ibfk_2` FOREIGN KEY (`cast_id`) REFERENCES `cast` (`id`) ON DELETE CASCADE ON UPDATE CASCADE) - Invalid query: INSERT INTO `movie_map_cast` (`movie_id`, `cast_id`) VALUES ('2713', 18111)
