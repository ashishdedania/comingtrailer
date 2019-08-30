<div id="ctwpcontent">
    <ul class="language-nav-tabs">
        <li><a href="<?php echo base_url().$uri_page;?>/index/<?php echo $cat_id;?>/0">All</a></li>
        <?php
            foreach ($cat as $value) {
        ?>
            <li><a href="<?php echo base_url().''.$uri_page;?>/index/<?php echo $cat_id;?>/<?php echo $value['sub_id'];?>" class=""><?php echo $value['sub_name'];?></a></li>
        <?php
            }
        ?>
        <li><a class="active" href="<?php echo base_url($this->router->fetch_class());?>/deleted/video" class="">DELETE</a></li>    
    </ul>

<div class="ctbody-content">
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
                    $datas = json_decode($json);
                    $trailer_data = $datas->data;
                    $no = 1;
                    foreach($trailer_data as $trailer){
                        if(!empty($trailer)){
                            $video_id = $trailer->video_id;
                            //echo str_replace(''. base_url(), '', $trailer->video_thumb);exit;
                            ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo date('d/m/Y',strtotime($trailer->release_date)); ?></td>
                                    <td><a href="<?php echo base_url();?>AddVideo/viewTrailer/<?php echo $video_id; ?>"><?php echo $trailer->video_name; ?></a></td>
                                    <td>
                                        <?php
                                            $movie_data = '';
                                            foreach($trailer->movies as $moviess){
                                                $movie_data = $movie_data . '<a href="' . base_url() . 'AdmViewMovie/edit/' . $moviess->movie_id . '">' . $moviess->movie_name . '</a>' . ', ';
                                            }
                                            echo $movie_data;
                                        ?>
                                    </td>
                                    <td><?php echo $trailer->total_play; ?></td>
                                    <td><?php echo $trailer->total_likes; ?></td>
                                    <td>
                                        <a href="#<?php //echo $trailer->subcat_id;  ?>">
                                            <?php echo $trailer->subcat_name; ?>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url($this->router->fetch_class().'/deleteStatus/'.$video_id); ?>/0" class="icon-restore" onclick="return confirm('Are you sure to reactive this video?')"></a>
                                        <?php $imag_path = str_replace(''. base_url('images/videothumb/'), '', $trailer->video_thumb);?>
                                        <a href="<?php echo base_url($this->router->fetch_class().'/delete/'.$video_id.'/'.$trailer->seo_url_id); ?>" class="icon-delete" onclick="return confirm('Are you sure to delete this video?')"></a>
                                    </td>
                                    <td>
                                        <?php
                                            $movie_data = '';
                                            foreach($trailer->video_cast as $moviess){
                                                $movie_data = $movie_data . '<a href="' . base_url() . 'AdmViewActor/editActor/' . $moviess->cast_id . '">' . $moviess->cast_name . '</a>' . ', ';
                                            }
                                            echo rtrim($movie_data, ", ");
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            $movie_data = '';
                                            foreach($trailer->singer as $moviess){
                                                $movie_data = $movie_data . '<a href="' . base_url() . 'AdmViewSinger/edit/' . $moviess->singer_id . '">' . $moviess->singer_name . '</a>' . ', ';
                                            }
                                            echo rtrim($movie_data, ", ");
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            $movie_data = '';
                                            foreach($trailer->Music as $moviess){
                                                $movie_data = $movie_data . '<a href="' . base_url() . 'AdmViewMusic/edit/' . $moviess->music_id . '">' . $moviess->music_name . '</a>' . ', ';
                                            }
                                            echo rtrim($movie_data, ", ");
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            $movie_data = '';
                                            foreach($trailer->Director as $moviess){
                                                $movie_data = $movie_data . '<a href="' . base_url() . 'AdmViewDirector/edit/' . $moviess->director_id . '">' . $moviess->director_name . '</a>' . ', ';
                                            }
                                            echo rtrim($movie_data, ", ");
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            $movie_data = '';
                                            foreach($trailer->releasedBy as $moviess){
                                                $movie_data = $movie_data . '<a href="' . base_url() . 'AdmViewChannel/edit/' . $moviess->rel_by_id . '">' . $moviess->rel_by_name . '</a>' . ', ';
                                            }
                                            echo rtrim($movie_data, ", ");
                                        ?>
                                    </td>
                                    <td><?php echo $trailer->video_desc; ?></td>
                                </tr>
                            <?php
                            //exit;
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</div></div>
<script>
    
    
    $(document).ready(function() {
        $('table.nowrap').DataTable();
        $('a[data-toggle="tab"]').on( 'shown.bs.tab', function (e) {
            $.fn.dataTable.tables( {visible: true, api: true} ).columns.adjust();
        });
    } );

    
    </script>