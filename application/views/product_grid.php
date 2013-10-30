
			<div class="wrapper" id="content"> <!-- #content ends in footer.php -->
				<div class="container"style="padding: 40px 0 80px 0;">
		
		
		 
		<h2 id="latest_products_title" style="margin-bottom: 20px;margin-top: 35px;">
		<?php if(isset($categoryName))echo $categoryName;
				else if(isset($tagName))echo $tagName;
		?></h2>
		
	<div id="products_grid">
	
				
		
		<?
			if(isset($products))
			{
				if(count($products->result_array()) > 0)
				{
					foreach ($products->result() as $prod)
					{?>
					
						<div class="single_grid_product">	
							<div class="product_med_wrap">
								<div class="product_meta">৳<?=$prod->price?></div>
								<a href="<?=base_url();?>index.php/product_details/details/<?=$prod->id?>" title="<?=$prod->title?>" class="single_product_image_link">
									<img width="<?=$settings->gridimg_width;?>" height="<?=$settings->gridimg_height;?>" src="<?=base_url();?>itemimages/<?=$prod->main_image?>" class="attachment-product_med wp-post-image" alt="" />
								</a>
							</div>
						</div>
					<?
					}
				}
				else
					echo '<h3 style="text-align: center;">No product is available for this category..</h3>';
			}
			
			?>

		<div class="clear"></div>
	</div>
	
			
	<div id="all_products_call">
		<!--<a href="" title="(in future)">More &rarr;</a>-->
		<?php
			$t = '';
			if(isset($is_tag) && $is_tag==true)
				$tg= 'is_a_tag&';
		?>
		
		<a href="<?if($prev_page != 'none'){ echo base_url().'index.php/home/temp_grid/'.$curnt_cat_id.'?'.$tg.'offset='.($offset-$per_page);}?>" style="<?if($prev_page == 'none') echo 'display: none;';?>" >&larr; Previous</a>
		<a href="<?if($next_page != 'none'){ echo base_url().'index.php/home/temp_grid/'.$curnt_cat_id.'?'.$tg.'offset='.($offset+$per_page);}?>" style="<?if($next_page == 'none') echo 'display: none;';?>">Next &rarr;</a>
	</div>
		
					<div class="clear"></div>
				</div><!-- end div.container, begins in header.php -->
			</div><!-- end div.wrapper, begins in header.php -->
		</div><!-- end div#site_wrap, begins in header.php -->
		
