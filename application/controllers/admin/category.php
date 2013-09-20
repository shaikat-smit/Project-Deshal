<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class category extends CI_Controller {

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
		if($this->session->userdata('admin_logged_in'))
		{
			$this->load->view('admin/header');
			//$this->load->view('menu');
			$this->load->view('admin/category');
			//$this->load->view('footer');
		}
		else
		{
			redirect('adminlog');
		}
	}
	
	function subcat()
	{
		//$data['current_page'] = "Home";
		
		$this->load->view('admin/header');
		//$this->load->view('menu');
		
		$data['categoryList'] = $this->category_mdl->catList();
		
		$this->load->view('admin/subcategory', $data);
		//$this->load->view('footer');
		
	}
	
	function addCategory()
	{
		if(isset($_POST['catname']) && isset($_POST['desc']))
		{
			$data['name'] = $_POST['catname'];
			$data['discription'] = $_POST['desc'];
			$data['rootCategoryId'] = 0;	//grandmother
			
			echo $this->category_mdl->addCategory($data);  /// 0/1
		}
	}
	
	function addSubCategory()
	{
		if(isset($_POST['name']))
			echo $this->category_mdl->addSubcategory($_POST);  /// 0/1
		
	}
	
	
	
	function getSubcatList() //AJAX
	{
		if( isset($_POST['catId']) )
		{
			$response['catId'] = $_POST['catId']; //hudai
			
			$result = $this->category_mdl->subcatList($_POST['catId']); // 0/rows
			if( $result )
			{
				$response['result'] = json_encode($result);
				$response['status'] = 1;
			}
			else
				$response['status'] = 0;
				
			echo json_encode($response);
		}
	}
	
	function menu_categories()
	{
		$categoryAr = $this->category_mdl->catListRaw();
		$category = array();
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
		}
		return $category;
	}
	
	
	
	
	public function dynaCat($bilai = "")//SHOW
	{
		$arr = array();
		if($bilai == "")
			$arr = $this->category_mdl->catListRaw()->result();
		else
			$arr = $this->category_mdl->subcatListRaw($bilai)->result();
		
		
		if(count($arr) == 0)return;
		
		if($bilai != "")
			echo '<ul class="sub-menu">';
		else
			echo '<ul id="menu-header" class="menu">';
		
		
		foreach ($arr as $row)
		{
			echo '<li> <a href="'.base_url().'index.php/home/temp_grid/'.$row->id.'">'.$row->name.'</a>';
			$this->dynaCat($row->id);
			echo '</li>';
		}
			
		echo'</ul>';
	}
	
	
	public function dynaCatAdd($bilai = "")//CHANGE
	{
		$arr = array();
		if($bilai == "")
			$arr = $this->category_mdl->catListRaw()->result();
		else
			$arr = $this->category_mdl->subcatListRaw($bilai)->result();
		
		
		if(count($arr) == 0)
		{
			echo '<ul class="sub-menu">';//Adding NEW sub-category right
				echo '<li id="mother-'.$bilai.'"  class="new">';
					echo '<input class="newCatInput" type="text" placeholder="Add new"/>';
					echo '<textarea  class="newCatDesc" placeholder="Description" style="vertical-align: top;" rows="1" cols="25" value=""></textarea>';
				echo '</li>';
			echo '</ul>';
			return;
		}
		
		if($bilai != "")
			echo '<ul class="sub-menu">';
		else
			echo '<ul id="menu-header" class="menu particular">';
		
		
		foreach ($arr as $row)
		{
			echo '<li id="he-'.$row->id.'"  class="edit">';//Edit existing sub-cats
				echo '<a href="#"> '.$row->name.'</a>';
				echo '<input class="newCatInput editField" type="text" style="display:none;" value="'.$row->name.'"/>';
				echo '<textarea  class="newCatDesc editField" style="display:none;" rows="1" cols="25" >'.$row->discription.'</textarea>';
				$this->dynaCatAdd($row->id);
			echo '</li>';
		}
		
		if($bilai != "")//Adding NEW sub-category down
		{	echo '<li id="mother-'.$bilai.'" class="new">';
				echo '<input id="mother-'.$bilai.'" class="newCatInput" type="text" placeholder="Add new"/>';
				echo '<textarea  class="newCatDesc " placeholder="Description" rows="1" cols="25" value=""></textarea>';
			echo '</li>';
		}
		
		if($bilai == "")//top level NEW adding (orphans!)
		{
			echo '<li id="mother-'. 0 .'" class="new">';
				echo '<input class="newCatInput" type="text" placeholder="Add new" />';
				echo '<textarea  class="newCatDesc" placeholder="Description"  rows="1" cols="25" value=""></textarea>';
			echo '</li></ul>';
		}
		else
			echo'</ul>';
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function addNewCatAJAX()
	{
		if(isset($_POST['hisMother']) && isset($_POST['catname']) && isset($_POST['desc']))
		{
			$data['name'] = $_POST['catname'];
			$data['discription'] = $_POST['desc'];
			$data['rootCategoryId'] = $_POST['hisMother'];
			
			echo $this->category_mdl->addCategoryAJAX($data);  /// 0/1
		}
	}
	
	public function editCatAJAX()
	{
		if(isset($_POST['himself']) && isset($_POST['catname']) && isset($_POST['desc']))
		{
			$data['name'] = $_POST['catname'];
			$data['discription'] = $_POST['desc'];
			$data['id'] = $_POST['himself'];
			
			echo $this->category_mdl->editCategoryAJAX($data);  /// 0/1
		}
	}
	
	public function deleteCatAJAX()
	{
		if( isset($_POST['himself']) )
		{
			$data['id'] = $_POST['himself'];
			
			echo $this->category_mdl->deleteCategoryAJAX($data);  /// 0/1
		}
	}
		
	/*
	public function dynaCatAdd($bilai = "")
	{
		$arr = array();
		if($bilai == "")
			$arr = $this->category_mdl->catListRaw()->result();
		else
			$arr = $this->category_mdl->subcatListRaw($bilai)->result();
		
		
		if(count($arr) == 0)
		{
			echo '<ul class="sub-menu">';
				echo '<li><input class="newCatInput mother-'.$bilai.'" type="text"/></li>';//-------
			echo '</ul>';
			return;
		}
		
		if($bilai != "")
		{
			echo '<ul class="sub-menu">';
			
		}
		else
			echo '<ul id="menu-header" class="menu">';
		
		
		foreach ($arr as $row)
		{
			echo '<li> <a href="'.base_url().'index.php/home/temp_grid/'.$row->id.'">'.$row->name.'</a>';
			$this->dynaCatAdd($row->id);
			echo '</li>';
		}
		//if Adding category
		if($bilai != "")
			echo '<li><input id="mother-'.$bilai.'" class="newCatInput" type="text"/></li>';//-------
		//
		echo'</ul>';
	}
	*/
	
	
	
	
	public function assign_prod()
	{
		if($_POST)
		{
			// if(isset($_POST['name']))
				// echo $this->category_mdl->addSubcategory($_POST);  /// 0/1
				
			/*
			root id determination--------------
				if(subcat == "")//cat id
				else if(subcat != "" && imSubcat == "")//subcat id
				else if(imSubcat != "")//last subcats id
			
			//POST variables------
				"catId"
				"subcatId"
				"imSubcatId"
				"product"
			*/
			$product_id = "";
			$catId = "";
			if($_POST['subcatId'] == "")// subcat! -> cat id
				$catId = $_POST['catId'];
			else if($_POST['subcatId'] != "" && $_POST['imSubcatId'] == "")// subcat  imSubcat!        -> subcat id
				$catId = $_POST['subcatId'];
			else if($_POST['imSubcatId'] != "")// imSubcat ->  last subcats id
				$catId = $_POST['imSubcatId'];
				
				
			//checking existance..in product table...via code
			$check_product = $this->category_mdl->productcheck($_POST['product']);
			if(!$check_product)
			{
				echo 3;
			}
			else
			{
				$product_id = $check_product['id'];
	//checking existance..
				$this->db->where('categoryId', $catId);
				$this->db->where('productId', $product_id);
				$check_assigned = $this->db->get('productincatagory');
				
				if($check_assigned->num_rows()>0)
				{
					echo 2;
				}
				else
				{
					if($this->db->insert('productincatagory', array(
																'productId'  => $product_id,
																'categoryId' => $catId
																)
										)
					  )
					{
						echo 1;
					}
					else
						echo 0;
				}			
			}
			
		}
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */