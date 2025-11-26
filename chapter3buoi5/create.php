<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Thêm đồ án</title>
</head>
<body>
    <div class="navbar bg-dark text-white p-3">
        <div class="lead">Quản lý Đồ án Tốt nghiệp</div>
        <div>
            <a href="index.php" class="btn btn-success">Dashboard</a>
            <a href="create.php" class="btn btn-primary">+ Thêm đồ án</a>
        </div>
    </div>
    <div class="container mt-4">
        <h1 class="py-3">Thêm đồ án</h1>
        <form action="index.php" method="post" class="p-3 bg-light rounded">
            <input type="hidden" name="success" value="created">
            <div class="mb-3">
                <label class="form-label">Tên đề tài:</label>
                <input type="text" name="ten_de_tai" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Tên sinh viên:</label>
                <input type="text" name="ten_sinh_vien" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Mã số sinh viên:</label>
                <input type="text" name="mssv" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Giảng viên hướng dẫn:</label>
                <input type="text" name="giang_vien_hd" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Năm học:</label>
                <select class="form-select" name="nam_hoc">
                    <option value="2023-2024" selected>2023-2034</option>
                    <option value="2024-2025">2024-2025</option>
                    <option value="2025-2026">2025-2026</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Trạng thái:</label>
                <select class="form-select" name="trang_thai">
                    <option value="Chờ xét duyệt" selected>Chờ xét duyệt</option>
                    <option value="Đang thực hiện">Đang thực hiện</option>
                    <option value="Hoàn thành">Hoàn thành</option>
                </select>
            </div>

            <input class="btn btn-primary" type="submit" value="Thêm">
        </form>
    </div>
</body>
</html>