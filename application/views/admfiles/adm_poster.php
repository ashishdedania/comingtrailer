<div id="ctwpcontent">

	<div class="ctbody-content">
            <?php echo $this->session->flashdata('msg'); ?>
		<form action="AddPoster/add" method="post" enctype="multipart/form-data">
		<div class="videoposter-info">
			<div class="input-wrap">
                            <label>Add Poster Images </label>
				<span class="note">First image will be thumb image.</span>
				<input type="file" id="select_img" name="picture[]" size="30" multiple>
				
			</div>
                    <div class="poster-images-wrap cf" id="selected_images">
                            
                                                        
				
			</div>
<!--			<div class="poster-images-wrap cf">
				<div class="image-wrap">
					<img src="images/dhingana-song.jpg" alt="Dhingana Song ? Raees ? Shah Rukh Khan" />
					<div class="cf">
						<a href="" class="delete">DELETE</a>
						<a href="" class="icon-move"></a>
					</div>
				</div>
				
			</div>-->
			
<!--			<div>
                                
                                <input type="radio" name="poster_type" value="1" checked="checked"/> Poster
                                <input type="radio" name="poster_type" value="2"/> First Look
                                <input type="radio" name="poster_type" value="3"/> Wallpaper
                                
                            </div>  -->
		</div>
		
		<div class="videoposter-info">
			<div class="date-category cf">
			<div class="date-wrap cf">
				<label>Date</label>
                                <input data-provide="datepicker"  class="input-field datepic" name="reldate" required="true" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd">
                                <label style="display: none;">Release Date</label>
                                <input type="hidden" data-provide="datepicker" name="my_reldate" class="input-field datepic" required="true" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd">
			</div>
			<div class="category-wrap cf">
				<label>sub category</label>
				<select class="select" name="subcat" id="" required>
					<option selected="selected" disabled="disabled" value="">Select</option>
					<?php
                                            
                                                foreach ($subcat as $value) {
                                                    echo '<option value="'.$value['sub_id'].'">'.$value['sub_name'].'</option>';
                                                }
                                            
                                            ?>
		   		</select>
			</div>
			</div>
			<div class="input-wrap">
				<label>Name</label>
                                <div class="cf"><input type="text" name="name" required value="" class="input-field full-field"></div>
			</div>
			<div class="input-wrap">
				<label>description</label>
                                <div class="cf"><textarea class="description" name="desc" rows="10" cols="40"></textarea></div>
			</div>
			<div class="input-wrap">
				<label>keywords</label>
                                <div class="cf"><input type="text" name="keywords"  value="" class="input-field full-field"></div>
			</div>
			<div class="input-wrap">
				<label>Movie</label>
                                <div class="cf"><input type="text" value="" name="movies" data-role="tagsinput" id="movie_elt" class="input-field"> 
                                    <!--<input type="submit" class="button-add" value="Add">-->
                                </div>
<!--				<div class="tagchecklist cf">
					<span><a href="" class="icon-close"></a>Raees</span>
				</div>-->
			</div>
			<div class="input-wrap">
					<label>Cast</label>
                                        <div class="cf"><input type="text" value="" data-role="tagsinput" name="cast" id="cast_elt" class="input-field"> 
                                            <!--<input type="submit" class="button-add" value="Add">-->
                                        </div>
				</div>
			<div class="input-wrap">
					<label>Director</label>
                                        <div class="cf"><input type="text" value="" data-role="tagsinput" name="director" id="director_elt" class="input-field"> 
                                            <!--<input type="submit" class="button-add" value="Add">-->
                                        </div>
				</div>
		</div>
		
                    <input type="submit" name="submit" class="button-blue" value="publish">
                </form>	
	</div>
	
</div>

<script>
    
    $('.datepicker').datepicker();
    
    var inputLocalFont = document.getElementById("select_img");
    inputLocalFont.addEventListener("change",previewImages,false); //bind the function to the input
