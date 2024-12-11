<?php 
class HomeController {
    public function homedm() {
        //Lấy 8 sản phẩm mới nhất
        $sanphams = (new SanPham)->getLatestProducts();
        //Lấy danh mục và tổng số lượng của sản phẩm trong từng danh mục
        $danhmucs = (new DanhMuc)->numberofcategories(); // Fetch all categories
        //lấy tất cả danh mục
        $categories = (new DanhMuc)->all();
        //lấy litmit 4 sản phẩm nhiều lượt xem nhất
        $ViewedProducts = (new SanPham)->getMostViewedProducts();
        view("client/trangchu", ['danhmucs' => $danhmucs, 'sanphams'=>$sanphams, 'categories'=>$categories, 'ViewedProducts'=>$ViewedProducts]); // Pass it to the view
    }

}
?>
