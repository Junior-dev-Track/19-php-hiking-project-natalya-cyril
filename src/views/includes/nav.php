<nav class="flex ">
    <ul class="flex space-x-5 uppercase">
        <?php if (isset($_SESSION['isConnected']) && $_SESSION['isConnected'] ) : ?>
            <li> <a href="/logout">Logout</a></li>
            <li><a href="/profile">Profile</a></li>
        <?php else : ?>
            <li><a href="/login">Login</a></li>
        <?php endif; ?>

    </ul>
</nav>



