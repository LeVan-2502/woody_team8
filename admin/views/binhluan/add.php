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
                                    <h class="card-title align-middlecard-title">Thêm mới sản phẩm</h6>
                                </div>
                                <div class="col-1">

                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <!-- /.card-header -->
                            <!-- form start -->
                            <form enctype="multipart/form-data" action="<?= BASE_URL_ADMIN ?>?act=them-sanpham" method="POST">
                                <div class="card-body row">
                                    <div class="form-group col-12">
                                        <label for="ten_san_pham">Tên sản phẩm</label>
                                        <input name="ten_san_pham" type="text" class="form-control" id="ten_san_pham" placeholder="Nhập tên sản phẩm">
                                        <?php if (isset($errors['ten_san_pham'])) { ?>
                                            <p class="text-danger"><?= $errors['ten_san_pham'] ?></p>
                                        <?php } ?>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="">Giá sản phẩm</label>
                                        <input name="gia_san_pham" type="number" class="form-control" id="gia_san_pham" placeholder="Nhập giá sản phẩm">
                                        <?php if (isset($errors['gia_san_pham'])) { ?>
                                            <p class="text-danger"><?= $errors['gia_san_pham'] ?></p>
                                        <?php } ?>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="">Giá khuyến mãi</label>
                                        <input name="gia_khuyen_mai" type="number" class="form-control" id="gia_khuyen_mai" placeholder="Nhập giá khuyến mãi">
                                        <?php if (isset($errors['gia_khuyen_mai'])) { ?>
                                            <p class="text-danger"><?= $errors['gia_khuyen_mai'] ?></p>
                                        <?php } ?>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="">Hình ảnh</label>
                                        <input name="hinh_anh" type="file" class="form-control" id="hinh_anh">
                                        <?php if (isset($errors['hinh_anh'])) { ?>
                                            <p class="text-danger"><?= $errors['hinh_anh'] ?></p>
                                        <?php } ?>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="">Album ảnh</label>
                                        <input name="img_array[]" type="file" class="form-control" id="img_array" multiple>

                                    </div>
                                    <div class="form-group col-6">
                                        <label for="">Số lượng</label>
                                        <input name="so_luong" type="number" class="form-control" id="so_luong" placeholder="Nhập số lượng">
                                        <?php if (isset($errors['so_luong'])) { ?>
                                            <p class="text-danger"><?= $errors['so_luong'] ?></p>
                                        <?php } ?>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="">Ngày nhâp</label>
                                        <input name="ngay_nhap" type="date" class="form-control" id="ngay_nhap" placeholder="Ngày nhập">
                                        <?php if (isset($errors['ngay_nhap'])) { ?>
                                            <p class="text-danger"><?= $errors['ngay_nhap'] ?></p>
                                        <?php } ?>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="">Danh mục</label>
                                        <select name="danh_muc_id" id="danh_muc_id" class="form-control">
                                            <option selected disabled value="">Chọn danh mục sản phẩm</option>
                                            <?php foreach ($listDanhMuc as $danhmuc) : ?>
                                                <option value="<?= $danhmuc['id'] ?>"><?= $danhmuc['ten_danh_muc'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <?php if (isset($errors['danh_muc_id'])) { ?>
                                            <p class="text-danger"><?= $errors['danh_muc_id'] ?></p>
                                        <?php } ?>
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="">Trạng thái</label>
                                        <select name="trang_thai" id="trang_thai" class="form-control">
                                            <option selected disabled value="">Chọn danh mục sản phẩm</option>
                                            <option value="1">Còn bán</option>
                                            <option value="2">Dừng bán</option>
                                        </select>
                                        <?php if (isset($errors['trang_thai'])) { ?>
                                            <p class="text-danger"><?= $errors['trang_thai'] ?></p>
                                        <?php } ?>
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="mo_ta">Mô tả</label>
                                        <textarea name="mo_ta" class="form-control" id="mo_ta" placeholder="Nhập mô tả"></textarea>
                                        <?php if (isset($errors['mo_ta'])) { ?>
                                            <p class="text-danger"><?= $errors['mo_ta'] ?></p>
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