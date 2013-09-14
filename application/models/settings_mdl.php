<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class settings_mdl extends CI_Model {

	function __construct()
    {
        parent::__construct();
	}
	
	function getvalues($column_name)
	{
		$this->db->select($column_name);
		$query = $this->db->get('tbl_site_settings');
		
		$row = $query->row();
		if($query->num_rows()>0)
		{
		$data = array(
						'value' => $row->$column_name
					);
		}
		else
		{
			$data = array(
						'value' => ""
					);
		}
		return $data;
	}
	
	function update($column_name,$value)
	{
		$check = $this->db->get('tbl_site_settings');
		
		if($check->num_rows()>0)
		{
			$data = array(
				$column_name => $value,
				);
			$this->db->where('id',1);
			$ok = $this->db->update('tbl_site_settings',$data);
			if($ok)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		else
		{
			$data = array(
				$column_name => $value,
				);
			$ok = $this->db->insert('tbl_site_settings',$data);
			if($ok)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		
	}
}
