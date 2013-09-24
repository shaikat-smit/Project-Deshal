<div class="wrapper" id="content"> <!-- #content ends in footer.php -->
				<div class="container">	<div class="posts-wrap" id="page">
			<div class="post-153 page type-page status-publish hentry">
			<div class="entry-content" id="page-content">
				<h2 class="post_title" style="margin-bottom: -13px !important;">Contact</h2>
				
                <div class='gf_browser_unknown gform_wrapper' id='gform_wrapper_1' >
				<span style="font-size:14px;color:red;font-weight:500;"><?php echo validation_errors(); echo "<br/>";?></span>
				<span style="font-size:14px;color:red;font-weight:500;"><?if(isset($error)){echo $error; echo "<br/>";}?></span>
				<span style="font-size:14px;color:green;font-weight:500;"><?if(isset($success)){echo $success; echo "<br/>";}?></span>
				<form action="<?=base_url();?>index.php/contact/contactus" method="post" enctype="multipart/form-data">
                        <div class='gform_heading'>
                            <span class='gform_description'>Write to us.</span>
                        </div>
                        <div class='gform_body'>
                            <ul id='gform_fields_1' class='gform_fields top_label description_below'>
							<li id='field_1_1' class='gfield               gfield_contains_required' >
								<label class='gfield_label' for='name'>Name<span class='gfield_required'>*</span></label>
								<div class='ginput_container'>
									<input name='name' id='name' type='text' value='' class='medium' tabindex='1' required/>
								</div>
							</li>
							<li id='field_1_2' class='gfield               gfield_contains_required' >
								<label class='gfield_label' for='email'>Email<span class='gfield_required'>*</span></label>
								<div class='ginput_container'>
									<input name='email' id='email' type='email' value='' class='medium'  tabindex='2'   required/>
									<span style="font-size:12px">&nbsp;&nbsp;&nbsp;&nbsp;(Enter valid Email address..)</span>
								</div>
							</li>
							<li id='field_1_2' class='gfield               gfield_contains_required' >
								<label class='gfield_label' for='sub'>Subject<span class='gfield_required'>*</span></label>
								<div class='ginput_container'>
									<input name='subject' id='subject' type='text' value='' class='medium'  tabindex='3'   required/>
								</div>
							</li>
							<li id='field_1_3' class='gfield' >
								<label class='gfield_label' for='message'>Message</label>
								<div class='ginput_container'>
									<textarea name='message' id='message' class='textarea medium' tabindex='4'   rows='10' cols='50' required></textarea>
								</div>
							</li>
                            </ul>
						</div>
        <div class='gform_footer top_label'> <input type='submit' id='gform_submit_button_1' class='button gform_button' value='Submit' tabindex='4' /><input type='hidden' name='gform_ajax' value='form_id=1&amp;title=&amp;description=1' />
            <input type='hidden' class='gform_hidden' name='is_submit_1' value='1' />
            <input type='hidden' class='gform_hidden' name='gform_submit' value='1' />
            <input type='hidden' class='gform_hidden' name='gform_unique_id' value='' />
            <input type='hidden' class='gform_hidden' name='state_1' value='WyJhOjA6e30iLCJmNzRjMTI3YjJkMmNlYWUxYmJjMGY5ZTRkZDBhZmVjZSJd' />
            <input type='hidden' class='gform_hidden' name='gform_target_page_number_1' id='gform_target_page_number_1' value='0' />
            <input type='hidden' class='gform_hidden' name='gform_source_page_number_1' id='gform_source_page_number_1' value='1' />
            <input type='hidden' name='gform_field_values' value='' />
            
        </div>
                </form>
                </div>
				<div class="clear"></div>
							</div><!-- end #page-content -->
		</div><!-- end #page -->
			</div><!-- end .posts-wrap -->
	<div id="sidebar">
		<div class="widget">  
			<h4 class="widgettitle"><span id="Cart66WidgetCartTitle">Address</span></h4>  
			<?=$settings->contact_information?>	
		</div>        
	</div>					
	<div class="clear"></div>
				</div><!-- end div.container, begins in header.php -->
			</div><!-- end div.wrapper, begins in header.php -->