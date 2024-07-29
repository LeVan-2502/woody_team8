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
                                    <h class="card-title align-middlecard-title">Cập nhật tài khoản quản trị viên</h6>
                                </div>
                                <div class="col-1">

                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <!-- /.card-header -->
                            <!-- form start -->
                            <form enctype="multipart/form-data" action="<?= BASE_URL_ADMIN ?>?act=sua-baiviet" method="POST">
                                <input type="hidden" name="id" value="<?= $baiViet['id'] ?>">
                                <div class="card-body row">
                                    <div class="form-group col-6">
                                        <label for="tieu_de">Tiêu đề</label>
                                        <input value="<?= $baiViet['tieu_de'] ?>" name="tieu_de" type="text" class="form-control" id="tieu_de" placeholder="Nhập tên QTV">
                                        <?php if (isset($_SESSION['errors']['tieu_de'])) { ?>
                                            <p class="text-danger"><?= $_SESSION['errors']['tieu_de'] ?></p>
                                        <?php } ?>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="">Ngày đăng</label>
                                        <input value="<?= $baiViet['ngay_dang'] ?>" name="ngay_dang" type="date" class="form-control" id="ngay_dang" placeholder="Ngày sinh">
                                        <?php if (isset($_SESSION['errors']['ngay_dang'])) { ?>
                                            <p class="text-danger"><?= $_SESSION['errors']['ngay_dang'] ?></p>
                                        <?php } ?>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="danh_muc_id">Danh mục</label>
                                        <select name="danh_muc_id" id="danh_muc_id" class="form-control">
                                            <option selected disabled value="">Chọn danh mục sản phẩm</option>
                                            <?php foreach ($listDanhMuc as $danhmuc) : ?>
                                                <option value="<?= $danhmuc['id'] ?>" <?= isset($baiViet['danh_muc_id']) && $baiViet['danh_muc_id'] == $danhmuc['id'] ? 'selected' : '' ?>><?= $danhmuc['ten_danh_muc'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <?php if (isset($errors['danh_muc_id'])) { ?>
                                            <p class="text-danger"><?= $errors['danh_muc_id'] ?></p>
                                        <?php } ?>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="tag_id">Tags</label>
                                        <select name="tag_id[]" id="tag_id" class="form-control" multiple>
                                            <?php
                                            foreach ($listTag as $tag) : ?>
                                                <option value="<?= $tag['id'] ?>"><?= $tag['ten_tag'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <?php if (isset($_SESSION['errors']['tag_id'])) { ?>
                                            <p class="text-danger"><?= $_SESSION['errors']['tag_id'] ?></p>
                                        <?php } ?>
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="hinh_anh" class="form-label">Ảnh bìa</label>
                                        <?php if (!empty($baiViet['hinh_anh'])) { ?>
                                            <div class="mb-3">
                                                <img src="<?= BASE_URL . $baiViet['hinh_anh'] ?>" class="img-fluid img-thumbnail" width="100" alt="Current Image">
                                            </div>
                                        <?php } ?>
                                        <input name="hinh_anh" type="file" class="form-control" id="hinh_anh">
                                        <?php if (isset($errors['hinh_anh'])) { ?>
                                            <p class="text-danger"><?= $errors['hinh_anh'] ?></p>
                                        <?php } ?>
                                    </div>


                                    <div class="form-group col-12">
                                        <label for="">Nội dung</label>
                                        <textarea name="noi_dung" id="mytextarea"><?= $baiViet['noi_dung'] ?></textarea>
                                        <?php if (isset($_SESSION['errors']['noi_dung'])) { ?>
                                            <p class="text-danger"><?= $errors['noi_dung'] ?></p>
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