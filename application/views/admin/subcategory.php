        <div class="maincontent noright">
        	<div class="maincontentinner">
            	
                <ul class="maintabmenu">
                	<li class="current"><a href="dashboard.html">Category</a></li>
                </ul><!--maintabmenu-->
                
                <div class="content">
                    
                    <div class="contenttitle">
                    	<h2 class="widgets"><span>Add Subcategory</span></h2>
                    </div><!--contenttitle-->
                    
                    <br />
                    <!--123-->
					<div class="" style="height:550px;">
					
					<?php
						if(!isset($add_subcat))
						{
							$add_subcat = true;
						}
					?>
						<style>
						.zFormTbl td
						{
							#border: 1px solid grey;
						}
						</style>
						<script>
								//console.log( "ready!" );
								
								function underSubCat(show_sub)
								{
									jQuery('#newSub').val('');
									jQuery('#desc').val('');
									
									if(show_sub)
									{
										jQuery('#subcatName').html('<option value="">Which Sub-category</option>');
										jQuery('#subcatTr').show("slow");
									}
									else
									{
										jQuery('#subcatTr').hide("fast");
									}
								}
								
								function catChosen() //Update SubCat options
								{
									if(jQuery("input:checked").val() == 'under_cat') return;
									
									var catName = jQuery('#catName option:selected').text();
									var catId = jQuery('#catName option:selected').val();
									
									if(catId != "")
									{
										jQuery.ajax({
											url: "<?php echo base_url();?>index.php/admin/category_ctl/getSubcatList",
											type: 'POST',
											data: {
													"catId" : catId
												  },

											success: function(response, status, xhr)
											{
												response = jQuery.parseJSON(response);	// console.log(response.status+" <- status");
												
												if(response.status == 1)
												{
													// jQuery('.msgsuccess p').text('Successfully added!');
													// jQuery('.msgsuccess').show("slow");
													//console.log(response.result);
													
													var subcats = jQuery.parseJSON( response.result );	//console.log(subcats[0]['id']);
													var i = 0, options = "";
														options = '<option value="">Which sub-category</option>';
													while(i < subcats.length)
													{
														options += '<option value="'+subcats[i]['id']+'">'+subcats[i]['name']+'</option>';
														i++;
													}
													
													jQuery('#subcatName').html(options);	//console.log(options);
												}
												else if(response.status == 0)
												{
													jQuery('.msgerror p').text("No sub-category found for '"+catName+"'!");
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
										jQuery('.msgalert p').text('Category name not selected!');
										jQuery('.msgalert').show("slow");
									}
								}
								
								function addSubcat()  //Submit
								{
									var ignoreSubcat = false;
									if(jQuery("input:checked").val() == 'under_cat')
										ignoreSubcat = true;
									
									var catId = jQuery('#catName').val(); //value
									var subcatId = jQuery('#subcatName').val(); //value
									var newSub = jQuery('#newSub').val();
									var desc = jQuery('#desc').val();
									
									var postData = {};
									if(ignoreSubcat)
									{
										var postData = {
														"rootCategoryId" : catId,
														"name" : newSub,
														"discription" : desc
													  };
									}
									else
									{
										var postData = {
														"rootCategoryId" : subcatId,	//++++
														"name" : newSub,
														"discription" : desc
													  };
									}
									
									
									
									
									if(catId != "" && newSub != "")
									{
										jQuery.ajax({
											url: "<?php echo base_url();?>index.php/admin/category_ctl/addSubCategory",
											type: 'POST',
											data: postData,

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
												console.log(response);
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
										jQuery('.msgalert p').text('Some importent fields are empty!');
										jQuery('.msgalert').show("slow");
									}
									
								}


							
						</script>
						<table class="zFormTbl" style="width:30%;margin: auto; "> 
							<tr>
								<td colspan="4">
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
								<td class="zFormTd" colspan="2" style="text-align: left; padding-left: 15px;">
									<input class="zradio" type="radio" name="cat" value="under_cat" id="catRadio" onchange='underSubCat(false)' >Add under Category<br/>
									<input class="zradio" type="radio" name="cat" value="under_sub_cat" checked="checked" onchange='underSubCat(true)' style="margin-top: 10px;">Add under Sub-category
								</td>
								<td class="zFormTd" colspan="2" style="text-align: left;"></td>
							</tr>
							<tr>
								<td style="text-align: right"></td>
								<td class="zFormTd" style="text-align: left;">
									<select id="catName" name="catName" class="zSelect" style="width: 200px;" onchange="catChosen()">
										<option value="">Which category</option>
										<?php
											if(isset($categoryList))
											{
												foreach($categoryList as $cat)
												{
													echo '<option value="'.$cat['id'].'">'.$cat['name'].'</option>';
												}
											}
											
										?>
										<!--
										<option value="0">Selection One</option>
										<option value="1">Selection Two</option>
										<option value="2">Selection Three</option>
										<option value="3">Selection Four</option>
										-->
									</select>
								</td>
							</tr>
							<tr id="subcatTr" >
								<td style="text-align: right"></td>
								<td class="zFormTd" style="text-align: left;">
									<select id="subcatName" name="subcatName" class="zSelect" style="width: 200px; border: 1px solid #A4C400;">
										<option value="">Which sub-category</option>
										
									</select>
								</td>
							</tr>
							<tr>
								<td style="text-align: right"></td>
								<td class="zFormTd" style="text-align: left;">
									<label class="zlable" >Name:</label><br/>
									<input id="newSub" class="zinput" type="text" value="" placeholder=""/>
								</td>
							</tr>
							<tr>
								<td></td>
								<td class="zFormTd">
									<label class="zlable" >Description:</label><br/>
									<textarea id="desc" class="zinput"  style="vertical-align: top;" rows="7" cols="25" value=""></textarea>
								</td>
							</tr>
							<tr>
								<td></td>
								<td class="zFormTd" style="text-align: left;">
									<input class="zSubButton" type="submit" value="Submit" onclick="addSubcat()"/>
								</td>
							</tr>
						</table>
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
