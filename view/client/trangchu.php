<?php include "./view/client/header.php" ?>
<!-- Carousel Start -->
<div class="container-fluid mb-3">
    <div class="row px-xl-5">
        <div class="col-lg-8">
            <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#header-carousel" data-slide-to="1"></li>
                    <li data-target="#header-carousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item position-relative active" style="height: 430px;">
                        <img class="position-absolute w-100 h-100" src="./assets/img/carousel-1.jpg" style="object-fit: cover;">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Men Fashion</h1>
                                <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Lorem rebum magna amet lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam</p>
                                <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item position-relative" style="height: 430px;">
                        <img class="position-absolute w-100 h-100" src="./assets/img/carousel-2.jpg" style="object-fit: cover;">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Women Fashion</h1>
                                <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Lorem rebum magna amet lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam</p>
                                <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item position-relative" style="height: 430px;">
                        <img class="position-absolute w-100 h-100" src="./assets/img/carousel-3.jpg" style="object-fit: cover;">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Kids Fashion</h1>
                                <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Lorem rebum magna amet lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam</p>
                                <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="product-offer mb-30" style="height: 200px;">
                <img class="img-fluid" src="./assets/img/offer-1.jpg" alt="">
                <div class="offer-text">
                    <h6 class="text-white text-uppercase">Tiếp kiệm 20%</h6>
                    <h3 class="text-white mb-3">Khuyến mãi đặc biệt</h3>
                    <a href="" class="btn btn-primary">Mua ngay</a>
                </div>
            </div>
            <div class="product-offer mb-30" style="height: 200px;">
                <img class="img-fluid" src="./assets/img/offer-2.jpg" alt="">
                <div class="offer-text">
                    <h6 class="text-white text-uppercase">Tiếp kiệm 20%</h6>
                    <h3 class="text-white mb-3">Khuyến mãi đặc biệt</h3>
                    <a href="" class="btn btn-primary">Mua ngay</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Carousel End -->


<!-- Featured Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5 pb-3">
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">Sản phẩm chất lượng</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                <h5 class="font-weight-semi-bold m-0">Miễn phí vận chuyển</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0"> Trả hàng trong vòng 14 ngày</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">Hỗ trợ 24/7</h5>
            </div>
        </div>
    </div>
</div>
<!-- Featured End -->


<!-- Categories Start -->
<div class="container-fluid pt-5">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">THỂ LOẠI</span></h2>
    <div class="row px-xl-5 pb-3">
        <?php foreach ($danhmucs as $danhmuc): ?>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="">
                    <div class="cat-item d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid" src="<?= $danhmuc['hinhanh'] ?>" alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6><?= $danhmuc['tendm'] ?></h6>
                            <small class="text-body"><?= $danhmuc['tong_soluong'] ?></small>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach ?>

    </div>
</div>
<!-- Categories End -->


<!-- Products Start -->
<div class="container-fluid pt-5 pb-3">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">SẢN PHẨM ƯU THÍCH</span></h2>
    <div class="row px-xl-5">
        <?php foreach ($ViewedProducts as $sanpham): ?>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <form action="index.php?pg=addcart" method="POST">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="<?= $sanpham['anh'] ?>" alt="">
                            <div class="product-action">
                                <!-- <input type="submit" name="addtocart"> -->
                                <a href="" class="btn btn-outline-dark btn-square">
                                <input type="submit" name="addtocart" class="btn btn-outline-dark btn-square" value="&#xf07a;" style="font-family: 'Font Awesome 5 Free'; font-weight: 900;">

                                </a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                <a class="btn btn-outline-dark btn-square" href="index.php?pg=detail1&sanPham_id=<?= $sanpham['sanPham_id'] ?>"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; white-space: normal; word-wrap: break-word;" href=""><?= $sanpham['ten'] ?></a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5>$<?= $sanpham['gia'] ?></h5>
                                <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                            </div>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small>(99)</small>
                            </div>
                        </div>
                        <input type="hidden" value="<?= $sanpham['sanPham_id'] ?>" name="sanPham_id">
                        <input type="hidden" value="<?= $sanpham['anh'] ?>" name="anh">
                        <input type="hidden" value="<?= $sanpham['ten'] ?>" name="ten">
                        <input type="hidden" value="<?= $sanpham['gia'] ?>" name="gia">
                    </form>
                </div>
            </div>
        <?php endforeach ?>

    </div>
</div>
<!-- Products End -->


<!-- Offer Start -->
<div class="container-fluid pt-5 pb-3">
    <div class="row px-xl-5">
        <div class="col-md-6">
            <div class="product-offer mb-30" style="height: 300px;">
                <img class="img-fluid" src="./assets/img/offer-1.jpg" alt="">
                <div class="offer-text">
                    <h6 class="text-white text-uppercase">TIẾP KIỆM</h6>
                    <h3 class="text-white mb-3">Khuyến mãi đặc biệt</h3>
                    <a href="" class="btn btn-primary">Mua ngay</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="product-offer mb-30" style="height: 300px;">
                <img class="img-fluid" src="./assets/img/offer-2.jpg" alt="">
                <div class="offer-text">
                    <h6 class="text-white text-uppercase">TIẾP KIỆM</h6>
                    <h3 class="text-white mb-3">Khuyến mãi đặc biệt</h3>
                    <a href="" class="btn btn-primary">Mua ngay</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Offer End -->


<!-- Products Start -->
<div class="container-fluid pt-5 pb-3">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">SẢN PHẨM GẦN ĐÂY</span></h2>
    <div class="row px-xl-5">
        
        <?php foreach ($sanphams as $sanpham): ?>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                <form action="index.php?pg=addcart" method="POST">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="<?= $sanpham['anh'] ?>" alt="">
                        <div class="product-action">
                        <a href="" class="btn btn-outline-dark btn-square">
                                <input type="submit" name="addtocart" class="btn btn-outline-dark btn-square" value="&#xf07a;" style="font-family: 'Font Awesome 5 Free'; font-weight: 900;">

                                </a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                            <a class="btn btn-outline-dark btn-square" href="index.php?pg=detail1&sanPham_id=<?= $sanpham['sanPham_id'] ?>"><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; white-space: normal; word-wrap: break-word;">
                            <?= $sanpham['ten'] ?>
                        </a>

                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>$<?= $sanpham['gia'] ?></h5>
                            <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small>(99)</small>
                        </div>
                    </div>
                    <input type="hidden" value="<?= $sanpham['sanPham_id'] ?>" name="sanPham_id">
                        <input type="hidden" value="<?= $sanpham['anh'] ?>" name="anh">
                        <input type="hidden" value="<?= $sanpham['ten'] ?>" name="ten">
                        <input type="hidden" value="<?= $sanpham['gia'] ?>" name="gia">
                    </form>
                </div>
            </div>
        <?php endforeach ?>

    </div>
</div>
<!-- Products End -->


<!-- Vendor Start -->

<!-- Vendor End -->



<?php include "./view/client/footer.php" ?>