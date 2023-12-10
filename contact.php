<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (isset($_POST["contact"])){
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = 'jamel.agricole07@gmail.com';
    $mail->Password = 'txosyygpgsukjkpx';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('jamel.agricole07@gmail.com');
    
    $mail->addAddress($_POST["email"]);

    $mail->isHTML(true);

    // $mail->Subject = $_POST[]
    $mail->Body = $_POST["message"];

    $mail->send();

    echo
    "
    <script>
        alert(Votre message a été envoyé');
        document.location.href = 'index.html
    </script>
    ";
}
?>
