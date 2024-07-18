<?php
class AdminQuanTriVien
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllQuanTriVien()
    {
        try {
            $sql = 'SELECT tai_khoans.*, chuc_vus.ten_chuc_vu 
            FROM tai_khoans
            INNER JOIN chuc_vus ON tai_khoans.chuc_vu_id = chuc_vus.id
            WHERE chuc_vu_id=2
            ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function getAllChucVu()
    {
        try {
            $sql = 'SELECT * FROM chuc_vus
            
            ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function insertQuanTriVien($ho_ten, $ngay_sinh, $email, $so_dien_thoai, $gioi_tinh, $dia_chi, $mat_khau, $chuc_vu_id, $trang_thai, $anh_dai_dien)
    {
        try {
            $sql = 'INSERT INTO tai_khoans( ho_ten,  ngay_sinh,  email,  so_dien_thoai,  gioi_tinh,  dia_chi,  mat_khau,  chuc_vu_id,trang_thai, anh_dai_dien)          
                    VALUES (:ho_ten, :ngay_sinh, :email, :so_dien_thoai, :gioi_tinh, :dia_chi, :mat_khau, :chuc_vu_id, :trang_thai, :anh_dai_dien)';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ho_ten' => $ho_ten,
                ':ngay_sinh' => $ngay_sinh,
                ':email' => $email,
                ':so_dien_thoai' => $so_dien_thoai,
                ':gioi_tinh' => $gioi_tinh,
                ':dia_chi' => $dia_chi,
                ':mat_khau' => $mat_khau,
                ':chuc_vu_id' => $chuc_vu_id,
                ':trang_thai' => $trang_thai,
                ':anh_dai_dien' => $anh_dai_dien
            ]);
            return true;
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function getDetailQuanTriVien($id)
    {
        try {
            $sql ='
                SELECT tai_khoans.*, chuc_vus.ten_chuc_vu 
                FROM tai_khoans
                INNER JOIN chuc_vus ON tai_khoans.chuc_vu_id = chuc_vus.id
                WHERE chuc_vu_id = 2 AND tai_khoans.id = :id
            ' ;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id

            ]);
            return $stmt->fetch();
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function updateQuanTriVien($id, $ho_ten, $ngay_sinh, $email, $so_dien_thoai, $gioi_tinh, $dia_chi, $mat_khau, $chuc_vu_id, $trang_thai, $anh_dai_dien)
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
                    chuc_vu_id = :chuc_vu_id,
                    trang_thai = :trang_thai,
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
                ':chuc_vu_id' => $chuc_vu_id,
                ':trang_thai' => $trang_thai,
                ':anh_dai_dien' => $anh_dai_dien,
                ':id' => $id
            ]);
            return true;
        } catch (\Exception $e) {
            $this->debug($e);
            return false; // Return false on failure to indicate the update failed
        }
    }

    public function deleteQuanTriVien($id)
    {
        try {
            $sql = 'DELETE FROM tai_khoans WHERE id=:id';
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
