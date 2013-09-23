 <div class="contenttitle">
                    	<h2 class="widgets"><span>#Edit Grid Image Width Height</span></h2>
                    </div><!--contenttitle-->
                    
                    <br />
                    <!--123-->
					<div class="">
						<table class="zFormTbl" style="width: 80%;">
						<form action="<?=base_url();?>index.php/admin/settings/editgriddone" method="post">
							<tr>
								<td class="zFormTd">
									<label class="zlable" >Width :</label>
								</td>
								<td class="zFormTd">
									<input class="zinput" type="text" style="width: 80%;" value="<?if(isset($gridimg_width)){echo $gridimg_width;}?>" id="fb" name="gridimg_width"/>px
								</td>
							</tr>
							<tr>
								<td class="zFormTd">
									<label class="zlable" >Height :</label>
								</td>
								<td class="zFormTd">
									<input class="zinput" type="text" style="width: 80%;" value="<?if(isset($gridimg_height)){echo $gridimg_height;}?>" id="twt" name="gridimg_height"/>px
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