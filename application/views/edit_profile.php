<style type="text/css">
    .err{
        text-transform: capitalize;
        color: red
    }
</style>
<div id="ctwpcontent">
    <div class="ctbody-content">
        <div class="user-profile cf">
            <div class="image-name">
                <form method="post" enctype="multipart/form-data" onSubmit="return validate_img();" novalidate action="<?php echo base_url(); ?>editProfile/updateProfileImg">
                    <img id="preview_profile_img" src="<?php echo base_url().'images/admin/'.$admData['profile_img'];?>" alt="No Image">
                    <input type="file" id="profile_img" name="profile_img" size="30">
                    <div class="cf">
                        <input type="submit" class="button update" value="update">
                        <div id="profile_img_err" class="err"></div>
                        <?php 
                            if($admData['profile_img']){
                            ?>
                                <a href="<?php echo base_url('editProfile/deleteProfileImg'); ?>" onclick="return confirm('Are you sure to delete the Profile Img?')" class="button delete">Delete</a>
                        <?php } ?>

                    </div>
                </form>
            </div>
            <div class="info-block">
                <form method="post" name="profile_form" onSubmit="return submitdata();" novalidate action="<?php echo base_url('editProfile/edit'); ?>">    
                    <div class="input-wrap">
                        <label>Name</label>
                        <div class="cf">
                            <input type="text" id="name" name="name" value="<?php echo $admData['name']; ?>" class="input-field">
                        </div>
                        <div id="name_err" class="err"></div>
                    </div>
                    <div class="input-wrap">
                        <label>USERNAME</label>
                        <div class="cf"><input type="text" name="username" id="username" value="<?php echo $admData['username']; ?>" class="input-field"></div>
                        <div id="username_err" class="err"></div>
                    </div>
                    <div class="input-wrap">
                        <label>EMAIL ADDRESS</label>
                        <div class="cf"><input type="text" name="email" id="email" value="<?php echo $admData['email']; ?>" class="input-field"></div>
                        <div id="email_err" class="err"></div>
                    </div>
                    <div class="input-wrap">
                        <label>alternative email address</label>
                        <div class="cf"><input type="text" id="alt_email" name="alt_email" value="<?php echo $admData['alt_email']; ?>" class="input-field"></div>
                        <div id="alt_email_err" class="err"></div>
                    </div>
                    <div class="input-wrap">
                        <label>Current Password</label>
                        <div class="cf"><input type="password" value="" name="cur_pass" id="cur_pass" class="input-field"></div>
                        <div id="cur_pass_err" class="err"></div>
                    </div>
                    <div class="input-wrap">
                        <label>New Password</label>
                        <div class="cf"><input type="password" value="" name="new_pass" id="new_pass" class="input-field"></div>
                        <div id="new_pass_err" class="err"></div>
                    </div>
                    <div class="input-wrap">
                        <label>Confirm New password</label>
                        <div class="cf"><input type="password" value="" name="conf_pass" id="conf_pass" class="input-field"></div>
                        <div id="conf_pass_err" class="err"></div>
                    </div>
                    <input type="submit" class="button" value="Save">
                </form>    
            </div>
        </div>

    </div>

</div>
<script type="text/javascript">
    $(document).ready(function(){
        $("#profile_img").change(function(){
            var valid_img_type = ['jpg','jpeg','png','gif','JPG'];
            var file_name = $(this).val().split('\\').pop();
            var file_ext = file_name.split('.').pop();
            if(jQuery.inArray(file_ext,valid_img_type) > -1){
                $('#profile_img_err').html('');
                var output = $('#preview_profile_img'); //-->document.getElementById('preview_profile_img');
                output.attr('src',URL.createObjectURL(event.target.files[0]));
            }else{
                $('#preview_profile_img').attr('src','<?php echo base_url("images/admin/".$admData['profile_img']); ?>');
                if($("#profile_img").val()){
                    $('#profile_img_err').html('Invalid Image Type');
                }
            }
        });
    });
    
    function validate_img(){
        if($("#profile_img").val()){
            var valid_img_type = ['jpg','jpeg','png','gif','JPG'];
            var file_name = $("#profile_img").val().split('\\').pop();
            var file_ext = file_name.split('.').pop();
            if(jQuery.inArray(file_ext,valid_img_type) > -1){
                return true;
            }else{
                return false;
            }
        }else{
            $('#profile_img_err').html('Please, select image');
            return false;
        }
    }
    
    function submitdata(){
        var name = $("#name").val().trim();
        var username = $("#username").val().trim();
        var cur_pass = $("#cur_pass").val();
        var new_pass = $("#new_pass").val();
        var conf_pass = $("#conf_pass").val().trim();
        var email = $("#email").val().trim();
        var alt_email = $("#alt_email").val().trim();
        //var email_patt = "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";
        var email_patt = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/;
        var err = '',id='';
        //alert('enater');
        if(name == "") {
            err = 'Name is required';
            id = 'name_err';
        }else if(username == "") {
            err = 'Username is Required';
            id = 'username_err';
        }else if(email == "") {
            err = 'Email is Required';
            id = 'email_err';
        }else if(!email_patt.test(email)) {
            err = 'Please, Enter the valid Email address';
            id = 'email_err';
        }else if(alt_email != "" && !email_patt.test(alt_email)) {
            err = 'Please, Enter the valid Alternate Email address';
            id = 'alt_email_err';
        }else if(alt_email != "" && email == alt_email) {
            err = 'Eamil and Alternate Email must be different';
            id = 'alt_email_err';
        }else{
//            $.ajax({
//                url : "<?php //echo base_url('editProfile/validate_username_email'); ?>",
//                type: "POST",
//                data : {"username":username,"email":email},
//                async:false,
//                success:function(data, textStatus, jqXHR){
//                    
//                    if(data) {
//                        err = data;
//                        $('#username_err').html(err);
//                        id = 'email_err';
//                    }
//                    alert('done...'+err);
//                },
//                error: function(jqXHR, textStatus, errorThrown) {
//                    //if fails      
//                }
//            });
        }
        if(err){
            $('.err').html('');
            $('#'+id).html(err);
            return false;
        }else if(cur_pass != "" || conf_pass != "") {
            if(cur_pass == ''){
                err = 'Current Password Must Be Required';
                id = 'cur_pass_err';
            }else{
                $.ajax({
                    url : "<?php echo base_url('editProfile/validate_cur_pass'); ?>",
                    type: "POST",
                    data : {"pass":cur_pass},
                    async:false,
                    success:function(data, textStatus, jqXHR){
                        if (!data) {
                            err = "Current Password is not valid.";
                            id = 'cur_pass_err';
                        }else $('#cur_pass_err').html('');
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        //if fails      
                    }
                });
            }
            if(err){
                $('#'+id).html(err);
            }else if(new_pass != ''){
                
                
                if(conf_pass == "") {
                    err = 'Confirm Password Must Be Required';
                    id = 'conf_pass_err';
                }else if(new_pass !== conf_pass) {
                    err = 'New Password And Confirm Password Must Be Same';
                    id = 'conf_pass_err';
                }
                
            }else{
                err = 'New Password Must Be Required';
                id = 'new_pass_err';
            }else return true;
            $('.err').html('');
            $('#'+id).html(err);
            return false;
        }else return true;
    }

</script>