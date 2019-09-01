<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GetPoster
 *
 * @author yoo
 */
class GetPoster extends CI_Controller{
    //put your code here
    
    public function index()
    {
        $this->load->model('WebService');

        //$cat_id = $this->input->post('cat_id');
        $subcat_id = $this->input->post('subcat_id');
        $start =$this->input->post('page_start');
        $limit = $this->input->post('record_limit');

        $this->data['result'] = $this->WebService->getAllPoster($subcat_id,$limit,$start);

            $this->load->view('all_videos',$this->data);
    }
    
}
