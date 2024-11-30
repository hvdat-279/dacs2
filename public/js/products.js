// document.addEventListener("DOMContentLoaded", function () {
//     // Khởi tạo các biến và elements
//     const priceRange = document.getElementById("priceRange");
//     const minPriceInput = document.getElementById("minPrice");
//     const maxPriceInput = document.getElementById("maxPrice");
//     const sizeCheckboxes = document.querySelectorAll(
//         '.size-option input[type="checkbox"]'
//     );
//     const categoryCheckboxes = document.querySelectorAll(
//         '.category-option input[type="checkbox"]'
//     );
//     const applyFiltersBtn = document.querySelector(".apply-filters-btn");
//     const sortSelect = document.getElementById("sortSelect");
//     const productsContainer = document.querySelector(".products-main");
//     let products = [];
//     let originalProducts = [];

//     // Khởi tạo giá trị ban đầu cho price range
//     const maxPrice = 2000000;
//     minPriceInput.value = 0;
//     maxPriceInput.value = maxPrice;
//     priceRange.value = maxPrice;

//     // Hàm format tiền tệ VND
//     function formatCurrency(amount) {
//         return new Intl.NumberFormat("vi-VN", {
//             style: "currency",
//             currency: "VND",
//         }).format(amount);
//     }

//     // Hàm lấy giá từ text
//     function getPriceFromText(priceText) {
//         return parseInt(priceText.replace(/[^\d]/g, ""));
//     }

//     // Cập nhật price range khi thay đổi input
//     priceRange.addEventListener("input", function () {
//         maxPriceInput.value = this.value;
//     });

//     minPriceInput.addEventListener("input", function () {
//         if (parseInt(this.value) > parseInt(maxPriceInput.value)) {
//             this.value = maxPriceInput.value;
//         }
//     });

//     maxPriceInput.addEventListener("input", function () {
//         if (parseInt(this.value) < parseInt(minPriceInput.value)) {
//             this.value = minPriceInput.value;
//         }
//         priceRange.value = this.value;
//     });

//     // Lưu trữ sản phẩm ban đầu
//     function initializeProducts() {
//         const productElements = document.querySelectorAll(".product-item");
//         originalProducts = Array.from(productElements).map((element) => {
//             const priceElement = element.querySelector(".product-price");
//             return {
//                 element: element,
//                 price: getPriceFromText(priceElement.textContent),
//                 name:
//                     element
//                         .querySelector(".product-card-link")
//                         .getAttribute("title") || "",
//                 categories: Array.from(element.classList)
//                     .filter((className) => className.startsWith("category-"))
//                     .map((className) => className.replace("category-", "")),
//                 sizes: Array.from(element.classList)
//                     .filter((className) => className.startsWith("size-"))
//                     .map((className) => className.replace("size-", "")),
//             };
//         });
//         products = [...originalProducts];
//     }

//     // Áp dụng bộ lọc
//     function applyFilters() {
//         const minPrice = parseInt(minPriceInput.value) || 0;
//         const maxPrice = parseInt(maxPriceInput.value) || Infinity;
//         const selectedSizes = Array.from(sizeCheckboxes)
//             .filter((cb) => cb.checked)
//             .map((cb) => cb.value);
//         const selectedCategories = Array.from(categoryCheckboxes)
//             .filter((cb) => cb.checked)
//             .map((cb) => cb.value);

//         products = originalProducts.filter((product) => {
//             const priceMatch =
//                 product.price >= minPrice && product.price <= maxPrice;
//             const sizeMatch =
//                 selectedSizes.length === 0 ||
//                 product.sizes.some((size) => selectedSizes.includes(size));
//             const categoryMatch =
//                 selectedCategories.length === 0 ||
//                 product.categories.some((cat) =>
//                     selectedCategories.includes(cat)
//                 );

//             return priceMatch && sizeMatch && categoryMatch;
//         });

//         applySorting();
//         updateProductsDisplay();
//     }

//     // Áp dụng sắp xếp
//     function applySorting() {
//         const sortValue = sortSelect.value;

//         products.sort((a, b) => {
//             switch (sortValue) {
//                 case "price-asc":
//                     return a.price - b.price;
//                 case "price-desc":
//                     return b.price - a.price;
//                 case "name-asc":
//                     return a.name.localeCompare(b.name);
//                 case "name-desc":
//                     return b.name.localeCompare(a.name);
//                 default:
//                     return 0;
//             }
//         });
//     }

