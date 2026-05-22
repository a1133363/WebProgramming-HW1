<?php
require_once __DIR__ . '/db.php';

$total = 0;
$result = mysqli_query($conn, 'SELECT COUNT(*) AS total FROM emails');

if ($row = mysqli_fetch_assoc($result)) {
    $total = $row['total'];
}
?>
<!doctype html>
<html lang="zh-Hant">
<head>
    <meta charset="utf-8">
    <title>寄信</title>
</head>
<body>
    <h1>寄信</h1>

    <p>
        <a href="index.php">收件者資料庫</a> |
        <a href="mail.php">寄信</a>
    </p>

    <p>目前收件者總數：<?php echo $total; ?></p>

    <form method="post" action="send.php">
        <fieldset>
            <legend>寄送對象</legend>
            <label>
                <input type="radio" name="send_mode" value="all" checked>
                全部寄送
            </label>
            <br>
            <label>
                <input type="radio" name="send_mode" value="random">
                隨機寄送
            </label>
            <label>
                筆數：
                <input type="number" name="random_count" min="1" value="1">
            </label>
        </fieldset>

        <fieldset>
            <legend>時間設定</legend>
            <label>
                每封間隔秒數：
                <input type="number" name="delay_seconds" min="0" value="1">
            </label>
            <br>
            <label>
                <input type="checkbox" name="random_delay" value="1">
                隨機間隔
            </label>
            <label>
                最小秒數：
                <input type="number" name="delay_min" min="0" value="1">
            </label>
            <label>
                最大秒數：
                <input type="number" name="delay_max" min="0" value="5">
            </label>
        </fieldset>

        <fieldset>
            <legend>基本郵件內容</legend>
            <label>
                主旨：
                <input type="text" name="subject" required size="60">
            </label>
            <br>
            <label>
                內容：
                <br>
                <textarea name="body" rows="10" cols="80" required></textarea>
            </label>
        </fieldset>

        <button type="submit">開始寄送</button>
    </form>
</body>
</html>
