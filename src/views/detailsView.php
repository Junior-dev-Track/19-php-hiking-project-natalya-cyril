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
//    echo "<h1>Hike details</h1>";
?>

<p>START</p>

<div class="grid grid-rows-3 grid-flow-col gap-4">
    <div class="row-span-3 p-4 border border-gray-200 rounded-lg shadow-lg overflow-hidden">
        <?php
        // Display the image from the Hikes table
        echo "<img src='" . htmlspecialchars($hikeDetails['picture_url'], ENT_QUOTES, 'UTF-8') . "' alt='Hike Image' width='500' height='300' class='w-full h-auto'>";
        ?>
        <iframe class='border mt-5 border-gray-200 rounded-lg shadow-lg overflow-hidden'
                src='https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d53147.006939295585!2d-84.67094710692703!3d33.639332613621!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88f4fc2a15298593%3A0xa3f9172e00fafefa!2sForest%20Park%2C%20G%C3%A9orgie%2C%20%C3%89tats-Unis!5e0!3m2!1sfr!2sbe!4v1716924927224!5m2!1sfr!2sbe'
                width='400' height='400'
                style='border:0;'
                allowfullscreen=''
                loading='lazy'
                referrerpolicy='no-referrer-when-downgrade'></iframe>
     </div>
    <div class="row-span-2 col-span-2 p-4 border border-gray-200 rounded-lg shadow-lg">
        <?php
        // Display the hike details
        echo "<h1 class='text-xl font-bold'>" . htmlspecialchars($hikeDetails['name'], ENT_QUOTES, 'UTF-8') . "</h1>";
        echo "<p>Distance: " . htmlspecialchars($hikeDetails['distance'], ENT_QUOTES, 'UTF-8') . " km</p>";
        echo "<p>Duration: " . htmlspecialchars($hikeDetails['duration'], ENT_QUOTES, 'UTF-8') . "</p>";
        echo "<p>Elevation Gain: " . htmlspecialchars($hikeDetails['elevation_gain'], ENT_QUOTES, 'UTF-8') . "</p>";

        echo "<p>Created At: " . htmlspecialchars($hikeDetails['created_at'], ENT_QUOTES, 'UTF-8') . "</p>";
        echo "<p>Updated At: " . htmlspecialchars($hikeDetails['updated_at'], ENT_QUOTES, 'UTF-8') . "</p>";
        echo "<br>";
        echo "<p>Description: " . htmlspecialchars($hikeDetails['description'], ENT_QUOTES, 'UTF-8') . "</p>";
        ?>
    </div>
    <div class="col-span-2 p-4 border border-gray-200 rounded-lg shadow-lg">
        <div class="flex items-start space-x-4">
            <?php
            // Display the user details
            echo "<img src='" . htmlspecialchars($userDetails['profile_picture'], ENT_QUOTES, 'UTF-8') . "' alt='Profile Picture' class='rounded-full' width='100' height='100'>";
            echo "<div>";
            echo "<p>Name: " . htmlspecialchars($userDetails['username'], ENT_QUOTES, 'UTF-8') . "</p>";
            echo "<p>Total hikes: 30</p>";
            echo "<p class='italic'>\"Mountains are the beginning and the end of all landscapes.\"</p>";
            // Display SVGs in a row
            echo '<div class="flex space-x-2 mt-2">';
            echo '<svg class="w-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M512 256C512 114.6 397.4 0 256 0S0 114.6 0 256C0 376 82.7 476.8 194.2 504.5V334.2H141.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H287V510.1C413.8 494.8 512 386.9 512 256h0z"/></svg>';
            echo '<svg class="w-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M512 256C512 114.6 397.4 0 256 0S0 114.6 0 256C0 376 82.7 476.8 194.2 504.5V334.2H141.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H287V510.1C413.8 494.8 512 386.9 512 256h0z"/></svg>';
            echo '<svg class="w-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M512 256C512 114.6 397.4 0 256 0S0 114.6 0 256C0 376 82.7 476.8 194.2 504.5V334.2H141.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H287V510.1C413.8 494.8 512 386.9 512 256h0z"/></svg>';
            echo '<svg class="w-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M512 256C512 114.6 397.4 0 256 0S0 114.6 0 256C0 376 82.7 476.8 194.2 504.5V334.2H141.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H287V510.1C413.8 494.8 512 386.9 512 256h0z"/></svg>';
            echo '</div>';
            echo "</div>";
            ?>
        </div>
    </div>


</div>












<p>END</p>
<?php
//    // Display the hike details
//    echo "<h1>" . $hikeDetails['name'] . "</h1>";
//    echo "<p>Distance: " . $hikeDetails['distance'] . " km</p>";
//    // Other details
//echo "<p>Duration: " . $hikeDetails['duration'] . "</p>";
//
//// Display the hike details
//echo "<p>Elevation Gain: " . $hikeDetails['elevation_gain'] . "</p>";
//echo "<p>Description: " . $hikeDetails['description'] . "</p>";
//echo "<p>Created At: " . $hikeDetails['created_at'] . "</p>";
//echo "<p>Updated At: " . $hikeDetails['updated_at'] . "</p>";
//
//// Display the user details
//echo "<p>User: " . $hikeDetails['user_id'] . "</p>";
//echo "<p>User Name: " . $userDetails['username'] . "</p>";
//echo "<img src='" . $userDetails['profile_picture'] . "' alt='Profile Picture' class='rounded-full' width='100' height='100'>";
//
//// Display the image from the Hikes table
//echo "<img src='" . $hikeDetails['picture_url'] . "' alt='Hike Image' width='500' height='300'>";
//echo "<br>";
// Hyperlink to the previous page
echo "<a href='" . $_SERVER['HTTP_REFERER'] . "'>Go back</a>";
include 'includes/footer.php';
?>
