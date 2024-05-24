<?php
include 'includes/header.php';
use Controllers\AuthController as Auth;

list(
    'isValidForm' => $isValidForm,
    'formVerificationError' => $notification
) = Auth::userInfoCheck();

if ($isValidForm) {
    list(
        'isNewUser' => $isNewUser,
        'isValidUserNotification' => $notification
    ) = Auth::registerUser();

    if ($isNewUser) {
        header("Location: /home");
        exit();
    }
}

?>


    <h1>Sign in</h1>

    <?php if (isset($notification)): ?>
        <div class="$notification">
            <p><?= $notification ?></p>
        </div>
    <?php endif; ?>

    <div class="signin-container">
        <form id="signInForm" action="" method="post">
            <label for="UserName">Username :</label>
            <input id="UserName" type="text" name="username" placeholder="Username" required>

            <div class="nameLastname">
                <label for="Name">Name :</label>
                <input  id="Name" type="text" name="name" placeholder="Name">
                <label for="LastName">Last name :</label>
                <input  id="LastName" type="text" name="lastname" placeholder="Last name">
            </div>

            <div class="password">
                <label for="Password">Password :</label>
                <input id="Password" type="password" name="password" placeholder="Password" required>

                <label for="ConfirmPassword">Confirm password :</label>
                <input id="ConfirmPassword" type="password" name="confirm_password" placeholder="Confirm password" required>
            </div>

            <div class="email">
                <label for="Email">Email :</label>
                <input id="Email" type="email" name="email" placeholder="email" required>

                <label for="ConfirmEmail">Confirm email :</label>
                <input id="ConfirmEmail" type="email" name="confirm_email" placeholder="Confirm email" required>
            </div>
            <input type="submit" value="sign in">
        </form>

<?php
include 'includes/footer.php'
?>