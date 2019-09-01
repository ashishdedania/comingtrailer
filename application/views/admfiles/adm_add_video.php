<div id="ctwpcontent">
	
	
	<div class="ctbody-content">
            <form action="AddVideo/add" method="post" enctype="multipart/form-data">
		<div class="videoposter-info">
                    <?php echo $this->session->flashdata('msg'); ?>
                    

                    
			<div class="input-wrap">
				<label>Url</label>
                                <div class="cf"><input type="text" required="true" id="videourl" name="videourl" value="" class="input-field"> <input type="button" onclick="getVideoThumb()" class="button-get-info" value="get info"></div>
			</div>
			<div class="image-wrap">
                            <img src="http://odedara.com/comingtrailer/resources/images/no-image.svg" id="videoimg" alt="" />
                            <input type="file" name="picture" id="select_image" onchange="putImage()" size="30">
			</div>
			
			<div class="date-category cf">
			<div class="date-wrap cf">
				<label>Date</label>
                                <input data-provide="datepicker"  class="input-field datepic" name="reldate" required="true" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd">
                                <label style="display: none;">Release Date</label>
                                <input type="hidden" data-provide="datepicker" class="input-field datepic" name="my_reldate" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd">

			</div>
			<div class="category-wrap cf">
				<label>Main category</label>
				<select class="select" name="pricat" id="pricat" required="true">
					<option selected="selected" disabled="disabled" value="">Select</option>
                                        <?php
                                            
                                                foreach ($maincat as $value) {
                                                    if($value['id'] != 3){
                                                        echo '<option value="'.$value['id'].'">'.$value['cat_name'].'</option>';
                                                    }
                                                }
                                            
                                            ?>
					
		   		</select>
			</div>
			<div class="category-wrap cf">
				<label>sub category</label>
				<select class="select" name="subcat" id="subcat" required="true">
					<option selected="selected" disabled="disabled" value="">Select</option>
					
		   		</select>
			</div>
			</div>
			
		</div>
		
		<div class="videoposter-info">
			<div class="input-wrap">
				<label>Name</label>
                                <div class="cf"><input type="text" name="videoname" value="" class="input-field full-field" required="true"></div>
			</div>
			<div class="input-wrap">
				<label>description</label>
                                <div class="cf"><textarea class="description" name="videodesc" rows="10" cols="40"></textarea></div>
			</div>
			<div class="input-wrap">
				<label>keywords</label>
                                <div class="cf"><input type="text" name="keywords" value="" class="input-field full-field"></div>
			</div>
			<div class="input-wrap">
				<label>Movie</label>
                                <div class="cf"><input type="text" value="" name="movies"  data-role="tagsinput" id="movie_elt" class="input-field"> 
                                    <!--<input type="submit" class="button-add" value="Add">-->
                                </div>
<!--				<div class="tagchecklist cf">
					<span><a href="" class="icon-close"></a>Raees</span>
				</div>-->
			</div>
			<div class="input-wrap">
				<label>Cast</label>
                                <div class="cf"><input type="text" value="" name="cast"  data-role="tagsinput" id="cast_elt" class="input-field"> 
                                    <!--<input type="submit" class="button-add" value="Add">-->
                                </div>
<!--				<div class="tagchecklist cf">
					<span><a href="" class="icon-close"></a>Shah Rukh Khan</span> <span><a href="" class="icon-close"></a>Mahira Khan</span>
				</div>-->
			</div>
			<div class="input-wrap">
				<label>singers</label>
                                <div class="cf"><input type="text" value="" name="singer" id="singer_elt" data-role="tagsinput" class="input-field"> 
                                    <!--<input type="submit" class="button-add" value="Add">-->
                                </div>
			</div>
			<div class="input-wrap">
				<label>Music Director</label>
                                <div class="cf"><input type="text" value="" name="music" id="music_elt" data-role="tagsinput" class="input-field"> 
                                    <!--<input type="submit" class="button-add" value="Add">-->
                                </div>
			</div>
			<div class="input-wrap">
				<label>Director</label>
                                <div class="cf"><input type="text" value="" name="director" id="director_elt" data-role="tagsinput" class="input-field"> 
                                    <!--<input type="submit" class="button-add" value="Add">-->
                                </div>
			</div>
			<div class="input-wrap">
				<label>Released by (?)</label>
                                <div class="cf"><input type="text" value="" name="rel" id="rel_elt" data-role="tagsinput" class="input-field"> 
                                    <!--<input type="submit" class="button-add" value="Add">-->
                                </div>
