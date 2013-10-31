	<!--this file includes the aviaslider: -->
	<script type='text/javascript' src='<?=base_url()?>slider/js/jquery.aviaSlider.js'></script>
	
	<!--this file includes the activation call for the avia slider. You should edit here: -->
	<script type='text/javascript'>
	jQuery(document).ready(function(){
						
// here you can see the slide options I used in the demo page. depending on the id of the slider a different setup gets activated
jQuery('#frontpage-slider').aviaSlider({	blockSize: {height: 80, width:80},
transition: 'slide',
pauseTime: 500,
display: 'all',
transitionOrder: ['diagonaltop', 'diagonalbottom','topleft', 'bottomright', 'random']
});

																								
});

	</script>
<style>
.aviaslider{ 
height:1480px; 	/*this changes the height of the image slider*/
width:auto;
overflow: hidden;
position: relative;
background: #fff url(<?=base_url()?>slider/images/layout/preload.gif) center center no-repeat;
}

.aviaslider li, .aviaslider .featured{
display: block;
width:100%;
height:100%;
position: absolute;
top:0;
left:0;
z-index: 1;
}

.js_active .aviaslider li, .js_active .aviaslider .featured{
display:none;
}

.aviaslider img, .aviaslider a img, .aviaslider a{
border:none;
text-decoration: none;
}

.feature_excerpt{
width:auto;
position: absolute;
display: block;
bottom: 0;
left:0;
z-index: 2;
padding:14px 15px;
font-size: 11.5px;
line-height:1.5em;
cursor: pointer;
background: #000;
color: #fff;
}

.feature_excerpt strong{
display: block;
font-size: 15px;
padding-bottom: 3px;
}



</style>
	
	
			<div class="wrapper" id="content"> <!-- #content ends in footer.php -->
				<div class="container">
<div class="wrapper" id="featured_wrap" style="width: 100%;">
					
									
<div class="single_featured featured_first">
	<div class="featured_content">
		
		<!--<div class="featured_image_wrap">
			
						<img width="1480" height="720" src="<?=base_url()?>img/banner/bigtile.jpg" class="jewel attachment-featured_large wp-post-image " alt="" />						
						<div class="featured_desc">
				
								<p>Just a little bit of information. This is optional. This slide does not have a link.</p>
								
						</div>
						
		</div>-->
		<div class="featured_image_wrap">
		<ul class="aviaslider" id="frontpage-slider">
					<?php foreach($banner->result() as $row){?>
					<li><a class="lightbox" href="<?=base_url()?>slider/images/slides/<?=$row->main_image_dir?>" title="" ><img src="<?=base_url()?>slider/images/slides/<?=$row->main_image_dir?>" alt="A heading of your choice 1:: This is the image description defined in your alt tag" /></a></li>
				<?}?>
		</ul>
		<div class="featured_desc">
				
								<p>Just a little bit of information. This is optional. This slide does not have a link.</p>
								
		</div>
		</div>
		<div class="clear"></div>
	</div>
</div>			
						
					
									
<div class="single_featured featured_second">
	<div class="featured_content">
		
		<div class="featured_image_wrap">
			
						<img width="740" height="350" src="<?=base_url()?>img/banner/smalltile2.jpg" class="attachment-featured_small wp-post-image jewel" alt="Tile 2" />						
						
		</div>

		<div class="clear"></div>
	</div>
</div>			
						
					
									
<div class="single_featured featured_second">
	<div class="featured_content">
		
		<div class="featured_image_wrap">
			
			<a href="" title="">
				<img width="740" height="350" src="<?=base_url()?>img/banner/smalltile1.jpg" class="attachment-featured_small wp-post-image jewel" alt="" />
			</a>

			<div class="featured_desc">
				<p>
					<a href="" title="" class="jewel">This is optional text and this tile has a link.</a>
				</p>
			</div>
						
		</div>

		<div class="clear"></div>
	</div>
</div>			
						
				<div class="clear"></div>
	</div>
		
		
		<h2 id="latest_products_title"><?=$settings->tag_line?></h2>
		
	<div id="products_grid">
				<?
			if(isset($prod))
			{
				foreach($prod->result() as $products)
				{
			?>
			
					<div class="single_grid_product"  style="width:<?=$settings->gridimg_width?>px !important;height:<?=$settings->gridimg_height?>px !important;">	
						<div class="product_med_wrap">
							<?php
								$av = ""; $st = "";
								if($products->archive) $av = " archived";
								if($products->stock_available > 0) $st = " soldShow";
							?>
							
							
							
							<div class="product_meta">৳ &nbsp;<?=$products->price;?></div>
							<a href="<?=base_url();?>index.php/product_details/details/<?=$products->id;?>" title="test product" class="single_product_image_link" >
								<img class="archivedImg <?=$av?>" style="display:none" src="<?=base_url();?>img/archived_ribbon.png" />
								<div class="product_meta soldOut <?=$st?>">SOLD OUT !</div>
								<img  style="width:<?=$settings->gridimg_width?>px !important;" src="<?=base_url();?>itemimages/<?=$products->main_image;?>" class="attachment-product_med wp-post-image" alt="" />
							</a>
						</div>
					</div>	
		<?		}
			}
		?>	
					
		
		<?/*
			if(isset($products))
			{
				foreach ($products->result() as $prod)
				{?>
				
					<div class="single_grid_product">	
						<div class="product_med_wrap">
							<div class="product_meta">৳<?=$prod->price?></div>
							<a href="<?=base_url();?>index.php/product_details/details/<?=$prod->id?>" title="<?=$prod->name?>" class="single_product_image_link">
								<img width="560" height="560" src="<?=base_url();?>itemimages/<?=$prod->mainImageUrl?>" class="attachment-product_med wp-post-image" alt="" />
							</a>
						</div>
					</div>		
					
					
					<!--
					<td>
						<a style="text-decoration: none;" href="<?=base_url();?>index.php/product_details/details/<?=$prod->id?>">
						<div class="new" style="">
							<p class="pname"><a href=""></a></p>
							<p class="pname"><?=$prod->name?></p>
							<div class="pprice"><p style="">৳<?=$prod->price?></p><span style="text-align:left; color:#666;">CODE: <?=$prod->code?></span></div>
							<img src="<?=base_url();?>itemimages/<?=$prod->mainImageUrl?>" />
						</div>
						</a>
					</td>
					-->
				<?
				}
			}*/?>

		<div class="clear"></div>
	</div>
	
			
		<div id="all_products_call">
		<a href="" title="">
			View All Products &rarr;
		</a>
	</div>
		
					<div class="clear"></div>
				</div><!-- end div.container, begins in header.php -->
			</div><!-- end div.wrapper, begins in header.php -->
		</div><!-- end div#site_wrap, begins in header.php -->
		