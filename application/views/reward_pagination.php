
			<div class="list-rh">
					<ul>
						<li class="title-bar">Social Media Likes</li>
                                                
						 <?php
                                                    foreach($social_share as $liked){
                                                        if(!empty($liked)){
                                                             ?>
                                                <li><?php echo $liked['shared_with'];?> Share <span><?php echo $liked['date'];?></span></li>
                                                <?php
                                                        }
                                                    }
						?>
                                                 <?php
                                                    foreach($social_follow as $liked){
                                                        if(!empty($liked)){
                                                             ?>
                                                <li><?php echo $liked['shared_with'];?> Follow <span><?php echo $liked['date'];?></span></li>
                                                <?php
                                                        }
                                                    }
						?>
                                                 <?php
                                                    foreach($social_subs as $liked){
                                                        if(!empty($liked)){
                                                             ?>
                                                <li><?php echo $liked['shared_with'];?> Subscribe <span><?php echo $liked['date'];?></span></li>
                                                <?php
                                                        }
                                                    }
						?>
					</ul>
					
				</div>
				
				<div class="list-rh">
					<ul>
						<li class="title-bar">Invite Friends</li>
                                                <?php
                                                    if(!empty($invite_friends)){
//                                                        echo print_r($invite_friends);
                                                        $is_myinner = 0;
                                                        foreach ($invite_friends as $invited) {
                                                            
                                                            if(!empty($invited)){
                                                            
                                                            ?>
                                                	<li><?php echo $invited['user_name'];?>
                                                            <span><?php echo $invited['date'];?></span>
                                                        </li>

                                                <?php
                                                            }else{
                                                                if($is_myinner == 0){
                                                                ?>
                                                                <span><?php echo 'No Data Found';?></span>
                                                                <?php
                                                                $is_myinner = 1;
                                                                }
                                                            }
                                                        }
                                                    }else{
                                                        ?>
                                                        <span><?php echo 'No Data Found';?></span>
                                                        <?php
                                                    }
                                                ?>
						
					</ul>
				</div>
				
				<div class="list-rh">
					<ul>
						<li class="title-bar">Video Play</li>
                                                <?php
                                         $is_outer = 0;       
                                    foreach($video_play as $liked){
                                        if(!empty($liked)){
                                    $datas = json_decode($liked['mydata']);
                                    //print_r($datas);exit;
                                    
                                    if(!empty($datas)){
                                        $trailer_data = array_filter($datas->data);
                                        //print_r($trailer_data);exit;
                                        if(!empty($trailer_data)){
                                            $is_inner = 0;
                                        foreach($trailer_data as $trailer){
                                           // print_r($trailer);exit;
                                            if(!empty($trailer)){
                                                $is_outer = 1;
                                                $cat_id = $trailer->cat_id;
                                                //echo $video_id;
                                                
                                                    $video_id = $trailer->video_id;
                                                    ?>
						<li><a href="<?php echo base_url() ?>VideoDetail/index/<?php echo $trailer->cat_id . '/0/' . $video_id; ?>">
                                                    <?php echo $trailer->video_name; ?>
                                                </a>
                                                    <span><?php echo $liked['date'];?></span>
                                                </li>
                                                <?php
                                            }
                                                }
                                            }
                                        }
                                    }
                                    }
                                    
                                    if($is_outer == 0){
                                        ?>
                                        <span><?php echo 'No Data Found';?></span>
                                        <?php
                                       
                                        }
                                    
                                    ?>
						
					</ul>
				</div>

<div class="list-rh">
    <ul>
						<li class="title-bar">SHARE POINT WITH FRIENDS</li>
                                                <?php
                                                    if(!empty($shared_friends)){
                                                        //echo print_r($invite_friends);
                                                        $is_shared_in = 0;
                                                        foreach ($shared_friends as $invited) {
                                                            
                                                            if(!empty($invited)){
                                                            
                                                            ?>
						<li><?php echo $invited['name'].' '.$invited['mobile'];?><span>Point <?php echo $invited['shared_points']?>
                                                    </span><span><?php echo $invited['date'];?></span></li>
                                                <?php
                                                            }else{
                                                                if($is_shared_in == 0){
                                                                ?>
                                                                <span><?php echo 'No Data Found';?></span>
                                                                <?php
                                                                $is_shared_in = 1;
                                                                }
                                                            }
                                                        }
                                                    }else{
                                                                ?>
                                                                <span><?php echo 'No Data Found';?></span>
                                                                <?php
                                                            }
                                                ?>
						
					</ul>
    
    
</div>


				<?php if(false){?>
				<div class="list-rh">
					<ul>
						<li class="title-bar">Video & Poster Share</li>
                                                <?php
                                                
                                    foreach($video_share as $liked){
                                        if(!empty($liked)){
                                    $datas = json_decode($liked['mydata']);
                                    //print_r($datas);exit;
                                    
                                    if(!empty($datas)){
                                        $trailer_data = array_filter($datas->data);
//                                        print_r($trailer_data);exit;
                                        if(!empty($trailer_data)){
                                        foreach($trailer_data as $trailer){
                                           // print_r($trailer);exit;
                                            if(!empty($trailer)){
                                                
                                                $cat_id = $trailer->cat_id;
                                                if($cat_id == 1){
                                                    $isvideo = 'Video';
                                                }else if($cat_id == 2){
                                                    $isvideo = 'Video';
                                                }else if($cat_id == 3){
                                                    $isvideo = 'Poster';
                                                }
                                                $seo_urls = $controller->getSeoUrl($trailer->seo_url_id);
                                                //echo $video_id;
                                                if($cat_id == 3){
                                                   $video_id = $trailer->poster_id; 
                                                   $video_name = $trailer->poster_name; 
                                                }else{
                                                    $video_id = $trailer->video_id;
                                                    $video_name = $trailer->video_name; 

                                                }
                                                    ?>
						<li>(<?php echo $isvideo.' on '. $liked['shared_with'];?>) <a href="<?php echo $seo_urls; ?>">
                                                    <?php echo $video_name; ?>
                                                </a>
                                                    <span><?php echo $liked['date'];?></span>
                                                </li>
                                                <?php
                                            }
                                                }
                                            }
                                        }
                                    }
                                    }
                                    ?>
						
					</ul>
				</div>
                                <?php } ?>
		