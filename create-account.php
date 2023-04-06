<?php
$title = 'Create page';
require 'includes/header.php';
?>
<main>
    <h1>Account creation</h1>

    <h6>Passwords must be a minimum of 8 characters, including 1 digit, 1 upper-case letter, and 1 lower-case letter.</h6>

    <form method="post" action="creation-popup.php">

            <label for="username">username:</label>
            <input name="username" id="username" required type="email" placeholder="email@email.com" />

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" />

            <label for="confirm">Confirm Password:</label>
            <input type="password" name="confirm" id="confirm" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" />

        <span id="passwordMessage"></span>

        <button onClick="return comparePasswords();" type="submit">Create account</button>
    </form>
</main>
