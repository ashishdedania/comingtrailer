<div id="ctwpcontent">
    <?php echo $this->session->flashdata('msg'); ?>
    <ul class="language-nav-tabs">
        <li>
            <a href="<?php echo base_url().''.$uri_page;?>/index/<?php echo $cat_id;?>/0" class="<?php if($subcat_id == 0){ echo 'active';}?>">
                All
            </a>
        </li>
        <?php
            foreach ($subcat as $value) {
        ?>
                <li>
                    <a href="<?php echo base_url().''.$uri_page;?>/index/<?php echo $cat_id;?>/<?php echo $value['sub_id'];?>" class="<?php if($subcat_id == $value['sub_id']){ echo 'active';}?>">
                        <?php echo $value['sub_name'];?>
                    </a>
                </li>
        <?php
            }
        ?>
        <li><a href="<?php echo base_url($this->router->fetch_class());?>/deleted/poster" class="">DELETE</a></li>    
    </ul>
<?php
    $this->load->view('posterdetails');
?>
</div>
<script>
    $(document).ready(function() {
        $('table.nowrap').DataTable();
        $('a[data-toggle="tab"]').on( 'shown.bs.tab', function (e) {
            $.fn.dataTable.tables( {visible: true, api: true} ).columns.adjust();
        });
    } );
</script>