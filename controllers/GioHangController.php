<?php

class GioHangController
{
    public $modelGioHang;
    public $modelTaiKhoan;
    public $modelKhuyenMai;
    public $modelOnlineCheckout;

    public function __construct()
    {
        $this->modelGioHang = new GioHang();
        $this->modelTaiKhoan = new TaiKhoan();
        $this->modelKhuyenMai = new KhuyenMai();
        $this->modelOnlineCheckout = new OnlineCheckout();
    }
    public function listGioHang()
    {
       
        $user_id = $_SESSION['user']['id'];
      
        // Lấy giỏ hàng từ cơ sở dữ liệu
        $id = $this->getCartID($user_id);
        $listSPGioHang = $this->modelGioHang->getSanPhamGioHangUser($id);
        

        
        $listKhuyenMai = $this->getListKhuyenMaiPhuHop();
        $gioHang =  $this->modelGioHang->getThongTinGioHang( $user_id);
       
        $_SESSION['thong_tin_gio_hang']=$gioHang;
        
        if (!isset($_SESSION['cart'])) {
            // Nếu giỏ hàng chưa được lưu trong session, lấy từ cơ sở dữ liệu
            $listSPGioHang = $this->modelGioHang->getSanPhamGioHangUser($id);
            $_SESSION['cart'] = $listSPGioHang;
        } else {
            // Nếu giỏ hàng đã có trong session, sử dụng giỏ hàng trong session
            $listSPGioHang = $_SESSION['cart'];
        }


        // Đếm số lượng sản phẩm trong giỏ hàng
        $countSP = count($listSPGioHang);

        // Hiển thị giỏ hàng
        require_once './views/giohang/listgiohang.php';
    }

    public function getCartID($tai_khoan_id)
{
    // Lấy giỏ hàng của người dùng bằng ID tài khoản
    $cart = $this->modelGioHang->getCartByUserID($tai_khoan_id);
    
    // Nếu giỏ hàng trống (không tồn tại)
    if (empty($cart)) {
        // Lấy ID người dùng từ session
        $user_id = $_SESSION['user']['id'];
        $khuyen_mai_id = 0; // Giả sử không có khuyến mãi
        
        // Tạo giỏ hàng mới và trả về ID của giỏ hàng vừa tạo
        return $this->modelGioHang->insertCartGetLastID($user_id, $khuyen_mai_id);
    }
    
    // Nếu giỏ hàng đã tồn tại, trả về ID của giỏ hàng
    return $cart['id'];
}

    public function getListKhuyenMaiPhuHop()
{
   
    try {
        // Lấy user_id từ session
        if (!isset($_SESSION['user']['id'])) {
            throw new Exception('User ID is not set in session');
        }
        $user_id = $_SESSION['user']['id'];
        
        // Lấy thông tin khuyến mãi chi tiết với id 1
        $khuyenMai1 = $this->modelKhuyenMai->getDeTailKhuyenMai(1);
    
       
        // Lấy giỏ hàng từ cơ sở dữ liệu
       $donHang = $this->modelTaiKhoan->getDonHangByTaiKhoanId($user_id);
        // Kiểm tra số lượng đơn hàng của tài khoản
       
        // Nếu không có đơn hàng nào, lưu khuyến mãi id 1 vào session
        if (empty($donHang)) {
            $_SESSION['khuyen_mais'][1] = $khuyenMai1;
        }
        
        // Lấy danh sách khuyến mãi theo thời gian
        $khuyenMai2 = $this->modelKhuyenMai->getListKhuyenMaiThoiGian();
        
        if (empty($khuyenMai2)) {
            throw new Exception('No active promotions found');
        }
        
        // Lưu các khuyến mãi vào session
        foreach ($khuyenMai2 as $item) {
            $_SESSION['khuyen_mais'][$item['id']] = $item;
        }
        return $listKhuyenMai=$_SESSION['khuyen_mais'];
        unset($_SESSION['khuyen_mais']);
    } catch (Exception $e) {
        $this->debug($e);
    }
}

    


    public function themGioHang()
    {
        // Kiểm tra xem có sản phẩm với id kia không
        $san_pham_id = $_GET['san_pham_id'] ?? null; // Gán giá trị mặc định là null nếu không có
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $so_luong = $_POST['so_luong']; // Gán mặc định số lượng là 1 nếu không có giá trị
        } else {
            $so_luong = $_GET['so_luong'] ?? 1;
        }
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

        // Lấy thông tin giỏ hàng của người dùng
        $cartItem = $this->modelGioHang->getCartByUserID($_SESSION['user']['id']);
        $gio_hang_id = $cartItem['id'];

        // Lưu ID giỏ hàng vào session
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

