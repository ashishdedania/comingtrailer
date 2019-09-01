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
//                                echo $myimg;exit;
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
                    <li><a href="<?php echo base_url('Me');?>" class="active">Liked</a></li>
                    <li><a href="<?php echo base_url('Me/rewandHistory');?>">Rewards History</a></li>
			<li><a href="<?php echo base_url('Me/myReward');?>">My Reward</a></li>
		</ul>
	</div>
	
	<div class="search-bar cf">
            <select class="select" name="" id="search_year" onchange="getdataByYear()">
				<option selected="selected" disabled="disabled" value="">Year</option>
				 <?php
                    foreach($year_list as $i){
                        $selected = ($this->input->post('search_year') && $this->input->post('search_year') == $i['year']) ? 'selected' : '';  
                        echo '<option value="' . $i['year'] . '" '.$selected.'>' . $i['year'] . '</option>';
                    }
                ?>
		   </select>
		
            <select class="select" name="" id="search_month" onchange="getdataByMonth()">
                <option selected="selected" disabled="true" value="">Month</option>
				<option value="1">January 01</option>
				<option value="2">February 02</option>
				<option value="3">March 03</option>
				<option value="4">April 04</option>
				<option value="5">May 05</option>
				<option value="6">June 06</option>
				<option value="7">July 07</option>
				<option value="8">August 08</option>
				<option value="9">September 09</option>
				<option value="10">October 10</option>
				<option value="11">November 11</option>
				<option value="12">December 12</option>
		   </select>
		   
		<div class="catalog-menu">
                    <a href="javascript:void(0)" class="" onclick="getdata('a')" id="menu_a">a</a>
			<a href="javascript:void(0)" class="" onclick="getdata('b')" id="menu_b">b</a>
			<a href="javascript:void(0)" class="" onclick="getdata('c')" id="menu_c">c</a>
			<a href="javascript:void(0)" class="" onclick="getdata('d')" id="menu_d">d</a>
			<a href="javascript:void(0)" class="" onclick="getdata('e')" id="menu_e">e</a>
			<a href="javascript:void(0)" class="" onclick="getdata('f')" id="menu_f">f</a>
			<a href="javascript:void(0)" class="" onclick="getdata('g')" id="menu_g">g</a>
			<a href="javascript:void(0)" class="" onclick="getdata('h')" id="menu_h">h</a>
			<a href="javascript:void(0)" class="" onclick="getdata('i')" id="menu_i">i</a>
			<a href="javascript:void(0)" class="" onclick="getdata('j')" id="menu_j">j</a>
			<a href="javascript:void(0)" class="" onclick="getdata('k')" id="menu_k">k</a>
			<a href="javascript:void(0)" class="" onclick="getdata('l')" id="menu_l">l</a>
			<a href="javascript:void(0)" class="" onclick="getdata('m')" id="menu_m">m</a>
			<a href="javascript:void(0)" class="" onclick="getdata('n')" id="menu_n">n</a>
			<a href="javascript:void(0)" class="" onclick="getdata('o')" id="menu_o">o</a>
			<a href="javascript:void(0)" class="" onclick="getdata('p')" id="menu_p">p</a>
			<a href="javascript:void(0)" class="" onclick="getdata('q')" id="menu_q">q</a>
			<a href="javascript:void(0)" class="" onclick="getdata('r')" id="menu_r">r</a>
			<a href="javascript:void(0)" class="" onclick="getdata('s')" id="menu_s">s</a>
			<a href="javascript:void(0)" class="" onclick="getdata('t')" id="menu_t">t</a>
			<a href="javascript:void(0)" class="" onclick="getdata('u')" id="menu_u">u</a>
			<a href="javascript:void(0)" class="" onclick="getdata('v')" id="menu_v">v</a>
			<a href="javascript:void(0)" class="" onclick="getdata('w')" id="menu_w">w</a>
			<a href="javascript:void(0)" class="" onclick="getdata('x')" id="menu_x">x</a>
			<a href="javascript:void(0)" class="" onclick="getdata('y')" id="menu_y">y</a>
			<a href="javascript:void(0)" class="" onclick="getdata('z')" id="menu_z">z</a>
			<a href="javascript:void(0)" class="" onclick="getdata('0-9')" id="menu_0-9">0-9</a>
		</div>
	</div>
	
	<div class="content-container">
		<div class="list-wrap cf">
			<div class="list">
				<ul id="data_trail">
                                    <?php
                                    foreach($liked_data as $liked){
                                     if( isset( $liked['mydata'] ) ){   
                                    $datas = json_decode($liked['mydata']);
                                    //print_r($datas);exit;
                                    
                                    if(!empty($datas)){
                                        $trailer_data = array_filter($datas->data);
                                        //print_r($trailer_data);exit;
                                        if(!empty($trailer_data)){
                                        foreach($trailer_data as $trailer){
                                           // print_r($trailer);exit;
                                            if(!empty($trailer)){
                                                
                                                $cat_id = $trailer->cat_id;
                                                //echo $video_id;
                                                $seo_urls = $controller->getSeoUrl($trailer->seo_url_id);
                                                if($cat_id == 3){
                                                    $video_id = $trailer->poster_id;
                                                    ?>
                                                    <li><a href="<?php echo $seo_urls;?>">
                                                <?php echo $trailer->poster_name;?>
                                            </a>
                                                        <a href="<?php echo base_url()?>UserInfo/delete/<?php echo $video_id?>/liked/<?php echo $cat_id;?>" class="icon-close"></a></li>
                                    <?php
                                                }else{
                                                    $video_id = $trailer->video_id;
                                                ?>
					<li><a href="<?php echo $seo_urls; ?>">
                                                <?php echo $trailer->video_name; ?>
                                            </a>
                                            <a href="<?php echo base_url()?>UserInfo/delete/<?php echo $video_id?>/liked/<?php echo $cat_id;?>" class="icon-close"></a></li>
                                        
                                        
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
			
		</div>
	</div>
	</div>
		
	<div class="wrapper-full-sidebar">
		<div class="sidebar-jaherat"><div class="jaherat300">
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
                    </div></div>
	</div>
</div>
<script>
    var search_keyword = '';
    var search_month = '';
    var search_year = '';
function getdataByYear(){
    
    getdata(search_keyword);

}

function getdataByMonth(){
    
    getdata(search_keyword);

}

function getdata(search_keywords){

        if(search_keywords != ''){
            document.getElementById("menu_"+search_keywords).className = "active";
        }
        if((search_keyword != '') && (search_keyword != search_keywords)){
            document.getElementById("menu_"+search_keyword).className = "";
        }
        search_keyword = search_keywords;
            search_month = $('#search_month').val();
            search_year = $('#search_year').val();
            if(search_year == null){
                search_year = '';
            }
            if(search_month == null){
                search_month = '';
            }
      
//            if(search_month != ''){
//                if(search_year == ''){
//                    alert('First select year');
//                    //$("#search_month select").val("111");
//                    $('#search_month option').eq(0).prop('selected', true);
//                    return;
//                }
//            }
      
            $.ajax({
                type:'POST',
                url:'<?php echo base_url('UserInfo/searchData');?>',
                data:'search_keyword='+search_keyword+'&search_year='+search_year+'&search_month='+search_month,
                success:function(html){
                    //alert(html);
                    $('#data_trail').html(html);
                    
                    
                    //start = (parseInt(start) + 5);
                    
                    search_keyword = search_keywords;
                   
                }
            }); 

}
    
</script>