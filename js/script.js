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
	
	$('.collapse').on('click', function () {
        $('.collapse').collapse('hide');
    });


    $('.nav-list').on('click', 'li', function () {
        $('.nav-list li.active').removeClass('active');
        $(this).addClass('active');
    });
});

$(function() {

    $("#newModalForm").validate({
      // Specify validation rules
      rules: {
        firstname: {
            required: true,
            minlength: 2,
            maxlength: 5
        },
        lastname: {
            required: true,
            minlength: 2,
            maxlength: 5
        },
        email: {
            required: true,
            email: true
          },
      },
      // Specify validation error messages
      messages: {
        firstname: "Please enter valid name",
        lastname: "Please enter valid name",
      },
      submitHandler: function(form) {
        form.submit();
      }
    });
  });  
