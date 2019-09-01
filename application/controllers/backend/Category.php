<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Category extends MY_Controller
{

    public function  __construct()
    {
        parent::__construct();
    }


    public function index()
    {

        $cat_map_subcat=$this->My_model->getresult("SELECT cat_map_subcat.*,category.cat_name,sub_category.subcat_name,sub_category.created
            FROM cat_map_subcat
            LEFT JOIN category ON category.id=cat_map_subcat.cat_id
            LEFT JOIN sub_category ON sub_category.id=cat_map_subcat.subcat_id
            ");
        $category=$this->My_model->getall("category");
        $sub_category=$this->My_model->getall("sub_category");

        $category_list=array();
        $temp=0;



        foreach ($category as $key => $value) {
            
            $category_list[$temp]['cat_id']=$value['id'];
            $category_list[$temp]['subcat_id']=0;
            $category_list[$temp]['cat_map_subcat_id']=0;
            $category_list[$temp]['cat_name']=$value['cat_name'];
            $category_list[$temp]['subcat_name']="-";
            $category_list[$temp]['created']=date("d M Y, h:i:s A",strtotime($value['created']));
            $temp++;
        }

    
        foreach ($cat_map_subcat as $kk => $val) {
            
            $category_list[$temp]['cat_id']=$val['cat_id'];
            $category_list[$temp]['subcat_id']=$val['subcat_id'];
            $category_list[$temp]['cat_map_subcat_id']=$val['id'];
            $category_list[$temp]['cat_name']=$val['cat_name'];
            $category_list[$temp]['subcat_name']=$val['subcat_name'];
            $category_list[$temp]['created']=date("d M Y, h:i:s A",strtotime($val['created']));
            $temp++;
        }

        $this->data['category_list'] =$category_list;
        $this->data['view_name'] = "category_tb_view.php";
        $this->data['message'] = $this->session->flashdata('message');
        $this->load->view('backend/layout', $this->data);
    }

    public function add()
    {
        $this->data['category']=$this->My_model->getall("category");
        $this->data['view_name'] = "category_view.php";
        $this->data['message'] = $this->session->flashdata('message');
        $this->load->view('backend/layout', $this->data);
    }

    public function save()
    {
        
        $main_category=$this->input->post('main_category');
        $category_name=$this->input->post('category_name');

        if($main_category!=0)
        {    
            $data=array(
                'subcat_name'=>$category_name,
                'created'=>date("Y-m-d H:i:s")
            );

            $subcat_id=$this->My_model->insertdata($data,'sub_category');
            $seo_data=array(
                "category_id"=>$main_category,
                "sub_category_id"=>$subcat_id,
                "name"=>$this->input->post("name"),
                "title"=>$this->input->post("title"),
                "description"=>$this->input->post("description"),
                "keywords"=>$this->input->post("keywords"),
                "updated"=>date("Y-m-d H:i:s")
            );
            $this->My_model->insertdata($seo_data,'seo');
            $seo_url_id = $this->WebService->setTrailerLanguage($main_category,$subcat_id);
            $cat_map_data=array(
                    'cat_id' =>$main_category,
                    'subcat_id'=>$subcat_id,
                    'seo_url_id'=>$seo_url_id
                );
            $this->My_model->insertdata($cat_map_data,'cat_map_subcat');

        }
        else
        {
            $data=array(
                'cat_name'=>$category_name,
                'created'=>date("Y-m-d H:i:s")
            );

            $cat_id=$this->My_model->insertdata($data,'category');
            $seo_data=array(
                "category_id"=>$cat_id,
                "sub_category_id"=>0,
                "name"=>$this->input->post("name"),
                "title"=>$this->input->post("title"),
                "description"=>$this->input->post("description"),
                "keywords"=>$this->input->post("keywords"),
                "updated"=>date("Y-m-d H:i:s")
            );
            $this->My_model->insertdata($seo_data,'seo');
        }    

        $this->session->set_flashdata("message","success_Category Save Successfully.");
        redirect('backend/category');
    }

    public function edit()
    {
        $cat_id = $this->input->get('cat_id');
        $subcat_id = $this->input->get('subcat_id');
       
        if($subcat_id!=0)
        {

        $result=$this->My_model->getresult("select cat_map_subcat.id,category.id as cat_id,sub_category.id as subcat_id,category.cat_name,sub_category.subcat_name,sub_category.created from cat_map_subcat 
            LEFT JOIN category ON category.id=cat_map_subcat.cat_id
            LEFT JOIN sub_category ON sub_category.id=cat_map_subcat.subcat_id
            where cat_map_subcat.cat_id=".$cat_id." AND cat_map_subcat.subcat_id=".$subcat_id);
        }
        else{

            $result=$this->My_model->getresult("select category.id,category.cat_name as subcat_name  from category  where id=".$cat_id);
        }
       
        $this->data['edit_data']=$result[0];

        $seo_data=$this->My_model->getbyid("seo",array("category_id"=>$cat_id,"sub_category_id"=>$subcat_id));
        $this->data['category']=$this->My_model->getall("category");
        $this->data['seo_data'] = $seo_data[0];
        $this->data['view_name'] = "category_view.php";
        $this->data['message'] = $this->session->flashdata('message');
        $this->load->view('backend/layout', $this->data);

    }

    public function update(){

        $id=$this->input->post('id');
        $main_category=$this->input->post('main_category');
        $category_name=$this->input->post('category_name');

        $cat_map_data=$this->My_model->getbyid("cat_map_subcat",array('id'=>$id));
        $sub_category=$this->My_model->getbyid("sub_category",array('id'=>$cat_map_data[0]['subcat_id']));

        if($main_category!=0)
        {    
            $data=array(
                'subcat_name'=>$category_name,
                'updated'=>date("Y-m-d H:i:s")
            );

            $subcat_id=$this->My_model->updatedata('sub_category',$data,array('id'=>$cat_map_data[0]['subcat_id']));

            $seo_data=array(
                "category_id"=>$main_category,
                "name"=>$this->input->post("name"),
                "title"=>$this->input->post("title"),
                "description"=>$this->input->post("description"),
                "keywords"=>$this->input->post("keywords"),
                "updated"=>date("Y-m-d H:i:s")
            );
            $this->My_model->updatedata('seo',$seo_data,array('category_id'=>$cat_map_data[0]['cat_id'],'sub_category_id'=>$cat_map_data[0]['subcat_id']));

            if($main_category!=$cat_map_data[0]['cat_id'] || $category_name!=$sub_category[0]['subcat_namecat']){

                $seo_url_id = $this->WebService->setTrailerLanguage($main_category,$cat_map_data[0]['subcat_id']);
                
                $cat_map_data=array(
                        'cat_id' =>$main_category,
                        'seo_url_id'=>$seo_url_id
                    );
                $this->My_model->updatedata('cat_map_subcat',$cat_map_data,array('id'=>$id));
            }

        }
        else
        {
            $data=array(
                'cat_name'=>$category_name,
                'created'=>date("Y-m-d H:i:s")
            );

            $this->My_model->updatedata('category',$data,$cat_map_data[0]['cat_id']);
            $seo_data=array(
                "category_id"=>$cat_map_data[0]['cat_id'],
                "sub_category_id"=>0,
                "name"=>$this->input->post("name"),
                "title"=>$this->input->post("title"),
                "description"=>$this->input->post("description"),
                "keywords"=>$this->input->post("keywords"),
                "updated"=>date("Y-m-d H:i:s")
            );
            $this->My_model->updatedata('seo',$seo_data,array('category_id'=>$cat_map_data[0]['cat_id'],'sub_category_id'=>0));
        }    

        $this->session->set_flashdata("message","success_Category Update Successfully.");
        redirect('backend/category');

    }


    public function delete()
    {
        $id = $this->input->get('subcat_id');
        $this->My_model->deletedata('sub_category',array('id'=>$id));
        $this->session->set_flashdata("message","success_Category Delete Successfully.");
        redirect('backend/category');
    }

  
}
