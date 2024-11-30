$(document).ready(function () {
    $(".btn-cart").on("click", function (e) {
        e.preventDefault(); // Ngừng hành động mặc định của form (reload trang)

        var form = $(this).closest("form");
        var data = form.serialize(); // Lấy tất cả dữ liệu trong form (bao gồm id, quantity, size)

        $.ajax({
            url: form.attr("action"), // URL của form (cart.add route)
            method: form.attr("method"), // Method (POST)
            data: data, // Dữ liệu gửi lên
            success: function (response) {
                if (response.success) {
                    // Hiển thị thông báo sản phẩm đã được thêm vào giỏ
                    alert(response.message);

                    // Cập nhật giỏ hàng nếu cần thiết
                    $("#total-quantity").text(response.cart.totalQuantity); // Cập nhật tổng số lượng giỏ hàng
                    $("#total-price").text(
                        response.cart.totalPrice.toLocaleString() + " VND"
                    ); // Cập nhật tổng tiền giỏ hàng
                } else {
                    alert("Đã xảy ra lỗi khi thêm sản phẩm vào giỏ hàng.");
                }
            },
            error: function (error) {
                console.error(error.responseJSON.message); // In lỗi nếu có
            },
        });
    });
});
