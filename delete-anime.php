<?php
try {
    $sNumber = $_GET['sNumber'];
    if (empty($sNumber)) {
        echo 'Serial Number is empty';
        header('location:saved-anime.php');
    } else {

        require("includes/db.php");

        $sql = "DELETE FROM animes where sNumber = :sNumber;";

        $cmd = $db->prepare($sql);
        $cmd->bindParam(':sNumber', $sNumber, PDO::PARAM_STR);

        $cmd->execute();

        $db = null;

        header('location:saved-anime.php');

    }
}
catch (Exception $e) {
    header('location:error.php');
}
?>