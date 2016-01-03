<?php
    session_start();

    # PlayThru
    require_once("captcha/ayah.php");
    $ayah = new AYAH();

    # Load previous form data, if there was an errors
    if($_POST['submitapp']){
        require("backend/PHP/submitapplication.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Apply - Linux4Hope
        </title>
        <link href="style.css" rel="stylesheet" type="text/css">
        <link href="assets/icon.png" rel="shortcut icon">
        <script src="http://use.edgefonts.net/chunk;muli:n3,n4.js"></script>
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
                </div>
                <a id="action-button" href="apply">Apply for a computer</a>
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
                    <div class="col1-half">
                        <h2>
                            Recipient Application Form
                        </h2>
                        <?php
                            if(!empty($_POST['submitapp'])){
                                echo "<p class='error'>There were errors in your application. Please review your application to ensure completion and validity.</p>";
                                # echo (($WILLHELP == false) ? '<li></li>' : '');
                            }
                        ?>
                        <form action="#" id="apply" method="post" name="apply">
                            <table class="form-table">
                                <tr>
                                    <td class="label">
                                        First name
                                    </td>
                                    <td>
                                        <input name="fname" type="text"
                                            <?php
                                                if ($FNAME != false){
                                                    echo "value='$FNAME'";
                                                }
                                            ?>
                                        >
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label">
                                        Last name
                                    </td>
                                    <td>
                                        <input name="lname" type="text"
                                            <?php
                                                if ($LNAME != false){
                                                    echo "value='$LNAME'";
                                                }
                                            ?>
                                        >
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label">
                                        Email
                                    </td>
                                    <td>
                                        <input name="email" type="text"
                                            <?php
                                                if ($EMAIL != false){
                                                    echo "value='$EMAIL'";
                                                }
                                            ?>
                                        >
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label">
                                        Phone
                                    </td>
                                    <td>
                                        <input name="phone" placeholder="ex: (000) 000-0000" type="text"
                                            <?php
                                                if ($PHONE != false){
                                                    echo "value='$PHONE'";
                                                }
                                            ?>
                                        >
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label">
                                        Address
                                    </td>
                                    <td>
                                        <input name="address1" type="text"
                                            <?php
                                                if ($ADDRESS != false){
                                                    echo "value='$ADDRESS'";
                                                }
                                            ?>
                                        >
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label">
                                        &nbsp;
                                    </td>
                                    <td>
                                        <input name="address2" type="text">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label">
                                        &nbsp;
                                    </td>
                                    <td>
                                        <input name="address3" type="text">
                                    </td>
                                </tr>
                            </table>
                            <p class="question">
                                Which branch are you applying to? Please note that you must reside within the area of your selected branch in order to receive a computer.
                            </p>
                            <div class="answer">
                                <!--<input name="branch" type="radio" value="1" <?php if($BRANCH === 1) echo "checked";?>> Manassas, Virginia<br>-->
                                <input name="branch" type="radio" value="2" <?php if($BRANCH === 2) echo "checked";?>> Richmond, Virginia<br>
                                <input name="branch" type="radio" value="3" <?php if($BRANCH === 3) echo "checked";?>> Harrisonburg, Virginia<br>
                                <input name="branch" type="radio" value="4" <?php if($BRANCH === 4) echo "checked";?>> Los Angeles, California
                            </div>
                            <p class="question">
                                Please elaborate on how a computer from us will help you with work, educational, or personal purposes. Also, please specify if you attend high school or college (if
                                applicable).
                            </p>
                            <textarea name="usecomputer"><?php if ($WILLHELP != false) echo $WILLHELP;?></textarea>
                            <p class="question">
                                Will any family members living in your household be using the computer? If so, how would it benefit them?
                            </p>
                            <textarea name="family"><?php if ($FAMILY != false) echo $FAMILY;?></textarea>
                            <p class="question">
                                What is your average annual income?
                            </p>
                            <div class="answer">
                                <input name="income" type="radio" value="1"> Less than $20,000<br>
                                <input name="income" type="radio" value="2"> $20,000-$40,000<br>
                                <input name="income" type="radio" value="3"> $40,000-$60,000<br>
                                <input name="income" type="radio" value="4"> Greater than $60,000
                            </div>
                            <p class="question">
                                Please check all that may apply to you. If a statement does not apply, then do not check the box.
                            </p>
                            <div class="answer">
                                <input name="statements[]" type="checkbox" value="purchased_electronics" <?php if($_POST['submitapp']) { if(isChecked($statement,'purchased_electronics')) echo "checked";}?>> I have purchased electronics within the past two years.<br>
                                <input name="statements[]" type="checkbox" value="working_computer" <?php if($_POST['submitapp']) { if(isChecked($statement,'working_computer')) echo "checked";}?>> I have a working computer in my home.<br>
                                <input name="statements[]" type="checkbox" value="internet_access" <?php if($_POST['submitapp']) { if(isChecked($statement,'internet_access')) echo "checked";}?>> I have internet access in my home.
                            </div>
                            <p class="question">
                                Should you receive a computer, is it fine for us to post photos and your name on our website, www.linux4hope.org, as well as on social media, for promotional use?
                            </p>
                            <div class="answer">
                                <input name="permission" type="radio" value="Yes" <?php if($PERM === "Yes") echo "checked";?>> Yes<br>
                                <input name="permission" type="radio" value="No" <?php if($PERM === "No") echo "checked";?>> No
                            </div><br>
                            <?php
                                echo $ayah->getPublisherHTML();
                            ?><br>
                            <input class="button" name='submitapp' type="submit" value="Submit">
                        </form>
                    </div>
                    <div class="col2-half">
                        <h2>
                            Tips
                        </h2>
                        <p>
                            Before submitting the form, please ensure that you have done each of the following:
                        </p>
                        <ul>
                            <li>Complete all questions as necessary</li>
                            <li>Check the accuracy of each answer</li>
                            <li>Check your grammar and spelling to the best of your ability</li>
                        </ul>
                        <p class="message">
                            We can only serve the cities of Los Angeles, Richmond, and Harrisonburg, along with their immediately surrounding suburbs, at this time.
                        </p>
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
    </body>
</html>
