<?php
$dbHost = 'localhost';
$dbName = 'mail_sender';
$dbUser = 'root';
$dbPass = '';

$conn = mysqli_connect($dbHost, $dbUser, $dbPass);

if (!$conn) {
    die('資料庫連線失敗：' . mysqli_connect_error());
}

mysqli_query($conn, 'CREATE DATABASE IF NOT EXISTS `' . $dbName . '` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci');
mysqli_select_db($conn, $dbName);
mysqli_query($conn, 'CREATE TABLE IF NOT EXISTS emails (
    `No` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    email VARCHAR(255) NOT NULL,
    PRIMARY KEY (`No`),
    UNIQUE KEY unique_email (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci');
