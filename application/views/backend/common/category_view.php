<ul class="language-nav-tabs">
    <li><a href="#" id="all_tab" class="active catTab">ALL</a></li>
    <?php if(!empty($category)){ foreach($category as $row){ ?>
        <li><a href="#" id="cat_<?php echo $row['id']; ?>" class="catTab"><?php echo $row['subcat_name']; ?></a></li>
    <?php } } ?>
    <li><a href="#" id="delete_tab" class="catTab">Delete</a></li>
</ul>