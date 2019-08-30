<div id="ctwpcontent">
	<div class="ctbody-content">
            <?php
                echo $total_mstp['t'].' Trailers '.$total_mstp['s'].' Songs '.$total_mstp['p'].' Poster';
            ?>
            <div class="view-outerbox cf">
                <a target="_blank" href="<?php echo $controller->getSeoUrl($actors['seo_url_id']); ?>" class="view-website">
                                View In Website
                            </a>
            </div>
            <?php echo $this->session->flashdata('msg'); ?>
            <form action="<?php echo ''. base_url();?>AdmAddMovie/add/<?php echo ''.$actors['id'];?>" method="post" enctype="multipart/form-data">
		<div class="user-profile cf">
			<div class="image-name">
                            <?php 
                    $filename = base_url('images/movies/'.$actors['movie_img']);
                        if(@getimagesize($filename)) {
                        ?>
                            <img src="<?php echo base_url().'images/movies/'.$actors['movie_img'];?>"  alt="" id="img" />
                             <?php
                        }else{
                        ?>
                    <img id="img" src="<?php echo base_url('resources/images/no-movie.svg'); ?>" alt="No Image" /> 
                        <?php
                    }
                    ?>
                            <input type="file" name="picture" id="select_image" size="30" onchange="putImage()">
				<div class="cf">
                                    <input type="submit" class="button update" value="update" style="display: none;">
<!--					<input type="submit" class="button delete" value="delete">-->
                                        
				</div>
			</div>
			<div class="info-block">
				<div class="input-wrap">
				<label>Name</label>
                                <div class="cf"><input type="text" name="name" value="<?php echo ''.$actors['movie_name'];?>" required class="input-field"></div>
				</div>
				<div class="input-wrap">
				<label>Title</label>
                                <div class="cf"><input type="text" name="title" value="<?php echo ''.$actors['movie_title'];?>" class="input-field"></div>
				</div>
				<div class="input-wrap">
					<label>description</label>
                                        <div class="cf"><textarea class="description" name="desc" rows="10" cols="40"><?php echo ''.$actors['movie_desc'];?></textarea></div>
				</div>
				<div class="input-wrap">
					<label>keywords</label>
                                        <div class="cf"><input type="text" name="keywords" value="<?php echo ''.$actors['movie_keywords'];?>" class="input-field"></div>
				</div>
                            <div class="date-category cf">
					<div class="date-wrap cf">
				<label>Date</label>
                                <input data-provide="datepicker" class="datepic" id="my_date1" name="reldate" value="<?php echo ''.$actors['rel_date'];?>" required="true" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd">
                                <label>Release Date</label>
                                <input data-provide="datepicker" class="datepic" id="my_date" name="my_reldate" value="<?php if($actors['my_release'] == '0000-00-00'){ echo ''; }else{echo ''.$actors['my_release'];}?>" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd">
			   	
			</div>
					<div class="category-wrap cf">
				<label>category</label>
                                <select class="select" name="subcat" id="" required>
					<option selected="selected" disabled="disabled" value="">Select</option>
					<?php
                                                //$subcat = $controller->getSubcat();
                                                foreach ($subcat as $value) {
                                                    if($value['sub_id']==$actors['subcat_id']){
                                                        echo '<option value="'.$value['sub_id'].'" selected>'.$value['sub_name'].'</option>'; 
                                                        
                                                    }else{
                                                        echo '<option value="'.$value['sub_id'].'">'.$value['sub_name'].'</option>';
                                                    }
                                                }
                                            
                                            ?>
		   		</select>
			</div>
				</div>
                            <div class="input-wrap">
				<label>Cast</label>
                                <div class="cf"><input type="text" value="" name="cast" data-role="tagsinput" id="cast_elt" class="input-field"> 
                                    <!--<input type="submit" class="button-add" value="Add">-->
                                </div>
