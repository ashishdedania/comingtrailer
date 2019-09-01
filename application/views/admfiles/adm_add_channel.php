<div id="ctwpcontent">
	<div class="ctbody-content">
            <?php echo $this->session->flashdata('msg'); ?>
            <form onsubmit="return validateImage();" action="AdmAddChannel/add" method="post" enctype="multipart/form-data">
		<div class="user-profile cf">
			<div class="image-name">
                            <img src="http://odedara.com/comingtrailer/resources/images/no-movie.svg"  alt="" id="img" />
                                <input type="file" name="picture" id="select_image" size="30" onchange="putImage()" >
				<div class="cf">
                                    <input type="submit" class="button update" value="update" style="display: none">
					<input type="submit" class="button delete" value="delete" style="display: none">
				</div>
			</div>
			<div class="info-block">
				<div class="input-wrap">
				<label>Name</label>
                                <div class="cf"><input type="text" name="actor" value="" required class="input-field"></div>
				</div>
				<div class="input-wrap">
				<label>Title</label>
                                <div class="cf"><input type="text" name="title" value="" class="input-field"></div>
				</div>
				<div class="input-wrap">
					<label>description</label>
                                        <div class="cf"><textarea class="description" name="desc" rows="10" cols="40"></textarea></div>
				</div>
				<div class="input-wrap">
					<label>keywords</label>
                                        <div class="cf"><input type="text" name="keywords" value="" class="input-field"></div>
				</div>
			</div>
		</div>
                <input type="submit" name="submit" class="button-blue" value="publish">
            </form>
	</div>
	
</div>  
<script>

//..............................methods for image show...................................
var upload_img_res = true;
function validateImage(){
    if(!upload_img_res){
        alert('Please, Upload the file resolution > 400X400');
    }
    return upload_img_res;
}

function showImage(src, target) {
    var fr = new FileReader();
    fr.onload = function(){
        var image  = new Image();
        image.onload = function () {
            if(image.width < 400 || image.height < 400){
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
    var target = document.getElementById("img");
    showImage(src, target);
}


</script>