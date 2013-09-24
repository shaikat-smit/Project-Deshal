	  
<style>
li 
{
	list-style-type: none;
}



	#main_menu {
    height: 40px;
    line-height: 40px;
    display: block;
    position: relative;
    z-index: 999;
    width: 100% !important;
}

    #main_menu .container {
        padding: 0;
        position: relative;
        border-bottom: 1px solid #E5E5E5;
    }

    #main_menu ul {
        margin: 0;
        padding: 0;
    }

        #main_menu ul li {
            margin: 0 30px 0 0;
            padding: 0 0 0;
            float: left;
        }

    #main_menu a {
        display: block;
        line-height: 40px;
        padding: 0;
        margin: 0;
        color: #909090;
    }

    #main_menu a:hover,
    #main_menu li.current-menu-item > a,
    #main_menu li.current_page_item > a,
    #main_menu li.current_page_parent > a,
    #main_menu li.current-menu-parent > a,
    #main_menu li.current-menu-ancestor > a,
    #main_menu li.current_page_ancestor > a {
        color: #252525;
        text-decoration: none;
    }



    #main_menu li li {
        padding: 5px 10px;
        margin: 0;
        width: 150px;
        line-height: 30px;
    }

    #main_menu li:hover li a {
        border: none;
        background: none;
        width: auto;
        line-height: 30px;
    }

    #main_menu ul.menu li {
        position: relative
    }

        #main_menu ul.menu li ul {
            width: auto;
            display: none;
            margin: 0 0 0 -10px;
            padding: 0;
            z-index: -10;
            float: none;
            height: auto;
            position: absolute;
            top: 40px;
            background-color: #E5E5E5;
        }
#main_menu .newCatInput, .newCatDesc
{
width: 110%;
margin: -8px;
line-height: 25px;
border: 1px solid #CFCFCF;
background-color: #FFFFFF;
-webkit-box-shadow: 0px 1px 1px 1px rgba(0, 0, 0, 0.1);
-moz-box-shadow: 0px 1px 1px 1px rgba(0, 0, 0, 0.1);
box-shadow: 0px 1px 1px 1px rgba(0, 0, 0, 0.1);
color: #4E4E4E;
font-size: 15px;
padding: 2px 8px;
}

#main_menu .newCatDesc
{
vertical-align: top;
margin: 1px -8px;
font-size: 11px;
padding: 0px 9px;
height: 57px;
width: 165px;
display: none;
}
            #main_menu ul.menu li ul li:hover ul {
                display: block;
                top: 0;
                left: 180px;
            }

            #main_menu ul.menu li ul li {
                position: relative;
                float: none;
                border-top: 1px dotted #C5C5C5;
            }

            #main_menu ul.menu li ul li:first-child {
                border: none
            }

    #main_menu ul li ul li a {
        margin: 5px 0
    }

    #main_menu ul.menu li ul li a:hover {
        border: none
    }

.particular > li > input
{
#width: 150px !important;
#margin: 5px !important;
width: 164px !important;
margin: 5px !important;
}
.particular > li > textarea
{
#margin: -4px 5px !important;
width: 164px !important;
margin: 36px -169px !important;

}


.editField
{
display: none;
}
	
</style>
      
	  
	  
