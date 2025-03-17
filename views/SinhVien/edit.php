<div class="container mt-4">
    <h2>Chỉnh Sửa Sinh Viên</h2>
    <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Mã Sinh Viên</label>
            <input type="text" name="MaSV" class="form-control" value="<?= $sinhvien['MaSV'] ?? '' ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Họ Tên</label>
            <input type="text" name="HoTen" class="form-control" value="<?= $sinhvien['HoTen'] ?? '' ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Giới Tính</label>
            <select name="GioiTinh" class="form-control">
                <option value="Nam" <?= isset($sinhvien['GioiTinh']) && $sinhvien['GioiTinh'] == 'Nam' ? 'selected' : '' ?>>Nam</option>
                <option value="Nữ" <?= isset($sinhvien['GioiTinh']) && $sinhvien['GioiTinh'] == 'Nữ' ? 'selected' : '' ?>>Nữ</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Ngày Sinh</label>
            <input type="date" name="NgaySinh" class="form-control" value="<?= $sinhvien['NgaySinh'] ?? '' ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Khoa</label>
            <select name="MaNganh" class="form-control" required>
                <option value="CNTT" <?= isset($sinhvien['MaNganh']) && $sinhvien['MaNganh'] == 'CNTT' ? 'selected' : '' ?>>Công nghệ thông tin</option>
                <option value="QTKD" <?= isset($sinhvien['MaNganh']) && $sinhvien['MaNganh'] == 'QTKD' ? 'selected' : '' ?>>Quản trị kinh doanh</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Hình Ảnh</label>
            <input type="file" name="Hinh" class="form-control">
            <?php if (!empty($sinhvien['Hinh'])): ?>
                <img src="<?= $sinhvien['Hinh'] ?>" width="100">
            <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-primary">Cập Nhật</button>
        <a href="index.php?action=index" class="btn btn-secondary">Hủy</a>
    </form>
</div>
