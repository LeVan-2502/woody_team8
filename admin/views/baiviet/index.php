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
                  <h3 class="">Danh sách bài viết</h3>
                </div>
                <div class="col-2">
                  <a href="<?= BASE_URL_ADMIN ?>?act=form-them-baiviet" class="btn btn-success ">Thêm mới bài viết</a>
                </div>
              </div>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Tiêu đề</th>
                    <th>Hình ảnh</th>
                    <th>Ngày đăng</th>
                    <th>Tác giả</th>
                    <th>Danh mục</th>
                  
                    <th>Lượt xem</th>
                    <th>Lượt bình luận</th>
                    <th>Action</th>

                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($listBaiViet as $key => $tk) : ?>
                    <tr>
                      <td class="align-middle"><?= $tk['id'] ?></td>
                      <td class="align-middle"><?= $tk['tieu_de'] ?></td>
                      <td class="align-middle text-center">
                        <img width="100px" src="<?= BASE_URL.$tk['hinh_anh'] ?>" alt="">
                      </td>
                      <td class="align-middle"><?= $tk['ngay_dang'] ?></td>
                      <td class="align-middle"><?= $tk['ho_ten']?></td>
                      <td class="align-middle"><?= $tk['ten_danh_muc'] ?></td>
                      <td class="align-middle"><?= $tk['luot_xem'] ?></td>
                      <td class="align-middle"><?= $tk['luot_binh_luan'] ?></td>
                      
                      <td class="align-middle">
                        <a href="<?= BASE_URL_ADMIN . '?act=form-sua-baiviet&id_bai_viet=' . $tk['id'] ?>" class="btn btn-warning"><i style="color: white;" class="fa-solid fa-hammer"></i></a>
                        <a class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="<?= BASE_URL_ADMIN . '?act=xoa-baiviet&id_bai_viet=' . $tk['id'] ?>"><i class="fa-solid fa-trash"></i></a>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Tiêu đề</th>
                    <th>Hình ảnh</th>
                    <th>Ngày đăng</th>
                    <th>Tác giả</th>
                    <th>Danh mục</th>
                 
                    <th>Lượt xem</th>
                    <th>Lượt bình luận</th>
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