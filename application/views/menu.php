<div id="column_left">





	<?php
	
		/*

		// vaj( $category);exit;
		foreach($category as $categorylist)
		{
			echo '<br/><br/><br/>';
			echo $categorylist['id'];
			echo ' '.$categorylist['name'];
			//vaj($categorylist['data']);
			//sub  = $categorylist['data'];
			//vaj($sub);
			//vaj($categorylist);
			foreach($categorylist['data'] as $subcat)
			{
				echo '<br/><br/>';
				echo $subcat['id'];
				echo $subcat['name'];
				
				
				foreach($subcat['data'] as $originals)
				{
					echo '<br/>';
					echo $originals['id'];
					echo $originals['name'];
					
				}
				
			}
			echo '<br/>';
		}
		exit;
		
		*/
?>
	<?php
		$i = 1;
		if(!isset($category))
		{
			$obj = new category_ctl();
			$category = $obj->menu_categories();
		}
		foreach($category as $categorylist)
		{
			echo '<ul id="topnav" class="hoverMenu">';//echo $categorylist['id'];
			echo "<li><h2>".$categorylist['name']."</h2>";
			echo '<div class="sub" style="width:'.(count($categorylist['data'])*153).'px">';
			
			foreach($categorylist['data'] as $subcat)
			{
				echo '<ul> <li><h3><a href="'.base_url().'index.php/home_ctl/temp_grid/'.$subcat['id'].'">'.$subcat['name'].'</a></h3></li>';//echo $subcat['id'];//echo $subcat['name'];
				
				foreach($subcat['data'] as $originals)
				{
					echo '<li><a href="'.base_url().'index.php/home_ctl/temp_grid/'.$originals['id'].'">'.$originals['name'].'</a></li>';// echo $originals['id'];// echo $originals['name'];
				}
				echo "</ul>";
				
			}
			echo "</div>";
			echo "</li>";
			echo "</ul>";
		}
		
	?>
<!----------------------------------------->

<!--
<ul id="topnav" class="hoverMenu">
	<li><h2>Categories</h2>
        <div class="sub">

			<ul>
				<li><h3><a href="<?base_url();?>indexaa17.html?route=product/category&amp;path=36">Womens</a></h3></li>
					<li><a href="<?base_url();?>index9e66.html?route=product/category&amp;path=36_38">Three Pieces</a></li>
					<li><a href="<?base_url();?>indexe8d1.html?route=product/category&amp;path=36_40">Tops</a></li>
					<li><a href="<?base_url();?>index9915.html?route=product/category&amp;path=36_42">Sharee</a></li>
					<li><a href="<?base_url();?>index81ab.html?route=product/category&amp;path=36_48">Tee Shirt</a></li>
					<li><a href="<?base_url();?>indexb0e5.html?route=product/category&amp;path=36_43">Scarf</a></li>
					<li><a href="<?base_url();?>index23c6.html?route=product/category&amp;path=36_41">Panjabi</a></li>
			</ul>
			<ul>
				<li><h3><a href="<?base_url();?>index99b0.html?route=product/category&amp;path=35">Mens</a></h3></li>
					<li><a href="<?base_url();?>index0ede.html?route=product/category&amp;path=35_44">Panjabi</a></li>
					<li><a href="<?base_url();?>index634a.html?route=product/category&amp;path=35_49">Tee Shirt</a></li>
					<li><a href="<?base_url();?>index5b6e.html?route=product/category&amp;path=35_39">Fotua</a></li>
			</ul>
			<ul>
				<li><h3><a href="<?base_url();?>indexef58.html?route=product/category&amp;path=37">Kids</a></h3></li>
					<li><a href="<?base_url();?>indexb69c.html?route=product/category&amp;path=37_46">Fotua</a></li>
					<li><a href="<?base_url();?>index7faa.html?route=product/category&amp;path=37_45">Frock</a></li>
					<li><a href="<?base_url();?>index29ea.html?route=product/category&amp;path=37_47">Three Pieces</a></li>
			</ul>
		</div>
    </li>
</ul>


-->
<!----------------------------------------->


    <div id="module_cart" class="box">
  <div class="top">Shopping Cart</div>
  <div class="middle">
        <div style="text-align: center;">0 items</div>
      </div>
  <div class="bottom">&nbsp;</div>
</div>
<script type="text/javascript" src="<?=base_url();?>catalog/view/javascript/jquery/ajax_add.js"></script>

<script type="text/javascript"><!--

function getUrlParam(name) {
  var name = name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
  var regexS = "[\\?&]"+name+"=([^&#]*)";
  var regex = new RegExp(regexS);
  var results = regex.exec(window.location.href);
  if (results == null)
    return "";
  else
    return results[1];
}

$(document).ready(function () {
	$('.cart_remove').live('click', function () {
		if (!confirm('Confirm?')) {
			return false;
		}
		$(this).removeClass('cart_remove').addClass('cart_remove_loading');
		$.ajax({
			type: 'post',
			url: 'index.php?route=module/cart/callback',
			dataType: 'html',
			data: 'remove=' + this.id,
			success: function (html) {
				$('#module_cart .middle').html(html);
				if (getUrlParam('route').indexOf('checkout') != -1) {
					window.location.reload();
				}
			}
		});
	});
});
//--></script>    <div class="box">
  <div class="top">Outlet</div>
  <div id="information" class="middle">
    <ul>
            <li><a href="#">Shahbagh</a></li>
            <li><a href="#">Banani</a></li>
            <li><a href="#">Dhanmondi</a></li>
            <li><a href="#">Bailey Road</a></li>
	<li><a href="#">Deshi Dosh Dhaka</a></li>
	<li><a href="#">Deshi Dosh Cittagong</a></li>
    </ul>
  </div>
  <div class="bottom">&nbsp;</div>
</div>    
 <div class="div6">
      <div class="center">
	        <div id="breadcrumb">
                <a href="index9328.html?route=common/home">Home</a>
                 &gt; <a href="index99e4.html?route=information/information&amp;information_id=5">Terms &amp; Conditions</a>
              </div>

    </div>
  </div>
  
</div>