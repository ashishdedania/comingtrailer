<style type="text/css">
  /*  .select2-container .select2-selection--single {
    box-sizing: border-box;
    cursor: pointer;
    display: block;
    height: 60px !important;
    user-select: none;
    -webkit-user-select: none;
} */
.ctbody-content .videoposter-info .label123 label {
    display: unset;
    font-size: 14px;
    color: #4e4e4e;
    font-weight: 500;
     text-transform: none;
    padding-bottom: 7px;
}
.select2-container--default .select2-results>.select2-results__options {
    max-height: 350px;
    overflow-y: auto;
}
</style>
<div class="ctbody-content">
<?php
if(!empty($message)){
    $msg=explode("_",$message);
    echo '<div class="alert alert-'.$msg[0].'">'.$msg[1].'! </div>';
}
?>
   <?php if(!empty($edit_data)){ ?>
        <div class="addcategory-total cf">
            <a target="_blank" href="<?php if(!empty($edit_data)){ echo $edit_data['final_url']; } ?>" class="view-website">View in Website</a>
        </div>
    <?php } ?>
    <div class="videoposter-info">

        <?php echo form_open_multipart((!empty($edit_data))? base_url( 'backend/poster/update' ) : base_url( 'backend/poster/save' ), array( 'method' => 'POST' ));?>
        <?php if(!empty($edit_data)){ ?>
            <input type="hidden" name="id" value="<?php echo $edit_data['id']; ?>">
        <?php } ?>
        <div class="input-wrap">
            <label>Add Poster Images</label>
            <span class="note">First image will be thumb image.</span>
            <input  <?php if(empty($edit_data)){ echo "required"; } ?> type="file" id="select_img" name="picture[]" size="30" multiple>

        </div>
        <div class="poster-images-wrap cf" id="selected_images">
           <?php if(!empty($edit_data)){ ?>
                
           <?php if(!empty($newImages)){ $count=1; foreach ($newImages as $value) { ?> 

            <?php  foreach ($value as $key => $row) { ?> 

                <?php  foreach ($value as $key => $rr) { ?> 

                        <p class="poster-ttl"><?php echo $key; ?></p>
                        <a href="javascript:void(0);" class="btn outlined mleft_no reorder_link" id="save_reorder<?php echo $count; ?>">reorder photos</a>
                        <div id="reorder-helper<?php echo $count; ?>" class="light_box" style="display:none;">1. Drag photos to reorder.<br>2. Click 'Save Reordering' when finished.</div>
                        <div class="gallery">
                            <ul class="reorder_ul reorder-photos-list<?php echo $count; ?>">
                            <?php if(!empty($rr)){ $cc=1; foreach($rr as $row){ ?>
                                <li id="image_li_<?php echo $row['id']; ?>" class="ui-sortable-handle">
                                    <a href="javascript:void(0);" style="float:none;" class="image_link">
                                        <img src="<?php echo base_url().'timthumb.php?src='.base_url().'images/poster/'.$row['poster_image']."&w=285"; ?>" alt="">
                                    <div class="cf">
                                    <a onclick="return confirm('Are You Sure You Want To Delete?')" href="<?php echo base_url()."backend/poster/delete_image?id=".$row['id']; ?>" class="delete">
                                        DELETE
                                    </a>

                                    <div class="label123">
                                        <input type="hidden" name="image_id[]" value="<?php echo $row['id']?>"/>
                                        <input id="1_<?php echo $row['id'] ?>" type="radio" name="poster_type_<?php echo $row['id']?>" value="1" <?php if($row['poster_type'] == 1){ echo 'checked';}?>/> <label for="1_<?php echo $row['id'] ?>">Poster</label><br />
                                        <input id="2_<?php echo $row['id'] ?>" type="radio" name="poster_type_<?php echo $row['id']?>" value="2" <?php if($row['poster_type'] == 2){ echo 'checked';}?>/> <label for="2_<?php echo $row['id'] ?>">First Look</label><br />
                                        <input id="3_<?php echo $row['id'] ?>" type="radio" name="poster_type_<?php echo $row['id']?>" value="3" <?php if($row['poster_type'] == 3){ echo 'checked';}?>/> <label for="3_<?php echo $row['id'] ?>">Wallpaper</label><br />
                                        
                                    </div>     
                                </div>
                                </a>
                                </li>
                                <?php if($cc==9){ echo '<div class="clear"></div>'; $cc=0; } ?>
                                <?php  $cc++; } } ?>
                                </ul>
                            </div> 

                <?php } } $count++; } } ?>    
                
            <?php  } ?>
        </div>
    </div>

    <div class="videoposter-info">
        <div class="date-category cf">
            <div class="row">
                <div class="col-md-6">
                    <div class="input-wrap">
                        <label>Date</label>
                        <input type="text" value="<?php if(!empty($edit_data) && date("d-m-Y",strtotime($edit_data['rel_date']))!="01-01-1970"){ echo date("d-m-Y",strtotime($edit_data['rel_date'])); } ?>" id="date" name="date"  placeholder="DD-MM-YYYY" class="input-field datepic">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-wrap">
                        <label>sub category</label>
                        <select class="select" required="" name="subcat_id" style="width: 100%"  id="subcat_id">
                            <option selected="selected" disabled="disabled" value="">Select</option>
                            <?php if(!empty($category)) { foreach($category as $row){ ?>
                                <option <?php if(!empty($edit_data) && $edit_data['subcat_id']==$row['id']){ echo "selected"; } ?> value="<?php echo $row['id']; ?>"><?php echo $row['subcat_name']; ?></option>
                            <?php } } ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="input-wrap">
            <label>Name</label>
            <div class="cf">
                <input type="text" required value="<?php if(!empty($edit_data)){ echo $edit_data['poster_name']; } ?>" id="name" name="name" class="input-field full-field">
            </div>
        </div>
        <div class="input-wrap">
            <label>description</label>
            <div class="cf">
                <textarea name="description" id="description" class="description" rows="10" cols="40"><?php if(!empty($edit_data)){ echo $edit_data['poster_desc']; } ?></textarea>
            </div>
        </div>
        <div class="input-wrap">
            <label>keywords</label>
            <div class="cf">
                <input type="text" value="<?php if(!empty($edit_data)){ echo $edit_data['poster_keywords']; } ?>" name="keywords" id="keywords" class="input-field full-field">
            </div>
        </div>
        <div class="input-wrap">
            <label>Movie</label>
            <div class="cf">
                <select style="width: 100%" id="movie" required=""  name="movie_id" class="js-data-example-ajax">
                    <?php if(!empty($edit_data)){ echo "<option value='".$edit_data['movie_id']."'>".$edit_data['movie_name']."</option>"; } ?>
                </select>
            </div>
        </div>
        <div class="input-wrap">
            <label>Cast</label>
            <div class="cf">
                <select style="width: 100%" id="cast" name="cast[]" multiple class="personality js-data-example-ajax">
                    <?php if(!empty($cast_list) && !empty($cast_list)){ foreach($cast_list as $row){ ?>
                        <option selected value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                    <?php } }?>
                </select>

            </div>
        </div>
        <div class="input-wrap">
            <label>Director</label>
            <div class="cf">
                <select style="width: 100%" id="director" name="director[]" multiple class="personality js-data-example-ajax">
                    <?php if(!empty($director_list) && !empty($edit_data)){ foreach($director_list as $row){ ?>
                        <option selected value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                    <?php } }?>
                </select>
            </div>
        </div>
        <div class="input-wrap">
            <?php if(!empty($edit_data)){ ?>
                <input type="submit" name="submit" class="button-blue" value="Update">
                <a href="<?php echo base_url()."backend/poster/status?id=".$edit_data['id']; ?>" class="button-delete btn">delete</a>
            <?php }else{ ?>
                <input type="submit" class="button-blue" value="publish">
            <?php } echo form_close();?>
        </div>
    </div>
