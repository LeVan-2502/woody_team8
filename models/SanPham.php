<?php
class SanPham {
    public $conn;
    public function __construct(){
        $this->conn = connectDB();
    }
    public function getAllProduct(){
        try{
            $sql = 'SELECT * FROM san_phams';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
        }catch(Exception $e){
            echo "Lỗi" .$e->getMessage();
        }
    }
}