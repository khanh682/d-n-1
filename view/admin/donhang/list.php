<?php include_once "view/admin/header.php" ?>

<div class="row2">
    <div class="row2 font_title">
        <h1>ĐƠN HÀNG</h1>
    </div>
    <div class="row2 form_content ">
        <form action="#" method="POST">
            <div class="row2 mb10 formds_loai">
                <table>
                    <tr>
                        <th>ID</th>
                        <th>MÃ ĐH</th>
                        <th>TỔNG GIÁ</th>
                        <th>NAME</th>
                        <th>ADDRESS</th>
                        <th>EMAIL</th>
                        <th>TEL</th>
                        <th>ID USER</th>
                        <th>TRẠNG THÁI</th>
                        <th>TIME</th>
                        <th>Hành động</th>
                    </tr>
                    <?php foreach ($donhangs as $donhang): ?>
                        <tr>
                            <td><?= $donhang['donHang_id'] ?></td>
                            <td><?= $donhang['madh'] ?></td>
                            <td><?= $donhang['tongGia'] ?></td>
                            <td><?= $donhang['name'] ?></td>
                            <td><?= $donhang['address'] ?></td>
                            <td><?= $donhang['email'] ?></td>
                            <td><?= $donhang['tel'] ?></td>
                            <td><?= $donhang['nguoiDung_id'] ?></td>
                            <td><?= $donhang['status'] ?></td>
                            <td><?= $donhang['ngayTao'] ?></td>
                            <td class="text-center align-middle">
                            <a href="./?pg=detailCart&id=<?php echo htmlspecialchars($donhang['donHang_id']); ?>" class="btn btn-info" style="width:70px">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                        </td>
                        </tr>
                    <?php endforeach ?>
                </table>
            </div>
            <div class="row mb10 ">
                <a href="index.php?pg=addsp"> <input class="mr20" type="button" value="NHẬP THÊM"></a>
            </div>
        </form>
    </div>
</div>

<?php include_once "view/admin/footer.php" ?>