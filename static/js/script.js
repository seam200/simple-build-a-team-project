$(".banner-slider").slick({
  arrows: true,
  fade: true,
  prevArrow: '<i class="fas fa-arrow-left prev"></i>',
  nextArrow: '<i class="fas fa-arrow-right next"></i>',
  responsive: [
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      },
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      },
    },
    {
      breakpoint: 576,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
      },
    },
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ],
});
// portfolio-slider
$(".port-slider").slick({
  slidesToShow: 4,
  arrows: true,
  autoplay: true,
  responsive: [
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
      },
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
      },
    },
    {
      breakpoint: 576,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
      },
    },
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ],
});
// service-slider
$(".service-slider").slick({
  slidesToShow: 3,
  vertical: true,
  centerMode: true,
  centerPadding: "0",
  autoplay: true,
  prevArrow: '<i class="fas fa-angle-up prev"></i>',
  nextArrow: '<i class="fas fa-angle-down next"></i>',
  focusOnSelect: true,
  responsive: [
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        focusOnSelect: false,
      },
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      },
    },
    {
      breakpoint: 576,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        focusOnSelect: false,
      },
    },
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ],
});
// testimonial part slider
$(".img-slider").slick({
  slidesToShow: 3,
  vertical: true,
  centerMode: true,
  centerPadding: "0",
  autoplay: true,
  asNavFor: ".details-slider",
  focusOnSelect: true,
  prevArrow: '<i class="fas fa-angle-up prev"></i>',
  nextArrow: '<i class="fas fa-angle-down next"></i>',
  responsive: [
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
      },
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        vertical: false,
      },
    },
    {
      breakpoint: 576,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        vertical: false,
      },
    },
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ],
});

$(".details-slider").slick({
  arrows: false,
  asNavFor: ".img-slider",
  fade: true,
  focusOnSelect: true,
});

// member slider
$(".member-slider").slick({
  slidesToShow: 4,
  arrows: false,
  autoplay: true,
  responsive: [
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
      },
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
      },
    },
    {
      breakpoint: 576,
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

$(".sponsor-slider").slick({
  slidesToShow: 5,
  arrows: false,
  centerMode: true,
  centerPadding: "0",
  autoplay: false,
  responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 4,
      },
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
      },
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
        centerMode: false,
        centerPadding: "0",
      },
    },
    {
      breakpoint: 576,
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

// venobox start
$(".venobox").venobox();

// counter start
$(".counter").counterUp({
  delay: 10,
  time: 1000,
});

// preloader start
setTimeout(() => {
  $(".preloader").slideUp();
}, 5000);

// backtotop start
$(".backtotop").click(function () {
  $("html,body").animate({
    scrollTop: 0,
  });
});

$(window).scroll(function () {
  if ($(window).scrollTop() >= 714) {
    $(".backtotop").fadeIn();
  } else {
    $(".backtotop").fadeOut();
  }

  if ($(window).scrollTop() > 300) {
    $(".menu").addClass("fixedmenu");
  } else {
    $(".menu").removeClass("fixedmenu");
  }
});

// color switcher
$(".switch").click(function () {
  $(".color-switcher").toggleClass("slide");
});
$(".yellow").click(function () {
  $(".style").attr("href", "css/style.css");
  $(".style-responsive").attr("href", "css/responsive.css");
  $(".logo").attr("src", "images/logo.png");
  $(".fav").attr("href", "images/favicon.png");
});
$(".red").click(function () {
  $(".style").attr("href", "css/red.css");
  $(".style-responsive").attr("href", "css/red responsive.css");
  $(".logo").attr("src", "images/red-logo.png");
  $(".fav").attr("href", "images/redfav.jpg");
});
$(".green").click(function () {
  $(".style").attr("href", "css/green.css");
  $(".style-responsive").attr("href", "css/green responsive.css");
  $(".logo").attr("src", "images/green-logo.png");
  $(".fav").attr("href", "images/greenfav.jpg");
});
