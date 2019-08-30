<ul class="language-nav-tabs">
    <li><a href="<?php echo base_url()."backend/partnership"; ?>">Partnership</a></li>
    <li><a href="#" class="active">Form Data</a></li>
</ul>

<div class="ctbody-content">

    <?php include_once("common/search_view.php"); ?>

    <div class="ctlists">
        <table id="example" class="table table-bordered display" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Company</th>
                <th>City</th>
                <th>Country</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>

</div>


<script type="text/javascript">
    /* Formatting function for row details - modify as you need */
    function format ( d ) {
        // `d` is the original data object for the row
        return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
            '<tr>'+
            '<td><strong>Message : </strong>'+d.message+'</td>'+
            '</tr>'+
            '</table>';
    }

    $(document).ready(function() {

        var csrf = '<?php echo $this->security->get_csrf_hash(); ?>';
        var data = {};
        data['<?php echo $this->security->get_csrf_token_name(); ?>'] = csrf;

        $.ajaxSetup({ 'data': data });

        var table = $('#example').DataTable( {
            "processing": true,
            "serverSide": true,
            "ajax":{
                "url": "<?php echo base_url('backend/partnership/form_list') ?>",
                "dataType": "json",
                "type": "POST"
            },
            lengthMenu: [
                [ 10, 25, 50, 100, 250, 500, 1000, 2000, 3000, 4000, 5000],
                [ 10, 25, 50, 100, 250, 500, 1000, 2000, 3000, 4000, 5000]
            ],
            "columns": [
                {
                    "className":      'details-control',
                    "orderable":      false,
                    "defaultContent": ''
                },


                { "data": "created" },
                { "data": "first_name" },
                { "data": "last_name" },
                { "data": "email" },
                { "data": "phone" },
                { "data": "company" },
                { "data": "city" },
                { "data": "country" }
            ],
            "order": [[1, 'desc']]
        } );



        $('#search_button').on('click', function(e){
            e.preventDefault();

            var year=$("#year option:selected").val();
            var month=$("#month option:selected").val();
            var search_keyword=$("#search_keyword").val();
            table.columns(0).search(year).columns(1).search(month).columns(2).search(search_keyword).draw();

        });

        // Add event listener for opening and closing details
        $('#example tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = table.row( tr );

            if ( row.child.isShown() ) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            }
            else {
                // Open this row
                row.child( format(row.data()) ).show();
                tr.addClass('shown');
            }
        } );
    } );
</script>