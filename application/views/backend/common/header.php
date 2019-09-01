<div id="header" class="cf">
    <a href="#" class="logo"><img src="<?php echo base_url(); ?>assets/images/logo.svg" height="35" width="180" alt="Coming Trailer" /></a>
    <div class="right-side">
        <a href="<?php echo base_url()."backend/home/logout"; ?>" class="log-out">Log Out</a>
        <div class="profile">
            <a href="<?php echo base_url()."backend/profile"; ?>">
                <img src="<?php echo base_url(); ?><?php echo (!empty($admin_data['profile_img']) && file_exists("./images/admin/".$admin_data['profile_img']))? "images/admin/".$admin_data['profile_img']: 'assets/images/no-user.svg'; ?>" height="35" width="35" />
            </a>
        </div>
        <a href="<?php echo base_url()."backend/poster/add"; ?>" class="icon-add"><span>Add Poster</span></a>
        <a href="<?php echo base_url()."backend/video/add"; ?>" class="icon-add"><span>Add Video</span></a>

    </div>
</div>