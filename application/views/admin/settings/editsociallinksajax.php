 <div class="contenttitle">
                    	<h2 class="widgets"><span>#Edit Social Links</span></h2>
                    </div><!--contenttitle-->
                    
                    <br />
                    <!--123-->
					<div class="">
						<table class="zFormTbl" style="width: 80%;">
						<form action="<?=base_url();?>index.php/admin/settings/editsocialdone" method="post">
							<tr>
								<td class="zFormTd">
									<label class="zlable" >Facebook link :</label>
								</td>
								<td class="zFormTd">
									<input class="zinput" type="text" style="width: 80%;" value="<?if(isset($fb)){echo $fb;}?>" id="fb" name="fb"/>
								</td>
							</tr>
							<tr>
								<td class="zFormTd">
									<label class="zlable" >Twitter link :</label>
								</td>
								<td class="zFormTd">
									<input class="zinput" type="text" style="width: 80%;" value="<?if(isset($twt)){echo $twt;}?>" id="twt" name="twt"/>
								</td>
							</tr>
							<tr>
								<td class="zFormTd">
									<label class="zlable" >Flicker link :</label>
								</td>
								<td class="zFormTd">
									<input class="zinput" type="text" style="width: 80%;" value="<?if(isset($fli)){echo $fli;}?>" id="fli" name="fli"/>
								</td>
							</tr>
							<tr>
								<td class="zFormTd">&nbsp;</td>
								<td class="zFormTd">
									<input class="zSubButton" type="submit" value="Submit" />
								</td>
								
							</tr>
							
						</table>
					</div>
                    </form>