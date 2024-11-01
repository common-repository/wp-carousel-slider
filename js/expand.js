jQuery(document).ready(function(){
	jQuery(".toggle_container").hide();
	jQuery("h2.expand_heading").toggle(function(){
		jQuery(this).addClass("active"); 
		}, function () {
		jQuery(this).removeClass("active");
	});
	jQuery("h2.expand_heading").click(function(){
		jQuery(this).next(".toggle_container").slideToggle("slow");
	});
	jQuery(".expand_all").toggle(function(){
		jQuery(this).addClass("expanded"); 
		}, function () {
		jQuery(this).removeClass("expanded");
	});
	jQuery(".expand_all").click(function(){
		jQuery(".toggle_container").slideToggle("slow");
	});
});