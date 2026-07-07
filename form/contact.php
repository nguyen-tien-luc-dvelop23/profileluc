<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Đường dẫn đến tệp autoload.php của PHPMailer

// Khởi tạo PHPMailer
$mail = new PHPMailer(true);

// Thiết lập các thông số gửi email
try {
    //Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.example.com'; // SMTP server của bạn
    $mail->SMTPAuth   = true;
    $mail->Username   = 'your_smtp_username'; // Tên người dùng SMTP
    $mail->Password   = 'your_smtp_password'; // Mật khẩu SMTP
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587; // Cổng SMTP, thay đổi nếu cần thiết

    //Recipients
    $mail->setFrom('from@example.com', 'Mailer');
    $mail->addAddress('your_email@gmail.com'); // Địa chỉ email của bạn

    // Content
    $mail->isHTML(true);
    $mail->Subject = $_POST['InputSubject']; // Chủ đề email
    $mail->Body    = "Name: {$_POST['InputName']} <br> Email: {$_POST['InputEmail']} <br> Message: {$_POST['InputMessage']}"; // Nội dung email, có thể được tạo dựa trên dữ liệu từ biểu mẫu

    // Gửi email
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
