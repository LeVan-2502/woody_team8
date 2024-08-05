<?php
if (isset($_SESSION['admin'])) {
    $admin = $_SESSION['admin'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Setup Form</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body.hold-transition.login-page {
            background: url('https://images.unsplash.com/photo-1468581264429-2548ef9eb732?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 0;
        }

        .setup-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            position: relative;
        }

        .setup-box {
            display: flex;
            width: 80%;
            max-width: 900px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            position: relative;
        }

        .left-panel {
            background-color: #3498db;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            color: white;
            width: 40%;
            text-align: center;
        }

        .left-panel img {
            width: 300px;
            height: 300px;
            border-radius: 50%;
            margin-bottom: 1rem;
        }

        .right-panel {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            flex: 1;
        }

        .form-container {
            width: 100%;
            max-width: 400px;
        }

        .close-icon {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            font-size: 24px;
            color: #333;
        }

        label {
            font-weight: bold;
        }
    </style>
</head>

<body class="hold-transition login-page">
    <form enctype="multipart/form-data" method="POST" action="<?= BASE_URL_ADMIN ?>?act=capnhat-admin">
        <div class="setup-container">
            <div class="setup-box">
                <div class="close-icon" onclick="goBack()">&times;</div>
                <div class="left-panel">
                    <?php if (!empty($admin['anh_dai_dien'])) { ?>
                        <div class="mb-3">
                            <img src="<?= BASE_URL . $admin['anh_dai_dien'] ?>" class="img-fluid img-thumbnail" width="600px" alt="Current Image">
                        </div>
                    <?php } ?>
                    <input name="anh_dai_dien" type="file" class="form-control" id="anh_dai_dien">
                    <?php if (isset($_SESSION['errors']['anh_dai_dien'])) { ?>
                        <p class="text-danger"><?= $_SESSION['errors']['anh_dai_dien'] ?></p>
                    <?php } ?>

                </div>
                <div class="right-panel">
                    <div class="form-container">

                        <div class="col-12">
                            <div class="card-body row">
                                <div class="form-group col-12">
                                    <label for="ho_ten">Tên tài khoản</label>
                                    <input value="<?= $admin['ho_ten'] ?>" name="ho_ten" type="text" class="form-control" id="ho_ten" placeholder="Nhập tên ">
                                    <?php if (isset($_SESSION['errors']['ho_ten'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['errors']['ho_ten'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group col-12">
                                    <label for="">Email</label>
                                    <input value="<?= $admin['email'] ?>" name="email" type="email" class="form-control" id="email" placeholder="Nhập email">
                                    <?php if (isset($_SESSION['errors']['email'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['errors']['email'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group col-6">
                                    <label for="">Mật khẩu</label>
                                    <input value="<?= $admin['mat_khau'] ?>" name="mat_khau" type="text" class="form-control" id="mat_khau" placeholder="Nhập mật nhẩu">
                                    <?php if (isset($_SESSION['errors']['mat_khau'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['errors']['mat_khau'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group col-6">
                                    <label for="">Ngày sinh</label>
                                    <input value="<?= $admin['ngay_sinh'] ?>" name="ngay_sinh" type="date" class="form-control" id="ngay_sinh" placeholder="Ngày sinh">
                                    <?php if (isset($_SESSION['errors']['ngay_sinh'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['errors']['ngay_sinh'] ?></p>
                                    <?php } ?>
                                </div>


                                <div class="form-group col-6">
                                    <label for="">Số điện thoại</label>
                                    <input value="<?= $admin['so_dien_thoai'] ?>" name="so_dien_thoai" type="number" class="form-control" id="so_dien_thoai" placeholder="Nhập số điện thoại">
                                    <?php if (isset($_SESSION['errors']['so_dien_thoai'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['errors']['so_dien_thoai'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group col-6">
                                    <label for="">Chọn giới tính</label>
                                    <select name="gioi_tinh" id="" class="form-control">
                                        <option selected disabled value="">-- Chọn giới tính</option>
                                        <option value="2" <?= $admin['gioi_tinh'] == 2 ? 'selected' : '' ?>>Nữ</option>
                                        <option value="1" <?= $admin['gioi_tinh'] == 1 ? 'selected' : '' ?>>Nam</option>
                                    </select>
                                    <?php if (isset($_SESSION['errors']['gioi_tinh'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['errors']['gioi_tinh'] ?></p>
                                    <?php } ?>
                                </div>


                                <div class="form-group col-12">
                                    <label for="">Địa chỉ</label>
                                    <input value="<?= $admin['dia_chi'] ?>" name="dia_chi" type="text" class="form-control" id="dia_chi" placeholder="Địa chỉ">
                                    <?php if (isset($_SESSION['errors']['dia_chi'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['errors']['dia_chi'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="col-12">
                                    <?php if (isset($_SESSION['thongbao'])) : ?>
                                        <div class="alert alert-<?= $_SESSION['thongbao']['type'] ?> alert-dismissible fade show" role="alert">
                                            <?= $_SESSION['thongbao']['message'] ?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <?php unset($_SESSION['thongbao']); ?>
                                    <?php endif ?>
                                </div>


                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a class="btn btn-secondary" href="<?= BASE_URL_ADMIN ?>">Trở về</a>

                        </div>



                    </div>
                </div>
            </div>
        </div>
    </form>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>