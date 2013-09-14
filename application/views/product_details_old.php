<div id="content">
  <div class="top">
    <div class="left"></div>
    <div class="right"></div>
	
    <div class="center">
	<?php if(isset($details)){?>
      <h1><?=$details['name'];?><?php if($tag == "")
				echo "";
				else
				echo '  ('.$tag.')';?></h1>
    </div>
  </div>
  <div class="middle">
    <div style="width: 100%; margin-bottom: 10px;">
      <table style="width: 100%; border-collapse: collapse;">
        <tr>
          <td style="text-align: left; width: 500px; vertical-align: top;">
          <div id="image_wrap" style="width: 390px;border-right: 1px solid #DDDDDD;">
          <a href="<?=base_url();?>itemimages/<?=$details['mainImageUrl'];?>" title="<?=$details['name'];?>" rel="prettyPhoto[gallery]"><img src="<?=base_url();?>itemimages/<?=$details['mainImageUrl'];?>" title="<?=$details['name'];?>" alt="<?=$details['name'];?>" id="image" style="margin-bottom: 3px; width: 239px;" /></a><br />
            

		</div>       
            </td>
          <td style="width: 350px; vertical-align: top; padding: 35px 0 0 30px;">
          
          
                                           <span class="price_big">৳<?=$details['price'];?></span>
                                
                        
          <table id="prod_list">
             
              <tr>
                <td>Availability:</td>
                <td><?=$details['amount'];?></td>
              </tr>
              <tr>
                <td>Model:</td>
                <td>3pcs-007</td>
              </tr>
                            			  <tr>
                <td>Average Rating:</td>
                <td>                  Not Rated                  </td>
              </tr>
			              </table>
           
           
           <div id="small_images">
          <!-- <p class="small_images_p"><strong>Additional Images  (0)</strong></p>
            <div style="background: #F7F7F7; border: 1px solid #DDDDDD; padding: 10px; margin-bottom: 10px;">There are no additional images for this product.</div>
          </div> -->
           
            
                       <!-- <form action="#" method="post" enctype="multipart/form-data" id="product">-->
                                                                      <div class="content cart_button_holder">
              <span class="qty">
                Qty:                <input type="text" name="quantity" size="3" value="1" style="padding:5px 2px; font-size:18px; font-weight:bold;" />
                </span>
                <a id="add_to_cart">Add to Cart</a> <!--onclick="$('#product').submit();"-->
                              </div>
              <div>
                <input type="hidden" name="product_id" value="63" />
                <input type="hidden" name="redirect" value="" />                
              </div>
            <!-- </form>-->
                        
                		<br />			            
            </td>
        </tr>
      </table>
    </div>
    
        <div id="tab_review" class="tab_page divider_top">
     <h2 class="review_title">Reviews (0)</h2>      <div id="review" class="clear"></div>
      
      <a id="trig" class="button" rel="#write" style="background: #DDD">Write Review</a>
      
      <div id="write">
      <div class="heading" id="review_title">Write Review</div>
      <div class="content"><b>Your Name:</b><br />
        <input type="text" name="name" value="" />
        <br />
        <br />
        <b>Your Review:</b>
        <textarea name="text" style="width: 98%;" rows="8"></textarea>
        <span style="font-size: 11px;"><span style="color: #FF0000;">Note:</span> HTML is not translated!</span><br />
        <br />
        <b>Rating:</b> <span>Bad</span>&nbsp;
        <input type="radio" name="rating" value="1" style="margin: 0;" />
        &nbsp;
        <input type="radio" name="rating" value="2" style="margin: 0;" />
        &nbsp;
        <input type="radio" name="rating" value="3" style="margin: 0;" />
        &nbsp;
        <input type="radio" name="rating" value="4" style="margin: 0;" />
        &nbsp;
        <input type="radio" name="rating" value="5" style="margin: 0;" />
        &nbsp; <span>Good</span><br />
        <br />
        <b>Enter the code in the box below:</b><br />
        <input type="text" name="captcha" value="" autocomplete="off" />
        <br />
        <img src="<?=base_url();?>indexffc1.jpg?route=product/product/captcha" id="captcha" /></div>
      <div class="buttons">
        <table>
          <tr>
            <td align="right"><a onclick="review();" class="button"><span>Continue</span></a></td>
          </tr>
        </table>
      </div>
      </div>
    
    
    </div>
     
    
    <div id="tab_description" class="tab_page divider_top">
    <h2 class="description_title">Description</h2>
    <div class="clear">  
    <p>
	<span class="Apple-style-span" style="font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; line-height: 18px; color: rgb(0, 0, 0); ">Parts:
	<?php if($parts == "")
				echo "n/a";
				else
				echo $parts;?>
	</span></p>
<div style="font-size: 12px; background-color: rgb(255, 255, 255); ">
	<div style="font-size: 12px; background-color: rgb(255, 255, 255); ">
		<p style="font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; color: rgb(102, 102, 102); margin-bottom: 15px; line-height: 18px; ">
			<span class="Apple-style-span" style="color: rgb(0, 0, 0); font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; ">
			Artist: <?php if($artist == "")
				echo "n/a";
				else
				echo $artist;?>
				</span></p>
		<p style="font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; color: rgb(102, 102, 102); margin-bottom: 15px; line-height: 18px; ">
			<span class="Apple-style-span" style="color: rgb(0, 0, 0); font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; ">
			Fabric: 
			<?php if($ingredient == "")
				echo "n/a";
				else
				echo $ingredient;?></span></p>
		<p style="font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; color: rgb(102, 102, 102); margin-bottom: 15px; line-height: 18px; ">
		</p>
		<p style="font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; color: rgb(102, 102, 102); margin-bottom: 15px; line-height: 18px; ">
			<span class="Apple-style-span" style="color: rgb(0, 0, 0); font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; ">
			Colour:
			<?php if($color == "")
				echo "n/a";
				else
				echo $color;?>
			</span></p>
		<p style="font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; color: rgb(102, 102, 102); margin-bottom: 15px; line-height: 18px; ">
			<span class="Apple-style-span" style="color: rgb(0, 0, 0); font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; ">
			Size Available: 
			<?php if($size == "")
				echo "n/a";
				else
				echo $size;?>
			</span></p>
	</div>
</div>
    </div>
    </div>
    <?} else{?>
		<div class="middle">
    	    <div class="content">There are no products to list with this Prodoct ID.</div>
              </div><?}?>
<div class="clear"></div>   
    <div id="tab_related" class="tab_page up divider_top">
    <h2 class="related_title">Related Products (5)</h2>
      <div class="clear">
		
	<table class="list">
		<tr>
			
			<?php
			foreach ($products->result() as $prod)
			{?>
				<td style="width: 25%;">
					<a href="<?=base_url();?>index.php/product_details_clt/product/<?=$prod->id?>" style="text-decoration: none; color: #666">
					<div class="new" style="">
						<!--<p class="pname"><a href="<?=base_url();?>index.php/product_details_clt/product/<?=$prod->id?>"><?=$prod->name?></a></p>-->
						<p class="pname"><?=$prod->name?></p>
						<div class="pprice"><p style="">৳<?=$prod->price?></p><span style="text-align:left;">CODE: <?=$prod->code?></span></div>
						<img src="<?=base_url();?>itemimages/<?=$prod->mainImageUrl?>" />
					</div>
					</a>
				</td>
			<?}?>
      
		</tr>
      </table>
          </div>
  </div>
  </div>
  <div class="bottom">
    <div class="left"></div>
    <div class="right"></div>
    <div class="center"></div>
  </div>
  </div>