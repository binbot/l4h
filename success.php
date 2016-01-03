<?php
    session_start();
    if (!isset($_SESSION['applied'])) {
        session_unset();
        session_destroy();
        header("Location: ../apply");
        die;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Success! - Linux4Hope
        </title>
        <meta name="robots" content="noindex">
        <link href="style.css" rel="stylesheet" type="text/css">
        <link href="assets/icon.png" rel="shortcut icon">
        <script src="http://use.edgefonts.net/chunk;source-code-pro;muli:n3,n4.js"></script>
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
                    <h1>
                        Linux4Hope
                    </h1>
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
                            <li class="separator">/
                            </li>
                            <li>
                                <a class="active" href="apply">Apply</a>
                            </li>
                            <li class="separator">/
                            </li>
                            <li>
                                <a href="donate">Donate</a>
                            </li>
                        </ul>
                    </div>
                    <div id="menu-center"></div>
                    <div id="menu-right">
                        <ul class="menu">
                            <li>
                                <a href="panel">Panel</a>
                            </li>
                            <li class="separator">/
                            </li>
                            <li>
                                <a href="leadership">About</a>
                            </li>
                            <li class="separator">/
                            </li>
                            <li>
                                <a href="branches">Branches</a>
                            </li>
                        </ul>
                    </div>
                    <h1>
                        We are <span class="highlight">Linux4Hope</span>, a nonprofit organization that provides free computers <span class="highlight">powered by Linux</span> to those in need.
                    </h1>
                </div>
                <div class="content">
                    <?php
                        $BRANCH_NEW = 'unspecified';
                        $BRANCH_EMAIL = 'unspecified';
                        if ($BRANCH === 'ManassasVA') {
                            $BRANCH_NEW = 'Manassas';
                            $BRANCH_EMAIL = 'ghaun@linux4hope.org';
                        }
                        else if ($BRANCH === 'RichmondVA') {
                            $BRANCH_NEW = 'Richmond';
                            $BRANCH_EMAIL = 'richmondva@linux4hope.org';
                        }
                        else if ($BRANCH === 'HarrisonburgVA') {
                            $BRANCH_NEW = 'Harrisonburg';
                            $BRANCH_EMAIL = 'richmondva@linux4hope.org';
                        }
                        else if ($BRANCH === 'LosAngelesCA') {
                            $BRANCH_NEW = 'Los Angeles';
                            $BRANCH_EMAIL = 'losangelesca@linux4hope.org';
                        }
                    ?>
                    <p class="success">Your application has been received! A team member from the <i><?php echo "".$_SESSION['branch'].""; ?></i> branch will review it within a couple weeks. A copy of the contact information you provided to us can be found below. If you find any errors, please email <i><?php echo "".$_SESSION['branch_email'].""; ?></i> with the necessary corrections. Good luck, <i><?php echo "".$_SESSION['name'].""; ?></i> - keep a watch on your email!</p>
                    <div class="col1-half">
                        <p>Name</p>
                        <div class="post-answer">
                            <p><?php echo "".$_SESSION['name'].""; ?></p>
                        </div>

                        <p>Phone number</p>
                        <div class="post-answer">
                            <p><?php echo "".$_SESSION['phone'].""; ?></p>
                        </div>
                    </div>

                    <div class="col2-half">
                        <p>Email</p>
                        <div class="post-answer">
                            <p><?php echo "".$_SESSION['email'].""; ?></p>
                        </div>

                        <p>Address</p>
                        <div class="post-answer">
                            <p><?php echo "".$_SESSION['address'].""; ?></p>
                        </div>
                    </div>

                </div>
                <div class="break"></div>
            </div>
            <div class="break"></div>
        </div><!-- Background inner end -->
        <div id="footer">
            <div id="footer-top">
                <p>
                    <a href="https://www.facebook.com/pages/Linux4Hope/208233255857148">Facebook</a> / <a href="https://plus.google.com/107939147761241924186/posts">Google+</a> / <a href=
                    "https://twitter.com/Linux4Hope">Twitter</a>
                </p>
            </div>
            <div id="footer-container">
                <p>
                    Copyright &copy; 2015 Linux4Hope. All rights reserved. Linux is a registered trademark of Linus Torvalds.
                </p>
            </div>
        </div>
        <?php
            # Delete the session
            session_unset();
            session_destroy();
        ?>
    </body>
</html>
