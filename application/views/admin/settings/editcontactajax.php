  <div class="contenttitle">
                    	<h2 class="widgets"><span>#Edit Contact Information</span></h2>
                    </div><!--contenttitle-->
                    
                    <br />
                    <!--123-->
					<div class="">
						<table class="zFormTbl" style="width: 70%;">
						<form action="<?=base_url();?>index.php/admin/settings_clt/editcontactdone" method="post" enctype="multipart/form-data">
							<tr>
								<td class="zFormTd">
									<label class="zlable" >Contact Information :</label>
								</td>
							</tr>
							<tr>
								<td class="zFormTd">
									<textarea id="" cols="70" rows="8" name="contact" align="center"><?if(isset($val)){echo $val;}?></textarea> 
								</td>
								<td class="zFormTd" style="vertical-align: bottom;">
									<input class="zSubButton" type="submit" value="Submit"/>
								</td>
								
							</tr>
							
							
						</table>
					</div>
                    </form>