<?php
class BaiViet
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllBaiViet()
    {
        try {
            $sql = 'SELECT bv.*, dm.ten_danh_muc, tk.ho_ten, DATE_FORMAT(bv.ngay_dang, "%M %d, %Y") AS ngay_dinh_dang 
                    FROM bai_viets bv
                    INNER JOIN danh_mucs dm ON bv.danh_muc_id = dm.id
                    INNER JOIN tai_khoans tk ON bv.tai_khoan_id = tk.id
                    ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function getAllBaiVietByDanhMuc($id)
    {
        try {
            $sql = 'SELECT bv.*, dm.ten_danh_muc, tk.ho_ten, DATE_FORMAT(bv.ngay_dang, "%M %d, %Y") AS ngay_dinh_dang 
                    FROM bai_viets bv
                    INNER JOIN danh_mucs dm ON bv.danh_muc_id = dm.id
                    INNER JOIN tai_khoans tk ON bv.tai_khoan_id = tk.id
                    WHERE bv.danh_muc_id=:id
                    ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function getAllBaiVietByTag($id)
    {
        try {
            $sql = 'SELECT bv.*, dm.ten_danh_muc, tk.ho_ten, DATE_FORMAT(bv.ngay_dang, "%M %d, %Y") AS ngay_dinh_dang,t.* 
                    FROM  bai_viets_tags bvt
                    INNER JOIN tags t ON bvt.tag_id = t.id
                    INNER JOIN bai_viets bv ON bvt.bai_viet_id= bv.id
                    INNER JOIN danh_mucs dm ON bv.danh_muc_id = dm.id
                    INNER JOIN tai_khoans tk ON bv.tai_khoan_id = tk.id
                    WHERE bvt.tag_id =:id
                    ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function getChiTietBaiViet($id)
{
    try {
        // Truy vấn SQL để lấy thông tin chi tiết bài viết, tên danh mục, tên tác giả và định dạng ngày
        $sql = 'SELECT bv.*, dm.ten_danh_muc, tk.ho_ten, DATE_FORMAT(bv.ngay_dang, "%M %d, %Y") AS ngay_dinh_dang,tk.anh_dai_dien
                FROM bai_viets bv
                INNER JOIN danh_mucs dm ON bv.danh_muc_id = dm.id
                INNER JOIN tai_khoans tk ON bv.tai_khoan_id = tk.id
                WHERE bv.id = :id';
        
        // Chuẩn bị câu lệnh SQL
        $stmt = $this->conn->prepare($sql);
        
        // Thực thi câu lệnh với tham số id
        $stmt->execute([':id' => $id]);
        
        // Lấy kết quả truy vấn
        return $stmt->fetch();
    } catch (\Exception $e) {
        // Xử lý ngoại lệ và ghi lại lỗi
        $this->debug($e);
        return false;
    }
}

    public function getAllTag()
    {
        try {
            $sql = 'SELECT *
                    FROM tags
                    
                    ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function getDatailTag($id)
    {
        try {
            $sql = 'SELECT *
                    FROM tags
                    WHERE id=:id
                    
                    ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetch();
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function getTagBaiViet($id)
    {
        try {
            $sql = 'SELECT bvt.*, t.ten_tag
            FROM bai_viets_tags bvt
            INNER JOIN tags t ON bvt.tag_id = t.id
            WHERE bvt.bai_viet_id = :id;

                    
                    ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function getAllDanhMuc()
    {
        try {
            $sql = 'SELECT *
                    FROM danh_mucs
                    
                    ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function getDetailDanhMuc($id)
    {
        try {
            $sql = 'SELECT *
                    FROM danh_mucs
                    WHERE id=:id
                    ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetch();
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function countSanPhamDanhMuc()
{
    try {
        $sql = 'SELECT dm.id, dm.ten_danh_muc, COUNT(bv.id) AS so_bai_viet
                FROM danh_mucs dm
                LEFT JOIN bai_viets bv ON dm.id = bv.danh_muc_id
                GROUP BY dm.id, dm.ten_danh_muc';
                
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (\Exception $e) {
        $this->debug($e);
        return [];
    }
}

    public function bonBaiVietGanDay()
    {
        try {
            $sql = 'SELECT *,DATE_FORMAT(bv.ngay_dang, "%M %d, %Y") AS ngay_dinh_dang 
                    FROM bai_viets bv 
                    ORDER BY ngay_dang DESC 
                    LIMIT 4;
                    ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
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
