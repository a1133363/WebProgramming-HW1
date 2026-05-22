<?php
require_once __DIR__ . '/db.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = 'Email 格式不正確。';
    } else {
        $email = mysqli_real_escape_string($conn, $email);
        $sql = "INSERT IGNORE INTO emails (email) VALUES ('$email')";
        mysqli_query($conn, $sql);

        if (mysqli_affected_rows($conn) > 0) {
            $message = '新增成功。';
        } else {
            $message = '此 Email 已存在。';
        }
    }
}

$result = mysqli_query($conn, 'SELECT `No`, email FROM emails ORDER BY `No` DESC');
$total = mysqli_num_rows($result);
?>
<!doctype html>
<html lang="zh-Hant">
<head>
    <meta charset="utf-8">
    <title>郵件寄送系統</title>
</head>
<body>
    <h1>郵件寄送系統</h1>

    <p>
        <a href="index.php">收件者資料庫</a> |
        <a href="mail.php">寄信</a> |
        <a href="setup.php">初始化資料庫</a>
    </p>

    <?php if ($message != '') { ?>
        <p><?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></p>
    <?php } ?>

    <h2>新增 Email</h2>
    <form method="post" action="index.php">
        <label>
            Email：
            <input type="email" name="email" required>
        </label>
        <button type="submit">新增</button>
    </form>

    <h2>收件者列表</h2>
    <p>總筆數：<?php echo $total; ?></p>
    <table border="1" cellpadding="6" cellspacing="0">
        <tr>
            <th>No</th>
            <th>email</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['No']; ?></td>
                <td><?php echo htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8'); ?></td>
            </tr>
        <?php } ?>
        <?php if ($total == 0) { ?>
            <tr>
                <td colspan="2">目前沒有資料。</td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
