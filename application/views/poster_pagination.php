<?php
$nodata = '';
                                $datas = json_decode($poster);
                                $no = 1;
                                        if(!empty($datas)){
                                            $trailer_data = $datas->data;
                                            foreach($trailer_data as $trailer){
                                                if(!empty($trailer)){
                                                    $poster_id = $trailer->poster_id;
                                                    $seo_urls = $controller->getSeoUrl($trailer->seo_url_id);
                                                    $nodata = 'yes';
                                                    //echo $video_id;
                                                    ?>
                                                    <li class="item">
                                                        <div class="ct-box">
                                                            <div class="ct-thumbnail"><a href="<?php echo $seo_urls; ?>" class="zoom"></a> 
                                                                
                                                                    <?php
                                                                        foreach($trailer->poster_img as $img){
                                                                        ?>
                                                                            <a href="<?php echo $seo_urls; ?>">
                                                                                <?php  $filename = $img->poster_img;
                        if(@getimagesize($filename)) {
                               ?>
                                                                            <img src="<?php echo $img->poster_img?>" alt="<?php echo $trailer->poster_name; ?>" />
                                                                        <?php }else{
                            
                            ?>
                                                <img src="<?php echo base_url('resources/images/no-image.svg');; ?>" alt="<?php echo $trailer->poster_name; ?>" />
                                                <?php
                        }?>    
                                                                            </a>
                                                                        <?php
                                                                            break;
                                                                        }
                                                                    ?>
                                                                
                                                            </div>
                                                            <div class="ct-content"><h3><a href="<?php echo $seo_urls; ?>">
                                                                <?php echo $trailer->poster_name;?></a></h3> 
                                                                <p class="meta-info"> 
                                                                    <span><?php echo $trailer->total_views; ?> views</span>

                                                                    <span><?php echo $trailer->total_likes; ?> likes</span> 
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <?php 
                                                    $no++;
                                                }
                                            }
                                            
                                        }
                                       
        if($no >=50 ){
        ?>
            <!-- <div class="show-more"><a href="javascript:void(0)" id="showmore">Show more</a></div> -->
        <?php }
                                        if($nodata == ''){
                                            //echo '<span class="no-data-found">No Data Found</span>';
                                        }
                                   
                            ?>
            <script>
                
//                 $(document).ready(function(){
    
    
//     $('#showmore').on('click',function(){
        
//         $('#showmore').text('Loading...');
      
//             search_month = $('#search_month').val();
//             search_year = $('#search_year').val();
//             if(search_year == null){
//                 search_year = '';
//             }
//             if(search_month == null){
//                 search_month = '';
//             }
      
//             $.ajax({
//                 type:'POST',
//                 url:'<?php //echo base_url('MoviePoster/showMore');?>',
//                 data:'cat_id='+cat_id+'&subcat_id='+subcat_id+'&start='+start+'&search_keyword='+search_keyword+'&search_year='+search_year+'&search_month='+search_month,
//                 success:function(html){
// //                    alert(html.length);
//                 if(html.length != 62){
//                     $('#showmore').css('display','none');
//                     document.getElementById("showmore").remove();
//                     $('#video_trail').append(html);
                    
//                 }else{
//                     $('#showmore').css('display','none');
//                 }
                
//                     $('#showmore').text('Show More');
                    
//                     start = (parseInt(start) + 50);
                    
                    
                   
//                 }
//             }); 

//     });
    
// });
                
                </script>