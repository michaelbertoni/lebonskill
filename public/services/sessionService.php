<?php

require("services/DbService.php");

function refreshUsernameFromSessionUserId() {
    if (!isset($_SESSION['username'])) {
        $stmt = getConnection()->prepare("SELECT USERNAME FROM LOGINS WHERE ID = :id");
        $stmt->bindValue(":id", $_SESSION['login_id'], PDO::PARAM_INT);
        if ($stmt->execute()) {
            $_SESSION['username'] = $stmt->fetch(PDO::FETCH_ASSOC)['USERNAME'];
        }
    }
}