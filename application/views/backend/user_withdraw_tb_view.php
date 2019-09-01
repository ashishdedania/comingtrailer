<ul class="language-nav-tabs">
    <li><a href="<?php echo base_url() . "backend/user"; ?>" class="">ALL</a></li>
    <li><a href="<?php echo base_url() . "backend/user/withdraw_payout"; ?>" class="">Payout</a></li>
    <li><a href="#" class="active">WITHDRAW REQUEST</a></li>
    <li><a href="<?php echo base_url() . "backend/user/withdraw_reject"; ?>" class="">REQUEST REJECT</a></li>    
    <li><a href="<?php echo base_url()."backend/user/weekly_winners"; ?>" class="">WEEKLY WINNERS</a></li>
</ul>

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
        <p  class="total-number"><span id="total_number"></span> User <Pay></Pay></p>
        <a href="<?php echo base_url() . "backend/user/export_csv"; ?>" class="button icon-add">Export In Excel</a>
    </div>

    <?php include_once("common/search_view.php"); ?>

    <div class="ctlists">
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
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div> 
    <div class="page-bar cf">

        <div class="show-rows">
            <label>Newsletter Subscribe:</label>
            <select  class="select" id="newsletter" name="newsletter">
                <option value="">By</option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
        </div>
    </div>
</div>
<script type="text/javascript">
    /* Formatting function for row details - modify as you need */
    function format(d) {
        // `d` is the original data object for the row
        var table = '<table cellpadding="5" cellspacing="0" border="0" style="margin:0;width: 50%;float: left;">' +
                '<tr>' +
                '<td><strong>NEWSLETTER SUBSCRIBE : </strong>' + d.subscriber + '</td>' +
                '</tr>' +
                // '<tr>' +
                // '<td><strong>SOCIAL MEDIA LIKES : </strong>' + d.total_social_likes + '</td>' +
                // '</tr>' +
                '<tr>' +
                '<td><strong>INVITE FRIENDS : </strong>' + d.total_invite + '</td>' +
                '</tr>' +
                '<tr>' +
                '<td><strong>PLAY VIDEO : </strong>' + d.total_video_play + '</td>' +
                '</tr>' +
                 '<tr>' +
                '<td><strong>POINT SHARE : </strong>' + d.point_share + '</td>' +
                '</tr>' +
                '<tr>' +
                '<td><strong>POINT RECEIVE : </strong>' + d.point_receive + '</td>' +
                '</tr>' +
                // '<tr>' +
                // '<td><strong>SHARE VIDEO & POSTER : </strong>' + d.total_share + '</td>' +
                // '</tr>' +
                // '<tr>' +
                // '<td><strong>LIKES : </strong>' + d.total_likes + '</td>' +
                // '</tr>' +
                // '<tr>' +
                // '<td><strong>FRIENDS SHARE : </strong>' + d.totla_frnds_share + '</td>' +
                // '</tr>' +
                // '<tr>' +
                // '<td><strong>FRIENDS SHARE : </strong>' + d.totla_frnds_share + '</td>' +
                // '</tr>' +
                // '<tr>' +
                
                '<td><strong>EARN RS. : </strong>' + d.total_earn_rs +d.point_share+ '</td>' +
                '</tr>' +
                '</table>';
        if (d.acc_type == 'paytm') {
            var title = 'BY PAYTM: ';
            var by = d.paytm_no;
        } else {
            var title = 'BY BANK: ';
            var space = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
            var by = 'Account Number:' + d.acc_no + '<br>' + space + ' Name: ' + d.acc_name + '<br>' + space + ' Bank: ' + d.bank + '<br>' + space + ' Branch: ' + d.branch + '<br>' + space + ' IFSC Code: ' + d.ifsc_code;
        }
        table += '<table cellpadding="5" cellspacing="0" border="0" style="margin:0;width: 50%;">' +
                '<tr>' +
                '<td><strong>WITHDRAW REQUEST : </strong>(Point ' + d.point + ') (Rs.' + d.rupees + ') ' + d.withdraw_req_date + '</td>' +
                '</tr>' +
                '<tr>' +
                '<td><strong>' + title + ' </strong>' + by + '</td>' +
                '</tr>' +
                '<tr>' +
                '<td><form class="withdraw_req_approval" id="' + d.withdraw_req_id + '"><textarea class="reject-description" rows="5" cols="70" name="approval_message"></textarea>' +
                '<input type="button" onclick="request_approval(this);return false;" class="button btn btn-default delete" value="Reject">' +
                '&nbsp;&nbsp;<input type="button" class="button btn btn-primary update" onclick="request_approval(this);return false;" value="Approve"></form></td>' +
                '</tr>' +
                '</table>';
        return table;
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
                "url": "<?php echo base_url('backend/user/user_withdraw_list') ?>",
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
                    "defaultContent": '',
                    "data":"number"
                },
                {"data": "created"},
                {"data": "name"},
                {"data": "mobile"},
                {"data": "email"},
                {"data": "point"},
                {"data": "gender"},
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
            table.columns(0).search(year).columns(1).search(month).columns(2).search(search_keyword).columns(4).search($('#start_date').val()).columns(5).search($('#end_date').val()).draw();           
        });

        $('#newsletter').on('change', function (e) {
            e.preventDefault();

            var newsletter = $("#newsletter option:selected").val();
            table.columns(3).search(newsletter).draw();
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
    });
    function request_approval(thiselem) {
        $(thiselem).prop('disabled',true);        
        var form = $(thiselem).parent('form');
        var action = 0;
        if ($(thiselem).val() == 'Approve') {
            action = 1;
        } else {
            action = 2;
        }
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>backend/user/update_withdraw_approval/",
            dataType:'json',
            data: $(form).serialize() + "&withdraw_req_id=" + $(form).attr('id') + "&action=" + action,
            success: function (response) {
                if (response.is_updated == true) {
                    table.draw();
                }
            }
        });
    }
</script>