<?php
include 'includes/header.php';

use Controllers\HikesController;
HikesController::test();
HikesController::getHikeNames();
$hikeNames = HikesController::getHikeNames();
?>

<main>
    <h1>Home</h1>
    <h2>List of hikes</h2>
    <?php foreach ($hikeNames as $name): ?>
        <h3><?php echo $name['name']; ?></h3>
    <?php endforeach; ?>

</main>

<?php
include 'includes/footer.php'
?>