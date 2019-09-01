<div class="ctbody-content">
    <?php
    if(!empty($message)){
        $msg=explode("_",$message);
        echo '<div class="alert alert-'.$msg[0].'">
'.$msg[1].'!
</div>';
    }
    ?>
    <?php if(!empty($edit_data)){ ?>
        <div class="addcategory-total cf">
            <a target="_blank" href="<?php if(!empty($edit_data)){ echo $edit_data['final_url']; } ?>" class="view-website">View in Website</a>
        </div>
    <?php } ?>
    <div class="videoposter-info">
        <?php echo form_open_multipart((!empty($edit_data))? base_url( 'backend/trailer/update' ) : base_url( 'backend/trailer/save' ), array( 'method' => 'POST' ));?>
        <?php if(!empty($edit_data)){ ?>
            <input type="hidden" name="id" value="<?php echo $edit_data['id']; ?>">
            <input type="hidden" name="seo_url_id" value="<?php echo $edit_data['seo_url_id']; ?>">
        <?php } ?>
        <input type="hidden" id="videoid" name="videoid" value="">
        <div class="input-wrap">
            <label>Url</label>
            <div class="cf">
                <input type="url" required name="videourl" id="videourl" value="<?php if(!empty($edit_data)){ echo $edit_data['video_url']; } ?>" class="input-field">
                <input type="button" onclick="getVideoThumb()" class="button-get-info" value="get info">
            </div>
        </div>
        <div class="image-wrap">
            <img src="<?php echo (!empty($edit_data) && file_exists("./images/videothumb/".$edit_data['video_thumb']))? base_url()."images/videothumb/".$edit_data['video_thumb']: ''; ?>"  id="videoimg" alt=""  />
            <input onchange="Upload()" id="file" type="file"  name="attachment" size="30">
        </div>

        <div class="date-category cf">
            <div class="row">
                <div class="col-md-6">
                    <div class="input-wrap">
                        <label>Date</label>
                        <input type="text" required value="<?php if(!empty($edit_data) && date("d-m-Y",strtotime($edit_data['rel_date']))!="01-01-1970"){ echo $edit_data['rel_date']; } ?>" id="date" name="date"  placeholder="DD-MM-YYYY" class="input-field datepic">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-wrap">
                        <label>sub category</label>
                        <select class="select" required name="subcat_id" style="width: 100%"  id="subcat_id">
                            <option selected="selected" disabled="disabled" value="">Select</option>
                            <?php if(!empty($category)) { foreach($category as $row){ ?>
                                <option <?php if(!empty($edit_data) && $edit_data['subcat_id']==$row['id']){ echo "selected"; } ?> value="<?php echo $row['id']; ?>"><?php echo $row['subcat_name']; ?></option>
                            <?php } } ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="videoposter-info">
        <div class="input-wrap">
            <label>Name</label>
            <div class="cf">
                <input type="text" required value="<?php if(!empty($edit_data)){ echo $edit_data['video_name']; } ?>" id="name" name="name" class="input-field full-field">
            </div>
        </div>
        <div class="input-wrap">
            <label>description</label>
            <div class="cf">
                <textarea name="description" id="description" class="description" rows="10" cols="40"><?php if(!empty($edit_data)){ echo $edit_data['video_desc']; } ?></textarea>
            </div>
        </div>
        <div class="input-wrap">
            <label>keywords</label>
            <div class="cf">
                <input type="text" value="<?php if(!empty($edit_data)){ echo $edit_data['video_keywords']; } ?>" name="keywords" id="keywords" class="input-field full-field">
            </div>
        </div>
        <div class="input-wrap">
            <label>Movie</label>
            <div class="cf">
                <select style="width: 100%" id="movie" required name="movie_id" class="js-data-example-ajax">
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
            <label>singers</label>
            <select style="width: 100%" id="singers" name="singers[]" multiple class="personality js-data-example-ajax">
                <?php if(!empty($singers_list) && !empty($edit_data)){ foreach($singers_list as $row){ ?>
                    <option selected value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                <?php } }?>
            </select>

        </div>
        <div class="input-wrap">
            <label>Music by</label>
            <div class="cf">
                <select style="width: 100%" id="music" name="music[]" multiple class="personality js-data-example-ajax">
                    <?php if(!empty($music_list) && !empty($edit_data)){ foreach($music_list as $row){ ?>
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
            <label>Released by (?)</label>
            <div class="cf">
                <select style="width: 100%" id="rel_by" name="rel_by[]" multiple class="js-data-example-ajax">
                    <?php if(!empty($rel_by_list) && !empty($edit_data)){ foreach($rel_by_list as $row){ ?>
                        <option selected value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                    <?php } }?>
                </select>
            </div>
        </div>

        <div class="input-wrap">
            <?php if(!empty($edit_data)){ ?>
                <input type="submit" name="submit" class="button-blue" value="Update">
                <a href="<?php echo base_url()."backend/trailer/status?id=".$edit_data['id']; ?>" class="button-delete btn">delete</a>
            <?php }else{ ?>
                <input type="submit" class="button-blue" value="publish">
            <?php } echo form_close();?>
        </div>

    </div>
</div>

<script type="text/javascript">
    $('#date').datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true,
    });

    function Upload() {
        //Get reference of FileUpload.
        var fileUpload = document.getElementById("file");

        //Check whether the file is valid Image.
        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.jpg|.png|.gif)$");
        if (regex.test(fileUpload.value.toLowerCase())) {

            //Check whether HTML5 is supported.
            if (typeof (fileUpload.files) != "undefined") {
                //Initiate the FileReader object.
                var reader = new FileReader();
                //Read the contents of Image File.
                reader.readAsDataURL(fileUpload.files[0]);
                reader.onload = function (e) {
                    //Initiate the JavaScript Image object.
                    var image = new Image();

                    //Set the Base64 string return from FileReader as source.
                    image.src = e.target.result;

                    //Validate the File Height and Width.
                    image.onload = function () {
                        var height = this.height;
                        var width = this.width;

                        if (height < 720 || width < 1280) {
                            alert("Please, Upload the file resolution > 1280X720");
                            document.getElementById("file").remove();
                            $('#videoimg').attr('src', '');
                            $('.image-wrap').append($('<input type="file" name="picture" id="file" onchange="Upload()" size="30">'));
                            return false;
                        }

                        $('#videoimg')
                            .attr('src', e.target.result);
                        return true;
                    };

                }
            } else {
                alert("This browser does not support HTML5.");
                return false;
            }
        }
    }


    $('#movie').select2({

        minimumInputLength: 2,
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
    $('#rel_by').select2({

        minimumInputLength: 2,
        tags: [],
        ajax: {
            url: '<?php echo base_url()."backend/channel/rel_by_autosuggetion"; ?>',
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



    function getVideoThumb(){
        var url = document.getElementById("videourl").value;
        var videoid = url.match(/(?:https?:\/{2})?(?:w{3}\.)?youtu(?:be)?\.(?:com|be)(?:\/watch\?v=|\/)([^\s&]+)/);
        if(videoid != null) {
            //console.log("video id = ",videoid[1]);
            //alert('video..'+videoid[1]);
            var finalurl = '//img.youtube.com/vi/'+videoid[1]+'/maxresdefault.jpg'
            document.getElementById("videoimg").src= finalurl;
            document.getElementById("videoid").value = videoid[1];

            var src = document.getElementById("file");
            var target = document.getElementById("videoimg");

            var fr = new FileReader();
            fr.onload = function(){
                var image  = new Image();
                image.onload = function () {

                    if(image.width < 1280 || image.height < 720){
                        //alert('Image resolution is '+image.width+'X'+image.height+'.Please, Upload the file resolution > 1280X720');
                        alert('Please, Upload the file resolution > 1280X720');
                        target.src = 'https://www.comingtrailer.com/resources/images/no-image.svg';
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


                    $("#singers").empty();
                    for (var key in json.singer_list) {
                        if (json.singer_list.hasOwnProperty(key)) {
                            $("#singers").append($("<option selected>").val(json.singer_list[key].id).html(json.singer_list[key].text));
                        }
                    }


                    $("#director").empty();
                    for (var key in json.director_list) {
                        if (json.director_list.hasOwnProperty(key)) {
                            $("#director").append($("<option selected>").val(json.director_list[key].id).html(json.director_list[key].text));
                        }
                    }


                    $("#music").empty();
                    for (var key in json.music_list) {
                        if (json.music_list.hasOwnProperty(key)) {
                            $("#music").append($("<option selected>").val(json.music_list[key].id).html(json.music_list[key].text));
                        }
                    }


                });
        }

    });



</script>