// SWIPER //
var homeSwiper = new Swiper(".home__img", {
    loop: true,
    spaceBetween: 48,
    grabCursor: true,
    pagination: {
        el: ".swiper-pagination",
        dynamicBullets: true,
    },
});

var pojokHimsiSwiper = new Swiper(".pojokHimsi__content", {
    loop: true,
    spaceBetween: 100,
    centeredSlides: true,
    grabCursor: true,
    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
});

let greetingSwiper = new Swiper(".greeting__content", {
    loop: true,
    grabCursor: true,
    spaceBetween: 48,
    pagination: {
        el: ".swiper-pagination",
        dynamicBullets: true,
    },
});

// FAQ ACCORDION //
const accordionItems = document.querySelectorAll(".faq__item");

accordionItems.forEach((item) => {
    const accordionHeader = item.querySelector(".faq__header");

    accordionHeader.addEventListener("click", () => {
        const openItem = document.querySelector(".accordion-open");

        toggleItem(item);

        if (openItem && openItem !== item) {
            toggleItem(openItem);
        }
    });
});

const toggleItem = (item) => {
    const accordionContent = item.querySelector(".faq__content");

    if (item.classList.contains("accordion-open")) {
        accordionContent.removeAttribute("style");
        item.classList.remove("accordion-open");
    } else {
        accordionContent.style.height =
            accordionContent.scrollHeight + 12 + "px";
        item.classList.add("accordion-open");
    }
};
