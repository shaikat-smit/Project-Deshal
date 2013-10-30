<style>
    #mother ul
    {
        padding-left:35px;
        list-style:none;
    }
    #mother li
    {
        list-style:none;
    }

    .customAdd
    {
        width: 50px !important;
    }
    .customTblInput
    {
        width: 99%;
    }
    #attribiteTbl tbody input
    {
        width: 99%;
    }
    .ftd td input
    {
        border-color: #82BB1E;
        margin-top: 15px;
    }
    .tree{
        display: none;

    }
    .tree:checked ~ ul {
        display: none;
    }

    .tree ~ span {
        cursor: pointer;
    }

    .tree ~ span:before {
        content: '';
        width: 0;
        height: 0;
        position: absolute;
        margin-left: -1em;
        margin-top: 0.4em;
        border-width: 4px;
        border-style: solid;
        border-top-color: transparent;
        border-right-color: grey;
        border-bottom-color: grey;
        border-left-color: transparent;
        opacity: 1;
    }

    .tree:checked ~ span:before {
        margin-left: -0.8em;
        border-width: 5px;
        border-top-color: transparent;
        border-right-color: transparent;
        border-bottom-color: transparent;
        border-left-color: grey;
    }





</style>

<script type="text/javascript" src="<?= base_url(); ?>admin/js/plugins/jquery-1.7.min.js"></script>



<div class="maincontent noright">
    <div class="maincontentinner">
        <div class="content">
            <br/><br/>
            <div class="contenttitle">
                <h2 class="form" id="vertical"><span>New Product</span></h2>
            </div>
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



