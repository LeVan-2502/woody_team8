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
                  <h3 class="">Danh sách đơn hàng</h3>
                </div>  
                <div class="col-2">
                  <form method="POST" action="<?= BASE_URL_ADMIN ?>?act=loc-donhang">
                    <select name="trang_thai_id" class="form-control" onchange="this.form.submit()">
                      <option value="">Tất cả trang thái đơn hàng</option>
                      <?php foreach ($listTrangThai as $trangThai) : ?>
                        <option value="<?= $trangThai['id'] ?>" <?= isset($_GET['trang_thai_id']) && $_GET['trang_thai_id'] == $trangThai['id'] ? 'selected' : '' ?>>
                          <?= $trangThai['ten_trang_thai'] ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                  </form>
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
                    <th>Tên người nhận</th>
                    <th>Tên tài khoản</th>
                    <th>Ngày đặt</th>
                    <th>Tổng tiền</th>
                    <th>Phương thức thanh toán</th>
                    <th>Trạng thái đơn hàng</th>
                    <th>Action</th>

                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($listDonHang as $key => $donhang) : ?>
                    <tr>
                      <td class="align-middle"><?= $key + 1 ?></td>
                      <td class="align-middle"><?= $donhang['ma_don_hang'] ?></td>
                      <td class="align-middle"><?= $donhang['ho_ten'] ?></td>
                      <td class="align-middle"><?= $donhang['ten_nguoi_nhan'] ?></td>
                      <td class="align-middle"><?= $donhang['ngay_dat'] ?></td>
                      <td class="align-middle"><?= $donhang['tong_tien'] ?></td>
                      <td class="align-middle"><?= $donhang['ten_phuong_thuc'] ?></td>
                      <td> <?php if (isset($donhang['trang_thai_id']) && isset($donhang['ten_trang_thai'])) : ?>
                          <?= hienThiTrangThai($donhang['trang_thai_id'], $donhang['ten_trang_thai']); ?>
                        <?php endif; ?>
                      </td>
                      <td class="align-middle">
                        <a title="Chi tiết đơn hàng" href="<?= BASE_URL_ADMIN . '?act=form-chitietdonhang&id_don_hang=' . $donhang['id'] ?>" class="btn btn-warning"><i style="color: white;" class="fa-solid fa-circle-info"></i></a>
                        <!-- <a  href="<?= BASE_URL_ADMIN . '?act=form-sua-donhang&id_don_hang=' . $donhang['id'] ?>" class="btn btn-warning"><i style="color: white;" class="fa-solid fa-hammer"></i></a> -->
                        <!-- <a class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="<?= BASE_URL_ADMIN . '?act=xoa-donhang&id_don_hang=' . $donhang['id'] ?>"><i class="fa-solid fa-trash"></i></a> -->
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
                    <th>Tên khách hàng</th>
                    <th>ID người nhận</th>
                    <th>Ngày đặt</th>
                    <th>Tổng tiền</th>
                    <th>Phương thức thanh toán</th>
                    <th>Trạng thái đơn hàng</th>
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