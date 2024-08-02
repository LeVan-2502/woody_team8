<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Add your CSS rules here -->
    <style>
        body.hold-transition.login-page {
            background: url('https://images.unsplash.com/photo-1468581264429-2548ef9eb732?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') no-repeat center center fixed;
            background-size: cover;
        }
    </style>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= BASE_URL ?>admin/assets/plugins/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= BASE_URL ?>admin/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="<?= BASE_URL ?>admin/assets/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="<?= BASE_URL ?>admin/assets/index2.html"><b>Admin</b>WOODY</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">

            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input name="email" type="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input name="mat_khau" type="mat_khau" class="form-control" placeholder="Nhập mật khẩu">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <?php if (isset($_SESSION['error'])) : ?>
                        <div class="alert alert-danger">
                            <?= $_SESSION['error'] ?>
                        </div>
                        <?php unset($_SESSION['error']) ?>
                    <?php endif ?>
                    <?php if (isset($_SESSION['error'])) : ?>
                        <p class="text-danger">
                            <?= $_SESSION['error'] ?>
                        </p>
                        <?php unset($_SESSION['error']) ?>
                    <?php endif ?>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= BASE_URL ?>admin/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= BASE_URL ?>admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->

</body>

</html>