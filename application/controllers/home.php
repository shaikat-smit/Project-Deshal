<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {

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
	 
	function __construct()
    {
        parent::__construct();
		$this->load->model('category_mdl');
		
    } 
	
	public function index()
	{
		//$data['current_page'] = "Home";
		
		
		//vaj($bigAss);
		/*
		for($i=0; $i<count($bigAss); $i++)// $bigAss as $value)
		{
			//vaj( $value );
			foreach($bigAss[$i] as $key => $val)
			{
				//echo $key.'=>'.$val.'2<br/>';
				$category = array(  'id' => $val,
									'name'=> $val,
									'data'=> 'somethings');
				
			}
		
		}
		vaj($category);
		
				// vaj($originalSubcatAr->result_array()); exit;
		*/
		
		
		
		
		
		$categoryAr = $this->category_mdl->catListRaw();
		$category = array();  //vaj($categoryAr); exit;;
		
		if($categoryAr != false)
		{
			foreach ($categoryAr->result() as $bigCatrow)
			{
				$manWomanAr = $this->category_mdl->subcatListRaw($bigCatrow->id);
				$manWoman = array();
				foreach ($manWomanAr->result() as $SubCatrow)
				{
					$originalSubcatAr = $this->category_mdl->subcatListRaw($SubCatrow->id);
					$originalSubcat = array();
					foreach ($originalSubcatAr->result() as $row)
					{
						array_push($originalSubcat ,array(  	'id' => $row->id,
																'name'=> $row->name
														)
								);
					}
					array_push($manWoman ,array(  	'id' => $SubCatrow->id,
													'name'=> $SubCatrow->name,
													'data'=> $originalSubcat
												)
						  );
				}
				array_push($category ,array(  	'id' => $bigCatrow->id,
												'name'=> $bigCatrow->name,
												'data'=> $manWoman
											)
						  );
			}
			//vaj($category);
			$data['category'] = $category;
			//$this->load->controller('category');
			// vaj($this->category->menu_categories());
			// echo 's'; exit;
		}
		//$data['query'] = $this->db->query("select * from product ORDER BY created DESC limit 8");
		//$data['products'] = $this->db->query("select * from product ORDER BY created DESC limit 10");
		
		
		$data['settings'] = $this->db->query("select * from tbl_site_settings")->row();
		$totimg = $data['settings']->latest_product_row*5;
		$data['prod'] = $this->db->query("select * from tbl_product ORDER BY created DESC limit ".$totimg."");
				
		$this->load->view('header',$data);
		//echo "ok";die;
		//$this->load->view('menu');//, $data);
		$this->load->view('home',$data);
		$this->load->view('footer');
	}
	
	function temp_grid($val)  // Home/temp_grid
	{
		
		// $this->load->library('../controllers/category');
		// $data['category'] = $this->category->menu_categories();
		//$data['category'] = $category;
	
		$data['products'] = $this->db->query("select * from tbl_product where id in (select product_id from tbl_productincatagory where categoryId = ".$val.");");
		$x = $this->db->query("select * from category where id = ".$val.";");
		$data['categoryName']= $x->row()->name;
		$data['settings'] = $this->db->query("select * from tbl_site_settings")->row();
		$this->load->view('header', $data);//, $data);
		//$this->load->view('menu');//, $data);

		//vaj($data['settings']->logo_dir);
		$this->load->view('product_grid', $data);
		$this->load->view('footer');
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */