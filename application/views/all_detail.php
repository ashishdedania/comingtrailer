<div class="container cf">
    <div class="wrapper-full-content">
        <?php
        if ($table == 'movie') {
            ?>
            <div class="top-wrap">
                <ul class="language-tab">
                    <?php
                    //$controller->getUri();
                    ?>
                    <li><a href="<?php echo base_url('movie'); ?>" class="<?php
                        if ($uri_subcat_id == 0) {
                            echo 'active';
                        }
                        ?>">All</a></li>
                        <?php
                        foreach ($subcat as $value) {
                            ?>
                        <li><a href="<?php echo base_url('movie/' . strtolower($value['sub_name'])); ?>" class="<?php
                            if ($uri_subcat_id == $value['sub_id']) {
                                echo 'active';
                            }
                            ?>"><?php echo $value['sub_name']; ?></a></li>

                        <?php
                    }
                    ?>
                </ul>
            </div>
        <?php } ?>

        <div class="search-bar cf">
            <?php
            if ($table == 'movie') {
                ?>
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
                    <option  disabled="disabled" value="">Month</option>
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
            <?php } ?> 
            <div class="catalog-menu">
                <a href="javascript:void(0)" class="<?php echo ($table != 'movie') ? 'active' : ''; ?>" onclick="getdata('a')" id="menu_a">a</a>
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

        <div class="list-wrap">
            <!--<div class="list">-->
            <ul id = "detail" class="list cf">
                <?php
                foreach ($movie as $value) {
                    ?>
                    <li>
                        <?php
                        if ($table == 'movie') {
                            $seo_urls = $controller->getSeoUrl($value['seo_url_id']);
                            ?>
                            <a href="<?php echo $seo_urls; ?>" name="<?php echo $value[$table . '_name']; ?>">
                                <?php echo $value[$table . '_name']; ?>
                            </a>
                            <a href="javascript:void(0)" class="year" onclick="selectYear('<?php
                            $time = strtotime($value['rel_date']);
                            echo date('Y', $time);
                            ?>')"><?php
                                   $time = strtotime($value['rel_date']);
                                   if ($value['rel_date'] != '0000-00-00') {
                                       if ($value['rel_date'] != '') {
                                           echo date('Y', $time);
                                       }
                                   }
                                   ?></a>
                            <?php
                        } else if ($table == 'released_by') {
                            $seo_urls = $controller->getSeoUrl($value['seo_url_id']);
                            ?>
                            <a href="<?php echo $seo_urls; ?><?php echo '/song'; ?>" name="names">
                                <?php echo $value['rel_by_name']; ?>
                            </a>
                            <?php
                        } else {
//                            $seo_urls = $controller->getSeoUrl($value['seo_url_id']);
                            ?>
                            <a href="<?php echo base_url() . 'personality/' . str_replace(" ", "-", str_replace(["(", ")"], "", $value[$table . '_name'])); ?>" name="names">
                                <?php echo $value[$table . '_name']; ?>
                            </a>
                            <?php
                        }
                        ?>
                    </li>
                    <?php
                }
                ?>
            </ul>
            <!--</div>-->

        </div>


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
            </div>
        </div>
    </div>
</div>
<script>

    var subcat_id = '<?php echo $uri_subcat_id ?>';
    var table = '<?php echo $table; ?>';
    var search_keyword = '';
    var search_year = '';
    var search_month = '';
    function getdataByYear() {

        getdata(search_keyword);

    }

    function getdataByMonth() {

        getdata(search_keyword);

    }

    function getdata(search_keywords) {

        if (search_keywords != '') {
            document.getElementById("menu_" + search_keywords).className = "active";
        }
        if ((search_keyword != '') && (search_keyword != search_keywords)) {
            document.getElementById("menu_" + search_keyword).className = "";
        }
        search_keyword = search_keywords;
<?php
if ($table == 'movie') {
    ?>
            search_month = $('#search_month').val();
            search_year = $('#search_year').val();
            if (search_year == null) {
                search_year = '';
            }
            if (search_month == null) {
                search_month = '';
            }
            if (!search_month && !search_year && !search_keyword) {
                alert('Please, Select Year, Month or Enter keyword');
                //$("#search_month select").val("111");
                $('#search_month option').eq(0).prop('selected', true);
                return;

            }
    <?php
}
?>
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('AllDetail/searchData'); ?>',
            data: 'subcat_id=' + subcat_id + '&search_keyword=' + search_keyword + '&search_year=' + search_year + '&search_month=' + search_month + '&table=' + table,
            success: function (html) {
                //alert(html);

                $('#detail').html(html);
                //$('#showmore').text('Show More');

                //start = (parseInt(start) + 5);

                search_keyword = search_keywords;

            }
        });

    }
    function selectYear(year) {
        //Get select object

        var objSelect = document.getElementById("search_year");

        //Set selected
        //setSelectedValue(objSelect, "10");


        for (var i = 0; i < objSelect.options.length; i++) {
            if (objSelect.options[i].text === year) {
                objSelect.options[i].selected = true;
                getdata(search_keyword);
                return;
            }
        }
    }
</script>