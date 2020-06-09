$('.carousel').carousel({
    interval: 3000
});

$('.navbar a').on('click', function (e) {
   if (this.hash !== '') {
   e.preventDefault();
     const hash = this.hash;
    $('html, body')
      .animate({
         scrollTop: $(hash).offset().top - 150
       },1200);
   }
 });

$('.navbar-nav>li>a').on('click', function(){
    $('.navbar-collapse').collapse('hide');
});

$('.navbar-nav .nav-link').click(function(){
    $('.navbar-nav .nav-link').removeClass('active');
    $(this).addClass('active');
})
