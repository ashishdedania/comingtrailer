<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends MY_Controller
{
    public function  __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data['message'] = $this->session->flashdata("message");
        $contact_data=$this->My_model->getresult("SELECT * from contact_us LIMIT 0,1");
        $this->data['contact_data']=$contact_data[0];
        $seo_data=$this->My_model->getresult("SELECT * from seo_individual WHERE  individual='CONUS' LIMIT 0,1");
        $this->data['seo_data'] = $seo_data[0];
        $this->data['view_name'] = "contact_view.php";
        $this->load->view('backend/layout', $this->data);
    }

    public function form_data()
    {
        $this->data['message'] = $this->session->flashdata("message");
        $this->data['view_name'] = "contact_form_view.php";
        $this->load->view('backend/layout', $this->data);
    }

    public function save()
    {
        $id=$this->input->post("id");
        $content=$this->input->post("content");

        $data=array(
            "contact_us_content"=>$content,
            "updated"=>date('Y-m-m H:i:s')
        );

        if(!empty($id)) {
            $this->My_model->updatedata("contact_us",$data,array("id"=>$id));
        }else{
            $this->My_model->insertdata($data, "contact_us");
        }

        $this->session->set_flashdata("message","success_Contact Us Content Save Successfully.");
        redirect("backend/contact");

    }

    public function save_seo_data()
    {
        $data=array(

            "individual"=>$this->input->post("individual"),
            "name"=>$this->input->post("name"),
            "title"=>$this->input->post("title"),
            "description"=>$this->input->post("description"),
            "keywords"=>$this->input->post("keywords"),
            "updated"=>date("Y-m-d H:i:s")
        );

        $this->My_model->updatedata("seo_individual",$data,array("individual"=>$this->input->post("individual")));

        $this->session->set_flashdata("message","success_SEO Content Save Successfully.");
        redirect("backend/contact");
    }

    public function contact_form_list()
    {
        $columns = array("id",'created','first_name','last_name','email','phone','category','message');

        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = $columns[$this->input->post('order')[0]['column']];
        $dir = $this->input->post('order')[0]['dir'];

        $year= $this->input->post('columns')[0]['search']['value'];
        $month= $this->input->post('columns')[1]['search']['value'];
        $search_keyword= $this->input->post('columns')[2]['search']['value'];
        $where2="";

        if(!empty($year)){
            $where2.=" AND YEAR(created) = ".$year;
        }

        if(!empty($month)){
            $where2.=" AND MONTH(created) = ".$month;
        }


        $totalData = $this->My_model->getresult("select count(id) as tot from contact_us_data");
        $totalFiltered = $totalData[0]['tot'];

        if(empty($this->input->post('search')['value']) && empty($year) && empty($month) && empty($search_keyword))
        {
            $posts = $this->My_model->getresult("

               SELECT ".implode(',',$columns)." FROM contact_us_data
               ORDER BY $order $dir
               LIMIT $start,$limit

            ");
        }
        else {
            $search = $this->input->post('search')['value'];

            if(!empty($search_keyword)){
                $search=$search_keyword;
            }

            $where="where 1 AND";

            $where.=" ( ".implode(" LIKE '%".$search."%' OR ",$columns)." LIKE '%".$search."%' )";

            $where.=$where2;

            $posts = $this->My_model->getresult("

               SELECT ".implode(',',$columns)." FROM contact_us_data
               $where
               ORDER BY $order $dir
               LIMIT $start,$limit

            ");


            $totalData = $this->My_model->getresult("select count(id) as tot from contact_us_data $where");
            $totalFiltered = $totalData[0]['tot'];
        }

        $number=($start+1);
        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
               $nestedData["number"] = $number;
               $nestedData["first_name"] = $post['first_name'];
               $nestedData["last_name"] = $post['last_name'];
               $nestedData["email"] = $post['email'];
               $nestedData["phone"] = $post['phone'];
               $nestedData["category"] = $post['category'];
               $nestedData["message"] = $post['message'];
                $nestedData["created"] = date("d M Y, h:i A",strtotime($post['created']));
               $data[] = $nestedData;
               $number++;
            }
        }


        $output = array(
            "draw"            => intval($this->input->post('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data,
        );
        $csrf_name = $this->security->get_csrf_token_name();
        $csrf_hash = $this->security->get_csrf_hash();
        $output[$csrf_name] = $csrf_hash;
        //output to json format
        echo json_encode($output);

    }

}