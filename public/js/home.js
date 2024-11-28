// document.addEventListener("DOMContentLoaded", function () {
//     const nav = document.querySelector("nav"),
//         siderbarClose = document.querySelector(".siderbarClose"),
//         siderbarOpen = document.querySelector(".siderbarOpen"),
//         slides = document.querySelector(".slides"),
//         slideCount = document.querySelectorAll(".slide").length,
//         prevButtons = document.querySelectorAll(".prev-products"),
//         nextButtons = document.querySelectorAll(".next-products"),
//         productLists = document.querySelectorAll(".product-list");
//     let currentIndex = 0;

//     // Mở sidebar khi nhấn vào biểu tượng siderbarOpen
//     siderbarOpen.addEventListener("click", (e) => {
//         e.stopPropagation();
//         nav.classList.add("active");
//     });

//     // Đóng sidebar khi nhấn vào biểu tượng siderbarClose
//     siderbarClose.addEventListener("click", (e) => {
//         e.stopPropagation();
//         nav.classList.remove("active");
//     });

//     // Đóng sidebar khi click ra ngoài nav
//     document.addEventListener("click", (e) => {
//         if (!e.target.closest("nav")) {
//             nav.classList.remove("active");
//         }
//     });

//     // slider
//     // Hàm hiển thị slide tiếp theo
//     function showNextSlide() {
//         currentIndex = (currentIndex + 1) % slideCount;
//         updateSlidePosition();
//     }

//     // Hàm hiển thị slide trước
//     function showPrevSlide() {
//         currentIndex = (currentIndex - 1 + slideCount) % slideCount;
//         updateSlidePosition();
//     }

//     // Cập nhật vị trí của slider
//     function updateSlidePosition() {
//         slides.style.transform = `translateX(-${currentIndex * 100}%)`;
//     }

//     // Tự động chuyển slide mỗi 5 giây
//     let slideInterval = setInterval(showNextSlide, 5000);

//     // Thêm sự kiện khi nhấn nút
//     document.querySelector(".next").addEventListener("click", () => {
//         clearInterval(slideInterval); // Dừng tự động khi người dùng nhấn nút
//         showNextSlide();
//         slideInterval = setInterval(showNextSlide, 5000); // Khởi động lại
//     });

//     document.querySelector(".prev").addEventListener("click", () => {
//         clearInterval(slideInterval); // Dừng tự động khi người dùng nhấn nút
//         showPrevSlide();
//         slideInterval = setInterval(showNextSlide, 5000); // Khởi động lại
//     });

//     // products

//     productLists.forEach((productList, index) => {
//         let currentProductIndex = 0;
//         const totalProducts =
//             productList.querySelectorAll(".product-item").length;
//         const productWidth =
//             productList.querySelector(".product-item").offsetWidth;

//         // Hàm di chuyển tới sản phẩm tiếp theo
//         function moveToNext() {
//             if (currentProductIndex < totalProducts - 7) {
//                 // Kiểm tra nếu không phải sản phẩm cuối cùng
//                 currentProductIndex++;
//                 productList.style.transform = `translateX(-${
//                     currentProductIndex * productWidth * 3 + 50
//                 }px)`;
//             } else {
//                 // Nếu đã đến sản phẩm cuối cùng
//                 currentProductIndex = totalProducts - visibleProducts; // Cố định tại phần tử cuối cùng
//             }
//         }

//         // Hàm di chuyển tới sản phẩm trước
//         function moveToPrev() {
//             if (currentProductIndex > 0) {
//                 // Kiểm tra nếu không phải sản phẩm đầu tiên
//                 currentProductIndex--;
//                 productList.style.transform = `translateX(-${
//                     currentProductIndex * productWidth
//                 }px)`;
//             }
//         }

//         // Thêm sự kiện cho nút next
//         nextButtons[index].addEventListener("click", moveToNext);

//         // Thêm sự kiện cho nút prev
//         prevButtons[index].addEventListener("click", moveToPrev);
//     });
// });

document.addEventListener("DOMContentLoaded", function () {
    // Các biến cho navigation
    const nav = document.querySelector("nav");
    const siderbarClose = document.querySelector(".siderbarClose");
    const siderbarOpen = document.querySelector(".siderbarOpen");

    // Các biến cho slider
    const slides = document.querySelector(".slides");
    const slideCount = document.querySelectorAll(".slide").length;
    let currentSlideIndex = 0;
    let slideInterval;

    // Các biến cho product carousel
    const productCarousels = document.querySelectorAll(".product-carousel");

    // Xử lý navigation
    if (siderbarOpen) {
        siderbarOpen.addEventListener("click", (e) => {
            e.stopPropagation();
            nav.classList.add("active");
        });
    }

    if (siderbarClose) {
        siderbarClose.addEventListener("click", (e) => {
            e.stopPropagation();
            nav.classList.remove("active");
        });
    }

    document.addEventListener("click", (e) => {
        if (nav && !e.target.closest("nav")) {
            nav.classList.remove("active");
        }
    });

    // Xử lý slider
    function initSlider() {
        if (!slides || slideCount === 0) return;

        function showSlide(index) {
            currentSlideIndex = (index + slideCount) % slideCount;
            slides.style.transform = `translateX(-${currentSlideIndex * 100}%)`;
        }

        function nextSlide() {
            showSlide(currentSlideIndex + 1);
        }

        function prevSlide() {
            showSlide(currentSlideIndex - 1);
        }

        function startSlideShow() {
            stopSlideShow();
            slideInterval = setInterval(nextSlide, 5000);
        }

        function stopSlideShow() {
            if (slideInterval) {
                clearInterval(slideInterval);
            }
        }

        const prevButton = document.querySelector(".prev");
        const nextButton = document.querySelector(".next");

        if (prevButton) {
            prevButton.addEventListener("click", () => {
                prevSlide();
                startSlideShow();
            });
        }

        if (nextButton) {
            nextButton.addEventListener("click", () => {
                nextSlide();
                startSlideShow();
            });
        }

        // Touch events cho slider
        let touchStartX = 0;
        let touchEndX = 0;

        slides.addEventListener(
            "touchstart",
            (e) => {
                touchStartX = e.touches[0].clientX;
                stopSlideShow();
            },
            false
        );

        slides.addEventListener(
            "touchmove",
            (e) => {
                touchEndX = e.touches[0].clientX;
            },
            false
        );

        slides.addEventListener(
            "touchend",
            () => {
                const swipeDistance = touchEndX - touchStartX;
                if (Math.abs(swipeDistance) > 50) {
                    if (swipeDistance > 0) {
                        prevSlide();
                    } else {
                        nextSlide();
                    }
                }
                startSlideShow();
            },
            false
        );

        startSlideShow();
    }

    // Khởi tạo các component
    initSlider();
    initProductCarousels();
});
