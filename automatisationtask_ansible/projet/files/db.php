<?php

// Fonction pour vérifier l'authentification
function authenticate($username, $password) {
    $connection = new PDO('mysql:host=db1;dbname=demo', 'demo', 'demo');
    $statement = $connection->prepare('SELECT * FROM users WHERE username = :username');
    $statement->bindParam(':username', $username);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        return true; // Authentification réussie
    } else {
        return false; // Authentification échouée
    }
}

// Vérifie l'authentification lorsque le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $submittedUsername = $_POST['username'];
    $submittedPassword = $_POST['password'];

    if (authenticate($submittedUsername, $submittedPassword)) {
        echo 'Connexion réussie';
    } else {
        echo 'Nom d\'utilisateur ou mot de passe incorrect';
    }
}
?>

<!-- Formulaire HTML pour la connexion -->
<form method="post" action="">
    <label for="username">Nom d'utilisateur:</label>
    <input type="text" id="username" name="username" required><br>

    <label for="password">Mot de passe:</label>
    <input type="password" id="password" name="password" required><br>

    <input type="submit" value="Se connecter">
</form>