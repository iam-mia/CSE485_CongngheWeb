<?php
require 'data.php';

$success = $_GET['success'] ?? "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // $do_an_list[] = [
    //     'id' => count($do_an_list)+1,
    //     'ten_de_tai' => $_POST['ten_de_tai'],
    //     'ten_sinh_vien' => $_POST['ten_sinh_vien'],
    //     'mssv'          => $_POST['mssv'],
    //     'giang_vien_hd' => $_POST['giang_vien_hd'],
    //     'nam_hoc'       => $_POST['nam_hoc'],
    //     'trang_thai'    => $_POST['trang_thai'],
    //     'created_at'    => date('Y-m-d H:i:s')
    // ];
    header('Location: index.php?success=created');
    exit;
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Quản lý Đồ án</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="navbar bg-dark text-white p-3">
    <div class="lead">Quản lý Đồ án Tốt nghiệp</div>
    <div>
        <a href="index.php" class="btn btn-success">Dashboard</a>
        <a href="create.php" class="btn btn-primary">+ Thêm đồ án</a>
    </div>
</div>

<div class="container">
    <h1 class="py-3">Dashboard</h1>
    <p>Dữ liệu trong ví dụ này đang được lưu cố định trong một mảng PHP (chưa dùng CSDL).</p>

    <?php if ($success == "created"): ?>
        <div style="padding: 10px; background:#d1e7dd; color:#0f5132; border-radius:4px; margin-bottom:16px;">
            Giả lập: Thêm đồ án mới thành công! (thông báo thông qua tham số GET trong URL).
        </div>
    <?php endif; ?>

    <table class="table table-bordered table-hover">
        <thead class="table-primary">
        <tr>
            <th>#</th>
            <th>Tên đề tài</th>
            <th>Sinh viên</th>
            <th>GV hướng dẫn</th>
            <th>Năm học</th>
            <th>Trạng thái</th>
            <th>Ngày tạo</th>
        </tr>
        </thead>
        <tbody>
        <?php if (!empty($do_an_list)): ?>
            <?php foreach ($do_an_list as $row): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['ten_de_tai'] ?></td>
                    <td><?= $row['ten_sinh_vien']?> <small><?= '('.$row['mssv'].')' ?></small></td>
                    <td><?= $row['giang_vien_hd'] ?></td>
                    <td><?= $row['nam_hoc'] ?></td>
                    <td><?= $row['trang_thai'] ?></td>
                    <td><?= date('d/m/Y', strtotime($row['created_at'])) ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="7">Chưa có đồ án nào trong mảng.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>
<!-- lấy qua post và get và hiển thị -->