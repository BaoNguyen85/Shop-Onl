$(document).on('click', '.fa-cart-shopping', function(e) {
    e.preventDefault();

    var productId = $(this).closest('.product, .product-collection, .product-detail').data('id');

    $.ajax({
        url: cartAddUrl,  // Sử dụng biến đã được truyền từ Blade
        method: "POST",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),  // Đảm bảo bạn có thẻ meta CSRF token trong HTML
            product_id: productId
        },
        success: function(response) {
            alert(response.message); // Thông báo khi thêm vào giỏ hàng thành công
        },
        error: function(xhr) {
            alert('Có lỗi xảy ra, vui lòng thử lại.');
        }
    });
});


$(document).ready(function() {
    // Xử lý nút tăng/giảm số lượng
    $(document).on('click', '.increase-quantity, .decrease-quantity', function(e) {
        e.preventDefault();

        var action = $(this).data('action');
        var quantityInput = $('#product-quantity');
        var currentQuantity = parseInt(quantityInput.val());

        if (action === 'increase') {
            quantityInput.val(currentQuantity + 1);
        } else if (action === 'decrease' && currentQuantity > 1) {
            quantityInput.val(currentQuantity - 1);
        }
    });

    // Xử lý thêm vào giỏ hàng
    $(document).on('click', '.btn-addcart', function(e) {
        e.preventDefault();

        var productId = $(this).data('product-id');
        var quantity = $('#product-quantity').val(); // Lấy số lượng sản phẩm từ input

        $.ajax({
            url: cartAddUrl,  // Đường dẫn tới route thêm vào giỏ hàng
            method: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                product_id: productId,
                quantity: quantity  // Gửi số lượng sản phẩm cùng với request
            },
            success: function(response) {
                alert(response.message); // Thông báo khi thêm vào giỏ hàng thành công
            },
            error: function(xhr) {
                alert('Có lỗi xảy ra, vui lòng thử lại.');
            }
        });
    });
});


$(document).ready(function() {
    // Nút tăng số lượng
    $(document).on('click', '.increase-quantity', function(e) {
        e.preventDefault();

        var productId = $(this).data('product-id');

        $.ajax({
            url: cartUpdateUrl,  // Đường dẫn tới route cập nhật giỏ hàng
            method: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                product_id: productId,
                action: 'increase'
            },
            success: function(response) {
                location.reload();  // Reload lại trang để cập nhật số lượng
            },
            error: function(xhr) {
                alert('Có lỗi xảy ra, vui lòng thử lại.');
            }
        });
    });

    // Nút giảm số lượng
    $(document).on('click', '.decrease-quantity', function(e) {
        e.preventDefault();

        var productId = $(this).data('product-id');

        $.ajax({
            url: cartUpdateUrl,  // Đường dẫn tới route cập nhật giỏ hàng
            method: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                product_id: productId,
                action: 'decrease'
            },
            success: function(response) {
                location.reload();  // Reload lại trang để cập nhật số lượng
            },
            error: function(xhr) {
                alert('Có lỗi xảy ra, vui lòng thử lại.');
            }
        });
    });
});
