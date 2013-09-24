<script type="text/javascript" src="<?=base_url();?>admin/js/plugins/jquery-1.7.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>admin/js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>admin/js/plugins/wysiwyg/jquery.wysiwyg.js"></script>
<script type="text/javascript" src="<?=base_url();?>admin/js/plugins/wysiwyg/wysiwyg.image.js"></script>
<script type="text/javascript" src="<?=base_url();?>admin/js/plugins/wysiwyg/wysiwyg.link.js"></script>
<script type="text/javascript" src="<?=base_url();?>admin/js/plugins/wysiwyg/wysiwyg.table.js"></script>
<script type="text/javascript">
jQuery(document).ready(function() {
								
	jQuery('#wysiwyg').wysiwyg({
		controls: {
			indent: { visible: false },
			outdent: { visible: false },
			subscript: { visible: false },
			superscript: { visible: false },
			redo: { visible: false },
			undo: { visible: false },
			insertOrderedList: { visible: false },
			insertUnorderedList: { visible: false },
			insertHorizontalRule: { visible: false },
			insertTable: { visible: false },
			code: { visible: false },
			removeFormat: { visible: false },
			strikethrough: { visible: false },
			strikeThrough: { visible: false },
		}
	});
	
	jQuery('#wysiwyg2').wysiwyg({
		controls: { 
			cut: {visible: true },
			copy: { visible: true },
			paste: { visible: true }
		}
	});
});
</script>
<!--[if lt IE 9]>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->


		<div class="maincontent noright">
        	<div class="maincontentinner">
                <div class="content">
					<div class="contenttitle radiusbottom0">
						<h2 class="form"><span>Edit	About Us Page Content</span></h2>
					</div><!--contenttitle-->
					<form action="<?=base_url();?>index.php/admin/settings/editaboutdone" method="post">
					<textarea id="wysiwyg2" cols="" rows="15" name="about" ><?if(isset($val)){echo $val;}?></textarea> 
					<input class="zSubButton" type="submit" value="Submit" />
					</form>
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
