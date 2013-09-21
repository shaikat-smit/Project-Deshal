<script type="text/javascript" src="<?=base_url();?>admin/js/plugins/jquery-1.10.1.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
			
				$("#logo").click(function(){
				  $(".widgetlist").hide("slow","swing");
					$("#dvloader").show();
					
					$.ajax
					({
						type:'POST', 
						url: '<?=base_url();?>index.php/admin/settings/editlogo',  
						success: function(response) 
						{
							$("#dvloader").hide();
							$("#back").show();
							$("#divajax").html(response);
						}});
				});
				
				$("#tag").click(function(){
				  $(".widgetlist").hide("slow","swing");
					$("#dvloader").show();
					
					$.ajax
					({
						type:'POST', 
						url: '<?=base_url();?>index.php/admin/settings/edittag',  
						success: function(response) 
						{
							$("#dvloader").hide();
							$("#back").show();
							$("#divajax").html(response);
						}});
				});
				
				$("#title").click(function(){
				  $(".widgetlist").hide("slow","swing");
					$("#dvloader").show();
					
					$.ajax
					({
						type:'POST', 
						url: '<?=base_url();?>index.php/admin/settings/edittitle',  
						success: function(response) 
						{
							$("#dvloader").hide();
							$("#back").show();
							$("#divajax").html(response);
						}});
				});
				
				$("#gallery").click(function(){
				  $(".widgetlist").hide("slow","swing");
					$("#dvloader").show();
					
					$.ajax
					({
						type:'POST', 
						url: '<?=base_url();?>index.php/admin/settings/editProductRow',  
						success: function(response) 
						{
							$("#dvloader").hide();
							$("#back").show();
							$("#divajax").html(response);
						}});
				});
				
				$("#latest").click(function(){
				  $(".widgetlist").hide("slow","swing");
					$("#dvloader").show();
					
					$.ajax
					({
						type:'POST', 
						url: '<?=base_url();?>index.php/admin/settings/editlatestRow',  
						success: function(response) 
						{
							$("#dvloader").hide();
							$("#back").show();
							$("#divajax").html(response);
						}});
				});
				
				$("#contact").click(function(){
				  $(".widgetlist").hide("slow","swing");
					$("#dvloader").show();
					
					$.ajax
					({
						type:'POST', 
						url: '<?=base_url();?>index.php/admin/settings/editcontact',  
						success: function(response) 
						{
							$("#dvloader").hide();
							$("#back").show();
							$("#divajax").html(response);
						}});
				});
				
				$("#social").click(function(){
				  $(".widgetlist").hide("slow","swing");
					$("#dvloader").show();
					
					$.ajax
					({
						type:'POST', 
						url: '<?=base_url();?>index.php/admin/settings/editsocial',  
						success: function(response) 
						{
							$("#dvloader").hide();
							$("#back").show();
							$("#divajax").html(response);
						}});
				});
				
				$("#contactaddress").click(function(){
				  $(".widgetlist").hide("slow","swing");
					$("#dvloader").show();
					
					$.ajax
					({
						type:'POST', 
						url: '<?=base_url();?>index.php/admin/settings/editcontactaddress',  
						success: function(response) 
						{
							$("#dvloader").hide();
							$("#back").show();
							$("#divajax").html(response);
						}});
				});
				
				$("#banner").click(function(){
				  $(".widgetlist").hide("slow","swing");
					$("#dvloader").show();
					
					$.ajax
					({
						type:'POST', 
						url: '<?=base_url();?>index.php/admin/settings/editbanner',  
						success: function(response) 
						{
							$("#dvloader").hide();
							$("#back").show();
							$("#divajax").html(response);
						}});
				});
				
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
		<div class="maincontent">
        	<div class="maincontentinner">
            	
                <ul class="maintabmenu">
                	<li class="current"><a href="#">Settings</a></li>
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
                	<ul class="widgetlist">
                    	<li><a href="#" class="upload" id="logo">Change Logo</a></li>
                    	<li><a href="#" class="upload" id="banner">Change Banner Images</a></li>
                    	<li><a href="#" class="message" id="tag" >Edit Tag Line</a></li>
                        <li><a href="#" class="message" id="title" >Edit Title</a></li>
                    	<li><a href="#" class="events" id="latest" >Edit Latest Product Row Number</a></li>
                    	<li><a href="#" class="events" id="gallery" >Edit Product Gallery Row Number</a></li>
                    	<li><a href="#" class="message" id="social" >Edit Social Links</a></li>
                    	<li><a href="#" class="message" id="contact" >Edit Contact Information</a></li>
                    	<li><a href="#" class="message" id="contactaddress" >Edit Contact Address</a></li>
                    	<li><a href="<?=base_url();?>index.php/admin/settings/editaboutus" class="message" id="contact" >Edit About Us Content</a></li>
                    	<li><a href="<?=base_url();?>index.php/admin/settings/editpolicy" class="message" id="contact" >Edit Privacy Policy Content</a></li>
                    </ul>
					<div style="display:none" id="dvloader"><img src="<?=base_url();?>admin/images/loaders/loader6.gif" /></div>
                </div><!--content-->
            </div><!--maincontentinner-->
            
            <div class="footer">
            	
            </div><!--footer-->
            
        </div><!--maincontent-->
        
        <div class="mainright">
        	<div class="mainrightinner">
            	
                <div class="widgetbox">
                	<div class="title"><h2 class="chart"><span>Visitors Overview</span></h2></div>
                    <div class="chartbox widgetcontent">
                    	<div id="chartplace" class="chartplace"></div>
                        
                        <div class="one_half">
                        	<div class="analytics analytics2">
                                <small>Visitors For Today</small>
                                <h1>23 321</h1>
                                <small>18,222 unique</small>
                            </div><!--visitoday-->
                        </div><!--one_half-->
                        
                        <div class="one_half last">
                        	
                            <div class="one_half">
                            	<div class="analytics">
                                    <small>bounce</small>
                                    <h3>23.2%</h3>
                                </div><!--analytics-->
                            </div><!--one_half-->
                            
                            <div class="one_half last">
                            	<div class="analytics textright">
                                    <small class="block">visitors</small>
                                    <h3>56.8%</h3>
                                </div><!--analytics-->
                            </div><!--one_half last-->
                            <br clear="all" />
                            
                            <div class="analytics average margintop10">
                                Average <h3>87.44%</h3>
                            </div><!--analytics-->
                            
                        </div><!--one_half-->
                        
                        
                        <br clear="all" />
                    </div><!--widgetcontent-->
                </div><!--widgetbox-->
                
                
                <div class="widgetbox">
                	<div class="title"><h2 class="calendar"><span>Event Calendar</span></h2></div>
                    <div class="widgetcontent padding0">
                    	<div id="datepicker"></div>
                    </div><!--widgetcontent-->
                </div><!--widgetbox-->
                
 <br clear="all" /><br />
                    
                    <div class="contenttitle">
                    	<h2 class="chart"><span>Simple Chart</span></h2>
                    </div><!--contenttitle-->
                    <br />
                    <div id="chartplace2" style="height:300px;"></div>
                    
                    <br /><br />
                    
                   
                <br /><br />                
            </div><!--mainrightinner-->
        </div><!--mainright-->
                
     	</div><!--mainwrapperinner-->
    </div><!--mainwrapper-->
	<!-- END OF MAIN CONTENT -->
    

</body>

</html>
