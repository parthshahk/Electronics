<!DOCTYPE html>
<html>
    <head>    
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-104414893-5"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'UA-104414893-5');
        </script>
        <title><?php echo $title; ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta name="theme-color" content="#21313c">
        <link rel="shortcut icon" href="<?php echo BaseAddress; ?>/favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="<?php echo BaseAddress; ?>/css/materialize.min.css">
        <link rel="stylesheet" href="<?php echo ManageAddress; ?>/css/main1.0.css">
        <link href="https://fonts.googleapis.com/css?family=Anton|Oxygen:300,400,700" rel="stylesheet">
    </head>
    <body>
        
        <div class="navbar-fixed">
            <nav class="blue-grey darken-4 header z-depth-0">
                <div class="nav-wrapper">
                    <a href="<?php echo ManageAddress; ?>" class="brand-logo center">Malgadi</a>
                    <a href="#" data-target="side-nav" class="sidenav-trigger"><i class="fa fa-bars" aria-hidden="true"></i></a>
                    <ul class="right">
                        <li><a href="<?php echo ManageAddress; ?>/handlers/logout.php"><i class="fa fa-sign-out right hide-on-small-only" aria-hidden="true"></i>Logout</a></li>
                    </ul>
                </div>
            </nav>   
        </div>

        <ul id="side-nav" class="sidenav sidenav-fixed z-depth-1">
            <li id="navhome" class="center <?php echo $thisPage=='home' ? 'active' : '' ?>"><a class="waves-effect" href="<?php echo ManageAddress;?>">HOME</a></li>
            <li id="navorders" class="center <?php echo $thisPage=='orders' ? 'active' : '' ?>"><a class="waves-effect" href="<?php echo ManageAddress."/orders.php";?>">ORDERS</a></li>
            <li id="navproducts" class="center <?php echo $thisPage=='products' ? 'active' : '' ?>"><a class="waves-effect" href="<?php echo ManageAddress."/products.php";?>">PRODUCTS</a></li>
            <li id="navreviews" class="center <?php echo $thisPage=='reviews' ? 'active' : '' ?>"><a class="waves-effect" href="<?php echo ManageAddress."/reviews.php";?>">REVIEWS</a></li>
            <li id="navmessages" class="center <?php echo $thisPage=='messages' ? 'active' : '' ?>"><a class="waves-effect" href="<?php echo ManageAddress."/messages.php";?>">MESSAGES</a></li>
            <li id="navstats" class="center <?php echo $thisPage=='stats' ? 'active' : '' ?>"><a class="waves-effect" href="<?php echo ManageAddress."/stats.php";?>">STATISTICS</a></li>
            <li id="navconfig" class="center <?php echo $thisPage=='config' ? 'active' : '' ?>"><a class="waves-effect" href="<?php echo ManageAddress."/config.php";?>">CONFIGURATIONS</a></li>
        </ul>

        <div class="main">