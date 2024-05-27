<?php
include 'includes/header.php';

use Models\Hikes;
use Models\Users;

$hikeId = isset($_GET['id']) ? (int)$_GET['id'] : null;


if ($hikeId === null) {
    echo "Invalid hike ID.";
    exit;
}

$hikeDetails = Hikes::getHikeDetails($hikeId);
$userModel = new Users();
$userDetails = $userModel->getUserDetails($hikeDetails['user_id']);

if ($hikeDetails === null) {
    echo "Hike not found.";
    exit;
}

    echo "<h1>Hike details</h1>";

    // Display the hike details
    echo "<h1>" . $hikeDetails['name'] . "</h1>";
    echo "<p>Distance: " . $hikeDetails['distance'] . " km</p>";
    // Other details
echo "<p>Duration: " . $hikeDetails['duration'] . "</p>";

// Display the hike details
echo "<p>Elevation Gain: " . $hikeDetails['elevation_gain'] . "</p>";
echo "<p>Description: " . $hikeDetails['description'] . "</p>";
echo "<p>Created At: " . $hikeDetails['created_at'] . "</p>";
echo "<p>Updated At: " . $hikeDetails['updated_at'] . "</p>";
echo "<p>User: " . $hikeDetails['user_id'] . "</p>";
echo "<p>User Name: " . $userDetails['username'] . "</p>";

// Display the image from the Hikes table
echo "<img src='" . $hikeDetails['picture_url'] . "' alt='Hike Image' width='500' height='300'>";

// Hyperlink to the home page
echo "<a href='home'>Go back</a>";

include 'includes/footer.php';