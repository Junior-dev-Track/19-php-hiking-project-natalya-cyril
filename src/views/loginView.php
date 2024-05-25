<?php
include 'includes/header.php';
use Controllers\AuthController as Auth;

// todo: add the login form here
list (
'isValidUser' => $isValidUser,
'isValidUserNotification' => $notification
) = Auth::loginUser();

?>

<main>
    <h1>Login</h1>

    <?php if (isset($notification)): ?>
        <div class="$notification">
            <p><?= $notification ?></p>
        </div>
    <?php endif; ?>

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
    <a href="/signin">Not registered yet ?</a>
    <a href="/forgotPassword">Forgot password ?</a>


    </div>
</main>

<?php
include 'includes/footer.php'
?>