$(document).scroll(function () {
  var $nav = $(".fixed-top");
  $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
});

function scrollToAnchor(aid) {
  var aTag = $("div[id='"+ aid +"']");
  $('html,body').animate({scrollTop: aTag.offset().top},'slow');
}

$("#link_about").click(function() {
   scrollToAnchor('aboutus');
});

$("#tier2_link").click(function() {
   scrollToAnchor('t2course');
});

$("#tier3_link").click(function() {
   scrollToAnchor('t3course');
});

$("#sec_tier2_link").click(function() {
   scrollToAnchor('t2course');
});

$("#sec_tier3_link").click(function() {
   scrollToAnchor('t3course');
});

function scrollupToAnchor(aid){
  var aTag = $("div[id='"+ aid +"']");
  $('html,body').animate({scrollTop: 0},'slow');
}

$("#to_top_link").click(function() {
   scrollupToAnchor('hero-section');
});
