<?php include_once "view/admin/header.php" ?>

<div class="container mt-4">
    <div class="row mb-4">
        <div class="col-12 text-center">
            <h1>CHI TIẾT ĐƠN HÀNG</h1>
        </div>
    </div>
    
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Order ID</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>Product Name</th>
                            <th>Product Image</th> <!-- Added Product Image Column -->
                            <th>Status</th>
                            <th>Update Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($donHangDetail as $order) {
                            echo "<tr>";
                            echo "<td>" . $order["madh"] . "</td>";
                            echo "<td>" . $order["name"] . "</td>";
                            echo "<td>" . $order["address"] . "</td>";
                            echo "<td>" . $order["email"] . "</td>";
                            echo "<td>" . $order["tel"] . "</td>";
                            echo "<td>" . $order["madh"] . "</td>";
                            echo "<td>" . $order["soLuong"] . "</td>";
                            echo "<td>" . $order["gia"] . "</td>";
                            echo "<td>" . $order["thanhTien"] . "</td>";
                            echo "<td>" . $order["ten"] . "</td>";
                            echo "<td><img src='" . $order["anh"] . "' alt='Product Image' style='width: 100px; height: auto;'></td>";
                            
                            // Form to update status
                            echo "<td>
                            <form action='?pg=updateStatus' method='post'>
                                <input type='hidden' name='idDonHang' value='" . $order['donHang_id'] . "'>
                                <select name='status' class='form-select'>
                                    <option value='Chờ vận chuyển'>Chờ vận chuyển</option>
                                    <option value='Đang giao'>Đang giao</option>
                                    <option value='Đã giao'>Đã giao</option>
                                </select>
                            </td>";
                    echo "<td><button type='submit' class='btn btn-success' name='update_status' value='" . $order["madh"] . "'>Update</button></form></td>";
                    echo "</tr>";
                    
                        }
                        ?>
                        <tr>
                            <td colspan="13" class="text-center">Không có dữ liệu.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12 text-center">
            <a href="index.php?pg=addsp" class="btn btn-primary">NHẬP THÊM</a>
        </div>
    </div>
</div>

<?php include_once "view/admin/footer.php" ?>
