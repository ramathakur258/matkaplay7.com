/* ===============================================
    Function Call - Call Function Ones
   =============================================== */

jQuery(document).ready(function(){
	"use strict";
	
	// here all ready functions
	
    loader();
    scroll_top();
    accordion();
    testimonials_carousel();
    team_carousel();
    blog_carousel();
    gallery_carousel();
    clients_carousel();
    services_carousel();

});

/* ===============================================
    1. Preloader - Themplate Preloader
   =============================================== */
function loader() {
   "use strict";
   setTimeout(function () {
     $('#loader-wrapper').fadeOut();
   }, 1500);
};

/* ===============================================
    2. Scrolling Top - Button to scroll up
   =============================================== */
function scroll_top(){
    "use strict";
	var offset = 300,
		offset_opacity = 1200,
		scroll_top_duration = 700,
		$back_to_top = $('.cd-top');

	$(window).scroll(function(){
		( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
		if( $(this).scrollTop() > offset_opacity ) { 
			$back_to_top.addClass('cd-fade-out');
		}
	});

	$back_to_top.on('click', function(event){
		event.preventDefault();
		$('body,html').animate({
			scrollTop: 0 ,
		 	}, scroll_top_duration
		);
	});

};

/* ===============================================
    3. TESTIMONIALS CAROUSEL
   =============================================== */
   function testimonials_carousel(){ 
    $('.testimonials-carousel').slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 1200,
            settings: {
                slidesToShow: 2
            }
        }, {
            breakpoint: 700,
            settings: {
                slidesToShow:1
            }
        }]
    });
};

/* ===============================================
    4. COUNTER
   =============================================== */
$('.counter').each(function() {
  var $this = $(this),
      countTo = $this.attr('data-count');
  
  $({ countNum: $this.text()}).animate({
    countNum: countTo
  },

  {

    duration: 8000,
    easing:'linear',
    step: function() {
      $this.text(Math.floor(this.countNum));
    },
    complete: function() {
      $this.text(this.countNum);
      //alert('finished');
    }

  });  
});

/* ===============================================
    5. TEAM CAROUSEL
   =============================================== */
function team_carousel(){ 
    $('.team-carousel').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 992,
            settings: {
                slidesToShow: 2
            }
        }, {
            breakpoint: 650,
            settings: {
                slidesToShow:1
            }
        }]
    });
};

/* ===============================================
    6. LATEST NEWS
   =============================================== */
function blog_carousel(){ 
    $('.blog-carousel').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 992,
            settings: {
                slidesToShow: 2
            }
        }, {
            breakpoint: 700,
            settings: {
                slidesToShow:1
            }
        }]
    });
};

/* ===============================================
    7. GALLERY CAROUSEL
   =============================================== */
function gallery_carousel(){ 
    $('.gallery-carousel').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 1200,
            settings: {
                slidesToShow: 3
            }
        }, {
            breakpoint: 992,
            settings: {
                slidesToShow:2
            }
        }, {
            breakpoint: 576,
            settings: {
                slidesToShow:1
            }
        }]
    });
};

/* ===============================================
    8. CLIENTS CAROUSEL
   =============================================== */
function clients_carousel(){ 
    $('.clients-carousel').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 1200,
            settings: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 768,
            settings: {
                slidesToShow:3
            }
        }, {
            breakpoint: 576,
            settings: {
                slidesToShow:2
            }
        }]
    });
};

/* ===============================================
    9. ACCORDION FAQ
   =============================================== */
const items = document.querySelectorAll(".accordion button");

function toggleAccordion() {
  const itemToggle = this.getAttribute('aria-expanded');
  
  for (i = 0; i < items.length; i++) {
    items[i].setAttribute('aria-expanded', 'false');
  }
  
  if (itemToggle == 'false') {
    this.setAttribute('aria-expanded', 'true');
  }
}

items.forEach(item => item.addEventListener('click', toggleAccordion));

/* ===============================================
    10. ACCORDION
   =============================================== */
function accordion(){
};
    $('.accordion > li:eq(0) a').addClass('active').next().slideDown();

    $('.accordion a').click(function(j) {
        var dropDown = $(this).closest('li').find('p');

        $(this).closest('.accordion').find('p').not(dropDown).slideUp();

        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
        } else {
            $(this).closest('.accordion').find('a.active').removeClass('active');
            $(this).addClass('active');
        }

        dropDown.stop(false, true).slideToggle();

        j.preventDefault();
    });
(jQuery)

/* ===============================================
    11. SERVICES CAROUSEL
   =============================================== */
function services_carousel(){ 
    $('.services-carousel').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 992,
            settings: {
                slidesToShow: 2
            }
        }, {
            breakpoint: 576,
            settings: {
                slidesToShow:1
            }
        }]
    });
};

/* ===============================================
    12. YOUTUBE POPUP
   =============================================== */

/* ===============================================
    13. Contact Form - This is used for the contact form
   =============================================== */
"use strict";
$(function () {

    $('#contact-form').validator();

    $('#contact-form').on('submit', function (e) {
        if (!e.isDefaultPrevented()) {
            var url = "";

            $.ajax({
                type: "POST",
                url: url,
                data: $(this).serialize(),
                success: function (data)
                {
                    var messageAlert = 'alert-' + data.type;
                    var messageText = data.message;

                    var alertBox = '<div class="alert ' + messageAlert + ' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + messageText + '</div>';
                    if (messageAlert && messageText) {
                        $('#contact-form').find('.messages').html(alertBox);
                        $('#contact-form')[0].reset();
                    }
                }
            });
            return false;
        }
    })
});


"use strict";
+function ($) {

  // VALIDATOR CLASS DEFINITION
  // ==========================


  
  // VALIDATOR NO CONFLICT
  // =====================

  $.fn.validator.noConflict = function () {
    $.fn.validator = old
    return this
  }


  // VALIDATOR DATA-API
  // ==================

  $(window).on('load', function () {
    $('form[data-toggle="validator"]').each(function () {
      var $form = $(this)
      Plugin.call($form, $form.data())
    })
  })

}(jQuery);

