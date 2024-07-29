<?php
class AdminXacThuc
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getThongTinTaiKhoan($email, $mat_khau)
    {
        try {
            $sql = "SELECT * FROM tai_khoans WHERE email = :email AND mat_khau = :mat_khau AND chuc_vu_id= 2 ";
            
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
    
    private function debug($e)
    {
        echo '<pre>';
        print_r($e);
        echo '</pre>';
        die();
    }
}
