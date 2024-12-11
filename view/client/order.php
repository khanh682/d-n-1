
<?php include "./view/client/header.php" ?>
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="index.php">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Đơn Hàng</span>
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
        
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                    <?php
                //     if(isset($_SESSION['iddh'])&&($_SESSION['iddh']>0)){
                //    $getshowcart = getshowcart($_SESSION['iddh']);
                        
                //     if((isset($getshowcart))&&(count($getshowcart)>0)){
                //         $i=0;
                //         $tong=0;
                //         foreach ($getshowcart as $item){
                //             $tt=$item['soluong'] * $item['dongia'];
                //             $tong+=$tt;
                //       echo '<tr>
                //             <td class="align-middle">'.($i+1).'</td>
                //             <td class="align-middle"><img src="'.$item['anh'].'" alt="" style="width: 50px;">'.$item['ten'].'</td>
                //             <td class="align-middle">$'.$item['dongia'].'</td>
                //             <td class="align-middle">
                //                 '.$item['soluong'].'
                //             </td>
                //             <td class="align-middle">$'.$tt.'</td>
                           
                //         </tr>';
                //         $i++;
                //         }
                //     }else{
                //         echo "Giỏ hàng  rỗng. <a href='index.php'> Tiếp tục đặt hàng</a> ";
                //     }
                //    echo '
                //   <tr>
                //   <td class="align-middle">
                //   <h6>Tổng</h6>
                //   </td>
                //     <td class="align-middle">
                //   </td>
                //   <td class="align-middle">
                //   </td>
                //   <td class="align-middle">
                //   </td>
                //   <td class="align-middle">
                //   $'.$tong.'
            //       </td>
            //       </tr>
            //         </tbody>
            //     </table>
            // </div>'
            //  ;} ?>
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Đơn Hàng</span></h5>
                <div class="bg-light p-30 mb-5">
                 
                    <div class="border-bottom pb-2">
                    <?php
                //       if(isset($_SESSION['iddh'])&&($_SESSION['iddh']>0)){
                //         $orderinfo = getorderinfo($_SESSION['iddh']);
                //         if(count($orderinfo)>0){
                //     ?>
                <!-- //         <div class="d-flex justify-content-between mb-3">
                //         <div class="row">
                //             <table>
                //                 <tr>
                //                 <tr><td>Mã Đơn Hàng: <?= $orderinfo[0]['madh'] ?></td></tr>
                //                 <tr><td>Họ và Tên: <?= $orderinfo[0]['name'] ?></td></tr>
                           
                    
                //                 <tr><td>Địa chỉ: <?= $orderinfo[0]['address'] ?></td></tr>
                   
                //                 <tr> <td>E-mail: <?= $orderinfo[0]['email'] ?></td></tr>
            
                        
                //                 <tr><td>Số di động: <?= $orderinfo[0]['tel'] ?></td></tr>
                        
                //                 <tr><td>Phương thức thanh toán: <br> -->
                //                 <?php
                //                switch ($orderinfo[0]['pttt']){
                //                 case '1';
                //                 $txtmess="Thanh toán khi nhận hàng";
                //                 break;
                //                 case '2';
                //                 $txtmess="Thanh toán chuyển khoản";
                //                 break;
                //                 case '3';
                //                 $txtmess="Thanh toán ví MoMo";
                //                 break;
                //                 default:
                //                 $txtmess="Quý khách chưa chọn phương thức thanh toán";
                //                 break;
                //                }
                //                echo $txtmess;
                //             ?>
                <!-- //             </td></tr>
                          
                //             </table>
                //         </div>
                //     </div>
                //         </div>
            
                   <?php //  }} ?> 
                </div>
            </div>
        </div>
       
    </div>
    <!-- Cart End -->

    <?php include "./view/client/footer.php" ?>