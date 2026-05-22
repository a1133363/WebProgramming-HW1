<?php
require_once __DIR__ . '/db.php';

$message = '資料庫與 emails 資料表已建立完成。';
?>
<!doctype html>
<html lang="zh-Hant">
<head>
    <meta charset="utf-8">
    <title>資料庫初始化</title>
</head>
<body>
    <h1>資料庫初始化</h1>
    <p><?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></p>
    <p><a href="index.php">回首頁</a></p>
</body>
</html>
