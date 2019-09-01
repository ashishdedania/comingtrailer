<div id="ctwpcontent">
	<ul class="language-nav-tabs">
		<li><a href="<?php echo base_url()?>AdmViewAllUser">ALL</a></li>
       
                <li><a href="<?php echo base_url()?>AdmViewAllUser/payoutData">PAYOUT</a></li>
                <li><a href="<?php echo base_url()?>AdmViewAllUser/WithdrawReqData">WITHDRAW REQUEST</a></li>
	</ul>
	
	<div class="ctbody-content">
		<div class="search-bar cf">
			<select class="select" name="" id="">
				<option selected="selected" disabled="disabled" value="">Year</option>
				<option value="">2017</option>
				<option value="">2016</option>
				<option value="">2015</option>
				<option value="">2014</option>
				<option value="">2013</option>
				<option value="">2012</option>
				<option value="">2011</option>
				<option value="">2010</option>
				<option value="">2009</option>
				<option value="">2008</option>
				<option value="">2007</option>
				<option value="">2006</option>
				<option value="">2005</option>
				<option value="">2004</option>
				<option value="">2003</option>
				<option value="">2002</option>
				<option value="">2001</option>
				<option value="">2000</option>
		   </select>
		   <select class="select" name="" id="">
				<option selected="selected" disabled="disabled" value="">Month</option>
				<option value="">January 01</option>
				<option value="">February 02</option>
				<option value="">March 03</option>
				<option value="">April 04</option>
				<option value="">May 05</option>
				<option value="">June 06</option>
				<option value="">July 07</option>
				<option value="">August 08</option>
				<option value="">September 09</option>
				<option value="">October 10</option>
				<option value="">November 11</option>
				<option value="">December 12</option>
		   </select>
		   <input type="text" placeholder="Search Keywords" value="" class="input-search">
		   <input type="submit" class="button-search" value="Search">
		</div>
		
		<div class="ctlists alluser">
                    <div class="table-responsive">	
			<table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

        <thead>

            <tr>

                <th>#</th>

                <th>DATE</th>

                <th>NAME</th>

                <th>NUMBER</th>

                <th>EMAIL</th>

                <th>POINT</th>

                <th>GENDER</th>

                <th>ACTION</th>

                <th>NEWSLETTER SUBSCRIBE</th>

                <th>SOCIAL MEDIA LIKES</th>

                <th>INVITE FRIENDS</th>

                <th>VIDEO PLAY</th>

                <th>VIDEO SHARE</th>

                <th>Likes</th>
                
                <th>FRIENDS SHARE</th>

                <th>EARN RS.</th>

                <th>WITHDRAW</th>

                <th>WITHDRAW</th>

                

            </tr>

        </thead>

        <tbody>

            <?php

                //$trailer_data = $userdata;

                $no = 1;
                
                foreach ($userdata->result_array() as $user_data) {

                if (!empty($user_data)) {    

                    $user_id = $user_data['users_id'];

                

            ?>

            <tr>

                <td><?php echo $no++; ?></td>

                <td><?php echo $user_data['created']; ?></td>

                <td><a href="<?php echo base_url();?>AdmOneUserInfo/index/<?php echo $user_id;?>"><?php echo $user_data['name']; ?></a></td>

                <td><?php 

                    

                    echo $user_data['mobile'];

                

                ?> </td>

                <td><?php echo $user_data['email']; ?></td>

                <td><?php echo $user_data['earn_points']; ?></td>

                <td><?php echo $user_data['gender']; ?></td>

                <td><a href="addvideo/viewTrailer/<?php echo $user_id; ?>" class="icon-view"></a></td>

                <td><?php 

                    

                    echo $controller->isInNewsLetter($user_data['email']);

                

                ?></td>

                <td><?php 

                    

                    echo $user_data['total_social_likes'];

                

                ?></td>

                <td><?php 

                    echo $user_data['total_invite'];

                

                ?></td>

                <td><?php 

                    echo $user_data['total_video_play'];

                

                ?></td>

                <td><?php 

                    echo $user_data['total_share'];

                

                ?></td>
                
                <td><?php echo $user_data['total_likes']; ?></td>

                <td><?php echo $user_data['totla_frnds_share']; ?></td>

                <td><?php echo $user_data['total_earn_rs']; ?></td>

                <td><?php 

                    

                    $paytm = $controller->getAllPayoutUserData($user_id,'paytm');

                    if($paytm->num_rows()>0){

                    foreach ($paytm->result_array() as $value) {

                        echo '(Rs '.$value['rupees'].') Paytm, '.$value['created'].'</br>';

                    }

                    }else{

                        echo 'No withdraw yet';

                    }

                 ?></td>

                <td><?php 

                    $paytm1 = $controller->getAllPayoutBankUserData($user_id,'bank');

                    if($paytm1->num_rows()>0){

                    foreach ($paytm1->result_array() as $value) {

                        echo '(Rs '.$value['rupees'].') Bank, '.$value['created'].'</br>'.

                                'Account Number: '.$value['acc_no'].'</br>'.

                                'Name: '.$value['acc_name'].'</br>'.

                                'Bank: '.$value['bank'].'</br>'.

                                'Branch: '.$value['branch'].'</br>'.

                                'IFSC Code: '.$value['ifsc_code'].'</br>';

                    }

                    }else{

                        echo 'No withdraw yet';

                    } ?></td>

                

            </tr>

            <?php

            //exit;

                }

            }

            ?>

        </tbody>

    </table>
                    </div>
			<div class="point-history cf">
				<div class="list">
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
					<ul>
						<li class="title-bar">FRIENDS SHARE</li>
                                                <?php
                                                    if(!empty($shared_friends)){
                                                        //echo print_r($invite_friends);
                                                        foreach ($shared_friends as $invited) {
                                                            
                                                            if(!empty($invited)){
                                                            
                                                            ?>
						<li><?php echo $invited['name'].' '.$invited['mobile'];?><span>Point <?php echo $invited['shared_points']?>
                                                    </span><span><?php echo $invited['date'];?></span></li>
                                                <?php
                                                            }
                                                        }
                                                    }
                                                ?>
						
					</ul>
                                       

				</div>
				<div class="list">
                                    <li class="title-bar">LIKES</li>
                                    <ul id="data_trail">
                                        <?php
                                            foreach($liked_data as $liked){
                                                if( isset( $liked['mydata'] ) ){   
                                                    $datas = json_decode($liked['mydata']);
                                                    if(!empty($datas)){
                                                        $trailer_data = array_filter($datas->data);
                                                        //print_r($trailer_data);exit;
                                                        if(!empty($trailer_data)){
                                                            foreach($trailer_data as $trailer){
                                                                // print_r($trailer);exit;
                                                                if(!empty($trailer)){
                                                                    $cat_id = $trailer->cat_id;
                                                                    if($cat_id == 3){
                                                                        $video_id = $trailer->poster_id;
                                                                         $seo_url = $controller->getSeoUrl($trailer->seo_url_id);
                                                                        ?>
                                                                        <li>
                                                                            <a href="<?php echo $seo_url;?>"> 
                                                                                <?php echo $trailer->poster_name; ?>
                                                                            </a>
                                                                            <span><?php echo date('j F Y, h:i A',strtotime($liked['user_data']['created'])); ?></span>
                                                                            <a href="<?php //echo base_url()?>UserInfo/delete/<?php //echo $video_id?>/liked" class="icon-close"></a>
                                                                        </li>
                                                                        <?php
                                                                    }else{
                                                                        $video_id = $trailer->video_id;
                                                                        $seo_url = $controller->getSeoUrl($trailer->seo_url_id);
                                                                        ?>
                                                                        <li>
                                                                            
                                                                            <a href="<?php echo $seo_url; ?>">
                                                                            <?php echo $trailer->video_name; ?>
                                                                                
                                                                            </a>
                                                                            <span><?php echo date('j F Y, h:i A',strtotime($liked['user_data']['created'])); ?></span>
                                                                        </li>
                                                                    <?php
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        ?>
                                    </ul>
				</div>
				<div class="list">
                                    <ul>
					<li class="title-bar">Video Play</li>
                                        <?php
                                            foreach($video_play as $liked){
                                                if(!empty($liked)){
                                                    $datas = json_decode($liked['mydata']);

                                                    if(!empty($datas)){
                                                        $trailer_data = array_filter($datas->data);
                                                        //print_r($trailer_data);exit;
                                                        if(!empty($trailer_data)){
                                                            foreach($trailer_data as $trailer){
                                                                if(!empty($trailer)){
                                                                    $cat_id = $trailer->cat_id;
                                                                    $video_id = $trailer->video_id;
                                                                    $seo_url = $controller->getSeoUrl($trailer->seo_url_id);
                                                                    ?>
                                                                    <li>
                                                                        <a href="<?php echo $seo_url; ?>">
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
                                        ?>	
                                    </ul>
				</div>
				<div class="list">
                                    <ul>
					<li class="title-bar">Invite Friends</li>
                                        <?php
                                                if(!empty($invite_friends)){
                                                    //echo print_r($invite_friends);
                                                    foreach ($invite_friends as $invited) {

                                                        if(!empty($invited)){

                                                        ?>
                                                    <li><?php echo $invited['user_name'];?>
                                                        <span><?php echo $invited['date'];?></span>
                                                    </li>

                                            <?php
                                                        }
                                                    }
                                                }
                                            ?>
                                    </ul>
                                    
				</div>
                            </div>
                        </div>
		
            <div class="page-bar cf" style="display: none;">
			<div class="pages cf">
		   		<label>1-10 of 100</label>
		   		<a href="" class="icon-previous"></a>
		   		<a href="" class="icon-next"></a>
		   </div>
		   <div class="show-rows">
			<label>Show rows:</label>
			<select class="select" name="" id="">
				<option value="">10</option>
				<option value="">25</option>
				<option value="">50</option>
				<option value="">100</option>
				<option value="">250</option>
				<option value="">500</option>
				<option value="">1000</option>
				<option value="">2500</option>
		   </select>
		   </div>
		</div>
		
	</div>
	
</div>
<script>
    $(document).ready(function() {
        $('table.nowrap').DataTable();
        
        $('a[data-toggle="tab"]').on( 'shown.bs.tab', function (e) {
            
            $.fn.dataTable.tables( {visible: true, api: true} ).columns.adjust();
        });
    } );
</script>