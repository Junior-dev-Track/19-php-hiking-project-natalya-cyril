<?php
declare(strict_types=1);

use Controllers\HikesController;
use Models\Hikes;

// Import the Hikes class

$page1 = isset($_GET['page']) ? (int)$_GET['page'] : 1;
HikesController::test();
HikesController::getHikeNames();
$hikeNames = HikesController::getHikeNames($page1); // Get the first page
$totalHikes = Hikes::getTotalHikes();
$itemsPerPage = 6;
$totalPages = ceil($totalHikes / $itemsPerPage);
?>

    <h2>List of hikes</h2>
<?php foreach ($hikeNames as $hike): ?>
    <h3><a href="details?id=<?php echo $hike['id']; ?>"><?php echo $hike['name']; ?></a>
        - <?php echo $hike['distance']; ?> km
        - Duration: <?php echo $hike['duration']; ?> hours
        - Elevation Gain: <?php echo $hike['elevation_gain']; ?> meters
        - Created At: <?php echo $hike['created_at']; ?>
    </h3>
    <?php $hikeTags = Hikes::getHikeTags($hike['id']); ?>
    <p>Tags:
        <?php foreach ($hikeTags as $tag): ?>
            <?php echo $tag['tag_name']; ?>
        <?php endforeach; ?>
    </p>
    <img src='" . $hikeDetails['picture_url'] . "' alt='Hike Image' width='500' height='300'>";
    <br>
<?php endforeach; ?>

<?php for ($i = 1; $i <= $totalPages; $i++): ?>
    <a href='?page=<?php echo $i; ?>'><?php echo $i; ?></a>
<?php endfor; ?>
