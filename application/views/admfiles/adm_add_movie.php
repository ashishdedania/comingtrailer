<div id="ctwpcontent">
	<div class="ctbody-content">
	<form onsubmit="return validateImage();" action="AdmAddMovie/add" method="post" enctype="multipart/form-data">	
		<div class="user-profile cf">
                    <?php echo $this->session->flashdata('msg'); ?>
			<div class="image-name">
				<img src="http://odedara.com/comingtrailer/resources/images/no-movie.svg" id="videoimg" alt="" />
				<input type="file" name="picture" id="select_image" onchange="putImage()" size="30">
				<div class="cf">
<!--					<input type="submit" class="button update" value="update">-->
<!--					<input type="submit" class="button delete" value="delete">-->
				</div>
			</div>
			<div class="info-block">
				<div class="input-wrap">
				<label>Name</label>
                                <div class="cf"><input type="text" value="" name="name" required="true" class="input-field"></div>
				</div>
				<div class="input-wrap">
				<label>Title</label>
                                <div class="cf"><input type="text" value="" name="title" class="input-field"></div>
				</div>
				<div class="input-wrap">
					<label>description</label>
                                        <div class="cf"><textarea class="description" name="desc" rows="10" cols="40"></textarea></div>
				</div>
				<div class="input-wrap">
					<label>keywords</label>
                                        <div class="cf"><input type="text" value="" name="keywords" class="input-field"></div>
				</div>
				<div class="date-category cf">
					<div class="date-wrap cf">
				<label>Date</label>
                                <input data-provide="datepicker" name="reldate" class="datepic" required="true" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd">
			   	<label>Release Date</label>
				<input data-provide="datepicker" name="my_reldate" class="datepic" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd">
			</div>
					<div class="category-wrap cf">
				<label>category</label>
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
					<label>Cast</label>
                                        <div class="cf"><input type="text" value="" data-role="tagsinput" name="cast" id="cast_elt" class="input-field"> 
                                            <!--<input type="submit" class="button-add" value="Add">-->
                                        </div>
				</div>
				<div class="input-wrap">
					<label>singers</label>
                                        <div class="cf"><input type="text" value=""  data-role="tagsinput"name="singer" id="singer_elt" class="input-field"> 
                                            <!--<input type="submit" class="button-add" value="Add">-->
                                        </div>
				</div>
				<div class="input-wrap">
					<label>Music</label>
                                        <div class="cf"><input type="text" value="" data-role="tagsinput" name="music" id="music_elt" class="input-field"> 
                                            <!--<input type="submit" class="button-add" value="Add">-->
                                        </div>
				</div>
				<div class="input-wrap">
					<label>Director</label>
                                        <div class="cf"><input type="text" value="" name="director" data-role="tagsinput" id="director_elt" class="input-field"> 
                                            <!--<input type="submit" class="button-add" value="Add">-->
                                        </div>
				</div>
			</div>
		</div>
            <input type="submit" class="button-blue" name="submit" value="publish">
                </form>
	</div>
	
</div>
<script>
    $('.datepicker').datepicker();
    
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
    
    
    
    //..............................methods for image show...................................
var upload_img_res = true;
function validateImage(){
    if(!upload_img_res){
        alert('Please, Upload the file resolution > 500X500');
    }
    return upload_img_res;
}

function showImage(src, target) {
    var fr = new FileReader();
    fr.onload = function(){
        var image  = new Image();
        image.onload = function () {
            if(image.width < 500 || image.height < 500){
                //alert('Image resolution is '+image.width+'X'+image.height+'.Please, Upload the file resolution > 1280X720');
                upload_img_res = false;return false;
            }else upload_img_res = true;
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

$('form').on('keyup keypress', function(e) {
  var keyCode = e.keyCode || e.which;
  if (keyCode === 13) { 
    e.preventDefault();
    return false;
  }
});

    </script>