(function () {
  'use strict';

  const initUnderbannerSliders = () => {
    if (typeof window.Swiper === 'undefined') {
      return;
    }

    document.querySelectorAll('.swiper-underbanner').forEach((el) => {
      if (el.dataset.guisfusSwiperInitialized === 'true') {
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

      el.dataset.guisfusSwiperInitialized = 'true';
    });
  };

  document.addEventListener('DOMContentLoaded', initUnderbannerSliders);
})();
