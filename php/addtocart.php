<?php

//preincludes
include '../includes/connection.php';

//check if logged in
if (isset($_SESSION['email'])) {
	
	//retrive dats from post and session variables
    $item_id = $_POST['id'];
    $user_id = $_SESSION['user_id'];
    $quantity = $_POST['quantity'];
	
	//add the item to purchases db and status as Added to cart
    $query = "INSERT INTO purchases ( user_id, item_id, quantity, status) VALUES ( '$user_id', '$item_id', '$quantity', 'Added to cart')";
    
	//redirect to products page agin if added
	if (mysqli_query($con, $query) == true) {
        header('location: ../products');
    } 
	
	//redirect to products page and show error if if not added
	else {
        header('location: ../products?message=error');
    }
} 

//redirect to login page if not logged in
else {
    header('location: ../login');
}

?>
