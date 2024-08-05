<?php
class ListSanPham
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllSanPham(){
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
    public function getCaoThap(){
        try {
            $sql = 'SELECT * FROM san_phams ORDER BY gia_san_pham DESC;
            ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function getThapCao(){
        try {
            $sql = 'SELECT * FROM san_phams ORDER BY gia_san_pham ASC;
;
            ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function getMoiNhat(){
        try {
            $sql = 'SELECT * FROM san_phams ORDER BY ngay_nhap DESC;
;
            ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function getPhoBien(){
        try {
            $sql = 'SELECT * FROM san_phams ORDER BY luot_xem DESC;
;
           ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function getSanPhamTimKiem($tu_khoa){
        try {
            $sql = 'SELECT * FROM san_phams WHERE ten_san_pham LIKE :tu_khoa';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':tu_khoa' => '%' . $tu_khoa . '%'
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
