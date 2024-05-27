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
    <link href="/css/tailwind.css" rel="stylesheet">
</head>


<body class="bg-amber-50 text-gray-900">

<header class="flex justify-between">
    <div class="uppercase font-extrabold text-xl p-3 text-lime-900">
        <a href="/">Wonderlust</a>
    </div>
    <?php
    include 'nav.php';
    ?>
</header>