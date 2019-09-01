<div id="ctwpcontent">

	<div class="ctbody-content">
            <div class="view-outerbox cf">
                <a target="_blank" href="<?php echo $controller->getSeoUrl($poster_data['seo_url_id']); ?>" class="view-website">
                                View In Website
                            </a>
            </div>
            <?php echo $this->session->flashdata('msg'); ?>
            <form action="<?php echo base_url();?>AddPoster/add/<?php echo $poster_data['id'];?>" method="post" enctype="multipart/form-data">
		<div class="videoposter-info">
			<div class="input-wrap">
                            <label>Add Poster Images </label>
				<span class="note">First image will be thumb image.</span>
				<input type="file" id="select_img" name="picture[]" size="30" multiple>
				
			</div>
                    <span>Poster</span>
                    <div class="poster-images-wrap cf" id="selected_images">
                           <a href="javascript:void(0);" class="btn outlined mleft_no reorder_link" id="save_reorder">reorder photos</a>
                            <div id="reorder-helper" class="light_box" style="display:none;">1. Drag photos to reorder.<br>2. Click 'Save Reordering' when finished.</div>
                            <div class="gallery">
                                <ul class="reorder_ul reorder-photos-list">
                                <?php 
                                
                                                //Fetch all images from database
                                                $images = $controller->getImageRows($poster_data['id']);
                                                if(!empty($images)){
                                                        foreach($images as $row){
                                        ?>
                                    <li id="image_li_<?php echo $row['id']; ?>" class="ui-sortable-handle"><a href="javascript:void(0);" style="float:none;" class="image_link">
                                            <img src="<?php echo base_url();?>images/poster/<?php echo $row['poster_image']; ?>" alt="">
                                            <div class="cf">
						<a href="javascript:void(0);" onclick="img_delete('<?php echo $row['id']; ?>','<?php echo $row['poster_image'];?>');" class="delete">DELETE</a>
<!--						<a href="" class="icon-move"></a>-->
                            <div>
                                <input type="hidden" name="image_id[]" value="<?php echo $row['id']?>"/>
                                
                                <input type="radio" name="poster_type_<?php echo $row['id']?>" value="1" <?php if($row['poster_type'] == 1){ echo 'checked';}?>/> Poster
                                <input type="radio" name="poster_type_<?php echo $row['id']?>" value="2" <?php if($row['poster_type'] == 2){ echo 'checked';}?>/> First Look
                                <input type="radio" name="poster_type_<?php echo $row['id']?>" value="3" <?php if($row['poster_type'] == 3){ echo 'checked';}?>/> Wallpaper
                                
                            </div>     
                                            </div>
                                        </a></li>
                                <?php } } ?>
                                </ul>
                            </div> 
                                              
				
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


			
		</div>
		
		<div class="videoposter-info">
			<div class="date-category cf">
			<div class="date-wrap cf">
				<label>Date</label>
                                <input data-provide="datepicker" class="datepic" value="<?php echo $poster_data['rel_date'];?>" name="reldate" required="true" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd">
                                <label style="display: none;">Release Date</label>
                                <input type="hidden" data-provide="datepicker" class="datepic" value="<?php echo $poster_data['my_release'];?>" name="my_reldate" required="true" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd">
			</div>
			<div class="category-wrap cf">
				<label>sub category</label>
				<select class="select" name="subcat" id="" required>
					<option selected="selected" disabled="disabled" value="">Select</option>
					<?php
                                            
                                                foreach ($subcat as $value) {
                                                    if($poster_data['subcat_id']==$value['sub_id']){
                                                        
                                                    
                                                        echo '<option value="'.$value['sub_id'].'" selected>'.$value['sub_name'].'</option>';
                                                    }else{
                                                        echo '<option value="'.$value['sub_id'].'">'.$value['sub_name'].'</option>';
                                                    }
                                                }
                                            
                                            ?>
		   		</select>
			</div>
			</div>
			<div class="input-wrap">
				<label>Name</label>
                                <div class="cf"><input type="text" name="name" required value="<?php echo $poster_data['poster_name'];?>" class="input-field full-field"></div>
			</div>
			<div class="input-wrap">
				<label>description</label>
                                <div class="cf"><textarea class="description" name="desc" rows="10" cols="40"><?php echo $poster_data['poster_desc'];?></textarea></div>
			</div>
			<div class="input-wrap">
				<label>keywords</label>
                                <div class="cf"><input type="text" name="keywords" value="<?php echo $poster_data['poster_keywords'];?>" class="input-field full-field"></div>
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
                            <div class="cf"><input type="text" value="" name="cast" data-role="tagsinput" id="cast_elt" class="input-field"> 
                                <!--<input type="submit" class="button-add" value="Add">-->
                            </div>
                        </div>
                        <div class="input-wrap">
                            <label>Director</label>
                            <div class="cf"><input type="text" value="" name="director" data-role="tagsinput" id="director_elt" class="input-field"> 
                                <!--<input type="submit" class="button-add" value="Add">-->
                            </div>
                            
                        </div>
                        <div class="input-wrap">
                            <input type="submit" name="submit" class="button-blue" value="UPDATE">
                            <a href="<?php echo base_url('AdmViewPoster/deleteStatus/'.$poster_data['id']); ?>/1" onclick="return confirm('Are you sure to delete this video?')" class="button-delete btn">
                            Delete
                        </a>
                        </div>
		</div>
		
                    
                </form>	
	</div>
	
