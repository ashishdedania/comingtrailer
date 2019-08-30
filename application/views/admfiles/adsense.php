
<div id="ctwpcontent">
    <div class="ctbody-content">
        <div class="adsense-info">
            <?php
                foreach($adsense as $index=>$row){
                ?>
                    <form method="post" name="register_form" enctype="multipart/form-data" onSubmit="return validateImg('<?php echo $row['id']; ?>');" novalidate action="<?php echo base_url('Adsense/edit/'.$row['id']); ?>">
                        <div class="block">
                            <p class="title">
                                <?php
                                
                                $media = '';
                                if($row['id'] == 5){
                                    $media = $row['media'].' - AMP';
                                }else if($row['id'] == 6){
                                    $media = $row['media'].' - AMP';
                                }else{
                                    $media = $row['media'];
                                }
                                
                                    echo $row['width'].'x'.$row['height'].' ('.$media.')';
                                ?>
                            </p>
                            <div class="inside-box cf">
                                <input type="radio" name="show_opt_<?php echo $row['id']; ?>" class="radio-button" value="C" <?php echo $row['selected_show_opt'] =='C' ? 'checked':'' ?>>
                                <textarea name="code_<?php echo $row['id']; ?>" class="code" rows="10" cols="40"><?php echo $row['code']; ?></textarea>
                            </div>
                            <div class="inside-box cf">
                                <input type="radio" class="radio-button" name="show_opt_<?php echo $row['id']; ?>" value="I" <?php echo $row['selected_show_opt'] =='I' ? 'checked':'' ?>>
                                <div class="image-wrap">
                                    <input type="file" value="" onChange="validateImg('<?php echo $row['id']; ?>')" id="img_name_<?php echo $row['id']; ?>" name="img_name_<?php echo $row['id']; ?>" class="attach-file" size="30">
                                    <span id='img_name_err_<?php echo $row['id']; ?>'></span>
                                    <?php 
                                        if($row['img_name']){
                                        ?>
                                        <div class="image"> 
<!--                                            height="<?php //echo $row['height']; ?>" width="<?php //echo $row['width'];?>" -->
                                            <img src="<?php echo base_url('images/jaherat/'.$row['img_name']);?>" alt="No Image"/>
                                            <a href="<?php echo base_url('Adsense/deleteAdImg/'.$row['id'].'/'.$row['img_name']);?>" onclick="return confirm('Are You Sure To Delete This Image')" class="delete">DELETE</a>
                                        </div>
                                        <div class="input-wrap">
                                            <label>Image Link</label>
                                            <input value="<?php echo $row['img_link'];?>" name ="img_link_<?php echo $row['id']; ?>" class="input-field full-field" type="text">
                                        </div>
                                    
                                        <?php
                                        }
                                    ?>
                                </div>
                                <input type="submit" class="button" value="Save">
                            </div>
                        </div>
                    </form>    
                <?php
                }
            ?>
        </div>		
    </div>
</div>    
<script type="text/javascript">
    function validateImg(addsense_id = ''){
        if(addsense_id && $('#img_name_'+addsense_id).val()){
            var valid_img_type = ['jpg','jpeg','png','gif','JPG','JPEG','PNG','GIF'];
            var file_name = $('#img_name_'+addsense_id).val().split('\\').pop();
            var file_ext = file_name.split('.').pop();
            if(jQuery.inArray(file_ext,valid_img_type) > -1){
                $('#img_name_err_'+addsense_id).html('');
                //$('#preview_profile_img').attr('src',URL.createObjectURL(event.target.files[0]));
                return true;
            }else{
                $('#img_name_err_'+addsense_id).html('Invalid Image Type');
                return false;
            }
        }
    }
 </script>