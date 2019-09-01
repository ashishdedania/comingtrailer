<div class="container cf">
    <div class="wrapper-full-content">
        <div class="top-wrap">
            <div class="page-header cf">
                <div class="blurimg">
                     <?php 
                    if($table == 'relby'){
                        $filename = base_url('images/channel/'.$individual_detail['rel_by_img']);
                        if(@getimagesize($filename)) {
                               ?>
                           <img id="image" src="<?php echo base_url('images/channel/'.$individual_detail['rel_by_img']); ?>" alt="<?php echo trim($individual_detail['rel_by_name']);?>" /> 
                           <?php
                               }else{
                               ?>
                           <img id="image" src="<?php echo base_url('resources/images/no-movie.svg'); ?>" alt="<?php echo trim($individual_detail['rel_by_name']);?>" /> 
                               <?php
                           }
                    }else{
                        if($table == 'cast'){
                            $directory = 'actors';
                        }else if($table == 'singer'){
                            $directory = 'singers';
                        }else if($table == 'director'){
                            $directory = 'directors';
                        }else if($table == 'music'){
                            $directory = 'music';
                        }
                        
//                        if (@getimagesize($filename)) {
//                        echo  'image exists';
//                        } else {
//                        echo  'image does not exist';
//                        }exit; 
                        $filename = base_url('images/'.$directory.'/'.$individual_detail[$table.'_img']);
                        if(@getimagesize($filename)) {
                        ?>
                    <img id="image" src="<?php echo base_url('images/'.$directory.'/'.$individual_detail[$table.'_img']); ?>" alt="<?php echo trim($individual_detail[$table.'_name']);?>" /> 
                    <?php
                        }else{
                        ?>
                    <img id="image" src="<?php echo base_url('resources/images/no-user.svg'); ?>" alt="<?php echo trim($individual_detail[$table.'_name']);?>" /> 
                        <?php
                    }
                    }
                        ?> 
                </div>
                <div class="profile-art">
                    <?php 
                    if($table == 'relby'){
                        $filename = base_url('images/channel/'.$individual_detail['rel_by_img']);
                        if(@getimagesize($filename)) {
                               ?>
                           <img id="image" src="<?php echo base_url('images/channel/'.$individual_detail['rel_by_img']); ?>" alt="<?php echo trim($individual_detail['rel_by_name']);?>" /> 
                           <?php
                               }else{
                               ?>
                           <img id="image" src="<?php echo base_url('resources/images/no-movie.svg'); ?>" alt="<?php echo trim($individual_detail['rel_by_name']);?>" /> 
                               <?php
                           }
                    }else{
                        if($table == 'cast'){
                            $directory = 'actors';
                        }else if($table == 'singer'){
                            $directory = 'singers';
                        }else if($table == 'director'){
                            $directory = 'directors';
                        }else if($table == 'music'){
                            $directory = 'music';
                        }
                        
//                        if (@getimagesize($filename)) {
//                        echo  'image exists';
//                        } else {
//                        echo  'image does not exist';
//                        }exit; 
                        $filename = base_url('images/'.$directory.'/'.$individual_detail[$table.'_img']);
                        if(@getimagesize($filename)) {
                        ?>
                    <img id="image" src="<?php echo base_url('images/'.$directory.'/'.$individual_detail[$table.'_img']); ?>" alt="<?php echo trim($individual_detail[$table.'_name']);?>" /> 
                    <?php
                        }else{
                        ?>
                    <img id="image" src="<?php echo base_url('resources/images/no-user.svg'); ?>" alt="<?php echo trim($individual_detail[$table.'_name']);?>" /> 
                        <?php
                    }
                    }
                        ?> 
                </div>
                <div class="meta-info">
                    <h1>
                        <?php 
                        if($table == 'relby'){
                            echo trim($individual_detail['rel_by_name']);
                        }else{
                            echo trim($individual_detail[$table.'_name']);
                        }
                        if($this->session->userdata('admLoggedId')){ 
                            $edit_link_map_arr = [
                                                "music" => "backend/music_director/edit?id=",
                                                "cast" => "backend/actor/edit?id=",
                                                "singer" => "backend/singer/edit?id=",
                                                "director" => "backend/director/edit?id=",
                                                "relby" => "backend/channel/edit?id="
                                            ]; 

                            if(!($table == 'movie' && $mstp=='m')){
                            ?>
                                <a href="<?php echo base_url($edit_link_map_arr[$table].$id); ?>" class="icon-edit" target="blank">Edit</a>
                        <?php 
                            }
                        } 
                            ?>
                    </h1>
                    <p>
                        <?php if(!($table == 'relby')){?>
                        <span><?php echo $total['Movie']; ?> Movies</span>
                        <?php } ?>
                        <span><?php echo $total['Song']; ?> Songs</span>
                        <?php if($table != 'singer'){?>
                        <span><?php echo $total['Trailer']; ?> Trailers</span>
                        <?php }?>
                        <?php if($table != 'music' && $table != 'singer' && $table != 'relby'){ ?>
                        <span><?php echo $total['Poster']; ?> Poster</span>
                        <?php }?>
                    </p>
                    
                    
                    <?php echo $item_prop; ?>
                    
                </div>
            </div>
            <ul class="language-tab">
                <?php if(!($table == 'relby')){?>
                <li><a href="<?php echo $controller->getSeoUrl($individual_detail['seo_url_id']); ?>" class="<?php echo $label == 'Movie' ? 'active' :''; ?>">Movie</a></li>
                <?php } ?>
                <li><a href="<?php echo $controller->getSeoUrl($individual_detail['seo_url_id']).'/song'; ?>" class="<?php echo $label == 'Song' ? 'active' :''; ?>">Song </a></li>
                 <?php if($table != 'singer'){?>
                <li><a href="<?php echo $controller->getSeoUrl($individual_detail['seo_url_id']).'/trailer'; ?>" class="<?php echo $label == 'Trailer' ? 'active' :''; ?>">Trailer </a></li>
                 <?php }?>
                <?php if($table != 'music' && $table != 'singer' && $table != 'relby'){ ?>
                <li><a href="<?php echo $controller->getSeoUrl($individual_detail['seo_url_id']).'/poster'; ?>" class="<?php echo $label == 'Poster' ? 'active' :''; ?>">poster</a></li>
                <?php }?>
            </ul>
        </div>
        <div class="search-bar cf">
            <select class="select" name="" onchange="searchMSTP()" id="search_year">
                <option value="">Year</option>
                <?php
                                            
                    foreach($year_list as $i){
                        $selected = ($this->input->post('search_year') && $this->input->post('search_year') == $i['year']) ? 'selected' : '';  
                        echo '<option value="' . $i['year'] . '" '.$selected.'>' . $i['year'] . '</option>';
                    }
                ?>
            </select>

            <select class="select" name="" onchange="searchMSTP()" id="search_month">
                <option value="">Month</option>
                <?php
                    for($i = 1; $i <= 12; $i++){
                        if($i<10){
                            $no = '0'.$i;
                        }else{
                            $no = $i;
                        }
                        $dateObj = DateTime::createFromFormat('!m', $i);
                        $monthName = $dateObj->format('F');
                        $selected = ($this->input->post('search_month') && $this->input->post('search_month') == $i) ? 'selected' : '';  
                        echo '<option value="' . $i . '" '.$selected.'>' . $monthName .' '.$no. '</option>';
                    }
                ?>
            </select>
            <div class="catalog-menu">
                <?php 
                    foreach (range('A', 'Z') as $char) {
                        echo '<a id="data_'.$char.'" href="javacript:void(0)" onclick="return searchMSTP(\''.$char.'\')">'.$char.'</a>';
                    }
                ?>
                <a id="data_0-9" href="javacript:void(0)" onclick="return searchMSTP('0-9')">0-9</a>
            </div>
        </div>
        <div class="content-container">
            <h2><?php // echo $label; ?></h2>
            <div class="list-wrap cf">
               
                <div class="list">
                    <ul id="search-data">
                        <?php
                            $mstp_data = '';
                            $nm_col = $mapped_table.'_name';
                            
                            foreach($mstp_detail as $key => $val){
                                $seo_urls = $controller->getSeoUrl($val['seo_url_id']);
                                $link_value = '';
                               if($mstp == 'm'){
                                   $link_value = 'movieIndividual/index/';
                               }else if($mstp == 's'){
                                   $link_value = 'VideoDetail/index/2/0/';
                               }else if($mstp == 't'){
                                   $link_value = 'VideoDetail/index/1/0/';
                               }else if($mstp == 'p'){
                                   $link_value = 'PosterDetail/index/0/';
                               }
                                
                                if($mstp == 'm'){
                                    $time=strtotime($val['rel_date']);
                                    $dates = '';
                                    if($val['rel_date'] != '0000-00-00'){
                                        if($val['rel_date'] != ''){
                                            $dates = date('Y',$time);
                                            
                                        }
                                        
                                    }
                                    $mstp_data .= '<li><a href="' . $seo_urls. '">' . $val[$nm_col] . '</a><a href="javascript:void(0)" onclick="selectYear('.$dates.');" class="year">'.$dates.'</a></li>';
                                    ?>
                                    
                        <?php
                       
                                }else{
                                    $mstp_data .= '<li><a href="' . $seo_urls. '">' . $val[$nm_col] . '</a></li>';
                                }
                            }
                            echo trim($mstp_data,', ');
                        ?>

                    </ul>
                </div>
                </div>
                </div>
            </div>
    <div class="wrapper-full-sidebar">
        <div class="sidebar-jaherat">
            <div class="jaherat300">
                <?php
                    $datas = json_decode($head_adv);
                    $adv_data = $datas->data;
                    foreach($adv_data as $adv){
                        if(!empty($adv)){

                            if($adv->adv_option == 'C'){
                                echo $adv->google_code;
                            }else{
                            ?>
                                <a href="<?php echo $adv->image_link;?>" rel="nofollow noreferrer" target="_blank">
                                <img src="<?php echo $adv->adv_image ?>" />
                                </a>
                            <?php
                            }
                        }
                    }
                ?>
            </div>
            <div class="jaherat600">
                <?php
                    $datas = json_decode($side_adv);
                    $adv_data = $datas->data;
                    foreach($adv_data as $adv){
                        if(!empty($adv)){

                            if($adv->adv_option == 'C'){
                                echo $adv->google_code;
                            }else{
                            ?>
                            <a href="<?php echo $adv->image_link;?>" rel="nofollow noreferrer" target="_blank">
                                <img src="<?php echo $adv->adv_image ?>" />
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

<script type="text/javascript">
    var last_search = '';
    var keywords = '';
    function searchMSTP(search_keyword=''){
        var search_param = {};
            if($('#search_year').val()){
                search_param['search_year'] = $('#search_year').val();
        }
                if($('#search_month').val()){
                    search_param['search_month'] = $('#search_month').val();
                }
            if(search_keyword){
                
                $("#data_"+last_search).removeClass("active");
                 $("#data_"+search_keyword).addClass("active");
                 keywords = search_keyword;
                search_param['search_keyword'] = search_keyword;
            }
            $.ajax({
                url : "<?php echo base_url('individual/searchMSTP/'.$table.'/'.$id.'/'.$mstp); ?>",
                type: "POST",
                data : search_param,
                async: false,
                success: function(data, textStatus, jqXHR){
                    last_search = search_keyword;
                    $('#search-data').html(data);
                },error: function(jqXHR, textStatus, errorThrown) {
                    //if fails      
                }
            });

        return false;
    }
    
function selectYear(year){  
    //Get select object
//   alert('done');
    var objSelect = document.getElementById("search_year");

    //Set selected
    //setSelectedValue(objSelect, "10");

 
        for (var i = 0; i < objSelect.options.length; i++) {
//            alert((objSelect.options[i].text == year));
            if (objSelect.options[i].text == year) {
//                alert('done'+objSelect.options[i].text+'...'+year);
                objSelect.options[i].selected = true;
                searchMSTP(keywords);
                return;
            }
        }
    }
    
</script>