var fileList;
    function previewImages(){
        fileList = this.files;
//fileList = $('#select_img').val();
        var anyWindow = window.URL || window.webkitURL;

            for(var i = 0; i < fileList.length; i++){
                
              //get a blob to play with
              var objectUrl = anyWindow.createObjectURL(fileList[i]);
              //if(!(objectURLS === i)){
              // for the next line to work, you need something class="preview-area" in your html
              $('#selected_images').append('<div class="image-wrap" id="img_'+i+'"><img src="' + objectUrl + '" /><div class="cf"><a href="javascript:void(0)" class="delete">DELETE</a></a></div>\n\
  <input type="hidden" name="image_new_id[]" value="'+i+'"/>\n\
<input type="radio" name="poster_type_'+i+'" value="1" checked/> Poster\n\
<input type="radio" name="poster_type_'+i+'" value="2" /> First Look\n\
<input type="radio" name="poster_type_'+i+'" value="3" /> Wallpaper</div>');
    
//          $(".delete").click(function(){
//            $("#img_"+i+").remove();
//          });
    
              // get rid of the blob
              window.URL.revokeObjectURL(fileList[i]);
              
              
            }
           // }


    }
    
    var objectURLS = '';
    
    function removeImg(url){
        objectURLS = url;
//        $('#img_'+url).remove();
//        inputLocalFont.trigger('change');
//        previewImages();
//fileList.slice(url,1);
    }
    
    
    $(document).ready(function(){
        
        
        
        
	$('.reorder_link').on('click',function(){
		$("ul.reorder-photos-list").sortable({ tolerance: 'pointer' });
		$('.reorder_link').html('save reordering');
		$('.reorder_link').attr("id","save_reorder");
		$('#reorder-helper').slideDown('slow');
		$('.image_link').attr("href","javascript:void(0);");
		$('.image_link').css("cursor","move");
		$("#save_reorder").click(function( e ){
			if( !$("#save_reorder i").length ){
				$(this).html('').prepend('<img src="images/refresh-animated.gif"/>');
				$("ul.reorder-photos-list").sortable('destroy');
				$("#reorder-helper").html( "Reordering Photos - This could take a moment. Please don't navigate away from this page." ).removeClass('light_box').addClass('notice notice_error');
	
				var h = [];
				$("ul.reorder-photos-list li").each(function() {  h.push($(this).attr('id').substr(9));  });
				
				$.ajax({
					type: "POST",
					url: "orderUpdate.php",
					data: {ids: " " + h + ""},
					success: function(){
						window.location.reload();
					}
				});	
				return false;
			}	
			e.preventDefault();		
		});
	});
});
    
    
    
    
     //.........................movie tag script..............................
var movies = new Bloodhound({
  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('text'),
  queryTokenizer: Bloodhound.tokenizers.whitespace,
  prefetch: '<?php echo base_url(); ?>AddVideo/getMovies'
});
movies.initialize();

var movies_elt = $('#movie_elt');
movies_elt.tagsinput({
  
  typeaheadjs: {
      highlight: true,
    name: 'movies',
    displayKey: 'text',
    valueKey: 'text',
    source: movies.ttAdapter(),
    freeInput: true
  }
});

//movies_elt.tagsinput('add', { "value": 1 , "text": "Amsterdam"   , "continent": "Europe"    });

//..............................Cast tag script.................................

var cast = new Bloodhound({
  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('text'),
  queryTokenizer: Bloodhound.tokenizers.whitespace,
  prefetch: '<?php echo base_url(); ?>AddVideo/getCast'
});
cast.initialize();

var cast_elt = $('#cast_elt');
cast_elt.tagsinput({
  
  typeaheadjs: {
    name: 'cast',
    displayKey: 'text',
    valueKey: 'text',
    source: cast.ttAdapter()
  }
});
//cast_elt.tagsinput('add', { "value": 1 , "text": "Amsterdam"   , "continent": "Europe"    });

//.................................director tag script......................................

var director = new Bloodhound({
  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('text'),
  queryTokenizer: Bloodhound.tokenizers.whitespace,
  prefetch: '<?php echo base_url(); ?>AddVideo/getDirector'
});
director.initialize();

var director_elt = $('#director_elt');
director_elt.tagsinput({
 
  typeaheadjs: {
    name: 'director',
    displayKey: 'text',
    valueKey: 'text',
    source: director.ttAdapter()
  }
});
//director_elt.tagsinput('add', { "value": 1 , "text": "Amsterdam"   , "continent": "Europe"    });
    
 function addImg(){
     
     $("#img_btn").append("Some appended text.");
     
 }
    
 $('form').on('keyup keypress', function(e) {
  var keyCode = e.keyCode || e.which;
  if (keyCode === 13) { 
    e.preventDefault();
    return false;
  }
});
    
</script>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>-->