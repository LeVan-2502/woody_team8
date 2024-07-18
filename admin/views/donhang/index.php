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
              </div>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
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
                      <td class="align-middle"><?= $donhang['ho_ten'] ?></td>
                      <td class="align-middle"><?= $donhang['ten_nguoi_nhan'] ?></td>
                      <td class="align-middle"><?= $donhang['ngay_dat'] ?></td>
                      <td class="align-middle"><?= $donhang['tong_tien'] ?></td>
                      <td class="align-middle"><?= $donhang['ten_phuong_thuc'] ?></td>
                      <td class="align-middle"><?= $donhang['ten_trang_thai'] ?></td>
                      <td class="align-middle">
                        <a href="<?= BASE_URL_ADMIN . '?act=form-chitietdonhang&id_don_hang=' . $donhang['id']?>" class="btn btn-primary">Chi tiết</a>
                        <a href="<?= BASE_URL_ADMIN . '?act=form-sua-donhang&id_don_hang=' . $donhang['id']?>" class="btn btn-warning">Sửa</a>
                        <a class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="<?= BASE_URL_ADMIN . '?act=xoa-donhang&id_don_hang=' . $donhang['id']?>">Xóa</a>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
                <tfoot>
                <tr>
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