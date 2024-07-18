<?php
require_once './admin/models/AdminDonHang.php';
class TaiKhoan
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getDetailTaiKhoan($id)
    {
        try {
            $sql = '
                SELECT tai_khoans.*, chuc_vus.ten_chuc_vu 
                FROM tai_khoans
                INNER JOIN chuc_vus ON tai_khoans.chuc_vu_id = chuc_vus.id
                WHERE chuc_vu_id = 3 AND tai_khoans.id = :id
            ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id

            ]);
            return $stmt->fetch();
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function getAllĐonHang()
    {
        try {
            $sql = '
                SELECT * 
                FROM don_hangs
               
            ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function getDonHangByTaiKhoanId($id)
    {
        try {
            $sql = '
            SELECT don_hangs.*, trang_thai_don_hangs.ten_trang_thai
            FROM don_hangs 
            INNER JOIN trang_thai_don_hangs ON don_hangs.trang_thai_id = trang_thai_don_hangs.id
            WHERE don_hangs.tai_khoan_id = :tai_khoan_id
        ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':tai_khoan_id' => $id]);
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            $this->debug($e);
            return false; // Trả về false nếu có lỗi
        }
    }
    public function updateTaiKhoan($id, $ho_ten, $ngay_sinh, $email, $so_dien_thoai, $gioi_tinh, $dia_chi, $mat_khau, $anh_dai_dien)
    {
        try {
            $sql = 'UPDATE tai_khoans 
                SET 
                ho_ten = :ho_ten,
                ngay_sinh = :ngay_sinh,
                email = :email,
                so_dien_thoai = :so_dien_thoai,
                gioi_tinh = :gioi_tinh,
                dia_chi = :dia_chi,
                mat_khau = :mat_khau,
                anh_dai_dien = :anh_dai_dien
                WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ho_ten' => $ho_ten,
                ':ngay_sinh' => $ngay_sinh,
                ':email' => $email,
                ':so_dien_thoai' => $so_dien_thoai,
                ':gioi_tinh' => $gioi_tinh,
                ':dia_chi' => $dia_chi,
                ':mat_khau' => $mat_khau,
                ':anh_dai_dien' => $anh_dai_dien,
                ':id' => $id
            ]);
            return true;
        } catch (\Exception $e) {
            $this->debug($e);
            return false; // Return false on failure to indicate the update failed
        }
    }
    public function getSanPhamDonHang($id)
    {
        try {
            $sql = 'SELECT chi_tiet_don_hangs.*, san_phams.*, don_hangs.* , trang_thai_don_hangs.*
                    FROM chi_tiet_don_hangs
                    INNER JOIN don_hangs ON chi_tiet_don_hangs.don_hang_id = don_hangs.id
                    INNER JOIN san_phams ON chi_tiet_don_hangs.san_pham_id = san_phams.id
                    INNER JOIN tai_khoans ON don_hangs.tai_khoan_id = tai_khoans.id
                    INNER JOIN trang_thai_don_hangs ON don_hangs.trang_thai_id = trang_thai_don_hangs.id

                    WHERE don_hangs.id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id

            ]);
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }

    function debug($e)
    {
        echo '<pre>';
        print_r($e);
        echo '</pre>';
        die();
    }
}
