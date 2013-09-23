

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
            <form action="<?php echo base_url();?>index.php/admin/product/addNewProduct" method="post" id="myform" class="stdform stdform2" enctype="multipart/form-data">
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
                    <div class="stepContainer" style=""><div class="formwiz content" id="wiz1step3_1" style="display: block;">
                            <h2>Step 1: Basic Information</h2> <br>

                            <p>
                                <label>Product Code</label>
                                <span class="field"><input type="text" class="longinput" name="code"></span>
                            </p>

                            <p>
                                <label>Title</label>
                                <span class="field"><input type="text" class="longinput" name="title"></span>
                            </p>
                            
                            <p>
                                <label>Description</label>
                                <span class="field"><input type="text" class="longinput" name="description"></span>
                            </p>
                            <p>
                                <label>Available for Sale</label>
                               <span class="field">
                                    <input type="checkbox" name="int_available_flag" />&nbsp;&nbsp;&nbsp;Yes
                                </span>
                                
                            </p>
                            <p>
                                <label>Archived Product</label>
                               <span class="field">
                                    <input type="checkbox" name="archiveFlag" id="archiveFlag" />&nbsp;&nbsp;&nbsp;Yes<br/><br/>
                                    <textarea cols="80" rows="5" style="display:none;" name="archived_desc" class="mediuminput" id="archiveTexts"></textarea>
                                </span>
                                
                            </p>
                            <p>
                                <label>Stock Quantity</label>
                                <span class="field"><input type="text" class="longinput" name="stock_quan"></span>
                            </p>
                            <p>
                                <label>Price (in BDT)</label>
                                <span class="field"><input type="text" class="longinput" name="price"></span>
                            </p>
                        </div>
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

                        </div>
                        <div id="wiz1step3_3" class="content" style="display: none;">
                            <h2 style="margin-bottom: 10px;">Step 3: Product Details</h2>
                            <div class="zFormTbl">
                                        <input class="zinput" type="text" value="" name="field_name[]" placeholder="Field Name"/>
                                        <input class="zinput" type="text" value="" name="value_name[]" placeholder="Field Value"/>
                                        <!--<input class="stdbtn customAdd" type="button" value="Add" id="add"/><br/>-->
                            </div><br/>
							<div id ="subdet_div">
                            </div> 
							<input class="zButton" type="button" onclick="addAnother2()" value="Add Another"/>
                        </div>
                        <div id="wiz1step3_4" class="content" style="display: none;">
                            <h2>Step 4: Attributes Section</h2>
                            <br/>
							
							<table id="attribiteTbl">
								<thead>
									<th>Size</th><th>Weight</th><th>Length</th><th>Width</th><th>Height</th><th>Color</th><th>Quantity</th>
								</thead>
								<tbody>
									<tr>
										<td><input class="zinput" type="text" value="" name="size[]" placeholder=""/></td>
										<td><input class="zinput" type="text" value="" name="weight[]" placeholder=""/></td>
										<td><input class="zinput" type="text" value="" name="length[]" placeholder=""/></td>
										<td><input class="zinput" type="text" value="" name="width[]" placeholder=""/></td>
										<td><input class="zinput" type="text" value="" name="height[]" placeholder=""/></td>
										<!--
											In ctrllr, TRY TO push these 5 first.
											Get(old/new) ID.
											Use that ID to INSERT Color and quantity
											
											Algorithm:
											
											$productID = model->insertProduct&ReturnID()
											loop start 0 ... to post-data size of size[] array
												$data = size[0], weight[0], ...[0], ...[0], ...[0]
												$sizeID = model->tryToInsert&Return(old/new)SizeID('tbl_size', $data)
												$data2 = color[0], quantity[0],    
												model->insertColor('tbl_size_color', $data2, $sizeID, $productID)
											end loop
											
										-->
										<td><input class="zinput" type="text" value="" name="color[]" placeholder=""/></td>
										<td><input class="zinput" type="text" value="" name="quantity[]" placeholder=""/></td>
									</tr>
								</tbody>
							</table>
							<input class="zButton" style="width:100px;margin-top: 30px;" type="button" onclick="addAnother4Color()" value="Add Another"/>
                        </div>
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
						#attribiteTbl tr:first-child td input
						{
							border-color: #82BB1E;
							margin-bottom: 10px;
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
						<script>
						// $("#ui-accordian-accordian-header-0").change(function() {
							//alert("");
							// var id = $(this).attr("id");
							// var items = $("." + id);
							
							// this.checked ? items.prop("checked", true) : items.prop("checked", false);
						// });
						
						// $('#mother input[type=checkbox]:checked)
						
						</script>
                        <div id="wiz1step3_5" class="content" style="display: none;">
                            <h2>Step 5: Assign Category</h2>
								<div id="tree">
									<?php
											$obj = new product();
											$obj->dynaCat();//Thats right!
									?>
								</div>
                        </div>
						<script>
							$('.chkBox').prop('checked', false);
							$('#mother .chkBox').click(function(){
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
                  <a id="finishButt" class="buttonFinish buttonDisabled" href="javascript:{}" onclick="document.getElementById('myform').submit();">Finish</a>
                        <a href="javascript:next();" id="nextButt" class="buttonNext">Next</a>
                        <a href="javascript:previous();" id="previousButt" class="buttonPrevious buttonDisabled">Previous</a></div></div>
            </form>

            <br clear="all"><br>
        </div>



    </div>

    <div class="footer">
        <p>Deshal &copy; 2012. All Rights Reserved. Designed by: <a href="#">StoneMoss II</a></p>
    </div>

</div>


</div>
</div>


<script>
    var currTab = 1;
    var totalSub = 0;
$('#archiveFlag').click(function() {
    if( $(this).is(':checked')) {
        $("#archiveTexts").show(200);
    } else {
        $("#archiveTexts").hide(200);
    }
}); 
function addAnother()
{
    totalSub = totalSub +1;
    $( "#subimg_div" ).append( '<div class="zFormTbl"><label style="padding: 5px !important; width: 100px;" class="zlable" >Sub Image '+totalSub+':</label><input class="zinput" type="file" value="" name="usersubfile[]"/></div><br/>' );
}

function addAnother2()
{
    totalSub = totalSub +1;
    // $( "#subdet_div" ).append( '<div class="zFormTbl"><input class="zinput" type="text" value="" name="field_name[]" placeholder="Field Name"/> <input class="zinput" type="text" value="" name="field_value[]" placeholder="Field Value"/><input class="zButton" type="button" value="Add" id="add"/></div><br/>' );

    $( "#subdet_div" ).append( '<div class="zFormTbl"><input class="zinput" type="text" value="" name="field_name[]" placeholder="Field Name"/> <input class="zinput" type="text" value="" name="value_name[]" placeholder="Field Value"/></div><br/>' );

}
function addAnother4Color()
{
console.log($('#attribiteTbl tr:first-child td:nth-child(1) input').val()+"piko");
var size = $('#attribiteTbl tr:first-child td:nth-child(1) input').val();
var weight = $('#attribiteTbl tr:first-child td:nth-child(2) input').val();
var length = $('#attribiteTbl tr:first-child td:nth-child(3) input').val();
var width = $('#attribiteTbl tr:first-child td:nth-child(4) input').val();
var height = $('#attribiteTbl tr:first-child td:nth-child(5) input').val();
var color = $('#attribiteTbl tr:first-child td:nth-child(6) input').val();
var quantity = $('#attribiteTbl tr:first-child td:nth-child(7) input').val();


var row = '<tr>';
	row += '<td><input class="zinput" type="text" value="'+size+'" name="size[]" placeholder=""/></td>';
	row += '<td><input class="zinput" type="text" value="'+weight+'" name="weight[]" placeholder=""/></td>';
	row += '<td><input class="zinput" type="text" value="'+length+'" name="length[]" placeholder=""/></td>';
	row += '<td><input class="zinput" type="text" value="'+width+'" name="width[]" placeholder=""/></td>';
	row += '<td><input class="zinput" type="text" value="'+height+'" name="height[]" placeholder=""/></td>';

	row += '<td><input class="zinput" type="text" value="'+color+'" name="color[]" placeholder=""/></td>';
	row += '<td><input class="zinput" type="text" value="'+quantity+'" name="quantity[]" placeholder=""/></td>';
row += '</tr>';
$( "#attribiteTbl tbody" ).append( row );

}
function next()
{
    if(currTab == 5)
    {
        $("#nextButt").addClass("buttonDisabled");
        $("#previousButt").removeClass("buttonDisabled");
        $("#finishButt").removeClass("buttonDisabled");
    }
    else
    {
        $("#wiz1step3_a"+currTab).removeClass("selected");
        $("#wiz1step3_a"+currTab).addClass("disabled");
        $("#wiz1step3_"+currTab).hide(200);
        currTab = currTab+1;
        $("#wiz1step3_"+currTab).show(200);
        $("#wiz1step3_a"+currTab).removeClass("disabled");
        $("#wiz1step3_a"+currTab).addClass("selected");
        if(currTab == 5)
        {
            $("#nextButt").addClass("buttonDisabled");
            $("#previousButt").removeClass("buttonDisabled");
            $("#finishButt").removeClass("buttonDisabled");
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
    if(currTab == 1)
    {
        $("#previousButt").addClass("buttonDisabled");
        $("#nextButt").removeClass("buttonDisabled");
        $("#finishButt").addClass("buttonDisabled");
    }
    else
    {
        $("#wiz1step3_a"+currTab).removeClass("selected");
        $("#wiz1step3_a"+currTab).addClass("disabled");
        $("#wiz1step3_"+currTab).hide(200);
        currTab = currTab-1;
        $("#wiz1step3_a"+currTab).removeClass("disabled");
        $("#wiz1step3_a"+currTab).addClass("selected");
        $("#wiz1step3_"+currTab).show(200);
        if(currTab == 1)
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
