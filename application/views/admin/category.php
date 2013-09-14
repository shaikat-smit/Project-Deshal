      
<script>


function addCat()
{
	var catname = jQuery('#catname').val();
	var desc = jQuery('#desc').val();
	
	
	
	if(catname != "")
	{
		jQuery.ajax({
			url: "<?php echo base_url();?>index.php/admin/category_ctl/addCategory",
			type: 'POST',
			data: {
					"catname" : catname,
					"desc" : desc
				  },

			success: function(response, status, xhr)
			{
				if(response == 1)
				{
					jQuery('.msgsuccess p').text('Successfully added!');
					jQuery('.msgsuccess').show("slow");
				}
				else
				{
					jQuery('.msgerror p').text('Failed! Try again.');
					jQuery('.msgerror').show("slow");
				}
				//console.log(response);
			},      
			error: function (xhr, ajaxOptions, thrownError)
			{
				jQuery('.msgerror p').text('Failed! Try again.');
				jQuery('.msgerror').show("slow");
			}
		});
	}
	else
	{
		jQuery('.msgalert p').text('Category name field is empty!');
		jQuery('.msgalert').show("slow");
	}
}



</script>

	  
	  
	  
	  
        <div class="maincontent noright">
        	<div class="maincontentinner">
            	
                <ul class="maintabmenu">
                	<li class="current"><a href="dashboard.html">Category</a></li>
                </ul><!--maintabmenu-->
                
                <div class="content">
                    
                    <div class="contenttitle">
                    	<h2 class="widgets"><span>Add Category</span></h2>
                    </div><!--contenttitle-->
                    
                    <br />
                    <!--123-->
					<div class="">
						<form action="<?php echo base_url();?>index.php/admin/category_ctl/addCategory" method="POST">
							<table class="zFormTbl" style="width: 70%;">
								<tr>
									<td colspan="2">
										<div class="notification msginfo">
											<a class="close"></a>
											<p>This is an information message.</p>
										</div><!-- notification msginfo -->
										
										<div class="notification msgsuccess">
											<a class="close"></a>
											<p>This is a success message.</p>
										</div><!-- notification msgsuccess -->
										
										<div class="notification msgalert">
											<a class="close"></a>
											<p>This is an alert message.</p>
										</div><!-- notification msgalert -->
										
										<div class="notification msgerror">
											<a class="close"></a>
											<p>This is an error message.</p>
										</div><!-- notification msgerror -->
									</td>
								</tr>
								<tr>
									<td class="zFormTd">
										<label class="zlable" >Category name:</label>
									</td>
									<td class="zFormTd">
										<input id="catname" class="zinput" type="text" value=""/>
									</td>
								</tr>
								
								<tr>
									<td class="zFormTd">
										<label class="zlable" >Description:</label>
									</td>
									<td class="zFormTd">
										<textarea id="desc" class="zinput"  style="vertical-align: top;" rows="7" cols="25" value=""></textarea>
									</td>
								</tr>
								
								<tr>
									<td></td>
									<td>
										<input class="zSubButton" type="button" value="Submit" onclick="addCat()"/>
										<!--<input class="zButton" type="button" value="Else"/>-->
									</td>
								</tr>
							</table>
						</form>
					</div>
                    
                    
                </div><!--content-->
                
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
