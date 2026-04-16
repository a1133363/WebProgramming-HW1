<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location:login.php');
    exit;
}
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete_cookie'])) {
        setcookie('user_id', '', time() - 3600, '/');
        unset($_COOKIE['user_id']);
        $message = 'Cookie已刪除';
    }
    if (isset($_POST['set_cookie'])) {
        $newUserId = isset($_POST['user_id']) ? trim($_POST['user_id']) : '';
        if ($newUserId) {
            setcookie('user_id', $newUserId, time() + (30 * 24 * 60 * 60), '/');
            $_COOKIE['user_id'] = $newUserId;
            $message = 'Cookie已設定：' . $newUserId;
        }
    }
}
$currentCookie = isset($_COOKIE['user_id']) ? $_COOKIE['user_id'] : '';
$userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
$role = isset($_SESSION['role']) ? $_SESSION['role'] : '';
?><!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Cookie管理</title>
</head>

<body>
    <h1>Cookie管理</h1><?php if ($message) {
        echo '<p style="color:green;">' . $message . '</p>';
    } ?>
    <h2>Session資訊</h2>
    <p>帳號：<?php echo $userId; ?></p>
    <p>角色：<?php echo $role; ?></p>
    <h2>Cookie資訊</h2>
    <?php if ($currentCookie) {
        echo '<p>Cookie用戶ID：' . $currentCookie . '</p>';
    } else {
        echo '<p>沒有Cookie</p>';
    } ?>
    <h2>所有Cookies</h2>
    <?php if (!empty($_COOKIE)) {
        echo '<ul>';
        foreach ($_COOKIE as $name => $value) {
            echo '<li>' . $name . '=' . $value . '</li>';
        }
        echo '</ul>';
    } else {
        echo '<p>沒有Cookies</p>';
    } ?>
    <h2>管理Cookie</h2>
    <form method="POST"><button type="submit" name="delete_cookie">刪除Cookie</button></form>
    <h3>設定新Cookie</h3>
    <form method="POST"><label>用戶ID：</label><input type="text" name="user_id"><button type="submit"
            name="set_cookie">設定Cookie</button></form>
    <p><a href="index.php">返回首頁</a></p>
    <p><a href="logout.php">登出</a></p>
</body>

</html>