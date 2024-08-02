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
                  <h3 class="">Danh sách <?= $anh_he_thong ?></h3>
                </div>
                <div class="col-2">
                  <a href="<?= BASE_URL_ADMIN ?>?act=form-them-sliderbanner" class="btn btn-success ">Thêm mới Slider-Banner</a>
                </div>
              </div>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>ID</th>
                    <th>Tiêu đề</th>
                    <th>Hình ảnh</th>
                    <th>Trạng thái</th>
                    <th>Loại</th>
                    <th>Thứ tự xuất hiện</th>
                    <th>Action</th>

                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($listAnh as $key => $sl) : ?>
                    <tr>
                      <td class="align-middle"><?= $key + 1 ?></td>
                      <td class="align-middle"><?= $sl['id'] ?></td>
                      <td class="align-middle"><?= $sl['tieu_de'] ?></td>
                      <td class="align-middle text-center">
                        <img width="100px" src="<?= BASE_URL . $sl['hinh_anh'] ?>" alt="">
                      </td>

                      <td class="align-middle"><?= $sl['trang_thai'] == 1 ? 'Hoạt động' : 'Ẩn đi' ?></td>
                      <td class="align-middle"><?= $sl['type'] == 1 ? 'Sliders' : 'Banners' ?></td>
                      <td class="align-middle"><?= $sl['thu_tu_xuat_hien'] ?></td>
                      <td class="align-middle">
                        <a title="Sửa thông tin" href="<?= BASE_URL_ADMIN . '?act=form-sua-sliderbanner&id_slider_banner=' . $sl['id'] ?>" class="btn btn-warning"><i style="color: white;" class="fa-solid fa-hammer"></i></a>
                        <a title="Xóa thông tin" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="<?= BASE_URL_ADMIN . '?act=xoa-sliderbanner&id_slider_banner=' . $sl['id'] ?>"><i class="fa-solid fa-trash"></i></a>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>STT</th>
                    <th>ID</th>
                    <th>Tiêu đề</th>
                    <th>Hình ảnh</th>
                    <th>Trạng thái</th>
                    <th>Loại</th>
                    <th>Thứ tự xuất hiện</th>
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