<div class="container mt-4">
    <h2>Thêm Sinh Viên</h2>
    <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Mã Sinh Viên</label>
            <input type="text" name="MaSV" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Họ Tên</label> 
            <input type="text" name="HoTen" class="form-control" required> 
        </div>
        <div class="mb-3">
            <label class="form-label">Giới Tính</label>
            <select name="GioiTinh" class="form-control">
                <option value="Nam">Nam</option>
                <option value="Nữ">Nữ</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Ngày Sinh</label>
            <input type="date" name="NgaySinh" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Khoa</label>
            <select name="MaNganh" class="form-control" required> 
                <option value="CNTT">Công nghệ thông tin</option>
                <option value="QTKD">Quản trị kinh doanh</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Hình Ảnh</label>
            <input type="file" name="Hinh" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>
        <a href="index.php?action=index" class="btn btn-secondary">Hủy</a> 
    </form>
</div>
