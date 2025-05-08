<?php
// Chargement des variables d'environnement
require_once '../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Dotenv\Dotenv;

// Charger les variables d'environnement
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// Configuration de PHPMailer
$mail = new PHPMailer(true);

try {
    // Paramétrer le serveur SMTP
    $mail->isSMTP();
    $mail->Host = $_ENV['SMTP_HOST'];
    $mail->SMTPAuth = true;
    $mail->Username = $_ENV['GMAIL_USER']; // Utilisez votre email Gmail
    $mail->Password = $_ENV['GMAIL_PASSWORD']; // Utilisez le mot de passe d'application
    $mail->SMTPSecure = $_ENV['SMTP_ENCRYPTION'];
    $mail->Port = $_ENV['SMTP_PORT'];

    // Destinataires
    $mail->setFrom($_ENV['GMAIL_USER'], 'GeTech');
    $mail->addAddress('recipient@example.com', 'Nom Destinataire');

    // Contenu de l'email
    $mail->isHTML(true);
    $mail->Subject = 'Test Email de GeTech';
    $mail->Body    = 'Ceci est un test de l\'envoi d\'email via Gmail SMTP avec PHPMailer et Railway.';

    // Envoi de l'email
    $mail->send();
    echo 'Email envoyé avec succès.';
} catch (Exception $e) {
    echo "Erreur d'envoi de l'email: {$mail->ErrorInfo}";
}
?>
