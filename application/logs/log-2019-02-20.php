<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-02-20 00:22:29 --> Query error: Illegal mix of collations for operation 'like' - Invalid query: 

               SELECT poster.id,poster.rel_date,poster.poster_name,movie.movie_name,poster.likes,poster.views,sub_category.subcat_name,poster_map_movie.movie_id,poster.subcat_id,poster.poster_desc,video_url.final_url,poster.is_deleted FROM poster
               LEFT JOIN sub_category ON sub_category.id=poster.subcat_id
               LEFT JOIN poster_map_movie ON poster_map_movie.poster_id=poster.id
               LEFT JOIN movie ON movie.id=poster_map_movie.movie_id
               LEFT JOIN video_url ON video_url.id=poster.seo_url_id
               where is_deleted=0 AND ( poster.id LIKE '%Strike⁠%' OR poster.rel_date LIKE '%Strike⁠%' OR poster.poster_name LIKE '%Strike⁠%' OR movie.movie_name LIKE '%Strike⁠%' OR poster.likes LIKE '%Strike⁠%' OR poster.views LIKE '%Strike⁠%' OR sub_category.subcat_name LIKE '%Strike⁠%' OR poster_map_movie.movie_id LIKE '%Strike⁠%' OR poster.subcat_id LIKE '%Strike⁠%' OR poster.poster_desc LIKE '%Strike⁠%' OR video_url.final_url LIKE '%Strike⁠%' OR poster.is_deleted LIKE '%Strike⁠%' )
               ORDER BY poster.rel_date desc
               LIMIT 0,10

            
ERROR - 2019-02-20 00:22:33 --> Query error: Illegal mix of collations for operation 'like' - Invalid query: 

               SELECT poster.id,poster.rel_date,poster.poster_name,movie.movie_name,poster.likes,poster.views,sub_category.subcat_name,poster_map_movie.movie_id,poster.subcat_id,poster.poster_desc,video_url.final_url,poster.is_deleted FROM poster
               LEFT JOIN sub_category ON sub_category.id=poster.subcat_id
               LEFT JOIN poster_map_movie ON poster_map_movie.poster_id=poster.id
               LEFT JOIN movie ON movie.id=poster_map_movie.movie_id
               LEFT JOIN video_url ON video_url.id=poster.seo_url_id
               where is_deleted=0 AND ( poster.id LIKE '%Strike⁠%' OR poster.rel_date LIKE '%Strike⁠%' OR poster.poster_name LIKE '%Strike⁠%' OR movie.movie_name LIKE '%Strike⁠%' OR poster.likes LIKE '%Strike⁠%' OR poster.views LIKE '%Strike⁠%' OR sub_category.subcat_name LIKE '%Strike⁠%' OR poster_map_movie.movie_id LIKE '%Strike⁠%' OR poster.subcat_id LIKE '%Strike⁠%' OR poster.poster_desc LIKE '%Strike⁠%' OR video_url.final_url LIKE '%Strike⁠%' OR poster.is_deleted LIKE '%Strike⁠%' )
               ORDER BY poster.rel_date desc
               LIMIT 0,10

            
ERROR - 2019-02-20 00:22:42 --> Query error: Illegal mix of collations for operation 'like' - Invalid query: 

               SELECT poster.id,poster.rel_date,poster.poster_name,movie.movie_name,poster.likes,poster.views,sub_category.subcat_name,poster_map_movie.movie_id,poster.subcat_id,poster.poster_desc,video_url.final_url,poster.is_deleted FROM poster
               LEFT JOIN sub_category ON sub_category.id=poster.subcat_id
               LEFT JOIN poster_map_movie ON poster_map_movie.poster_id=poster.id
               LEFT JOIN movie ON movie.id=poster_map_movie.movie_id
               LEFT JOIN video_url ON video_url.id=poster.seo_url_id
               where is_deleted=0 AND ( poster.id LIKE '%Strike⁠%' OR poster.rel_date LIKE '%Strike⁠%' OR poster.poster_name LIKE '%Strike⁠%' OR movie.movie_name LIKE '%Strike⁠%' OR poster.likes LIKE '%Strike⁠%' OR poster.views LIKE '%Strike⁠%' OR sub_category.subcat_name LIKE '%Strike⁠%' OR poster_map_movie.movie_id LIKE '%Strike⁠%' OR poster.subcat_id LIKE '%Strike⁠%' OR poster.poster_desc LIKE '%Strike⁠%' OR video_url.final_url LIKE '%Strike⁠%' OR poster.is_deleted LIKE '%Strike⁠%' )
               ORDER BY poster.rel_date desc
               LIMIT 0,10

            
