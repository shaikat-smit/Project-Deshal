<?php include_once('application/controllers/admin/category.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US">
	

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title><?=$settings->title?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
		
		<link rel="pingback" href="xmlrpc.php" />
		
		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?=base_url()?>css/style.css" type="text/css" media="screen" />
		
		<!-- Custom CSS -->
<style type="text/css">
a,
a.more-link:hover,
.single_grid_product:hover h3 a,
#all_products_call a:hover {
	color:#1e73be;
}

input[type="submit"],
a.button,
#content .Cart66ButtonPrimary,
#content .Cart66ButtonSecondary,
#content .Cart66ButtonPrimary,
#content .Cart66ButtonSecondary,
#content .Cart66CartButton .purAddToCart {
	background-color:#25a8ea;
}

@media
only screen and (min-width: 0px) and (max-width: 767px) {

	/* New Labels for the checkout screen on mobile */
	#Cart66CartForm tbody tr:not(.subtotal):not(.shipping):not(.tax-row):not(.total):not(.coupon) td:nth-of-type(1):before {
		content: "Product";
	}
	
	#Cart66CartForm tbody tr:not(.subtotal):not(.shipping):not(.tax-row):not(.total):not(.coupon) td:nth-of-type(2):before {
		content: "Quantity";
	}
	
	#Cart66CartForm tbody tr:not(.subtotal):not(.shipping):not(.tax-row):not(.total):not(.coupon) td:nth-of-type(3):before {
		content: "Item Price";
	}
	
	#Cart66CartForm tbody tr:not(.subtotal):not(.shipping):not(.tax-row):not(.total):not(.coupon) td:nth-of-type(4):before {
		content: "Item Total";
	}
	
}
</style><link rel="alternate" type="application/rss+xml" title="Haute &raquo; Feed" href="<?=base_url()?>feed/feed/index.html" />
<link rel="alternate" type="application/rss+xml" title="Haute &raquo; Comments Feed" href="<?=base_url()?>feed/comments/feed/index.html" />
<link rel="alternate" type="application/rss+xml" title="Haute &raquo; Home Comments Feed" href="<?=base_url()?>feed/home/feed/index.html" />
<link rel='stylesheet' id='jquery-fancybox-css'  href='<?=base_url()?>css/jquery.fancybox-1.3.4039c.css?ver=3.6' type='text/css' media='all' />
<!--<link rel='stylesheet' id='css-merriweather-css'  href='http://fonts.googleapis.com/css?family=Merriweather%3A300%2C400%2C700%2C900&amp;ver=3.6' type='text/css' media='all' />-->
<script type='text/javascript' src='<?=base_url()?>js/jquery3e5a.js?ver=1.10.2'></script>
<script type='text/javascript' src='<?=base_url()?>js/jquery-migrate.min1576.js?ver=1.2.1'></script>
<script type='text/javascript' src='<?=base_url()?>js/jquery-ui.min039c.js?ver=3.6'></script>
<script type='text/javascript' src='<?=base_url()?>js/jquery.easing.1.3039c.js?ver=3.6'></script>
<script type='text/javascript' src='<?=base_url()?>js/jquery.mousewheel-3.0.4.pack039c.js?ver=3.6'></script>
<script type='text/javascript' src='<?=base_url()?>js/jquery.fancybox-1.3.4.pack039c.js?ver=3.6'></script>
<script type='text/javascript' src='<?=base_url()?>js/jquery.mobilemenu039c.js?ver=3.6'></script>
<script type='text/javascript' src='<?=base_url()?>js/jquery.sticky039c.js?ver=3.6'></script>
<script type='text/javascript' src='<?=base_url()?>js/comment-reply.min039c.js?ver=3.6'></script>
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="xmlrpc0db0.php?rsd" />
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="wp-includes/wlwmanifest.xml" /> 
<meta name="generator" content="WordPress 3.6" />
<link rel='canonical' href='index.html' />

