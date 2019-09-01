<?php 
                //print_r($movie);
$nodata = '';
                    foreach ($movie as $value) {
                       // print_r($movie);exit;
                        if($table == 'movie'){
                            if(strlen($value[$table.'_name']) > 0){
                                $nodata = 'yes';
                            }
                        }else if($table == 'released_by'){
                            if(strlen($value['rel_by_name']) > 0){
                                $nodata = 'yes';
                            }
                        }else{
                            if(strlen($value[$table.'_name']) > 0){
                                $nodata = 'yes';
                            }
                        }
                        if($nodata == 'yes'){
                        ?>
                        <li>
<!--                            <a href="#<?php //echo $value[$table.'_id'];?>" name="names">
                                <?php //echo $value[$table.'_name'];?>
                            </a>-->
                            <?php if($table == 'movie'){
                                $seo_urls = $controller->getSeoUrl($value['seo_url_id']);
                                ?>
                            <a href="<?php echo $seo_urls;?>" name="names">
                                <?php echo $value[$table.'_name'];?>
                            </a>
                            <?php if(isset($value['rel_date'])){
                                
                                ?>
                            <a href="javascript:void(0)" class="year" onclick="selectYear('<?php $time=strtotime($value['rel_date']); echo date('Y',$time);?>')"><?php $time=strtotime($value['rel_date']); if($value['rel_date'] != '0000-00-00'){echo date('Y',$time);}?></a>
                            <?php }?>
                            <?php }else if($table == 'released_by'){
                                $seo_urls = $controller->getSeoUrl($value['seo_url_id']);
                                ?>
                            <a href="<?php echo $seo_urls.'/song';?>" name="names">
                                <?php echo $value['rel_by_name'];?>
                            </a>
                            <?php
                                
                            }else{
                                $seo_urls = base_url()."personality/".str_replace(" ", "-", str_replace(["(", ")"], "", $value[$table . '_name']));//$controller->getSeoUrl($value['seo_url_id']);
                                ?>
                            <a href="<?php echo $seo_urls;?>" name="names">
                                <?php echo $value[$table.'_name'];?>
                            </a>
                            <?php
                            }
?>
                        </li>
                        <?php
                        }
                    }
                    
                    if($nodata == ''){
                        echo '<span class="no-data-found">No Data Found</span>';
                    }
                    
                ?>