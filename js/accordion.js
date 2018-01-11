(function($) {

  var allPanels = $('.accordion > dd').hide();


  $('.accordion > dt > a').click(function() {
//     allPanels.slideUp();
//    $(this).parent().next().slideToggle().siblings('.hide').slideUp();
    $(this).parent().next().slideToggle().siblings('.hide').slideUp();
    return false;
  });

})(jQuery);


// $('.showhide').click(function() {
//     $(this).toggleClass('myclass');
//     $(this).toggleClass('showhidenew');
// });
