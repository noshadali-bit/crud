$(document).ready(function() {

    $(function() {
        $(".date-picker").datepicker();
    });

    // MOBILE-NAVIGATION-LIST

    $('.navigation-list').clone().appendTo('.mobile-menu-body');

    $('.hamburger').on('click', function() {
        if (!$('.mobile-menu').hasClass('mobile-view')) {
            $('.mobile-menu').addClass('mobile-view');
        } else {
            $('.mobile-menu').removeClass('mobile-view');
        }
    });

    $('#menu-close').on('click', function() {
        $('.mobile-menu').removeClass('mobile-view');
    });

    // SCROLL JS

    // $('.scroller').mCustomScrollbar();

    // STICKY NAVBAR

    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('.bottom-row').addClass('sticky');
            $('.bottom-row').css('transition-duration', '0.5s');
        } else {
            $('.bottom-row').removeClass('sticky');
            $('.bottom-row').css('transition-duration', '0.5s');
        }
    });


    // Select Picker

    $(function() {
        $('.selectpicker').selectpicker();
    });


    // WOW JS

    new WOW().init();

    // VIDEO SLIDER START
    $('.product-sliders').slick({
        arrows: false,
        dots: true,
        infinite: false,
        slidesToShow: 3,
        responsive: [{
                breakpoint: 768,
                settings: {
                    arrows: false,
                    slidesToShow: 2,
                    dots: true
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    slidesToShow: 1,
                    dots: true
                }
            }
        ]
    });
    $('.backed-slider').slick({
        arrows: false,
        dots: true,
        infinite: false,
        slidesToShow: 4,
        responsive: [{
                breakpoint: 768,
                settings: {
                    arrows: false,
                    slidesToShow: 2,
                    dots: true
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    slidesToShow: 1,
                    dots: true
                }
            }
        ]
    });

    $('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.slider-nav'
    });
    $('.slider-nav').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.slider-for',
        dots: false,
        arrows: true,
        focusOnSelect: true,
        infinite: false
    });

    // VIDEO SLIDER END

    // Testimonials Slider JS

    $('.testimonial-slider').slick({
        arrows: false,
        dots: true,
        infinite: false,
        slidesToShow: 2,
        responsive: [{
                breakpoint: 768,
                settings: {
                    arrows: false,
                    slidesToShow: 2,
                    dots: true
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    slidesToShow: 1,
                    dots: true
                }
            }
        ]
    });

    // Product Slider JS

    $('.product-slider').slick({
        arrows: true,
        dots: false,
        infinite: false,
        slidesToShow: 3,
        responsive: [{
                breakpoint: 768,
                settings: {
                    arrows: false,
                    slidesToShow: 2,
                    dots: true
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    slidesToShow: 1,
                    dots: true
                }
            }
        ]
    });

    // PRODUCT-SHOP-DETAIL SLIDER JS

    $('.for-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: true,
        asNavFor: '.nav-slider',
        arrows: false,
        dots: false,
    });
    $('.nav-slider').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.for-slider',
        focusOnSelect: true
    });

    // NUMBER COUNTER

    $(document).ready(function() {
        $('.num-in span').click(function() {
            var $input = $(this).parents('.num-block').find('input.in-num');
            if ($(this).hasClass('minus')) {
                var count = parseFloat($input.val()) - 1;
                count = count < 1 ? 1 : count;
                if (count < 2) {
                    $(this).addClass('dis');
                } else {
                    $(this).removeClass('dis');
                }
                $input.val(count);
            } else {
                var count = parseFloat($input.val()) + 1
                $input.val(count);
                if (count > 1) {
                    $(this).parents('.num-block').find(('.minus')).removeClass('dis');
                }
            }
            $input.change();
            return false;
        });

    });


      $(".singleProduct__img").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        autoplay: true,
        asNavFor: ".singleProduct__pictures",
      });
      $(".singleProduct__pictures").slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: ".singleProduct__img",
        dots: false,
        arrows: false,
        focusOnSelect: true,
      
      });
      
    //   PRICE RANGE START

    var lowerSlider = document.querySelector('#lower');
    var upperSlider = document.querySelector('#upper');

    document.querySelector('#two').value = upperSlider.value;
    document.querySelector('#one').value = lowerSlider.value;

    var lowerVal = parseInt(lowerSlider.value);
    var upperVal = parseInt(upperSlider.value);

    upperSlider.oninput = function() {
        lowerVal = parseInt(lowerSlider.value);
        upperVal = parseInt(upperSlider.value);

        if (upperVal < lowerVal + 4) {
            lowerSlider.value = upperVal - 4;
            if (lowerVal == lowerSlider.min) {
                upperSlider.value = 4;
            }
        }
        document.querySelector('#two').value = this.value
    };

    lowerSlider.oninput = function() {
        lowerVal = parseInt(lowerSlider.value);
        upperVal = parseInt(upperSlider.value);
        if (lowerVal > upperVal - 4) {
            upperSlider.value = lowerVal + 4;
            if (upperVal == upperSlider.max) {
                lowerSlider.value = parseInt(upperSlider.max) - 4;
            }
        }
        document.querySelector('#one').value = this.value
    };

    //   PRICE RANGE END

    $(document).ready(function() {
        $('.num-in span').click(function() {
            var $input = $(this).parents('.num-block').find('input.in-num');
            if ($(this).hasClass('minus')) {
                var count = parseFloat($input.val()) - 1;
                count = count < 1 ? 1 : count;
                if (count < 2) {
                    $(this).addClass('dis');
                } else {
                    $(this).removeClass('dis');
                }
                $input.val(count);
            } else {
                var count = parseFloat($input.val()) + 1
                $input.val(count);
                if (count > 1) {
                    $(this).parents('.num-block').find(('.minus')).removeClass('dis');
                }
            }
            $input.change();
            return false;
        });

    });

});
$('.slider-single').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.slider-nav'
});
$('.slider-nav').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: '.slider-single',
    dots: false,
   
   
});
// tabbing
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
  }

  document.getElementById("defaultOpen").click();
  
  
  
  
  