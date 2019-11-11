// $(document).scroll(function () {
//   var $nav = $(".fixed-top");
//   $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
// });

function scrollToAnchor(aid) {
  var aTag = $("div[id='"+ aid +"']");
  $('html,body').animate({scrollTop: aTag.offset().top},'slow');
}
// Navbar button scroll
$("#sks_nav").click(function() {
   scrollToAnchor('sks');
});

$("#about_nav").click(function() {
   scrollToAnchor('about');
});

$("#courses_nav").click(function() {
   scrollToAnchor('courses');
});

// Home page button scroll
$("#sks_link").click(function() {
   scrollToAnchor('sks');
});

$("#about_link").click(function() {
   scrollToAnchor('about');
});

$("#courses_link").click(function() {
   scrollToAnchor('courses');
});

$(window).scroll(function() {
    var height = $(window).scrollTop();
    if (height > 850) {
        $('#to-top').fadeIn();
    } else {
        $('#to-top').fadeOut();
    }
});
$(document).ready(function() {
    $("#to-top").click(function(event) {
        event.preventDefault();
        $("html, body").animate({ scrollTop: 0 }, "slow");
        return false;
    });

});
