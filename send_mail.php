<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $subject = htmlspecialchars($_POST["subject"]);
    $message = htmlspecialchars($_POST["message"]);

    $to = "votre-email@exemple.com";
    $headers = "From: $email";
    $fullMessage = "Nom: $name\nEmail: $email\nMessage:\n$message";

    if (mail($to, $subject, $fullMessage, $headers)) {
        echo "Message envoyé avec succès.";
    } else {
        echo "Une erreur est survenue lors de l'envoi.";
    }
}
?>
