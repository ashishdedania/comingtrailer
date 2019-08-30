<div id="ctwpcontent">
	<div class="ctbody-content">
            <div class="view-outerbox cf">
                <?php
                    echo $total_mstp['m'].' Movies '.$total_mstp['t'].' Trailers '.$total_mstp['s'].' Songs '.$total_mstp['p'].' Posters ';
                ?>
                <a target="_blank" href="<?php echo $controller->getSeoUrl($actors['seo_url_id']); ?>" class="view-website">
                                View In Website
                            </a>
            </div>
            <?php echo $this->session->flashdata('msg'); ?>
            <form action="<?php echo ''. base_url();?>AdmAddActor/addActor/<?php echo ''.$actors['id'];?>" method="post" enctype="multipart/form-data">
		<div class="user-profile cf">
			<div class="image-name">
                            <?php 
                    $filename = base_url('images/actors/'.$actors['cast_img']);
                        if(@getimagesize($filename)) {
                        ?>
                            <img src="<?php echo base_url().'images/actors/'.$actors['cast_img'];?>"  alt="" id="img" />
                             <?php
                        }else{
                        ?>
                    <img id="img" src="<?php echo base_url('resources/images/no-user.svg'); ?>" alt="No Image" /> 
                        <?php
                    }
                    ?>
                                <input type="file" name="picture" id="select_image" size="30" onchange="putImage()" >
				<div class="cf">
                                    <input type="submit" class="button update" value="update" style="display: none;">
