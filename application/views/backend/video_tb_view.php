
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
        <p  class="total-number"><span id="total_number"></span> Video Song</p>
        <a href="<?php echo base_url() . "backend/video/add"; ?>" class="button icon-add">Add New Video</a>
    </div>

    <?php include_once("common/search_view.php"); ?>

    <div class="ctlists">
        <table id="example" class="table table-bordered display" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Movie</th>
                    <th>Play</th>
                    <th>Like</th>
                    <th>Youtube Views</th>
                    <th>Category</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <?php echo form_open(base_url('backend/video/save_seo_data'), array('method' => 'POST')); ?>
    <input type="hidden" id="sub_category_id" name="sub_category_id" value="">
    <?php include_once("common/seo_view.php"); ?>
    <?php echo form_close(); ?>
</div>


<script type="text/javascript">
    /* Formatting function for row details - modify as you need */
    function format(d) {
        // `d` is the original data object for the row
        return '<table cellpadding="5" cellspacing="0" border="0" style="margin:0;">' +
                '<tr>' +
                '<td>' +
                '<ul  class="open-info clear">' +
                '<li class="cf">' +
                '<label>Cast</label>' +
                '<span class="dtr-data">' + d.cast + '</span>' +
                '</li>' +
                '<li class="cf">' +
                '<label>Singer</label>' +
                '<span class="dtr-data">' + d.singer + '</span>' +
                '</li>' +
                '<li class="cf">' +
                '<label>Music</label>' +
                '<span class="dtr-data"> ' + d.music + '</span>' +
                '</li>' +
                '<li class="cf">' +
                '<label>Director</label>' +
                '<span class="dtr-data"> ' + d.director + '</span>' +
                '</li>' +
                '<li class="cf">' +
                '<label>&copy;</label>' +
                '<span class="dtr-data"> ' + d.rel_by + '</span>' +
                '</li>' +
                '<li class="cf">' +
                '<label>Description </label>' +
                '<span class="dtr-data"> ' + d.description + '</span>' +
                '</li>' +
                '</ul>' +
                '</tr>' +
                '</table>';
    }

    var table;
    $(document).ready(function () {
        $("#start_date").datepicker({format: 'yyyy-mm-dd'});
        $("#end_date").datepicker({format: 'yyyy-mm-dd'});

        var csrf = '<?php echo $this->security->get_csrf_hash(); ?>';
        var data = {};
        data['<?php echo $this->security->get_csrf_token_name(); ?>'] = csrf;

        $.ajaxSetup({'data': data});

        table = $('#example').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?php echo base_url('backend/video/video_list') ?>",
                "dataType": "json",
                "type": "POST",
                "complete": function (response) {

                    $("#total_number").html(response.responseJSON.recordsFiltered);
                    $("#sub_category_id").val(response.responseJSON.seo_data.sub_category_id);
                    $("#seo_name").val(response.responseJSON.seo_data.name);
                    $("#seo_title").val(response.responseJSON.seo_data.title);
                    $("#seo_description").val(response.responseJSON.seo_data.description);
                    $("#seo_keywords").val(response.responseJSON.seo_data.keywords);
                    $('[data-toggle="popover"]').popover();
                }
            },
            lengthMenu: [
                [10, 25, 50, 100, 250, 500, 1000, 2000, 3000, 4000, 5000],
                [10, 25, 50, 100, 250, 500, 1000, 2000, 3000, 4000, 5000]
            ],
            "columns": [
                {
                    "className": 'details-control',
                    "orderable": false,
                    "defaultContent": ''
                },
                {"data": "created"},
                {"data": "video_name"},
                {"data": "video_thumb"},
                {"data": "movie_name"},
                {"data": "play"},
                {"data": "like"},
                {"data": "youtube_views"},
                {"data": "category_name"},
                {"data": "action"}
            ],
            "order": [[1, 'desc']]
        });

        // Add event listener for opening and closing details
        $('#example tbody').on('click', 'td.details-control', function () {
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

        $('[id^="cat_"]').click(function (e) {
            e.preventDefault();

            var id = this.id;
            $(".catTab").removeClass("active");
            $("#" + id).addClass("active");
            $(".seo-bar").show();
            table.columns(3).search(id).draw();
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
    function add_to_playlist(thiselem, video_id, playlist_id) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>backend/playlist/add_to",
            dataType: 'json',
            data: {video_id: video_id, playlist_id: playlist_id},
            success: function (response) {
                if (response.response == true) {
                    $(thiselem).attr('onchange', 'remove_from_playlist(this,' + video_id + ',' + playlist_id + ');return false;');
                    $(thiselem).prop('checked',true);
                    $('div.popover').remove();
                    table.draw();
                } else {
                    alert(response.message);
                }
            }
        });
    }
    function remove_from_playlist(thiselem, video_id, playlist_id) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>backend/playlist/remove_from",
            dataType: 'json',
            data: {video_id: video_id, playlist_id: playlist_id},
            success: function (response) {
                if (response.response == true) {
                    $(thiselem).attr('onchange', 'add_to_playlist(this,' + video_id + ',' + playlist_id + ');return false;');
                    $(thiselem).prop('checked', false);
                    $('div.popover').remove();
                    table.draw();
                } else {
                    alert(response.message);
                }
            }
        });
    }
    function create_playlist(thiselem) {
        if ($(thiselem).val() != '') {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>backend/playlist/create",
                dataType: 'json',
                data: {playlist_name: $(thiselem).val(), id: $(thiselem).attr('id')},
                success: function (response) {
                    if (response.response == true) {
                        if (response.message == '') {
                            var parent = $(thiselem).parent('div').prev('hr').prev('div.list').children('ul');
                            $(parent).append('<li><input onchange="remove_from_playlist(this,' + $(thiselem).attr('id') + ',' + response.id + ');return false;" type="checkbox"> <span>' + $(thiselem).val() + '</span></li>');
                            $(thiselem).val('');
                            $('div.popover').remove();
                            table.draw();
                        } else {
                            alert(response.message);
                        }
                    } else {
                        alert(response.message);
                    }
                }
            });
        }
    }
    function playlistli(thiselem) {
        $(thiselem).children('input').trigger('change');
    }
</script>