<?php 

// Biến môi trường, dùng chung toàn hệ thống
// Khai báo dưới dạng HẰNG SỐ để không phải dùng $GLOBALS

define('PATH_CONTROLLER_ADMIN',   __DIR__ . '/../admin/controllers/');
define('PATH_MODEL_ADMIN',        __DIR__ . '/../admin/models/');
define('PATH_VIEW_ADMIN',         __DIR__ . '/../admin/views/');

define('BASE_URL'       , 'http://localhost/woodyshop/');
define('BASE_URL_ADMIN'       , 'http://localhost/woodyshop/admin/');

define('DB_HOST'    , 'localhost');
define('DB_PORT'    , 3306);
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME'    , 'woody');  // Tên database

define('PATH_ROOT'    , __DIR__ . '/../');
