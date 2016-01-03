<?php
ob_start();
$host="localhost";
        $account="l4hadmin_site";
        $phppass="_OEfAUu!#*vA";
        $dbselect="LINUX4HOPE";
        $cxn=mysqli_connect($host,$account,$phppass,$dbselect) or die ("Couldn't Connect to Database");
        $EMAIL = mysqli_real_escape_string($cxn,$_POST['email']);
        $cpassword =  md5($_POST['password']);
        $SALT = sha1(md5($_POST['password']));
        $L4HSALT = (sha1("Uy2A673G54Fjo5l"));
        $PASS_WORD = hash("sha256",$SALT.$cpassword.$L4HSALT);
        $query = "Select * from INTERNAL_USERS where EMAIL='$EMAIL'";
        $result = mysqli_query($cxn, $query) or die ("Couldn't complete Login Query");
        $row = mysqli_fetch_assoc($result);
        if (empty($row)){
        header("Location: https://linux4hope.org/backend/login?wrong=1");
        }else{
        extract($row);
        if ("$PASSWORD" == "$PASS_WORD"){
                if(isset($_POST['npassword'])){
                $npassword = md5($_POST['npassword']);
                $ncpassword = md5($_POST['ncpassword']);
                if("$npassword" == "$ncpassword"){
                        $SALT = sha1(md5($_POST['npassword']));
                        $L4HSALT = (sha1("Uy2A673G54Fjo5l"));
                        $PASS_WORD = hash("sha256",$SALT.$npassword.$L4HSALT);
                        $updatequery = "UPDATE INTERNAL_USERS set PASSWORD='$PASS_WORD' where USER_ID=$USER_ID";
                        $updatequery = mysqli_query($cxn, $updatequery) or die ("Couldn't change password");
                        }
                }
                $date_of_expiry = time() + (60 * 60 * 24 * 5);
                setcookie("L4HUserid","$USER_ID", $date_of_expiry,"/",".linux4hope.org");
                setcookie("L4HPassword","$PASS_WORD", $date_of_expiry, "/",".linux4hope.org");
                //$timequery = "UPDATE LOGIN set LAST_LOGIN=NOW() where USER_ID=$IUSER_ID";
                //$result = mysqli_query($cxn, $timequery) or die ("Couldn't Set Time");
                header("Location: https://linux4hope.org/backend/dashboard");
                }
                else{
                /* Send back to login */
                header("Location: https://linux4hope.org/backend/login?wrong=1");
                }
        }
        mysqli_close($cxn);
?>
