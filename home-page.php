<?php
try {
    $title = "Home page";
    require("includes/header.php");
}
catch (Exception $e) {
    header('location:error.php');
}
?>


<p>
        K-animemanager is another great option among the hundreds of different sites for tracking your anime and manga viewing.
        It offers a clean and easy-to-use interface, and allows you to keep track of the episodes you've watched,
        the shows you've completed, and the ones you're currently watching. You can also create, edit and delete each show at any give moment.
</p>

</body>
</html>