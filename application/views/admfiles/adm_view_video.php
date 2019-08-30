<div id="ctwpcontent">
	
	
	<div class="ctbody-content">
            <form action="<?php echo base_url(); ?>AddVideo/add/<?php echo $video_data['id'];?>" method="post" enctype="multipart/form-data">
		<div class="videoposter-info">
                    <?php echo $this->session->flashdata('msg'); ?>
                    

                    
			<div class="input-wrap">
				<label>Url</label>
                                <div class="cf"><input type="text" required="true" disabled id="videourl" name="videourl" value="<?php echo $video_data['video_url']; ?>" class="input-field"> <input type="button" onclick="getVideoThumb()" class="button-get-info" value="get info"></div>
			</div>
			<div class="image-wrap">
                            <img src="<?php echo base_url().'images/videothumb/'.$video_data['video_thumb']; ?>" id="videoimg" alt="" />
                            <input type="file" name="picture" disabled id="select_image" onchange="putImage()" size="30">
			</div>
			
			<div class="date-category cf">
			<div class="date-wrap cf">
				<label>Date</label>
                                <input data-provide="datepicker" disabled value="<?php echo $video_data['rel_date']; ?>" name="reldate" required="true" data-date-format="dd/mm/yyyy" placeholder="dd/mm/yyyy">

			</div>
			<div class="category-wrap cf">
				<label>Main category</label>
				<select class="select" name="pricat" disabled id="pricat" required="true">
					<option selected="selected" disabled="disabled" value="">Select</option>
                                        <?php
                                            
                                                foreach ($maincat as $value) {
                                                    if($value['id']==$video_data['cat_id']){
                                                        echo '<option value="'.$value['id'].'" selected>'.$value['cat_name'].'</option>'; 
                                                        
                                                    }else{
                                                        echo '<option value="'.$value['id'].'">'.$value['cat_name'].'</option>';
                                                    }
                                                }
                                            
                                            ?>
					
		   		</select>
			</div>
			<div class="category-wrap cf">
				<label>sub category</label>
				<select class="select" name="subcat" disabled id="subcat" required="true">
					<option selected="selected" disabled="disabled" value="">Select</option>
					<?php
                                                $subcat = $controller->getSubCategory($video_data['cat_id']);
                                                foreach ($subcat as $value) {
                                                    if($value['sub_id']==$video_data['subcat_id']){
                                                        echo '<option value="'.$value['sub_id'].'" selected>'.$value['sub_name'].'</option>'; 
                                                        
                                                    }else{
                                                        echo '<option value="'.$value['sub_id'].'">'.$value['sub_name'].'</option>';
                                                    }
                                                }
                                            
                                            ?>
		   		</select>
			</div>
			</div>
			
		</div>
		
		<div class="videoposter-info">
			<div class="input-wrap">
				<label>Name</label>
                                <div class="cf"><input type="text" disabled name="videoname" value="<?php echo $video_data['video_name']; ?>" class="input-field full-field" required="true"></div>
			</div>
			<div class="input-wrap">
				<label>description</label>
                                <div class="cf"><textarea class="description" disabled name="videodesc" rows="10" cols="40" required="true"><?php echo $video_data['video_desc']; ?></textarea></div>
			</div>
			<div class="input-wrap">
				<label>keywords</label>
                                <div class="cf"><input type="text" name="keywords" disabled value="<?php echo $video_data['video_keywords']; ?>" class="input-field full-field" required="true"></div>
			</div>
			<div class="input-wrap">
				<label>Movie</label>
                                <div class="cf"><input type="text" value="" disabled name="movies" required="true" data-role="tagsinput" id="movie_elt" class="input-field"> 
                                    <!--<input type="submit" class="button-add" value="Add">-->
                                </div>
<!--				<div class="tagchecklist cf">
					<span><a href="" class="icon-close"></a>Raees</span>
				</div>-->
			</div>
			<div class="input-wrap">
				<label>Cast</label>
                                <div class="cf"><input type="text" value="" disabled name="cast" required="true" data-role="tagsinput" id="cast_elt" class="input-field"> 
                                    <!--<input type="submit" class="button-add" value="Add">-->
                                </div>
