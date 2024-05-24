<?php
include 'includes/header.php';

use Controllers\HikesController;
use Models\Hikes;

$hikeId = isset($_GET['id']) ? (int)$_GET['id'] : null;

if ($hikeId === null) {
    echo "Invalid hike ID.";
    exit;
}

$hikeDetails = Hikes::getHikeDetails($hikeId);

if ($hikeDetails === null) {
    echo "Hike not found.";
    exit;
}
?>


    <h1>Hike details</h1>
<?php
    // Display the hike details
    echo "<h1>" . $hikeDetails['name'] . "</h1>";
    echo "<p>Distance: " . $hikeDetails['distance'] . " km</p>";
    // Other details
echo "<p>Duration: " . $hikeDetails['duration'] . "</p>";
echo "<p>Elevation Gain: " . $hikeDetails['elevation_gain'] . "</p>";
echo "<p>Description: " . $hikeDetails['description'] . "</p>";
echo "<p>Created At: " . $hikeDetails['created_at'] . "</p>";
echo "<p>Updated At: " . $hikeDetails['updated_at'] . "</p>";


include 'includes/footer.php'
?>