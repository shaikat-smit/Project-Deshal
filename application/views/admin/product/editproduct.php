
<script type="text/javascript" src="<?=base_url();?>admin/js/plugins/jquery-1.7.min.js"></script>
        

                
        <div class="maincontent noright">
        	<div class="maincontentinner">
            	
                <ul class="maintabmenu">
                	<li class="current"><a nohref="">Edit Products</a></li>
                </ul><!--maintabmenu-->
										
                <div class="content">
                    <p><?php echo validation_errors(); ?></p>
                    <div class="contenttitle">
                    	<h2 class="widgets"><span>#Basic Information</span></h2>
                    </div><!--contenttitle-->
                    
                    <br />
                    <!--123-->
					<div class="">
						<table class="zFormTbl" style="width: 70%;">
						<?=form_open_multipart('admin/product_ctl/getEditForm')?>
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


										
										<script type="text/javascript">

											function getmsg(status, msg)
											{
												if(status == 1)
													{
														jQuery('.msgsuccess p').text(msg);
														jQuery('.msgsuccess').show("slow");
														//console.log(msg+" f ");
													}
													else if(status == 0)
													{
														jQuery('.msgerror p').text(msg);
														jQuery('.msgerror').show("slow");
														//console.log('Error happened');
														//console.log(msg+" s ");
													}
														
												return false;
											} 

									</script>


<script>
getmsg(<? echo $message['status'];?>,'<?=$message['msg'];?>');
</script>
									</td>
								</tr>
							<tr>
								<td class="zFormTd">
									<label class="zlable" >Product name:</label>
								</td>
								<td class="zFormTd">
									<input class="zinput" type="text" value="<?if(isset($details)){echo $details['name'];}?>" name="productname" id="productname"  />
									<input class="zinput" type="hidden" value="<?if(isset($details)){echo $details['id'];}?>" name="productid" id="productid"  />
									<input class="zinput" type="hidden" value="<?if(isset($details)){echo $details['mainImageUrl'];}?>" name="mainImageUrl" id="mainImageUrl"  />
								</td>
							</tr>
							<tr>
								<td class="zFormTd">
									<label class="zlable" >Price:</label>
								</td>
								<td class="zFormTd">
									<input class="zinput" type="text" value="<?if(isset($details)){echo $details['price'];}?>" name="price" id="price"  />
								</td>
							</tr>
							<!---->
							<tr>
								<td class="zFormTd">
									<label class="zlable" >Amount:</label>
								</td>
								<td class="zFormTd">
									<input class="zinput" type="text" value="<?if(isset($details)){echo $details['amount'];}?>" name="amount" id="amount"  />
								</td>
							</tr>
							<tr>
								<td class="zFormTd">
									<label class="zlable" >Product Code:</label>
								</td>
								<td class="zFormTd">
									<input class="zinput" type="text" value="<?if(isset($details)){echo $details['code'];}?>" name="code" id="code"  />
								</td>
							</tr>
						</table>
					</div>
							<!----><!----><!----><!---->
				</div><!--content-->
                
			<div class="content">
				
					 <div class="contenttitle">
                    	<h2 class="widgets"><span>#Product Description</span></h2>
                    </div><!--contenttitle-->
					
						<div class="">
						<table class="zFormTbl" style="width: 70%;">
						<tr><td></td><td></td></tr>
							<tr>
								<td class="zFormTd">
									<label class="zlable" >Product parts:</label>
								</td>
								<td class="zFormTd">
									<input class="zinput" type="text" value="<?php if(isset($parts))echo $parts;?>" name="productparts" id="productparts"/>
								</td>
							</tr>
							<!---->
							<tr>
								<td class="zFormTd">
									<label class="zlable" >Artist</label>
								</td>
								<td class="zFormTd">
									<input class="zinput" type="text" value="<?php if(isset($parts))echo $artist;?>" name="artist" id="artist" />
								</td>
							</tr>
							<tr>
								<td class="zFormTd">
									<label class="zlable" >Ingredient:</label>
								</td>
								<td class="zFormTd">
									<input class="zinput" type="text" value="<?php if(isset($ingredient))echo $ingredient;?>" name="ingredient" id="ingredient"/>
								</td>
							</tr>
							<!---->
							<tr>
								<td class="zFormTd">
									<label class="zlable" >Color:</label>
								</td>
								<td class="zFormTd">
									<input class="zinput" type="text" value="<?php if(isset($color))echo $color;?>"  name="color" id="color"  />
								</td>
							</tr>
							<!---->
							<tr>
								<td class="zFormTd">
									<label class="zlable" >Size:</label>
								</td>
								<td class="zFormTd">
									<input class="zinput" type="text" value="<?php if(isset($size))echo $size;?>" name="size" id="size" />
								</td>
							</tr>
							<tr>
								<td class="zFormTd">
									<label class="zlable" >Product tag:</label>
								</td>
								<td class="zFormTd">
									<input class="zinput" type="text" value="<?php if(isset($tag))echo $tag; ?>" name="tag" id="tag" />
								</td>
							</tr>
						</table>
					</div>
                    
							<!----><!----><!----><!---->
				</div><!--content-->
                
			<div class="content">
				
					 <div class="contenttitle">
                    	<h2 class="widgets"><span>#Product Image</span></h2>
                    </div><!--contenttitle-->
					
						<div class="">
						<table class="zFormTbl" style="width: 70%;">
						<tr><td></td><td></td></tr>
							<tr>
								<td class="zFormTd">
									<label class="zlable" >Upload image:</label>
								</td>
								<td class="zFormTd">
									<input class="zinput" type="file" value="" name="userfile"/>
								</td>
							</tr>
							<tr>
								<td>
								</td>
								<td class="zFormTd">
									<input class="zSubButton" type="submit" value="Submit" />
								</td>
							</tr>
						</table>
						</div>
                    
							<!----><!----><!----><!---->
						</form>
						
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
