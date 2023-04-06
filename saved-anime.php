<?php
    try {
    $title = 'All anime';
    require("includes/header.php");
    }
    catch (Exception $e) {
        header('location:error.php');
    }
?>

    <h2>All Anime</h2>
    <a href="anime-description.php">Add more anime</a>
    <?php
        try {

        require("includes/db.php");

    
        $sql = "SELECT * FROM animes INNER JOIN genres ON animes.genreId = genres.genreId";

        $cmd = $db->prepare($sql);

        $cmd->execute();

        $animes = $cmd->fetchAll();


        echo '<table><thead><th>Serial number</th><th>Name</th><th>Episodes</th><th>Genre</th><th>Manage anime</th>
            </thead>';

        
        foreach ($animes as $anime) {
        
            echo '<tr>
                <td>' . $anime['sNumber'] . '</td>
                <td>' . $anime['animeName'] . '</td>
                <td>' . $anime['episodes'] . '</td>
                <td>' . $anime['genreName'] . '</td>
                <td>
                   <a href="delete-anime.php?sNumber=' . $anime['sNumber'] . '" title="delete" onclick="return confirmDelete();">Delete</a>
                   <a href="edit-anime.php?sNumber=' . $anime['sNumber'] . '" title="Edit" >Edit</a>
                </td>
                </tr>';
        }

        echo '</table>';

        $db = null;
        }
        catch (Exception $e) {
            header('location:error.php');
        }
        ?>
</body>
</html>