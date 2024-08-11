<?php
class AdminSanPham
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllSanPham()
    {
        try {
            $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc 
            FROM san_phams
            INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
            
            ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function getAllSanPhamHetHang()
    {
        try {
            $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc 
            FROM san_phams
            INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
            WHERE san_phams.trang_thai=0
            ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function getAllSanPhamByDanhMuc($id)
    {
        try {
            $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc 
            FROM san_phams
            INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
            WHERE danh_muc_id=:id
            
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
    public function insertSanPham($ten_san_pham, $gia_san_pham, $gia_khuyen_mai, $so_luong, $ngay_nhap, $danh_muc_id, $trang_thai, $mo_ta, $hinh_anh)
    {
        try {
            $sql = 'INSERT INTO san_phams( ten_san_pham,  gia_san_pham,  gia_khuyen_mai,  so_luong,  ngay_nhap,  danh_muc_id,  trang_thai,  mo_ta,hinh_anh)          
                    VALUES (:ten_san_pham, :gia_san_pham, :gia_khuyen_mai, :so_luong, :ngay_nhap, :danh_muc_id, :trang_thai, :mo_ta, :hinh_anh)';
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
                ':hinh_anh' => $hinh_anh
            ]);
            return $this->conn->lastInsertID();
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function getDetailSanPham($id)
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
    public function updateSanPham($id, $ten_san_pham, $gia_san_pham, $gia_khuyen_mai, $so_luong, $ngay_nhap, $danh_muc_id, $trang_thai, $mo_ta, $hinh_anh)
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

    public function deleteSanPham($id)
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

    public function insertAlbumSanPham($san_pham_id, $link_hinh_anh)
    {
        try {
            $sql = 'INSERT INTO hinh_anh_san_phams(san_pham_id, link_hinh_anh)
                    VALUES (:san_pham_id,:link_hinh_anh)';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':san_pham_id' => $san_pham_id,
                ':link_hinh_anh' => $link_hinh_anh
            ]);
            return true;
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function getListAnhSanPham($id)
    {
        try {
            $sql = 'SELECT * FROM hinh_anh_san_phams 
            WHERE san_pham_id=:id;
            
            ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id'=>$id]);
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function getDetailAnhSanPham($id)
    {
        try {
            $sql = 'SELECT *    FROM hinh_anh_san_phams 
                    
                    WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id

            ]);
            return $stmt->fetch();
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function updateAnhSanPham($id, $new_file)
    {
        try {
            $sql = 'UPDATE hinh_anh_san_phams 
                    SET 
                    link_hinh_anh=:new_file
                    WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                
                ':new_file' => $new_file,
                ':id' => $id
            ]);
            return true;
        } catch (\Exception $e) {
            $this->debug($e);
            return false; // Return false on failure to indicate the update failed
        }
    }
    public function destroyAnhSanPham($id)
    {
        try {
            $sql = 'DELETE FROM hinh_anh_san_phams WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return true;
        } catch (\Exception $e) {
            $this->debug($e);
        }
    
    }
    

}
