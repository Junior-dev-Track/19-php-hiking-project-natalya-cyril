<?php
include 'includes/header.php';
use Controllers\AuthController as Auth;
?>

<main>
    <h1>Change Password</h1>
    <div class="change-password-container">
        <form id="changePasswordForm" action="" method="post">
            <label for="OldPassword">Old Password :</label>
            <input id="OldPassword" type="password" name="oldPassword" placeholder="Old Password" required>
            <label for="NewPassword">New Password :</label>
            <input id="NewPassword" type="password" name="newPassword" placeholder="New Password" required>
            <label for="ConfirmPassword">Confirm Password :</label>
            <input id="ConfirmPassword" type="password" name="confirmPassword" placeholder="Confirm Password" required>
            <input type="submit" value="Change">
        </form>
    </div>
</main>

<?php
include 'includes/footer.php';
?>

