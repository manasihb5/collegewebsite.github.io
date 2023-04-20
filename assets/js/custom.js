// custom js start
// 01. slider js start
// 02. countdown js start
"use strict";
$(document).ready(function () {
  // slider js start
  // $('.carousel').carousel({
  //     interval: 3000,
  //     pause: null
  // });
  // Preloader
  setTimeout(function () {
    $("body").addClass("loaded");
  }, 1000);

  // countdown js start
  if ($("#clock").length > 0) {
    $("#clock").countdown(
      {
        date: "01/15/2021 17:00:00",
        offset: -2,
        day: "DAYS",
      },
      function () {}
    );
  }

  // sticky header
  $(window).scroll(function () {
    if ($(this).scrollTop() > 1) {
      $(".study_nav").addClass("navbar-fixed-top");
    } else {
      $(".study_nav").removeClass("navbar-fixed-top");
    }
  });

  // Mobile Menu
  jQuery("header .main-menu").meanmenu({
    meanScreenWidth: "991",
  });

  // ************ Login popup
  $(".js-modal-show").on("click", function (e) {
    $(".js-modal-shopify")
      .toggleClass("is-shown--off-flow")
      .toggleClass("is-hidden--off-flow");
  });
  $(".js-modal-hide").on("click", function (e) {
    $(".js-modal-shopify")
      .toggleClass("is-shown--off-flow")
      .toggleClass("is-hidden--off-flow");
  });

  // bottom to top button

  // Add smooth scrolling on all links inside the navbar
  $("#wdp_navbar_collapse a").on("click", function (event) {
    // Prevent default anchor click behavior
    //  event.preventDefault();

    // Store hash
    var hash = this.hash;

    // Using jQuery's animate() method to add smooth page scroll
    // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
    $("html, body").animate(
      {
        scrollTop: $(hash).offset().top,
      },
      800,
      function () {
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      }
    );
  });

  $(window).scroll(function () {
    if ($(this).scrollTop() > 600) {
      $(".scrollup").fadeIn();
    } else {
      $(".scrollup").fadeOut();
    }
  });

  $(".scrollup").on("click", function () {
    $("html, body").animate(
      {
        scrollTop: 0,
      },
      600
    );
    return false;
  });

  // Banner Slider
  $("#banner-slider").owlCarousel({
    navText: [
      "<i class='fa fa-angle-left'></i>",
      "<i class='fa fa-angle-right'></i>",
    ],
    items: 1,
    loop: true,
    slideSpeed: 1500,
    paginationSpeed: 1500,
    nav: true,
    pagination: true,
  });

  // Latest New
  $("#latest_blog_carousel").owlCarousel({
    navText: [
      "<i class='fa fa-angle-left'></i>",
      "<i class='fa fa-angle-right'></i>",
    ],
    items: 3,
    loop: true,
    margin: 30,
    slideSpeed: 1500,
    paginationSpeed: 1500,
    nav: true,
    pagination: true,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 2,
      },
      1000: {
        items: 3,
      },
    },
  });

  // Latest New
  $("#logo-slider").owlCarousel({
    navText: [
      "<i class='fa fa-angle-left'></i>",
      "<i class='fa fa-angle-right'></i>",
    ],
    items: 3,
    loop: true,
    margin: 30,
    slideSpeed: 1500,
    paginationSpeed: 1500,
    nav: false,
    dots: false,
    pagination: true,
    responsive: {
      0: {
        items: 2,
      },
      500: {
        items: 3,
      },
      769: {
        items: 3,
      },
      1000: {
        items: 4,
      },
    },
  });

  // counter js
  $(".counter-count").each(function () {
    $(this)
      .prop("Counter", 0)
      .animate(
        {
          Counter: $(this).text(),
        },
        {
          duration: 6000,
          easing: "swing",
          step: function (now) {
            $(this).text(Math.ceil(now));
          },
        }
      );
  });

  // masonry custom js start

  // init Isotope
  if ($("#gallery-content-center").length > 0) {
    var $grid = $("#gallery-content-center").isotope({
      // options
      itemSelector: ".gallery-item",
      masonry: {
        // use outer width of grid-sizer for columnWidth
      },
    });
    // filter items on button click
    $(".filter-button-group").on("click", "button", function () {
      $(".filter-button-group .button").removeClass("active");
      $(this).addClass("active");
      var filter_class = $(this).data("gallery");
      var filterValue = $(this).attr("data-filter");
      $grid.isotope({
        filter: filterValue,
      });
      $(" #gallery-content-center .gallery-item:visible ").attr(
        "data-fancybox",
        filter_class
      );
    });
  }
});