<!--				<div class="tagchecklist cf">
					<span><a href="" class="icon-close"></a>Shah Rukh Khan</span> <span><a href="" class="icon-close"></a>Mahira Khan</span>
				</div>-->
			</div>
			<div class="input-wrap">
				<label>singers</label>
                                <div class="cf"><input type="text" value="" disabled name="singer" required="true" data-role="tagsinput" id="singer_elt" class="input-field"> 
                                    <!--<input type="submit" class="button-add" value="Add">-->
                                </div>
			</div>
			<div class="input-wrap">
				<label>Music</label>
                                <div class="cf"><input type="text" value="" disabled name="music" required="true" data-role="tagsinput" id="music_elt" class="input-field"> 
                                    <!--<input type="submit" class="button-add" value="Add">-->
                                </div>
			</div>
			<div class="input-wrap">
				<label>Director</label>
                                <div class="cf"><input type="text" value="" name="director" required="true" data-role="tagsinput" id="director_elt" class="input-field"> 
                                    <!--<input type="submit" class="button-add" value="Add">-->
                                </div>
			</div>
			<div class="input-wrap">
				<label>Released by (©)</label>
                                <div class="cf"><input type="text" value="" name="rel" disabled required="true" id="rel_elt" data-role="tagsinput" class="input-field"> 
                                    <!--<input type="submit" class="button-add" value="Add">-->
                                </div>
<!--				<div class="tagchecklist cf">
					<span><a href="" class="icon-close"></a>Zee Music</span>
				</div>-->
			</div>
		</div>
                    <input type="hidden" value="" id="videoid" name="videoid"/>
<!--		<input type="submit" name="submit" class="button-blue" value="publics"/>-->
		
	</div>
</form>
</div>

<script>
    $('.datepicker').datepicker();
    //.........................movie tag script..............................
    var movies = '';
    <?php 
    $movies = $controller->getEditMovies($video_data['id']);
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
    $movies = $controller->getEditCast($video_data['id']);
    foreach ($movies as $value) {
    //echo 'test..'.$value['movie_name'];
    ?>
        cast = cast + '<?php echo $value['cast_name'];?>'+',';
       // cast_elt.tagsinput('add', { "value": <?php echo $value['cast_id']; ?> , "text": "<?php echo $value['cast_name'];?>"   , "continent": "Europe"    });
        <?php
}
?>
    document.getElementById('cast_elt').value = ''+cast;
//.................................singer tag script......................................
  var singer = '';
  <?php 
    $movies = $controller->getEditSinger($video_data['id']);
    foreach ($movies as $value) {
    //echo 'test..'.$value['movie_name'];
    ?>
        singer = singer + '<?php echo $value['singer_name'];?>' + ',';
      //  singer_elt.tagsinput('add', { "value": <?php echo $value['singer_id']; ?> , "text": "<?php echo $value['singer_name'];?>"   , "continent": "Europe"    });
        <?php
}
?>
document.getElementById('singer_elt').value = ''+singer;
//.................................music tag script......................................
  var music = '';
  <?php 
    $movies = $controller->getEditMusic($video_data['id']);
    foreach ($movies as $value) {
    //echo 'test..'.$value['movie_name'];
    ?>
        music = music + '<?php echo $value['music_name'];?>' + ',';
       // music_elt.tagsinput('add', { "value": <?php echo $value['music_id']; ?> , "text": "<?php echo $value['music_name'];?>"   , "continent": "Europe"    });
        <?php
}
?>
document.getElementById('music_elt').value = ''+music;
//.................................director tag script......................................
  var director = '';
  <?php 
    $movies = $controller->getEditDirector($video_data['id']);
    foreach ($movies as $value) {
    //echo 'test..'.$value['movie_name'];
    ?>
        director = director + '<?php echo $value['director_name'];?>' + ',';
      //  director_elt.tagsinput('add', { "value": <?php echo $value['director_id']; ?> , "text": "<?php echo $value['director_name'];?>"   , "continent": "Europe"    });
        <?php
}
?>
document.getElementById('director_elt').value = ''+director;
//.................................rel tag script......................................
  var rel_by = '';
  <?php 
    $movies = $controller->getEditRelesedBy($video_data['id']);
    foreach ($movies as $value) {
    //echo 'test..'.$value['movie_name'];
    ?>
        rel_by = rel_by + '<?php echo $value['rel_by_name'];?>' + ',';
      //  rel_elt.tagsinput('add', { "value": <?php echo $value['rel_by_id']; ?> , "text": "<?php echo $value['rel_by_name'];?>"   , "continent": "Europe"    });
        <?php
}
?>
  document.getElementById('rel_elt').value = ''+rel_by;
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

//movies_elt.tagsinput(['test,ttttt']);



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


