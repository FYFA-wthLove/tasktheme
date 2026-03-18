(() => {
  // blocks/slider/script.src.js
  document.addEventListener("DOMContentLoaded", function() {
    const sliders = document.querySelectorAll(".slider-block");
    sliders.forEach((slider) => {
      new Swiper(slider, {
        loop: true,
        slidesPerView: 2,
        spaceBetween: 20,
        navigation: {
          nextEl: slider.querySelector(".swiper-button-next"),
          prevEl: slider.querySelector(".swiper-button-prev")
        },
        breakpoints: {
          768: {
            slidesPerView: 3
          }
        },
        mousewheel: true,
        keyboard: true
      });
    });
  });
  document.addEventListener("DOMContentLoaded", function() {
    let slides = document.querySelectorAll(".swiper-slide");
    let maxHeight = 0;
    slides.forEach((slide) => {
      slide.style.height = "auto";
      if (slide.offsetHeight > maxHeight) {
        maxHeight = slide.offsetHeight;
      }
    });
    slides.forEach((slide) => {
      slide.style.height = maxHeight + "px";
    });
  });
})();