<!--				<div class="tagchecklist cf">
					<span><a href="" class="icon-close"></a>Shah Rukh Khan</span> <span><a href="" class="icon-close"></a>Mahira Khan</span>
				</div>-->
			</div>
			<div class="input-wrap">
				<label>singers</label>
                                <div class="cf"><input type="text" value="" name="singer" data-role="tagsinput" id="singer_elt" class="input-field"> 
                                    <!--<input type="submit" class="button-add" value="Add">-->
                                </div>
			</div>
			<div class="input-wrap">
				<label>Music</label>
                                <div class="cf"><input type="text" value="" name="music" data-role="tagsinput" id="music_elt" class="input-field"> 
                                    <!--<input type="submit" class="button-add" value="Add">-->
                                </div>
			</div>
			<div class="input-wrap">
				<label>Director</label>
                                <div class="cf"><input type="text" value="" name="director" data-role="tagsinput" id="director_elt" class="input-field"> 
                                    <!--<input type="submit" class="button-add" value="Add">-->
                                </div>
			</div>
                            <input type="submit" name="submit" class="button" value="Update">
<!--                            <a href="<?php echo ''. base_url();?>AdmAddMovie/delete/movie/<?php echo ''.$actors['id'];?>" class="button delete">delete movie</a>-->
                            <a href="<?php echo ''. base_url();?>AdmAddMovie/deleteStatus/movie/<?php echo ''.$actors['id'];?>/1" class="button delete">delete movie</a>
			</div>
		</div>
                
            </form>
            <ul class="name-tabs">
                <li><a href="<?php echo base_url('AdmViewMovie/edit/'.$actors['id'].'/t'); ?>" class="<?php echo $mstp == 't' ? 'active' : ''; ?>">Trailer</a></li>
                <li><a href="<?php echo base_url('AdmViewMovie/edit/'.$actors['id'].'/s'); ?>" class="<?php echo $mstp == 's' ? 'active' : ''; ?>">Song</a></li>
                <li><a href="<?php echo base_url('AdmViewMovie/edit/'.$actors['id'].'/p'); ?>" class="<?php echo $mstp == 'p' ? 'active' : ''; ?>">Poster</a></li>
            </ul>
            <div class="search-bar cf">
                <form onsubmit="return searchTrailer()" method="post" name="search_form" action="<?php echo base_url('AdmViewMovie/edit/'.$actors['id'].'/'.$mstp); ?>">    
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
                        <option  value="">Month</option>
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
            <?php 
            if($mstp == 's' || $mstp == 't'){ 
            ?>
            <div class="table-responsive ctlists">	
                <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            
                            <th>Name</th>
                            <th>Movie</th>
                            <th>Play</th>
                            <th>Like</th>
                            <th>Category</th>
                            <th>Action</th>
                            <th>Cast</th>
                            <th>Singer</th>
                            <th>Music</th>
                            <th>Director</th>
                            <th>(&copy;)</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody id="trailer-data">
                        <?php
                            //echo '<pre>';print_r($actors_data);exit;
                        
                            foreach($actors_data as $key => $v1){
                                $table_data = json_decode($v1->table_data);
                                $table_data = $table_data->data;
                                
                                foreach($table_data as $k => $v){
                                    
                                ?>    
                                    <tr>
                                        <td><?php echo $key + 1; ?></td>
                                        <td><?php echo date('d M Y',strtotime($v1->rel_date)); ?></td>
                                        
                                        <td><a href="<?php echo base_url();?>AddVideo/editTrailer/<?php echo $v1->video_id; ?>"><?php echo $v1->video_name; ?></a></td>
                                        <td>
                                            <?php
                                                $movie_data = '';
                                                
                                                if(count($v) > 0 && isset($v->movies)){
                                                    foreach($v->movies as $moviess){
                                                        $movie_data = $movie_data . '<a href="' . base_url() . 'AdmViewMovie/edit/' . $moviess->movie_id . '">' . $moviess->movie_name . '</a>' . ', ';
                                                    }
                                                }
                                                echo $movie_data;
                                            ?>
                                        </td>
                                        <td><?php echo $v1->play; ?></td>
                                        <td><?php echo $v1->liked; ?></td>
                                        <td>
                                            <a href="<?php 
                                                if($v->cat_id == 1){
                                                    echo base_url('AdminHome/index/'.$v1->cat_id.'/'.$v1->subcat_id); 
                                                }else{
                                                    echo base_url('AdminVideo/index/'.$v1->cat_id.'/'.$v1->subcat_id); 
                                                }
                                            ?>">
                                                <?php echo $v->subcat_name; ?>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url('AddVideo/editTrailer/'.$v1->video_id); ?>" class="icon-edit"></a>
                                            <a target="_blank" href="<?php echo $controller->getSeoUrl($v1->seo_url_id); ?>" class="icon-view"></a>
                                            <a href="<?php echo base_url($this->router->fetch_class().'/deleteStatus/'.$v1->video_id); ?>/1" class="icon-delete" onclick="return confirm('Are you sure to delete this video?')"></a>
                                        </td>
	
                                        <td>
                                            <?php
                                                $movie_data = '';
                                                
                                                if(count($v) && isset($v->video_cast)){
                                                    foreach($v->video_cast as $moviess){
                                                        $movie_data = $movie_data . '<a href="' . base_url() . 'AdmViewActor/editActor/' . $moviess->cast_id . '">' . $moviess->cast_name . '</a>' . ', ';
                                                    }
                                                }    
                                                echo rtrim($movie_data, ", ");
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                $movie_data = '';
                                                if(count($v) && isset($v->singer)){
                                                    foreach($v->singer as $moviess){
                                                        $movie_data = $movie_data . '<a href="' . base_url() . 'AdmViewSinger/edit/' . $moviess->singer_id . '">' . $moviess->singer_name . '</a>' . ', ';
                                                    }
                                                }    
                                                echo rtrim($movie_data, ", ");
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                $movie_data = '';
                                                if(count($v) && isset($v->Music)){
                                                    foreach($v->Music as $moviess){
                                                        $movie_data = $movie_data . '<a href="' . base_url() . 'AdmViewMusic/edit/' . $moviess->music_id . '">' . $moviess->music_name . '</a>' . ', ';
                                                    }
                                                }
                                                echo rtrim($movie_data, ", ");
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                $movie_data = '';
                                                if(count($v) && isset($v->Director)){
                                                    foreach($v->Director as $moviess){
                                                        $movie_data = $movie_data . '<a href="' . base_url() . 'AdmViewDirector/edit/' . $moviess->director_id . '">' . $moviess->director_name . '</a>' . ', ';
                                                    }
                                                }
                                                echo rtrim($movie_data, ", ");
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                $movie_data = '';
                                                if(count($v) && isset($v->releasedBy)){
                                                   
                                                    foreach($v->releasedBy as $moviess){
                                                        $movie_data = $movie_data . '<a href="' . base_url() . 'AdmViewChannel/edit/' . $moviess->rel_by_id . '">' . $moviess->rel_by_name . '</a>' . ', ';
                                                    }
                                                }
                                                echo rtrim($movie_data, ", ");
                                            ?>
                                        </td>
                                        <td><?php echo $v1->video_desc; ?></td>
                                    </tr>
                                    <?php
                                }
                            }
                        ?>
                    </tbody>
                </table>
</div>  
            
            <?php }else{
            ?>
            <div class="table-responsive ctlists">	
                <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            
                            <th>Name</th>
                            <th>Movie</th>
                            <th>View</th>
                            <th>Like</th>
                            <th>Category</th>
                            <th>Action</th>
                            <th>Cast</th>
                            <th>Director</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody id="trailer-data">
                        <?php
                            foreach($actors_data as $key => $val){
                                $table_data = json_decode($val->table_data);
                                //print_r($table_data->data);
                                foreach($table_data->data as $k => $v){
                                ?>   
                                    <tr>
                                        <td><?php echo $k + 1; ?></td>
                                        <td><?php echo date('d M Y, h:m A',strtotime($v->release_date)); ?></td>
                                        <!--<td><?php //echo date('d M Y, h:m A',strtotime($v->my_release_date)); ?></td>-->
                                        <td><a href="<?php echo ''. base_url();?>AddPoster/editPoster/<?php echo $v->poster_id; ?>"><?php echo $v->poster_name; ?></a></td>
                                        <td>
                                            <?php
                                                $movie_data = '';
                                                foreach ($v->movies as $moviess) {
                                                    $movie_data = $movie_data . '<a href="' . base_url() . 'AdmViewMovie/edit/' . $moviess->movie_id . '">' . $moviess->movie_name . '</a>' . ', ';
                                                }
                                                echo rtrim($movie_data, ", ");
                                            ?>
                                        </td>
                                        <td><?php echo $v->total_views; ?></td>
                                        <td><?php echo $v->total_likes; ?></td>
                                        <td>
                                            <a href="<?php echo base_url('AdmViewPoster/index/3/'.$v->subcat_id); ?>">
                                                <?php echo $v->subcat_name; ?>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url();?>AddPoster/editPoster/<?php echo $v->poster_id; ?>" class="icon-edit"></a> 
                                            <?php //echo $controller->getSeoUrl($v->seo_url_id); ?>
                                            <a target="_blank" href="<?php echo $controller->getSeoUrl($v->seo_url_id);?>" class="icon-view"></a>
                                            <a href="<?php echo base_url($this->router->fetch_class().'/deleteStatus/'.$v->poster_id); ?>/1" class="icon-delete" onclick="return confirm('Are you sure to delete this video?')"></a>
                                        </td>

                                        <td>
                                            <?php
                                                $movie_data = '';
                                                foreach ($v->poster_cast as $moviess) {
                                                    $movie_data = $movie_data . '<a href="' . base_url() . 'AdmViewActor/editActor/' . $moviess->cast_id . '">' . $moviess->cast_name . '</a>' . ', ';
                                                }
                                                echo rtrim($movie_data, ", ");
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                $movie_data = '';
                                                foreach ($v->director as $moviess) {
                                                    $movie_data = $movie_data . '<a href="' . base_url() . 'AdmViewDirector/edit/' . $moviess->director_id . '">' . $moviess->director_name . '</a>' . ', ';
                                                }
                                                echo rtrim($movie_data, ", ");
                                            ?>
                                        </td>
                                        <td><?php echo $v->poster_desc; ?></td>
                                    </tr>
                                <?php    
                                }
                                
                            }
                        ?>
                    </tbody>
                </table>
</div> 
            
            <?php }?>
            
	</div>
	
