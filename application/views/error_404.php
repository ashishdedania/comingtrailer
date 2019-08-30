<div class="container cf">
	<div class="wrapper-full-content">
		<div class="error-container">
                    <img src="<?php echo base_url()?>resources/images/404.gif" />
		</div>
		<div class="error-text">
			<h1>Oops!</h1>
			<p>The page you're looking for doesn't exist or has been moved.</p>
			
                        <a href="<?php echo base_url();?>">GO HOME</a>
		</div>
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
                         <a href="<?php echo $adv->image_link;?>" rel="nofollow noreferrer" target="_blank">
                                <img src="<?php echo $adv->adv_image?>" />
                        </a>
                            <?php
                                    }
                            }
                                }
                            ?>
                    </div><div class="jaherat600">
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
                                <a href="<?php echo $adv->image_link;?>" rel="nofollow noreferrer" target="_blank">
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