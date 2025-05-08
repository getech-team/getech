<?php
// Traitement du formulaire
$success = false;
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = htmlspecialchars(trim($_POST["name"] ?? ''));
    $email   = htmlspecialchars(trim($_POST["email"] ?? ''));
    $message = htmlspecialchars(trim($_POST["message"] ?? ''));

    if ($name && $email && $message && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $to = "orggetech@gmail.com"; // adresse du destinataire
        $subject = "Message depuis le site GeTech";
        $body = "Nom: $name\nEmail: $email\n\nMessage:\n$message";
        $headers = "From: $email";

        if (mail($to, $subject, $body, $headers)) {
            $success = true;
        } else {
            $error = "Une erreur est survenue lors de l'envoi.";
        }
    } else {
        $error = "Veuillez remplir tous les champs correctement.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Contact - GeTech</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <img src="images/logo_getech.ico" alt="Logo GeTech" class="logo" />
        <nav>
            <ul>
                <li><a href="index.html">Accueil</a></li>
                <li><a href="projets.html">Projets</a></li>
                <li><a href="telechargements.html">Téléchargements</a></li>
                <li><a href="equipe.html">Équipe</a></li>
                <li><a href="contacts.php" class="active">Contacts</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="contacts">
            <h2>Nous contacter</h2>
            <?php if ($success): ?>
                <p style="color: green;">Votre message a été envoyé avec succès.</p>
            <?php elseif ($error): ?>
                <p style="color: red;"><?= $error ?></p>
            <?php endif; ?>

            <form method="post" action="contacts.php" class="contact-form">
                <label for="name">Nom :</label>
                <input type="text" name="name" id="name" required>

                <label for="email">Email :</label>
                <input type="email" name="email" id="email" required>

                <label for="message">Message :</label>
                <textarea name="message" id="message" rows="5" required></textarea>

                <button type="submit">Envoyer</button>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 GeTech. Tous droits réservés.</p>
        <img src="images/logo_getech.ico" alt="Logo GeTech" class="footer-logo" />
    </footer>
</body>
</html>
