<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>PHT Chương 2 - PHP Căn Bản</title>
</head>
<body>
<h1>Kết quả PHP Căn Bản</h1>
<?php

$ho_ten = "Phùng Minh Anh";
$diem_tb = 9.5;
$co_di_hoc_chuyen_can = true;

echo "<p>Họ tên: $ho_ten<br>Điểm: $diem_tb</p>";

if ($diem_tb >= 8.5 && $co_di_hoc_chuyen_can == true) {
    echo "<p>Xếp loại: Giỏi</p>";
} elseif ($diem_tb >= 6.5 && $co_di_hoc_chuyen_can == true) {
    echo "<p>Xếp loại: Khá</p>";
} elseif ($diem_tb >= 5.0 && $co_di_hoc_chuyen_can == true) {
    echo "<p>Xếp loại: Trung bình</p>";
} else {
    echo "<p>Xếp loại: Yếu (Cần cố gắng thêm!)</p>";
}

function chaoMung(){
    echo "<p>Chúc mừng bạn đã hoàn thành PHT Chương 2!</p>";
}
chaoMung();

?></body>
</html>