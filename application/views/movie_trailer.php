<div class="container cf">
    <div class="wrapper-full-content">
        <div class="top-wrap">
            <ul class="language-tab">

                <li><a href="<?php
                    if ($cat_id == 1) {
                        echo base_url('movietrailer');
                    } else {
                        echo base_url('videosong');
                    };
                    ?>" class="<?php
                       if ($subcat_id == 0) {
                           echo 'active';
                       }
                       ?>">All</a></li>
                    <?php
                    $start = 0;
                    foreach ($cat as $value) {
                        if ($cat_id == 1) {
                            ?>
                        <li><a href="<?php echo base_url('movietrailer/' . strtolower($value['sub_name'])); ?>" class="<?php
                            if ($subcat_id == $value['sub_id']) {
                                echo 'active';
                            }
                            ?>"><?php echo $value['sub_name']; ?></a></li>
                            <?php
                        } else {
                            ?>
                        <li><a href="<?php echo base_url('videosong/' . strtolower($value['sub_name'])); ?>" class="<?php
                            if ($subcat_id == $value['sub_id']) {
                                echo 'active';
                            }
                            ?>"><?php echo $value['sub_name']; ?></a></li>
                            <?php
                        }
                    }
                    ?>

            </ul>
        </div>

        <div class="search-bar cf">
            <select class="select" name="" id="search_year" onchange="getdataByYear()">
                <option value="">Year</option>
                <?php
                foreach ($year_list as $i) {
                    $selected = ($this->input->post('search_year') && $this->input->post('search_year') == $i['year']) ? 'selected' : '';
                    echo '<option value="' . $i['year'] . '" ' . $selected . '>' . $i['year'] . '</option>';
                }
                ?>
            </select>

            <select class="select" name="" id="search_month" onchange="getdataByMonth()">
                <option value="">Month</option>
                <option value="1" <?php echo ($this->input->post('search_month') && $this->input->post('search_month') == 1) ? 'selected' : ''; ?>>January 01</option>
                <option value="2" <?php echo ($this->input->post('search_month') && $this->input->post('search_month') == 2) ? 'selected' : ''; ?>>February 02</option>
                <option value="3" <?php echo ($this->input->post('search_month') && $this->input->post('search_month') == 3) ? 'selected' : ''; ?>>March 03</option>
                <option value="4" <?php echo ($this->input->post('search_month') && $this->input->post('search_month') == 4) ? 'selected' : ''; ?>>April 04</option>
                <option value="5" <?php echo ($this->input->post('search_month') && $this->input->post('search_month') == 5) ? 'selected' : ''; ?>>May 05</option>
                <option value="6" <?php echo ($this->input->post('search_month') && $this->input->post('search_month') == 6) ? 'selected' : ''; ?>>June 06</option>
                <option value="7" <?php echo ($this->input->post('search_month') && $this->input->post('search_month') == 7) ? 'selected' : ''; ?>>July 07</option>
                <option value="8" <?php echo ($this->input->post('search_month') && $this->input->post('search_month') == 8) ? 'selected' : ''; ?>>August 08</option>
                <option value="9" <?php echo ($this->input->post('search_month') && $this->input->post('search_month') == 9) ? 'selected' : ''; ?>>September 09</option>
                <option value="10" <?php echo ($this->input->post('search_month') && $this->input->post('search_month') == 10) ? 'selected' : ''; ?>>October 10</option>
                <option value="11" <?php echo ($this->input->post('search_month') && $this->input->post('search_month') == 11) ? 'selected' : ''; ?>>November 11</option>
                <option value="12" <?php echo ($this->input->post('search_month') && $this->input->post('search_month') == 12) ? 'selected' : ''; ?>>December 12</option>
            </select>

            <div class="catalog-menu">
                <a href="javascript:void(0)" class="" onclick="getdata('a')" id="menu_a">a</a>
                <a href="javascript:void(0)" class="" onclick="getdata('b')" id="menu_b">b</a>
                <a href="javascript:void(0)" class="" onclick="getdata('c')" id="menu_c">c</a>
                <a href="javascript:void(0)" class="" onclick="getdata('d')" id="menu_d">d</a>
                <a href="javascript:void(0)" class="" onclick="getdata('e')" id="menu_e">e</a>
                <a href="javascript:void(0)" class="" onclick="getdata('f')" id="menu_f">f</a>
                <a href="javascript:void(0)" class="" onclick="getdata('g')" id="menu_g">g</a>
                <a href="javascript:void(0)" class="" onclick="getdata('h')" id="menu_h">h</a>
                <a href="javascript:void(0)" class="" onclick="getdata('i')" id="menu_i">i</a>
                <a href="javascript:void(0)" class="" onclick="getdata('j')" id="menu_j">j</a>
                <a href="javascript:void(0)" class="" onclick="getdata('k')" id="menu_k">k</a>
                <a href="javascript:void(0)" class="" onclick="getdata('l')" id="menu_l">l</a>
                <a href="javascript:void(0)" class="" onclick="getdata('m')" id="menu_m">m</a>
                <a href="javascript:void(0)" class="" onclick="getdata('n')" id="menu_n">n</a>
                <a href="javascript:void(0)" class="" onclick="getdata('o')" id="menu_o">o</a>
                <a href="javascript:void(0)" class="" onclick="getdata('p')" id="menu_p">p</a>
                <a href="javascript:void(0)" class="" onclick="getdata('q')" id="menu_q">q</a>
                <a href="javascript:void(0)" class="" onclick="getdata('r')" id="menu_r">r</a>
                <a href="javascript:void(0)" class="" onclick="getdata('s')" id="menu_s">s</a>
                <a href="javascript:void(0)" class="" onclick="getdata('t')" id="menu_t">t</a>
                <a href="javascript:void(0)" class="" onclick="getdata('u')" id="menu_u">u</a>
                <a href="javascript:void(0)" class="" onclick="getdata('v')" id="menu_v">v</a>
                <a href="javascript:void(0)" class="" onclick="getdata('w')" id="menu_w">w</a>
                <a href="javascript:void(0)" class="" onclick="getdata('x')" id="menu_x">x</a>
                <a href="javascript:void(0)" class="" onclick="getdata('y')" id="menu_y">y</a>
                <a href="javascript:void(0)" class="" onclick="getdata('z')" id="menu_z">z</a>
                <a href="javascript:void(0)" class="" onclick="getdata('0-9')" id="menu_0-9">0-9</a>
            </div>
        </div>

        <ul class="grid-item cf" id="video_trail">
            <?php
            $datas = json_decode($trailer);
            $trailer_data = $datas->data;
            $no = 1;
            foreach ($trailer_data as $trailer) {
                if (!empty($trailer)) {
                    $video_id = $trailer->video_id;
                    $seo_urls = $controller->getSeoUrl($trailer->seo_url_id);
                    ?>
                    <li class="item">
                        <div class="ct-box">
                            <div class="ct-thumbnail"><a href="<?php echo $seo_urls; ?> " class="play"></a> 
                                <a href="<?php echo $seo_urls; ?>">                                    
                                    <?php
                                    $filename = $trailer->video_thumb;
                                    if (file_exists(str_replace(base_url(), "./", $filename))) {
                                        ?>
                                        <img src="<?php echo base_url() . "timthumb.php?src=" . $trailer->video_thumb . "&w=285&h=160"; ?>" alt="<?php echo $trailer->video_name; ?>" style="background-image: url(<?php
                                        echo base_url('resources/images/no-image.svg');
                                        ;
                                        ?>)" />
                                         <?php } else {
                                             ?>
                                        <img src="<?php
                                        echo base_url('resources/images/no-image.svg');
                                        ;
                                        ?>" style="background-image: url(<?php
                                             echo base_url('resources/images/no-image.svg');
                                             ;
                                             ?>)" alt="<?php echo $trailer->video_name; ?>" />
                                         <?php }
                                         ?>
                                </a>
                            </div>
                            <div class="ct-content"><h3><a href="<?php echo $seo_urls; ?>"><?php echo $trailer->video_name; ?></a></h3> 
                                <p class="meta-info"> <span><?php echo $trailer->total_play; ?> playing</span><span><?php echo $trailer->total_likes; ?> likes</span> </p>
                            </div>
                        </div>
                    </li>
                    <?php
                    $no++;
                }
            }
            ?>

        </ul>

        <?php
        if ($no >= 50) {
            ?>
            <!-- <div class="show-more"><a href="javascript:void(0)" id="showmore">Show more</a></div> -->
            <?php
        } else {
            ?>
            <div class=""><a href="javascript:void(0)" id="showmore"></a></div>
            <?php
        }
        ?>
    </div>

    <div class="wrapper-full-sidebar">
        <div class="sidebar-jaherat">
            <div class="jaherat300">
                <?php
                $datas = json_decode($side_adv);
                $adv_data = $datas->data;
                foreach ($adv_data as $adv) {
                    if (!empty($adv)) {

                        if ($adv->adv_option == 'C') {
                            echo $adv->google_code;
                            ?>

                            <?php
                        } else {
                            ?>
                            <a href="<?php echo $adv->image_link; ?>" rel="nofollow noreferrer" target="_blank">
                                <img src="<?php echo $adv->adv_image ?>" />
                            </a>
                            <?php
                        }
                    }
                }
                ?>
            </div>
            <div class="jaherat600">
                <?php
                $datas = json_decode($side_big_adv);
                $adv_data = $datas->data;
                foreach ($adv_data as $adv) {
                    if (!empty($adv)) {

                        if ($adv->adv_option == 'C') {
                            echo $adv->google_code;
                            ?>

                            <?php
                        } else {
                            ?>
                            <a href="<?php echo $adv->image_link; ?>" rel="nofollow noreferrer" target="_blank">
                                <img src="<?php echo $adv->adv_image ?>" />
                            </a>
                            <?php
                        }
                    }
                }
                ?>
            </div></div>
    </div>
