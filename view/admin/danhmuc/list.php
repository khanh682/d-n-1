<?php include_once "view/admin/header.php" ?>

<div class="row2">
    <div class="row2 font_title">
        <h1>DANH SÁCH LOẠI HÀNG HÓA</h1>
    </div>
    <div class="row2 form_content ">
        <form action="index.php?pg=delete" method="POST" id="deleteForm">
            <div class="row2 mb10 formds_loai">
                <table>
                    <tr>
                        <th></th>
                        <th>MÃ LOẠI</th>
                        <th>TÊN LOẠI</th>
                        <th>HÌNH ẢNH</th>
                        <th>ẨN/HIỆN</th>
                    </tr>
                    <?php foreach ($danhmucs as $danhmuc): ?>
                        <tr>
                            <td><input type="checkbox" name="madm[]" value="<?= $danhmuc['madm'] ?>"></td>
                            <td><?= $danhmuc['madm'] ?></td>
                            <td><?= $danhmuc['tendm'] ?></td>
                            <td>
                                <img src="<?= $danhmuc['hinhanh'] ?>" width="66"  alt="">
                            </td>
                            <td><?= $danhmuc['status'] ?></td>
                            <td><a style="color: black;" type="button" href="index.php?pg=edit&madm=<?= $danhmuc['madm'] ?>"><input class="mr20" type="button" value="Sửa"></a>
                                <?php if ($danhmuc['status'] == 1): ?>
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
                <input class="mr20" type="button" id="selectAllButton" value="CHỌN TẤT CẢ">
                <input class="mr20" type="button" id="deselectAllButton" value="BỎ CHỌN TẤT CẢ">
                <input class="mr20" type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" value="XOÁ">
                <a href="index.php?pg=add"> <input class="mr20" type="button" value="NHẬP THÊM"></a>
            </div>
        </form>
        <script>
            // JavaScript để xử lý checkbox

            document.getElementById('selectAllButton').addEventListener('click', function() {
                const checkboxes = document.querySelectorAll('input[name="madm[]"]');
                checkboxes.forEach(checkbox => checkbox.checked = true);
            });

            document.getElementById('deselectAllButton').addEventListener('click', function() {
                const checkboxes = document.querySelectorAll('input[name="madm[]"]');
                checkboxes.forEach(checkbox => checkbox.checked = false);
            });
        </script>
    </div>
</div>



<?php include_once "view/admin/footer.php" ?>