</div>
<script type="text/javascript">

    var inputLocalFont = document.getElementById("select_img");
    inputLocalFont.addEventListener("change",previewImages,false); //bind the function to the input
    var fileList;

    function previewImages(){
        fileList = this.files;
        var anyWindow = window.URL || window.webkitURL;

            for(var i = 0; i < fileList.length; i++){
              //get a blob to play with
              var objectUrl = anyWindow.createObjectURL(fileList[i]);
              //if(!(objectURLS === i)){
              // for the next line to work, you need something class="preview-area" in your html
              $('#selected_images').append('<div class="image-wrap" id="img_'+i+'"><img src="' + objectUrl + '" /><div class="cf"><a href="javascript:void(0)" class="delete">DELETE</a></a></div>\n\
<input type="hidden" name="image_new_id[]" value="'+i+'"/>\n\
<input type="radio" id="label_1'+i+'" name="poster_type_'+i+'" value="1" checked/>  <label for="label_1'+i+'">Poster</label>\n\
<input type="radio" id="label_2'+i+'" name="poster_type_'+i+'" value="2" />  <label for="label_2'+i+'">First Look</label>\n\
<input type="radio" id="label_3'+i+'" name="poster_type_'+i+'" value="3" /> <label for="label_3'+i+'"> Wallpaper</label></div>');


        }
    }

