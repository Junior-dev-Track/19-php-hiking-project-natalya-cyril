<?php
    declare(strict_types=1);
    require_once __DIR__ . '/../../../vendor/autoload.php';
    var_dump($_SESSION);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wonderlust</title>
</head>


<body>

<header>
    <p>header</p>
    <?php
    include 'nav.php';
    ?>
</header>