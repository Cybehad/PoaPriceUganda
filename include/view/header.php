<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Poa Price Uganda">
    <meta name="generator" content="">
    <title>Poa Price Uganda</title>
    <link rel="canonical" href="<?php echo $full_url; ?>">

    <meta name="description" content="Poa Price Uganda, Good priced products poor, explore it and choose products that suits you."/>
    <meta name="keywords" content="Poa Price Uganda, Affordable price for products in uganda, let us help you buy from verified sellers in uganda. - Poa Price Uganda">
    <meta property="og:title" content="Poa Price Uganda"/>
    <meta property="og:url" content="<?php echo $full_url; ?>"/>
    <meta property="og:description" content="Poa Price Uganda, Good priced products pool, explore it and choose products that suits you."/>
    <meta property="og:image" content="<?php echo $url; ?>assets/img/favicon/ppu-icon.png"/>
    <meta property="og:image:width" content="250">
    <meta property="og:image:height" content="250">
    <meta property="og:image:alt" content="Poa Price Uganda" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="en_US" />

    <link rel="icon" type="image/png" sizes="250x250" href="<?php echo $url; ?>assets/img/favicon/ppu-icon.png">
    <link rel="manifest" href="<?php echo $url; ?>assets/img/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo $url; ?>assets/img/favicon/ppu-icon.png">
    <meta name="theme-color" content="#ffffff">

    <!-- Bootstrap core CSS -->
    <link href="<?php echo $url;?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $url;?>assets/css/style.css" rel="stylesheet">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }
        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="style.css" rel="stylesheet">
</head>
<body>
<main role="main" class="">
<nav class="navbar navbar-expand-sm navbar-dark bg-dark" aria-label="SCL navbar">

    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo $url; ?>">
            <img src="<?php echo $url; ?>assets/img/favicon/ppu-icon.png" class="d-inline-block align-top rounded rounded-circle" alt="Poa Price Uganda" loading="lazy" width="38" height="38">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample03">
            <ul class="navbar-nav me-auto mb-2 mb-sm-0">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $url;?>services">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $url;?>learn">Learn</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $url;?>blog">Blog</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-bs-toggle="dropdown" aria-expanded="false">Menu <i class=""></i></a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown03">
                        <li><a class="dropdown-item" href="<?php echo $url;?>about">About</a></li>
                        <li><a class="dropdown-item" href="<?php echo $url;?>contact">Contact Us</a></li>
                        <li><a class="dropdown-item" href="<?php echo $url;?>terms">Terms & Conditions</a></li>
                    </ul>
                </li>
            </ul>
            <form class="d-flex mx-4 my-2" action="<?php echo $url; ?>search/" method="get">
                <input class="form-control" type="text" name="q" minlength="1" placeholder="Search" aria-label="Search">
            </form>
                <?php if($session->isSignedIn()): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="<?php echo $url; ?>assets/img/favicon/ppu-icon.png" class="d-inline-block align-top rounded rounded-circle" alt="Poa Price Uganda" loading="lazy" width="38" height="38">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-md-end" aria-labelledby="dropdown04">
                            <li><a class="dropdown-item" href="<?php echo $url;?>profile/">Profile</a></li>
                            <li><a class="dropdown-item" href="<?php echo $url;?>profile/settings.php">Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="<?php echo $url;?>sign/signout.php">Logout</a></li>
                        </ul>
                    </li>
                <li class="nav-item"></li>
                <?php endif; ?>
                <?php if (!$session->isSignedIn()): ?>
                    <?php if ($scriptName !== "signin.php"): ?>
                        <a href="<?php echo "{$url}sign/signin.php?red={$full_url}"; ?>" type="button" class="btn btn-outline-primary me-2">Login</a>
                    <?php else: ?>
                        <a href="<?php echo "{$url}sign/signup.php"; ?>" type="button" class="btn btn-outline-primary me-2">Sign Up</a>
                    <?php endif; ?>
                <?php endif; ?>
        </div>
    </div>
</nav>
