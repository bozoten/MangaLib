<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anime Descripton</title>
</head>
<body>
<nav>
  <a href="saved-anime.php">All Anime</a> 
</nav>
<form action="save-popup.php" method="post">

  <label for="animeName">Anime name:</label><br>
  <input type="text" id="animeName" name="animeName"><br>

  <label for="episodes">Total number of episodes:</label><br>
  <input type="text" id="episodes" name="episodes"><br><br>

  <select name="genreId" id="genreId">
  <?php
                    
                    $db = new PDO('mysql:host=172.31.22.43;dbname=Shridhara1175516', 'Shridhara1175516', '6acaa6dmXB');

                    $sql = "SELECT * FROM genres";

                    $cmd = $db->prepare($sql);

                    $cmd->execute();

                    $genres = $cmd->fetchAll();

                    foreach ($genres as $genre) {
                        echo '<option value="' . $genre['genreId'] .
                            '">' . $genre['genreName'] . '</option>';
                    }

                    $db = null;
                    ?>
  </select>
  <button type="submit">Submit</button>
</form> 
</body>
</html>