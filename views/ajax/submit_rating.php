<?php
// Kết nối đến CSDL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "woody";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Nhận dữ liệu từ AJAX
$user_id = $_POST['id'];
$product_id = $_POST['san_pham_id'];
$rating = $_POST['danh_gia'];

// Chèn đánh giá vào CSDL
$sql = "INSERT INTO danh_gia_san_phams (id, san_pham_id, danh_gia) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iii", $id, $san_pham_id, $danh_gia);

if ($stmt->execute()) {
    echo "Đánh giá đã được lưu thành công!";
} else {
    echo "Lỗi: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>
