<?php
class AdminDashboard
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllSanPhamDoanhThu()
    {
        try {
            $sql = 'SELECT 
                        san_phams.id,
                        san_phams.ten_san_pham,
                        SUM(chi_tiet_don_hangs.so_luong) AS tong_so_luong,
                        SUM(chi_tiet_don_hangs.so_luong * chi_tiet_don_hangs.don_gia) AS tong_doanh_thu
                    FROM 
                        chi_tiet_don_hangs
                    JOIN 
                        san_phams ON chi_tiet_don_hangs.san_pham_id = san_phams.id
                    GROUP BY 
                        san_phams.id, san_phams.ten_san_pham;

            
            ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function getAllDanhMucDoanhThu()
    {
        try {
            $sql = 'WITH tong_doanh_thu_san_pham AS (
                    SELECT 
                        sp.id AS san_pham_id,
                        sp.ten_san_pham,
                        sp.danh_muc_id,
                        SUM(ctdh.so_luong * ctdh.don_gia) AS tong_doanh_thu
                    FROM 
                        san_phams sp
                    JOIN 
                        chi_tiet_don_hangs ctdh ON sp.id = ctdh.san_pham_id
                    GROUP BY 
                        sp.id, sp.ten_san_pham, sp.danh_muc_id
                        )SELECT 
                            dm.id AS danh_muc_id,
                            dm.ten_danh_muc,
                            COUNT(DISTINCT sp.san_pham_id) AS so_luong_san_pham,
                            SUM(sp.tong_doanh_thu) AS tong_doanh_thu
                        FROM 
                            danh_mucs dm    
                        JOIN 
                            tong_doanh_thu_san_pham sp ON dm.id = sp.danh_muc_id
                        GROUP BY 
                            dm.id, dm.ten_danh_muc;


                    ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function getDoanhThuNgay()
{
    try {
        $sql = 'SELECT 
                    SUM(tong_tien) AS doanh_thu_hom_nay
                FROM 
                    don_hangs
                WHERE 
                    DATE(ngay_dat) = CURDATE();';

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Trả về doanh thu hôm nay
        return $result['doanh_thu_hom_nay'];
    } catch (\Exception $e) {
        $this->debug($e);
        return false; // Trả về false hoặc một giá trị phù hợp nếu có lỗi
    }
}

public function getDoanhThuTuan()
{
    try {
        $sql = 'SELECT 
                    SUM(tong_tien) AS doanh_thu_tuan_nay
                FROM 
                    don_hangs
                WHERE 
                    YEARWEEK(ngay_dat, 1) = YEARWEEK(CURDATE(), 1);';

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Trả về doanh thu tuần này
        return $result['doanh_thu_tuan_nay'];
    } catch (\Exception $e) {
        $this->debug($e);
        return false; // Trả về false hoặc một giá trị phù hợp nếu có lỗi
    }
}

public function getDoanhThuThang()
{
    try {
        $sql = 'SELECT 
                    SUM(tong_tien) AS doanh_thu_thang_nay
                FROM 
                    don_hangs
                WHERE 
                    YEAR(ngay_dat) = YEAR(CURDATE())
                    AND MONTH(ngay_dat) = MONTH(CURDATE());';

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Trả về doanh thu tháng này
        return $result['doanh_thu_thang_nay'];
    } catch (\Exception $e) {
        $this->debug($e);
        return false; // Trả về false hoặc một giá trị phù hợp nếu có lỗi
    }
}
public function getTongDoanhThu()
{
    try {
        $sql = 'SELECT 
                    SUM(tong_tien) AS tong_doanh_thu_shop
                FROM 
                    don_hangs;';

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Trả về doanh thu tháng này
        return $result['tong_doanh_thu_shop'];
    } catch (\Exception $e) {
        $this->debug($e);
        return false; // Trả về false hoặc một giá trị phù hợp nếu có lỗi
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
