<div class="container cf">
	<div class="wrapper-full-content">
	<div class="top-wrap">
	
		<div class="page-header cf">
                    <div class="blurimg">
                        
                            <?php if($this->session->userdata('front_userdata')->img == ''){
                            ?>
                            <img src="<?php echo base_url('resources/images/no-user.svg');?>" alt="<?php echo $this->session->userdata('front_userdata')->name?>" /> 
                        <?php
                        }else{
                             if($this->session->userdata('front_userdata')->social_media == 'FB'){
                                 $str = ''.$this->session->userdata('front_userdata')->img;
                                 if(strpos($str, 'https://www.comingtrailer.com') != FALSE){
                                     $myimg  = '//graph.facebook.com/'.$this->session->userdata('front_userdata')->social_media_id.'/picture?width=9999';
                                    
                                }else{
                                    $myimg  = ''.$this->session->userdata('front_userdata')->img;
                                }
                            }else{
                                $myimg  = ''.$this->session->userdata('front_userdata')->img;
                            }
                           ?>
                            <img src="<?php echo $myimg;?>" alt="<?php echo $this->session->userdata('front_userdata')->name?>" /> 
                            <?php
                        }
                        ?>
                        
                    </div>
			<div class="profile-art">
                            <?php if($this->session->userdata('front_userdata')->img == ''){
                            ?>
                            <img src="<?php echo base_url('resources/images/no-user.svg');?>" alt="<?php echo $this->session->userdata('front_userdata')->name?>" /> 
                        <?php
                        }else{
                             if($this->session->userdata('front_userdata')->social_media == 'FB'){
                                 $str = ''.$this->session->userdata('front_userdata')->img;
                                 if(strpos($str, 'https://www.comingtrailer.com') != FALSE){
                                     $myimg  = '//graph.facebook.com/'.$this->session->userdata('front_userdata')->social_media_id.'/picture?width=9999';
                                    
                                }else{
                                    $myimg  = ''.$this->session->userdata('front_userdata')->img;
                                }
                            }else{
                                $myimg  = ''.$this->session->userdata('front_userdata')->img;
                            }
                           ?>
                            <img src="<?php echo $myimg;?>" alt="<?php echo $this->session->userdata('front_userdata')->name?>" /> 
                            <?php
                        }
                        ?>
                        </div>
			<div class="meta-info"><h1><?php echo $this->session->userdata('front_userdata')->name;?></h1>
                            <p>Join: <?php $timestamp = strtotime(''.$this->session->userdata('front_userdata')->created);
                $new_date_format = date('d M Y', $timestamp);
                echo $new_date_format?></p></div>
		</div>
		
		<ul class="language-tab">
                    <li><a href="<?php echo base_url('Me');?>">Liked</a></li>
                    <li><a href="<?php echo base_url('Me/rewandHistory');?>" >Rewards History</a></li>
			<li><a href="<?php echo base_url('Me/myReward');?>" class="active">My Reward</a></li>
		</ul>
	</div>
	<?php

                //$trailer_data = $userdata;

                $no = 1;
                
                foreach ($user_points->result_array() as $user_data) {

                if (!empty($user_data)) {    

                    $user_id = $user_data['users_id'];

                

            ?>
	<div class="content-container">
		<div class="points-wrap cf">
			<div class="left-side"><h2><?php echo $user_data['earn_points']?></h2><h3>Reward Points</h3>
                            <p class="icon-rs"><?php echo $rs = ($user_data['earn_points'] * 100)/5000;?></p><p class="note">* For Withdraw you have minimum 5000 reward points.</p></div>
			<div class="right-side"><p>Get 1000+ Point, Withdraw & Share with Friends Your Point</p>
                            <a href="https://goo.gl/yW7YvS" target="_blank" class="googleplay"></a></div>
		</div>
		
	</div>
	<div class="content-container">
		<ul class="points-list">
			<li class="cf"><label>Social Media Likes</label><p><?php echo $user_data['total_social_likes'];?> Points Earned</p></li>
			<li class="cf"><label>Invite Friends</label><p><?php echo $user_data['total_invite'];?> Points Earned</p></li>
			<li class="cf"><label>Play Video</label><p><?php echo $user_data['total_video_play'];?> Points Earned</p></li>
                        <?php if(false){?>
			<li class="cf"><label>Share Video & Poster</label><p><?php echo $user_data['total_share'];?> Points Earned</p></li>
                        <?php }?>
                        <li class="cf"><label>Likes</label><p><?php echo $user_data['total_likes'];?> Points Earned</p></li>
			<li class="cf"><label>Friends Share</label><p><?php echo $user_data['totla_frnds_share'];?> Points Earned</p></li>
		</ul>
	</div>
                <?php }}?>
	
	</div>
		
	<div class="wrapper-full-sidebar">
		<div class="sidebar-jaherat">
                    <div class="jaherat300">
                        <?php
                                $datas = json_decode($side_adv);
                                $adv_data = $datas->data;
                                foreach($adv_data as $adv){
                                if(!empty($adv)){
                                
                                    if($adv->adv_option == 'C'){
                                        echo $adv->google_code;
                                        ?>
                                
                                <?php
                                    }else{
                            ?>
                        <a href="<?php echo $adv->image_link; ?>" rel="nofollow noreferrer" target="_blank">
                                <img src="<?php echo $adv->adv_image?>" />
                        </a>
                            <?php
                                    }
                            }
                                }
                            ?>
                    </div>
                    <div class="jaherat600">
                        <?php
                                $datas = json_decode($side_big_adv);
                                $adv_data = $datas->data;
                                foreach($adv_data as $adv){
                                if(!empty($adv)){
                                
                                    if($adv->adv_option == 'C'){
                                        echo $adv->google_code;
                                        ?>
                                
                                <?php
                                    }else{
                            ?>
                        <a href="<?php echo $adv->image_link; ?>" rel="nofollow noreferrer" target="_blank">
                                <img src="<?php echo $adv->adv_image?>" />
                        </a>
                            <?php
                                    }
                            }
                                }
                            ?>
                    </div>
                </div>
	</div>
</div>