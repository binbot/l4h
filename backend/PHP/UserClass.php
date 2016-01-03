<?php
class UserClass{
##Variables can go here



#Constructor goes here
public function UserClass(){
	if(!empty($_COOKIE['L4HUserid'])){
		$account="l4hadmin_site";
        	$phppass="_OEfAUu!#*vA";
	        $dbselect="LINUX4HOPE";
		$cxn = mysqli_connect("localhost",$account,$phppass,$dbselect) or die ("Couldn't Connect to Database");
		$COOKIEUSER=$_COOKIE['L4HUserid'];
	        $COOKIEPASS=$_COOKIE['L4HPassword'];
	        $query = "Select PASSWORD from INTERNAL_USERS where USER_ID=$COOKIEUSER";
	        $result = mysqli_query($cxn,$query) or die ("Couldn't execute query");
        	$row = mysqli_fetch_assoc($result);
	        extract($row);
                if($COOKIEPASS!=$PASSWORD){
			$expire = time()-360000;
		        setcookie("L4HUserid","",$expire, "/",".linux4hope.org" );
		        setcookie("L4HPassword","",$expire, "/",".linux4hope.org");
			$this->isusertrue = false;
			}else{
			#Possibly Get User Information??????
			$this->isusertrue = true;
			}
		mysqli_close($cxn);
		}else{
		$this->isusertrue = false;
	}

	}

public function LoggedIn(){
	return $this->isusertrue;
}


}
?>
