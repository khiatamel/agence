// slider.js

var swiper = new Swiper('.swiper-container', {
    loop: true,
    autoplay: {
        delay: 3000,
    },
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});
