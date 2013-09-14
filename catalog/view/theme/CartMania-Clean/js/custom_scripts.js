jQuery(document).ready(function() { 

jQuery(".box .middle").css({display: "none"}); // Opera Fix 

jQuery(".box").hover(function(){ 

jQuery(this).find('.middle').css({visibility: "visible",display: "none"}).show(268);


},function(){ 

jQuery(this).find('.middle').css({visibility: "hidden"}); 

}); 

});

jQuery(document).ready(function(){

	jQuery(".hoverMenu").hover(function() {
		jQuery(this).find(".sub").css({visibility: "visible",display: "none"}).show(268);


	}, function() {
		jQuery(this).find(".sub").css({visibility: "hidden"});
	});

});

$(document).ready(function(){

	$("#content a img, #content_home a img").hover(function() {
		$(this).stop()
		.animate({opacity: 0.7}, "medium")

	}, function() {
		$(this).stop()
		.animate({opacity: 1}, "medium")
	});

});
 
function bookmark(url, title) {
	if (window.sidebar) { // firefox
    window.sidebar.addPanel(title, url, "");
	} else if(window.opera && window.print) { // opera
		var elem = document.createElement('a');
		elem.setAttribute('href',url);
		elem.setAttribute('title',title);
		elem.setAttribute('rel','sidebar');
		elem.click();
	} else if(document.all) {// ie
   		window.external.AddFavorite(url, title);
	}
}