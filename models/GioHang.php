<?php
class GioHang
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function showOneSanPham($id)
    {
        try {
            $sql = 'SELECT *
                    FROM san_phams
                    WHERE san_phams.id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
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

    public function insertCartItem($gio_hang_id, $san_pham_id, $so_luong)
    {
        try {
            $sql = 'INSERT INTO chi_tiet_gio_hangs (gio_hang_id, san_pham_id, so_luong)
                    VALUES (:gio_hang_id, :san_pham_id, :so_luong)';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':gio_hang_id' => $gio_hang_id,
                ':san_pham_id' => $san_pham_id,
                ':so_luong' => $so_luong,
            ]);
            return true;
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }

    public function getSanPhamGioHangUser($id)
    {
        try {
            $sql = 'SELECT chi_tiet_gio_hangs.*, san_phams.hinh_anh, san_phams.gia_san_pham, san_phams.ten_san_pham
                    FROM chi_tiet_gio_hangs
                    INNER JOIN san_phams ON chi_tiet_gio_hangs.san_pham_id = san_phams.id
                    WHERE chi_tiet_gio_hangs.gio_hang_id = :id';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }


    public function deleteSanPhamGioHang($gio_hang_id, $san_pham_id)
    {
        try {
            $sql = '
                DELETE FROM chi_tiet_gio_hangs
                WHERE gio_hang_id = :gio_hang_id
                AND san_pham_id = :san_pham_id
            ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':gio_hang_id' => $gio_hang_id,
                ':san_pham_id' => $san_pham_id,
            ]);
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function updateSoLuongSanPhamGioHang($gio_hang_id, $san_pham_id, $so_luong)
    {
        try {
            $sql = 'UPDATE chi_tiet_gio_hangs 
                SET so_luong = :so_luong
                WHERE gio_hang_id = :gio_hang_id
                AND san_pham_id = :san_pham_id';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':so_luong' => $so_luong,
                ':gio_hang_id' => $gio_hang_id,
                ':san_pham_id' => $san_pham_id
            ]);
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function getAllCart()
    {
        try {
            $sql = 'SELECT *
                    FROM gio_hangs
                   ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function getAllPhuongThuc()
    {
        try {
            $sql = 'SELECT *
                    FROM phuong_thuc_thanh_toans
                   ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function updateSanPhamGioHang($san_pham_id, $so_luong)
    {
        try {
            $sql = 'UPDATE chi_tiet_gio_hangs 
                SET so_luong = :so_luong
                WHERE san_pham_id = :san_pham_id
                ';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':san_pham_id' => $san_pham_id,
                ':so_luong' => $so_luong,

            ]);
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function capNhatSanPhamGioHang($id, $so_luong)
    {
        try {
            $sql = "UPDATE chi_tiet_gio_hangs SET so_luong = :so_luong WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':so_luong', $so_luong, PDO::PARAM_INT);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }

    public function insertDonHang($tai_khoan_id, $ten_nguoi_nhan, $email_nguoi_nhan, $sdt_nguoi_nhan, $dia_chi_nguoi_nhan, $ngay_dat, $tong_tien, $ghi_chu, $phuong_thuc_thanh_toan_id, $trang_thai_id)
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
                    tai_khoan_id, 
                    ten_nguoi_nhan, 
                    email_nguoi_nhan, 
                    sdt_nguoi_nhan, 
                    dia_chi_nguoi_nhan, 
                    ngay_dat, 
                    tong_tien, 
                    ghi_chu, 
                    phuong_thuc_thanh_toan_id, 
                    trang_thai_id
                ) VALUES (
                    :tai_khoan_id, 
                    :ten_nguoi_nhan, 
                    :email_nguoi_nhan, 
                    :sdt_nguoi_nhan, 
                    :dia_chi_nguoi_nhan, 
                    :ngay_dat, 
                    :tong_tien, 
                    :ghi_chu, 
                    :phuong_thuc_thanh_toan_id, 
                    :trang_thai_id
                )';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':tai_khoan_id' => $tai_khoan_id,
                ':ten_nguoi_nhan' => $ten_nguoi_nhan,
                ':email_nguoi_nhan' => $email_nguoi_nhan,
                ':sdt_nguoi_nhan' => $sdt_nguoi_nhan,
                ':dia_chi_nguoi_nhan' => $dia_chi_nguoi_nhan,
                ':ngay_dat' => $ngay_dat,
                ':tong_tien' => $tong_tien,
                ':ghi_chu' => $ghi_chu,
                ':phuong_thuc_thanh_toan_id' => $phuong_thuc_thanh_toan_id,
                ':trang_thai_id' => $trang_thai_id
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

    private function debug($e)
    {
        echo '<pre>';
        print_r($e);
        echo '</pre>';
        die();
    }
}
