(function () {
  'use strict';

  const initUnderbannerSliders = (root = document) => {
    if (typeof window.Swiper === 'undefined') {
      return;
    }

    root = root || document;

    const sliders = root.matches && root.matches('.swiper-underbanner')
      ? [root]
      : Array.from(root.querySelectorAll('.swiper-underbanner'));

    sliders.forEach((el) => {
      if (el.dataset.swiperToolkitInitialized === 'true') {
        return;
      }

      new window.Swiper(el, {
        slidesPerView: 'auto',
        allowTouchMove: true,
        watchOverflow: true,
        grabCursor: true,
        freeMode: {
          enabled: false,
          momentum: true,
        },
        autoplay: {
          delay: 4000,
          disableOnInteraction: false,
          pauseOnMouseEnter: true,
        },
        mousewheel: {
          forceToAxis: true,
        },
        breakpoints: {
          0: { slidesPerView: 1, loop: true },
          1025: { slidesPerView: 3, loop: false },
        },
      });

      el.dataset.swiperToolkitInitialized = 'true';
    });
  };

  window.SwiperToolkitInit = initUnderbannerSliders;

  document.addEventListener('DOMContentLoaded', () => initUnderbannerSliders());
})();