</div>

<script>
    $(document).ready(function() {
        $('table.nowrap').DataTable();
        $('a[data-toggle="tab"]').on( 'shown.bs.tab', function (e) {
            $.fn.dataTable.tables( {visible: true, api: true} ).columns.adjust();
        });
    } );
</script>
<script>
$('#my_date1').datepicker();
$('#my_date').datepicker();

var cast = '';
  <?php 
    $movies = $controller->getEditCast($actors['id']);
    foreach ($movies as $value) {
    //echo 'test..'.$value['movie_name'];
    ?>
        cast = cast + '<?php echo $value['cast_name'];?>'+',';
       // cast_elt.tagsinput('add', { "value": <?php echo $value['cast_id']; ?> , "text": "<?php echo $value['cast_name'];?>"   , "continent": "Europe"    });
        <?php
}
?>
    document.getElementById('cast_elt').value = ''+cast;
//.................................singer tag script......................................
  var singer = '';
  <?php 
    $movies = $controller->getEditSinger($actors['id']);
    foreach ($movies as $value) {
    //echo 'test..'.$value['movie_name'];
    ?>
        singer = singer + '<?php echo $value['singer_name'];?>' + ',';
      //  singer_elt.tagsinput('add', { "value": <?php echo $value['singer_id']; ?> , "text": "<?php echo $value['singer_name'];?>"   , "continent": "Europe"    });
        <?php
}
?>
document.getElementById('singer_elt').value = ''+singer;
//.................................music tag script......................................
  var music = '';
  <?php 
    $movies = $controller->getEditMusic($actors['id']);
    foreach ($movies as $value) {
    //echo 'test..'.$value['movie_name'];
    ?>
        music = music + '<?php echo $value['music_name'];?>' + ',';
       // music_elt.tagsinput('add', { "value": <?php echo $value['music_id']; ?> , "text": "<?php echo $value['music_name'];?>"   , "continent": "Europe"    });
        <?php
}
?>
document.getElementById('music_elt').value = ''+music;
//.................................director tag script......................................
  var director = '';
  <?php 
    $movies = $controller->getEditDirector($actors['id']);
    foreach ($movies as $value) {
    //echo 'test..'.$value['movie_name'];
    ?>
        director = director + '<?php echo $value['director_name'];?>' + ',';
      //  director_elt.tagsinput('add', { "value": <?php echo $value['director_id']; ?> , "text": "<?php echo $value['director_name'];?>"   , "continent": "Europe"    });
        <?php
}
?>
document.getElementById('director_elt').value = ''+director;


