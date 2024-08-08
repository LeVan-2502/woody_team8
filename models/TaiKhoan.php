<?php
require_once './admin/models/AdminDonHang.php';
class TaiKhoan
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getTrangThaiHienTai($id)
{
    try {
        $sql = 'SELECT trang_thai_id FROM don_hangs WHERE id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':id' => $id
        ]);
        return $stmt->fetchColumn();
    } catch (\Exception $e) {
        $this->debug($e);
        return null;
    }
}
public function updateTrangThaiDonHang($id, $trang_thai_id)
    {
        try {
            $sql = 'UPDATE don_hangs SET trang_thai_id = :trang_thai_id WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':trang_thai_id' => $trang_thai_id,
                ':id' => $id
            ]);
            return true;
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
 public function laChuyenDoiTrangThaiHopLe($trangThaiHienTai, $trangThaiMoi)
    {
        $chuyenDoiHopLe = [
            0 => [1, 4], // Đặt hàng thành công -> Đang chuẩn bị hàng, Đơn hàng bị hủy
            1 => [2, 4], // Đang chuẩn bị hàng -> Đang giao hàng, Đơn hàng bị hủy
            2 => [3],    // Đang giao hàng -> Giao hàng thành công
            3 => [],     // Giao hàng thành công -> Không chuyển đổi
            4 => []      // Đơn hàng bị hủy -> Không chuyển đổi
        ];

        return in_array($trangThaiMoi, $chuyenDoiHopLe[$trangThaiHienTai]);
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
    public function getThongTinĐonHang($id)
    {
        try {
            $sql = '
                SELECT dh.*, ttdh.ten_trang_thai, pttt.ten_phuong_thuc
                FROM don_hangs dh
                INNER JOIN trang_thai_don_hangs ttdh ON dh.trang_thai_id = ttdh.id
                INNER JOIN phuong_thuc_thanh_toans pttt ON dh.phuong_thuc_thanh_toan_id = pttt.id
                WHERE dh.id=:id
               
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
    public function getDonHangByTaiKhoanId($id)
    {
        try {
            $sql = '
            SELECT don_hangs.*, trang_thai_don_hangs.ten_trang_thai, phuong_thuc_thanh_toans.ten_phuong_thuc
            FROM don_hangs 
            INNER JOIN trang_thai_don_hangs ON don_hangs.trang_thai_id = trang_thai_don_hangs.id
            INNER JOIN phuong_thuc_thanh_toans ON don_hangs.phuong_thuc_thanh_toan_id = phuong_thuc_thanh_toans.id
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
            $sql = 'SELECT chi_tiet_don_hangs.*, san_phams.ten_san_pham, san_phams.gia_san_pham,san_phams.hinh_anh, don_hangs.* , trang_thai_don_hangs.*
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
    private function debug($e)
    {
        echo '<pre>';
        print_r($e);
        echo '</pre>';
        die();
    }
}
