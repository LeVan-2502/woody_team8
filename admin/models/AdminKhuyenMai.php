<?php
class AdminKhuyenMai
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllKhuyenMai()
    {
        try {
            $sql = 'SELECT * FROM khuyen_mais';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function insertKhuyenMai($ten_khuyen_mai, $gia_tri, $ngay_bat_dau, $ngay_ket_thuc, $trang_thai)
    {
        try {
            $sql = 'INSERT INTO khuyen_mais(ten_khuyen_mai, gia_tri, ngay_bat_dau, ngay_ket_thuc, trang_thai) VALUES ( :ten_khuyen_mai, :gia_tri, :ngay_bat_dau, :ngay_ket_thuc, :trang_thai)';
            $stmt = $this->conn->prepare($sql);
            $ngay_bat_dau = !empty($ngay_bat_dau) ? $ngay_bat_dau : null;
            $ngay_ket_thuc = !empty($ngay_ket_thuc) ? $ngay_ket_thuc : null;
            $stmt->execute([
                ':ten_khuyen_mai' => $ten_khuyen_mai,
                ':gia_tri' => $gia_tri,
                ':ngay_bat_dau' => $ngay_bat_dau,
                ':ngay_ket_thuc' => $ngay_ket_thuc,
                ':trang_thai' => $trang_thai,
            ]);
            return true;
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function getDetailKhuyenMai($id)
    {
        try {
            $sql = 'SELECT * FROM khuyen_mais WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id

            ]);
            return $stmt->fetch();
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function updateKhuyenMai($id, $ten_khuyen_mai, $gia_tri, $ngay_bat_dau, $ngay_ket_thuc, $trang_thai)
    {
        try {
            $sql = 'UPDATE khuyen_mais 
                    SET 
                    ten_khuyen_mai = :ten_khuyen_mai,
                    gia_tri = :gia_tri,
                    ngay_bat_dau = :ngay_bat_dau,
                    ngay_ket_thuc = :ngay_ket_thuc,
                    trang_thai=:trang_thai 
                    WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            $ngay_bat_dau = !empty($ngay_bat_dau) ? $ngay_bat_dau : null;
            $ngay_ket_thuc = !empty($ngay_ket_thuc) ? $ngay_ket_thuc : null;
            $stmt->execute([
                ':ten_khuyen_mai' => $ten_khuyen_mai,
                ':gia_tri' => $gia_tri,
                ':ngay_bat_dau' => $ngay_bat_dau,
                ':ngay_ket_thuc' => $ngay_ket_thuc,
                ':trang_thai' => $trang_thai,
                ':id' => $id
            ]);
            return true;
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function deleteKhuyenMai($id)
    {
        try {
            $sql = 'DELETE FROM khuyen_mais WHERE id=:id';
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
