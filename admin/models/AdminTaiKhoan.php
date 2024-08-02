<?php
class AdminTaiKhoan
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
    public function getAllKhachHang()
    {
        try {
            $sql = 'SELECT tai_khoans.*, chuc_vus.ten_chuc_vu 
            FROM tai_khoans
            INNER JOIN chuc_vus ON tai_khoans.chuc_vu_id = chuc_vus.id
            WHERE chuc_vu_id=3
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
    public function getDetailTaiKhoan($id)
    {
        try {
            $sql ='
                SELECT tai_khoans.*, chuc_vus.ten_chuc_vu 
                FROM tai_khoans
                INNER JOIN chuc_vus ON tai_khoans.chuc_vu_id = chuc_vus.id
                WHERE tai_khoans.id = :id
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
    public function updateTaiKhoan($id, $ho_ten, $ngay_sinh, $email, $so_dien_thoai, $gioi_tinh, $dia_chi, $mat_khau, $chuc_vu_id, $trang_thai, $anh_dai_dien)
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

    public function deleteTaiKhoan($id)
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
    public function getAllDonHangTaiKhoan($id)
    {
        try {
            $sql = 'SELECT dh.*, pttt.ten_phuong_thuc, ttdh.ten_trang_thai, km.ten_khuyen_mai
                    FROM don_hangs dh
                    INNER JOIN phuong_thuc_thanh_toans pttt ON dh.phuong_thuc_thanh_toan_id = pttt.id
                    INNER JOIN khuyen_mais km ON dh.khuyen_mai_id = km.id
                    INNER JOIN trang_thai_don_hangs ttdh ON dh.trang_thai_id = ttdh.id
                   
            
                    WHERE dh.tai_khoan_id=:id';
            
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return $stmt->fetchAll();
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
