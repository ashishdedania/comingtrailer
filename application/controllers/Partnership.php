<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Partnership
 *
 * @author yoo
 */
class Partnership extends CI_Controller{
    //put your code here
    
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->model('adm_home_model');
        $this->load->model('WebService');
        require_once('twitteroauth.php');
        $this->load->model('Seo_data_model');
    }
    
    public function index($share_code=''){
		$this->data['content'] = $this->adm_home_model->getPartnershipData();
        $link = base_url();
        $type = 'about us';
        
        
        $this->data['individual_detail'] = $this->db->get_where('seo_individual',array('individual'=>'PR'))->row_array();
        
        $link = base_url('Partnership');
        $type = 'Partnership';
        $this->data['seo_data'] = $this->Seo_data_model->getSEO($type,$this->data['individual_detail'],$link);
        
        //Footer links
        $this->data['top_actors'] = $this->adm_home_model->getTopActors();
        $this->data['top_singers'] = $this->adm_home_model->getTopSingers();
        
        $this->data['trailer_cat'] = $this->adm_home_model->getSubCat(1);
        $this->data['video_cat'] = $this->adm_home_model->getSubCat(2);
        
        $this->data['controller']=$this;
        
        $this->load->view('header_footer/front_header',$this->data);
		$this->load->view('partnership',$this->data);
        $this->load->view('header_footer/front_footer',$this->data);
    }
    
    public function getSeoUrl($seo_id){
//        echo '$seo_id';exit;
//        echo $table_nmae;exit;
        $final_url = $this->WebService->getSeoUrl('video_url',$seo_id);
        return $final_url;
    }
    
	function add(){
	   if($this->input->post('partnership_submit')){
               $created = date('Y-m-d H:i:s');
		   $partnershipFormData = array(
				'first_name'	=> $this->input->post('firstName'),
				'last_name'		=> $this->input->post('lastName'),
				'email' 		=> $this->input->post('email'),
				'phone'		 	=> $this->input->post('phone'),
				'company' 		=> $this->input->post('company'),
				'city' 			=> $this->input->post('city'),
				'country' 		=> $this->input->post('country'),
				'message' 		=> $this->input->post('message'),
                                'created' 		=> $created
				
			);
			$insertPartnershipFormData = $this->adm_home_model->addPartnershipFormData($partnershipFormData);
			if( $insertPartnershipFormData ){
                            
                            $this->load->library('email');
                            $this->email->from('admin@comingtrailer.com', 'Coming Trailer');
                            $this->email->to('comingtrailerin@gmail.com');

                            $this->email->subject('New Partnership');
                            $this->email->message('First Name:'.$this->input->post('firstName').''.PHP_EOL
                                    .' Last Name:'.$this->input->post('lastName').''.PHP_EOL
                                    .' Email:'.$this->input->post('email').''.PHP_EOL
                                    .' Phone:'.$this->input->post('phone').''.PHP_EOL
                                    .' Company:'.$this->input->post('company').''.PHP_EOL
                                    .' City:'.$this->input->post('city').''
                                    .' Country:'.$this->input->post('country').''
                                    .' Message:'.$this->input->post('message').'');
                            $this->email->send();
                            
				$this->session->set_flashdata('msg', 'Submit successfully we will be in touch soon!');
				redirect('partnership');
			}
	   }
        
    }
	
}
