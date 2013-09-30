<div id="footer" class="wrapper">
			<div class="container">
				<div id="site_info">
					<div id="footer_menu">
						<div class="menu-footer-container">
							<ul id="menu-footer" class="menu">
								<!--
								<li id="menu-item-52" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-18 current_page_item menu-item-52">
									<a href="index.html">Home</a>
								</li>
								<li id="menu-item-56" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-56">
									<a href="store/index.html">Store</a>
								</li>
								<li id="menu-item-53" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-53">
									<a href="blog/index.html">Blog</a>
								</li>
								<li id="menu-item-54" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-54">
									<a href="full-width/index.html">Full Width</a>
								</li>
								<li id="menu-item-55" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-55">
									<a href="kitchen-sink/index.html">Kitchen Sink</a>
								</li>
								<li id="menu-item-155" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-155">
									<a href="contact/index.html">Contact</a>
								</li>
								-->
								<li class="menu-item menu-item-type-post_type menu-item-object-page">
									<a href="<?=base_url();?>index.php/aboutus">About Us</a>
								</li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page">
									<a href="<?=base_url();?>index.php/privacy_policy">Privacy Policy</a>
								</li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page">
									<a href="<?=base_url();?>index.php/terms">Terms &amp; Conditions</a>
								</li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page">
									<a href="<?=base_url();?>index.php/contact">Contact Us</a>
								</li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page">
									<a href="<?=base_url();?>index.php/sitemap">Site Map</a>
								</li>
								
							</ul>
						</div>
						<div class="clear"></div>
					</div>
						
				</div>
				
								<div id="socnets">
					<div id="socnets_inner">
												<a href="<?=$settings->fb_link?>" title="Facebook" class="socnet-facebook"></a>
												<a href="<?=$settings->twitter_link?>" title="Twitter" class="socnet-twitter"></a>
												<a href="<?=$settings->flicker_link?>" title="Flickr" class="socnet-flickr"></a>
												<!--
													<a href="#" title="Google+" class="socnet-google"></a>
													<a href="#" title="Forrst" class="socnet-forrst"></a>
													<a href="#" title="Dribbble" class="socnet-dribbble"></a>
													<a href="#" title="Tumblr" class="socnet-tumblr"></a>
													<a href="#" title="Vimeo" class="socnet-vimeo"></a>
													<a href="#" title="YouTube" class="socnet-youtube"></a>
													<a href="#" title="Pinterest" class="socnet-pinterest"></a>
													<a href="#" title="Foursquare" class="socnet-foursquare"></a>
												-->
												<div class="clear"></div>
					</div>
				</div>
								
				<div class="clear"></div>
			</div>
		</div>
		<script type="text/javascript">
/* <![CDATA[  */ 
jQuery(document).ready(function($){

	 
	jQuery(function($) {
		$(window).load(function(){
			// retina logo
			var screenImage = $(".retina_logo");
			var theImage = new Image();
			theImage.src = screenImage.attr("src");
			var imageWidth = theImage.width;
			var imageHeight = theImage.height;
			$('.retina_logo').css('width',imageWidth).css('height',imageHeight).fadeIn().css('display','block');
		});
	});
	
	// load mobile menu
	$('#main_menu ul.menu').mobileMenu();
	
    if (!$.browser.opera) {
        $('select.select-menu').each(function(){
            var title = $(this).attr('title');
            if( $('option:selected', this).val() != ''  ) title = $('option:selected',this).text();
            $(this)
                .css({'z-index':10,'opacity':0,'-khtml-appearance':'none'})
                .after('<span class="select">' + title + '</span>')
                .change(function(){
                    val = $('option:selected',this).text();
                    $(this).next().text(val);
                    })
        });
    };
	
	// increase counter on add to cart
	$('.purAddToCart').ajaxComplete(function(event,request, settings) {
		if(JSON.parse(request.responseText).msgId == 0) {
			var currentCount = parseInt($('#header_cart_count').text());
			var newCount = currentCount + 1;
			$('#header_cart_count').text(newCount);
		}
	});
	
	// Children Flyout on Menu
	$("#main_menu ul li ul").css({display: "none"}); // Opera Fix
	$("#main_menu ul li").hover(function(){
		$(this).find('ul:first').css({visibility: "visible",display: "none"}).show(300);
		},function(){
		$(this).find('ul:first').css({visibility: "hidden"});
	});
	
	// show hide the searchform
	$('#search_link').click(function() {
		$("#searchform").stop().fadeToggle();
		$("#menu_wrap").stop().fadeToggle();
    });
	
	// Fancybox
	$(".lightbox").fancybox({
		'transitionIn'		: 'fade',
		'transitionOut'		: 'fade',
		'showNavArrows' 	: 'true'
	});
	
	$(".lightbox").attr('rel', 'gallery').fancybox();
	
	if(!$.browser.msie){
		// Animates new products widget on hover
		$("#recent_products").delegate("a", "mouseover mouseout", function(e) {
			if (e.type == 'mouseover') {
				$("#recent_products a").not(this).dequeue().animate({opacity: "0.5"}, 300);
			} else {
				$("#recent_products a").not(this).dequeue().animate({opacity: "1"}, 300);
			}
		});
	};
	
	// Add divs and classes
	$('<div class="clear"></div>').insertAfter('.Cart66ButtonPrimary, #Cart66AccountLogin');
	$('.Cart66UpdateTotalButton').parent().addClass('update_total_td');
	$('#couponCode').parent().addClass('add_coupon_td');
		
	// sticky header
		if ( $(window).width() > 1024) {
		$("#main_menu").sticky({topSpacing:0});
	}
	
	
	$('#login_info').click(function(){
		if($('#auth_div').hasClass('showed'))
		{
			$('#register_div').fadeOut('fast').removeClass('showed');
			$("#auth_div").fadeOut('fast').removeClass('showed');
		}
		else
		{
			$('#register_div').fadeOut('fast').removeClass('showed');
			$("#auth_div").fadeIn("fast").addClass('showed');
		}
	});
	
	$('#reg_info').click(function(){
		if($('#register_div').hasClass('showed'))
		{
			$('#auth_div').fadeOut('fast').removeClass('showed');
			$("#register_div").fadeOut('fast').removeClass('showed');
		}
		else
		{
			$('#auth_div').fadeOut('fast').removeClass('showed');
			$("#register_div").fadeIn("fast").addClass('showed');
		}
	});
	


});

/* ]]> */
</script><script type='text/javascript' src='<?=base_url()?>js/devicepx-jetpack3c94.js?ver=201332'></script>
<script type='text/javascript' src='<?=base_url()?>js/cart66-library7fc0.js?ver=1.5.1.3'></script>
	</body>

<!-- Mirrored from themes.designcrumbs.com/haute/ by HTTrack Website Copier/3.x [XR&CO'2013], Mon, 05 Aug 2013 06:42:46 GMT -->
</html>