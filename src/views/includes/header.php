<?php
    declare(strict_types=1);
    require_once __DIR__ . '/../../../vendor/autoload.php';
//    var_dump($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>Wonderlust</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href="/css/tailwind.css" rel="stylesheet">
</head>


<body class="bg-customWhite text-customBlack">

<header class="flex justify-between p-3">
    <div class="uppercase font-vollkorn text-primary-50 font-extrabold text-xl">
        <a href="/">Wonderlust</a>
    </div>
    <?php
    include 'nav.php';
    ?>
</header>