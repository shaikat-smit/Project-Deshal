<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class category_mdl extends CI_Model  {

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
        // Call the Model constructor
        parent::__construct();
    }
	
	
	public function addCategory($data)
	{
		if($this->db->insert('category', $data))
			return 1;
		else
			return 0;
	}
	
	public function addSubcategory($data)
	{
		if($this->db->insert('category', $data))
			return 1;
		else
			return 0;
	}
	
	function subcatList($categoryId)
	{

		$this->db->select("id ,name");
		$this->db->where('rootCategoryId',$categoryId);
		$result = $this->db->get('category');
		
		if( $result->num_rows()  > 0 )
			return $result->result_array();
		else
			return false;
	}
	
	function subcatListRaw($categoryId)
	{

		$this->db->select("id ,name");
		$this->db->where('rootCategoryId', $categoryId);
		$result = $this->db->get('category');
		
			return $result; //Don't return false/0. Use a new function
		
	}
	
	function catList()
	{

		$this->db->select("id ,name");
		$this->db->where('rootCategoryId', 0);
		$result = $this->db->get('category');
		
		if( $result->num_rows()  > 0 )
			return $result->result_array();
		else
			return false;
	}
	
	function catListRaw()
	{

		$this->db->select("id ,name");
		$this->db->where('rootCategoryId', 0);
		$result = $this->db->get('category');
		
		if( $result->num_rows()  > 0 )
			return $result;
		else
			return false;
	}
	
	function productcheck($value)
	{
		$this->db->where('code',$value);
		$query = $this->db->get('product');
        
		if($query->num_rows()<1)
		{
			return false;
		}
		else
		{
			$row = $query->row();
			$data = array(
							'id' => $row->id,
						);
			return $data;

		}
	}
	
}