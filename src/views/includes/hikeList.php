<?php
declare(strict_types=1);

use Controllers\HikesController;
use Models\Hikes;

// Import the Hikes class

$page1 = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$selectedTag = isset($_GET['tag']) ? $_GET['tag'] : null;
HikesController::test();
HikesController::getHikeNames();
if ($selectedTag) {
    $hikeNames = HikesController::getHikesByTag($selectedTag, $page1);
} else {
    $hikeNames = HikesController::getHikeNames($page1); // Get the first page
}
$totalHikes = Hikes::getTotalHikes();
$itemsPerPage = 6;
$totalPages = ceil($totalHikes / $itemsPerPage);
?>

    <h2>List of hikes</h2>
<ul>
    <li><a href="?tag=Easy">Easy</a></li>
    <li><a href="?tag=Moderate">Moderate</a></li>
    <li><a href="?tag=Difficult">Difficult</a></li>
    <li><a href="?tag=Historical">Historical</a></li>
    <li><a href="?tag=Forest">Forest</a></li>
    <li><a href="?tag=Waterfall">Waterfall</a></li>
    <li><a href="?tag=Wildflowers">Wildflowers</a></li>
    <li><a href="?tag=Dog-friendly">Dog-friendly</a></li>
    <li><a href="?tag=Scenic">Scenic</a></li>
    <li><a href="?tag=Spring">Spring</a></li>
    <li><a href="?tag=Summer">Summer</a></li>
    <li><a href="?tag=Fall">Fall</a></li>
    <li><a href="?tag=Winter">Winter</a></li>
</ul>
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

<?php for ($i = 1; $i <= $totalPages; $i++): ?>
    <a href='?page=<?php echo $i; ?><?php echo $selectedTag ? "&tag=$selectedTag" : ""; ?>'><?php echo $i; ?></a>
<?php endfor; ?>
