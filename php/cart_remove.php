<?php

//preincludes
include '../includes/connection.php';

//retrive purchase id
$id = $_GET['id'];

//delete the data from purchase database
$query = "DELETE FROM purchases WHERE id='$id'";

//redirect to cart page if deleted
if (mysqli_query($con, $query) == true) {
    header('location: ../cart');
} 

//redirect to cart page and show error if not deleted
else {
    header('location: ../cart?message=error');
}

?>