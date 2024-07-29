<style>
    body.hold-transition.login-page {
        background: url('https://images.unsplash.com/photo-1521747116042-5a810fda9664?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
        background-size: cover;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .modal-dialog {
        max-width: 75%;
        /* Thay đổi kích thước tối đa của modal */
    }

    .modal-content {
        border-radius: 0.375rem;
        /* Bo góc modal */
    }

    .modal-header,
    .modal-footer {
        background-color: #F4A24C;
        /* Màu nền cho header và footer của modal */
        color: ;
        /* Màu chữ cho header và footer của modal */
    }

    .modal-body {
        padding: 2rem;
        /* Thay đổi khoảng cách trong modal body */
    }

    .card {
        border: 1px solid #dee2e6;
        border-radius: 0.375rem;
        margin-bottom: 1rem;
        box-shadow: #6c757d;
    }

    .card-header {
        background-color: #027A76;
        /* Màu nền cho card-header */
        color: #fff;
        /* Màu chữ cho card-header */
        font-weight: bold;
    }

    .card-body {
        background-color: #fff;
        padding: 1.5rem;
    }

    .table img {
        max-width: 80px;
        /* Kích thước hình ảnh nhỏ hơn */
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
        border-color: #545b62;
    }

    .order-summary,
    .action-buttons {
        margin-top: 1.5rem;
    }
</style>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"> <!-- Sử dụng modal-lg để mở rộng kích thước modal -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Chi Tiết Đơn Hàng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">


                        <div class="row">
                            <!-- Thông tin đơn hàng -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        Thông tin đơn hàng
                                    </div>
                                    <div class="card-body">
                                        <p><strong>Số đơn hàng:</strong> #123456</p>
                                        <p><strong>Ngày đặt hàng:</strong> 25/07/2024</p>
                                        <p><strong>Tình trạng đơn hàng:</strong> Đang xử lý</p>
                                        <p><strong>Phương thức thanh toán:</strong> Thẻ tín dụng</p>
                                        <p><strong>Phương thức giao hàng:</strong> Giao hàng tận nơi</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Thông tin giao hàng -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        Thông tin giao hàng
                                    </div>
                                    <div class="card-body">
                                        <p><strong>Tên người nhận:</strong> Nguyễn Văn A</p>
                                        <p><strong>Địa chỉ giao hàng:</strong> 123 Đường ABC, Quận 1, TP. Hồ Chí Minh</p>
                                        <p><strong>Số điện thoại:</strong> 0912345678</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Danh sách sản phẩm -->
                        <div class="card">
                            <div class="card-header">
                                Danh sách sản phẩm
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Hình ảnh</th>
                                            <th scope="col">Tên sản phẩm</th>
                                            <th scope="col">Số lượng</th>
                                            <th scope="col">Đơn giá</th>
                                            <th scope="col">Tổng giá</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><img src="https://via.placeholder.com/100" alt="Sản phẩm 1"></td>
                                            <td>Sản phẩm 1</td>
                                            <td>2</td>
                                            <td>100,000 VNĐ</td>
                                            <td>200,000 VNĐ</td>
                                        </tr>
                                        <tr>
                                            <td><img src="https://via.placeholder.com/100" alt="Sản phẩm 2"></td>
                                            <td>Sản phẩm 2</td>
                                            <td>1</td>
                                            <td>150,000 VNĐ</td>
                                            <td>150,000 VNĐ</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <!-- Tổng cộng đơn hàng -->
                                <div class="order-summary text-right">
                                    <p><strong>Tổng giá sản phẩm:</strong> 350,000 VNĐ</p>
                                    <p><strong>Phí vận chuyển:</strong> 20,000 VNĐ</p>
                                    <p><strong>Tổng số tiền:</strong> 370,000 VNĐ</p>
                                </div>
                            </div>
                        </div>

                        <!-- Tùy chọn hành động -->
                      
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>