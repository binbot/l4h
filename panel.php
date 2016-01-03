<!DOCTYPE html>
<?php
    ob_start();
    include "backend/PHP/UserClass.php";
    $USER = new UserClass();
    if($USER->LoggedIn()){
        header("Location: https://linux4hope.org/backend/dashboard");
    }
?>
<html>
<head>
    <title>Login - Linux4Hope</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="assets/icon.png" rel="shortcut icon">
    <script src="http://use.edgefonts.net/chunk;damion;muli:n3,n4.js"></script>
    <script src='http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js'></script>
    <script src='assets/scripts/script.js'></script>
</head>

<body>
    <div id="bg-inner">
        <!-- Background inner begin -->

        <div class="colors">
            <div class="white"></div>

            <div class="black"></div>

            <div class="white"></div>
        </div>

        <div id="nav">
            <div id="title">
                <h1>Linux4Hope</h1>
            </div>

            <div id="nav-content">
                <ul>
                    <li>
                        <a href="index">Home</a>
                    </li>

                    <li>
                        <a href="apply">Apply</a>
                    </li>

                    <li>
                        <a href="donate">Donate</a>
                    </li>

                    <li>
                        <a href="branches">Branches</a>
                    </li>

                    <li>
                        <a href="leadership">About</a>
                    </li>

                    <li>
                        <a href="panel">Panel</a>
                    </li>
                </ul>
            </div><a href="apply" id="action-button">Apply for a computer</a>
        </div>

        <div class="container">
            <div id="header">
                <div id="menu-left">
                    <ul class="menu">
                        <li>
                            <a href="index">Home</a>
                        </li>

                        <li class="separator">/</li>

                        <li>
                            <a href="apply">Apply</a>
                        </li>

                        <li class="separator">/</li>

                        <li>
                            <a href="donate">Donate</a>
                        </li>
                    </ul>
                </div>

                <div id="menu-center"></div>

                <div id="menu-right">
                    <ul class="menu">
                        <li>
                            <a class="active" href="panel">Panel</a>
                        </li>

                        <li class="separator">/</li>

                        <li>
                            <a href="leadership">About</a>
                        </li>

                        <li class="separator">/</li>

                        <li>
                            <a href="branches">Branches</a>
                        </li>
                    </ul>
                </div>

                <h1>We are <span class="highlight">Linux4Hope</span>, a nonprofit organization that provides free computers <span class="highlight">powered by Linux</span> to those in need.</h1>
            </div>

            <div class="content">
                <div class="col1-half">
                    <h4>Login</h4>
                </div>

                <div class="col2-half">
                    <h2>Login with your Linux4Hope ID</h2>

                    <p>Linux4Hope team members can login here. An account must
                    be created for you.</p><br>
                    <?php
                        if(!empty($_GET['wrong'])){
                            echo "<p><i>Sorry, you must have entered in the wrong credentials. Try again!</i></p><br />";
                        }
                    ?>

                    <form action="backend/PHP/login.php" id="apply" method=
                    "post" name="apply">
                        <table class="form-table">
                            <tr>
                                <td class="label">Email</td>

                                <td><input name="email" type="text"></td>
                            </tr>

                            <tr>
                                <td class="label">Password</td>

                                <td><input name="password" type=
                                "password"></td>
                            </tr>
                        </table><br>
                        <br>
                        <input class="button" name="login" type="submit" value=
                        "Login" disabled>
                    </form>
                </div>
            </div>

            <div class="break"></div>
        </div>

        <div class="break"></div>
    </div><!-- Background inner end -->

    <div id="footer">
        <div id="footer-top">
            <p><a href=
            "https://www.facebook.com/pages/Linux4Hope/208233255857148">Facebook</a>
            / <a href=
            "https://plus.google.com/107939147761241924186/posts">Google+</a> /
            <a href="https://twitter.com/Linux4Hope">Twitter</a></p>
        </div>

        <div id="footer-container">
            <p>Copyright &copy; 2015 Linux4Hope. All rights reserved. Linux is
            a registered trademark of Linus Torvalds.</p>
        </div>
    </div>
</body>
</html>
