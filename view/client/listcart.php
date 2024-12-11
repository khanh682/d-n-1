<?php include "./view/client/header.php" ?>
<style>
    .nav-link.active {
        background-color: #007bff; 
        color: white;
    }
</style>

<!-- Start Banner -->
<div class="container my-5 p-4 bg-white rounded border shadow-sm" style="max-width: 1020px;">
    <div class="bg-light py-3 text-center rounded-top">
        <h4 class="m-0">Đơn hàng của bạn</h4>
    </div>
    <!-- Danh sách đơn hàng -->
    <div class="container my-4">
    <div class="card bg-light">
        <div class="card-body p-3">
        </div>
    </div>
</div>


    <?php if (!empty($listcarts)) : ?>
        <table class="table table-bordered table-hover table-striped mt-4">
            <thead class="table-dark text-center">
                <tr>
                    <th>STT</th>
                    <th>Mã đơn hàng</th>
                    <th>Tổng tiền</th>
                    <th>Tên</th>
                    <th>Ngày tạo</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listcarts as $key => $listcart) : ?>
                    <tr>
                        <td class="text-center align-middle"><?php echo ++$key; ?></td>
                        <td class="text-center align-middle"><?php echo htmlspecialchars($listcart['madh']); ?></td>
                        <td class="text-end align-middle"><?php echo number_format($listcart['tongGia']); ?>đ</td>
                        <td class="text-center align-middle"><?php echo htmlspecialchars($listcart['name']); ?></td>
                        <td class="text-center align-middle"><?php echo htmlspecialchars($listcart['ngayTao']); ?></td>
                        <td class="text-center align-middle"><?php echo htmlspecialchars($listcart['status']); ?></td>
                        <td class="text-center align-middle">
                            <a href="./?pg=detailcart&id=<?php echo htmlspecialchars($listcart['donHang_id']); ?>" class="btn btn-info" style="width:70px">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <!-- Thông báo nếu không có đơn hàng -->
        <div class="text-center my-4">
            <p class="text-muted">Không có đơn hàng nào!</p>
        </div>
    <?php endif; ?>

    <!-- Nút quay về trang chủ -->
    <div class="text-center mt-4">
        <a href="./?act=/" class="btn btn-outline-primary" style="color: black;">
            <i class="fa-solid fa-home"></i> Về trang chủ 
        </a>
    </div>
</div>

<?php include "./view/client/footer.php" ?>