<?php
require_once __DIR__ . '/../../config/database.php';

$database = new Database();
$conn = $database->getConnection();

if (!$conn) {
    die("<div class='container mt-4'><h3>Lỗi: Không thể kết nối CSDL!</h3></div>");
}

$maSV = isset($_GET['id']) ? $_GET['id'] : '';

$sql = "SELECT * FROM sinhvien WHERE MaSV = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$maSV]);
$sv = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$sv) {
    echo "<div class='container mt-4'><h3>Sinh viên không tồn tại!</h3></div>";
    exit;
}
?>

<div class="container mt-4">
    <h2 class="text-center mb-4">Thông Tin Chi Tiết Sinh Viên</h2>
    <div class="card student-card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 text-center">
                    <img src="<?= htmlspecialchars($sv['Hinh']) ?>" alt="Ảnh Sinh Viên" class="student-img">
                </div>
                <div class="col-md-8">
                    <h4><strong>Mã SV:</strong> <?= htmlspecialchars($sv['MaSV']) ?></h4>
                    <h4><strong>Họ Tên:</strong> <?= htmlspecialchars($sv['HoTen']) ?></h4>
                    <h4><strong>Giới Tính:</strong> <?= htmlspecialchars($sv['GioiTinh']) ?></h4>
                    <h4><strong>Ngày Sinh:</strong> <?= htmlspecialchars($sv['NgaySinh']) ?></h4>
                    <h4><strong>Ngành:</strong> <?= htmlspecialchars($sv['MaNganh']) ?></h4>
                    <a href="http://localhost:3000/index.php" class="btn btn-secondary mt-3">
                        <i class="fas fa-arrow-left"></i> Quay lại danh sách
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<style>
    body {
        background-color: #f8f9fa;
        font-family: 'Arial', sans-serif;
    }

    h2 {
        font-weight: bold;
        color: #343a40;
    }

    .student-card {
        max-width: 600px;
        margin: auto;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        background: #ffffff;
    }

    .student-img {
        width: 150px;
        height: 150px;
        object-fit: cover;
        border-radius: 20%;
        border: 3px solid #ddd;
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
    }

    .btn {
        padding: 8px 15px;
        font-size: 16px;
        border-radius: 5px;
    }

    .btn i {
        margin-right: 5px;
    }

    .btn-secondary {
        background-color: #6c757d;
        border: none;
        color: white;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
    }
</style>
