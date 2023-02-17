<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saved Anime</title>
</head>
<body>
<nav>
  <a href="anime-description.php">Add more anime</a>
</nav>
    <h2>All Anime</h2>
    <?php
        
        $db = new PDO('mysql:host=172.31.22.43;dbname=Shridhara1175516', 'Shridhara1175516', '6acaa6dmXB');

    
        $sql = "SELECT * FROM animes INNER JOIN genres ON animes.genreId = genres.genreId";

        $cmd = $db->prepare($sql);

        $cmd->execute();

        $animes = $cmd->fetchAll();


        echo '<table><thead><th>Name</th><th>Episodes</th><th>Genre</th>
            </thead>';

        
        foreach ($animes as $anime) {
        
            echo '<tr>
                <td>' . $anime['animeName'] . '</td>
                <td>' . $anime['episodes'] . '</td>
                <td>' . $anime['genreName'] . '</td>
                </tr>';
        }

        echo '</table>';

        $db = null;
        ?>
</body>
</html>