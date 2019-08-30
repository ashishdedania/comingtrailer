<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adsense extends MY_Controller
{
    public function  __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $edit_data=$this->My_model->getall("adsense");
        //echo "<pre>";print_r($edit_data);exit;
        foreach($edit_data as $key => $row)
        {
            $edit_data[$row['width']."X".$row['height']."_".$row['media']]= $edit_data[$key];
            unset($edit_data[$key]);
        }
        $this->data['edit_data']=$edit_data;
        $this->data['message'] = $this->session->flashdata("message");
        $this->data['view_name'] = "adsense_view.php";
        $this->load->view('backend/layout', $this->data);
    }

    public function save()
    {
        $width=$this->input->post("width");
        $height=$this->input->post("height");
        $media=$this->input->post("media");
        $radio_val=$this->input->post("radio_val");
        $img_link=$this->input->post("img_link");
        $code=$this->input->post("code");


        $data=array(

            "width"=>$width,
            "height"=>$height,
            "media"=>$media,
            "selected_show_opt"=>$radio_val,
            "code"=>$code,
            'img_link'=>$img_link
        );

        if($radio_val=="I")
        {

            $new_name=$width."X".$height."-".$media;

            $config = array(
                'upload_path' => "./images/jaherat/",
                'allowed_types' => "gif|jpg|png|jpeg",
                'max_width'  => $width,
                'max_height'  => $height,
                'min_width'  => $width,
                'min_height'  => $height
            );
            $config['file_name'] = $new_name;
            $this->upload->initialize($config);

            if($this->upload->do_upload("attachment"))
            {
                $updata = array('upload_data' => $this->upload->data());
                $data['img_name']=$updata['upload_data']['file_name'];

            }else{

                $this->session->set_flashdata("message","danger_".$this->upload->display_errors());
                redirect("backend/adsense");
            }

        }

        $check=$this->My_model->getbyid("adsense",array("width"=>$width,"height"=>$height,"media"=>$media));

        if(!empty($check))
        {
            $this->My_model->updatedata("adsense",$data,array("id"=>$check[0]['id']));
            $this->session->set_flashdata("message","success_".$width."X".$height." Update Successfully.");
        }
        else
        {
            $this->My_model->insertdata($data,"adsense");
            $this->session->set_flashdata("message","success_".$width."X".$height." Save Successfully.");
        }

        redirect("backend/adsense");

    }

    public function  delete()
    {
        $id=$this->input->get("id");
        $result=$this->My_model->getbyid("adsense",array("id"=>$id));

        $this->My_model->updatedata("adsense",array("img_name"=>"","img_link"=>""),array("id"=>$id));

        unlink("./images/jaherat/".$result[0]['img_name']);

        $this->session->set_flashdata("message","success_".$result[0]['width']."X".$result[0]['height']." Image Delete Successfully.");
        redirect("backend/adsense");




    }

}