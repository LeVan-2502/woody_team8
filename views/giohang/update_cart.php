<?php
    

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $productId = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // Kiểm tra sản phẩm trong giỏ hàng và cập nhật số lượng
    foreach ($_SESSION['cart'] as &$product) {
        if ($product['san_pham_id'] == $productId) {
            $product['so_luong'] = $quantity;

            // Cập nhật số lượng trong cơ sở dữ liệu
            $stmt = $pdo->prepare('UPDATE gio_hang SET so_luong = ? WHERE san_pham_id = ? AND user_id = ?');
            $stmt->execute([$quantity, $productId, $_SESSION['user_id']]);
            
            echo 'Cập nhật thành công';
            exit;
        }
    }

    echo 'Sản phẩm không tồn tại trong giỏ hàng';
}
?>
