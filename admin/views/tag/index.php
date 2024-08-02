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
                <h3 class="">Danh sách Tag</h3>
                </div>
                <div class="col-2">
                <a href="<?= BASE_URL_ADMIN ?>?act=form-them-tag" class="btn btn-success ">Thêm mới tag</a>
                </div>
              </div>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Tên tag</th>
                    <th>Mô tả</th>
                    <th>Hành động</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($listTag as $key => $tag) : ?>
                    <tr>
                      <td class="align-middle"><?= $key + 1 ?></td>
                      <td class="align-middle"><?= $tag['ten_tag'] ?></td>
                      <td class="align-middle"><?= $tag['mo_ta'] ?></td>
                      <td class="align-middle">
                        <a title="Sửa tag" href="<?= BASE_URL_ADMIN . '?act=form-sua-tag&id_tag=' . $tag['id']?>" class="btn btn-warning"><i style="color: white;" class="fa-solid fa-hammer"></i></a>
                        <a title="Xóa tag" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="<?= BASE_URL_ADMIN . '?act=xoa-tag&id_tag=' . $tag['id']?>"><i class="fa-solid fa-trash"></i></a>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>STT</th>
                    <th>Tên tag</th>
                    <th>Mô tả</th>
                    <th>Hành động</th>

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