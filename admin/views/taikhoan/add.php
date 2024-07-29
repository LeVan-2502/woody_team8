<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content mt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- /.card -->
                    <div class="card">
                        <div class="card-header bg-primary">
                            <div class="row align-items-center">
                                <div class="col-11 ">
                                    <h class="card-title align-middlecard-title">Thêm mới tài khoản quản trị viên</h6>
                                </div>
                                <div class="col-1">

                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <!-- /.card-header -->
                            <!-- form start -->
                            <form enctype="multipart/form-data" action="<?= BASE_URL_ADMIN ?>?act=them-taikhoan" method="POST">
                                <div class="card-body row">
                                    <div class="form-group col-12">
                                        <label for="ho_ten">Tên QTV</label>
                                        <input name="ho_ten" type="text" class="form-control" id="ho_ten" placeholder="Nhập tên QTV">
                                        <?php if (isset($errors['ho_ten'])) { ?>
                                            <p class="text-danger"><?= $errors['ho_ten'] ?></p>
                                        <?php } ?>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="">Ảnh đại diện</label>
                                        <input name="anh_dai_dien" type="file" class="form-control" id="anh_dai_dien">
                                        <?php if (isset($errors['anh_dai_dien'])) { ?>
                                            <p class="text-danger"><?= $errors['anh_dai_dien'] ?></p>
                                        <?php } ?>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="">Ngày sinh</label>
                                        <input name="ngay_sinh" type="date" class="form-control" id="ngay_sinh" placeholder="Ngày sinh">
                                        <?php if (isset($errors['ngay_sinh'])) { ?>
                                            <p class="text-danger"><?= $errors['ngay_sinh'] ?></p>
                                        <?php } ?>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="">Email</label>
                                        <input name="email" type="email" class="form-control" id="email" placeholder="Nhập email">
                                        <?php if (isset($errors['email'])) { ?>
                                            <p class="text-danger"><?= $errors['email'] ?></p>
                                        <?php } ?>
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="">Số điện thoại</label>
                                        <input name="so_dien_thoai" type="number" class="form-control" id="so_dien_thoai" placeholder="Nhập số điện thaoij">
                                        <?php if (isset($errors['so_dien_thoai'])) { ?>
                                            <p class="text-danger"><?= $errors['so_dien_thoai'] ?></p>
                                        <?php } ?>
                                    </div>

                                    <div class="form-group col-6">
                                    <label for="">Chọn giới tính</label>
                                        <select name="gioi_tinh" id="" class="form-control">
                                            <option selected disabled value="">-- Chọn giới tính</option>
                                            <option value="1">Nữ</option>
                                            <option value="2">Nam</option>
                                        </select>
                                        <?php if (isset($errors['gioi_tinh'])) { ?>
                                            <p class="text-danger"><?= $errors['gioi_tinh'] ?></p>
                                        <?php } ?>
                                    </div>
                                    
                                    <div class="form-group col-6">
                                        <label for="">Mật khẩu</label>
                                        <input name="mat_khau" type="text" class="form-control" id="mat_khau" placeholder="Nhập mật nhẩu">
                                        <?php if (isset($errors['mat_khau'])) { ?>
                                            <p class="text-danger"><?= $errors['mat_khau'] ?></p>
                                        <?php } ?>
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="">Địa chỉ</label>
                                        <input name="dia_chi" type="text" class="form-control" id="dia_chi" placeholder="Đại chỉ">
                                        <?php if (isset($errors['dia_chi'])) { ?>
                                            <p class="text-danger"><?= $errors['dia_chi'] ?></p>
                                        <?php } ?>
                                    </div>
                                    
                                    <div class="form-group col-6">
                                        <label for="">Chức vụ</label>
                                        <select name="chuc_vu_id" id="chuc_vu_id" class="form-control">
                                            <option selected disabled value="">Chọn chức vụ</option>
                                            <?php foreach ($listChucVu as $chucvu) : ?>
                                                <option value="<?= $chucvu['id'] ?>"><?= $chucvu['ten_chuc_vu'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <?php if (isset($errors['chuc_vu_id'])) { ?>
                                            <p class="text-danger"><?= $errors['chuc_vu_id'] ?></p>
                                        <?php } ?>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="">Trạng thái</label>
                                        <select name="trang_thai" id="trang_thai" class="form-control">
                                            <option selected disabled value="">Trạng thái hoạt động</option>
                                            <option value="1">Đang hoạt động</option>
                                            <option value="2">Dừng hoạt động</option>
                                        </select>
                                        <?php if (isset($errors['trang_thai'])) { ?>
                                            <p class="text-danger"><?= $errors['trang_thai'] ?></p>
                                        <?php } ?>
                                    </div>
                                    


                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>