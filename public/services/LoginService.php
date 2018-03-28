<?php

require_once "repository/LoginRepository.php";

class LoginService {

    /**
     * @param $username
     * @param $password
     * @return null|string
     */
    public static function login($username, $password)
    {
        $error = null;

        try {
            $stmt = LoginRepository::findLoginByUsername($username);

            $result = $stmt->fetch();
            if ($stmt->rowCount() == 0) {
                $error = "Ce nom d'utilisateur n'existe pas dans la base.";
            }
            else if (!password_verify($password, $result['PASSWORD_HASH'])) {
                $error = "Mot de passe incorrect.";
            }
            else {
                $_SESSION['login_id'] = $result['ID'];
            }
        }
        catch (Exception $e) {
            $error = $e->getMessage();
        }

        return $error;
    }

    /**
     * @param $username
     * @param $password
     * @return null|string
     */
    public static function register($username, $password)
    {
        $error = null;

        try {
            if (LoginRepository::isLoginExists($username)) {
                return "Le nom d'utilisateur existe déjà.<br>Veuillez en sélectionner un nouveau.";
            }

            $_SESSION['login_id'] = LoginRepository::createLogin($username, password_hash($password, PASSWORD_DEFAULT));
        }
        catch (Exception $e) {
            $error = $e->getMessage();
        }

        return $error;
    }
}

