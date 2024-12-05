<?php include_once "view/admin/header.php" ?>

<div class="row2">
  <div class="row2 font_title">
    <h1>CẬP NHẬP LOẠI DANH MỤC</h1>
  </div>
  <div class="row2 form_content ">
    <form action="" method="POST" enctype="multipart/form-data">
      <div class="row2 mb10 form_content_container">
        <label> Mã loại </label> <br>
        <label for=""><input type="number" required name="madm" value="<?= $danhmuc['madm'] ?>"></label>
      </div>
      <div class="row2 mb10">
        <label>Tên loại </label> <br>
        <input type="text" required name="tendm" value="<?= $danhmuc['tendm'] ?>">
      </div>
      <div class="row2 mb10 form_content_container">
        <input type="hidden" name="hinhanh" value="<?= $danhmuc['hinhanh'] ?>">
        <label for=""><img src="<?= $danhmuc['hinhanh'] ?>" width="66" alt=""></label>
        <label> Hình ảnh </label> <br>
        <label for=""><input type="file" name="hinhanh" value="<?= $danhmuc['hinhanh'] ?>"></label>
        <br>
      </div>
      <input type="hidden" name="madm" value="<?= $danhmuc['madm'] ?>">
      <div class="row mb10 ">
        <input class="mr20" type="submit" value="CẬP NHẬP">

        <a href="index.php?pg=danhmuc&action=list"><input class="mr20" type="button" value="DANH SÁCH"></a>
      </div>
    </form>
  </div>
</div>

<?php include_once "view/admin/footer.php" ?>