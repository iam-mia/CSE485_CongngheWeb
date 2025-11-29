<?php
require '../db.php';

if (isset($_POST['upload'])) {
    if (isset($_FILES['csv']) && $_FILES['csv']['error'] == 0) {
        $file = $_FILES['csv']['tmp_name'];

        if (($open = fopen($file, "r")) !== false) {
            fgetcsv($open);

            while (($row = fgetcsv($open, 1000, ",")) !== false) {
                $stmt = $conn->prepare("INSERT INTO csv_users(username,password,lastname,firstname,class,email,course) VALUES (?,?,?,?,?,?,?)");
                $stmt->bind_param("sssssss", $row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6]);
                $stmt->execute();
            }
            fclose($open);
            echo "<p class='text-success'>Upload CSV thành công!</p>";
        }
    } else {
        echo "<p class='text-danger'>Vui lòng chọn file CSV hợp lệ.</p>";
    }
}
$users = $conn->query("SELECT * FROM csv_users")->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Danh sách người dùng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-4">

    <h1 class="mb-4">Dữ liệu CSV</h1>

    <form method="POST" enctype="multipart/form-data" class="mb-4">
        <input type="file" name="csv" required class="form-control mb-2">
        <button name="upload" class="btn btn-success">Upload CSV</button>
    </form>

    <h2>Danh sách sinh viên</h2>
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Password</th>
                <th>Lastname</th>
                <th>Firstname</th>
                <th>Class</th>
                <th>Email</th>
                <th>Course</th>
            </tr>
        </thead>

        <tbody>
        <?php if (!empty($users)): ?>
            <?php foreach($users as $u): ?>
            <tr>
                <td><?= $u['id'] ?></td>
                <td><?= htmlspecialchars($u['username']) ?></td>
                <td><?= htmlspecialchars($u['password']) ?></td>
                <td><?= htmlspecialchars($u['lastname']) ?></td>
                <td><?= htmlspecialchars($u['firstname']) ?></td>
                <td><?= htmlspecialchars($u['class']) ?></td>
                <td><?= htmlspecialchars($u['email']) ?></td>
                <td><?= htmlspecialchars($u['course']) ?></td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="8" class="text-center">Chưa có dữ liệu</td>
            </tr>
        <?php endif; ?>
    </tbody>
    </table>

</div>

</body>