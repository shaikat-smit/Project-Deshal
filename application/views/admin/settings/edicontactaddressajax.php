 <div class="contenttitle">
                    	<h2 class="widgets"><span>#Edit Conatct Email Address</span></h2>
                    </div><!--contenttitle-->
                    
                    <br />
                    <!--123-->
					<div class="">
						<table class="zFormTbl" style="width: 70%;">
						<form action="<?=base_url();?>index.php/admin/settings/editcaddressdone" method="post" enctype="multipart/form-data">
							<tr>
								<td class="zFormTd">
									<label class="zlable" >Email :</label>
								</td>
								<td class="zFormTd">
									<input class="zinput" type="text" value="<?if(isset($val)){echo $val;}?>" id="emailaddress" name="emailaddress"/>
								</td>
								<td class="zFormTd">
									<input class="zSubButton" type="submit" value="Submit" />
								</td>
								
							</tr>
							
							
						</table>
					</div>
                    </form>