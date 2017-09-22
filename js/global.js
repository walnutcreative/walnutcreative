/* ======= Start of Doc Ready ======= */

$(document).ready(function ()
{

	/* - - - - - - - - - - - FancyBox - - - - - - - - - - - */

	$("a[rel=gallery]").fancybox({
		'transitionIn'		: 'none',
		'transitionOut'		: 'none',
		'titlePosition' 	: 'over',
		'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
		return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
		}
	});

	$(".popup").fancybox({
		'scrolling' : 'no',
		'autoScale' : false,
		'transitionIn' : 'none',
		'transitionOut' : 'none',
		'type' : 'iframe'
	});

    /* - - - - - - - - - - - Mean Menu - - - - - - - - - - - */

     $('#mobile-menu').meanmenu({
        meanScreenWidth: "700",
        meanMenuOpen: "View Menu",
        meanMenuClose: "Close Menu"
    });



     /* - - - - - - - - - - - Side Menu - - - - - - - - - - - */

	$(".side-bar-close").click(function(){
		$(".side-menu").hide("slide", {direction: "left" }, "slow");
		$(".side-bar-close").hide();
		$(".side-bar-open").show();
	});

	$(".side-bar-open").click(function(){
		$(".side-menu").show("slide", {direction: "left" }, "slow");
		$(".side-bar-open").hide();
		$(".side-bar-close").show();
	});

	$(".side-dropdown-hover").mouseenter(function(){
		$(".side-dropdown").show("slide", {direction: "up" }, "slow");
	});

	$(".side-dropdown-hover").mouseleave(function(){
		$(".side-dropdown").hide("slide", {direction: "up" }, "slow");
	});




});
