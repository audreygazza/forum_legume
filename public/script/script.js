window.addEventListener("load", function(){

// $('.hover-on-me').hover(
//   function() {
//     $('.hidden').addClass('show-me');
//   },
//   function() {
//     $('.hidden').removeClass('show-me');
// });


  const BTNCLICKS = document.querySelectorAll('.btnClick');
  BTNCLICKS.forEach( BTNCLICK=> BTNCLICK.addEventListener('click', targetToggle));

  function targetToggle() {
    const TARGET = document.querySelector(this.dataset.target);
    TARGET.classList.toggle('active');
  }

}
