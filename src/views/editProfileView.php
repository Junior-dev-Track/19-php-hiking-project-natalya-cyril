<?php
include 'includes/header.php';
use Controllers\AuthController as Auth;

if (!isset($_SESSION['isConnected']) || $_SESSION['isConnected'] === false) {
    header('Location: /login');
    exit();
}

if ($_POST) {
list (
        'isAllEdited' => $isAllEdited,
        'notification' => $notification
    ) = Auth::EditProfile();

}


?>
<main>
    <h1>Update Profile</h1>
    <?php if (isset($notification)): ?>
        <div class="$notification">
            <p><?= $notification ?></p>
        </div>
    <?php endif; ?>
    <form action="" method="POST">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" value="<?= $_SESSION['username'] ?>" required>
        <label for="firstname">First Name</label>
        <input type="text" name="firstname" id="firstname" value="<?= $_SESSION['firstname'] ?>" required>
        <label for="lastname">Last Name</label>
        <input type="text" name="lastname" id="lastname" value="<?= $_SESSION['lastname'] ?>" required>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="<?= $_SESSION['email'] ?>" required>
        <button type="submit">Update</button>
    </form>
</main>


<?php
include 'includes/footer.php'
?>

