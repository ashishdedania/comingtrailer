<div class="seo-bar">
    <div class="cf">
        <p>Seo</p>
        <a data-target="#openclose" data-toggle="collapse" class="arrow icon-arrow-drop-down"></a>
    </div>
    <div class="open-info collapse" id="openclose">
        <div class="input-wrap">
            <label>Name</label>
            <div class="cf"><input type="text" id="seo_name" name="name" value="<?php if(isset($seo_data) && !empty($seo_data)){ echo $seo_data['name']; }?>" class="input-field full-field"></div>
        </div>
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