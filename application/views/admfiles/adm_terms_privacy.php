<div id="ctwpcontent">
	<ul class="language-nav-tabs">
		<li><a href="<?php echo base_url('AdmAboutUs'); ?>" class="active">Terms &amp; Privacy</a></li>
	</ul>
	
	<div class="ctbody-content">
		
		
		<div class="content-page">
			<?php echo $this->session->flashdata('msg'); ?>
			<div class="seo-bar">
				<div class="cf">
					<p>Terms &amp; Privacy</p>
					<a href="#" class="arrow icon-arrow-drop-down"></a>
				</div>
				<div class="open-info">
					<form method="post" action="<?php echo base_url('AdmTermsPrivacy/add'); ?>">
						<div class="input-wrap">
							<label>Content</label>
							<div class="cf"><textarea class="input-field full-field" style="height:300px;" id="txtEditor" name="content"><?php echo $content['terms_privacy_content']; ?></textarea></div>
						</div>
						<input type="submit" class="button" value="Save" name="submit">
					</form>
				</div>
			</div>
		</div>
		
		
        <div class="seo-bar">
	 		<div class="cf">
		 		<p>Seo</p>
				<a href="javacript:void(0)" id="searching" class="arrow icon-arrow-drop-down"></a>
			</div>
			 <div class="open-info" id="searchdiv">
                             <form method="post" name="seo_form" action="<?php echo base_url('seo/editInfoSEO/'.$uri_page.'/'.$seo['individual']); ?>">    
                                 <input type="hidden" name="seo_id" value="<?php echo $seo['id']; ?>">
				<div class="input-wrap">
                            <label>Name</label>

                            <div class="cf"><input type="text" name="name" required value="<?php echo $seo['name']; ?>" class="input-field full-field"></div>

                    </div>

                    <div class="input-wrap">

                            <label>TITLE</label>

                            <div class="cf"><input type="text" value="<?php echo $seo['title'];?>" name="title" class="input-field full-field"></div>

                    </div>

                    <div class="input-wrap">

                            <label>description</label>

                            <div class="cf"><textarea name="description" class="description" rows="10" cols="40"><?php echo $seo['description']; ?></textarea></div>

                    </div>

                    <div class="input-wrap">

                            <label>keywords</label>

                            <div class="cf"><input type="text" value="<?php echo $seo['keywords'];?>" name="keywords" class="input-field full-field"></div>

                    </div>
                    <input type="hidden" name="category_name" value="<?php echo 'getAllTrailer';?>">
                    <input type="submit" class="button" value="Save">
                             </form>
			</div>
		
		</div>
		
	</div>
	
</div>