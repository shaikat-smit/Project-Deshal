<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class settings_clt extends CI_Controller {

	function settings_clt()
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
		if($this->session->userdata('admin_logged_in'))
		{
			$this->load->view('admin/header');
			//$this->load->view('menu');
			$this->load->view('admin/settings/settings_home');
			//$this->load->view('footer');
		}
		else
		{
			redirect('adminlog');
		}
	}
	
	/*calling divs*/
	
	public function editlogo()
	{
		if($this->session->userdata('admin_logged_in'))
		{
			$this->load->view('admin/settings/editlogoajax');
		}
		else
		{
			redirect('adminlog');
		}
	}
	
	public function edittag()
	{
		if($this->session->userdata('admin_logged_in'))
		{
			$column_name = "tag_line";
			$done = $this->settings_mdl->getvalues($column_name);
			$data['val'] = $done['value'];
			$this->load->view('admin/settings/edittaglineajax',$data);
		}
		else
		{
			redirect('adminlog');
		}
	}
	
	public function edittitle()
	{
		if($this->session->userdata('admin_logged_in'))
		{
			$column_name = "title";
			$done = $this->settings_mdl->getvalues($column_name);
			$data['val'] = $done['value'];
			$this->load->view('admin/settings/edittitleajax',$data);
		}
		else
		{
			redirect('adminlog');
		}
	}
	
	public function editProductRow()
	{
		if($this->session->userdata('admin_logged_in'))
		{
			$column_name = "grid_row";
			$done = $this->settings_mdl->getvalues($column_name);
			$data['val'] = $done['value'];
			$this->load->view('admin/settings/editProductRowajax',$data);
		}
		else
		{
			redirect('adminlog');
		}
	}
	
	public function editlatestRow()
	{
		if($this->session->userdata('admin_logged_in'))
		{
			$column_name = "latest_product_row";
			$done = $this->settings_mdl->getvalues($column_name);
			$data['val'] = $done['value'];
			$this->load->view('admin/settings/editlatestajax',$data);
		}
		else
		{
			redirect('adminlog');
		}
	}
	
	public function editcontact()
	{
		if($this->session->userdata('admin_logged_in'))
		{
			$this->load->view('admin/settings/editcontactajax');
		}
		else
		{
			redirect('adminlog');
		}
	}
	/*submit done.....*/
	
	public function editlogodone()
	{
		if($this->session->userdata('admin_logged_in'))
		{
			
			
			$message['status'] = 0;
			$message['msg'] = 'Something went wrong..Try again';
			$data['message'] = $message;
			$this->load->view('admin/settings/editlogoajax');
		}
		else
		{
			redirect('adminlog');
		}
	}
	
	public function edittagdone()
	{
		if($this->session->userdata('admin_logged_in'))
		{
			$config = array(
					
                    array(
                             'field'   => 'tagline',
                             'label'   => 'Tag Line',
                             'rules'   => 'required'
                      )
            );
			$this->form_validation->set_rules($config); 
			
			if ($this->form_validation->run() == FALSE)
			{
					$message['status'] = 0;
					$message['msg'] = 'Field error';
					$data['message'] = $message;
					$this->load->view('admin/header');
					$this->load->view('admin/settings/settings_home',$data);
			}
			else
			{
				$tagline = $this->input->post("tagline");
				$column_name = "tag_line";
				$value = $tagline ;
				
				$done = $this->settings_mdl->update($column_name,$value);
				if($done)
				{
					$message['status'] = 1;
					$message['msg'] = 'Tag Line Edited';
					$data['message'] = $message;
					$this->load->view('admin/header');
					$this->load->view('admin/settings/settings_home',$data);
					
				}
				else
				{	
					$message['status'] = 0;
					$message['msg'] = 'Something went wrong..Please try again !!!';
					$data['message'] = $message;
					$this->load->view('admin/header');
					$this->load->view('admin/settings/settings_home',$data);
				}
			}
		}
		else
		{
			redirect('adminlog');
		}
	}
	
	public function edittitledone()
	{
		if($this->session->userdata('admin_logged_in'))
		{
			$config = array(
					
                    array(
                             'field'   => 'title',
                             'label'   => 'Title',
                             'rules'   => 'required'
                      )
            );
			$this->form_validation->set_rules($config); 
			
			if ($this->form_validation->run() == FALSE)
			{
					$message['status'] = 0;
					$message['msg'] = 'Field error';
					$data['message'] = $message;
					$this->load->view('admin/header');
					$this->load->view('admin/settings/settings_home',$data);
			}
			else
			{
				$title = $this->input->post("title");
				$column_name = "title";
				$value = $title ;
				
				$done = $this->settings_mdl->update($column_name,$value);
				if($done)
				{
					$message['status'] = 1;
					$message['msg'] = 'Title Edited';
					$data['message'] = $message;
					$this->load->view('admin/header');
					$this->load->view('admin/settings/settings_home',$data);
				}
				else
				{	
					$message['status'] = 0;
					$message['msg'] = 'Something went wrong..Please try again !!!';
					$data['message'] = $message;
					$this->load->view('admin/header');
					$this->load->view('admin/settings/settings_home',$data);
				}
			}
		}
		else
		{
			redirect('adminlog');
		}
	}
	
	public function editProductRowdone()
	{
		if($this->session->userdata('admin_logged_in'))
		{
			$config = array(
					
                    array(
                             'field'   => 'number',
                             'label'   => 'Row Number',
                             'rules'   => 'required'
                      )
            );
			$this->form_validation->set_rules($config); 
			
			if ($this->form_validation->run() == FALSE)
			{
					$message['status'] = 0;
					$message['msg'] = 'Field error';
					$data['message'] = $message;
					$this->load->view('admin/header');
					$this->load->view('admin/settings/settings_home',$data);
			}
			else
			{
				$number = $this->input->post("number");
				$column_name = "grid_row";
				$value = $number ;
				
				$done = $this->settings_mdl->update($column_name,$value);
				if($done)
				{
					$message['status'] = 1;
					$message['msg'] = 'Product Gallery Grid Row Edited';
					$data['message'] = $message;
					$this->load->view('admin/header');
					$this->load->view('admin/settings/settings_home',$data);
				}
				else
				{	
					$message['status'] = 0;
					$message['msg'] = 'Something went wrong..Please try again !!!';
					$data['message'] = $message;
					$this->load->view('admin/header');
					$this->load->view('admin/settings/settings_home',$data);
				}
			}
		}
		else
		{
			redirect('adminlog');
		}
	}
	public function editlatestRowDone()
	{
		if($this->session->userdata('admin_logged_in'))
		{
			$config = array(
					
                    array(
                             'field'   => 'number',
                             'label'   => 'Row Number',
                             'rules'   => 'required'
                      )
            );
			$this->form_validation->set_rules($config); 
			
			if ($this->form_validation->run() == FALSE)
			{
					$message['status'] = 0;
					$message['msg'] = 'Field error';
					$data['message'] = $message;
					$this->load->view('admin/header');
					$this->load->view('admin/settings/settings_home',$data);
			}
			else
			{
				$number = $this->input->post("number");
				$column_name = "latest_product_row";
				$value = $number ;
				
				$done = $this->settings_mdl->update($column_name,$value);
				if($done)
				{
					$message['status'] = 1;
					$message['msg'] = 'Latest Product Grid Row Edited';
					$data['message'] = $message;
					$this->load->view('admin/header');
					$this->load->view('admin/settings/settings_home',$data);
				}
				else
				{	
					$message['status'] = 0;
					$message['msg'] = 'Something went wrong..Please try again !!!';
					$data['message'] = $message;
					$this->load->view('admin/header');
					$this->load->view('admin/settings/settings_home',$data);
				}
			}
		}
		else
		{
			redirect('adminlog');
		}
	}
	
}
