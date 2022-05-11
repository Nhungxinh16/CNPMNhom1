<?php
// active tài khoản user
include("./config/constants.php");

$email = $_GET['email'];
$code = $_GET['code'];

$sql = "SELECT * FROM customers WHERE email = '$email' and code = '$code'";
$res1 = mysqli_query($conn, $sql);


if (mysqli_num_rows($res1)) {
    // thay doi status
    $sql = "UPDATE customers SET `status` = 1 WHERE email = '$email'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        // đã kích hoạt
        $_SESSION['noti'] = "<p class = 'text-success'>Tài khoản của bạn đã được kích hoạt.</p>";
        header("location:register.php");
    } else {
        $_SESSION['noti'] = "<p class = 'text-danger'>Lỗi khi kích hoạt tài khoản. Hãy thử lại.</p>";
        header("location:register.php");
    }
} else {
    $_SESSION['noti'] = "<p class = 'text-danger'>Lỗi khi kích hoạt tài khoản. Hãy thử lại.</p>";
    header("location:register.php");
}