            // Cập nhật số lượng trong cơ sở dữ liệu
            $this->modelGioHang->updateSoLuongSanPhamGioHang($gio_hang_id, $san_pham_id, $qty);
            
        }


        // Chuyển hướng đến trang giỏ hàng
        header('Location: ' . BASE_URL . '?act=list-giohang');
        exit(); // Kết thúc script để đảm bảo chuyển hướng hoạt động đúng
    }



    public function xacthuc()
    {

        require_once './views/nguoidung/home.php';
    }



    public function xoaGioHang()
    {
        $user_id = $_SESSION['user']['id'];

        // Lấy giỏ hàng từ cơ sở dữ liệu
        $gio_hang_id = $this->getCartID($user_id);
        $san_pham_id = $_GET['san_pham_id'];

        $sanpham = $this->modelGioHang->showOneSanPham($san_pham_id);
        if (empty($sanpham)) {
            debug('404 Not Found');
        }
        // Xóa bản ghi trong ssesion và chitietdonhang

        if (isset($_SESSION['cart'][$san_pham_id])) {
            unset($_SESSION['cart'][$san_pham_id]);
        }

        $this->modelGioHang->deleteSanPhamGioHang($gio_hang_id, $san_pham_id);
        header('Location:' . BASE_URL . '?act=list-giohang');
        exit();
    }
    public function capNhatGioHang()
    {
        if (isset($_POST['update_cart'])) {
            $user_id = $_SESSION['user']['id'];
            $gioHang =  $this->modelGioHang->getThongTinGioHang( $user_id);
            if(isset($_POST['khuyen_mai_id'])){
            $khuyen_mai_id = $_POST['khuyen_mai_id'];
            }else{
                $khuyen_mai_id=$gioHang['khuyen_mai_id'];
            }
            $ids = $_POST['id'];

            $quantities = $_POST['so_luong'];
            $user_id = $_SESSION['user']['id'];
            $gio_hang_id = $this->getCartID($user_id);

            for ($i = 0; $i < count($ids); $i++) {
                $id = $ids[$i];

                $so_luong = $quantities[$i];

                // Cập nhật số lượng trong SESSION
                if (isset($_SESSION['cart'][$id])) {
                    $_SESSION['cart'][$id]['so_luong'] = $so_luong;
                }

                $this->modelGioHang->capNhatSanPhamGioHang($id, $so_luong);
            }

            // Điều hướng người dùng trở lại trang giỏ hàng
            $itemKhuyenMai = $this->modelKhuyenMai->getDeTailKhuyenMai($khuyen_mai_id);
            $this->modelGioHang->updateKhuyenMaiGiohang($gio_hang_id, $khuyen_mai_id);
            $_SESSION['gia_tri']=$itemKhuyenMai['gia_tri'];
            $_SESSION['ten_khuyen_mai']=$itemKhuyenMai['ten_khuyen_mai'];
            header('Location: ' . BASE_URL . '?act=list-giohang');
            exit();
        }
    }
    public function capNhatGioHangOne()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $san_pham_id = $_POST['id'];
            $so_luong = $_POST['so_luong'];
            $gio_hang_id = $_SESSION['gio_hang_id'];


            $sanpham = $this->modelGioHang->showOneSanPham($san_pham_id);
            // Cập nhật số lượng trong SESSION
            if (!isset($_SESSION['cart'][$san_pham_id])) {
                // Nếu sản phẩm chưa có trong giỏ hàng, thêm sản phẩm vào giỏ
                $_SESSION['cart'][$san_pham_id] = $sanpham;
                $_SESSION['cart'][$san_pham_id]['so_luong'] = $so_luong;

                // Thêm sản phẩm vào cơ sở dữ liệu
                $this->modelGioHang->insertCartItem($gio_hang_id, $san_pham_id, $so_luong);
            } else {
                // Nếu sản phẩm đã có trong giỏ hàng, cập nhật số lượng
                $qty = $_SESSION['cart'][$san_pham_id]['so_luong'] + $so_luong;
                $this->modelGioHang->updateSoLuongSanPhamGioHang($gio_hang_id, $san_pham_id, $qty);
            }
            // Cập nhật số lượng trong CSDL



            // Điều hướng người dùng trở lại trang giỏ hàng
            header('Location: ' . BASE_URL . '?act=list-giohang');
            exit();
        }
    }
    public function formCheckoutGioHang()

    {
        if (isset($_SESSION['user']) && isset($_SESSION['user']['id'])) {
            $tai_khoan_id = $_SESSION['user']['id'];
        } else {
            $tai_khoan_id = null;
        }
        $to_tal = $_SESSION['to_tal'];
        $listPhuongThuc = $this->modelGioHang->getAllPhuongThuc();
        $id = $this->getCartID($_SESSION['user']['id']);
        $taiKhoan = $this->modelKhuyenMai->getTaiKhoan($_SESSION['user']['id']);
        $listSPGioHang = $_SESSION['cart'];
        require_once './views/giohang/checkout.php';
        unset($_SESSION['errors']);
    }




    // public function deleteItemLichSuDonHang(){
    //     $id = $_GET['id_don_hang'];
    //     $this->modelGioHang->deleteSanPhamGioHang($id);
    // }


    function debug($e)
    {
        echo '<pre>';
        print_r($e);
        echo '</pre>';
        die();
    }
}
