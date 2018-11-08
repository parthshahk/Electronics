<?php

    session_start();

    include '../includes/helpers.php';

    define("BaseAddress","http://".$_SERVER['SERVER_NAME']);
    define("ManageAddress","http://".$_SERVER['SERVER_NAME']."/manage");

    if(isset($_COOKIE['fb2'])){
        $_SESSION['login'] = 2;
    }

    if(isset($_COOKIE['gd2'])){
        $_SESSION['login'] = 1;
    }

    if(isset($_POST['password'])){

        $password = filterStringBasic($_POST['password']);

        if(sha1($password) == 'f5d9b96d0342fa5df23ac63af81487342d76c0f4'){              // Lower Level Password
            $_SESSION['login'] = 2;
        }

        if(sha1($password) == '4f98b4d64d8c76076d941b2cb78e6f450036e293'){              // Higher Level Password
            $_SESSION['login'] = 1;
        }

        if($password == ''){
            unset($_POST);
        }

    }
    
    if(isset($_POST['rememberMe'])){

        if($_POST['rememberMe'] == 'Yes'){

            if(isset($_SESSION['login'])){
    
                if($_SESSION['login'] == 2){
                    setcookie("fb2", "askljfsdFsdfSD2FSDDSe324e2F1", time()+2592000, "/manage");
                }

                if($_SESSION['login'] == 1){
                    setcookie("gd2", "askljfsdFsdfSD1FSDDSe324e2F1", time()+2592000, "/manage");
                }

            }
        }

    }

    if(isset($_SESSION['login'])){
        header("Location: ".ManageAddress);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Member Login - Malgadi Electronics</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta name="theme-color" content="#263238">
        <link rel="shortcut icon" href="<?php echo BaseAddress; ?>/favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="<?php echo BaseAddress; ?>/css/materialize.min.css">
        <link rel="stylesheet" href="<?php echo ManageAddress; ?>/css/main1.0.css">
        <link href="https://fonts.googleapis.com/css?family=Anton|Oxygen:300,400,700" rel="stylesheet">
    </head>
    <body class="grey lighten-3">
        
        <div class="navbar-fixed">
            <nav class="blue-grey darken-4 z-depth-0">
                <div class="nav-wrapper">
                    <a href="<?php echo ManageAddress; ?>" class="brand-logo center">Malgadi</a>
                </div>
            </nav>   
        </div>

        <section>
            <div class="container">
                <div class="row">

                    <div class="row"></div>
                    <div class="row"></div>
                    <div class="row"></div>
                    <div class="row"></div>

                    <div class="col s12 m8 l6 offset-m2 offset-l3">
                        <div class="card blue-grey darken-1">
                            <div class="card-content white">

                                <div class="row">

                                    <div class="col s12 center">
                                        <h4 class="light grey-text text-darken-3">LOGIN</h4>
                                    </div>

                                    <form action="login.php" method="POST" id="login-form">
                                    <div class="col s12 input-field">

                                        <input value="Malgadi-Member" type="text" class="hide" name="username" id="username">
                                        <input placeholder="Password" type="password" class="grey-text text-darken-3" name="password" id="password" autocomplete="current-password" autofocus required>
                                        <label for="password">Member Password</label>

                                        <p><br>
                                            <label>
                                                <input type="checkbox" class="loggedin" name="rememberMe" value="Yes" />
                                                <span class="light">Remember me on this device</span>
                                            </label>
                                        </p>

                                    </div>
                                    </form>

                                    <div class="row"></div>

                                    <button class="col s12 btn-large waves-effect waves-light pink" type="submit" form="login-form">Sign In</button>

                                </div>
                            </div>          
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script src="<?php echo BaseAddress; ?>/js/materialize.min.js"></script>
        <script src="<?php echo ManageAddress; ?>/js/script1.0.js"></script>
        <script src="https://use.fontawesome.com/25db837a52.js"></script>
    </body>
</html>