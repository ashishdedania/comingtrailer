<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-03-03 00:36:18 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'FROM playlist                                          
                    WHER' at line 3 - Invalid query: SELECT playlist.id as id,playlist.name as playlist_name,                     
                    (case when playlist.playlist_thumb is not null then CONCAT('https://www.comingtrailer.com/images/playlistthumb/',playlist.playlist_thumb) else null end) as thumb,
                     FROM playlist                                          
                    WHERE subcat_id like '%1%' AND    
                    playlist.is_deleted='0'                                        
                     LIMIT 20,20
ERROR - 2019-03-03 00:55:12 --> Query error: Column 'show_in_app' cannot be null - Invalid query: INSERT INTO `playlist` (`name`, `redirect_link`, `created`, `show_in_app`) VALUES ('', '', '2019-03-03 00:55:12', NULL)
