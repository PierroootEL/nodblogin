<?php
     session_start();

        if (empty($_SESSION['token']) || $_SESSION['token_num'] !== $_SESSION['token']) {
            session_abort();
            header('Location: login.php');
        }

        echo("Hello, " . $_SESSION['username']);
?>
