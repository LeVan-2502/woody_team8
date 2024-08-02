<?php
class XacThuc
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getThongTinTaiKhoan($email, $mat_khau)
    {
        try {
            $sql = "SELECT * FROM tai_khoans WHERE email = :email AND mat_khau = :mat_khau AND chuc_vu_id= 3";
            
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":mat_khau", $mat_khau);

            $stmt->execute();

            return $stmt->fetch();
        } catch (\Exception $e) {
            debug($e);
        }
    }

    public function middleware_auth_check($act){
        if($act=='dangnhap'){
            if(!empty($_SESSION['admin'])){
                header('Location:' . BASE_URL_ADMIN);
                exit();
            }
        }
        else if(empty($_SESSION['admin'])){
            header('Location:' . BASE_URL_ADMIN. '?act=dangnhap');
            exit();
        }
    }
    public function insertTaiKhoan($ho_ten, $ngay_sinh, $email, $so_dien_thoai, $gioi_tinh, $dia_chi, $mat_khau, $chuc_vu_id, $trang_thai, $anh_dai_dien)
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
    private function debug($e)
    {
        echo '<pre>';
        print_r($e);
        echo '</pre>';
        die();
    }
    
}
