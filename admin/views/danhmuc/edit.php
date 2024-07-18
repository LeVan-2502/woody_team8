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
                        <div class="card-header bg-primary">
                            <div class="row align-items-center">
                                <div class="col-11 ">
                                    <h3 class="align-middlecard-title">Cập nhật thông tin danh mục</h3>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="<?= BASE_URL_ADMIN ?>?act=sua-danhmuc" method="POST">
                                <input type="text" name="id" value="<?=$danhMuc['id']?>" hidden>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="ten_danh_muc">Tên danh mục</label>
                                        <input value="<?=$danhMuc['ten_danh_muc']?>" name ="ten_danh_muc" type="text" class="form-control" id="ten_danh_muc" placeholder="Nhập tên danh mục">
                                        <?php if(isset($errors['ten_danh_muc'])){?>
                                            <p class="text-danger"><?=$errors['ten_danh_muc']?></p>
                                        <?php }?>
                                    </div>
                                    <div class="form-group">
                                        <label for="mo_ta">Mô tả</label>
                                        <textarea name="mo_ta" type="password" class="form-control" id="mo_ta" placeholder="Nhập mô tả"><?=$danhMuc['mo_ta']?></textarea>
                                        <?php if(isset($errors['mo_ta'])){?>
                                            <p class="text-danger"><?=$errors['mo_ta']?></p>
                                        <?php }?>
                                    </div>
                                    
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>

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