<script>


	
	
	
	/*
	function addCat()
	{
		var catname = jQuery('#catname').val();
		var desc = jQuery('#desc').val();
		
		
		
		if(catname != "")
		{
			jQuery.ajax({
				//url: "<?php echo base_url();?>index.php/admin/category/addCategory",
				url: "<?php echo base_url();?>index.php/admin/category/addCatAJAX",
				type: 'POST',
				data: {
						"catname" : catname,
						"desc" : desc
					  },

				success: function(response, status, xhr)
				{
					if(response == 1)
					{
						jQuery('.msgsuccess p').text('Successfully added!');
						jQuery('.msgsuccess').show("slow");
					}
					else
					{
						jQuery('.msgerror p').text('Failed! Try again.');
						jQuery('.msgerror').show("slow");
					}
					//console.log(response);
				},      
				error: function (xhr, ajaxOptions, thrownError)
				{
					jQuery('.msgerror p').text('Failed! Try again.');
					jQuery('.msgerror').show("slow");
				}
			});
		}
		else
		{
			jQuery('.msgalert p').text('Category name field is empty!');
			jQuery('.msgalert').show("slow");
		}
	}	
	*/
	
	function addNewCat(hisMother, hisName, hisDesc)
	{
		
		
		if(hisMother != "" && hisName != "")
		{
			jQuery.ajax({
				url: "<?php echo base_url();?>index.php/admin/category/addNewCatAJAX",
				type: 'POST',
				data: {
						"hisMother" : hisMother,
						"catname" : hisName,
						"desc" : hisDesc
					  },

				success: function(response, status, xhr)
				{
					if(response >= 1)
					{
						// jQuery('#mother-'+hisMother).prepend('<a href=""> '+hisName+'</a>');//.html(hisName);
						// jQuery('#mother-'+hisMother).children('.newCatInput, .newCatDesc').hide();
						// jQuery('#mother-'+hisMother).attr('id', 'he-'+response);
						refreshCatSilent();
						jQuery('.msgsuccess p').text('Successfully added!');
						jQuery('.msgsuccess').fadeIn("slow").delay(2000).fadeOut('slow');
						
					}
					else
					{
						jQuery('.msgerror p').text('Failed! Try again.');
						jQuery('.msgerror').fadeIn("slow").delay(2000).fadeOut('slow');
					}
					//console.log(response);
				},      
				error: function (xhr, ajaxOptions, thrownError)
				{
					jQuery('.msgerror p').text('Failed! Try again.');
					jQuery('.msgerror').fadeIn("slow").delay(2000).fadeOut('slow');
				}
			});
		}
		else
		{
			jQuery('.msgalert p').text('Category name field is empty!');
			jQuery('.msgalert').fadeIn("slow").delay(2000).fadeOut('slow');
		}
	}
	
	function editCat(himself, hisName, hisDesc)
	{
		
		
		if(himself != "" && hisName != "")
		{
			jQuery.ajax({
				url: "<?php echo base_url();?>index.php/admin/category/editCatAJAX",
				type: 'POST',
				data: {
						"himself" : himself,
						"catname" : hisName,
						"desc" : hisDesc
					  },

				success: function(response, status, xhr)
				{
					if(response == 1)
					{
						jQuery('#he-'+himself).children('a').html(hisName);
						jQuery('.msgsuccess p').text('Successfully editted!');
						jQuery('.msgsuccess').fadeIn("slow").delay(2000).fadeOut('slow');
					}
					else
					{
						jQuery('.msgerror p').text('Failed! Try again.');
						jQuery('.msgerror').fadeIn("slow").delay(2000).fadeOut('slow');
					}
					//console.log(response);
				},      
				error: function (xhr, ajaxOptions, thrownError)
				{
					jQuery('.msgerror p').text('Failed! Try again.');
					jQuery('.msgerror').fadeIn("slow").delay(2000).fadeOut('slow');
				}
			});
		}
		else
		{
			jQuery('.msgalert p').text('Category name field is empty!');
			jQuery('.msgalert').fadeIn("slow").delay(2000).fadeOut('slow');
		}
	}
	
	function deleteCat(himself, hisName, hisDesc)
	{
		
		
		if(himself != "")
		{
			jQuery.ajax({
				url: "<?php echo base_url();?>index.php/admin/category/deleteCatAJAX",
				type: 'POST',
				data: {
						"himself" : himself
					  },

				success: function(response, status, xhr)
				{
					if(response == 1)
					{
						jQuery('#he-'+himself).children('a').html(hisName);
						jQuery('#he-'+himself).hide('slow');
						console.log(himself+"--");
						jQuery('.msgsuccess p').text('Successfully deleted!');
						jQuery('.msgsuccess').fadeIn("slow").delay(2000).fadeOut('slow');
					}
					else
					{
						jQuery('.msgerror p').text('Failed! Try again.');
						jQuery('.msgerror').fadeIn("slow").delay(2000).fadeOut('slow');
					}
					//console.log(response);
				},      
				error: function (xhr, ajaxOptions, thrownError)
				{
					jQuery('.msgerror p').text('Failed! Try again.');
					jQuery('.msgerror').fadeIn("slow").delay(2000).fadeOut('slow');
				}
			});
		}
		else
		{
			jQuery('.msgalert p').text('Category name field is empty!');
			jQuery('.msgalert').fadeIn("slow").delay(2000).fadeOut('slow');
		}
	}
	
	function refreshCatSilent()
	{
		
		
			jQuery.ajax({
				url: "<?php echo base_url();?>index.php/admin/category/dynaCatAdd",
				type: 'POST',

				success: function(response, status, xhr)
				{
					console.log(response);
					jQuery('#main_menu').html(response);
					
					jQuery("#main_menu ul li ul").css({display: "none"}); // Opera Fix
	jQuery("#main_menu ul li").hover(function(){
		jQuery(this).find('ul:first').css({visibility: "visible",display: "none"}).show(300);
		},function(){
		jQuery(this).find('ul:first').css({visibility: "hidden"});
		jQuery('.editField').hide('slow').parent().children('a').show('fast');
		jQuery('.newCatDesc').hide();
	});
	
	
	var CtrlDown = false;
	jQuery('.newCatInput').focusin(function() {
		jQuery(this).parent().children('.newCatDesc').show('10');
	})
	
	// .focusout(function() {
		// jQuery(this).parent().children('.newCatDesc').hide('5');
	// });
	
	
	
	
	jQuery('#main_menu li a').click(function(event) {
		//jQuery(this)
		//console.log(jQuery(this).html()); logs: <a> & <textarea>
		//console.log(jQuery(this).parent().attr('id').split("-")[1]);
		//console.log(jQuery(this).parent());
		//console.log();
		
		
	
		jQuery('.editField').hide('slow').parent().children('a').show('fast');
		jQuery('.newCatDesc').hide();
		
		jQuery(this).parent().find('ul').css({visibility: "hidden"});
		jQuery(this).hide('5').parent().children('.newCatInput, .newCatDesc').fadeIn('20').css({'z-index' : '1000'});
		jQuery(this).parent().find('.newCatInput').focus();
		
		
	
		
	});
	
	
	jQuery('.newCatInput, .newCatDesc').keydown(function(event){

		//13 -> Enter
		//17 -> Ctrl
		//46 -> Del
		
		if(event.which == 17)	CtrlDown = true;
		
		
		
	}).keyup(function(event){
		
		
		
		if(event.which == 17)	CtrlDown = false;
		
		if(event.which == 13)
		{
			//console.log('----------EDIT----------');
			if(jQuery(this).parent().hasClass('new'))
			{
				var mother = jQuery(this).parent().attr('id').split('-')[1];
				var hisName   = jQuery(this).parent().children('.newCatInput').val();
				var hisDesc   = jQuery(this).parent().children('.newCatDesc').val();
				
				//console.log("mother:"+mother+" name:"+name+" desc:"+desc);
				addNewCat(mother, hisName, hisDesc);
				
			}
			else
			{
				//console.log('UPDATE '+jQuery(this).parent().attr('id')+" HIS");
				var himself = jQuery(this).parent().attr('id').split('-')[1];
				var hisName   = jQuery(this).parent().children('.newCatInput').val();
				var hisDesc   = jQuery(this).parent().children('.newCatDesc').val();
				
				//console.log("himself:"+himself+" name:"+name+" desc:"+desc);
				editCat(himself, hisName, hisDesc);
				
			}
			
		}
		else if(CtrlDown == true && event.which == 46)
		{
			//console.log('----------DELETE----------');
			if(confirm("Are you sure you want to delete this category????"))
			{
				//console.log('UPDATE '+jQuery(this).parent().attr('id')+" HIS");
				var himself = jQuery(this).parent().attr('id').split('-')[1];
				var hisName   = jQuery(this).parent().children('.newCatInput').val();
				var hisDesc   = jQuery(this).parent().children('.newCatDesc').val();
				
				//console.log("himself:"+himself+" name:"+name+" desc:"+desc);
				deleteCat(himself, hisName, hisDesc);
			}
		}
		
	});
					
				},      
				error: function (xhr, ajaxOptions, thrownError)
				{
					jQuery('.msgerror p').text('Failed! Try again.');
					jQuery('.msgerror').show("fast");
				}
			});
		
		
	}
	










