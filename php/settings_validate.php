<?php

//preincludes
include '../includes/connection.php';

//retrieve inputs from post variables
$password = trim(mysqli_real_escape_string($con, $_POST['password']));
$new_password = trim(mysqli_real_escape_string($con, $_POST['new-password']));
$confirm_password = trim(mysqli_real_escape_string($con, $_POST['confirm-password']));

//if any of the fields are empty
if ($password == "" || $new_password == "" || $confirm_password == "") {
    header("location: ../settings?message=fieldempty");
} 

//if new password not in correcct format
else if (!preg_match("#.*^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $new_password)) {
    header("location: ../settings?message=passwordwrongformat");
} 

//if new password less than 8 characters
else if (strlen($new_password) < 8) {
    header("location: ../settings?message=shortpassword");
} 

//if new and confirm passwords doesn't match
else if ($new_password != $confirm_password) {
    header("location: ../settings?message=passwordmismatch");
} 

//if validation passes
else {
	
	//encrpyt the password and new password
    $password = md5(md5($password));
    $new_password = md5(md5($new_password));
    $email = $_SESSION['email'];
	
	//get the user details from users db
    $query = "SELECT * FROM users WHERE email = '$email'";
    $check = mysqli_query($con, $query) or die(mysqli_error($con));
	
	//check if user data is retrieved 
    if (mysqli_num_rows($check) > 0) {
        $user = mysqli_fetch_array($check);
		
		//check if current password matches the db
        if ($password == $user['password']) {
			
			//update the new password
            $query = "UPDATE users SET password = '$new_password' WHERE email = '$email'";
			
			//redirect to settings page and show success message if updated
            if (mysqli_query($con, $query)) {
                header("location: ../settings?message=success");
            } 
			
			//redirect to settings page and show error message if not updated
			else {
                header("location: ../settings?message=servererror");
            }
        } 
		
		//redirect to settings page and show error if the current password doesn't match db 
		else {
            header("location: ../settings?message=currentpasswordmismatch");

        }
    }
}

?>
