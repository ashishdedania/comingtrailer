<ul class="language-nav-tabs">
    <li><a href="#" class="active">Home</a></li>
</ul>

<div class="ctbody-content">
    <?php
    if(!empty($message)){
        $msg=explode("_",$message);
        echo '<div class="alert alert-'.$msg[0].'">
'.$msg[1].'!
</div>';
    }
    ?>

    <div class="content-page">
        <?php echo form_open(base_url( 'backend/home/save_seo_data' ), array( 'method' => 'POST' ));?>
        <input type="hidden" name="id" value="<?php if(!empty($seo_data)){ echo $seo_data['id']; } ?>">
        <div class="seo-bar">
            <div class="cf">
                <p>Seo</p>
                <a href="#" class="arrow icon-arrow-drop-down"></a>
            </div>
            <div class="open-info">
              
                <div class="input-wrap">
                    <label>TITLE</label>
                    <div class="cf"><input type="text" id="seo_title" name="title" value="<?php if(isset($seo_data) &&!empty($seo_data)){ echo $seo_data['title']; }?>" class="input-field full-field"></div>
                </div>
                <div class="input-wrap">
                    <label>description</label>
                    <div class="cf"><textarea name="description" id="seo_description" class="description" rows="10" cols="40"><?php if(isset($seo_data) &&!empty($seo_data)){ echo $seo_data['description']; } ?></textarea></div>
                </div>
                <div class="input-wrap">
                    <label>keywords</label>
                    <div class="cf"><input type="text" id="seo_keywords" name="keywords" value="<?php if(isset($seo_data) &&!empty($seo_data)){ echo $seo_data['keywords']; } ?>" class="input-field full-field"></div>
                </div>
                <input type="submit" class="button" value="Save">
            </div>
        </div>
        <?php echo form_close();?>
    </div>

</div>