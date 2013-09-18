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
		
		
		$this->load->library('../controllers/admin/category');
		$data['category'] = $this->category->menu_categories();//$category;
		$this->load->view('header');
		$this->load->view('menu');
		$this->load->view('product_details');
		$this->load->view('footer');
		
		
	}
	
	public function product($product = '')
	{
		$result = $this->product_mdl->fetchproduct($product);
		
		//vaj($result2);
		if(!$result)
		{
			$data['error'] = 'Invalid Product ID' ;
			$this->load->view('header');
			$this->load->view('menu');
			
			$data['products'] = $this->db->query("select * from product where status=0 ORDER BY created DESC limit 5");
			$this->load->view('product_details',$data);
			$this->load->view('footer');
		}
		else
		{
			$data = $this->getValues($product);//for fetching all data...:D
			//print_r($data);
			
			//////////////////////////////////////
			$data['details'] = $result ;
			
			$this->load->view('header');
			$this->load->view('menu');
			//$data['getreview'] = $this->db->query("SELECT * FROM customerreview where productId=".$_POST['p_id']." ");
			//echo $data['getreview'];exit;
			
			$data['products'] = $this->db->query("select * from product  where status=0 ORDER BY created DESC limit 5");
			$this->load->view('product_details',$data);
			$this->load->view('footer');
		}
		
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
