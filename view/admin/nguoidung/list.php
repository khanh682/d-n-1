<?php include_once "view/admin/header.php" ?>

<div class="row2">
            <div class="row2 font_title">
                <h1>DANH SÁCH NGƯỜI DÙNG</h1>
            </div>
            <div class="row2 form_content ">
                <form action="#" method="POST">
                    <div class="row2 mb10 formds_loai">
                        <table>
                            <tr>
                                <th>ID</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Date created</th>
                                <th>Modified date</th>
                                <th>Number Iphone</th>
                                <th>Role</th>
                                <th></th>
                            </tr>
                        <?php foreach($nguoidungs as $nguoidung): ?>
                            <tr>
                                <td><?= $nguoidung['nguoiDung_id'] ?></td>
                                <td><?= $nguoidung['ten'] ?></td>
                                <td><?= $nguoidung['email'] ?></td>
                                <td><?= $nguoidung['password'] ?></td>
                                <td><?= $nguoidung['ngayTao'] ?></td>
                                <td><?= $nguoidung['ngaySua'] ?></td>
                                <td><?= $nguoidung['soDienThoai'] ?></td>
                                <td><?= $nguoidung['role'] ?></td>
                                <td><a href="index.php?pg=edituser&nguoiDung_id=<?= $nguoidung['nguoiDung_id']?>"><input type="button" value="Sửa"></a> <a onclick="return confirm('bạn có muốn soá không')" href="index.php?pg=deleteuser&nguoiDung_id=<?= $nguoidung['nguoiDung_id']?>"><input type="button" value="Xóa"></a></td>
                            </tr>
                        <?php endforeach ?>
                        </table>
                    </div>
                    <div class="row mb10 ">
                        <input class="mr20" type="button" value="CHỌN TẤT CẢ">
                        <input class="mr20" type="button" value="BỎ CHỌN TẤT CẢ">
                        <a href="index.php?pg=adduser"> <input class="mr20" type="button" value="NHẬP THÊM"></a>
                    </div>
                </form>
            </div>
        </div>

<?php include_once "view/admin/footer.php" ?>