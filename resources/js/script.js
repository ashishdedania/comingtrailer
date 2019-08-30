
/* back-to-top --------------------------------------*/
$(document).ready(function() {
	"use strict";
   $('span.icon-top-arrow') .click(function() {
        $('html, body').animate({
            scrollTop: 0
        });
    });
});

$(window).scroll(function() {
	"use strict";
    var scroll = $(window).scrollTop();
    if (scroll >= 450) {
        $(".icon-top-arrow").addClass("show-arrow");
    } else {
        $(".icon-top-arrow").removeClass("show-arrow");
    }
});


/* googleplay --------------------------------------*/
$(window).scroll(function() {
	"use strict";
    var scroll = $(window).scrollTop();
    if (scroll >= 20) {
        $(".m-googleplay").addClass("show-googleplay");
    } else {
        $(".m-googleplay").removeClass("show-googleplay");
    }
});