<!--					<input type="submit" class="button delete" value="delete">-->
                                        
				</div>
			</div>
			<div class="info-block">
                            <div class="input-wrap">
                            <label>Name</label>
                            <div class="cf"><input type="text" name="actor" value="<?php echo ''.$actors['cast_name'];?>" required class="input-field"></div>
                            </div>
                            <div class="input-wrap">
                            <label>Title</label>
                            <div class="cf"><input type="text" name="title" value="<?php echo ''.$actors['cast_title'];?>" class="input-field"></div>
                            </div>
                            <div class="input-wrap">
                                    <label>description</label>
                                    <div class="cf"><textarea class="description" name="desc" rows="10" cols="40"><?php echo ''.$actors['cast_desc'];?></textarea></div>
                            </div>
                            <div class="input-wrap">
                                    <label>keywords</label>
                                    <div class="cf"><input type="text" name="keywords" value="<?php echo ''.$actors['cast_keywords'];?>" class="input-field"></div>
                            </div>
                            <input type="submit" name="submit" class="button" value="Update">
                            <a href="<?php echo ''. base_url();?>AdmAddActor/deleteStatus/cast/<?php echo ''.$actors['id'];?>/1" class="button delete">delete actor</a>
			</div>
                    
		</div>
                
            </form>
            <ul class="name-tabs">
                <li><a href="<?php echo base_url('AdmViewActor/editActor/'.$actors['id'].'/m'); ?>" class="<?php echo $mstp == 'm' ? 'active' : ''; ?>">Movie</a></li>
                <li><a href="<?php echo base_url('AdmViewActor/editActor/'.$actors['id'].'/t'); ?>" class="<?php echo $mstp == 't' ? 'active' : ''; ?>">Trailer</a></li>
                <li><a href="<?php echo base_url('AdmViewActor/editActor/'.$actors['id'].'/s'); ?>" class="<?php echo $mstp == 's' ? 'active' : ''; ?>">Song</a></li>
                <li><a href="<?php echo base_url('AdmViewActor/editActor/'.$actors['id'].'/p'); ?>" class="<?php echo $mstp == 'p' ? 'active' : ''; ?>">poster</a></li>
            </ul>
            <div class="search-bar cf">
                <form onsubmit="return searchTrailer()" method="post" name="search_form" action="<?php echo base_url('AdmViewActor/editActor/'.$actors['id'].'/'.$mstp); ?>">    
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
                    <input type="submit" class="button-search" name="search" value="Search">
                </form>    
            </div>
            <?php //echo '<pre>';print_r($actors_data); ?>
            <?php if($mstp == 'm'){ ?>
            <div class="ct-movie-lists">
                <ul class="list cf">
                    <?php
                        $controller = array("m"=>"AdmViewMovie/edit/","s"=>"AddVideo/viewTrailer/","t"=>"AddVideo/viewTrailer/","p"=>'AddPoster/editPoster/');
                        $images_folder = array(
                                            'm'=>'movies',
                                            't'=>'videothumb',
                                            'p'=>'poster',
                                            's'=>'videothumb',
                                        );
                        $mstp_img = ['m'=>'movie_img','s'=>'video_thumb','t'=>'video_thumb','p'=>'poster_image'];
                        foreach($actors_data as $key => $val){
                        ?>
                            <li>
                                <a href="<?php echo base_url($controller[$mstp].$val->mstp_id); ?>">
                                     <?php  $filename = base_url().'images/'.$images_folder[$mstp].'/'.$val->$mstp_img[$mstp];
                        if(@getimagesize($filename)) {
                               ?>
                                    <img src="<?php echo base_url('images/'.$images_folder[$mstp].'/'.$val->$mstp_img[$mstp]); ?>" alt="<?php echo $val->name; ?>">
                                    <?php }else{
                            
                            ?>
                                                <img id="videoimg" src="<?php echo base_url('resources/images/no-movie.svg');; ?>" alt="" />
                                                <?php
                        }?>
                                    <p><?php echo $val->name; ?><span><?php echo $val->rel_year; ?></span></p>
                                </a>
                            </li>
                    
                        <?php
                        }
                    ?>
                    
                </ul>
            </div>
            <div class="page-bar cf">
                <div class="pages cf">
                    <label>1-10 of 100</label>
                    <a href="http://appupwork.com/ct/admin/individual-page-song-movie.html" class="icon-previous"></a>
                    <a href="http://appupwork.com/ct/admin/individual-page-song-movie.html" class="icon-next"></a>
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
                }elseif($mstp == 's' || $mstp == 't'){ 
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
                            //print_r($actors_data);
                            foreach($actors_data as $key => $v){
                                $table_data = json_decode($v->table_data);
                                $table_data = $table_data->data;
                                //echo '<pre>';print_r($table_data);
                                //foreach($table_data->data as $k => $v){
                                ?>    
                                    <tr>
                                        <td><?php echo $key + 1; ?></td>
                                        <td><?php echo date('d M Y, h:m A',strtotime($v->rel_date)); ?></td>
                                        
                                        <td><a href="<?php echo base_url();?>AddVideo/editTrailer/<?php echo $v->video_id; ?>"><?php echo $v->video_name; ?></a></td>
                                        <td>
                                            <?php
                                                $movie_data = '';
                                                if(count($table_data) > 0 && isset($table_data[0]->movies)){
                                                    foreach($table_data[0]->movies as $moviess){
                                                        $movie_data = $movie_data . '<a href="' . base_url() . 'AdmViewMovie/edit/' . $moviess->movie_id . '">' . $moviess->movie_name . '</a>' . ', ';
                                                    }
                                                }    
                                                echo rtrim($movie_data, ", ");
                                            ?>
                                        </td>
                                        <td><?php echo $v->play; ?></td>
                                        <td><?php echo $v->liked; ?></td>
                                        <td>
                                            <a href="<?php 
                                                if($v->cat_id == 1){
                                                    echo base_url('AdminHome/index/'.$v->cat_id.'/'.$v->subcat_id); 
                                                }else{
                                                    echo base_url('AdminVideo/index/'.$v->cat_id.'/'.$v->subcat_id); 
                                                }
                                            ?>">
                                                <?php echo $v->subcat_name; ?>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url('AddVideo/editTrailer/'.$v->video_id); ?>" class="icon-edit"></a>
                                            <a target="_blank" href="<?php echo $controller->getSeoUrl($v->seo_url_id); ?>" class="icon-view"></a>
                                            <a href="<?php echo base_url($this->router->fetch_class().'/deleteStatus/'.$v->video_id); ?>/1" class="icon-delete" onclick="return confirm('Are you sure to delete this video?')"></a>
                                        </td>

                                        <td>
                                            <?php
                                                $movie_data = '';
                                                if(count($table_data) > 0 && isset($table_data[0]->video_cast)){
                                                foreach($table_data[0]->video_cast as $moviess){
                                                    $movie_data = $movie_data . '<a href="' . base_url() . 'AdmViewActor/editActor/' . $moviess->cast_id . '">' . $moviess->cast_name . '</a>' . ', ';
                                                }
                                                }
                                                echo rtrim($movie_data, ", ");
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                $movie_data = '';
                                                if(count($table_data) > 0 && isset($table_data[0]->singer)){
                                                foreach($table_data[0]->singer as $moviess){
                                                    $movie_data = $movie_data . '<a href="' . base_url() . 'AdmViewSinger/edit/' . $moviess->singer_id . '">' . $moviess->singer_name . '</a>' . ', ';
                                                }
                                                }    
                                                echo rtrim($movie_data, ", ");
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                $movie_data = '';
                                                if(count($table_data) > 0 && isset($table_data[0]->Music)){
                                                
                                                foreach($table_data[0]->Music as $moviess){
                                                    $movie_data = $movie_data . '<a href="' . base_url() . 'AdmViewMusic/edit/' . $moviess->music_id . '">' . $moviess->music_name . '</a>' . ', ';
                                                }
                                                }
                                                echo rtrim($movie_data, ", ");
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                $movie_data = '';
                                                if(count($table_data) > 0 && isset($table_data[0]->Director)){
                                                foreach($table_data[0]->Director as $moviess){
                                                    $movie_data = $movie_data . '<a href="' . base_url() . 'AdmViewDirector/edit/' . $moviess->director_id . '">' . $moviess->director_name . '</a>' . ', ';
                                                }
                                                }
                                                echo rtrim($movie_data, ", ");
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                $movie_data = '';
                                                if(count($table_data) > 0 && isset($table_data[0]->releasedBy)){
                                                foreach($table_data[0]->releasedBy as $moviess){
                                                    $movie_data = $movie_data . '<a href="' . base_url() . 'AdmViewChannel/edit/' . $moviess->rel_by_id . '">' . $moviess->rel_by_name . '</a>' . ', ';
                                                }
                                                }
                                                echo rtrim($movie_data, ", ");
                                            ?>
                                        </td>
                                        <td><?php echo $v->video_desc; ?></td>
                                    </tr>
                                    <?php
                                //}
                                }
                        ?>
                    </tbody>
                </table>
	</div>
            <?php }else{ ?>
	
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
            <?php } ?>
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

function searchTrailer(){
    if($('#search_year').val() || $('#search_month').val() || $('#search_keyword').val()) return true;
    else{
        alert("Please, Select Year, Month or Keyword");
        return false;
    }
}
</script>