<!--				<div class="tagchecklist cf">
					<span><a href="" class="icon-close"></a>Zee Music</span>
				</div>-->
			</div>
		</div>
                    <input type="hidden" value="" id="videoid" name="videoid"/>
		<input type="submit" name="submit" class="button-blue" value="publics"/>
</form>
</div>

</div>

<script>
    $('.datepicker').datepicker();
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
      confirmKeys: [44],
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
function getVideoThumb(){
    var url = document.getElementById("videourl").value;
    var videoid = url.match(/(?:https?:\/{2})?(?:w{3}\.)?youtu(?:be)?\.(?:com|be)(?:\/watch\?v=|\/)([^\s&]+)/);
    if(videoid != null) {
       //console.log("video id = ",videoid[1]);
       //alert('video..'+videoid[1]);
       var finalurl = '//img.youtube.com/vi/'+videoid[1]+'/maxresdefault.jpg'
        document.getElementById("videoimg").src= finalurl;
        document.getElementById("videoid").value = videoid[1];
        
        var src = document.getElementById("select_image");
    var target = document.getElementById("videoimg");
        
        var fr = new FileReader();
    fr.onload = function(){
        var image  = new Image();
        image.onload = function () {
            
            if(image.width < 1280 || image.height < 720){
                //alert('Image resolution is '+image.width+'X'+image.height+'.Please, Upload the file resolution > 1280X720');
                alert('Please, Upload the file resolution > 1280X720');
                target.src = '<?php echo base_url('resources/images/no-image.svg'); ?>';
//                target.src = '';
                upload_img_res = false;
                return false;
            }else{ 
                upload_img_res = true;
                
            
            }
        
        };
        image.src = fr.result;
            target.src = fr.result;
    }
    fr.readAsDataURL(src.files[0]);
        
        
    } else { 
        console.log("The youtube url is not valid.");
    }
}


//..............................methods for image show...................................
var upload_img_res = true;
function showImage(src, target) {
    var fr = new FileReader();
    fr.onload = function(){
        var image  = new Image();
        image.onload = function () {
            
            if(image.width < 1280 || image.height < 720){
                //alert('Image resolution is '+image.width+'X'+image.height+'.Please, Upload the file resolution > 1280X720');
                alert('Please, Upload the file resolution > 1280X720');
                target.src = '<?php echo base_url('resources/images/no-image.svg');; ?>';
                //src.src = '';
                document.getElementById("select_image").remove();
                $('.image-wrap').append($('<input type="file" name="picture" id="select_image" onchange="putImage()" size="30">'));
                upload_img_res = false;
                return false;
            }else{ 
                upload_img_res = true;
                
            
            }
        
        };
        image.src = fr.result;
            target.src = fr.result;
        
    }
    fr.readAsDataURL(src.files[0]);
}

function putImage() {
    var src = document.getElementById("select_image");
    var target = document.getElementById("videoimg");
    showImage(src, target);
    
}

function validateImage(){
    if(!upload_img_res){
        alert('Please, Upload the file resolution > 1280X720');
    }
    return upload_img_res;
}

$(document).ready(function(){
    $('#pricat').on('change',function(){
        var countryID = $(this).val();
        
        if(countryID){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url('AddVideo/getsubcat');?>',
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