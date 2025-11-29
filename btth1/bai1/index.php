<?php
require '../db.php';
$flowers = $conn->query("SELECT * FROM flowers")->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Bài 1</title>
</head>
<body>
<div class="navbar bg-dark text-white p-3">
    <div class="lead">Bài 1</div>
    <div>
        <a href="index.php" class="btn btn-success">User</a>
        <a href="admin.php" class="btn btn-primary">Admin</a>
    </div>
</div>

<div class="container p-5">

<div class="category">LÀM VƯỜN</div>

<h1>14 loại hoa tuyệt đẹp thích hợp trồng để khoe hương sắc dịp xuân hè</h1>

<div class="meta">LÂM NGỌC • 00:00 09/03/2016</div>

<div class="social-buttons">
    <button>CHIA SẺ</button>
    <button>THÍCH</button>
</div>

<p class="lead">
    Hãy nhanh chóng ghi vào sổ tay của bạn 14 loại hoa tuyệt đẹp để lên kế hoạch trồng chúng trong dịp xuân – hè này nhé!
</p>

<ul class="related">
    <li>Cách trồng hoa thạch lan đẹp lạ để trang trí bàn làm việc thêm hút mắt</li>
    <li>9 loại hoa trồng trong chậu đẹp ngất ngây cho mùa xuân</li>
    <li>Sân vườn cực đẹp với 5 loại hoa hồng ngoại dễ trồng</li>
</ul>

<p>
    Mỗi loài hoa sẽ khoe sắc rực rỡ vào đúng thời điểm thích hợp trong năm, khí hậu đáp ứng thuận lợi sẽ giúp hoa phát triển nhanh và đẹp một cách hoàn hảo.
</p>

<?php if (!empty($flowers)): ?>
    <?php foreach ($flowers as $flower): ?>
        <div class="flower-item">
            <h2><?= $flower['name'] ?></h2>
            <img src=<?= $flower['image'] ?> alt=<?= $flower['name'] ?>>
            <p><?= $flower['description'] ?></p>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>Dữ liệu rỗng</p>
<?php endif; ?>
</div>
</body>
</html>