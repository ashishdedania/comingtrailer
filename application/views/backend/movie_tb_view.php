
<?php include_once("common/category_view.php"); ?>

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
        <p  class="total-number"><span id="total_number"></span> Movie</p>
        <a href="<?php echo base_url()."backend/movie/add"; ?>" class="button icon-add">Add New Movie</a>
    </div>

    <?php include_once("common/search_view.php"); ?>

    <div class="ctlists">
        <table id="example" class="table table-bordered display" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>#</th>
                <th>Release Date</th>
                <th>Date</th>
                <th>Img</th>
                <th>Name</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <?php echo form_open(base_url( 'backend/movie/save_seo_data' ), array( 'method' => 'POST' ));?>
    <input type="hidden" id="sub_category_id" name="sub_category_id" value="">
    <?php include_once("common/seo_view.php"); ?>
    <?php echo form_close();?>
</div>


<script type="text/javascript">


    $(document).ready(function() {

        $("#start_date").datepicker({ format: 'yyyy-mm-dd'});
        $("#end_date").datepicker({ format: 'yyyy-mm-dd'});
        
        var csrf = '<?php echo $this->security->get_csrf_hash(); ?>';
        var data = {};
        data['<?php echo $this->security->get_csrf_token_name(); ?>'] = csrf;

        $.ajaxSetup({ 'data': data });

        var table = $('#example').DataTable( {
            "processing": true,
            "serverSide": true,
            "ajax":{
                "url": "<?php echo base_url('backend/movie/movie_list') ?>",
                "dataType": "json",
                "type": "POST",
                "complete": function(response) {

                    $("#total_number").html(response.responseJSON.recordsFiltered);
                    $("#sub_category_id").val(response.responseJSON.seo_data.sub_category_id);
                    $("#seo_name").val(response.responseJSON.seo_data.name);
                    $("#seo_title").val(response.responseJSON.seo_data.title);
                    $("#seo_description").val(response.responseJSON.seo_data.description);
                    $("#seo_keywords").val(response.responseJSON.seo_data.keywords);
                }
            },
            lengthMenu: [
                [ 10, 25, 50, 100, 250, 500, 1000, 2000, 3000, 4000, 5000],
                [ 10, 25, 50, 100, 250, 500, 1000, 2000, 3000, 4000, 5000]
            ],
            "columns": [

                { "data": "number" },
                { "data": "release_date" },
                { "data": "date" },
                { "data": "img" },
                { "data": "movie_name" },
                { "data": "category_name" },
                { "data": "action" }
            ],
            "order": [[1, 'desc']]
        } );


        $('.button-search').on('click', function(e){
            e.preventDefault();
            
            var id = $(this).attr('id');
            if(id == "search_button"){
                $('#start_date').val("");
                $('#end_date').val("");
            }
            if(id == "filter_button"){
                $("#year").val("");
                $("#month").val("");
                $("#search_keyword").val("");
            }
            if($('#start_date').val() !== "" && $('#end_date').val() !== ""){                
                var startDate = new Date($('#start_date').val());
                var endDate = new Date($('#end_date').val());
                
                if (startDate > endDate){
                    alert("Please ensure that the End Date is greater than or equal to the Start Date.");
                    return false;
                }
            }
            

            var year=$("#year option:selected").val();
            var month=$("#month option:selected").val();
            var search_keyword=$("#search_keyword").val();
            table.columns(0).search(year).columns(1).search(month).columns(2).search(search_keyword).columns(4).search($('#start_date').val()).columns(5).search($('#end_date').val()).draw();

        });

        $('#all_tab').on('click', function(e){
            e.preventDefault();
            var status='';
            $(".catTab").removeClass("active");
            $("#all_tab").addClass("active");
            $(".seo-bar").show();
            table.columns(3).search(status).draw();

        });

        $('[id^="cat_"]').click(function(e) {
            e.preventDefault();

            var id=this.id;
            $(".catTab").removeClass("active");
            $("#"+id).addClass("active");
            $(".seo-bar").show();
            table.columns(3).search(id).draw();
        });

        $('#delete_tab').on('click', function(e){
            e.preventDefault();
            var status='delete';
            $(".catTab").removeClass("active");
            $("#delete_tab").addClass("active");
            $(".seo-bar").hide();
            table.columns(3).search(status).draw();
        });


    } );
</script>