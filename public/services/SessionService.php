<?php

require_once "repositories/LoginRepository.php";

function findUsernameFromSession() {
    if (empty($_SESSION['username'])) {
        $_SESSION['username'] = findUsernameByLoginId($_SESSION['login_id']);
    }
    return $_SESSION['username'];
}

