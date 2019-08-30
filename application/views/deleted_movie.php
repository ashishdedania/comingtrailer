<div id="ctwpcontent">
<ul class="language-nav-tabs">
    <?php
        //$controller->getUri();
    ?>
    <li><a href="<?php echo base_url().''.$uri_page;?>/index/0" class="<?php if($uri_subcat_id == 0){ echo '';}?>">All</a></li>
        <?php
    
    foreach ($subcat as $value) {

    ?>
        <li><a href="<?php echo base_url().''.$uri_page;?>/index/<?php echo $value['sub_id'];?>" class="<?php if($uri_subcat_id == $value['sub_id']){ echo 'active';}?>"><?php echo $value['sub_name'];?></a></li>
        
    <?php
    }
    ?>
        <li><a href="<?php echo base_url($this->router->fetch_class());?>/deleted/poster" class="active">DELETE</a></li>    
</ul>
<div class="ctbody-content">
    
        <div class="" id="actor-list">
	<div class="addcategory-total cf">
            <?php echo $this->session->flashdata('msg'); ?>
            <p class="total-number">
            <?php 
                foreach ($movie as $value) {
                    echo ''.$value['count'];
                    ?> 
                    Movie
                    <?php
                    break;
                }
            ?>
            </p>
            <a href="<?php echo base_url();?>AdmAddMovie" class="button icon-add">Add new Movie</a>
	</div>
        <div class="search-bar cf">
<!--            <input type="text" placeholder="Search Keywords" value="" id="search" class="input-search">-->
            <form onsubmit="return searchTrailer();" method="post" name="seo_form" action="<?php echo base_url($uri_page . '/index/' . $uri_subcat_id); ?>">    
                <select class="select" name="search_year" id="search_year">
                    <option value="">Year</option>
                    <?php
                        $cur_year = date('Y');
                        $end_year = $cur_year - 10;
                        for($i = $cur_year; $i >= $end_year; $i--){
                            $selected = ($this->input->post('search_year') && $this->input->post('search_year') == $i) ? 'selected' : '';  
                            echo '<option value="' . $i . '" '.$selected.'>' . $i . '</option>';
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
                <input type="text" name="search_keyword" id="search_keyword" placeholder="Search Keywords" value="<?php echo $this->input->post('search_keyword') ? $this->input->post('search_keyword') : ''?>" class="input-search">
                <input type="submit" class="button-search" name="search"  value="Search">
            </form>
        </div>
        <div class="all-lists cf">
            <div>
                <ul class="list">
                <?php 
                    foreach ($movie as $value) {
                        ?>
                        <li>
                            <a href="<?php echo base_url();?>AdmViewMovie/edit/<?php echo $value['movie_id'];?>/0" name="names">
                                <?php echo $value['movie_name'];?>
                            </a>
                            <div class="restore-delete">
                                            <a href="<?php echo base_url();?>AdmAddMovie/deleteStatus/movie/<?php echo ''.$value['movie_id'];?>/0" class="icon-restore" onclick="return confirm('Are you sure to reactive this movie?')"></a>
                                            <a href="<?php echo base_url('AdmAddMovie/delete/movie/'.$value['movie_id'].'/'.$value['seo_url_id']); ?>" class="icon-delete" onclick="return confirm('Are you sure to parmenatlly delete this movie?')"></a>
                                        </div>
                        </li>
                        <?php
                    }
                ?>
                        
                    </ul>
                    
		</div>
            </div>
        <div class="page-bar cf" style="display: none;">
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
	</div>
<script>
var monkeyList = new List('actor-list', {

valueNames: ['names'],

page: (10*4),

pagination: true

});

    

$('input[type="text"]').keyup(function(){



var that = this, $allListElements = $('ul.list > li');



var $matchingListElements = $allListElements.filter(function(i, li){

    var listItemText = $(li).text().toUpperCase(), 

        searchText = that.value.toUpperCase();

    return ~listItemText.indexOf(searchText);

});



$allListElements.hide();

$matchingListElements.show();



});

    
    function searchTrailer(){
        if($('#search_year').val() || $('#search_month').val() || $('#search_keyword').val()) return true;
        else{
            alert("Please, Select Year, Month or Keyword");
            return false;
        }
    }
</script>
    
    
    </div>

</div>