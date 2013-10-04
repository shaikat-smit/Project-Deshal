<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class account_mdl extends CI_Model {

	function __construct()
    {
        parent::__construct();
	}
	
	
	function saveNewUser($data)
	{
		$this->db->where('username', $data['username']);
		$this->db->from('tbl_user');
		if($this->db->count_all_results() == 0)
		{
			if(!$this->db->insert('tbl_user', array(
													'first_name'	=> $data['fname'],
													'last_name'		=> $data['lname'],
													'username' 		=> $data['username'],
													'email' 		=> $data['email'],
													'password' 		=> md5($data['password']),
													'contact'  		=> $data['contact']
												   )
								 )
			  ) return 3;//DB error
			
			$userID = $this->db->insert_id();
			if(trim($userID)!= "" && $this->db->insert('tbl_address', array(
																			'user_id'	   => $userID,
																			'address_type' => "short_address",
																			'address'	   => $data['address']
																			)
								 )
			  ) return 1;//success
			 else
				return 3;//DB error
		}
		else return 2;//username exists
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
