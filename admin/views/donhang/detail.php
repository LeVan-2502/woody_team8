<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content mt-3">
        <div class="container-fluid">
            <div class="row">
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
                                    <strong><?= $donHang['ten_nguoi_nhan'] ?></strong><br>
                                    <strong>SĐT </strong><?= $donHang['sdt_nguoi_nhan'] ?><br>
                                    <strong>Email </strong><?= $donHang['email_nguoi_nhan'] ?><br>
                                    <strong>Địa chỉ </strong><?= $donHang['dia_chi_nguoi_nhan'] ?><br>

                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <h4 class="text-primary fw-bold">THÔNG TIN ĐƠN HÀNG</h4>
                                <address>

                                    <strong>Mã đơn hàng </strong><?= $donHang['ma_don_hang'] ?><br>
                                    <label class="" for="">Trạng thái hiện tại</label><span class=" ml-1 badge badge-danger"><?= $donHang['ten_trang_thai'] ?></span>
                                </address>

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
                                    <input type="text" name="don_hang_id" value="<?= $donHang['don_hang_id'] ?>" hidden>

                                    <div class="row">
                                        <div class="form-group col-8">
                                            <h4>Danh sách sản phẩm trong đơn hàng   </h4>
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