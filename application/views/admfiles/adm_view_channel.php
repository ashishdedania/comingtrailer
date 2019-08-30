<div id="ctwpcontent">
    <ul class="language-nav-tabs">
    
    <li><a href="<?php echo base_url('AdmViewChannel');?>" class="<?php if($is_delete == 'no'){ echo 'active';}?>">All</a></li>
        
    <li><a href="<?php echo base_url($this->router->fetch_class());?>/deleted/director" class="<?php if($is_delete == 'yes'){ echo 'active';}?>">DELETE</a></li>    
</ul>
    <div class="ctbody-content" id="actor-list">
	<div class="addcategory-total cf">
            <?php echo $this->session->flashdata('msg'); ?>
			<p class="total-number">
                             <?php 
                                        foreach ($actors as $value) {
                                            echo ''.$value['count'];?> Channel
                        <?php
                        break;
                                        }
                                    ?>
                        </p>
                        <a href="<?php echo base_url();?>AdmAddChannel" class="button icon-add">Add New Channel</a>
		</div>
    <div class="search-bar cf">
        <form method="post" name="seo_form" action="<?php echo base_url('AdmViewChannel'); ?>">    
            <select class="select" name="search_year" id="search_year">
                <option value="">Year</option>
                <?php
                    foreach($year_list as $i){
                        $selected = ($this->input->post('search_year') && $this->input->post('search_year') == $i['year']) ? 'selected' : '';  
                        echo '<option value="' . $i['year'] . '" '.$selected.'>' . $i['year'] . '</option>';
                    }
                ?>
            </select>
            <select class="select" name="search_month" id="search_month">
                <option value="">Month</option>
                <?php
                    for($i = 1; $i <= 12; $i++){
                        $dateObj = DateTime::createFromFormat('!m', $i);
                        $monthName = $dateObj->format('F');
                        $selected = ($this->input->post('search_month') && $this->input->post('search_month') == $i) ? 'selected' : '';  
                        echo '<option value="' . $i . '" '.$selected.'>' . $monthName . '</option>';
                    }
                ?>
            </select>
            <input type="text" name="search_keyword" placeholder="Search Keywords" value="<?php echo $this->input->post('search_keyword') ? $this->input->post('search_keyword') : ''?>" class="input-search">
            <input type="submit" class="button-search" name="search"  value="Search">
        </form>
		</div>
		
		<div class="all-lists cf">
			<div>
				<ul class="list">
                                    <?php 
                                           if($actors[0]['count']>0){         
                                        foreach ($actors as $value) {
                                            if($value['count']>0){
                                            ?>
                                    
                                    <li>
                                        <?php if($is_delete == 'no'){
                                            ?>
                                        <a href="<?php echo base_url();?>AdmViewChannel/edit/<?php echo ''.$value['rel_by_id'];?>" name="names"><?php echo ''.$value['rel_by_name'];?></a>
                                        <?php
                                        }else{
                                            ?>
                                        <a href="<?php echo base_url();?>AdmViewChannel/edit/<?php echo ''.$value['rel_by_id'];?>" name="names"><?php echo ''.$value['rel_by_name'];?></a>
                                        <div class="restore-delete">
                                            <a href="<?php echo base_url();?>AdmAddChannel/deleteStatus/released_by/<?php echo ''.$value['rel_by_id'];?>/0" class="icon-restore" onclick="return confirm('Are you sure to reactive this channel?')"></a>
                                            <a href="<?php echo base_url('AdmAddChannel/delete/released_by/'.$value['rel_by_id'].'/'.$value['seo_url_id']); ?>" class="icon-delete" onclick="return confirm('Are you sure to parmenatlly delete this channel?')"></a>
                                        </div>
                                        <?php
                                        }
                                            }
                                        ?>
                                    </li>
                                    <?php
                                        }
                                           }else{
                                                echo '<li>Data Not Found</li>';
                                            }
                                    ?>

				</ul>
                            <ul class="pagination" style="display: none !important;"></ul>
			</div>
			
			
                   
		</div>
			
		<div class="page-bar cf" style="display: none">
			<div class="pages cf">
		   		<label>1-10 of 100</label>
		   		<a href="" class="icon-previous"></a>
		   		<a href="" class="icon-next"></a>
		   </div>
		   <div class="show-rows">
			<label>Show rows:</label>
			<select class="select" name="" id="">
				<option value="">10</option>
				<option value="">25</option>
				<option value="">50</option>
				<option value="">100</option>
				<option value="">250</option>
				<option value="">500</option>
				<option value="">1000</option>
				<option value="">2500</option>
		   </select>
		   </div>
		</div>
        <?php 
        if($is_delete != 'yes'){
        ?>
		<div class="seo-bar" style="">
		
                    <div class="cf">

                        <p>Seo</p>

                        <a href="javacript:void(0)" id="searching" class="arrow icon-arrow-drop-down"></a>

	</div>

                    <div class="open-info" id="searchdiv">
                        <form method="post" name="seo_form" action="<?php echo base_url('seo/editIndividual/'.$uri_page.'/'.$seo['individual']); ?>">    
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
        <?php }?>
	</div>
    </div>
<script>
    var monkeyList = new List('actor-list', {
  valueNames: ['names'],
  page: 50000,
  pagination: true
});
    
    $('input[name="search_keyword"]').keyup(function(){

    var that = this, $allListElements = $('ul.list > li');

    var $matchingListElements = $allListElements.filter(function(i, li){
        var listItemText = $(li).text().toUpperCase(), 
            searchText = that.value.toUpperCase();
        return ~listItemText.indexOf(searchText);
    });

    $allListElements.hide();
    $matchingListElements.show();

});
    
    function searchData(){
        if($('#search_year').val() || $('#search_month').val() || $('#search_keyword').val()) return true;
        else{
            alert("Please, Select Year, Month or Keyword");
            return false;
        }
    } 
</script>