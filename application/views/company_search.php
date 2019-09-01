<p class="results-number">About <strong id="total_search_result"><?php echo $search_result->total_search_result; ?></strong> results</p>
            <div class="search-list cf">
                <ul>
                     <?php
                    
//                        print_r($search_result);exit;
                        $individual = array('released_by');
                        $images_folder = array(
                                            'cast'=>'actors',
                                            'director'=>'directors',
                                            'movie'=>'movies',
                                            'music'=>'music',
                                            'poster'=>'poster',
                                            'video'=>'videothumb',
                                            'singer'=>'singers',
                                            'released_by'=>'channel'
                                        );
                        if($search_result->total_search_result>0){
                            foreach($individual as $k => $v){
                                if(isset($search_result->$v)){
                                foreach($search_result->$v as $key => $value){
                                    $seo_urls = $controller->getSeoUrl($value->detail->seo_url_id);
                                ?>
                                    <li class="item all <?php echo $v;?>">
                                        <div class="ct-box cf">
                                            <div class="ct-thumbnail">
                                                
                                                <?php $temp = 'rel_by_img'; ?>
                                                <a href="<?php echo $seo_urls;?>">
                                                     <?php  $filename = base_url('images/'.$images_folder[$v].'/'.$value->detail->$temp);
                        if(@getimagesize($filename)) {
                               ?>
                                                    <img src="<?php echo base_url('images/'.$images_folder[$v].'/'.$value->detail->$temp); ?>" alt="<?php $temp = 'rel_by_name'; echo $value->detail->$temp; ?>">
                                                 <?php }else{
                            
                            ?>
                                                <img src="<?php echo base_url('resources/images/no-user.svg'); ?>" alt="<?php $temp = 'rel_by_name'; echo $value->detail->$temp; ?>" />
                                                <?php
                        }?>
                                                
                                                </a>
                                            </div>
                                            <div class="ct-content">
                                                <h3><a href="<?php echo $seo_urls;?>"><?php $temp = 'rel_by_name'; echo $value->detail->$temp; ?></a></h3> 
                                                <p class="meta-info">
                                                    <span><?php echo $value->s; ?> Songs</span> 
                                                    <span><?php echo $value->t; ?> Trailers</span>
                                                    <?php if($v != 'music' && $v != 'singer'){ ?>
                                                    <!--<span><?php //echo $value->p; ?> Poster</span>--> 
                                                    <?php }?>
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                <?php
                                }
                                }
                            }
                        }
                    ?> 
                    
                </ul>
            </div>
<div class="search-pager">
                <?php 
                $total_result = $search_result->total_search_result;
                //echo $search_result->total_search_result;exit;
                $total_pages = ceil($total_result / 20);
               //echo $total_pages;exit;
                if($total_pages > 0){
                if($total_pages != 1){
                    if($current_page != 1){
                    ?>
    <a href="javascript:void(0)" onclick="page('<?php echo ($current_page-1)?>')"><< Previous</a>
                    <?php
                    }
                    
                    
                    for($i=$current_page;$i<=($current_page+4);$i++){
                        echo '<a href="javascript:void(0)" class="'.($i == $current_page ? 'current' :'').'" onclick="page('.$i.')">'.$i.'</a>';
                    }
                    if($current_page != $total_pages){
                    ?>
                        <a href="javascript:void(0)" onclick="page('<?php echo ($current_page+1)?>')">Next >></a>
                    <?php
                    }      
                    }
                }
                ?>
            </div>
 <script type="text/javascript">
   
   function page(page){
        var search_keywords = '<?php echo $this->session->userdata('global_search_keyword'); ?>';
           $.ajax({
                type:'POST',
                url:'<?php echo base_url('Search/searchTrailer/');?>'+page,
                data:'global_search_keyword='+search_keywords,
                success:function(html){
//                    alert(html);
                    $('#content').html(html);
                    
                    
                    //start = (parseInt(start) + 5);
                    
                   // search_keyword = search_keywords;
                   
                }
            }); 
   }
   
</script>

