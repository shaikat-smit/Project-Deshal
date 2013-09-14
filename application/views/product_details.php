<div class="wrapper" id="content"> <!-- #content ends in footer.php -->
	<div class="container">
		<div id="single_product_page">
			<div class="post-46 products type-products status-publish hentry">
				<h2 class="post_title">
				<?=$details['name'];?><?php if($tag == "")
					echo "";
					else
					echo '  ('.$tag.')';?>
				</h2>
				<div id="product_images">
					<a id="main_product_image" class="lightboxNOOOO">
						<!--<span class="preview"></span>-->
						<img width="460" height="372" src="<?=base_url();?>itemimages/<?=$details['mainImageUrl'];?>" class="attachment-product_main wp-post-image" alt="" />
					</a>

					<!--<div class="single-product-meta">
						<span>Product Categories: <a href="../../types/shirts-women/index.html" rel="tag">Shirts</a>, <a href="../../types/women/index.html" rel="tag">Women</a></span>
					</div>-->
				</div><!-- end #product_images -->
				<form id='cartButtonForm_1' class="Cart66CartButton" method="post" action="" >
						<input type='hidden' name='task' id="task_1" value='addToCart' />
						<input type='hidden' name='cart66ItemId' value='1' />
						<input type='hidden' name='product_url' value='index.html' />
						<span class="Cart66Price Cart66PriceBlock">
							<span class="Cart66PriceLabel">Price: </span>
							<span class="Cart66CurrencySymbol Cart66CurrencySymbolbefore">৳</span><span class="Cart66PreDecimal"><?=$details['price'];?></span>
							<span class="Cart66CurrencySymbol Cart66CurrencySymbolAfter"></span>
						</span>
						<span class="Cart66UserQuantity">
							<label for="Cart66UserQuantityInput_1">Quantity: </label>
							<input id="Cart66UserQuantityInput_1" name="item_quantity" value="1" size="4"/>
						</span>
						<?php 	if(isset($size))
								{
									$sizes = explode(',', $size);
								?>
									<select name="options_1" id="options_1" class="cart66Options options_1">
								<?
									for($i=0; $i<count($sizes);$i++)
									{
										if(trim($sizes[$i]) != "")
											echo '<option value="'.$sizes[$i].'">'.$sizes[$i].'</option>';
										else
											echo '<option value="">n/a</option>';
									}
								?>
									</select>
								<?
								}
						?>
						
						
						
						<?php 	if(isset($color))
								{
									$colors = explode(',', $color);
								?>
									<select name="options_2" id="options_2" class="cart66Options options_1">
								<?
									for($i=0; $i<count($colors);$i++)
									{
										if(trim($colors[$i]) != "")
											echo '<option value="'.$colors[$i].'">'.$colors[$i].'</option>';
										else
											echo '<option value="">n/a</option>';
									}
								?>
									</select>
								<?
								}
						?>
						
						
						
						<input type='submit' value='Add to Cart' class='Cart66ButtonPrimary purAddToCart ajax-button' name='addToCart_1' id='addToCart_1' onclick="alert('Sorry! This option is not available..')" />
						<div id="stock_message_box_1" class="alert-message alert-error" style="display: none;">
						<label>We are Sorry</label>
						<p id="stock_message_1"></p>
						<input type="button" name="close" value="OK" id="close" class="Cart66ButtonSecondary modalClose" />
					</div> 
					</form>
				
				<div id="product_info" class="entry-content" style="border-top: 1px solid #ddd;">
				
					<h2>Product information</h2>
					<style>
						 .pAttrb
						 {
							margin: 5px 5px;
						 }
					</style>
					
					<!--<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida, orci magna rhoncus neque, id pulvinar odio lorem non turpis. Nullam sit amet enim. Suspendisse id velit vitae ligula volutpat condimentum. Aliquam erat volutpat. Sed quis velit. Nulla facilisi. Nulla libero. Vivamus pharetra posuere sapien. Nam consectetuer. Sed aliquam, nunc eget euismod ullamcorper, lectus nunc ullamcorper orci, fermentum bibendum enim nibh eget ipsum. Donec porttitor ligula eu dolor. Maecenas vitae nulla consequat libero cursus venenatis. Nam magna enim, accumsan eu, blandit sed, blandit a, eros.</p>-->
					<p>
						<div class="pAttrb"><b>Artist: </b><?php if($artist == "")echo "n/a";else echo $artist;?></div>
						<div class="pAttrb"><b>Fabric: </b><?php if($ingredient == "")echo "n/a";else echo $ingredient;?></div>
						<div class="pAttrb"><b>Colors: </b><?php if($color == "")echo "n/a";else echo $color;?></div>
						<div class="pAttrb"><b>Sizes: </b><?php if($size == "")echo "n/a";else echo $size;?></div>
					</p>
				</div><!-- end #product_info -->
				<div class="clear"></div>
				<!-------------------------------------------------------->
				
				
				<style>
				.oldRvws
				{
					margin:20px; border-bottom: 1px solid grey;
				}
				.oldRvws tr td:first-child
				{
					vertical-align: top;
				}
				
				</style>
     <div id="tab_review" class="tab_page divider_top" > 
	 <table>
	 <tr>
		<td>
			 <h2  class="review_title">Reviews(<?echo count($countRvw);?>)</h2>  
		</td>
	 </tr>
	 <tr>
		<td>
			<a id="trig" class="button" rel="#write" style="background: #DDD" onclick="toggle_visibilityR('review')">Show reviews</a>
	
		<?//print_r($join->num_rows());exit;?>
			<div id="review" style="display:none;" >
				<hr style="margin-top:10px;">
				
				<?
				if(count($countRvw)!= 0)
				{
					foreach($getreview->result() as $row)
					{
					?><table style="" class="oldRvws">
						<tr>
							<td style="width: 110px;">User Name :</td>
							<td><?=$row->user_Name;?></td>
						</tr>
						<tr>
							<td>email :</td>
							<td><?=$row->email;?></td>
						</tr>
						<tr>
							<td>Review :</td>
							<td><?=$row->review;?></td>
						</tr>
						
					
						</table>
						
							
					<?
					}
					
				}
				else if(count($countRvw)== 0)
				{
					?>
					<table style="" class="oldRvws"><tr><td>No reviews yet..</td></tr></table>
					<?
				}
				
				
				?>
				
				
					
				<a id="wTrig" class="button" rel="#write" style="background: #DDD" onclick="toggle_visibility('wRvw')">Write review</a>
			  
				<div  id="wRvw" style="display:none; font-family: Trebuchet MS, Arial, Helvetica, sans-serif;margin-top: 15px;">
					<form name="reviewForm" action="<?=base_url();?>index.php/product_details_clt/insert_review" method="POST">
							<table>
								<tr>
									<td>User Name :</td>
									<td><input id="nameText" type="text" name="user_Name" /></td>
								</tr>
								
								<tr>
									<td>Email :</td>
									<td><input id="emailText" type="text" name="email"/></td>
									
								</tr>
								<tr>
									<td>Review :</td>
									<td><textarea id="reviewText" name="review" rows="5" cols="50" style="margin-right: -129px;"></textarea></td>
								</tr>
								
								<tr>
									
									<td >
										
										<input type="hidden" value="0" id="rate" name="rate">
										<input type="hidden" value="<?=$details['id'];?>" id="p_id" name="p_id">
									</td>
								</tr>
								
						
							</table>
							<div class="buttons">
								<table>
								  <tr>
								  <td></td>
									<td align="right"><input type="button" onclick="submitReviewForm()" name="Submit" value="Submit" 
									style=" font-size: 13px;font-weight: bold;font-weight: bold;margin-right: 5px;text-decoration: none;"/></td>
									<!--<td align="right"><a class="button" ><span>Continue</span></a></td>-->
								  </tr>
								</table>
								
							</div>
						<?=form_close();?>
				</div>
				 
			 </div>
			  
		</td>
	 </tr>
	 </table>
	 
	<!-------------------------------------------------------->
			
			
			
			</div><!-- end .post_class -->

