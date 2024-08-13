<?php
class AdminDonHang
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllDonHang()
    {
        try {
            $sql = 'SELECT don_hangs.*, tai_khoans.ho_ten, phuong_thuc_thanh_toans.ten_phuong_thuc, trang_thai_don_hangs.ten_trang_thai, chuc_vus.ten_chuc_vu
            FROM don_hangs
            INNER JOIN tai_khoans ON don_hangs.tai_khoan_id = tai_khoans.id
            INNER JOIN phuong_thuc_thanh_toans ON don_hangs.phuong_thuc_thanh_toan_id = phuong_thuc_thanh_toans.id
            INNER JOIN trang_thai_don_hangs ON don_hangs.trang_thai_id = trang_thai_don_hangs.id
            INNER JOIN chuc_vus ON tai_khoans.chuc_vu_id = chuc_vus.id
            
            ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }

    public function getAllTrangThai()
    {
        try {
            $sql = 'SELECT * FROM trang_thai_don_hangs';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    
    public function getAllDonHangByTrangThai($id)
    {
        try {
            $sql = 'SELECT don_hangs.*, tai_khoans.ho_ten, phuong_thuc_thanh_toans.ten_phuong_thuc, trang_thai_don_hangs.ten_trang_thai, chuc_vus.ten_chuc_vu
            FROM don_hangs
            INNER JOIN tai_khoans ON don_hangs.tai_khoan_id = tai_khoans.id
            INNER JOIN phuong_thuc_thanh_toans ON don_hangs.phuong_thuc_thanh_toan_id = phuong_thuc_thanh_toans.id
            INNER JOIN trang_thai_don_hangs ON don_hangs.trang_thai_id = trang_thai_don_hangs.id
            INNER JOIN chuc_vus ON tai_khoans.chuc_vu_id = chuc_vus.id
            WHERE trang_thai_id=:id
            
            ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
            ]);
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function getDetailDonHang($id)
    {
        try {
            $sql = 'SELECT chi_tiet_don_hangs.*, san_phams.*, don_hangs.* , trang_thai_don_hangs.*
                    FROM chi_tiet_don_hangs
                    INNER JOIN don_hangs ON chi_tiet_don_hangs.don_hang_id = don_hangs.id
                    INNER JOIN san_phams ON chi_tiet_don_hangs.san_pham_id = san_phams.id
                    INNER JOIN tai_khoans ON don_hangs.tai_khoan_id = tai_khoans.id
                    INNER JOIN trang_thai_don_hangs ON don_hangs.trang_thai_id = trang_thai_don_hangs.id

                    WHERE chi_tiet_don_hangs.id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id

            ]);
            return $stmt->fetch();
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function getDonHang($id)
    {
        try {
            $sql = 'SELECT don_hangs.*, trang_thai_don_hangs.ten_trang_thai ,phuong_thuc_thanh_toans.*,khuyen_mais.*
                    FROM don_hangs
                    INNER JOIN trang_thai_don_hangs ON don_hangs.trang_thai_id = trang_thai_don_hangs.id
                    INNER JOIN phuong_thuc_thanh_toans ON don_hangs.phuong_thuc_thanh_toan_id = phuong_thuc_thanh_toans.id
                    INNER JOIN khuyen_mais ON don_hangs.khuyen_mai_id = khuyen_mais.id

                    WHERE don_hangs.id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id

            ]);
            return $stmt->fetch();
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function getSanPhamDonHang($id)
    {
        try {
            $sql = 'SELECT chi_tiet_don_hangs.*, don_hangs.* , trang_thai_don_hangs.*,san_phams.hinh_anh, san_phams.gia_san_pham, san_phams.id, san_phams.ten_san_pham
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
    public function updateDonHang($id, $ten_san_pham, $gia_san_pham, $gia_khuyen_mai, $so_luong, $ngay_nhap, $danh_muc_id, $trang_thai, $mo_ta, $hinh_anh)
    {
        try {
            $sql = 'UPDATE san_phams 
                    SET 
                    ten_san_pham = :ten_san_pham,
                    gia_san_pham = :gia_san_pham,
                    gia_khuyen_mai = :gia_khuyen_mai,
                    so_luong = :so_luong,
                    ngay_nhap = :ngay_nhap,
                    danh_muc_id = :danh_muc_id,
                    trang_thai = :trang_thai,
                    mo_ta = :mo_ta,
                    hinh_anh = :hinh_anh
                    WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ten_san_pham' => $ten_san_pham,
                ':gia_san_pham' => $gia_san_pham,
                ':gia_khuyen_mai' => $gia_khuyen_mai,
                ':so_luong' => $so_luong,
                ':ngay_nhap' => $ngay_nhap,
                ':danh_muc_id' => $danh_muc_id,
                ':trang_thai' => $trang_thai,
                ':mo_ta' => $mo_ta,
                ':hinh_anh' => $hinh_anh,
                ':id' => $id
            ]);
            return true;
        } catch (\Exception $e) {
            $this->debug($e);
            return false; // Return false on failure to indicate the update failed
        }
    }



    public function deleteDonHang($id)
    {
        try {
            $sql = 'DELETE FROM san_phams WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return true;
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

    public function getTrangThaiHienTai($id)
    {
        try {
            $sql = 'SELECT trang_thai_id FROM don_hangs WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            // Lấy kết quả từ câu truy vấn
            $trangThaiHienTai = $stmt->fetchColumn();
            return $trangThaiHienTai;
        } catch (\Exception $e) {
            $this->debug($e);
            return false;
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
}
