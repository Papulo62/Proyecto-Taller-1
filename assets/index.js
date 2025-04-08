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
  

const navItems = document.querySelectorAll(".nav-item");
const categorias = document.querySelector(".categorias");
const navbar = document.querySelector(".navbar");

function mostrarCategorias() {
  categorias.classList.add("categorias-active");
}

function mouseFuera(event) {
  const fueraNav = navbar.contains(event.target);
  const fueraCategorias = categorias.contains(event.target);
  if (!fueraNav && !fueraCategorias) {
    categorias.classList.remove("categorias-active");
  }
}

navItems.forEach((element) => {
  element.addEventListener("mouseover", mostrarCategorias);
});

categorias.addEventListener("mouseover", mostrarCategorias);

document.addEventListener("mouseover", mouseFuera);