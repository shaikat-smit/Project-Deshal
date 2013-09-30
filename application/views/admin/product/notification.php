 <html>
<body>
	<div class="maincontent">
        	<div class="maincontentinner">
            	
                <ul class="maintabmenu">
                	<li class="current"><a href="<dashboard.html">Dashboard</a></li>
                </ul><!--maintabmenu-->
                
                <div class="content" style="height:550px;">
                    <?php if($status == 1){ ?>
			<h1 style="color:#309B35;"><?=$notification;?></h1>
                    <?php }else {?>
                        <h1 style="color:#C33B3B;"><?=$notification;?></h1>
                    <?php } ?>
                <!--	<ul class="widgetlist">
                    	<li><a href="<?=base_url();?>admin/under_cons.php" class="events">Latest Events</a></li>
                    	<li><a href="<?=base_url();?>admin/under_cons.php" class="message">New Message</a></li>
                        <li><a href="<?=base_url();?>admin/under_cons.phpl" class="upload">Upload Image</a></li>
                    	<li><a href="<?=base_url();?>admin/under_cons.php" class="events">Statistics</a></li>
                    	<li><a href="<?=base_url();?>admin/under_cons.php" class="message">New Message</a></li>
                    </ul>
                   -->
                    <br clear="all" /><br />

                    
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
