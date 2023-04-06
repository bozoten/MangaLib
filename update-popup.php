<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Save Popup</title>
</head>
<body>
<?php
try {
$animeName = $_POST['animeName'];
$episodes = $_POST['episodes'];
$genreId = $_POST['genreId'];
$sNumber = $_POST['sNumber'];
$ok = true;


if (empty($animeName)) {
    echo '<p>Name is required.</p>';
    $ok = false;
}


if (empty($episodes)) {
    echo '<p>episodes is required.</p>';
    $ok = false;
}

if (empty($sNumber)) {
    echo '<p>Serial Number is required.</p>';
    $ok = false;
}


if (empty($genreId)) {
    echo '<p>genre is required.</p>';
    $ok = false;
}
else if (!is_numeric($genreId)) {
    echo '<p>genre must be numeric.</p>';
    $ok = false;
}


if ($ok) {

    require("includes/db.php");


    $sql = "UPDATE animes SET animeName = :animeName, episodes = :episodes, genreId = :genreId
            WHERE sNumber = :sNumber";


    $cmd = $db->prepare($sql);
    $cmd->bindParam(':animeName', $animeName, PDO::PARAM_STR, 255);
    $cmd->bindParam(':episodes', $episodes, PDO::PARAM_INT);
    $cmd->bindParam(':genreId', $genreId, PDO::PARAM_INT);
    $cmd->bindParam(':sNumber', $sNumber, PDO::PARAM_INT);


    $cmd->execute();


    $db = null;

    echo "You've saved your Anime successfully. Congrats!";
}
header('location:saved-anime.php');
}
catch (Exception $e) {
    header('location:error.php');
}
?>
