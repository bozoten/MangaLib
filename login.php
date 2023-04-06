    <?php
        $title = 'Login page';
        require 'includes/header.php';
    ?>
<main>

    <h1>Account Login</h1>
    <h3>Your credentials please.</h3>

    <form method="post" action="login-popup.php">

            <label for="username">Username:</label>
            <input name="username" id="username" required type="email">

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>

        <button type="submit">Login</button>
    </form>
</main>