<meta name="generator" content="Cart66 Professional 1.5.1.3" />
		
			</head>
	<body class="home page page-id-18 page-template-default button_light content_left">
		<div id="site_wrap">
			<div class="wrapper" id="header">
				<div class="container">
				
										<a href="<?=base_url();?>" title="Home" class="left the_logo">
						<img src="<?=base_url();?>/admin/logo/<?=$settings->logo_dir?>" alt="Deshal" id="logo"   style="width: 150px; height: 90px; display: block; margin-top:-20px;"/>
					</a>
						
					<div id="cart_links">
						<ul>
							<li					 style="display:<?php if(loggedin()) echo 'block';?>">
								<?php 
									if(loggedin())
									{
										echo 'Hello, '.his_data('fname').'!';
										echo ' | '.'<a href="'.base_url().'index.php/account_login/logout">Log Out</a>';
									}
								?>
							</li>
							<li id="notLoggedIn" style="display:<?php if(loggedin()) echo 'none';?>">
								<?//----------------------------------------------------------Login shit----------------------------------------------------------?>
								<a id="login_info">Log In | </a>
								<div id="auth_div">
									
										<table style="height: 100%;width: 100%;border-collapse: collapse;">
											<tbody>
												<tr id="lg_msg">
													<td colspan="4" style="text-align: center;">
														<p>Error message</p>
													</td>
												</tr>
												<tr>
													<td style="border: 1px solid #DFDFDF;border-width: 0 0px 6px 0px;padding-left: 11px;">Username:</td>
													<td><input type="text" name="username" class="login" maxlength="32" style="margin-top: 2px;"></td>
													<td><input type="button" class="login_a log_sub" value="Login" onclick="loginUser()"></td>
												</tr>
												<tr>
													<td style="border: 1px solid #DFDFDF;border-width: 0 0px 6px 0px;padding-left: 11px;padding-top: 10px;">Password:</td>
													<td><input type="password" name="password" class="login" maxlength="32" style="margin-top: 11px;"></td>
													
													<td style="padding: 10px 2px 0 0;">
														with: <a> <img src="<?=base_url();?>img/fb-black.png" style="width: 22px;margin-bottom: -5px; cursor:pointer;"/></a>
													</td>
												</tr>
												
											</tbody>
										</table>
									
								</div>
								
								
								
								<?//----------------------------------------------------------Register shit----------------------------------------------------------?>
								
								<a id="reg_info">Register</a>
								<div id="register_div">
								
									<table style="height: 100%;width: 100%;border-collapse: collapse;">
										<tbody>
											<tr  id="msg" class="error_msg">
												<td colspan="4" style="border-width: 0px;"><p>Error message</p></td>
											</tr>
											<tr>
												<td style="padding-left: 11px;">Name:</td>
												<td>
													<input type="text" name="fname" class="login" maxlength="32" style="width:40%" placeholder="First name">
													<input type="text" name="lname" class="login" maxlength="32" style="width:40%" placeholder="Last name">
												</td>
												
											</tr>
											<tr>
												<td style="">Username:</td>
												<td><input type="text" name="username" class="login" maxlength="32"></td>
											</tr>
											<tr>
												<td style="padding-top: 10px;">Email:</td>
												<td><input type="text" name="email" class="login" maxlength="32"></td>
											</tr>
											<tr>
												<td style="">Password:</td>
												<td><input type="password" name="password" class="login" maxlength="32"></td>
											</tr>
											<tr>
												<td style="padding-top: 10px;">Retype password:</td>
												<td><input type="password" name="repassword" class="login" maxlength="32"></td>
											</tr>
											<tr>
												<td style="padding-top: 10px;">Address</td>
												<td><input type="text" name="address" class="login" maxlength="32" ></td>
											</tr>
											
											<tr>
												<td style="padding-top: 10px;">Contact No.</td>
												<td><input type="text" name="contact" class="login" maxlength="32" ></td>
											</tr>
											
											
											
											
											
											
											<tr>
												<td style="border-width: 0px;"></td>
												<td style="text-align: right;padding-right: 8px;">
													<input id="reg_submit" type="button" class="register_a" value="Register" onclick="reg_info_post()">
													with: <a> <img src="<?=base_url();?>img/fb-black.png" style="width: 22px;margin-bottom: -5px; cursor:pointer;"/></a>
												</td>
											</tr>
										</tbody>
									</table>
								
								
								</div>
									<script>
									
										jQuery('#auth_div input[name=username]').attr("tabindex", 1);
										jQuery('#auth_div input[name=password]').attr("tabindex", 2);
										jQuery('#auth_div .log_sub').attr("tabindex", 3);
										
										
										jQuery('#register_div input[name=password], #register_div input[name=repassword]').keyup(function(){
										
											var pass = jQuery('#register_div input[name=password]').val();
											var repass = jQuery('#register_div input[name=repassword]').val();
											if(repass != pass || pass.length == 0 || repass.length == 0)
											{
												jQuery('#register_div input[name=password]').css('border-color', 'red');
												jQuery('#register_div input[name=repassword]').css('border-color', 'red');
											}
											else if(repass == pass)
											{
												jQuery('#register_div input[name=password]').css('border-color', 'green');
												jQuery('#register_div input[name=repassword]').css('border-color', 'green');
											}
											else
											{
												jQuery('#register_div input[name=password]').css('border-color', '');
												jQuery('#register_div input[name=repassword]').css('border-color', '');
											}
										
										});
										function reg_info_post()
										{
											var fname = jQuery('#register_div input[name=fname]').val();
											var lname = jQuery('#register_div input[name=lname]').val();
											var username = jQuery('#register_div input[name=username]').val();
											var email = jQuery('#register_div input[name=email]').val();
											var password = jQuery('#register_div input[name=password]').val();
											var repass   = jQuery('#register_div input[name=repassword]').val();
											var address  = jQuery('#register_div input[name=address]').val();
											var contact  = jQuery('#register_div input[name=contact]').val();
											
											
											if(repass == password)
											{
												if(fname.trim()=="" && username.trim()=="" && password.trim()=="" && address.trim()=="" && contact.trim()=="" )
												{
													jQuery('#msg p').text('Some fields are empty!');
													jQuery('#msg').fadeIn("slow").delay(2000).fadeOut();
													return;
												}
												console.log('comes-1');
												
												jQuery.ajax({
													url: "<?php echo base_url();?>index.php/account_login/register",
													type: 'POST',
													data: {
															'fname'	   : fname,
															'lname'	   : lname,
															'email'	   : email,
															'username' : username,
															'password' : password, 
															'repass'   : repass, 
															'contact'  : contact,
															'address'  : address
														  },

													success: function(response, status, xhr)
													{
														//console.log('comes-2');
														response = jQuery.parseJSON(response);
														console.log(response);
														// console.log(response.status);
														// console.log(response.data['username']);
														if(response.was == 1)
														{
															jQuery('#msg p').text('Successfully added!');
															jQuery('#msg p').css('color', 'green');
															jQuery('#msg').fadeIn("slow").delay(2000).fadeOut();
														}
														else if(response.was == 2)
														{
															jQuery('#msg p').text('Choose a different USERNAME!');
															jQuery('#msg p').css('color', 'red');
															jQuery('#msg').fadeIn("slow").delay(2000).fadeOut();
														}
														else if(response.was == 3)
														{
															jQuery('#msg p').text('Failed! Try again..');
															jQuery('#msg p').css('color', 'red');
															jQuery('#msg').fadeIn("slow").delay(2000).fadeOut();
														}
														
													},      
													error: function (xhr, ajaxOptions, thrownError)
													{
														jQuery('#msg p').text('Network error! Try again.');
															jQuery('#msg p').css('color', 'red');
														jQuery('#msg').fadeIn("slow").delay(2000).fadeOut();
													}
												});
											}
											else
											{
												jQuery('#msg p').text('PASSWORDs does not match!');
												jQuery('#msg').fadeIn("slow").delay(2000).fadeOut();
											}
										}
										
										function loginUser()
										{
											// jQuery('#lg_msg p').text('Please wait..');
											// jQuery('#lg_msg p').css('color', 'black');
											// jQuery('#lg_msg').fadeIn("slow").delay(10).fadeOut();
											
											var username = jQuery('#auth_div input[name=username]').val();
											var password = jQuery('#auth_div input[name=password]').val();
											
										jQuery.ajax({
													url: "<?php echo base_url();?>index.php/account_login/login",
													type: 'POST',
													data: {
															'username' : username,
															'password' : password
														  },

													success: function(response, status, xhr)
													{
														//response = jQuery.parseJSON(response);
														//console.log(response);
														
														if(response == 1)
														{
															jQuery('#lg_msg p').text('Login successful!');
															jQuery('#lg_msg p').css('color', 'green');
															jQuery('#lg_msg').fadeIn("slow").delay(200).fadeOut(function(){
																window.location.assign(location.href);
															});
															
														}
														else if(response == 0)
														{
															jQuery('#lg_msg p').text('Username or password does not match.');
															jQuery('#lg_msg p').css('color', 'red');
															jQuery('#lg_msg').fadeIn("slow").delay(2000).fadeOut();
														}
														
														
													},      
													error: function (xhr, ajaxOptions, thrownError)
													{
														jQuery('#lg_msg p').text('Network error! Try again.');
														jQuery('#lg_msg p').css('color', 'red');
														jQuery('#lg_msg').fadeIn("slow").delay(2000).fadeOut();
													}
												});	
										}
										
									</script>
								
								
							</li>
							
							
							
							
							
							
							
							<?
							/* 
							<li id="LoggedIn">
								Hello, <?php echo 'user'.'! | ';?> <a href="" title="Log In">Log Out</a>
							</li>
							
							<li><a href="<?=base_url();?>index.php/admin/dashboard" title="Log In">Log In</a></li>
							<li><a href="store/cart/index.html" title="cart" id="head_cart">Your Cart(<span id="header_cart_count">0</span>)</a></li>
							*/
							?>
						</ul>
					</div>
					
					<div class="clear"></div>
				</div>
			</div>
			<div class="wrapper" id="main_menu" style="">