</div>


<script>
    
    
    
    
    $('.datepicker').datepicker();
    $.fn.datepicker.noConflict();
   var movies = '';
    <?php 
    $movies = $controller->getEditMovies($poster_data['id']);
    foreach ($movies as $value) {
    //echo 'test..'.$value['movie_name'];
    ?>
        movies = movies + '<?php echo str_replace('\'', '', $value['movie_name']);?>' + ',';
        //movies_elt.tagsinput('add', { "value": <?php echo $value['movie_id']; ?> , "text": "<?php echo $value['movie_name'];?>"   , "continent": "Europe"    });
        <?php
}
    
   //print_r($controller->getEditMovies($video_data['id']));exit;
?>
    
    document.getElementById('movie_elt').value = ''+movies;
    
  //......................................................movies.............................................................. 
  var cast = '';
  <?php 
    $movies = $controller->getEditCast($poster_data['id']);
    foreach ($movies as $value) {
    //echo 'test..'.$value['movie_name'];
    ?>
        cast = cast + '<?php echo str_replace('\'', '', $value['cast_name']);?>'+',';
       // cast_elt.tagsinput('add', { "value": <?php echo $value['cast_id']; ?> , "text": "<?php echo $value['cast_name'];?>"   , "continent": "Europe"    });
        <?php
}
?>
    document.getElementById('cast_elt').value = ''+cast;
    
    //.................................director tag script......................................
  var director = '';
  <?php 
    $movies = $controller->getEditDirector($poster_data['id']);
    foreach ($movies as $value) {
    //echo 'test..'.$value['movie_name'];
    ?>
        director = director + '<?php echo str_replace('\'', '', $value['director_name']);?>' + ',';
      //  director_elt.tagsinput('add', { "value": <?php echo $value['director_id']; ?> , "text": "<?php echo $value['director_name'];?>"   , "continent": "Europe"    });
        <?php
}
?>
document.getElementById('director_elt').value = ''+director;
    
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

<?php 
    $movies = $controller->getEditMovies($poster_data['id']);
    foreach ($movies as $value) {
    //echo 'test..'.$value['movie_name'];
    ?>
       // movies_elt.tagsinput('add', { "value": <?php echo $value['movie_id']; ?> , "text": "<?php echo $value['movie_name'];?>"   , "continent": "Europe"    });
        <?php
}
    
   //print_r($controller->getEditMovies($video_data['id']));exit;
?>
 
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

