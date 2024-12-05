<?php include_once "view/admin/header.php" ?>

<div class="row2">
  <div class="row2 font_title">
    <h1>THÊM MỚI NGƯỜI DÙNG</h1>
  </div>
  <div class="row2 form_content ">
    <form action="index.php?pg=storeuser" method="POST" >
      <div class="row2 mb10 form_content_container">
        <label> Họ và tên </label> <br>
        <label for=""><input required type="text" name="ten"></label>
      </div>
      <div class="row2 mb10">
        <label>email</label> <br>
        <label for=""><input type="email" required name="email"></label>
      </div>
      <div class="row2 mb10 form_content_container">
        <label> Password</label> <br>
        <label for=""><input type="password" name="password"></label>
        <br>
      </div>
      <div class="row2 mb10 form_content_container">
        <label>Ngày tạo</label> <br>
        <label for=""><input type="datetime-local" name="ngayTao"></label>
        <br>
      </div>
      <div class="row2 mb10 form_content_container">
        <label>Ngày sửa</label> <br>
        <label for=""><input type="datetime-local" name="ngaySua"></label>
        <br>
      </div>
      <div class="row2 mb10 form_content_container">
        <label>Số điện thoại</label> <br>
        <label for=""><input type="number" name="soDienThoai"></label>
        <br>
      </div>
      <div class="row2 mb10 form_content_container">
        <label>Vai trò</label> <br>
        <label for=""><input type="number"  required min="0" max="1" step="1" name="role"></label>
        <br>
      </div>
      <div class="row mb10 ">
        <input class="mr20" type="submit" value="THÊM MỚI">
        <a href="index.php?pg=nguoidung"><input class="mr20" type="button" value="DANH SÁCH"></a>
      </div>
    </form>
  </div>
</div>

<?php include_once "view/admin/footer.php" ?>