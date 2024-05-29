<?php
include 'includes/header.php';
?>

    <h2 class="text-6xl font-extrabold text-customWhite px-5 pb-12 pt-36 font-radio">Welcome to Wonderlust where the trail meets inspiration. </h2>

<?php
$uri = $_SERVER['REQUEST_URI'];

if (preg_match('/^\/(\?|home)?(\?.*)?$/', $uri)):
?>

    </section>
<?php endif; ?>

<!--flex flex-col justify-center-->
    <main class="w-screen overflow-hidden flex flex-col justify-between items-center">
        <?php
        include 'includes/hikeList.php';
        ?>
    </main>

<?php
include 'includes/footer.php'
?>
