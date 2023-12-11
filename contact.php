<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
header("Content-type: text/plain; charset=utf8");

require(__DIR__ . "/PHPMailer/src/PHPMailer.php");
require(__DIR__ . "/PHPMailer/src/SMTP.php");
require(__DIR__ . "/PHPMailer/src/Exception.php");


if (isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["email"]) && isset($_POST["message"])) {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->SMTPDebug = true;
    $mail->SMTPDebug = 1; // Active/désactive les messages de mise au point
    $mail->isSMTP(); // Utilise le protocole SMTP
    $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_SMTPS; // Active le cryptage sécurisé TLS
    $mail->Host = "smtp.gmail.com"; // Configure le nom du serveur SMTP
    $mail->Port = 465; // Configure le numéro de port
    $mail->SMTPAuth = true; // Active le mode authentification
    $mail->Username = 'jamel.agricole07@gmail.com';
    $mail->Password = 'txosyygpgsukjkpx';

    $mail->setFrom($email, $firstname, $lastname);
    $mail->addAddress('jamel.agricole07@gmail.com');

    $mail->isHTML(true);
    $mail->Body = $message;
    $mail->CharSet = PHPMailer\PHPMailer\PHPMailer::CHARSET_UTF8;

    if ($mail->send() != false) {
        header("Location : ./email_error");
        // echo ("Le message électronique a été transmis.\n");
    } else {
        header("Location : ./email_error");
        // echo ("Le message électronique n'a pas été transmis.\n");
        // echo ("Mailer Error: " . $mail->ErrorInfo);
    }
}