//..............................Cast tag script.................................

var cast = new Bloodhound({
  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('text'),
  queryTokenizer: Bloodhound.tokenizers.whitespace,
  prefetch: '<?php echo base_url(); ?>AddVideo/getCast'
});
cast.initialize();

var cast_elt = $('#cast_elt');
cast_elt.tagsinput({
  
  typeaheadjs: {
    name: 'cast',
    displayKey: 'text',
    valueKey: 'text',
    source: cast.ttAdapter()
  }
});
//cast_elt.tagsinput('add', { "value": 1 , "text": "Amsterdam"   , "continent": "Europe"    });

//.................................singer tag script......................................

var singer = new Bloodhound({
  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('text'),
  queryTokenizer: Bloodhound.tokenizers.whitespace,
  prefetch: '<?php echo base_url(); ?>AddVideo/getSinger'
});
singer.initialize();

var singer_elt = $('#singer_elt');
singer_elt.tagsinput({
  
  typeaheadjs: {
    name: 'singer',
    displayKey: 'text',
    valueKey: 'text',
    source: singer.ttAdapter()
  }
});
//singer_elt.tagsinput('add', { "value": 1 , "text": "Amsterdam"   , "continent": "Europe"    });



//.................................music tag script......................................

var music = new Bloodhound({
  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('text'),
  queryTokenizer: Bloodhound.tokenizers.whitespace,
  prefetch: '<?php echo base_url(); ?>AddVideo/getMusic'
});
music.initialize();

