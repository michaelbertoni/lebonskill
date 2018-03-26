<?php

function register($username, $password) {
    $bdd = getConnection();

    $stmt = $bdd->prepare("SELECT ID FROM LOGINS WHERE USERNAME = :username");
    $stmt->bindValue('username', $username, PDO::PARAM_STR);
    if (!$stmt->execute()) {
        return "Impossible de vérifier la présence du nom d'utilisateur dans la base.<br>Erreur : " . $stmt->print_r($stmt->errorInfo());
    }
    else if ($stmt->rowCount() > 0) {
        return "Le nom d'utilisateur existe déjà.<br>Veuillez en sélectionner un nouveau.";
    }

    $stmt = $bdd->prepare("INSERT INTO LOGINS (USERNAME, PASSWORD_HASH) VALUES (:username, :password_hash)");
    $stmt->bindValue('username', $username, PDO::PARAM_STR);
    $stmt->bindValue('password_hash', password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR);
    if (!$stmt->execute()) {
        return "Impossible de créer un nouveau utilisateur.<br>Erreur : " . $stmt->print_r($stmt->errorInfo());
    }
    else {
        $_SESSION['login_id'] = $bdd->lastInsertId();
        return null;
    }
}