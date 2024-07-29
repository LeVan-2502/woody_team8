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
                                    <h class="card-title align-middlecard-title">Sửa chương trình khuyến mãi</h6>
                                </div>
                                <div class="col-1">

                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <!-- /.card-header -->
                            <!-- form start -->
                            <form enctype="multipart/form-data" action="<?= BASE_URL_ADMIN ?>?act=sua-khuyenmai" method="POST">
                                <input value="<?=$khuyenMai['id']?>" type="hidden" name="id_khuyen_mai">
                                <div class="card-body row">
                                    <div class="form-group col-12">
                                        <label for="ten_khuyen_mai">Tên khuyến mãi</label>
                                        <input value="<?=$khuyenMai['ten_khuyen_mai']?>" name="ten_khuyen_mai" type="text" class="form-control" id="ten_khuyen_mai" placeholder="Nhập tên chương trình khuyến mãi">
                                        <?php if (isset($_SESSION['errors']['ten_khuyen_mai'])) { ?>
                                            <p class="text-danger"><?= $_SESSION['errors']['ten_khuyen_mai'] ?></p>
                                        <?php } ?>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="">Giá trị</label>
                                        <input  value="<?=$khuyenMai['gia_tri']?>" name="gia_tri" type="number" class="form-control" id="gia_tri" placeholder="Nhập giá trị">
                                        <?php if (isset($_SESSION['errors']['gia_tri'])) { ?>
                                            <p class="text-danger"><?= $_SESSION['errors']['gia_tri'] ?></p>
                                        <?php } ?>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="">Ngày bắt đầu</label>
                                        <input  value="<?=$khuyenMai['ngay_bat_dau']?>" name="ngay_bat_dau" type="date" class="form-control" id="ngay_bat_dau" placeholder="Ngày bắt đầu">
                                        <?php if (isset($_SESSION['errors']['ngay_bat_dau'])) { ?>
                                            <p class="text-danger"><?= $_SESSION['errors']['ngay_bat_dau'] ?></p>
                                        <?php } ?>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="">Ngày kết thúc</label>
                                        <input  value="<?=$khuyenMai['ngay_ket_thuc']?>" name="ngay_ket_thuc" type="date" class="form-control" id="ngay_ket_thuc" placeholder="Ngày kết thúc">
                                        <?php if (isset($_SESSION['errors']['ngay_ket_thuc'])) { ?>
                                            <p class="text-danger"><?= $_SESSION['errors']['ngay_ket_thuc'] ?></p>
                                        <?php } ?>
                                    </div>
                                    
                                    <div class="form-group col-6">
                                        <label for="">Trạng thái</label>
                                        <select name="trang_thai" id="trang_thai" class="form-control">
                                            <option selected disabled value="">Trạng thái hoạt động</option>
                                            <option value="1" <?=$khuyenMai['trang_thai']==1 ? 'selected' : ''?>>Đang diễn ra</option>
                                            <option value="2" <?=$khuyenMai['trang_thai']==0 ? 'selected' : ''?>>Đã kết thúc</option>
                                        </select>
                                        <?php if (isset($_SESSION['errors']['trang_thai'])) { ?>
                                            <p class="text-danger"><?= $_SESSION['errors']['trang_thai'] ?></p>
                                        <?php } ?>
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