<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Deshal | Admin Panel</title>
<link rel="stylesheet" href="<?=base_url();?>admin/css/style.css" type="text/css" />

<!--Created By Mahmood-->
<link rel="stylesheet" href="<?=base_url();?>admin/css/mdcss.css" type="text/css" />
<!--[if IE 9]>
    <link rel="stylesheet" media="screen" href="<?=base_url();?>admin/css/ie9.css"/>
<![endif]-->

<!--[if IE 8]>
    <link rel="stylesheet" media="screen" href="<?=base_url();?>admin/css/ie8.css"/>
<![endif]-->

<!--[if IE 7]>
    <link rel="stylesheet" media="screen" href="<?=base_url();?>admin/css/ie7.css"/>
<![endif]-->
<script type="text/javascript" src="<?=base_url();?>admin/js/plugins/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>admin/js/plugins/jquery.flot.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>admin/js/plugins/jquery.flot.resize.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>admin/js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>admin/js/custom/general.js"></script>

<!--[if lt IE 9]>
	<script src="<?=base_url();?>admin/http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->

</head>

<body class="loggedin">

	<!-- START OF HEADER -->
	<hr/>
	<div class="header radius3" style="border-top-style:solid;border-top-width:10px;border-top-color:#EF1800;">
    	<div class="headerinner">
        	
            <a href="<?=base_url();?>index.php/admin/dashboard"><img style="margin-top:-18px;" src="<?=base_url();?>/image/data/logodeshal1.png" alt="" /></a>
            
              
            <div class="headright">
            	<div class="headercolumn">&nbsp;</div>
            	<div id="searchPanel" class="headercolumn">
                	<div class="searchbox">
                        <form action="#" method="post">
                            <input type="text" id="keyword" name="keyword" class="radius2" value="Search here" /> 
                        </form>
                    </div><!--searchbox-->
                </div><!--headercolumn-->
            	<div id="notiPanel" class="headercolumn">
                    <div class="notiwrapper">
                        <a href="<?=base_url();?>admin/ajax/messages.html" class="notialert radius2">5</a>
                        <div class="notibox">
                            <ul class="tabmenu">
                                <li class="current"><a href="<?=base_url();?>admin/ajax/messages.html" class="msg">Messages (2)</a></li>
                                <li><a href="<?=base_url();?>admin/ajax/activities.html" class="act">Recent Activity (3)</a></li>
                            </ul>
                            <br clear="all" />
                            <div class="loader"><img src="<?=base_url();?>admin/images/loaders/loader3.gif" alt="Loading Icon" /> Loading...</div>
                            <div class="noticontent"></div><!--noticontent-->
                        </div><!--notibox-->
                    </div><!--notiwrapper-->
                </div><!--headercolumn-->
                <div id="userPanel" class="headercolumn">
                    <a href="<?=base_url();?>admin/#" class="userinfo radius2">
                        <img src="<?=base_url();?>admin/images/avatar.png" alt="" class="radius2" />
                        <span><strong><?=$this->session->userdata('admin_name');?></strong></span>
                    </a>
                    <div class="userdrop">
                        <ul>
                            <li><a href="<?=base_url();?>admin/#">Profile</a></li>
                            <li><a href="<?=base_url();?>index.php/admin/settings">Site Settings</a></li>
                            <li><a href="<?=base_url();?>index.php/adminlog/logout">Logout</a></li>
                        </ul>
                    </div><!--userdrop-->
                </div><!--headercolumn-->
            </div><!--headright-->
        
        </div><!--headerinner-->
	</div><!--header-->
    <!-- END OF HEADER -->
        
    <!-- START OF MAIN CONTENT -->
    <div class="mainwrapper">
     	<div class="mainwrapperinner">
         	
        <div class="mainleft">
          	<div class="mainleftinner">
            
              	<div class="leftmenu">
            		<ul>
                    	<li class="current"><a href="<?=base_url();?>index.php/admin/dashboard" class="dashboard"><span>Dashboard</span></a></li>
                        <li><a nohref="#" class="widgets menudrop"><span>Categories</span></a>
							<ul>
                            	<li><a href="<?=base_url();?>index.php/admin/category"><span>Add category</span></a></li>
                            	<li><a href="<?=base_url();?>index.php/admin/category/subcat"><span>Add sub-category</span></a></li>
                                <!--<li><a href="wizard.html"><span>Modify</span></a></li>-->
                            </ul>
						</li>
						
                        <li><a nohref="#" class="dashboard menudrop"><span>Products</span></a>
							<ul>
                            	<li><a href="<?=base_url();?>index.php/admin/product"><span>Add products</span></a></li>
                            	<li><a href="<?=base_url();?>index.php/admin/product/assign"><span>Assign products</span></a></li>
                            	<!--<li><a href="<?=base_url();?>index.php/admin/product/assignint"><span>Assign Int. products</span></a></li>-->
                            	<li><a href="<?=base_url();?>index.php/admin/product/unassign"><span>Unassign products</span></a></li>
                            	<li><a href="<?=base_url();?>index.php/admin/product/ViewProducts"><span>View products</span></a></li>
                            </ul>
						</li>
                      <li><a href="<?=base_url();?>index.php/admin/under_cons" class="dashboard"><span>Reports</span></a></li>
                        <li><a href="<?=base_url();?>index.php/admin/under_cons" class="dashboard menudrop"><span>Sales</span></a>
							<ul>
                            	<li><a href="<?=base_url();?>index.php/admin/under_cons"><span>Orders</span></a></li>
                            	<li><a href="<?=base_url();?>index.php/admin/under_cons"><span>Returns</span></a></li>
                                <li><a href="<?=base_url();?>index.php/admin/under_cons"><span>Customers</span></a>
									
								</li>
                                <li><a href="<?=base_url();?>index.php/admin/under_cons"><span>Offers</span></a></li>
                                <li><a href="<?=base_url();?>index.php/admin/under_cons"><span>Discounts</span></a></li>
                                <li><a href="<?=base_url();?>index.php/admin/under_cons"><span>Modify</span></a></li>
                            </ul>
						</li>
						</li>
                    </ul>
                        
                </div><!--leftmenu-->
            	<!--<div id="togglemenuleft"><a></a></div>-->
            </div><!--mainleftinner-->
        </div><!--mainleft-->
        
<script>
jQuery( document ).ready(function() {
    //console.log( "ready!" );
	jQuery('.theme').css('display', 'none');
});
</script>