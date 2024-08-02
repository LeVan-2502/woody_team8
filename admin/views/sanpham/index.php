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
                <div class="col-8">
                  <h3 class="">Danh sách sản phẩm</h3>
                </div>
                <div class="col-2">
                  <form method="POST" action="<?= BASE_URL_ADMIN ?>?act=loc-sanpham">
                    <select name="danh_muc_id" class="form-control" onchange="this.form.submit()">
                      <option value="">Tất cả danh mục</option>
                      <?php foreach ($listDanhMuc as $danhMuc) : ?>
                        <option value="<?= $danhMuc['id'] ?>" <?= isset($_GET['danh_muc_id']) && $_GET['danh_muc_id'] == $danhMuc['id'] ? 'selected' : '' ?>>
                          <?= $danhMuc['ten_danh_muc'] ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                  </form>
                </div>

                <div class="col-2">
                  <a href="<?= BASE_URL_ADMIN ?>?act=form-them-sanpham" class="btn btn-success ">Thêm mới sản phẩm</a>
                </div>
              </div>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>

                    <th>ID</th>
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Danh mục</th>
                    <th>Giá sản phẩm</th>
                    <th>Ngày nhập</th>
                    <th>Hàng tồn kho</th>
                    <th>Trạng thái</th>

                    <th>Action</th>

                  </tr>

                </thead>
                <tbody>
                  <?php foreach ($listSanPham as $sanpham) : ?>
                    <tr>

                      <td class="align-middle"><?= $sanpham['id'] ?></td>
                      <td class="align-middle text-center">
                        <img width="100px" src="<?= BASE_URL . $sanpham['hinh_anh'] ?>" alt="">
                      </td>
                      <td class="align-middle"><?= $sanpham['ten_san_pham'] ?></td>
                      <td class="align-middle"><?= $sanpham['ten_danh_muc'] ?></td>
                      <td class="align-middle"><?= $sanpham['gia_san_pham'] ?></td>
                      <td class="align-middle"><?= $sanpham['ngay_nhap'] ?></td>
                      <td class="align-middle"><?= $sanpham['so_luong'] ?></td>
                      <td class="align-middle"><?= $sanpham['trang_thai'] == 1 ? 'Còn bán' : 'Dừng bán' ?></td>
                      <td class="align-middle">
                        <a title="Sửa thông tin" href="<?= BASE_URL_ADMIN . '?act=form-sua-sanpham&id_san_pham=' . $sanpham['id'] ?>" class="btn btn-warning"><i style="color: white;" class="fa-solid fa-hammer"></i></a>
                        <a title="Xóa thông tin"  class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="<?= BASE_URL_ADMIN . '?act=xoa-sanpham&id_san_pham=' . $sanpham['id'] ?>"><i class="fa-solid fa-trash"></i></a>
                        <a title="Bình luận sản phẩm"  href="<?= BASE_URL_ADMIN . '?act=binhluan&id_san_pham=' . $sanpham['id'] ?>" class="btn btn-info"><i class="fa-solid fa-comment"></i></a>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Danh mục</th>
                    <th>Giá sản phẩm</th>
                    <th>Ngày nhập</th>
                    <th>Hàng tồn kho</th>
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