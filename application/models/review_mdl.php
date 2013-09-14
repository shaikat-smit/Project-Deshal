<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class review_mdl extends CI_Model {

	function __construct()
    {
        parent::__construct();
	}
	
	function insert_review()
	{
		$review = $this->input->post('review');
		$rate = $this->input->post('rate');
		$user_Name = $this->input->post('user_Name');
		$email = $this->input->post('email');
		$data = array(
				'productId'=>$_POST['p_id'],
				'review'=>$review,
				'rate'=>$rate,
				'user_Name'=>$user_Name,
				'email'=>$email
				
				);
		$this->db->insert('reviewrating',$data);
			// return true;
		// else
			// return false;
		
		// $rate = $this->input->post('rate');
		// $data1 = array(
				// 'productId'=>$_POST['p_id'],
				// 'rate'=>$rate
				// );
		// $this->db->insert('customerrating',$data1);
		
		
	}
}
