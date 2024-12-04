<?php include_once "view/admin/header.php" ?>

<div class="row2">
    <div class="row2 font_title">
        <h1>SẢN PHẨM HÀNG HÓA</h1>
    </div>
    <div class="row2 form_content ">
        <form action="#" method="POST">
            <div class="row2 mb10 formds_loai">
                <table>
                    <tr>
                        <th>ID</th>
                        <th>TÊN SP</th>
                        <th>MÔ TẢ</th>
                        <th>GIÁ</th>
                        <th>SL</th>
                        <th>SIZE</th>
                        <th>COLOR</th>
                        <th>HÌNH ẢNH</th>
                        <th>ID DM</th>
                        <th>ẨN/HIỆN</th>
                        <th>LƯỢT XEM</th>
                    </tr>
                    <?php foreach ($sanphams as $sanpham): ?>
                        <tr>
                            <td><?= $sanpham['sanPham_id'] ?></td>
                            <td><?= $sanpham['ten'] ?></td>
                            <td><?= $sanpham['moTa'] ?></td>
                            <td><?= $sanpham['gia'] ?></td>
                            <td><?= $sanpham['soLuong'] ?></td>
                            <td><?= $sanpham['kichCo'] ?></td>
                            <td><?= $sanpham['mauSac'] ?></td>
                            <td>
                                <img src="<?= $sanpham['anh'] ?>" width="66" alt="">
                            </td>
                            <td><?= $sanpham['madm'] ?></td>
                            <td><?= $sanpham['status'] ?></td>
                            <td><?= $sanpham['luotxem'] ?></td>
                            <td><a href="index.php?pg=editsp&sanPham_id=<?= $sanpham['sanPham_id'] ?>" type="button"><input class="mr20" type="button" value="Sửa"></a>

                                <?php if ($sanpham['status'] == 1): ?>
                                    <a style="color: black;" type="button" href="index.php?pg=ansp&action=an&sanPham_id=<?= $sanpham['sanPham_id'] ?>">
                                        <input class="mr20" type="button" value="Ẩn">
                                    </a>
                                <?php else: ?>
                                    <a style="color: black;" type="button" href="index.php?pg=ansp&action=show&sanPham_id=<?= $sanpham['sanPham_id'] ?>">
                                        <input class="mr20" type="button" value="Hiện">
                                    </a>

                                <?php endif; ?>

                                <a onclick="return confirm('Bạn có muốn xoá không?')" href="index.php?pg=deletesp&sanPham_id=<?= $sanpham['sanPham_id'] ?>" type="button"><input class="mr20" type="button" value="Xoá"></a>
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