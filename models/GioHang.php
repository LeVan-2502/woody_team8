<?php
class GioHang
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function showOneSanPham($id) {
        try {
            $sql = 'SELECT *
                    FROM san_phams
                    WHERE san_phams.id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    
    public function getCartID($tai_khoan_id) {
        $cart = $this->getCartByUserID($tai_khoan_id);
        if (empty($cart)) {
            return $this->insertCartGetLastID($tai_khoan_id);
        }
        return $cart['id'];
    }
    
    public function getCartByUserID($tai_khoan_id) {
        try {
            $sql = 'SELECT *
                    FROM gio_hangs
                    WHERE tai_khoan_id = :tai_khoan_id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':tai_khoan_id' => $tai_khoan_id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    
    public function insertCartGetLastID($tai_khoan_id) {
        try {
            $sql = 'INSERT INTO gio_hangs (tai_khoan_id)
                    VALUES (:tai_khoan_id)';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':tai_khoan_id' => $tai_khoan_id]);
            return $this->conn->lastInsertId();
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    
    public function insertCartItem($gio_hang_id, $san_pham_id, $so_luong) {
        try {
            $sql = 'INSERT INTO chi_tiet_gio_hangs (gio_hang_id, san_pham_id, so_luong)
                    VALUES (:gio_hang_id, :san_pham_id, :so_luong)';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':gio_hang_id' => $gio_hang_id,
                ':san_pham_id' => $san_pham_id,
                ':so_luong' => $so_luong,
            ]);
            return true;
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    
    public function getSanPhamGioHangUser($id) {
        try {
            $sql = 'SELECT chi_tiet_gio_hangs.*, san_phams.hinh_anh, san_phams.gia_san_pham, san_phams.ten_san_pham
                    FROM chi_tiet_gio_hangs
                    INNER JOIN san_phams ON chi_tiet_gio_hangs.san_pham_id = san_phams.id
                    WHERE chi_tiet_gio_hangs.gio_hang_id = :id';
                    
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    
    public function deleteSanPhamGioHang($gio_hang_id, $san_pham_id) {
        try {
            $sql = '
                DELETE FROM chi_tiet_gio_hangs
                WHERE gio_hang_id = :gio_hang_id
                AND san_pham_id = :san_pham_id
            ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':gio_hang_id' => $gio_hang_id,
                ':san_pham_id' => $san_pham_id,
            ]);
            
            // Kiểm tra xem có hàng nào bị xóa hay không
            if ($stmt->rowCount() > 0) {
                // Trả về thành công
                return ['status' => 'success', 'message' => 'Sản phẩm đã được xóa khỏi giỏ hàng'];
            } else {
                // Không có hàng nào bị xóa
                return ['status' => 'error', 'message' => 'Không tìm thấy sản phẩm trong giỏ hàng'];
            }
        } catch (\Exception $e) {
            $this->debug($e);
            // Trả về lỗi
            return ['status' => 'error', 'message' => 'Có lỗi xảy ra khi xóa sản phẩm'];
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