<script>
<?if(isset( $message['status']) || isset( $message['msg']))
{
	echo 'getmsg(';
	if(isset( $message['status']))
		echo $message['status'];
	echo ',';
	if(isset( $message['msg']))
		echo $message['msg']; 
	echo ');';

}
?>
</script>




                        </td>
                    </tr>
                </table>
            </div>
            
                <div class="wizard verwizard" id="wizard3">
                    <br/><br/>
                    <ul class="verticalmenu anchor">
                        <li>
                            <a href="#" id="wiz1step3_a1" class="selected" isdone="1" rel="1">
                                <span class="label">Step 1: Basic Information</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" id="wiz1step3_a2" class="disabled" isdone="0" rel="2">
                                <span class="label">Step 2: Image Section</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" id="wiz1step3_a3" class="disabled" isdone="0" rel="3">
                                <span class="label">Step 3: Product Details</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" id="wiz1step3_a4" class="disabled" isdone="0" rel="3">
                                <span class="label">Step 4: Attributes Section</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" id="wiz1step3_a5" class="disabled" isdone="0" rel="3">
                                <span class="label">Step 5: Assign Category</span>
                            </a>
                        </li>
                    </ul>
                    <div class="stepContainer" style="">
                        <form action="<?php echo base_url(); ?>index.php/admin/product/updateBasic" method="post" id="basicForm" class="stdform stdform2" enctype="multipart/form-data">
                            <?php $row=$basic->row(); ?>
                            <input type="hidden" name = "id" value="<?=$id?>">
                            <div class="formwiz content" id="wiz1step3_1" style="display: block;">
                            <h2>Step 1: Basic Information</h2> <br>

                            <p>
							
                                <label>Product Code</label>
                                <span class="field"><input type="text" class="longinput" name="code" value="<?=$row->code;?>"></span>
                            </p>

                            <p>
                                <label>Title</label>
                                <span class="field"><input type="text" class="longinput" name="title" value="<?=$row->title;?>"></span>
                            </p>

                            <p>
                                <label>Description</label>
                                <span class="field"><input type="text" class="longinput" name="description" value="<?=$row->description;?>"></span>
                            </p>
                            <p>
                                <label>Available for International Sale</label>
                                <span class="field">
                                    <?php if($row->int_available == 0){?>
                                    <input type="checkbox" name="int_available_flag" />&nbsp;&nbsp;&nbsp;Yes
                                    <?php } else{?>
                                    <input type="checkbox" name="int_available_flag" checked="checked"/>&nbsp;&nbsp;&nbsp;Yes
                                    <?php } ?>
                                </span>

                            </p>
                            <p>
                                <label>Available for Sale</label>
                                <span class="field">
                                    <?php if($row->online_sell_available == 0){?>
                                    <input type="checkbox" name="online_sell_available" />&nbsp;&nbsp;&nbsp;Yes
                                
                                    <?php } else{?>
                                    <input type="checkbox" name="online_sell_available" checked="checked"/>&nbsp;&nbsp;&nbsp;Yes
                                 <?php } ?>
                                    </span>

                            </p>
                            <p>
                                <label>Archived Product</label>
                                <span class="field">
                                    <?php if($row->archive == 0){?>
                                    <input type="checkbox" name="archiveFlag" id="archiveFlag" />&nbsp;&nbsp;&nbsp;Yes<br/><br/>
                                    <textarea cols="80" rows="5" style="display:none;" name="archived_desc" class="mediuminput" id="archiveTexts"></textarea>
                                    <?php } else{?>
                                    <input type="checkbox" name="archiveFlag" id="archiveFlag" checked="checked"/>&nbsp;&nbsp;&nbsp;Yes<br/><br/>
                                    <textarea cols="80" rows="5" name="archived_desc" class="mediuminput" id="archiveTexts"><?=$row->archived_desc;?></textarea>
                                    <?php } ?>
                                </span>

                            </p>
                            <p>
                                <label>Stock Quantity</label>
                                <span class="field"><input type="text" class="longinput" name="stock_quan" value="<?=$row->stock_available;?>"></span>
                            </p>
                            <p>
                                <label>Price (in BDT)</label>
                                <span class="field"><input type="text" class="longinput" name="price" value="<?=$row->price;?>"></span>
                            </p>
                            <div class="actionBar">
                                <a id="finishButt" class="buttonFinish" style="background:none repeat scroll 0 0 #1F8A31" href="javascript:{}" onclick="document.getElementById('basicForm').submit();">Update Basic Informations</a><br/>
                            </div>
                            <hr/>
                        </div>
                       </form>
                        <form action="<?php echo base_url(); ?>index.php/admin/product/updateImages" method="post" id="imageForm" class="stdform stdform2" enctype="multipart/form-data">
                        <div class="formwiz content" id="wiz1step3_2" style="display: none;">
                            <h2>Step 2:  Image Section</h2> <br>

                            <div class="zFormTbl">
                                <label style="padding: 5px !important; width: 100px;" class="zlable" >Main Image:</label>
                                <input class="zinput" type="file" value="" name="userfile"/>
                            </div><br/>
                            <h3>Add SubImage</h3>
                            <div id ="subimg_div">
                            </div>    
                            <h5><a href="javascript:addAnother();">Click Here to Add Another</a></h5>
                            <div class="actionBar">
                                <a id="finishButt" class="buttonFinish" style="background:none repeat scroll 0 0 #1F8A31" href="javascript:{}" onclick="document.getElementById('imageForm').submit();">Update Image Section</a><br/>
                            </div>
                            <hr/>
                        </div>
                        </form>
                        <form action="<?php echo base_url(); ?>index.php/admin/product/updateDetails" method="post" id="detailsForm" class="stdform stdform2" enctype="multipart/form-data">
                        <div id="wiz1step3_3" class="content" style="display: none;">
                            <input type="hidden" name = "id" value="<?=$id?>">
                            <h2 style="margin-bottom: 10px;">Step 3: Product Details</h2>
                            <?php foreach ($info->result() as $row) {?>
                            <div class="zFormTbl">
                                <input class="zinput" type="text" value="<?=$row->field_name?>" name="field_name[]"/>
                                <input class="zinput" type="text" value="<?=$row->field_value?>" name="value_name[]"/>
                                <!--<input class="stdbtn customAdd" type="button" value="Add" id="add"/><br/>-->
                            </div><br/>
                            <?php } ?>
                            <div class="zFormTbl">
                                <input class="zinput" type="text" value="" name="field_name[]" placeholder="Field Name"/>
                                <input class="zinput" type="text" value="" name="value_name[]" placeholder="Field Value"/>
                                <!--<input class="stdbtn customAdd" type="button" value="Add" id="add"/><br/>-->
                            </div><br/>
                            <div id ="subdet_div">
                            </div> 
                            <input class="zButton" type="button" onclick="addAnother2()" value="Add Another"/>
                            <div class="actionBar">
                                <a id="finishButt" class="buttonFinish" style="background:none repeat scroll 0 0 #1F8A31" href="javascript:{}" onclick="document.getElementById('detailsForm').submit();">Update Product Details</a><br/>
                            </div>
                            <hr/>
                        </div>
                        </form>
                        <form action="<?php echo base_url(); ?>index.php/admin/product/updateAttributes" method="post" id="attributesForm" class="stdform stdform2" enctype="multipart/form-data">
                        <div id="wiz1step3_4" class="content" style="display: none;">
                            <h2>Step 4: Attributes Section</h2>
                            <br/>
                            <input type="hidden" name = "id" value="<?=$id?>">
                            <table id="attribiteTbl">
                                <thead>
                                <th>Size</th><th>Weight</th><th>Length</th><th>Width</th><th>Height</th><th>Color</th><th>Quantity</th><th></th>
                                </thead>
                                <tbody>
                                    <?=$attribute;?>
                                </tbody>
                            </table>
                            <input class="zButton" style="float:right; width:50%;margin-top: 30px;" type="button" onclick="addAnother4Color('-')" value="Add Another Size"/>
                            <div class="actionBar">
                                <a id="finishButt" class="buttonFinish" style="background:none repeat scroll 0 0 #1F8A31" href="javascript:{}" onclick="document.getElementById('attributesForm').submit();">Update Attributes</a><br/>
                            </div>
                            <hr/>
                        </div>
                        </form>
                        
                        
                        <form action="<?php echo base_url(); ?>index.php/admin/product/updateCategoryAndTags" method="post" id="categoryForm" class="stdform stdform2" enctype="multipart/form-data">
                        <div id="wiz1step3_5" class="content" style="display: none;">
                            <h2>Step 5: Assign Category</h2>
							
							<input type="hidden" name = "id" value="<?=$id?>">
                            <div id="tree">
                                <?php
                                $obj = new product();
								if(isset($cats))
									$obj->dynaCatEdit("", $cats); //checked loading
								else
									$obj->dynaCatEdit(); //Thats right!
                                ?>
                            </div>
							
							
							
								<div id="assignTags">
									<h2 style="margin: 27px 0px 4px 0px;">Assign Tags</h2>
									<div id="tagContainer">
										<?php
										
											if(isset($tags))
											{
												
												$TagCounter = 0;
												for ($i=0; $i<count($tags); $i++)
												{
													$Tag = $tags[$i]->tag_name;
												
													$newChild  = '<span id="tag-'. $TagCounter .'" class="tagSpan">'.$Tag.'';
													$newChild .= '<span id="cross-'. $TagCounter++ .'" class="tagCross">&#215;</span>';
													$newChild .= '<input type="hidden" name="tags[]" value="'.$Tag.'"/>';
													$newChild .= '</span> ';
													
													echo $newChild;
													//echo $tags[$i]->id; echo '<br/>';
												}
												
											}
										?>
										
										
									</div>
									
									
									<input id="tagInput" type="text" value="" placeholder="Type tag names"/>
									
									
									
									
									<script>
										var TagCounter = $('.tagSpan').length;
										$( "#tagInput" ).keyup(function( event ) {
										  if ( event.which == 13 ) //Enter
											{
												$('#tagContainer').show();
												var Tag = $('#tagInput').val();
												
												var newChild  = '<span id="tag-'+ TagCounter +'" class="tagSpan">'+Tag+'';
													newChild += '<span id="cross-'+ TagCounter++ +'" class="tagCross">&#215;</span>';
													newChild += '<input type="hidden" name="tags[]" value="'+Tag+'"/>';
													newChild +=	'</span> ';
													
												$('#tagContainer').append(newChild);
												$('#tagInput').attr('value', '');
												
												
												$('.tagCross').click(function(event){
													
													$('#tag-'+event.target.id.split('-')[1]).remove();
													if($('#tagContainer').has('.tagspan').length == 0)
														$('#tagContainer').hide('fast');
													
													console.log('#tag-'+event.target.id.split('-')[1]);
												});
											event.preventDefault();
											return false;
											}
											
										});
										
										$('.tagCross').click(function(event){
													
											$('#tag-'+event.target.id.split('-')[1]).remove();
											if($('#tagContainer').has('.tagspan').length == 0)
												$('#tagContainer').hide('fast');
											
											console.log('#tag-'+event.target.id.split('-')[1]);
										});
										
