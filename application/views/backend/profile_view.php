<div class="ctbody-content">
    <?php
    if(!empty($message)){
        $msg=explode("_",$message);
        echo '<div class="alert alert-'.$msg[0].'">
           '.$msg[1].'!
        </div>';
    }
    ?>

    <div class="user-profile cf">
        <div class="image-name">
            <?php echo form_open_multipart(base_url( 'backend/profile/save_profile_img' ), array( 'method' => 'POST' ));?>
            <input type="hidden" name="id" value="<?php echo $admin_data['id']; ?>">
            <img id="my-img" src="<?php echo base_url(); ?>assets/images/<?php echo (!empty($admin_data['profile_img']) && file_exists("./assets/images/".$admin_data['profile_img']))? $admin_data['profile_img']: 'no-user.svg'; ?>" alt="">
            <input type="file" onchange="readURL(this);" name="user_file" size="30">
            <div class="cf">
                <input type="submit" class="button update" value="update">
                <?php if(!empty($admin_data['profile_img'])){ ?>
                    <a onclick="return confirm('Are You Sure You Wan\'t To Delete?')" href="<?php echo base_url()."backend/profile/remove_img";  ?>"  class="button delete" >
                        Delete
                    </a>
                <?php } ?>
            </div>
            <?php echo form_close();?>
        </div>
        <div class="info-block">
            <?php echo form_open(base_url( 'backend/profile/save' ), array( 'method' => 'POST' ));?>
            <input type="hidden" name="id" value="<?php echo $admin_data['id']; ?>">
            <div class="input-wrap">
                <label>Name</label>
                <div class="cf"><input type="text" name="name" value="<?php echo $admin_data['name']; ?>" required class="input-field"></div>
            </div>
            <div class="input-wrap">
                <label>USERNAME</label>
                <div class="cf"><input type="text" name="username" value="<?php echo $admin_data['username']; ?>" required class="input-field"></div>
            </div>
            <div class="input-wrap">
                <label>EMAIL ADDRESS</label>
                <div class="cf"><input type="email" name="email" value="<?php echo $admin_data['email']; ?>" required class="input-field"></div>
            </div>
            <div class="input-wrap">
                <label>alternative email address</label>
                <div class="cf"><input type="email" name="alt_email" value="<?php echo $admin_data['alt_email']; ?>" required  class="input-field"></div>
            </div>
            <div class="input-wrap">
                <label>Current Password</label>
                <div class="cf"><input type="password" name="current_password" value="" class="input-field"></div>
            </div>
            <div class="input-wrap">
                <label>New Password</label>
                <div class="cf"><input type="password" name="new_password" value="" class="input-field"></div>
            </div>
            <div class="input-wrap">
                <label>Confirm New password</label>
                <div class="cf"><input type="password" name="confirm_password" value="" class="input-field"></div>
            </div>
            <input type="submit" class="button" value="Save">
            <?php echo form_close();?>
        </div>
    </div>

</div>
<script type="application/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#my-img')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>