export default function initModal(modalId, userOptions = {}, userInstanceOptions = {}) {
    const $targetEl = document.getElementById(modalId);
    if (!$targetEl) {
        console.warn(`Modal with ID "${modalId}" not found.`);
        return null;
    }
    let swiperInstance = null;
    const defaultOptions = {
        backdrop: 'dynamic',
        backdropClasses: 'bg-gray-900/50 dark:bg-gray-900/80 fixed inset-0 z-40',
        closable: true,
        onHide: () => {
            // if (swiperInstance !== null) {
            //     swiperInstance.destroy(true, true);
            //     swiperInstance = null;
            // }
            // $(".swiper-wrapper").empty();
        },
        onShow: () => {
            swiperInstance = new Swiper(".mySwiper", {
                loop: false,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            });
        },
        onToggle: () => console.log(`Modal "${modalId}" has been toggled`)
    };

    const defaultInstanceOptions = {
        id: modalId,
        override: true
    };

    const options = { ...defaultOptions, ...userOptions };
    const instanceOptions = { ...defaultInstanceOptions, ...userInstanceOptions };

    return new Modal($targetEl, options, instanceOptions);
}