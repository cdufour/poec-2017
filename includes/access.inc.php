<?php

function isLogged() {
    if (isset($_SESSION['user'])) {
        return true;
    } else {
        return false;
    }
}

function getRole() {
    return $_SESSION['user']['role'];
}


?>