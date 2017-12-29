jQuery(function ($) {
	var widgetWidth = $("#slideout").outerWidth();
    $("#clickme").toggle(function () {
        $(this).parent().animate({right:'0px'}, {queue: false, duration: 500});
    }, function () {
        $(this).parent().animate({right:'-'+widgetWidth+'px'}, {queue: false, duration: 500});
    });
});