

<script type="text/javascript" src="<?= base_url(); ?>admin/js/plugins/jquery-1.7.min.js"></script>



<div class="maincontent noright">
    <div class="maincontentinner">
        <div class="content">
            <br/><br/>
            <div class="contenttitle">
                <h2 class="form" id="vertical"><span>New Product</span></h2>
            </div>
            <form action="#" method="post" class="stdform stdform2">
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
                    <div class="stepContainer" style="height: 271px;"><div class="formwiz content" id="wiz1step3_1" style="display: block;">
                            <h2>Step 1: Basic Information</h2> <br>

                            <p>
                                <label>Product Code</label>
                                <span class="field"><input type="text" class="longinput" name="product_code"></span>
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
                                    <input type="checkbox" name="saleFlag" />&nbsp;&nbsp;&nbsp;Yes
                                </span>
                                
                            </p>
                            <p>
                                <label>Archived Product</label>
                               <span class="field">
                                    <input type="checkbox" name="archiveFlag" id="archiveFlag" />&nbsp;&nbsp;&nbsp;Yes<br/><br/>
                                    <textarea cols="80" rows="5" style="display:none;" name="location" class="mediuminput" id="archiveTexts"></textarea>
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
                                        <input class="zinput" type="file" value="" name="prodMainImage"/>
                            </div><br/>
                            <h3>Add SubImage</h3>
                            <div id ="subimg_div">
                            </div>    
                            <h5><a href="javascript:addAnother();">Click Here to Add Another</a></h5>

                        </div>
                        <div id="wiz1step3_3" class="content" style="display: none;">
                            <h2>Step 3: Product Details</h2>
                            3333333333333
                        </div>
                        <div id="wiz1step3_4" class="content" style="display: none;">
                            <h2>Step 4: Attributes Section</h2>
                            444444444444444
                        </div>
                        <div id="wiz1step3_5" class="content" style="display: none;">
                            <h2>Step 5: Assign Category</h2>
                            555555555555555555555
                        </div>
                    </div>
                    <div class="actionBar">
                        <a href="#" id="finishButt" class="buttonFinish buttonDisabled">Finish</a>
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
    $( "#subimg_div" ).append( '<div class="zFormTbl"><label style="padding: 5px !important; width: 100px;" class="zlable" >Sub Image '+totalSub+':</label><input class="zinput" type="file" value="" name="prodMainImage"'+totalSub+'/></div><br/>' );
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
