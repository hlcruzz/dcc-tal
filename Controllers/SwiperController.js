export default function initSwiper(){
    let swiperInstance = null;
    if (swiperInstance !== null) {
    swiperInstance.destroy(true, true); // Reset before reinitializing
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