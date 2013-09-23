<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class product_details extends CI_Controller {

	function Product_details()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('product_mdl');
		$this->load->model('admin_login_model');
	}
	
	public function index()
	{
		//$data['current_page'] = "Home";
		
		$data['settings'] = $this->db->query("select * from tbl_site_settings")->row();
		
		$this->load->view('header',$data);
		$this->load->view('product_details');
		$this->load->view('footer');
		
		
	}
	
	public function details($product_id='')
	{
		$data['settings'] = $this->db->query("select * from tbl_site_settings")->row();
		$data['details'] = $this->db->query("select * from tbl_product where id=".$product_id."")->row();
		
		$data['fields'] = $this->db->query("select * from tbl_product_info where product_id=".$product_id."");
		//vaj($data['fields']);
		$this->load->view('header',$data);
		$this->load->view('product_details');
		$this->load->view('footer');
		
		
	}
	
	
	
	public function product($pid = '')
	{
		$result = $this->product_mdl->fetchproduct($pid);
		//print_r($result);
		//echo $result['id'];exit;
		if(!$result)
		{
			$data['error'] = 'Invalid Product code' ;
			$this->load->view('header');
			//$this->load->view('menu');
			$this->load->view('product_details',$data);
			
			$this->load->view('footer');
		}
		else
		{
			$data = $this->getValues($pid);
			$data['details'] = $result ;
			//echo $data['details']; exit;
			$this->load->view('header');
			//$this->load->view('menu');
			$data['getreview'] = $this->db->query("SELECT * FROM reviewrating where productId=".$result['id']." ");
			$data['countRvw'] = $data['getreview']->result_array();
			
			$data['products'] = $this->db->query("select * from tbl_product ORDER BY created DESC limit 5");
			
			$this->load->view('product_details',$data);
			$this->load->view('footer');
		}
		
		
		
	}
	public function insert_review()
	{
		
		$this->load->model('review_mdl');
		$this->load->model('product_mdl');
		$this->review_mdl->insert_review();
		
		//$data['query']=$this->db->get('customerreview','customerrate');
		//$data1['query1']=$this->db->get('customerrate');
		
		
		
		$result = $this->product_mdl->fetchproduct($_POST['p_id']);

		if(!$result)
		{
			$data['error'] = 'Invalid Product code' ;
			$this->load->view('header');
			$this->load->view('menu');
			$this->load->view('product_details',$data);
			$this->load->view('footer');
		}
		else
		{
                        $data = $this->getValues($_POST['p_id']);
			$data['details'] = $result ;
			
			//$this->load->view('header');
			// $this->load->view('menu');
			$data['getreview'] = $this->db->query("SELECT * FROM reviewrating where productId=".$_POST['p_id']." ORDER BY created DESC limit 3");
			//echo $data['getreview'];exit;
			
			$data['products'] = $this->db->query("select * from tbl_product ORDER BY created DESC limit 5");
			//$this->product($_POST['p_id']);
			// $this->load->view('product_details',$data);
			// $this->load->view('footer');
			
			//redirect(base_url());
			redirect(base_url('/index.php/product_details/product/'.$_POST['p_id']));
		}
		

		
		//$this->load->view('product_details');
	}
	
	public function getValues($product)
	{
		///////ingredient////////
			$fromColumn = "productInGredientId";
			$toColumn = $product;
			$fromTable = "productavaiableiningredient";
			$toTable = "productingredient";

			$result2 = $this->product_mdl->fetchdetails($fromColumn,$toColumn,$fromTable,$toTable);
			$data['ingredient'] = $result2;
			
			////////////Artist////////////////
			$fromColumn = "productArtistid";
			$toColumn = $product;
			$fromTable = "productavaiableartist";
			$toTable = "productartist";

			$result2 = $this->product_mdl->fetchdetails($fromColumn,$toColumn,$fromTable,$toTable);
			$data['artist'] = $result2;
			
			////////////Part////////////////
			$fromColumn = "productPartId";
			$toColumn = $product;
			$fromTable = "productavaiablepart";
			$toTable = "productpart";

			$result2 = $this->product_mdl->fetchdetails($fromColumn,$toColumn,$fromTable,$toTable);
			$data['parts'] = $result2;
			
			/////////////Color///////////////
			$fromColumn = "productColorId";
			$toColumn = $product;
			$fromTable = "productavailablecolor";
			$toTable = "productcolor";

			$result2 = $this->product_mdl->fetchdetails($fromColumn,$toColumn,$fromTable,$toTable);
			$data['color'] = $result2;
			
			/////////////Size///////////////
			$fromColumn = "productSizeId";
			$toColumn = $product;
			$fromTable = "productavaiablesize";
			$toTable = "productsize";

			$result2 = $this->product_mdl->fetchdetails($fromColumn,$toColumn,$fromTable,$toTable);
			$data['size'] = $result2;
			
			////////////Tag////////////////
			$fromColumn = "productTagId";
			$toColumn = $product;
			$fromTable = "productavaliabletag";
			$toTable = "producttag";

			$result2 = $this->product_mdl->fetchdetails($fromColumn,$toColumn,$fromTable,$toTable);
			$data['tag'] = $result2;
		
			return $data;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */