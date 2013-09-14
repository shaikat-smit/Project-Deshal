 <div class="contenttitle">
                    	<h2 class="widgets"><span>#Edit Tag Line</span></h2>
                    </div><!--contenttitle-->
                    
                    <br />
                    <!--123-->
					<div class="">
						<table class="zFormTbl" style="width: 70%;">
						<form action="<?=base_url();?>index.php/admin/settings_clt/edittagdone" method="post" enctype="multipart/form-data">
						
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
									<label class="zlable" >Tag Line:</label>
								</td>
								<td class="zFormTd">
									<input class="zinput" type="text" value="<?if(isset($val)){echo $val;}?>" id="tagline" name="tagline"/>
								</td>
								<td class="zFormTd">
									<input class="zSubButton" type="submit" value="Submit" />
								</td>
								
							</tr>
							
							
						</table>
					</div>
                    </form>