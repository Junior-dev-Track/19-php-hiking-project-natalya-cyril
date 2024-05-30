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
        $_POST['hikeId'] = (int)$_POST['hikeId'];
        HikeController::updateHike($_POST);
        $notification = "Hike updated successfully.";
    } catch (Exception $e) {
        $notification = "Error: " . $e->getMessage();
    }
}

// Retrieve hike data for pre-filling the form
if (isset($_GET['hikeId'])) {
    $hikeId = (int)$_GET['hikeId'];
    $hike = HikeController::getHikeById($hikeId);
    if (!$hike) {
        // Handle the case where the hike is not found (maybe redirect or show an error)
        header('Location: /profile');
        exit();
    }
} else {
    // Handle the case where hikeId is not set (maybe redirect or show an error)
    header('Location: /profile');
    exit();
}
?>

<main>
    <h1>Edit Hike</h1>
    <?php if (isset($notification)): ?>
        <div class="notification">
            <p><?= htmlspecialchars($notification) ?></p>
        </div>
    <?php endif; ?>
    <form action="/editHike" method="post">
        <input type="hidden" name="hikeId" value="<?= htmlspecialchars($hike['id']) ?>">

        <label for="name">Hike Name:</label><br>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($hike['name']) ?>"><br>

        <label for="distance">Distance:</label><br>
        <input type="text" id="distance" name="distance" value="<?= htmlspecialchars($hike['distance']) ?>"><br>

        <label for="duration">Duration:</label><br>
        <input type="text" id="duration" name="duration" value="<?= htmlspecialchars($hike['duration']) ?>"><br>

        <label for="elevation_gain">Elevation Gain:</label><br>
        <input type="text" id="elevation_gain" name="elevation_gain" value="<?= htmlspecialchars($hike['elevation_gain']) ?>"><br>

        <label for="description">Description:</label><br>
        <textarea id="description" name="description"><?= htmlspecialchars($hike['description']) ?></textarea><br>

        <input type="submit" value="Update Hike">
    </form>

</main>

<?php
include 'includes/footer.php';
?>


