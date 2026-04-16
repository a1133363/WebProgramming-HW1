<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location:login.php');
    exit;
}
$userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
$role = isset($_SESSION['role']) ? $_SESSION['role'] : '';
$cookieUserId = isset($_COOKIE['user_id']) ? $_COOKIE['user_id'] : '';
?><!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>首頁</title>
</head>

<body>
    <h1>歡迎使用系統</h1>
    <h2>您的資訊</h2>
    <p>帳號：<?php echo $userId; ?></p>
    <p>角色：<?php echo $role; ?></p>
    <h2>Cookie 資訊</h2>
    <?php if ($cookieUserId) {
        echo '<p>Cookie用戶ID：' . $cookieUserId . '</p>';
    } else {
        echo '<p>沒有Cookie</p>';
    } ?>
    <h2>可訪問頁面</h2>
    <ul>
        <li><a href="index.php">首頁</a></li>
        <li><a href="student.php">學生專區</a></li>
        <li><a href="teacher.php">教師專區</a></li>
        <li><a href="admin.php">管理專區</a></li>
        <li><a href="cookie.php">Cookie管理</a></li>
        <li><a href="logout.php">登出</a></li>
    </ul>
</body>

</html>