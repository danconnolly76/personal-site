$('.carousel').carousel({
    interval: 3000
});

$('.navbar a').on('click', function (e) {
   if (this.hash !== '') {
   e.preventDefault();
     const hash = this.hash;
    $('html, body')
      .animate({
         scrollTop: $(hash).offset().top - 340
       },1200);
   }
 });

$('.navbar-nav>li>a').on('click', function(){
    $('.navbar-collapse').collapse('hide');
});

$('.nav-list').on('click', 'li', function() {
    $('.nav-list li.active').removeClass('active');
    $(this).addClass('active');
});
