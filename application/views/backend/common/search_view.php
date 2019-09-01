<?php if($this->router->class != 'user' || ($this->router->class == 'user' && $this->router->method != 'view')) { ?>    
<div class="search-bar cf">
    <select class="select" name="year" id="year">
        <option selected="selected" value="">Year</option>
        <?php if(!empty($search_year)){ foreach($search_year as $row){  ?>
        <option value="<?php echo $row['year']; ?>"><?php echo $row['year']; ?></option>
        <?php } } ?>
    </select>    
    <select class="select" name="month" id="month">
        <option selected="selected" value="">Month</option>
        <option value="01">January</option>
        <option value="02">February</option>
        <option value="03">March</option>
        <option value="04">April</option>
        <option value="05">May</option>
        <option value="06">June</option>
        <option value="07">July</option>
        <option value="08">August</option>
        <option value="09">September</option>
        <option value="10">October</option>
        <option value="11">November</option>
        <option value="12">December</option>
    </select>        
    <input type="text" name="search_keyword" id="search_keyword" placeholder="Search Keywords" value="" class="input-search">    
    <input type="button" class="button-search" id="search_button" value="Search">
</div>
<?php } ?>
<div class="search-bar cf">
    <label>Filter by Date Ranges</label>
    <input type="text"  value="" id="start_date" name="start_date" placeholder="DD-MM-YYYY" class="input-search" <?php echo ($this->router->class == 'user' && $this->router->method == 'index') ? "style='width:15.8%;'" : ""; ?>>
    <input type="text"  value="" id="end_date" name="end_date" placeholder="DD-MM-YYYY" class="input-search" <?php echo ($this->router->class == 'user' && $this->router->method == 'index') ? "style='width:15.8%;'" : ""; ?>>
    <?php if($this->router->class == 'user' && $this->router->method == 'index') { ?>    
    <label>Filter by Most Views of Videos by User</label>
    <input type="checkbox"  value="1" id="most_view_videos" name="most_view_videos" class="input-search" style='width: 3.8%;margin-top:12px;'>
    <?php } ?>
    <input type="button" class="button-search" id="filter_button" value="Search">
</div>