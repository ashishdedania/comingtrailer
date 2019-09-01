<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of MyLogin
 *
 * @author yoo
 */
class MyLogin extends CI_Controller{

    //put your code here
    
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('adm_home_model');
        $this->load->model('WebService');
        require_once('twitteroauth.php');
    }
    
    public function index(){
        $this->load->view('my_login');
    }
    
    public function settwit(){
        $CONSUMER_KEY = 'QvJ88q2gvhRJx7AaY7AYE4DVb';
        $CONSUMER_SECRET = 'q9B87EdraKBoHYEolenrXHVePkL1m4mqtTJyFd0jcsq1lreyXM';
        $OAUTH_CALLBACK = 'https://www.comingtrailer.com/MyLogin/twitterLogin';
        $this->load->library('user_agent');
        $this->session->set_userdata('referrer',$this->agent->referrer());
        $connection = new TwitterOAuth($CONSUMER_KEY, $CONSUMER_SECRET);
	$request_token = $connection->getRequestToken($OAUTH_CALLBACK); //get Request Token

        if($request_token){
            $token = $request_token['oauth_token'];
            $_SESSION['request_token'] = $token;
            $_SESSION['request_token_secret'] = $request_token['oauth_token_secret'];
		
            switch($connection->http_code){
                case 200:
                    $url = $connection->getAuthorizeURL($token);
                    //redirect to Twitter .
                    redirect($url);
                    break;
                default:
                    echo "Coonection with twitter Failed";
                break;
            }
        }else{ //error receiving request token
            echo "Error Receiving Request Token";
	}
    }

    public function twitterLogin(){
        $CONSUMER_KEY = 'QvJ88q2gvhRJx7AaY7AYE4DVb';
        $CONSUMER_SECRET = 'q9B87EdraKBoHYEolenrXHVePkL1m4mqtTJyFd0jcsq1lreyXM';
        //$OAUTH_CALLBACK = 'http://odedara.com/comingtrailer/MyLogin';
    
        if(isset($_GET['oauth_token'])){
            $connection = new TwitterOAuth($CONSUMER_KEY, $CONSUMER_SECRET, $_SESSION['request_token'], $_SESSION['request_token_secret']);
            $access_token = $connection->getAccessToken($_REQUEST['oauth_verifier']);
            if($access_token){
                $connection = new TwitterOAuth($CONSUMER_KEY, $CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
                $params = array();
                $params['include_entities'] = 'false';
                $content = $connection->get('account/verify_credentials', $params);                
                if($content && isset($content->screen_name) && isset($content->name)){
                    $_POST['name'] = $content->name;
                    $a = explode('/', $content->profile_image_url);        
                    $_POST['img'] = str_replace(end($a), str_replace("_normal", '', end($a)), $content->profile_image_url);
                    $_POST['social_media_id'] = $content->screen_name;
                    $_POST['social_media'] = 'TW';
                    $_POST['email'] = $_POST['gender'] = '';
                    $this->loginSocialMedia(1);
                    //echo 'you are in Twiter login';exit;
                    //redirect(base_url('home'));
                    redirect($this->session->userdata('referrer'));
                }else{
                    echo "<h4> Login Error </h4>";
                }
            }else{
                echo "<h4> Login Error </h4>";
            }
        }else if(isset($_GET['denied'])){
            redirect(base_url());
        }
    }
    
    public function loginSocialMedia($a=0){
        $user_row = $this->WebService->loginSocialMedia();
        $this->session->set_userdata(['front_userdata'=>json_decode($user_row)]);
	if($a == 0) {
        	echo $user_row;
	}
    }
    
    public function chkMobileNumber(){
        $phone_number = $this->input->post('phone');
        $media = $this->input->post('media');
        
        if($this->input->is_ajax_request()){
            if($phone_number){
                $mobile_data = $this->db->get_where('user',['mobile'=>$phone_number,'social_media'=>$media])->row_array();
                if(!empty($mobile_data)){
                    $_POST = $mobile_data;
                    $_POST['social_media'] = 'WA';
                    $this->loginSocialMedia(1);
            }else echo 0;
            }else echo 0;
        }
    }
    
    public function whatsupLogin($auth_code,$csrf){
        $app_id = '157848711413331';
        $secret = '89a2f53daf8d9572076329e46584d09c'; //App kit secret //-->'b627e2d0c8770b7157cf6e90ecf50bd7';
        $version = 'v1.0'; // 'v1.1' for example
        // Exchange authorization code for access token
        $token_exchange_url = 'https://graph.accountkit.com/'.$version.'/access_token?'.
          'grant_type=authorization_code'.
          '&code='.$auth_code.
          "&access_token=AA|$app_id|$secret";
        //echo 'Auth Code : '.$auth_code.'<br>';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $token_exchange_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = json_decode(curl_exec($ch), true);
//        $user_id = $data['id'];
        $user_access_token = @$data['access_token'];//-->'5e68bb0ef1d0c36a809577156bb72585'; 
//        $refresh_interval = $data['token_refresh_interval_sec'];
//        echo $user_access_token;exit;
        // Get Account Kit information
        $me_endpoint_url = 'https://graph.accountkit.com/'.$version.'/me?'.'access_token='.$user_access_token;
        curl_setopt($ch, CURLOPT_URL, $me_endpoint_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = json_decode(curl_exec($ch), true);
//        echo 'user Data : <br>';print_r($data);exit;
        $phone = isset($data['phone']) ? $data['phone']['number'] : '';
//        $email = isset($data['email']) ? $data['email']['address'] : '';
        echo $phone;
    }
    
    public function chkUserEmail(){
        if($this->input->is_ajax_request()){
            if($this->input->post('user_email')){
                $email_data = $this->db->get_where('user',['email'=>$this->input->post('user_email')])->row_array();
                if(!empty($email_data)){
                    echo 'exist';
                }else{ 
                    echo 'not_exist'; 
}
            }else echo 'email is empty';
        }else{
            echo 'No direct access';
        }
    }
    
    public function loginByMobile(){
        $_POST['social_media_id'] = $this->input->post('mobile'); 
        $_POST['phone'] = $this->input->post('mobile'); 
        $_POST['media'] = $this->input->post('social_media'); 
        $this->loginSocialMedia(1);        
        $this->chkMobileNumber();
        $this->loginSocialMedia(1);
        redirect(base_url().'?WA=yes','refresh');
    }
}