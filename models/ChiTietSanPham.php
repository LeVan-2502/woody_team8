<?php
class ChiTietSanPham
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getChiTietSanPham($id)
    {
        try {
            $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc 
                    FROM san_phams
                    INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
                    WHERE san_phams.id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id

            ]);
            return $stmt->fetch();
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }

    public function getAlbumSanPham($id)
    {
        try {
            $sql = 'SELECT * 
                    FROM hinh_anh_san_phams
                    WHERE san_pham_id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id

            ]);
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function getAllBinhLuanSanPham($id)
    {
        try {
            $sql = 'SELECT binh_luans.*, tai_khoans.anh_dai_dien,  tai_khoans.ho_ten
                    FROM binh_luans 
                    INNER JOIN tai_khoans ON binh_luans.tai_khoan_id = tai_khoans.id
                    WHERE san_pham_id=:id
                    AND binh_luans.trang_thai=1'
                    ;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id

            ]);
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function sanPhamLienQuan($id)
    {
        try {
            $sql = 'SELECT * 
                    FROM san_phams
                    WHERE danh_muc_id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id

            ]);
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function updateLuotView($id)
    {
        try {
            $sql = 'UPDATE san_phams 
                    SET luot_xem=luot_xem+1 
                    WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id

            ]);
            return true;
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function insertBinhLuan($san_pham_id, $tai_khoan_id ,$noi_dung, $ngay_dang, $trang_thai)
{
    try {
        $sql = 'INSERT INTO binh_luans (san_pham_id, tai_khoan_id, noi_dung, ngay_dang, trang_thai)
                VALUES (:san_pham_id, :tai_khoan_id,:noi_dung, :ngay_dang, :trang_thai)';
        
        $stmt = $this->conn->prepare($sql);
        
        // Gán giá trị cho các tham số
        $stmt->bindParam(':san_pham_id', $san_pham_id, PDO::PARAM_INT);
        $stmt->bindParam(':tai_khoan_id', $tai_khoan_id, PDO::PARAM_STR);
      
        $stmt->bindParam(':noi_dung', $noi_dung, PDO::PARAM_STR);
        $stmt->bindParam(':ngay_dang', $ngay_dang, PDO::PARAM_STR);
        $stmt->bindParam(':trang_thai', $trang_thai, PDO::PARAM_INT);
        
        // Thực thi câu lệnh
        $stmt->execute();
        
        return true;
    } catch (\Exception $e) {
        $this->debug($e);
        return false; // Trả về false nếu có lỗi
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
