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

if($_POST['submituser']){
	$host="localhost";
        $account="l4hadmin_site";
        $phppass="_OEfAUu!#*vA";
        $dbselect="LINUX4HOPE";
        $cxn=mysqli_connect($host,$account,$phppass,$dbselect) or die ("Couldn't Connect to Database");
        $FNAME = mysqli_real_escape_string($cxn,$_POST['FNAME']);
        $LNAME = mysqli_real_escape_string($cxn,$_POST['LNAME']);
        $EMAIL = mysqli_real_escape_string($cxn,$_POST['EMAIL']);
	$branch = mysqli_real_escape_string($cxn,$_POST['branch']);
	if($branch == 1){
	$BRANCH = "Manassas";
	}elseif($branch == 2){
        $BRANCH = "Richmond";
	}elseif($branch == 3){
	$BRANCH = "Harrisonburg";
	}elseif($branch == 4){
	$BRANCH = "LA";
	}else{
	$BRANCH = "Manassas";
	}
        $random_password = makeRandomPassword();
        $cpassword = md5($random_password);       
        $SALT = sha1(md5($random_password));
        $L4HSALT = (sha1("Uy2A673G54Fjo5l"));
        $PASS_WORD = hash("sha256",$SALT.$cpassword.$L4HSALT);
        $query = "Insert into INTERNAL_USERS(F_NAME,L_NAME,EMAIL,PASSWORD,BRANCH) values ('$FNAME','$LNAME','$EMAIL','$PASS_WORD','$BRANCH')";
        $result = mysqli_query($cxn, $query) or die ("Could not create user");
        $last_id = mysqli_insert_id($cxn);
	header("Location: https://linux4hope.org/backend/accountcreated.html?pwd=$random_password");
}else{
header("Location: http://linux4hope.org");
}
function makeRandomPassword() { 
          $salt = "abchefghjkmnpqrstuvwxyz0123456789"; 
          srand((double)microtime()*1000000);  
          $i = 0; 
          while ($i <= 7) { 
                $num = rand() % 33; 
                $tmp = substr($salt, $num, 1); 
                $pass = $pass . $tmp; 
                $i++; 
          } 
          return $pass; 
    }
?>
