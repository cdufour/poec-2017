<?php
    session_start();
    // détruit la session et redirige vers accueil
    session_destroy();
    header('location:index.php');
?>