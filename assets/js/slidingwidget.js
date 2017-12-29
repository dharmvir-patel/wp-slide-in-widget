jQuery(function($)
{
 $(".dv-slide").click(function(){
    $(".dv-slide-in .textwidget").slideToggle();
    	return false;
 }); 
});

jQuery(function ($) {
    $("#clickme").toggle(function () {
        $(this).parent().animate({right:'0px'}, {queue: false, duration: 500});
    }, function () {
        $(this).parent().animate({right:'-280px'}, {queue: false, duration: 500});
    });
});