<?php
class ChiTietGioHang
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function updateSoLuongSanPhamGioHang($gio_hang_id, $san_pham_id, $so_luong){
        try {
            $sql = 'UPDATE chi_tiet_gio_hangs 
                SET so_luong = :so_luong
                WHERE gio_hang_id = :gio_hang_id
                AND san_pham_id = :san_pham_id';
                
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':so_luong' => $so_luong,
            ':gio_hang_id' => $gio_hang_id,
            ':san_pham_id' => $san_pham_id
        ]);
        
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
