<?php
ob_start();
include "UserClass.php";
$USER = new UserClass();
if($USER->LoggedIn()){
        // Tacos
} else{
        header("Location: http://linux4hope.org/404");
}
require("dbclass.php");
$dbobj = new dbclass;
$cxn = $dbobj->cxn;
$appid = mysqli_real_escape_string($cxn,$_GET['id']);
$action = mysqli_real_escape_string($cxn,$_GET['action']);
if($action === "approve"){
//Set approved, undelivered
$result = mysqli_query($cxn, "Select * from PENDING_APPS where APP_ID = $appid");
$row = mysqli_fetch_assoc($result);
if(!empty($row)){
	extract($row);
	$remove = "Delete from PENDING_APPS where APP_ID = $appid";
	$add = "Insert into ACCEPTED_APPS(APP_ID,APPLICANT_ID) values($appid,$APPLICANT_ID)";
	mysqli_query($cxn,$remove) or die ("Couldn't remove pending app");
	mysqli_query($cxn,$add) or die ("Couldn't add to approved");
	header("Location: https://linux4hope.org/backend/viewapplication?appid=$appid");
	}else{
	//If no results were found redirect to an error?
	}

}
else if($action === "deny"){
$result = mysqli_query($cxn, "Select * from PENDING_APPS where APP_ID = $appid") or die ("Failed ");
$row = mysqli_fetch_assoc($result);
if(!empty($row)){
        extract($row);
        $remove = "Delete from PENDING_APPS where APP_ID = $appid";
        $deny = "Insert into DENIED_APPS(APP_ID,APPLICANT_ID) values($appid,$APPLICANT_ID)";
        mysqli_query($cxn,$remove) or die ("Couldn't remove pending app");
        mysqli_query($cxn,$deny) or die ("Couldn't add to approved");
        header("Location: https://linux4hope.org/backend/viewapplication?appid=$appid");
        }else{
        //If no results were found redirect to an error?
        }

}

//Set Denied
else if($action ==="denyapprove"){
$result = mysqli_query($cxn, "Select * from ACCEPTED_APPS where APP_ID = $appid");
$row = mysqli_fetch_assoc($result);
if(!empty($row)){
        extract($row);
        $remove = "Delete from ACCEPTED_APPS where APP_ID = $appid";
        $deny = "Insert into DENIED_APPS(APP_ID,APPLICANT_ID) values($appid,$APPLICANT_ID)";
        mysqli_query($cxn,$remove) or die ("Couldn't remove pending app");
        mysqli_query($cxn,$deny) or die ("Couldn't add to approved");
        header("Location: https://linux4hope.org/backend/viewapplication?appid=$appid");
        }else{
        //If no results were found redirect to an error?
        }

}

else if($action ==="delivered"){
$result = mysqli_query($cxn, "Select * from ACCEPTED_APPS where APP_ID = $appid");
$row = mysqli_fetch_assoc($result);
if(!empty($row)){
	mysqli_query($cxn,"Update ACCEPTED_APPS set DELIVERED=1 where APP_ID=$appid");
	header("Location: https://linux4hope.org/backend/viewapplication?appid=$appid");
	}else{
	//error
	}
}
?>
