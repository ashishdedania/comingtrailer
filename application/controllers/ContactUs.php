<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Contact Us
 *
 * @author yoo
 */
class ContactUs extends CI_Controller{
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
		$this->data['content'] = $this->adm_home_model->getContactUsData();
        $link = base_url();
        $type = 'contact us';
        
        
        $this->data['individual_detail'] = $this->db->get_where('seo_individual',array('individual'=>'CONUS'))->row_array();
        
        $link = base_url('ContactUs');
        $type = 'ContactUs';
        $this->data['seo_data'] = $this->Seo_data_model->getSEO($type,$this->data['individual_detail'],$link);
        
        //Footer links
        $this->data['top_actors'] = $this->adm_home_model->getTopActors();
        $this->data['top_singers'] = $this->adm_home_model->getTopSingers();
        
        $this->data['trailer_cat'] = $this->adm_home_model->getSubCat(1);
        $this->data['video_cat'] = $this->adm_home_model->getSubCat(2);
        
        $this->data['controller']=$this;
        
        $this->load->view('header_footer/front_header',$this->data);
		$this->load->view('contact_us',$this->data);
        //$this->load->view('contact_us');
        $this->load->view('header_footer/front_footer',$this->data);
    }
    public function getSeoUrl($seo_id){
//        echo '$seo_id';exit;
//        echo $table_nmae;exit;
        $final_url = $this->WebService->getSeoUrl('video_url',$seo_id);
        return $final_url;
    }
	
	function add(){
	   if($this->input->post('contact_submit')){
               $created = date('Y-m-d H:i:s');
		   $contactFormData = array(
				'first_name'	=> $this->input->post('firstName'),
				'last_name'		=> $this->input->post('lastName'),
				'email' 		=> $this->input->post('email'),
				'phone'		 	=> $this->input->post('phone'),
				'category' 		=> $this->input->post('category'),
				'message' 		=> $this->input->post('message'),
                                'created' 		=> $created
                       
				
			);

                   
			$insertContactFormData = $this->adm_home_model->addContactFormData($contactFormData);
			if( $insertContactFormData ){
                            $this->load->library('email');
                            $this->email->from('admin@comingtrailer.com', 'Coming Trailer');
                            $this->email->to('comingtrailerin@gmail.com');

                            $this->email->subject('New Contact');
                            $this->email->message('First Name:'.$this->input->post('firstName').''.PHP_EOL
                                    .' Last Name:'.$this->input->post('lastName').''.PHP_EOL
                                    .' Email:'.$this->input->post('email').''.PHP_EOL
                                    .' Phone:'.$this->input->post('phone').''.PHP_EOL
                                    .' Category:'.$this->input->post('category').''.PHP_EOL
                                    .' Message:'.$this->input->post('message').'');
                            $this->email->send();
                           
                            
				$this->session->set_flashdata('msg', 'Submit successfully we will be in touch soon!.');
				redirect('contactus');
			}
	   }
        
    }
}
