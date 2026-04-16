<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location:login.php');
    exit;
}
if (!isset($_SESSION['role']) || $_SESSION['role'] !== '管理者') {
    header('Location:index.php');
    exit;
}
$userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
$cookieUserId = isset($_COOKIE['user_id']) ? $_COOKIE['user_id'] : '';
?><!DOCTYPE html><html><head><meta charset="UTF-8"><title>管理專區</title></head><body><h1>管理專區</h1><p>歡迎，<?php echo $userId; ?> 管理員！</p><h2>您的資訊</h2><p>帳號：<?php echo $userId; ?></p><p>角色：管理者</p><h2>Cookie 資訊</h2><?php if ($cookieUserId) {
           echo '<p>Cookie用戶ID：' . $cookieUserId . '</p>';
       } else {
           echo '<p>沒有Cookie</p>';
       } ?><h2>管理功能</h2><ul><li>用戶管理</li><li>系統設定</li><li>日誌查看</li><li>權限設定</li></ul><p><a href="index.php">返回首頁</a></p><p><a href="logout.php">登出</a></p></body></html>