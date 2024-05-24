<?php
include 'includes/header.php'

// todo: add the login form here

?>


    <h1>Login</h1>

    <div class="login-container">

        <form id="loginForm" action="" method="post">
            <label for="UserName">Username :</label>
            <input id="UserName" type="text" name="username" placeholder="Username" required>

            <div class="password">
                <label for="Password">Password :</label>
                <input id="Password" type="password" name="password" placeholder="Password" required>
            </div>

            <input type="submit" value="Login">
        </form>
    <a href="/signin">Not registered yet?</a>

    </div>

<?php
include 'includes/footer.php'
?>