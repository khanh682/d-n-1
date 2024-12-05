<?php include_once "view/admin/header.php" ?>

<div class="row2">
  <div class="row2 font_title">
    <h1>THÊM MỚI LOẠI DANH MỤC</h1>
  </div>
  <div class="row2 form_content ">
    <form action="index.php?pg=store" method="POST" enctype="multipart/form-data">
      <div class="row2 mb10 form_content_container">
        <label> Mã loại </label> <br>
        <label for=""><input required type="number" name="madm"></label>
      </div>
      <div class="row2 mb10">
        <label>Tên loại </label> <br>
        <input type="text" required name="tendm">
      </div>
      <div class="row2 mb10 form_content_container">
        <label> Hình ảnh </label> <br>
        <label for=""><input type="file" name="hinhanh"></label>
        <br>
      </div>
      <div class="row mb10 ">
        <input class="mr20" type="submit" value="THÊM MỚI">
        <a href="index.php?pg=danhmuc&action=list"><input class="mr20" type="button" value="DANH SÁCH"></a>
      </div>
    </form>
  </div>
</div>

<?php include_once "view/admin/footer.php" ?>