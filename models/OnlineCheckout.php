<?php
class OnlineCheckout {
    public $conn;
    public function __construct(){
        $this->conn = connectDB();
    }
    public function insertDonHang($ma_don_hang,$tai_khoan_id, $ten_nguoi_nhan, $email_nguoi_nhan, $sdt_nguoi_nhan, $dia_chi_nguoi_nhan, $ngay_dat, $tong_tien, $ghi_chu, $phuong_thuc_thanh_toan_id, $trang_thai_id, $khuyen_mai_id)
    {
        $date = DateTime::createFromFormat('Y-m-d', $ngay_dat);
        if (!$date || $date->format('Y-m-d') !== $ngay_dat) {
            throw new Exception("Định dạng ngày giờ không hợp lệ");
        }

        // Kiểm tra giá trị số
        if (!is_numeric($tong_tien)) {
            throw new Exception("Giá trị tổng tiền không hợp lệ");
        }
        try {
            // SQL để chèn đơn hàng vào bảng don_hangs
            $sql = 'INSERT INTO don_hangs (
                    ma_don_hang,
                    tai_khoan_id, 
                    ten_nguoi_nhan, 
                    email_nguoi_nhan, 
                    sdt_nguoi_nhan, 
                    dia_chi_nguoi_nhan, 
                    ngay_dat, 
                    tong_tien, 
                    ghi_chu, 
                    phuong_thuc_thanh_toan_id, 
                    trang_thai_id,
                    khuyen_mai_id
                ) VALUES (
                :ma_don_hang, 
                    :tai_khoan_id, 
                    :ten_nguoi_nhan, 
                    :email_nguoi_nhan, 
                    :sdt_nguoi_nhan, 
                    :dia_chi_nguoi_nhan, 
                    :ngay_dat, 
                    :tong_tien, 
                    :ghi_chu, 
                    :phuong_thuc_thanh_toan_id, 
                    :trang_thai_id,
                    :khuyen_mai_id
                )';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ma_don_hang' => $ma_don_hang,
                ':tai_khoan_id' => $tai_khoan_id,
                ':ten_nguoi_nhan' => $ten_nguoi_nhan,
                ':email_nguoi_nhan' => $email_nguoi_nhan,
                ':sdt_nguoi_nhan' => $sdt_nguoi_nhan,
                ':dia_chi_nguoi_nhan' => $dia_chi_nguoi_nhan,
                ':ngay_dat' => $ngay_dat,
                ':tong_tien' => $tong_tien,
                ':ghi_chu' => $ghi_chu,
                ':phuong_thuc_thanh_toan_id' => $phuong_thuc_thanh_toan_id,
                ':trang_thai_id' => $trang_thai_id,
                ':khuyen_mai_id' => $khuyen_mai_id
            ]);
            return $this->conn->lastInsertId(); // Sửa tên phương thức từ lastInsertID thành lastInsertId()
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function insertChiTietDonHang($donHangId, $sanPhamId, $donGia, $soLuong, $thanhTien)
    {
        try {
            $sql = 'INSERT INTO chi_tiet_don_hangs (
                    don_hang_id, 
                    san_pham_id, 
                    don_gia, 
                    so_luong, 
                    thanh_tien
                ) VALUES (
                    :don_hang_id, 
                    :san_pham_id, 
                    :don_gia, 
                    :so_luong, 
                    :thanh_tien
                )';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':don_hang_id' => $donHangId,
                ':san_pham_id' => $sanPhamId,
                ':don_gia' => $donGia,
                ':so_luong' => $soLuong,
                ':thanh_tien' => $thanhTien
            ]);
            return $this->conn->lastInsertId(); // Lấy ID của bản ghi mới chèn (nếu cần)
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function insertThanhToanOnline($maGiaoDich, $trangThai, $soTien, $ngayGio, $thongTinDonHang)
{
    try {
        $sql = 'INSERT INTO thanh_toan_online (
                ma_giao_dich, 
                trang_thai, 
                so_tien, 
                ngay_gio, 
                thong_tin_don_hang
            ) VALUES (
                :ma_giao_dich, 
                :trang_thai, 
                :so_tien, 
                :ngay_gio, 
                :thong_tin_don_hang
            )';
        
        $stmt = $this->conn->prepare($sql);
        
        $stmt->execute([
            ':ma_giao_dich' => $maGiaoDich,
            ':trang_thai' => $trangThai,
            ':so_tien' => $soTien,
            ':ngay_gio' => $ngayGio,
            ':thong_tin_don_hang' => $thongTinDonHang
        ]);
        
        return $this->conn->lastInsertId(); // Lấy ID của bản ghi mới chèn (nếu cần)
    } catch (\Exception $e) {
        // Xử lý lỗi hoặc ghi lại thông tin lỗi
        $this->debug($e);
    }
}

    public function getCartID($tai_khoan_id)
    {
        $cart = $this->getCartByUserID($tai_khoan_id);
        if (empty($cart)) {
            return $this->insertCartGetLastID($tai_khoan_id);
        }
        return $cart['id'];
    }
    public function updateSoLuongSanPhams($id,$so_luong)
    {
        try {
            $sql = '
                UPDATE san_phams SET so_luong=:so_luong
                WHERE id=:id
            ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
                ':so_luong' => $so_luong
            ]);
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function updateTrangThaiSanPham($id)
{
    try {
        // Sửa lỗi so sánh trong câu lệnh SQL
        $sql = '
            UPDATE san_phams SET trang_thai = 0
            WHERE id = :id
        ';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':id' => $id
        ]);
    } catch (\Exception $e) {
        // Gọi phương thức debug để xử lý lỗi
        $this->debug($e);
    }
}

    public function getSoLuongSanPhams($id)
    {
        try {
            $sql = '
                SELECT so_luong
                FROM san_phams
                WHERE id = :id
            ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
    
            // Fetch số lượng sản phẩm từ cơ sở dữ liệu
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                return $result['so_luong'];
            } else {
                // Xử lý khi không tìm thấy sản phẩm
                throw new Exception("Sản phẩm với ID $id không tồn tại.");
            }
        } catch (\Exception $e) {
            $this->debug($e);
            return null; // Hoặc bạn có thể ném ngoại lệ nếu cần
        }
    }
    
    public function deleteGioHangDuLieu($gio_hang_id)
    {
        try {
            $sql = '
                DELETE FROM chi_tiet_gio_hangs
                WHERE gio_hang_id = :gio_hang_id
            ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':gio_hang_id' => $gio_hang_id,
            ]);
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function getCartByUserID($tai_khoan_id)
    {
        try {
            $sql = 'SELECT *
                    FROM gio_hangs
                    WHERE tai_khoan_id = :tai_khoan_id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':tai_khoan_id' => $tai_khoan_id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function insertCartGetLastID($tai_khoan_id)
    {
        try {
            $sql = 'INSERT INTO gio_hangs (tai_khoan_id)
                    VALUES (:tai_khoan_id)';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':tai_khoan_id' => $tai_khoan_id]);
            return $this->conn->lastInsertId();
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function getLastDonHangID()
{
    try {
        $sql = 'SELECT id FROM don_hangs ORDER BY id DESC LIMIT 1';
        $stmt = $this->conn->query($sql);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['id'] : null;
    } catch (\Exception $e) {
        $this->debug($e);
    }
}


    
    private function debug($e)
    {
        echo '<pre>';
        print_r($e);
        echo '</pre>';
        die();
    }
}