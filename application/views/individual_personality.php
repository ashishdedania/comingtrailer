<div class="container cf">
    <div class="wrapper-full-content">
        <div class="top-wrap">
            <div class="page-header cf">
                <div class="blurimg">
                    <?php
                    $filename = base_url('images/personality/' . $individual_detail[$table . '_img']);
                    if (@getimagesize($filename)) {
                        ?>
                        <img id="image" src="<?php echo base_url('images/personality/' . $individual_detail[$table . '_img']); ?>" alt="<?php echo trim($individual_detail[$table . '_name']); ?>" /> 
                        <?php
                    } else {
                        ?>
                        <img id="image" src="<?php echo base_url('resources/images/no-user.svg'); ?>" alt="<?php echo trim($individual_detail[$table . '_name']); ?>" /> 
                        <?php
                    }
                    ?> 
                </div>
                <div class="profile-art">
                    <?php
                    $filename = base_url('images/personality/' . $individual_detail[$table . '_img']);
                    if (@getimagesize($filename)) {
                        ?>
                        <img id="image" src="<?php echo base_url('images/personality/' . $individual_detail[$table . '_img']); ?>" alt="<?php echo trim($individual_detail[$table . '_name']); ?>" /> 
                        <?php
                    } else {
                        ?>
                        <img id="image" src="<?php echo base_url('resources/images/no-user.svg'); ?>" alt="<?php echo trim($individual_detail[$table . '_name']); ?>" /> 
                        <?php
                    }
                    ?> 
                </div>
                <div class="meta-info">
                    <h1>
                        <?php
                        echo trim($individual_detail[$table . '_name']);
                        if ($this->session->userdata('admLoggedId')) {
                            if (!($table == 'movie' && $mstp == 'm')) {
                                ?>
                                <a href="<?php echo base_url("backend/personality/edit?id=" . $id); ?>" class="icon-edit" target="blank">Edit</a>
                                <?php
                            }
                        }
                        ?>
                    </h1>
                    <p>                        
                        <?php echo ($total['Movie'] > 0) ? "<span>" . $total['Movie'] . " Movies</span>" : ""; ?>
                        <?php echo ($total['Song'] > 0) ? "<span>" . $total['Song'] . " Songs</span>" : ""; ?>
                        <?php echo ($total['Trailer'] > 0) ? "<span>" . $total['Trailer'] . " Trailers</span>" : ""; ?>
                        <?php echo ($total['Poster'] > 0) ? "<span>" . $total['Poster'] . " Poster</span>" : ""; ?>                        
                    </p>
                    <?php echo $item_prop; ?>
                </div>
            </div>
            <ul class="language-tab">
                <?php if ($total['Movie'] > 0) { ?>
                    <li><a href="<?php echo base_url() . $this->uri->segment(1) . "/" . $this->uri->segment(2); ?>" class="<?php echo $label == 'Movie' ? 'active' : ''; ?>">Movie</a></li>
                <?php } ?>
                <?php if ($total['Song'] > 0) { ?>
                    <li><a href="<?php echo base_url() . $this->uri->segment(1) . "/" . $this->uri->segment(2) . '/song'; ?>" class="<?php echo $label == 'Song' ? 'active' : ''; ?>">Song </a></li>                
                <?php } if ($total['Trailer'] > 0) { ?>
                    <li><a href="<?php echo base_url() . $this->uri->segment(1) . "/" . $this->uri->segment(2) . '/trailer'; ?>" class="<?php echo $label == 'Trailer' ? 'active' : ''; ?>">Trailer </a></li>
                <?php } if ($total['Poster'] > 0) { ?>                
                    <li><a href="<?php echo base_url() . $this->uri->segment(1) . "/" . $this->uri->segment(2) . '/poster'; ?>" class="<?php echo $label == 'Poster' ? 'active' : ''; ?>">poster</a></li>
                <?php } ?>
            </ul>
        </div>
        <div class="search-bar cf">
            <select class="select" name="" onchange="searchMSTP()" id="search_year">
                <option value="">Year</option>
                <?php
                foreach ($year_list as $i) {
                    $selected = ($this->input->post('search_year') && $this->input->post('search_year') == $i['year']) ? 'selected' : '';
                    echo '<option value="' . $i['year'] . '" ' . $selected . '>' . $i['year'] . '</option>';
                }
                ?>
            </select>

            <select class="select" name="" onchange="searchMSTP()" id="search_month">
                <option value="">Month</option>
                <?php
                for ($i = 1; $i <= 12; $i++) {
                    if ($i < 10) {
                        $no = '0' . $i;
                    } else {
                        $no = $i;
                    }
                    $dateObj = DateTime::createFromFormat('!m', $i);
                    $monthName = $dateObj->format('F');
                    $selected = ($this->input->post('search_month') && $this->input->post('search_month') == $i) ? 'selected' : '';
                    echo '<option value="' . $i . '" ' . $selected . '>' . $monthName . ' ' . $no . '</option>';
                }
                ?>
            </select>
            <div class="catalog-menu">
                <?php
                foreach (range('A', 'Z') as $char) {
                    echo '<a id="data_' . $char . '" href="javacript:void(0)" onclick="return searchMSTP(\'' . $char . '\')">' . $char . '</a>';
                }
                ?>
                <a id="data_0-9" href="javacript:void(0)" onclick="return searchMSTP('0-9')">0-9</a>
            </div>
        </div>
        <div class="content-container">
            <h2><?php // echo $label;                ?></h2>
            <div class="list-wrap cf">

                <div class="list">
                    <ul id="search-data">
                        <?php
                        $mstp_data = '';
                        $nm_col = $mapped_table . '_name';
                        $list = array();
                        foreach ($mstp_detail as $key => $val) {
                            if (!in_array($val[$nm_col], $list)) {
                                $seo_urls = $controller->getSeoUrl($val['seo_url_id']);
                                $link_value = '';
                                if ($mstp == 'm') {
                                    $link_value = 'movieIndividual/index/';
                                } else if ($mstp == 's') {
                                    $link_value = 'VideoDetail/index/2/0/';
                                } else if ($mstp == 't') {
                                    $link_value = 'VideoDetail/index/1/0/';
                                } else if ($mstp == 'p') {
                                    $link_value = 'PosterDetail/index/0/';
                                }

                                if ($mstp == 'm') {
                                    $time = strtotime($val['rel_date']);
                                    $dates = '';
                                    if ($val['rel_date'] != '0000-00-00') {
                                        if ($val['rel_date'] != '') {
                                            $dates = date('Y', $time);
                                        }
                                    }
                                    $mstp_data .= '<li><a href="' . $seo_urls . '">' . $val[$nm_col] . '</a><a href="javascript:void(0)" onclick="selectYear(' . $dates . ');" class="year">' . $dates . '</a></li>';
                                    ?>

                                    <?php
                                } else {
                                    $mstp_data .= '<li><a href="' . $seo_urls . '">' . $val[$nm_col] . '</a></li>';
                                }
                                array_push($list, $val[$nm_col]);
                            }
                        }
                        echo trim($mstp_data, ', ');
                        ?>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="wrapper-full-sidebar">
        <div class="sidebar-jaherat">
            <div class="jaherat300">
                <?php
                $datas = json_decode($head_adv);
                $adv_data = $datas->data;
                foreach ($adv_data as $adv) {
                    if (!empty($adv)) {

                        if ($adv->adv_option == 'C') {
                            echo $adv->google_code;
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
                $datas = json_decode($side_adv);
                $adv_data = $datas->data;
                foreach ($adv_data as $adv) {
                    if (!empty($adv)) {

                        if ($adv->adv_option == 'C') {
                            echo $adv->google_code;
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

<script type="text/javascript">
    var last_search = '';
                var keywords = '';             function searchMSTP(search_keyword = ''){
            var search_param = {};
            if ($('#search_year').val()) {
                search_param['search_year'] = $('#search_year').val();
            }
            if ($('#search_month').val()) {
                search_param['search_month'] = $('#search_month').val();
                }
            if (search_keyword) {

                $("#data_" + last_search).removeClass("active");
                $("#data_" + search_keyword).addClass("active");
            keywords = search_keyword;
                search_param['search_keyword'] = search_keyword;
            }
                    $.ajax({
            url : "<?php echo base_url('personality/searchMSTP/' . $id . '/' . $mstp); ?>",
                                type: "POST",
                                    data : search_param,
                                    async: false,                     success: function (data, textStatus, jqXHR) {
                                last_search = search_keyword;
                            $('#search-data').html(data);
                        }, error: function (jqXHR, textStatus, errorThrown) {
                //if fails      
                    }
            });
                    return false;
            }
     function selectYear(year) {
                    //Get select object
                    //   alert('done');
                    var objSelect = document.getElementById("search_year");
        //Set selected
        //setSelectedValue(objSelect, "10");


                        for (var i = 0; i < objSelect.options.length; i++) {
//            alert((objSelect.options[i].text == year));
                            if (objSelect.options[i].text == year) {
                            //                alert('done'+objSelect.options[i].text+'...'+year);
                objSelect.options[i].selected = true;
                searchMSTP(keywords);
                return;
            }
        }
    }

</script>