<?php
require_once("../conf/config.php");
session_start();
if (!isset($_SESSION['mailaddress'])) {
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo BASEURL . '/css/style.css' ?>">
        <link rel="stylesheet" href="<?php echo BASEURL . '/css/login.css' ?>">
        <title>Login</title>
    </head>

    <body>
    <section class="header">
        <?php include(BASEURL . '/Components/Navbar.php'); ?>
        <div class="page">
            <div class="p1">
                <div class="loginContents">
                    <p><img src="<?php echo BASEURL . '/images/logo5.png' ?>" alt="logo" align="middle"><br>
                        Royal Hospital
                    </p>
                    <?php
                    if (@$_GET['Empty'] == true) {
                        ?>
                        <div class="alert">
                            <?php
                            echo $_GET["Empty"];
                            ?>
                        </div>
                        <?php
                    } else if (@$_GET['Invalid'] == true) {
                        ?>
                        <div class="alert">
                            <?php
                            echo $_GET["Invalid"];
                            ?>
                        </div>
                        <?php
                    } else if (@$_GET['success'] == true) {
                        ?>
                        <div class="success">
                            <?php
                            echo $_GET["success"];
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <form action="<?php echo BASEURL . '/Homepage/loginProcess.php' ?>" method="post">
                        <div class="group">
                            <input type="email" name="email">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>Email</label>
                        </div>
                        <div class="group">
                            <input type="password" name="password">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>Password</label>
                            <div style="text-align: left; margin: 10px;">
                                <a style="color: var(--primary-color)" href="<?php echo BASEURL . '/Homepage/forgotPassword.php' ?>">Forgot password?</a>
                            </div>
                        </div>

                        <button name="login" class="custom-btn" style="color: var(--primary-color)">Login</button>
                    </form>
                </div>
            </div>
            <div class="p2"></div>
        </div>
        <?php include( BASEURL . '/Components/Footer.php'); ?>
    </section>
    </body>

    </html>
    <?php
} else {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo BASEURL . '/css/style.css' ?>">
        <title>Login</title>
        <style>
            body {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }

            p,
            button {
                font-size: 20px;
                margin: 10px;
                color: #344168;
            }

            h1 {
                margin: 10px;
                color: #344168;
            }

            a {
                text-decoration: none;
                color: #344168;
            }

            button {
                align-items: flex-end;
            }
        </style>
    </head>

    <body>

    <div class="alreadyLogged">
        <h1>Confirm</h1>
        <hr>
        <?php echo "<p>You are already logged in as "
            . $_SESSION['name'] . " you need to log 
            out before logging in as different user.</p>" ?>
        <hr>
        <button>
            <a href="<?php echo BASEURL . '/Homepage/logout.php?logout' ?>">
                Logout
            </a>
        </button>
        <button>
            <a href="<?php echo BASEURL . '/Homepage/logout.php?cancel'?>">
                Cancel
            </a>
        </button>
    </div>
    </body>

    </html>

    <?php
}
?>