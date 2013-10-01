<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class account_login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		/*
		parse_str($_SERVER['QUERY_STRING'], $_REQUEST);
		$this->load->library('facebook', array(
												"appId" => '201574466691339',
												"secret" => 'f2fab9de323818740e46531a955a29c2',
												
											   )
		);
		
		$this->user = $this->facebook->getUser();
		*/
   }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		//$data['current_page'] = "Home";
		
		$this->load->view('header');
		$this->load->view('menu');
		$this->load->view('account_login');
		$this->load->view('footer');
	}
	
	public function register()
	{
		//vaj($_POST);
		
		$response['status'] = 1;
		$this->load->model('account_mdl');
		$response['was'] = $this->account_mdl->saveNewUser($_POST);
		echo json_encode($response);
	}
	
	function login()
	{
		//vaj($_POST);
		if(trim($_POST['username']) != "" && trim($_POST['password']) != "" )
		{
			$this->db->where('username',	 $_POST['username']  );
			$this->db->where('password', md5($_POST['password']) );
			$result = $this->db->get('tbl_user')->result_array();
			//vaj($result); exit;
			/*
			Array
			(
				[id] => 2
				[email] => vagabond0022@gmail.com
				[username] => oleole
				[total_review] => 0
				[product_view] => 0
				[product_buy] => 0
				[contact] => 1861876
				[password] => 81dc9bdb52d04dc20036dbd8313ed055
				[created] => 2013-10-01 12:53:40
				[first_name] => Mahmud
				[last_name] => 
			)
			*/
			
			if(count($result) == 1)
			{
				$session_data = array(
										'fname' => $result[0]['first_name'],
										'lname' => $result[0]['last_name'],
										'username' => $result[0]['username'],
										'user_id' => $result[0]['id'],
										'email' => $result[0]['email'],
										'logged_in' => true
									);
				$this->session->set_userdata($session_data);
				echo 1;
			}
			else echo 0;
			
			
		}
	}
	/*
	function fb_login()
	{
		if($this->user)
		{
			try
			{
				$user_profile = $this->facebook->api('/me');
				vaj($user_profile);
			}
			catch(FacebookApiException $exp)
			{
				echo $exp;
				return;
			}
		}
	}
	*/
	function logout()
	{
		$this->session->sess_destroy();
		redirect('home');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
