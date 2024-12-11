<?php include_once "view/admin/header.php" ?>

<div class="row2">
      <div class="row2 font_title">
        <h1>SỬA SẢN PHẨM</h1>
      </div>
      <div class="row2 form_content ">
        <form action="" method="POST" enctype="multipart/form-data">
        <div class="row2 mb10 form_content_container">
            <label>ID</label> <br>
            <label for=""><input type="number" required name="sanPham_id" value="<?=$sanpham["sanPham_id"]?>"></label>
          </div>
          <div class="row2 mb10 form_content_container">
            <label> Tên Sản Phẩm </label> <br>
            <input type="text" required name="ten" value="<?=$sanpham["ten"]?>">
          </div>
          <div class="row2 mb10">
            <label>Mô Tả </label> <br>
            <label for=""><input required type="text" name="moTa" value="<?=$sanpham["moTa"]?>"></label>
          </div>
          <div class="row2 mb10">
            <label>Giá </label> <br>
            <label for=""><input required type="number" name="gia" value="<?=$sanpham["gia"]?>"></label>
          </div>
          <div class="row2 mb10">
            <label>Số Lượng </label> <br>
            <label for=""><input required type="number" name="soLuong" value="<?=$sanpham["soLuong"]?>"></label>
          </div>
          <div class="row2 mb10">
            <label>Size </label> <br>
            <input type="text" required name="kichCo" value="<?=$sanpham["kichCo"]?>">
          </div>
          <div class="row2 mb10">
            <label>Coler</label> <br>
            <input type="text" required name="mauSac" value="<?=$sanpham["mauSac"]?>">
          </div>
          <div class="row2 mb10">
            <label>Ngày Tạo</label> <br>
            <label for=""><input required type="date" name="ngayTao" value="<?=$sanpham["ngayTao"]?>"></label>
          </div>
          <div class="row2 mb10">
            <label>Ngày Sửa</label> <br>
            <label for=""><input required type="date" name="ngaySua" value="<?=$sanpham["ngaySua"]?>"></label>
          </div>
          <div class="row2 mb10">
            <label>Ảnh</label> <br>
            <label for=""><input type="file" name="anh" ></label>
            <input type="hidden" name="anh" value="<?=$sanpham["anh"]?>">
            <img src="<?=$sanpham["anh"]?>" width="66" alt="">
          </div>
          <div class="row2 mb10">
            <label>ID Danh Mục</label> <br>
            <label for=""><input required type="number" name="madm" value="<?=$sanpham["madm"]?>"></label> <br> 
          </div>
          <input type="hidden" name="sanPham_id" value="<?=$sanpham["sanPham_id"]?>">
          <div class="row mb10 ">
            <input class="mr20" type="submit" value="CẬP NHẬP">

            <a href="index.php?pg=sanpham&action=listt"><input class="mr20" type="button" value="DANH SÁCH"></a>
          </div>

        </form>
      </div>
    </div>

<?php include_once "view/admin/footer.php" ?>