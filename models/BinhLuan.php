<?php
class BinhLuan {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getCommentsByProductId($sanPham_id) {
        $stmt = $this->db->prepare("SELECT * FROM danhgiasanpham WHERE sanPham_id = ? ORDER BY ngayDanhGia DESC");
        $stmt->execute([$sanPham_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addComment($sanPham_id, $nguoiDung_id, $binhLuan) {
        $stmt = $this->db->prepare("INSERT INTO danhgiasanpham (sanPham_id, nguoiDung_id, binhLuan) VALUES (?, ?, ?)");
        return $stmt->execute([$sanPham_id, $nguoiDung_id, $binhLuan]);
    }
}
?>
