const swiperInstances = new Map();

export default function initModal(modalId, userOptions = {}, userInstanceOptions = {}) {
    const $targetEl = document.getElementById(modalId);
    if (!$targetEl) {
        console.warn(`Modal with ID "${modalId}" not found.`);
        return null;
    }

    const defaultOptions = {
        backdrop: 'dynamic',
        backdropClasses: 'bg-gray-900/50 dark:bg-gray-900/80 fixed inset-0 z-40',
        closable: true,

        // 🔴 When modal hides
        onHide: () => {
            const instance = swiperInstances.get(modalId);
            if (instance) {
                instance.destroy(true, true);
                swiperInstances.delete(modalId);
            }

            $targetEl.querySelector(".swiper-wrapper")?.replaceChildren(); // clear all images
        },

        // 🟢 When modal shows
        onShow: () => {
            const swiper = new Swiper(`#${modalId} .mySwiper`, {
                loop: false,
                pagination: {
                    el: `#${modalId} .swiper-pagination`,
                    clickable: true,
                },
                navigation: {
                    nextEl: `#${modalId} .swiper-button-next`,
                    prevEl: `#${modalId} .swiper-button-prev`,
                },
            });

            swiperInstances.set(modalId, swiper);
        },

        onToggle: () => {
            console.log(`Modal "${modalId}" has been toggled`);
        }
    };

    const defaultInstanceOptions = {
        id: modalId,
        override: true
    };

    const options = { ...defaultOptions, ...userOptions };
    const instanceOptions = { ...defaultInstanceOptions, ...userInstanceOptions };

    const modalInstance = new Modal($targetEl, options, instanceOptions);

    // ✅ Auto-bind close buttons using data-modal-hide
    $targetEl.querySelectorAll('[data-modal-hide]').forEach(button => {
        button.addEventListener('click', () => modalInstance.hide());
    });

    return modalInstance;
}
