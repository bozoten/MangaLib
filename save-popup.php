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
    $animeName = $_POST['animeName'];
    $episodes = $_POST['episodes'];
    $genreId = $_POST['genreId'];
    $ok = true;


    if (empty($animeName)) {
        echo '<p>Name is required.</p>';
        $ok = false;
    }

    if (empty($episodes)) {
        echo '<p>episodes is required.</p>';
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

        $db = new PDO('mysql:host=172.31.22.43;dbname=Shridhara1175516', 'Shridhara1175516', '6acaa6dmXB');

        
        $sql = "INSERT INTO animes (animeName, episodes, genreId) 
            VALUES (:animeName, :episodes, :genreId)";

 
        $cmd = $db->prepare($sql);
        $cmd->bindParam(':animeName', $animeName, PDO::PARAM_STR, 255);
        $cmd->bindParam(':episodes', $episodes, PDO::PARAM_INT);
        $cmd->bindParam(':genreId', $genreId, PDO::PARAM_INT);


        $cmd->execute();


        $db = null;

        echo "You've saved your Anime succesfully. Congrats!";
    }
    ?>
<nav>
  <a href="anime-description.php">add more anime</a> 
  <a href="saved-anime.php">view all anime</a> 
</nav>
</body>
</html>