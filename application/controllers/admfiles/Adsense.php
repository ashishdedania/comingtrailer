<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Adsense extends MY_Controller{

    //put your code here
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
    }

    public function index(){
        $this->db->select('*,IF(`media` = "W","WEBSITE","APP") AS `media`');
        $this->db->from('adsense');// I use aliasing make joins easier
        $data['adsense'] = $this->db->get()->result_array();
        $this->load->view('header_footer/header');
        $this->load->view('header_footer/sidebar');
        $this->load->view('adsense',$data);
        $this->load->view('header_footer/footer');
        
    }

    public function edit($adsense_id){
        if($adsense_id){
            try{
                $adsenseData = array(
                                    'selected_show_opt' => trim($this->input->post('show_opt_'.$adsense_id)),
                                    'code' => trim($this->input->post('code_'.$adsense_id)),
                    'img_link' => trim($this->input->post('img_link_'.$adsense_id))
                                );
                if(!empty($_FILES['img_name_'.$adsense_id]['name'])){
                    $config['upload_path'] = 'images/jaherat/';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif|JPG|PNG|JPEG';
                    $ext = pathinfo($_FILES['img_name_'.$adsense_id]['name'], PATHINFO_EXTENSION);
                    $file_name = basename($_FILES['img_name_'.$adsense_id]['name'], "." . $ext);
                    $config['file_name'] = $file_name . '_' . $adsense_id . '.' . $ext;
                    //Load upload library and initialize configuration
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if($this->upload->do_upload('img_name_'.$adsense_id)){
                        $uploadData = $this->upload->data();
                        $adsenseData['img_name'] = $uploadData['file_name'];
                    }
                }
                $this->db->where('id',$adsense_id);
                $this->db->update('adsense',$adsenseData);
                redirect(base_url('Adsense'));
            }catch(Exception $ex){
                die('DB Data Insertion Error: ' . $ex->getMessage());
            }
        }        
    }
    
    public function deleteAdImg($adsense_id,$img_name){
        unlink("images/adsense/" . $img_name);
        $this->db->where('id',$adsense_id);
        $this->db->update('adsense',array('img_name'=>''));
        redirect('Adsense');
    }
}