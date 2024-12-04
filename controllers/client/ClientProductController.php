<?php
class ClientProductController{
    public function show($madm){
        $madm = $madm ?? 1;
        $sanPham_id = $_GET['sanPham_id'] ?? '';
        if($sanPham_id == ''){
            header("Location: index.php");
            return 0;
        }
        //Lấy ra sản phẩm
        $sanpham =(new SanPham)->find_one($sanPham_id);
        //Danh sách danh mục
        $categories = (new DanhMuc)->all();
        //Cập nhật lượt xem
        (new SanPham)->updateLuotxem($sanPham_id);
        //Lấy sản phẩm cùng loại
        $similarproducts = (new SanPham)->sanPhamInDanhMuc($madm);
        return view(
            "client/detail1",[
                'sanpham'=>$sanpham,
                'categories'=>$categories,
                'similarproducts'=>$similarproducts
            ]
        );
    }
    public function cart(){
        $categories=(new DanhMuc)->all();
        return view("client/cart",[
            'categories'=>$categories
        ]);
    }
   
}
?>