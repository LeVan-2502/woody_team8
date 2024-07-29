<?php

// Kết nối CSDL qua PDO
function connectDB() {
    // Kết nối CSDL
    $host = DB_HOST;
    $port = DB_PORT;
    $dbname = DB_NAME;

    try {
        $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname", DB_USERNAME, DB_PASSWORD);

        // cài đặt chế độ báo lỗi là xử lý ngoại lệ
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // cài đặt chế độ trả dữ liệu
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
        return $conn;
    } catch (PDOException $e) {
        echo ("Connection failed: " . $e->getMessage());
    }
}
//Thêm file
//Xóa file
//Debug


//Model

if (!function_exists('debug')) {
    function debug($data)
    {
        echo "<pre>";

        print_r($data);

        die;
    }
}
// CRUD -> Create/Read(Danh sách/Chi tiết)/Update/Delete
function middleware_auth_check_client($act, $arrRouteNeedAuth) {
    if ($act == 'dangnhap') {
        if (!empty($_SESSION['user'])) {
            header('Location: ' . BASE_URL);
            exit();
        }
    } elseif (empty($_SESSION['user']) && in_array($act, $arrRouteNeedAuth)) {
        header('Location: ' . BASE_URL . '?act=dangnhap');
        exit();
    }
}
function middleware_auth_check_admin($act) {
    // Kiểm tra nếu $act là 'dangnhap' và người dùng đã đăng nhập
    if ($act == 'dangnhap' && !empty($_SESSION['admin'])) {
        header('Location: ' . BASE_URL_ADMIN);
        exit();
    }

    // Kiểm tra nếu $act không phải 'dangnhap' và người dùng chưa đăng nhập
    if ($act != 'dangnhap' && empty($_SESSION['admin'])) {
        header('Location: ' . BASE_URL_ADMIN . '?act=dangnhap');
        exit();
    }
}
// function middleware_auth_check_client($act) {
//     // Kiểm tra nếu $act là 'dangnhap' và người dùng đã đăng nhập
//     if ($act == 'dangnhap' && !empty($_SESSION['admin'])) {
//         header('Location: ' . BASE_URL);
//         exit();
//     }

//     // Kiểm tra nếu $act không phải 'dangnhap' và người dùng chưa đăng nhập
//     if ($act != 'dangnhap' && empty($_SESSION['admin'])) {
//         header('Location: ' . BASE_URL . '?act=dangnhap');
//         exit();
//     }
// }

// Updloadfile
function uploadFile($file, $folderUpload){
    $pathStorage = $folderUpload . time() . $file['name'];
    $from = $file['tmp_name'];
    $to = PATH_ROOT . $pathStorage;
    if(move_uploaded_file($from, $to)){
        return $pathStorage;
    }
    return null;
}
// Xóa file
function deleteFile($file){
    $pathDelete = PATH_ROOT.$file;
    if(file_exists($pathDelete)){
        unlink($pathDelete);
    }
}
function uploadFileAlbum($file, $folderUpload, $key){
    $pathStorage = $folderUpload . time() . $file['name'][$key];
    $from = $file['tmp_name'][$key];
    $to = PATH_ROOT . $pathStorage;
    if(move_uploaded_file($from, $to)){
        return $pathStorage;
    }
    return null;
}

function deleteSessionError(){
    if(isset($_SESSION['flash'])){
        unset($_SESSION['flash']);
        session_unset();
        session_destroy();
    }
}
function debug($e)
    {
        echo '<pre>';
        print_r($e);
        echo '</pre>';
        die();
    }
