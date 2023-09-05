

$(".openbtn").click(function () {
  $("#myNav").addClass("active");
});

$(".closebtn").click(function () {
  $("#myNav").removeClass("active");
});

$(".search a").click(function () {
  $(".search-bar").addClass("active");
});

$(".search-close-ic a").click(function () {
  $(".search-bar").removeClass("active");
});

$(".side-card-slider").slick({
  dots: true,
  infinite: true,
  autoplay: true,
  arrows: false,
  speed: 300,
  slidesToShow: 1,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        dots: true,
      },
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      },
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      },
    },
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ],
});

$(".donationSlider").slick({
  dots: true,
  infinite: false,
  autoplay: true,
  arrows: true,
  dots: false,
  prevArrow:
    '<div class="slick-prev"><i class="fas fa-long-arrow-left"></i></div>',
  nextArrow:
    '<div class="slick-next"><i class="fas fa-long-arrow-right"></i></div>',
  slidesToShow: 3,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        dots: true,
      },
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
      },
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      },
    },
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ],
});

$(".banjara-slider").slick({
  dots: false,
  infinite: true,
  autoplay: true,
  arrows: true,
  speed: 300,
  slidesToShow: 3,
  slidesToScroll: 1,
  prevArrow:
    '<div class="slick-prev"><i class="fas fa-long-arrow-left"></i></div>',
  nextArrow:
    '<div class="slick-next"><i class="fas fa-long-arrow-right"></i></div>',
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        dots: true,
      },
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      },
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      },
    },
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ],
});

$(".drodown-show > a").on("click", function (e) {
  e.preventDefault();
  if ($(this).hasClass("active")) {
    $(".drodown-show > a")
      .removeClass("active")
      .siblings(".open-dropdown")
      .slideUp();
    $(this).removeClass("active").siblings(".open-dropdown").slideUp();
  } else {
    $(".drodown-show > a")
      .removeClass("active")
      .siblings(".open-dropdown")
      .slideUp();
    $(this).addClass("active").siblings(".open-dropdown").slideDown();
  }
});

// Attach a click event listener to all checkboxes with the "myCheck" class
$(".myCheck").click(function () {
  var $this = $(this);
  var $text = $this.next(".text");

  // Toggle the display of the child "p" element of the clicked checkbox
  if ($this.prop("checked")) {
    $text.show();
  } else {
    $text.hide();
  }

  // Check if any checkbox is checked and show its child "p" element
  var $checked = $(".myCheck:checked");
  var $childTexts = $checked.next(".text");
  if ($checked.length > 0) {
    $childTexts.show();
  } else {
    $(".text").hide();
  }
});

// Toggle Functionality
const toggleBtn = document.querySelectorAll("[data-toggle-btn]");
toggleBtn.forEach((i) => {
  i.addEventListener("click", (e) => {
    const content = document.querySelector(
      `[data-toggle-content="${e.currentTarget.dataset.toggleBtn}"]`
    );
    e.preventDefault();
    i.classList.toggle("active");
    content.classList.toggle("active");
  });
});

$('.amount-radio').change(function(){
   var stab = $('input.amount-radio[type="radio"]:checked').val(); 
   $('.amount-tab').hide(0);
   $('#'+stab).show(100);
});

$(".donate-now").click(function(){
  var student_id = $(this).data('student_id');
  $(".studet-id").val(student_id)
  $(".donate-type").val($(this).data('donate'))
  $(".pastors-slug").val($(this).data('pastors'))
  
  var s = $("#myTabContent > .active");
  var pkg = $("input[name='radios']:checked").val()
  if(pkg){
    $(".pkg-tab").val(pkg);
  }else{
    $(".pkg-tab").val('annualy-tab');
  }

//   if(s.text()[0]=="$"){
//     var result = s.text().replace(/\$ /g, '');
//     var str = result;
//     var result = str.replace(/,/g, '');
//     $(".donate-amount").val(result);
//   }else if($("#myTabContent > .active > div > input").val()){
//     $(".donate-amount").val($("#myTabContent > .active > div > input").val());
//   }else{
//     $(".donate-amount").val(500);
//   }
});


// Get the required elements
const volumeToggle = document.querySelector('.volume-toggle');
const bannerVideo = document.querySelector('.banner-video');

// Add a click event listener to the volume toggle button
volumeToggle.addEventListener('click', function() {
  if (bannerVideo.muted) {
    // If the video is currently muted, unmute it
    bannerVideo.muted = false;
    volumeToggle.classList.add('unmute');
  } else {
    // If the video is currently unmuted, mute it
    bannerVideo.muted = true;
    volumeToggle.classList.remove('unmute');
  }
});




  function formatMoneyInput(input) {
            const numericValue = parseFloat(input.value.replace(/[$,]/g, ""));
            if (!isNaN(numericValue)) {
                // If the input value contains a decimal, format it as is
                if (input.value.includes(".")) {
                    input.value = "$" + numericValue.toFixed(2);
                } else {
                    // Format the numeric value as money in cents
                    const formattedValue = (numericValue / 100).toLocaleString("en-US", {
                        style: "currency",
                        currency: "USD",
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    });
                    input.value = formattedValue;
                }
            }
        }