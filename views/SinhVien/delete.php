<?php
require_once __DIR__ . '/../../config/database.php';

$conn = (new Database())->getConnection();
$maSV = isset($_GET['id']) ? $_GET['id'] : '';

if ($maSV) {
    // Lấy thông tin sinh viên trước khi xóa
    $sql = "SELECT * FROM sinhvien WHERE MaSV = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$maSV]);
    $sinhvien = $stmt->fetch(PDO::FETCH_ASSOC);

    // Nếu không tìm thấy sinh viên
    if (!$sinhvien) {
        echo "<script>alert('Không tìm thấy sinh viên!'); window.history.back();</script>";
        exit();
    }

    // Nếu có yêu cầu xóa (form submit)
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $sqlDelete = "DELETE FROM sinhvien WHERE MaSV = ?";
        $stmtDelete = $conn->prepare($sqlDelete);
        
        if ($stmtDelete->execute([$maSV])) {
            echo "<script>alert('Xóa sinh viên thành công!'); window.location.href = 'list.php';</script>";
        } else {
            echo "<script>alert('Xóa thất bại!'); window.history.back();</script>";
        }
        exit();
    }
} else {
    echo "<script>alert('Không tìm thấy sinh viên!'); window.history.back();</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xóa Sinh Viên</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 50px;
            max-width: 500px;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .avatar {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid #ddd;
            display: block;
            margin: 0 auto;
        }
        .btn-danger {
            background-color: #dc3545;
            border: none;
        }
        .btn-secondary {
            background-color: #6c757d;
            border: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card p-4">
            <h4 class="text-center text-danger">Xác nhận xóa sinh viên</h4>
            <div class="text-center">
                <img src="<?= htmlspecialchars($sinhvien['Hinh']) ?>" alt="Ảnh SV" class="avatar mb-3">
                <h5><?= htmlspecialchars($sinhvien['HoTen']) ?></h5>
                <p><strong>Mã SV:</strong> <?= htmlspecialchars($sinhvien['MaSV']) ?></p>
                <p><strong>Ngành:</strong> <?= htmlspecialchars($sinhvien['MaNganh']) ?></p>
            </div>
            <form method="POST">
                <button type="submit" class="btn btn-danger w-100">Xác nhận xóa</button>
                <a href="http://localhost:3000/index.php" class="btn btn-secondary w-100 mt-2">Hủy</a>

            </form>
        </div>
    </div>
</body>
</html>
