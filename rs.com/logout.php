<?php
    session_start();
    unset($_SESSION['username']);
    header('Location: runescape.php');
?>