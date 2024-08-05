<?php
class KhuyenMai
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function countDonHangTaiKhoan($id)
    {
        try {
            // Câu lệnh SQL để đếm số đơn hàng theo tài khoản
            $sql = 'SELECT COUNT(*) AS so_don_hang
                    FROM don_hangs
                    WHERE tai_khoan_id = :id';
    
            // Chuẩn bị câu lệnh SQL
            $stmt = $this->conn->prepare($sql);
    
            // Thực thi câu lệnh với tham số id
            $stmt->execute([
                ':id' => $id
            ]);
    
            // Lấy kết quả
            $num = $stmt->fetch();
    
            // Trả về số đơn hàng hoặc 0 nếu không có kết quả
            return $num ? (int)$num['so_don_hang'] : 0;
        } catch (\Exception $e) {
            // Ghi lại lỗi nếu có
            $this->debug($e);
    
            // Trả về 0 trong trường hợp có lỗi
            return 0;
        }
    }
    
    public function getDeTailKhuyenMai($id)
{
    try {
        // Câu lệnh SQL để lấy chi tiết khuyến mãi theo id
        $sql = 'SELECT *
                FROM khuyen_mais
                WHERE id = :id';

        // Chuẩn bị câu lệnh SQL
        $stmt = $this->conn->prepare($sql);

        // Thực thi câu lệnh với tham số id
        $stmt->execute([
            ':id' => $id
        ]);

        // Lấy kết quả đầu tiên
        return $stmt->fetch();
    } catch (\Exception $e) {
        // Ghi lại lỗi nếu có
        $this->debug($e);

        // Trả về null để xử lý sau
        return null;
    }
}

    public function getListKhuyenMaiThoiGian()
    {
        try {
            // Câu lệnh SQL để lấy các khuyến mãi trong khoảng thời gian hiện tại
            $sql = 'SELECT *
                    FROM khuyen_mais
                    WHERE ngay_bat_dau <= CURDATE() AND CURDATE() <= ngay_ket_thuc';
    
            // Chuẩn bị câu lệnh SQL
            $stmt = $this->conn->prepare($sql);
    
            // Thực thi câu lệnh
            $stmt->execute();
    
            // Lấy tất cả các kết quả
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            // Ghi lại lỗi nếu có
            $this->debug($e);
    
            // Có thể trả về một mảng rỗng hoặc null để xử lý sau
            return [];
        }
    }
    public function getTaiKhoan($id)
    {
        try {
            // Câu lệnh SQL để lấy các khuyến mãi trong khoảng thời gian hiện tại
            $sql = 'SELECT *
                    FROM tai_khoans
                    WHERE id=:id';
    
            // Chuẩn bị câu lệnh SQL
            $stmt = $this->conn->prepare($sql);
    
            // Thực thi câu lệnh
            $stmt->execute([
                ':id' => $id
            ]);
    
            // Lấy tất cả các kết quả
            return $stmt->fetch();
        } catch (\Exception $e) {
            // Ghi lại lỗi nếu có
            $this->debug($e);
    
            // Có thể trả về một mảng rỗng hoặc null để xử lý sau
            return [];
        }
    }
    public function resetKhuyenMaiGioHang($id)
{
    try {
        // Câu lệnh SQL để cập nhật khuyến mãi cho giỏ hàng
        $sql = 'UPDATE gio_hangs
                SET khuyen_mai_id = 0
                WHERE tai_khoan_id = :id';

        // Chuẩn bị câu lệnh SQL
        $stmt = $this->conn->prepare($sql);

        // Thực thi câu lệnh với tham số id
        $stmt->execute([
            ':id' => $id
        ]);

        // Kiểm tra xem câu lệnh có thành công hay không
        if ($stmt->rowCount() > 0) {
            return true; // Cập nhật thành công
        } else {
            return false; // Không có hàng nào bị ảnh hưởng
        }
    } catch (\Exception $e) {
        // Ghi lại lỗi nếu có
        $this->debug($e);

        // Có thể trả về false để xử lý sau
        return false;
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
