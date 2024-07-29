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
                                    <h3 class="align-middlecard-title">Cập nhật thông tin tag</h3>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="<?= BASE_URL_ADMIN ?>?act=sua-tag" method="POST">
                                <input type="text" name="id" value="<?=$Tag['id']?>" hidden>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="ten_tag">Tên tag</label>
                                        <input value="<?=$Tag['ten_tag']?>" name ="ten_tag" type="text" class="form-control" id="ten_tag" placeholder="Nhập tên tag">
                                        <?php if(isset($_SESSION['errors']['ten_tag'])){?>
                                            <p class="text-danger"><?=$_SESSION['errors']['ten_tag']?></p>
                                        <?php }?>
                                    </div>
                                    <div class="form-group">
                                        <label for="mo_ta">Mô tả</label>
                                        <textarea name="mo_ta" type="text" class="form-control" id="mo_ta" placeholder="Nhập mô tả"><?=$Tag['mo_ta']?></textarea>
                                        <?php if(isset($_SESSION['errors']['mo_ta'])){?>
                                            <p class="text-danger"><?=$_SESSION['errors']['mo_ta']?></p>
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