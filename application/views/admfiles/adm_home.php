<div id="ctwpcontent">
    <?php
    
    if(isset($inserted)){
        echo $inserted;
    }
        
        $this->load->view('header_footer/subcatview');
    ?>

</div>    
 <script>
    $(document).ready(function() {
        $('table.nowrap').DataTable();
        $('a[data-toggle="tab"]').on( 'shown.bs.tab', function (e) {
            $.fn.dataTable.tables( {visible: true, api: true} ).columns.adjust();
        });
    } );
</script>