$(document).ready(function() {
  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
});
										
									</script>
								</div> <!--#assignTags-->
								
								<div class="actionBar">
									<a id="finishButt" class="buttonFinish" style="background:none repeat scroll 0 0 #1F8A31" href="javascript:{}" onclick="document.getElementById('categoryForm').submit();">Update Categories & Tags</a><br/>
								</div>
								
								
								 <hr/>
                        </div>
						<script>
							//$('.chkBox').prop('checked', false);
							$('#mother .chkBox').click(function(){
								//console.log('event');
								console.log($(this).is(':checked'));
								//$(this).
								var bull = $(this).is(':checked');
								$(this).parent().find('.chkBox').prop('checked', bull);
								//console.log($(this).parent().children('.chkBox').html());
								
							});
							
							
							$('.tree ~ span').click(function() {
                                if($(this).find('~ ul').css('display') == 'none')
								{
									$(this).find('~ ul').show('fast');
									$(this).toggleClass('toggleTree');
								}
								else
								{
									$(this).find('~ ul').hide('fast');
									$(this).toggleClass('toggleTree');
								}
									
                            });
							$('#mother li:not(:has(ul))  span').remove();//icon removal
							
						</script>
						
													
<style>
.toggleTree:before
{
transform: rotateZ(-45deg);
-webkit-transform: rotateZ(-45deg);
-moz-transform: rotateZ(-45deg);
-o-transform: rotateZ(-45deg);
}
#tagContainer
{
#border: 1px solid #A3A3A3;
width: 400px;
padding: 4px 2px;
margin-bottom: 10px;
}
.tagSpan
{
background-color: #ECECEC;
border-radius: 4px;
border: 1px solid #929292;
padding: 0px 4px;
margin: 1px 3px;
display: inline-block;
}
.tagCross
{
border-left: 1px solid #BFBFBF;
padding-left: 4px;
margin-left: 3px;
cursor: pointer;
}
</style>
							
							
                            
                           
                        </div>
                        </form>
                        <script>
                            //$('.chkBox').prop('checked', false);
                            $('#mother .chkBox').click(function() {
                                //console.log('event');
                                console.log($(this).is(':checked'));
                                //$(this).
                                var bull = $(this).is(':checked');
                                $(this).parent().find('.chkBox').prop('checked', bull);
                                //console.log($(this).parent().children('.chkBox').html());

                            });
                            // $('#mother li:not(.chkBox)').click(function(){
                            // alert('ss');
                            // });

                        </script>
                    </div>
                    <div class="actionBar">
                        <a href="javascript:next();" id="nextButt" class="buttonNext">Next</a>
                        <a href="javascript:previous();" id="previousButt" class="buttonPrevious buttonDisabled">Previous</a>
                    </div>
                </div>
            </form>

            <br clear="all"><br>
        </div>



    </div>

    <div class="footer">
        <p>Deshal &copy; 2012. All Rights Reserved. Designed by: <a href="http://www.stonemossit.com">Stone-Moss IT</a></p>
    </div>

