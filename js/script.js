$(document).ready(function() {

    $('.carousel').carousel({
        interval: 2500
    });
    $('.carousel').carousel('cycle');

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
            maxlength: 40
        },
        lastname: {
            required: true,
            maxlength: 50
        },
        email: {
            required: true,
            email: true
          },
        message: {
            required: true,
            maxlength: 500
        }
      },
      // Specify validation error messages
      messages: {
          firstname: {
              maxlength: "A maximum of 30 characters"
          },
          lastname: {
              maxlength: "A maximum of 30 characters"
          },
         message: {
              maxlength: "A maximum of 500 characters"
         }
      },
      submitHandler: function(form) {
        form.submit();
      }
    });
  });  
