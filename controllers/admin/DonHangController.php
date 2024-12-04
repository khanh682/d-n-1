<?php
class DonHangController{
    //Hiển thi dữ liệu
    public function list(){
    //Lấy dữ liệu từ models
    $donhangs = (new DonHang)->all();
    //render view
    view("admin/donhang/list",['donhangs'=>$donhangs]);
    }
}
?>