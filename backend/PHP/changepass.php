<?php
ob_start();
include "UserClass.php";
$USER = new UserClass();
if($USER->LoggedIn()){

}else{
        header("Location: http://linux4hope.org/404.html");
        return null;
        die;
}
$host="localhost";
$account="l4hadmin_site";
$phppass="_OEfAUu!#*vA";
$dbselect="LINUX4HOPE";
$cxn=mysqli_connect($host,$account,$phppass,$dbselect) or die ("Couldn't Connect to Database");
$loggedinuser = mysqli_real_escape_string($cxn,$_POST['ID']);
$cuser = mysqli_real_escape_string($cxn,$_COOKIE['L4HUserid']);
if($cuser == $loggedinuser){
	$CPass = md5($_POST['password']);
	$SALT = sha1(md5($_POST['password']));
        $L4HSALT = (sha1("Uy2A673G54Fjo5l"));
        $PASS_WORD = hash("sha256",$SALT.$CPass.$L4HSALT);
	if($PASS_WORD == $_COOKIE['L4HPassword']){
		$query = "Select PASSWORD from INTERNAL_USERS where USER_ID=$cuser";
                $result = mysqli_query($cxn,$query) or die ("Couldn't execute query");
                $row = mysqli_fetch_assoc($result);
                extract($row);
                if($PASS_WORD == $PASSWORD){
			if(md5($_POST['npassword']) == md5($_POST['ncpassword'])){
				
				$New_Pass = hash("sha256",(sha1(md5($_POST['ncpassword'])).md5($_POST['npassword']).$L4HSALT));
				$Query2 = "Update INTERNAL_USERS set PASSWORD='$New_Pass' where USER_ID=$cuser";
				$result = mysqli_query($cxn,$Query2) or die ("Sadly I died");
				$date_of_expiry = time() + (60 * 60 * 24 * 5);
				setcookie("L4HPassword","$New_Pass", $date_of_expiry, "/",".linux4hope.org");
				header("Location: https://linux4hope.org/backend/dashboard");
				
				}
			}

	}
	
	
	
}else{
die;
}

?>
