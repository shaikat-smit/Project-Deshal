<?php
function vaj($array)
{
	echo '<pre>';
	print_r($array);
	echo '</pre>';
}

function loggedin()
{
	return get_instance()->session->userdata('logged_in');
}

function his_data($index)
{
	return get_instance()->session->userdata($index);
	/*
	--session indexes--
	fname
	lname
	username
	user_id
	email
	logged_in
	*/
}

function abc()
{
	echo 'eh!';
}






?>