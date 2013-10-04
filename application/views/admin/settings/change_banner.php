<script type="text/javascript" src="<?=base_url();?>admin/js/plugins/jquery-1.10.1.min.js"></script>
<script type="text/javascript">
			$(document).ready(function(){

				$("#back").click(function(){
				$("#divajax, #back").hide(500, function(){
				
					
					$(".widgetlist").show(1000, function(){
						var url = "<?=base_url();?>index.php/admin/settings";
						window.location = url;
					});
				
				});
					
					
				});
			});

		</script>
		<div class="maincontent noright">
        	<div class="maincontentinner">
            	
                <ul class="maintabmenu">
                	<li class="current"><a href="#">Banner Slider Images</a></li>
                </ul><!--maintabmenu-->
                
                <div class="content" style="height:550px;">
						<div class="">
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


										
										<script type="text/javascript">

											function getmsg(status, msg)
											{
												if(status == 1)
													{
														$('.msgsuccess p').text(msg);
														$('.msgsuccess').show("slow");
														//console.log(msg+" f ");
														
													}
													else if(status == 0)
													{
														$('.msgerror p').text(msg);
														$('.msgerror').show("slow");
														
													}
													else
													{
														$('.msginfo p').text(msg);
														$('.msginfo').show("slow");
													}
												return false;
											} 

									</script>


<script>
getmsg(<? echo $message['status'];?>,'<?=$message['msg'];?>');
</script>

									</td>
								</tr>
						</table>
					</div>
					<div id="divajax"></div>
					<input class="zSubButton" type="button" value="&nbsp;Back&nbsp;" style="display:none" id="back" onclick="back()"/>
                	
					<div style="display:none" id="dvloader"><img src="<?=base_url();?>admin/images/loaders/loader6.gif" /></div>
                </div><!--content-->
            </div><!--maincontentinner-->
            
            <div class="footer">
				<p>Deshal &copy; 2012. All Rights Reserved. Designed by: <a href="http://www.stonemossit.com">Stone-Moss IT</a></p>
			</div><!--footer-->
            
        </div><!--maincontent-->
        
                
     	</div><!--mainwrapperinner-->
    </div><!--mainwrapper-->
	<!-- END OF MAIN CONTENT -->
    

</body>

</html>