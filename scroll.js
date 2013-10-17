function scrollToAnchor(aid){
    var aTag = $("a[name='"+ aid +"']");
    $('html,body').animate({scrollTop: aTag.offset().top},'slow');
}
$("#about").click(function() {
   scrollToAnchor('about');
});

$("#services").click(function() {
   scrollToAnchor('services');
});

$("#store").click(function() {
   scrollToAnchor('store');
});
$("#navcontact").click(function() {
   scrollToAnchor('contact');
});

$("#top").click(function() {
   scrollToAnchor('top');
});
$("#view").click(function() {
   scrollToAnchor('servicestwo');
});


$("#signupone").click(function() {
   scrollToAnchor('services');
});
$("#signuptwo").click(function() {
   scrollToAnchor('services');
});
$("#hamburgerNavHome").click(function() {
   scrollToAnchor('top');
});
$("#hamburgerNavAbout").click(function() {
   scrollToAnchor('about');
});
$("#hamburgerNavServices").click(function() {
   scrollToAnchor('services');
});
$("#hamburgerNavStore").click(function() {
   scrollToAnchor('store');
});
$("#hamburgerNavContact").click(function() {
   scrollToAnchor('contact');
});





