<?php


class OnlineCheckoutController
{
    public $modelOnlineCheckout;
    public $modelGioHang;
    public $modelKhuyenMai;
    
    public function __construct()
    {
    
        $this-> modelOnlineCheckout = new OnlineCheckout();
        $this-> modelGioHang = new GioHang();
        $this-> modelKhuyenMai = new KhuyenMai();
    }
   
    public function formThank()

    {
        
        $id=$this-> modelOnlineCheckout->getLastDonHangID();
        require_once './views/giohang/thank.php';
    }
    public function formXacNhan()

    {
        $ma_giao_dich = isset($_GET['vnp_TransactionNo']) ? $_GET['vnp_TransactionNo'] : '';
       
        $trang_thai = isset($_GET['vnp_TransactionStatus']) ? $_GET['vnp_TransactionStatus'] : '';
        $so_tien = isset($_GET['vnp_Amount']) ? $_GET['vnp_Amount'] : '';
        $ngay_gio = isset($_GET['vnp_PayDate']) ? $_GET['vnp_PayDate'] : '';
        $thong_tin_don_hang = isset($_GET['vnp_OrderInfo']) ? $_GET['vnp_OrderInfo'] : '';
        

        // Chuyển đổi định dạng ngày giờ từ chuỗi YYYYMMDDHHMMSS thành định dạng DATETIME
        if (strlen($ngay_gio) === 14) {
            $ngay_gio = substr($ngay_gio, 0, 4) . '-' . substr($ngay_gio, 4, 2) . '-' . substr($ngay_gio, 6, 2) . ' ' . substr($ngay_gio, 8, 2) . ':' . substr($ngay_gio, 10, 2) . ':' . substr($ngay_gio, 12, 2);
        }
        
        $this-> modelOnlineCheckout->insertThanhToanOnline($ma_giao_dich,$trang_thai,$so_tien, $ngay_gio, $thong_tin_don_hang);
        
        $this->checkoutOnline();
        // Lấy dữ liệu từ URL
        

        $id=$this-> modelOnlineCheckout->getLastDonHangID();
        require_once './views/giohang/thankxacnhan.php';
    }
    public function checkoutThank()
    {
        

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->validateInputData();

            if (!empty($_SESSION['errors'])) {
                header('Location: ' . BASE_URL . '?act=checkout-giohang');
                exit();
            }

            if ($_POST['phuong_thuc_thanh_toan_id'] == 2) {
                $this->processVnpayPayment();
               
            }
            else{
                $this->checkoutOnline();
                header('Location:' .BASE_URL .'?act=form-thank');
                
                exit();
            }
        }
    }
    public function checkoutOnline()
    {
        $checkoutData = $_SESSION['checkout_data'] ?? [];
       
        $donHangId = $this->modelOnlineCheckout->insertDonHang(
            $checkoutData['ma_don_hang'] ?? null,
            $checkoutData['tai_khoan_id'] ?? null,
            $checkoutData['ten_nguoi_nhan'] ?? null,
            $checkoutData['email_nguoi_nhan'] ?? null,
            $checkoutData['sdt_nguoi_nhan'] ?? null,
            $checkoutData['dia_chi_nguoi_nhan'] ?? null,
            $checkoutData['ngay_dat'] ?? null,
            $checkoutData['tong_tien'] ?? null,
            $checkoutData['ghi_chu'] ?? null,
            $checkoutData['phuong_thuc_thanh_toan_id'] ?? null,
            $checkoutData['trang_thai_id'] ?? 0,
            $checkoutData['khuyen_mai_id'] ?? 0,


        );
        $id=$_SESSION['user']['id'];
        $this->insertOrderDetails($donHangId);
        $this->updateSoLuongDSSanPhams($donHangId);
        $this->clearCart();
        $this->modelKhuyenMai->resetKhuyenMaiGioHang($id);

        unset($_SESSION['cart']);
        unset($_SESSION['errors']);
        unset($_SESSION['checkout_data']);
        unset($_SESSION['khuyen_mais']);
        unset($_SESSION['thong_tin_gio_hang']);
        

        
    }
    // public function checkoutOnline()
    // {
    //     $checkoutData = $_SESSION['checkout_data'] ?? [];
       
    //     $donHangId = $this->modelOnlineCheckout->insertDonHang(
    //         $checkoutData['ma_don_hang'] ?? null,
    //         $checkoutData['tai_khoan_id'] ?? null,
    //         $checkoutData['ten_nguoi_nhan'] ?? null,
    //         $checkoutData['email_nguoi_nhan'] ?? null,
    //         $checkoutData['sdt_nguoi_nhan'] ?? null,
    //         $checkoutData['dia_chi_nguoi_nhan'] ?? null,
    //         $checkoutData['ngay_dat'] ?? null,
    //         $checkoutData['tong_tien'] ?? null,
    //         $checkoutData['ghi_chu'] ?? null,
    //         $checkoutData['phuong_thuc_thanh_toan_id'] ?? null,
    //         $checkoutData['trang_thai_id'] ?? 0,
    //         $checkoutData['khuyen_mai_id'] ?? 0,


    //     );
     
    //     $this->insertOrderDetails($donHangId);
    //     $this->updateSoLuongDSSanPhams($donHangId);
    //     $this->clearCart();
    //     unset($_SESSION['cart']);
    //     unset($_SESSION['errors']);
    //     unset($_SESSION['checkout_data']);
    //     unset($_SESSION['checkout_data']);

    //     if ($_GET['role'] === 'vetrangchu') {
    //         header('Location: ' . BASE_URL);
    //         exit();
    //     }
    //     header('Location: ' . BASE_URL . '?act=chitiet-donhang&id_don_hang='.$donHangId);
    //     exit();
    // }
    private function processVnpayPayment()
    {
        $checkoutData = $_SESSION['checkout_data'] ?? [];
        if (isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
        }
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://localhost/woodyshop/?act=form-xacnhan";
        $vnp_TmnCode = "KERDPTBW";
        $vnp_HashSecret = "89AMM3IZSBG8RG0KLLSBA5TWY08URP80";

        $vnp_TxnRef = rand(00, 9999);
        $vnp_OrderInfo = "noi dung thanh toan";
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $checkoutData['tong_tien'] * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = $_POST['bank_code'];
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        // $vnp_ExpireDate = $_POST['txtexpire'];

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }

        $returnData = array(
            'code' => '00', 'message' => 'success', 'data' => $vnp_Url
        );

        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
    }

    private function validateInputData()
    {
        $ma_don_hang = $this->generateOrderCode();
        $tai_khoan_id = $_SESSION['user']['id'];
        $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'] ?? null;
        $email_nguoi_nhan = $_POST['email_nguoi_nhan'] ?? null;
        $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'] ?? null;
        $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'] ?? null;
        $ngay_dat = $_POST['ngay_dat'] ?? null;
        $tong_tien = $_SESSION['tong_tien'] ?? null;
        $ghi_chu = $_POST['ghi_chu'] ?? null;
        $phuong_thuc_thanh_toan_id = $_POST['phuong_thuc_thanh_toan_id'] ?? null;
        $trang_thai_id = 0;

        $itemGioHang=$this->modelGioHang->getCartByUserID($tai_khoan_id);
        if(isset($_SESSION['cart'])){
            $khuyen_mai_id=$itemGioHang['khuyen_mai_id'];
        }else{
            $khuyen_mai_id=0;
        }

        $_SESSION['checkout_data'] = [
            'ma_don_hang' => $ma_don_hang,
            'tai_khoan_id' => $tai_khoan_id,

            'ten_nguoi_nhan' => $ten_nguoi_nhan,
            'email_nguoi_nhan' => $email_nguoi_nhan,
            'sdt_nguoi_nhan' => $sdt_nguoi_nhan,
            'dia_chi_nguoi_nhan' => $dia_chi_nguoi_nhan,
            'ngay_dat' => $ngay_dat,
            'tong_tien' => $tong_tien,
            'ghi_chu' => $ghi_chu,
            'phuong_thuc_thanh_toan_id' => $phuong_thuc_thanh_toan_id,
            'trang_thai_id' => $trang_thai_id,
            'khuyen_mai_id' => $khuyen_mai_id
        ];

        $errors = [];
        if (empty($ten_nguoi_nhan)) {
            $errors['ten_nguoi_nhan'] = 'Tên người nhận không được để trống';
        }
        if (empty($email_nguoi_nhan) || !filter_var($email_nguoi_nhan, FILTER_VALIDATE_EMAIL)) {
            $errors['email_nguoi_nhan'] = 'Email người nhận không hợp lệ';
        }
        if (empty($sdt_nguoi_nhan) || !preg_match('/^\d{10,11}$/', $sdt_nguoi_nhan)) {
            $errors['sdt_nguoi_nhan'] = 'Số điện thoại không hợp lệ';
        }
        if (empty($dia_chi_nguoi_nhan)) {
            $errors['dia_chi_nguoi_nhan'] = 'Địa chỉ không được để trống';
        }
        if (empty($ngay_dat) || !DateTime::createFromFormat('Y-m-d', $ngay_dat)) {
            $errors['ngay_dat'] = 'Ngày đặt không hợp lệ';
        }
        if (empty($phuong_thuc_thanh_toan_id)) {
            $errors['phuong_thuc_thanh_toan_id'] = 'Phương thức thanh toán không được để trống';
        }
        $_SESSION['errors'] = $errors;
    }



    private function insertOrderDetails($donHangId)
    {
        $gioHang = $_SESSION['cart'];

        foreach ($gioHang as $item) {
            $sanPhamId = $item['id'];
            $soLuong = $item['so_luong'];
            $donGia = $item['gia_san_pham'];
            $thanhTien = $soLuong * $donGia;

            $this->modelOnlineCheckout->insertChiTietDonHang(
                $donHangId,
                $sanPhamId,
                $donGia,
                $soLuong,
                $thanhTien
            );
        }
    }
    public function updateSoLuongDSSanPhams($donHangId)
    {
        $gioHang = $_SESSION['cart'];

        foreach ($gioHang as $item) {
            $soLuong = $this->modelOnlineCheckout->getSoLuongSanPhams($item['id']);
            $qty = $item['so_luong'];
            $soLuong = (int) $soLuong;
            $qty = (int) $qty;
            $so_luong = $soLuong - $qty;
            if($so_luong==1){
                $this->modelOnlineCheckout->updateTrangThaiSanPham($item['id']);
            }
            $this->modelOnlineCheckout->updateSoLuongSanPhams($item['id'], $so_luong);
        }
    }
    
    public function generateOrderCode()
    {
        $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $numbers = '0123456789';

        // Lấy 2 chữ cái ngẫu nhiên
        $randomLetters = substr(str_shuffle($letters), 0, 2);

        // Lấy 4 số ngẫu nhiên
        $randomNumbers = substr(str_shuffle($numbers), 0, 4);

        // Kết hợp 2 chữ cái và 4 số
        $orderCode = $randomLetters . $randomNumbers;

        return $orderCode;
    }

    private function clearCart()
    {
        $user_id = $_SESSION['user']['id'];

        // Lấy giỏ hàng từ cơ sở dữ liệu
        $gio_hang_id = $this->modelOnlineCheckout->getCartID($user_id);
        $this->modelOnlineCheckout->deleteGioHangDuLieu($gio_hang_id);
        $_SESSION['cart'] = [];
    }

    

}
