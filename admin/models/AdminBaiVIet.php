<?php
class AdminBaiViet
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllBaiViet()
    {
        try {
            $sql = 'SELECT bv.*, dm.ten_danh_muc, tk.ho_ten 
            FROM bai_viets bv 
            INNER JOIN danh_mucs dm ON bv.danh_muc_id = dm.id
            INNER JOIN tai_khoans tk ON bv.tai_khoan_id = tk.id
            
            ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    
    public function getAllDanhMuc()
    {
        try {
            $sql = 'SELECT * FROM danh_mucs
            
            ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function getAllTag()
    {
        try {
            $sql = 'SELECT * FROM tags
            
            ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    
    public function insertBaiViet($tieu_de, $noi_dung, $ngay_dang, $tai_khoan_id, $danh_muc_id, $hinh_anh, $luot_xem, $luot_binh_luan)
    {
        try {
            $sql = 'INSERT INTO bai_viets( tieu_de,  noi_dung,  ngay_dang,  tai_khoan_id,  danh_muc_id,  hinh_anh,  luot_xem,  luot_binh_luan)          
                    VALUES (:tieu_de, :noi_dung, :ngay_dang, :tai_khoan_id, :danh_muc_id, :hinh_anh, :luot_xem, :luot_binh_luan)';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':tieu_de' => $tieu_de,
                ':noi_dung' => $noi_dung,
                ':ngay_dang' => $ngay_dang,
                ':tai_khoan_id' => $tai_khoan_id,
                ':danh_muc_id' => $danh_muc_id,
                ':hinh_anh' => $hinh_anh,
                ':luot_xem' => $luot_xem,
                ':luot_binh_luan' => $luot_binh_luan,
               
            ]);
            return true;
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function insertTagBaiViet($bai_viet_id, $tag_id)
    {
        try {
            $sql ='
                INSERT bai_viets_tags  
                VALUES (:bai_viet_id, :tag_id)
            ' ;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':bai_viet_id' => $bai_viet_id,
                ':tag_id' => $tag_id

            ]);
            return $stmt->fetch();
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function getBaiVietIDLast()
{
    try {
        $sql = 'SELECT id FROM bai_viets ORDER BY id DESC LIMIT 1';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['id'] : null;
    } catch (Exception $e) {
        $this->debug($e);
        return null;
    }
}

    public function getDetailBaiViet($id)
    {
        try {
            $sql = 'SELECT bv.*, dm.ten_danh_muc, tk.ho_ten 
            FROM bai_viets bv 
            INNER JOIN danh_mucs dm ON bv.danh_muc_id = dm.id
            INNER JOIN tai_khoans tk ON bv.tai_khoan_id = tk.id
            WHERE bv.id=:id
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

    public function updateBaiViet($id, $tieu_de, $noi_dung, $ngay_dang, $tai_khoan_id, $danh_muc_id, $hinh_anh)
    {
        try {
            $sql = 'UPDATE bai_viets 
                    SET 
                    tieu_de = :tieu_de,
                    noi_dung = :noi_dung,
                    ngay_dang = :ngay_dang,
                    tai_khoan_id = :tai_khoan_id,
                    danh_muc_id = :danh_muc_id,
                    hinh_anh = :hinh_anh
                   
                    WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':tieu_de' => $tieu_de,
                ':noi_dung' => $noi_dung,
                ':ngay_dang' => $ngay_dang,
                ':tai_khoan_id' => $tai_khoan_id,
                ':danh_muc_id' => $danh_muc_id,
                ':hinh_anh' => $hinh_anh,
                ':id' => $id
            ]);
            return true;
        } catch (\Exception $e) {
            $this->debug($e);
            return false; // Return false on failure to indicate the update failed
        }
    }

    public function deleteBaiViet($id)
    {
        try {
            $sql = 'DELETE FROM bai_viets WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return true;
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function deleteTagBaiViet($id)
    {
        try {
            $sql = 'DELETE FROM bai_viets_tags bvt WHERE bvt.bai_viet_id=:id';
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
