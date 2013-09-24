        <div class="maincontent noright">
        	<div class="maincontentinner">
            	
                <ul class="maintabmenu">
                	<li class="current"><a href="#">Products</a></li>
                </ul><!--maintabmenu-->
                
				<div class="content">
				
                <div class="contenttitle radiusbottom0">
                	<h2 class="table"><span>Product Table</span></h2>
                </div><!--contenttitle-->
				<tr>
								<td colspan="4" style="height: 60px;">
									<div class="notification msginfo">
										<a class="close"></a>
										<p>This is a information message.</p>
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
getmsg(<? if(isset($message)){echo $message['status'];?>,<? echo "'".$message['msg']."'";}?>);
</script>
				<style>
					#prodListTbl tr
					{
						cursor: pointer;
					}
					.stdtable tbody tr:hover td, .stdtable tbody tr.selected td
					{
						background: whitesmoke;
						color: #333;
					}
					
					#prodListTbl tr:active td:first-child:not(.paginationLinks)
					{
						background-color: #D1EC45;
						cursor: pointer;
					}
					
					
					.paginationLinks *, .paginationLinks *:visited
					{
						color: #777;
						border: 1px solid;
						padding: 3px 10px;
					}
					.paginationLinks a:hover
					{
						color: #252525;
					}
					.paginationLinks strong
					{
						color: white;
						background-color: #777;
						border: 1px solid #777;
					}
			
		
					
				</style>
				
                <table cellpadding="0" cellspacing="0" border="0" class="stdtable" id="prodListTbl">
                    <colgroup>
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="head0">Product Code</th>
                            <th class="head1">Name</th>
                            <th class="head0">Price</th>
                            <th class="head0">Amount</th>
                            <th class="head1">Added</th>
                            <!--<th class="head1">Actions</th>-->
                        </tr>
                    </thead>
                    <tbody>
					<?php foreach ($query->result() as $row){?>
                        <tr id="tr-<?=$row->code?>">
                            <td class="center"><?=$row->code?></td>
                            <td class="center"><?=$row->name?></td>
                            <td class="center"><?=$row->price?></td>
                            <td class="center"><?=$row->amount?></td>
                            <td class="center"><?=$row->created?></td>
                            <!--<td class="center">X</td>-->
                        </tr>
					<?}?>
					<tr>
						<td colspan='5' class="paginationLinks" style="padding: 32px 0; text-align: right;"> <?php echo $pages;?> </td>
					</tr>
                    </tbody>
                </table>
                
                <br /><br />
                </div><!--content-->
                
            <script>
								
								//prodListTbl
								jQuery('#prodListTbl tr').click(function(event){
									row = jQuery(event.target).parent();
									//jQuery('#newSub').val(row.attr('id').substr(3,row.attr('id').length));
									var code = row.attr('id').substr(3,row.attr('id').length);
									//alert(code);
									getTablelist(code);
									/*JUMP*/
									var container = jQuery('body'), scrollTo = jQuery('#gTableDiv');
									container.animate({ scrollTop: scrollTo.offset().top - container.offset().top + container.scrollTop() });
									jQuery("#gTableDiv").css('background-color', '#D7FF83');
									setTimeout(function() { jQuery("#gTableDiv").css('background-color', '#fcfcfc'); }, 500);
									
								});
							function getTablelist(code)  //generate table --------------------------------------------------------------------------
								{
									var data = "code="+code;
									
									jQuery.ajax({
											url: "<?php echo base_url();?>index.php/admin/product/getunassigncode",
											type: 'POST',
											data: data,

											success: function(response){
											console.log(response);
											jQuery("#gTableDiv").html(response);
											}
											
										});
								}
								
						</script>    
                  <div id="gTableDiv"></div>
            </div><!--maincontentinner-->
            
            <div class="footer">
            	
            </div><!--footer-->
            
        </div><!--maincontent-->
        
                
     	</div><!--mainwrapperinner-->
    </div><!--mainwrapper-->
	<!-- END OF MAIN CONTENT -->
    

</body>

</html>