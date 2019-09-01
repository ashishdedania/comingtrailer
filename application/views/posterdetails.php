<div class="ctbody-content">

    <div class="addcategory-total cf">

        <?php
        $datas = json_decode($poster);
        ?>

        <p class="total-number"><?php echo $datas->total_poster; ?> Poster</p>

        <a href="<?php echo base_url(); ?>AdmAddSubCat" class="button icon-add">Add new sub category</a>

    </div>

   

    <div class="search-bar cf" style="">

        <form onsubmit="return searchTrailer()"  method="post" name="seo_form" action="<?php echo base_url($uri_page . '/index/' . $cat_id . '/' . $subcat_id); ?>">    
            <select class="select" name="search_year" id="search_year">
                <option selected="selected" disabled="disabled" value="">Year</option>
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
            <input type="text" name="search_keyword" id="search_keyword" placeholder="Search Keywords" value="" class="input-search">
            <input type="submit" class="button-search" name="search" value="Search">
        </form>

    </div>

    <div class="table-responsive  ctlists">	

        <table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
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
            <tbody>
        <?php
            $trailer_data = $datas->data;

            $no = 1;

            foreach ($trailer_data as $trailer) {
                
                if (!empty($trailer)) {
                    $video_id = $trailer->poster_id
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo date('d M Y, h:i:s A',strtotime($trailer->release_date)); ?></td>
                        
                        <td><a href="backend/poster/edit?id=<?php echo $video_id; ?>"><?php echo $trailer->poster_name; ?></a></td>
                        <td>
                            <?php
                                $movie_data = '';
                                foreach ($trailer->movies as $moviess) {
                                    $movie_data = $movie_data . '<a href="' . base_url() . 'AdmViewMovie/edit/' . $moviess->movie_id . '">' . $moviess->movie_name . '</a>' . ', ';
                                }
                                echo rtrim($movie_data, ", ");
                            ?>
                        </td>
                        <td><?php echo $trailer->total_views; ?></td>
                        <td><?php echo $trailer->total_likes; ?></td>
                        <td>
                            <a href="<?php echo base_url('AdmViewPoster/index/3/'.$trailer->subcat_id); ?>">
                                <?php echo $trailer->subcat_name; ?>
                            </a>
                        </td>
                        <td>
                            <a href="<?php echo base_url();?>backend/poster/edit?id=<?php echo $video_id; ?>" class="icon-edit"></a> 
                            <a target="_blank" href="<?php echo $controller->getSeoUrl($trailer->seo_url_id);?>" class="icon-view"></a>
                            <a href="<?php echo base_url($this->router->fetch_class().'/deleteStatus/'.$video_id); ?>/1" class="icon-delete" onclick="return confirm('Are you sure to delete this video?')"></a>
                        </td>
                        
                        <td>
                            <?php
                                $movie_data = '';
                                foreach ($trailer->poster_cast as $moviess) {
                                    $movie_data = $movie_data . '<a href="' . base_url() . 'AdmViewActor/editActor/' . $moviess->cast_id . '">' . $moviess->cast_name . '</a>' . ', ';
                                }
                                echo rtrim($movie_data, ", ");
                            ?>
                        </td>
                        <td>
                            <?php
                                $movie_data = '';
                                foreach ($trailer->director as $moviess) {
                                    $movie_data = $movie_data . '<a href="' . base_url() . 'AdmViewDirector/edit/' . $moviess->director_id . '">' . $moviess->director_name . '</a>' . ', ';
                                }
                                echo rtrim($movie_data, ", ");
                            ?>
                        </td>
                        <td><?php echo $trailer->poster_desc; ?></td>
                    </tr>
                    <?php
                }
            }
        ?>
        </tbody>
    </table>