$(document).ready(function(){
      
    $('#save_reorder1').on('click',function(){
            
        $("ul.reorder-photos-list1").sortable({ tolerance: 'pointer' });
                
        $('#save_reorder1').html('save reordering');
        $('#save_reorder1').attr("id","save_reorder1");
        $('#reorder-helper1').slideDown('slow');
                
        $('.image_link').attr("href","javascript:void(0);");
        $('.image_link').css("cursor","move");
        $("#save_reorder1").click(function( e ){
            if( !$("#save_reorder1 i").length ){
                $(this).html('').prepend('<img src="<?php echo base_url();?>resources/images/refresh-animated.gif"/>');
                $("ul.reorder-photos-list1").sortable('destroy');
                $("#reorder-helper1").html( "Reordering Photos - This could take a moment. Please don't navigate away from this page." ).removeClass('light_box').addClass('notice notice_error');
    
                var h = [];
                $("ul.reorder-photos-list1 li").each(function() {  h.push($(this).attr('id').substr(9));  });
                                
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>backend/poster/updateOrder",
                    data: {ids: " " + h + "",type:"poster"},
                    success: function(html){
                        alert('Order Updated successfully');
                        window.location.reload();
                    }
                }); 
                return false;
            }   
            e.preventDefault();     
        });
    });

    $('#save_reorder2').on('click',function(){
            
        $("ul.reorder-photos-list2").sortable({ tolerance: 'pointer' });
                
        $('#save_reorder2').html('save reordering');
        $('#save_reorder2').attr("id","save_reorder2");
        $('#reorder-helper2').slideDown('slow');
                
        $('.image_link').attr("href","javascript:void(0);");
        $('.image_link').css("cursor","move");
        $("#save_reorder2").click(function( e ){
            if( !$("#save_reorder2 i").length ){
                $(this).html('').prepend('<img src="<?php echo base_url();?>resources/images/refresh-animated.gif"/>');
                $("ul.reorder-photos-list2").sortable('destroy');
                $("#reorder-helper2").html( "Reordering Photos - This could take a moment. Please don't navigate away from this page." ).removeClass('light_box').addClass('notice notice_error');
    
                var h = [];
                $("ul.reorder-photos-list2 li").each(function() {  h.push($(this).attr('id').substr(9));  });
                                
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>backend/poster/updateOrder",
                    data: {ids: " " + h + "",type:"poster"},
                    success: function(html){
                        alert('Order Updated successfully');
                        window.location.reload();
                    }
                }); 
                return false;
            }   
            e.preventDefault();     
        });
    });
           

    $('#save_reorder3').on('click',function(){
            
        $("ul.reorder-photos-list3").sortable({ tolerance: 'pointer' });
                
        $('#save_reorder3').html('save reordering');
        $('#save_reorder3').attr("id","save_reorder3");
        $('#reorder-helper3').slideDown('slow');
                
        $('.image_link').attr("href","javascript:void(0);");
        $('.image_link').css("cursor","move");
        $("#save_reorder3").click(function( e ){
            if( !$("#save_reorder3 i").length ){
                $(this).html('').prepend('<img src="<?php echo base_url();?>resources/images/refresh-animated.gif"/>');
                $("ul.reorder-photos-list3").sortable('destroy');
                $("#reorder-helper3").html( "Reordering Photos - This could take a moment. Please don't navigate away from this page." ).removeClass('light_box').addClass('notice notice_error');
    
                var h = [];
                $("ul.reorder-photos-list3 li").each(function() {  h.push($(this).attr('id').substr(9));  });
                                
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>backend/poster/updateOrder",
                    data: {ids: " " + h + "",type:"poster"},
                    success: function(html){
                        alert('Order Updated successfully');
                        window.location.reload();
                    }
                }); 
                return false;
            }   
            e.preventDefault();     
        });
    });
                  
                
});




    $('document').ready(function() {
        var images = function(input, imgPreview) {

            if (input.files) {
                var filesAmount = input.files.length;

                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();

                    reader.onload = function(event) {

                       $(imgPreview).append('<div class="image-wrap" id="'+i+'"><input type="hidden" name="image_new_id[]" value="'+i+'"/><img src="'+event.target.result+'"><div class="cf"><a href="javascript:void(0)" class="delete">DELETE</a></div><input type="radio" name="poster_type_'+i+'" value="1" checked=""> Poster <input type="radio" name="poster_type_'+i+'" value="2"> First Look <input type="radio" name="poster_type_'+i+'" value="3"> Wallpaper </div>');

                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }

        };

        $('#file').on('change', function() {
            images(this, '#imgDiv');
        });
    });


    $('#date').datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true,
    });

     function format(state) {
        if (!state.img) return state.text; // optgroup
        return state.img + state.text;
    }

    $('#movie').select2({

        minimumInputLength: 1,
         allowClear: true,
        templateResult: format,
        templateSelection: format,
        escapeMarkup: function (m) {
            return m;
        },
        tags: [],
        ajax: {
            url: '<?php echo base_url()."backend/movie/movie_autosuggetion"; ?>',
            dataType: 'json',
            type: "GET",
            quietMillis: 50,
            data: function (term) {
                return {
                    keyword: term
                };
            },
            processResults: function (data) {
                return {
                    results: data
                };
            },
            cache: true
        }
    });




    $('.personality').select2({

        minimumInputLength: 2,
         allowClear: true,
        templateResult: format,
        templateSelection: format,
        escapeMarkup: function (m) {
            return m;
        },
        tags: [],
        ajax: {
            url: '<?php echo base_url()."backend/personality/personality_autosuggetion"; ?>',
            dataType: 'json',
            type: "GET",
            quietMillis: 50,
            data: function (term) {
                return {
                    keyword: term
                };
            },
            processResults: function (data) {
                return {
                    results: data
                };
            },
            cache: true
        }
    });

    $('#movie').on('select2:select', function (e) {

        var val=this.value;
        if(val!="") {

            $.get("<?php echo base_url()."backend/movie/get_movie_detail"; ?>",
                {
                    movie_id: val,
                },
                function (data) {
                    var json = $.parseJSON(data);

                    $("#cast").empty();
                    for (var key in json.cast_list) {
                        if (json.cast_list.hasOwnProperty(key)) {
                            $("#cast").append($("<option selected>").val(json.cast_list[key].id).html(json.cast_list[key].text));
                        }
                    }

                    $("#director").empty();
                    for (var key in json.director_list) {
                        if (json.director_list.hasOwnProperty(key)) {
                            $("#director").append($("<option selected>").val(json.director_list[key].id).html(json.director_list[key].text));
                        }
                    }

                });
            }

        });

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>