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
                <h2 class="">Danh sách bình luận sản phẩm</h2> <h2><span class="badge badge-primary"><?=$sanPham['ten_san_pham']?></span></h2>
                </div>
              </div>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Sản phẩm</th>
                    <th>Tên người bình luận</th>
                    <th>Nội dung</th>
                    <th>Ngày đăng</th>
                    <th>Trang thái</th>
                    
                  </tr>
                </thead>
                <tbody>
                  
                  <?php foreach ($listBinhLuan as $key => $binhluan) : ?>
                    <tr>
                      <td class="align-middle"><?= $key + 1 ?></td>
                      <td class="align-middle"><?= $binhluan['ten_san_pham'] ?></td>
                      <td class="align-middle"><?= $binhluan['ho_ten'] ?></td>
                      <td class="align-middle"><?= $binhluan['ngay_dang'] ?></td>
                      <td class="align-middle"><?= $binhluan['noi_dung'] ?></td>
                      <td  class="align-middle"><?= $binhluan['trang_thai'] ==1 ? '<span class="badge badge-success" >Hiển thị</span>' : '<span class="badge badge-danger" >Ẩn</span>'?></td>
                      <td class="align-middle">
                        <a title="Thay đổi trạng thái" href="<?= BASE_URL_ADMIN . '?act=sua-chitietbinhluan&id_binh_luan=' . $binhluan['id']?>" class="btn btn-warning"><i style="color: white;" class="fa-solid fa-repeat"></i></a>
                        <a title="Xóa bình luận"  class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="<?= BASE_URL_ADMIN . '?act=xoa-binhluan&id_binh_luan=' . $binhluan['id']?>"><i class="fa-solid fa-trash"></i></a>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>STT</th>
                    <th>Sản phẩm</th>
                    <th>Tên người bình luận</th>
                    <th>Nội dung</th>
                    <th>Ngày đăng</th>
                    <th>Trang thái</th>
                    
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