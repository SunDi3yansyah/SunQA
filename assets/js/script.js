$(document).ready(function()
{
	var classes = new Array ('bg-black', 'bg-lime', 'bg-green', 'bg-emerald', 'bg-teal', 'bg-cyan', 'bg-cobalt', 'bg-indigo', 'bg-violet', 'bg-pink', 'bg-magenta', 'bg-crimson', 'bg-red', 'bg-orange', 'bg-amber', 'bg-yellow', 'bg-brown', 'bg-olive', 'bg-steel', 'bg-mauve', 'bg-taupe', 'bg-gray', 'bg-dark', 'bg-darker', 'bg-transparent', 'bg-darkBrown', 'bg-darkCrimson', 'bg-darkMagenta', 'bg-darkIndigo', 'bg-darkCyan', 'bg-darkCobalt', 'bg-darkTeal', 'bg-darkEmerald', 'bg-darkGreen', 'bg-darkOrange', 'bg-darkRed', 'bg-darkPink', 'bg-darkViolet', 'bg-darkBlue', 'bg-lightBlue', 'bg-lightRed', 'bg-lightGreen', 'bg-lighterBlue', 'bg-lightTeal', 'bg-lightOlive', 'bg-lightOrange', 'bg-lightPink', 'bg-grayDark', 'bg-grayDarker', 'bg-grayLight', 'bg-grayLighter', 'bg-blue');
	var length = classes.length;
	var links = $('.bg-random');
	$.each(links, function(key, value) {
	    $(value).addClass(classes[Math.floor(Math.random() * length )] );
	});

	var classes = new Array ('fg-black', 'fg-lime', 'fg-green', 'fg-emerald', 'fg-teal', 'fg-cyan', 'fg-cobalt', 'fg-indigo', 'fg-violet', 'fg-pink', 'fg-magenta', 'fg-crimson', 'fg-red', 'fg-orange', 'fg-amber', 'fg-yellow', 'fg-brown', 'fg-olive', 'fg-steel', 'fg-mauve', 'fg-taupe', 'fg-gray', 'fg-dark', 'fg-darker', 'fg-transparent', 'fg-darkBrown', 'fg-darkCrimson', 'fg-darkMagenta', 'fg-darkIndigo', 'fg-darkCyan', 'fg-darkCobalt', 'fg-darkTeal', 'fg-darkEmerald', 'fg-darkGreen', 'fg-darkOrange', 'fg-darkRed', 'fg-darkPink', 'fg-darkViolet', 'fg-darkBlue', 'fg-lightBlue', 'fg-lighterBlue', 'fg-lightTeal', 'fg-lightOlive', 'fg-lightOrange', 'fg-lightPink', 'fg-lightRed', 'fg-lightGreen', 'fg-grayDark', 'fg-grayDarker', 'fg-grayLight', 'fg-grayLighter', 'fg-blue');
	var length = classes.length;
	var links = $('.fg-random');
	$.each(links, function(key, value) {
	    $(value).addClass(classes[Math.floor(Math.random() * length )] );
	});

	hContent = $(".page-content").outerHeight();
	hWindow  = $(window).outerHeight();
	if(hContent > hWindow)
	{
		$(".footer").addClass("footer-relative");
	}
	else
	{
		$(".page-content").removeClass("footer-relative");
	}

});