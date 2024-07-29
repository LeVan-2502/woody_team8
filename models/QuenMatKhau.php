<?php
class QuenMatKhau
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getEmailQuenMatKhau($email){
        try {
            $sql = '
                SELECT * 
                FROM tai_khoans
                WHERE email=:email
               
            ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':email' => $email
            ]);
            return $stmt->fetch();
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function updateMatKhau($email,$mat_khau){
        try {
            $sql = 'UPDATE tai_khoans 
                    SET mat_khau=:mat_khau
                    WHERE email=:email
                
            ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':email' => $email,
                ':mat_khau' => $mat_khau
            ]);
            return true;
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function deleteTokenMatKhau($email){
        try {
            $sql = 'DELETE FROM dat_lai_mat_khaus 
                    WHERE email=:email
                
            ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':email' => $email
            ]);
            return true;
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function updateMatKhauTaiKhoan($mat_khau, $email){
        try {
            $sql = 'UPDATE tai_khoans 
                    SET mat_khau=:mat_khau
                    WHERE email=:email
                
            ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':mat_khau' => $mat_khau,
                ':email' => $email
            ]);
            return true;
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
   
    public function insertTokenMatKhau($email, $token, $thoi_gian_het_han) {
        try {
            $sql = 'INSERT INTO dat_lai_mat_khaus 
                    (email, token, thoi_gian_het_han) 
                    VALUES (:email, :token, :thoi_gian_het_han)';
                    
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':email' => $email,
                ':token' => $token,
                ':thoi_gian_het_han' => $thoi_gian_het_han
            ]);
            return true;
        } catch (\Exception $e) {
            $this->debug($e);
            return false; // Trả về false nếu có lỗi xảy ra
        }
    }
    
    public function xacNhanTokenThoiGianHetHan($token) {
        try {
            $sql = '
                SELECT * 
                FROM dat_lai_mat_khaus
                WHERE token = :token
                AND thoi_gian_het_han > NOW() -- So sánh với thời gian hiện tại
            ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':token' => $token
            ]);
            return $stmt->fetch(); // Trả về kết quả truy vấn
        } catch (\Exception $e) {
            $this->debug($e);
            return false; // Trả về false nếu có lỗi xảy ra
        }
    }
    

    function debug($e)
    {
        echo '<pre>';
        print_r($e);
        echo '</pre>';
        die();
    }
}