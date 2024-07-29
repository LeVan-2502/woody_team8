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
                                    <h3 class="">Danh sách fedback</h3>
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
                                        <th>Email</th>
                                        <th>Ngày đăng</th>
                                        <th>Tiêu đề</th>
                                        <th>Nội dung</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listLienHe as $key => $lh) : ?>
                                        <tr>

                                            <td class="align-middle"><?= $key+1?></td>
                                            <td class="align-middle"><?= $lh['ho_ten'] ?></td>
                                            <td class="align-middle"><?= $lh['email'] ?></td>
                                            <td class="align-middle"><?= $lh['ngay_dang'] ?></td>
                                            <td class="align-middle"><?= $lh['tieu_de'] ?></td>
                                            <td class="align-middle"><?= $lh['noi_dung'] ?></td>
                                            <td class="align-middle">
                                            <a href="<?= BASE_URL_ADMIN . '?act=form-sua-taikhoan&id_tai_khoan=' . $tk['id'] ?>" class="btn btn-warning"><i style="color: white;" class="fa-solid fa-hammer"></i></a>
                                            <a class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="<?= BASE_URL_ADMIN . '?act=xoa-taikhoan&id_tai_khoan=' . $tk['id'] ?>"><i class="fa-solid fa-trash"></i></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>STT</th>
                                        <th>Họ tên</th>
                                        <th>Email</th>
                                        <th>Ngày đăng</th>
                                        <th>Tiêu đề</th>
                                        <th>Nội dung</th>
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