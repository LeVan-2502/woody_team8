<?php
class AdminBinhLuan
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllBinhLuan($id)
    {
        try {
            $sql = 'SELECT binh_luans.*, tai_khoans.ho_ten, san_phams.ten_san_pham
            FROM binh_luans
            INNER JOIN tai_khoans ON binh_luans.tai_khoan_id = tai_khoans.id
            INNER JOIN san_phams ON binh_luans.san_pham_id = san_phams.id
            WHERE san_phams.id=:id
            
            ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
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
    
    public function getDetailBinhLuan($id)
    {
        try {
            $sql = 'SELECT binh_luans.*, san_phams.ten_san_pham,tai_khoans.ho_ten
                    FROM binh_luans
                    INNER JOIN san_phams ON binh_luans.san_pham_id = san_phams.id
                    INNER JOIN tai_khoans ON binh_luans.tai_khoan_id = tai_khoans.id

                    WHERE binh_luans.id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id

            ]);
            return $stmt->fetch();
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function getSanPhamBinhLuangetAllBinhLuan($id)
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
    public function updateBinhLuangetAllBinhLuan($id, $ten_san_pham, $gia_san_pham, $gia_khuyen_mai, $so_luong, $ngay_nhap, $danh_muc_id, $trang_thai, $mo_ta, $hinh_anh)
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

    public function deleteBinhLuangetAllBinhLuan($id)
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
    public function updateTrangThaiBinhLuan($id,$trang_thai)
    {
        try {
            $sql = 'UPDATE binh_luans SET trang_thai = :trang_thai WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':trang_thai'=> $trang_thai,
                ':id' => $id
            ]);
            return true;
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
}
