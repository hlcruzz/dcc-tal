let swiperInstance = null;

export function initSwiper() {
    if (swiperInstance !== null) {
        swiperInstance.destroy(true, true);
    }
    swiperInstance = new Swiper(".mySwiper", {
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
}

export function stopSwiper() {
    if (swiperInstance !== null) {
        swiperInstance.destroy(true, true);
        swiperInstance = null;
    }
}