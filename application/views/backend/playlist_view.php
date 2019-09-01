<div class="ctbody-content">
    <?php
    if (!empty($message)) {
        $msg = explode("_", $message);
        echo '<div class="alert alert-' . $msg[0] . '">
' . $msg[1] . '!
</div>';
    }
    ?>
    <?php echo form_open_multipart((!empty($edit_data)) ? base_url('backend/playlist/update') : base_url('backend/playlist/save'), array('method' => 'POST')); ?>
    <?php if (!empty($edit_data)) { ?>
        <input type="hidden" name="id" value="<?php echo $edit_data['id']; ?>">
    <?php } ?>                
    <div class="user-profile cf">
        <div class="image-name">
            <img src="<?php echo (!empty($edit_data) && file_exists("./images/playlistthumb/" . $edit_data['playlist_thumb'])) ? base_url() . "images/playlistthumb/" . $edit_data['playlist_thumb'] : ''; ?>" id="thumb" alt="">
            <input type="file" name="file" id="file" onchange="Upload()" size="30">
        </div>
        <div class="info-block">
            <div class="input-wrap">
                <label>Playlist Name</label>
                <div class="cf"><input type="text" value="<?php echo (!empty($edit_data)) ? $edit_data['name'] : ''; ?>" name="name" class="input-field"></div>
            </div>
            <div class="input-wrap">
                <label>Redirect Link</label>
                <div class="cf"><input type="text" value="<?php echo (!empty($edit_data)) ? $edit_data['redirect_link'] : ''; ?>" name="redirect_link" class="input-field"></div>
            </div>
            <div class="date-category cf">
                <div class="date-wrap cf">
                    <label>Date</label>
                    <input type="text" value="<?php echo (!empty($edit_data) && date("d-m-Y", strtotime($edit_data['created'])) != "01-01-1970") ? date("d-m-Y", strtotime($edit_data['created'])) : '' ?>" id="date" name="date" class="input-field datepic">
                </div>
            </div>

            <div class="input-wrap">
                <div class="category-wrap cf">
                    <label>show in App</label>
                    <?php
                    $show_in_app = array();
                    if (!empty($edit_data)) {
                        $show_in_app = explode(',', $edit_data['show_in_app']);
                    }
                    ?>
                    <div class="language"><span>Home</span><input type="checkbox" value="1" name="show_in_app[]" class="checkbox" <?php echo (in_array(1, $show_in_app)) ? "checked" : '' ?>></div>
                    <div class="language"><span>Trailer</span><input type="checkbox" value="2" name="show_in_app[]" class="checkbox" <?php echo (in_array(2, $show_in_app)) ? "checked" : '' ?>></div>
                    <div class="language"><span>Video Song</span><input type="checkbox" value="3" name="show_in_app[]" class="checkbox" <?php echo (in_array(3, $show_in_app)) ? "checked" : '' ?>></div>
                    <div class="language"><span>Poster</span><input type="checkbox" value="4" name="show_in_app[]" class="checkbox" <?php echo (in_array(4, $show_in_app)) ? "checked" : '' ?>></div>
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
                                ?> name="subcat_id[]" value="<?php echo $row['id']; ?>" class="checkbox">
                            </div>
                            <?php
                        }
                    }
                    ?>

                </div>
            </div>

               
        </div>
    </div>
    <?Php if (!empty($edit_data)) { ?>
        <div class="addcategory-total cf">
            <p class="total-number"><?php echo $total; ?> Trailer or Song </p>
        </div>
        <?php include_once("common/search_view.php"); ?>

        <div class="ctlists">
            <table id="example" class="table table-bordered display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Name</th>
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
    <?php } ?>
    <div class="input-wrap">
        <?php if (!empty($edit_data)) { ?>
            <input type="submit" name="submit" class="button-blue" value="Update">
            <a href="<?php echo base_url() . "backend/playlist/status?id=" . $edit_data['id']; ?>" class="button-delete btn">delete</a>
        <?php } else { ?>
            <input type="submit" class="button-blue" value="publish">
        <?php } echo form_close(); ?>
    </div>

