<?php
require '../db.php';

if (isset($_POST['upload'])) {
    if (isset($_FILES['quiz']) && $_FILES['quiz']['error'] == 0) {
        $file = $_FILES['quiz']['tmp_name'];
        $content = file_get_contents($file);

        // Tách từng câu hỏi
        $qnas = preg_split("/\n\s*\n/", trim($content));

        foreach ($qnas as $qna) {
            $lines = array_map('trim', explode("\n", $qna));

            $question = $lines[0] ?? '';
            $A = isset($lines[1]) ? substr($lines[1], 3) : '';
            $B = isset($lines[2]) ? substr($lines[2], 3) : '';
            $C = isset($lines[3]) ? substr($lines[3], 3) : '';
            $D = isset($lines[4]) ? substr($lines[4], 3) : '';

            // Chèn vào DB
            $stmt = $pdo->prepare("INSERT INTO quiz_questions(question, optionA, optionB, optionC, optionD) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$question, $A, $B, $C, $D]);
        }

        echo "<p class='text-success'>Upload Quiz.txt thành công!</p>";
    } else {
        echo "<p class='text-danger'>Vui lòng chọn file Quiz.txt hợp lệ.</p>";
    }
}

$questions = $pdo->query("SELECT * FROM quiz_questions")->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Bài 2</title>
</head>

<body>
    <div class="container">

        <h1>Quiz</h1>

        <form method="POST" enctype="multipart/form-data" class="mb-4">
            <input type="file" name="quiz" required class="form-control mb-2">
            <button name="upload" class="btn btn-success">Upload Quiz</button>
        </form>

        <form method="POST">
            <?php foreach ($questions as $index => $q): ?>
                <div class="mb-3 p-3 border rounded">
                    <h5><?= ($index + 1) . ". " . htmlspecialchars($q['question']) ?></h5>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q<?= $index ?>" value="A" id="q<?= $index ?>a">
                        <label class="form-check-label" for="q<?= $index ?>a"><?= 'A. ' . htmlspecialchars($q['optionA']) ?></label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q<?= $index ?>" value="B" id="q<?= $index ?>b">
                        <label class="form-check-label" for="q<?= $index ?>b"><?= 'B. ' . htmlspecialchars($q['optionB']) ?></label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q<?= $index ?>" value="C" id="q<?= $index ?>c">
                        <label class="form-check-label" for="q<?= $index ?>c"><?= 'C. ' . htmlspecialchars($q['optionC']) ?></label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q<?= $index ?>" value="D" id="q<?= $index ?>d">
                        <label class="form-check-label" for="q<?= $index ?>d"><?= 'D. ' . htmlspecialchars($q['optionD']) ?></label>
                    </div>
                </div>
            <?php endforeach; ?>

            <button type="submit" class="btn btn-primary">Nộp bài</button>
        </form>
    </div>

</body>

</html>