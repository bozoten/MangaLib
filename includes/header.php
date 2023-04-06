<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <script src="js/scripts.js"></script>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
    <header>
        <nav>
            <a href="home-page.php">Home page</a>
            <?php

            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            if (empty($_SESSION['user'])) {
                ?>
                    <a href="create-account.php">Create Account</a>
                    <a href="login.php">Login</a>
                <?php
            }

            else {
                ?>
                    <a href="#"><?php echo $_SESSION['user'] ?></a>
                    <a href="logout.php">Logout</a>
                <?php
            }
            ?>
        </nav>
    </header>