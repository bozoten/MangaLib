<?php
try {
$title = "Error page";
require("includes/header.php");
}
catch (Exception $e) {
    header('location:error.php');
}
?>
<body>
<h1>It seems like there was an error.... Please click the link above to try again.</h1>
</body>
</html>