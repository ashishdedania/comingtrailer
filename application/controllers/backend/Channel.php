<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Channel extends MY_Controller
{

    public function  __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $this->data['search_year']=$this->My_model->getresult("select YEAR(released_by.created) as year from released_by  group by YEAR(released_by.created) ORDER BY YEAR(released_by.created) DESC ");
        $seo_data=$this->My_model->getresult("SELECT * from seo_individual WHERE  individual='CH' LIMIT 0,1");
        $this->data['seo_data'] = $seo_data[0];
        $this->data['view_name'] = "channel_tb_view.php";
        $this->data['message'] = $this->session->flashdata('message');
        $this->load->view('backend/layout', $this->data);
    }

    public function add()
    {
        $this->data['view_name'] = "channel_view.php";
        $this->data['message'] = $this->session->flashdata('message');
        $this->load->view('backend/layout', $this->data);

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
        redirect("backend/channel");
    }

    public function save()
    {

        $name=trim($this->input->post("name"));
        $name = trim(preg_replace('/\s\s+/', ' ', str_replace("\n", " ", $name)));
        $title=$this->input->post("title");
        $description=$this->input->post("description");
        $keyword=$this->input->post("keyword");

        $data=array(

            "rel_by_name"=>$name,
            "rel_by_title"=>$title,
            "rel_by_desc"=>$description,
            "rel_by_keywords"=>$keyword,
            "created"=>date("Y-m-d H:i:s")
        );

        $name = preg_replace( '/\s+/',' ',$name);
        $check=$this->My_model->getbyid("released_by",array("rel_by_name"=>$name));  
        if(empty($check))
        {

            $new_name="500X500-".str_replace(" ","-",$name);
            $new_name = str_replace([".","@","$",'%'],"",$new_name);
            $config = array(
                'upload_path' => "./images/channel/",
                'allowed_types' => "gif|jpg|png|jpeg"
            );
            $config['file_name'] = $new_name;
            $this->upload->initialize($config);

            if($this->upload->do_upload("user_file"))
            {
                $updata = array('upload_data' => $this->upload->data());

                $data['rel_by_img']=$updata['upload_data']['file_name'];
                $this->image_resize("./images/channel/".$updata['upload_data']['file_name'],"channel");
            }

            $id=$this->My_model->insertdata($data,"released_by");

            $seo_url_id=$this->WebService->setSEOURLCast($id,$name,"released_by","add");
            $this->My_model->updatedata("released_by",array("seo_url_id"=>$seo_url_id),array("id"=>$id));

            $this->session->set_flashdata("message","success_Channel Add Successfully.");
            redirect("backend/channel/add");
        }
        else
        {
            $this->session->set_flashdata("message","danger_Channel Name Already Exist.");
            redirect("backend/channel/add");   
        }

    }

    public function edit()
    {
        $this->data['search_year']=$this->My_model->getresult("select YEAR(cast.created) as year from cast  group by YEAR(cast.created) ORDER BY YEAR(cast.created) DESC ");
        $id=$this->input->get("id");
        $result=$this->My_model->getbyid("released_by",array("id"=>$id));
        $url=$this->My_model->getbyid("video_url",array("id"=>$result[0]["seo_url_id"]));
        $result[0]["final_url"]=$url[0]['final_url'];
        $this->data['edit_data'] = $result[0];
        $this->data['view_name'] = "channel_view.php";
        $this->data['message'] = $this->session->flashdata('message');
        $this->load->view('backend/layout', $this->data);
    }

    public function update()
    {
        $id=$this->input->post("id");
        $name=trim($this->input->post("name"));
        $name = trim(preg_replace('/\s\s+/', ' ', str_replace("\n", " ", $name)));
        $title=$this->input->post("title");
        $description=$this->input->post("description");
        $keyword=$this->input->post("keyword");
       
        $name = preg_replace( '/\s+/',' ',$name);
        $check=$this->My_model->getresult("select * from released_by where rel_by_name='".$name."' and id!=".$id);
        if(empty($check))
        {
            $data=array(

                "rel_by_name"=>$name,
                "rel_by_title"=>$title,
                "rel_by_desc"=>$description,
                "rel_by_keywords"=>$keyword,
                "updated"=>date("Y-m-d H:i:s")
            );

            $new_name="500X500-".str_replace(" ","-",$name);
            $new_name = str_replace([".","@","$",'%'],"",$new_name);
            $config = array(
                'upload_path' => "./images/channel/",
                'allowed_types' => "gif|jpg|png|jpeg"
            );
            $config['file_name'] = $new_name;
            $this->upload->initialize($config);

            if(!empty($_FILES['user_file']['name']))
            {
                $result=$this->My_model->getbyid("released_by",array("id"=>$id));
                if(!empty($result[0]['rel_by_img']))
                {
                    unlink("./images/channel/".$result[0]['rel_by_img']);   
                }
            }    
            if($this->upload->do_upload("user_file"))
            {
                $updata = array('upload_data' => $this->upload->data());
                $data['rel_by_img']=$updata['upload_data']['file_name'];
                $this->image_resize("./images/channel/".$updata['upload_data']['file_name'],"channel");
            }

           $seo_url_id=$this->WebService->setSEOURLCast($id,$name,"released_by","edit");

           if($seo_url_id > 0){
             $data['seo_url_id']=$seo_url_id;
           }

            $this->My_model->updatedata("released_by",$data,array("id"=>$id));
            $this->session->set_flashdata("message","success_Channel Update Successfully.");
            redirect("backend/channel/edit?id=".$id);
        }
        else
        {
            $this->session->set_flashdata("message","danger_Channel Name Already Exist.");
            redirect("backend/channel/edit?id=".$id);
        }
    }

   
    public function status()
    {
        $id = $this->input->get('id');
        $result=$this->My_model->getbyid("released_by",array("id"=>$id));
        if($result[0]['status']=="0") {
            $this->My_model->updatedata("released_by", array("status" => "1"), array("id" => $id));
            $this->session->set_flashdata("message","success_Channel Deleted Successfully.");
        }
        else{
            $this->My_model->updatedata("released_by", array("status" => "0"), array("id" => $id));
            $this->session->set_flashdata("message","success_Channel Reactive Successfully.");
        }
        redirect("backend/channel");
    }

    public function delete()
    {
        $id = $this->input->get('id');
        if(!empty($result[0]['rel_by_img']))
        {
            unlink("./images/channel/".$result[0]['rel_by_img']);   
        }
        $this->My_model->deletedata("released_by",array("id" => $id));
        $this->session->set_flashdata("message","success_Channel Deleted Successfully.");
        redirect("backend/channel");
    }

    public function channel_list()
    {
        $columns = array("released_by.id",'released_by.created','released_by.rel_by_name',
            'released_by.rel_by_img','video_url.final_url','status');        
        $video_count = "(SELECT count(distinct video_id) FROM video INNER JOIN `video_map_relby` on video_map_relby.video_id = video.id where video_map_relby.rel_by_id = released_by.id and video.cat_id = 2)";
        $trailer_count = "(SELECT count(distinct video_id) FROM video INNER JOIN `video_map_relby` on video_map_relby.video_id = video.id where video_map_relby.rel_by_id = released_by.id and video.cat_id = 1)";
        $date = explode("@",$this->input->post('columns')[4]['search']['value']);
        $start_date = $date[0];
        $end_date = $date[1];


        $limit = $this->input->post('length');
        $start = $this->input->post('start');       
        if ($this->input->post('order')[0]['column'] == 4) {            
            $order = $video_count;
        } elseif ($this->input->post('order')[0]['column'] == 5) {
            $order = $trailer_count;        
        } else {
            $order = $columns[$this->input->post('order')[0]['column']];
        }
        $dir = $this->input->post('order')[0]['dir'];

        $year= $this->input->post('columns')[0]['search']['value'];
        $month= $this->input->post('columns')[1]['search']['value'];
        $search_keyword= $this->input->post('columns')[2]['search']['value'];
        $status= $this->input->post('columns')[3]['search']['value'];
        $where2="";

        if(!empty($start_date) && !empty($end_date)){
            $where2.=" AND DATE(released_by.created) BETWEEN '".$start_date."' AND '".$end_date."'";
        }

        if(!empty($year)){
            $where2.=" AND YEAR(released_by.created) = ".$year;
        }

        if(!empty($month)){
            $where2.=" AND MONTH(released_by.created) = ".$month;
        }

        $is_deleted=0;
        if(!empty($status))
        {
             $is_deleted=1;
        }


        $totalData = $this->My_model->getresult("select count(released_by.id) as tot from released_by where released_by.status=0");
        $totalFiltered = $totalData[0]['tot'];

        if(empty($this->input->post('search')['value']) && empty($year) && empty($month) && empty($search_keyword) && empty($status) && empty($start_date) && empty($end_date))
        {
            $posts = $this->My_model->getresult("

               SELECT ".implode(',',$columns).",".$video_count." as video,".$trailer_count." as trailer FROM released_by
               LEFT JOIN video_url ON video_url.id=released_by.seo_url_id
               where released_by.status=0
               ORDER BY $order $dir
               LIMIT $start,$limit

            ");
        }
        else {
            
            $search = trim($this->input->post('search')['value']);
            $search = preg_replace('!\s+!', ' ', $search);

            if(!empty($search_keyword)){
                $search=$search_keyword;
            }

            $where="where released_by.status=".$is_deleted." AND";
            $where.=" ( ".implode(" LIKE '%".$search."%' OR ",$columns)." LIKE '%".$search."%' )";

            $where.=$where2;

            $posts = $this->My_model->getresult("

               SELECT ".implode(',',$columns).",".$video_count." as video,".$trailer_count." as trailer FROM released_by
               LEFT JOIN video_url ON video_url.id=released_by.seo_url_id
               $where
               ORDER BY $order $dir
               LIMIT $start,$limit

            ");



            $totalData = $this->My_model->getresult("select count(released_by.id) as tot from released_by
            LEFT JOIN video_url ON video_url.id=released_by.seo_url_id
             $where
            ");
            $totalFiltered = $totalData[0]['tot'];
        }

        $number=($start+1);
        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $action="";
                if($post['status']=="0") {
                    $action.="<a href='".base_url()."backend/channel/edit?id=".$post['id']."' class='icon-edit'></a>";
                    $action.="<a target=\"_blank\" href=\"".$post['final_url']."\" class=\"icon-view\"></a>";
                    $action.= " <a onclick=\"return confirm('Are You Sure You Want To Delete?')\"  href='" . base_url() . "backend/channel/status?id=" . $post['id'] . "' class='icon-delete'></a>";
                }
                else
                {
                    $action.= " <a onclick=\"return confirm('Are You Sure You Want To Reactive?')\"  href='" . base_url() . "backend/channel/status?id=" . $post['id'] . "' class='icon-restore'></a>";
                    $action.="<a target=\"_blank\" href=\"".$post['final_url']."\" class=\"icon-view\"></a>";
                    $action.= " <a onclick=\"return confirm('Are You Sure You Want To Delete?')\"  href='" . base_url() . "backend/channel/delete?id=" . $post['id'] . "' class='icon-delete'></a>";
                }

                if(!empty($post['rel_by_img']) && file_exists('images/channel/'.$post['rel_by_img'])){
                    $img=base_url().'images/channel/'.$post['rel_by_img'];
                }else{
                    $img=base_url().'images/no-movie.svg';
                }

                $img='<img id="videoimg" src="'.$img.'" alt="'.$post['rel_by_name'].'" height="30" width="30">';

                $nestedData["number"] = $number;
                $nestedData["img"] = $img;
                $nestedData["video"] = $post['video'];
                $nestedData["trailer"] = $post['trailer'];
                $nestedData["rel_by_name"] = $post['rel_by_name'];
                $nestedData["created"] = (date("d M Y",strtotime($post['created']))!="01 Jan 1970" &&
                                       date("d M Y",strtotime($post['created']))!="30 Nov -0001")? 
                                       date("d M Y",strtotime($post['created'])) : "";
                $nestedData["action"] = $action;
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

    public function rel_by_autosuggetion()
    {
        $data=array();
        $keyword=$this->input->get("keyword");
        $keyword=trim($keyword['term']);
        $keyword = preg_replace('!\s+!', ' ', $keyword);
        $result = $this->My_model->getresult("select id,rel_by_name,rel_by_img from released_by WHERE trim(rel_by_name) LIKE '%".$keyword."%'");

        foreach($result as $row){

            if(!empty($row['rel_by_img']) && file_exists('images/channel/'.$row['rel_by_img'])){
                $img=base_url().'images/channel/'.$row['rel_by_img'];
            }else{
                $img=base_url().'images/no-movie.svg';
            }

            $img='<img style="display: inline-block;" id="videoimg" src="'.$img.'" alt="'.$row['rel_by_name'].'" height="30" width="30">';
            $data[]=array("id"=>$row['id'], "text"=>'<span style="display: inline-block;">'.$row['rel_by_name'].'</span>',"img"=>$img);

        }

        echo json_encode($data);
    }
}