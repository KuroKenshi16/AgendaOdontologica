<?php
    session_start();
    unset($_SESSION['email']);
    unset($_SESSION['password']);
    header("Location: src/acess/model/acesso.html");
?>