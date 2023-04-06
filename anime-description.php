<?php
$title = 'Add anime';
require("includes/header.php");
?>

<form action="save-popup.php" method="post">
    <H1>Add anime</H1>

  <label for="animeName">Anime name:</label><br>
  <input type="text" id="animeName" name="animeName"><br>

  <label for="episodes">Total number of episodes:</label><br>
  <input type="text" id="episodes" name="episodes"><br><br>

    <label for="sNumber">Serial number</label><br>
    <input type="text" id="sNumber" name="sNumber"><br><br>


    <select name="genreId" id="genreId"
        <?php
        try {

            require("includes/db.php");

            $sql = "SELECT * FROM genres";

            $cmd = $db->prepare($sql);

            $cmd->execute();

            $genres = $cmd->fetchAll();

            foreach ($genres as $genre) {
                echo '<option value="' . $genre['genreId'] .
                    '">' . $genre['genreName'] . '</option>';
            }

            $db = null;
        }
        catch (Exception $e) {
            header('location:error.php');
        }
        ?>
    </select>

  <button type="submit">Submit</button>
</form> 
</body>
</html>