<?php
declare(strict_types=1);

use Controllers\HikesController;
use Models\Hikes;

// Import the Hikes class

$page1 = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$selectedTag = isset($_GET['tag']) ? $_GET['tag'] : null;
// HikesController::test();
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

<!--    <h2>List of hikes</h2>-->
<section class="flex justify-around">

    <!--  EASY  -->
    <div class="tagsButton">
        <span class="material-icons">
            star_outline
        </span>
    </div>

    <!--  MODERATE  -->
    <div class="tagsButton">
        <span class="material-icons">
            star_half
        </span>
    </div>

    <!--  DIFFICULT  -->
    <div class="tagsButton">
        <span class="material-icons">
            star
        </span>
    </div>

    <!--  HISTORICAL  -->
    <div class="tagsButton">
        <span class="material-icons">
            stadium
        </span>
    </div>

    <!--  FOREST  -->
    <div class="tagsButton">
        <span class="material-icons">
            forest
        </span>
    </div>

    <!--  WATERFALL -->
    <div class="tagsButton">
        <span class="material-icons">
            sailing
        </span>
    </div>

    <!--  BIRDWATCHING  -->
    <div class="tagsButton">
        <span class="material-icons">
            visibility
        </span>
    </div>

    <!--  DOG-FRIENDLY  -->
    <div class="tagsButton">
        <span class="material-icons">
            pets
        </span>
    </div>

    <!--  SCENIC  -->
    <div class="tagsButton">
        <span class="material-icons">
            vrpano
        </span>
    </div>

    <!--  SPRING/FALL  -->
    <div class="tagsButton">
        <span class="material-icons">
            emoji_nature
        </span>
    </div>

    <!--  SUMMER  -->
    <div class="tagsButton">
        <span class="material-icons">
            beach_access
        </span>
    </div>

</section>

<section class="mt-8 grid grid-cols-4 gap-5 px-5">
    <?php foreach ($hikeNames as $hike): ?>
        <?php $hikeDetails = Hikes::getHikeDetails($hike['id']); ?>

        <img src="<?php echo $hikeDetails['picture_url']; ?>" alt="Hike Image" class="w-full h-48 my-5 object-cover rounded-lg">

        <div class=" p-4 bg-white rounded-3xl shadow-lg">
            <h3 class="text-lg font-semibold">
                <a href="details?id=<?php echo $hike['id']; ?>" class="text-blue-500 hover:underline">
                    <?php echo $hike['name']; ?>
                </a>
            </h3>
            <p>Distance: <?php echo $hike['distance']; ?> km</p>
            <p>Duration: <?php echo $hike['duration']; ?> hours</p>
            <p>Elevation Gain: <?php echo $hike['elevation_gain']; ?> meters</p>
            <p>Created At: <?php echo $hike['created_at']; ?></p>
            <?php $hikeTags = Hikes::getHikeTags($hike['id']); ?>

<!--            <div class="hike p-4 border border-gray-200 rounded-lg shadow-lg">-->
<!--            </div>-->
            <p>
                <?php foreach ($hikeTags as $tag): ?>
                    <span class="inline-block bg-secondary-25 rounded-full px-3 py-1 text-slate-400 text-xs font-sono">
                        <?php echo $tag['tag_name']; ?>
                    </span>
                <?php endforeach; ?>
            </p>
        </div>
    <?php endforeach; ?>
</section>


<?php //foreach ($hikeNames as $hike): ?>
<!--    <h3><a href="details?id=--><?php //echo $hike['id']; ?><!--">--><?php //echo $hike['name']; ?><!--</a>-->
<!--        - --><?php //echo $hike['distance']; ?><!-- km-->
<!--        - Duration: --><?php //echo $hike['duration']; ?><!-- hours-->
<!--        - Elevation Gain: --><?php //echo $hike['elevation_gain']; ?><!-- meters-->
<!--        - Created At: --><?php //echo $hike['created_at']; ?>
<!--    </h3>-->
<!--    --><?php //$hikeTags = Hikes::getHikeTags($hike['id']); ?>
<!--    <p>Tags:-->
<!--        --><?php //foreach ($hikeTags as $tag): ?>
<!--            --><?php //echo $tag['tag_name']; ?>
<!--        --><?php //endforeach; ?>
<!--    </p>-->
<!--    <img src='" . $hikeDetails['picture_url'] . "' alt='Hike Image' width='500' height='300'>";-->
<!--    <br>-->
<?php //endforeach; ?>

<?php for ($i = 1; $i <= $totalPages; $i++): ?>
    <a href='?page=<?php echo $i; ?>'><?php echo $i; ?></a>
<?php endfor; ?>

<?php for ($i = 1; $i <= $totalPages; $i++): ?>
    <a href='?page=<?php echo $i; ?><?php echo $selectedTag ? "&tag=$selectedTag" : ""; ?>'><?php echo $i; ?></a>
<?php endfor; ?>
