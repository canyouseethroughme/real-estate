<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="style/app.css">

    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600&display=swap" rel="stylesheet">


    <script src='https://api.mapbox.com/mapbox-gl-js/v1.2.0/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v1.2.0/mapbox-gl.css' rel='stylesheet' />

    <title>Real Estate</title>
</head>

<body>
    <nav>
        <div><a <?= ($active == 'homePage') ? 'class="active"' : '' ?> href="index.php"><img src="logo.png"></a></div>
        <div><a <?= ($active == 'homes') ? 'class="active"' : '' ?> href="homes.php">Homes</a></div>
        <?php if ($_SESSION['jUser']->email) : ?>
            <div><a <?= ($active == 'signup') ? 'class="active"' : '' ?> href="profile.php"><?= $_SESSION['jUser']->name ?></a></div>
            <div><a href="user/user-logout.php">Logout</a></div>
        <?php else : ?>
            <div><a <?= ($active == 'signup') ? 'class="active"' : '' ?> href="signup.php">Sign Up</a></div>
            <div><a <?= ($active == 'login') ? 'class="active"' : '' ?> href="login.php">Login</a></div>
        <?php endif; ?>

    </nav>