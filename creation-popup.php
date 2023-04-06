<?php
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
    $ok = true;

    if (empty($username)) {
        echo 'Username is required.<br />';
        $ok = false;
    }


    if (empty($password)) {
        echo 'Password is required.<br />';
        $ok = false;
    }

    if ($password != $confirm) {
        echo 'Passwords do not match.<br />';
        $ok = false;
    }


    if ($ok) {
        require('includes/db.php');

        $sql = "SELECT * FROM users WHERE username = :username";

        $cmd = $db->prepare($sql);

        $cmd->bindParam(':username', $username, PDO::PARAM_STR, 100);

        $cmd->execute();

        $user = $cmd->fetch();
            if (empty($user)) {
                $password = password_hash($password, PASSWORD_DEFAULT);

                $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";

                $cmd = $db->prepare($sql);

                $cmd->bindParam(':username', $username, PDO::PARAM_STR, 100);
                $cmd->bindParam(':password', $password, PDO::PARAM_STR, 255);

                $cmd->execute();
    }
        else {
            echo 'This user already exists try another one<br/>';
            exit();
        }

    $db = null;

    header('location:saved-anime.php');
}
?>