//     // Cập nhật hiển thị sản phẩm
//     function updateProductsDisplay() {
//         productsContainer.innerHTML = "";

//         if (products.length === 0) {
//             productsContainer.innerHTML =
//                 '<p class="no-products">Không tìm thấy sản phẩm phù hợp với bộ lọc</p>';
//             return;
//         }

//         products.forEach((product) => {
//             productsContainer.appendChild(product.element.cloneNode(true));
//         });

//         // Khởi tạo lại các sự kiện cho buttons
//         initializeProductButtons();
//     }

//     // Khởi tạo sự kiện cho các nút trong sản phẩm
//     function initializeProductButtons() {
//         const buyButtons = document.querySelectorAll(".btn-buy");
//         const cartButtons = document.querySelectorAll(".btn-cart");

//         buyButtons.forEach((button) => {
//             button.addEventListener("click", handleBuyNow);
//         });

//         cartButtons.forEach((button) => {
//             button.addEventListener("click", handleAddToCart);
//         });
//     }

//     // Xử lý sự kiện thêm vào giỏ hàng
//     function handleAddToCart(event) {
//         event.preventDefault();
//         const productItem = event.target.closest(".product-item");
//         const productId = productItem.dataset.productId;

//         // Gửi request AJAX để thêm vào giỏ hàng
//         fetch("/cart/add", {
//             method: "POST",
//             headers: {
//                 "Content-Type": "application/json",
//                 "X-CSRF-TOKEN": document.querySelector(
//                     'meta[name="csrf-token"]'
//                 ).content,
//             },
//             body: JSON.stringify({
//                 product_id: productId,
//                 quantity: 1,
//             }),
//         })
//             .then((response) => response.json())
//             .then((data) => {
//                 if (data.success) {
//                     showNotification(
//                         "Đã thêm sản phẩm vào giỏ hàng",
//                         "success"
//                     );
//                     updateCartCount(data.cartCount);
//                 } else {
//                     showNotification(
//                         "Có lỗi xảy ra, vui lòng thử lại",
//                         "error"
//                     );
//                 }
//             })
//             .catch((error) => {
//                 showNotification("Có lỗi xảy ra, vui lòng thử lại", "error");
//             });
//     }

//     // Hiển thị thông báo
//     function showNotification(message, type = "success") {
//         const notification = document.createElement("div");
//         notification.className = `notification ${type}`;
//         notification.textContent = message;

//         document.body.appendChild(notification);

//         setTimeout(() => {
//             notification.classList.add("show");
//         }, 100);

//         setTimeout(() => {
//             notification.classList.remove("show");
//             setTimeout(() => {
//                 notification.remove();
//             }, 300);
//         }, 3000);
//     }

//     // Cập nhật số lượng giỏ hàng
//     function updateCartCount(count) {
//         const cartCountElement = document.querySelector(".cart-count");
//         if (cartCountElement) {
//             cartCountElement.textContent = count;
//         }
//     }

//     // Thêm responsive cho sidebar
//     function initializeSidebar() {
//         const filterSidebar = document.querySelector(".filter-sidebar");
//         const toggleButton = document.createElement("button");
//         toggleButton.className = "toggle-filters-btn";

//         document.querySelector(".products-controls").appendChild(toggleButton);

//         toggleButton.addEventListener("click", () => {
//             filterSidebar.classList.toggle("show");
//         });

//         // Đóng sidebar khi click bên ngoài
//         document.addEventListener("click", (event) => {
//             if (
//                 !filterSidebar.contains(event.target) &&
//                 !toggleButton.contains(event.target) &&
//                 filterSidebar.classList.contains("show")
//             ) {
//                 filterSidebar.classList.remove("show");
//             }
//         });
//     }

//     // Khởi tạo lazy loading cho ảnh
//     function initializeLazyLoading() {
//         const images = document.querySelectorAll(".card-image img");
//         const imageObserver = new IntersectionObserver((entries, observer) => {
//             entries.forEach((entry) => {
//                 if (entry.isIntersecting) {
//                     const img = entry.target;
//                     img.src = img.dataset.src;
//                     img.classList.add("loaded");
//                     observer.unobserve(img);
//                 }
//             });
//         });

//         images.forEach((img) => {
//             if (img.dataset.src) {
//                 imageObserver.observe(img);
//             }
//         });
//     }

//     // Khởi tạo tất cả các chức năng
//     function initialize() {
//         initializeProducts();
//         initializeSidebar();
//         initializeLazyLoading();
//         // initializeProductButtons();

