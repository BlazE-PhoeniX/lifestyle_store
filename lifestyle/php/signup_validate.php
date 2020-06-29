<?php

//preincludes
include '../includes/connection.php';

//get the inputs from post variable
$email = trim(mysqli_real_escape_string($con, $_POST['email']));
$password = trim(mysqli_real_escape_string($con, $_POST['password']));
$name = trim(mysqli_real_escape_string($con, $_POST['name']));
$contact = trim(mysqli_real_escape_string($con, $_POST['contact']));
$city = trim(mysqli_real_escape_string($con, $_POST['city']));
$address = trim(mysqli_real_escape_string($con, $_POST['address']));

//server validation
//if one of the fields empty
if ($email == "" || $password == "" || $name == "" || $address == "" || $city == "" || $contact == "") {
    header("location: ../signup?message=fieldempty");
} 

//if email is in correct format
else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("location: ../signup?message=emailwrongformat");
} 

//if password in correcct format
else if (!preg_match("#.*^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $password)) {
    header("location: ../signup?message=passwordwrongformat");
} 

//if password is atleast 8 characters long
else if (strlen($password) < 8) {
    header("location: ../signup?message=shortpassword");
} 

//if name contains digits
else if (preg_match("/[0-9]/", $name)) {
    header("location: ../signup?message=nameinvalid");
} 

//if city name contins digits
else if (preg_match("/[0-9]/", $city)) {
    header("location: ../signup?message=cityinvalid");
} 

//if contact has any alphabet
else if (preg_match("/[a-zA-Z]/", $contact)) {
    header("location: ../signup?message=contactinvalid");
} 

//if contact has 10 digits
else if (strlen($contact) < 10) {
    header("location: ../signup?message=shortcontact");
} 

//if validation passess
else {
	
	//encrpyt the password
    $password = md5(md5($password));
	
	//check if email is already present in databases
    $query = "SELECT * FROM users WHERE email = '$email'";
    $check = mysqli_query($con, $query);
	
	//if present redirect to login page
    if (mysqli_num_rows($check) > 0) {
        header('location: ../login?message=existinguser');
    } 
	
	//if not present
	else {
		
		//add the user to users database
        $query = "INSERT INTO users (name,email,password,contact,city,address) VALUES('$name','$email','$password','$contact','$city','$address')";
        if (mysqli_query($con, $query) == true) {
			
			//initialise session variables
            $_SESSION['user_id'] = mysqli_insert_id($con);
            $_SESSION['username'] = $name;
            $_SESSION['password'] = $password;
            $_SESSION['email'] = $email;
            $_SESSION['phoneno'] = $contact;
            $_SESSION['address'] = $address;
            $_SESSION['city'] = $city;
			
			//redirect to products page
            header('location: ../products');
        } 
		
		//if couldn't add redirect to login pade and show error
		else {
            header('location: ../login?message=servererror');
        }
    }
}

?>
