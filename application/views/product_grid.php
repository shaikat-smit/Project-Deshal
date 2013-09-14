
			<div class="wrapper" id="content"> <!-- #content ends in footer.php -->
				<div class="container"style="padding: 40px 0 80px 0;">
		
		
		 
		<h2 id="latest_products_title" style="margin-bottom: 20px;margin-top: 35px;"><?=$categoryName;?></h2>
		
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
								<a href="<?=base_url();?>index.php/product_details_clt/product/<?=$prod->id?>" title="<?=$prod->name?>" class="single_product_image_link">
									<img width="560" height="560" src="<?=base_url();?>itemimages/<?=$prod->mainImageUrl?>" class="attachment-product_med wp-post-image" alt="" />
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
		<a href="" title="(in future)">
			More &rarr;
		</a>
	</div>
		
					<div class="clear"></div>
				</div><!-- end div.container, begins in header.php -->
			</div><!-- end div.wrapper, begins in header.php -->
		</div><!-- end div#site_wrap, begins in header.php -->
		