</div>

    
    <div class="seo-bar" style="">

        <div class="cf">

            <p>Seo</p>

            <a href="javacript:void(0)" id="searching" class="arrow icon-arrow-drop-down"></a>

        </div>

        <div class="open-info" id="searchdiv">
            <form method="post" name="seo_form" action="<?php echo base_url('seo/edit/'.$uri_page.'/'.$cat_id.'/'.$subcat_id); ?>">    
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
    
    <div class="seo-bar" style="display: none;">

        <div class="cf">

            <p>Seo</p>

            <a href="#" class="arrow icon-arrow-drop-down"></a>

        </div>

        <div class="open-info">
            <form method="post" name="seo_form" action="<?php echo base_url('seo/edit/'.$uri_page.'/'.$cat_id.'/'.$subcat_id); ?>">    
                <input type="hidden" name="seo_id" value="<?php echo $seo['id']; ?>">
                <div class="input-wrap">
                        <label>Name</label>

                        <div class="cf"><input type="text" name="name" required value="<?php echo $seo['name']; ?>" class="input-field full-field"></div>

                </div>

                <div class="input-wrap">

                        <label>TITLE</label>

                        <div class="cf"><input type="text" value="<?php echo $seo['title'];?>" required name="title" class="input-field full-field"></div>

                </div>

                <div class="input-wrap">

                        <label>description</label>

                        <div class="cf"><textarea name="description" required class="description" rows="10" cols="40"><?php echo $seo['description']; ?></textarea></div>

                </div>

                <div class="input-wrap">

                        <label>keywords</label>

                        <div class="cf"><input type="text" value="<?php echo $seo['keywords'];?>" required name="keywords" class="input-field full-field"></div>

                </div>
                <input type="hidden" name="category_name" value="<?php echo 'getAllTrailer';?>">
                <input type="submit" class="button" value="Save">
            </form>    

        </div>
    </div>





    <div class="search-bar cf" style="display: none;">

        <select class="select" name="" id="">

            <option selected="selected" disabled="disabled" value="">Year</option>

            <option value="">2017</option>

            <option value="">2016</option>

            <option value="">2015</option>

            <option value="">2014</option>

            <option value="">2013</option>

            <option value="">2012</option>

            <option value="">2011</option>

            <option value="">2010</option>

            <option value="">2009</option>

            <option value="">2008</option>

            <option value="">2007</option>

            <option value="">2006</option>

            <option value="">2005</option>

            <option value="">2004</option>

            <option value="">2003</option>

            <option value="">2002</option>

            <option value="">2001</option>

            <option value="">2000</option>

        </select>

        <select class="select" name="" id="">

            <option selected="selected" disabled="disabled" value="">Month</option>

            <option value="">January 01</option>

            <option value="">February 02</option>

            <option value="">March 03</option>

            <option value="">April 04</option>

            <option value="">May 05</option>

            <option value="">June 06</option>

            <option value="">July 07</option>

            <option value="">August 08</option>

            <option value="">September 09</option>

            <option value="">October 10</option>

            <option value="">November 11</option>

            <option value="">December 12</option>

        </select>

        <input type="text" placeholder="Search Keywords" value="" class="input-search">

        <input type="submit" class="button-search" value="Search">

    </div>



    <div class="ctlists" style="display: none;">

        <ul class="title cf">

            <li class="col1"><a href="#">#</a></li>

            <li class="col2"><a href="#">Date<span class="icon-arrow-drop-down"></span></a></li>

            <li class="col3"><a href="#" class="active">Name<span class="icon-arrow-drop-up"></span></a></li>

            <li class="col4"><a href="#">Movie<span class="icon-arrow-drop-down"></span></a></li>

            <li class="col5"><a href="#">play<span class="icon-arrow-drop-down"></span></a></li>

            <li class="col6"><a href="#">like<span class="icon-arrow-drop-down"></span></a></li>

            <li class="col7"><a href="#">category<span class="icon-arrow-drop-down"></span></a></li>

            <li class="col8"><a href="#">action</a></li>

        </ul>

        <ul class="info-list cf">

            <li class="col1">1</li>

            <li class="col2">23 Jan 2017, 5:20 PM</li>

            <li class="col3"><a href="#">Dhingana Song ? Raees ? Shah Rukh Khan</a></li>

            <li class="col4"><a href="#">Raees</a></li>

            <li class="col5">52,000</li>

            <li class="col6">2,000</li>

            <li class="col7"><a href="#">HINDI</a></li>

            <li class="col8"><a href="#" class="icon-edit"></a> <a href="#" class="icon-view"></a> <a href="#" class="icon-arrow-drop-down"></a></li>

            <ul class="open-info clear">

                <li class="cf"><label>Cast</label><p><a href="">Shah Rukh Khan</a> <a href="">Mahira Khan</a> <a href="">Nawazuddin Siddiqui</a></p></li>

                <li class="cf"><label>singers</label><p><a href="">Mika Singh</a></p></li>

                <li class="cf"><label>Music</label><p><a href="">Ram Sampath</a></p></li>

                <li class="cf"><label>Director</label><p><a href="">Rahul Dholakia</a></p></li>

                <li class="cf"><label>(?)</label><p><a href="">Zee Music</a></p></li>

                <li class="cf"><label>description</label><p>Watch Latest Video Song Dhandhe Ka Dhingana From Shah Rukh Khan's Upcoming movie Raees. Song Sung By Mika Singh.</p></li>

            </ul>

        </ul>

        <ul class="info-list cf">

            <li class="col1">2</li>

            <li class="col2">23 Jan 2017, 5:20 PM</li>

            <li class="col3"><a href="#">Mere Miyan Gaye England Video Song </a></li>

            <li class="col4"><a href="#">Rangoon</a></li>

            <li class="col5">52,000</li>

            <li class="col6">2,000</li>

            <li class="col7"><a href="#">HINDI</a></li>

            <li class="col8"><a href="#" class="icon-edit"></a> <a href="#" class="icon-view"></a> <a href="#" class="icon-arrow-drop-down"></a></li>

        </ul>

        <ul class="info-list cf">

            <li class="col1">3</li>

            <li class="col2">23 Jan 2017, 5:20 PM</li>

            <li class="col3"><a href="#">Jee Lein HD Video</a></li>

            <li class="col4"><a href="#">OK Jaanu</a></li>

            <li class="col5">52,000</li>

            <li class="col6">2,000</li>

            <li class="col7"><a href="#">HINDI</a></li>

            <li class="col8"><a href="#" class="icon-edit"></a> <a href="#" class="icon-view"></a> <a href="#" class="icon-arrow-drop-down"></a></li>

        </ul>

        <ul class="info-list cf">

            <li class="col1">4</li>

            <li class="col2">23 Jan 2017, 5:20 PM</li>

            <li class="col3"><a href="#">Pyaar Ka Test HD Video</a></li>

            <li class="col4"><a href="#">RunningShaadi</a></li>

            <li class="col5">52,000</li>

            <li class="col6">2,000</li>

            <li class="col7"><a href="#">HINDI</a></li>

            <li class="col8"><a href="#" class="icon-edit"></a> <a href="#" class="icon-view"></a> <a href="#" class="icon-arrow-drop-down"></a></li>

        </ul>

        <ul class="info-list cf">

            <li class="col1">5</li>

            <li class="col2">23 Jan 2017, 5:20 PM</li>

            <li class="col3"><a href="#">Jolly Good Fellow</a></li>

            <li class="col4"><a href="#">Jolly LLB 2</a></li>

            <li class="col5">52,000</li>

            <li class="col6">2,000</li>

            <li class="col7"><a href="#">HINDI</a></li>

            <li class="col8"><a href="#" class="icon-edit"></a> <a href="#" class="icon-view"></a> <a href="#" class="icon-arrow-drop-down"></a></li>

        </ul>

        <ul class="info-list cf">

            <li class="col1">6</li>

            <li class="col2">23 Jan 2017, 5:20 PM</li>

            <li class="col3"><a href="#">Yeh Ishq Hai</a></li>

            <li class="col4"><a href="#">Rangoon</a></li>

            <li class="col5">52,000</li>

            <li class="col6">2,000</li>

            <li class="col7"><a href="#">HINDI</a></li>

            <li class="col8"><a href="#" class="icon-edit"></a> <a href="#" class="icon-view"></a> <a href="#" class="icon-arrow-drop-down"></a></li>

        </ul>

        <ul class="info-list cf">

            <li class="col1">7</li>

            <li class="col2">23 Jan 2017, 5:20 PM</li>

            <li class="col3"><a href="#">Jung Hai Humri Aatankwad Se</a></li>

            <li class="col4"><a href="#">MSG Lion Heart 2</a></li>

            <li class="col5">52,000</li>

            <li class="col6">2,000</li>

            <li class="col7"><a href="#">HINDI</a></li>

            <li class="col8"><a href="#" class="icon-edit"></a> <a href="#" class="icon-view"></a> <a href="#" class="icon-arrow-drop-down"></a></li>

        </ul>

        <ul class="info-list cf">

            <li class="col1">8</li>

            <li class="col2">23 Jan 2017, 5:20 PM</li>

            <li class="col3"><a href="#">Kisi Se Pyaar Ho Jaye</a></li>

            <li class="col4"><a href="#">Kaabil</a></li>

            <li class="col5">52,000</li>

            <li class="col6">2,000</li>

            <li class="col7"><a href="#">HINDI</a></li>

            <li class="col8"><a href="#" class="icon-edit"></a> <a href="#" class="icon-view"></a> <a href="#" class="icon-arrow-drop-down"></a></li>

        </ul>

        <ul class="info-list cf">

            <li class="col1">9</li>

            <li class="col2">23 Jan 2017, 5:20 PM</li>

            <li class="col3"><a href="#">Udi Udi Jaye</a></li>

            <li class="col4"><a href="#">Raees</a></li>

            <li class="col5">52,000</li>

            <li class="col6">2,000</li>

            <li class="col7"><a href="#">HINDI</a></li>

            <li class="col8"><a href="#" class="icon-edit"></a> <a href="#" class="icon-view"></a> <a href="#" class="icon-arrow-drop-down"></a></li>

        </ul>

        <ul class="info-list cf">

            <li class="col1">10</li>

            <li class="col2">23 Jan 2017, 5:20 PM</li>

            <li class="col3"><a href="#">Bawara Mann</a></li>

            <li class="col4"><a href="#">Jolly LLB 2</a></li>

            <li class="col5">52,000</li>

            <li class="col6">2,000</li>

            <li class="col7"><a href="#">HINDI</a></li>

            <li class="col8"><a href="#" class="icon-edit"></a> <a href="#" class="icon-view"></a> <a href="#" class="icon-arrow-drop-down"></a></li>

        </ul>

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
<script type="text/javascript">
    function searchTrailer(){
        if($('#search_year').val() || $('#search_month').val() || $('#search_keyword').val()) return true;
        else{
            alert("Please, Select Year, Month or Keyword");
            return false;
        }
    }
</script>