//.................................singer tag script......................................

var singer = new Bloodhound({
  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('text'),
  queryTokenizer: Bloodhound.tokenizers.whitespace,
  prefetch: '<?php echo base_url(); ?>AddVideo/getSinger'
});
singer.initialize();

var singer_elt = $('#singer_elt');
singer_elt.tagsinput({
  
  typeaheadjs: {
    name: 'singer',
    displayKey: 'text',
    valueKey: 'text',
    source: singer.ttAdapter()
  }
});
//singer_elt.tagsinput('add', { "value": 1 , "text": "Amsterdam"   , "continent": "Europe"    });



//.................................music tag script......................................

var music = new Bloodhound({
  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('text'),
  queryTokenizer: Bloodhound.tokenizers.whitespace,
  prefetch: '<?php echo base_url(); ?>AddVideo/getMusic'
});
music.initialize();

var music_elt = $('#music_elt');
music_elt.tagsinput({
  
  typeaheadjs: {
    name: 'music',
    displayKey: 'text',
    valueKey: 'text',
    source: music.ttAdapter()
  }
});
//music_elt.tagsinput('add', { "value": 1 , "text": "Amsterdam"   , "continent": "Europe"    });



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



//.................................rel tag script......................................

var rel = new Bloodhound({
  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('text'),
  queryTokenizer: Bloodhound.tokenizers.whitespace,
  prefetch: '<?php echo base_url(); ?>AddVideo/getRelesedBy'
});
rel.initialize();

var rel_elt = $('#rel_elt');
rel_elt.tagsinput({
  
  typeaheadjs: {
    name: 'rel',
    displayKey: 'text',
    valueKey: 'text',
    source: rel.ttAdapter()
  }
});
//rel_elt.tagsinput('add', { "value": 1 , "text": "Amsterdam"   , "continent": "Europe"    });

<?php 
    $movies = $controller->getEditRelesedBy($video_data['id']);
    foreach ($movies as $value) {
    //echo 'test..'.$value['movie_name'];
    ?>
      //  rel_elt.tagsinput('add', { "value": <?php echo $value['rel_by_id']; ?> , "text": "<?php echo $value['rel_by_name'];?>"   , "continent": "Europe"    });
        <?php
}
?>




function getVideoThumb(){
    var url = document.getElementById("videourl").value;
    var videoid = url.match(/(?:https?:\/{2})?(?:w{3}\.)?youtu(?:be)?\.(?:com|be)(?:\/watch\?v=|\/)([^\s&]+)/);
    if(videoid != null) {
       //console.log("video id = ",videoid[1]);
       //alert('video..'+videoid[1]);
       var finalurl = '//img.youtube.com/vi/'+videoid[1]+'/0.jpg'
        document.getElementById("videoimg").src= finalurl;
        document.getElementById("videoid").value = videoid[1];
    } else { 
        console.log("The youtube url is not valid.");
    }
    
    
}

var url = document.getElementById("videourl").value;
    var videoid = url.match(/(?:https?:\/{2})?(?:w{3}\.)?youtu(?:be)?\.(?:com|be)(?:\/watch\?v=|\/)([^\s&]+)/);
    if(videoid != null) {
       //console.log("video id = ",videoid[1]);
       //alert('video..'+videoid[1]);
       var finalurl = '//img.youtube.com/vi/'+videoid[1]+'/0.jpg'
        //document.getElementById("videoimg").src= finalurl;
        document.getElementById("videoid").value = videoid[1];
    } else { 
        console.log("The youtube url is not valid.");
    }

//..............................methods for image show...................................
function showImage(src, target) {
    var fr = new FileReader();
    fr.onload = function(){
        target.src = fr.result;
    }
    fr.readAsDataURL(src.files[0]);
}

function putImage() {
    var src = document.getElementById("select_image");
    var target = document.getElementById("videoimg");
    showImage(src, target);
}


$(document).ready(function(){
    $('#pricat').on('change',function(){
        var countryID = $(this).val();
        
        if(countryID){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url('addvideo/getsubcat');?>',
                data:'pri_id='+countryID,
                success:function(html){
                    
                    $('#subcat').html(html);
                   
                }
            }); 
        }else{
            $('#subcat').html('<option value="">Select main category first</option>');
            
        }
    });
    
});


$('form').on('keyup keypress', function(e) {
  var keyCode = e.keyCode || e.which;
  if (keyCode === 13) { 
    e.preventDefault();
    return false;
  }
});

</script>