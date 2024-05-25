<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

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

// Forgot Password
$router->map('GET', '/forgotPassword', function() {
    require __DIR__ . "/../src/views/forgotPasswordView.php";
});
$router->map('POST', '/forgotPassword', function() {
    require __DIR__ . "/../src/views/forgotPasswordView.php";
});

// Profile
$router->map('GET', '/profile', function() {
    require __DIR__ . "/../src/views/profileView.php";
});

// Edit Profile
$router->map('GET', '/editProfile', function() {
    require __DIR__ . "/../src/views/editProfileView.php";
});
$router->map('POST', '/editProfile', function() {
    require __DIR__ . "/../src/views/editProfileView.php";
});

// Change Password
$router->map('GET', '/editPassword', function() {
    require __DIR__ . "/../src/views/editPasswordView.php";
});
$router->map('POST', '/editPassword', function() {
    require __DIR__ . "/../src/views/editPasswordView.php";
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