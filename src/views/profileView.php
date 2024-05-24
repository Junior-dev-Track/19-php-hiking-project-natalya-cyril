<?php
include 'includes/header.php'
?>

<main>
    <h1>Profile</h1>
    <div class="profile-container">
        <div class="profile-info">
            <h2>Profile Information</h2>
            <p>Username : <?= $_SESSION['username'] ?></p>
            <p>Role : <?= $_SESSION['role'] ?></p>
            <p>First name: <?= $_SESSION['firstname'] ?></p>
            <p>Last name: <?= $_SESSION['lastname'] ?></p>
            <p>Email : <?= $_SESSION['email'] ?></p>
        </div>
        <div class="profile-actions">
            <a href="#">Update Profile</a>
            <a href="#">Change Password</a>
        </div>
</main>


<?php
include 'includes/footer.php'
?>