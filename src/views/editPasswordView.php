<?php
include 'includes/header.php';
use Controllers\AuthController as Auth;

if (!isset($_SESSION['isConnected']) || $_SESSION['isConnected'] === false) {
    header('Location: /login');
    exit();
}

list (
    'isEditPassword' => $isEditPassword,
    'isEditPasswordNotification' => $notification
    ) = Auth::EditPassword();
?>

<main>
    <h1>Change Password</h1>

    <?php if (isset($notification)): ?>
        <div class="$notification">
            <p><?= $notification ?></p>
        </div>
    <?php endif; ?>

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

