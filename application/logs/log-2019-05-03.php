<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-05-03 00:24:14 --> Severity: Error --> Call to undefined method CI_DB_mysqli_result::get() /home/cominlvi/public_html/application/controllers/api/Home.php 533
ERROR - 2019-05-03 00:32:04 --> Query error: Unknown column 'playlist.cr1eated' in 'field list' - Invalid query: 
                   SELECT playlist.id,playlist.cr1eated,playlist.name,playlist.playlist_thumb,playlist.show_in_app,playlist.is_deleted,playlist.redirect_link,playlist.subcat_id FROM playlist                
                   where playlist.is_deleted=0 and 6 IN (subcat_id)
                   
                
ERROR - 2019-05-03 00:36:37 --> Query error: Unknown column 'playlist.cr1eated' in 'field list' - Invalid query: 
                   SELECT playlist.id,playlist.cr1eated,playlist.name,playlist.playlist_thumb,playlist.show_in_app,playlist.is_deleted,playlist.redirect_link,playlist.subcat_id FROM playlist                
                   where playlist.is_deleted=0 and find_in_set(6,playlist.subcat_id)
                   
                
ERROR - 2019-05-03 00:42:14 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'playlist.created order by DESC' at line 2 - Invalid query: 
                   SELECT playlist.id,playlist.created,playlist.name,playlist.playlist_thumb,playlist.show_in_app,playlist.is_deleted,playlist.redirect_link,playlist.subcat_id FROM playlist                
                   where playlist.is_deleted=0 and find_in_set(6,playlist.subcat_id) playlist.created order by DESC 
                   
                
ERROR - 2019-05-03 00:42:50 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'DESC' at line 2 - Invalid query: 
                   SELECT playlist.id,playlist.created,playlist.name,playlist.playlist_thumb,playlist.show_in_app,playlist.is_deleted,playlist.redirect_link,playlist.subcat_id FROM playlist                
                   where playlist.is_deleted=0 and find_in_set(6,playlist.subcat_id) and playlist.created order by DESC 
                   
                
ERROR - 2019-05-03 01:08:54 --> Severity: Error --> Call to undefined method CI_DB_mysqli_result::count() /home/cominlvi/public_html/application/controllers/api/User.php 185
ERROR - 2019-05-03 01:15:30 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: UPDATE user_points SET total_likes = GREATEST(total_likes-0, 0) where user_id=
ERROR - 2019-05-03 14:09:08 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('733d313f692fbad3a874a251635b529a', 300) AS ci_session_lock
ERROR - 2019-05-03 14:09:28 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('733d313f692fbad3a874a251635b529a', 300) AS ci_session_lock
ERROR - 2019-05-03 14:09:38 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('733d313f692fbad3a874a251635b529a', 300) AS ci_session_lock
ERROR - 2019-05-03 22:39:28 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: select movie.movie_name as name,movie.id from poster_map_movie LEFT JOIN movie ON movie.id=poster_map_movie.movie_id where poster_id=
ERROR - 2019-05-03 22:39:42 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: select movie.movie_name as name,movie.id from poster_map_movie LEFT JOIN movie ON movie.id=poster_map_movie.movie_id where poster_id=
ERROR - 2019-05-03 22:40:47 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: select movie.movie_name as name,movie.id from poster_map_movie LEFT JOIN movie ON movie.id=poster_map_movie.movie_id where poster_id=
