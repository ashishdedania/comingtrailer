<ul class="language-nav-tabs">
    <li><a href="#" class="active">Partnership</a></li>
    <li><a href="<?php echo base_url()."backend/partnership/form_data"; ?>" class="">Form Data</a></li>
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
        <div class="seo-bar">
            <div class="cf">
                <p>Partnership</p>
                <a href="#" class="arrow icon-arrow-drop-down"></a>
            </div>
            <div class="open-info">
                <?php echo form_open(base_url( 'backend/partnership/save' ), array( 'method' => 'POST' ));?>
                <div class="input-wrap">
                    <label>Content</label>
                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                    <div class="cf"><textarea class="input-field full-field" id="txtEditor" name="content" style="height:300px" required=""><?php echo $data['partnership_content']; ?></textarea></div>
                </div>
                <input type="submit" class="button" value="Save" name="submit">
                <?php echo form_close();?>
            </div>
        </div>
    </div>

    <?php echo form_open(base_url( 'backend/partnership/save_seo_data' ), array( 'method' => 'POST' ));?>
    <input type="hidden" name="individual" value="<?php echo $seo_data['individual']; ?>">
    <?php include_once("common/seo_view.php"); ?>
    <?php echo form_close();?>


</div>