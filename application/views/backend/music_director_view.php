<div class="ctbody-content">
    <?php
    if (!empty($message)) {
        $msg = explode("_", $message);
        echo '<div class="alert alert-' . $msg[0] . '">' . $msg[1] . '! </div>';
    }
    ?>
    <?php if (!empty($edit_data)) { ?>
        <div class="addcategory-total cf">
            <p class="total-number"><span id="movie_total">0</span> Movies</p>
            <p class="total-number"><span id="trailer_total">0</span> Trailers</p>
            <p class="total-number"><span id="song_total">0</span> Songs</p>
            <a target="_blank" href="<?php
            if (!empty($edit_data)) {
                echo $edit_data['final_url'];
            }
            ?>" class="view-website">View in Website</a>
        </div>
        <?php } ?>

    <div class="user-profile cf">
        <?php echo form_open_multipart((!empty($edit_data)) ? base_url('backend/music_director/update') : base_url('backend/music_director/save'), array('method' => 'POST')); ?>
        <?php if (!empty($edit_data)) { ?>
            <input type="hidden" name="id" value="<?php echo $edit_data['id']; ?>">
<?php } ?>
        <div class="image-name">
            <img src="<?php echo (!empty($edit_data) && !empty($edit_data['music_img'])) ? base_url() . "images/music/" . $edit_data['music_img'] : base_url() . 'images/no-user.svg'; ?>" alt=""  id="img">
            <input type="file" name="user_file"  size="30" onchange="readURL(this);">

        </div>
        <div class="info-block">
            <div class="input-wrap">
                <label>Name</label>
                <div class="cf"><input type="text" name="name" value="<?php
if (!empty($edit_data)) {
    echo $edit_data['music_name'];
}
?>" required="" class="input-field"></div>
            </div>
            <div class="input-wrap">
                <label>Title</label>
                <div class="cf"><input type="text" name="title" value="<?php
if (!empty($edit_data)) {
    echo $edit_data['music_title'];
}
?>" class="input-field"></div>
            </div>
            <div class="input-wrap">
                <label>description</label>
                <div class="cf"><textarea class="description" name="description" rows="10" cols="40"><?php
                    if (!empty($edit_data)) {
                        echo $edit_data['music_desc'];
                    }
                    ?></textarea></div>
            </div>
            <div class="input-wrap">
                <label>keywords</label>
                <div class="cf"><input type="text" name="keyword" value="<?php
                    if (!empty($edit_data)) {
                        echo $edit_data['music_keywords'];
                    }
                    ?>" class="input-field"></div>
            </div>

    <?php if (!empty($edit_data)) { ?>
                <input type="submit" name="submit" class="button" value="Update">
                <a href="<?php echo base_url() . "backend/music_director/status?id=" . $edit_data['id']; ?>" class="button delete">delete</a>
    <?php } ?>
        </div>
    </div>
<?php if (empty($edit_data)) { ?>
        <input type="submit" name="submit" class="button-blue" value="publish">
<?php } ?>
<?php echo form_close(); ?>

<?php if (!empty($edit_data)) { ?>
    <?php include_once("common/search_view.php"); ?>
<?php } ?>

</div>
<?php if (!empty($edit_data)) { ?>
    <?php include_once("common/movie_detail_list_view.php"); ?>
    <?php include_once("common/trailer_detail_list_view.php"); ?>
    <?php include_once("common/video_detail_list_view.php"); ?>
<?php } ?>
<script type="application/javascript">
    function readURL(input) {
    if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
    $('#img')
    .attr('src', e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
    }
    }
</script>
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

    var trailer_table;
    var video_table;
    $(document).ready(function () {

        $("#start_date").datepicker({format: 'yyyy-mm-dd'});
        $("#end_date").datepicker({format: 'yyyy-mm-dd'});

        var csrf = '<?php echo $this->security->get_csrf_hash(); ?>';
        var data = {};
        data['<?php echo $this->security->get_csrf_token_name(); ?>'] = csrf;

        $.ajaxSetup({'data': data});

        video_table = $('#video-example').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?php echo base_url('backend/detail/video_list') ?>",
                "dataType": "json",
                "type": "POST",
                "data": {
                    music_director: "<?php echo $edit_data['id']; ?>"

                },
                "complete": function (response) {
                    $("#song_total").html(response.responseJSON.recordsFiltered);
                    $('#video-example [data-toggle="popover"]').popover();
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
        $('#video-example tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = video_table.row(tr);

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


        trailer_table = $('#trailer-example').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?php echo base_url('backend/detail/trailer_list') ?>",
                "dataType": "json",
                "type": "POST",
                "data": {
                    music_director: "<?php echo $edit_data['id']; ?>"

                },
                "complete": function (response) {
                    $("#trailer_total").html(response.responseJSON.recordsFiltered);
                    $('#trailer-example [data-toggle="popover"]').popover();
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
        $('#trailer-example tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = trailer_table.row(tr);

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


        var movie_table = $('#movie-example').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?php echo base_url('backend/detail/movie_list') ?>",
                "dataType": "json",
                "type": "POST",
                "data": {
                    music_director: "<?php echo $edit_data['id']; ?>"

                },
                "complete": function (response) {
                    $("#movie_total").html(response.responseJSON.recordsFiltered);
                }
            },
            lengthMenu: [
                [10, 25, 50, 100, 250, 500, 1000, 2000, 3000, 4000, 5000],
                [10, 25, 50, 100, 250, 500, 1000, 2000, 3000, 4000, 5000]
            ],
            "columns": [
                {"data": "number"},
                {"data": "release_date"},
                {"data": "date"},
                {"data": "img"},
                {"data": "movie_name"},
                {"data": "category_name"},
                {"data": "action"}
            ],
            "order": [[1, 'desc']]
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

            video_table.columns(0).search(year).columns(1).search(month).columns(2).search(search_keyword).columns(3).search($('#start_date').val()).columns(4).search($('#end_date').val()).draw();
            trailer_table.columns(0).search(year).columns(1).search(month).columns(2).search(search_keyword).columns(3).search($('#start_date').val()).columns(4).search($('#end_date').val()).draw();
            movie_table.columns(0).search(year).columns(1).search(month).columns(2).search(search_keyword).columns(3).search($('#start_date').val()).columns(4).search($('#end_date').val()).draw();

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
                    $(thiselem).attr('onchange', 'remove_from_playlist(' + thiselem + ',' + video_id + ',' + playlist_id + ');return false;');
                    $(thiselem).children('input').prop('checked', true);
                    var id = $('a[aria-describedby="' + $(thiselem).parents("div.popover:first").attr('id') + '"]').closest('table').attr('id');
                    if (id == 'trailer-example') {
                        trailer_table.draw();
                    } else {
                        video_table.draw();
                    }
                    $('div.popover').remove();
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
                    $(thiselem).attr('onchange', 'add_to_playlist(' + thiselem + ',' + video_id + ',' + playlist_id + ');return false;');
                    $(thiselem).children('input').prop('checked', false);
                    var id = $('a[aria-describedby="' + $(thiselem).parents("div.popover:first").attr('id') + '"]').closest('table').attr('id');
                    if (id == 'trailer-example') {
                        trailer_table.draw();
                    } else {
                        video_table.draw();
                    }
                    $('div.popover').remove();
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
                            var id = $('a[aria-describedby="' + $(thiselem).parents("div.popover:first").attr('id') + '"]').closest('table').attr('id');
                            if (id == 'trailer-example') {
                                trailer_table.draw();
                            } else {
                                video_table.draw();
                            }
                            $('div.popover').remove();
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
