<?php include_once "view/admin/header.php" ?>

<div class="row2">
      <div class="row2 font_title">
        <h1>THÊM MỚI SẢN PHẨM</h1>
      </div>
      <div class="row2 form_content ">
        <form action="index.php?pg=storee" method="POST" enctype="multipart/form-data">
          <div class="row2 mb10 form_content_container">
            <label> Tên Sản Phẩm </label> <br>
            <input type="text" required name="ten">
          </div>
          <div class="row2 mb10">
            <label>Mô Tả </label> <br>
            <label for=""><input required type="text" name="moTa"></label>
          </div>
          <div class="row2 mb10">
            <label>Giá </label> <br>
            <label for=""><input required type="number" name="gia"></label>
          </div>
          <div class="row2 mb10">
            <label>Số Lượng </label> <br>
            <label for=""><input required type="number" name="soLuong"></label>
          </div>
          <div class="row2 mb10">
            <label>Size </label> <br>
            <input type="text" required name="kichCo">
          </div>
          <div class="row2 mb10">
            <label>Coler</label> <br>
            <input type="text" required name="mauSac">
          </div>
          <div class="row2 mb10">
            <label>Ngày Tạo</label> <br>
            <label for=""><input required type="date" name="ngayTao"></label>
          </div>
          <div class="row2 mb10">
            <label>Ngày Sửa</label> <br>
            <label for=""><input required type="date" name="ngaySua"></label>
          </div>
          <div class="row2 mb10">
            <label>Ảnh</label> <br>
            <label for=""><input type="file" name="anh"></label>
          </div>
          <div class="row2 mb10">
            <label>ID Danh Mục</label> <br>
            <label for=""><input required type="number" name="madm"></label> <br> 
          </div>
          <div class="row mb10 ">
            <input class="mr20" type="submit" value="THÊM MỚI">

            <a href="index.php?pg=sanpham&action=listt"><input class="mr20" type="button" value="DANH SÁCH"></a>
          </div>

        </form>
      </div>
    </div>

<?php include_once "view/admin/footer.php" ?>