</div>

<script type="text/javascript">
    $('#date').datepicker({format: 'dd-mm-yyyy', autoclose: true});
    $('#start_date').datepicker({format: 'yyyy-mm-dd', autoclose: true});
    $('#end_date').datepicker({format: 'yyyy-mm-dd', autoclose: true});
    var table;
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
    $(document).ready(function () {
        if (typeof $('input[name="id"]').val() != 'undefined') {
            var csrf = '<?php echo $this->security->get_csrf_hash(); ?>';
            var data = {};
            data['<?php echo $this->security->get_csrf_token_name(); ?>'] = csrf;
            data['playlist_id'] = $('input[name="id"]').val();
            $.ajaxSetup({'data': data});
            table = $('#example').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "<?php echo base_url('backend/video/video_list') ?>",
                    "dataType": "json",
                    "type": "POST",
                    'data': function (d) {
                        $.extend(d, data);
                    },
                    "complete": function (response) {
                        $("#total_number").html(response.responseJSON.recordsFiltered);
                        $("#sub_category_id").val(response.responseJSON.seo_data.sub_category_id);
                        $("#seo_name").val(response.responseJSON.seo_data.name);
                        $("#seo_title").val(response.responseJSON.seo_data.title);
                        $("#seo_description").val(response.responseJSON.seo_data.description);
                        $("#seo_keywords").val(response.responseJSON.seo_data.keywords);
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
                "order": [[1, 'desc']],
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
        }
    });
    function remove_from_playlist(thiselem, video_id, playlist_id) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>backend/playlist/remove_from",
            dataType: 'json',
            data: {video_id: video_id, playlist_id: playlist_id},
            success: function (response) {
                if (response.response == true) {
                    table.draw();
                } else {
                    alert(response.message);
                }
            }
        });
    }

    function Upload() {
        //Get reference of FileUpload.
        var fileUpload = document.getElementById("file");
        //Check whether the file is valid Image.
        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.jpg|.png|.gif)$");
        if (regex.test(fileUpload.value.toLowerCase())) {

            //Check whether HTML5 is supported.
            if (typeof (fileUpload.files) != "undefined") {
                //Initiate the FileReader object.
                var reader = new FileReader();
                //Read the contents of Image File.
                reader.readAsDataURL(fileUpload.files[0]);
                reader.onload = function (e) {
                    //Initiate the JavaScript Image object.
                    var image = new Image();
                    //Set the Base64 string return from FileReader as source.
                    image.src = e.target.result;
                    //Validate the File Height and Width.
                    image.onload = function () {
                        var height = this.height;
                        var width = this.width;
                        if (height < 720 || width < 1280) {
                            alert("Please, Upload the file resolution > 1280X720");
                            document.getElementById("file").remove();
                            $('#thumb').attr('src', '');
                            $('.image-name').append($('<input type="file" name="file" id="file" onchange="Upload()" size="30">'));
                            return false;
                        }
                        $('#thumb').attr('src', e.target.result);
                        return true;
                    };
                }
            } else {
                alert("This browser does not support HTML5.");
                return false;
            }
        }
    }
</script>
<style type="text/css">
    .select {
        float: left;
    width: 150px;
    height: 45px;
    padding: 10px 25px 10px 13px;
    margin: 0 1% 0 0;
    font-size: 14px;
    text-transform: uppercase;
    font-weight: normal;
    line-height: 1.2;
    color: #666666;
    border: 1px solid #dedddd;
    background-color: #fff;
    background-repeat: no-repeat;
    background-position: 100% 50%;
    background-image: url(../images/page-arrow.png);
    
    -moz-appearance: none;
    appearance: none;
    box-sizing: border-box;
    border-radius: 4px;
    }
</style>