</div>


</div>
</div>


<script type="text/javascript">
    
    function change1(id)
    {
        $('.'+id).val($('#'+id).val()); 
    }
    function deleteSizeColorRow(id)
    {
        $("."+id).closest('tr').remove();
    }
    function deleteColor(id)
    {
        $("#"+id).closest('tr').remove();
    }
    function getmsg(status, msg)
    {
        if (status == 1)
        {
            $('.msgsuccess p').text(msg);
            $('.msgsuccess').show("slow");
            //console.log(msg+" f ");

        }
        else if (status == 0)
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
var currTab = 1;
var totalSub = 0;
var totsize = 1;
var totColor = 0;
$('#archiveFlag').click(function() {
    if ($(this).is(':checked')) {
        $("#archiveTexts").show(200);
    } else {
        $("#archiveTexts").hide(200);
    }
});
function addAnother()
{
    totalSub = totalSub + 1;
    $("#subimg_div").append('<div class="zFormTbl"><label style="padding: 5px !important; width: 100px;" class="zlable" >Sub Image ' + totalSub + ':</label><input class="zinput" type="file" value="" name="usersubfile[]"/></div><br/>');
}

function addAnother2()
{
    totalSub = totalSub + 1;
    // $( "#subdet_div" ).append( '<div class="zFormTbl"><input class="zinput" type="text" value="" name="field_name[]" placeholder="Field Name"/> <input class="zinput" type="text" value="" name="field_value[]" placeholder="Field Value"/><input class="zButton" type="button" value="Add" id="add"/></div><br/>' );

    $("#subdet_div").append('<div class="zFormTbl"><input class="zinput" type="text" value="" name="field_name[]" placeholder="Field Name"/> <input class="zinput" type="text" value="" name="value_name[]" placeholder="Field Value"/></div><br/>');

}
function addAnother4Color(flag)
{
    if(flag == '-')
    {
        totsize = totsize + 1;
//        console.log($('#attribiteTbl tr:first-child td:nth-child(1) input').val() + "piko");
//        var size = $('#attribiteTbl tr:first-child td:nth-child(1) input').val();
//        var weight = $('#attribiteTbl tr:first-child td:nth-child(2) input').val();
//        var length = $('#attribiteTbl tr:first-child td:nth-child(3) input').val();
//        var width = $('#attribiteTbl tr:first-child td:nth-child(4) input').val();
//        var height = $('#attribiteTbl tr:first-child td:nth-child(5) input').val();
//        var color = $('#attribiteTbl tr:first-child td:nth-child(6) input').val();
//        var quantity = $('#attribiteTbl tr:first-child td:nth-child(7) input').val();


        var row = '<tr class="ftd" id="l'+totsize+'">';
        row += '<td><input class="zinput" type="text" id="lx'+totsize+'" onkeyup="change1(\'lx'+totsize+'\');" value="" name="size[]"/></td>';
        row += '<td><input class="zinput" type="text" id="lx'+totsize+'_1" onkeyup="change1(\'lx'+totsize+'_1\');"  value="" name="weight[]"/></td>';
        row += '<td><input class="zinput" type="text" id="lx'+totsize+'_2" onkeyup="change1(\'lx'+totsize+'_2\');"  value="" name="length[]"/></td>';
        row += '<td><input class="zinput" type="text" id="lx'+totsize+'_3" onkeyup="change1(\'lx'+totsize+'_3\');"  value="" name="width[]"/></td>';
        row += '<td><input class="zinput" type="text" id="lx'+totsize+'_4" onkeyup="change1(\'lx'+totsize+'_4\');"  value="" name="height[]"/></td>';

        row += '<td><input class="zinput" type="text" value="" name="color[]"/></td>';
        row += '<td><input class="zinput" type="text" value="" name="quantity[]"/></td>';
        row += '<td class="dscl'+totsize+'"><a href="javascript:addAnother4Color(\'l'+totsize+'\');">&nbsp;Add&nbsp;Color</a>&nbsp;|&nbsp;<a href="javascript:deleteSizeColorRow(\'dscl'+totsize+'\');">Delete</a></td>';
        row += '</tr>';
        $("#attribiteTbl tbody").append(row);
    }
    else
    {
        totColor = totColor+1;
        var size = $('#'+flag+' td:nth-child(1) input').val();
        var weight = $('#'+flag+' td:nth-child(2) input').val();
        var length = $('#'+flag+' td:nth-child(3) input').val();
        var width = $('#'+flag+' td:nth-child(4) input').val();
        var height = $('#'+flag+' td:nth-child(5) input').val();
        var row = '<tr>';
        row += '<td><input class="zinput lx'+totsize+'" style="display:none" type="text" value="' + size + '" name="size[]" placeholder=""/></td>';
        row += '<td><input class="zinput lx'+totsize+'_1" style="display:none" type="text" value="' + weight + '" name="weight[]" placeholder=""/></td>';
        row += '<td><input class="zinput lx'+totsize+'_2" style="display:none" type="text" value="' + length + '" name="length[]" placeholder=""/></td>';
        row += '<td><input class="zinput lx'+totsize+'_3" style="display:none" type="text" value="' + width + '" name="width[]" placeholder=""/></td>';
        row += '<td><input class="zinput lx'+totsize+'_4" style="display:none" type="text" value="' + height + '" name="height[]" placeholder=""/></td>';

        row += '<td><input class="zinput" type="text" name="color[]"/></td>';
        row += '<td><input class="zinput" type="text" name="quantity[]"/></td>';
        row += '<td class="dsc'+flag+'" id="dc'+totColor+'">&nbsp;<a href="javascript:deleteColor(\'dc'+totColor+'\');">Delete Color</a></td>';
        row += '</tr>';
        //$("#attribiteTbl tbody").append(row);
        $( '#'+flag+'').after( row );
        //alert(size);
    }
}
function next()
{
    if (currTab == 5)
    {
        $("#nextButt").addClass("buttonDisabled");
        $("#previousButt").removeClass("buttonDisabled");
        $("#finishButt").removeClass("buttonDisabled");
		
		$('#mother li').find('ul').hide('slow');
		$('#mother li').find('> span').toggleClass('toggleTree');
    }
    else
    {
        $("#wiz1step3_a" + currTab).removeClass("selected");
        $("#wiz1step3_a" + currTab).addClass("disabled");
        $("#wiz1step3_" + currTab).hide(200);
        currTab = currTab + 1;
        $("#wiz1step3_" + currTab).show(200);
        $("#wiz1step3_a" + currTab).removeClass("disabled");
        $("#wiz1step3_a" + currTab).addClass("selected");
        if (currTab == 5)
        {
            $("#nextButt").addClass("buttonDisabled");
            $("#previousButt").removeClass("buttonDisabled");
            $("#finishButt").removeClass("buttonDisabled");
			
			
			$('#mother li').find('ul').hide('slow');
			$('#mother li').find('> span').toggleClass('toggleTree');
        }
        else
        {
            $("#finishButt").addClass("buttonDisabled");
            $("#previousButt").removeClass("buttonDisabled");
            $("#nextButt").removeClass("buttonDisabled");
        }
    }
}
function previous()
{
    if (currTab == 1)
    {
        $("#previousButt").addClass("buttonDisabled");
        $("#nextButt").removeClass("buttonDisabled");
        $("#finishButt").addClass("buttonDisabled");
    }
    else
    {
        $("#wiz1step3_a" + currTab).removeClass("selected");
        $("#wiz1step3_a" + currTab).addClass("disabled");
        $("#wiz1step3_" + currTab).hide(200);
        currTab = currTab - 1;
        $("#wiz1step3_a" + currTab).removeClass("disabled");
        $("#wiz1step3_a" + currTab).addClass("selected");
        $("#wiz1step3_" + currTab).show(200);
        if (currTab == 1)
        {
            $("#previousButt").addClass("buttonDisabled");
            $("#nextButt").removeClass("buttonDisabled");
            $("#finishButt").addClass("buttonDisabled");
        }
        else
        {
            $("#finishButt").addClass("buttonDisabled");
            $("#previousButt").removeClass("buttonDisabled");
            $("#nextButt").removeClass("buttonDisabled");
        }
    }
    

}
</script>
</body>

</html>
