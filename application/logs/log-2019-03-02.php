<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-03-02 01:06:40 --> 404 Page Not Found: Images/videothumb
ERROR - 2019-03-02 01:06:41 --> 404 Page Not Found: VideoDetail/index
ERROR - 2019-03-02 01:06:42 --> 404 Page Not Found: Images/videothumb
ERROR - 2019-03-02 01:06:43 --> 404 Page Not Found: VideoDetail/index
ERROR - 2019-03-02 01:06:44 --> 404 Page Not Found: Images/videothumb
ERROR - 2019-03-02 01:06:45 --> 404 Page Not Found: VideoDetail/setVideoView
ERROR - 2019-03-02 01:06:45 --> 404 Page Not Found: Images/poster
ERROR - 2019-03-02 01:06:47 --> 404 Page Not Found: VideoDetail/setVideoView
ERROR - 2019-03-02 01:06:48 --> 404 Page Not Found: Personality/index
ERROR - 2019-03-02 01:06:49 --> 404 Page Not Found: Images/videothumb
ERROR - 2019-03-02 01:06:50 --> 404 Page Not Found: VideoDetail/index
ERROR - 2019-03-02 01:06:54 --> 404 Page Not Found: VideoDetail/setVideoView
ERROR - 2019-03-02 01:06:57 --> 404 Page Not Found: Personality/index
ERROR - 2019-03-02 01:06:59 --> 404 Page Not Found: Personality/index
ERROR - 2019-03-02 01:07:01 --> 404 Page Not Found: Personality/index
ERROR - 2019-03-02 01:07:02 --> 404 Page Not Found: Images/poster
ERROR - 2019-03-02 01:07:03 --> 404 Page Not Found: Personality/index
ERROR - 2019-03-02 01:07:05 --> 404 Page Not Found: Personality/index
ERROR - 2019-03-02 01:07:06 --> 404 Page Not Found: VideoDetail/setVideoView
ERROR - 2019-03-02 01:07:06 --> 404 Page Not Found: Personality/index
ERROR - 2019-03-02 01:07:08 --> 404 Page Not Found: PosterDetail/index
ERROR - 2019-03-02 01:07:08 --> 404 Page Not Found: Personality/index
ERROR - 2019-03-02 01:07:19 --> 404 Page Not Found: Personality/index
ERROR - 2019-03-02 01:07:26 --> 404 Page Not Found: Personality/index
ERROR - 2019-03-02 01:07:29 --> 404 Page Not Found: Personality/index
ERROR - 2019-03-02 01:07:31 --> 404 Page Not Found: Personality/index
ERROR - 2019-03-02 01:07:32 --> 404 Page Not Found: VideoDetail/index
ERROR - 2019-03-02 01:07:33 --> 404 Page Not Found: Images/poster
ERROR - 2019-03-02 01:07:37 --> 404 Page Not Found: VideoDetail/index
ERROR - 2019-03-02 01:07:45 --> 404 Page Not Found: Personality/index
ERROR - 2019-03-02 01:07:54 --> 404 Page Not Found: Personality/index
ERROR - 2019-03-02 01:07:57 --> 404 Page Not Found: Personality/index
ERROR - 2019-03-02 01:08:03 --> 404 Page Not Found: MovieIndividual/index
ERROR - 2019-03-02 01:08:06 --> 404 Page Not Found: Personality/index
ERROR - 2019-03-02 01:08:08 --> 404 Page Not Found: Personality/index
ERROR - 2019-03-02 01:08:09 --> 404 Page Not Found: Personality/index
ERROR - 2019-03-02 01:08:10 --> 404 Page Not Found: Personality/index
ERROR - 2019-03-02 01:08:11 --> 404 Page Not Found: PosterDetail/index
ERROR - 2019-03-02 01:08:12 --> 404 Page Not Found: Personality/index
ERROR - 2019-03-02 01:08:14 --> 404 Page Not Found: Personality/index
ERROR - 2019-03-02 01:08:16 --> 404 Page Not Found: Personality/index
ERROR - 2019-03-02 01:08:16 --> 404 Page Not Found: Api/detail
ERROR - 2019-03-02 01:08:21 --> 404 Page Not Found: PosterDetail/index
ERROR - 2019-03-02 01:08:24 --> 404 Page Not Found: Personality/index
ERROR - 2019-03-02 01:08:27 --> 404 Page Not Found: Personality/index
ERROR - 2019-03-02 01:08:36 --> 404 Page Not Found: /index
ERROR - 2019-03-02 01:08:36 --> 404 Page Not Found: Personality/index
ERROR - 2019-03-02 01:08:39 --> 404 Page Not Found: Personality/index
ERROR - 2019-03-02 01:08:46 --> 404 Page Not Found: PosterDetail/index
ERROR - 2019-03-02 01:08:48 --> 404 Page Not Found: Personality/index
ERROR - 2019-03-02 01:08:50 --> 404 Page Not Found: Personality/index
ERROR - 2019-03-02 01:08:54 --> 404 Page Not Found: Images/poster
ERROR - 2019-03-02 01:08:59 --> 404 Page Not Found: Personality/index
ERROR - 2019-03-02 01:09:02 --> 404 Page Not Found: Personality/index
ERROR - 2019-03-02 01:09:04 --> 404 Page Not Found: VideoDetail/index
ERROR - 2019-03-02 01:09:05 --> 404 Page Not Found: Personality/index
ERROR - 2019-03-02 01:09:07 --> 404 Page Not Found: PosterDetail/index
ERROR - 2019-03-02 01:09:08 --> 404 Page Not Found: Personality/index
ERROR - 2019-03-02 01:09:09 --> 404 Page Not Found: PosterDetail/index
ERROR - 2019-03-02 01:35:54 --> Query error: Column 'category' cannot be null - Invalid query: INSERT INTO `contact_us_data` (`first_name`, `last_name`, `email`, `phone`, `category`, `message`, `created`) VALUES ('', 'Chad', 'chad@chadfunnels.com', '8189934866', NULL, NULL, '2019-03-02 01:35:54')
ERROR - 2019-03-02 21:28:27 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 't Look%' OR video.rel_date LIKE '%Don't Look%' OR video.video_name LIKE '%Don't ' at line 6 - Invalid query: 

               SELECT video.id,video.rel_date,video.video_name,movie.movie_name,video.play,video.liked,video.youtube_views,sub_category.subcat_name,video_map_movie.movie_id,video.subcat_id,video.video_desc,video_url.final_url,video.is_deleted FROM video
               LEFT JOIN sub_category ON sub_category.id=video.subcat_id
               LEFT JOIN video_map_movie ON video_map_movie.video_id=video.id
               LEFT JOIN movie ON movie.id=video_map_movie.movie_id
               LEFT JOIN video_url ON video_url.id=video.seo_url_id
               where video.cat_id=2 AND  is_deleted=0 AND  ( video.id LIKE '%Don't Look%' OR video.rel_date LIKE '%Don't Look%' OR video.video_name LIKE '%Don't Look%' OR movie.movie_name LIKE '%Don't Look%' OR video.play LIKE '%Don't Look%' OR video.liked LIKE '%Don't Look%' OR video.youtube_views LIKE '%Don't Look%' OR sub_category.subcat_name LIKE '%Don't Look%' OR video_map_movie.movie_id LIKE '%Don't Look%' OR video.subcat_id LIKE '%Don't Look%' OR video.video_desc LIKE '%Don't Look%' OR video_url.final_url LIKE '%Don't Look%' OR video.is_deleted LIKE '%Don't Look%' )
               ORDER BY video.rel_date desc
               LIMIT 0,10

            