</div>
<input type="hidden" id="start_val" value="50">
<script>
    var cat_id = '<?php echo $cat_id; ?>';
    var subcat_id = '<?php echo $subcat_id ?>';
    //var start = '<?php //echo ($start + 50); ?>';

    
    var search_keyword = '';
    var search_year = '';
    var search_month = '';
    var my_flag = 100;


    $(document).ready(function () {


        $(window).scroll(function() {
           var nearToBottom = 100;

            if ($(window).scrollTop() + $(window).height() >= $('#video_trail').offset().top + $('#video_trail').height() ) { 

                //console.log($(window).scrollTop() + $(window).height());
                //console.log($('#video_trail').offset().top + $('#video_trail').height());
                //console.log('here');

                if(my_flag == 100)
                {
                    // then only do ajax call
                    this.doajax();

                }
            } 
        });









        /*$('#showmore').on('click', function () {

            $('#showmore').text('Loading...');

            my_flag = 500;

            search_month = $('#search_month').val();
            search_year = $('#search_year').val();
            if (search_year == null) {
                search_year = '';
            }
            if (search_month == null) {
                search_month = '';
            }

            $.ajax({
                type: 'POST',
                url: '<?php //echo base_url('MovieTrailer/showMore'); ?>',
                data: 'cat_id=' + cat_id + '&subcat_id=' + subcat_id + '&start=' + start + '&search_keyword=' + search_keyword + '&search_year=' + search_year + '&search_month=' + search_month,
                dataType: 'html',
                success: function (html) {
//                    alert(html.length);
                    if (html.length != 87) {
                        $('#video_trail').append(html);
//                         $("#showmore").remove();
                        $('#showmore').css('display', 'none');
                    } else {
//                        $("#showmore").remove();
                        $('#showmore').css('display', 'none');
                    }

//                    $('#showmore').text('Show More');
                    start = (parseInt(start) + 50);
                    my_flag = 100;

                }
            });

        });*/

    });



    function doajax()
    {

        $('#showmore').text('Loading...');

            my_flag = 500;

            var start = document.getElementById('start_val').value;

            search_month = $('#search_month').val();
            search_year = $('#search_year').val();
            if (search_year == null) {
                search_year = '';
            }
            if (search_month == null) {
                search_month = '';
            }

            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('MovieTrailer/showMore'); ?>',
                data: 'cat_id=' + cat_id + '&subcat_id=' + subcat_id + '&start=' + start + '&search_keyword=' + search_keyword + '&search_year=' + search_year + '&search_month=' + search_month,
                dataType: 'html',
                success: function (html) { console.log(html);
                   
                    if (html.replace(/\s/g,'').length > 0) {
                        $('#video_trail').append(html);
//                         $("#showmore").remove();
                        $('#showmore').css('display', 'none');
                    } else {
//                        $("#showmore").remove();
                        $('#showmore').css('display', 'none');
                        //$('#video_trail').html("No Data Found...");
                        
                    }

//                    $('#showmore').text('Show More');
                    //start = (parseInt(start) + 50);
                    document.getElementById('start_val').value = parseInt(document.getElementById('start_val').value) + 50;
                    my_flag = 100;

                }
            });
    }




    function getdataByYear() {

        //reset hidden
        //document.getElementById('start_val').value = 50;
        getdata(search_keyword);

    }

    function getdataByMonth() {

        //reset hidden
        //document.getElementById('start_val').value = 50;

        getdata(search_keyword);

    }

    function getdata(search_keywords) {

        //reset hidden
        document.getElementById('start_val').value = 0;
        $('#video_trail').html("");

        if (search_keywords != '') {
            document.getElementById("menu_" + search_keywords).className = "active";
        }
        if ((search_keyword != '') && (search_keyword != search_keywords)) {
            document.getElementById("menu_" + search_keyword).className = "";
        }
        search_keyword = search_keywords;



        my_flag == 100
            // then only do ajax call
            this.doajax();

        



        /*search_month = $('#search_month').val();
        search_year = $('#search_year').val();
        if (search_year == null) {
            search_year = '';
        }
        if (search_month == null) {
            search_month = '';
        }*/
        /*
         if(search_month != ''){
         if(search_year == ''){
         alert('First select year');
         //$("#search_month select").val("111");
         $('#search_month option').eq(0).prop('selected', true);
         return;
         }
         }
         */

        /*$.ajax({
            type: 'POST',
            url: '<?php //echo base_url('MovieTrailer/showMore'); ?>',
            data: 'cat_id=' + cat_id + '&subcat_id=' + subcat_id + '&start=0&search_keyword=' + search_keyword + '&search_year=' + search_year + '&search_month=' + search_month,
            dataType: 'html',
            success: function (html) {
//                    alert(html);
                if (html.length == 59) {
                    $('#showmore').css('display', 'none');
                } else {
                    $('#showmore').css('display', 'none');
                }
//                     document.getElementById("showmore").remove();
                $('#video_trail').html(html);
//                    $('#showmore').text('Show More');

                //start = (parseInt(start) + 5);

                search_keyword = search_keywords;

            }
        });*/

    }




</script>