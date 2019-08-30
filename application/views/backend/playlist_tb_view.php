<?php include_once("common/category_view.php"); ?>
<div class="ctbody-content">
    <?php
    if (!empty($message)) {
        $msg = explode("_", $message);
        echo '<div class="alert alert-' . $msg[0] . '">
' . $msg[1] . '!
</div>';
    }
    ?>
    <div class="addcategory-total cf">
        <p  class="total-number"><span id="total_number"></span> Playlist</p>
        <a href="<?php echo base_url() . "backend/playlist/add"; ?>" class="button icon-add">Add New Playlist</a>
    </div>

    <?php include_once("common/search_view.php"); ?>

    <div class="ctlists">
        <table id="example" class="table table-bordered display" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>#</th>                    
                    <th>Date</th>
                    <th>Img</th>
                    <th>Playlist Name</th>
                    <th>Show in App</th>                    
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>    
</div>
<script type="text/javascript">
    /* Formatting function for row details - modify as you need */
    function format(d) {
        return true;
        // `d` is the original data object for the row
//        return '<table cellpadding="5" cellspacing="0" border="0" style="margin:0;">' +
//                '<tr>' +
//                '<td>' +
//                '<ul  class="open-info clear">' +
//                '<li class="cf">' +
//                '<label>Cast</label>' +
//                '<span class="dtr-data">' + d.cast + '</span>' +
//                '</li>' +
//                '<li class="cf">' +
//                '<label>Singer</label>' +
//                '<span class="dtr-data">' + d.singer + '</span>' +
//                '</li>' +
//                '<li class="cf">' +
//                '<label>Music</label>' +
//                '<span class="dtr-data"> ' + d.music + '</span>' +
//                '</li>' +
//                '<li class="cf">' +
//                '<label>Director</label>' +
//                '<span class="dtr-data"> ' + d.director + '</span>' +
//                '</li>' +
//                '<li class="cf">' +
//                '<label>&copy;</label>' +
//                '<span class="dtr-data"> ' + d.rel_by + '</span>' +
//                '</li>' +
//                '<li class="cf">' +
//                '<label>Description </label>' +
//                '<span class="dtr-data"> ' + d.description + '</span>' +
//                '</li>' +
//                '</ul>' +
//                '</tr>' +
//                '</table>';
    }
    $(document).ready(function () {
        $("#start_date").datepicker({format: 'yyyy-mm-dd'});
        $("#end_date").datepicker({format: 'yyyy-mm-dd'});
        var csrf = '<?php echo $this->security->get_csrf_hash(); ?>';
        var data = {};
        data['<?php echo $this->security->get_csrf_token_name(); ?>'] = csrf;

        $.ajaxSetup({'data': data});

        var table = $('#example').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?php echo base_url('backend/playlist/playlist_list') ?>",
                "dataType": "json",
                "type": "POST",
                "complete": function (response) {
                    $("#total_number").html(response.responseJSON.recordsFiltered);                    
                }
            },
            lengthMenu: [
                [10, 25, 50, 100, 250, 500, 1000, 2000, 3000, 4000, 5000],
                [10, 25, 50, 100, 250, 500, 1000, 2000, 3000, 4000, 5000]
            ],
            "columns": [
                {
                    "className": 'details-control1',
                    "orderable": false,                    
                    data:"number"
                },                
                {"data": "created"},
                {"data": "img"},
                {"data": "name"},
                {"data": "show_in_app"},                                
                {"data": "action"}
            ],
            "order": [[1, 'desc']]
        });

        // Add event listener for opening and closing details
        $('#example tbody').on('click', 'td.details-control1', function () {
            var tr = $(this).closest('tr');
            var row = table.row(tr);

            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            }
            else {
                // Open this row
                row.child(format(row.data())).show();
                tr.addClass('shown');
            }
        });


        $('.button-search').on('click', function (e) {
            e.preventDefault();

            var id = $(this).attr('id');
            if (id == "search_button") {
                $('#start_date').val("");
                $('#end_date').val("");
            }
            if (id == "filter_button") {
                $("#year").val("");
                $("#month").val("");
                $("#search_keyword").val("");
            }
            if ($('#start_date').val() !== "" && $('#end_date').val() !== "") {
                var startDate = new Date($('#start_date').val());
                var endDate = new Date($('#end_date').val());

                if (startDate > endDate) {
                    alert("Please ensure that the End Date is greater than or equal to the Start Date.");
                    return false;
                }
            }
            var year = $("#year option:selected").val();
            var month = $("#month option:selected").val();
            var search_keyword = $("#search_keyword").val();
            table.columns(0).search(year).columns(1).search(month).columns(2).search(search_keyword).columns(4).search($('#start_date').val()).columns(5).search($('#end_date').val()).draw();

        });

        $('#all_tab').on('click', function (e) {
            e.preventDefault();
            var status = '';
            $(".catTab").removeClass("active");
            $("#all_tab").addClass("active");
            $(".seo-bar").show();
            table.columns(3).search(status).draw();

        });

        $('#delete_tab').on('click', function (e) {
            e.preventDefault();
            var status = 'delete';
            $(".catTab").removeClass("active");
            $("#delete_tab").addClass("active");
            $(".seo-bar").hide();
            table.columns(3).search(status).draw();
        });
    });
</script>