<script type="text/javascript">
        function submitReviewForm()
{
		var f = 1;
		var email = document.getElementById("emailText").value;
		var name = document.getElementById("nameText").value;
		var review = document.getElementById("reviewText").value;
		if (email==null || email=="" || name==null || name=="" || review==null || review=="" )
		{
			  alert("All fields must be filled out");
			  f = 0;
		}
		else if(!validateEmail())
		{
			alert("Please give a valid email address");
			f = 0;
		}
		else
		{
			document.reviewForm.submit();
		}
		
		//document.reviewForm.submit();
}
function validateEmail()
{
var x = document.getElementById("emailText").value;
	var atpos=x.indexOf("@");
var dotpos=x.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
  {
	return false;
  }
  else
  {
	return true;
  }
}

	function toggle_visibility(wRvw)
	{	
		var e = document.getElementById(wRvw);
		 if(e.style.display == 'none')
          {
			e.style.display = 'block';
			document.getElementById('wTrig').innerHTML = "Close";
		  }
       else
          {
			e.style.display = 'none';
			document.getElementById('wTrig').innerHTML = "Write review";
		  }
	}
	function toggle_visibilityR(review)
	{
		//alert('ok');
		var e = document.getElementById(review);
		 if(e.style.display == 'none')
          {
			e.style.display = 'block';
			document.getElementById('trig').innerHTML = "Hide reviews";
		  }
       else
          {
			e.style.display = 'none';
			document.getElementById('trig').innerHTML = "Show reviews";
		  }
	}
	
</script>
			<div class="clear"></div>
		</div><!-- end #single_product_page -->
	<div class="clear"></div>
	</div><!-- end div.container, begins in header.php -->
</div><!-- end div.wrapper, begins in header.php -->
</div><!-- end div#site_wrap, begins in header.php -->