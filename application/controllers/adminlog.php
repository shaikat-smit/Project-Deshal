<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class adminlog extends CI_Controller {

	function adminlog()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('date');
		$this->load->library('form_validation');

	}
		public function index()
	{
		
		$this->load->view('admin/login');

	}
	
	function logout()
	{
		$this->session->sess_destroy();
		redirect('home_ctl');
	}
	
	public function admin_login()
	{

		$uname=$this->input->post('username');
		$password=$this->input->post('password');
		
		$this->loginCheck($uname,$password);
	}
	
	function loginCheck($uname,$password)
	{
        	$this->load->model('admin_login_model');
			$r2=$this->admin_login_model->logincheck($uname);
		
		if(!$r2)
		{
			$data['error']="Username Does Not Exist";
			$this->load->view('admin/login',$data);
            //echo json_encode($data);
		}
		else
		{
			if($r2['password']==md5($password))
			{
				
				$session_data = array(
										'admin_name' => $uname,
										'admin_email' => $r2['email'],
										'admin_logged_in' => TRUE
									);
					$this->session->set_userdata($session_data);
					redirect('adminlog/load_admin');
			
			}
			else
			{
				$data['error']="Password Mismatch...login invalid";
				$this->load->view('admin/login',$data);
                //echo json_encode($data);
			}
		}
    }
	
	function load_admin()
    {
		if($this->session->userdata('admin_logged_in'))
		{
			$this->load->view('admin/header');
			$this->load->view('admin/dashboard');
			//$this->load->view('admin/view_product');
		}
		
		else
		{
			redirect('adminlog');
		}
		
    }
	
	
}

