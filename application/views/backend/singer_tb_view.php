<ul class="language-nav-tabs">
    <li><a href="#" id="all_tab" class="active">ALL</a></li>
    <li><a href="#" id="delete_tab" class="">Delete</a></li>
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
    <div class="addcategory-total cf">
        <p  class="total-number"><span id="total_number"></span> Singer</p>
        <a href="<?php echo base_url()."backend/singer/add"; ?>" class="button icon-add">Add New Singer</a>
    </div>

    <?php include_once("common/search_view.php"); ?>

    <div class="ctlists">
        <table id="example" class="table table-bordered display" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>Img</th>
                <th>Name</th>
                <th>Movie</th>
                <th>Video</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <?php echo form_open(base_url( 'backend/singer/save_seo_data' ), array( 'method' => 'POST' ));?>
    <input type="hidden" name="individual" value="<?php if(isset($seo_data) && !empty($seo_data)){ echo $seo_data['individual']; } ?>">
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
                "url": "<?php echo base_url('backend/singer/singer_list') ?>",
                "dataType": "json",
                "type": "POST",
                "complete": function(response) {

                    $("#total_number").html(response.responseJSON.recordsFiltered);
                }
            },
            lengthMenu: [
                [ 10, 25, 50, 100, 250, 500, 1000, 2000, 3000, 4000, 5000],
                [ 10, 25, 50, 100, 250, 500, 1000, 2000, 3000, 4000, 5000]
            ],
            "columns": [

                { "data": "number" },
                { "data": "created" },
                { "data": "img" },
                { "data": "singer_name" },
                { "data": "movie" },
                { "data": "video" },
                { "data": "action" },
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
            table.columns(0).search(year).columns(1).search(month).columns(2).search(search_keyword).columns(4).search($('#start_date').val()+"@"+$('#end_date').val()).draw();

        });



        $('#all_tab').on('click', function(e){
            e.preventDefault();
            var status='';
            $("#delete_tab").removeClass("active");
            $("#all_tab").addClass("active");
            $(".seo-bar").show();
            table.columns(3).search(status).draw();

        });

        $('#delete_tab').on('click', function(e){
            e.preventDefault();
            var status='1';
            $("#all_tab").removeClass("active");
            $("#delete_tab").addClass("active");
            $(".seo-bar").hide();
            table.columns(3).search(status).draw();
        });


    } );
</script>