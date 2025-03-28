$(document).ready(function () {
    $(".carrousel").slick({
      infinite: true,
      slidesToShow: 4,
      slidesToScroll: 1,
      arrows: true,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            arrows: true,
            infinite: true,
          },
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            arrows: true,
            infinite: true,
          },
        },
        {
          breakpoint: 400,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            arrows: false,
            infinite: true,
          },
        },
      ],
    });
  
    function applyArrowIcons() {
      $(".slick-prev").html('<i class="fas fa-arrow-left fs-1 text-black"></i>');
      $(".slick-next").html('<i class="fas fa-arrow-right fs-1 text-black"></i>');
    }
  
    applyArrowIcons();
  
    $(".carrousel").on("setPosition", function () {
      applyArrowIcons();
    });
  });
  