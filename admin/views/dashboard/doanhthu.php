<div class="row">
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3><?= isset($doanhThuNgay) ? number_format($doanhThuNgay) : '0' ?><small> VND</small></h3>

                <p>Doanh thu trong ngày hôm nay</p>
            </div>
            <div class="icon">
                <i class="fa-solid fa-calendar-days"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3><?= number_format($doanhThuTuan) ?><small> VND</small></h3>

                <p>Doanh thu tuần này</p>
            </div>
            <div class="icon">
                <i class="fa-solid fa-calendar-days"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3><?= number_format($doanhThuThang) ?><small> VND</small></h3>

                <p>Doanh thu trong tháng </p>
            </div>
            <div class="icon">
                <i class="fa-solid fa-calendar-days"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-primary">
            <div class="inner">
                <h3><?= number_format($tongDoanhThu) ?><small> VND</small></h3>

                <p>Tổng doanh thu</p>
            </div>
            <div class="icon">
                <i class="fa-solid fa-calendar-days"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <!-- ./col -->

</div>
<!-- <div class="row">
    <div class="col-8">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Biểu đồ so sánh doanh thu từng tháng trong năm 2023 và 2024</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="chart">
                    <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Lọc sản phẩm theo ngày tùy chọn</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <form method="GET" action="<?= BASE_URL_ADMIN ?>?act=loc-sanpham-theo-thoi-gian" class="row">
                    <div class="form-group col-6">
                        <label for="ngay_bat_dau">Ngày bắt đầu:</label>
                        <input type="date" name="ngay_bat_dau" id="ngay_bat_dau" class="form-control" value="<?= isset($_GET['ngay_bat_dau']) ? htmlspecialchars($_GET['ngay_bat_dau']) : '' ?>">
                    </div>
                    <div class="form-group col-6">
                        <label for="ngay_ket_thuc">Ngày kết thúc:</label>
                        <input type="date" name="ngay_ket_thuc" id="ngay_ket_thuc" class="form-control" value="<?= isset($_GET['ngay_ket_thuc']) ? htmlspecialchars($_GET['ngay_ket_thuc']) : '' ?>">
                    </div>
                    <button type="submit" class="btn btn-success col-12"> <h3><?= number_format($doanhThuThang) ?><small> VND</small></h3></button>
                    <button type="submit" class="btn btn-primary col-12 mt-2">Lọc sản phẩm</button>
                </form>

            </div>
        </div>
    </div>
</div> -->

<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-header bg-info">
                <div class="col-12">
                    <h3 class="">Thống kê doanh thu theo danh mục sản phẩm </h3>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead> 
                        <tr>
                            <th>STT</th>
                            <th>Tên danh mục</th>
                            <th>Số sản phẩm</th>
                            <th>Doanh thu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listDoanhThuDanhMuc as $key => $danhmuc) : ?>
                            <tr>
                                <td class="align-middle"><?= $key + 1 ?></td>
                                <td class="align-middle"><?= $danhmuc['ten_danh_muc'] ?></td>
                                <td class="align-middle"><?= $danhmuc['so_luong_san_pham'] ?></td>
                                <td class="align-middle"><strong><?= number_format($danhmuc['tong_doanh_thu']) ?></strong> VND</td>

                            </tr>
                        <?php endforeach ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>STT</th>
                            <th>Tên danh mục</th>
                            <th>Số sản phẩm</th>
                            <th>Doanh thu</th>

                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <div class="col-4">
        <?php
        // Lấy dữ liệu từ Controller
        $categoriesJson = json_encode($categories);
        $totalsJson = json_encode($totals);
        ?>
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Biểu đồ tròn doanh thu danh mục sản phẩm</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="chart">
                    <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card row">
    <div class="card-header bg-info">
        <div class="col-12">
            <h3 class="">Thống kê doanh thu theo danh mục sản phẩm </h3>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>ID sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Tổng số lượng đã bán</th>
                    <th>Tổng doanh thu sản phẩm</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($listSanPham as $key => $sanpham) : ?>
                    <tr>
                        <td class="align-middle"><?= $key + 1 ?></td>
                        <td class="align-middle"><?= $sanpham['id'] ?></td>
                        <td class="align-middle"><?= $sanpham['ten_san_pham'] ?></td>
                        <td class="align-middle"><?= $sanpham['tong_so_luong'] ?></td>
                        <td class="align-middle"><strong><?= number_format($sanpham['tong_doanh_thu']) ?></strong> VND</td>
                    </tr>
                <?php endforeach ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>STT</th>
                    <th>ID sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Tổng số lượng đã bán</th>
                    <th>Tổng doanh thu sản phẩm</th>

                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
</div>