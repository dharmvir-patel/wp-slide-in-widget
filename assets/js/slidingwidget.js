jQuery(function ($) {
	var widgetWidth = $("#slideout").outerWidth();
	//right side widget.
    $("#clickme.right").toggle(function () {
        $(this).parent().animate({right:'0px'}, {queue: false, duration: 500});
    }, function () {
        $(this).parent().animate({right:'-'+widgetWidth+'px'}, {queue: false, duration: 500});
    });
    //left side widget.
    $("#clickme.left").toggle(function () {
        $(this).parent().animate({left:'0px'}, {queue: false, duration: 500});
    }, function () {
        $(this).parent().animate({left:'-'+widgetWidth+'px'}, {queue: false, duration: 500});
    });
});