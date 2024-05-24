<?php
include 'includes/header.php';

use Controllers\HikesController;
use Models\Hikes; // Import the Hikes class

$page1 = isset($_GET['page']) ? (int)$_GET['page'] : 1;
HikesController::test();
HikesController::getHikeNames();
$hikeNames = HikesController::getHikeNames($page1); // Get the first page
$totalHikes = Hikes::getTotalHikes();
$itemsPerPage = 6;
$totalPages = ceil($totalHikes / $itemsPerPage);
?>

    <main>
        <h1>Home</h1>
        <h2>List of hikes</h2>


        <?php foreach ($hikeNames as $hike): ?>
            <h3><a href="details?id=<?php echo $hike['id']; ?>"><?php echo $hike['name']; ?></a> - <?php echo $hike['distance']; ?> km</h3>
        <?php endforeach; ?>

        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href='?page=<?php echo $i; ?>'><?php echo $i; ?></a>
        <?php endfor; ?>

    </main>

<?php
include 'includes/footer.php'
?>