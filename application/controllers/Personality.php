<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Personality
 *
 * @author yoo
 */
class Personality extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('WebService');
        $this->load->model('Seo_data_model');
        $this->load->model('adm_home_model');
    }

    public function index($name = '', $mstps = '') {
        if ($name == '') {
            redirect('My404');
        }
        if ($mstps == 'song') {
            $mstp = 's';
        } elseif ($mstps == 'trailer') {
            $mstp = 't';
        } elseif ($mstps == 'poster') {
            $mstp = 'p';
        } else {
            $mstp = 'm';
        }
        /*$result = $this->db->get_where('personality', array("REPLACE(REPLACE(personality_name,')',''),'(','')" => str_replace("-", " ", $name)))->result_array();*/
$result = $this->db->get_where('personality',"REPLACE(REPLACE(personality_name,')',''),'(','') = '".str_replace("-", " ", $name)."' OR REPLACE(REPLACE(personality_name,')',''),'(','') = '".str_replace("---", " - ", $name)."' OR REPLACE(REPLACE(personality_name,')',''),'(','') = '".$name."'")->result_array();
        if (empty($result)) {
            redirect('My404');
        }
        $map_arr = ['m' => 'movie', 's' => 'video', 't' => 'video', 'p' => 'poster'];
        $label_map_arr = ['m' => 'Movie', 's' => 'Song', 't' => 'Trailer', 'p' => 'Poster'];

//        $this->data['mstp_detail'] = $this->getMSTPdata($result[0]['id'], $mstp);
//        $this->data['total'][$label_map_arr[$mstp]] = count($this->data['mstp_detail']);
        $this->data['mstp'] = $mstp;
        $this->data['mapped_table'] = $map_arr[$mstp];
        $this->data['label'] = $label_map_arr[$mstp];
        $is_set = 0;                
        foreach ($map_arr as $key => $val) {
            $cnt = 0;
            $data_arr = array();
            $res = $this->getMSTPdata($result[0]['id'], $key);
            $this->data['total'][$label_map_arr[$key]] = 0;
            if (count($res) > 0) {                
                foreach ($res as $res_value) {
                    if (!in_array($res_value[$map_arr[$key] . '_name'], $data_arr)) {
                        $cnt++;
                        array_push($data_arr, $res_value[$map_arr[$key] . '_name']);
                    }
                }
                $this->data['total'][$label_map_arr[$key]] = $cnt;
            }
            if (count($res) > 0 && $is_set == 0) {
                if ($mstps == '') {
                    $mstp = $key;
                }
                if ($key == $mstp) {
                    $this->data['mstp_detail'] = $res;
                    $this->data['mstp'] = $key;
                    $this->data['mapped_table'] = $map_arr[$key];
                    $this->data['label'] = $label_map_arr[$key];
                    $is_set = 1;
                }
            }
        }
        if ($mstp == 'm') {
            $this->data['year_list'] = $this->WebService->getMinYear('movie');
        } else if ($mstp == 's') {
            $this->data['year_list'] = $this->WebService->getMinYear('video', 'rel_date');
        } else if ($mstp == 't') {
            $this->data['year_list'] = $this->WebService->getMinYear('video', 'rel_date');
        } else if ($mstp == 'p') {
            $this->data['year_list'] = $this->WebService->getMinYear('poster', 'rel_date');
        }
        $this->data['individual_detail'] = $result[0]; //$this->db->get_where('personality', array('id' => $result[0]['id']))->row_array();
//        echo $curretn_key;exit;        
        //echo '<pre>';print_r($this->data['mstp_detail']);exit;
        $this->data['head_adv'] = $this->WebService->getAdsense(300, 250);
        $this->data['side_adv'] = $this->WebService->getAdsense(300, 600);
        $this->data['table'] = 'personality';
        $this->data['id'] = $result[0]['id'];

        //$link = $this->getSeoUrl($this->data['individual_detail']['seo_url_id']);


        $link = base_url() . "personality/" . str_replace(" ", "-", $this->data['individual_detail']['personality_name']);
        $type = 'personality';
        $this->data['seo_data'] = $this->Seo_data_model->getSEO($type, $this->data['individual_detail'], $link);

        //Footer links
        $this->data['top_actors'] = $this->adm_home_model->getTopActors();
        $this->data['top_singers'] = $this->adm_home_model->getTopSingers();

        $this->data['trailer_cat'] = $this->adm_home_model->getSubCat(1);
        $this->data['video_cat'] = $this->adm_home_model->getSubCat(2);

        $this->data['controller'] = $this;
        $this->data['item_prop'] = $this->getItemProp('personality', $this->data['individual_detail'], $link);
        $this->load->view('header_footer/front_header', $this->data);
        $this->load->view('individual_personality');
        $this->load->view('header_footer/front_footer', $this->data);
    }

    public function getItemProp($table, $individual_detail, $link) {
        $name = trim($individual_detail[$table . '_name']);
        $itemprop = '<div itemscope itemtype="http://schema.org/Person">' . PHP_EOL;
        $itemprop = $itemprop . '<meta itemprop="name" content ="' . $name . '" />' . PHP_EOL;
//        if ($table == 'cast') {
        $itemprop = $itemprop . '<meta itemprop="actor" content ="' . $name . '" />' . PHP_EOL;
        $desc = '' . $name . ' Video Songs & Trailer Watch it - Download ' . $name . ' HD Poster Free. Play ' . $name . ' Video Songs & Trailer and Download Movie HD Poster First Look and Wallpaper on Coming Trailer.com.';
        $itemprop = $itemprop . '<meta itemprop="description" content ="' . $desc . '" />' . PHP_EOL;

        $filename = base_url('images/personality/' . $individual_detail[$table . '_img']);
        if (@getimagesize($filename)) {
            $image = base_url('images/personality/' . $individual_detail[$table . '_img']);
        } else {
            $image = base_url('resources/images/no-movie.svg');
        }
        $itemprop = $itemprop . '<meta itemprop="image" content ="' . $image . '" />' . PHP_EOL;
//        } else if ($table == 'singer') {
////           $itemprop = $itemprop.'<meta itemprop="singer" content ="'.$name.'" />'.PHP_EOL;
//            $desc = '' . $name . ' Video Songs Watch it - Play ' . $name . ' All Hit Video Songs Free Online. Play ' . $name . ' Movie Hit Video Songs and music album on Coming Trailer.com.';
//            $itemprop = $itemprop . '<meta itemprop="description" content ="' . $desc . '" />' . PHP_EOL;
//
//            $filename = base_url('images/singers/' . $individual_detail[$table . '_img']);
//            if (@getimagesize($filename)) {
//                $image = base_url('images/singers/' . $individual_detail[$table . '_img']);
//            } else {
//                $image = base_url('resources/images/no-movie.svg');
//            }
//            $itemprop = $itemprop . '<meta itemprop="image" content ="' . $image . '" />' . PHP_EOL;
//        } else if ($table == 'director') {
//            $itemprop = $itemprop . '<meta itemprop="director" content ="' . $name . '" />' . PHP_EOL;
//            $desc = '' . $name . ' Movie Video Songs & Trailer Watch it - Download ' . $name . ' Movie HD Poster Free. Play ' . $name . ' Movie Video Songs & Trailer and Download Movie HD Poster First Look and Wallpaper on Coming Trailer.com.';
//            $itemprop = $itemprop . '<meta itemprop="description" content ="' . $desc . '" />' . PHP_EOL;
//
//            $filename = base_url('images/directors/' . $individual_detail[$table . '_img']);
//            if (@getimagesize($filename)) {
//                $image = base_url('images/directors/' . $individual_detail[$table . '_img']);
//            } else {
//                $image = base_url('resources/images/no-movie.svg');
//            }
//            $itemprop = $itemprop . '<meta itemprop="image" content ="' . $image . '" />' . PHP_EOL;
//        } else if ($table == 'music') {
//            $itemprop = $itemprop . '<meta itemprop="musicBy" content ="' . $name . '" />' . PHP_EOL;
//            $desc = '' . $name . ' Movie Video Songs & Trailer Watch it - Play ' . $name . ' All Movie Hit Video Songs Free Online. Play ' . $name . ' Movie Hit Video Songs and music album on Coming Trailer.com.';
//            $itemprop = $itemprop . '<meta itemprop="description" content ="' . $desc . '" />' . PHP_EOL;
//
//            $filename = base_url('images/music/' . $individual_detail[$table . '_img']);
//            if (@getimagesize($filename)) {
//                $image = base_url('images/music/' . $individual_detail[$table . '_img']);
//            } else {
//                $image = base_url('resources/images/no-movie.svg');
//            }
//            $itemprop = $itemprop . '<meta itemprop="image" content ="' . $image . '" />' . PHP_EOL;
//        }

        $itemprop = $itemprop . '<meta itemprop="url" content="' . $link . '" />' . PHP_EOL;
        $itemprop = $itemprop . '<meta itemprop="url" content="android-app URL" />' . PHP_EOL;

        $itemprop = $itemprop . '</div>';

        return $itemprop;
    }

    public function getSeoUrl($seo_id) {
        $final_url = $this->WebService->getSeoUrl('video_url', $seo_id);
        return $final_url;
    }

    public function getMSTPdata($id, $mstp = 'm') {
        $map_arr = ['m' => 'movie', 's' => 'video', 't' => 'video', 'p' => 'poster'];
        $tables = ['cast', 'music', 'singer', 'director'];
        $result = array();
        foreach ($tables as $table) {
            if ($mstp != 'p' || ($mstp == 'p' && !in_array($table, array('music', 'singer')))) {
                $this->db->select('*');
                $this->db->from($map_arr[$mstp] . '_map_' . $table . ' AS map'); // I use aliasing make joins easier
                $this->db->join($map_arr[$mstp] . ' AS mapped', 'mapped.id = map.' . $map_arr[$mstp] . '_id', 'INNER');
                $this->db->where(array('map.personality_id' => $id));
                if ($mstp != 'm') {
                    $this->db->where('mapped.is_deleted', 0);
                }
                if ($mstp == 't') { //--> Get Video Trailer
                    $this->db->where('mapped.cat_id', 1);
                } elseif ($mstp == 's') { //--> Get video Songs
                    $this->db->where('mapped.cat_id', 2);
                }

                if ($this->input->post('search_year')) {
                    $this->db->where("DATE_FORMAT(`mapped`.`rel_date`,'%Y')", $this->input->post('search_year'));
                }

                if ($this->input->post('search_month')) {
                    $this->db->where("DATE_FORMAT(`mapped`.`rel_date`,'%c')", $this->input->post('search_month'));
                }

                if ($this->input->post('search_keyword')) {
                    if ($this->input->post('search_keyword') == '0-9') {
                        $this->db->where(array('`mapped`.`' . $map_arr[$mstp] . '_name` RLIKE ' => '^[0-9].*'));
                    } else {
                        $this->db->where('(`mapped`.`' . $map_arr[$mstp] . '_name` LIKE "' . $this->input->post('search_keyword') . '%" OR `mapped`.`' . $map_arr[$mstp] . '_name` LIKE "' . lcfirst($this->input->post('search_keyword')) . '%")');
                    }
                }
                $this->db->order_by("mapped.rel_date", "desc");
                $this->db->group_by("mapped.id");
                $data = $this->db->get()->result_array();
                $result = array_merge($result, $data);
            }
        }
        return $result;
    }

    public function searchMSTP($id, $mstp = 'm') {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
        $result = $this->getMSTPdata($id, $mstp);
        if (count($result) > 0) {
            $mstp_data = '';
            $map_arr = ['m' => 'movie', 's' => 'video', 't' => 'video', 'p' => 'poster'];
            foreach ($result as $key => $val) {
                $seo_url = $this->getSeoUrl($val['seo_url_id']);
                if ($val[$map_arr[$mstp] . '_name'] != '') {
                    if ($map_arr[$mstp] == 'movie') {
                        $time = strtotime($val['rel_date']);
                        $dates = '';
                        if ($val['rel_date'] != '0000-00-00') {
                            if ($val['rel_date'] != '') {
                                $dates = date('Y', $time);
                            }
                        }
                        $mstp_data .= '<li><a href="' . $seo_url . '">' . $val[$map_arr[$mstp] . '_name'] . '</a><a href="javascript:void(0)" onclick="selectYear(' . $dates . ');" class="year">' . $dates . '</a></li>';
                    } else {
                        $mstp_data .= '<li><a href="' . $seo_url . '">' . $val[$map_arr[$mstp] . '_name'] . '</a></li>' . '';
                    }
                }
            }
            echo rtrim($mstp_data, ', ');
        } else
            echo 'No Data Found';
    }

}
