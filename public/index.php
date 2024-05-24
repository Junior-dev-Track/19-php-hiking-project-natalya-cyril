<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
$_SESSION['isConnected'] = false;

require_once __DIR__ . '/../vendor/autoload.php';

$router = new AltoRouter();


// Home
$router->map('GET', '/', function() {
    require __DIR__ . "/../src/views/homeView.php";
});
$router->map('GET', '/home', function() {
    require __DIR__ . "/../src/views/homeView.php";
});

// Sign In
$router->map('GET', '/signin', function() {
    require __DIR__ . "/../src/views/signinView.php";
});
$router->map('POST', '/signin', function() {
    require __DIR__ . "/../src/views/signinView.php";
});


// Login
$router->map('GET', '/login', function() {
    require __DIR__ . "/../src/views/loginView.php";
});
$router->map('POST', '/login', function() {
    require __DIR__ . "/../src/views/loginView.php";
});

// Logout
$router->map('GET', '/logout', function() {
    require __DIR__ . "/../src/views/logoutView.php";
});

// Profile
$router->map('GET', '/profile', function() {
    require __DIR__ . "/../src/views/profileView.php";
});





// match current request
$match = $router->match();

if ($match && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    // no route was matched
    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}
?>