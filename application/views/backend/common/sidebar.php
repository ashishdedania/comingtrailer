<div class="adminmenuback"></div>
<div class="adminmenu">
    <ul>
     
       <li class="<?php if($view_name=="category_tb_view.php" || $view_name=="category_view.php" || $view_name=="home_seo_view.php"){ echo "current" ; } ?>">
            <a href="<?php echo base_url()."backend/category"; ?>" class="icon-trailer ">
                <span>Dashboard</span>
            </a>
        </li>
        <li class="<?php if($this->uri->segment(1)=="backend" && $this->uri->segment(2)=="playlist"){ echo "current" ; } ?>">
            <a href="<?php echo base_url()."backend/playlist"; ?>" class="icon-trailer">
                <span>Playlist</span>
            </a>
        </li>
        <li class="<?php if($this->uri->segment(1)=="backend" && $this->uri->segment(2)=="trailer"){ echo "current" ; } ?>">
            <a href="<?php echo base_url()."backend/trailer"; ?>" class="icon-trailer">
                <span>Trailer</span>
            </a>
        </li>
        <li class="<?php if($this->uri->segment(1)=="backend" && $this->uri->segment(2)=="video"){ echo "current" ; } ?>">
            <a href="<?php echo base_url()."backend/video"; ?>" class="icon-video-song">
                <span>Video Song</span>
            </a>
        </li>
        <li class="<?php if($view_name=="poster_tb_view.php" || $view_name=="poster_view.php"){ echo "current" ; } ?>">
            <a href="<?php echo base_url()."backend/poster"; ?>" class="icon-movie-poster">
                <span>Movie Poster</span>
            </a>
        </li>
        <li class="<?php if($view_name=="movie_tb_view.php" || $view_name=="movie_view.php"){ echo "current" ; } ?>">
            <a href="<?php echo base_url()."backend/movie"; ?>" class="icon-movie">
                <span>All Movie</span>
            </a>
        </li>
        <li class="<?php if((isset($occupation) && $occupation1 == 'all' && $view_name=="personality_tb_view.php") || $view_name=="personality_view.php"){ echo "current" ; } ?>">
            <a href="<?php echo base_url()."backend/personality/all"; ?>" class="icon-actors">
                <span>Personality</span>
            </a>
        </li>   
        <li class="<?php if((isset($occupation) && $occupation == 'cast' && $occupation1=='cast' && $view_name=="personality_tb_view.php") || $view_name=="personality_view.php"){ echo "current" ; } ?>">
            <a href="<?php echo base_url()."backend/personality"; ?>" class="icon-actors">
                <span>Actors</span>
            </a>
        </li>        
        <li class="<?php if(isset($occupation) && $occupation == 'singer'){ echo "current" ; } ?>">
            <a href="<?php echo base_url()."backend/personality/singer"; ?>" class="icon-singers">
                <span>Singers</span>
            </a>
        </li>
        <li class="<?php if(isset($occupation) && $occupation == 'director'){ echo "current" ; } ?>">
            <a href="<?php echo base_url()."backend/personality/director"; ?>" class="icon-director">
                <span>Director</span>
            </a>
        </li>
        <li class="<?php if(isset($occupation) && $occupation == "music_director"){ echo "current" ; } ?>">
            <a href="<?php echo base_url()."backend/personality/music_director"; ?>" class="icon-music-director">
                <span>Music Director</span>
            </a>
        </li>
        <li class="<?php if($view_name=="channel_tb_view.php" || $view_name=="channel_view.php"){ echo "current" ; } ?>">
            <a href="<?php echo base_url()."backend/channel"; ?>" class="icon-channel">
                <span>All Channel</span>
            </a>
        </li>
        <li class="<?php if($view_name=="user_tb_view.php"){ echo "current" ; } ?>">
            <a href="<?php echo base_url()."backend/user"; ?>" class="icon-all-user-info">
                <span>All User Info</span>
            </a>
        </li>
        <li class="<?php if($view_name=="adsense_view.php"){ echo "current" ; } ?>">
            <a href="<?php echo base_url()."backend/adsense"; ?>" class="icon-adsense">
                <span>AdSense</span>
            </a>
        </li>
        <li class="<?php if($view_name=="about_view.php"){ echo "current" ; } ?>">
                <a href="<?php echo base_url()."backend/about"; ?>" class="icon-about-us">
                    <span>About Us</span>
                </a>
        </li>
        <li class="<?php if($view_name=="contact_view.php" || $view_name=="contact_form_view.php"){ echo "current" ; } ?>">
            <a href="<?php echo base_url()."backend/contact"; ?>" class="icon-contact-us">
                <span>Contact us</span>
            </a>
        </li>
        <li class="<?php if($view_name=="advertise_view.php" || $view_name=="advertise_form_view.php"){ echo "current" ; } ?>">
            <a href="<?php echo base_url()."backend/advertise"; ?>" class="icon-advertise">
                <span>Advertise</span>
            </a>
        </li>
        <li class="<?php if($view_name=="faq_view.php"){ echo "current" ; } ?>">
            <a href="<?php echo base_url()."backend/faq"; ?>" class="icon-faq">
                <span>FAQ</span>
            </a>
        </li>
        <li class="<?php if($view_name=="terms_view.php"){ echo "current" ; } ?>">
            <a href="<?php echo base_url()."backend/terms"; ?>" class="icon-terms-privacy">
                <span>Terms &amp; Privacy</span>
            </a>
        </li>
        <li class="<?php if($view_name=="partnership_view.php" || $view_name=="partnership_form_view.php"){ echo "current" ; } ?>">
            <a href="<?php echo base_url()."backend/partnership"; ?>" class="icon-partnership">
                <span>Partnership</span>
            </a>
        </li>
         <li class="<?php if($view_name=="partnership_view.php" || $view_name=="partnership_form_view.php"){ echo "current" ; } ?>">
            <a href="<?php echo base_url()."backend/Sitemap/generateSitemap"; ?>" class="icon-partnership">
                <span>Sitemap Generate</span>
            </a>
        </li>
    </ul>
</div>