</script>

	  
        <div class="maincontent noright">
        	<div class="maincontentinner">
            	
                <ul class="maintabmenu">
                	<li class="current"><a href="dashboard.html">Category</a></li>
                </ul><!--maintabmenu-->
                
                <div class="content">
                    
                    <div class="contenttitle">
                    	<h2 class="widgets"><span>Category modification</span></h2>
                    </div><!--contenttitle-->
                    
                    <br />
                    <!--123-->
					<div class="">
						<form action="<?php echo base_url();?>index.php/admin/category/addCategory" method="POST">
							<table class="zFormTbl" style="width: 100%;">
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
									</td>
								</tr>
								<tr>
									<td class="zFormTd" id="catBox" colspan="2" style="text-align: left;">
										<!--<label class="zlable" >Category name:</label>
										<input id="catname" class="zinput" type="text" value=""/>-->
										<div id="main_menu" style="border-top:1px solid #DFDFDF; border-bottom:1px solid #DFDFDF;">
												<?php
													$obj = new category();
													$obj->dynaCatAdd();//Thats right!
												?>		
										</div>
										
																			
									</td>
									
								</tr>
								
								<tr>
									<td class="zFormTd">
										
									</td>
									<td class="zFormTd">
										<!--<textarea id="desc" class="zinput"  style="vertical-align: top;" rows="7" cols="25" value=""></textarea>-->
									</td>
								</tr>
								
								<tr>
									<td></td>
									<td>
										<!--<input class="zSubButton" type="button" value="Submit" onclick="addCat()"/>
										<input class="zButton" type="button" value="Else"/>-->
									</td>
								</tr>
							</table>
						</form>
					</div>
                    
                    
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
<script>

	// load mobile menu
	//jQuery('#main_menu ul.menu').mobileMenu();
	
	
	
	// Children Flyout on Menu
	jQuery("#main_menu ul li ul").css({display: "none"}); // Opera Fix
	jQuery("#main_menu ul li").hover(function(){
		jQuery(this).find('ul:first').css({visibility: "visible",display: "none"}).show(300);
		},function(){
		jQuery(this).find('ul:first').css({visibility: "hidden"});
		jQuery('.editField').hide('slow').parent().children('a').show('fast');
		jQuery('.newCatDesc').hide();
	});
	
	
	var CtrlDown = false;
	jQuery('.newCatInput').focusin(function() {
		jQuery(this).parent().children('.newCatDesc').show('10');
	})
	
	// .focusout(function() {
		// jQuery(this).parent().children('.newCatDesc').hide('5');
	// });
	
	
	
	
	jQuery('#main_menu li a').click(function(event) {
		//jQuery(this)
		//console.log(jQuery(this).html()); logs: <a> & <textarea>
		//console.log(jQuery(this).parent().attr('id').split("-")[1]);
		//console.log(jQuery(this).parent());
		//console.log();
		
		
	
		jQuery('.editField').hide('slow').parent().children('a').show('fast');
		jQuery('.newCatDesc').hide();
		
		jQuery(this).parent().find('ul').css({visibility: "hidden"});
		jQuery(this).hide('5').parent().children('.newCatInput, .newCatDesc').fadeIn('20').css({'z-index' : '1000'});
		jQuery(this).parent().find('.newCatInput').focus();
		
		
	
		
	});
	
	
	jQuery('.newCatInput, .newCatDesc').keydown(function(event){

		//13 -> Enter
		//17 -> Ctrl
		//46 -> Del
		
		if(event.which == 17)	CtrlDown = true;
		
		
		
	}).keyup(function(event){
		
		
		
		if(event.which == 17)	CtrlDown = false;
		
		if(event.which == 13)
		{
			//console.log('----------EDIT----------');
			if(jQuery(this).parent().hasClass('new'))
			{
				var mother = jQuery(this).parent().attr('id').split('-')[1];
				var hisName   = jQuery(this).parent().children('.newCatInput').val();
				var hisDesc   = jQuery(this).parent().children('.newCatDesc').val();
				
				//console.log("mother:"+mother+" name:"+name+" desc:"+desc);
				addNewCat(mother, hisName, hisDesc);
				
			}
			else
			{
				//console.log('UPDATE '+jQuery(this).parent().attr('id')+" HIS");
				var himself = jQuery(this).parent().attr('id').split('-')[1];
				var hisName   = jQuery(this).parent().children('.newCatInput').val();
				var hisDesc   = jQuery(this).parent().children('.newCatDesc').val();
				
				//console.log("himself:"+himself+" name:"+name+" desc:"+desc);
				editCat(himself, hisName, hisDesc);
				
			}
			
		}
		else if(CtrlDown == true && event.which == 46)
		{
			//console.log('----------DELETE----------');
			if(confirm("Are you sure you want to delete this category????"))
			{
				//console.log('UPDATE '+jQuery(this).parent().attr('id')+" HIS");
				var himself = jQuery(this).parent().attr('id').split('-')[1];
				var hisName   = jQuery(this).parent().children('.newCatInput').val();
				var hisDesc   = jQuery(this).parent().children('.newCatDesc').val();
				
				//console.log("himself:"+himself+" name:"+name+" desc:"+desc);
				deleteCat(himself, hisName, hisDesc);
			}
		}
		
	});
	
	
	
	
	
	
</script>
</html>
