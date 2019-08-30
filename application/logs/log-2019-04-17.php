<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-04-17 00:11:46 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 's Film%'' at line 1 - Invalid query: select id,rel_by_name,rel_by_img from released_by WHERE trim(rel_by_name) LIKE '%Beldar Brother's Film%'
ERROR - 2019-04-17 20:48:39 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('74526d6eaa033c5c8ecb1e9c4b07e31a', 300) AS ci_session_lock
ERROR - 2019-04-17 20:48:42 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('74526d6eaa033c5c8ecb1e9c4b07e31a', 300) AS ci_session_lock
ERROR - 2019-04-17 20:48:42 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('74526d6eaa033c5c8ecb1e9c4b07e31a', 300) AS ci_session_lock
ERROR - 2019-04-17 20:48:42 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('74526d6eaa033c5c8ecb1e9c4b07e31a', 300) AS ci_session_lock
ERROR - 2019-04-17 20:48:42 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('74526d6eaa033c5c8ecb1e9c4b07e31a', 300) AS ci_session_lock
ERROR - 2019-04-17 20:48:42 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('74526d6eaa033c5c8ecb1e9c4b07e31a', 300) AS ci_session_lock
ERROR - 2019-04-17 20:48:42 --> Query error: Lost connection to MySQL server during query - Invalid query: SELECT GET_LOCK('74526d6eaa033c5c8ecb1e9c4b07e31a', 300) AS ci_session_lock
ERROR - 2019-04-17 23:41:51 --> Query error: execute command denied to user 'cominlvi_trailer'@'localhost' for routine 'playlist.show_in_app' - Invalid query: SELECT playlist.id as id,playlist.name as playlist_name,playlist.redirect_link,playlist.show_in_app                    
                    (case when playlist.playlist_thumb is not null then CONCAT('https://www.comingtrailer.com/images/playlistthumb/',playlist.playlist_thumb) else null end) as thumb
                     FROM playlist                                          
                    WHERE  playlist.is_deleted='0'
ERROR - 2019-04-17 23:43:24 --> Query error: execute command denied to user 'cominlvi_trailer'@'localhost' for routine 'playlist.created' - Invalid query: SELECT playlist.id as id,playlist.name as playlist_name,playlist.redirect_link,playlist.show_in_app,playlist.created                    
                    (case when playlist.playlist_thumb is not null then CONCAT('https://www.comingtrailer.com/images/playlistthumb/',playlist.playlist_thumb) else null end) as thumb
                     FROM playlist                                          
                    WHERE  playlist.is_deleted='0'
ERROR - 2019-04-17 23:47:30 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'FROM playlist                
               where playlist.is_deleted=0
       ' at line 1 - Invalid query: 
               SELECT  FROM playlist                
               where playlist.is_deleted=0
               ORDER BY  
               LIMIT ,
            
ERROR - 2019-04-17 23:50:01 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'FROM playlist                
               where playlist.is_deleted=0' at line 1 - Invalid query: 
               SELECT  FROM playlist                
               where playlist.is_deleted=0
               
            
ERROR - 2019-04-17 23:51:30 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'FROM playlist                
               where playlist.is_deleted=0' at line 1 - Invalid query: 
               SELECT  FROM playlist                
               where playlist.is_deleted=0
               
            
ERROR - 2019-04-17 23:55:06 --> Query error: Unknown column 'playlist.redirect_url' in 'field list' - Invalid query: 
               SELECT playlist.id,playlist.created,playlist.name,playlist.playlist_thumb,playlist.show_in_app,playlist.is_deleted,playlist.redirect_url FROM playlist                
               where playlist.is_deleted=0
               
            
