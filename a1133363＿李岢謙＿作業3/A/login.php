<?php
session_start();
$users = ['student' => ['password' => 'student123', 'role' => '學生'], 'teacher' => ['password' => 'teacher123', 'role' => '教師'], 'admin' => ['password' => 'admin123', 'role' => '管理者']];
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    if (isset($users[$username]) && $users[$username]['password'] === $password) {
        $_SESSION['user_id'] = $username;
        $_SESSION['role'] = $users[$username]['role'];
        $_SESSION['logged_in'] = true;
        setcookie('user_id', $username, time() + (30 * 24 * 60 * 60), '/');
        header('Location:index.php');
        exit;
    } else {
        $error = '帳號或密碼錯誤';
    }
}
?><!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>登入</title>
</head>

<body>
    <h1>登入系統</h1><?php if ($error) {
        echo '<p style="color:red;">' . $error . '</p>';
    } ?>
    <form method="POST"><label>帳號：</label><input type="text" name="username" required><br><br><label>密碼：</label><input
            type="password" name="password" required><br><br><button type="submit">登入</button></form>
    <h3>測試帳號：</h3>
    <ul>
        <li>student / student123</li>
        <li>teacher / teacher123</li>
        <li>admin / admin123</li>
    </ul>
</body>

</html>