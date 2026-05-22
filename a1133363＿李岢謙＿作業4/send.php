<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once __DIR__ . '/db.php';
require_once __DIR__ . '/PHPMailer-master/src/Exception.php';
require_once __DIR__ . '/PHPMailer-master/src/PHPMailer.php';
require_once __DIR__ . '/PHPMailer-master/src/SMTP.php';
?>
<!doctype html>
<html lang="zh-Hant">
<head>
    <meta charset="utf-8">
    <title>寄送進度</title>
</head>
<body>
    <h1>寄送進度</h1>
<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    echo '請從寄信頁面送出表單。<br>';
    echo '<p><a href="mail.php">回寄信頁</a></p></body></html>';
    exit;
}

set_time_limit(0);

$sendMode = $_POST['send_mode'];
$randomCount = intval($_POST['random_count']);
$delaySeconds = intval($_POST['delay_seconds']);
$delayMin = intval($_POST['delay_min']);
$delayMax = intval($_POST['delay_max']);
$subject = trim($_POST['subject']);
$body = trim($_POST['body']);

if ($randomCount < 1) {
    $randomCount = 1;
}

if ($delaySeconds < 0) {
    $delaySeconds = 0;
}

if ($delayMin < 0) {
    $delayMin = 0;
}

if ($delayMax < $delayMin) {
    $delayMax = $delayMin;
}

if ($subject == '' || $body == '') {
    echo '主旨與內容不可空白。<br>';
    echo '<p><a href="mail.php">回寄信頁</a></p></body></html>';
    exit;
}

if ($sendMode == 'random') {
    $sql = 'SELECT `No`, email FROM emails ORDER BY RAND() LIMIT ' . $randomCount;
} else {
    $sql = 'SELECT `No`, email FROM emails ORDER BY `No` ASC';
}

$result = mysqli_query($conn, $sql);
$total = mysqli_num_rows($result);

if ($total == 0) {
    echo '沒有可寄送的 Email。<br>';
} else {
    echo '開始寄送，共 ' . $total . ' 筆。<br>';
    ob_flush();
    flush();

    $sent = 0;
    $current = 0;

    while ($row = mysqli_fetch_assoc($result)) {
        $current++;
        $email = $row['email'];

        $mail = new PHPMailer(false);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'your_email@gmail.com';
        $mail->Password = 'your_app_password';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->CharSet = 'UTF-8';
        $mail->setFrom('your_email@gmail.com', 'Mail Sender');
        $mail->isHTML(false);
        $mail->addAddress($email);
        $mail->Subject = $subject;
        $mail->Body = $body;

        if ($mail->send()) {
            $sent++;
            echo htmlspecialchars($current . '/' . $total . ' 已寄送：' . $email, ENT_QUOTES, 'UTF-8') . '<br>';
        } else {
            echo htmlspecialchars($current . '/' . $total . ' 寄送失敗：' . $email . '，原因：' . $mail->ErrorInfo, ENT_QUOTES, 'UTF-8') . '<br>';
        }

        ob_flush();
        flush();

        if ($current < $total) {
            if (isset($_POST['random_delay'])) {
                $sleepSeconds = rand($delayMin, $delayMax);
            } else {
                $sleepSeconds = $delaySeconds;
            }

            if ($sleepSeconds > 0) {
                echo '等待 ' . $sleepSeconds . ' 秒...<br>';
                ob_flush();
                flush();
                sleep($sleepSeconds);
            }
        }
    }

    echo '完成。成功寄送 ' . $sent . '/' . $total . '。<br>';
}
?>
    <p><a href="mail.php">回寄信頁</a></p>
</body>
</html>
