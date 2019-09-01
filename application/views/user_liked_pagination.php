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
                                                if($cat_id == 3){
                                                    $video_id = $trailer->poster_id;
                                                    ?>
                                                    <li><a href="<?php echo base_url() ?>PosterDetail/index/0/<?php echo $trailer->poster_id;?>">
                                                <?php echo $trailer->poster_name;?>
                                            </a>
                                            <a href="" class="icon-close"></a></li>
                                    <?php
                                                }else{
                                                    $video_id = $trailer->video_id;
                                                ?>
					<li><a href="<?php echo base_url() ?>VideoDetail/index/<?php echo $trailer->cat_id . '/0/' . $video_id; ?>">
                                                <?php echo $trailer->video_name; ?>
                                            </a>
                                            <a href="" class="icon-close"></a></li>
                                        
                                        
                                    <?php
                                                }
                                                }
                                            }
                                        }
                                    }
                                    }
                                    }
                                    ?>