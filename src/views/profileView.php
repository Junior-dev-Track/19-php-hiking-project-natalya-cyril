<?php
include 'includes/header.php';

use Controllers\HikesController;

$hikes = HikesController::getHikeUsers($_SESSION['id']);

if (!isset($_SESSION['isConnected']) || $_SESSION['isConnected'] === false) {
    header('Location: /login');
    exit();
}

?>

<main>
    <h1>Profile</h1>

    <p>START</p>
    <div class="tailwind grid gap-4 md:grid-cols-2 lg:grid-cols-2">
        <!-- Profile Section -->
        <div class="profile-container flex rounded-lg shadow-lg p-4 bg-white md:col-span-1 lg:col-span-2">
            <!-- Profile Picture and Actions -->
            <div class="flex-shrink-0 flex items-center space-x-4">
                <img src="<?= htmlspecialchars($_SESSION['profilePicture'], ENT_QUOTES, 'UTF-8'); ?>" alt="Profile Picture" width="150" height="130" class="rounded-full">
                <div class="profile-actions flex flex-col">
                    <a href="/editProfile" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit Profile</a>
                    <a href="/editPassword" class="font-medium text-blue-600 dark:text-blue-500 hover:underline mt-2">Change Password</a>
                    <a href="/addHike" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full mt-2">Add Hike</a>
                </div>
            </div>
            <!-- Profile Information -->
            <div class="profile-info flex-1 flex flex-col justify-center ml-4">
                <h2 class="text-lg font-semibold">Profile Information</h2>
                <p>Username: <?= $_SESSION['username'] ?></p>
                <p>Role: <?= $_SESSION['role'] ?></p>
                <p>First name: <?= $_SESSION['firstname'] ?></p>
                <p>Last name: <?= $_SESSION['lastname'] ?></p>
                <p>Email: <?= $_SESSION['email'] ?></p>
            </div>
        </div>

        <!-- List of Hikes Section -->
        <div class="list-container rounded-lg shadow-lg border-gray-200 p-4 bg-white md:col-span-2 lg:col-span-2 mt-4">
            <h2 class="text-lg font-semibold">List of Hikes</h2>
            <ul>
                <?php foreach ($hikes as $hike): ?>
                    <li class="mb-4">
                        <p>Name: <?= htmlspecialchars($hike['name'], ENT_QUOTES, 'UTF-8') ?></p>
                        <p>Distance: <?= htmlspecialchars($hike['distance'], ENT_QUOTES, 'UTF-8') ?> km</p>
                        <p>Date: <?= date('Y-m-d', strtotime($hike['created_at'])) ?></p>
                        <!-- Update button -->
                        <a href="/editHike?hikeId=<?= $hike['id'] ?>" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Update Hike</a>
                        <!-- Delete button -->
                        <form action="/deleteHike" method="post" class="inline-block">
                            <input type="hidden" name="hikeId" value="<?= $hike['id'] ?>">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" type="submit">Delete</button>
                        </form>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <p>END</p>

    <!--    <div class="tailwind grid">-->
<!--    <div class="profile-container column_1">-->
<!--        <div>-->
<!--            <img src="--><?php //= htmlspecialchars($_SESSION['profilePicture'], ENT_QUOTES, 'UTF-8'); ?><!--" alt="Profile Picture" width="150" height="130">-->
<!--        </div>-->
<!--        <div class="profile-info">-->
<!--            <h2>Profile Information</h2>-->
<!--            <p>Username : --><?php //= $_SESSION['username'] ?><!--</p>-->
<!--            <p>Role : --><?php //= $_SESSION['role'] ?><!--</p>-->
<!--            <p>First name: --><?php //= $_SESSION['firstname'] ?><!--</p>-->
<!--            <p>Last name: --><?php //= $_SESSION['lastname'] ?><!--</p>-->
<!--            <p>Email : --><?php //= $_SESSION['email'] ?><!--</p>-->
<!--            <p>User ID : --><?php //= $_SESSION['id'] ?><!--</p>-->
<!--        </div>-->
<!--        <div class="profile-actions">-->
<!--            <a href="/editProfile">Edit Profile</a>-->
<!--            <a href="/editPassword">Change Password</a>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="list-container column_2">-->
<!--        <p>List of Hikes</p>-->
<!--    </div>-->
<!--    </div>-->
</main>


<?php
include 'includes/footer.php'
?>
