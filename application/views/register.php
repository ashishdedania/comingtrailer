<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Coming Trailer | Admin Register</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="description" content="Page Description" />
        <meta name="robots" content="index, follow">
        <link rel="icon" type="image/ico" href="<?php echo base_url(); ?>resources/images/favicon.png" />
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

        <link href="<?php echo base_url(); ?>resources/css/style.css" rel="stylesheet" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <style type="text/css">
            .err{
                text-transform: capitalize;
                color: red
            }
        </style>
    </head>

    <body>
        <div id="login">
            <form method="post" name="register_form" enctype="multipart/form-data" onSubmit="return submitdata();" novalidate action="<?php echo base_url(); ?>register/add">
                <img src="<?php echo base_url(); ?>resources/images/logo.svg" height="35" width="180" alt="Coming Trailer" />
                <label>Name</label>
                <input type="text" name="name" class="input" value="" id="name" size="20" autocomplete="off" required>
                <div id="name_err" class="err"></div>
                <label>Username</label>
                <input type="text" name="username" class="input" value="" id="username" size="20" autocomplete="off" required>
                <div id="username_err" class="err"></div>
                <label>EMAIL ADDRESS</label>
                <input type="email" name="email" class="input" value="" size="20" id="email" autocomplete="off" required>
                <div id="email_err" class="err"></div>
                <label>Alternative email address</label>
                <input type="email" name="alt_email" class="input" value="" id="alt_email" autocomplete="off" size="20" required>
                <div id="alt_email_err" class="err"></div>
                <label>Password</label>
                <input type="password" name="pass" autocomplete="off" id="pass" class="input" value="" size="20" required>
                <div id="pass_err" class="err"></div>
                <label>Confirm Password</label>
                <input type="password" name="conf_pass" id="conf_pass" autocomplete="off" class="input" value="" size="20" required>
                <div id="conf_pass_err" class="err"></div>
                <label>Profile Image</label>
                <input type="file" name="profile_img" id="profile_img" autocomplete="off" class="file">
                <img src="" id="preview_profile_img" height="100px" width="auto" alt="No image">
                <div id="profile_img_err" class="err"></div>
                <input type="submit" class="button-login" value="Register">
            </form>            
        </div>
    </body>
</html>
<script type="text/javascript">
    $(document).ready(function(){
        $("#profile_img").change(function(){
            var valid_img_type = ['jpg','jpeg','png','gif','JPG','JPEG','PNG','GIF'];
            var file_name = $(this).val().split('\\').pop();
            var file_ext = file_name.split('.').pop();
            if(jQuery.inArray(file_ext,valid_img_type) > -1){
                $('#profile_img_err').html('');
                var output = $('#preview_profile_img'); //-->document.getElementById('preview_profile_img');
                output.attr('src',URL.createObjectURL(event.target.files[0]));
            }else{
                $('#preview_profile_img').attr('src','');
                $('#profile_img_err').html('Invalid Image Type');
            }
        });
    });
    function submitdata(){
        var name = $("#name").val().trim();
        var username = $("#username").val().trim();
        var pass = $("#pass").val();
        var conf_pass = $("#conf_pass").val().trim();
        var email = $("#email").val().trim();
        var alt_email = $("#alt_email").val().trim();
        var profile_img = $("#profile_img").val();
        //var email_patt = "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";
        var email_patt = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/;
        var err = '',id='';
        
        var file_name = '',file_ext = '', valid_img_type = ['jpg','jpeg','png','gif','JPG'];
        if(profile_img){
            file_name = $(this).val().split('\\').pop();
            file_ext = file_name.split('.').pop();
        }    
        
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
        }else if (pass == "") {
            err = 'Password Must Be Required';
            id = 'pass_err';
        }else if (conf_pass == "") {
            err = 'Confirm Password Must Be Required';
            id = 'conf_pass_err';
        }else if (pass !== conf_pass) {
            err = 'Password And Confirm Password Must Be Same';
            id = 'conf_pass_err';
        }else if(profile_img && jQuery.inArray(file_ext,valid_img_type) == -1){
            err = 'Invalid Image Type';
            id = 'profile_img_err';    
        }else{
            $.ajax({
                url : "<?php echo base_url('register/valid_username_email'); ?>",
                type: "POST",
                data : {"username":username,"email":email},
                async:false,
                success:function(data, textStatus, jqXHR){
                    if (data) {
                        err = data;
                        $('#username_err').html(err);
                        id = 'email_err';
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    //if fails      
                }
            });
        }
        if(err){
            $('.err').html('');
            $('#'+id).html(err);
            return false;
        }else return true;
    }

</script>