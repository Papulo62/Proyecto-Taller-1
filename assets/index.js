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
const navbar = document.querySelector(".navbar");


const togglePopover = (event)=> {
  const popoverTrigger = event.target;
  popoverTrigger.querySelector('.popover').classList.toggle('popover-active');
    navItems.forEach(item => {
      let navLink = item.querySelector(".navbar-link");
      let linkClass = item == popoverTrigger ? 'navbar-link-active' : 'navbar-link-disable'
      event.type == 'mouseenter' ? navLink.classList.add(linkClass) : navLink.classList.remove(linkClass)
    })
}
document.addEventListener('DOMContentLoaded', () => {
  navItems.forEach(item =>{
    item.addEventListener('mouseenter', togglePopover);
    item.addEventListener('mouseleave', togglePopover);
  })
})
