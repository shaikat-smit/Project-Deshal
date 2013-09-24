<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class product_add_mdl extends CI_Model {

	function __construct()
    {
        parent::__construct();
    }
	function datacheck($value,$table)
	{
		$this->db->where('name',$value);
		$query = $this->db->get($table);
        
		if($query->num_rows()<1)
		{
			return false;
		}
		else
		{
			$row = $query->row();
			$data = array(
							'id' => $row->id
						);
			return $data;

		}
	}
	
	function codecheck($value)
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
	
	function deleteavailable($id,$table)
	{
		$this->db->where('productId',$id);
		$del = $this->db->delete($table); 
		
		if($del)
			return true;
		else
			return false;
	}
	
	function deleteProduct($id,$status)
	{
		if($status == 0)
		{
			//$st = 1;
			$data['status'] = 1;
		}
		else
		{
			//$st = 0;
			$data['status'] = 0;
		}
		$this->db->where('id',$id);
		$update = $this->db->update('product',$data);
		//$update = $this->db->query("update product set status='".$st."' where id='".$id."' ;");
		if($update)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function getproductTable($code)
	{
		$this->db->where('code',$code);
		$query = $this->db->get('product');
        $row = $query->row();
		$data = array(
						'productid' => $row->id,
						'productname' => $row->name
					);
		
		$this->db->where('productId',$data['productid']);
		$query = $this->db->get('productincatagory');
		
		$catmain = array();
		$catroot1 = array();
		$catroot2 = array();
		//$productname = $id;
		$i = 0;
		foreach($query->result() as $row)
		{
			$cat[$i] = $row->categoryId;
			$this->db->where('id',$cat[$i]);
			$res2[$i] = $this->db->get('category');
			$i++;
		}
		//$this->db->where('id',$cat[$i]);
		//$res2 = $this->db->get('category');
		//select cat.name, cat.id, 
		///////start bad coding..//////////
		for($j=0;$j < $i ;$j++)
		{
			foreach($res2[$j]->result() as $row2)
			{
				array_push(
					$catmain,array(	
									'id' => $row2->id,
									'name' => $row2->name
									)
				);
				
				$this->db->where('id',$row2->rootCategoryId);
				$res3 = $this->db->get('category');
				
				foreach($res3->result() as $row3)
				{
					array_push(
						$catroot1,array(	
										'name' => $row3->name
										)
					);
					
					$this->db->where('id',$row3->rootCategoryId);
					$res4 = $this->db->get('category');
					foreach($res4->result() as $row4)
					{
						array_push(
							$catroot2,array(	
											'name' => $row4->name
											)
						);
					}
				}
			
			}
		}
		///////start bad coding..//////////
		$data['catmain'] = $catmain;
		$data['catroot1'] = $catroot1;
		$data['catroot2'] = $catroot2;
		
		return $data;
		//vaj($data);
	}
	
	function unassignFinal($id,$cateid)
	{
		$this->db->where('productId',$id);
		$this->db->where('categoryId',$cateid);
		$del = $this->db->delete('productincatagory'); 
		
		if($del)
		{
			return true;
		}
		else
		{	
			return false;
		}
	}
	
	function insertProduct($data)
	{
        $insert = $this->db->insert('tbl_product',$data);
        if($insert)
			return $this->db->insert_id();
		else
			return false;
		// $data = array(
							// 'id' => $row->id
						// );
			// return $data;
	}
	
	function insertfields($data)
	{
        $insert = $this->db->insert('tbl_product_info',$data);
        if($insert)
			return true;
		else
			return false;
		
	}
	
	function insertimages($data)
	{
        $insert = $this->db->insert('tbl_image',$data);
        if($insert)
			return true;
		else
			return false;
		
	}
	
	function insertsize($data)
	{
		$this->db->where($data);
		$query = $this->db->get('tbl_size');
        
		if($query->num_rows()<1)
		{
			$insert = $this->db->insert('tbl_size',$data);
			if($insert)
				return $this->db->insert_id();
			else
				return false;
		}
		else
		{
			$row = $query->row();
			return $row->id;
		}
	}
	
	function insertquantity($data)
	{
        $insert = $this->db->insert('tbl_size_color_product',$data);
        if($insert)
			return true;
		else
			return false;
		
	}
	function insertcolor($data)
	{
		$this->db->where($data);
		$query = $this->db->get('tbl_color');
        
		if($query->num_rows()<1)
		{
			$insert = $this->db->insert('tbl_color',$data);
			if($insert)
				return $this->db->insert_id();
			else
				return false;
		}
		else
		{
			$row = $query->row();
			return $row->id;
		}
        
		
	}
	
	function insertProductInCategory($data)
	{
        $insert = $this->db->insert('tbl_productincatagory',$data);
        if($insert)
			return true;
		else
			return false;
		
	}
	
}
?>