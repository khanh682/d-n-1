<?php include "./view/client/header.php" ?>

<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="#">Home</a>
                <a class="breadcrumb-item text-dark" href="#">Shop</a>
                <span class="breadcrumb-item active">Checkout</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Checkout Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-8">
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">ĐỊA CHỈ THANH TOÁN</span></h5>
            <form action="index.php?pg=thanhtoan" method="POST">
                <?php
                // Khởi tạo biến tổng giá trị đơn hàng
                $tong = 0;

                // Kiểm tra giỏ hàng có sản phẩm không
                if (isset($_SESSION['giohang']) && count($_SESSION['giohang']) > 0) {
                    foreach ($_SESSION['giohang'] as $item) {
                        $tt = $item[3] * $item[4]; // Giá mỗi sản phẩm * số lượng
                        $tong += $tt; // Cộng tổng giá

                        // Thêm ID sản phẩm, số lượng, và giá vào form
                        echo '<input type="hidden" name="sanpham_id[]" value="' . $item[0] . '">'; // ID sản phẩm
                        echo '<input type="hidden" name="soluong[]" value="' . $item[4] . '">'; // Số lượng
                        echo '<input type="hidden" name="gia[]" value="' . $item[3] . '">'; // Giá sản phẩm
                    }
                }
                ?>
                <input type="hidden" name="tongGia" value="<?= $tong ?>">
                <input type="hidden" name="nguoiDung_id" value="<?php echo htmlspecialchars($_SESSION['email']['nguoiDung_id'] ?? ''); ?>">

                <!-- Các trường nhập liệu khác như tên, địa chỉ, email... -->
                <div class="bg-light p-30 mb-5">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Họ và Tên</label>
                            <input class="form-control" type="text" name="name" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Địa chỉ</label>
                            <input class="form-control" type="text" name="address" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="text" name="email" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Số di động</label>
                            <input class="form-control" type="text" name="tel" required>
                        </div>
                    </div>
                    <div class="mb-5">
                        <div class="bg-light p-30">
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="pttt" id="paypal" value="1" required>
                                    <label class="custom-control-label" for="paypal">Thanh toán khi nhận hàng</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="pttt" id="directcheck" value="2" required>
                                    <label class="custom-control-label" for="directcheck">Thanh toán chuyển khoản</label>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="pttt" id="banktransfer" value="3" required>
                                    <label class="custom-control-label" for="banktransfer">Thanh toán ví MoMo</label>
                                </div>
                            </div>
                            <input type="submit" name="thanhtoan" class="btn btn-block btn-primary font-weight-bold py-3" value="Thanh Toán">
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-lg-4">
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Chi Tiết Đặt Hàng</span></h5>
            <div class="bg-light p-30 mb-5">
                <div class="border-bottom">
                    <h6 class="mb-3">Sản Phẩm</h6>
                    <?php
                    // Hiển thị chi tiết sản phẩm trong giỏ hàng
                    if (isset($_SESSION['giohang']) && count($_SESSION['giohang']) > 0) {
                        $tong = 0;
                        foreach ($_SESSION['giohang'] as $item) {
                            $tt = $item[3] * $item[4]; // Tính tổng giá của sản phẩm
                            $tong += $tt;
                            echo '
                            <div class="d-flex justify-content-between">
                                <p>' . $item[2] . '</p>
                                <p> x' . $item[4] . '</p>
                                <p>$' . $item[3] . '</p>
                            </div>';
                        }
                        echo '
                        </div>
                        <div class="border-bottom pt-3 pb-2">
                            <div class="d-flex justify-content-between mb-3">
                                <h6>Tổng phụ</h6>
                                <h6>$' . $tong . '</h6>
                            </div>
                        </div>
                        <div class="pt-2">
                            <div class="d-flex justify-content-between mt-2">
                                <h5>Tổng</h5>
                                <h5>$' . $tong . '</h5>
                            </div>
                        </div>
                    </div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Checkout End -->

<?php include "./view/client/footer.php" ?>
