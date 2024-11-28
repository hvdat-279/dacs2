document.addEventListener("DOMContentLoaded", function () {
    // Khởi tạo swiper cho phần thumbnail
    var swiper = new Swiper(".mySwiper", {
        loop: true,
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: true,
    });

    // Khởi tạo swiper cho phần chính với thumbnail
    var swiper2 = new Swiper(".mySwiper2", {
        loop: true,
        spaceBetween: 10,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        thumbs: {
            swiper: swiper, // Kết nối swiper2 với swiper để dùng làm thumbnail
        },
    });
});
