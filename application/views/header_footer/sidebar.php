<div class="adminmenuback"></div>
<div class="adminmenu">
	<ul>
            
                <li class="<?php if(strcasecmp($this->uri->segment(1), 'AdminHome') == 0){echo 'current';}?>">
                    <a href="<?php echo base_url().'AdminHome';?>" class="icon-trailer"><span>Trailer</span></a>
                </li>
                <li class="<?php if(strcasecmp($this->uri->segment(1), 'AdminVideo') == 0){echo 'current';}?>">
                    <a href="<?php echo base_url().'AdminVideo';?>" class="icon-video-song"><span>Video Song</span></a>
                </li>
		<li class="<?php if(strcasecmp($this->uri->segment(1), 'AdmViewPoster') == 0){echo 'current';}?>">
                    <a href="<?php echo base_url().'AdmViewPoster';?>" class="icon-movie-poster"><span>Movie Poster</span></a>
                </li>
		<li class="<?php if(strcasecmp($this->uri->segment(1), 'AdmViewMovie') == 0){echo 'current';}?>">
                    <a href="<?php echo base_url().'AdmViewMovie';?>" class="icon-movie"><span>All Movie</span>
                </a></li>
		<li class="<?php if(strcasecmp($this->uri->segment(1), 'AdmViewActor') == 0){echo 'current';}?>">
                    <a href="<?php echo base_url().'AdmViewActor';?>" class="icon-actors"><span>Actors</span></a>
                </li>
		<li class="<?php if(strcasecmp($this->uri->segment(1), 'AdmViewSinger') == 0){echo 'current';}?>">
                    <a href="<?php echo base_url().'AdmViewSinger';?>" class="icon-singers"><span>Singers</span></a>
                </li>
		<li class="<?php if(strcasecmp($this->uri->segment(1), 'AdmViewDirector') == 0){echo 'current';}?>">
                    <a href="<?php echo base_url().'AdmViewDirector';?>" class="icon-director"><span>Director</span></a>
                </li>
		<li class="<?php if(strcasecmp($this->uri->segment(1), 'AdmViewMusic') == 0){echo 'current';}?>">
                    <a href="<?php echo base_url().'AdmViewMusic';?>" class="icon-music-director"><span>Music Director</span></a>
                </li>
		<li class="<?php if(strcasecmp($this->uri->segment(1), 'AdmViewChannel') == 0){echo 'current';}?>">
                    <a href="<?php echo base_url().'AdmViewChannel';?>" class="icon-channel"><span>All Channel</span></a>
                </li>
		
		<li class="<?php if(strcasecmp($this->uri->segment(1), 'AdmViewAllUser') == 0){echo 'current';}?>">
			<a href="<?php echo base_url().'AdmViewAllUser';?>" class="icon-all-user-info"><span>All User Info</span></a>
		</li>
		<li class="<?php if(strcasecmp($this->router->fetch_class(), 'Adsense') == 0){echo 'current';}?> ">
			<a href="<?php echo base_url('Adsense');?>" class="icon-adsense"><span>AdSense</span></a>
		</li>				
		<li class="<?php if(strcasecmp($this->router->fetch_class(), 'AdmAboutUs') == 0){echo 'current';}?> ">			
			<a href="<?php echo base_url('AdmAboutUs');?>" class="icon-about-us"><span>About Us</span></a>		
		</li>
		<li class="<?php if(strcasecmp($this->router->fetch_class(), 'AdmContactUs') == 0){echo 'current';}?> ">			
			<a href="<?php echo base_url('AdmContactUs');?>" class="icon-contact-us"><span>Contact us</span></a>		
		</li>
		
		<li class="<?php if(strcasecmp($this->router->fetch_class(), 'AdmAdvertise') == 0){echo 'current';}?> ">			
			<a href="<?php echo base_url('AdmAdvertise');?>" class="icon-advertise"><span>Advertise</span></a>		
		</li>
		
		<li class="<?php if(strcasecmp($this->router->fetch_class(), 'AdmFaq') == 0){echo 'current';}?> ">			
			<a href="<?php echo base_url('AdmFaq');?>" class="icon-faq"><span>FAQ</span></a>		
		</li>
		
		<li class="<?php if(strcasecmp($this->router->fetch_class(), 'AdmTermsPrivacy') == 0){echo 'current';}?> ">			
			<a href="<?php echo base_url('AdmTermsPrivacy');?>" class="icon-terms-privacy"><span>Terms &amp; Privacy</span></a>		
		</li>
		
		<li class="<?php if(strcasecmp($this->router->fetch_class(), 'AdmPartnership') == 0){echo 'current';}?> ">			
			<a href="<?php echo base_url('AdmPartnership');?>" class="icon-partnership"><span>Partnership</span></a>		
		</li>
                
                <li class="<?php if(strcasecmp($this->router->fetch_class(), 'Sitemap/generateSitemap') == 0){echo 'current';}?> ">			
			<a href="<?php echo base_url('Sitemap/generateSitemap');?>" class="icon-partnership"><span>Sitemap Generate</span></a>		
		</li>
		
	</ul>	
</div>