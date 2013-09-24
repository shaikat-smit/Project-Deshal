<script type="text/javascript" src="<?=base_url();?>admin/js/custom/widgets.js"></script>    
        <div class="maincontent noright">
        	<div class="maincontentinner">
            	
                <ul class="maintabmenu">
                	<li class="current"><a href="#">Products</a></li>
                </ul><!--maintabmenu-->
                
				
				 <div class="widgetcontent padding0">
                            <div id="tabs">
                                <ul>
                                    <li><a href="#tabs-1">Active</a></li>
                                    <li><a href="#tabs-2">Archived</a></li>
                                </ul>
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
				<div id="tabs-1">
				<div class="content">
                
                <div class="contenttitle radiusbottom0">
                	<h2 class="table"><span>Product Table</span></h2>
                </div><!--contenttitle-->
				
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
                            <th class="head1">Title</th>
                            <th class="head0">Price</th>
                            <th class="head0">Amount</th>
                            <th class="head1">Action</th>
                            <!--<th class="head1">Actions</th>-->
                        </tr>
                    </thead>
                    <tbody>
					<?php foreach ($query->result() as $row)
					{if($row->archive == 0)
					{
					?>
                        <tr>
                            <td class="center"><?=$row->code?></td>
                            <td class="center"><?=$row->title?></td>
                            <td class="center"><?=$row->price?></td>
                            <td class="center"><?=$row->stock_available?></td>
                            <td class="center"><a href="<?=base_url();?>index.php/admin/product/edit_product/<?=$row->id?>" class="edit">Edit</a>&nbsp;|&nbsp;<a href="<?=base_url();?>index.php/admin/product/deleteProducts/<?=$row->id?>" class="">Delete</a></td>
                            <!--<td class="center">X</td>-->
                        </tr>
					<?}}?>
					<tr>
						<td colspan='5' class="paginationLinks" style="padding: 32px 0; text-align: right;"> <?php echo $pages;?> </td>
					</tr>
                    </tbody>
                </table>
                </div>
				</div><!---content-->
				<div id="tabs-2">
				<div class="content">
                
                <div class="contenttitle radiusbottom0">
                	<h2 class="table"><span>Product Table</span></h2>
                </div><!--contenttitle-->
				
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
                            <th class="head1">Title</th>
                            <th class="head0">Price</th>
                            <th class="head0">Amount</th>
                            <th class="head1">Action</th>
                            <!--<th class="head1">Actions</th>-->
                        </tr>
                    </thead>
                    <tbody>
					<?php foreach ($query->result() as $row)
					{if($row->archive == 1)
					{
					?>
                        <tr>
                            <td class="center"><?=$row->code?></td>
                            <td class="center"><?=$row->title?></td>
                            <td class="center"><?=$row->price?></td>
                            <td class="center"><?=$row->stock_available?></td>
                            <td class="center">
							<a href="<?=base_url();?>index.php/admin/product/edit_product/<?=$row->id?>" class="edit">Edit</a>&nbsp;|&nbsp;<a href="<?=base_url();?>index.php/admin/product/deleteProducts/<?=$row->id?>" class="">Delete</a>
							</td>
                            <!--<td class="center">X</td>-->
                        </tr>
					<?}}?>
					<tr>
						<td colspan='5' class="paginationLinks" style="padding: 32px 0; text-align: right;"> <?php echo $pages;?> </td>
					</tr>
                    </tbody>
                </table>
				</div>
			</div><!--content-->
                <br /><br />
				 </div><!--#tabs-->
            </div><!--widgetcontent-->
                
                       <br clear="all" />  
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