//         // Thêm các event listeners
//         applyFiltersBtn.addEventListener("click", applyFilters);
//         sortSelect.addEventListener("change", () => {
//             applySorting();
//             updateProductsDisplay();
//         });

//         // Thêm debounce cho input giá
//         const debounceFilter = debounce(() => {
//             applyFilters();
//         }, 500);

//         minPriceInput.addEventListener("input", debounceFilter);
//         maxPriceInput.addEventListener("input", debounceFilter);
//         priceRange.addEventListener("input", debounceFilter);

//         // Áp dụng filters ban đầu
//         applyFilters();
//     }

//     // Utility function để debounce
//     function debounce(func, wait) {
//         let timeout;
//         return function executedFunction(...args) {
//             const later = () => {
//                 clearTimeout(timeout);
//                 func(...args);
//             };
//             clearTimeout(timeout);
//             timeout = setTimeout(later, wait);
//         };
//     }

//     // Khởi chạy
//     initialize();
// });

// products.optimized.js
class ProductManager {
    constructor() {
        this.priceRange = document.getElementById("priceRange");
        this.minPriceInput = document.getElementById("minPrice");
        this.maxPriceInput = document.getElementById("maxPrice");
        this.sizeCheckboxes = document.querySelectorAll(
            '.size-option input[type="checkbox"]'
        );
        this.categoryCheckboxes = document.querySelectorAll(
            '.category-option input[type="checkbox"]'
        );
        this.applyFiltersBtn = document.querySelector(".apply-filters-btn");
        this.sortSelect = document.getElementById("sortSelect");
        this.productsContainer = document.querySelector(".products-main");
        this.products = [];
        this.originalProducts = [];
        this.maxPrice = 2000000;

        this.initializePriceRange();
        this.setupEventListeners();
    }

    // Khởi tạo giá trị price range
    initializePriceRange() {
        this.minPriceInput.value = 0;
        this.maxPriceInput.value = this.maxPrice;
        this.priceRange.value = this.maxPrice;
    }

    // Utility functions
    formatCurrency(amount) {
        return new Intl.NumberFormat("vi-VN", {
            style: "currency",
            currency: "VND",
        }).format(amount);
    }

    getPriceFromText(priceText) {
        return parseInt(priceText.replace(/[^\d]/g, ""));
    }

