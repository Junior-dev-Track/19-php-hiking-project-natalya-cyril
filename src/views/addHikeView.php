<?php
include 'includes/header.php';
use Controllers\HikesController as HikeController;

// Ensure the user is authenticated
if (!isset($_SESSION['isConnected']) || $_SESSION['isConnected'] === false) {
    header('Location: /login');
    exit();
}

// Handle form submission
if ($_POST) {
    try {
        HikeController::addHike($_POST);
        $notification = "Hike added successfully.";
    } catch (Exception $e) {
        $notification = "Error: " . $e->getMessage();
    }
}
?>

<main>
    <h1>Add Hike</h1>
    <?php if (isset($notification)): ?>
        <div class="notification">
            <p><?= htmlspecialchars($notification) ?></p>
        </div>
    <?php endif; ?>
    <form action="/addHike" method="post">
        <label for="name">Hike Name:</label><br>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>"><br>

        <label for="distance">Distance:</label><br>
        <input type="text" id="distance" name="distance" value="<?= htmlspecialchars($_POST['distance'] ?? '') ?>"><br>

        <label for="duration">Duration:</label><br>
        <input type="text" id="duration" name="duration" value="<?= htmlspecialchars($_POST['duration'] ?? '') ?>"><br>

        <label for="elevation_gain">Elevation Gain:</label><br>
        <input type="text" id="elevation_gain" name="elevation_gain" value="<?= htmlspecialchars($_POST['elevation_gain'] ?? '') ?>"><br>

        <label for="description">Description:</label><br>
        <textarea id="description" name="description"><?= htmlspecialchars($_POST['description'] ?? '') ?></textarea><br>


        <input type="hidden" name="user_id" value="<?= htmlspecialchars($_SESSION['id']) ?>">

        <input type="submit" value="Add Hike">
    </form>
</main>

<?php
include 'includes/footer.php';
?>

