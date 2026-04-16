<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location:login.php');
    exit;
}
if (!isset($_SESSION['role']) || $_SESSION['role'] !== '教師') {
    header('Location:index.php');
    exit;
}
$userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
$cookieUserId = isset($_COOKIE['user_id']) ? $_COOKIE['user_id'] : '';
?><!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>教師專區</title>
</head>

<body>
    <h1>教師專區</h1>
    <p>歡迎，<?php echo $userId; ?> 老師！</p>
    <h2>您的資訊</h2>
    <p>帳號：<?php echo $userId; ?></p>
    <p>角色：教師</p>
    <h2>Cookie 資訊</h2>
    <?php if ($cookieUserId) {
        echo '<p>Cookie用戶ID：' . $cookieUserId . '</p>';
    } else {
        echo '<p>沒有Cookie</p>';
    } ?>
    <h2>功能選單</h2>
    <ul>
        <li>課程管理</li>
        <li>成績輸入</li>
        <li>學生名單</li>
        <li>作業批改</li>
    </ul>
    <p><a href="index.php">返回首頁</a></p>
    <p><a href="logout.php">登出</a></p>
</body>

</html>