<?php
    ob_start();
	$host = "localhost";
	$account = "linux4hope-admin";
	$password = "li4h0P311";
	$database = "linux4hope";
	$connection = mysqli_connect($host,$account,$password,$database) or die ("There was an error connecting to the database.");
	$FNAME = mysqli_real_escape_string($connection,$_POST['fname']);
	$LNAME = mysqli_real_escape_string($connection,$_POST['lname']);
	$EMAIL = mysqli_real_escape_string($connection,$_POST['email']);
	$PHONE = mysqli_real_escape_string($connection,$_POST['phone']);
	$ADDRESS = mysqli_real_escape_string($connection,$_POST['address1'].' '.$_POST['address2'].' '.$_POST['address3']);
	$BRANCH = $_POST['branch'];
    $BRANCH_EMAIL = null;
	$WILLHELP = mysqli_real_escape_string($connection,$_POST['usecomputer']);
	$FAMILY = mysqli_real_escape_string($connection,$_POST['family']);
	$INCOME = mysqli_real_escape_string($connection,$_POST['income']);
	$STATEMENT = $_POST['statements'];

	function isChecked($statement, $value){
		if(in_array($value, $statement)) {
            return true;
        } else {
            return false;
        }
	}

	$PERM = $_POST['permission'];
	$WRONG = "?error=true";

    # Captcha
    if (array_key_exists('submitapp', $_POST)){
        // Use the AYAH object to see if the user passed or failed the game.
        $score = $ayah->scoreResult();

        if (!$score) {
            $WRONG = $WRONG."&CAPTCHA=1";
        }
    }
	
    # FIRST NAME

	if(empty($FNAME)){
		$WRONG = $WRONG."&FNAME=1";
		$FNAME = false;
	}

    # LAST NAME
	
	if(empty($LNAME)){
		$WRONG = $WRONG."&LNAME=1";
		$LNAME = false;
	}

    # Validate the email

    $reg = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
	
    if (!preg_match($reg, $EMAIL)) {
        $WRONG = $WRONG."&EMAIL=1";
		$EMAIL = false;
    }

    # Validate the phone number

    $reg = "/^((([0-9]{1})*[- .(]*([0-9]{3})[- .)]*[0-9]{3}[- .]*[0-9]{4})+)*$/";

    if (!preg_match($reg, $PHONE) && strlen($PHONE) > 7) {
        $WRONG = $WRONG."&PHONE=1";
		$PHONE = false;
    }

    # $NUMBERS = preg_replace("/[^0-9]/", '', $PHONE);

    # if((preg_match("/[^0-9]/", '', $NUMBERS)) && strlen($NUMBERS) == 10) {
    #     $PHONE = $NUMBERS;
    # } else {
    #     $WRONG = $WRONG."&PHONE=1";
	# 	  $PHONE = false;
    # }

	# ADDRESS
	
	if(empty($ADDRESS)){
		$WRONG = $WRONG."&ADDRESS=1";
		$ADDRESS = false;
	}

    # WHICH BRANCH ARE YOU APPLYING TO?

	if(empty($BRANCH)){
		$WRONG = $WRONG."&BRANCH=1";
		$BRANCH = false;
	} else
        if($BRANCH != 1 && $BRANCH != 2 && $BRANCH != 3 && $BRANCH != 4){
            $WRONG = $WRONG."&BRANCH=1";
            $BRANCH = false;
        }

	# ELABORATE ON HOW A COMPUTER FROM US WILL HELP WITH WORK, EDUCATIONAL, OR PERSONAL PURPOSES.

	if(empty($WILLHELP)){
		$WRONG = $WRONG."&WILLHELP=1";
		$WILLHELP = false;
	}

	# WILL ANY FAMILY MEMBERS IN YOUR HOUSEHOLD BE USING THE COMPUTER?

	if(empty($FAMILY)){
		$WRONG = $WRONG."&FAMILY=1";
		$Fam = false;
	}

	# WHAT IS YOUR ANNUAL INCOME?

	if(empty($INCOME)){
		$WRONG = $WRONG."&INCOME=1";
		$INCOME = false;
	} else
        if($INCOME != 1 && $INCOME != 2 && $INCOME != 3 && $INCOME != 4){
            $WRONG = $WRONG."&INCOME=1";
            $INCOME = false;
        }

	# CHECK THE STATEMENTS THAT MAY APPLY TO YOU.

	#if(empty($STATEMENT)){
	#	$WRONG = $WRONG."&STATEMENT=1";
	#	$STATEMENT = 'false';
	#} else {
    #    $PURCHASED_ELECTRONICS = isChecked($statement,'purchased_electronics') ? 'true' : 'false';
    #    $WORKING_COMP = isChecked($statement,'working_computer') ? 'true' : 'false';
    #    $INTERNET_ACCESS = isChecked($statement,'internet_access') ? 'true' : 'false';   
    #}

    $PURCHASED_ELECTRONICS = isChecked($STATEMENT,'purchased_electronics') ? 'true' : 'false';
    $WORKING_COMP = isChecked($STATEMENT,'working_computer') ? 'true' : 'false';
    $INTERNET_ACCESS = isChecked($STATEMENT,'internet_access') ? 'true' : 'false'; 

    #$PURCHASED_ELECTRONICS = in_array('purchased_electronics') ? 'true' : 'false';
    #$WORKING_COMP = in_array('working_computer') ? 'true' : 'false';
    #$INTERNET_ACCESS = in_array($statement,'internet_access') ? 'true' : 'false'; 

	# DOES LINUX4HOPE HAVE PERMISSION TO USE PICTURES FOR PROMOTIONAL USE?

	if(empty($PERM)){
		$WRONG = $WRONG."&PERM=1";
		$PERM = false;
	} else {
        if($PERM === 'Yes'){
	       $PERM = 'true';
        } else {
	       $PERM = 'false';
        }
    }
        

	# Check for errors before inserting into database
	
	if($WRONG === "?error=true"){
        
		# Attempt to insert APPLICANT INFORMATION into the database
        
		$query1 = "Insert into APPLICANTS(FIRSTNAME,LASTNAME,EMAIL,PHONE,ADDRESS,TIMESTAMP) values ('$FNAME','$LNAME','$EMAIL','$PHONE','$ADDRESS',now())";
		$result = mysqli_query($connection,$query1) or die ("The form could not be submitted. Please contact us for help.");
		$applicant_id = mysqli_insert_id($connection);
        
        # Determine the branch that user is requesting
        
		switch($BRANCH){
			case 1:
				$BRANCH = 'Manassas';
                $BRANCH_EMAIL = 'manassasva@linux4hope.org';
				break;
			case 2:
				$BRANCH = 'Richmond';
                $BRANCH_EMAIL = 'richmondva@linux4hope.org';
				break;
			case 3:
				$BRANCH = 'Harrisonburg';
                $BRANCH_EMAIL = 'harrisonburgva@linux4hope.org';
				break;
			case 4:
				$BRANCH = 'Los Angeles';
                $BRANCH_EMAIL = 'losangelesca@linux4hope.org';
				break;
        }
        
        # Determine the annual income of the applicant
        
        switch($INCOME){
            case 1:
                $INCOME = 'Less than $20,000';
                break;
            case 2:
                $INCOME = '$20,000 - $40,000';
                break;
            case 3:
                $INCOME = '$40,000 - $60,000';
                break;
            case 4:
                $INCOME = 'Greater than $60,000';
                break;
        }
        
        # Attempt to insert APPLICATION INFORMATION into database
        
        $query2 = "Insert into APPLICATIONS(BRANCH,WILLHELP,FAMILY,INCOME,PURCHASED_ELECTRONICS,WORKING_COMP,INTERNET_ACCESS,PERM,ID,TIMESTAMP) values('$BRANCH','$WILLHELP','$FAMILY','$INCOME',$PURCHASED_ELECTRONICS,$WORKING_COMP,$INTERNET_ACCESS,$PERM,$applicant_id,now())";
        $result2 = mysqli_query($connection,$query2) or die ("The form could not be submitted. Please contact us for help.");
        
        # Attempt to add APPLICATION to PENDING APPLICATIONS
        
        $application_id = mysqli_insert_id($connection);
        $query3 = "Insert into PENDING(APP_ID,APPLICANT_ID) values ($application_id,$applicant_id)";
        $result3 = mysqli_query($connection,$query3) or die ("The submission could not be added to the pending applications.");
        
        mysqli_close($connection);
        
        # Success!
        # Now, let's save the applicant's contact information for the success page
        
        $_SESSION['applied'] = true;
        $_SESSION['name'] = $FNAME.' '.$LNAME;
        $_SESSION['email'] = $EMAIL;
        $_SESSION['phone'] = $PHONE;
        $_SESSION['address'] = $ADDRESS;
        $_SESSION['branch'] = $BRANCH;
        $_SESSION['branch_email'] = $BRANCH_EMAIL;
        # Redirect user to the success page
        header("Location: ../success.php");
	} else {
        header("apply".$WRONG);
    }

?>