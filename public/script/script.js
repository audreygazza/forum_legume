window.addEventListener("load", function(){

$('.hover-on-me').hover(
  function() {
    $('.hidden').addClass('show-me');
  },
  function() {
    $('.hidden').removeClass('show-me');
});

}
