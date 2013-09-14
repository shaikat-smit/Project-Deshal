
<script type="text/javascript" src="<?=base_url();?>admin/js/plugins/jquery-1.7.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>admin/js/plugins/jquery.smartWizard-2.0.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>admin/js/plugins/jquery.colorbox-min.js"></script>
<script type="text/javascript" src="<?=base_url();?>admin/js/custom/general.js"></script>


<script type="text/javascript">
	jQuery(document).ready(function(){
		// Smart Wizard 	
  		jQuery('#wizard').smartWizard({onFinish: onFinishCallback});
		
		function onFinishCallback(){
			
			val();
			//var name = document.getElementById('productname').value;
			var form = jQuery('#addpro');
			//alert(form);
			jQuery.ajax
						({ 

							type: "POST",
							url: '<?=base_url();?>index.php/admin/product_ctl/getAddForm',
							data: form.serialize(),
							success: function(msg) {
							jQuery("#view").html(msg);
							}
						});
			//alert(name);
		} 
		
		jQuery(".inline").colorbox({inline:true, width: '60%', height: '500px'});
	});
	
	function val()
	{
		var name = document.getElementById('productname').value;
		var price = document.getElementById('price').value;
		var amount = document.getElementById('amount').value;
		var productparts = document.getElementById('productparts').value;
		var artist = document.getElementById('artist').value;
		var ingredient = document.getElementById('ingredient').value;
		var color = document.getElementById('color').value;
		var size = document.getElementById('size').value;
		
		
		alert('ok');
		return;
	}
</script>
        <div class="maincontent noright">
        	<div class="maincontentinner">
            	
                <ul class="maintabmenu">
                	<li class="current"><a href="dashboard.html">Products</a></li>
                </ul><!--maintabmenu-->
                
				<div class="content">
                
                    <div class="contenttitle">
                    	<h2 id="default" class="form"><span>Add Product</span></h2>
                    </div><!--contenttitle-->
                    
                    <br /><br />
                                        	
                    <!-- START OF DEFAULT WIZARD -->
                    <form class="stdform stdform2" method="post" action="#" enctype="multipart/form-data" id="addpro">
                    <div id="wizard" class="wizard">
                    	
                        <ul class="hormenu">
                            <li>
                            	<a href="#wiz1step1">
                                	<span class="h2">STEP 1</span>
                                    <span class="dot"><span></span></span>
                                    <span class="label">Basic Information</span>
                                </a>
                            </li>
                            <li>
                            	<a href="#wiz1step2">
                                	<span class="h2">STEP 2</span>
                                    <span class="dot"><span></span></span>
                                    <span class="label">Product Descriptions</span>
                                </a>
                            </li>
							<li>
                            	<a href="#wiz1step3">
                                	<span class="h2">STEP 3</span>
                                    <span class="dot"><span></span></span>
                                    <span class="label">Upload Images</span>
                                </a>
                            </li>
                        </ul>
                        
                        <br clear="all" /><br /><br />
                        	
                        <div id="wiz1step1" class="formwiz">
                        	<h2>Step 1: Basic Information</h2> <br />
                        	
                                <p>
                                    <label>Name</label>
                                    <span class="field"><input type="text" name="productname" id="productname" class="smallinput" /></span>
                                </p>
                                
                                <p>
                                    <label>Price</label>
                                    <span class="field"><input type="text" name="price" id="price" class="smallinput" /></span>
                                </p>
								
                                <p>
                                    <label>Amount</label>
                                    <span class="field"><input type="text" name="amount" id="amount" class="smallinput" /></span>
                                </p>
								
                        </div><!--#wiz1step1-->
                        
                        <div id="wiz1step2" class="formwiz">
                        	<h2>Step 2: Product Description</h2> <br />
                            
                                <p>
                                    <label>Product parts</label>
                                    <span class="field"><input type="text" name="productparts" id="productparts" class="mediuminput" /></span>
                                </p>
                                <p>
                                    <label>Artist</label>
                                    <span class="field"><input type="text" name="artist" id="artist" class="mediuminput" /></span>
                                </p>
								<p>
                                    <label>Ingredient</label>
                                    <span class="field"><input type="text" name="ingredient" id="ingredient" class="longinput" /></span>
                                </p>
								<p>
                                    <label>Color</label>
                                    <span class="field"><input type="text" name="color" id="color" class="mediuminput" /></span>
                                </p>
								<p>
                                    <label>Size</label>
                                    <span class="field"><input type="text" name="size" id="size" class="mediuminput" /></span>
                                </p>
                                                                                               
                        </div><!--#wiz1step2-->
						
						<div id="wiz1step3" class="formwiz">
                        	<h2>Step 2: Upload Image</h2> <br />
                            
                                <p>
                                    <label>Product main image</label>
                                    <span class="field"><input type="file" name="productimage" class="longinput" /></span>
                                </p>                                                         
                        </div><!--#wiz1step3-->
                        
                    </div><!--#wizard-->
                    </form>
                    <!-- END OF DEFAULT WIZARD -->
					
					<br clear="all" />
                </div>
                <!--content-->
                
            </div><!--maincontentinner-->
            
            <div class="footer">
            	<p>Starlight Admin Template &copy; 2012. All Rights Reserved. Designed by: <a href="#">ThemePixels.com</a></p>
            </div><!--footer-->
            
        </div><!--maincontent-->
        
                
     	</div><!--mainwrapperinner-->
    </div><!--mainwrapper-->
	<!-- END OF MAIN CONTENT -->
    

</body>

</html>
