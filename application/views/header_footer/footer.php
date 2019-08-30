
<script>
    
    $('#searching').click(function () {
        if ( $( "#searchdiv" ).is( ":hidden" ) ) {
          $( "#searchdiv" ).slideDown( "slow" );
        } else {
          $( "#searchdiv" ).slideUp("slow");
        }
    });
    
    $('#searching').click();
    
    $('.datepic').datepicker({
        format: 'yyyy-mm-dd',
    }).on('changeDate', function(e){
        $(this).datepicker('hide');
    });
    
    </script>
</body>
</html>
