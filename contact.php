<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
header("Content-type: text/plain; charset=utf-8");

if (isset($_GET["nom"]) && isset($_GET["adresseMail"])) {
    if (($_GET["nom"] != "") && ($_GET["adresseMail"] != "")) {
        require(__DIR__ . "/src/PHPMailer.php"); // Ajoute le fichier contenant le code de la classe PHPMailer
        require(__DIR__ . "/src/SMTP.php"); // le code de la classe SMTP
        require(__DIR__ . "/src/Exception.php"); // le code de la classe Exception
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        // Configuration du serveur SMTP
        $mail->SMTPDebug = 0; // Active/désactive les messages de mise au point
        $mail->isSMTP(); // Utilise le protocole SMTP
        $mail->Host = "smtp.gmail.com"; // Configure le nom du serveur SMTP
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_SMTPS; // Active le cryptage sécurisé TLS
        $mail->Port = 465; // Configure le numéro de port
        $mail->SMTPAuth = true; // Active le mode authentification
        $mail->Username = "jamel.agricole.iut@gmail.com"; // Identifiant du compte SMTP
        $mail->Password = "kgsiubxeyjzayxfp"; // Mot de passe du compte SMTP
        // Destinataires
        $mail->setFrom("jamel.agricole.iut@gmail.com", "Mailer");
        $mail->addAddress("Jamel.Agricole.Etu@univ-lemans.fr", "Jamel Agricole"); // Ajout du destinataire
        $mail->addAddress($_GET["email"] , $_GET["firstname"]);
        // Contenu du mail
        $mail->isHTML(true);
        $mail->Subject = "Retour du formulaire de contact";
        $mail->Body = "Votre demande a bien été prise en compte ";
        $mail->CharSet = PHPMailer\PHPMailer\PHPMailer::CHARSET_UTF8;
        if ($mail->send() != false) {
            echo ("Le message électronique a été transmis.\n");
        } else {
            echo ("Le message électronique n'a pas été transmis.\n");
            echo ("Mailer Error: " . $mail->ErrorInfo);
        }

        echo ("Votre nom est " . $_GET["nom"] . "\n");
        echo ("Votre adrese Mail est " . $_GET["adresseMail"] . "\n");
    } else {
        header("Location: index.html#contact");
    }
} else {
    header("Location: index.html#contact");
}
