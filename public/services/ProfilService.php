<?php

function findUserData() {
    $stmt = getPDO()->prepare("SELECT FIRST_NAME, FAMILY_NAME FROM USERS WHERE LOGIN_ID = :login_id");
    $stmt->bindValue(":login_id", $_SESSION['login_id'], PDO::PARAM_INT);
    if (!$stmt->execute() || $stmt->rowCount() == 0) {
        return array("firstName" => '', "familyName" => '');
    }

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return array("firstName" => $result['FIRST_NAME'], "familyName" => $result['FAMILY_NAME']);
}

function updateLoginData(array $postData) {
    $error = null;
    $success = 'MAJ OK';

    return array('success' => $success, 'error' => $error);
}

function updateUserData(array $postData) {
    $error = null;
    $success = 'MAJ OK';

    return array('success' => $success, 'error' => $error);
}