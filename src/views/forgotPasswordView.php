<?php
include 'includes/header.php';

use Controllers\AuthController;

if (isset($_POST['email'])) {
    AuthController::forgotPassword($_POST['email']);
}
?>


<main>
    <h1>Forgot Password</h1>
    <div class="forgot-password-container">
        <form id="forgotPasswordForm" action="" method="post">
            <label for="Email">Email :</label>
            <input id="Email" type="email" name="email" placeholder="Email" required>
            <input type="submit" value="Send">
        </form>
    </div>
</main>

<?php
include 'includes/footer.php'
?>
