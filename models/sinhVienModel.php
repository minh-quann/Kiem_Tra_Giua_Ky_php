<?php
require_once "config/database.php";

class SinhVienModel {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() {
        $query = "SELECT * FROM sinhvien";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT * FROM sinhvien WHERE MaSV = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $query = "INSERT INTO sinhvien (MaSV, HoTen, GioiTinh, NgaySinh, Hinh, MaNganh) VALUES (:MaSV, :HoTen, :GioiTinh, :NgaySinh, :Hinh, :MaNganh)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute($data);
    }

    public function update($MaSV, $HoTen, $GioiTinh, $NgaySinh, $MaNganh, $Hinh) {
        $sql = "UPDATE sinhvien SET HoTen = ?, GioiTinh = ?, NgaySinh = ?, MaNganh = ?, Hinh = ? WHERE MaSV = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$HoTen, $GioiTinh, $NgaySinh, $MaNganh, $Hinh, $MaSV]);
    }
    

    public function delete($id) {
        $query = "DELETE FROM sinhvien WHERE MaSV = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
    
}
?>
