<style type="text/css">
    .select2-container--default .select2-results>.select2-results__options {
    max-height: 350px;
    overflow-y: auto;
}
</style>
<div class="ctbody-content">
    <?php
    if (!empty($message)) {
        $msg = explode("_", $message);
        echo '<div class="alert alert-' . $msg[0] . '">' . $msg[1] . '! </div>';
    }
    ?>
    <?php if (!empty($edit_data)) { ?>
        <div class="addcategory-total cf">
            <p class="total-number"><span id="trailer_total">0</span> Trailers</p>
            <p class="total-number"><span id="song_total">0</span> Songs</p>
            <p class="total-number"><span id="poster_total">0</span> Posters</p>
            <a target="_blank" href="<?php
            if (!empty($edit_data)) {
                echo $edit_data['final_url'];
            }
            ?>" class="view-website">View in Website</a>
        </div>
    <?php } ?>

    <div class="user-profile cf">
        <?php echo form_open_multipart((!empty($edit_data)) ? base_url('backend/movie/update') : base_url('backend/movie/save'), array('method' => 'POST', 'id' => 'form_check')); ?>
        <?php if (!empty($edit_data)) { ?>
            <input type="hidden" name="id" value="<?php echo $edit_data['id']; ?>">
        <?php } ?>
        <div class="image-name">
            <img src="<?php echo (!empty($edit_data) && !empty($edit_data['movie_img'])) ? base_url() . "images/movies/" . $edit_data['movie_img'] : base_url() . 'assets/images/no-image.svg'; ?>" alt=""  id="img">
            <input type="file" name="user_file"  size="30" onchange="readURL(this);">
        </div>
        <div class="info-block">
            <div class="input-wrap">
                <label>Name</label>
                <div class="cf">
                    <input type="text" required="" name="movie_name" value="<?php
                    if (!empty($edit_data)) {
                        echo $edit_data['movie_name'];
                    }
                    ?>" required class="input-field">
                </div>
            </div>
            <div class="input-wrap">
                <label>Title</label>
                <div class="cf"><input type="text" name="movie_title" value="<?php
                    if (!empty($edit_data)) {
                        echo $edit_data['movie_title'];
                    }
                    ?>" class="input-field"></div>
            </div>
            <div class="input-wrap">
                <label>description</label>
                <div class="cf"><textarea class="description" name="movie_desc" rows="10" cols="40"><?php
                        if (!empty($edit_data)) {
                            echo $edit_data['movie_desc'];
                        }
                        ?></textarea></div>
            </div>
            <div class="input-wrap">
                <label>keywords</label>
                <div class="cf"><input type="text" value="<?php
                    if (!empty($edit_data)) {
                        echo $edit_data['movie_keywords'];
                    }
                    ?>" name="movie_keywords" class="input-field"></div>
            </div>
            <div class="date-category cf">
                <div class="date-wrap cf">
                    <label>Date</label>
                    <input type="text" required="" id="rel_date" name="rel_date" 
                           value="<?php
                           if (!empty($edit_data) &&
                                   date("d M Y", strtotime($edit_data['rel_date'])) != "30 Nov -0001" &&
                                   date("d-m-Y", strtotime($edit_data['rel_date'])) != "01-01-1970") {
                               echo $edit_data['rel_date'];
                           }
                           ?>" 
                           placeholder="DD-MM-YYYY" class="input-field datepic">
                </div>

                <div class="date-wrap cf">
                    <label>Release Date</label>
                    <input type="text" id="my_release" name="my_release" 
                           value="<?php
                           if (!empty($edit_data) &&
                                   date("d M Y", strtotime($edit_data['my_release'])) != "30 Nov -0001" &&
                                   date("d-m-Y", strtotime($edit_data['my_release'])) != "01-01-1970") {
                               echo $edit_data['my_release'];
                           }
                           ?>" 
                           placeholder="DD-MM-YYYY" class="input-field datepic">
                </div>
            </div>

            <div class="input-wrap">
                <div class="category-wrap cf">
                    <label>category</label>
                    <?php
                    if (!empty($category)) {
                        foreach ($category as $row) {
                            ?>
                            <div class="language">
                                <span><?php echo $row['subcat_name']; ?></span>
                                <input type="checkbox" <?php
                                if (!empty($edit_data) && in_array($row['id'], explode(",", $edit_data['subcat_id']))) {
                                    echo "checked";
                                }
                                ?> name="category_id[]" value="<?php echo $row['id']; ?>" class="checkbox">
                            </div>
                            <?php
                        }
                    }
                    ?>

                </div>
            </div>

            <div class="input-wrap">
                <label>Cast</label>
                <div class="cf">
                    <select style="width: 100%" id="cast" name="cast[]" multiple class="personality js-data-example-ajax">
                    </select>
                    <div class="tagchecklist cf">
                        <?php
                        if (!empty($cast_list) && !empty($edit_data)) {
                            foreach ($cast_list as $row) {
                                ?>
                                <span>
                                    <a href="<?php echo base_url() . "backend/movie/remove_map_data?id=" . $row['id'] . "&type=cast"; ?>" class="icon-close"></a>
                                    <?php echo $row['name']; ?>
                                </span>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="input-wrap">
                <label>singers</label>
                <select style="width: 100%" id="singers" name="singers[]" multiple class="personality js-data-example-ajax">
                </select>
                <div class="tagchecklist cf">
                    <?php
                    if (!empty($singer_list) && !empty($edit_data)) {
                        foreach ($singer_list as $row) {
                            ?>
                            <span>
                                <a href="<?php echo base_url() . "backend/movie/remove_map_data?id=" . $row['id'] . "&type=singer"; ?>" class="icon-close"></a>
                                <?php echo $row['name']; ?>
                            </span>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="input-wrap">
                <label>Music by</label>
                <div class="cf">
                    <select style="width: 100%" id="music" name="music[]" multiple class="personality js-data-example-ajax">
                    </select>
                </div>
                <div class="tagchecklist cf">
                    <?php
                    if (!empty($music_list) && !empty($edit_data)) {
                        foreach ($music_list as $row) {
                            ?>
                            <span>
                                <a href="<?php echo base_url() . "backend/movie/remove_map_data?id=" . $row['id'] . "&type=music"; ?>" class="icon-close"></a>
                                <?php echo $row['name']; ?>
                            </span>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="input-wrap">
                <label>Director</label>
                <div class="cf">
                    <select style="width: 100%" id="director" name="director[]" multiple class="personality js-data-example-ajax">
                    </select>
                </div>
                <div class="tagchecklist cf">
                    <?php
                    if (!empty($director_list) && !empty($edit_data)) {
                        foreach ($director_list as $row) {
                            ?>
                            <span>
                                <a href="<?php echo base_url() . "backend/movie/remove_map_data?id=" . $row['id'] . "&type=director"; ?>" class="icon-close"></a>
                                <?php echo $row['name']; ?>
                            </span>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>

             <div class="input-wrap">
                <label>Full movie</label>
                <div class="cf">
                    <input type="text"  name="full_movie" value="<?php
                    if (!empty($edit_data)) {
                        echo $edit_data['full_movie'];
                    }
                    ?>"  class="input-field">
                </div>
            </div>

             <div class="input-wrap">
                <label>Facebook Link</label>
                <div class="cf">
                    <input type="text"  name="fb_link" value="<?php
                    if (!empty($edit_data)) {
                        echo $edit_data['fb_link'];
                    }
                    ?>"  class="input-field">
                </div>
            </div>

             <div class="input-wrap">
                <label>Instagram Link</label>
                <div class="cf">
                    <input type="text"  name="insta_link" value="<?php
                    if (!empty($edit_data)) {
                        echo $edit_data['insta_link'];
                    }
                    ?>"  class="input-field">
                </div>
            </div>

            <div class="input-wrap">
                <label>Twitter Link</label>
                <div class="cf">
                    <input type="text"  name="twit_link" value="<?php
                    if (!empty($edit_data)) {
                        echo $edit_data['twit_link'];
                    }
                    ?>"  class="input-field">
                </div>
            </div>
            <?php if (!empty($edit_data)) { ?>
                <input type="submit" name="submit" class="button" value="Update">
                <a href="<?php echo base_url() . "backend/movie/status?id=" . $edit_data['id']; ?>" class="button delete">delete</a>
            <?php } ?>
        </div>

    </div>
    <?php if (empty($edit_data)) { ?>
        <input type="submit" name="submit" class="button-blue" value="publish">
    <?php } ?>
    <?php echo form_close(); ?>

</div>
<?php if (!empty($edit_data)) { ?>
    <?php include_once("common/trailer_detail_list_view.php"); ?>
    <?php include_once("common/video_detail_list_view.php"); ?>
    <?php include_once("common/poster_detail_list.php"); ?>
<?php } ?>
<script type="application/javascript">

    $('#my_release').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true
    });
    $('#rel_date').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true
    });

    function readURL(input) {
    if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
    $('#img').attr('src', e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
    }
    }


    function format(state) {
    var string = state.text;
    string = string.replace(/\s\s+/g, " ");
    if (!state.img) return string; // optgroup
    return state.img + string;
    }

    $('.personality').select2({
    minimumInputLength: 2,
    allowClear: true,
    templateResult: format,
    templateSelection: format,
    escapeMarkup: function (m) {return m;},
    tags: [],
    ajax: {
    url: '<?php echo base_url() . "backend/personality/personality_autosuggetion"; ?>',
    dataType: 'json',
    type: "GET",
    quietMillis: 50,
    data: function (term) {return {keyword: term};},
    processResults: function (data) {return {results: data};},
    cache: true
    }
    });
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

    /* Formatting function for row details - modify as you need */
    function poster_table_format(d) {
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
                '<label>Director</label>' +
                '<span class="dtr-data"> ' + d.director + '</span>' +
                '</li>' +
                '<li class="cf">' +
                '<label>Description </label>' +
                '<span class="dtr-data"> ' + d.description + '</span>' +
                '</li>' +
                '</ul>' +
                '</tr>' +
                '</table>';
    }

    $('#form_check').on('submit', function (e) {
        if ($("input[type=checkbox]:checked").length === 0) {
            e.preventDefault();
            alert('no way you submit it without checking a category');
            return false;
        }
    });
    var trailer_table;
    var video_table;
    $(document).ready(function () {
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
                    movie_id: "<?php echo $edit_data['id']; ?>"

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
                {"data": "video_thumb"},
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
                    movie_id: "<?php echo $edit_data['id']; ?>"

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
                {"data": "video_thumb"},
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

        var poster_table = $('#poster-example').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?php echo base_url('backend/detail/poster_list') ?>",
                "dataType": "json",
                "type": "POST",
                "data": {
                    movie_id: "<?php echo $edit_data['id']; ?>"

                },
                "complete": function (response) {
                    $("#poster_total").html(response.responseJSON.recordsFiltered);
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
                {"data": "poster_name"},
                {"data": "movie_name"},
                {"data": "views"},
                {"data": "likes"},
                {"data": "category_name"},
                {"data": "action"}
            ],
            "order": [[1, 'desc']]
        });



        // Add event listener for opening and closing details
        $('#poster-example tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = poster_table.row(tr);

            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            }
            else {
                // Open this row
                row.child(poster_table_format(row.data())).show();
                tr.addClass('shown');
            }
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
