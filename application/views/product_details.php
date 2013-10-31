<script type='text/javascript' src='<?=base_url();?>/js/fancybox/jquery.fancybox-1.3.4.pack039c.js?ver=3.6'></script>
<script type='text/javascript' src='<?=base_url();?>/js/jquery.mobilemenu039c.js?ver=3.6'></script>
<script type='text/javascript' src='<?=base_url();?>/js/jquery.sticky039c.js?ver=3.6'></script>
<div class="wrapper" id="content"> <!-- #content ends in footer.php -->
<div class="container">
		<div id="single_product_page">
			<div class="post-40 products type-products status-publish hentry">
				<h2 class="post_title">
				<?=$details->title?>			</h2>
				<div id="product_images" >
					<a id="main_product_image" href="<?=base_url();?>/itemimages/<?=$details->main_image?>" class="lightbox">
						<span class="preview"></span>
						<img src="<?=base_url();?>/itemimages/<?=$details->main_image?>" class="attachment-product_main wp-post-image" alt="" />
					</a>
					<div id="product_thumbs">
					<?php if(count($subimages)!=0){
					foreach($subimages->result() as $row){
					?>
						<a href="<?=base_url();?>/itemsubimages/<?php echo $row->image_dir?>" class="lightbox">
							<span class="preview"></span>
							<img width="160" height="160" src="<?=base_url();?>/itemsubimages/<?php echo $row->image_dir?>" class="attachment-product_mini_gallery" alt="060" />				
						</a>
					<?}
					}?>
						<div class="clear"></div>
					</div>
					<div class="single-product-meta">
						<span>Product Categories: 
						<?php if(isset($proincate))
						{
							$last = end($proincate);
							foreach($proincate as $row)
							{?>
								<a href="<?=base_url();?>index.php/home/temp_grid/<?=$row->id?>" rel="tag"><?=$row->name?></a>
								<?=(($last == $row)?"":",")?>
					<?
							}
						}
					?>
						
						<span>
						<?php if(isset($tags))
						{ //vaj($tags);exit;
							echo'Tags: ';
							$last = end($tags);
							foreach($tags as $row)
							{?>
								<a href="<?=base_url();?>index.php/home/temp_grid/<?=$row->id?>/?is_a_tag=true" rel="tag"><?=$row->tag_name?></a>
								<?=(($last == $row)?"":",")?>
					<?
							}
						}
					?>
						
						
					</div>
				</div><!-- end #product_images -->
				<?php if($details->archive == 1)
				{?>
				<div id="archiveAndCartDv">
					<div id="archivedDv">
						<img id="archvBnnrImg" src="<?=base_url();?>/img/archived-banner.png" />
						<p>
							<?php echo $details->archived_desc?>
						</p>
					</div>
					
				<?
					}
				?>
				<?php if($details->int_available != 0){?>
					<form id='cartButtonForm_1' class="Cart66CartButton" method="post" action="" >
							<input type='hidden' name='task' id="task_1" value='addToCart' />
							<input type='hidden' name='cart66ItemId' value='1' />
							<input type='hidden' name='product_url' value='index.html' />
							<span class="Cart66Price Cart66PriceBlock">
								<span class="Cart66PriceLabel">Price: </span>
								<span class="Cart66CurrencySymbol Cart66CurrencySymbolbefore">৳</span>&nbsp;<span class="Cart66PreDecimal"><?=$details->price?></span>
								<span class="Cart66CurrencySymbol Cart66CurrencySymbolAfter"></span>
							</span>
							<span class="Cart66UserQuantity">
								<label for="Cart66UserQuantityInput_1">Quantity: </label>
								<input id="quantity" name="item_quantity" value="1" size="4"/>
							</span>
									<select name="options_1" id="options_color" class="cart66Options options_1">
									<option value="">Color</option>	
										<?php foreach($color->result() as $row)
										{?>
											<option value="<?=$row->id?>"><?=$row->color?></option>	
										<?}?>
									</select>
															
							
									<select name="options_2" id="options_size" class="cart66Options options_1">
									<option value="">Size</option>	
										<?php foreach($size->result() as $row)
										{?>
											<option value="<?=$row->id?>"><?=$row->size?></option>	
										<?}?>								
									</select>
															
							
							
							<input type='submit' value='Add to Cart' class='Cart66ButtonPrimary purAddToCart ajax-button' name='addToCart_1' id='addToCart_1' onclick="alert('Sorry! This option is not available..')" />
							<div id="stock_message_box_1" class="alert-message alert-error" style="display: none;">
							<label>We are Sorry</label>
							<p id="stock_message_1"></p>
							<input type="button" name="close" value="OK" id="close" class="Cart66ButtonSecondary modalClose" />
						</div> 
					</form>
					<?php } ?>
				</div>
				<div id="product_info" class="entry-content" style="">
					<h2>Product information</h2>
					<style>
						 .pAttrb
						 {
							margin: 5px 5px;
						 }
					</style>
					
					<!--<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida, orci magna rhoncus neque, id pulvinar odio lorem non turpis. Nullam sit amet enim. Suspendisse id velit vitae ligula volutpat condimentum. Aliquam erat volutpat. Sed quis velit. Nulla facilisi. Nulla libero. Vivamus pharetra posuere sapien. Nam consectetuer. Sed aliquam, nunc eget euismod ullamcorper, lectus nunc ullamcorper orci, fermentum bibendum enim nibh eget ipsum. Donec porttitor ligula eu dolor. Maecenas vitae nulla consequat libero cursus venenatis. Nam magna enim, accumsan eu, blandit sed, blandit a, eros.</p>-->
					<p>
					<?php if($details->archive == 1)
					{ 
						if(isset($fields))
						{
						foreach($fields->result() as $row)
						{?>
							<div class="pAttrb"><b><?=$row->field_name?> : </b><?=$row->field_value?></div>
						<?}}
					}
					else
					{?>
						<div class="pAttrb"><?=$details->archived_desc?></div>
					<?}?>
					</p>
				</div><!-- end #product_info -->
				<div class="clear"></div>
				<!-------------------------------------------------------->
				<script type="text/javascript">
					jQuery( "#options_color" ).change(function() {
						
					});
				</script>
				
				
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
			 <h2  class="review_title">Reviews(0)</h2>  
		</td>
	 </tr>
	 <tr>
		<td>
			<a id="trig" class="button" rel="#write" style="background: #DDD" onclick="toggle_visibilityR('review')">Show reviews</a>
	
					<div id="review" style="display:none;" >
				<hr style="margin-top:10px;">
				
									<table style="" class="oldRvws"><tr><td>No reviews yet..</td></tr></table>
									
				
					
				<a id="wTrig" class="button" rel="#write" style="background: #DDD" onclick="toggle_visibility('wRvw')">Write review</a>
			  
				<div  id="wRvw" style="display:none; font-family: Trebuchet MS, Arial, Helvetica, sans-serif;margin-top: 15px;">
					<form name="reviewForm" action="#" method="POST">
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
										<input type="hidden" value="39" id="p_id" name="p_id">
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
						</form>				</div>
				 
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
	
	// Fancybox
	jQuery(".lightbox").fancybox({
		'transitionIn'		: 'fade',
		'transitionOut'		: 'fade',
		'showNavArrows' 	: 'true'
	});
	
	jQuery(".lightbox").attr('rel', 'gallery').fancybox();
	
	if(!$.browser.msie){
		// Animates new products widget on hover
		$("#recent_products").delegate("a", "mouseover mouseout", function(e) {
			if (e.type == 'mouseover') {
				jQuery("#recent_products a").not(this).dequeue().animate({opacity: "0.5"}, 300);
			} else {
				jQuery("#recent_products a").not(this).dequeue().animate({opacity: "1"}, 300);
			}
		});
	};
	
	// Add divs and classes
	jQuery('<div class="clear"></div>').insertAfter('.Cart66ButtonPrimary, #Cart66AccountLogin');
	jQuery('.Cart66UpdateTotalButton').parent().addClass('update_total_td');
	jQuery('#couponCode').parent().addClass('add_coupon_td');
		
	// sticky header
		if ( jQuery(window).width() > 1024) {
		jQuery("#main_menu").sticky({topSpacing:30});
	}
</script>
			<div class="clear"></div>
		</div><!-- end #single_product_page -->
	<div class="clear"></div>
	</div><!-- end div.container, begins in header.php -->
</div><!-- end div.wrapper, begins in header.php -->

</div><!-- end div#site_wrap, begins in header.php -->