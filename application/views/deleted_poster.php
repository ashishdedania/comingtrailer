<div id="ctwpcontent">
    <?php echo $this->session->flashdata('msg'); ?>
    <ul class="language-nav-tabs">
        <li>
            <a href="<?php echo base_url().''.$uri_page;?>/index/<?php echo $cat_id;?>/0" class="">
                All
            </a>
        </li>
        <?php
            foreach ($subcat as $value) {
        ?>
                <li>
                    <a href="<?php echo base_url().''.$uri_page;?>/index/<?php echo $cat_id;?>/<?php echo $value['sub_id'];?>" class="">
                        <?php echo $value['sub_name'];?>
                    </a>
                </li>
        <?php
            }
        ?>
        <li><a href="<?php echo base_url($this->router->fetch_class());?>/deleted/poster" class="active">DELETE</a></li>    
    </ul>
    <div class="table-responsive ctlists">	
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
                $datas = json_decode($poster);
                $trailer_data = $datas->data;

                $no = 1;

                foreach ($trailer_data as $trailer) {
                    if (!empty($trailer)) {
                        $video_id = $trailer->poster_id
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo date('d/m/Y',strtotime($trailer->release_date)); ?></td>
                            <td><a href="AddPoster/viewPoster/<?php echo $video_id; ?>"><?php echo $trailer->poster_name; ?></a></td>
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
                                <a href="#<?php //echo $trailer->subcat_id; ?>">
                                    <?php echo $trailer->subcat_name; ?>
                                </a>
                            </td>
                            <td>
                                <a href="<?php echo base_url($this->router->fetch_class().'/deleteStatus/'.$video_id); ?>/0" class="icon-restore"></a>
                                <a href="<?php echo base_url($this->router->fetch_class().'/delete/'.$video_id.'/poster/'.$trailer->seo_url_id); ?>" class="icon-delete" onclick="return confirm('Are you sure to delete this video?')"></a>
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
</div>
<script>
    
    
    $(document).ready(function() {
        $('table.nowrap').DataTable();
        $('a[data-toggle="tab"]').on( 'shown.bs.tab', function (e) {
            $.fn.dataTable.tables( {visible: true, api: true} ).columns.adjust();
        });
    } );

    
    </script>