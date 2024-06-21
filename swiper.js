function createApp() {
  Vue.use(VueAwesomeSwiper)

  new Vue({
    el: "#app",
    data: {
      swiperOption: {
        autoplay: {
          delay: 3000,
          disableOnInteraction: false,
        },
        loop: true,
        spaceBetween: 10,
        slidesPerView:2,
        centeredSlides : true,
        breakpoints: {
          769: {
            slidesPerView: 1,
            spaceBetween: 0
          },
        },
        pagination: {
          el: ".swiper-pagination",
          type: "bullets",
          clickable: true
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev"
        }
      },
    }
  })
}

function initialize() {
  createApp()
}

document.addEventListener("DOMContentLoaded", initialize.bind(this))