
<?php include "./view/client/header.php" ?>
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="index.php">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Shopping Cart</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Giá</th>
                            <th>SL</th>
                            <th>Tổng</th>
                            <th>Xoá</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                    <?php if((isset($_SESSION['giohang']))&&(count($_SESSION['giohang'])>0)){
                        $i=0;
                        $tong=0;
                        foreach ($_SESSION['giohang'] as $item){
                            $tt=$item[3] * $item[4];
                            $tong+=$tt;
                      echo '<tr>
                            <td class="align-middle">'.($i+1).'</td>
                            <td class="align-middle"><img src="'.$item[1].'" alt="" style="width: 50px;">'.$item[2].'</td>
                            <td class="align-middle">$'.$item[3].'</td>
                            <td class="align-middle">
                                '.$item[4].'
                            </td>
                            <td class="align-middle">$'.$tt.'</td>
                            <td class="align-middle"><a href="index.php?pg=delcart&i='.$i.'"><button class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button></a></td>
                        </tr>';
                        $i++;
                        }
                   echo '
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <form class="mb-30" action="">
                    <div class="input-group">
                        <input type="text" class="form-control border-0 p-4" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Apply Coupon</button>
                        </div>
                    </div>
                </form>
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Tổng cộng</h6>
                            <h6>$'.$tong.'</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">$10</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Tổng</h5>
                            <h5>$'.$tong.'</h5>
                        </div>
                         <a href="index.php?pg=checkout"><button class="btn btn-block btn-primary font-weight-bold my-3 py-3">Tiến Hành Thanh Toán</button></a>
                        <a href="index.php?pg=delcart">xoá giỏ hàng</a>
                    </div>
                </div>
            </div>'
        ;} ?>
        </div>
    </div>
    <!-- Cart End -->

    <?php include "./view/client/footer.php" ?>