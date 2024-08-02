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
                        <div class="card-header">
                            <div class="row">
                                <div class="col-10">
                                    <h3 class="">Danh sách đơn hàng của <strong><?=$dh['ho_ten']?></strong></h3>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã đơn hàng</th>
                                        <th>Ngày đặt</th>
                                        <th>Mã giảm giá đã áp dụng</th>
                                        <th>Tổng hóa đơn</th>
                                        
                                        <th>Trạng thái đơn hàng</th>
                                        <th>Phương thức thanh toán</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listDonHang as $key => $dh) : ?>
                                        <tr>
                                            <td class="align-middle"><?= $key + 1 ?></td>
                                            <td class="align-middle"><?= $dh['ma_don_hang'] ?></td>
                                            <td class="align-middle"><?= $dh['ngay_dat'] ?></td>
                                            <td class="align-middle"><?= $dh['ten_khuyen_mai'] ?></td>
                                            <td class="align-middle"><?= $dh['tong_tien'] ?></td>
                                            <td> 
                                                <?php if (isset($dh['trang_thai_id']) && isset($dh['ten_trang_thai'])) : ?>
                                                    <?= hienThiTrangThai($dh['trang_thai_id'], $dh['ten_trang_thai']); ?>
                                                <?php endif; ?>
                                            </td>
                                            <td class="align-middle"><?= $dh['ten_trang_thai'] ?></td>
                                            <td class="align-middle">
                                                <a href="<?= BASE_URL_ADMIN . '?act=form-chitietdonhang&id_don_hang=' . $dh['id']?>" class="btn btn-warning"><i style="color: white;" class="fa-solid fa-circle-info"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>

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
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã đơn hàng</th>
                                        <th>Ngày đặt</th>
                                        <th>Mã giảm giá đã áp dụng</th>
                                        <th>Tổng hóa đơn</th>
                                       
                                        <th>Trạng thái đơn hàng</th>
                                        <th>Phương thức thanh toán</th>
                                        <th>Action</th>

                                    </tr>
                                </tfoot>
                            </table>
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