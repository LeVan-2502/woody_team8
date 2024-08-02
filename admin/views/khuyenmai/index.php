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
                  <h3 class="">Danh sách khuyến mãi</h3>
                </div>
                <div class="col-2">
                  <a href="<?= BASE_URL_ADMIN ?>?act=form-them-khuyenmai" class="btn btn-success ">Thêm mới khuyến mãi</a>
                </div>
              </div>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Tên khuyến mãi</th>
                    <th>Giá trị</th>
                    <th>Ngày Bắt đầu</th>
                    <th>Ngày kết thúc</th>
                    <th>Trạng thái</th>
                    <th>Action</th>

                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($listKhuyenMai as $key => $km) : ?>
                    <tr>

                      <td class="align-middle"><?= $km['id'] ?></td>
                      <td class="align-middle"><?= $km['ten_khuyen_mai'] ?></td>
                      <td class="align-middle"><?= $km['gia_tri'] ?></td>
                      <td class="align-middle"><?= $km['ngay_bat_dau'] ?></td>
                      <td class="align-middle"><?= $km['ngay_ket_thuc'] ?></td>
                      <td class="align-middle"><?= $km['trang_thai'] == 1 ? 'Hoạt động' : 'Đã kết thúc' ?></td>
                      <td class="align-middle">
                        <a href="<?= BASE_URL_ADMIN . '?act=form-sua-khuyenmai&id_khuyen_mai=' . $km['id'] ?>" class="btn btn-warning"><i style="color: white;" class="fa-solid fa-hammer"></i></a>
                        <a class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="<?= BASE_URL_ADMIN . '?act=xoa-khuyenmai&id_khuyen_mai=' . $km['id'] ?>"><i class="fa-solid fa-trash"></i></a>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Tên khuyến mãi</th>
                    <th>Giá trị</th>
                    <th>Ngày Bắt đầu</th>
                    <th>Ngày kết thúc</th>
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