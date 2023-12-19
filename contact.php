<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
header("Content-type: text/plain; charset=utf8");

require(__DIR__ . "/PHPMailer/src/PHPMailer.php");
require(__DIR__ . "/PHPMailer/src/SMTP.php");
require(__DIR__ . "/PHPMailer/src/Exception.php");


if (isset($_GET["firstname"]) && isset($_GET["lastname"]) && isset($_GET["email"]) && isset($_GET["message"])) {
    $firstname = $_GET["firstname"];
    $lastname = $_GET["lastname"];
    $email = $_GET["email"];
    $message = $_GET["message"];

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

    $mail->setFrom('jamel.agricole07@gmail.com', 'Jamel');
    $mail->addAddress('jamel.agricole07@gmail.com', 'Jamel');

    $mail->isHTML(true);
    $mail->Body =  "<p>" . $email . "<br>" . $message . "</p>";
    $mail->CharSet = PHPMailer\PHPMailer\PHPMailer::CHARSET_UTF8;

    if ($mail->send() != false) {
        header("Location: index.html");
        echo ("Votre message a bien été envoyé !");
    } else {
        header("Location: index.html");
    }
}