var music_elt = $('#music_elt');
music_elt.tagsinput({
 
  typeaheadjs: {
    name: 'music',
    displayKey: 'text',
    valueKey: 'text',
    source: music.ttAdapter()
  }
});
//music_elt.tagsinput('add', { "value": 1 , "text": "Amsterdam"   , "continent": "Europe"    });



//.................................director tag script......................................

var director = new Bloodhound({
  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('text'),
  queryTokenizer: Bloodhound.tokenizers.whitespace,
  prefetch: '<?php echo base_url(); ?>AddVideo/getDirector'
});
director.initialize();

var director_elt = $('#director_elt');
director_elt.tagsinput({
  confirmKeys: [13, 188],
  typeaheadjs: {
    name: 'director',
    displayKey: 'text',
    valueKey: 'text',
    source: director.ttAdapter()
  }
});
//director_elt.tagsinput('add', { "value": 1 , "text": "Amsterdam"   , "continent": "Europe"    });



  
//..............................methods for image show...................................

function showImage(src, target) {
    var fr = new FileReader();
    fr.onload = function(){
        target.src = fr.result;
    }
    fr.readAsDataURL(src.files[0]);
}

function putImage() {
    var src = document.getElementById("select_image");
    var target = document.getElementById("img");
    showImage(src, target);
}

$('form').on('keyup keypress', function(e) {
  var keyCode = e.keyCode || e.which;
  if (keyCode === 13) { 
    e.preventDefault();
    return false;
  }
});



</script>