<div class="container">
<div id="menu_wrap">
<div class="menu-header-container">
	
	
		
		<?php
		
		
			$obj = new category();
			//$category = $obj->menu_categories();
			$obj->dynaCat();//Thats right!
			//$obj->dynaCatAdd();//Thats right!
			
		
		
		/*
		foreach($category as $categorylist)
		{
			echo "<li><a>".$categorylist['name']."</a> ";
			echo '<ul>';
			echo '<li><input class="newCatInput" type="text"/></li>';//-------
			foreach($categorylist['data'] as $subcat)
			{
				
				echo '<li><a href="'.base_url().'index.php/home/temp_grid/'.$subcat['id'].'">'.$subcat['name'].'</a>';
				echo '<ul class="sub-menu">';
				echo '<li><input class="newCatInput mother-" type="text"/></li>';//-------
				foreach($subcat['data'] as $originals)
				{
					echo '<li><a href="'.base_url().'index.php/home/temp_grid/'.$originals['id'].'">'.$originals['name'].'</a></li>';
				}
				echo '</ul>';
				echo "</li>";
				
			}
			
			echo "</ul>";
			echo "</li>";
		}*/
		
	?>
	
	
	</div>
</div>



<?php
/*
<div id="search_wrap">
<div id="search_link"></div>
<form method="get" id="searchform" action="">
<div>
<input type="text" class="search_input" value="To search, type and hit enter" name="s" id="s" onfocus="if (this.value == 'To search, type and hit enter') {this.value = '';}" onblur="if (this.value == '') {this.value = 'To search, type and hit enter';}" />
<input type="hidden" id="searchsubmit" value="Search" />
<input type="hidden" name="post_type" value="products" />
</div>
</form>
</div>
*/
?>
<div class="clear"></div>
				</div>
			</div>
