<div id="ctwpcontent">
<?php
    if(isset($inserted)){
        echo $inserted;
    }
 ?>
	
	<div class="ctbody-content">
            <form action="<?php echo base_url();?>AdmAddSubCat/addSubCat" method="POST">
		<div class="videoposter-info">
			<div class="date-category cf">
			<div class="category-wrap cf">
				<label>Main category</label>
				<select class="select" name="main_cat" id="" required="true">
					<option selected="selected" disabled="disabled" value="">Select</option>
                                        <?php
                                            foreach ($maincat as $value) {
                                                                                            
                                        ?>
                                            <option value="<?php echo $value['id'];?>"><?php echo $value['cat_name'];?></option>
                                        <?php
                                            }
                                        ?>
					
		   		</select>
			</div>
			</div>
			
		</div>
		
		<div class="videoposter-info">
			<div class="input-wrap">
				<label>Name</label>
                                <div class="cf"><input type="text" required="true" value="" class="input-field full-field" name="sub_name"></div>
			</div>
			<div class="input-wrap">
				<label>TITLE</label>
                                <div class="cf"><input type="text" value="" class="input-field full-field" name="sub_title"></div>
			</div>
			<div class="input-wrap">
				<label>description</label>
                                <div class="cf"><textarea class="description" rows="10" cols="40" name="sub_desc"></textarea></div>
			</div>
			<div class="input-wrap">
				<label>keywords</label>
                                <div class="cf"><input type="text" value="" class="input-field full-field" name="sub_keywords"></div>
			</div>
			
		</div>
		
		<input type="submit" class="button-blue" value="publish">
            </form>
	</div>
	
</div>  
</body>
</html>