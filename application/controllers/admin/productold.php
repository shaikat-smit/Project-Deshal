<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class product extends CI_Controller {

	function product()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('date');
		$this->load->helper('url');
        $this->load->library('form_validation');
		$this->load->model('product_add_mdl');
		$this->load->model('product_mdl');
		
	}
	
	
	public function index()
	{
		if($this->session->userdata('admin_logged_in'))
		{//$data['current_page'] = "Home";
			$this->load->view('admin/header');
			$this->load->view('admin/product/addproduct');
		}
		else
		{
			redirect('adminlog');
		}
		//$this->load->view('menu');
		//$this->load->view('admin/product/addproduct');
		//$this->load->view('footer');
	}
	
	function getAddForm($product_id='')
	{
		
            $config = array(
					
                    array(
                             'field'   => 'productname',
                             'label'   => 'Name',
                             'rules'   => 'required'
                      ),
					array(
                             'field'   => 'price',
                             'label'   => 'Price',
                             'rules'   => 'required'
                      ),
					array(
                             'field'   => 'amount',
                             'label'   => 'Amount',
                             'rules'   => 'required'
                      ),
					array(
                             'field'   => 'code',
                             'label'   => 'Code',
                             'rules'   => 'required'
                      )
                     );
                    $this->form_validation->set_rules($config); 

                if ($this->form_validation->run() == FALSE)
                {
						$message['status'] = 0;
						$message['msg'] = 'Field error';
						$data['message'] = $message;
						$this->load->view('admin/header');
						$this->load->view('admin/product/addproduct',$data);
					
                }
				else
				{
					$name = $this->input->post("productname");
					$price = $this->input->post("price");
					$amount = $this->input->post("amount");
					$code = $this->input->post("code");
					$productparts = $this->input->post("productparts");
					$artist = $this->input->post("artist");
					$ingredient = $this->input->post("ingredient");
					$color = $this->input->post("color");
					$size = $this->input->post("size");
					$tag = $this->input->post("tag");
					
					$img_date = date("Y_m_d_H_i_s");
					$product_image = $name.$img_date;
					
					$this->db->where('code',$code);
					$check_code = $this->db->get('product');
					
					if($check_code->num_rows()>0)
					{
						$message['status'] = 0;
						$message['msg'] = 'This product code already added to another product..Please Enter Unique code..';
						$data['message'] = $message;
						$this->load->view('admin/header');
						$this->load->view('admin/product/addproduct',$data);
					}
					else
					{
					
						$this->load->library('upload');
						///////////////
						if(!empty($_FILES["userfile"]["name"]))
						{//////////////////////////////////
							$userfile = $this->input->post('userfile');
							
							$config['upload_path'] = './itemimages/';
							$config['allowed_types'] = 'jpg|jpeg|png';
							$config['max_size'] = '1000';
							//$config['max_width'] = '1360';
							//$config['max_height'] = '768';
							$config['file_name'] = $product_image;
							$this->upload->initialize($config);
							
							if(!$this->upload->do_upload())
							{
								$message['status'] = 0;
								$message['msg'] = $this->upload->display_errors();
								$data['message'] = $message;
								$this->load->view('admin/header');
								$this->load->view('admin/product/addproduct',$data);
								
							}
							else
							{
								$fileInfo = $this->upload->data();
								$imname=$fileInfo['file_name'];

								$w = $fileInfo['image_width'];
								$h = $fileInfo['image_height'];
								$make_h = (100*$h)/$w;
								//echo $make_width;exit;
								$product_image_thumb = $this->creatthumb($imname,$make_h);
								
								if($product_image_thumb)
								{
									$insrtProduct = $this->db->insert('product',
															array	(
															'name'=>$name ,											 
															'price'=>$price	,											 
															'amount'=>$amount,
															'code'=>$code,
															'mainImageUrl'=>$imname,
															)
													);
													
									if(!$insrtProduct)
									{
										$message['status'] = 0;
										$message['msg'] = 'Something went wrong..Try again';
										$data['message'] = $message;
										$this->load->view('admin/header');
										$this->load->view('admin/product/addproduct',$data);
									}
									else
									{
										$product_id = $this->db->insert_id();

									}
								}
								else
								{
									$message['status'] = 0;
									$message['msg'] = 'Something went wrong..Not Thumed';
									$data['message'] = $message;
									$this->load->view('admin/header');
									$this->load->view('admin/product/addproduct',$data);
								}
							}
						//////////////////////////////////
						}
						else
						{
							$imname = 'no_image.jpg';
							$insrtProduct = $this->db->insert('product',
															array	(
															'name'=>$name ,											 
															'price'=>$price	,											 
															'amount'=>$amount,
															'code'=>$code,
															'mainImageUrl'=>$imname,
																)
													);
													
									if(!$insrtProduct)
									{
										$message['status'] = 0;
										$message['msg'] = 'Something went wrong..Try again';
										$data['message'] = $message;
										$this->load->view('admin/header');
										$this->load->view('admin/product/addproduct',$data);
									}
									else
									{
										$product_id = $this->db->insert_id();
									}
						}
						
					
				//////////////
						if(isset($productparts))
						{
							$parts = explode(",", $productparts);
							
							$tablename = 'productpart' ;
							//insert productpart and productavaiablepart
							foreach($parts as $row)
							{
								$check = $this->product_add_mdl->datacheck($row,$tablename);
								if($check)
								{
									$part_id = $check['id'];
								}
								else
								{
									$insrt = $this->db->insert('productpart',
																		array	(
																		'name'=>$row												 
																			)
																);
									$part_id = $this->db->insert_id();
								}
								$insrt2 = $this->db->insert('productavaiablepart',
																	array	(
																	'productId'=>$product_id,
																	'productPartId'=>$part_id
																		)
															);
							}
						}
						
						if(isset($ingredient))
						{
							$ingredients = explode(",", $ingredient);
							
							$tablename = 'productingredient';
							//insert productingredient and productavaiableiningredient
							foreach($ingredients as $row)
							{
								$check = $this->product_add_mdl->datacheck($row,$tablename);
								if($check)
								{
									$ingredient_id = $check['id'];
								}
								else
								{
									$insrt = $this->db->insert('productingredient',
																	array	(
																	'name'=>$row												 
																		)
															);
									$ingredient_id = $this->db->insert_id();
								}
								$insrt2 = $this->db->insert('productavaiableiningredient',
																	array	(
																	'productId'=>$product_id,
																	'productInGredientId'=>$ingredient_id
																		)
															);
							}
						}
						
						
						if(isset($color))
						{
							$colors = explode(",", $color);
							
							$tablename = 'productcolor' ;
							//insert productcolor and productavailablecolor
							foreach($colors as $row)
							{
								$check = $this->product_add_mdl->datacheck($row,$tablename);
								if($check)
								{
									$color_id = $check['id'];
								}
								else
								{
									$insrt = $this->db->insert('productcolor',
																		array	(
																		'name'=>$row												 
																			)
																);
									$color_id = $this->db->insert_id();
								}
								$insrt2 = $this->db->insert('productavailablecolor',
																	array	(
																	'productId'=>$product_id,
																	'productColorId'=>$color_id
																		)
															);
							}

						}
						
						if(isset($size))
						{
							$sizes = explode(",", $size);
							
							$tablename = 'productsize' ;
							//insert productsize and productavaiablesize
							foreach($sizes as $row)
							{
								$check = $this->product_add_mdl->datacheck($row,$tablename);
								if($check)
								{
									$size_id = $check['id'];
								}
								else
								{
									$insrt = $this->db->insert('productsize',
																		array	(
																		'name'=>$row												 
																			)
																);
									$size_id = $this->db->insert_id();
								}
								$insrt2 = $this->db->insert('productavaiablesize',
																	array	(
																	'productId'=>$product_id,
																	'productSizeId'=>$size_id
																		)
															);
							}
						}
						
						if(isset($artist))
						{
							$artists = explode(",", $artist);
							
							$tablename = 'productartist' ;
							//insert productartist and productavaiableartist
							foreach($artists as $row)
							{
								$check = $this->product_add_mdl->datacheck($row,$tablename);
								if($check)
								{
									$artist_id = $check['id'];
								}
								else
								{
									$insrt = $this->db->insert('productartist',
																		array	(
																		'name'=>$row												 
																			)
																);
									$artist_id = $this->db->insert_id();
								}
								$insrt2 = $this->db->insert('productavaiableartist',
																	array	(
																	'productId'=>$product_id,
																	'productArtistid'=>$artist_id
																		)
															);
							}
						}
						
						if(isset($tag))
						{
							$tags = explode(",", $tag);
							
							$tablename = 'producttag' ;
							//insert producttag and productavaliabletag
							foreach($tags as $row)
							{
								$check = $this->product_add_mdl->datacheck($row,$tablename);
								if($check)
								{
									$tag_id = $check['id'];
								}
								else
								{
									$insrt = $this->db->insert('producttag',
																		array	(
																		'name'=>$row												 
																			)
																);
									$tag_id = $this->db->insert_id();
								}
								$insrt2 = $this->db->insert('productavaliabletag',
																	array	(
																	'productId'=>$product_id,
																	'productTagId'=>$tag_id
																		)
															);
							}
						}
						
						$message['status'] = 1;
						$message['msg'] = $name.' Added successfully..';
						$data['message'] = $message;
						$this->load->view('admin/header');
						$this->load->view('admin/product/addproduct',$data);
					}	
				}
							
	}
	
	function creatthumb($imname,$make_h)
	{	
		
		$config['image_library'] = 'gd2';
		$config['source_image']	= './itemimages/'.$imname;
		$config['new_image']    = './itemimages/thumbs/'.$imname;
		$config['create_thumb'] = False;
		$config['maintain_ratio'] = False;
		$config['width']	 = 100;
		$config['height']	= $make_h;
		
		$this->load->library('image_lib', $config); 

		$this->image_lib->resize();
		
		if ( ! $this->image_lib->resize())
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	
	function assign()
	{
	
		
		/*-------------------------------( Pagination )-----------------------------------*/
			$offset = 0; $limit = 10;

			if(isset($_GET['offset']) && $_GET['offset'] != '')
				$offset = $_GET['offset'];
			
			$this->load->library('pagination');
			$config['page_query_string'] = TRUE;
			$config['enable_query_strings'] = TRUE;
			$config['query_string_segment'] = 'offset';
			
			$config['base_url'] = base_url().'index.php/admin/product/assign'.'?';
			$config['total_rows'] = $this->db->query("select count(*) as total from product ORDER BY created DESC;")->row()->total;
			
			$config['per_page'] = $limit;
			$config['num_links'] = 3;//4

			$this->pagination->initialize($config); 
			$data['pages'] = $this->pagination->create_links(); //echo $data['pages'];
			
		/*------------------------------( Pagination )-----------------------------------*/
		
		
		
		$data['query'] = $this->db->query("select * from product ORDER BY created DESC  LIMIT ".$offset.", ".$limit.";");
		
		$this->load->view('admin/header');
		$this->load->model('category_mdl');
		$data['categoryList'] = $this->category_mdl->catList();
		$this->load->view('admin/product/assignproduct', $data);
	}
	
	function ViewProducts()
	{
		/*-------------------------------( Pagination )-----------------------------------*/
			$offset = 0; $limit = 10;

			if(isset($_GET['offset']) && $_GET['offset'] != '')
				$offset = $_GET['offset'];
			
			$this->load->library('pagination');
			$config['page_query_string'] = TRUE;
			$config['enable_query_strings'] = TRUE;
			$config['query_string_segment'] = 'offset';
			
			$config['base_url'] = base_url().'index.php/admin/product/ViewProducts'.'?';
			$config['total_rows'] = $this->db->query("select count(*) as total from product ORDER BY created DESC;")->row()->total;
			
			$config['per_page'] = $limit;
			$config['num_links'] = 3;//4

			$this->pagination->initialize($config); 
			$data['pages'] = $this->pagination->create_links(); //echo $data['pages'];
			
		/*------------------------------( Pagination )-----------------------------------*/
		
		
		
		$data['query'] = $this->db->query("select * from product ORDER BY created DESC  LIMIT ".$offset.", ".$limit.";");
		
		$this->load->view('admin/header');
		//$this->load->model('category_mdl');
		//$data['categoryList'] = $this->category_mdl->catList();
		$this->load->view('admin/product/viewproduct', $data);
	}
	
	function editProducts($product = '')
	{
		$result = $this->product_mdl->fetchproduct($product);
		
		//vaj($result2);
		if(!$result)
		{
			$data['error'] = 'Invalid Product ID' ;
			$this->load->view('admin/header');
			$this->load->view('admin/product/editproduct', $data);
		}
		else
		{
			//$data = getValues($product);
			$data = $this->getValues($product);//for fetching all data...:D
			
			//////////////////////////////////////
			$data['details'] = $result ;
			
			$this->load->view('admin/header');
			$this->load->view('admin/product/editproduct', $data);
		}
	}
	
	public function getValues($product)
	{
		///////ingredient////////
			$fromColumn = "productInGredientId";
			$toColumn = $product;
			$fromTable = "productavaiableiningredient";
			$toTable = "productingredient";

			$result2 = $this->product_mdl->fetchdetails($fromColumn,$toColumn,$fromTable,$toTable);
			$data['ingredient'] = $result2;
			
			////////////Artist////////////////
			$fromColumn = "productArtistid";
			$toColumn = $product;
			$fromTable = "productavaiableartist";
			$toTable = "productartist";

			$result2 = $this->product_mdl->fetchdetails($fromColumn,$toColumn,$fromTable,$toTable);
			$data['artist'] = $result2;
			
			////////////Part////////////////
			$fromColumn = "productPartId";
			$toColumn = $product;
			$fromTable = "productavaiablepart";
			$toTable = "productpart";

			$result2 = $this->product_mdl->fetchdetails($fromColumn,$toColumn,$fromTable,$toTable);
			$data['parts'] = $result2;
			
			/////////////Color///////////////
			$fromColumn = "productColorId";
			$toColumn = $product;
			$fromTable = "productavailablecolor";
			$toTable = "productcolor";

			$result2 = $this->product_mdl->fetchdetails($fromColumn,$toColumn,$fromTable,$toTable);
			$data['color'] = $result2;
			
			/////////////Size///////////////
			$fromColumn = "productSizeId";
			$toColumn = $product;
			$fromTable = "productavaiablesize";
			$toTable = "productsize";

			$result2 = $this->product_mdl->fetchdetails($fromColumn,$toColumn,$fromTable,$toTable);
			$data['size'] = $result2;
			
			////////////Tag////////////////
			$fromColumn = "productTagId";
			$toColumn = $product;
			$fromTable = "productavaliabletag";
			$toTable = "producttag";

			$result2 = $this->product_mdl->fetchdetails($fromColumn,$toColumn,$fromTable,$toTable);
			$data['tag'] = $result2;
		
			return $data;
	}
	
	function getEditForm($product_id='')
	{
		$id = $this->input->post("productid");
		$name = $this->input->post("productname");
		$price = $this->input->post("price");
		$amount = $this->input->post("amount");
		$code = $this->input->post("code");
		$oldImage = $this->input->post("mainImageUrl");
		
						
		$productparts = $this->input->post("productparts");
		$artist = $this->input->post("artist");
		$ingredient = $this->input->post("ingredient");
		$color = $this->input->post("color");
		$size = $this->input->post("size");
		$tag = $this->input->post("tag");
		
		
		//check unique code
		$check_code = $this->product_add_mdl->codecheck($code);
		
		if($check_code['id'] != $id)
		{
			$message['status'] = 0;
			$message['msg'] = 'This product code already added to another product..Please Enter Unique code..';
			$data['message'] = $message;
			//$this->load->view('admin/header');
			//$this->load->view('admin/product/editproduct',$data);
		}
		else
		{
			$this->load->library('upload');
			///////////////
			if(!empty($_FILES["userfile"]["name"]))
			{
				$del = 'itemimages/'.$oldImage;
				$del2 = 'itemimages/thumbs/'.$oldImage;
				unlink($del);
				unlink($del2);
				
				$userfile = $this->input->post('userfile');
				$config['upload_path'] = './itemimages/';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['max_size'] = '1000';
				//$config['max_width'] = '1360';
				//$config['max_height'] = '768';
				$config['file_name'] = $product_image;
				$this->upload->initialize($config);
				
				if(!$this->upload->do_upload())
				{
					$message['status'] = 0;
					$message['msg'] = $this->upload->display_errors();
					$data['message'] = $message;
					$this->load->view('admin/header');
					$this->load->view('admin/product/edtproduct',$data);
					
				}
				else
				{
					$fileInfo = $this->upload->data();
					$imname=$fileInfo['file_name'];

					$w = $fileInfo['image_width'];
					$h = $fileInfo['image_height'];
					$make_h = (100*$h)/$w;
					//echo $make_width;exit;
					$product_image_thumb = $this->creatthumb($imname,$make_h);
					
					if($product_image_thumb)
					{
						$this->db->where('id', $id);
						$insrtProduct = $this->db->update('product',
												array	(
												'name'=>$name ,											 
												'price'=>$price	,											 
												'amount'=>$amount,
												'code'=>$code,
												'mainImageUrl'=>$imname,
												)
										);
										
						if(!$insrtProduct)
						{
							$message['status'] = 0;
							$message['msg'] = 'Something went wrong..Try again';
							$data['message'] = $message;
							//$this->load->view('admin/header');
							//$this->load->view('admin/product/editproduct',$data);
						}
						else
						{
							$product_id = $id;

						}
					}
					else
					{
						$message['status'] = 0;
						$message['msg'] = 'Something went wrong..Not Thumed';
						$data['message'] = $message;
						//$this->load->view('admin/header');
						//$this->load->view('admin/product/editproduct',$data);
					}
				}
			//////////////////////////////////
			}
			else
			{
				$imname = $oldImage;
				
				$this->db->where('id', $id);
				$insrtProduct = $this->db->update('product',
												array	(
												'name'=>$name ,											 
												'price'=>$price	,											 
												'amount'=>$amount,
												'code'=>$code,
												'mainImageUrl'=>$imname,
													)
										);
										
						if(!$insrtProduct)
						{
							$message['status'] = 0;
							$message['msg'] = 'Something went wrong..Try again';
							$data['message'] = $message;
							//$this->load->view('admin/header');
							//$this->load->view('admin/product/addproduct',$data);
						}
						else
						{
							$product_id = $id;
						}
			}
		}
		
		if(isset($productparts))
		{
			$parts = explode(",", $productparts);
			
			$tablename = 'productpart' ;
			//delete record
			$tableavailable = 'productavaiablepart' ;
			$del = $this->product_add_mdl->deleteavailable($id,$tableavailable);
			//insert productpart and productavaiablepart
			foreach($parts as $row)
			{
				$check = $this->product_add_mdl->datacheck($row,$tablename);
				if($check)
				{
					$part_id = $check['id'];
				}
				else
				{
					$insrt = $this->db->insert('productpart',
														array	(
														'name'=>$row												 
															)
												);
					$part_id = $this->db->insert_id();
				}
				$insrt2 = $this->db->insert('productavaiablepart',
													array	(
													'productId'=>$product_id,
													'productPartId'=>$part_id
														)
											);
			}
		}
		
		if(isset($ingredient))
		{
			$ingredients = explode(",", $ingredient);
			
			$tablename = 'productingredient';
			//delete record
			$tableavailable = 'productavaiableiningredient' ;
			$del = $this->product_add_mdl->deleteavailable($id,$tableavailable);
			//insert productingredient and productavaiableiningredient
			foreach($ingredients as $row)
			{
				$check = $this->product_add_mdl->datacheck($row,$tablename);
				if($check)
				{
					$ingredient_id = $check['id'];
				}
				else
				{
					$insrt = $this->db->insert('productingredient',
													array	(
													'name'=>$row												 
														)
											);
					$ingredient_id = $this->db->insert_id();
				}
				$insrt2 = $this->db->insert('productavaiableiningredient',
													array	(
													'productId'=>$product_id,
													'productInGredientId'=>$ingredient_id
														)
											);
			}
		}
		
		
		if(isset($color))
		{
			$colors = explode(",", $color);
			
			$tablename = 'productcolor' ;
			//delete record
			$tableavailable = 'productavailablecolor' ;
			$del = $this->product_add_mdl->deleteavailable($id,$tableavailable);
			//insert productcolor and productavailablecolor
			foreach($colors as $row)
			{
				$check = $this->product_add_mdl->datacheck($row,$tablename);
				if($check)
				{
					$color_id = $check['id'];
				}
				else
				{
					$insrt = $this->db->insert('productcolor',
														array	(
														'name'=>$row												 
															)
												);
					$color_id = $this->db->insert_id();
				}
				$insrt2 = $this->db->insert('productavailablecolor',
													array	(
													'productId'=>$product_id,
													'productColorId'=>$color_id
														)
											);
			}

		}
		
		if(isset($size))
		{
			$sizes = explode(",", $size);
			
			$tablename = 'productsize' ;
			//delete record
			$tableavailable = 'productavaiablesize' ;
			$del = $this->product_add_mdl->deleteavailable($id,$tableavailable);
			//insert productsize and productavaiablesize
			foreach($sizes as $row)
			{
				$check = $this->product_add_mdl->datacheck($row,$tablename);
				if($check)
				{
					$size_id = $check['id'];
				}
				else
				{
					$insrt = $this->db->insert('productsize',
														array	(
														'name'=>$row												 
															)
												);
					$size_id = $this->db->insert_id();
				}
				$insrt2 = $this->db->insert('productavaiablesize',
													array	(
													'productId'=>$product_id,
													'productSizeId'=>$size_id
														)
											);
			}
		}
		/////////////////		
		if(isset($tag))
		{
			$tag = explode(",", $tag);
			
			$tablename = 'producttag' ;
			//delete record
			$tableavailable = 'productavaliabletag' ;
			$del = $this->product_add_mdl->deleteavailable($id,$tableavailable);
			//insert producttag and productavaliabletag
			foreach($tag as $row)
			{
				$check = $this->product_add_mdl->datacheck($row,$tablename);
				if($check)
				{
					$tag_id = $check['id'];
				}
				else
				{
					$insrt = $this->db->insert('producttag',
														array	(
														'name'=>$row												 
															)
												);
					$tag_id = $this->db->insert_id();
				}
				$insrt2 = $this->db->insert('productavaliabletag',
													array	(
													'productId'=>$product_id,
													'productTagId'=>$tag_id
														)
											);
			}
		}
		/////////////
		if(isset($message))
		{
			$this->load->view('admin/header');
			$this->load->view('admin/product/editproduct',$data);
		}
		else
		{
			$message['status'] = 1;
			$message['msg'] = $name.' Updated successfully..';
			$data['message'] = $message;
			$this->load->view('admin/header');
			$this->load->view('admin/product/editproduct',$data);
		}
		
		
	}
	
	function deleteProducts($product_id='',$status = '')
	{
		
		$delete = $this->product_add_mdl->deleteProduct($product_id,$status);
		if($delete)
		{
			//$this->ViewProducts();
			redirect('admin/product/ViewProducts');
		}
		//echo $delete;
	}
	
	function unassign($msg='')
	{
		/*-------------------------------( Pagination )-----------------------------------*/
			$offset = 0; $limit = 10;

			if(isset($_GET['offset']) && $_GET['offset'] != '')
				$offset = $_GET['offset'];
			
			$this->load->library('pagination');
			$config['page_query_string'] = TRUE;
			$config['enable_query_strings'] = TRUE;
			$config['query_string_segment'] = 'offset';
			
			$config['base_url'] = base_url().'index.php/admin/product/unassign'.'?';
			$config['total_rows'] = $this->db->query("select count(*) as total from product ORDER BY created DESC;")->row()->total;
			
			$config['per_page'] = $limit;
			$config['num_links'] = 3;//4

			$this->pagination->initialize($config); 
			$data['pages'] = $this->pagination->create_links(); //echo $data['pages'];
			
		/*------------------------------( Pagination )-----------------------------------*/
		
		
		$data['query'] = $this->db->query("select * from product ORDER BY created DESC  LIMIT ".$offset.", ".$limit.";");
		
		$this->load->view('admin/header');
		//$this->load->model('category_mdl');
		//$data['categoryList'] = $this->category_mdl->catList();
		$this->load->view('admin/product/unassignproduct', $data);
	}
	
	function getunassigncode()
	{
		$code = $this->input->post('code');
		$data['result'] = $this->product_add_mdl->getproductTable($code);
		
		$this->load->view('admin/product/unassignajax',$data);
	}
	
	function unassignid($productid,$categoryid)
	{
		//$productid = $this->input->post('productid');
		//$categoryid = $this->input->post('categoryid');
		//echo $productid;
		//exit;
		$del = $this->product_add_mdl->unassignFinal($productid,$categoryid);
		
		if($del)
		{
			$message['status'] = 1;
			$message['msg'] = 'Successfully Removed';
		}
		else
		{
			$message['status'] = 0;
			$message['msg'] = 'Something went wrong..Try again.';
			
		}
		
		/*-------------------------------( Pagination )-----------------------------------*/
			$offset = 0; $limit = 10;

			if(isset($_GET['offset']) && $_GET['offset'] != '')
				$offset = $_GET['offset'];
			
			$this->load->library('pagination');
			$config['page_query_string'] = TRUE;
			$config['enable_query_strings'] = TRUE;
			$config['query_string_segment'] = 'offset';
			
			$config['base_url'] = base_url().'index.php/admin/product/unassign'.'?';
			$config['total_rows'] = $this->db->query("select count(*) as total from product ORDER BY created DESC;")->row()->total;
			
			$config['per_page'] = $limit;
			$config['num_links'] = 3;//4

			$this->pagination->initialize($config); 
			$data['pages'] = $this->pagination->create_links(); //echo $data['pages'];
			
		/*------------------------------( Pagination )-----------------------------------*/
		
		
		$data['query'] = $this->db->query("select * from product ORDER BY created DESC  LIMIT ".$offset.", ".$limit.";");
		
		
		$data['message'] = $message;
		$this->load->view('admin/header');
		$this->load->view('admin/product/unassignproduct',$data);
			
	}
	
	
	function assignint()
	{
	
		
		/*-------------------------------( Pagination )-----------------------------------*/
			$offset = 0; $limit = 10;

			if(isset($_GET['offset']) && $_GET['offset'] != '')
				$offset = $_GET['offset'];
			
			$this->load->library('pagination');
			$config['page_query_string'] = TRUE;
			$config['enable_query_strings'] = TRUE;
			$config['query_string_segment'] = 'offset';
			
			$config['base_url'] = base_url().'index.php/admin/product/assign'.'?';
			$config['total_rows'] = $this->db->query("select count(*) as total from product ORDER BY created DESC;")->row()->total;
			
			$config['per_page'] = $limit;
			$config['num_links'] = 3;//4

			$this->pagination->initialize($config); 
			$data['pages'] = $this->pagination->create_links(); //echo $data['pages'];
			
		/*------------------------------( Pagination )-----------------------------------*/
		
		
		
		$data['query'] = $this->db->query("select * from product ORDER BY created DESC  LIMIT ".$offset.", ".$limit.";");
		
		$this->load->view('admin/header');
		//$this->load->model('category_mdl');
		//$data['categoryList'] = $this->category_mdl->catList();
		$this->load->view('admin/product/assignintproduct', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */