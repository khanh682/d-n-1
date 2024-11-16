<?php include_once "view/admin/header.php" ?>

<div class="row2">
    <div class="row2 font_title">
        <h1>DANH SÁCH LOẠI HÀNG HÓA</h1>
    </div>
    <div class="row2 form_content ">
        <form action="#" method="POST">
            <div class="row2 mb10 formds_loai">
                <table>
                    <tr>
                        <th></th>
                        <th>MÃ LOẠI</th>
                        <th>TÊN LOẠI</th>
                        <th>HÌNH ẢNH</th>
                        <th>ẨN/HIỆN</th>
                    </tr>
                    <?php foreach($danhmucs as $danhmuc): ?>
                    <tr>
                        <td><input type="checkbox" name="" id=""></td>
                        <td><?= $danhmuc['madm'] ?></td>
                        <td><?= $danhmuc['tendm'] ?></td>
                        <td>
                            <img src="<?= $danhmuc['hinhanh'] ?>" width="66" alt="">
                        </td>
                        <td><?= $danhmuc['status'] ?></td>
                        <td><a style="color: black;" type="button" href="index.php?pg=edit&madm=<?= $danhmuc['madm'] ?>"><input class="mr20" type="button" value="Sửa"></a>
                        <?php if($danhmuc['status']==1): ?>
                         <a style="color: black;" type="button" href="index.php?pg=andm&action=an&madm=<?= $danhmuc['madm'] ?>"><input class="mr20" type="button" value="Ẩn"></a>
                        <?php else: ?>
                            <a style="color: black;" type="button" href="index.php?pg=andm&action=show&madm=<?= $danhmuc['madm'] ?>"><input class="mr20" type="button" value="Hiện"></a>
                         <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </table>
            </div>
            <div class="row mb10 ">
                <input class="mr20" type="button" value="CHỌN TẤT CẢ">
                <input class="mr20" type="button" value="BỎ CHỌN TẤT CẢ">
                <a href="index.php?pg=add"> <input class="mr20" type="button" value="NHẬP THÊM"></a>
            </div>
        </form>
    </div>
</div>



<?php include_once "view/admin/footer.php" ?>