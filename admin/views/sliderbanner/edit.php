<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content mt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-1"></div>
                <div class="col-10">
                    <!-- /.card -->
                    <div class="card">
                        <div class="card-header bg-primary">
                            <div class="row align-items-center">
                                <div class="col-11 ">
                                    <h class="card-title align-middlecard-title">Cập nhật slider-banner</h6>
                                </div>
                                <div class="col-1">

                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <!-- /.card-header -->
                            <!-- form start -->
                            <form class="" enctype="multipart/form-data" action="<?= BASE_URL_ADMIN ?>?act=sua-sliderbanner" method="POST">
                                <input type="hidden" name="id" value="<?= $listAnh['id'] ?>">
                                <div class="card-body row">
                                    <div class="col-4">
                                        <div class="form-group col-12">
                                            <label for="hinh_anh" class="form-label">Hình ảnh</label>
                                            <?php if (!empty($listAnh['hinh_anh'])) { ?>
                                                <div class="mb-3">
                                                    <img src="<?= BASE_URL . $listAnh['hinh_anh'] ?>" class="img-fluid img-thumbnail" width="320" alt="Current Image">
                                                </div>
                                            <?php } ?>
                                            <input name="hinh_anh" type="file" class="form-control" id="hinh_anh">
                                            <?php if (isset($errors['hinh_anh'])) { ?>
                                                <p class="text-danger"><?= $errors['hinh_anh'] ?></p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-group col-12">
                                            <label for="">Chọn loại ảnh</label>
                                            <select name="type" id="" class="form-control">
                                                <option selected disabled value="">-- Chọn loại ảnh</option>
                                                <option value="0" <?= $listAnh['type'] == 0 ? 'selected' : '' ?>>Banner</option>
                                                <option value="1" <?= $listAnh['type'] == 1 ? 'selected' : '' ?>>Slider</option>
                                            </select>
                                            <?php if (isset($errors['type'])) { ?>
                                                <p class="text-danger"><?= $errors['type'] ?></p>
                                            <?php } ?>
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="tieu_de">Tiêu đề</label>
                                            <input value="<?= $listAnh['tieu_de'] ?>" name="tieu_de" type="text" class="form-control" id="tieu_de" placeholder="Nhập tên QTV">
                                            <?php if (isset($errors['tieu_de'])) { ?>
                                                <p class="text-danger"><?= $errors['tieu_de'] ?></p>
                                            <?php } ?>
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="thu_tu_xuat_hien">Thứ tự xuất hiện</label>
                                            <input value="<?= $listAnh['thu_tu_xuat_hien'] ?>" name="thu_tu_xuat_hien" type="text" class="form-control" id="thu_tu_xuat_hien" placeholder="Nhập tên QTV">
                                            <?php if (isset($errors['thu_tu_xuat_hien'])) { ?>
                                                <p class="text-danger"><?= $errors['thu_tu_xuat_hien'] ?></p>
                                            <?php } ?>
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="">Chọn trạng thái</label>
                                            <select name="trang_thai" id="" class="form-control">
                                                <option selected disabled value="">-- Chọn trạng thái</option>
                                                <option value="0" <?= $listAnh['trang_thai'] == 0 ? 'selected' : '' ?>>Ẩn đi</option>
                                                <option value="1" <?= $listAnh['trang_thai'] == 1 ? 'selected' : '' ?>>Hoạt động</option>
                                            </select>
                                            <?php if (isset($errors['trang_thai'])) { ?>
                                                <p class="text-danger"><?= $errors['trang_thai'] ?></p>
                                            <?php } ?>
                                        </div>
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