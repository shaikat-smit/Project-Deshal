<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class settings extends CI_Controller {

	function settings()
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
	
	/*calling Pages*/
	
	public function editaboutus()
	{
		//$data['current_page'] = "Home";
		if($this->session->userdata('admin_logged_in'))
		{
			$column_name = "aboutus_content";
			$done = $this->settings_mdl->getvalues($column_name);
			$data['val'] = $done['value'];
			$this->load->view('admin/header');
			$this->load->view('admin/settings/editaboutus',$data);
			//$this->load->view('footer');
		}
		else
		{
			redirect('adminlog');
		}
	}
	
	public function editpolicy()
	{
		//$data['current_page'] = "Home";
		if($this->session->userdata('admin_logged_in'))
		{
			$column_name = "policy_content";
			$done = $this->settings_mdl->getvalues($column_name);
			$data['val'] = $done['value'];
			$this->load->view('admin/header');
			$this->load->view('admin/settings/editpolicy',$data);
			//$this->load->view('footer');
		}
		else
		{
			redirect('adminlog');
		}
	}
	
	/*Pages Done*/
	
	public function editpolicydone()
	{
		if($this->session->userdata('admin_logged_in'))
		{
			$config = array(
					
                    array(
                             'field'   => 'policy',
                             'label'   => 'Privacy Policy',
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
				$about = $this->input->post("policy");
				$column_name = "policy_content";
				$value = $about ;
				
				$done = $this->settings_mdl->update($column_name,$value);
				if($done)
				{
					$message['status'] = 1;
					$message['msg'] = 'Privacy Policy Content Updated...';
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
	////////////////////////////////////////////
	public function editaboutdone()
	{
		if($this->session->userdata('admin_logged_in'))
		{
			$config = array(
					
                    array(
                             'field'   => 'about',
                             'label'   => 'About',
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
				$about = $this->input->post("about");
				$column_name = "aboutus_content";
				$value = $about ;
				
				$done = $this->settings_mdl->update($column_name,$value);
				if($done)
				{
					$message['status'] = 1;
					$message['msg'] = 'About Us Content Updated...';
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
	////////////////////////////////////////////
	
	public function editcontact()
	{
		if($this->session->userdata('admin_logged_in'))
		{
			$column_name = "contact_information";
			$done = $this->settings_mdl->getvalues($column_name);
			$data['val'] = $done['value'];
			$this->load->view('admin/settings/editcontactajax',$data);
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
	
	public function editgridwh()
	{
		if($this->session->userdata('admin_logged_in'))
		{
			$this->load->view('admin/settings/editgridwhajax');
		}
		else
		{
			redirect('adminlog');
		}
	}
	
	
	public function editbanner()
	{
		if($this->session->userdata('admin_logged_in'))
		{
			$this->load->view('admin/settings/editbannerajax');
		}
		else
		{
			redirect('adminlog');
		}
	}
	
	
	public function editbannermain()
	{
		if($this->session->userdata('admin_logged_in'))
		{
			$this->load->view('admin/settings/editbannermainajax');
		}
		else
		{
			redirect('adminlog');
		}
	}
	
	public function editbannerdone()
	{
		if($this->session->userdata('admin_logged_in'))
		{
			$img_date = date("Y_m_d_H_i_s");
			$this->load->library('upload');

			if(!empty($_FILES["userfile"]["name"]))
			{
				$userfile = $this->input->post('userfile');
				
				$config['upload_path'] = './slider/images/slides/';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['max_size'] = '1000';
				//$config['max_width'] = '1360';
				//$config['max_height'] = '768';
				$config['file_name'] = "banneerimg_".$img_date;
				$this->upload->initialize($config);
				
				if(!$this->upload->do_upload())
				{
					$message['status'] = 0;
					$message['msg'] = $this->upload->display_errors();
					$data['message'] = $message;
					$this->load->view('admin/header');
					$this->load->view('admin/settings/settings_home',$data);
					
				}
				else
				{
					$fileInfo = $this->upload->data();
					$imname=$fileInfo['file_name'];
					
					//$column_name = "banner";
					//$value = $imname ;
					//$done = $this->settings_mdl->update($column_name,$value);
					
					$data = array(
						'main_image_dir' => $imname,
						);
					$done = $this->db->insert('tbl_slider',$data);
					
					if(!$done)
					{
						$message['status'] = 0;
						$message['msg'] = 'Something went wrong..Try again';
						$data['message'] = $message;
						$this->load->view('admin/header');
						$this->load->view('admin/settings/settings_home',$data);
					}
					else
					{
						$message['status'] = 1;
						$message['msg'] = 'Banner Slider Added !!!';
						$data['message'] = $message;
						$this->load->view('admin/header');
						$this->load->view('admin/settings/settings_home',$data);
					}
				}
			//////////////////////////////////
			}
			else
			{
				$message['status'] = 2;
				$message['msg'] = 'No changes have been made !!!';
				$data['message'] = $message;
				$this->load->view('admin/header');
				$this->load->view('admin/settings/settings_home',$data);
			}
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
	
	public function editcontactaddress()
	{
		if($this->session->userdata('admin_logged_in'))
		{
			$column_name = "contact_email";
			$done = $this->settings_mdl->getvalues($column_name);
			$data['val'] = $done['value'];
			$this->load->view('admin/settings/edicontactaddressajax',$data);
		}
		else
		{
			redirect('adminlog');
		}
	}
	
	public function editsocial()
	{
		if($this->session->userdata('admin_logged_in'))
		{
			$column_name = "fb_link";
			$done = $this->settings_mdl->getvalues($column_name);
			$data['fb'] = $done['value'];
			
			$column_name = "twitter_link";
			$done = $this->settings_mdl->getvalues($column_name);
			$data['twt'] = $done['value'];
			
			$column_name = "flicker_link";
			$done = $this->settings_mdl->getvalues($column_name);
			$data['fli'] = $done['value'];
			
			$this->load->view('admin/settings/editsociallinksajax',$data);
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
			$this->load->library('upload');

			if(!empty($_FILES["userfile"]["name"]))
			{
				$userfile = $this->input->post('userfile');
				
				$config['upload_path'] = './admin/logo/';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['max_size'] = '1000';
				//$config['max_width'] = '1360';
				//$config['max_height'] = '768';
				$config['file_name'] = "logo";
				$this->upload->initialize($config);
				
				if(!$this->upload->do_upload())
				{
					$message['status'] = 0;
					$message['msg'] = $this->upload->display_errors();
					$data['message'] = $message;
					$this->load->view('admin/header');
					$this->load->view('admin/settings/settings_home',$data);
					
				}
				else
				{
					$fileInfo = $this->upload->data();
					$imname=$fileInfo['file_name'];
					
					$column_name = "logo_dir";
					$value = $imname ;
					$done = $this->settings_mdl->update($column_name,$value);
									
					if(!$done)
					{
						$message['status'] = 0;
						$message['msg'] = 'Something went wrong..Try again';
						$data['message'] = $message;
						$this->load->view('admin/header');
						$this->load->view('admin/settings/settings_home',$data);
					}
					else
					{
						$message['status'] = 1;
						$message['msg'] = 'Logo Changed !!!';
						$data['message'] = $message;
						$this->load->view('admin/header');
						$this->load->view('admin/settings/settings_home',$data);
					}
				}
			//////////////////////////////////
			}
			else
			{
				$message['status'] = 2;
				$message['msg'] = 'No changes have been made !!!';
				$data['message'] = $message;
				$this->load->view('admin/header');
				$this->load->view('admin/settings/settings_home',$data);
			}
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
					$message['msg'] = 'Tag Line Updated';
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
					$message['msg'] = 'Title Updated';
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
					$message['msg'] = 'Product Gallery Grid Row Updated';
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
					$message['msg'] = 'Latest Product Grid Row Updated';
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
	
	public function editcaddressdone()
	{
		if($this->session->userdata('admin_logged_in'))
		{
			$config = array(
					
                    array(
                             'field'   => 'emailaddress',
                             'label'   => 'Email',
                             'rules'   => 'required|valid_email'
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
				$number = $this->input->post("emailaddress");
				$column_name = "contact_email";
				$value = $number ;
				
				$done = $this->settings_mdl->update($column_name,$value);
				if($done)
				{
					$message['status'] = 1;
					$message['msg'] = 'Contact Email Address Updated';
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
	
	public function editsocialdone()
	{
		if($this->session->userdata('admin_logged_in'))
		{
			
			$fb = $this->input->post("fb");
			$twt = $this->input->post("twt");
			$fli = $this->input->post("fli");
			
			
			$column_name = "fb_link";
			$value = $fb ;
			$done = $this->settings_mdl->update($column_name,$value);
			
			$column_name = "twitter_link";
			$value = $twt ;
			$done2 = $this->settings_mdl->update($column_name,$value);
			
			$column_name = "flicker_link";
			$value = $fli ;
			$done3 = $this->settings_mdl->update($column_name,$value);
			
			
			if($done3)
			{
				$message['status'] = 1;
				$message['msg'] = 'Social Links Updated';
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
		else
		{
			redirect('adminlog');
		}
	}
	
	public function editgriddone()
	{
		if($this->session->userdata('admin_logged_in'))
		{
			
			$gridimg_width = $this->input->post("gridimg_width");
			$gridimg_height = $this->input->post("gridimg_height");
			
			$column_name = "gridimg_width";
			$value = $gridimg_width ;
			$done = $this->settings_mdl->update($column_name,$value);
			
			$column_name = "gridimg_height";
			$value = $gridimg_height ;
			$done2 = $this->settings_mdl->update($column_name,$value);

			if($done2)
			{
				$message['status'] = 1;
				$message['msg'] = 'Grid Images size edited...';
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
		else
		{
			redirect('adminlog');
		}
	}
	
	public function editcontactdone()
	{
		if($this->session->userdata('admin_logged_in'))
		{
			$config = array(
					
                    array(
                             'field'   => 'contact',
                             'label'   => 'Contact Information',
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
				$contact = $this->input->post("contact");
				$column_name = "contact_information";
				$value = $contact ;
				
				$done = $this->settings_mdl->update($column_name,$value);
				if($done)
				{
					$message['status'] = 1;
					$message['msg'] = 'Contact Information Updated';
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