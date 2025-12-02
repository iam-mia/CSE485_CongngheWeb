<?php
require '../db.php';
$flowers = $pdo->query("SELECT * FROM flowers")->fetchAll();
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Bài 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="navbar bg-dark text-white p-3">
        <div class="lead">Bài 1</div>
        <div>
            <a href="index.php" class="btn btn-success">User</a>
            <a href="admin.php" class="btn btn-primary">Admin</a>
        </div>
    </div>

    <div class="container">
        <h1 class="py-3">Dashboard</h1>

        <table class="table table-bordered">
            <thead class="table-primary">
                <tr>
                    <th>#</th>
                    <th>Tên loài hoa</th>
                    <th>Mô tả</th>
                    <th>Ảnh</th>
                    <th>Sửa/Xoá</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($flowers)): ?>
                    <?php foreach ($flowers as $flower): ?>
                        <tr>
                            <td><?= $flower['id'] ?></td>
                            <td><?= $flower['name'] ?></td>
                            <td><?= $flower['description'] ?> </td>
                            <td><img src=<?= $flower['image'] ?>></td>
                            <td class='d-flex gap-2'>
                                <button class='btn btn-warning'>Sửa</button>
                                <button class='btn btn-danger'>Xoá</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7">Chưa có hoa nào trong mảng.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>

</html>