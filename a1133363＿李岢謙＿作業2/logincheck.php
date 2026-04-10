<?php
$fID = "a1133363";
$fPWD = "Abc12345";

if (isset($_POST["uID"]) && isset($_POST["uPWD"])) {
    $uID = $_POST["uID"];
    $uPWD = $_POST["uPWD"];

    if ($fID == $uID && $fPWD == $uPWD) {
        header("Location: ../a1133363＿李岢謙＿作業1.php");
        exit;
    } else {
        echo "失敗";
    }
}
?>