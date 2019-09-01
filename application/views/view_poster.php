<div id="ctwpcontent">

	<div class="ctbody-content">
            <?php echo $this->session->flashdata('msg'); ?>
            <form action="<?php echo base_url();?>AddPoster/add/<?php echo $poster_data['id'];?>" method="post" enctype="multipart/form-data">
		<div class="videoposter-info">
			<div class="input-wrap">
                            <label>Add Poster Images </label>
				<span class="note">First image will be thumb image.</span>
                                <input type="file" disabled id="select_img" name="picture[]" size="30" multiple>
				
			</div>
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
						<a href="javascript:void(0);" onclick="img_delete(<?php echo $row['id']; ?>);" class="delete">DELETE</a>
<!--						<a href="" class="icon-move"></a>-->
                                            </div>
                                        </a></li>
                                <?php } } ?>
                                </ul>
                            </div> 
                                                        
				
			</div>
<!--			<div class="poster-images-wrap cf">
				<div class="image-wrap">
					<img src="images/dhingana-song.jpg" alt="Dhingana Song � Raees � Shah Rukh Khan" />
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
                                <input data-provide="datepicker" disabled value="<?php echo $poster_data['rel_date'];?>" name="reldate" required="true" data-date-format="dd/mm/yyyy" placeholder="dd/mm/yyyy">
			</div>
			<div class="category-wrap cf">
				<label>sub category</label>
				<select class="select" disabled name="subcat" id="" required>
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
                                <div class="cf"><input type="text" disabled name="name" required value="<?php echo $poster_data['poster_name'];?>" class="input-field full-field"></div>
			</div>
			<div class="input-wrap">
				<label>description</label>
                                <div class="cf"><textarea class="description" disabled required name="desc" rows="10" cols="40"><?php echo $poster_data['poster_desc'];?></textarea></div>
			</div>
			<div class="input-wrap">
				<label>keywords</label>
                                <div class="cf"><input type="text" name="keywords" disabled required value="<?php echo $poster_data['poster_keywords'];?>" class="input-field full-field"></div>
			</div>
			<div class="input-wrap">
				<label>Movie</label>
                                <div class="cf"><input type="text" value="" disabled name="movies" data-role="tagsinput" required="true" id="movie_elt" class="input-field"> 
                                    <!--<input type="submit" class="button-add" value="Add">-->
                                </div>
<!--				<div class="tagchecklist cf">
					<span><a href="" class="icon-close"></a>Raees</span>
				</div>-->
			</div>
			<div class="input-wrap">
					<label>Cast</label>
                                        <div class="cf"><input type="text" disabled value="" name="cast" data-role="tagsinput" required="true" id="cast_elt" class="input-field"> 
                                            <!--<input type="submit" class="button-add" value="Add">-->
                                        </div>
				</div>
			<div class="input-wrap">
					<label>Director</label>
                                        <div class="cf"><input type="text" disabled value="" name="director" data-role="tagsinput" required="true" id="director_elt" class="input-field"> 
                                            <!--<input type="submit" class="button-add" value="Add">-->
                                        </div>
				</div>
		</div>
		
<!--                    <input type="submit" name="submit" class="button-blue" value="publish">-->
                </form>	
	</div>
	
</div>


<script>
    
    
    
    
    $('.datepicker').datepicker();
   var movies = '';
    <?php 
    $movies = $controller->getEditMovies($poster_data['id']);
    foreach ($movies as $value) {
    //echo 'test..'.$value['movie_name'];
    ?>
        movies = movies + '<?php echo $value['movie_name'];?>' + ',';
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
        cast = cast + '<?php echo $value['cast_name'];?>'+',';
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
        director = director + '<?php echo $value['director_name'];?>' + ',';
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
              $('#selected_images').append('<div class="image-wrap"><img src="' + objectUrl + '" /></div>');
              // get rid of the blob
              window.URL.revokeObjectURL(fileList[i]);
            }


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
				$(this).html('').prepend('<img src="<?php echo base_url();?>resources/images/refresh-animated.gif"/>');
				$("ul.reorder-photos-list").sortable('destroy');
				$("#reorder-helper").html( "Reordering Photos - This could take a moment. Please don't navigate away from this page." ).removeClass('light_box').addClass('notice notice_error');
	
				var h = [];
				$("ul.reorder-photos-list li").each(function() {  h.push($(this).attr('id').substr(9));  });
				
				$.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>AddPoster/updateOrder",
					data: {ids: " " + h + ""},
					success: function(data){
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

function img_delete(id){

var r = confirm("Are you sure want to delete image?");

    if(r == true){

                $.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>AddPoster/deleteImg",
					data: {ids: " " + id + ""},
					success: function(data){
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