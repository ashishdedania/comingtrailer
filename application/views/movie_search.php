<p class="results-number">About <strong id="total_search_result"><?php echo $search_result->total_search_result; ?></strong> results</p>
            <div class="search-list cf">
                <ul>
                    <?php
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
                        if(isset($search_result->movie)){
                            foreach($search_result->movie as $key => $value){
                                $seo_urls = $controller->getSeoUrl($value->detail->seo_url_id);
                            ?>
                                <li class="item all movie">
                                    <div class="ct-box cf">
                                        <div class="ct-thumbnail">
                                            <a href="<?php echo $seo_urls;?>">
                                                 <?php  $filename = base_url('images/'.$images_folder['movie'].'/'.$value->detail->movie_img);
                        if(@getimagesize($filename)) {
                               ?>
                                                <img src="<?php echo base_url('images/'.$images_folder['movie'].'/'.$value->detail->movie_img); ?>" alt="<?php echo $value->detail->movie_name; ?>">
                                            <?php }else{
                            
                            ?>
                                                <img src="<?php echo base_url('resources/images/no-movie.svg'); ?>" alt="<?php echo $value->detail->movie_name; ?>" />
                                                <?php
                        }?>
                                            </a>
                                        </div>
                                        <div class="ct-content">
                                            <h3><a href="<?php echo $seo_urls;?>"><?php echo $value->detail->movie_name; ?></a></h3> 
                                            <p class="meta-info">
                                                <span><?php echo $value->s; ?> Songs</span> 
                                                <span><?php echo $value->t; ?> Trailers</span> 
                                                <span><?php echo $value->p; ?> Poster</span> 
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            <?php
                            }
                        }
                        ?>
                </ul>
            </div>


<div class="search-pager">
                <?php 
                $total_result = $search_result->total_search_result;
//                echo $total_result;exit;
//                echo $total_result.'....'.ceil($total_result / 20).'....'.$current_page;
                $total_pages = ceil($total_result / 20);
                if($total_pages != 1){
                    if($current_page != 1){
                    ?>
                        <a href="javascript:void(0)" onclick="mypage('<?php echo ($current_page-1); ?>')"><< Previous</a>
                    <?php
                    }
                    $mypage = $current_page;
                    if($total_pages < ($current_page+4)){
                        $total = $current_page+4;
                        $dif = $total - $total_pages;
                        $current_page = $current_page - $dif;
                        if($current_page<=0){
                            $current_page = $mypage;
                        }
                        
                    }
                    for($i=$current_page;$i<=($current_page+4);$i++){
                        if($total_pages >= $i){
                            ?>
                        <a href="javascript:void(0)" onclick="mypage('<?php echo $i; ?>')"><?php echo $i; ?></a>
                        <?php
                        }
                    }
                    if($current_page != $total_pages){
                        if($total_pages > $mypage){
                    ?>
                        <a href="javascript:void(0)" onclick="mypage('<?php echo ($mypage+1); ?>')">Next >></a>
                    <?php
                        }
                    }      
                    }
                ?>
            </div>
 <script type="text/javascript">
   
   function mypage(page){
        var search_keywords = '<?php echo $this->input->post('global_search_keyword'); ?>';
        var selected = '<?php echo $this->input->post('selected'); ?>';
           $.ajax({
                type:'POST',
                url:'<?php echo base_url('Search/searchTrailer/');?>'+page,
                data:'global_search_keyword='+search_keywords+'&selected='+selected,
                success:function(html){
//                    alert(html);
                    $('#content').html(html);
                    
                    
                    //start = (parseInt(start) + 5);
                    
                   // search_keyword = search_keywords;
                   
                }
            }); 
   }
   
</script>
