<ul class="language-nav-tabs">
    <li><a href="<?php echo base_url() . "backend/user"; ?>">ALL</a></li>
    <li><a href="<?php echo base_url() . "backend/user/withdraw_payout"; ?>">Payout</a></li>
    <li><a href="<?php echo base_url() . "backend/user/withdraw"; ?>" class="">WITHDRAW REQUEST</a></li>
    <li><a href="<?php echo base_url() . "backend/user/withdraw_reject"; ?>" class="">REQUEST REJECT</a></li>    
    <li><a href="<?php echo base_url() . "backend/user/weekly_winners"; ?>" class="">WEEKLY WINNERS</a></li>
</ul>
<div class="ctbody-content">   
    <?php include_once("common/search_view.php"); ?>
    <div class="ctlists alluser">
        <table id="example" class="table table-bordered display" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Number</th>
                    <th>Email</th>
                    <th>Point</th>
                    <th>Gender</th>
                    <th>Video Plays</th>                    
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
        <div class="point-history cf">

        </div>
    </div>

    <p class="tab-title">LIKES</p>
    <div class="ctlists likelist">
        <table id="like_tbl" class="table table-bordered display" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Category</th>                    
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>        
    </div>

    <p class="tab-title">PLAY VIDEO</p>
    <div class="ctlists playlist">
        <table id="play_tbl" class="table table-bordered display" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Category</th>                    
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>                
    </div>
</div>
<script>
    var user_id = '<?php echo (isset($user_id) && is_numeric($user_id)) ? $user_id : 0; ?>';
    $(document).ready(function () {
        $("#start_date").datepicker({format: 'yyyy-mm-dd'});
        $("#end_date").datepicker({format: 'yyyy-mm-dd'});
        /* Formatting function for row details - modify as you need */
        function format(d) {
            // `d` is the original data object for the row
            return '<table cellpadding="5" cellspacing="0" border="0" style="margin:0;">' +
                    '<tr>' +
                    '<td><strong>NEWSLETTER SUBSCRIBE : </strong>' + d.subscriber + '</td>' +
                    '</tr>' +
                    // '<tr>' +
                    // '<td><strong>SOCIAL MEDIA LIKES : </strong>' + d.total_social_likes + '</td>' +
                    // '</tr>' +
                    '<tr>' +
                    '<td><strong>INVITE FRIENDS : </strong>' + d.total_invite + '</td>' +
                    '</tr>' +
                    // '<tr>' +
                    // '<td><strong>PLAY VIDEO : </strong>' + d.total_video_play + '</td>' +
                    // '</tr>' +
                    // '<tr>' +
                    // '<td><strong>LIKES : </strong>' + d.total_likes + '</td>' +
                    // '</tr>' +
                    // '<tr>' +
                    // '<td><strong>FRIENDS SHARE : </strong>' + d.totla_frnds_share + '</td>' +
                    // '</tr>' +
                    // '<tr>' +
                    '<td><strong>POINT SHARE : </strong>' + d.point_share + '</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td><strong>POINT RECEIVE : </strong>' + d.point_receive + '</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td><strong>EARN RS. : </strong>' + d.total_earn_rs + '</td>' +
                    '</tr>' +
                    '</table>';
        }

        var csrf = '<?php echo $this->security->get_csrf_hash(); ?>';
        var data = {};
        data['<?php echo $this->security->get_csrf_token_name(); ?>'] = csrf;
        if (user_id != '' && user_id != '0') {
            data['user_id'] = user_id;
        }
        $.ajaxSetup({'data': data});
        var table = $('#example').DataTable({
            "paging": false,
            "ordering": false,
            "info": false,
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?php echo base_url('backend/user/get_one_user_info') ?>",
                "dataType": "json",
                "type": "POST"
            },
            "columns": [
                {
                    "className": 'details-control1',
                    "orderable": false,
                    "defaultContent": '',
                    "data": "number"
                },
                {"data": "created"},
                {"data": "name"},
                {"data": "mobile"},
                {"data": "email"},
                {"data": "point"},
                {"data": "gender"},
                {"data": "activity_play"}
            ],
            "order": [[1, 'desc']]
        });
        var table1 = $('#like_tbl').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?php echo base_url('backend/user/user_likes') ?>",
                "dataType": "json",
                "type": "POST",
                'data': function (d) {
                    $.extend(d, data);
                }
            },
            "columns": [
                {
                    "className": 'details-control1',
                    "orderable": false,
                    "defaultContent": '',
                    "data": "number"
                },
                {"data": "created"},
                {"data": "name"},
                {"data": "category"}
            ],
            "order": [[1, 'desc']]
        });
        var table2 = $('#play_tbl').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?php echo base_url('backend/user/user_plays') ?>",
                "dataType": "json",
                "type": "POST",
                'data': data
            },
            "columns": [
                {
                    "className": 'details-control1',
                    "orderable": false,
                    "defaultContent": '',
                    "data": "number"
                },
                {"data": "created"},
                {"data": "name"},
                {"data": "category"}
            ],
            "order": [[1, 'desc']]
        });
        $('#example tbody').on('click', 'td.details-control1', function () {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            } else {
                // Open this row
                row.child(format(row.data())).show();
                tr.addClass('shown');
            }
        });
        $('.button-search').on('click', function (e) {
            e.preventDefault();
            if ($('#start_date').val() !== "" && $('#end_date').val() !== "") {
                var startDate = new Date($('#start_date').val());
                var endDate = new Date($('#end_date').val());

                if (startDate > endDate) {
                    alert("Please ensure that the End Date is greater than or equal to the Start Date.");
                    return false;
                }
            }
            data = {'<?php echo $this->security->get_csrf_token_name(); ?>': csrf, "user_id": user_id, 'start_date': $('#start_date').val(), 'end_date': $('#end_date').val()};
            table1.draw();            
            table2.draw();
        });
        get_activity();
    });
    function get_activity() {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>backend/user/user_activity",
            dataType: 'json',
            data: {user_id: user_id},
            success: function (response) {
                $('.point-history').html(response.data);
            }
        });
    }
</script>