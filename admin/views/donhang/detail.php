<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content mt-3">
        <div class="container-fluid">
            <div class="row">
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
                <div class="col-12">
                    <div class=" m-3 callout callout-info">

                        <h2>
                            <i class="fas fa-globe"></i>
                            Thông tin chi tiết đơn hàng
                        </h2>
                    </div>

                    <div class="invoice p-3 m-3">
                        <div class="row invoice-info my-2">
                            <div class="col-sm-4 invoice-col">
                                <h4 class="text-primary fw-bold">FROM</h4>
                                <address>

                                    <strong>WOODY SHOP</strong><br>
                                    <strong>SĐT </strong>0243 996 5678<br>
                                    <strong>Email</strong>woodyshop@gmail.com<br>
                                    <strong>Địa chỉ </strong>155 Ngô Quyền, TP Hà Nội<br>

                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <h4 class="text-primary fw-bold">TO</h4>
                                <address>
                                    <strong><?= $dh['ten_nguoi_nhan'] ?></strong><br>
                                    <strong>SĐT </strong><?= $dh['sdt_nguoi_nhan'] ?><br>
                                    <strong>Email </strong><?= $dh['email_nguoi_nhan'] ?><br>
                                    <strong>Địa chỉ </strong><?= $dh['dia_chi_nguoi_nhan'] ?><br>

                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <h4 class="text-primary fw-bold">THÔNG TIN ĐƠN HÀNG</h4>
                                <address>

                                    <strong>PTTT : </strong><?= $dh['ten_phuong_thuc'] ?><br>
                                    <label class="" for="">Trạng thái hiện tại</label> <?php if (isset($dh['trang_thai_id']) && isset($dh['ten_trang_thai'])) : ?>
                                        <?= hienThiTrangThai($dh['trang_thai_id'], $dh['ten_trang_thai']); ?>
                                    <?php endif; ?>
                                </address>

                                <?php
                                function hienThiTrangThai($trang_thai_id, $ten_trang_thai)
                                {
                                    $mauTrangThai = [
                                        0 => 'badge-primary',  // Đặt hàng thành công - Màu xanh dương
                                        1 => 'badge-info',     // Đang chuẩn bị hàng - Màu xanh nhạt
                                        2 => 'badge-warning',  // Đang giao hàng - Màu vàng
                                        3 => 'badge-success',  // Giao hàng thành công - Màu xanh lá
                                        4 => 'badge-danger'    // Đơn hàng bị hủy - Màu đỏ
                                    ];
                                    $mau = isset($mauTrangThai[$trang_thai_id]) ? $mauTrangThai[$trang_thai_id] : 'badge-secondary';
                                    return "<span class='badge $mau'>" . htmlspecialchars($ten_trang_thai) . "</span>";
                                }
                                ?>
                            </div>
                            <!-- /.col -->
                        </div>
                    </div>
                    <!-- /.row -->

                    <!-- Main content -->
                    <div class="invoice m-3">
                        <!-- Table row -->
                        <div class="row">

                            <div class="col-12 p-3 table-responsive">

                                <form action="<?= BASE_URL_ADMIN ?>?act=sua-chitietdonhang" method="POST">
                                    <input type="text" name="don_hang_id" value="<?= $id_don_hang ?>" hidden>

                                    <div class="row">
                                        <div class="form-group col-8">
                                            <h4>Danh sách sản phẩm trong đơn hàng </h4>
                                        </div>

                                        <div class="form-group col-3 text-left">

                                            <select name="trang_thai_id" id="trang_thai_id" class="form-control">
                                                <option selected disabled value="">Cập nhật trạng thái đơn hàng</option>
                                                <?php foreach ($trangThai as $trangthai) : ?>
                                                    <option value="<?= $trangthai['id'] ?>"><?= $trangthai['ten_trang_thai'] ?></option>
                                                <?php endforeach ?>

                                            </select>

                                        </div>
                                        <div class="form-group col-1">
                                            <button class="px-4 btn btn-success" type="submit">Lưu </button>
                                        </div>

                                    </div>
                                </form>
                                <?php $this->thayDoiTrangThai(); ?>

                                <table class="table table-bordered">
                                    <thead class="bg-info">
                                        <tr>
                                            <th>STT</th>
                                            <th>Hình ảnh</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Số lượng</th>
                                            <th>Giá sản phẩm</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($sanPhamDonHang as $key => $spdh) : ?>
                                            <tr>
                                                <td class="align-middle"><?= $key + 1 ?></td>
                                                <td class="align-middle text-center">
                                                    <img width="100px" src="<?= BASE_URL . $spdh['hinh_anh'] ?>" alt="">
                                                </td>
                                                <td class="align-middle"><?= $spdh['ten_san_pham'] ?></td>
                                                <td class="align-middle"><?= $spdh['so_luong'] ?></td>
                                                <td class="align-middle"><?= $spdh['gia_san_pham'] ?></td>
                                                <td class="align-middle"><?= $spdh['thanh_tien'] ?></td>

                                            </tr>
                                        <?php endforeach ?>

                                    </tbody>

                                </table>
                            </div>

                            <!-- /.col -->
                        </div>


                        <!-- this row will not appear when printing -->

                    </div>
                    <div class="invoice m-3">
                        <div class="row">
                            <div class="col-12 p-3">
                                <p class="lead mt-2">Amount Due 2/22/2014</p>

                                <div class="table-responsive table-bordered">
                                    <table class="table">
                                        <tr>
                                            <th style="width:50%">Subtotal:</th>
                                            <td>$250.30</td>
                                        </tr>
                                        <tr>
                                            <th>Tax (9.3%)</th>
                                            <td>$10.34</td>
                                        </tr>
                                        <tr>
                                            <th>Shipping:</th>
                                            <td>$5.80</td>
                                        </tr>
                                        <tr>
                                            <th>Total:</th>
                                            <td>$265.24</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="m-3">
                        <div class="row">
                            <div class="col-12">
                                <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                                <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                                    Payment
                                </button>
                                <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                                    <i class="fas fa-download"></i> Generate PDF
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
</div>
<script>
    // Hàm để tự động đóng alert sau 5 giây
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 5000);
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>