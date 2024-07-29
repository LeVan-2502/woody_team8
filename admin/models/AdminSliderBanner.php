<?php
class AdminSliderBanner
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllSlider()
    {
        try {
            $sql = 'SELECT *
            FROM sliders_banners
            WHERE type=1
            ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function getAllBanner()
    {
        try {
            $sql = 'SELECT *
            FROM sliders_banners
            WHERE type!=1
            ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    
  
    
    public function insertSliderBanner($tieu_de, $trang_thai, $type, $thu_tu_xuat_hien, $hinh_anh)
    {
        try {
            $sql = 'INSERT INTO sliders_banners( tieu_de,  trang_thai,  type,  thu_tu_xuat_hien,hinh_anh)          
                    VALUES (:tieu_de, :trang_thai, :type, :thu_tu_xuat_hien, :hinh_anh)';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':tieu_de' => $tieu_de,
                ':trang_thai' => $trang_thai,
                ':type' => $type,
                ':thu_tu_xuat_hien' => $thu_tu_xuat_hien,
                ':hinh_anh' => $hinh_anh
            ]);
            return true;
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function getDetailSliderBanner($id)
    {
        try {
            $sql = 'SELECT *
            FROM sliders_banners
            WHERE id=:id
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
    public function updateSliderBanner($id, $tieu_de, $trang_thai, $type, $thu_tu_xuat_hien, $hinh_anh)
    {
        try {
            $sql = 'UPDATE sliders_banners 
                    SET 
                    tieu_de = :tieu_de,
                    trang_thai = :trang_thai,
                    type = :type,
                    thu_tu_xuat_hien = :thu_tu_xuat_hien,
                    hinh_anh = :hinh_anh
                    WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':tieu_de' => $tieu_de,
                ':trang_thai' => $trang_thai,
                ':type' => $type,
                ':thu_tu_xuat_hien' => $thu_tu_xuat_hien,
                ':hinh_anh' => $hinh_anh,
                ':id' => $id
            ]);
            return true;
        } catch (\Exception $e) {
            $this->debug($e);
            return false; // Return false on failure to indicate the update failed
        }
    }

    public function deleteSliderBanner($id)
    {
        try {
            $sql = 'DELETE FROM sliders_banners WHERE id=:id';
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
}
