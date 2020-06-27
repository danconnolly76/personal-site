$(document).ready(function() {

    $('.carousel').carousel({
        interval: 3000
    });

    $('.navbar a').on('click', function (e) {
        if (parseInt($(window).width()) <= 1024) {
            if (this.hash !== '') {
                e.preventDefault();
                const hash = this.hash;
                $('html, body')
                    .animate({
                        scrollTop: $(hash).offset().top - 330
                    }, 1500);
            }
        } else if (parseInt($(window).width()) > 1024) {
            if (this.hash !== '') {
                e.preventDefault();
                const hash = this.hash;
                $('html, body')
                    .animate({
                        scrollTop: $(hash).offset().top - 140
                    }, 1500);
            }
        }
    });

    /* $('.navbar-nav>li>a').on('click', function () {
        $('.navbar-collapse').collapse('hide');
    }); */
	
	$('.collapse').on('click', function () {
        $('.collapse').collapse('hide');
    });


    $('.nav-list').on('click', 'li', function () {
        $('.nav-list li.active').removeClass('active');
        $(this).addClass('active');
    });

});
