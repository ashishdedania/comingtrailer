<ul class="language-nav-tabs">
    <li><a href="#" class="active">Category</a></li>
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
                <a href="#" class="arrow icon-arrow-drop-down"></a>
            </div>
            <div class="open-info">
                <?php echo form_open(base_url( (!empty($edit_data))? 'backend/category/update' : 'backend/category/save' ), array( 'method' => 'POST' ));?>
                <input type="hidden" name="id" value="<?php if(!empty($edit_data)){ echo $edit_data['id']; } ?>">


                <div class="input-wrap">
                    <label>Main Category</label>
                    <div class="cf">
                        <select name="main_category" class="form-control" id="main_category">
                            <option value="0">Select a Main Category</option>
                            <?php  if(!empty($category)){ foreach ($category as $key => $value) { ?>
                            <option <?php if(!empty($edit_data) && $value['id']==$edit_data['cat_id']){ echo "selected";} ?>  value="<?php echo $value['id']; ?>"><?php echo $value['cat_name']; ?></option>
                            <?php } }  ?>
                        </select> 
                    </div>
                </div>
                
                <div class="input-wrap">
                    <label>Category Name</label>
                    <div class="cf"><input type="text" class="input-field full-field" id="category_name" name="category_name" value="<?php if(!empty($edit_data)){ echo $edit_data['subcat_name']; } ?>"  required=""></div>
                </div>

            </div>
        </div>
    </div>

    <?php if(!empty($edit_data) && !empty($seo_data)){ ?>
    <input type="hidden" name="category_id" value="<?php echo $seo_data['category_id']; ?>">
    <input type="hidden" name="sub_category_id" value="<?php echo $seo_data['sub_category_id']; ?>">
    <?php }  ?>
    <?php include_once("common/seo_view.php"); ?>
    <?php echo form_close();?>

</div>