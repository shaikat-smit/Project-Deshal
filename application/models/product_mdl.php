<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class product_mdl extends CI_Model {

	function __construct()
    {
        parent::__construct();
    }
	
	function fetchproduct($value)
	{
		$this->db->where('id',$value);
		$query = $this->db->get('tbl_product');
		
		if($query->num_rows()<1)
		{
			return false;
		}
		else
		{
			$row = $query->row();
			$data = array(
						'id' => $row->id,
						'name' => $row->name,
						'price' => $row->price,
						'rate' => $row->rate,
						'amount' => $row->amount,
						'code' => $row->code,
						'created' => $row->created,
						'mainImageUrl' => $row->mainImageUrl,
					 );
			return $data;
		}
		
		// $this->db->where('productId',$data['id']);
		// $query2 = $this->db->get('productavaiableartist');
			
		
	}
	
	function fetchdetails3($productID)
	{
		$this->db->where('productId',$productID);
		$query2 = $this->db->get('productavaiableiningredient');
		
		$ingredient="";
		$i=0;
		foreach($query2->result() as $row)
		{
			$res[$i] = $row->productInGredientId;
			$this->db->where('id',$res[$i]);
			$query2 = $this->db->get('productingredient');
			if($query2->num_rows()==0)
				break;
			$row = $query2->row();
			if($ingredient=='')
				$ingredient=$row->name;
			else
				$ingredient = $ingredient.",".$row->name;
		}
		//echo $ingredient;
		
		return $ingredient;
	}
	
	function fetchdetails2($productID)
	{
		$sql='select productingredient.name as name from productingredient,productavaiableiningredient where productingredient.id=productavaiableiningredient.productInGredientId and productavaiableiningredient.productId='.$productID ;
		
		$query2 = $this->db->query($sql);
		if($query2->num_rows()==0)
			return "";
			
		$ingredient="";
		
		foreach($query2->result() as $row)
		{
			
			if($ingredient=='')
				$ingredient=$row->name;
			else
				$ingredient = $ingredient.",".$row->name;
		}
		
		
		return $ingredient;
	}
	
	function fetchdetails($fromColumn,$toColumn,$fromTable,$toTable)
	{
		//$sql='select productingredient.name as name from productingredient,productavaiableiningredient where productingredient.id=productavaiableiningredient.productInGredientId and productavaiableiningredient.productId='.$productID ;
		
		
		$sql='select '.$toTable.'.name as name from '.$toTable.','.$fromTable.' where '.$toTable.'.id='.$fromTable.'.'.$fromColumn.' and '.$fromTable.'.productId ='.$toColumn ;
		
		$query2 = $this->db->query($sql);
		if($query2->num_rows()==0)
			return "";
			
		$ingredient="";
		
		foreach($query2->result() as $row)
		{
			
			if($ingredient=='')
				$ingredient=$row->name;
			else
				$ingredient = $ingredient.",".$row->name;
		}
		
		
		return $ingredient;
	}
	
	function fetchTags($productID)
	{
		$sql = "select * from tags_table where id in (select tag_id from tag_product where product_id = ".$productID.")";
		$result = $this->db->query($sql);
																	
		if ($result->num_rows() > 0)
			return $result->result();
		else return null;
	}
	
	function fetchJustTags($productID)
	{
		$sql = "select * from tags_table where id in (select tag_id from tag_product where product_id = ".$productID.")";
		$result = $this->db->query($sql);
		$tagsArr = array();
		
		if ($result->num_rows() > 0)
		{
			$tags = $result->result();
			for ($i=0; $i<count($tags); $i++)
			{
				array_push($tagsArr, $tags[$i]->id);
			}
			return $tagsArr;
		}
		else return null;
	}
	
	function fetchJustCats($productID)
	{
		$sql = "select * from tbl_productincatagory where product_id = ".$productID."";
		$result = $this->db->query($sql);
		$catsArr = array();
		
		if ($result->num_rows() > 0)
		{
			$cats = $result->result();
			for ($i=0; $i<count($cats); $i++)
			{
				array_push($catsArr, $cats[$i]->categoryId);
			}
			return $catsArr;
		}
		else return null;
	}
	
	
}
?>