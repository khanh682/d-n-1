<?php include_once "view/admin/header.php" ?>

<div class="row2">
  <div class="row2 font_title">
    <h1>EDIT USER</h1>
  </div>
  <div class="row2 form_content ">
    <form action="" method="POST">
    <div class="row2 mb10 form_content_container">
        <label>ID</label> <br>
        <label for=""><input required type="number" name="nguoiDung_id" value="<?= $nguoidung['nguoiDung_id']?>"></label>
      </div>
    <div class="row2 mb10 form_content_container">
        <label> Họ và tên </label> <br>
        <label for=""><input required type="text" name="ten" value="<?= $nguoidung['ten']?>"></label>
      </div>
      <div class="row2 mb10">
        <label>email</label> <br>
        <label for=""><input type="email" required name="email" value="<?= $nguoidung['email']?>"></label>
      </div>
      <div class="row2 mb10 form_content_container">
        <label> Password</label> <br>
        <label for=""><input type="password" name="password" value="<?= $nguoidung['password']?>"></label>
        <br>
      </div>
      <div class="row2 mb10 form_content_container">
        <label>Ngày tạo</label> <br>
        <label for=""><input type="datetime-local" name="ngayTao" value="<?= $nguoidung['ngayTao']?>"></label>
        <br>
      </div>
      <div class="row2 mb10 form_content_container">
        <label>Ngày sửa</label> <br>
        <label for=""><input type="datetime-local" name="ngaySua" value="<?= $nguoidung['ngaySua']?>"></label>
        <br>
      </div>
      <div class="row2 mb10 form_content_container">
        <label>Số điện thoại</label> <br>
        <label for=""><input type="number" name="soDienThoai" value="<?= $nguoidung['soDienThoai']?>"></label>
        <br>
      </div>
      <div class="row2 mb10 form_content_container">
        <label>Vai trò</label> <br>
        <label for=""><input type="number"  required min="0" max="1" step="1" name="role" value="<?= $nguoidung['role']?>"></label>
        <br>
      </div>
      <input type="hidden" name="nguoiDung_id" value="<?= $nguoidung['nguoiDung_id']?>">
      <div class="row mb10 ">
        <input class="mr20" type="submit" value="CẬP NHẬP">

        <a href="index.php?pg=nguoidung"><input class="mr20" type="button" value="DANH SÁCH"></a>
      </div>
    </form>
  </div>
</div>

<?php include_once "view/admin/footer.php" ?>