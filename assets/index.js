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

const btnSuma = document.querySelector('.btn-suma');
const btnResta = document.querySelector('.btn-resta');
const containerSuma = document.querySelector('.container-suma');
const stockDisplay = document.getElementById('stock-display');
const btnTalle = document.querySelectorAll(".btn-talle");
const talleId = document.getElementById("talle_id");
const talleStock = document.getElementById("talle_stock");
const btnAgregar = document.querySelector(".btn-cart");

let conteo = 0;
let stockDisponible = 0;
let stockOriginal = 0;
const stockTalles = {};



btnTalle.forEach((btn) => {
  btn.addEventListener("click", (e) => {
    btnTalle.forEach(item => item.classList.remove("active"));
    e.target.classList.add("active");
    stockDisponible = parseInt(e.target.dataset.stock);
    talleStock.value = stockDisponible;
    talleId.value = parseInt(e.target.dataset.id);
    stockOriginal = stockDisponible;
    stockDisplay.textContent = stockDisponible;
    stockTalles[e.target.textContent] = stockDisponible;
    conteo = 0;
    containerSuma.value = conteo;
  });
});

btnSuma.addEventListener("click", () => {
  if (conteo < stockOriginal) {
    conteo++;
    containerSuma.value = conteo;
    stockDisplay.textContent = stockDisponible;
  } else {
    alert("No hay suficiente stock para agregar más productos.");
  }
});

btnResta.addEventListener("click", () => {
  if (conteo > 0) {
    conteo--;
    containerSuma.value = conteo;
    stockDisplay.textContent = stockDisponible;
  } else {
    conteo = 0;
    containerSuma.value = conteo;
  }
});



document.addEventListener('DOMContentLoaded', () => {
  const navItems = document.querySelectorAll(".nav-item");
  const navbar = document.querySelector(".navbar");
  
  const togglePopover = (event)=> {
    const popoverTrigger = event.target.closest('.nav-item');
    const popover = popoverTrigger.querySelector('.popover');
    if (popover) {
        popover.classList.toggle('popover-active');
    }
    
    navItems.forEach(item => {
      let navLink = item.querySelector(".navbar-link");
      let linkClass = item == popoverTrigger ? 'navbar-link-active' : 'navbar-link-disable'
      event.type == 'mouseenter' ? navLink.classList.add(linkClass) : navLink.classList.remove(linkClass)
    })
  }
  
  navItems.forEach(item =>{
    item.addEventListener('mouseenter', togglePopover);
    item.addEventListener('mouseleave', togglePopover);
  })
})
