<?php
require_once __DIR__ . '/../models/sinhVienModel.php';

class SinhVienController {
    private $model;

    public function __construct() {
        $this->model = new SinhVienModel();
    }

    public function index() {
        $sinhviens = $this->model->getAll();
        include __DIR__ . '/../views/SinhVien/list.php';
    }

    public function create() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $data = [
                "MaSV" => $_POST["MaSV"] ?? '',
                "HoTen" => $_POST["HoTen"] ?? '',
                "GioiTinh" => $_POST["GioiTinh"] ?? '',
                "NgaySinh" => $_POST["NgaySinh"] ?? '',
                "Hinh" => $_FILES["Hinh"]["name"] ?? '',
                "MaNganh" => $_POST["MaNganh"] ?? ''
            ];
    
            if (empty($data["MaSV"]) || empty($data["HoTen"])) {
                die("Lỗi: Mã sinh viên và họ tên không được để trống!");
            }
    
            if ($_FILES["Hinh"]["error"] !== UPLOAD_ERR_OK) {
                die("Lỗi khi upload file: " . $_FILES["Hinh"]["error"]);
            }
    
            $uploadDir = __DIR__ . '/../images/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
    
            $targetFile = $uploadDir . basename($_FILES["Hinh"]["name"]);
            if (!move_uploaded_file($_FILES["Hinh"]["tmp_name"], $targetFile)) {
                die("Lỗi: Không thể lưu file ảnh!");
            }
    

            $data["Hinh"] = "/images/" . $_FILES["Hinh"]["name"];
    
            if (!$this->model->create($data)) {
                die("Lỗi: Không thể tạo sinh viên trong database!");
            }
    
            header("Location: ../index.php");
            exit;
        }
    
        include __DIR__ . '/../views/SinhVien/create.php';
    }
    

    public function edit($id) {
        $sinhvien = $this->model->getById($id);
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $MaSV = $_POST['MaSV'];
            $HoTen = $_POST['HoTen'];
            $GioiTinh = $_POST['GioiTinh'];
            $NgaySinh = $_POST['NgaySinh'];
            $MaNganh = $_POST['MaNganh'];
    

            $Hinh = $sinhvien['Hinh'];
            if (!empty($_FILES['Hinh']['name'])) {
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["Hinh"]["name"]);
                move_uploaded_file($_FILES["Hinh"]["tmp_name"], $target_file);
                $Hinh = $target_file;
            }
    

            $this->model->update($MaSV, $HoTen, $GioiTinh, $NgaySinh, $MaNganh, $Hinh);
    

            header("Location: index.php?action=index");
            exit();
        }
    
        include __DIR__ . '/../views/SinhVien/edit.php';
    }
    public function delete($id) {
        $this->model->delete($id);
        header("Location: ../index.php");
        exit;
    }

    public function detail($id) {
        $sinhvien = $this->model->getById($id);
        include __DIR__ . '/../views/SinhVien/detail.php';
    }
}
?>
