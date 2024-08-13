<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-md-7">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Sửa thông tin sản phẩm</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form enctype="multipart/form-data" action="<?= BASE_URL_ADMIN ?>?act=sua-sanpham" method="POST">
                            <input type="hidden" name="id" value="<?= $sanPham['id'] ?>">
                            <div class="card-body row">
                                <div class="form-group col-12">
                                    <label for="ten_san_pham">Tên sản phẩm</label>
                                    <input value="<?= $sanPham['ten_san_pham'] ?>" name="ten_san_pham" type="text" class="form-control" id="ten_san_pham" placeholder="Nhập tên sản phẩm">
                                    <?php if (isset($errors['ten_san_pham'])) { ?>
                                        <p class="text-danger"><?= $errors['ten_san_pham'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group col-6">
                                    <label for="gia_san_pham">Giá sản phẩm</label>
                                    <input value="<?= $sanPham['gia_san_pham'] ?>" name="gia_san_pham" type="number" class="form-control" id="gia_san_pham" placeholder="Nhập giá sản phẩm">
                                    <?php if (isset($errors['gia_san_pham'])) { ?>
                                        <p class="text-danger"><?= $errors['gia_san_pham'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group col-6">
                                    <label for="gia_khuyen_mai">Giá khuyến mãi</label>
                                    <input value="<?= $sanPham['gia_khuyen_mai'] ?>" name="gia_khuyen_mai" type="number" class="form-control" id="gia_khuyen_mai" placeholder="Nhập giá khuyến mãi">
                                    <?php if (isset($errors['gia_khuyen_mai'])) { ?>
                                        <p class="text-danger"><?= $errors['gia_khuyen_mai'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group col-4">
                                    <label for="so_luong">Số lượng</label>
                                    <input value="<?= $sanPham['so_luong'] ?>" name="so_luong" type="text" class="form-control" id="so_luong" placeholder="Nhập số lượng">
                                    <?php if (isset($errors['so_luong'])) { ?>
                                        <p class="text-danger"><?= $errors['so_luong'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group col-4">
                                    <label for="ngay_nhap">Ngày nhập</label>
                                    <input value="<?= $sanPham['ngay_nhap'] ?>" name="ngay_nhap" type="date" class="form-control" id="ngay_nhap">
                                    <?php if (isset($errors['ngay_nhap'])) { ?>
                                        <p class="text-danger"><?= $errors['ngay_nhap'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group col-4">
                                    <label for="danh_muc_id">Danh mục</label>
                                    <select name="danh_muc_id" id="danh_muc_id" class="form-control">
                                        <option selected disabled value="">Chọn danh mục sản phẩm</option>
                                        <?php foreach ($listDanhMuc as $danhmuc) : ?>
                                            <option value="<?= $danhmuc['id'] ?>" <?= isset($sanPham['danh_muc_id']) && $sanPham['danh_muc_id'] == $danhmuc['id'] ? 'selected' : '' ?>><?= $danhmuc['ten_danh_muc'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <?php if (isset($errors['danh_muc_id'])) { ?>
                                        <p class="text-danger"><?= $errors['danh_muc_id'] ?></p>
                                    <?php } ?>
                                </div>
                               
                                <div class="form-group col-12">
                                    <label for="mo_ta">Mô tả</label>
                                    <textarea name="mo_ta" class="form-control" id="mo_ta" placeholder="Nhập mô tả"><?= $sanPham['mo_ta'] ?></textarea>
                                    <?php if (isset($errors['mo_ta'])) { ?>
                                        <p class="text-danger"><?= $errors['mo_ta'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group col-6">
                                    <label for="hinh_anh" class="form-label">Hình ảnh</label>
                                    <?php if (!empty($sanPham['hinh_anh'])) { ?>
                                        <div class="mb-3">
                                            <img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" class="img-fluid img-thumbnail" width="100" alt="Current Image">
                                        </div>
                                    <?php } ?>
                                    <input name="hinh_anh" type="file" class="form-control" id="hinh_anh">
                                    <?php if (isset($errors['hinh_anh'])) { ?>
                                        <p class="text-danger"><?= $errors['hinh_anh'] ?></p>
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
            <div class="col-md-5">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Sửa thông tin album ảnh</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <form enctype="multipart/form-data" action="<?= BASE_URL_ADMIN ?>?act=sua-albumsanpham" method="post">
                            <div class="row">
                                <div class="col-lg-12 grid-margin stretch-card">
                                    <div class="table-responsive">
                                        <table id="faqs" class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Ảnh</th>
                                                    <th>File</th>
                                                    <th>
                                                        <div class="text-left">
                                                            <button type="button" onclick="addfaqs();" class="btn btn-success">Thêm</button>
                                                        </div>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <input type="hidden" name="san_pham_id" value="<?= $sanPham['id'] ?>">
                                                <input type="hidden" name="img_delete" id="img-delete">
                                                <?php foreach ($listAnh as $key => $value) : ?>
                                                    <tr id="faqs-row-<?= $key ?>">
                                                        <input type="hidden" name="current_img_ids[]" value="<?= $value['id'] ?>">
                                                        <td>
                                                            <img width="100px" src="<?= BASE_URL . $value['link_hinh_anh'] ?>" alt="">
                                                        </td>
                                                        <td>
                                                            <input type="file" name="img_array[]" class="form-control">
                                                        </td>
                                                        <td class="mt-10 text-left">
                                                            <button type="button" class="btn btn-danger" onclick="removeRow(<?= $key ?>, <?= $value['id'] ?>)">Xóa</button>
                                                        </td>
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                        <button class="btn btn-primary m-4" type="submit">Xác nhận cập nhận</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
</div>
<script>
    var faqs_row = <?= count($listAnh) ?>;

    function addfaqs() {
        var html = '<tr id="faqs-row-' + faqs_row + '">';
        html += '<td> <img width="100px" src="https://t3.ftcdn.net/jpg/02/18/21/86/360_F_218218632_jF6XAkcrlBjv1mAg9Ow0UBMLBaJrhygH.jpg" alt=""></td>';
        html += '<td><input type="file" name="img_array[]" class="form-control"></td>';
        html += '<td class="mt-10 text-left">';
        html += '<button type="button" class="btn btn-danger" onclick="removeRow(' + faqs_row + ', null)">Xóa</button>';
        html += '</td>';
        html += '</tr>';

        document.querySelector('#faqs tbody').insertAdjacentHTML('beforeend', html);

        faqs_row++;
    }

    function removeRow(rowId, imgId) {
        document.getElementById('faqs-row-' + rowId).remove();

        if (imgId !== null) {
            var imgDeleteInput = document.getElementById('img-delete');
            var currentValue = imgDeleteInput.value;
            imgDeleteInput.value = currentValue ? currentValue + ',' + imgId : imgId;
        }
    }
</script>

<!-- <script>
    var faqs_row = 0;

    function addfaqs() {
        html = '<tr id="faqs-row-' + faqs_row + '">';
        html += '<td><input type="text" class="form-control" placeholder="User name"></td>';
        html += '<td><input type="file" placeholder="Product name" class="form-control"></td>';
        html += '<td class="mt-10 text-left" onclick="removeRow(<?= $key ?>, <?= $value['id'] ?>)"><button  type="button" class="btn btn-danger">Xóa</button></td>';

        html += '</tr>';

        $('#faqs tbody').append(html);

        faqs_row++;
    }

    function removeRow(rowId, imgId) {
        $('#faqs-row-' + rowId).remove();

        if (imgId !== null) {
            var imgDeleteInput = document.getElementById('img_delete');
            var currentValue = imgDeleteInput.value;
            imgDeleteInput.value = currentValue ? currentValue + ',' + imgId : imgId;
        }
    }
</script> -->