    debounce(func, wait) {
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

    // Event Listeners
    setupEventListeners() {
        this.priceRange.addEventListener("input", () => {
            this.maxPriceInput.value = this.priceRange.value;
        });

        this.minPriceInput.addEventListener("input", () => {
            if (
                parseInt(this.minPriceInput.value) >
                parseInt(this.maxPriceInput.value)
            ) {
                this.minPriceInput.value = this.maxPriceInput.value;
            }
        });

        this.maxPriceInput.addEventListener("input", () => {
            if (
                parseInt(this.maxPriceInput.value) <
                parseInt(this.minPriceInput.value)
            ) {
                this.maxPriceInput.value = this.minPriceInput.value;
            }
            this.priceRange.value = this.maxPriceInput.value;
        });

        this.applyFiltersBtn.addEventListener("click", () =>
            this.applyFilters()
        );
        this.sortSelect.addEventListener("change", () => this.applyFilters());
    }

    // Product Management
    initializeProducts() {
        const productElements = document.querySelectorAll(".product-item");
        this.originalProducts = Array.from(productElements).map((element) => ({
            element: element,
            price: this.getPriceFromText(
                element.querySelector(".product-price").textContent
            ),
            name:
                element
                    .querySelector(".product-card-link")
                    .getAttribute("title") || "",
            categories: Array.from(element.classList)
                .filter((className) => className.startsWith("category-"))
                .map((className) => className.replace("category-", "")),
            sizes: Array.from(element.classList)
                .filter((className) => className.startsWith("size-"))
                .map((className) => className.replace("size-", "")),
        }));
        this.products = [...this.originalProducts];
    }

    // Filtering and Sorting
    applyFilters() {
        const minPrice = parseInt(this.minPriceInput.value) || 0;
        const maxPrice = parseInt(this.maxPriceInput.value) || Infinity;
        const selectedSizes = Array.from(this.sizeCheckboxes)
            .filter((cb) => cb.checked)
            .map((cb) => cb.value);
        const selectedCategories = Array.from(this.categoryCheckboxes)
            .filter((cb) => cb.checked)
            .map((cb) => cb.value);

        this.products = this.originalProducts.filter((product) => {
            const priceMatch =
                product.price >= minPrice && product.price <= maxPrice;
            const sizeMatch =
                selectedSizes.length === 0 ||
                product.sizes.some((size) => selectedSizes.includes(size));
            const categoryMatch =
                selectedCategories.length === 0 ||
                product.categories.some((cat) =>
                    selectedCategories.includes(cat)
                );
            return priceMatch && sizeMatch && categoryMatch;
        });

        this.applySorting();
        this.updateProductsDisplay();
    }

    applySorting() {
        const sortValue = this.sortSelect.value;
        this.products.sort((a, b) => {
            switch (sortValue) {
                case "price-asc":
                    return a.price - b.price;
                case "price-desc":
                    return b.price - a.price;
                case "name-asc":
                    return a.name.localeCompare(b.name);
                case "name-desc":
                    return b.name.localeCompare(a.name);
                default:
                    return 0;
            }
        });
    }

    // UI Updates
    updateProductsDisplay() {
        this.productsContainer.innerHTML = "";

        if (this.products.length === 0) {
            this.productsContainer.innerHTML =
                '<p class="no-products">Không tìm thấy sản phẩm phù hợp với bộ lọc</p>';
            return;
        }

        this.products.forEach((product) => {
            this.productsContainer.appendChild(product.element.cloneNode(true));
        });

        this.initializeProductButtons();
    }

    initializeProductButtons() {
        const buyButtons = document.querySelectorAll(".btn-buy");
        const cartButtons = document.querySelectorAll(".btn-cart");

        buyButtons.forEach((button) => {
            button.addEventListener("click", this.handleBuyNow.bind(this));
        });

        cartButtons.forEach((button) => {
            button.addEventListener("click", this.handleAddToCart.bind(this));
        });
    }

    // Cart Management
    handleAddToCart(event) {
        event.preventDefault();
        const productItem = event.target.closest(".product-item");
        const productId = productItem.dataset.productId;

        fetch("/cart/add", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector(
                    'meta[name="csrf-token"]'
                ).content,
            },
            body: JSON.stringify({
                product_id: productId,
                quantity: 1,
            }),
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.success) {
                    this.showNotification(
                        "Đã thêm sản phẩm vào giỏ hàng",
                        "success"
                    );
                    this.updateCartCount(data.cartCount);
                } else {
                    this.showNotification(
                        "Có lỗi xảy ra, vui lòng thử lại",
                        "error"
                    );
                }
            })
            .catch((error) => {
                this.showNotification(
                    "Có lỗi xảy ra, vui lòng thử lại",
                    "error"
                );
            });
    }

    handleBuyNow(event) {
        // Implement buy now functionality
    }

    // Notifications
    showNotification(message, type = "success") {
        const notification = document.createElement("div");
        notification.className = `notification ${type}`;
        notification.textContent = message;
        document.body.appendChild(notification);

        setTimeout(() => {
            notification.classList.add("show");
        }, 100);

        setTimeout(() => {
            notification.classList.remove("show");
            setTimeout(() => {
                notification.remove();
            }, 300);
        }, 3000);
    }

    updateCartCount(count) {
        const cartCountElement = document.querySelector(".cart-count");
        if (cartCountElement) {
            cartCountElement.textContent = count;
        }
    }

    // Responsive Sidebar
    initializeSidebar() {
        const filterToggle = document.querySelector(".filter-toggle");
        const filterSidebar = document.querySelector(".filter-sidebar");
        const overlay = document.querySelector(".sidebar-overlay");

        if (filterToggle && filterSidebar) {
            filterToggle.addEventListener("click", () => {
                filterSidebar.classList.toggle("active");
                if (overlay) {
                    overlay.classList.toggle("active");
                }
            });

            if (overlay) {
                overlay.addEventListener("click", () => {
                    filterSidebar.classList.remove("active");
                    overlay.classList.remove("active");
                });
            }
        }
    }

    // Lazy Loading
    initializeLazyLoading() {
        const lazyImages = document.querySelectorAll("img[data-src]");
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.removeAttribute("data-src");
                    observer.unobserve(img);
                }
            });
        });

        lazyImages.forEach((img) => imageObserver.observe(img));
    }
}

// Initialize when DOM is ready
document.addEventListener("DOMContentLoaded", () => {
    const productManager = new ProductManager();
    productManager.initializeProducts();
    productManager.initializeSidebar();
    productManager.initializeLazyLoading();
});
