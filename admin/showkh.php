<?php
ob_start(); // loi cua header()

require("../config/constants.php");
require_once("check-admin.php");
$_SESSION["nav"] = "restaurants";
require('templates-admin/header.php');
if(isset($_SESSION["alert"])){
    $message = $_SESSION["alert"];
    unset($_SESSION["alert"]);
    echo '<script>
            alert("'.$message.'");
        </script>
    ';
}
if(isset( $_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * from customers where customer_id = '$id'";
    $res = mysqli_query($conn, $sql);
    $customer = mysqli_fetch_assoc($res);
}

?>
<div class="main-content">
    <!-- <div id="breadcrum">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                    </div>
                </div>
            </div>
        </div> -->
    <div class="main-content" style="margin-top: 30px;">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center mg-bot30">
                    <h2>Đăng kí hội viên</h2>
                </div>
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 noidungtin">
                            <p>
                                <strong style="color:#1583e0 !important;">
                                    ĐĂNG KÝ HỘI VIÊN
                                </strong>
                            </p>
                            <p>
                                Để hoàn tất đăng ký Hội viên VietravelPlus, quý khách vui lòng điền đầy đủ thông tin vào mẫu dưới đây và nhấn vào nút đăng ký. Xin chân thành cảm ơn quý khách hàng.
                            </p>
                            <?php
                            if (isset($_SESSION['noti'])) {
                                echo "<br>";
                                echo $_SESSION['noti'];
                                unset($_SESSION['noti']);
                            }
                            ?>
                            <br>
                            <form action="" method="POST">
                                <div class="col-md-2 col-sm-2 col-xs-12">
                                    <label>
                                        Họ và tên
                                        :
                                    </label>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <input type="text" value = "<?php echo $customer['user_name'] ?>" disabled class="form-control">
                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-12">
                                    <label>
                                        Giới tính
                                        :
                                    </label>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                <input type="text" value = "<?php echo $customer['user_name']=0 ? "nam" :"nu"?>" disabled class="form-control">
                                    
                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-12">
                                    <label>
                                        Ngày sinh
                                        :
                                    </label>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <input type="date" value = "<?php echo $customer['birthday'] ?>" class="form-control">
                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-12">
                                    <label>
                                        Di động
                                        :
                                    </label>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <input type="text" value = "<?php echo $customer['phone_number'] ?>" class="form-control">
                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-12">
                                    <label>
                                        Email
                                        :
                                    </label>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <input type="text" value="<?php echo $customer['email'] ?>" class="form-control">
                                </div>
                            </form>
                        </div>
                        <hr>
                    </div>
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-xs-12">
                            <div class="noidungtin">
                                <p>
                                    <strong style="color:#1583e0 !important;">ĐIỀU KHOẢN ĐĂNG KÝ HỘI VIÊN</strong>
                                </p>
                                <p>
                                    - Hội viên đăng ký chương trình cung cấp đúng các thông tin về số điện thoại, địa chỉ liên hệ, địa chỉ email của Hội viên. Khi có thay đổi, Hội viên có thể tự cập nhật vào tài khoản tại VietravelPlus.com hoặc liên hệ thông báo trực tiếp với nhân viên Vietravel và yêu cầu cập nhật.
                                </p>
                                <p>
                                    - Hội viên đăng ký chương trình cung cấp đúng các thông tin về số điện thoại, địa chỉ liên hệ, địa chỉ email của Hội viên. Khi có thay đổi, Hội viên có thể tự cập nhật vào tài khoản tại VietravelPlus.com hoặc liên hệ thông báo trực tiếp với nhân viên Vietravel và yêu cầu cập nhật.
                                </p>
                                <p>
                                    - Hội viên tham gia chương trình được cộng điểm Vàng và điểm Thưởng sau khi sử dụng dịch vụ tại Vietravel theo hệ số cộng điểm và theo các quy định về điểm thưởng khác được công bố tại từng thời điểm.
                                </p>
                                <p>
                                    - Vietravel có quyền thay đổi các điều kiện và điều khoản của chương trình Khách hàng thân thiết bất kỳ thời điểm nào có (hoặc không) báo trước và sẽ công bố chính thức trên VietravelPlus.com.
                                </p>
                                <p>
                                    - Vietravel có quyền sửa đổi cách thức của chương trình hoặc những quyền lợi có được từ chương trình tại bất kỳ thời điểm nào, có (hoặc không) báo trước và sẽ công bố chính thức trên VietravelPlus.com.
                                </p>
                                <p>
                                    - Vietravel có quyền tạm ngừng hoặc chấm dứt toàn bộ chương trình Khách hàng thân thiết tại bất kỳ thời điểm nào, có (hoặc không) báo trước.
                                </p>
                                <p>
                                    - Vietravel được miễn trừ chịu trách nhiệm nếu Hội viên không nhận được các ưu đãi và lợi ích từ chương trình do số điện thoại, email Hội viên có thay đổi mà không cập nhật vào hồ sơ hội viên hoặc do gửi ấn phẩm, thư tín qua đường bưu điện đến Hội viên bị thất lạc.
                                </p>
                                <p>
                                    - Mọi khiếu nại, yêu cầu bồi thường của Hội viên liên quan đến chương trình sẽ do Vietravel giải quyết. Sự giải quyết của Vietravel có giá trị áp dụng sau cùng.
                                </p>
                                <p>
                                    - Vietravel được phép sử dụng những thông tin của Hội viên trong các trường hợp: phục vụ cho việc nghiên cứu thị trường, lên kế hoạch kinh doanh nhằm phục vụ Hội viên tốt hơn của Vietravel hoặc đối tác chương trình, gửi phần thưởng hay các ấn phẩm đến Hội viên mà không cần sự đồng ý của Hội viên hoặc các trường hợp khác được Hội viên cho phép.
                                </p>
                                <p>
                                    - Hội viên được khuyến khích đọc kỹ và được xem như chấp nhận nội dung chương trình Khách hàng thân thiết VietravelPlus trước khi đăng ký trở thành Hội viên
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['submit'])) {
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $birthday = $_POST['birthday'];
    $phone_number = $_POST['phone_number'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    if ($_POST['password'] != $_POST['password2']) {
        $_SESSION['noti'] = "<p class='text-danger'>Mật khẩu nhập lại sai !!!</p>";
        header("location:register.php");
    } else {
        $pass = password_hash($password, PASSWORD_DEFAULT);
        $str = rand();
        $code = md5($str);
        $sql = "INSERT INTO `customers`(`user_name`, `password`, `email`, `birthday`, `phone_number`, `gender`,`code`) 
            VALUES ('$user_name','$pass','$email','$birthday','$phone_number','$gender','$code')";
        $res = mysqli_query($conn, $sql);

        if ($res) {
            require './phpmailer/Exception.php';
            require './phpmailer/PHPMailer.php';
            require './phpmailer/SMTP.php';

            // Instantiation and passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debug output
                $mail->isSMTP(); // gửi mail SMTP
                $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
                $mail->SMTPAuth = true; // Enable SMTP authentication
                $mail->Username = 'tuyetnhung01062001@gmail.com'; // SMTP username
                $mail->Password = 'xbcibtjbdmgahmiu'; // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
                $mail->Port = 587; // TCP port to connect to
                $mail->CharSet = 'UTF-8';
                //Recipients
                $mail->setFrom('tuyetnhung01062001@gmail.com', 'MyTour.com - Du lịch khắp mọi nơi');

                $mail->addReplyTo('tuyetnhung01062001@gmail.com', 'MyTour.com - Du lịch khắp mọi nơi'); // nhận phải hồi từ người nhận
                //$email = 'viethung3052001@gmail.com';
                $mail->addAddress($email); // Add a recipient // dia chi ng nhan

                // Attachments
                // $mail->addAttachment('pdf/XTT/'.$data[11].'.pdf', $data[11].'_1.pdf'); // Add attachments
                //$mail->addAttachment('pdf/Giay_bao_mat_sau.pdf'); // Optional name

                // Content
                $mail->isHTML(true);   // Set email format to HTML
                $subject = 'MyTour kính chào quý khách';
                $mail->Subject = $subject;

                $link = "http://localhost/webdattour/activeUser.php?email=" . $email . "&code=" . $code;
                // Mail body content 
                $bodyContent = '
                    <p>Cảm ơn quý khách đã đăng kí tour trên MyTour.</p>
                    <p>Xin quý khách vui lòng vào đường <a href=' . $link . '>Kích hoạt</a> 
                    này để có thể thanh toán tour. Thời hạn thanh toán
                    là 2 ngày kể từ ngày quý khách đăng kí. Nếu quý khách không thanh toán đúng hạn, thì 
                    yêu cầu đặt tour của quý khách sẽ bị hủy bỏ.</p>
                    <p>Kính mến!</p>
                ';
                $mail->Body = $bodyContent;
                // // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                if ($mail->send()) {
                    //echo 'Thư đã được gửi đi';
                    $_SESSION['noti'] = "<p class='text-success'>Đăng kí thành công! kiểm tra email để kích hoạt tài khoản.</p>";
                    header("location:register.php");
                } else {
                    // thư không được gửi đi
                    $_SESSION['noti'] = "<p class='text-danger'>Lỗi khi đăng kí</p>";
                    header("location:register.php");
                }
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        } else {
            $_SESSION['noti'] = "<p class='text-danger'>Lỗi khi đăng kí</p>";
            header("location:register.php");
        }
    }
}

include("./templates/footer.php");
?>