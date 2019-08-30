<div id="ctwpcontent">
    <?php
    
    if(isset($inserted)){
        echo $inserted;
    }
        
       
    ?>

<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#all">ALL</a></li>
    
    
    <li><a data-toggle="tab" href="#payout">PAYOUT</a></li>
    <li><a data-toggle="tab" href="#widreq">WITHDRAW REQUEST</a></li>
    
    
    
</ul>

<div class="tab-content">
    
    <div id="all" class="tab-pane fade in active">
      <!--<h3>All</h3>-->
        <?php
                
                $this->load->view('userdetails');
        ?>
    </div>
    <div id="payout" class="tab-pane fade in">
      <!--<h3>All</h3>-->
        <?php
                
                $this->load->view('user_payout_details');
        ?>
    </div>
    <div id="widreq" class="tab-pane fade in">
      <!--<h3>All</h3>-->
        <?php
                
                $this->load->view('user_withdraw_req_details');
        ?>
    </div>
    
</div>
    
    
</div>    
</body>
</html>
 <script>
    $(document).ready(function() {
        $('table.nowrap').DataTable();
        
        $('a[data-toggle="tab"]').on( 'shown.bs.tab', function (e) {
            
            $.fn.dataTable.tables( {visible: true, api: true} ).columns.adjust();
        });
    } );
</script>