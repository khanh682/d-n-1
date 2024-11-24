<?php 
class HomeController {
    public function homedm() {
        $sanphams = (new SanPham)->all();
        $danhmucs = (new DanhMuc)->all(); // Fetch all categories
        view("client/trangchu", ['danhmucs' => $danhmucs, 'sanphams'=>$sanphams]); // Pass it to the view
    }

}
?>
