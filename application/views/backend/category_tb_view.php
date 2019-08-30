<div style="margin-left: 10px;margin-top: 10px;" class="dashboard-button cf">
    <div  class="cf"> 
        <a href="<?php echo base_url()."backend/home/seo"; ?>" class="button">
            <span>Home SEO</span>
        </a>
    </div>

    <div class="add-new cf"> 
        <a href="<?php echo base_url()."backend/movie/add"; ?>" class="button">Add new Movie</a>
        <a href="<?php echo base_url()."backend/actor/add"; ?>" class="button">Add new Actor</a>
        <a href="<?php echo base_url()."backend/singer/add"; ?>" class="button">Add new Singer</a>
        <a href="<?php echo base_url()."backend/director/add"; ?>" class="button">Add new Director</a>
        <a href="<?php echo base_url()."backend/music_director/add"; ?>" class="button">Add new Music Director</a>
        <a href="<?php echo base_url()."backend/channel/add"; ?>" class="button">Add new Channel</a>
    </div>
</div>
<div class="ctbody-content">
<?php
if(!empty($message)){
    $msg=explode("_",$message);
    echo '<div class="alert alert-'.$msg[0].'">
'.$msg[1].'!
</div>';
}
?>
    <div class="addcategory-total cf">
        <p class="total-number"><?php echo (count($category_list)); ?> Category</p>
        <a href="<?php echo base_url()."backend/category/add"; ?>" class="button icon-add">Add New Sub Category</a>
    </div>


    <div class="ctlists">
        <table id="example" class="table table-bordered display" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>Main Category</th>
                <th>Sub Category</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                <?php if(!empty($category_list)) {  $temp=1;  foreach($category_list as $row){  ?>
                    <tr>
                        <td><?php echo $temp; ?></td>
                        <td><?php echo $row['created']; ?></td>
                        <td><?php echo $row['cat_name']; ?></td>
                        <td><?php echo $row['subcat_name']; ?></td>
                        <td>
                            <?php if($row['cat_map_subcat_id'] > 26){ ?>
                            <a onclick="return confirm('Are You Sure You Want To Delete?')" href='<?php echo base_url()."backend/category/delete?cat_id=".$row['cat_id']."&subcat_id=".$row['subcat_id']; ?>' class='icon-delete'></a>
                            <?php }else{ echo "-"; } ?>                
                        </td>
                    </tr>
                <?php $temp++; } } ?>
            </tbody>
        </table>
    </div>

</div>


<script type="text/javascript">
 
    $(document).ready(function() {

        var table = $('#example').DataTable({
            "processing": true,
            lengthMenu: [
                [ 10, 25, 50, -1, -1, -1, -1, -1, -1, -1, -1 ],
                [ 10, 25, 50, 100, 250, 500, 1000, 2000, 3000, 4000, 5000]
            ]
        });


    } );
</script>