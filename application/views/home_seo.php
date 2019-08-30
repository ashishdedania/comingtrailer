<div id="ctwpcontent">
<div class="ctbody-content">
    
    
     <div class="seo-bar">
        <div class="cf">
            <p>Seo</p>
            <a href="javacript:void(0)" class="arrow icon-arrow-drop-down"></a>
        </div>
        <div class="open-info" >
            <form method="post" name="seo_form" action="<?php echo base_url('HomeSeo/edit/'); ?>">    
<!--                <div class="input-wrap">
                    <label>Name</label>
                    <div class="cf"><input type="text" name="name" required value="<?php //echo $seo['name']; ?>" class="input-field full-field"></div>
                </div>-->
                <div class="input-wrap">
                    <label>TITLE</label>
                    <div class="cf"><input type="text" value="<?php echo $seo['title']; ?>" name="title" class="input-field full-field"></div>
                </div>
                <div class="input-wrap">
                    <label>description</label>
                    <div class="cf"><textarea name="description" class="description" rows="10" cols="40"><?php echo $seo['description']; ?></textarea></div>
                </div>
                <div class="input-wrap">
                    <label>keywords</label>
                    <div class="cf"><input type="text" value="<?php echo $seo['keywords']; ?>"  name="keywords" class="input-field full-field"></div>
                </div>
                <!--<input type="hidden" name="category_name" value="<?php //echo 'getAllTrailer'; ?>">-->
                <input type="submit" class="button" value="Save">
            </form>    
        </div>
    </div>
</div>
</div>