<?php 
    $movies = $controller->getEditCast($poster_data['id']);
    foreach ($movies as $value) {
    //echo 'test..'.$value['movie_name'];
    ?>
       // cast_elt.tagsinput('add', { "value": <?php echo $value['cast_id']; ?> , "text": "<?php echo $value['cast_name'];?>"   , "continent": "Europe"    });
        <?php
}
?>
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
<?php 
    $movies = $controller->getEditDirector($poster_data['id']);
    foreach ($movies as $value) {
    //echo 'test..'.$value['movie_name'];
    ?>
      //  director_elt.tagsinput('add', { "value": <?php echo $value['director_id']; ?> , "text": "<?php echo $value['director_name'];?>"   , "continent": "Europe"    });
        <?php
}
?>
 
 var inputLocalFont = document.getElementById("select_img");
    inputLocalFont.addEventListener("change",previewImages,false); //bind the function to the input

    function previewImages(){
        var fileList = this.files;

        var anyWindow = window.URL || window.webkitURL;

            for(var i = 0; i < fileList.length; i++){
              //get a blob to play with
              var objectUrl = anyWindow.createObjectURL(fileList[i]);
              // for the next line to work, you need something class="preview-area" in your html
              $('#selected_images').append('<div class="image-wrap"><img src="' + objectUrl + '" /><div class="cf"><a href="" class="delete">DELETE</a></a></div>\n\
  <input type="hidden" name="image_new_id[]" value="'+i+'"/>\n\
<input type="radio" name="poster_type_'+i+'" value="1" checked/> Poster\n\
<input type="radio" name="poster_type_'+i+'" value="2" /> First Look\n\
<input type="radio" name="poster_type_'+i+'" value="3" /> Wallpaper</div>');
    
    
                                
                                
              // get rid of the blob
              window.URL.revokeObjectURL(fileList[i]);
            }


    }
    
    function change(id){
        var elem = document.getElementById(''+id);
        //checkBox = document.getElementById(''+id);
        //checkBox.checked = true;
        elem.checked;
//        checkBox.onchange = function() {
//            
//        };
//        checkBox.onchange();
    
    }
    
    
    $(document).ready(function(){
      
	$('#save_reorder').on('click',function(){
            
		$("ul.reorder-photos-list").sortable({ tolerance: 'pointer' });
                
		$('#save_reorder').html('save reordering');
		$('#save_reorder').attr("id","save_reorder");
		$('#reorder-helper').slideDown('slow');
                
		$('.image_link').attr("href","javascript:void(0);");
		$('.image_link').css("cursor","move");
		$("#save_reorder").click(function( e ){
			if( !$("#save_reorder i").length ){
				$(this).html('').prepend('<img src="<?php echo base_url();?>resources/images/refresh-animated.gif"/>');
				$("ul.reorder-photos-list").sortable('destroy');
				$("#reorder-helper").html( "Reordering Photos - This could take a moment. Please don't navigate away from this page." ).removeClass('light_box').addClass('notice notice_error');
	
				var h = [];
				$("ul.reorder-photos-list li").each(function() {  h.push($(this).attr('id').substr(9));  });
                                
				$.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>AddPoster/updateOrder",
					data: {ids: " " + h + "",type:"poster"},
					success: function(html){
                                            //alert(html);
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


function img_delete(id,img){

var r = confirm("Are you sure want to delete image?");

    if(r == true){

                $.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>AddPoster/deleteImg",
					data: {ids: " " + id + "",img: ""+img},
					success: function(html){
//                                            alert(html);
                                                alert('Image deleted successfully');
						window.location.reload();
					}
				});
    }
}


$('form').on('keyup keypress', function(e) {
  var keyCode = e.keyCode || e.which;
  if (keyCode === 13) { 
    e.preventDefault();
    return false;
  }
});

    
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<!--Links for Date picker-->
        <link href="<?php echo base_url(); ?>resources/css/datepicker.css" rel="stylesheet" />
        <script src="<?php echo base_url(); ?>resources/js/bootstrap-datepicker.js"></script>