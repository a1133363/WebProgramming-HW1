<?php
session_start();
$_SESSION = array();
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 3600, '/');
}
session_destroy();
setcookie('user_id', '', time() - 3600, '/');
?><!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>登出</title>
</head>

<body>
    <h1>您已登出</h1>
    <p>Session已清除</p>
    <p>Cookie已刪除</p>
    <p><a href="login.php">重新登入</a></p>
</body>

</html>