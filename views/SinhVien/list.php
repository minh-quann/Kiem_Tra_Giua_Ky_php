<div class="container mt-4">
    <h2 class="text-center mb-4">Danh Sách Sinh Viên</h2>
    <div class="table-container">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th>Mã SV</th>
                    <th>Họ Tên</th>
                    <th>Giới Tính</th>
                    <th>Ngày Sinh</th>
                    <th>Ngành</th>
                    <th>Hình Ảnh</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sinhviens as $sv) { ?>
                    <tr>
                        <td><?= $sv['MaSV'] ?></td>
                        <td><?= $sv['HoTen'] ?></td>
                        <td><?= $sv['GioiTinh'] ?></td>
                        <td><?= $sv['NgaySinh'] ?></td>
                        <td><?= $sv['MaNganh'] ?></td>
                        <td>
                            <img src="<?= $sv['Hinh'] ?>" alt="Ảnh SV" class="avatar">
                        </td>
                        <td>
                            <a href="?action=detail&id=<?= $sv['MaSV'] ?>" class="btn btn-info">
                                <i class="fas fa-eye"></i> Xem
                            </a>
                            <a href="?action=edit&id=<?= $sv['MaSV'] ?>" class="btn btn-warning">
                                <i class="fas fa-edit"></i> Sửa
                            </a>
                            <a href="views/SinhVien/delete.php?id=<?= $sv['MaSV'] ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa sinh viên này?');">
    <i class="fas fa-trash-alt"></i> Xóa
</a>

                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<!-- FontAwesome để có icon đẹp -->
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

    .table-container {
        background: #ffffff;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        border: 2px solid #dee2e6;
        overflow: hidden;
    }

    .table {
        border-radius: 10px;
        overflow: hidden;
    }

    thead {
        background-color: #343a40;
        color: white;
        border-radius: 10px;
    }

    th, td {
        text-align: center;
        vertical-align: middle;
    }

    .avatar {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 50%;
        border: 2px solid #ddd;
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
    }

    .btn {
        padding: 5px 10px;
        font-size: 14px;
        border-radius: 5px;
    }

    .btn i {
        margin-right: 5px;
    }

    .btn-info {
        background-color: #17a2b8;
        border: none;
        color: white;
    }

    .btn-warning {
        background-color: #ffc107;
        border: none;
        color: black;
    }

    .btn-danger {
        background-color: #dc3545;
        border: none;
        color: white;
    }

    .btn:hover {
        opacity: 0.8;
    }
</style>
