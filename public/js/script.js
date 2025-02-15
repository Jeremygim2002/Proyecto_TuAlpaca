
(function($) {
  "use strict";

  var initPreloader = function() {
    $(document).ready(function() {
      var Body = $('body');
      Body.addClass('preloader-site');
    });
    $(window).on('load', function() {
      $('.preloader-wrapper').fadeOut();
      $('body').removeClass('preloader-site');
    });
  };

  // Init Chocolat light box
  var initChocolat = function() {
    Chocolat(document.querySelectorAll('.image-link'), {
      imageSize: 'contain',
      loop: true,
    });
  };

  var initSwiper = function() {
    // Swiper para el carrusel principal (banners)
    var swiper = new Swiper(".main-swiper", {
      speed: 500, // Velocidad de transición
      autoplay: { // Habilita el autoplay
        delay: 1000, // 1 segundo entre transiciones
        disableOnInteraction: false, // No se detiene al interactuar
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });

    // Otros Swipers (sin cambios)
    var category_swiper = new Swiper(".category-carousel", {
      slidesPerView: 6,
      spaceBetween: 30,
      speed: 500,
      navigation: {
        nextEl: ".category-carousel-next",
        prevEl: ".category-carousel-prev",
      },
      breakpoints: {
        0: { slidesPerView: 2 },
        768: { slidesPerView: 3 },
        991: { slidesPerView: 4 },
        1500: { slidesPerView: 6 },
      },
    });

    var brand_swiper = new Swiper(".brand-carousel", {
      slidesPerView: 4,
      spaceBetween: 30,
      speed: 500,
      navigation: {
        nextEl: ".brand-carousel-next",
        prevEl: ".brand-carousel-prev",
      },
      breakpoints: {
        0: { slidesPerView: 2 },
        768: { slidesPerView: 2 },
        991: { slidesPerView: 3 },
        1500: { slidesPerView: 4 },
      },
    });

    var products_swiper = new Swiper(".products-carousel", {
      slidesPerView: 5,
      spaceBetween: 30,
      speed: 500,
      navigation: {
        nextEl: ".products-carousel-next",
        prevEl: ".products-carousel-prev",
      },
      breakpoints: {
        0: { slidesPerView: 1 },
        768: { slidesPerView: 3 },
        991: { slidesPerView: 4 },
        1500: { slidesPerView: 6 },
      },
    });

    // Evento de clic en el botón "Ver siguiente" para avanzar en el carrusel de productos
    document.addEventListener('DOMContentLoaded', function() {
      var verSiguienteBtn = document.getElementById('verSiguiente');
      if (verSiguienteBtn) {
          console.log('Elemento encontrado:', verSiguienteBtn);
          verSiguienteBtn.addEventListener('click', function() {
              console.log('Evento click activado');
          });
      } else {
          console.error('El elemento con id="verSiguiente" no se encuentra en el DOM.');
      }
  });
  

    var thumb_slider = new Swiper(".product-thumbnail-slider", {
      slidesPerView: 5,
      spaceBetween: 20,
      direction: "vertical",
      breakpoints: {
        0: { direction: "horizontal" },
        992: { direction: "vertical" },
      },
    });

    var large_slider = new Swiper(".product-large-slider", {
      slidesPerView: 1,
      spaceBetween: 0,
      effect: 'fade',
      thumbs: { swiper: thumb_slider },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });
  };

  // Input spinner para cambiar la cantidad de producto
  var initProductQty = function() {
    $('.product-qty').each(function() {
      var $el_product = $(this);

      $el_product.find('.quantity-right-plus').click(function(e) {
        e.preventDefault();
        var quantity = parseInt($el_product.find('.quantity').val());
        $el_product.find('.quantity').val(quantity + 1);
      });

      $el_product.find('.quantity-left-minus').click(function(e) {
        e.preventDefault();
        var quantity = parseInt($el_product.find('.quantity').val());
        if (quantity > 0) {
          $el_product.find('.quantity').val(quantity - 1);
        }
      });
    });
  };

  // Init jarallax parallax
  var initJarallax = function() {
    jarallax(document.querySelectorAll(".jarallax"));
    jarallax(document.querySelectorAll(".jarallax-keep-img"), {
      keepImg: true,
    });
  };
  



  // Document ready
  $(document).ready(function() {
    initPreloader();
    initSwiper();
    initProductQty();
    initJarallax();
    initChocolat();
  });
})(jQuery);

