<?php 

class GioHangController
{
    public $modelGioHang;
    public $modelChiTietGioHang;
    public function __construct()
    {
        $this->modelGioHang= new GioHang();
        $this->modelChiTietGioHang= new ChiTietGioHang();
    }
   
    public function themGioHang() {
        // Kiểm tra xem có sản phẩm với id kia không
        $san_pham_id = $_GET['san_pham_id'] ?? null; // Gán giá trị mặc định là null nếu không có
        $so_luong = $_GET['so_luong'] ?? 1; // Gán mặc định số lượng là 1 nếu không có giá trị
    
        // Kiểm tra id sản phẩm
        if (!$san_pham_id) {
            echo 'Sản phẩm không được chỉ định.';
            return; // Kết thúc hàm nếu không có sản phẩm ID
        }
    
        // Lấy thông tin sản phẩm từ cơ sở dữ liệu
        $sanpham = $this->modelGioHang->showOneSanPham($san_pham_id);
    
        if (empty($sanpham)) {
            echo '404 Not Found';
            return; // Kết thúc hàm nếu sản phẩm không tồn tại
        }
        $cartItem =  $this->modelGioHang->getCartByUserID($_SESSION['admin']['id']);
        $gio_hang_id=$cartItem['id'];

        // Lấy ID giỏ hàng của người dùng
        $gio_hang_id = $_SESSION['cart']['id'];
        $_SESSION['gio_hang_id'] = $gio_hang_id;
    
        // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
        if (!isset($_SESSION['cart'][$san_pham_id])) {
            // Nếu sản phẩm chưa có trong giỏ hàng, thêm sản phẩm vào giỏ
            $_SESSION['cart'][$san_pham_id] = $sanpham;

            
       
            $_SESSION['cart'][$san_pham_id]['so_luong'] = $so_luong;
            
            // Thêm sản phẩm vào cơ sở dữ liệu
            $this->modelGioHang->insertCartItem($gio_hang_id, $san_pham_id, $so_luong);
        } else {
            // Nếu sản phẩm đã có trong giỏ hàng, cập nhật số lượng
            $qty = $_SESSION['cart'][$san_pham_id]['so_luong'] + $so_luong;
            $_SESSION['cart'][$san_pham_id]['so_luong'] = $qty;
    
            // Cập nhật số lượng sản phẩm trong cơ sở dữ liệu
            $this->modelChiTietGioHang->updateSoLuongSanPhamGioHang($gio_hang_id, $san_pham_id, $qty);
        }
    
        // Chuyển hướng người dùng đến trang giỏ hàng
        header('Location: ' . BASE_URL . '?act=list-giohang');
        exit(); // Kết thúc script để đảm bảo chuyển hướng hoạt động đúng
    }
    
   
    public function xacthuc(){
       
        require_once './views/nguoidung/home.php';
    }
    public function listGioHang(){
        $id = $this->modelGioHang->getCartID($_SESSION['admin']['id']);

        $listSPGioHang = $this->modelGioHang->getSanPhamGioHangUser($id);
        
        require_once './views/giohang/listgiohang.php';
    }

    public function xoaGioHang() {
            $san_pham_id = $_GET['san_pham_id'];
            $sanpham=$this->modelGioHang->showOneSanPham($san_pham_id);
            if(empty($sanpham)){
                debug('404 Not Found');
            }
        if (isset($_GET['san_pham_id'])) {
            
            $gio_hang_id = $_SESSION['gio_hang_id']; // Giả sử giỏ hàng ID đã được lưu trong session
            
            $result = $this->modelGioHang->deleteSanPhamGioHang($gio_hang_id, $san_pham_id);
    
            if ($result['status'] === 'success') {
                header('Location: ' . BASE_URL . '?act=list-giohang');
            } else {
                echo $result['message'];
            }
        } else {
            echo 'Không tìm thấy sản phẩm để xóa';
        }
    }
 
}