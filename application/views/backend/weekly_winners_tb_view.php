<ul class="language-nav-tabs">
    <li><a href="<?php echo base_url() . "backend/user"; ?>">ALL</a></li>
    <li><a href="<?php echo base_url() . "backend/user/withdraw_payout"; ?>">Payout</a></li>
    <li><a href="<?php echo base_url() . "backend/user/withdraw"; ?>" class="">WITHDRAW REQUEST</a></li>
    <li><a href="<?php echo base_url() . "backend/user/withdraw_reject"; ?>" class="">REQUEST REJECT</a></li>    
    <li><a href="#" class="active">WEEKLY WINNERS</a></li>
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
        <p class="total-number"><?php echo $total; ?> winners</p>
        <a href="#" class="button">export in Excel</a>
    </div>    
    <div class="search-bar cf">
        <select class="select" name="year" id="year">
            <option selected="selected" value="">Year</option>
            <?php
            if (!empty($search_year)) {
                foreach ($search_year as $row) {
                    ?>
                    <option value="<?php echo $row['year']; ?>"><?php echo $row['year']; ?></option>
                    <?php
                }
            }
            ?>
        </select>            
        <input type="button" class="button-search" id="search_button" value="Search">
    </div>
    <div class="ctlists">
        <table id="example" class="table table-bordered display" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>#</th>                  
                    <th>Name</th>
                    <th>Number</th>
                    <th>Email</th>
                    <th>Rs</th>
                    <th>Gender</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript">
    var table;
    $(document).ready(function () {
        var csrf = '<?php echo $this->security->get_csrf_hash(); ?>';
        var data = {};
        data['<?php echo $this->security->get_csrf_token_name(); ?>'] = csrf;
        $.ajaxSetup({'data': data});
        table = $('#example').DataTable({
            "processing": true,
            "serverSide": true,
            "bLengthChange": false,
            "bSort": false,
            "ajax": {
                "url": "<?php echo base_url('backend/user/weekly_winners_list') ?>",
                "dataType": "json",
                "type": "POST",
                'data': function (d) {
                    $.extend(d, data);
                },
                "complete": function (response) {
                    $("#total_number").html(response.responseJSON.recordsFiltered);
                }
            },
            "createdRow": function (row, data, index) {
                if (typeof data.number == 'string') {
                    $(row).html('<td colspan="7" class="details-control1">' + data.number + '</td>');
                }
            },
            "columns": [
                {
                    "className": 'details-control1',
                    "orderable": false,
                    "defaultContent": '',
                    "data": "number"
                },
                {"data": "name"},
                {"data": "mobile"},
                {"data": "email"},
                {"data": "rs"},
                {"data": "gender"},
                {"data": "action"}
            ],
            "order": [[1, 'desc']]
        });
        $('.button-search').on('click', function (e) {
            e.preventDefault();
            if ($("#year").val() != "") {
                data = {'<?php echo $this->security->get_csrf_token_name(); ?>': csrf, "year": $("#year option:selected").val()};
                table.draw();
            }
        });
    });
    function get_update(winner_id) {
        $('input[name="prize' + winner_id + '"]').show();
        $('a[data-value="' + winner_id + '"]').hide();
    }
    function update_prize(thiselem) {
        var winner_id = $(thiselem).attr('name');
        winner_id = winner_id.replace('prize', '');
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>backend/user/update_winning_prize",
            dataType: 'json',
            data: {winning_prize: $(thiselem).val(), winner_id: winner_id},
            success: function (response) {
                if (response.is_save = true) {
                    $(thiselem).hide();
                    $('a[data-value="' + winner_id + '"]').show();
                    $('a[data-value="' + winner_id + '"]').html($(thiselem).val());
                } else {
                    alert('Update failed!');
                }
            }
        });
    }
    function remove_winner(winner_id, user_id) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>backend/user/remove_winner",
            dataType: 'json',
            data: {winner_id: winner_id, user_id: user_id},
            success: function (response) {
                if (response.is_save = true) {
                    $("#year").val('');
                    table.draw();
                } else {
                    alert('Delete failed!');
                }
            }
        });
    }
</script>