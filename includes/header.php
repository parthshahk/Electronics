<!DOCTYPE html>
<html>
    <head>
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-104414893-2"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'UA-104414893-2');
        </script>
        <title><?php echo $title; ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content="<?php echo $pageDescription; ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta name="theme-color" content="#03a9f4">
        <meta property="og:title" content="<?php echo $title; ?>" />
        <meta property="og:description" content="<?php echo $pageDescription; ?>" />
        <meta property="og:image" content="<?php echo $imagePath; ?>" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="<?php echo $canonUrl; ?>" />
        <link rel="shortcut icon" href="<?php echo BaseAddress; ?>/favicon.ico" type="image/x-icon" />    
        <link rel="stylesheet" href="<?php echo BaseAddress; ?>/css/materialize.min.css">
        <link rel="stylesheet" href="<?php echo BaseAddress; ?>/css/main.1.0.min.css">
        <link href="https://fonts.googleapis.com/css?family=Amatic+SC:700|Anton|Roboto:300,400,500" rel="stylesheet">
        <link rel="canonical" href="<?php echo $canonUrl; ?>" />
    </head>
    <body>
        
        <nav class="nav-extended light-blue">

            <div class="nav-wrapper">
                <a href="<?php echo BaseAddress; ?>" class="brand-logo"><img src="<?php echo BaseAddress; ?>/favicon.ico" class="hide-on-med-and-down" alt="Malgadi Electronics Logo">Malgadi</a>
                <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="fa fa-bars" aria-hidden="true"></i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="<?php echo BaseAddress; ?>">Home</a></li>
                    <li><a href="<?php echo BaseAddress; ?>/cart.php"><i class="fa fa-shopping-cart left" aria-hidden="true"></i>My Cart</a></li>
                    <li><a href="<?php echo BaseAddress; ?>/track.php"><i class="fa fa-truck left" aria-hidden="true"></i>Track Order</a></li>
                    <li><a href="#contact-form">Special Order</a></li>
                    <li><a href="review.php">Review Us</a></li>
                    <li><a href="#contact-form">Contact</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <!-- <li><a href="https://docs.google.com/forms/d/e/1FAIpQLSe1DpnRT_YHrzkzEAUbYR0SyQWFgWjUf4Py4IQ8XGjbFX4VGw/viewform?usp=sf_link" target="_BLANK">We are Hiring!</a></li> -->
                </ul>
                <div class="<?php echo $extendNavbar ? 'show' : 'hide'; ?>"><br><br><br><br></div>
            </div>

            <div class="nav-content center">
                <span class="nav-title nav2-title <?php echo $subtitleVisibility ? 'show' : 'hide'; ?>">Make Ideas Happen</span>
            </div>

            <form action="search.php" method="get" id="search_form">
                <div class="row <?php echo $searchVisibility ? 'show' : 'hide'; ?>">
                    <div class="col s8 l4 offset-s2 offset-l4 input-field">
                        <input id="search" type="text" name="q" placeholder="Search" class="white grey-text text-darken-3" autocomplete="off">
                    </div>
                </div>
            </form>

            <div class="nav-content">
                <ul class="tabs tabs-fixed-width grey lighten-5">
                    <li class="tab"><a target="_self" href="categories.php?q=Basic+Components" class="grey-text text-darken-2">Basic Components</a></li>
                    <li class="tab"><a target="_self" href="categories.php?q=Robotics" class="grey-text text-darken-2">Robotics</a></li>
                    <li class="tab"><a target="_self" href="categories.php?q=Controllers" class="grey-text text-darken-2">Controllers</a></li>
                    <li class="tab"><a target="_self" href="categories.php?q=Sensors" class="grey-text text-darken-2">Sensors</a></li>
                    <li class="tab"><a target="_self" href="categories.php?q=IC" class="grey-text text-darken-2">IC</a></li>
                    <li class="tab"><a target="_self" href="categories.php?q=Kits" class="grey-text text-darken-2">Kits</a></li>
                    <li class="tab"><a target="_self" href="categories.php?q=EG+Kits" class="grey-text text-darken-2">EG Kits</a></li>
                    <li class="tab hide"><a href="#" class="active"></a></li>
                </ul>
            </div>

        </nav>

        <ul id="slide-out" class="sidenav">

            <li>
                <div class="user-view">
                    <div class="background">
                        <img src="<?php echo BaseAddress; ?>/images/logoPushed.jpg" width="100%" alt="Malgadi Electronics Logo">
                    </div>
                    <br><br><br>
                </div>
            </li>

            <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li class="active">
                        <a class="collapsible-header active"><span class="light">Categories</span><i class="fa fa-caret-down" aria-hidden="true"></i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="categories.php?q=Basic+Components"><span class="light">Basic Components</span></a></li>
                                <li><a href="categories.php?q=Robotics"><span class="light">Robotics</span></a></li>
                                <li><a href="categories.php?q=Controllers"><span class="light">Controllers</span></a></li>
                                <li><a href="categories.php?q=Sensors"><span class="light">Sensors</span></a></li>
                                <li><a href="categories.php?q=IC"><span class="light">ICs</span></a></li>
                                <li><a href="categories.php?q=Kits"><span class="light">Kits</span></a></li>
                                <li><a href="categories.php?q=EG+Kits"><span class="light">EG Kits</span></a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </li> 

            <li class="divider hide-on-large-only"></li>
            <li class="hide-on-large-only"><a href="<?php echo BaseAddress; ?>"><span class="light">Home</span></a></li>
            <li class="hide-on-large-only"><a href="<?php echo BaseAddress; ?>/cart.php"><span class="light">My Cart</span><i class="fa fa-shopping-cart right" aria-hidden="true"></i></a></li>
            <li class="hide-on-large-only"><a href="<?php echo BaseAddress; ?>/track.php"><span class="light">Track Order</span><i class="fa fa-truck right" aria-hidden="true"></i></a></li>
            <li class="hide-on-large-only sidenav-close"><a href="#contact-form"><span class="light">Contact</span></a></li>
            <li class="hide-on-large-only"><a href="about.php"><span class="light">About Us</span></a></li> 
            <!-- <li class="hide-on-large-only"><a href="https://docs.google.com/forms/d/e/1FAIpQLSe1DpnRT_YHrzkzEAUbYR0SyQWFgWjUf4Py4IQ8XGjbFX4VGw/viewform?usp=sf_link" target="_BLANK"><span class="light">We Are Hiring!</span></a></li>              -->
            <li class="hide-on-large-only"><a href="review.php"><span class="light">Review Us</span></a></li>
            <li class="hide-on-large-only sidenav-close"><a href="#contact-form"><span class="light">Special Order</span></a></li>
               
        </ul>

        <div class="fixed-action-btn <?php echo $cartVisibility ? 'show' : 'hide'; ?>">
            <a class="btn-floating btn-large waves-effect waves-light red darken-1" href="cart.php">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            </a>
            <div class="cart-info red-text text-darken-2 light">
                <span id="cart-quantity"><?php echo sizeof($_SESSION['cart']) ?></span> Item(s)
            </div>
        </div>