<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content mt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
                    <!-- /.card -->
                    <div class="card">
                        <div class="card-header bg-primary">
                            <div class="row align-items-center">
                                <div class="col-11 ">
                                    <h class="card-title align-middlecard-title">Thêm mới Slider-Banner</h6>
                                </div>
                                <div class="col-1">

                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body row">

                            <!-- /.card-header -->
                            <!-- form start -->
                            <form class="" enctype="multipart/form-data" action="<?= BASE_URL_ADMIN ?>?act=them-sliderbanner" method="POST">
                                <div class="card-body row">
                                    <div class="form-group col-12">
                                        <label for="">Chọn Type</label>
                                        <select name="type" id="" class="form-control">
                                            <option selected disabled value="">-- Chọn type ảnh</option>
                                            <option value="0">Banner</option>
                                            <option value="1">Slider</option>
                                        </select>
                                        <?php if (isset($_SESSION['errors']['type'])) { ?>
                                            <p class="text-danger"><?= $_SESSION['errors']['type'] ?></p>
                                        <?php } ?>
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="tieu_de">Tiêu đề</label>
                                        <input name="tieu_de" type="text" class="form-control" id="tieu_de" placeholder="Nhập tên QTV">
                                        <?php if (isset($_SESSION['errors']['tieu_de'])) { ?>
                                            <p class="text-danger"><?= $_SESSION['errors']['tieu_de'] ?></p>
                                        <?php } ?>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="thu_tu_xuat_hien">Thứ tự xuất hiện</label>
                                        <input name="thu_tu_xuat_hien" type="text" class="form-control" id="thu_tu_xuat_hien" placeholder="Nhập tên QTV">
                                        <?php if (isset($_SESSION['errors']['thu_tu_xuat_hien'])) { ?>
                                            <p class="text-danger"><?= $_SESSION['errors']['thu_tu_xuat_hien'] ?></p>
                                        <?php } ?>
                                    </div>


                                    <div class="form-group col-6">
                                        <label for="">Chọn trạng thái</label>
                                        <select name="trang_thai" id="" class="form-control">
                                            <option selected disabled value="">-- Chọn trang thái</option>
                                            <option value="0">Ẩn đi</option>
                                            <option value="1">Hoạt động</option>
                                        </select>
                                        <?php if (isset($_SESSION['errors']['trang_thai'])) { ?>
                                            <p class="text-danger"><?= $_SESSION['errors']['trang_thai'] ?></p>
                                        <?php } ?>
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="">Hình ảnh</label>
                                        <input name="hinh_anh" type="file" class="form-control" id="hinh_anh">
                                        <?php if (isset($_SESSION['errors']['hinh_anh'])) { ?>
                                            <p class="text-danger"><?= $_SESSION['errors']['hinh_anh'] ?></p>
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