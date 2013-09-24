<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class contact extends CI_Controller {

	function contact()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('date');
		$this->load->helper('url');
		$this->load->model('settings_mdl');
        $this->load->library('form_validation');
	}
	
	
	public function index()
	{
		//$data['current_page'] = "Home";
		$data['settings'] = $this->db->query("select * from tbl_site_settings")->row();
		
		$this->load->view('header',$data);
		//$this->load->view('menu');
		$this->load->view('contact');
		$this->load->view('footer');
	}
	
	public function contactus()
	{
		$config = array(
					
                    array(
                             'field'   => 'name',
                             'label'   => 'Name',
                             'rules'   => 'required'
                      ),
					array(
                             'field'   => 'email',
                             'label'   => 'Email',
                             'rules'   => 'required|valid_email'
                      ),
					array(
                             'field'   => 'subject',
                             'label'   => 'Subject',
                             'rules'   => 'required'
                    ),
					array(
                             'field'   => 'message',
                             'label'   => 'Message',
                             'rules'   => 'required'
                    )
            );
		$this->form_validation->set_rules($config); 
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['settings'] = $this->db->query("select * from tbl_site_settings")->row();
			$this->load->view('header',$data);
			$this->load->view('contact',$data);
			$this->load->view('footer');
		}
		else
		{
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$subject = $this->input->post('subject');
			$message = $this->input->post('message');
			
			$this->load->model('settings_mdl');
			$column_name = "contact_email";
			$done = $this->settings_mdl->getvalues($column_name);
			$to = $done['value'];
			
			if($to)
			{
				// $this->load->library('email');
				// $this->email->from($email, $name);
				// $this->email->to('dorrecontact@gmail.com');

				// $this->email->subject('From Contact Us Page -->'.$subject);
				// $this->email->message($message);

				// $this->email->send();
				$data['settings'] = $this->db->query("select * from tbl_site_settings")->row();
				$data['success'] = "Your Message has been sent.Thank you for your support.";
				$this->load->view('header',$data);
				$this->load->view('contact',$data);
				$this->load->view('footer');
			}
			else
			{
				$data['settings'] = $this->db->query("select * from tbl_site_settings")->row();
				$data['error'] = "Something went wrong..Please try again !!!";
				$this->load->view('header',$data);
				$this->load->view('contact',$data);
				$this->load->view('footer');
			}
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */