<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin_login_model extends CI_Model {

	function __construct()
    {
        parent::__construct();
    }
	function logincheck($value)
	{
		$this->db->where('name',$value);
		$this->db->where('usertypeid',1);
		$query = $this->db->get('user');
        
		if($query->num_rows()>1||$query->num_rows()<1)
		{
			return false;
		}
		else
		{
			$row = $query->row();
			$data = array(
							'password' => $row->password,
							'email' => $row->email,
							
						);
			
			
			return $data;

		}
	}
}
?>