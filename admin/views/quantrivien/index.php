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
                  <h3 class="">Danh sách quản trị viên</h3>
                </div>
                <div class="col-2">
                  <a href="<?= BASE_URL_ADMIN ?>?act=form-them-quantrivien" class="btn btn-success ">Thêm mới quản trị viên</a>
                </div>
              </div>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Họ tên</th>
                    <th>Ảnh đại diện</th>
                    <th>Ngày sinh</th>
                    <th>Giới tính</th>
                    <th>Mật khẩu</th>
                    <th>Email</th>
                    <th>Trạng thái</th>
                    <th>Action</th>

                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($listQuanTriVien as $key => $qtv) : ?>
                    <tr>
                      <td class="align-middle"><?= $key + 1 ?></td>
                      <td class="align-middle"><?= $qtv['ho_ten'] ?></td>
                      <td class="align-middle text-center">
                        <img width="100px" src="<?= BASE_URL.$qtv['anh_dai_dien'] ?>" alt="">
                      </td>
                      <td class="align-middle"><?= $qtv['ngay_sinh'] ?></td>
                      <td class="align-middle"><?= $qtv['gioi_tinh'] ==1 ? 'Nam' : 'Nữ'?></td>
                      <td class="align-middle"><?= $qtv['mat_khau'] ?></td>
                      <td class="align-middle"><?= $qtv['email'] ?></td>
                      <td class="align-middle"><?= $qtv['trang_thai'] == 1 ? 'Đang hoạt động' : 'Dừng hoạt đông' ?></td>
                      <td class="align-middle">
                        <a href="<?= BASE_URL_ADMIN . '?act=form-sua-quantrivien&id_tai_khoan=' . $qtv['id'] ?>" class="btn btn-warning">Sửa</a>
                        <a class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="<?= BASE_URL_ADMIN . '?act=xoa-quantrivien&id_tai_khoan=' . $qtv['id'] ?>">Xóa</a>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>STT</th>
                    <th>Họ tên</th>
                    <th>Ảnh đại diện</th>
                    <th>Ngày sinh</th>
                    <th>Giới tính</th>
                    <th>Mật khẩu</th>
                    <th>Email</th>
                    <th>Trạng thái</th>
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