document.addEventListener("DOMContentLoaded", function () {
    // Cấu hình chung
    const CONFIG = {
        itemsToShow: {
            desktop: 4,
            tablet: 3,
            mobile: 2,
        },
        itemsToScroll: {
            desktop: 3,
            tablet: 2,
            mobile: 1,
        },
        gap: {
            desktop: 24,
            tablet: 16,
            mobile: 12,
        },
        transitionDuration: 500,
        autoplayDelay: 5000,
    };

    // Khởi tạo tất cả carousel
    initializeAllCarousels();

    // Thêm responsive listener
    window.addEventListener(
        "resize",
        debounce(() => {
            initializeAllCarousels();
        }, 250)
    );

    function initializeAllCarousels() {
        const productSections = document.querySelectorAll(".products > div");
        productSections.forEach((section, index) => {
            const carousel = section.querySelector(".product-carousel");
            if (!carousel) return;
            initializeCarousel(carousel, index);
        });
    }

    function initializeCarousel(carousel, sectionIndex) {
        const productList = carousel.querySelector(".product-list");
        const products = productList.querySelectorAll(".product-item");
        if (!productList || products.length === 0) return;

        // Cấu hình carousel dựa trên kích thước màn hình
        const config = getResponsiveConfig();

        // Thiết lập styles
        setupCarouselStyles(productList, carousel, config);

        // Khởi tạo trạng thái carousel
        const state = {
            currentPosition: 0,
            totalProducts: products.length,
            isDragging: false,
            startPos: 0,
            currentTranslate: 0,
            prevTranslate: 0,
        };

        // Khởi tạo controls
        const controls = setupCarouselControls(
            carousel,
            productList,
            products,
            state,
            config
        );

        // Thiết lập các sự kiện
        setupEventListeners(carousel, controls, state, config);
        setupTouchEvents(carousel, productList, state, config);
        setupProductInteractions(products);

        // Khởi tạo vị trí ban đầu
        controls.updatePosition();
        controls.updateButtonStyles();
    }

    function getResponsiveConfig() {
        const width = window.innerWidth;
        if (width <= 768) {
            return {
                itemsToShow: CONFIG.itemsToShow.mobile,
                itemsToScroll: CONFIG.itemsToScroll.mobile,
                gap: CONFIG.gap.mobile,
            };
        } else if (width <= 1024) {
            return {
                itemsToShow: CONFIG.itemsToShow.tablet,
                itemsToScroll: CONFIG.itemsToScroll.tablet,
                gap: CONFIG.gap.tablet,
            };
        }
        return {
            itemsToShow: CONFIG.itemsToShow.desktop,
            itemsToScroll: CONFIG.itemsToScroll.desktop,
            gap: CONFIG.gap.desktop,
        };
    }

    function setupCarouselStyles(productList, carousel, config) {
        productList.style.cssText = `
            display: flex;
            gap: ${config.gap}px;
            width: max-content;
            transition: transform ${CONFIG.transitionDuration}ms ease;
            user-select: none;
            touch-action: pan-y pinch-zoom;
        `;

        carousel.style.cssText = `
            position: relative;
            overflow: hidden;
            margin: 20px 0;
        `;

        if (!document.querySelector("#enhanced-carousel-styles")) {
            const style = document.createElement("style");
            style.id = "enhanced-carousel-styles";
            style.textContent = `
                .product-carousel {
                    position: relative;
                    overflow: hidden;
                }
                .product-carousel .prev-products,
                .product-carousel .next-products {
                    position: absolute;
                    top: 40%;
                    transform: translateY(-50%);
                    z-index: 10;
                    border: none;
                    background: rgba(255, 255, 255, 0.9);
                    border-radius: 50%;
                    width: 40px;
                    height: 40px;
                    cursor: pointer;
                    box-shadow: 0 2px 5px rgba(0,0,0,0.2);
                    transition: all 0.3s ease;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }
                .product-carousel .prev-products:hover,
                .product-carousel .next-products:hover {
                    background: rgba(255, 255, 255, 1);
                    box-shadow: 0 4px 8px rgba(0,0,0,0.3);
                }
                .product-carousel .prev-products { left: 10px; }
                .product-carousel .next-products { right: 10px; }

                .notification {
                    position: fixed;
                    top: 20px;
                    right: 20px;
                    padding: 15px 25px;
                    background: #fff;
                    border-radius: 8px;
                    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
                    z-index: 1000;
                    animation: slideIn 0.5s ease-out;
                }
                .notification.success { border-left: 4px solid #4CAF50; }
                .notification.error { border-left: 4px solid #f44336; }
                @keyframes slideIn {
                    from { transform: translateX(100%); opacity: 0; }
                    to { transform: translateX(0); opacity: 1; }
                }
                @keyframes slideOut {
                    from { transform: translateX(0); opacity: 1; }
                    to { transform: translateX(100%); opacity: 0; }
                }
                @media (max-width: 768px) {
                    .product-carousel .prev-products,
                    .product-carousel .next-products {
                        width: 30px;
                        height: 30px;
                    }
                }
            `;
            document.head.appendChild(style);
        }
    }

    function setupCarouselControls(
        carousel,
        productList,
        products,
        state,
        config
    ) {
        const prevButton = carousel.querySelector(".prev-products");
        const nextButton = carousel.querySelector(".next-products");

        function updateLayout() {
            const containerWidth = carousel.offsetWidth;
            const itemWidth =
                (containerWidth - (config.itemsToShow - 1) * config.gap) /
                config.itemsToShow;

            products.forEach((product) => {
                product.style.minWidth = `${itemWidth}px`;
                product.style.maxWidth = `${itemWidth}px`;
            });

            return itemWidth;
        }

        function updatePosition(smooth = true) {
            const itemWidth = updateLayout();
            productList.style.transition = smooth
                ? `transform ${CONFIG.transitionDuration}ms ease`
                : "none";
            const translateX = -(
                state.currentPosition *
                (itemWidth + config.gap)
            );
            productList.style.transform = `translateX(${translateX}px)`;

            updateVisibility();
            updateButtonStyles();
        }

        function updateVisibility() {
            products.forEach((product, index) => {
                const isVisible =
                    index >= state.currentPosition &&
                    index < state.currentPosition + config.itemsToShow;
                product.style.opacity = isVisible ? "1" : "0.5";
            });
        }

        function updateButtonStyles() {
            const isAtStart = state.currentPosition <= 0;
            const isAtEnd =
                state.currentPosition >=
                state.totalProducts - config.itemsToShow;

            if (prevButton) {
                prevButton.disabled = isAtStart;
                prevButton.style.opacity = isAtStart ? "0.5" : "1";
                prevButton.style.cursor = isAtStart ? "not-allowed" : "pointer";
            }

            if (nextButton) {
                nextButton.disabled = isAtEnd;
                nextButton.style.opacity = isAtEnd ? "0.5" : "1";
                nextButton.style.cursor = isAtEnd ? "not-allowed" : "pointer";
            }
        }

        function moveNext() {
            if (
                state.currentPosition <
                state.totalProducts - config.itemsToShow
            ) {
                state.currentPosition = Math.min(
                    state.currentPosition + config.itemsToScroll,
                    state.totalProducts - config.itemsToShow
                );
                updatePosition();
            }
        }

        function movePrev() {
            if (state.currentPosition > 0) {
                state.currentPosition = Math.max(
                    state.currentPosition - config.itemsToScroll,
                    0
                );
                updatePosition();
            }
        }

        return {
            updatePosition,
            updateButtonStyles,
            moveNext,
            movePrev,
        };
    }

    function setupEventListeners(carousel, controls, state, config) {
        const prevButton = carousel.querySelector(".prev-products");
        const nextButton = carousel.querySelector(".next-products");

        if (prevButton) {
            prevButton.addEventListener("click", () => {
                controls.movePrev();
            });
        }

        if (nextButton) {
            nextButton.addEventListener("click", () => {
                controls.moveNext();
            });
        }

        // Keyboard navigation
        carousel.addEventListener("keydown", (e) => {
            if (e.key === "ArrowLeft") {
                controls.movePrev();
            } else if (e.key === "ArrowRight") {
                controls.moveNext();
            }
        });
    }

    function setupTouchEvents(carousel, productList, state, config) {
        let touchStartX = 0;
        let touchEndX = 0;

        productList.addEventListener("touchstart", (e) => {
            touchStartX = e.touches[0].clientX;
            state.isDragging = true;
            productList.style.transition = "none";
        });

        productList.addEventListener("touchmove", (e) => {
            if (!state.isDragging) return;
            touchEndX = e.touches[0].clientX;
            const diff = touchStartX - touchEndX;
            if (Math.abs(diff) > 5) {
                e.preventDefault();
            }
        });

        productList.addEventListener("touchend", () => {
            state.isDragging = false;
            const diff = touchStartX - touchEndX;

            if (Math.abs(diff) > 50) {
                if (diff > 0) {
                    controls.moveNext();
                } else {
                    controls.movePrev();
                }
            }

            productList.style.transition = `transform ${CONFIG.transitionDuration}ms ease`;
        });
    }

    function setupProductInteractions(products) {
        products.forEach((product) => {
            const buyButton = product.querySelector(".btn-buy");
            const cartButton = product.querySelector(".btn-cart");

            if (buyButton) {
                buyButton.addEventListener("click", () => {
                    showNotification(
                        "Đã thêm sản phẩm vào giỏ hàng!",
                        "success"
                    );
                });
            }

            if (cartButton) {
                cartButton.addEventListener("click", () => {
                    showNotification(
                        "Đã thêm sản phẩm vào giỏ hàng!",
                        "success"
                    );
                });
            }
        });
    }

    function showNotification(message, type) {
        const notification = document.createElement("div");
        notification.textContent = message;
        notification.className = `notification ${type}`;
        notification.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            background: ${type === "success" ? "#4CAF50" : "#2196F3"};
            color: white;
            padding: 15px 25px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            z-index: 1000;
        `;

        document.body.appendChild(notification);

        setTimeout(() => {
            notification.classList.add("hiding");
            setTimeout(() => {
                document.body.removeChild(notification);
            }, 500);
        }, 2000);
    }

    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }
});
