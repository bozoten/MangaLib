<?php
try {
    $sNumber = $_GET['sNumber'];

    require("includes/db.php");

    $sql = "SELECT * from animes WHERE sNumber = :sNumber";

    $cmd = $db->prepare($sql);
    $cmd->bindParam(':sNumber', $sNumber, PDO::PARAM_INT);

    $cmd->execute();
    $anime = $cmd->fetch();


    $animeName = $anime['animeName'];
    $episodes = $anime['episodes'];
    $genreId = $anime['genreId'];
    $sNumber = $anime['sNumber'];
    }
catch (Exception $e) {
    header('location:error.php');
}
?>


<?php
try {
$title = "Update anime";
require("includes/header.php");
}
catch (Exception $e) {
    header('location:error.php');
}
?>
<form action="update-popup.php" method="post">
    <H1>Edit anime</H1>

    <label for="animeName">Anime name:</label><br>
    <input type="text" id="animeName" name="animeName" value="<?php echo $animeName ?>"><br>

    <label for="episodes">Total number of episodes:</label><br>
    <input type="text" id="episodes" name="episodes" value="<?php echo $episodes?>"><br><br>




    <select name="genreId" id="genreId">
        <?php

        try {
        $sql = "SELECT * FROM genres";

        $cmd = $db->prepare($sql);

        $cmd->execute();

        $genres = $cmd->fetchAll();

        foreach ($genres as $genre) {

            if ($genreId == $genre['genreId']) {
                echo '<option selected value="' . $genre['genreId'] .
                    '">' . $genre['genreName'] . '</option>';
            }
            else {
                echo '<option value="' . $genre['genreId'] .
                    '">' . $genre['genreName'] . '</option>';
            }

        }

        $db = null;
        }
        catch (Exception $e) {
            header('location:error.php');
        }
        ?>
    </select>

    <button type="submit">Edit</button>
    <input type="hidden" id="sNumber" name="sNumber" value="<?php echo $sNumber?>"/><br><br>
</form>
</body>
</html>